<?php
	require "connect/connect.php";
	if(ISSET($_POST['res'])){
		$sql ="SELECT * FROM (result r INNER JOIN martial m ON r.maID = m.maID) INNER JOIN exam e ON r.examID=e.examID";
	$retval=mysqli_query($conn,$sql);
	$stt=1;
		while($rs=mysqli_fetch_assoc($retval))
		{
			
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rs["maName"]."</td>";
			echo "<td>".$rs["maDob"]."</td>";
			echo "<td>".$rs["examName"]."</td>";
			echo "<td>".$rs["totalScore"]."</td>";
			
		echo '<td><a href="viewResult.php?maID='.$rs["maID"].'&examID='.$rs["examID"].'"><button type="button" class="btn btn-success">View</button></a></td>';
		echo '<td><button type="button" id="delete" class="btn btn-success" onclick="deleteResult(' .$rs["maID"].');">Delete</button></td>';
		
		echo "</tr>";
		$stt++;
		}

	}
	
	
	
?>