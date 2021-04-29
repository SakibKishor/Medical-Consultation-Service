<?php
	require_once 'Controllers/MyProfileController.php'
?>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="s.css">
		<nav>
			<label class="logo"> Medical Consultaion Service</label>
			<ul>
				<li><h4 style="color:powderblue;">Welcome, <?php echo $_SESSION["name"]; ?></h4> </li>
				<li><a  href="dashboard.php">Home</a> </li>
				<li><a class="active" href ="MyProfile.php"> My profile </a></li>
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
	<body>
	
		<div align= "center" >
		<form action="" method= "post">
			<table align= "center">
				<br> <span><h2><?php echo $_SESSION["name"]; ?> </h2> </span> <br><br>
				<span align="center"><h3> ID:<?php echo $uid; ?> </h3> <span>
				<tr>
					<td> <span>Name</span> </td>
					<td> :<input type = "text" value="<?php echo $name;?>"  name= "name"> 
					<span> <?php echo $err_name; ?> </span> </td>
				</tr>
				
				<tr>
					<td> <span>Password</span> </td>
					<td> :<input type = "password" value="<?php echo $password; ?>" name= "pass"> 
					<span> <?php echo $err_password; ?> </span> </td>
				</tr>
				
				<tr>
					<td> <span>Confirm Password</span> </td>
					<td> :<input type = "password" value="<?php echo $cpass; ?>"  name= "cpass"> 
					<span> <?php echo $err_cpass; ?> </span> </td>
				</tr>
				
				<tr>
					<td> <span>Email</span> </td>
					<td> :<input type = "text" value= "<?php echo $email;?>" name= "email">
					<span> <?php echo $err_email; ?> </span> </td>
					
				</tr>
				
				<tr>
					<td> <span>Phone</span> </td>
					<td> :<input type = "text" placeholder="Number" value="<?php echo $number?>"  name= "number"    > 
						<span> <?php echo $err_number; ?> </span> </td> 
						
					
				</tr>
				
				
				<tr>
					<td> <span>Address</span> </td>
					<td> :<textarea name="address"  ><?php echo $address; ?> </textarea> 
					<span> <?php echo $err_address; ?> </span> </td></td>
				</tr>
				
				<tr>
					<td align= "center" colspan= "2"> <input type="submit" value="Update Profile"> </td>
				</tr>
				
				
				
				
			</table>
		</form>
		</div>

		
	</body>
</html>