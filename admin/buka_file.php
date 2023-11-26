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
      if (!file_exists("index.php")) die("Sorry Empty Page!");
      include "index.php";
      break;

    case 'Login':
      if (!file_exists("login.php")) die("Sorry Empty Page!");
      include "login.php";
      break;

    case 'Logout':
      if (!file_exists("logout.php")) die("Sorry Empty Page!");
      include "logout.php";
      break;

    case 'Login-Validasi':
      if (!file_exists("login_validasi.php")) die("Sorry Empty Page!");
      include "login_validasi.php";
      break;

      #MANAGEMENT

    case 'Management-Booking':
      if (!file_exists("management_booking.php")) die("Sorry Empty Page!");
      include "management_booking.php";
      break;

    case 'Management-History':
      if (!file_exists("management_history.php")) die("Sorry Empty Page!");
      include "management_history.php";
      break;

      #MASTER

    case 'Master-Jadwal':
      if (!file_exists("master_jadwal.php")) die("Sorry Empty Page!");
      include "master_jadwal.php";
      break;

    case 'Master-Kategori':
      if (!file_exists("master_kategori.php")) die("Sorry Empty Page!");
      include "master_kategori.php";
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
