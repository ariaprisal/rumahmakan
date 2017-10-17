<?php
include "fungsi_kategori.php";

$id_kategori 		= htmlspecialchars($_POST["id_kategori"]);
$nama_kategori 		= htmlspecialchars($_POST["nama_kategori"]);
$jenis 				= htmlspecialchars($_POST["jenis"]);

if ($edit = mysqli_query($koneksi, "UPDATE tb_kategori SET nama_kategori='$nama_kategori', jenis='$jenis' WHERE id_kategori='$id_kategori'")){
		header("Location: list_kategori.php");
		exit();
	}
	
die ("Terdapat kesalahan : ". mysqli_error($koneksi));

?>