<?php
session_start();
include "koneksi.php";

$username = $_SESSION["username"];
$password = $_POST["password"];

$query = mysqli_query ($koneksi, "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");

// Validasi Login
if ($_POST){
	
	$queryuser = mysqli_query ($koneksi, "SELECT * FROM tb_admin WHERE username='$username'");
		
	$user = mysqli_fetch_array ($queryuser);
	
	if($user){
			if (password_verify($password, $user["password"])){
				
				$_SESSION["username"] 		= $user["username"];
				$_SESSION["password"] 		= $user["password"];
				$_SESSION["id"] 			= $user["id"];
				$_SESSION["foto"]			= $user["foto"];
				$_SESSION["Login"] 			= true;
				
				if ($_SESSION["Login"] == true){
					header ("Location: admin/home.php");
					exit();
				}
				else{
					header("Location :pagenotfound.php");
					exit();
				}
			}
			else
			{
				header ("Location: lockscreen.php?Err=4");
				exit();
			}
	}
	else if (empty ($username) && empty ($password)){
		header ("Location: lockscreen.php?Err=1");
		exit();
	}
	else if(empty ($username)){
		header ("Location: lockscreen.php?Err=2");
		exit();
	}
	else if(empty ($password)){
		header ("Location: lockscreen.php?Err=3");
		exit();
	}
	else{
		header ("Location: lockscreen.php?Err=5");
		exit();
	}
}
	
?>