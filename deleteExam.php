<?php
	require "connect/connect.php";
	$examID =$_GET['examID'];
	$sql="DELETE FROM exam WHERE examID = '$examID' ";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:exam.php");
	}
?>