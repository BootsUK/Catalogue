<?php 

echo form_open('account/update_password');

echo validation_errors();

echo "<p>Enter your new password:";
echo form_password('password');
echo "</p>";

echo "<p>Re-enter your new password";
echo form_password('confirm_password');
echo "</p>";

echo form_submit('new_password_submit', 'Submit');

echo form_close();

?>