<h3>Bootsify</h3>

<form action="<?php echo base_url(); ?>interactive_team/bootsify" method="post">

	<label for="title">Title</label><br />
	<input type="text" name="title" placeholder="Title">

	<br>

	<label for="teaser">Teaser</label><br />
	<textarea name="teaser" id="teaser" cols="30" rows="10">
		
	</textarea>

	<br>

	<select name="template" id="template">
		<option value="100">100% 964px</option>
		<option value="75">75% 744px</option>
		<option value="50">50% 550px</option>
	</select>

	<br>

	<label for="body">Body content</label><br />
	<textarea name="body" id="body" cols="30" rows="10">
		
	</textarea>

	<br>

	<input type="submit" name="submit" value="Submit">

</form><!-- end of form -->