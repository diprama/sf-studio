<?php
$_SESSION['SES_TITLE'] = "Management Booking";
include_once "library/inc.seslogin.php";
include "header_v2.php";
$_SESSION['SES_PAGE'] = "?page=Management-Booking";


function hari_ini($tanggal)
{
  $tanggal =
    $hari = date("D", strtotime($tanggal));

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
?>
<!-- BEGIN: Content-->
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Booking</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Booking</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="content-body">

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