<?php 

echo form_open('account/update_details');

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

echo form_close();

?>