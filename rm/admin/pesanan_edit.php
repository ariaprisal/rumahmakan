<?php 

include "fungsi_pesanan.php";

	if($_GET)
	{
		$id_pesanan	= $_GET["id_pesanan"];
		$querymenu = $koneksi->query("SELECT * FROM tb_pesanan WHERE id_pesanan='$id_pesanan'");
		$data = $querymenu->fetch_array();
		echo json_encode($data);

		if($querymenu == false){
			die ("Terjadi Kesalahan : ". mysqli_error($koneksi));
		}

	}else if($_POST){

		$id_pesanan 	= $_POST["id_pesanan"];

		$nama_pesanan 	= $_POST["nama_pesanan"];
		$jumlah_pesanan = $_POST["jumlah_pesanan"];
		$total_harga    = $_POST["total_harga"];

		if (mysqli_query($koneksi, "UPDATE tb_pesanan SET nama_pesanan='$nama_pesanan', jumlah_pesanan='$jumlah_pesanan', total_harga='$total_harga' WHERE id_pesanan='$id_pesanan'"))

			{
				echo json_encode(array('status' => TRUE));
				exit();
				// header("Location: list_menu2.php");
				// exit();
			}
		
		die ("Terdapat kesalahan : ". mysqli_error($koneksi));
	}

?>
