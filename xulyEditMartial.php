<?php
	require "connect/connect.php";
	$maID=$_POST["maID"];
	$maName =$_POST["maName"];
	$maGender =$_POST["maGender"];
	$maDob =$_POST["maDob"];
	$maPhone =$_POST["maPhone"];
	$clubName =$_POST["clubName"];
	
	
	$sqlClubID="SELECT clubID FROM club WHERE clubName='$clubName'";
	$queryClubID=mysqli_query($conn,$sqlClubID);
	$revalClubID=mysqli_fetch_array($queryClubID);
	$newClubID=$revalClubID['clubID'];
	
	$coachName =$_POST["coachName"];
	
	$sqlCoachID="SELECT coachID FROM coach WHERE coachName='$coachName'";
	$queryCoachID=mysqli_query($conn,$sqlCoachID);
	$revalCoachID=mysqli_fetch_array($queryCoachID);
	$newCoachID=$revalCoachID['coachID'];
	
	
	$maDoa =$_POST["maDoa"];
	$school =$_POST["school"];
	$level =$_POST["level"];
	$status =$_POST["status"];
	$maNote =$_POST["maNote"];
	$sql="UPDATE martial SET maName='$maName',maGender='$maGender',maDob='$maDob',maPhone='$maPhone',clubID='$newClubID',macoachID='$newCoachID',maDoa='$maDoa',school='$school',level='$level',status='$status',maNote='$maNote' WHERE maID='$maID'";
	$retval=mysqli_query($conn,$sql);
	if($retval>0)
	{
		header("location:martialArtist.php");
	}
	
	
?>