<?php
	require "connect/connect.php";
	$a= $_POST['data'];
	//echo $a;
	$sql ="select * from coach where coachName like '%$a%'";
	$query =mysqli_query($conn,$sql);
	$num = mysqli_num_rows($query);
	if($num>0)
	{
		$stt=1;
		while($rs=mysqli_fetch_assoc($query))
		{
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rs["coachName"]."</td>";
			echo "<td>".$rs["coachPhone"]."</td>";
			echo "<td>".$rs["coachEmail"]."</td>";
			echo "<td>".$rs["coachFacebook"]."</td>";
		echo '<td><a href="viewCoach.php?coachID='.$rs["coachID"].'"><button type="button" class="btn btn-success">View</button></a></td>';
		echo '<td><button type="button" id="edit" class="btn btn-success" onclick="location.href=\'editCoachID.php?coachID='.$rs["coachID"].'\'">Edit</button></td>';
		echo '<td><button type="button" id="delete" class="btn btn-success" onclick="deleteCoach(' .$rs["coachID"].');">Delete</button></td>';
		
		echo "</tr>";
		$stt++;
		}
	}
?>