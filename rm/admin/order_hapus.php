<?php 

include "fungsi_order.php";

$id_order	= $_GET["id_order"];

if($delete = mysqli_query ($koneksi, "DELETE FROM tb_order WHERE id_order='$id_order'"))
{
	header("Location: list_order.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($koneksi));

?>