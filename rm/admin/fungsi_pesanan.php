<?php 

$koneksi = mysqli_connect("localhost", "root", "", "rumahmakan");

//Menampilkan data dari database
function query($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) 
{
	global $koneksi;

	$nama_pesanan 		= htmlspecialchars($data["nama_pesanan"]);
	$jumlah_pesanan 	= htmlspecialchars($data["jumlah_pesanan"]);
	$total_harga 		= htmlspecialchars($data["total_harga"]);

	$query = "INSERT INTO tb_pesanan VALUES ('', '$nama_pesanan', '$jumlah_pesanan', '$total_harga')";

	mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
}

function hapus($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM tb_pesanan WHERE id = '$id'");
	return mysqli_affected_rows($koneksi);
}

?>