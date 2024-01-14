<?php
$_SESSION['SES_TITLE'] = "Jadwal";
include_once "library/inc.seslogin.php";
include "header_v2.php";
$_SESSION['SES_PAGE'] = "?page=Master-Jadwal";

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
                        <h2 class="content-header-title float-start mb-0">Booking Management</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a>Master Jadwal</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- set notifikasi -->
            <?php
            $status = isset($_GET['s']) ? $_GET['s'] : '';
            if ($status != '') {
                // jika s = success
                if ($status == 'ok') {
                    echo "&nbsp;<div class='alert alert-success'>";
                    echo "&nbsp;&nbsp; Berhasil di Update<br>";
                    echo "</div>";
                }
                // jika s = deleted
                else 
                 if ($status == 'deleted') {
                    echo "&nbsp;<div class='alert alert-success'>";
                    echo "&nbsp;&nbsp; Berhasil di Hapus<br>";
                    echo "</div>";
                }
                // jika s = deleted
                else 
                 if ($status == 'confirmation') {
                    echo "&nbsp;<div class='alert alert-success'>";
                    echo "&nbsp;&nbsp; Berhasil di Konfirmasi<br>";
                    echo "</div>";
                }
            }
            ?>

        </div>



        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <div class="content-header-left col-md-4 col-12">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="content-header-right text-md-end col-md-8 col-12 d-md-block d-none">
                                <form role="form" action="?page=Management-Admin-Add" method="POST" name="form1" target="_self" id="form1">
                                    <div class="row">
                                        <div class="col-md-5 col-12 px-25">
                                        </div>
                                        <div class="col-md-3 col-12 px-25">
                                        </div>
                                        <div class="col-md-4 col-12 ps-25">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-datatable">
                            <table class="table datatables-basic table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jam</th>
                                        <th>Status</th>
                                        <th>Ketersediaan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $mySql   = "SELECT * FROM jadwal order by jam asc";
                                    $myQry   = mysqli_query($koneksidb, $mySql)  or die("ERROR BOOKING:  " . mysqli_error($koneksidb));
                                    $nomor  = 0;
                                    while ($myData = mysqli_fetch_array($myQry)) {
                                        $nomor++;
                                        $Code = $myData['id'];

                                        // ganti format jam
                                        $Jam = $myData['jam'];
                                        $Jam = date("G:i", strtotime($Jam));

                                        // validasi status
                                        if ($myData['status'] == 1) {
                                            $status = "<span class='badge rounded-pill badge-glow bg-success'>Aktif</span>";
                                        } else {
                                            $status = "<span class='badge rounded-pill badge-glow bg-danger'>Tidak Aktif</span>";
                                        }

                                        // validasi ketersediaan
                                        if ($myData['availability'] == 0) {
                                            $availability = "<span class='badge rounded-pill badge-glow bg-success'>Tersedia</span>";
                                        } else {
                                            $availability = "<span class='badge rounded-pill badge-glow bg-danger'>Tidak Tersedia</span>";
                                        }

                                    ?>

                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $Jam; ?></td>
                                            <td>
                                                <a href="?page=Master-Jadwal-Status-Update&id=<?php echo $Code; ?>" onclick="return confirm('INGIN UPDATE STATUS?')"><?= $status ?></a>
                                            </td>
                                            <td><?php echo $availability; ?></td>

                                        </tr>
                                    <?php }
                                    ?>

                                </tbody>
                            </table>
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