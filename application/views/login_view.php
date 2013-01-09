<h3>Sign-in</h3>

<?php 

echo form_open('account/check_credentials');

echo validation_errors();

echo "<ul class='alt'>";

echo "<li>Enter your e-mail: <br />";
echo form_input('email');
echo "</li>";

echo "<li>Enter your password: <br />";
echo form_password('password');
echo "<br /></li>";

echo "<li>";
echo form_submit('login_submit', 'Login');
echo "</li>";

echo "</ul>";

echo form_close();

?>

<a href="<?php echo base_url() . "account/signup"; ?>">Sign-up</a>