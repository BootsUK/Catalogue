<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaign extends CI_Controller{

	/*
	*	@Author Ewan Valentine
	*	@Date 17/10/2012
	*/

	public function __construct(){
		parent::__construct();

		$this->load->model('');
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

		$this->load->view('header');
		$this->load->view('nav_view');

		$this->load->helper('date');

		$datestring = "Day: %d Month: %m Year: %Y";
		$time = time();

		$data = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'manager' => $this->input->post('manager'),
			'campaign' => $this->input->post('campaign'),
			'due_date' => $this->input->post('due_date'),
			'set_date' => mdate($datestring);,
			);

		$this->model->create($data);

		$this->load->view('footer');

	}

	public function delete_task(){

		/* Delete tasks */

	}

	public function update_task(){

		/* Update tasks */

	}

}