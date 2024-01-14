<?php
$id  = isset($_POST['cari']) ?  $_POST['cari'] : '';
$Jenis  = isset($_POST['txtJenis']) ?  $_POST['txtJenis'] : '';
$Background  = isset($_POST['txtBackground']) ?  $_POST['txtBackground'] : '';
$date  = isset($_POST['txtDate']) ?  $_POST['txtDate'] : '';
$date2  = isset($_POST['txtDate2']) ?  $_POST['txtDate2'] : '';


if (isset($_POST['btnHistory'])) {
  echo "<meta http-equiv='refresh' content='0; url=?page=Management-History&date=" . $date  . "&j=" . $Jenis   . "&b=" . $Background  . "'>";
}