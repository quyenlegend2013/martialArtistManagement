<?php
header('Content-Type: application/json');

require "connect/connect.php";

$sqlcountMartial="SELECT e.quy ,count(m.maID) as 'dem' FROM (martial m INNER JOIN maexam ma ON m.maID=ma.maID) INNER JOIN exam e ON ma.examID=e.examID  GROUP BY e.quy";
$result = mysqli_query($conn,$sqlcountMartial);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
mysqli_close($conn);

echo json_encode($data);
?>