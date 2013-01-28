<h3>Your file was successfully added</h3>

<ul>
	<?php 
		foreach($upload_data as $item => $value){
			echo "<li>" . $item . "</li>";
			echo "<li>" . $value . "</li>";
		}
	?>
</ul>

<p><?php echo anchor('upload', 'Upload another file'); ?></p>