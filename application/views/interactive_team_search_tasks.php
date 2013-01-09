<h3>Search tasks</h3>

<?php 

echo form_open('interactive_team/search_results');

echo validation_errors();

echo "<ul class='alt'>";

echo "<li>Enter a search term<br />";
echo form_input('search_term', 'Search term');
echo "</li><br/>";

$criteria = array(
	't_tile' => 'Title',
	't_desc' => 'Description',
	't_priority' => 'Priority',
	't_due' => 'Due date'
	);

echo "<li>";
echo form_dropdown('search_criteria', $criteria);
echo "</li>";

$data = array(
    'name' => 'submit',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Submit'
);

echo "<li>";
echo form_button($data);
echo "</li>";

echo "</ul>";

echo form_close();

?>