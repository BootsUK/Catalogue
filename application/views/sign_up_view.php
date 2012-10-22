<h3>Sign up!</h3>

<div class="form">
	<ul>
<?php 

echo form_open('account/sign_up_validation');

echo validation_errors();

echo "<li><label for='first_name'>Enter your first name</label>";
echo form_input('first_name', $this->input->post('first_name'), 'required');
echo "</li>";

echo "<li><label for='last_name'>Enter your last name</label>";
echo form_input('last_name', $this->input->post('last_name'));
echo "</li>";

echo "<li><label for='password'>Enter a password</label>";
echo form_password('password');
echo "</li>";

echo "<li><label for='cpassword'>Re-enter your password</label>";
echo form_password('cpassword');
echo "</li>";

echo "<li><label for='email'>Enter your e-mail</label>";
echo form_input('email', $this->input->post('email'), 'class="email"');
echo "</li>";

echo "<li><label for=''>Company name</label>";
echo form_input('company', $this->input->post('company'));
echo "</li>";

$data = array(
    'name' => 'submit',
    'class' => 'submit',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Submit'
);

echo form_button($data);

echo form_close();

?>
</ul>
</div>

<br style="clear:both;" />