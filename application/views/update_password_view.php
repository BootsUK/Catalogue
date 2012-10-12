<?php 

echo form_open('update_password');

echo "<p>Enter your new password:";
echo form_input('password');
echo "</p>";

echo "<p>Re-enter your new password";
echo form_input('confirm_password');
echo "</p>";

echo form_button('new_password_submit', 'Submit');

echo form_close();

?>