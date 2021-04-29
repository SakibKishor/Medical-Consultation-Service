<?php
	$email=$_GET["email"];
	require_once "Controllers/AdminController.php";
	$res=checkEmail($email);
	echo $res;
	
?>