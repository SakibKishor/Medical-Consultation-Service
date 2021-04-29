<?php
	require_once 'Controllers/AdminController.php'
?>

<html>
	<head>
		<script src="Models/AddAdminValidation.js"></script>
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
	
	
	<body>
	
	<div align="center" >
		<br><legend align= "center"><h2 >Add new admin</h2></legend> <br> <br>
		<form action="" method= "post" onsubmit="return validate()">
			<table align= "center">
				<tr>
					<td> <span>Name</span> </td>
					<td> :<input  type = "text" value="<?php echo $name;?>"  name= "name" id="name"> 
					<span id="err_name"> <?php echo $err_name; ?> </span> </td>
				</tr>
				
				<tr>
					<td> <span>Email</span> </td>
					<td> :<input type = "text" value= "<?php echo $email;?>" name= "email" id="email" onfocusout="checkEmail(this)">
					<span id="err_email"> <?php echo $err_email; ?> </span> </td>
					
				</tr>
				<tr>
					<td> <span>Password</span> </td>
					<td> :<input type = "password" value="<?php echo $password; ?>" name= "pass" id="pass"> 
					<span id="err_password"> <?php echo $err_password; ?> </span> </td>
				</tr>
				
				<tr>
					<td> <span>Confirm Password</span> </td>
					<td> :<input type = "password" value="<?php echo $cpass; ?>"  name= "cpass" id="cpass"> 
					<span id="err_cpassword" > <?php echo $err_cpass; ?> </span>  </td>
				</tr>
				
				<tr>
					<td> <span>Phone</span> </td>
					<td> :<input type = "text" placeholder="Number" value="<?php echo $number?>"  name= "number"  id="number" > 
						<span id="err_phone"> <?php echo $err_number; ?> </span> </td> 
				
					
				</tr>
				
				
				<tr>
					<td> <span>Address</span> </td>
					<td> :<textarea name="address" id="address"> <?php echo $address; ?> </textarea> 
					<span id="err_address"> <?php echo $err_address; ?> </span> </td>
				</tr>
				
				
				<tr>
					<td align= "center" colspan= "2"> <input type="submit" name="btn_addAdmin" value="Register"> </td>
				</tr>
		
			</table>
		</form>
	</div>
</body>
</html>