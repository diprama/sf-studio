<?php

// include "main_maintenance.php";
// exit;


# KONTROL MENU PROGRAM
if ($_GET) {
  // Jika mendapatkan variabel URL ?page
  switch ($_GET['page']) {
    case '':
      if (!file_exists("login.php")) die("Empty Main Page!");
      include "login.php";
      break;

    case 'Main':
      if (!file_exists("main.php")) die("Sorry Empty Page!");
      include "main.php";
      break;

    case 'Login':
      if (!file_exists("login.php")) die("Sorry Empty Page!");
      include "login.php";
      break;







    default:
      if (isset($_SESSION['SES_ADMIN'])) {
        if (!file_exists("main.php")) die("Sorry Empty Page!");
        include "main.php";
        break;
      }
      if (isset($_SESSION['SES_USER'])) {
        if (!file_exists("main_user.php")) die("Sorry Empty Page!");
        include "main_user.php";
        break;
      }
      break;
  }
} else {
  // Jika tidak mendapatkan variabel URL : ?page
  if (!file_exists("login.php")) die("Empty Main Page! Under Development");
  include "login.php";
}
