<?php
	require "connect/connect.php";
	$examID=$_POST["examID"];
	$examName =$_POST["examName"];
	$quy =$_POST["quy"];
	
	$examDate =$_POST["examDate"];
	$examTime =$_POST["examTime"];
	$examiner =$_POST["examiner"];
	$sql="UPDATE exam SET examName='$examName',quy='$quy',examDate='$examDate',examTime='$examTime',examiner='$examiner' WHERE examID='$examID'";
	$retval=mysqli_query($conn,$sql);
	if($retval>0)
	{
		header("location:exam.php");
	}
	
	
?>