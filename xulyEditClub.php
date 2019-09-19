<?php
	require "connect/connect.php";
	$clubID=$_POST["clubID"];
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
	$sql="UPDATE club SET clubName='$clubName',coachID='$newCoachID',clubDate='$clubDate',startTime='$startTime',endTime='$endTime',place='$place',total=' ' WHERE clubID='$clubID'";
	$retval=mysqli_query($conn,$sql);
	if($retval>0)
	{
		header("location:club.php");
	}
	
	
?>