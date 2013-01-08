<?php 

echo form_open('interactive_team/add_tasks');

echo validation_errors();

echo "<ul class='alt'>";

echo "<p>Enter title: ";
echo form_input('t_title', 'Title');
echo "</p>";

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
echo form_textarea('t_desc', 'Description');
echo "</li>";

echo "<li>Enter priority: <br />";
echo form_dropdown('t_priority', $priority, '10');
echo "</li>";

echo "<li>Enter due date: <br />";
echo form_input('t_due', 'Due date');
echo "</li>";

echo "<li>Enter Completion date: <br />";
echo form_input('t_comp', 'Completion date');
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

echo "<li>Select status: <br />";
echo form_dropdown('t_status', $status, 'Set');
echo "</li>";

$dev = array(
	'None' => 'None',
	'Ewan Valentine' => 'Ewan Valentine',
	'Mike Titmus' => 'Mike Titmus',
	'Tom Hill' => 'Tom Hill',
	'Matt Conde' => 'Matt Conde'
	);
 
echo "<li>Enter developer name: <br />";
echo form_dropdown('t_dev', $dev, 'None');
echo "</li>";

echo "<li>Enter comments: <br />";
echo form_textarea('t_comments', 'Comments');
echo "</li>";

$data = array(
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Submit'
);

echo "</ul>";

echo form_button($data);

echo form_close();

?>