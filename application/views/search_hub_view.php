<h3>Search catalogue</h3>

<?php

echo form_open('search/search');

echo validation_errors();

$type = array(
	'templates' => 'Template',
	'layouts' => 'Layout',
	'components' => 'Component'
	);

$field = array(
	'title' => 'Title',
	'description' => 'Description',
	'id' => 'ID'
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