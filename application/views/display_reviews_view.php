<style type="text/css">

.scoreItem{
	height: 20px;
	background-color: #41549C !important;
}	

.scoreHolder{
	background-color: white !important;
	height: 32px;
	width: 100%;
}

</style>

<?php 

foreach($results as $row){
	echo "<ul class='alt'>";
		echo "<li>Title:<br />" . $row['r_title'] . "</li>";
		echo "<li>Review:<br />" . $row['r_review'] . "</li>";
		echo "<li>Developer:<br />" . $row['r_dev'] . "</li>";
		echo "<li>User:<br />" . $row['r_user'] . "</li>";
		echo "<li>Date:<br />" . $row['r_date'] . "</li>";
		echo "<li>Score:<br />" . $row['r_score'] . "</li>";
	echo "</ul><br />";
}

?>