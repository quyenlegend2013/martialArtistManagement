<?php
	require "connect/connect.php";
	$a= $_POST['data'];
	//echo $a;
	$sql ="SELECT * FROM club cl INNER JOIN coach c ON cl.coachID = c.coachID WHERE cl.clubName like '%$a%'";
	$query =mysqli_query($conn,$sql);
	$num = mysqli_num_rows($query);
	if($num>0)
	{
		$stt=1;
		while($rs=mysqli_fetch_assoc($query))
		{
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rs["clubName"]."</td>";
			echo "<td>".$rs["clubDate"]."</td>";
			echo "<td>".$rs["startTime"]."</td>";
			echo "<td>".$rs["endTime"]."</td>";
			echo "<td>".$rs["coachName"]."</td>";
		echo '<td><a href="addClub.php"><button type="button" class="btn btn-success">View</button></a></td>';
		echo '<td><button type="button" id="edit" class="btn btn-success" onclick="location.href=\'editClub.php?clubID='.$rs["clubID"].'\'">Edit</button></td>';
		echo '<td><button type="button" id="delete" class="btn btn-success" onclick="deleteClub(' .$rs["clubID"].');">Delete</button></td>';
		
		echo "</tr>";
		$stt++;
		}
	}
?>