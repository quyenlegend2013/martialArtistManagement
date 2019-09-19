<?php
	require "connect/connect.php";
	$maName =$_POST["maName"];
	$maGender =$_POST["maGender"];
	$maDob =$_POST["maDob"];
	$maPhone =$_POST["maPhone"];
	$clubName =$_POST["clubName"];
	$coachName =$_POST["coachName"];
	
	$sqlClubID="SELECT clubID FROM club WHERE clubName='$clubName'";
	$queryClubID=mysqli_query($conn,$sqlClubID);
	$revalClubID=mysqli_fetch_array($queryClubID);
	$newClubID=$revalClubID['clubID'];
	
	$sqlCoachID="SELECT coachID FROM club WHERE clubID='$newClubID'";
	$queryCoachID=mysqli_query($conn,$sqlCoachID);
	$revalCoachID=mysqli_fetch_array($queryCoachID);
	$newCoachID=$revalCoachID['coachID'];
	
	
	
	$maDoa =$_POST["maDoa"];
	$school =$_POST["school"];
	$level =$_POST["level"];
	$status =$_POST["status"];
	$maNote =$_POST["maNote"];
	$sql="INSERT INTO martial(maName,maGender,maDob,maPhone,clubID,macoachID,maDoa,school,level,status,maNote) values ('$maName','$maGender','$maDob','$maPhone','$newClubID','$newCoachID','$maDoa','$school','$level','$status','$maNote')";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:martialArtist.php");
	}

?>