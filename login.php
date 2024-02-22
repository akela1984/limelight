<!doctype html>
<?php
ob_start();
?>
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


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="css/style.css" rel="stylesheet">

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


<body>
  <section>
<div class="login-register-form">
  <div class="container">

    <!-- **************************************************************************

                                     Login form

      **************************************************************************-->

<div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-4 login-register-body">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="login_form_box_link" data-toggle="tab" href="#login_form_box" role="tab" aria-controls="login_form_box" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register_form_box_link" data-toggle="tab" href="#register_form_box" role="tab" aria-controls="register_form_box" aria-selected="false">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content d-flex justify-content-center">
                        <div class="tab-pane fade show active text-align form-new" id="login_form_box" role="tabpanel" aria-labelledby="login_form_box_link">
                          <div class="container-sm admin_main_box">
                            <hr>
                            <div class="container_title d-flex justify-content-center">
                              <p>Please enter your username and password</p>
                            </div>
                            <form class="" action='login.php' method='post'>
                              <div class="form-group d-flex justify-content-center">
                                <input class="login_register_field" type='text' name='login_email' placeholder='Email' required='required'><br/>
                              </div>
                              <div class="form-group d-flex justify-content-center">
                                <input class="login_register_field" type='password' name='login_password' placeholder='Password' required='required'><br/>
                              </div>
                              <hr>
                              <div class="form-group d-flex justify-content-center">
                                <input class='btn_admin login_register_field' type='submit' name='login' value='Login Now'>
                                </div>
                                <br>
                            </form>
                            <?php
                            // Start Session
                            session_start();
                            // Create connection with MySQL Database
                            include 'dbconnection.php';

                            $email = $_POST['login_email'];
                            $password = $_POST['login_password'];

                            if (isset($_POST['login_email']) && ($_POST['login_password']))
                            {

                                $sql = "SELECT * FROM limelightcinema_user WHERE email='$email' AND password='$password'";
                                $result = mysqli_query($con, $sql);

                                $count = mysqli_num_rows($result);

                                if ($count == 1)
                                {
                                    // assigning a variable for the dob row where username and password match with the entered
                                    while ($r = mysqli_fetch_array($result))
                                    {
                                        $dob = $r['dob'];
                                        $permission = $r['permission'];
                                        $username = $r['name'];
                                        $email = $r['email'];
                                        $userID = $r['ID'];
                                        list($year, $month, $date) = explode("-", $dob);
                                        $birthday = mktime(0, 0, 0, $month, $day, $year);
                                        $difference = time() - $birthday;
                                        $age = floor($difference / 31556926);
                                    }
                                    if ($age >= 18)
                                    {
                                        if ($permission == yes)
                                        {

                                            $_SESSION['ADMIN'] = 'ADMIN';
                                            $_SESSION['USERNAME'] = $username;
                                            $_SESSION['EMAIL'] = $email;
                                            $_SESSION['USERID'] = $userID;
                                            header("Location:index.php");
                                            ob_end_flush();
                                        }
                                        else
                                        {
                                            $_SESSION['ADULT'] = 'ADULT';
                                            $_SESSION['USERNAME'] = $username;
                                            $_SESSION['EMAIL'] = $email;
                                            $_SESSION['USERID'] = $userID;
                                            header("Location:index.php");
                                            ob_end_flush();
                                        }
                                    }

                                    else
                                    {
                                        $_SESSION['JUNIOR'] = 'JUNIOR';
                                        $_SESSION['USERNAME'] = $username;
                                        $_SESSION['EMAIL'] = $email;
                                        $_SESSION['USERID'] = $userID;
                                        header("Location:index.php");
                                        ob_end_flush();
                                    }
                                }

                                else
                                {
                                    $message = "Login details incorrect. Please try again!";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                }
                            }
                            ?>
                            </div>
                        </div>

                        <!-- **************************************************************************

                                                         Register form

                          **************************************************************************-->


                        <div class="tab-pane fade show text-align form-new" id="register_form_box" role="tabpanel" aria-labelledby="register_form_box_link">
                          <div class="container-sm admin_main_box">
                            <hr>
                            <div class="container_title d-flex justify-content-center">
                              <p>Create your account</p>
                            </div>
                            <form class="" action='login.php' method='post'>
                              <div class="form-group ">
                                <input class="login_register_field" type='email' name='email' placeholder='Email' required='required'><br/>
                              </div>
                              <div class="form-group ">
                                <input class="login_register_field" type='text' name='name' placeholder='Full name' required='required'><br/>
                              </div>
                              <div class="form-group ">
                                <input class="login_register_field" type='password' name='password' placeholder='Password' required='required'><br/>
                              </div>
                              <div class="form-group ">
                                <input class="login_register_field" type='password' name='confirm-password' placeholder='Conform Password' required='required'><br/>
                              </div>
                              <div class="form-group">
                                <label class="d-flex justify-content-center">Date of Birth</label>
                                <br/>
                                <input class="login_register_field" type='date' name='dob' placeholder='Date Of Birth' required='required'><br/>
                              </div>
                              <hr>
                              <div class="form-group d-flex justify-content-center">
                                <input class='btn_admin login_register_field' type='submit' name='register' value='Register now'>
                                </div>
                                <?php
                                // Create connection with MySQL Database
                                include 'dbconnection.php';

                                $email = $_POST['email'];
                                $name = $_POST['name'];
                                $password = $_POST['password'];
                                $confirmPassword = $_POST['confirm-password'];
                                $dob = $_POST['dob'];

                                if (isset($_POST['email']) && ($_POST['name']) && ($_POST['password']) && ($_POST['confirm-password']) && ($_POST['dob']))
                                {

                                    if ($_POST['password'] !== $_POST['confirm-password'])
                                    {
                                        $message = "Password and Confirm password should match!";
                                        echo "<script type='text/javascript'>alert('$message');</script>";

                                    }
                                    else
                                    {
                                        $sql = mysqli_query($con, "SELECT * FROM limelightcinema_user WHERE email='$email'");
                                        if (mysqli_num_rows($sql) > 0)
                                        {
                                            $message = "This email address already registered. Try agan with a different Email address";
                                            echo "<script type='text/javascript'>alert('$message');</script>";
                                        }
                                        else
                                        {
                                            $sql = "INSERT INTO limelightcinema_user (email, name, password, dob ) VALUES ('$email', '$name', '$password', '$dob')";

                                            $message = "Registration successfully you can login now";
                                            echo "<script type='text/javascript'>alert('$message');</script>";

                                        }
                                        if (!mysqli_query($con, $sql))
                                        {
                                            die(mysqli_error($con));
                                        }
                                    }

                                }

                                ?>
                                <br>
                            </form>
                            </div>
                            </div>
                           </div>
                      </div>
                    </div>
                </div>
            </div>
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

<!-- <<<<<< SCRIPT TO FIX BOOTSTRAP 5 TAB ISSUE AND FLASHING BULE LINKS >>>>>>> -->
<script type="text/javascript">
setTimeout(function(){
document.querySelector(".nav").classList.add("nav-tabs");
}, 1000);
</script>
</body>

</html>
