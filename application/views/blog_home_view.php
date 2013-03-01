<h2>Blog</h2>

<?php 

foreach($result as $row){
	echo "<div class='blogPost'>";
	echo "<h3>" . $row['b_title'] . "</h3>";
	echo $row['b_copy'];
	echo "<br />";
	echo "<p>Posted on: " . $row['b_date'] . " by " . $row['b_author'] . "</p>"; 
	echo "</div> <!-- end of blogPost -->";
	if($this->session->userdata('email') == "ewan.valentine@boots.co.uk"){
		echo "<p><a href='#' onClick='confirm_action(\"edit_post\", " . $row['b_id'] . ");'>Edit</a> || <a href='#' onClick='confirm_action(\"delete_post\", " . $row['b_id'] . ");'>Delete</a> </p>";
	}
}

?>

<script type="text/javascript">

function confirm_action(action, id){
	if(action == "edit_post"){
		var r = confirm("Are you sure you wish to edit this entry?");
	}else{
		var r = confirm("Are you sure you wish to delete this entry?");
	}

	if(r == true){
		window.location=<?php echo base_url(); ?>"/blog/" + action + "/" + id; 
	}
}

</script>