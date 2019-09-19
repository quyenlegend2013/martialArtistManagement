<?php
	require "connect/connect.php";
	$clubID=$_POST['clubID'];
	if(ISSET($_POST['res'])){
		$sql ="SELECT * FROM (martial m  INNER JOIN club cl ON cl.clubID = m.clubID) INNER JOIN coach c ON c.coachID = cl.coachID WHERE cl.clubID='$clubID' ";
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
		
		echo "</tr>";
		$stt++;
		}

	}
	
	
	
?>