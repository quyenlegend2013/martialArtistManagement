<?php
	require "connect/connect.php";
	require "php/PHPExcel/IOFactory.php";
	$html="<table border='1'>";
	$objPHPExcel = PHPExcel_IOFactory::load('importCoach.xlsx');
	foreach($objPHPExcel -> getWorksheetIterator() as $worksheet)
	{
		$highestRow = $worksheet -> getHighestRow();
		
		
		for($row=2; $row<=$highestRow;$row++)
		{
			$html.="<tr>";
			$coachName = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(0,$row)->getValue());
			$coachDob = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(1,$row)->getValue());
			$coachGender = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(2,$row)->getValue());
			$coachPhone = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(3,$row)->getValue());
			$coachEmail = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(4,$row)->getValue());
			$coachFacebook = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(5,$row)->getValue());
			$roleID = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(6,$row)->getValue());
			$userName = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(7,$row)->getValue());
			$password = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(8,$row)->getValue());
			$sql="INSERT INTO coach (coachName,coachDob,coachGender,coachPhone,coachEmail,coachFacebook,roleID,userName,password) values ('$coachName','$coachDob','$coachGender','$coachPhone','$coachEmail','$coachFacebook','$roleID','$userName','$password')";
			mysqli_query($conn,$sql);
			$html.="<td>".$coachName."</td>";
			$html.="<td>".$coachDob."</td>";
			$html.="<td>".$coachGender."</td>";
			$html.="<td>".$coachPhone."</td>";
			$html.="<td>".$coachEmail."</td>";
			$html.="<td>".$coachFacebook."</td>";
			$html.="<td>".$roleID."</td>";
			$html.="<td>".$userName."</td>";
			$html.="<td>".$password."</td>";
			$html.="</tr>";
		}
	}
	$html.="</table>";
	echo $html;
	echo "<br /> inserted success ";

?>