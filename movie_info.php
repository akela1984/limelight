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

                                 Movie information

  **************************************************************************-->

  <?php
  if (isset($_SESSION['JUNIOR'])){

   echo "<body style='background-color:#7a25a8'>";
  }
  else {
   echo "<body>";
  }
   ?>

<?php
// Create connection with MySQL Database
include 'dbconnection.php';
$movieInfoID = isset($_POST['movieInfoID']) ? $_POST['movieInfoID'] : "";

$result = mysqli_query($con, "SELECT * FROM limelightcinema_film WHERE ID='$movieInfoID'");
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "
  <section>
  <div class='movie-info'>
    <div class='container'>
      <div class='row d-flex justify-content-center'>
      <div class='col-lg-5 movie-info-pic d-flex justify-content-center'>
      <img src='img/movie_img/" . $row['img'] . "' alt='" . $row['title'] . "'>
      </div>
      <div class='col-lg-5 movie-info-body'>
        <div>
          <h4 class='d-flex justify-content-center'>" . $row['title'] . "</h4>
          <hr>
        </div><br>
        <div>
          <h4>Description</h4>
         <p>" . $row['description'] . "</p>
        </div>
        <div>
          <h4>Film Classification</h4>
          <img src='img/movie_rate/" . $row['restriction'] . ".png' alt='Film Classification'>
        <div>
        <br>
          <h4>Genre</h4>
          <p>" . $row['genre'] . "</p>
        </div>
        </div>
        <div>
          <h4>Director</h4>
          <p>" . $row['director'] . "</p>
        </div>
        <div>
          <h4>Cast</h4>
          <p>" . $row['cast'] . "</p>
        </div>
        <div>
        </div>
        <div>
          <h4>On Screen Date</h4>
          <p>" . $row['showDate'] . "</p>
        </div>
         <br>
         <form action='booking.php' method='POST'>
          <input type='hidden' name='movieInfoID' value='" . $row['ID'] . "'>";

            if (isset($_SESSION['ADULT']) || isset($_SESSION['ADMIN']))
            {
                echo "<input class='btn' type='submit' name='submit' value='Booking'>";
            }
            elseif (isset($_SESSION['JUNIOR']))
            {
                echo "<p>Users under the age of 18 have restrictions in booking ticket(s)!</p>";
            }
            else
            {
                echo "<p>To Book ticket(s) please login or register an account <a href='login.php'>HERE</a>!</p>";
            }
            echo "</form>
              </div>

            <div class='row d-flex justify-content-center'>
           <div class='col-lg-6'>
          <hr><br>
         <div class='video-container'>
       " . $row['trailer'] . "
       </div><br><br>
      </div>
     </div>
    </div>
   </div>
  </div>
  <section>

  ";
}

?>

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
