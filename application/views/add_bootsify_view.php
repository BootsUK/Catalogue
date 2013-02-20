<h3>Bootsify</h3>

<form action="<?php echo base_url(); ?>interactive_team/bootsify">

	<label for="title">Title</label><br />
	<input type="text" name="title" placeholder="Title">

	<br>

	<label for="teaser">Teaser</label><br />
	<textarea name="teaser" id="teaser" cols="30" rows="10">
		Teaser
	</textarea>

	<br>

	<label for="body">Body content</label><br />
	<textarea name="body" id="body" cols="30" rows="10">
		Body content
	</textarea>

	<br>

	<input type="submit" name="submit" value="Submit">

</form><!-- end of form -->