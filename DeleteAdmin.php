<?php
	require_once "Models/db_config.php";
	session_start();

	$did= $_GET['id'];


	$query= "DELETE FROM admin WHERE Admin_Id= $did";
	if(!execute($query))
	{
		echo " Admin Deleted";
		header("Location: AllAdmin.php");
	}
	else{
		echo "Can not delete admin";
	}

?>

<html>
	<head>
		<legend align= "center"><h1 >Welcome <?php echo $_SESSION["name"]; ?> </h1></legend>
		<div align="center">
		<a href ="CreateAdmin.php"> Add New Admin </a> &nbsp;  &nbsp;
		<a href ="AllAdmin.php"> All Admin </a>        &nbsp;  &nbsp;
		<a href ="MyProfile.php">My Profile </a>
		</div>
	</head>
	<body>
		
	</body>
</html>