<?php

	require "php/phpexcel.php";
	require "connect/connect.php";
	
	$objExcel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$objExcel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$sheet = $objExcel->getActiveSheet()->setTitle('Exam Of Martial Artist');




$rowCount =1;
$sheet->setCellValue('A'.$rowCount, 'Ma ID');
$sheet->setCellValue('B'.$rowCount, 'Exam ID');
$sheet->setCellValue('C'.$rowCount, 'Name Martial Artist');
$sheet->setCellValue('D'.$rowCount, 'Name club');
$sheet->setCellValue('E'.$rowCount, 'Name exam');
$sheet->setCellValue('F'.$rowCount, 'Date Martial');
$sheet->setCellValue('G'.$rowCount, 'Level');

// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
	$sql ="SELECT * FROM maexam";
	$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
	$rowCount++;
	$sheet->setCellValue('A'.$rowCount,$row['maID']);
	$sheet->setCellValue('B'.$rowCount,$row['examID']);
	$sheet->setCellValue('C'.$rowCount,$row['maNameMartial']);
	$sheet->setCellValue('D'.$rowCount,$row['maNameClub']);
	$sheet->setCellValue('E'.$rowCount,$row['maNameExam']);
	$sheet->setCellValue('F'.$rowCount,$row['maDate']);
	$sheet->setCellValue('G'.$rowCount,$row['maExamLevel']);

}
$objWriter =new PHPExcel_Writer_Excel2007($objExcel);
$filenames="reportExamOfMartial.xlsx";
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