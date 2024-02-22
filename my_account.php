<!doctype html>
<html lang="en">

<head>

  <!-- **************************************************************************

                                Hotjar Tracking Code for

    **************************************************************************-->

<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2740537,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<!-- **************************************************************************

                              Meta Data

  **************************************************************************-->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <<<<<< Bootstrap CSS >>>>>> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <title>Limelight Cinema - Where the entertainment starts</title>
  <link rel="shortcut icon" type="image/jpg" href="img/favicon.png"/>

</head>

<!-- **************************************************************************

                                 Navbar

  **************************************************************************-->

<header>
  <?php
session_start();

if (isset($_SESSION['ADULT']))
{
    include 'nav-adult.php';
}

elseif (isset($_SESSION['ADMIN']))
{
    include 'nav-admin.php';
}

elseif (isset($_SESSION['JUNIOR']))
{
    include 'nav-junior.php';
}

else
{
    include 'nav.php';
};

?>
</header>

<!-- **************************************************************************

                                 Account information

  **************************************************************************-->

  <?php
  if (isset($_SESSION['JUNIOR'])){

   echo "<body style='background-color:#7a25a8'>";
  }
  else {
   echo "<body>";
  }
   ?>

  <section>
    <div class="my_account">


<?php
// Check session

if (isset($_SESSION['ADULT']) || isset($_SESSION['ADMIN']) || isset($_SESSION['JUNIOR']))
{
    echo "
   <div class='content_header d-flex justify-content-center'>
     <h4>Change My Details</h4>
     </div><br>
   <form class='d-flex justify-content-center' action='my_account.php' method='POST'>
     <div class='table-responsive'>
       <table class='table-responsive{-sm|-md|-lg|-xl}'>
         <thead>
           <tr>
             <th scope='col'>Name*
             </th>
             <th scope='col'>Email
             </th>
             <th scope='col'>Date Of Birth
             </th>
           </tr>
         </thead>
         <tbody>";

    // Create connection with MySQL Database
    include 'dbconnection.php';
    // Update user info
    if (isset($_POST['user_update']))
    {
        $userID = $_SESSION["USERID"];
        $updateUserQuery = "UPDATE limelightcinema_user SET name='$_POST[name]', email='$_POST[email]', dob='$_POST[dob]' WHERE ID='$userID'";
        mysqli_query($con, $updateUserQuery);
        $message = "Your details has been successfully updated";
        echo "<script type='text/javascript'>alert('$message');</script>";
    };

    // List the available User info
    $userID = $_SESSION["USERID"];
    $result = mysqli_query($con, "SELECT * FROM limelightcinema_user WHERE ID='$userID'");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo "<tr>";
        echo "<td><input class='user_imput_field' type='text' name='name' value='" . $row['name'] . "' readonly </td>";
        echo "<td><input class='user_imput_field' type='text' name='email' value='" . $row['email'] . "'</td>";
        echo "<td><input class='user_imput_field' type='date' name='dob' value='" . $row['dob'] . "'</td>";
        echo "<td><input type='hidden' name='hidden' value='" . $row['ID'] . "'</td>";
        echo "<td><input class='btn_admin' type='submit' name='user_update' value='Update My Details'</td>";
        echo "</tr>";
    }
    mysqli_close($con);

    echo "</tbody>
      </table>
      </div>
      </form>
      <div class='d-flex justify-content-center'>
      <p>*You can't change your name</p>
      </div>


      <div class='content_header d-flex justify-content-center'>
      <h4>Change My Password</h4>
      <hr>
      </div>
      <div class='col-lg-8 col-md-8 col-sm-8 container d-flex justify-content-center'>
      <div class='col d-flex justify-content-center'>
      <form action='my_account.php' method='POST'>
      <div class='form-group user_add_field'>
      <label>New Password
      </label>
      <br />
      <input class='user_add_field' type='password' name='new_password' placeholder='Enter Name' required='required'><br/>
      </div>
      <div class='form-group user_add_field'>
      <label>Confirm New Password
      </label>
      <br />
      <input class='user_add_field' type='password' name='confirm_new_password' placeholder='Enter Password' required='required'><br/>
      </div>
      <input class='btn_admin' type='submit' name='password_update' value='Update My Password'>
      <input class='btn_admin' type='reset' name='' value='Reset'>
      <br>
      </form>";

    include 'dbconnection.php';
    if (isset($_POST['password_update']))
    {
        if ($_POST['new_password'] !== $_POST['confirm_new_password'])
        {
            $message = "Password and Confirm password MUST match!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

        else
        {
            $userEmail = $_SESSION["EMAIL"];
            $updateUserQuery = "UPDATE limelightcinema_user SET password='$_POST[new_password]' WHERE email='$userEmail'";
            mysqli_query($con, $updateUserQuery);
            $message = "Your password has been successfully updated";
            echo "<script type='text/javascript'>alert('$message');</script>";
              }

          }

          echo "</div>
             </div>
             <div class='content_header d-flex justify-content-center'>
        <h4>Delete My Account</h4>
        <hr>
      </div>
      <div class='col-lg-8 col-md-8 col-sm-8 container d-flex justify-content-center'>
        <div class='d-flex justify-content-center'>
      <form action='my_account.php' method='post'>
        <input class='btn_admin' name='delete_account' type='submit' value='Delete My Account'/>
      </form>
      </div>
      </div>
      </div>";

    if (isset($_POST['delete_account']))
    {
        include 'dbconnection.php';
        $userEmail = $_SESSION["EMAIL"];

        $deleteQuery = "DELETE FROM limelightcinema_user WHERE email='$userEmail'";
        mysqli_query($con, $deleteQuery);
        session_destroy();
        $message = "Your Account has been successfully Deleted. We hope to see you again in the future!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo '<script type="text/javascript">
        location.replace("index.php"); </script>';
        }
    }

  else
  {
      echo "
    <div class='d-flex justify-content-center'>
    <script src='https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js'></script>
    <lottie-player src='https://assets8.lottiefiles.com/packages/lf20_tyizyjat.json'  background='transparent'  speed='1'  style='width: 200px; height: 200px;'  loop  autoplay></lottie-player>
    </div>
    <div class='d-flex justify-content-center'>
    <h6>To see your Account please <a href='login.php'>LOGIN</a> or go <a href='index.php'>BACK TO HOME PAGE</a>!</h6><br><br>
    </div>";
  }
