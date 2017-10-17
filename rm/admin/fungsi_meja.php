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

	$no_meja 		= htmlspecialchars($data["no_meja"]);

	$cek_meja = mysqli_query($koneksi,"SELECT * FROM tb_meja WHERE no_meja=$no_meja");
	$result = $cek_meja->num_rows;

	if($result > 0)
	{
		echo "
          <script>
            alert('Maaf !!! Data Sudah Ada!');
            document.location.href = 'list_meja.php';
          </script>";

	}else{
		$query = "INSERT INTO tb_meja VALUES ('', '$no_meja')";
		mysqli_query($koneksi, $query);
		return mysqli_affected_rows($koneksi);
	}

}


?>