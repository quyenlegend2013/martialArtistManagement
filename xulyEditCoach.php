<?php
	require "connect/connect.php";
	$coachID=$_POST["coachID"];
	$coachName =$_POST["coachName"];
	$coachGender =$_POST["coachGender"];
	$coachEmail =$_POST["coachEmail"];
	$roleID =$_POST["roleID"];
	$coachDob =$_POST["coachDob"];
	$coachPhone =$_POST["coachPhone"];
	$coachFacebook =$_POST["coachFacebook"];
	$userName =$_POST["userName"];
	$password =$_POST["password"];
	$sql="UPDATE coach SET coachName='$coachName',coachDob='$coachDob',coachGender='$coachGender',coachPhone='$coachPhone',coachEmail='$coachEmail',coachFacebook='$coachFacebook',roleID='$roleID',userName='$userName',password='$password' WHERE coachID='$coachID'";
	$retval=mysqli_query($conn,$sql);
	if($retval>0)
	{
		header("location:coach.php");
	}
	
	
?>