<h2>Update a task</h2>

<?php 

echo form_open('campaign/update');

echo validation_errors();

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