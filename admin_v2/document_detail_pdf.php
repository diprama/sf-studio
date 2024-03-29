<?php
include_once "library/inc.seslogin.php";
include_once "library/inc.connection.php";
include_once "library/inc.library.php";
date_default_timezone_set("Asia/Jakarta");
include "header_pdf.php";


$ip = $_SERVER['REMOTE_ADDR'];
$id      = isset($_GET['id']) ?  $_GET['id'] : '';
$version  = isset($_GET['v']) ?  $_GET['v'] : '';
$file    = isset($_GET['doc']) ?  $_GET['doc'] : '';
$page    = isset($_GET['hal']) ?  $_GET['hal'] : '';

$division = isset($_SESSION['SES_DIVISION']) ?  $_SESSION['SES_DIVISION'] : '';
$department = isset($_SESSION['SES_DEPARTMENT']) ?  $_SESSION['SES_DEPARTMENT'] : '';
$unit =  isset($_SESSION['SES_UNIT']) ?   $_SESSION['SES_UNIT'] : '';
$user_id = isset($_SESSION['SES_USERID']) ?  $_SESSION['SES_USERID'] : '';

// $mySqla  = "select count(*) as totala from view_document_privileges where document_id='$id' ";
// $myQrya  = mysqli_query($koneksidb, $mySqla)  or die("Query ambil data salah : " . mysqli_error($koneksidb));
// $myDataa = mysqli_fetch_array($myQrya);
// $totala = $myDataa['totala'];
// if ($totala > 0) {

//   $mySqlb  = "select count(*) as totalb from view_document_privileges where document_id='$id' and (division='$division' or 
// 	department='$department' or unit='$unit' or	user_id='$user_id')";
//   $myQryb  = mysqli_query($koneksidb, $mySqlb)  or die("Query ambil data salah : " . mysqli_error($koneksidb));
//   $myDatab = mysqli_fetch_array($myQryb);
//   $totalb = $myDatab['totalb'];
//   if ($totalb < 1) {
//     echo "<meta http-equiv='refresh' content='0; url=?page=Document-Denied&id=Document'>";
//   }
// }

// $mySqlc  = "select count(*) as totalc from view_document_files_privileges where document_id='$id' and document_file_title='$file'";
// $myQryc  = mysqli_query($koneksidb, $mySqlc)  or die("Query ambil data salah : " . mysqli_error($koneksidb));
// $myDatac = mysqli_fetch_array($myQryc);
// $totalc = $myDatac['totalc'];
// if ($totalc > 0) {

//   $mySqld  = "select count(*) as totalb from view_document_files_privileges where document_id='$id' and document_file_title='$file' and (division='$division' or 
// 	department='$department' or unit='$unit' or	user_id='$user_id')";
//   $myQryd  = mysqli_query($koneksidb, $mySqld)  or die("Query ambil data salah : " . mysqli_error($koneksidb));
//   $myDatad = mysqli_fetch_array($myQryd);
//   $totald = $myDatab['totald'];
//   if ($totald < 1) {
//     echo "<meta http-equiv='refresh' content='0; url=?page=Document-Denied&id=File'>";
//   }
// }






$mySql    = "INSERT INTO log_document (document_id,document_version,document_file_title,user_id,log_date, log_ipaddress, log_apps)
				VALUES ('$id','$version','" . $file . "',
				'" . $_SESSION['SES_USERID'] . "',now(), '$ip','Web')";
$myQry = mysqli_query($koneksidb, $mySql) or die("Error query " . mysqli_error($koneksidb));

$mySql  = "select * from view_document_files where document_id='$id' and document_version='$version'";
$myQry  = mysqli_query($koneksidb, $mySql)  or die("Query ambil data salah : " . mysqli_error($koneksidb));
$myData = mysqli_fetch_array($myQry);
$filename = isset($myData['document_file_name']) ? $myData['document_file_name'] : '';

$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (strtolower($ext) == 'pdf') {
  // Tampilkan PDF
  echo "<div class='watermark'></div><iframe class='height1' width='100%' height='900px' frameborder='0' marginheight='0' marginwidth='0' style='z-index:-1'
      src='viewer2.php?file=" . $filename . "#page=" . $page . "'>
  </iframe>";
} else {
  // Putar media video
  echo '<div style="text-align: center;">';
  echo '<video width="320" height="240" controls>';
  echo '<source src="' . $filename . '" type="video/mp4">';
  echo '</video>';
  echo '</div>';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Libra</title>
  <link rel="shortcut icon" href="../app-assets/images/logo/libra1.png">
  <style>
    .watermark {
      background-image: url(../app-assets/images/logo/libra1.png);
      /* background-position: center; */
      background-position: 50% 100%;
      background-size: 100%;
      /* CSS3 only, but not really necessary if you make a large enough image */
      background-repeat: no-repeat;
      position: absolute;
      /* margin-right: 1000px; */
      width: 25%;
      height: 70%;
      margin: 500;
      z-index: 10;
      margin-left: auto;
      margin-right: auto;
      left: 0;
      right: 0;
      text-align: center;
      opacity: 20%;
    }

    .height1 {
      height: 588.5px;
    }

    @media (max-width: 540px) {
      .watermark {
        background-image: url(../app-assets/images/logo/libra1.png);
        /* background-position: center; */
        background-position: 50% 100%;
        background-size: 100%;
        /* CSS3 only, but not really necessary if you make a large enough image */
        background-repeat: no-repeat;
        position: absolute;
        /* margin-right: 1000px; */
        width: 70%;
        height: 70%;
        margin: 500;
        z-index: 10;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        text-align: center;
        opacity: 20%;
      }

      .height1 {
        height: 750px;
      }
    }


    @media (max-width: 1920px) {
      .watermark {
        background-image: url(../app-assets/images/logo/libra1.png);
        /* background-position: center; */
        background-position: 50% 100%;
        background-size: 40%;
        /* CSS3 only, but not really necessary if you make a large enough image */
        background-repeat: no-repeat;
        position: absolute;
        /* margin-right: 1000px; */
        width: 70%;
        height: 70%;
        margin: 500;
        z-index: 10;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        text-align: center;
        opacity: 10%;
      }

      .height1 {
        height: 900px;
      }
    }
  </style>

</head>


<body topmargin="0" bottommargin="0" marginheight="0" marginwidth="0">
  <script language="JavaScript">
    window.onload = function() {
      document.addEventListener("contextmenu", function(e) {
        e.preventDefault();
      }, false);
      document.addEventListener("keydown", function(e) {
        //document.onkeydown = function(e) {
        // "I" key
        if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
          disabledEvent(e);
        }
        // "J" key
        if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
          disabledEvent(e);
        }
        // "S" key + macOS
        if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
          disabledEvent(e);
        }
        // "P" key + macOS
        if (e.keyCode == 80 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
          disabledEvent(e);
        }
        // "P" key
        if (e.ctrlKey && e.keyCode == 80) {
          disabledEvent(e);
        }
        // "F12" key
        if (event.keyCode == 123) {
          disabledEvent(e);
        }
        if (event.keyCode == 44) {
          disabledEvent(e);
        }
      }, false);

      function disabledEvent(e) {
        if (e.stopPropagation) {
          e.stopPropagation();
        } else if (window.event) {
          window.event.cancelBubble = true;
        }
        e.preventDefault();
        return false;
      }
    };
  </script>

</body>


</html>