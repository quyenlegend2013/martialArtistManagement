<?php
	require "connect/connect.php";
	$maID =$_GET['maID'];
	$sql="DELETE FROM result WHERE maID = '$maID' ";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:resultOfExam.php");
	}
?>