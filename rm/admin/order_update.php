<?php
include "fungsi_order.php";

$id_order		= $_POST["id_order"];
$tanggal_order 	= $_POST["tanggal_order"];
$nama_order 	= $_POST["nama_order"];
$total_order 	= $_POST["total_order"];

if ($edit = mysqli_query($koneksi, "UPDATE tb_order SET tanggal_order='$tanggal_order', nama_order='$nama_order', total_order='$total_order' WHERE id_order='$id_order'")){
		header("Location: list_order.php");
		exit();
	}
	
die ("Terdapat kesalahan : ". mysqli_error($koneksi));

?>