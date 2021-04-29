<?php
	require_once 'Controllers/LoginController.php'
?>


	
<html>
	<head> <link rel="stylesheet" href="style.css"> </head>
	<body>
		<div class="logindiv" align="center" >	
			<h1>Admin Sign In</h1>
			<form action="" method="POST">
				<table>
					<tr class="myfont">
						<td>Username: <input type="text" name ="username"> </td> <br>
					</tr>
					<tr class="myfont">
						<td>Password: <input type="password" name="password"></td> <br>
					</tr>
					<tr>
						<td><span> <?php echo $err; ?> </span></td>
					</tr>
					<tr class="myfont">
						<td colspan="2" align="right">
						<input class="btn" type ="submit" name= "btn_signin" value= "login">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>

