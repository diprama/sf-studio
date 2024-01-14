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

    case 'Test-Management-Booking':
      if (!file_exists("test_management_booking.php")) die("Sorry Empty Page!");
      include "test_management_booking.php";
      break;

    case 'Management-Booking-Update':
      if (!file_exists("management_booking_update.php")) die("Sorry Empty Page!");
      include "management_booking_update.php";
      break;

    case 'Management-Booking-Rescheduled':
      if (!file_exists("management_booking_rescheduled.php")) die("Sorry Empty Page!");
      include "management_booking_rescheduled.php";
      break;

    case 'Management-Booking-Delete':
      if (!file_exists("management_booking_delete.php")) die("Sorry Empty Page!");
      include "management_booking_delete.php";
      break;

    case 'Panggil-Data':
      if (!file_exists("app-assets/data/data_booking.php")) die("Sorry Empty Page!");
      include "app-assets/data/data_booking.php";
      break;
      

    case 'Management-History':
      if (!file_exists("management_history.php")) die("Sorry Empty Page!");
      include "management_history.php";
      break;

    case 'Management-Admin':
      if (!file_exists("management_admin.php")) die("Sorry Empty Page!");
      include "management_admin.php";
      break;

      #MASTER

    case 'Master-Jadwal':
      if (!file_exists("master_jadwal.php")) die("Sorry Empty Page!");
      include "master_jadwal.php";
      break;

    case 'Master-Jadwal-Update-Status':
      if (!file_exists("master_jadwal_update_status.php")) die("Sorry Empty Page!");
      include "master_jadwal_update_status.php";
      break;

    case 'Master-Jadwal-Add':
      if (!file_exists("master_jadwal_add.php")) die("Sorry Empty Page!");
      include "master_jadwal_add.php";
      break;

    case 'Master-Jadwal-Edit':
      if (!file_exists("master_jadwal_edit.php")) die("Sorry Empty Page!");
      include "master_jadwal_edit.php";
      break;

    case 'Master-Jadwal-Delete':
      if (!file_exists("master_jadwal_delete.php")) die("Sorry Empty Page!");
      include "master_jadwal_delete.php";
      break;

      # MASTER JENIS

    case 'Master-Jenis':
      if (!file_exists("master_jenis.php")) die("Sorry Empty Page!");
      include "master_jenis.php";
      break;

    case 'Master-Jenis-Add':
      if (!file_exists("master_jenis_add.php")) die("Sorry Empty Page!");
      include "master_jenis_add.php";
      break;

    case 'Master-Jenis-Edit':
      if (!file_exists("master_jenis_edit.php")) die("Sorry Empty Page!");
      include "master_jenis_edit.php";
      break;

    case 'Master-Jenis-Delete':
      if (!file_exists("master_jenis_delete.php")) die("Sorry Empty Page!");
      include "master_jenis_delete.php";
      break;

      # MASTER PAKET

    case 'Master-Paket':
      if (!file_exists("master_paket.php")) die("Sorry Empty Page!");
      include "master_paket.php";
      break;

    case 'Master-Paket-Add':
      if (!file_exists("master_paket_add.php")) die("Sorry Empty Page!");
      include "master_paket_add.php";
      break;

    case 'Master-Paket-Edit':
      if (!file_exists("master_paket_edit.php")) die("Sorry Empty Page!");
      include "master_paket_edit.php";
      break;

    case 'Master-Paket-Delete':
      if (!file_exists("master_paket_delete.php")) die("Sorry Empty Page!");
      include "master_paket_delete.php";
      break;

      # MASTER BACKGROUND

    case 'Master-Background':
      if (!file_exists("master_background.php")) die("Sorry Empty Page!");
      include "master_background.php";
      break;

    case 'Master-Background-Add':
      if (!file_exists("master_background_add.php")) die("Sorry Empty Page!");
      include "master_background_add.php";
      break;

    case 'Master-Background-Edit':
      if (!file_exists("master_background_edit.php")) die("Sorry Empty Page!");
      include "master_background_edit.php";
      break;

    case 'Master-Background-Delete':
      if (!file_exists("master_background_delete.php")) die("Sorry Empty Page!");
      include "master_background_delete.php";
      break;



      # Master 
    case 'Master-Kategori':
      if (!file_exists("master_kategori.php")) die("Sorry Empty Page!");
      include "master_kategori.php";
      break;

      #VALIDASI


    case 'Validasi':
      if (!file_exists("validasi.php")) die("Sorry Empty Page!");
      include "validasi.php";
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
