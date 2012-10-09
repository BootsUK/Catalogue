<?php

echo form_open('core/search');

$type = array(
	'all' => 'All',
	'template' => 'Template',
	'design' => 'Design',
	'component' => 'Component'
	);

$search_term = array(
	'all' => 'All',
	'title' => 'Title',
	'description' => 'Description',
	'id' => 'ID'
	);

echo form_dropdown('Select', $type, 'All');

echo form_dropdown('Select', $search_term, 'All');

echo form_input();

echo form_close();

?>