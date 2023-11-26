<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<?php
    include_once "library/inc.seslogin.php";
    echo $_SESSION["SES_LOGIN"];
if ($_SESSION["SES_LOGIN"]=='') {
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