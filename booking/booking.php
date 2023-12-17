<?php
include_once "library/inc.connection.php";


// Set the locale to a foreign language (e.g., French)
setlocale(LC_TIME, 'id_ID');

$txtTanggal = '';
if (isset($_POST['btnSubmit'])) {


  $pesanError = array();
  // set validasi
  # Baca variabel form
  $txtTanggal   = $_POST['txtTanggal'];
  // ganti format tanggal
  $originalDate = "$txtTanggal";
  $txtTanggal = date("Y-m-d", strtotime($originalDate));


  $nama_hari = date("l", strtotime($txtTanggal));
  // echo "Hari ini adalah: " . $nama_hari;
}
?>

<!-- Copyright @ 2018 PT. Rentas Media Indonesia (www.rentas.co.id) -->
<!-- Dilarang mengcopy , memperbanyak atau menggunakan source code ini dalam bentuk apapun tanpa izin tertulis dari PT. Rentas Media Indonesia. -->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="description" content="Alexstrap Education - HTML5 Bootstrap Landing Page Template">
  <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width, shrink-to-fit=no"><!-- Favicon-->
  <link rel="shortcut icon" href="./assets/favicons/favicon.ico">
  <link rel="apple-touch-icon" sizes="57x57" href="./assets/favicons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="./assets/favicons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="./assets/favicons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/favicons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="./assets/favicons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="./assets/favicons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="./assets/favicons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="./assets/favicons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicons/apple-icon-180x180.png">
  <link rel="icon" type="./assets/images/logo-sf.png" sizes="192x192" href="./assets/favicons/android-icon-192x192.png">
  <link rel="icon" type="./assets/images/logo-sf.png" sizes="32x32" href="./assets/favicons/favicon-32x32.png">
  <link rel="icon" type="./assets/images/logo-sf.png" sizes="96x96" href="./assets/favicons/favicon-96x96.png">
  <link rel="icon" type="./assets/images/logo-sf.png" sizes="16x16" href="./assets/favicons/favicon-16x16.png">
  <link rel="manifest" href="./assets/favicons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="./assets/favicons/ms-icon-144x144.png"><!-- PWA primary color-->
  <meta name="theme-color" content="#00BCD4">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"><!-- Facebook-->
  <meta property="author" content="luxi">
  <meta property="og:site_name" content="alexstrap.ux-maestro.com">
  <meta property="og:locale" content="en_US">
  <meta property="og:type" content="website"><!-- Twitter-->
  <meta property="twitter:site" content="luxi.ux-maestro.com">
  <meta property="twitter:domain" content="luxi.ux-maestro.com">
  <meta property="twitter:creator" content="luxi">
  <meta property="twitter:card" content="summary">
  <meta property="twitter:image:src" content="./assets/images/logo.png">
  <meta property="og:url" content="alexstrap.ux-maestro.com/education">
  <meta property="og:title" content="Education">
  <meta property="og:description" content="Alexstrap Education - HTML5 Bootstrap Landing Page Template">
  <meta name="twitter:site" content="alexstrap.ux-maestro.com/education">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image" content="/images/education-logo.png">
  <meta property="og:image" content="/images/education-logo.png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <title>SF Studio - Booking </title><!-- Styles--><!-- Put the 3rd/plugins css here-->
  <link href="./assets/css/vendors/normalize.css" rel="stylesheet">
  <link href="./assets/css/vendors/bootstrap.css" rel="stylesheet">
  <!-- <link href="./assets/css/vendors/materialize.css" rel="stylesheet"> -->
  <link href="./assets/css/vendors/hamburger-menu.css" rel="stylesheet">
  <link href="./assets/css/vendors/animate.css" rel="stylesheet">
  <link href="./assets/css/vendors/animate-extends.css" rel="stylesheet">
  <link href="./assets/css/vendors/slick-carousel/slick.css" rel="stylesheet">
  <link href="./assets/css/vendors/slick-carousel/slick-theme.css" rel="stylesheet">
  <link href="./assets/css/styles.css" rel="stylesheet">
  <!-- font-awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- timepicker style -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- bahasa indonesia for datepicker -->
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>


</head>

