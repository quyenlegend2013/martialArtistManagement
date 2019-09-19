<?php

	require "php/phpexcel.php";
	require "connect/connect.php";
	
	$objExcel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$objExcel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$sheet = $objExcel->getActiveSheet()->setTitle('Result');




$rowCount =1;
$sheet->setCellValue('A'.$rowCount, 'Exam ID');
$sheet->setCellValue('B'.$rowCount, 'Ma ID');
$sheet->setCellValue('C'.$rowCount, 'Score of punch');
$sheet->setCellValue('D'.$rowCount, 'Score of kick');
$sheet->setCellValue('E'.$rowCount, 'Score of main');
$sheet->setCellValue('F'.$rowCount, 'Score of practice');
$sheet->setCellValue('G'.$rowCount, 'Score of counter vailing');
$sheet->setCellValue('H'.$rowCount, 'Score of physical');
$sheet->setCellValue('I'.$rowCount, 'Total scroce');
$sheet->setCellValue('J'.$rowCount, 'Examiner');

// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
	$sql ="SELECT * FROM result";
	$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
	$rowCount++;
	$sheet->setCellValue('A'.$rowCount,$row['examID']);
	$sheet->setCellValue('B'.$rowCount,$row['maID']);
	$sheet->setCellValue('C'.$rowCount,$row['scoreOfPunch']);
	$sheet->setCellValue('D'.$rowCount,$row['scoreOfKick']);
	$sheet->setCellValue('E'.$rowCount,$row['scoreOfMain']);
	$sheet->setCellValue('F'.$rowCount,$row['scoreOfPractice']);
	$sheet->setCellValue('G'.$rowCount,$row['scoreOfCounterVailing']);
	$sheet->setCellValue('H'.$rowCount,$row['scoreOfPhysical']);
	$sheet->setCellValue('I'.$rowCount,$row['totalScore']);
	$sheet->setCellValue('J'.$rowCount,$row['resultExaminer']);
}
$objWriter =new PHPExcel_Writer_Excel2007($objExcel);
$filenames="reportResult.xlsx";
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