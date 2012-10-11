<?php 

if($this->session->userdata('is_logged_in') != 1){
	die ("You must be logged in to view this page");
	redirect('account/login');
}

?>

<p><b>Task view goes in 'ere</b></p>