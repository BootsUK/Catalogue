<<<<<<< HEAD
<div class="input_form">
<?php 

echo form_open('core/check_credentials');

echo validation_errors();

echo "<p>Enter your e-mail: ";
echo form_input('email');
echo "</p>";

echo "<p>Enter your password: ";
echo form_password('password');
echo "</p>";

echo "<p>";
echo form_submit('login_submit', 'Login');
echo "</p>";

echo form_close();

?>
</div>
<a href="<?php echo base_url() . "core/sign_up"; ?>">Sign-up</a>
=======
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
>>>>>>> 6032359b0ec0e2183dc15b242c0196d16539f05f
