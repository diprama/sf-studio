<?php
include "library/inc.connection.php";

// set untuk email 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'library/PHPMailer/src/Exception.php';
require 'library/PHPMailer/src/PHPMailer.php';
require 'library/PHPMailer/src/SMTP.php';


$pesanError = array();
// tanggal sekarang
$tanggalHariIni = date("Y-m-d");
// set nama hari



// ngecek apakah ada email yang harus di kirim atau tidak 
$mySql   = "SELECT * FROM booking where alert_notification = 0 and status ='Dikonfirmasi' and tanggal >= '$tanggalHariIni' order by tanggal desc";
$myQry   = mysqli_query($koneksidb, $mySql)  or die("ERROR BOOKING:  " . mysqli_error($koneksidb));
$nomor  = 0;
$JumlahData = mysqli_num_rows($myQry);
// kalau data lebih dari satu, langsung sikat kirim email
while ($myData = mysqli_fetch_array($myQry)) {

  # Baca variabel form
  $txtTanggal   = $myData['tanggal'];
  // ganti format tanggal
  $txtWaktu = $myData['jam'];
  // Waktu sekarang
  $waktuSekarang = date("H:i");
  $waktuSekarang = date("H:i:s", strtotime("7 hours", strtotime($waktuSekarang)));

  //  echo "<br>";
  // Jam yang sudah ditentukan (misalnya, "13:30:00")
  // $jamTentukan = $txtWaktu . ':00';
  // Menghitung waktu lima menit sebelumnya
  $waktuLimaMenitSebelum = date("H:i:s", strtotime("-5 minutes", strtotime($txtWaktu)));

  // Pengecekan kondisi
  if ($waktuSekarang <= $waktuLimaMenitSebelum) {
    // Jika waktu setengah jam sebelumnya kurang dari waktu yang sudah di set customer
    $no_id = $myData['id'];
    $txtJenis = $myData['jenis'];
    $txtPaket = $myData['paket'];
    $txtBackground = $myData['background'];
    $txtNama = $myData['nama'];
    $txtEmail = $myData['email'];
    $txtWhatsapp = $myData['no_wa'];
    $txtInstagram = isset($myData['instagram']) ? $myData['instagram'] : '';
    $txtStatus = 'Dibuat';


    function hari_ini()
    {
      $txtTanggal   = date("Y-m-d");

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

    // template email customer

    function template_email_customer()
    { ?>
      <html>
      <!-- #A3D0F8 -->

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <style>
        p {
          font-size: 12px;
          font-family: sans-serif;
          padding-top: 5px;
          line-height: 0.5;
        }



        /* .slide2 {
  height: 100%;
  display: flex;
  align-items: center;
} */
      </style>

      <body style="color: #000; font-size: 12px; text-decoration: none; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #efefef;">

        <div id="wrapper" style="max-width: 600px; margin: auto auto; padding: 20px;">


          <div id="content" style="font-size: 16px; padding: 25px; background-color: #fff;
				moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px; -khtml-border-radius: 10px;
				border-color: #A3D0F8; border-width: 4px 1px; border-style: solid;">

            <p class="stylefont">
              <b>{NAME}</b> Booking pada tanggal <b>{DATE}</b> hari <b>{HARI}</b> jam <b>{TIME}</b>
              <hr />
              <br>
              Test Kirim Notifikasi 30 menit sebelum jam booking

              <b>Formulir Booking</b>
              <br>

              {FORMFIELDS}

            </p>



            <!-- <p style="justify-content: center; margin-top: 10px;">
				<center>
					<a href="{URLTIKETV}" target="_blank" style="border: 1px solid #0561B3; background-color: #238CEA; 
					color: #fff; text-decoration: none; font-size: 18px; padding: 10px 20px;">Closed Your Ticket</a>
				</center>
			</p> -->






          </div>


          <!-- <div id="footer" style=" padding: 0px 8px; text-align: center; border-radius: 10px; background-color: #143052;">
			<div class='form-inline'>
				<div class="slide2" style="padding-top:10px; padding-bottom: 10px;">

				</div>
			</div>


			<center>
				<h3 style="margin: 0px; color: #fff;">
					NEX ERP
				</h3>
			</center <center>
			<h4 style="margin: 0px; color: #fff;">
				Cyber2 Tower 2nd Floor, JL .HR Rasuna Said X5 No.13, RT.7/RW.2, Kuningan, East Kuningan, South Jakarta City, Jakarta 12950
			</h4>
			</center>
			<br>
			<br>
		</div> -->


      </body>


      </html>
<?php }



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
      $template_file = "email_customer_30min.php";
      // cek template nya ready atau tidak
      // if (file_exists($template_file))
      $email_message = template_email_customer();
      // else
      // die("Unable to locate your template file");

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
        if (
          strlen($key) > 2 && trim($swap_var[$key]) != ''
        )
          $email_message = str_replace(
            $key,
            $swap_var[$key],
            $email_message
          );
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
      // $mail2->addAddress('sf.selfstudio@gmail.com'); // Ganti dengan alamat email tujuan
      $mail2->addAddress('dickypramanasukma@gmail.com'); // Ganti dengan alamat email tujuan



      // set lokasi template email
      $template_file = "email_admin_30min.php";
      // cek template nya ready atau tidak
      // if (file_exists($template_file))
      $email_message = "test oke";

      // else
      // die("Unable to locate your template file");

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
        if (
          strlen($key) > 2 && trim($swap_var[$key]) != ''
        )
          $email_message = str_replace(
            $key,
            $swap_var[$key],
            $email_message
          );
      }



      // Set informasi email
      $mail2->isHTML(true);
      $mail2->MsgHTML($email_message);
      $mail2->Subject = $txtNama . ' booking';

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
    if (
      count($pesanError) >= 1
    ) {

      echo "<div class='panel-body'><div class='alert alert-warning' align='center'>";
      $noPesan = 0;
      foreach ($pesanError as $indeks => $pesan_tampil) {
        $noPesan++;
        echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";
      }
      echo "</div>";

      exit;
    } else {
      # INSERT KE DATABASE BOOKING

      // $mySql = "UPDATE `booking` SET `alert_notification`='1',`alert_date`=now() WHERE id ='$no_id' ";
      // $myQry = mysqli_query($koneksidb, $mySql) or die("Query Insert Salah : " . mysqli_error($koneksidb));

      // ambil id nya
      $last_id = mysqli_insert_id($koneksidb);
      # Validasi Insert Sukses
      echo "Alert Sukses Terkirim";
    }
  }
}
