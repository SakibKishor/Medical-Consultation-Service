<?php
session_start();
	if(!isset($_SESSION["user"])){
		header("Location: login.php");
	}
require_once "models/db_config.php";
	$city="";
	$err_city="";
	$day="";
	$err_day="";
	$hospital="";
	$err_hospital="";
	$time="";
	$err_time="";
	$name="";
	$regno="";
	$has_error=false;
	if(isset($_POST["update"])){
		if($_POST["city"]!=""){
			$city=$_POST["city"];
		}
		else{
			$err_city="*Enter city";
			$has_error=true;
		}
		if($_POST["day"]!=""){
			$day=$_POST["day"];
		}
		else{
			$err_day="*Enter day";
			$has_error=true;
		}
		if($_POST["hospital"]!=""){
			$hospital=$_POST["hospital"];
		}
		else{
			$err_hospital="*Enter hospital";
			$has_error=true;
		}
		if(empty($_POST["time"])){
			$err_time="*Enter time";
			$has_error=true;
		}
		else if(strlen($_POST["time"])>6 && strlen($_POST["time"])<10)
		{
			$time=htmlspecialchars($_POST["time"]);	
		}
		else
		{
			$err_time="*Time should contain atleast 7 characters and atmost 9 characters";
			$has_error=true;
		}
		if(!$has_error){
			
			updateSchedule($city,$day,$hospital,$time,$id);
			header("Location:manageSchedule.php");
		}
	}
	if(isset($_POST["set"])){
		if($_POST["city"]!=""){
			$city=$_POST["city"];
		}
		else{
			$err_city="*Enter city";
			$has_error=true;
		}
		if($_POST["day"]!=""){
			$day=$_POST["day"];
		}
		else{
			$err_day="*Enter day";
			$has_error=true;
		}
		if($_POST["hospital"]!=""){
			$hospital=$_POST["hospital"];
		}
		else{
			$err_hospital="*Enter hospital";
			$has_error=true;
		}
		if(empty($_POST["time"])){
			$err_time="*Enter time";
			$has_error=true;
		}
		else if(strlen($_POST["time"])>6 && strlen($_POST["time"])<10)
		{
			$time=htmlspecialchars($_POST["time"]);	
		}
		else
		{
			$err_time="*Time should contain atleast 7 characters and atmost 9 characters";
			$has_error=true;
		}
		if(!$has_error){
			insertSchedue($city,$day,$hospital,$time,$_SESSION["user"],$_SESSION["regno"]);
			
			header("Location:dashboard.php");
			
		}
	}
	function insertSchedue($city,$day,$hospital,$time,$name,$regno){
		$query="insert into schedule values(NULL,'$city','$day','$hospital','$time','$name','$regno')";
		execute($query);
	}
	function showSchedule($regno){
		$query="select ID,City,Day,Hospital,Time from schedule where Reg_no='$regno'";
		$result=get($query);
		return $result;
	}
	function getSchedule($id){
		$query="select * from schedule where ID='$id'";
		$result=get($query);
		if(count($result)>0){
			return $result[0];
		}
		return false;
	}
	function updateSchedule($city,$day,$hospital,$time,$id){
		$query="update schedule set City='$city',Day='$day',Hospital='$hospital',Time='$time' where ID=$id";
		execute($query);
	}
	function deleteSchedule($id){
		$query="delete from schedule where ID=$id";
		execute($query);
		header("Location:manageSchedule.php");
	}
?>