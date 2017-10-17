<?php

$koneksi = mysqli_connect("localhost", "root", "", "rumahmakan");
	
if(mysqli_connect_errno()){
	printf ("Gagal terkoneksi : ".mysqli_connect_error());
	exit();
}



?>