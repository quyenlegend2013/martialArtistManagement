<?php
	require "connect/connect.php";
	$exam=$_POST['examID'];
	if(ISSET($_POST['res'])){
		$sql ="SELECT * FROM (martial m  INNER JOIN club cl ON cl.clubID = m.clubID) INNER JOIN coach c ON c.coachID = cl.coachID";
		$retval=mysqli_query($conn,$sql);
		$stt=1;
		while($rs=mysqli_fetch_assoc($retval))
		{
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rs["maName"]."</td>";
			echo "<td>".$rs["maDob"]."</td>";
			echo "<td>".$rs["clubName"]."</td>";
			echo "<td>".$rs["coachName"]."</td>";
			echo "<td>".$rs["level"]."</td>";
			echo "<td>".$rs["status"]."</td>";
		echo '<td><a href="xulyMartialExam.php?maID='.$rs["maID"].'&examID='.$exam.'"><button type="button" class="btn btn-success">Add</button></a></td>';
		
		echo "</tr>";
		$stt++;
		}

	}
	
	
	
?>