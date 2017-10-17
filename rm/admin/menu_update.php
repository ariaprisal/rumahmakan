<?php
include "../koneksi.php";

$id_menu 		= $_POST["id_menu"];
$nama_makanan 	= $_POST["nama_makanan"];
$harga 			= $_POST["harga"];
$keterangan     = $_POST["keterangan"];

if ($edit = mysqli_query($koneksi, "UPDATE tb_menu SET nama_makanan='$nama_makanan', harga='$harga', keterangan='$keterangan' WHERE id_menu='$id_menu'")){
		header("Location: list_menu2.php");
		exit();
	}
	
die ("Terdapat kesalahan : ". mysqli_error($koneksi));

?>