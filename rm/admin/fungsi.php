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

function tambah($data) {
	global $koneksi;

	$nama_makanan 	= htmlspecialchars($data["nama_makanan"]);
	$harga 			= htmlspecialchars($data["harga"]);
	$keterangan 	= htmlspecialchars($data["keterangan"]);

	$query = "INSERT INTO tb_menu VALUES ('', '', '$nama_makanan', '$harga', '$keterangan')";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);

}

// function hapus($id) {
// 	global $koneksi;
// 	mysqli_query($koneksi, "DELETE FROM rumahmakan WHERE id = $id");
// 	return mysqli_affected_rows($koneksi);


 ?>