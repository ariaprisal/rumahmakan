<?php

include "../koneksi.php";

$id_menu	= $_GET["id_menu"];

if($delete = mysqli_query ($koneksi, "DELETE FROM tb_menu WHERE id_menu='$id_menu'"))
{
	header("Location: list_menu2.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($koneksi));

?>