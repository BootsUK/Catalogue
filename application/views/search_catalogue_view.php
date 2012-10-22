<h3>Search catalogue</h3>

<div class="form">
	<ul>
<?php

echo form_open('search/catalogue_search');

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

echo "<li><label for='search_term'>Select a template</label><br />";
echo form_dropdown('type', $type, 'templates', 'class="form_dropdown"');
echo "</li";

echo "<br />";
echo "<li><label for='search_term'>Search by:</label><br />";
echo form_dropdown('field', $field, 'title', 'class="form_dropdown"');
echo "</li>";

echo "<br />";
echo "<li>";
echo form_input('search_term', 'Search', 'class="form_input"');
echo "<span class='form_hint'>Enter a search term</span><br /></li>";

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
</ul>
</div>