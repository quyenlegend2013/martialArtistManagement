<?php
	require "connect/connect.php";
	$a= $_POST['data'];
	//echo $a;
	$sql ="select * from exam where examName like '%$a%'";
	$query =mysqli_query($conn,$sql);
	$num = mysqli_num_rows($query);
	if($num>0)
	{
		$stt=1;
		while($rs=mysqli_fetch_assoc($query))
		{
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rs["examName"]."</td>";
			echo "<td>".$rs["quy"]."</td>";
			echo "<td>".$rs["examDate"]."</td>";
			echo "<td>".$rs["examTime"]."</td>";
			echo "<td>".$rs["examiner"]."</td>";
		echo '<td><a href="viewMartialExam.php?examID='.$rs["examID"].'"><button type="submit" class="btn btn-success">List</button></a></td>';
		echo '<td><button type="button" id="edit" class="btn btn-success" onclick="location.href=\'editClubID.php?clubID='.$rs["clubID"].'\'">Edit</button></td>';
		echo '<td><button type="button" id="delete" class="btn btn-success" onclick="deleteClub(' .$rs["clubID"].');">Delete</button></td>';
		
		echo "</tr>";
		$stt++;
		}
	}
?>