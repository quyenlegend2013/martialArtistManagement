<?php
	require "connect/connect.php";
	$coachName =$_POST["coachName"];
	$coachGender =$_POST["coachGender"];
	$coachEmail =$_POST["coachEmail"];
	$roleID =$_POST["roleID"];
	$coachDob =$_POST["coachDob"];
	$coachPhone =$_POST["coachPhone"];
	$coachFacebook =$_POST["coachFacebook"];
	$userName =$_POST["userName"];
	$password =$_POST["password"];
	$sql="INSERT INTO coach(coachName,coachDob,coachGender,coachPhone,coachEmail,coachFacebook,roleID,userName,password) values ('$coachName','$coachDob','$coachGender','$coachPhone','$coachEmail','$coachFacebook','$roleID','$userName','$password')";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:coach.php");
	}

?>