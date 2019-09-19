<?php
	require "connect/connect.php";
	$maID =$_GET['maID'];
	$examID =$_GET['examID'];
	
	$sql="DELETE FROM maexam WHERE maID = '$maID' and examID ='$examID'";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:examOfMartial.php");
	}
?>