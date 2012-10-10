<div class="input_form">

<h3>Sign up!</h3>

<?php 

echo form_open('core/sign_up_validation');

echo validation_errors();

echo "<p>Enter your first name: ";
echo form_input('first_name', $this->input->post('first_name'));
echo "</p>";

echo "<p>Enter your last name: ";
echo form_input('last_name', $this->input->post('last_name'));
echo "</p>";

echo "<p>Enter a username: ";
echo form_input('user_name', $this->input->post('user_name'));
echo "</p>";

echo "<p>Enter a password: ";
echo form_password('password');
echo "</p>";

echo "<p>Re-enter your password: ";
echo form_password('cpassword');
echo "</p>";

echo "<p>Enter your e-mail: ";
echo form_input('email', $this->input->post('email'));
echo "</p>";

echo "<p>";
echo form_submit('sign_up_submit', 'Sign-up');
echo "</p>";

echo form_close();

?>

</div>

<br style="clear:both;" />