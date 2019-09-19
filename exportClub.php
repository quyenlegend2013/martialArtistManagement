<?php

	require "php/phpexcel.php";
	require "connect/connect.php";
	
	$objExcel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$objExcel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$sheet = $objExcel->getActiveSheet()->setTitle('Club');




$rowCount =1;
$sheet->setCellValue('A'.$rowCount, 'Club ID');
$sheet->setCellValue('B'.$rowCount, 'Club name');
$sheet->setCellValue('C'.$rowCount, 'Coach ID');
$sheet->setCellValue('D'.$rowCount, 'Coach date');
$sheet->setCellValue('E'.$rowCount, 'Start Time');
$sheet->setCellValue('F'.$rowCount, 'End Time');
$sheet->setCellValue('G'.$rowCount, 'Place');
$sheet->setCellValue('H'.$rowCount, 'Total');


// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
	$sql ="SELECT * FROM club";
	$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
	$rowCount++;
	$sheet->setCellValue('A'.$rowCount,$row['clubID']);
	$sheet->setCellValue('B'.$rowCount,$row['clubName']);
	$sheet->setCellValue('C'.$rowCount,$row['coachID']);
	$sheet->setCellValue('D'.$rowCount,$row['clubDate']);
	$sheet->setCellValue('E'.$rowCount,$row['startTime']);
	$sheet->setCellValue('F'.$rowCount,$row['endTime']);
	$sheet->setCellValue('G'.$rowCount,$row['place']);
	$sheet->setCellValue('H'.$rowCount,$row['total']);
}
$objWriter =new PHPExcel_Writer_Excel2007($objExcel);
$filenames="reportClub.xlsx";
$objWriter->save($filenames);


// Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
// ở đây mình lưu file dưới dạng excel2007
header('Content-Disposition: attachment; filename="'.$filenames.'"');
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Lenght'.filesize($filenames));
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: no-cache');
readfile($filenames);
return;
?>