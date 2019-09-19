<?php

	require "php/phpexcel.php";
	require "connect/connect.php";
	
	$objExcel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$objExcel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$sheet = $objExcel->getActiveSheet()->setTitle('Martial Artist');




$rowCount =1;
$sheet->setCellValue('A'.$rowCount, 'Ma ID');
$sheet->setCellValue('B'.$rowCount, 'Name');
$sheet->setCellValue('C'.$rowCount, 'Gender');
$sheet->setCellValue('D'.$rowCount, 'Dob');
$sheet->setCellValue('E'.$rowCount, 'Phone');
$sheet->setCellValue('F'.$rowCount, 'Club ID');
$sheet->setCellValue('G'.$rowCount, 'Coach ID');
$sheet->setCellValue('H'.$rowCount, 'Doa');
$sheet->setCellValue('I'.$rowCount, 'School');
$sheet->setCellValue('J'.$rowCount, 'Level');
$sheet->setCellValue('K'.$rowCount, 'status');
$sheet->setCellValue('L'.$rowCount, 'Note');

// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
	$sql ="SELECT * FROM martial";
	$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
	$rowCount++;
	$sheet->setCellValue('A'.$rowCount,$row['maID']);
	$sheet->setCellValue('B'.$rowCount,$row['maName']);
	$sheet->setCellValue('C'.$rowCount,$row['maGender']);
	$sheet->setCellValue('D'.$rowCount,$row['maDob']);
	$sheet->setCellValue('E'.$rowCount,$row['maPhone']);
	$sheet->setCellValue('F'.$rowCount,$row['clubID']);
	$sheet->setCellValue('G'.$rowCount,$row['coachID']);
	$sheet->setCellValue('H'.$rowCount,$row['maDoa']);
	$sheet->setCellValue('I'.$rowCount,$row['school']);
	$sheet->setCellValue('J'.$rowCount,$row['level']);
	$sheet->setCellValue('K'.$rowCount,$row['status']);
	$sheet->setCellValue('L'.$rowCount,$row['maNote']);
}
$objWriter =new PHPExcel_Writer_Excel2007($objExcel);
$filenames="reportMartial.xlsx";
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