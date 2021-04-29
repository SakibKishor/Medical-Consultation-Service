<?php
	require_once "controllers/registrationController.php";
?>
<html>
	<head></head>
	<link rel="stylesheet" href="myStyle/style.css">
	
	<body class="back">
		<div >
		<fieldset>
		<legend align="center"><h1 class="text">Doctor's signup information.</h1></legend>
		<form action="" method="POST" onsubmit="return validate()">
				<table align="center" class="text">
					<tr>
						<td align="right"><span>Name:</span></td>
						<td><input type="text" value="<?php echo $name;?>" id="name" name="name" >
						<span id="err_name"><?php echo $err_name;?></span></td>
						
					</tr>
					<tr>
						<td align ="right"><span>Registration no:</span></td>
						<td><input type="text" value="<?php echo $regno;?>" name="regno" id="regno">
						<span id="err_regno"><?php echo $err_regno;?></span></td>
					
					
					</tr>
					<tr>
						<td align="right"><span>Username:</span></td>
						<td><input type="text" id="username" onfocusout="checkUsername(this)" name="uname" value="<?php echo $uname;?>">
						<span id="err_username"><?php echo $err_uname;?></span></td>
						
					</tr>
					<tr>
						<td align="right"><span>Password:</span></td>
						<td><input type="password" id="password" name="upass" value="<?php echo $upass;?>"> 
						<span id="err_password"><?php echo $err_upass;?></span></td>
						
					</tr>
					
					<tr>
						<td align="right"><span>Confirm Password:</span></td>
						<td><input type="password" id="cpassword"  name="cpass" value="<?php echo $cpass;?>">
						<span id="err_cpassword"><?php echo $err_cpass;?></span></td>
						
					</tr>
					
					<tr>
						<td align="right"><span>Email:</span></td>
						<td><input type="text" id="email" name="email" value="<?php echo $email;?>">
						<span id="err_email"><?php echo $err_email;?></span></td>
					</tr>
					<tr>
						<td align="right"><span>Phone:</span></td>
						<td><input type="text" placeholder="Number" id="phone" name="number" value="<?php echo $number;?>">
						<span id="err_phone"><?php echo $err_number;?></span></td>
					</tr>
					<tr>
						<td align="right">Birth Date:</td>
						<td><input type="text" id="db"  name="dob" value="<?php echo $dob;?>" placeholder="dd-mm-yyyy">
						<span id="err_db"><?php echo $err_dob;?></span>
					</tr>
					<tr>
						
						<td align="right"><span>Gender:</span></td>
						<td><input type="radio" value="Male" name="gender" id="male">Male<input type="radio" value="Female" id="female" name="gender">Female
						<span id="err_gender"><?php echo $err_gender;?></span></td>
					</tr>
					<tr>
						<td align="right"><span>Specialized in:</span></td>
						<td>
							<select id="dept" name="dept" value="<?php echo $dept;?>">
								<option value="">Department</option>
								<option value="Cardiology">Cardiology</option>
								<option value="Dental Science">Dental Science</option>
								<option value="E.N.T">E.N.T</option>
								<option value="Endocrinology">Endocrinology</option>
								<option value="Medicine">Medicine</option>
								<option value="Hematology">Hematology</option>
								<option value="Neurology">Neurology</option>
								<option value="Oncology">Oncology</option>
								<option value="Orthopaedics">Orthopaedics</option>
								<option value="Pardiatrics">Pardiatrics</option>
								<option value="Surgery">Surgery</option>
								<option value="Urology">Urology</option>	
							</select>
							<span id="err_dept"><?php echo $err_dept;?></span></td>
						</td>
					</tr>
					<tr>
						<td align="center" colspan="2"><input class="btn" type="submit" name="sign_up"  value="Sign up"></td>
					</tr>
					<tr>
						<td align="center" colspan="2"><a href="login.php">Already have an account. Sign in</a></td>
					</tr>
					
				</table>
				 
				
			</form>
		</fieldset>
		</div>
	</body>
	<script>
		function checkUsername(control){
			var username=control.value;
			if(username.length<5){
				get("err_username").innerHTML=" *username should have atleast 5 characters";
				return;
			}
			var xhttp=new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){
					var rsp = this.responseText;
					if(rsp == "true"){
						document.getElementById("err_username").innerHTML=" valid";
						document.getElementById("err_username").style.color="green";
					}
					else{
						document.getElementById("err_username").innerHTML="<br> *Registration has already completed using this username";
						document.getElementById("err_username").style.color="red";
					}
				}
			};
			xhttp.open("GET","checkUsername.php?uname="+username,true);
			xhttp.send();
			
			
		}
		function get(id){
			return document.getElementById(id);
		} 
		function validate(){
			clear(); 
			var has_error=false;
			if(get("name").value == ""){
				get("err_name").innerHTML="* Name required";
				get("err_name").style.color="red";
				has_error=true;
			}
			if(get("regno").value == ""){
				get("err_regno").innerHTML="* Registration number required";
				get("err_regno").style.color="red";
				has_error=true;
			}
			if(get("username").value == ""){
				get("err_username").innerHTML="* Username required";
				get("err_username").style.color="red";
				has_error=true;
			}
			if(get("password").value== ""){
				get("err_password").innerHTML="* Password required";
				get("err_password").style.color="red";
				has_error=true;
			}
			if(get("cpassword").value== ""){
				get("err_cpassword").innerHTML="* Confirm Password required";
				get("err_cpassword").style.color="red";
				has_error=true;
			}
			if(get("email").value== ""){
				get("err_email").innerHTML="* Email address required";
				get("err_email").style.color="red";
				has_error=true;
			}
			if(get("phone").value== ""){
				get("err_phone").innerHTML="* Phone number required";
				get("err_phone").style.color="red";
				has_error=true;
			}
			if(get("db").value== ""){
				get("err_db").innerHTML="* Date of birth required";
				get("err_db").style.color="red";
				has_error=true;
			}
			if(!get("male").checked && !get("female").checked ){
				get("err_gender").innerHTML="* Select gender";
				get("err_gender").style.color="red";
				has_error=true;
			}
			if(get("dept").value== ""){
				get("err_dept").innerHTML="* Select a department";
				get("err_dept").style.color="red";
				has_error=true;
			}
			if(!has_error){
				return true;
			}
			return false;
		}
		function clear(){
			get("err_name").innerHTML="";
			get("err_regno").innerHTML="";
			get("err_username").innerHTML="";
			get("err_password").innerHTML="";
			get("err_cpassword").innerHTML="";
			get("err_email").innerHTML="";
			get("err_phone").innerHTML="";
			get("err_db").innerHTML="";
			get("err_gender").innerHTML="";
			get("err_dept").innerHTML="";
		}
	</script>
</html>