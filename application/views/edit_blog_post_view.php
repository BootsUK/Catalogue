<?php echo form_open('blog/insert_post');

foreach($result as $row){
	echo '<ul class="alt">';
		echo '<li>';
		echo '<label for="b_title">Enter title</label><br />';
		echo '<input type="text" name="b_title" value="' . $row['b_title'] . '">';
		echo '</li>';
		echo '<li>';
		echo '<label for="b_copy">Enter copy (Code usable = on)</label><br />';
		echo '<textarea name="b_copy" id="body_copy_blog_post" style="width: 50%; height: 280px;">' . $row['b_copy'] . '</textarea>';
		echo '</li>';
		echo '<li>';
		echo '<input type="submit" name="submit" value="Submit">';
		echo '</li>';
		echo '</ul>';
}

echo '</form>';

?>