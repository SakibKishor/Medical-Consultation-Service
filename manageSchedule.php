<?php
	require_once "controllers/scheduleController.php";
	$result=showSchedule($_SESSION["regno"]);
?>
<html>
<link rel="stylesheet" href="myStyle/style.css">
	<body class="back">
	<fieldset>
	<legend align="center"><h1 class="text">Manage Schedule</h1></legend>
		<table align="center" border="1" style="border-collapse:collapse;" class="text">
			<tr>
				<td>City</td>
				<td>Day</td>
				<td>Hospital</td>
				<td>Time</td>
				<td></td>
				<td></td>
			</tr>
<?php
	foreach($result as $row){
		echo "<tr>";
			echo "<td>".$row["City"]."</td>";
			echo "<td>".$row["Day"]."</td>";
			echo "<td>".$row["Hospital"]."</td>";
			echo "<td>".$row["Time"]."</td>";
			echo '<td><a href="editSchedule.php?id='.$row["ID"].'">Edit</a></td>';
			echo '<td><a href="deleteSchedule.php?id='.$row["ID"].'">Delete</a></td>';
		echo "</tr>";
	}


?>
</table>
</fieldset>
</body>
</html>