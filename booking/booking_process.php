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
  $originalDate = $txtTanggal;
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

  function hari_ini()
  {
    $txtTanggal = $_POST['txtTanggal'];
    $hari = date("D", strtotime($txtTanggal));

    switch ($hari) {
      case 'Sun':
        $hari_ini = "Minggu";
        break;

      case 'Mon':
        $hari_ini = "Senin";
        break;

      case 'Tue':
        $hari_ini = "Selasa";
        break;

      case 'Wed':
        $hari_ini = "Rabu";
        break;

      case 'Thu':
        $hari_ini = "Kamis";
        break;

      case 'Fri':
        $hari_ini = "Jumat";
        break;

      case 'Sat':
        $hari_ini = "Sabtu";
        break;

      default:
        $hari_ini = "Tidak di ketahui";
        break;
    }

    return "<b>" . $hari_ini . "</b>";
  }

  $hari_ini = hari_ini();


  // Kirim email customer
  // Inisialisasi PHPMailer
  $mail = new PHPMailer(true);

  try {
    // Set pengaturan SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com'; // Ganti dengan alamat SMTP server Anda
    $mail->SMTPAuth = true;
    $mail->Username = 'official@sf-selfstudio.com'; // Ganti dengan username SMTP Anda
    $mail->Password = 'SELFstudio123!'; // Ganti dengan password SMTP Anda
    $mail->SMTPSecure = 'TLS';
    $mail->Port = 587;

    // Set informasi pengirim dan penerima
    $mail->setFrom('official@sf-selfstudio.com', 'Self Studio');
    $mail->addAddress($txtEmail); // Ganti dengan alamat email tujuan


    // set lokasi template email
      $template_file = "email_customer.php";
    // cek template nya ready atau tidak
    if (file_exists($template_file))
      $email_message = file_get_contents($template_file);
    else
    die("Unable to locate your template file");

    $formfields = "Nama: $txtNama <br>
Pilihan Paket: $txtPaket <br>
Alamat Email: $txtEmail <br>
No WhatsApp: $txtWhatsapp <br>
Background: $txtBackground <br>
Username Instagram: $txtInstagram <br>
Appointment Type: $txtJenis <br>"; 

    // set variable 
    $swap_var = array(
      "{SITE_ADDR}" => "https://www.heytuts.com",
      "{EMAIL_LOGO}" => "uploads/NEX.png",
      "{EMAIL_TITLE}" => "Notification",
      "{CUSTOM_URL}" => "https://www.heytuts.com/web-dev/php/send-emails-with-php-from-localhost-with-sendmail",
      "{CUSTOM_IMG}" => "https://i1.wp.com/www.heytuts.com/wp-content/uploads/2019/05/thumbnail_Send-emails-with-php-from-localhost-with-SendMail.png",
      "{NAME}" => 'Hi ' . $txtNama,
      "{DATE}" =>  $txtTanggal,
      "{TIME}" =>  $txtWaktu,
      "{FORMFIELDS}" => $formfields
    );

    // ngecek variable dan timpah dengan variable yang di cek , seperti SITE_ADDR, {NAME}, {lOGO}, {CUSTOM_URL} etc
    foreach (array_keys($swap_var) as $key) {
      if (strlen($key) > 2 && trim($swap_var[$key]) != '')
      $email_message = str_replace($key, $swap_var[$key], $email_message);
    }



    // Set informasi email
    $mail->isHTML(true);
    $mail->MsgHTML($email_message);
    $mail->Subject = 'SF Self Photo Studio Booking';

    // Kirim email
    $mail->send();
    // echo "Email berhasil dikirim";
  } catch (Exception $e) {
    echo "Gagal mengirim email: {$mail->ErrorInfo}";
  }

  // end kirim email customer


  // Kirim email customer
  // Inisialisasi PHPMailer
  $mail2 = new PHPMailer(true);

  try {
    // Set pengaturan SMTP
    $mail2->isSMTP();
    $mail2->Host = 'smtp.hostinger.com'; // Ganti dengan alamat SMTP server Anda
    $mail2->SMTPAuth = true;
    $mail2->Username = 'official@sf-selfstudio.com'; // Ganti dengan username SMTP Anda
    $mail2->Password = 'SELFstudio123!'; // Ganti dengan password SMTP Anda
    $mail2->SMTPSecure = 'TLS';
    $mail2->Port = 587;

    // Set informasi pengirim dan penerima
    $mail2->setFrom('official@sf-selfstudio.com', 'Self Studio');
    $mail2->addAddress('sf.selfstudio@gmail.com'); // Ganti dengan alamat email tujuan
    // $mail2->addAddress('dickypramanasukma@gmail.com'); // Ganti dengan alamat email tujuan



    // set lokasi template email
    $template_file = "email_admin.php";
    // cek template nya ready atau tidak
    if (file_exists($template_file))
    $email_message = file_get_contents($template_file);
    else
    die("Unable to locate your template file");

    $formfields = "Nama: $txtNama <br>
Pilihan Paket: $txtPaket <br>
Alamat Email: $txtEmail <br>
No WhatsApp: $txtWhatsapp <br>
Background: $txtBackground <br>
Username Instagram: $txtInstagram <br>
Appointment Type: $txtJenis <br>";

    // set variable 
    $swap_var = array(
      "{SITE_ADDR}" => "https://www.heytuts.com",
      "{EMAIL_LOGO}" => "uploads/NEX.png",
      "{EMAIL_TITLE}" => "Notification",
      "{CUSTOM_URL}" => "https://www.heytuts.com/web-dev/php/send-emails-with-php-from-localhost-with-sendmail",
      "{CUSTOM_IMG}" => "https://i1.wp.com/www.heytuts.com/wp-content/uploads/2019/05/thumbnail_Send-emails-with-php-from-localhost-with-SendMail.png",
      "{NAME}" => 'Hi ' . $txtNama,
      "{DATE}" =>  $txtTanggal,
      "{TIME}" =>  $txtWaktu,
      "{HARI}" =>  $hari_ini,
      "{FORMFIELDS}" => $formfields
    );

    // ngecek variable dan timpah dengan variable yang di cek , seperti SITE_ADDR, {NAME}, {lOGO}, {CUSTOM_URL} etc
    foreach (array_keys($swap_var) as $key) {
      if (strlen($key) > 2 && trim($swap_var[$key]) != '')
      $email_message = str_replace($key, $swap_var[$key], $email_message);
    }



    // Set informasi email
    $mail2->isHTML(true);
    $mail2->MsgHTML($email_message);
    $mail2->Subject = $txtNama.' booking';

    // Kirim email
    $mail2->send();
    // echo "Email berhasil dikirim";
  } catch (Exception $e) {
    echo "Gagal mengirim email: {$mail2->ErrorInfo}";
  }

  // end kirim email customer



  

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

      $mySql = "INSERT INTO `booking`( `nama`, `email`, `no_wa`, `jenis`, `paket`, `background`, `instagram`, `tanggal`, `jam`, `status`, `updated_date`) VALUES 
      ('$txtNama','$txtEmail','$txtWhatsapp','$txtJenis','$txtPaket','$txtBackground','$txtInstagram','$txtTanggal','$txtWaktu','$txtStatus', now()) ";
    $myQry = mysqli_query($koneksidb, $mySql) or die("Query Insert Salah : " . mysqli_error($koneksidb));

    // ambil id nya
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
