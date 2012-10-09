<p><b>Login</b></p>

<?php 

echo form_open('account/signin');

echo form_input('email', 'E-Mail');

echo form_input('password', 'Password');

$data = array(
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Login'
);

echo form_button($data);

echo close_form();

?>