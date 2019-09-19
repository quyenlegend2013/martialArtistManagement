<?php
	require "connect/connect.php";
	require "php/PHPExcel/IOFactory.php";
	$html="<table border='1'>";
	$objPHPExcel = PHPExcel_IOFactory::load('importClub.xlsx');
	foreach($objPHPExcel -> getWorksheetIterator() as $worksheet)
	{
		$highestRow = $worksheet -> getHighestRow();
		
		
		for($row=2; $row<=$highestRow;$row++)
		{
			$html.="<tr>";
			$clubName = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(0,$row)->getValue());
			$coachID = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(1,$row)->getValue());
			$clubDate = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(2,$row)->getValue());
			$startTime = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(3,$row)->getValue());
			$endTime = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(4,$row)->getValue());
			$place = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(5,$row)->getValue());
			$total = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(6,$row)->getValue());
			$sql="INSERT INTO club (clubName,coachID,clubDate,startTime,endTime,place,total) values ('$clubName','$coachID','$clubDate','$startTime','$endTime','$place','$total')";
			mysqli_query($conn,$sql);
			$html.="<td>".$clubName."</td>";
			$html.="<td>".$coachID."</td>";
			$html.="<td>".$clubDate."</td>";
			$html.="<td>".$startTime."</td>";
			$html.="<td>".$endTime."</td>";
			$html.="<td>".$place."</td>";
			$html.="<td>".$total."</td>";
			$html.="</tr>";
		}
	}
	$html.="</table>";
	echo $html;
	echo "<br /> inserted success ";

?>