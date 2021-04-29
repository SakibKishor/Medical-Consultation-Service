<?php
	$username=$_GET["uname"];
	require_once "controllers/registrationController.php";
	$res=checkUsername($username);
	echo $res;
	
?>