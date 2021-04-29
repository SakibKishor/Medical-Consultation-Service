<?php

	// session_start();
	// destroy the session
	// session_destroy();
	// header("Location :signin.php");
	

	
	session_start();
	unset($_SESSION['name']);
	//session_destroy();
	header('location: signin.php');


?>