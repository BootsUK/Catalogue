<h3>View tasks</h3>

<section class='lister'>
<?php 

foreach($results as $row){
	echo "<section>";
	echo "<table class='sortable'>";
	echo "<tr><th>Title</th> <th>Description</th> <th>Status</th> <th>Last modified</th> <th>Edit//Delete</th></tr>";
	echo "<tr>";
	echo "<td>" . $row['t_title'] . "</td>";
	echo "<td>" . $row['t_desc'] . "</td>";
	echo "<td>" . $row['t_date_mod'] . "</td>";
	echo "<td><a href='#' onClick='confirm_action(\"update_tasks\"," . $row['t_id'] . ");'>Edit</a> || <a href='#' onClick='confirm_action(\"delete_tasks\"," . $row['t_id'] . ");'>Delete</a></td>";
	echo "</tr>";
	echo "</table>";
	echo "</section>";
}

?>
</section>

<script type="text/javascript">

function confirm_action(action, id){

	if(action == "update_tasks"){
		var r = confirm("Are you sure you wish to edit this entry?");
	}else{
		var r = confirm("Are you sure you wish to delete this entry?");
	}

	if(r == true){
		window.location="http://evdatacenter.co.uk/boots/interactive_team/" + action + "/" + id;
	}
}

</script>