<?php 

echo "<task>";

foreach ($results as $row) {

	echo "<title>";
		echo $row['t_title'];
	echo "</title>";

	echo "<dev>";
		echo $row['t_dev'];
	echo "</dev>";

	echo "<set_date>";
		echo $row['t_set_date'];
	echo "</set_date>";

	echo "<due_date>";
		echo $row['t_due_date'];
		echo "test";
	echo "</due_date>";

}

echo "</task>";

?>