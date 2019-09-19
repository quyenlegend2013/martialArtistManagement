<?php
	require "connect/connect.php";
	$maID=$_GET['maID'];
	$examID=$_GET['examID'];
	//echo $maID." ".$examID;
	$sqlMaID="SELECT * FROM martial m INNER JOIN club cl ON m.clubID=cl.clubID WHERE m.maID='$maID'";
	$revalMartial=mysqli_query($conn,$sqlMaID);
	$queryMartial=mysqli_fetch_array($revalMartial);
	
	$sqlexamID="SELECT * FROM exam WHERE examID='$examID'";
	$revalExam=mysqli_query($conn,$sqlexamID);
	$queryExam=mysqli_fetch_array($revalExam);
	
	
	$clubName=$queryMartial["clubName"];
	$level=$queryMartial["level"];
	$coachName=$queryMartial["coachName"];
	$examName=$queryExam["examName"];
	$dateMartial=$queryMartial["maDob"];
	$martialName=$queryMartial["maName"];
	
	$sqlMaExam="INSERT INTO maexam(maID,examID,maNameMartial,maNameClub,maNameExam,maDate,maExamLevel) VALUES('$maID','$examID','$martialName','$clubName','$examName','$dateMartial',$level);";
	$retvalMaExam=mysqli_query($conn,$sqlMaExam); 
	if($retvalMaExam>0)
	{
		//header("location:viewMartialExam.php");
		 header("Location:viewMartialExam.php?examID=".$examID);
	}
?>