?>


</div>
</section>

<!-- **************************************************************************

                              Footer

  **************************************************************************-->

  <section>
    <footer class="footer-bs">
      <div class="container">
        <hr>

        <div class="row justify-content-end">
          <div class="col-md-3 footer-brand">
            <div class="logo_footer">
              <div class="imageInn">
                <a href="index.php"><img src="img/logo.png" alt="Profile Image"></a>
              </div>
              <div class="hoverImg">
                <a href="index.php"><img src="img/logo_hover.png" alt="Profile Image"></a>
              </div>
              <br>
              <div>
                <p>Where the entertainment starts</p>
                <p>© 2021 <a href="https://www.gazdesign.co.uk/">GAZdesign</a>, All rights reserved</p>
              </div>
            </div>
          </div>

          <div class="col-md-2 footer-brand">
            <h4>Follow us on:</h4>
            <ul class="">
              <li class="list-inline-item"><i class="fa fa-facebook"></i></li>
              <li class="list-inline-item"><i class="fa fa-twitter"></i></li>
              <li class="list-inline-item"><i class="fa fa-instagram"></i></li>
              <li class="list-inline-item"><i class="fa fa-youtube"></i></li>
            </ul>
          </div>
          <div class="col-md-5 footer-brand" id="footerNav">
            <h4 class="">Sitemap:</h4>
            <ul>
              <li class="list-inline-item">
                <a class="nav-link text-center" href="index.php">Home</a>
              </li>
              <li class="list-inline-item">
                <a class="nav-link text-center" href="whatson.php">What's on</a>
              </li>
              <li class="list-inline-item">
                <a class="nav-link text-center" href="contact.php">Contact</a>
              </li>

              <?php
                if (isset($_SESSION['JUNIOR']))
                {
                  echo "
                <li class='list-inline-item'>
                  <a class='nav-link text-center' href='game.php'>Play a Game</a>
                </li>
                <li class='list-inline-item'>
                  <a class='nav-link text-center' href='my_account.php'>My Account</a>
                </li>
                <li class='list-inline-item'>
                  <a class='nav-link text-center' href='logout.php'>Logout</a>
                </li>
                ";
                }
                elseif (isset($_SESSION['ADULT']))
                {
                echo "
                <li class='list-inline-item'>
                  <a class='nav-link text-center' href='my_tickets.php'>My Tickets</a>
                </li>
                <li class='list-inline-item'>
                  <a class='nav-link text-center' href='my_account.php'>My Account</a>
                </li>
                <li class='list-inline-item'>
                  <a class='nav-link text-center' href='logout.php'>Logout</a>
                </li>
                ";
                  }
                  elseif (isset($_SESSION['ADMIN']))
                  {
                  echo "
                <li class='list-inline-item'>
                  <a class='nav-link text-center' href='my_tickets.php'>My Tickets</a>
                </li>
                <li class='list-inline-item'>
                  <a class='nav-link text-center' href='my_account.php'>My Account</a>
                </li>
                <li class='list-inline-item'>
                  <a class='nav-link text-center' href='admin_panel.php'>Admin Panel</a>
                </li>
                <li class='list-inline-item'>
                  <a class='nav-link text-center' href='logout.php'>Logout</a>
                </li>
                ";
                }
                else
                {
                echo "
                <li class='list-inline-item'>
                  <a class='nav-link text-center' href='login.php'>Login / Register <i class='fa fa-user'></i></a>
                </li>
                ";
              }
              ?>
            </ul>
          </div>
        </div>
        <hr>
      </div>
    </footer>
  </section>

  </body>

  </html>
