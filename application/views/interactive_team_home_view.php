<h2>Interactive team || Home</h2>

<p><b>Please note that all tasks or changes to previously added tasks are logged and alerts are sent to the Admin to be reviewed and assigned.</b></p>

<br>

<p><a href="http://evdatacenter.co.uk/boots/developers_center/wish_list">Feature wish list</a></p>

<br>

<h3>Recently completed tasks</h3>

<section class='lister'>

<?php 
	echo "<section>";
	echo "<table class='sortable'>";
	echo "<thead>
	<tr class='alt first last'>
	<th rel='0' name='Title'>Title</th> 
	<th rel='1' name='Description'>Description</th> 
	<th rel='2' name='Status'>Status</th>
	<th rel='3' name='Set by'>Set by</th>
	<th rel='4' name='Priority'>Priority</th>
	<th rel='5' name='Developer'>Developer</th> 
	<th rel='6' name='Delete'>Delete</th></tr></thead>";
		
		foreach($results as $row){
			echo "<tr>";
			echo "<td><a href='detail_view/" . $row['t_c_id'] . "'>" . $row['t_c_title'] . "</a></td>";
			echo "<td>" . $row['t_c_desc'] . "</td>";
			echo "<td>" . $row['t_c_status'] . "</td>";
			echo "<td>" . $row['t_c_set_by'] . "</td>";
			echo "<td>" . $row['t_c_priority'] . "</td>";
			echo "<td>" . $row['t_c_dev'] . "</td>";
			echo "<td><a href='#' onClick='confirm_action(\"delete_tasks\"," . $row['t_c_id'] . ");'><span class='icon gray' data-icon='m' style='display: inline-block;'> </span></a></td>";
		}

	echo "</table>";
	echo "</section>";
?>

</section>

<script type="text/javascript">

function confirm_action(action, id){

	if(action == "update_prepare"){
		var r = confirm("Are you sure you wish to edit this entry?");
	}else{
		var r = confirm("Are you sure you wish to delete this entry?");
	}

	if(r == true){
		window.location="http://evdatacenter.co.uk/boots/interactive_team/" + action + "/" + id;
	}
}

</script>