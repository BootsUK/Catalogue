<h3>Search users</h3>

<?php

echo form_open('search/user_search');

echo validation_errors();

$type = array(
	'email' => 'E-Mail',
	'first_name' => 'First name',
	'last_name' => 'Last name',
	'company' => 'Company'
	);

echo form_dropdown('type', $type, 'templates');

echo form_dropdown('field', $field, 'title');

echo form_input('search_term', 'Search');

$data = array(
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Submit'
);

echo form_button($data);

echo form_close();

?>