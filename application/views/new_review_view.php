<?php echo form_open('review/insert_review'); ?>

<ul class="alt">
	<li>
		<label for="r_title">Review title</label><br>
		<input type="text" name="r_title">
	</li>
	
	
	<li>
		<label for="r_review">Review</label><br>
		<textarea name="r_review" id="" cols="30" rows="10"></textarea>
	</li>
	
	
	<li>
		<label for="r_dev">Select Developer</label><br>
		<select name="r_dev" id="">
			<option value="Team">Team</option>
			<option value="Ewan Valentine">Ewan Valentine</option>
			<option value="Mike Titmus">Mike Titmus</option>
			<option value="Tom Hill">Tom Hill</option>
			<option value="Sarah McGuinness">Sarah McGuinness</option>
		</select>
	</li>
	
	<li>
		<label for="r_score">Score</label><br>
		<input type="number" name="r_score">
	</li>
	
	<li>
		<input type="submit" value="Submit" name="submit">
	</li>
</ul>

</form> <!-- end of feedback form -->