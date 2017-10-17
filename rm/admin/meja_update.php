<?php
include "fungsi_meja.php";

$id_meja 		= htmlspecialchars($_POST["id_meja"]);
$no_meja 		= htmlspecialchars($_POST["no_meja"]);

if ($edit = mysqli_query($koneksi, "UPDATE tb_meja SET no_meja='$no_meja' WHERE id_meja='$id_meja'")){
		header("Location: list_meja.php");
		exit();
	}
	
die ("Terdapat kesalahan : ". mysqli_error($koneksi));

?>