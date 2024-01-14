<?php
include_once "library/inc.seslogin.php";
include "header_v2.php";
$_SESSION['SES_PAGE'] = "?page=Management-Booking";
?>
<div class="right_col" role="main">

  <?php
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

  # Tombol Submit diklik
  if (isset($_POST['btnSubmit'])) {
    # VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
    $pesanError = array();
    if (trim($_POST['txtUsername']) == "") {
      $pesanError[] = "Data <b>User</b> tidak boleh kosong !";
    }

    # upload file 
    $file_photo = $dataPhoto;
    $wmax = 300;
    $hmax = 300;

    //if (isset($_FILES['txtPhoto']['name'])){
    if ($_FILES['txtPhoto']['name'] != "") {
      $file_size   = $_FILES['txtPhoto']['size'];
      $file_tmp   = $_FILES['txtPhoto']['tmp_name'];
      $file_type  = $_FILES['txtPhoto']['type'];
      $file_ext  = strtolower(end(explode('.', $_FILES['txtPhoto']['name'])));
      $file_name   = $_POST['txtCode'] . "." . $file_ext;
      $file_photo = $file_name;
      $expensions = array("jpeg", "jpg", "png", "gif");
      if (in_array($file_ext, $expensions) === false) {
        $pesanError[] = "File hanya bisa format JPEG, GIF atau PNG";
      }
      if ($file_size > 2097152) {
        $pesanError[] = 'Ukuran file maksimum 2 MB';
      }
      if (empty($pesanError) == true) {

        $target_file = "../uploads/user/" . $file_name;
        move_uploaded_file($_FILES["txtPhoto"]["tmp_name"], $target_file);
      }
    }

    # BACA DATA DALAM FORM, masukkan datake variabel
    $txtCompany    = $_POST['txtCompany'];
    $txtUsergroup  = $_POST['txtUsergroup'];
    $txtStatus    = $_POST['txtStatus'];
    $txtUsername  = $_POST['txtUsername'];
    $txtFullname  = $_POST['txtFullname'];
    $txtPassword  = $_POST['txtPassword'];
    $txtPassLama  = $_POST['txtPassLama'];
    //$txtPhoto		= $file_photo;
    $txtEmail    = $_POST['txtEmail'];
    $txtPhone    = $_POST['txtPhone'];
    $txtDivision  = $_POST['txtDivision'];
    $txtDepartment  = $_POST['txtDepartment'];
    $txtUnit     = $_POST['txtUnit'];
    $txtBranch     = $_POST['txtBranch'];
    $txtPosition  = $_POST['txtPosition'];

    # VALIDASI USER LOGIN (USERNAME), jika sudah ada akan ditolak
    //$mySql="SELECT * FROM master_user WHERE user_name='$txtUsername' AND NOT(user_name='".$_POST['txtUsernameLm']."')";
    //$cekQry=mysqli_query($koneksidb,$mySql) or die ("Eror Query".mysqli_error()); 
    //if(mysqli_num_rows($cekQry)>=1){
    //	$pesanError[] = "USERNAME<b> $txtUsername </b> sudah ada, ganti dengan yang lain";
    //}

    # Cek Password baru
    if (trim($txtPassword) == "") {
      $sqlPasword = ", password='$txtPassLama'";
    } else {
      $sqlPasword = ",  password ='" . md5($txtPassword) . "'";
      if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $txtPassword)) {
      } else {
        $pesanError[] = "Data <b>Password</b> minimal 8 karakter, ada huruf besar, huruf dan angka !";
      }
    }

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
      $kodeBaru  = $_POST['txtCode'];
      $ses_nama  = $_SESSION['SES_NAMA'];
      $mySql    = "UPDATE master_user SET branch='$txtBranch', division='$txtDivision',department='$txtDepartment',unit='$txtUnit',
						position='$txtPosition',username ='$txtUsername', user_fullname='$txtFullname', user_group='$txtUsergroup', user_email='$txtEmail', 
						user_photo='$file_photo', user_status='$txtStatus', company_id='$txtCompany',updated_by='$ses_nama'  , updated_date=now(),
						user_phone='$txtPhone' 
					    $sqlPasword 
						WHERE user_id = '$kodeBaru'";
      $myQry = mysqli_query($koneksidb, $mySql) or die("Error query " . mysqli_error());
      if ($myQry) {
        echo "<meta http-equiv='refresh' content='0; url=?page=User'>";
      }
      exit;
    }
  } // Penutup Tombol Submit




  ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self" enctype="multipart/form-data">
    <div class="page-title">
      <!-- page-title -->
      <div class="title_left">
        <h3>User</h3>
      </div>
      <div class="title_right">
        <div class="form-group pull-right top_search">

        </div>
      </div>
    </div><!-- /page-title -->
    <div class="clearfix"></div>

    <div class="row">
      <!-- row -->
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <!-- x_panel -->

          <div class="x_title">
            <!-- x_title -->
            <h2>Edit Data</h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="<?php echo $_SESSION['SES_PAGE']; ?>" class="btn btn-default btn-sm" role="button"><i class="fa fa-chevron-circle-left fa-fw"></i> Back</a>
            </ul>
            <div class="clearfix"></div>
          </div><!-- /x_title -->

          <div class="x_content ">
            <!-- x_content -->
            <br />
            <div class="col-sm-3">
              <div class="form-group">
                <label>ID Booking</label>
                <input class="form-control" name="txtCode" type="text" value="<?php echo $dataCode; ?>" maxlength="20" readonly />
              </div>

            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Nama <span class="required">*</span></label>
                <input class="form-control" placeholder="Name" name="txtNama" type="text" value="<?php echo $dataNama; ?>" maxlength="100" required readonly />
              </div>
              <div class="form-group">
                <label>No Whatsapp <span class="required">*</span></label>
                <input class="form-control" placeholder="Phone" name="txtWA" type="text" value="<?php echo $dataWA; ?>" maxlength="100" required readonly />
              </div>
              <div class="form-group">
                <label>Email <span class="required">*</span></label>
                <input class="form-control" placeholder="Email" name="txtEmail" type="text" value="<?php echo $dataEmail; ?>" maxlength="100" required readonly />
              </div>
              <div class="form-group">
                <label>Tanggal Booking </label>
                <input class="form-control" placeholder="YYYY-MM-DD" name="txtTanggal" type="date" value="<?php echo $dataTanggal; ?>" autocomplete="off" required />
              </div>
              <div class="form-group">
                <label>Jam Booking </label>
                <input class="form-control" placeholder="MM:DD" name="txtJam" type="time" value="<?php echo $dataJam; ?>" autocomplete="off" required />
              </div>


            </div>
            <div class="col-xs-12">
              <div class="ln_solid"></div>
              <div class="col-xs-6" align="left">
                <a href="?page=Management-Booking" class="btn btn-warning btn-sm" role="button"><i class="fa fa-undo fa-fw"></i> Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm" name="btnSubmit"><i class="fa fa-check-square-o fa-fw"></i> Submit</button>
              </div>
            </div>

          </div><!-- /x_content -->

        </div><!-- /x_panel -->
      </div>
    </div><!-- /row -->
</div>
<!-- /page content -->
</form>
<?php
include "footer_v2.php";
?>