<?php 

$koneksi = mysqli_connect("localhost", "root", "", "rumahmakan");

//Menampilkan data dari database
function query($query) {
	global $koneksi;
	$result 	= mysqli_query($koneksi, $query);
	$rows 		= [];
	while( $row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}	

function tambah($data) {
	global $koneksi;

	$tanggal_order 	= htmlspecialchars($data["tanggal_order"]);
	$nama_order 	= htmlspecialchars($data["nama_order"]);
	$total_order 	= htmlspecialchars($data["total_order"]);

	$query = "INSERT INTO tb_order VALUES ('', '$tanggal_order', '$nama_order', '$total_order')";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);

}


function hapus($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM tb_order WHERE id = '$id'");
	return mysqli_affected_rows($koneksi);
}


?>