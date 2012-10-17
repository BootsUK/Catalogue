<h3>View tasks</h3>

<?php 

foreach ($tasks as $row) {
	echo $row['id'] . "<br />";
	echo $row['title'] . "<br />";
}

?>