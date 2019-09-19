<?php
	require "connect/connect.php";
	$clubID =$_GET['clubID'];
	$sql="DELETE FROM club WHERE clubID = '$clubID' ";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:club.php");
	}
?>