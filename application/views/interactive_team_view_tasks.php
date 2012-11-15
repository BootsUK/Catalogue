

<h3>View tasks</h3>

<?php 

foreach($results as $row){
	echo "<section class='lister'>";
	echo "<p><a href=''><b>Title: </b> " . $row['t_title'] . "</a></p>";
	echo "<p><b>Description: </b> " . $row['t_desc'] . "</p>";
	echo "<p><b>Status: </b> " . $row['t_status'] . "</p>";
	echo "<p><b>Last modified: </b> " . $row['t_date_mod'] . "</p>";
	echo "<p><a href='#' onClick='confirm_action(\"update_tasks\"," . $row['t_id'] . ");'>Edit</a> || <a href='#' onClick='confirm_action(\"delete_tasks\",". $row['t_id'] .");'>Delete</a>";
	echo "</section><br />";
}

?>

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