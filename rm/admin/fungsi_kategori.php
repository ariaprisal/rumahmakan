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

	$nama_kategori 	= htmlspecialchars($data["nama_kategori"]);
	$jenis 			= htmlspecialchars($data["jenis"]);

	$query = "INSERT INTO tb_kategori VALUES ('', '$nama_kategori', '$jenis')";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);

}

function cek_data($data)
{
	global $koneksi;
	$no_meja 		= htmlspecialchars($data["no_meja"]);
	$cek_meja		= mysqli_query($koneksi,"SELECT * FROM tb_meja WHERE no_meja=$no_meja");
}

?>