<?php
	require "connect/connect.php";
	if(ISSET($_POST['res'])){
		$sql ="SELECT * FROM coach";
	$retval=mysqli_query($conn,$sql);
	$stt=1;
		while($rs=mysqli_fetch_assoc($retval))
		{
			
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rs["coachName"]."</td>";
			echo "<td>".$rs["coachPhone"]."</td>";
			echo "<td>".$rs["coachEmail"]."</td>";
			echo "<td>".$rs["coachFacebook"]."</td>";
		echo '<td><a href="viewMartialOfCoach.php?coachID='.$rs["coachID"].'"><button type="button" class="btn btn-success">List</button></a></td>';
		echo '<td><button type="button" id="edit" class="btn btn-success" onclick="location.href=\'editCoach.php?coachID='.$rs["coachID"].'\'">Edit</button></td>';
		echo '<td><button type="button" id="delete" class="btn btn-success" onclick="deleteCoach(' .$rs["coachID"].');">Delete</button></td>';
		
		echo "</tr>";
		$stt++;
		}

	}
	
	
	
?>
