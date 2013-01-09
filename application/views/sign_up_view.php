<h3>Sign up!</h3>

<ul class="alt">
<?php 

echo form_open('account/sign_up_validation');

echo validation_errors();

echo "<li><label for='first_name'>Enter your first name</label><br />";
echo form_input('first_name', $this->input->post('first_name'), 'required');
echo "<br /></li>";

echo "<li><label for='last_name'>Enter your last name</label><br />";
echo form_input('last_name', $this->input->post('last_name'));
echo "<br /></li>";

echo "<li><label for='password'>Enter a password</label><br />";
echo form_password('password');
echo "<br /></li>";

echo "<li><label for='cpassword'>Re-enter your password</label><br />";
echo form_password('cpassword');
echo "<br /></li>";

echo "<li><label for='email'>Enter your e-mail</label><br />";
echo form_input('email', $this->input->post('email'), 'required');
echo "<br /></li>";

echo "<li><label for=''>Company name</label><br />";
echo form_input('company', $this->input->post('company'));
echo "<br /></li>";

$data = array(
    'name' => 'submit',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Submit'
);

echo form_button($data);

echo form_close();

?>
</ul>

<br style="clear:both;" />