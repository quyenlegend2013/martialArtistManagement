<?php
	require "connect/connect.php";
	$maID=$_POST["maID"];
	$examID=$_POST["examID"];
	//echo $maID." ".$examID;
	$resultExaminer=$_POST["resultExaminer"];
	$totalScore=$_POST["totalScore"];
	$scoreOfPunch=$_POST["scoreOfPunch"];
	$scoreOfKick=$_POST["scoreOfKick"];
	$scoreOfMain=$_POST["scoreOfMain"];
	$scoreOfPractice=$_POST["scoreOfPractice"];
	$scoreOfCounterVailing=$_POST["scoreOfCounterVailing"];
	$scoreOfPhysical=$_POST["scoreOfPhysical"];
	
	$sql="INSERT INTO result (maID,examID,scoreOfPunch,scoreOfKick,scoreOfMain,scoreOfPractice,scoreOfCounterVailing,scoreOfPhysical,totalScore,resultExaminer) values ('$maID','$examID','$scoreOfPunch','$scoreOfKick','$scoreOfMain','$scoreOfPractice','$scoreOfCounterVailing','$scoreOfPhysical','$totalScore','$resultExaminer')";
	$query=mysqli_query($conn,$sql);
	
	if($query>0)
	{
		header("location:examOfMartial.php");
	}
?>