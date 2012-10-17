<?php 

echo form_open('campaign/create');

echo validation_errors();

echo "<p>Enter a title";
echo form_input('title', 'Title');
echo "</p>";

echo "<p>Enter a description";
echo form_input('description', 'Description');
echo "</p>";

echo "<p>Enter campaign name:";
echo form_input('campaign', 'Campaign');
echo "</p>";

echo "<p>Campaign manager, or manager";
echo form_input('manager', 'Manager');
echo "</p>";

/* Implement jQuery UI date picker function */

echo "<p>Due date:";
echo form_input('due_date', 'Due date');
echo "</p>";

/* due date set server side */

echo "<p>Enter comments";
echo form_input('comments', 'Comments');
echo "</p>";

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

echo "<p>Select a status";
echo form_dropdown('status', $status, 'Set');
echo "</p>";

$data = array(
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Submit'
);

echo form_button($data);

/* modified field fulfills by server side request */

echo form_close();

?>