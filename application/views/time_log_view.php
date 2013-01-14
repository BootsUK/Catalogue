<h3>Time records:</h3>

<section>
	<table>
		<tr>
			<th>ID</th>
			<th>Email</th>
			<th>Action</th>
			<th>Date</th>
			<th>Time</th>
			<th>IP Address</th>
		</tr>
	<?php 
	
	foreach($results as $row){
		echo "<tr>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['action'] . "</td>";
		echo "<td>" . $row['date'] . "</td>";
		echo "<td>" . $row['time'] . "</td>";
		echo "<td>" . $row['ip'] . "</td>";
		echo "</tr>";
	}
	
	?>
	</table>
</section>