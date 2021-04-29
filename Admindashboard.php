<?php
	require_once "Models/db_config.php";
	session_start();
	if(!isset($_SESSION["name"]))
	{
		header("Location:signin.php");
	}
?>

<html>
	 <!--<?php
		// $uname= $_SESSION["username"];
		// $pass= $_SESSION["pass"];
		
		// $query= "select 'Name', 'Email' from admin where Email='$uname'  ";
		// $result= get($query);
		// echo "<pre>";
		// print_r($result);
		// echo "</pre>"
		?>--> 
	<head>
		<script src="Models/search.js"></script>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="s.css">
	</head>
	<body>
		<nav>
			<label class="logo"> Medical Consultaion Service</label>
			<ul>
				<li><h4 style="color:powderblue;">Welcome, <?php echo $_SESSION["name"]; ?></h4> </li>
				<li><a class="active" href="dashboard.php">Home</a> </li>
				<li><a href ="MyProfile.php"> My profile </a></li>
				<li><a href="Logout.php">Log out</a> </li>
			</ul>
		</nav>
		
		<div class="left-menu">
			<ul class="barli">
			<li>Admin</li>
			<li><a href="CreateAdmin.php">Add New Admin</a></li>
			<li><a href="AllAdmin.php">All Admin</a></li>
			<li>Doctor</li>
			<li><a href="AllDoctor.php">All Doctor</a></li>
			</ul>
		</div>
		
		<div align= "center"> <br><br>
        <input type="text" name="search" placeholder="Search admin by name" id="name" onkeyup="ajax()">
        <input type="button" name="" value="search" onclick="ajax()">
        </div> <br>
        <br><div id="result" align="center"></div>
	</body>

</html>	