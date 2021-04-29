<?php
	require_once "controllers/registrationController.php";
?>
<html>
<link rel="stylesheet" href="myStyle/style.css">
	<body class="back">
		<fieldset>
			<legend align="center"><h1 class="text">Login</h1></legend>
			<form action="" method="POST" onsubmit="return validate()">
				<table align="center" class="text">
					<tr>
						<td align="right">Username:</td>
						<td><input type="text" value="<?php echo $uname;?>" name="uname" id="uname" >
						<span id="err_uname"><?php echo $err_uname;?></span></td>
					</tr>
					<tr>
						<td align="right">Password:</td>
						<td><input type="password" value="<?php echo $upass;?>" name="upass" id="pass" >
						<span id="err_pass"><?php echo $err_upass;?></span></td>
					</tr>
					<tr>
						<td align="center" colspan="2"><input class="btn" type="submit" name="login"  value="Login"></td>
					</tr>
					<tr>
						<td align="right" colspan="2"><a href="registration.php">Not registered yet? Sign up</a></td>
					</tr>
				</table>
		</form>
		</fieldset>
	</body>
	<script>
		function get(id){
			return document.getElementById(id);
		}
		function validate(){
			clear();
			var has_error=false;
			if(get("uname").value == ""){
				get("err_uname").innerHTML="* Username required";
				get("err_uname").style.color="red";
				has_error=true;
			}
			if(get("pass").value== ""){
				get("err_pass").innerHTML="* Password required";
				get("err_pass").style.color="red";
				has_error=true;
			}			
			if(!has_error){
				return true;
			}
			return false;
		}			
		function clear(){
			get("err_uname").innerHTML="";
			get("err_pass").innerHTML="";
		}
	</script>
</html>