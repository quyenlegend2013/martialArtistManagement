<?php
header('Content-Type: application/json');

require "connect/connect.php";

$sqlcountMartialLevel="SELECT m.level ,count(m.maID) as 'dem' FROM martial m GROUP BY m.level";
$result = mysqli_query($conn,$sqlcountMartialLevel);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
mysqli_close($conn);

echo json_encode($data);
?>