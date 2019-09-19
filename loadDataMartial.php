<?php
	require "connect/connect.php";
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
		echo '<td><a href="viewMartial.php?maID='.$rs["maID"].'"><button type="button" class="btn btn-success">View</button></a></td>';
		echo '<td><button type="button" id="edit" class="btn btn-success" onclick="location.href=\'editMartial.php?maID='.$rs["maID"].'\'">Edit</button></td>';
		echo '<td><button type="button" id="delete" class="btn btn-success" onclick="deleteMartial(' .$rs["maID"].');">Delete</button></td>';
		
		echo "</tr>";
		$stt++;
		}

	}
	
	
	
?>