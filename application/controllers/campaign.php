<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaign extends CI_Controller{

	/*
	*	@Author Ewan Valentine
	*	@Date 
	*/

	public function __construct(){
		parent::__construct();
	}

	public function index(){

	}

	public function tasks(){

		/* Read tasks */

	$this->load->view('header');

	$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in') == 1){
			$this->load->view('task_view');
		}else{
			echo "You must be logged in to view this page";
			redirect('account/login');
		}

	$this->load->view('footer');

	}

	public function add_task(){

		/* Add tasks */

	}

	public function delete_task(){

		/* Delete tasks */

	}

	public function update_task(){

		/* Update tasks */

	}

}