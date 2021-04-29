<?php
	require_once "controllers/registrationController.php";
	if(!isset($_SESSION["user"])){
		header("Location: login.php");
	}
?>
<html>
<link rel="stylesheet" href="myStyle/style.css">
	<body class="back">
		<fieldset>
			<legend align="center"><h1 class="text">Update profile</h1></legend>
				<form action="" method="POST">
					<table align="center" class="text">
						<tr>
							<td align="right">Update Email:</td>
							<td><input type="text" name="uemail" value="<?php echo $_SESSION["email"]; ?>">
							<span><?php echo $err_email;?></span></td>
							
						</tr>
						<tr>
							<td align="right">Update phone no:</td>
							<td><input type="text" name="unumber" value="<?php echo $_SESSION["phone"]; ?>">
							<span><?php echo $err_number;?></span>
							<input type="hidden" name="reg" value="<?php echo $_SESSION["regno"]; ?>"></td>
						</tr>
						<tr>
							<td align="center" colspan="2">
								<input class="btn" type="submit" name="update" value="Update">
							</td>
						</tr>
					</table>
				</form>
		</fieldset>
	</body>
</html>

<td></td>