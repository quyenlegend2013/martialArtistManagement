<?php
	require "connect/connect.php";
	$coachID=$_POST['coachID'];
	if(ISSET($_POST['res'])){
		$sql ="SELECT * FROM club cl INNER JOIN coach c ON cl.coachID=c.coachID WHERE cl.coachID='$coachID'";
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
		
		echo "</tr>";
		$stt++;
		}

	}
	
	
	
?>