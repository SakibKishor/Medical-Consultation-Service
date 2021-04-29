<html>
	<head></head>
	<body>
		<?php
			$name="";
			$err_name="";
			$uname="";
			$err_uname="";
			$password="";
			$err_password="";
			$cpass="";
			$err_cpass="";
			$email="";
			$err_email="";
			$err_gender="";
			$biodata="";
			$err_bio="";
			$number="";
			$err_number="";
			$code="";
			$saddress="";
			$city="";
			$postal="";
			$err_address="";
			
			$hasError=false;
			
			
		
			if($_SERVER['REQUEST_METHOD']=="POST")
			{	
				if (empty($_POST["name"]))
				{
					$err_name="*Name Required";
					$hasError=true;
				}
				else if(strlen($_POST["name"])<2 )
				{
					$err_name="*Name should be more than one characters";
					$hasError=true;
				}
				else
				{
					$name=htmlspecialchars( $_POST["name"]);
				}
				
				
				
				if (empty($_POST["uname"]))
				{
					$err_uname="*Username Required";
					$hasError=true;
				}
				else if(strlen($_POST["uname"])<6 )
				{
					$err_uname="*Username should be at least 6 characters";
					$hasError=true;
				}
				else
				{
					$uname=htmlspecialchars( $_POST["uname"]);
				}
				
				
				if (empty($_POST["pass"]))
				{
					$err_password="*Password Required";
					$hasError=true;
				}
				
				else if (ctype_alpha($_POST["pass"]))
				{
					$err_password="*Password should contain at least one numeric character";
					$hasError=true;
				}
				
				else if (ctype_lower($_POST["pass"]))
				{
					$err_password="*Password should contain at least one uppercase character";
					$hasError=true;
				}
				
				else if (ctype_upper($_POST["pass"]))
				{
					$err_password="*Password should contain at least one lowercase character";
					$hasError=true;
				}
				
				else if (ctype_alnum ($_POST["pass"]))
				{
					$err_password="*Password should contain at least one special character";
					$hasError=true;
				}
				
				else if (strlen($_POST["pass"])<8)
				{
					$err_password="*Password should contain at least 8 characters";
					$hasError=true;
				}
				
				else
				{
					$password=htmlspecialchars($_POST["pass"]);
				}
				
				
				
				if ($_POST["pass"]!=$_POST["cpass"])
				{
					$err_cpass="*Password does not match";
					$hasError=true;
				}
				else
				{
					$cpass=htmlspecialchars($_POST["cpass"]);
				}
				
				if(empty($_POST["email"]))
				{
					$err_email="*Email Required";
					$hasError=true;
				}
				else{
					$email=htmlspecialchars($_POST["email"]);
				}
				
				if(empty($_POST["city"]) || empty($_POST["postal"]) || empty($_POST["street"]))
				{
					$err_address="*Please fill out all the address";
					$hasError=true;
				}
				
				else
				{
					
				}
			
			
			
				if(!ctype_digit($_POST["number"]))
				{
					$err_number="*Phone no should be all numbers";
					$hasError=true;
				}
				else
				{
					$number=htmlspecialchars($_POST["number"]);
				}
				
				
				
				if(!ctype_digit($_POST["code"]))
				{
					$err_number="*Phone no should be all numbers";
					$hasError=true;
				}
				else
				{
					$code=htmlspecialchars($_POST["code"]);
				}
				
				
				if(isset($_POST["gender"]))
				{
					
				}
				else
				{
					$err_gender="*Gender required";
				}
				
				
				if (empty($_POST["bio"]))
				{
					$err_bio="*Biodata required";
					$hasError=true;
				}
				else if(strlen($_POST["bio"])<10 )
				{
					$err_bio="*Biodata should be more than 10 words";
					$hasError=true;
				}
				else
				{
					$biodata= htmlspecialchars($_POST["bio"]);
				}
				
				if(!$hasError)
				{
					echo "Username:$uname";
					echo "$biodata";
				}
				
		
			}
		?>
	
	<fieldset>
		<legend align= "center"><h1 >Club Member Regestration</h1></legend>
		<form action="" method= "post">
			<table align= "center">
				<tr>
					<td> <span>Name</span> </td>
					<td> :<input type = "text" value="<?php echo $name;?>"  name= "name"> 
					<span> <?php echo $err_name; ?> </span> </td>
				</tr>
				
				<tr>
					<td> <span>Username</span> </td>
					<td> :<input type = "text" value="<?php echo $uname; ?>" name= "uname"> 
					<span> <?php echo $err_uname; ?> </span> </td>
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
					<td> :<input size="1" type = "text" placeholder="code"   value="<?php echo $code ?>"   name= "code"     >
					    -<input size="12" type = "text" placeholder="Number" value="<?php echo $number?>"  name= "number"    > 
						<span> <?php echo $err_number; ?> </span> </td> 
						
					
				</tr>
				
				<tr>
					<td> <span>Address</span> </td>
					<td> :<input type = "text" placeholder="Street Address"  name= "street"> <br>
						:<input size="1" type = "text" placeholder="City"  name= "city"> 
						-<input size="12" type = "text" placeholder="State"  name= "state"> <br>
						:<input type = "text" placeholder="Postal/Zip code"  name= "postal"> 
						<span> <?php echo $err_address; ?> </span> </td> 
				</tr>
				
				<tr>
					<td> <span>Birth Date</span> </td>
					<td> 
						<select>
							<option>Day</option>
							<?php
								for($i=1;$i<=31;$i++)
									echo "<option> $i </option>";
							?>
						</select>
						
						<select>
							<option>Month</option>
							<?php
								$month= array("January","February","March","April","May","June","July","August","September","October","November","December");
								foreach ($month as $m)
								{
									echo "<option> $m </option>";
								}
							?>
						</select>
						
						<select>
							<option>Year</option>
							<?php
								for($i=1980;$i<=2010;$i++)
									echo "<option> $i </option>";
							?>
						</select>
						
					
				</tr>
				
				<tr>
					<td> <span>Gender </span> </td>
					<td> <input type = "radio" value="Male" name= "gender">Male  <input type = "radio" value="male" name="gender">Female 
					<span> <?php echo $err_gender; ?> </span> </td>
				</tr>
				
				
					
				<tr>
					<td> <span>Where did you hear about us?</span> </td>
					<td> <input type= "checkbox" value="frnd" name= "ref[]">A Friend or Colleague <br>
						<input type= "checkbox" value="ggl" name= "ref[]" >Google <br>
						<input type= "checkbox" value="blog" name= "ref[]" >Blog post <br>
						<input type= "checkbox" value="news" name= "ref[]" >News article
						<!--sakib-->
						</td>
				</tr>
				
					
				</tr>
				
				
				<tr>
					<td> <span>Bio</span> </td>
					<td> :<textarea name="bio" value="<?php echo $biodata; ?>"  > </textarea> 
					<span> <?php echo $err_bio; ?> </span> </td></td>
				</tr>
				<tr>
					<td align= "center" colspan= "2"> <input type="submit" value="Register"> </td>
				</tr>
				
				
				
			</table>
		</form>
	</fieldset>	
		
	</body>
</html>