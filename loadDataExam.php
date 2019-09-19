<?php
	require "connect/connect.php";
	if(ISSET($_POST['res'])){
		$sql ="SELECT * FROM exam";
		$retval=mysqli_query($conn,$sql);
		$stt=1;
		while($rs=mysqli_fetch_assoc($retval))
		{
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rs["examName"]."</td>";
			echo "<td>".$rs["quy"]."</td>";
			echo "<td>".$rs["examDate"]."</td>";
			echo "<td>".$rs["examTime"]."</td>";
			echo "<td>".$rs["examiner"]."</td>";
		echo '<td><a href="viewMartialOfExam.php?examID='.$rs["examID"].'"><button type="submit" class="btn btn-success">List</button></a></td>';
		echo '<td><button type="button" id="edit" class="btn btn-success" onclick="location.href=\'editExam.php?examID='.$rs["examID"].'\'">Edit</button></td>';
		echo '<td><button type="button" id="delete" class="btn btn-success" onclick="deleteExam(' .$rs["examID"].');">Delete</button></td>';
		
		echo "</tr>";
		$stt++;
		}

	}
	
	
	
?>