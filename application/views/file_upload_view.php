<h3>File upload</h3>

<?php echo $error; ?>

<?php echo form_open_multipart('file_upload/upload_file'); ?>

<input type="file" name="userfile" size="20">
	
<br>
		
<br>

<input type="submit" name="submit" value="Upload">			

</form>		