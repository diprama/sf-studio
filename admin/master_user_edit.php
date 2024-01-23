<?php
$_SESSION['SES_TITLE'] = "Edit User";
include_once "library/inc.seslogin.php";
include "header_v2.php";
$_SESSION['SES_PAGE'] = "?page=Master-User-Edit";
$id = $_GET['id'];

?>
<div class="app-content content ">
  <?php

  # Tombol Submit diklik
  if (isset($_POST['btnSubmit'])) {
    # VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
    $pesanError = array();
    $dataUsername  = $_POST['txtUserName'];
    $dataFullName  = $_POST['txtFullName'];
    $dataRole  = $_POST['txtRole'];
    $dataPassword  = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';


    // kalau password tidak kosong, update password
    $sql_password = '';
    if ($dataPassword != '') {
      $dataPassword = MD5($dataPassword);
      $sql_password = ", user_pass = '$dataPassword'";
    }

    # VALIDASI JAM 
    # CEK DATA LAMA APAKAH SUDAH PERNAH ADA NAMA TSB DI DATABASE 

    $mySqlCek  = "SELECT user_name FROM master_user WHERE  user_name ='$dataUsername'";
    $myQryCek  = mysqli_query($koneksidb, $mySqlCek)  or die("Query ambil data salah : " . mysqli_error());
    $JumlahDataCek = mysqli_num_rows($myQryCek);
    if ($JumlahDataCek >= 1) {
      $pesanError[] = "data tersebut sudah diset sebelumnya";
    }

    # JIKA ADA PESAN ERROR DARI VALIDASI
    if (count($pesanError) >= 1) {
      echo "&nbsp;<div class='alert alert-warning'>";
      $noPesan = 0;
      foreach ($pesanError as $indeks => $pesan_tampil) {
        $noPesan++;
        echo "&nbsp;&nbsp; $pesan_tampil<br>";
      }
      echo "</div>";
    } else {
      # SIMPAN DATA KE DATABASE. 
      // Jika tidak menemukan error, update data ke database
      $ses_nama  = $_SESSION['SES_NAMA'];
      $mySql    = "UPDATE master_user set user_name ='$dataUsername', user_group = '$dataRole' $sql_password where user_id='$id'";
      $myQry = mysqli_query($koneksidb, $mySql) or die("Error query " . mysqli_error($koneksidb));


      if ($myQry) {
        echo "<meta http-equiv='refresh' content='0; url=?page=Master-User&s=edited'>";
      }
      exit;
    }
  } // Penutup Tombol Submit

  # MASUKKAN DATA KE VARIABEL
  # TAMPILKAN DATA DARI DATABASE, Untuk ditampilkan kembali ke form edit
  $Code  = isset($_GET['id']) ?  $_GET['id'] : '';
  $mySql  = "SELECT * FROM master_user WHERE user_id='$Code'";
  $myQry  = mysqli_query($koneksidb, $mySql)  or die("Query ambil data salah : " . mysqli_error());
  $myData = mysqli_fetch_array($myQry);
  # MASUKKAN DATA KE VARIABEL
  $dataCode    = $myData['user_id'];
  $dataUsername    = $myData['user_name'];
  $dataFullName    = $myData['user_fullname'];
  $user_group    = $myData['user_group'];

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
            <h2 class="content-header-title float-start mb-0">Master User</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Edit</a>
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
                          <label>Username <span class="required">*</span></label>
                          <input type="text" class="form-control" placeholder="Name" autocomplete="false" readonly onfocus="this.removeAttribute('readonly')" name='txtUserName' value="<?php echo $dataUsername; ?>" />
                        </div>
                        <div class="col-md-3 col-12">
                          <label>Nama <span class="required">*</span></label>
                          <input type="text" class="form-control" placeholder="Name" autocomplete="false" readonly onfocus="this.removeAttribute('readonly')"  name='txtFullName' value="<?php echo $dataFullName; ?>" />
                        </div>
                        <div class="col-md-3 col-12">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="kosongkan jika tidak dirubah" name='txtPassword' value="" autocomplete="false" readonly onfocus="this.removeAttribute('readonly')" />
                          </div>
                        </div>
                        <div class="col-md-3 col-12">
                          <label>Role</label>
                          <select class="form-select" name="txtRole" aria-label="Default select example" autocomplete="false" readonly onfocus="this.removeAttribute('readonly')" required>
                            <option value="">Pilih Role</option>
                            <?php
                            if ($user_group == 'Super Admin') { ?>
                              <option value="Super Admin" selected>Super Admin</option>
                              <option value="Admin">Admin</option>
                            <?php
                            } else if ($user_group == 'Admin') { ?>
                              <option value="Super Admin">Super Admin</option>
                              <option value="Admin" Selected>Admin</option>
                            <?php } else { ?>
                              <option value="Super Admin">Super Admin</option>
                              <option value="Admin">Admin</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="col-7 my-5">
                      <a type="button" href="?page=Master-Paket" class="btn btn-warning me-2">Kembali</a>
                      <button type="submit" name="btnSubmit" class="btn btn-success me-3">Submit</button>
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