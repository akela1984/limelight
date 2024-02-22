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



<body>
  <section>
    <div class="admin_panel">
<?php
if (isset($_SESSION['ADULT']) || isset($_SESSION['ADMIN']) || isset($_SESSION['JUNIOR']))
{
    /* **************************************************************************

                             Admin Information Panel

     **************************************************************************   */

    echo "
  <div class='container'>
  <div class='admin_info_box container' id='admin_info_box'>
    <div class='d-flex justify-content-center'>
      <h4>Admin Panel
      </h4>
    </div>
    <hr>
    <div class='d-flex justify-content-center'>


    <h6>Hello " . $_SESSION['USERNAME'] . "</h6>

    </div>
    <div class='row d-flex justify-content-center'>
      <div class='col-lg-4 d-flex justify-content-center'>
      <p>Today is " . date('l') . ", " . date('d/m/Y') . "</p><br>'
      </div>
      <div class='col-lg-4 d-flex justify-content-center'>
  ";
    // Create connection with MySQL Database
    include 'dbconnection.php';
    $sql1 = "SELECT * FROM limelightcinema_user";
    if ($result_user_count = mysqli_query($con, $sql1))
    {
        $rowcount = mysqli_num_rows($result_user_count);
        echo "<p>The total number of registered users: " . $rowcount . "</p>";
    }

    echo "
    </div>
    <div class='col-lg-4 d-flex justify-content-center'>
    ";
    // Create connection with MySQL Database
    include 'dbconnection.php';
    $sql1 = "SELECT * FROM limelightcinema_film";
    if ($result_user_count = mysqli_query($con, $sql1))
    {
        $rowcount = mysqli_num_rows($result_user_count);
        echo "<p>The total number of available film: " . $rowcount . "</p>";
    }

    echo "
      </div>
      </div>
      <hr>
      </div>


      <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <ul class='nav nav-tabs nav-justified' id='myTab' role='tablist'>
                        <li class='nav-item'>
                            <a class='nav-link active' id='user_database_link' data-toggle='tab' href='#user_database' role='tab' aria-controls='user_database' aria-selected='true'>User Database</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' id='add_new_movie_link' data-toggle='tab' href='#add_new_movie' role='tab' aria-controls='add_new_movie' aria-selected='false'>Add new movie</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' id='edit_delete_movie_link' data-toggle='tab' href='#edit_delete_movie' role='tab' aria-controls='edit_delete_movie' aria-selected='false'>Edit/Delete movie</a>
                        </li>
                    </ul>
                    <div class='tab-content' id='myTabContent'>
                      <hr>

                      <!-- **************************************************************************

                                                       User data tab

                        **************************************************************************-->

                        <div class='tab-pane fade show active text-align form-new' id='user_database' role='tabpanel' aria-labelledby='user_database_link'>
                          <div class='container admin_main_box'>
                            <br>
                            <div class='container_title d-flex justify-content-center'>
                              <h4>User Database
                              </h4>
                            </div>
                            <form class='d-flex justify-content-center' action='admin_panel.php' method='POST'>
                              <div class='table-responsive'>
                                <table class='table-responsive{-sm|-md|-lg|-xl}'>
                                  <thead>
                                    <tr>
                                      <th scope='col'>Email
                                      </th>
                                      <th scope='col'>Name
                                      </th>
                                      <th scope='col'>Password
                                      </th>
                                      <th scope='col'>Date Of Birth
                                      </th>
                                      <th scope='col'>Admin Permission
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody>";

    // Create connection with MySQL Database
    include 'dbconnection.php';
    // Update user info
    if (isset($_POST['user_update']))
    {
        $updateUserQuery = "UPDATE limelightcinema_user SET name='$_POST[name]', email='$_POST[email]', password='$_POST[password]', dob='$_POST[dob]', permission='$_POST[permission]' WHERE ID='$_POST[hidden]'";
        mysqli_query($con, $updateUserQuery);
        $message = "User details has been successfully updated";
        echo "<script type='text/javascript'>alert('$message');</script>";
    };
    // Delete user info
    if (isset($_POST['user_delete']))
    {
        $deleteQuery = "DELETE FROM limelightcinema_user WHERE email='$_POST[email]'";
        mysqli_query($con, $deleteQuery);
        echo "<meta http-equiv='refresh' content='0'>";
    };
    // Add new User
    if (isset($_POST['user_add']))
    {
        $email = $_POST['addemail'];
        $name = $_POST['addname'];
        $password = $_POST['addpassword'];
        $dob = $_POST['add_dob'];
        $permission = $_POST['permission'];
        $sql = mysqli_query($con, "SELECT * FROM limelightcinema_user WHERE email='$email'");
        if (mysqli_num_rows($sql) > 0)
        {
            $message = "This email address already exist in database";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else
        {
            $addQuery = "INSERT INTO limelightcinema_user (email, name, password, dob, permission) VALUES ('$email', '$name', '$password', '$dob', '$permission')";
            mysqli_query($con, $addQuery);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    };
    // List the available User info
    $result = mysqli_query($con, "SELECT * FROM limelightcinema_user");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo "<tr>";
        echo "<td><input class='user_imput_field' type='text' name='email' value='" . $row['email'] . "'</td>";
        echo "<td><input class='user_imput_field' type='text' name='name' value='" . $row['name'] . "'</td>";
        echo "<td><input class='user_imput_field' type='text' name='password' value='" . $row['password'] . "'</td>";
        echo "<td><input class='user_imput_field' type='date' name='dob' value='" . $row['dob'] . "'</td>";
        echo "<td><input class='user_imput_field' type='text' name='permission' value='" . $row['permission'] . "'</td>";
        echo "<td><input type='hidden' name='hidden' value='" . $row['ID'] . "'</td>";
        echo "<td><input class='btn_admin' type='submit' name='user_update' value='Update'</td>";
        echo "<td><input class='btn_admin' onclick='return confirm('Are you sure you want to delete this item')' type='submit' name='user_delete' value='Delete'</td>";
        echo "</tr>";

    }
    mysqli_close($con);
    echo "
        </tbody>
        </table>
        </div>
        </form>
        <br>
        <h6 class='d-flex justify-content-center '>Add New User</h6>
        <div class='col-lg-8 col-md-8 col-sm-8 container d-flex justify-content-center'>
        <div class='col d-flex justify-content-center'>
        <form action='admin_panel.php' method='POST'>
        <div class='form-group user_add_field'>
          <label>Email
          </label>
          <br />
          <input class='user_add_field' type='text' name='addemail' placeholder='Enter email' required='required'><br/>
        </div>
        <div class='form-group user_add_field'>
          <label>Name
          </label>
          <br />
          <input class='user_add_field' type='text' name='addname' placeholder='Enter Name' required='required'><br/>
        </div>
        <div class='form-group user_add_field'>
          <label>Password
          </label>
          <br />
          <input class='user_add_field' type='text' name='addpassword' placeholder='Enter Password' required='required'><br/>
        </div>
          <div class='form-group user_add_field'>
            <label>Date of Birth
            </label>
            <br />
            <input class='user_add_field' type='date' name='add_dob' placeholder='' required='required'><br/>
          </div>
          <div class='form-group user_add_field'>
            <label>Admin Permission
            </label>
            <br />
            <select class='user_add_field' name='permission' required>
              <option disabled selected value> Select option
              </option>
              <option value='yes'>Yes
              </option>
              <option value='no'>No
              </option>
            </select>
          </div>
          <input class='btn_admin' type='submit' name='user_add' value='Add User'>
          <input class='btn_admin' type='reset' name='' value='Reset'>
          <br>
        </form>

        </div>
        </div>
        <hr>

        </div>

        </div>

        <!-- **************************************************************************

                                         Add new movie tab

          **************************************************************************-->

        <div class='tab-pane fade show text-align form-new' id='add_new_movie' role='tabpanel' aria-labelledby='add_new_movie_link'>
        <div class='container admin_main_box'>
        <br>
        <div class='d-flex justify-content-center'>
        <h4>Add new movie
        </h4>
        </div>
        <div class='d-flex justify-content-center'>
        <p>Use correct film information from <a href='https://www.imdb.com/'>IMDB</a> database!</p>
        </div>
        <div class='col-lg-8 col-md-8 col-sm-8 container justify-content-center'>
        <div class='col'>
        <form name='entry' method='POST' enctype='multipart/form-data' action='admin_panel.php'>
        <div class='form-group movie_upload_filed'>
          <label>Movie Title
          </label>
          <br />
          <input class='movie_imput_field' type='text' name='title' placeholder=' Movie Title' required>
        </div>
        <div class='form-group movie_upload_filed'>
          <label>Movie Genre
          </label>
          <br />
          <input class='movie_imput_field' type='text' name='genre' placeholder=' Movie Genre' required>
        </div>
        <div class='form-group movie_upload_filed'>
          <label>Director
          </label>
          <br />
          <input class='movie_imput_field' type='text' name='director' placeholder=' Movie Director' required>
        </div>
        <div class='form-group movie_upload_filed'>
          <label>Movie Cast (Stars)
          </label>
          <br />
          <input class='movie_imput_field' type='text' name='cast' placeholder=' Movie Cast' required>
        </div>
        <div class='form-group movie_upload_filed'>
          <label>Movie Trailer (Use iframe code form <a href='https://www.youtube.com//'>YouTube</a>)
          </label>
          <br />
          <input class='movie_imput_field' type='text' name='trailer' placeholder=' Movie Trailer' required>
        </div>
        <div class='form-group movie_upload_filed'>
          <label>Movie description
          </label>
          <br />
          <textarea class='movie_imput_field' name='description' rows='4' placeholder='Movie description'>
          </textarea>
        </div>
          <div class='form-group movie_upload_filed'>
            <label>Ticket Available
            </label>
            <br />
            <input type='number' name='ticket' placeholder='Ticket number' required>
          </div>
          <div class='form-group movie_upload_filed'>
            <label>On Screen (Date)
            </label>
            <br />
            <input type='date' name='showDate' required>
          </div>
          <div class='form-group movie_upload_filed'>
            <label>Age Restriction
            </label>
            <br />
            <select name='restriction' required>
              <option disabled selected value> Select option
              </option>
              <option value='U'>Universal (U)
              </option>
              <option value='PG'>Parental Guidance (PG)
              </option>
              <option value='12A'>12 Advisory (12A)
              </option>
              <option value='12'>12 (Suitable only for persons of 12 years and over)
              </option>
              <option value='15'>15 (Suitable only for persons of 15 years and over)
              </option>
              <option value='18'>18 (Suitable only for persons of 18 years and over)
              </option>
              <option value='R18'>Restricted 18 (R18)
              </option>
              <option value='AV'>Age-Verification (AV)
              </option>
            </select>
          </div>
          <div class='form-group'>
            <label>Image Upload (max file size accepted 1MB)
            </label>
            <br />
            <input class='form-imput' type='file' name='photo'>
          </div>
          <br>
          <div class='form-group'>
          <input type='submit' name='film_upload' class='btn_admin' value='Upload'>
          <input class='btn_admin' type='reset' name='' value='Reset'>
        </div>
          <br>
          </form>
        ";

    // Create connection with MySQL Database
    include 'dbconnection.php';

    $title = $_POST['title'];
    $pic = $_FILES['photo']['name'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $cast = $_POST['cast'];
    $trailer = $_POST['trailer'];
    $restriction = $_POST['restriction'];
    $description = $_POST['description'];
    $ticket = $_POST['ticket'];
    $showDate = $_POST['showDate'];

    if (isset($_POST['film_upload']))
    {
        if (move_uploaded_file($_FILES['photo']['tmp_name'], "img/movie_img/" . $_FILES['photo']['name']))
        {

            $sql = mysqli_query($con, "SELECT * FROM limelightcinema_film WHERE title='$title'");
            if (mysqli_num_rows($sql) > 0)
            {

                $message = "This Movie already exists in database ";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else
            {
                $insertNewMovie = "INSERT INTO limelightcinema_film (title, img, director, cast, genre, trailer, restriction, description, ticket, showDate) VALUES ('$title', '$pic', '$director', '$cast', '$genre', '$trailer', '$restriction', '$description', '$ticket', '$showDate')";
                $films = mysqli_query($con, $insertNewMovie);

                $message = "New movie succesfully added";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
        else
        {
            $message = "Unsuccessfull to add new movie. Please try again";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

    echo "
        </div>
        <hr>
        </div>
        </div>
        </div>

        <!-- **************************************************************************

                                        Edit/delete movie tab

          **************************************************************************-->

        <div class='tab-pane fade show text-align form-new' id='edit_delete_movie' role='tabpanel' aria-labelledby='edit_delete_movie_link'>
        <div class='container admin_main_box'>
        <br>
        <div class='d-flex justify-content-center'>
        <h4>Edit/Delete movie</h4>
        </div>
        <div class='d-flex justify-content-center'>
        <p>Use correct film information from <a href='https://www.imdb.com/'>IMDB</a> database!</p>
        </div>
        <br>
        <div class='d-flex justify-content-center'>
        <form class='d-flex justify-content-center' action='admin_panel.php' method='POST'>
        ";

    include 'dbconnection.php';
    $sql = "SELECT title FROM limelightcinema_film";
    $result = mysqli_query($con, $sql);
    echo "<select class='movie_select_filed' name='title'>";
    echo "<option disabled selected value> Select option</option>";
    while ($row = mysqli_fetch_array($result))
    {

        echo "<option class='user_imput_field'value='" . $row['title'] . "'>" . $row['title'] . "</option>";
    }
    echo "</select>";

    echo "<input type='submit' class='btn_admin' name='film_select' value='Select'>";
    echo "</form>";
    echo "</div>";

    if (isset($_POST['film_select']))
    {
        $toSelect = $_POST['title'];
        $selected_movie = mysqli_query($con, "SELECT * FROM limelightcinema_film WHERE title='$toSelect'");
        while ($row = mysqli_fetch_array($selected_movie, MYSQLI_ASSOC))
        {
            echo "<div class='col-lg-8 col-md-8 col-sm-8 container justify-content-center'>
  <div class='col'>
    <form name='entry' method='POST' enctype='multipart/form-data' action='admin_panel.php'>
      <div class='form-group movie_upload_filed'>
        <input type='hidden' class='movie_imput_field' type='text' name='hidden' value='" . $row[' ID'] . "'placeholder='Movie ID' required>
				</div>
				<div class='form-group movie_upload_filed'>
					<label>Movie Title</label>
					<br />
					<input class='movie_imput_field' type='text' name='title' value='" . $row['title'] . "'placeholder='Movie Title' required>
					</div>
					<div class='form-group movie_upload_filed'>
						<label>Movie Genre</label>
						<br />
						<input class='movie_imput_field' type='text' name='genre' value='" . $row['genre'] . "'placeholder='Movie Genre' required>
						</div>
						<div class='form-group movie_upload_filed'>
							<label>Movie Director</label>
							<br />
							<input class='movie_imput_field' type='text' name='director' value='" . $row['director'] . "'placeholder='Movie Director' required>
							</div>
							<div class='form-group movie_upload_filed'>
								<label>Movie Cast (Stars)</label>
								<br />
								<input class='movie_imput_field' type='text' name='cast' value='" . $row['cast'] . "'placeholder='Movie Cast (Stars)' required>
								</div>
								<div class='form-group movie_upload_filed'>
									<label>Movie Trailer (Use iframe code form
										<a href='https://www.youtube.com//'>YouTube)</a>
									</label>
									<br />
									<input class='movie_imput_field' type='text' name='trailer' value='" . $row['trailer'] . "'placeholder='Movie Trailer' required>
									</div>
									<div class='form-group movie_upload_filed'>
										<label>Movie description</label>
										<br />
										<input class='movie_imput_field' type='text' name='description' value='" . $row['description'] . "'>
										</div>
										<div class='form-group movie_upload_filed'>
											<label>Ticket Available</label>
											<br />
											<input type='number' name='ticket' value='" . $row['ticket'] . "'placeholder='Ticket number' required>
											</div>
											<div class='form-group movie_upload_filed'>
												<label>On Screen (Date)</label>
												<br />
												<input type='date' value='" . $row['showDate'] . "'name='showDate' required>
												</div>
												<div class='form-group movie_upload_filed'>
													<label>Age Restriction</label>
													<br />
													<select name='restriction' required>
														<option disabled selected value> Select option
                          </option>
														<option value='U'>Universal (U)
                          </option>
														<option value='PG'>Parental Guidance (PG)
                          </option>
														<option value='12A'>12 Advisory (12A)
                          </option>
														<option value='12'>12 (Suitable only for persons of 12 years and over)
                          </option>
														<option value='15'>15 (Suitable only for persons of 15 years and over)
                          </option>
														<option value='18'>18 (Suitable only for persons of 18 years and over)
                          </option>
														<option value='R18'>Restricted 18 (R18)
                          </option>
														<option value='AV'>Age-Verification (AV)
                          </option>
													</select>
												</div>
												<div class='form-group'>
													<label>Image Upload</label>
													<br />
													<input class='form-imput' value='" . $row['img'] . "' type='file' name='photo'>
													</div>
													<br>
														<div class='form-group'>
															<input type='submit' name='film_update' class='btn_admin' value='Update'>
																<input type='submit' name='film_delete' class='btn_admin' value='Delete'>
																</div>
															</form>
														</div>
													</div>
												</tbody>
											</table>
										</div>";
                  };
                    };

                    if (isset($_POST['film_update']))
                    {
                        $updateMovieQuery = "UPDATE limelightcinema_film SET title='$_POST[title]', genre='$_POST[genre]', director='$_POST[director]', cast='$_POST[cast]', trailer='$_POST[trailer]', description='$_POST[description]', ticket='$_POST[ticket]', showDate='$_POST[showDate]' WHERE ID='$_POST[hidden]'";
                        mysqli_query($con, $updateMovieQuery);
                        $message = "Movie details has been successfully updated";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        echo "<meta http-equiv='refresh' content='0'>";
                    };

                    if (isset($_POST['film_delete']))
                    {

                        $deleteQuery = "DELETE FROM limelightcinema_film WHERE title='$_POST[title]'";
                        mysqli_query($con, $deleteQuery);
                        $message = "Movie details has been deleted successfully";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        echo "<meta http-equiv='refresh' content='0'>";
                    };

              echo "</div>
                </div>
              </div>
          </div>
          </div>";
          }
          else
          {
              echo "
            <div class='d-flex justify-content-center'>
            <script src='https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js'></script>
            <lottie-player src='https://assets8.lottiefiles.com/packages/lf20_tyizyjat.json'  background='transparent'  speed='1'  style='width: 200px; height: 200px;'  loop  autoplay></lottie-player>
            </div>
            <div class='d-flex justify-content-center'>
            <h6>To access the Admin Panel please <a href='login.php'>LOGIN</a> with your admin details or go <a href='index.php'>BACK TO HOME PAGE</a>!</h6><br><br>
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


  <!-- <<<<<< SCRIPT TO FIX BOOTSTRAP 5 TAB ISSUE AND FLASHING BULE LINKS >>>>>>> -->
  <script type="text/javascript">
  setTimeout(function(){
  document.querySelector(".nav").classList.add("nav-tabs");
  }, 1000);
  </script>
</body>

</html>
