<?php
include "library/inc.connection.php";

// set untuk email 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'library/PHPMailer/src/Exception.php';
require 'library/PHPMailer/src/PHPMailer.php';
require 'library/PHPMailer/src/SMTP.php';

if (isset($_POST['btnSubmit'])) {


  $pesanError = array();
  // set validasi
  // if (trim($_POST['txtUser']) == "") {
  //   $pesanError[] = "Data <b> Username </b> tidak boleh kosong !";
  // }
  // if (trim($_POST['txtPassword']) == "") {
  //   $pesanError[] = "Data <b> Password </b> tidak boleh kosong !";
  // }

  # Baca variabel form
  $txtTanggal   = $_POST['txtTanggal'];
  // ganti format tanggal
  $originalDate = "$txtTanggal";
   $txtTanggal = date("Y-m-d", strtotime($originalDate));
   $txtWaktu = $_POST['txtWaktu'];
  $txtJenis = $_POST['txtJenis'];
  $txtPaket = $_POST['txtPaket'];
  $txtBackground = $_POST['txtBackground'];
  $txtNama = $_POST['txtNama'];
  $txtEmail = $_POST['txtEmail'];
  $txtWhatsapp = $_POST['txtWhatsapp'];
  $txtInstagram = isset($_POST['txtInstagram']) ? $_POST['txtInstagram']:'';
  $txtStatus = 'Dibuat';


  // Kirim email



  // // Inisialisasi PHPMailer
  // $mail = new PHPMailer(true);

  // try {
  //   // Set pengaturan SMTP
  //   $mail->isSMTP();
  //   $mail->Host = 'smtp.hostinger.com'; // Ganti dengan alamat SMTP server Anda
  //   $mail->SMTPAuth = true;
  //   $mail->Username = 'official@sf-selfstudio.com'; // Ganti dengan username SMTP Anda
  //   $mail->Password = 'SELFstudio123!'; // Ganti dengan password SMTP Anda
  //   $mail->SMTPSecure = 'SSL';
  //   $mail->Port = 465;

  //   // Set informasi pengirim dan penerima
  //   $mail->setFrom('official@sf-selfstudio.com', 'Admin');
  //   $mail->addAddress($txtEmail); // Ganti dengan alamat email tujuan

  //   // Set informasi email
  //   $mail->isHTML(true);
  //   $mail->Subject = 'Test';
  //   $mail->Body = 'Test';

  //   // Kirim email
  //   $mail->send();
  //   echo "Email berhasil dikirim";
  // } catch (Exception $e) {
  //   echo "Gagal mengirim email: {$mail->ErrorInfo}";
  // }


  # Baca IP Address
  $ip = $_SERVER['REMOTE_ADDR'];

  #$cmbLevel	=$_POST['cmbLevel'];

  # JIKA ADA PESAN ERROR DARI VALIDASI
  if (count($pesanError) >= 1) {

    echo "<div class='panel-body'><div class='alert alert-warning' align='center'>";
    $noPesan = 0;
    foreach ($pesanError as $indeks => $pesan_tampil) {
      $noPesan++;
      echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";
    }
    echo "</div>";

    // Tampilkan lagi form login
    echo "<meta http-equiv='refresh' content='0; url=?page=Booking'>";

  } else {
    # INSERT KE DATABASE BOOKING

      $mySql = "INSERT INTO `booking`( `nama`, `email`, `no_wa`, `jenis`, `paket`, `background`, `instagram`, `tanggal`, `jam`, `status`) VALUES 
      ('$txtNama','$txtEmail','$txtWhatsapp','$txtJenis','$txtPaket','$txtBackground','$txtInstagram','$txtTanggal','$txtWaktu','$txtStatus') ";
    $myQry = mysqli_query($koneksidb, $mySql) or die("Query Insert Salah : " . mysqli_error($koneksidb));

     $last_id = mysqli_insert_id($koneksidb);
   # Validasi Insert Sukses
    if ($myQry) {
      echo "<meta http-equiv='refresh' content='0; url=?page=Booking-Success&id=$last_id'>";
    }
    else {
      echo "Query Gagal";
    }
 
  }
} // End POST
