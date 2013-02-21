<form action="<?php echo base_url(); ?>interactive_team/edit_by_bootsify_id" method="post">
	
	<?php 
	
	foreach($results as $row){
		echo "<label>Title</label><br />";
		echo form_input('title', $row['title']);
		echo "<br />";

		echo "<label>Teaser</label><br />";
		echo form_input('teaser', $row['teaser']);
		echo "<br />"

		echo "<label>Body</label><br />";
		echo form_textarea('body', $row['body']);
		echo "<br />";
	}

	?>

	<input type="submit" name="subit" value="Submit">

</form>