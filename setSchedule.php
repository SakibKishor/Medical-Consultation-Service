<?php
	require_once "controllers/scheduleController.php";
?>
<html>
<link rel="stylesheet" href="myStyle/style.css">
	<body class="back" >
		<fieldset>
			<legend align="center"><h1 class="text">Welcome <?php echo $_SESSION["user"].".";?> Set your schedule</h1></legend>
			<form action="" method="POST" onsubmit="return validate()">
				<table align="center" class="text"> 
					<tr>
						<td align="right">Set City:</td>
						<td>
							<select id="city" name="city">
								<option value="">City</option>
								<option value="Dhaka">Dhaka</option>
								<option value="Khulna">Khulna</option>
								<option value="Chittagong">Chittagong</option>
								<option value="Sylhet">Sylhet</option>
							</select>
							<span id="err_city"><?php echo $err_city;?></span></td>
						</td>
					</tr>	
					<tr>
						<td align="right">Set Day:</td>
						<td>
							<select id="day" name="day">
								<option value="">Day</option>
								<option value="Saturday">Saturday</option>
								<option value="Sunday">Sunday</option>
								<option value="Monday">Monday</option>
								<option value="Tuesday">Tuesday</option>
								<option value="Wednesday">Wednesday</option>
								<option value="Thursday">Thurssday</option>
								<option value="Friday">Friday</option>
							</select>
							<span id="err_day"><?php echo $err_day;?></span>
						</td>
					</tr>
					<tr>
						<td align="right">Set Hospital:</td>
						<td>
							<select id="hospital" name="hospital">
								<option value="">Hospital</option>
								<option value="Ad-din Medical College, Hospital">Ad-din Medical College, Hospital</option>
								<option value="LABAID Specialized Hospital">LABAID Specialized Hospital</option>
							</select>
							<span id="err_hospital"><?php echo $err_hospital;?></span>
						</td>
					</tr>
					<tr>
						<td align="right">Set time:</td>
						<td><input type="text" id="time" name="time" value="<?php echo $time;?>" placeholder="instance: 9pm-11pm">
						<span id="err_time"><?php echo $err_time;?></span></td>
						<input type="hidden"  name="user" value="<?php echo $_SESSION["user"];?>">
						<input type="hidden"  name="user" value="<?php echo $_SESSION["regno"];?>">
					</tr>
					<tr>
						<td align="center" colspan="2"><input class="btn" type="submit" name="set"  value="Set schedule"></td>
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
			if(get("city").value == ""){
				get("err_city").innerHTML="* Enter city name";
				get("err_city").style.color="red";
				has_error=true;
			}
			if(get("day").value== ""){
				get("err_day").innerHTML="* Enter the day";
				get("err_day").style.color="red";
				has_error=true;
			}	
			if(get("hospital").value== ""){
				get("err_hospital").innerHTML="* Enter Hospital name";
				get("err_hospital").style.color="red";
				has_error=true;
			}	
			if(get("time").value== ""){
				get("err_time").innerHTML="* Enter the day";
				get("err_time").style.color="red";
				has_error=true;
			}				
			if(!has_error){
				return true;
			}
			return false;
		}			
		function clear(){
			get("err_city").innerHTML="";
			get("err_day").innerHTML="";
			get("err_hospital").innerHTML="";
			get("err_time").innerHTML="";
		}
	</script>
</html>