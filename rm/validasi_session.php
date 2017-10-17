<?php

if (!isset ($_SESSION["Login"]) || $_SESSION ["Login"] != true){
	header ("Location:error404.php");
}
else if ($_SESSION["level"] = "admin"){
	$_SESSION ["Login"] = true;
}
else{
	header ("Location:error404.php");
}

?>