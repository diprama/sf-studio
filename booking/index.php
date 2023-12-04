<?php
ob_start();
session_start();
ini_set("max_execution_time", 0);
ini_set('display_errors', 1);
include_once "library/inc.connection.php";
// include_once "library/inc.library.php";
date_default_timezone_set("Asia/Jakarta");
// include "buka_file.php";
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
  <link href="./assets/css/vendors/materialize.css" rel="stylesheet">
  <link href="./assets/css/vendors/hamburger-menu.css" rel="stylesheet">
  <link href="./assets/css/vendors/animate.css" rel="stylesheet">
  <link href="./assets/css/vendors/animate-extends.css" rel="stylesheet">
  <link href="./assets/css/vendors/slick-carousel/slick.css" rel="stylesheet">
  <link href="./assets/css/vendors/slick-carousel/slick-theme.css" rel="stylesheet">
  <link href="./assets/css/styles.css" rel="stylesheet">
  <!-- font-awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- datepicker styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
  <!-- timepicker style -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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
                        <div class="logo">
                          <img src="./assets/images/logo-sf-white.png" alt="logo" />
                          <p class="use-text-subtitle2">Silahkan isi formulir berikut :) </p>
                        </div>
                        <!-- <a href="" class="use-text-subtitle2">Lihat harga</a> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7">
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
                        <form id="login_form" method="POST">
                          <div class="row spacing3">

                            <div class="col-sm-6">
                              <label for="email">Pilih Tanggal*</label>
                              <div class="input-field filled dark input-group">
                                <input type="text" placeholder="Pilih Tanggal" name="" class="form-control datepicker date" id="fecha1">
                              </div>
                            </div>


                            <div class="col-sm-6">
                              <label for="email">Pilih Jam*</label>
                              <div class="input-field filled dark input-group">
                                <input type="text" placeholder="Pilih Waktu" class="form-control timepicker timepicker-with-dropdown" id="fecha1">
                              </div>
                            </div>


                            <div class="col-sm-12">
                              <div class="input-field filled dark">
                                <input class="" id="name" type="text" name="nama" required>
                                <label for="email">Nama*</label>
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <label for="email">Jenis Foto*</label>
                              <select class="form-select" id="jenisfoto" aria-label="Default select example">
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

                            <div class="col-sm-12" style="padding-top: 15px">
                              <label for="email">Pilihan Paket*</label>
                              <select class="form-select" name="txtSubPart" id="paket" class="form-control" tabindex="-1" disabled>
                                <option selected="selected">Silahkan pilih jenis foto terlebih dahulu</option>
                              </select>
                            </div>


                            <div class="col-sm-12" style="padding-top: 15px">
                              <label for="email">Background*</label>
                              <select class="form-select" id="jenisfoto" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <?php
                                // panggil database
                                $mySql  = "SELECT * from master_background  order by background asc";
                                $myQry  = mysqli_query($koneksidb, $mySql)  or die("RENTAS ERP ERROR : " . mysqli_error($koneksidb));
                                while ($myData = mysqli_fetch_array($myQry)) { ?>
                                  <option value="<?php echo $myData['background']  ?>"><?php echo $myData['background'] ?></option>;
                                <?php
                                };
                                ?>
                              </select>
                            </div>

                            <div class="col-sm-12" style="padding-top: 15px">
                              <div class="input-field filled dark">
                                <input class="" id="email" type="email" name="email" required>
                                <label for="email">Email*</label>
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="input-field filled dark">
                                <input class="" id="whatsapp" type="number" name="whatsapp" required>
                                <label for="whatsapp">No Whatsapp*</label>
                              </div>
                            </div>


                            <div class="col-sm-12">
                              <div class="input-field filled dark">
                                <input class="" id="instagram" type="text" name="instagram" required>
                                <label for="instagram">Username Instagram</label>
                              </div>
                            </div>
                          </div>

                          <div class="btn-area mt-10">
                            <button class="btn secondary btn-large block waves-effect" type="submit">Confirm Booking</button>
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
  <script src="./assets/js/vendors/materialize.js"></script>
  <script src="./assets/js/scripts.js"></script>
  <!-- Chaindrop -->
  <script src="js2/chaindropdown/config.js" type="text/javascript"></script>


  <!-- Datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <!-- timepicker -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

</body>

<script>
  $(function() {
    $('.datepicker').datepicker({
      language: "es",
      autoclose: true,
      format: "dd/mm/yyyy"
    });


  });

  $(function() {
    $('.timepicker').timepicker();
  });
</script>

</html>