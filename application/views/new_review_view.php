<?php echo form_open('review/insert_review'); ?>

<label for="r_title">Review title</label>
<input type="text" name="r_title">

<br>

<br>

<label for="r_review">Review</label>
<textarea name="r_review" id="" cols="30" rows="10"></textarea>

<br>

<br>

<label for="r_dev">Select Developer</label>
<select name="r_dev" id="">
	<option value="Team">Team</option>
	<option value="Ewan Valentine">Ewan Valentine</option>
	<option value="Mike Titmus">Mike Titmus</option>
	<option value="Tom Hill">Tom Hill</option>
	<option value="Sarah McGuinness">Sarah McGuinness</option>
</select>

<br>

<br>

<label for="r_score">Score</label>
<input type="number" name="r_score">

<br>

<br>

<input type="submit" value="Submit" name="submit">

</form> <!-- end of feedback form -->