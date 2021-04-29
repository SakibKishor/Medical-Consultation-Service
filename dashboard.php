<?php
	session_start();
	if(!isset($_SESSION["user"])){
		header("Location: login.php");
	}
?>
<html>
<link rel="stylesheet" href="myStyle/style.css">
	<body class="back">
		<fieldset>
		<legend align="center"><h1 class="text">Welcome <?php echo $_SESSION["user"];?></h1></legend>
			<table align="center">
				<tr>
					<td align="right">1 </td>
					<td><a href="updateProfile.php"> Update profile</a></td>
				</tr>
				<tr>
					<td align="right">2 </td>
					<td><a href="setSchedule.php"> Set schedule</a></td>
				</tr>
				<tr>
					<td align="right">3 </td>
					<td><a href="manageSchedule.php"> Manage schedule</a></td>
				</tr>
				<tr>
					<td align="right">4  </td>
					<td><a href="patientlist.php"> View patients list</a></td>
				</tr>
			</table>
		</fieldset>
	</body>
</html>