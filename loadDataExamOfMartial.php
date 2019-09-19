<?php
	require "connect/connect.php";
	if(ISSET($_POST['res'])){
		$sql ="SELECT * FROM maexam ma INNER JOIN exam e ON e.examID=ma.examID";
	$retval=mysqli_query($conn,$sql);
	$stt=1;
		while($rs=mysqli_fetch_assoc($retval))
		{
			
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rs["maNameMartial"]."</td>";
			echo "<td>".$rs["maDate"]."</td>";
			echo "<td>".$rs["maExamLevel"]."</td>";
			echo "<td>".$rs["maNameClub"]."</td>";
			echo "<td>".$rs["maNameExam"]."</td>";
			echo "<td>".$rs["examDate"]."</td>";
			echo '<td><a href="addPointOfMartial.php?maID='.$rs["maID"].'&examID='.$rs["examID"].'"><button type="button" class="btn btn-success">Add Point</button></a></td>';
		echo '<td><button type="button" id="delete" class="btn btn-success" onclick="deleteExamMartial(' .$rs["maID"].','.$rs["examID"].');">Delete</button></td>';
		echo "</tr>";
		$stt++;
		}

	}
	
	
	
?>