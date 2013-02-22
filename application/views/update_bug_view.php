<h3>Update bug</h3>

<form action="<?php echo base_url(); ?>bug_control/edit_bug_logic">

<?php

foreach($results as $row){
	echo "<label>But title</label><br />";
	echo form_input('bug_title', $row['bug_title']);
	echo "<br />";

	echo "<label>Bug page title</label><br />";
	echo form_input('bug_page_title', $row['bug_page_title']);
	echo "<br />";

	echo "<label>Bug CMS ID</label><br />";
	echo form_input('bug_cms_id', $row['bug_cms_id']);
	echo "<br />";

	$regions = array(
		'uk' => 'United Kingdom',
		'roi' => 'Republic of Ireland',
		'int' => 'International'
		);

	echo "<label>Bug region</label><br />";
	echo form_dropdown('bug_region', $regions);
	echo "<br />";

	echo "<label>Bug description</label><br />";
	echo "<textarea value=".$row['bug_description']."></textarea>";
	echo "<br />";

	$status = array(
		'With developers' => 'With Developers',
		'Pending' => 'Pending',
		'With writers' => 'With writers',
		'With legal' => 'With writers',
		'With PML' => 'With PML',
		'Under review' => 'Under review'
		);

	echo "<label>Bug status</label><br />";
	echo form_dropdown('bug_status', $status);
	echo "<br />";

	$priorities = array(
		'high' => 'High',
		'medium' => 'Medium',
		'low' => 'Low'
		);

	echo "<label>Bug priority</label><br />";
	echo form_dropdown('bug_priority', $priorities);
	echo "<br />";

	$developers = array(
		'Ewan Valentines' => 'Ewan Valentine',
		'Mike Titmus' => 'Mike Titmus',
		'Mike Ryan' => 'Mike Ryan'
		);

	echo "<label>Bug a developer</label><br />";
	echo form_dropdown('bug_developer', $developers);
	echo "<br />";
}

?>

	<input type="submit" name="submit" value="Submit">

</form>

