<h3>Your file has successfully been uploaded to the server</h3>


<p>
	<ul>
		<?php foreach($upload_data as $item => $value): ?>
		<li><?php echo $item; ?>: <?php echo $value; ?></li>
		<?php endforeach; ?>
	</ul>
</p>

<p><?php echo anchor('file_upload', 'Upload another file') ?></p>