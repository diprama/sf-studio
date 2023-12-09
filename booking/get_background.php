<?php
// Load file koneksi.php
include "library/inc.connection.php";


// Ambil data ID kategori yang dikirim via ajax post
// $part_number = $_POST['kategori'];
$Channel    = explode("|", $_POST['kategori']);
$jenis   = $Channel[0];
// 28250-K0J -N000

// defaul isi validasi
$validasi = 'NO';
$html2 = "";
// validasi apakah mempunya sub part atau tidak
$sql2 = mysqli_query($koneksidb, "SELECT * FROM master_background where jenis='Photo Session' ORDER BY jenis asc");
// $cekQry = mysqli_query($koneksidb, $sql) or die("RENTAS ERP ERROR : " . mysqli_error($koneksidb));
if (mysqli_num_rows($sql2) >= 1) {
	$validasi2 = 'YES';
}


// end validasi
if ($validasi2 != 'YES') {
	$html2 .= "Jenis Foto belum ditentukan."; // Tambahkan tag option ke variabel $htm
} else {
	while ($data2 = mysqli_fetch_array($sql2)) { // Ambil semua data dari hasil eksekusi $sql
		$html2 .= "<option value='" . $data2['background'] . "'>" . $data2['background'] . "    </option>"; // Tambahkan tag option ke variabel $html
	}
}
// // Buat query untuk menampilkan data sub part dengan part number alias tertentu(sesuai yang dipilih user pada form)
// $sql = mysqli_query($koneksidb, "SELECT * FROM master_material where product_id='$part_number' ORDER BY product_id");

$callback2 = array('data_subkategori2' => $html2); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota

echo json_encode($callback2); // konversi varibael $callback menjadi JSON


// Buat variabel untuk menampung tag-tag option nya
// Set defaultnya dengan tag option Pilih
// $html = "<option value=''>Pilih</option>";
