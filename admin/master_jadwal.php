<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">


<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include jQuery UI library -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Include jQuery UI Timepicker Addon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>


<?php
include "header.php";

if (isset($_POST['btnSubmit'])) {
    $pesanError = array();
    # Baca variabel form
    $txtBuka   = $_POST['jam_buka'];
    $txtTutup = $_POST['jam_tutup'];
    // updated
    $mySql = "UPDATE `master_jamkerja` SET `jam_buka`='$txtBuka',`jam_tutup`='$txtTutup',`updated_date`= now() WHERE id='1'";
    $myQry = mysqli_query($koneksidb, $mySql) or die("Query Salah : " . mysqli_error($koneksidb));
} // End POST

// ambil data
$mySql = "SELECT * FROM master_jamkerja";
$myQry = mysqli_query($koneksidb, $mySql) or die("Query Salah : " . mysqli_error($koneksidb));
$myData = mysqli_fetch_array($myQry);

$jam_buka = $myData['jam_buka'];
$jam_tutup = $myData['jam_tutup'];


?>


<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">DataTables</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Master Data</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Jadwal Buka</a>
                                </li>
                                <li class="breadcrumb-item active">Setting
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <form class="needs-validation" novalidate>
                <div class="row g-1">
                    <div class="col-md-4 col-12 mb-3 position-relative">
                        <label class="form-label" for="validationTooltip01">Jam Buka</label>
                        <input type="time"  class="form-control" placeholder="Jam Buka" value="<?= $jam_buka ?>" required />
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                    <div class="col-md-4 col-12 mb-3 position-relative">
                        <label class="form-label" for="validationTooltip02">Jam Tutup</label>
                        <input type="time"  class="form-control" placeholder="Jam Tutup" value="<?= $jam_tutup ?>" required />
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                </div>
                <button class="btn btn-primary" name='btnSubmit' type="submit">Update</button>
            </form>

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


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

        // Inisialisasi datepicker
        $('#datepicker').datepicker({
            minDate: now
        });


        $(function() {
            var now = new Date();
            var openingTime = new Date(now);
            var closingTime = new Date(now);

            openingTime.setHours(8, 0, 0); // Jam buka pukul 08:00
            closingTime.setHours(16, 0, 0); // Jam tutup pukul 16:00

            // Initialize the timepicker with a 20-minute interval
            $('#timepicker').timepicker({
                timeFormat: 'H:i',
                interval: 20,
                step: 20,
                dynamic: false,
                dropdown: true,
                scrollbar: true,
            });



        });



    });
</script>


<!-- footer -->
<?php
include "footer.php";
?>
</body>
<!-- END: Body-->

</html>