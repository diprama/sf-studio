    <!-- BEGIN: Main Menu-->
    <?php
    //matiin Stock Movement
    // $ygMati = $_SESSION['SES_BRANCH'];
    //$mati = 'Depo Sunter';
    $mati = '';
    ?>



    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item me-auto">
                        <img src="../base-app-assets/images/logo/libra3.png" style="height:45px!important">
                    </li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">


                    <!-- <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="codesandbox"></i>Dashboard</a>
                        <ul class="dropdown-menu" data-bs-popper="none">

                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="chevrons-right"></i>Library</a>

                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="?page=Company" data-bs-toggle=""><i data-feather="circle"></i>Status</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->

                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="layers"></i>Dashboard</a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <a class="dropdown-item xx" href="#" data-bs-toggle="">Dashboard</a>
                            <!-- <a class="dropdown-item" href="?page=Information" data-bs-toggle="">Information, News & Article</a> -->
                        </ul>
                    </li>


                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="camera"></i>Booking</a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <a class="dropdown-item" href="?page=Management-Booking" data-bs-toggle="">Booking</a>
                            <a class="dropdown-item" href="?page=Management-History" data-bs-toggle="">History</a>
                        </ul>
                    </li>



                    <!-- =================================================================================================================================== -->

                    <!-- <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="database"></i>Master Data</a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <a class="dropdown-item" href="?page=Content-Categories" data-bs-toggle="">Book Categories</a>
                            <a class="dropdown-item" href="?page=Bookshelf" data-bs-toggle="">Bookshelf</a>
                        </ul>
                    </li> -->

                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="tools"></i>Booking Management</a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <a class="dropdown-item" href="?page=Master-Jenis" data-bs-toggle="">Jenis</a>
                            <a class="dropdown-item" href="?page=Master-Paket" data-bs-toggle="">Paket</a>
                            <a class="dropdown-item" href="?page=Master-Background" data-bs-toggle="">Background</a>
                            <a class="dropdown-item" href="?page=Master-Jadwal" data-bs-toggle="">Jadwal</a>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="users"></i>User Management</a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <a class="dropdown-item" href="#" data-bs-toggle="">User</a>
                        </ul>
                    </li>

                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="book"></i>Report</a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <a class="dropdown-item" href="#" data-bs-toggle="">Booking</a>
                        </ul>
                    </li>
                    <!-- 
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="book"></i>Physical Book</a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <a class="dropdown-item" href="?page=Book-Management-Physical" data-bs-toggle="">Book List</a>
                            <a class="dropdown-item" href="?page=Book-Management-Physical-Borrow" data-bs-toggle="">Borrowing Book</a>
                            <a class="dropdown-item" href="?page=Book-Management-Physical-Return" data-bs-toggle="">Returning Book</a>
                            <a class="dropdown-item" href="?page=Book-Management-Physical-Stock" data-bs-toggle="">Book Stock Management</a>
                            <a class="dropdown-item" href="?page=Book-Management-Physical-Stock-Trans" data-bs-toggle="">Borrowing Book History</a>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="smartphone"></i>Digital Book</a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <a class="dropdown-item" href="?page=Book-Management-Digital" data-bs-toggle="">Book List</a>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="smartphone"></i>Book Management</a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <a class="dropdown-item" href="?page=Book-Management-Approval" data-bs-toggle="">Approval</a>
                            <a class="dropdown-item" href="?page=Book-Management-Access" data-bs-toggle="">Access</a>
                            <a class="dropdown-item" href="?page=Book-Management-Expiry" data-bs-toggle="">Expiry</a>
                        </ul>
                    </li>
                </ul> -->

            </div>
        </div>
    </div>
    <!-- END: Main Menu-->