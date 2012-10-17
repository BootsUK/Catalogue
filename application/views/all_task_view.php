<h3>View tasks</h3>

<?php 

foreach ($tasks as $row) {
	echo "<section class='lister'>";
	echo "<b>ID:</b> " . $row['id'] . " " . "<b>Title:</b> " . $row['title'] . "<br />";
	echo "<b>Description: </b>" . $row['description'] . "<br /><br />";
	echo "<b>Manager: </b>" . $row['manager'] . "<br />";
	echo "<b>Campaign: </b>" . $row['campaign'] . "<br />";
	echo "<b>Due date: </b>" . $row['due_date'] . "<br />";
	echo "<b>Set date: </b>" . $row['set_date'] . "<br />";
	echo "<b>Comments: </b>" . $row['comments'] . "<br />";
	echo "<b>Status: </b>" . $row['status'] . "<br />";
	echo "<b>Last modified: </b>" . $row['modified'] . "<br /><br />";
	echo "</section>";
}

?>