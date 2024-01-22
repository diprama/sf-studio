<?php
include "library/inc.connection.php";


$txtUsername = $_POST['txtUsername'];
$txtPassword = $_POST['txtPassword'];
$txtRole = $_POST['txtRole'];

// Validasi apakah sudah ada di database
$mySql1   = "SELECT username FROM master_user where username ='$txtUsername'";
$myQry1   = mysqli_query($koneksidb, $mySql1)  or die("ERROR BOOKING:  " . mysqli_error($koneksidb));
$myData1 = mysqli_fetch_array($myQry1);
$Jumlahdata = mysqli_num_rows($myQry1);
// jika sudah pernah diinputkan, munculkan notif
if ($Jumlahdata >= 1) {
  echo "<meta http-equiv='refresh' content='0; url=?page=Master-User&s=gagal-user'>";
}

// validasi password 
$uppercase = preg_match('@[A-Z]@', $txtPassword);
$lowercase = preg_match('@[a-z]@', $txtPassword);
$number    = preg_match('@[0-9]@', $txtPassword);
// kalau salah satu tidak memenuhi syarat, munculkan notif
if (!$uppercase || !$lowercase || !$number || strlen($txtPassword) < 8) {
  echo "<meta http-equiv='refresh' content='0; url=?page=Master-User&s=password'>";
}

# ADD KE DATABASE BOOKING
    $mySql   = "INSERT INTO `master_user`( `user_name`,`user_pass`, `user_group`, `updated_date`)
     VALUES ('$txtUsername','$txtPassword','$txtRole', now())";
    $myQry   = mysqli_query($koneksidb, $mySql)  or die("ERROR BOOKING:  " . mysqli_error($koneksidb));
    $nomor  = 0;
   # Validasi Insert Sukses
    if ($myQry) {
      echo "<meta http-equiv='refresh' content='0; url=?page=Master-User&s=tambah'>";
    }
    else {
      echo "Query Gagal";
    }
 
