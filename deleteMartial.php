<?php
	require "connect/connect.php";
	$maID =$_GET['maID'];
	$sqlmaExam="DELETE FROM maexam WHERE maID = '$maID' ";
	$retvalmaExam=mysqli_query($conn,$sqlmaExam);
	$sqlresult="DELETE FROM result WHERE maID = '$maID' ";
	$retvalResult=mysqli_query($conn,$sqlresult);
	$sqlMartial="DELETE FROM martial WHERE maID = '$maID' ";
	$retvalMartial=mysqli_query($conn,$sqlMartial); 
	
	
	if($retvalMartial>0)
	{
		
		header("location:martialArtist.php");
	}
?>