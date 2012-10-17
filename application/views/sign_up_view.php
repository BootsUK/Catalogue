<div class="input_form">

<h3>Sign up!</h3>

<?php 

echo form_open('account/sign_up_validation');

echo validation_errors();

echo "<p>Enter your first name: ";
echo form_input('first_name', $this->input->post('first_name'));
echo "</p>";

echo "<p>Enter your last name: ";
echo form_input('last_name', $this->input->post('last_name'));
echo "</p>";

echo "<p>Enter a password: ";
echo form_password('password');
echo "</p>";

echo "<p>Re-enter your password: ";
echo form_password('cpassword');
echo "</p>";

echo "<p>Enter your e-mail: ";
echo form_input('email', $this->input->post('email'), 'class="email"');
echo "</p>";

echo "<p>Company name: ";
echo form_input('company', $this->input->post('company'));
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

</div>

<br style="clear:both;" />