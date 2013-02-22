<h3>Results</h3>


<?php

foreach($results as $row){
	echo "<p><a href='".base_url()."interactive_team/get_bootsify_by_id/".$row['id']."'>".$row['title']."</a><br />";
	echo "<a href='".base_url()."interactive_team/delete_bootsify_by_id/".$row['id']."'>Delete</a>";
	echo " || ";
	echo "<a href='".base_url()."interactive_team/edit_bootsify_by_id_form/".$row['id']."'>Edit</a></p>";
}

?>