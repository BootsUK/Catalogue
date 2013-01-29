<?php echo form_open('blog/insert_post'); ?>

<ul class="alt">
	<li>
		<label for="b_title">Enter title</label><br />
		<input type="text" name="b_title" placeholder="Enter title">
	</li>
	<li>
		<label for="b_copy">Enter copy (Code usable = on)</label><br />
		<textarea name="b_copy" id="body_copy_blog_post" style="width: 50%; height: 280px;"></textarea>
	</li>
	<li>
		<input type="submit" name="submit" value="Submit">
	</li>
</ul>

</form>