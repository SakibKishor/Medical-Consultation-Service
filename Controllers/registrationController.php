<?php
session_start();

require_once "models/db_config.php";

	$name="";
	$err_name="";
	$regno="";
	$err_regno="";
	$uname="";
	$err_uname="";
	$upass="";
	$err_upass="";
	$cpass="";
	$err_cpass="";
	$email="";
	$err_email="";
	$number="";
	$err_number="";
	$dob="";
	$err_dob="";
	$gender="";
	$err_gender="";
	$dept="";
	$err_dept="";
	$has_error=false;
	if(isset($_POST["update"])){
		if(empty($_POST["uemail"])){
			$err_email="*Email Required.";
			$has_error=true;
		}
		else if(strpos($_POST["uemail"],"@")=="" || strpos($_POST["uemail"],".")=="")
		{
			$err_email="*invalid email format";
			$has_error=true;
		}
		else
		{
			$email=htmlspecialchars($_POST["uemail"]);
		}
		if(empty($_POST["unumber"])){
			$err_number="*Number Required.";
			$has_error=true;
		}
		else if(is_numeric($_POST["unumber"])==false)
		{
			$err_number="*invalid number format";
			$has_error=true;
		}
		else if(strlen($_POST["unumber"])>11 && strlen($_POST["unumber"])<11)
		{
			$err_number="*invalid number format";
			$has_error=true;
		}
		else
		{
			$number=htmlspecialchars($_POST["unumber"]);
		}
		if(!$has_error){
			updateProfile($number,$email,$_POST["reg"]);
			$_SESSION["email"]=$email;
			$_SESSION["phone"]=$number;
			
			header("Location:dashboard.php");	
		}
		
	}
	if(isset($_POST["sign_up"])){
		if(empty($_POST["name"])){
			$err_name="*Enter Name";
			$has_error=true;
		}
		else
		{
			$name=htmlspecialchars($_POST["name"]);
		}
		if(empty($_POST["regno"])){
			$err_regno="*Enter Registration Number";
			$has_error=true;
		}
		else if(is_numeric($_POST["regno"])==false)
		{
			$err_regno="*invalid reg. no format";
			$has_error=true;
		}
		else if(strlen($_POST["regno"])<8)
		{
			$err_regno="*invalid reg. no format";
			$has_error=true;
		}
		else
		{
			$regno=htmlspecialchars($_POST["regno"]);
		}
		
		if(empty($_POST["uname"])){
			$err_uname="*Username required";
			$has_error=true;
		}
		else if(strlen($_POST["uname"])>0 && strlen($_POST["uname"])<5)
		{
			$err_uname="*Username should contain atleast 5 character";
			$has_error=true;
		}
		else
		{
			$uname=htmlspecialchars($_POST["uname"]);
		}
		if(empty($_POST["upass"]))
		{
			$err_upass="*Password required";
			$has_error=true;
		}
		else if(strlen($_POST["upass"])>0 && strlen($_POST["upass"])<8 )
		{
			$err_upass="*Password should contain atleast 8 character";
			$has_error=true;
		}
		else
		{
			$upass=htmlspecialchars($_POST["upass"]);
		}
		if(empty($_POST["cpass"])){
			$err_cpass="*Cofirm your password.";
			$has_error=true;
		}
		else if(($_POST["upass"])!=($_POST["cpass"]))
		{
			$err_cpass="*Password doesn't match";
			$has_error=true;
		}
		else
		{
			$cpass=htmlspecialchars($_POST["cpass"]);
		}
		if(empty($_POST["email"])){
			$err_email="*Email Required.";
			$has_error=true;
		}
		else if(strpos($_POST["email"],"@")=="" || strpos($_POST["email"],".")=="")
		{
			$err_email="*invalid email format";
			$has_error=true;
		}
		else
		{
			$email=htmlspecialchars($_POST["email"]);
		}
		if(empty($_POST["number"])){
			$err_number="*Number Required.";
			$has_error=true;
		}
		else if(is_numeric($_POST["number"])==false)
		{
			$err_number="*invalid number format";
			$has_error=true;
		}
		else if(strlen($_POST["number"])>0 && strlen($_POST["number"])<11)
		{
			$err_number="*invalid number format";
			$has_error=true;
		}
		else
		{
			$number=htmlspecialchars($_POST["number"]);
		}
		if(empty($_POST["dob"])){
			$err_dob="*Enter date of birth.";
			$has_error=true;
		}
		
			
	
		else if(strlen($_POST["dob"])>0 && strlen($_POST["dob"])<10)
		{
			$err_dob="*invalid date format";
			$has_error=true;
		}
		else
		{
			$dob=htmlspecialchars($_POST["dob"]);
		}
		if(isset($_POST["gender"])==false){
			$err_gender="*Select gender";
			$has_error=true;
		}
		else
		{
			$gender=$_POST["gender"];					
		}
		if($_POST["dept"]!==""){
			$dept=$_POST["dept"];
		}
		else{
			$err_dept="*Enter your department";
			$has_error=true;
		}
		if(!$has_error){
			addDoctor($name,$regno,$uname,$upass,$email,$number,$dob,$gender,$dept);
			header("Location:login.php");	
			
		}
	
	}
	if(isset($_POST["login"])){
		if(empty($_POST["uname"])){
			$err_uname="<br>*Username required";
			$has_error=true;
		}
		else{
			$uname=htmlspecialchars($_POST["uname"]);
		}
		if(empty($_POST["upass"]))
		{
			$err_upass="<br>*Password required";
			$has_error=true;
		}
		else{
			$upass=htmlspecialchars($_POST["upass"]);
		}
		if(!$has_error){
			if($suser=authenticateDoctor($uname,$upass)){
				$_SESSION["user"]=$suser["Name"];
				$_SESSION["regno"]=$suser["Reg_no"];
				$_SESSION["email"]=$suser["Email"];
				$_SESSION["phone"]=$suser["Phone"];
				header("Location:dashboard.php");
			}
			echo "Invalid username or password";
		}
	
		
	}
	function addDoctor($name,$regno,$uname,$password,$email,$phone,$dob,$gender,$dept){
		$query="insert into doctors values('$name','$regno','$uname','$password','$email','$phone','$dob','$gender','$dept')";
		execute($query);
		
	}
	function authenticateDoctor($username,$password){
		$query="select * from doctors where Username='$username' and Password='$password'";
		$result=get($query);
		if(count($result)>0){
			return $result[0];
		}
		return false;
	}
	function updateProfile($number,$email,$reg){
		$query="update doctors set Phone='$number',Email='$email' where Reg_no=$reg";
		execute($query);
	}
	function checkUsername($username){
		$query="select * from doctors where Username='$username'";
		$result=get($query);
		if(count($result)>0){
			return "false";
		}
		return "true";
	}		
?>