<?php

// include "main_maintenance.php";
// exit;
# KONTROL MENU PROGRAM
if ($_GET) {
  // Jika mendapatkan variabel URL ?page
  switch ($_GET['page']) {
    case '':
      if (!file_exists("form-booking.php")) die("Empty Main Page!");
      include "form-booking.php";
      break;

    case 'Booking':
      if (!file_exists("form-booking.php")) die("Empty Main Page!");
      include "form-booking.php";
      break;

    case 'Main':
      if (!file_exists("index.php")) die("Sorry Empty Page!");
      include "index.php";
      break;

    case 'Greeting':
      if (!file_exists("greeting.php")) die("Sorry Empty Page!");
      include "greeting.php";
      break;

    case 'Booking-Process':
      if (!file_exists("booking_process.php")) die("Sorry Empty Page!");
      include "booking_process.php";
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
  if (!file_exists("form-booking.php")) die("Empty Main Page! Under Development");
  include "form-booking.php";
}
