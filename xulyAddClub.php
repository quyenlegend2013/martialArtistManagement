<?php
	require "connect/connect.php";
	$clubName =$_POST["clubName"];
	$coachName =$_POST["coachName"];
	
	$sqlCoachID="SELECT coachID FROM coach WHERE coachName='$coachName'";
	$queryCoachID=mysqli_query($conn,$sqlCoachID);
	$revalCoachID=mysqli_fetch_array($queryCoachID);
	$newCoachID=$revalCoachID['coachID'];
	
	$clubDate =$_POST["clubDate"];
	$startTime =$_POST["startTime"];
	$endTime =$_POST["endTime"];
	$place =$_POST["place"];
	
	$sql="INSERT INTO club(clubName,coachID,clubDate,startTime,endTime,place,total) values ('$clubName','$newCoachID','$clubDate','$startTime','$endTime','$place','')";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:club.php");
	}

?>