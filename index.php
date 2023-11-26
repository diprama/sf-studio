

<?php
    // include_once "library/inc.seslogin.php";
if ($_SESSION["SES_LOGIN"]!='SUPERADMIN') {
    header("Location: login.php");
    exit;
}

include "header.php";




?>


<!-- BEGIN: Content-->

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