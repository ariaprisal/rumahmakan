<?php
session_start();
include "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];

$query = mysqli_query ($koneksi, "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");

// Validasi Login
if ($_POST)
{
	
	$queryuser = mysqli_query ($koneksi, "SELECT * FROM tb_admin WHERE username='$username'");
		
	$user = mysqli_fetch_array ($queryuser);
	
	if($user){
			if (password_verify($password, $user["password"])){
				
				$_SESSION["username"] 			= $user["username"];
				$_SESSION["password"] 			= $user["password"];
				$_SESSION["id"] 				= $user["id"];
				$_SESSION["level"] 				= $user["level"];
				$_SESSION["alamat"] 			= $user["alamat"];
				$_SESSION["jenis_kelamin"] 		= $user["jenis_kelamin"];
				$_SESSION["no_hp"] 				= $user["no_hp"];
				$_SESSION["foto"]				= $user["foto"];
				$_SESSION["Login"] 				= true;
				
				if ($_SESSION["Login"] == true)
				{
					header ("Location: admin/home.php");
					exit();
				}

				else{
					header("Location :error404.php");
					exit();
				}
			}
			else
			{
				header ("Location: login.php?Err=4");
				exit();
			}
	}
	else if (empty ($username) && empty ($password)){
		header ("Location: login.php?Err=1");
		exit();
	}
	else if(empty ($username)){
		header ("Location: login.php?Err=2");
		exit();
	}
	else if(empty ($password)){
		header ("Location: login.php?Err=3");
		exit();
	}
	else{
		header ("Location: login.php?Err=5");
		exit();
	}
}
	
?>