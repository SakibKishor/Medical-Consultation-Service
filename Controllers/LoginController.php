<?php
	require_once "Models/db_config.php";

	
	$username= "";
	$password= "";
	$err="";
	if (isset($_POST["btn_signin"]))
	{
		$s=authenticateUser($_POST["username"],$_POST["password"]);
		if( authenticateUser($_POST["username"],$_POST["password"]) )
		{
			session_start();
			$_SESSION["name"]=	$s["Name"];
			$_SESSION["adminId"]=$s["Admin_Id"];
			
			header("Location: Admindashboard.php");
		}
		else
		{
			$err= "*Username or password is invalid";
		}
		
	}
	
	function authenticateUser($username, $password)
	{
		$query= "select * from admin where Email='{$username}' and Password='{$password}' ";
		$result= get($query);
		//print_r($result);
		if(count($result)>0) //checking whether its an empty array
		{
			return $result[0];
		}
		return false;
	}
?>