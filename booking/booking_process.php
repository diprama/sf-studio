<?php
include "library/inc.connection.php";

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
   $txtWaktu = $_POST['txtWaktu'];
  $txtJenis = $_POST['txtJenis'];
  $txtPaket = $_POST['txtPaket'];
  $txtBackground = $_POST['txtBackground'];
  $txtNama = $_POST['txtNama'];
  $txtEmail = $_POST['txtEmail'];
  $txtWhatsapp = $_POST['txtWhatsapp'];
  $txtInstagram = isset($_POST['txtInstagram']) ? $_POST['txtInstagram']:'';
  $txtStatus = 'Dibuat';


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
      ('$txtNama','$txtEmail','$txtWhatsapp','$txtJenis','$txtPaket','$txtBackground','$txtInstagram','$txtTanggal','$txtJam','$txtStatus') ";
    $myQry = mysqli_query($koneksidb, $mySql) or die("Query Insert Salah : " . mysqli_error($koneksidb));
    $myData = mysqli_fetch_array($myQry);

   # Validasi Insert Sukses
    if ($myData) {
      echo "<meta http-equiv='refresh' content='0; url=?page=Booking-Success'>";
    }
    else {
      echo "Query Gagal";
    }
 
  }
} // End POST
