<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<?php
include "header.php";

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
                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Jam Buka" value="" required />
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                    <div class="col-md-4 col-12 mb-3 position-relative">
                        <label class="form-label" for="validationTooltip02">Jam Tutup</label>
                        <input type="text" class="form-control" id="validationTooltip02" placeholder="Jam Tutup" value="" required />
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- footer -->
<?php
include "footer.php";
?>
</body>
<!-- END: Body-->

</html>