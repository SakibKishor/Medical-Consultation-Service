<?php
	require_once "Models/db_config.php";
	session_start();

	$did= $_GET['id'];


	$query= "DELETE FROM doctors WHERE Reg_no = $did";
	execute($query);
	header("Location: AllDoctor.php")

?>

