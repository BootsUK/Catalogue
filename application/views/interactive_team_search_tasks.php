<h3>Search taks</h3>

<?php 

echo form_open('interactive_team/search_tasks');

echo validation_errors();

echo form_input();

$criteria = array(
	'Title' => 't_title',
	'Description' => 't_desc',
	'Priority' => 't_priority'
	);

echo form_dropdown();

echo form_close();

?>