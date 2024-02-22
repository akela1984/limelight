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


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="css/style.css" rel="stylesheet">
  <script type="text/javascript" src="javascript.js"></script>

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

                                   Carousel

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
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="img/james_bond.webp" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/ghost_busters.webp" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/eternals.webp" alt="Third slide">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <!-- **************************************************************************

                                   Promoted movie card

    **************************************************************************-->

  <section>
    <div class="content_header d-flex justify-content-center">
      <h4>Latest Movies</h4>
    </div>
    <div class="container" id="promoted_movie_cards">
      <div class="row">
          <?php
    // Create connection with MySQL Database
include 'dbconnection.php';
$sql = "SELECT * FROM limelightcinema_film ORDER BY ID DESC LIMIT 3";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result))
{
    echo "<div class='col-lg-4'>
              <div class='card'>
                <div class='card-pic d-flex justify-content-center'>
                  <img src='img/movie_img/" . $row['img'] . "' alt='" . $row['title'] . "'>
                </div>
                <div class='card-body flex-column'>
                  <div class='card-title d-flex justify-content-center'>
                  <h4>" . $row['title'] . "</h4>
                  </div>
                  <div class='card-text'>
                  <hr>
                  <p>" . $row['description'] . "</p>
                  </div>
                  <hr>
                  <div class='d-flex'>
                  <form action='movie_info.php' method='POST'>
                   <input type='hidden' name='movieInfoID' value='" . $row['ID'] . "'>
                   <input class='btn' type='submit' name='submit' value='More info'>
                   </form>";
                if (isset($_SESSION['ADULT']) || isset($_SESSION['ADMIN']))
                {
                    echo "
                   <form action='booking.php' method='POST'>
                    <input type='hidden' name='movieInfoID' value='" . $row['ID'] . "'>
                    <input class='btn' type='submit' name='submit' value='Booking'>";

              };

              echo "</form>
                  </div>
                </div>
              </div>
            </div>";
          }
          ?>
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
                  <a href="index.php"><img src="img/logo.png" alt="Limelight logo"></a>
                </div>
                <div class="hoverImg">
                  <a href="index.php"><img src="img/logo_hover.png" alt="Limelight logo"></a>
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
