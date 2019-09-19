<?php

	require "connect/connect.php";
	session_start();
	$email =trim($_POST["email"]);
	$password =trim($_POST["password"]);
	$_SESSION["user"]=$email;
	
	$sqlName="SELECT coachName FROM coach WHERE coachEmail='$email'";
	$queryName=mysqli_query($conn,$sqlName);
	$revalName=mysqli_fetch_array($queryName);
	$_SESSION["name"]=$revalName['coachName'];
	
	$sql="select * from coach where coachEmail='$email' and password='$password'";
	$result=mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);
	if($count==1)
	{
		header("location:dashboard.php");
	}
	else
	{
		header("location:login.php?check=f");
		
	}
	

	

?>