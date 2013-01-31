<?php 

foreach($results as $row){
	echo "<h3>" . $row['t_title'] . "</h3>";

	echo "<br />";

	echo "<p><b>ID:</b> " . $row['t_id'] . "</p>";

	echo "<p><b>Description:</b><br />" . $row['t_desc'] . "</p>";

	echo "<p><b>Due:</b><br />" . $row['t_due'] . "</p>";

	echo "<p><b>Completion:</b><br />" . $row['t_comp'] . "</p>";

	echo "<p><b>Status:</b><br />" . $row['t_status'] . "</p>";

	echo "<p><b>Stakeholder: </b>" . $row['t_sh'] . "</p>";

	echo "<p><b>Last modified:</b><br />" . $row['t_date_mod'] . "</p>";

	echo "<p><b>Modified by:</b><br />" . $row['t_mod_by'] . "</p>";

	echo "<p><b>Comments:</b> <br />" . $row['t_comments'] . "</p>";

	echo "<p><b>Set by:</b><br />" . $row['t_set_by'] . "</p>";
}

?>