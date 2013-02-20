<h3>Results</h3>


<?php 

foreach($results as $row){
	echo "<p><a href='".base_url()."search_bootsify/".$row['id']."'>".$row['title']."</a>";
}

?>