<body>
  <div id="preloader" style="position: fixed; z-index: 10000; background: #fafafa; width: 100%; height: 100%"><img style="opacity: 0.5; position: fixed; top: calc(50% - 50px); left: calc(50% - 50px)" src="./assets/images/loading.gif" alt="loading"></div>
  <div class="m-application theme--light transition-page" id="app">
    <div class="loading"></div>
    <div class="m-content smart smart-var" id="main-wrap">
      <div class="form-page">
        <div class="page-wrap">
          <div class="hidden-md-up">
            <div class="logo logo-header">
              <a href="index.html">
                <img src="./assets/images/logox2.png" alt="logo">
              </a>
            </div>
          </div>
          <div class="container max-lg inner-wrap">
            <div class="card form-box fragment-fadeUp">
              <div class="hidden-sm-down">
                <a class="waves-effect btn-icon backtohome" href="index.html">
                  <span><i class="ion-ios-home-outline"></i><i class="ion-ios-arrow-thin-left"></i></span>
                </a>
              </div>
              <div class="auth-frame">
                <div class="row">
                  <div class="col-md-5">
                    <div class="hidden-sm-down">
                      <div class="greeting">
                        <div class="deco">
                          <div class="primary-light"></div>
                          <div class="secondary-main"></div>
                          <div class="secondary-light"></div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="logo" style="">

                          <img src="./assets/images/logo-sf-white.png" alt="logo" />
                          <p class="use-text-subtitle2">Silahkan isi formulir berikut :) </p>
                        </div>
                        <!-- <a href="" class="use-text-subtitle2">Lihat harga</a> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-7 col-sm-12">
                    <div class="form-wrap">
                      <div>
                        <div class="head">
                          <div class="title-main align-left">
                            <h4 class="secondary"><span>BOOKING</span></h4>
                            <p class="desc use-text-subtitle2"></p>
                          </div>
                          <!-- <a class="btn btn-flat waves-effect button-link" href="register.html">
                            <i class="material-icons icon left mr-1">arrow_forward</i>Create new account
                          </a> -->
                        </div>


                        <?php if ($txtTanggal != '') {
                        ?>


                          <div class="row spacing3">
                            <!-- jika tanggal sudah diisi -->
                            <form class="form-signin" role="form" action="?page=Booking-Process" method="POST" name="form1" target="_self" id="form1">

                              <div class="col-12">
                                <div class="form-group">
                                  <label>Waktu*</label>
                                  <select class="form-select" id="waktu" name="txtWaktu" aria-label="Default select example" autocomplete="off" required>
                                    <?php
                                    if ($txtTanggal != '') {
                                      # code...
                                      // panggil database
                                      echo "SELECT * from jadwal j where j.status ='0' and j.availability ='0' and j.jam not in (select jam from booking where tanggal = '$txtTanggal'";

                                      if ($nama_hari == 'Sunday') {
                                        $mySql  = "SELECT * from jadwal j where j.status ='0' and j.availability ='0' and j.jam >='12:00' and j.jam not in (select jam from booking where tanggal = '$txtTanggal') order by j.jam asc;";
                                      } else if ($nama_hari == 'Monday') {
                                        $mySql  = "SELECT * from jadwal j where j.status ='0' and j.availability ='0' and j.jam ='00:00' and j.jam not in (select jam from booking where tanggal = '$txtTanggal') order by j.jam asc;";
                                      } else {
                                        $mySql  = "SELECT * from jadwal j where j.status ='0' and j.availability ='0' and j.jam <='17:00' and j.jam not in (select jam from booking where tanggal = '$txtTanggal') order by j.jam asc;";
                                      }

                                      $myQry  = mysqli_query($koneksidb, $mySql)  or die("RENTAS ERP ERROR : " . mysqli_error($koneksidb));
                                      while ($myData = mysqli_fetch_array($myQry)) {

                                        // set tanggal hari ini
                                        $hariini = date('Y-m-d');

                                        // jika tanggal yang dipilih hari ini, set validasi
                                        if ($hariini == $txtTanggal) {
                                        // set jam sekarang tambah 1 jam
                                        $jamsekarang = date("H:i", strtotime("+60 minutes"));
                                        // jadwal jam yang tersedia
                                        $jam = date("H:i", strtotime($myData['jam']));
                                        // tampilkan daftar jam minimal 1 jam dari jam sekarang
                                        if ($jam > $jamsekarang) {
                                    ?>
                                          <option value="<?php echo $jam  ?>"><?php echo $jam ?></option>;
                                      <?php
                                        }
                                        // jika tanggal yang dipilih bukan hari ini maka tampilkan semua 
                                      }
                                      else if ($nama_hari =='Monday') { ?>
                                        <option value="#"><?php echo 'Mohon maaf studio tutup' ?></option>;
                                        
                                     <?php } else {
                                          // jadwal jam yang tersedia
                                          $jam = date("H:i", strtotime($myData['jam']));
                                        ?>
                                      
                                        <option value="<?php echo $jam  ?>"><?php echo $jam ?></option>;
                                     <?php } 
                                      }
                                    } else { ?>
                                      <option selected>Pilih Tanggal Terlebih Dahulu</option>

                                    <?php
                                    }

                                    ?>
                                  </select>
                                </div>
                              </div>


                              <div class="col-lg-12 col-sm-6">
                                <div class="form-group">
                                  <label>Nama*</label>
                                  <input class="form-control" type="text" placeholder="masukkin nama kamu" name="txtNama" autocomplete="off" required>
                                  <input class="form-control" type="hidden" placeholder="" name="txtTanggal" value="<?php echo $txtTanggal ?>" autocomplete="off" required>

                                </div>
                              </div>

                              <div class="col-lg-12 col-sm-6">
                                <label for="email">Jenis Foto*</label>
                                <select class="form-select" id="jenisfoto" name="txtJenis" aria-label="Default select example" autocomplete="off" required>
                                  <option selected>Pilih</option>
                                  <?php
                                  // panggil database
                                  $mySql  = "SELECT * from master_jenis group by jenis order by jenis asc";
                                  $myQry  = mysqli_query($koneksidb, $mySql)  or die("RENTAS ERP ERROR : " . mysqli_error($koneksidb));
                                  while ($myData = mysqli_fetch_array($myQry)) { ?>
                                    <option value="<?php echo $myData['jenis']  ?>"><?php echo $myData['jenis'] ?></option>;
                                  <?php
                                  };
                                  ?>
                                </select>
                              </div>

                              <div class="col-lg-12 col-sm-6" style="padding-top: 15px">
                                <label for="email">Pilihan Paket*</label>
                                <select class="form-select" name="txtPaket" id="paket" class="form-control" tabindex="-1" disabled autocomplete="off" required>
                                  <option selected="selected">Silahkan pilih jenis foto terlebih dahulu</option>
                                </select>
                              </div>


                              <div class="col-lg-12 col-sm-6" style="padding-top: 15px">
                                <label for="email">Background*</label>
                                <select class="form-select" id="background" name="txtBackground" aria-label="Default select example" autocomplete="off" required>
                                  <option selected>Pilih</option>
                                  <?php
                                  // panggil database
                                  $mySql  = "SELECT * from master_background order by id asc";
                                  $myQry  = mysqli_query($koneksidb, $mySql)  or die("RENTAS ERP ERROR : " . mysqli_error($koneksidb));
                                  while ($myData = mysqli_fetch_array($myQry)) { ?>
                                    <option value="<?php echo $myData['background']  ?>"><?php echo $myData['background'] ?></option>;
                                  <?php
                                  };
                                  ?>
                                </select>
                              </div>

                              <div class="col-lg-12 col-sm-6" style="padding-top: 15px">
                                <div class="form-group">
                                  <label>Email*</label>
                                  <input class="form-control" type="text" placeholder="masukkin alamat Email kamu" name="txtEmail" autocomplete="off" required>
                                </div>
                              </div>

                              <div class="col-lg-12 col-sm-6">
                                <div class="form-group">
                                  <label>Whatsapp*</label>
                                  <input class="form-control" type="text" placeholder="masukkin no Whatsapp kamu" name="txtWhatsapp" autocomplete="off" required>
                                </div>
                              </div>

                              <div class="col-lg-12 col-sm-6">
                                <div class="form-group">
                                  <label>Instagram</label>
                                  <input class="form-control" type="text" placeholder="Opsional" autocomplete="off" name="txtInstagram">
                                </div>
                              </div>
                          </div>

                          <div class="btn-area mt-10">
                            <button class="btn secondary btn-large block waves-effect" name="btnSubmit" type=" submit">Confirm Booking</button>

                          </div>
                          <a class="btn primary btn-large block waves-effect" href="https://sf-selfstudio.com/booking/">Pilih Ulang Tanggal</a>

                          </form>


                        <?php } else { ?>
                          <!-- jika tanggal belum diisi -->
                          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form2" target="_self">

                            <div class="col-12 ">
                              <div class="form-group">
                                <label>Tanggal*</label>
                                <input class="form-control" id='datepicker' placeholder="Pilih Tanggal" type="text" name="txtTanggal" autocomplete="off" required>
                              </div>
                            </div>


                            <div class="btn-area mt-10">
                              <button class="btn secondary btn-large block waves-effect" name="btnSubmit" type=" submit">Confirm Tanggal</button>
                            </div>
                          </form>
                        <?php  }
                        ?>

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
  </div><!-- Scripts--><!-- Put the 3rd/plugins javascript here-->
  <script src="./assets/js/vendors/jquery.min.js"></script>
  <script src="./assets/js/vendors/bootstrap.min.js"></script>
  <script src="./assets/js/vendors/enquire.min.js"></script>
  <script src="./assets/js/vendors/jquery.enllax.min.js"></script>
  <script src="./assets/js/vendors/jquery.form-validator.min.js"></script>
  <script src="./assets/js/vendors/jquery.touchSwipe.min.js"></script>
  <script src="./assets/js/vendors/pace.min.js"></script>
  <script src="./assets/js/vendors/slick.min.js"></script>
  <script src="./assets/js/vendors/wow.min.js"></script>
  <script src="./assets/js/vendors/jquery.navScroll.min.js"></script>
  <script src="./assets/js/vendors/parallax.min.js"></script><!-- This assets are not avalaible in npm.js or it has been costumized-->
  <script src="./assets/js/vendors/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  <!-- <script src="./assets/js/vendors/materialize.js"></script> -->
  <script src="./assets/js/scripts.js"></script>
  <!-- Chaindrop -->
  <script src="js2/chaindropdown/config.js" type="text/javascript"></script>
  <script src="js3/chaindropdown/config.js" type="text/javascript"></script>


  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Include jQuery UI library -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Include jQuery UI Timepicker Addon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>


  <script>
    // Initialize the datepicker

    var dateToday = new Date();
    jQuery(function($) {
      $('input.datepicker').datepicker({
        duration: '',
        changeMonth: false,
        changeYear: false,
        yearRange: '2010:2020',
        showTime: false,
        time24h: true,
        minDate: dateToday
      });

      $.datepicker.regional['in'] = {
        monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
          'September', 'Oktober', 'November', 'Desember'
        ],
        monthNamesShort: ['led', 'úno', 'bře', 'dub', 'kvě', 'čer', 'čvc', 'srp', 'zář', 'říj', 'lis', 'pro'],
        dayNames: ['Minggi', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        dayNamesShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
        dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
      };


      $.datepicker.setDefaults($.datepicker.regional['in']);
    });

    // $(function() {

    // });
  </script>

  <script>
    $(document).ready(function() {
      // Mendapatkan waktu sekarang
      var now = new Date();
      var currentDate = new Date();

      // Mendapatkan jam buka dan jam tutup
      var openingTime = new Date(currentDate);
      openingTime.setHours(8, 0, 0, 0);

      var closingTime = new Date(currentDate);
      closingTime.setHours(16, 0, 0, 0);
      // Inisialisasi datepicker
      // Inisialisasi datepicker
      $('#datepicker').datepicker({
        minDate: 0, // Tidak bisa memilih tanggal kemarin
        // Fungsi yang dipanggil setiap kali datepicker diubah
        onSelect: function(dateText, inst) {
          // Mendapatkan tanggal yang dipilih dari datepicker
          var selectedDate = $(this).datepicker('getDate');

          // Jika tanggal yang dipilih sama dengan hari ini
          if (selectedDate.getTime() === currentDate.getTime()) {
            // Menyaring waktu yang sudah berlalu
            var disabledTimes = [];
            for (var i = currentDate.getHours(); i < 24; i++) {
              disabledTimes.push(i + ':00');
            }
            // Mengatur waktu yang sudah berlalu untuk dinonaktifkan
            inst.settings.disableTimeRanges = [disabledTimes];
          } else {
            // Jika bukan hari ini, munculkan semua waktu
            inst.settings.minTime = '08:00';
            inst.settings.maxTime = '16:00';
            // Reset waktu yang sudah berlalu
            inst.settings.disableTimeRanges = [];
          }

          // Reset nilai pada timepicker jika tanggal diganti
          $('#timepicker').val('');
        }
      });




    });
  </script>



</html>