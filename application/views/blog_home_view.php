<h2>Blog</h2>

<?php 

foreach($result as $row){
	echo "<h3>" . $row['b_title'] . "</h3>";
	echo $row['b_copy'];
	echo "<br />";
	echo "<p>Posted on: " . $row['b_date'] . " by " . $row['b_author'] . "</p>"; 
}

?>