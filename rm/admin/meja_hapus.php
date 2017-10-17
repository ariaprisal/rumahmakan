<?php 

include "fungsi_meja.php";

$id_meja	= $_GET["id_meja"];

if($delete = mysqli_query ($koneksi, "DELETE FROM tb_meja WHERE id_meja='$id_meja'"))
{
	header("Location: list_meja.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($koneksi));

?>