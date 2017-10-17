<?php 

include "fungsi_kategori.php";

$id_kategori	= $_GET["id_kategori"];

if($delete = mysqli_query ($koneksi, "DELETE FROM tb_kategori WHERE id_kategori='$id_kategori'"))
{
	header("Location: list_kategori.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($koneksi));

?>