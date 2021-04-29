<?php
	require_once 'Controllers/AdminController.php';
	$uid= $_GET['id'];
	$query="select * from admin where Admin_Id='$uid'";
	$result= get($query);
	
	$name=$result[0]["Name"];
	$email=$result[0]["Email"];
	$address=$result[0]["Address"];
	$number=$result[0]["Phone"];
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
	<div align= "center" >
		<legend align= "center"><h2 >Update Admin </h2></legend> <br> <br>
		<form action="" method= "post" onsubmit="return updateAdminValidate()" >
			<table >
				<span align="center"><h3> ID:<?php echo $uid; ?> </h3> <span> <br>
				<tr>
					<td> <span>Name</span> </td> 
					<td> :<input type = "text" value="<?php echo $name;?>"  name= "name" id="name"> 
					<span id="err_name"> <?php echo $err_name; ?> </span> </td>
				</tr>
				
				<tr>
					<td> <span>Email</span> </td>
					<td> :<input type = "text" value= "<?php echo $email;?>" name= "email" id="email">
					<span id="err_email"> <?php echo $err_email; ?> </span> </td>
					
				</tr>
				
				<tr>
					<td> <span>Phone</span> </td>
					<td> :<input type = "text" placeholder="Number" value="<?php echo $number?>"  name= "number" id="number"   > 
						<span id="err_phone"> <?php echo $err_number; ?> </span> </td> 
						
					
				</tr>
				
				
				<tr>
					<td> <span>Address</span> </td>
					<td> :<textarea name="address" id="address" ><?php echo $address; ?> </textarea> 
					<span id="err_address"> <?php echo $err_address; ?> </span> </td></td>
				</tr> 
				
				<tr>
					<td align= "center" colspan= "2"> <input type="submit" name="btn_updateAdmin" value="Update Admin"> </td>
				</tr>
				
				
				
				
			</table>
		</form>
	</div>
		
	</body>
</html>