<div class="input_form">
<?php 

echo form_open('account/check_credentials');

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
<a href="<?php echo base_url() . "account/signup"; ?>">Sign-up</a>