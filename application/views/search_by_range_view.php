<h3>View by date range</h3>

<section class='lister'>

<?php 
	echo "<section>";
	echo "<table class='sortable'>";
	echo "<thead>
	<tr class='alt first last'>
	<th rel='0' name='Title'>Title</th> 
	<th rel='1' name='Description'>Description</th> 
	<th rel='2' name='Status'>Status</th>
	<th rel='3' name='Stakeholder'>Stakeholder</th>
	<th rel='4' name='Completed'>Completed</th>
	<th rel='5' name='Developer'>Developer</th> 
	</tr></thead>";
		
		foreach($results as $row){
			echo "<tr>";
			echo "<td>" . $row['t_c_title'] . "</td>";
			echo "<td>" . $row['t_c_desc'] . "</td>";
			echo "<td>" . $row['t_c_status'] . "</td>";
			echo "<td>" . $row['t_c_sh'] . "</td>";
			echo "<td>" . $row['t_c_comp'] . "</td>";
			echo "<td>" . $row['t_c_dev'] . "</td>";
			echo "</tr>";
		}

	echo "</table>";
	echo "</section>";
?>

</section>