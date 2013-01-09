<h3>Update task</h3>

<?php 



$id = $this->uri->segment(3);

echo form_open('interactive_team/update_tasks/'.$id);

echo validation_errors();

echo "<ul class='alt'>";


foreach($results as $row){
	echo "<li>Enter title: <br />";
	echo form_input('t_title', $row['t_title']);
	echo "</li>";

	$priority = array(
		'1' => '1',
		'2' => '2',
		'3' => '3',
		'4' => '4',
		'5' => '5',
		'6' => '6',
		'7' => '7',
		'8' => '8',
		'9' => '9',
		'10' => '10'
		);

	echo "<li>Enter description: <br />";
	echo form_textarea('t_desc', $row['t_desc']);
	echo "</li>";

	echo "<li>Enter priority: <br />";
	echo form_dropdown('t_priority', $priority, $row['t_priority']);
	echo "</li>";

	echo "<li>Enter due date: <br />";
	echo form_input('t_due', $row['t_due'], 'class="datepicker"');
	echo "</li>";

	echo "<li>Enter Completion date: <br />";
	echo form_input('t_comp', $row['t_comp'], 'class="datepicker"');
	echo "</li>";

	$status = array(
		'Set' => 'Set',
		'Being briefed' => 'Being briefed',
		'In initial discussion phase' => 'In initial discussion phase',
		'With writers' => 'With writers',
		'With PML' => 'With PML',
		'With legal' => 'With legal',
		'With developers' => 'With developers',
		'Under developers review' => 'Under developers review',
		'Under initial design phase' => 'Under initial design phase',
		'Under design review phase' => 'Under design review phase',
		'Under final review phase' => 'Under final review phase',
		'Complete' => 'Complete',
		'On-hold' => 'On-hold',
		'Cancelled' => 'Cancelled'
		);

	echo "<li>Select status: <br /> ";
	echo form_dropdown('t_status', $status, $row['t_status']);
	echo "</li>";

	$dev = array(
		'None' => 'None',
		'Ewan Valentine' => 'Ewan Valentine',
		'Mike Titmus' => 'Mike Titmus',
		'Tom Hill' => 'Tom Hill',
		'Matt Conde' => 'Matt Conde'
		);
	 
	echo "<li>Enter developer name: <br />";
	echo form_dropdown('t_dev', $dev, $row['t_dev']);
	echo "</li>";

	echo "<li>Enter comments: <br />";
	echo form_textarea('t_comments', $row['t_comments']);
	echo "</li>";
}
echo "<li>";

$data = array(
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Submit'
);

echo form_button($data);

echo "</li>";

echo "</ul>";

echo form_close();

?>