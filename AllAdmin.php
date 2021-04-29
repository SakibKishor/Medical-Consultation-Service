<?php
	require_once "Models/db_config.php";
	$query= "select * from admin";
	$result= get($query);
	session_start();
?>

<head>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="s.css">
	<nav>
		<label class="logo"> Medical Consultaion Service</label>
		<ul>
			<li><h4 style="color:powderblue;">Welcome, <?php echo $_SESSION["name"]; ?></h4> </li>
			<li><a  href="Admindashboard.php">Home</a> </li>
			<li><a  href ="MyProfile.php"> My profile </a></li>
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
		
</head>


	<br><legend align= "center"><h1 >All admin</h1></legend> <br><br>
	<div align="center">
	<table align="center" border="1" style="border-collapse:collapse;">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Added by</th>
			<th>Operations</th>
		</tr>
		
	<?php
		foreach ($result as $row)
		{
			echo "<tr>";
			echo "<td>".$row["Admin_Id"]."</td>";
			echo "<td>".$row["Name"]."</td>";
			echo "<td>".$row["Email"]."</td>";
			echo "<td>".$row["Phone"]."</td>";
			echo "<td>".$row["Address"]."</td>";
			echo "<td>".$row["Added by"]."</td>";
			echo    "<td> 
						<a href='UpdateAdmin.php?id={$row['Admin_Id']}'> Edit</a> |
                        <a href='DeleteAdmin.php?id={$row['Admin_Id']}'> Delete </a>
					</td>";
			echo "</tr>";
			
			
		}
		
		
	?>
	</table>
	</div>
