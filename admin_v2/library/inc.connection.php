<?php
$myHost	= "103.41.205.42";
$myUser	= "root";
$myPass	= "Rentas123!@#";
$myDbs	= "biblioteca"; 
$koneksidb	= mysqli_connect($myHost, $myUser, $myPass);
if (! $koneksidb) {
  echo "Failed Connection !";
}
mysqli_select_db($koneksidb, "biblioteca") or die ("Database not Found !");
