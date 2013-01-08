<h3>View tasks</h3>

<section class='lister'>

<?php 
	echo "<section>";
	echo "<table class='sortable'>";
	echo "<thead><tr class='alt first last'><th rel='0' name='Title'>Title</th> <th rel='1' name='Description'>Description</th> <th rel='2' name='Status'>Status</th> <th rel='3' name='Last modified'>Last modified</th> <th rel='4' name='Edit//Delete'>Edit//Delete</th></tr></thead>";
		
		foreach($results as $row){
			echo "<tr>";
			echo "<td>" . $row['t_title'] . "</td>";
			echo "<td>" . $row['t_desc'] . "</td>";
			echo "<td>" . $row['t_status'] . "</td>";
			echo "<td>" . $row['t_date_mod'] . "</td>";
			echo "<td><a href='#' onClick='confirm_action(\"update_tasks\"," . $row['t_id'] . ");'><span class='icon gray' data-icon='7' style='display: inline-block;'></span></a><a href='#' onClick='confirm_action(\"delete_tasks\"," . $row['t_id'] . ");'><span class='icon gray' data-icon='m'></span></a></td>";
			echo "</tr>";
		}

	echo "</table>";
	echo "</section>";
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