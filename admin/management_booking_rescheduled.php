<?php
$_SESSION['SES_TITLE'] = "Re-Schedule Booking";
include_once "library/inc.seslogin.php";
include "header_v2.php";
$_SESSION['SES_PAGE'] = "?page=Management-Booking-Rescheduled";
$id = $_GET['id'];

?>
<div class="app-content content ">
  <?php

  # Tombol Submit diklik
  if (isset($_POST['btnSubmit'])) {
    # VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
    $pesanError = array();
    $dataCode  = $_POST['txtCode'];
    $dataTanggal  = $_POST['txtTanggal'];
    $dataJam  = $_POST['txtJam'];

    # JIKA ADA PESAN ERROR DARI VALIDASI
    if (count($pesanError) >= 1) {
      echo "&nbsp;<div class='alert alert-warning'>";
      $noPesan = 0;
      foreach ($pesanError as $indeks => $pesan_tampil) {
        $noPesan++;
        echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";
      }
      echo "</div>";
    } else {
      # SIMPAN DATA KE DATABASE. 
      // Jika tidak menemukan error, simpan data ke database

      $ses_nama  = $_SESSION['SES_NAMA'];
      $mySql    = "UPDATE booking set tanggal ='$dataTanggal', jam ='$dataJam' where id='$dataCode'";
      $myQry = mysqli_query($koneksidb, $mySql) or die("Error query " . mysqli_error($koneksidb));
      if ($myQry) {
        echo "<meta http-equiv='refresh' content='0; url=?page=Management-Booking&s=success'>";
      }
      exit;
    }
  } // Penutup Tombol Submit

  # MASUKKAN DATA KE VARIABEL
  # TAMPILKAN DATA DARI DATABASE, Untuk ditampilkan kembali ke form edit
  $Code  = isset($_GET['id']) ?  $_GET['id'] : $_POST['txtCode'];
  $mySql  = "SELECT * FROM booking WHERE id='$Code'";
  $myQry  = mysqli_query($koneksidb, $mySql)  or die("Query ambil data salah : " . mysqli_error());
  $myData = mysqli_fetch_array($myQry);
  # MASUKKAN DATA KE VARIABEL
  $dataCode    = $myData['id'];
  $dataNama    = $myData['nama'];
  $dataEmail    = $myData['email'];
  $dataWA    = $myData['no_wa'];
  $dataTanggal    = $myData['tanggal'];
  $dataJam    = $myData['jam'];
  ?>
  <!-- BEGIN: Content-->
  <div class="content-overlay">
  </div>
  <div class="header-navbar-shadow">
  </div>
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Booking</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Re-Schedule</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="content-body">
      <div class="row">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self" enctype="multipart/form-data">
          <div class="col-12">
            <div class="card">
              <div class="card-header border-bottom">
                <div class="content-header-right col-md-12 col-12 d-md-block d-none">

                  <div class="row">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3 col-12">
                          <div class="mb-1">
                            <label class="form-label" for="User ID">Booking ID</label>
                            <input class="form-control" name="txtCode" type="text" value="<?php echo $dataCode; ?>" maxlength="20" required readonly />
                          </div>
                        </div>
                        <div class="col-md-3 col-12">
                          <div class="form-group">
                            <label>Nama <span class="required">*</span></label>
                            <input class="form-control" placeholder="Name" name="txtNama" type="text" value="<?php echo $dataNama; ?>" maxlength="100" required readonly />
                          </div>
                        </div>
                        <div class="col-md-3 col-12">
                          <div class="form-group">
                            <label>No Whatsapp <span class="required">*</span></label>
                            <input class="form-control" placeholder="Phone" name="txtWA" type="text" value="<?php echo $dataWA; ?>" maxlength="100" required readonly />
                          </div>
                        </div>
                        <div class="col-md-3 col-12">
                          <div class="form-group">
                            <label>Email <span class="required">*</span></label>
                            <input class="form-control" placeholder="Email" name="txtEmail" type="text" value="<?php echo $dataEmail; ?>" maxlength="100" required readonly />
                          </div>
                        </div>
                        <div class="col-md-3 col-12">
                          <div class="form-group">
                            <label>Tanggal Booking </label>
                            <input class="form-control" placeholder="YYYY-MM-DD" name="txtTanggal" type="date" value="<?php echo $dataTanggal; ?>" autocomplete="off" required />
                          </div>
                        </div>
                        <div class="col-md-3 col-12">
                          <div class="form-group">
                            <label>Jam Booking </label>
                            <input class="form-control" placeholder="MM:DD" name="txtJam" type="time" value="<?php echo $dataJam; ?>" autocomplete="off" required />
                          </div>
                        </div>

                      </div>
                      <div class="col-7 my-5">
                        <a type="button" href="?page=Management-Booking" class="btn btn-warning me-2">Kembali</a>
                        <button type="submit" name="btnSubmit" class="btn btn-success me-3">Re-Schedule</button>
                      </div>
                    </div>
                  </div>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- END: Content-->

<?php
include "footer_v2.php";
?>