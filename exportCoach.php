<?php

	require "php/phpexcel.php";
	require "connect/connect.php";
	
	$objExcel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$objExcel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$sheet = $objExcel->getActiveSheet()->setTitle('Coach');




$rowCount =1;
$sheet->setCellValue('A'.$rowCount, 'Coach ID');
$sheet->setCellValue('B'.$rowCount, 'Coach name');
$sheet->setCellValue('C'.$rowCount, 'Coach DOB');
$sheet->setCellValue('D'.$rowCount, 'Coach Gender');
$sheet->setCellValue('E'.$rowCount, 'Coach Phone');
$sheet->setCellValue('F'.$rowCount, 'Coach Email');
$sheet->setCellValue('G'.$rowCount, 'Coach Facebook');
$sheet->setCellValue('H'.$rowCount, 'Role');
$sheet->setCellValue('I'.$rowCount, 'User Name');
$sheet->setCellValue('J'.$rowCount, 'Password');

// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
	$sql ="SELECT * FROM coach";
	$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
	$rowCount++;
	$sheet->setCellValue('A'.$rowCount,$row['coachID']);
	$sheet->setCellValue('B'.$rowCount,$row['coachName']);
	$sheet->setCellValue('C'.$rowCount,$row['coachDob']);
	$sheet->setCellValue('D'.$rowCount,$row['coachGender']);
	$sheet->setCellValue('E'.$rowCount,$row['coachPhone']);
	$sheet->setCellValue('F'.$rowCount,$row['coachEmail']);
	$sheet->setCellValue('G'.$rowCount,$row['coachFacebook']);
	$sheet->setCellValue('H'.$rowCount,$row['roleID']);
	$sheet->setCellValue('I'.$rowCount,$row['userName']);
	$sheet->setCellValue('J'.$rowCount,$row['password']);
}
$objWriter =new PHPExcel_Writer_Excel2007($objExcel);
$filenames="reportCoach.xlsx";
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