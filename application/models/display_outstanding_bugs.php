<h3>Outstanding bugs</h3>

<table class="sortable">
	<thead>
		<tr class="alt first last">
			<th rel="0" name="Bug title">Bug title</th>
			<th rel="1" name="Bug page title">Bug page title</th>
			<th rel="2" name="Bug CMS ID">Bug CMS ID</th>
			<th rel="3" name="Bug status">Bug status</th>
			<th rel="4" name="Bug priority">Bug priority</th>
			<th rel="5" name="Bug complete?">Bug complete?</th>
			<th rel="6" name="Edit | Delete">Edit | Delete</th>
		</tr>
	</thead>
<?php 

foreach($results as $row){
	echo "<tr>";
	echo "<td>" . $row['bug_title'] . "</td>";
	echo "<td>" . $row['bug_page_title'] . "</td>";
	echo "<td>" . $row['bug_cms_id'] . "</td>";
	echo "<td>" . $row['bug_status'] . "</td>";
	echo "<td>" . $row['bug_priority'] . "</td>";
	echo "<td>" . $row['bug_is_complete'] . "</td>";
	echo "<td><a href='".base_url()."bug_control/edit_bug/".$row['bug_id']."'><span class='icon gray' data-icon='7' style='display: inline-block;'></span>Edit</a>";
	echo " <a href='".base_url()."bug_control/delete_bug_logic/".$row['bug_id']."'><span class='icon gray' data-icon='m' style='display: inline-block;'></span>Delete</a>";
	echo "</tr>";
}

?>
</table>