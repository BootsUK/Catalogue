<h3>Update bug</h3>

<ul class="alt">
<?php

	$id = $this->uri->segment(3);

	echo form_open('bug_control/edit_bug_logic/'.$id);

	echo validation_errors();

foreach($results as $row){

	echo "<li><label>But title</label><br />";
	echo form_input('bug_title', $row['bug_title']);
	echo "</li>";

	echo "<li><label>Bug page title</label><br />";
	echo form_input('bug_page_title', $row['bug_page_title']);
	echo "</li>";

	echo "<li><label>Bug CMS ID</label><br />";
	echo form_input('bug_cms_id', $row['bug_cms_id']);
	echo "<br /></li>";

	$regions = array(
		'uk' => 'United Kingdom',
		'roi' => 'Republic of Ireland',
		'int' => 'International'
		);

	echo "<li><label>Bug region</label><br />";
	echo form_dropdown('bug_region', $regions);
	echo "</li>";

	echo "<li><label>Bug description</label><br />";
	echo "<textarea name='bug_description' value='".$row['bug_description']."'>".$row['bug_description']."</textarea>";
	echo "</li>";

	$status = array(
		'With developers' => 'With Developers',
		'Pending' => 'Pending',
		'With writers' => 'With writers',
		'With legal' => 'With writers',
		'With PML' => 'With PML',
		'Under review' => 'Under review'
		);

	echo "<li><label>Bug status</label><br />";
	echo form_dropdown('bug_status', $status);
	echo "</li>";

	$priorities = array(
		'high' => 'High',
		'medium' => 'Medium',
		'low' => 'Low'
		);

	echo "<li><label>Bug priority</label><br />";
	echo form_dropdown('bug_priority', $priorities);
	echo "</li>";

	$developers = array(
		'Ewan Valentines' => 'Ewan Valentine',
		'Mike Titmus' => 'Mike Titmus',
		'Mike Ryan' => 'Mike Ryan'
		);

	echo "<li><label>Bug a developer</label><br />";
	echo form_dropdown('bug_developer', $developers);
	echo "</li>";

	$yn = array(
		'Yes' => 'Yes',
		'No' => 'No'
		);

	echo "<li><label>Is complete?</label><br />";
	echo form_dropdown('bug_is_complete', $yn);
	echo "</li>";
}

?>
	</ul>
	<input type="submit" name="submit" value="Submit">

</form>

