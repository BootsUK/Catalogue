<?php 

echo form_open('account/update_password');

echo validation_errors();

echo "<p>Enter your new password:";
echo form_password('password');
echo "</p>";

echo "<p>Re-enter your new password";
echo form_password('confirm_password');
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