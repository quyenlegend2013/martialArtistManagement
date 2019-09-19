<?php
	require "connect/connect.php";
	require "php/PHPExcel/IOFactory.php";
	$html="<table border='1'>";
	$objPHPExcel = PHPExcel_IOFactory::load('importMartial.xlsx');
	foreach($objPHPExcel -> getWorksheetIterator() as $worksheet)
	{
		$highestRow = $worksheet -> getHighestRow();
		
		
		for($row=2; $row<=$highestRow;$row++)
		{
			$html.="<tr>";
			$maName = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(0,$row)->getValue());
			$maGender = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(1,$row)->getValue());
			$maDob = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(2,$row)->getValue());
			$maPhone = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(3,$row)->getValue());
			$clubID = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(4,$row)->getValue());
			$CoachID = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(5,$row)->getValue());
			$maDoa = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(6,$row)->getValue());
			$school = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(7,$row)->getValue());
			$level = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(8,$row)->getValue());
			$status = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(9,$row)->getValue());
			$maNote = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(10,$row)->getValue());
			$sql="INSERT INTO martial (maName,maGender,maDob,maPhone,clubID,maCoachID,maDoa,school,level,status,maNote) values ('$maName','$maGender','$maDob','$maPhone','$clubID','$CoachID','$maDoa','$school','$level','$status','$maNote')";
			mysqli_query($conn,$sql);
			$html.="<td>".$maName."</td>";
			$html.="<td>".$maGender."</td>";
			$html.="<td>".$maDob."</td>";
			$html.="<td>".$maPhone."</td>";
			$html.="<td>".$clubID."</td>";
			$html.="<td>".$CoachID."</td>";
			$html.="<td>".$maDoa."</td>";
			$html.="<td>".$school."</td>";
			$html.="<td>".$level."</td>";
			$html.="<td>".$status."</td>";
			$html.="<td>".$maNote."</td>";
			$html.="</tr>";
		}
	}
	$html.="</table>";
	echo $html;
	echo "<br /> Inserted success ";

?>