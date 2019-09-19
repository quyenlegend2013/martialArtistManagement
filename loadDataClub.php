<?php
	require "connect/connect.php";
	if(ISSET($_POST['res'])){
		$sql ="SELECT * FROM club cl INNER JOIN coach c ON cl.coachID = c.coachID";
		$retval=mysqli_query($conn,$sql);
		$stt=1;
		while($rs=mysqli_fetch_assoc($retval))
		{
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rs["clubName"]."</td>";
			echo "<td>".$rs["clubDate"]."</td>";
			echo "<td>".$rs["startTime"]."</td>";
			echo "<td>".$rs["endTime"]."</td>";
			echo "<td>".$rs["coachName"]."</td>";
			echo "<td>".$rs["total"]."</td>";
			
		echo '<td><a href="viewMartialOfClub.php?clubID='.$rs["clubID"].'"><button type="button" class="btn btn-success">List</button></a></td>';
		echo '<td><button type="button" id="edit" class="btn btn-success" onclick="location.href=\'editClub.php?clubID='.$rs["clubID"].'\'">Edit</button></td>';
		echo '<td><button type="button" id="delete" class="btn btn-success" onclick="deleteClub(' .$rs["clubID"].');">Delete</button></td>';
		
		echo "</tr>";
		$stt++;
		}

	}
	
	
	
?>