<?php 

echo form_open('account/update_basic_details');

echo validation_errors();

echo "<p>Update first name: ";
echo form_input('first_name', 'First name');
echo "</p>";

echo "<p>Update last name: ";
echo form_input('last_name', 'Last name');
echo "</p>";

echo "<p>Update e-mail address";
echo form_input('email', 'E-Mail');
echo "</p>";

echo "<p>Update company:";
echo form_input('company', 'Company');
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