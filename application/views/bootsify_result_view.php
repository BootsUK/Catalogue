<h3>Results</h3>


<?php 

foreach($results as $row){
	echo "<p><a href='".base_url()."interactive_team/get_bootsify_by_id/".$row['id']."'>".$row['title']."</a>";
}

?>