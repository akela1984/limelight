<?php
/* **************************************************************************

                         General navigation (no session)

 **************************************************************************   */

echo "
<nav class='navbar navbar-expand-lg navbar-dark'>
  <div class='logo'>
    <div class='imageInn'>
      <a href='index.php'><img src='img/logo.png' alt='Profile Image'></a>
    </div>
    <div class='hoverImg'>
      <a href='index.php'><img src='img/logo_hover.png' alt='Profile Image'></a>
    </div>
  </div>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
    <ul>
      <li class='list-inline-item'>
        <a class='nav-link text-center' href='index.php'>Home</a>
      </li>
      <li class='list-inline-item'>
        <a class='nav-link text-center' href='whatson.php'>What's on</a>
      </li>
      <li class='list-inline-item'>
        <a class='nav-link text-center' href='contact.php'>Contact</a>
      </li>
      <li class='list-inline-item'>
        <a class='nav-link text-center' href='login.php'>Login / Register</a>
      </li>
    </ul>
  </div>
</nav>

";
 ?>
