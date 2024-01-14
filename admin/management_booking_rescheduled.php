<?php
$_SESSION['SES_TITLE'] = "Management ";
include_once "library/inc.seslogin.php";
include "header_v2.php";
$_SESSION['SES_PAGE'] = "?page=Management-User";
$id = $_GET['id'];

?>
<div class="app-content content ">
  <?php
  # Tombol cancel
  if (isset($_POST['btnCancel'])) {
    echo "<meta http-equiv='refresh' content='0; url=?page=User'>";
  }
  # Tombol Submit diklik
  if (isset($_POST['btnSubmit'])) {
    # VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
    $pesanError = array();
    if (trim($_POST['txtUsername']) == "") {
      $pesanError[] = "Data <b>User</b> tidak boleh kosong !";
    }
    $dataCode  = $_POST['txtCode'];

    # upload file 
    $file_photo = "photo.png";
    $wmax = 300;
    $hmax = 300;

    if ($_FILES['txtPhoto']['name'] != "") {
      $file_size2   = $_FILES['txtPhoto']['size'];
      echo  $file_tmp2   = $_FILES['txtPhoto']['tmp_name'];
      $file_type2  = $_FILES['txtPhoto']['type'];
      $tmp2 = explode('.', $_FILES['txtPhoto']['name']);
      $file_ext2 = end($tmp2);
      // Valid extension
      $valid_ext = array('png', 'jpeg', 'jpg');
      $file_name   = $dataCode . '.' . $file_ext2;
      // Location
      $location = "../uploads/user/" . $file_name;
      move_uploaded_file($_FILES["txtPhoto"]["tmp_name"], $location);
      // file extension
      $file_extension = pathinfo($location, PATHINFO_EXTENSION);
      $file_extension = strtolower($file_extension);

      // Check extension
      if (in_array($file_extension, $valid_ext)) {

        $file_photo = $file_name;
      } else {
        $pesanError[] = "Invalid file type.";
      }
    }

    # BACA DATA DALAM FORM, masukkan datake variabel
    // $txtCompany    = $_POST['txtCompany'];
    $txtUsergroup  = $_POST['txtAccess'];
    $txtStatus    = 'Active';
    $txtUsername  = $_POST['txtUsername'];
    $txtFullname  = $_POST['txtFullname'];
    $txtPassword  = $_POST['txtPassword'];
    $txtPhoto    = $file_photo;
    $txtEmail    = $_POST['txtEmail'];
    $txtPhone    = $_POST['txtPhone'];
    $txtDivision  = $_POST['txtDivision'];
    $txtDepartment  = $_POST['txtDepartment'];
    $txtUnit     = $_POST['txtUnit'];
    $txtBranch     = $_POST['txtBranch'];
    $txtPosition  = $_POST['txtPosition'];
    $dataAccess  = $_POST['txtAccess'];
    $txtActivationDate  = $_POST['txtActivationDate'];

    $txtPassword = $txtPassword;
    $setpassword = '';
    // validasi jika password kosong, tidak perlu update password
    if ($txtPassword != '') {
      $uppercase = preg_match('@[A-Z]@', $txtPassword);
      $lowercase = preg_match('@[a-z]@', $txtPassword);
      $number    = preg_match('@[0-9]@', $txtPassword);
      if (!$uppercase || !$lowercase || !$number || strlen($txtPassword) <= 6) {
        $pesanError[] = "password harus lebih dari 6 karakter, mengandung huruf BESAR, huruf kecil dan angka";
      }
      $setpassword = ",password = " . "'" . MD5($txtPassword) .  "'";
    }

    // validasi jika file foto kosong, tidak perlu update foto
    $setphoto = '';
    if ($txtPhoto != 'photo.png') {

      $setphoto = ",user_photo = " . "'$txtPhoto'";
    }

    # VALIDASI DATA, jika sudah ada akan ditolak
    // $mySql = "SELECT * FROM master_user WHERE user_id='$dataCode'";
    // $cekQry = mysqli_query($koneksidb, $mySql) or die("Eror Query" . mysqli_error($koneksidb));
    // if (mysqli_num_rows($cekQry) >= 1) {
    //   $pesanError[] = "data ID<b> $dataCode </b> sudah ada, ganti dengan yang lain";
    // }

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
      $mySql    = "UPDATE master_user set user_id = '$dataCode' , username='$txtUsername', user_fullname='$txtFullname',
       user_group = '$txtUsergroup', user_email='$txtEmail', user_status = '$txtStatus'
       , company_id = 'CO-0000001',branch = '$txtBranch', division ='$txtDivision', department = '$txtDepartment'
       , unit= '$txtUnit', position='$txtPosition',updated_by = '$ses_nama',updated_date = now(), user_phone = '$txtPhone', activation_date='$txtActivationDate' $setpassword $setphoto where user_id='$dataCode'";
      $myQry = mysqli_query($koneksidb, $mySql) or die("Error query " . mysqli_error($koneksidb));
      if ($myQry) {
        echo "<meta http-equiv='refresh' content='0; url=?page=Management-User'>";
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
                            <label class="form-label" for="User ID">User ID</label>
                            <input class="form-control" name="txtCode" type="text" value="<?php echo $dataCode; ?>" maxlength="20" required />
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
                            <input class="form-control" placeholder="Phone" name="txtWA" type="text" value="<?php echo $dataWA; ?>" maxlength="100" required />
                          </div>
                        </div>
                        <div class="col-md-3 col-12">
                          <div class="form-group">
                            <label>Email <span class="required">*</span></label>
                            <input class="form-control" placeholder="Email" name="txtEmail" type="text" value="<?php echo $dataEmail; ?>" maxlength="100" required />
                          </div>
                        </div>
                        <div class="col-md-3 col-12">
                          <div class="form-group">
                            <label>Tanggal Booking </label>
                            <input class="form-control" placeholder="YYYY-MM-DD" name="txtTanggal" type="date" value="<?php echo $dataTanggal; ?>" autocomplete="off" />
                          </div>
                        </div>
                        <div class="col-md-3 col-12">
                          <div class="form-group">
                            <label>Jam Booking </label>
                            <input class="form-control" placeholder="MM:DD" name="txtJam" type="time" value="<?php echo $dataJam; ?>" autocomplete="off" />
                          </div>
                        </div>

                      </div>
                      <div class="col-7 my-5">
                        <a type="button" href="?page=Management-Booking" class="btn btn-outline-dark me-2">Kembali</a>
                        <button type="submit" name="btnSubmit" class="btn btn-warning me-3">Re-Schedule</button>
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