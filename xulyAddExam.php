<?php
	require "connect/connect.php";
	$examName =$_POST["examName"];
	$quy =$_POST["quy"];
	
	$examDate =$_POST["examDate"];
	$examTime =$_POST["examTime"];
	$examiner =$_POST["examiner"];
	
	$sql="INSERT INTO exam(examName,quy,examDate,examTime,examiner) values ('$examName','$quy','$examDate','$examTime','$examiner')";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:exam.php");
	}

?>