<?php
	require "connect/connect.php";
	$coachID =$_GET['coachID'];
	$sql="DELETE FROM coach WHERE coachID = '$coachID' ";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:coach.php");
	}
?>