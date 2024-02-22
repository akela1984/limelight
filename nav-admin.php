<?php

/* **************************************************************************

                         Admin session navbar

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
      <li class='list-inline-item dropdown'>
        <a class='nav-link text-center' dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          Hello ". $_SESSION["USERNAME"] ."  <i class='fa fa-angle-down'></i>
        </a>
        <div class='dropdown-menu text-center' aria-labelledby='navbarDropdown'>
        <a class='dropdown-item nav-link text-center' href='my_tickets.php'>My Tickets</a>
        <a class='dropdown-item nav-link text-center' href='my_account.php'>My Account</a>
          <a class='dropdown-item nav-link text-center' href='admin_panel.php'>Admin Panel</a>
          <a class='dropdown-item nav-link text-center' href='logout.php'>Logout</a>
      </li>
    </ul>
  </div>
</nav>";
 ?>
