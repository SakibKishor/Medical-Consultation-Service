<?php
	require_once "Models/db_config.php";
	
	$name="";
	$err_name="";
	
	$password="";
	$err_password="";
	
	$cpass="";
	$err_cpass="";
	
	$email="";
	$err_email="";
	
	$address="";
	$err_address="";
	
	$number="";
	$err_number="";
	
	$hasError=false;
	
	session_start();
	$addedby = $_SESSION["adminId"];
	
	
	

	if(isset($_POST["btn_addAdmin"]))
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
		
		
		if(empty($_POST["email"]))
		{
			$err_email="*Email Required";
			$hasError=true;
		}
		else{
			$email=htmlspecialchars($_POST["email"]);
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
		
		
		
		if(!ctype_digit($_POST["number"]))
		{
			$err_number="*Phone no should be all numbers";
			$hasError=true;
		}
		else
		{
			$number=htmlspecialchars($_POST["number"]);
		}
		
		
		if (empty($_POST["address"]))
		{
			$err_address="*Address Required";
			$hasError=true;
		}
		else if(strlen($_POST["address"])<5 )
		{
			$err_address="*Address Required";
			$hasError=true;
		}
		else
		{
			$address= htmlspecialchars($_POST["address"]);
		}
		
		
		if(!$hasError)
		{
			AddAdmin($name, $email, $password, $number, $address, $addedby);
		}
		
	}
	

	
	if(isset($_POST["btn_updateAdmin"]))
	{	
		$uid= $_GET['id'];
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
		
		if(empty($_POST["email"]))
		{
			$err_email="*Email Required";
			$hasError=true;
		}
		else{
			$email=htmlspecialchars($_POST["email"]);
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
		
		
		if (empty($_POST["address"]))
		{
			$err_address="*Address Required";
			$hasError=true;
		}
		else if(strlen($_POST["address"])<5 )
		{
			$err_address="*Address Required";
			$hasError=true;
		}
		else
		{
			$address= htmlspecialchars($_POST["address"]);
		}
		
		
		if(!$hasError)
		{
			UpdateAdmin($name, $email,$number, $address, $uid)	;
			
		}
	}
	
	function AddAdmin($name, $email, $password, $number, $address, $addedby)
	{
		$query="INSERT INTO admin VALUES (NULL, '$name','$email','$password','$number','$address','$addedby')";
		$result= execute($query);
		header("Location: AllAdmin.php");
			
	}
	
	function UpdateAdmin ($name, $email,$number, $address, $uid)
	{
		
		$query="UPDATE admin SET Name='$name', Email ='$email', Phone ='$number', Address ='$address'  WHERE Admin_Id= '$uid'" ;
			
		execute($query);
		header("Location: AllAdmin.php");
		
	}
	
	function checkEmail($email){
		$query="select * from admin where Email='$email' ";
		$result=get($query);
		if(count($result)>0)
		{
			return "false";
		}
		return "true";
	}
	
?>