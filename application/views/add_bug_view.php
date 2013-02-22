<h3>Add a bug</h3>

<form action="<?php echo base_url(); ?>bug_control/add_bug_logic">

	<label for="bug_name">Bug name</label><br>
	<input type="text" name="bug_name" placeholder="Bug name"><br />

	<br>

	<label for="bug_page_name">Bug page name</label><br>
	<input type="text" name="bug_page_name" placeholder="Bug page name"><br />
	<p>(name of the page you found the bug on)</p>

	<br>

	<label for="bug_region">Bug region</label><br>
	<select name="bug_region" id="bug_region">
		<option value="uk">United Kingdom</option>
		<option value="roi">Republic of Ireland</option>
		<option value="int">International</option>
	</select>

	<br>

	<label for="bug_description">Bug description</label><br />
	<textarea name="bug_description" id="bug_description" cols="30" rows="10"></textarea>

	<br>
	
	<label for="bug_status">Bug status</label><br />
	<select name="bug_status" id="bug_status">
		<option value="With developers">With developers</option>
		<option value="Pending">Pending</option>
		<option value="With writers">With writers</option>
		<option value="With legal">With legal</option>
		<option value="With PML">With PML</option>
		<option value="Under review">Under review</option>
	</select>

	<br>

	<label for="bug_priority">Bug priority</label><br />
	<select name="bug_priority" id="bug_priority">
		<option value="high">High</option>
		<option value="medium">Medium</option>
		<option value="low">Low</option>
	</select>

	<br>

	<label for="bug_developer">Choose a developer to bug</label><br />
	<select name="bug_developer" id="bug_developer">
		<option value="Ewan Valentine">Ewan Valentine</option>
		<option value="Mike Titmus">Mike Titmus</option>
		<option value="Mike Ryan">Mike Ryan</option>
	</select>

	<input type="submit" name="submit" value="Submit">
</form>
