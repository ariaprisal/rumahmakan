<?php 

include "fungsi_pesanan.php";

$id_pesanan	= $_GET["id_pesanan"];

if(mysqli_query ($koneksi, "DELETE FROM tb_pesanan WHERE id_pesanan='$id_pesanan'"))
{
	header("Location: list_pesanan.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($koneksi));

?>