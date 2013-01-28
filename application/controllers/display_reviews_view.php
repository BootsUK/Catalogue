<?php 

foreach($result as $row){
	echo "<ul class='alt'>";
		echo "<li>" . $row['r_title'] . "</li>";
		echo "<li>" . $row['r_review'] . "</li>";
		echo "<li>" . $row['r_dev'] . "</li>";
		echo "<li>" . $row['r_user'] . "</li>";
		echo "<li>" . $row['r_date'] . "</li>";
		echo "<li>" . $row['r_score'] . "</li>";
	echo "</ul>";
}

?>