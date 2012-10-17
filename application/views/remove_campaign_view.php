<?php 

echo form_open('campaign/delete');

echo validation_errors();

echo "<p>Enter the task ID of the entry you wish to delete";
echo form_input('id', 'ID');
echo "</p>";

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