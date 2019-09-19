<?php
	header('Content-Type: application/json');
	require "connect/connect.php";
	$maid=$_POST["maid"];
	$examid=$_POST["examid"];
	$sql="SELECT * FROM (result r INNER JOIN martial m ON m.maID=r.maID) INNER JOIN exam e ON e.examID=r.examID WHERE r.maID='$maid' and r.examID='$examid'";
	$queryResult=mysqli_query($conn,$sql);
	$data = array();
	foreach ($queryResult as $row) 
	{
		$data[] = $row;
	}
	mysqli_close($conn);

	echo json_encode($data);
	
?>