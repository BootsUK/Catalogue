<h2>Edit a user</h2>

<?php echo form_open('admin/edit_user'); ?>

<?php 

echo form_open('admin/edit_user');

echo "<ul class='alt'>";

	foreach($result as $row){

		echo "<li>Enter first name: <br />";
		echo form_input('first_name', $row['first_name']);
		echo "</li>";

		echo "<li>Enter last name: <br />";
		echo form_input('last_name', $row['last_name']);
		echo "</li>";

		echo "<li>Enter password: <br />";
		echo form_password('password', $row['password']);
		echo "</li>";

		echo "<li>Confirm password: <br />";
		echo form_password('cpassword');
		echo "</li>";

		echo "<li>Company: <br />";
		echo form_input('company', $row['company']);
		echo "</li>";

		$roles = array(
			'admin' => 'Admin',
			'developer' => 'Developer',
			'user' => 'Standard user',
			'manager' => 'Manager (Level 5)',
			'assistant-manager' => 'Assistant Manager (Level 6)',
			'level-4' => 'Level 4',
			'level-3' => 'Level 3',
			'director' => 'Director',
			'ceo' => 'CEO',
			'external' => 'External',
			'guest' => 'Guest'
			);

		echo "<li>Enter a role <br />";
		echo form_dropdown('role', $roles)
		echo "</li>";	
		
	}
	
	$data = array(
	    'name' => 'submit',
	    'id' => 'submit',
	    'value' => 'true',
	    'type' => 'submit',
	    'content' => 'Submit'
	);

	echo "<li>";
	echo form_button($data);
	echo "</li>";

echo "</ul>";

?>

</form>