<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaign extends CI_Controller{

	/*
	*	@Author Ewan Valentine
	*	@Date 17/10/2012
	*/

	public function __construct(){
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('campaign_model');
	}

	public function index(){

		$this->home();
	}

	public function home(){
		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->view('campaign_home_view');
		$this->load->view('footer');
	}

	public function tasks(){

		/* Read tasks */

	$this->load->view('header');

	$this->load->view('nav_view');
	$this->load->view('campaign_home_view');

		if($this->session->userdata('is_logged_in') == 1){
			$this->load->view('task_view');
		}else{
			echo "You must be logged in to view this page";
			redirect('account/login');
		}

	$this->load->view('footer');

	}

	public function create(){

		$this->load->view('header');
		$this->load->view('nav_view');
		

		$this->form_validation->set_rules('title', 'Title', 'required|max_length[255]');
		$this->form_validation->set_rules('description', 'Description', 'max_length[555]');
		$this->form_validation->set_rules('manager', 'Manager', 'max_length[125]|required');
		$this->form_validation->set_rules('campaign', 'Campaign', 'max_length[125]');
		$this->form_validation->set_rules('due_date', 'Due date', 'required');
		$this->form_validation->set_rules('comments', 'Comments', 'max_length[555]');
		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->load->helper('date');

		if($this->session->userdata('is_logged_in')){
			
		$this->load->view('campaign_home_view');

		$this->load->view('add_task_view');

		$datestring = "%d/%m/%Y";
		$time = time();

		if($this->form_validation->run() == true){

			$data = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'manager' => $this->input->post('manager'),
			'campaign' => $this->input->post('campaign'),
			'due_date' => $this->input->post('due_date'),
			'set_date' => mdate($datestring),
			'comments' => $this->input->post('comments'),
			'status' => $this->input->post('status'),
			'modified' => mdate($datestring, $time)
			);

			$this->campaign_model->create($data);
		}

		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');

	}

	public function read(){

	$this->load->view('header');
	$this->load->view('nav_view');
	

	if($this->session->userdata('is_logged_in')){
			
		$this->load->view('campaign_home_view');

		$tasks = $this->campaign_model->read();
		
		if($tasks == true){
			$this->load->view('all_task_view', array('tasks' => $tasks));
		}else{
			print("They aint no users");
		}

	}else{
		redirect('core/restricted');
	}

	$this->load->view('footer');

	}

	public function update(){

	$this->load->view('header');
	$this->load->view('nav_view');
	
	if($this->session->userdata('is_logged_in')){
			
		$this->load->view('campaign_home_view');

		$data = array();

		$this->campaign_model->update($data);

	}else{
		redirect('core/restricted');
	}

	$this->load->view('footer');

	}

	public function delete(){

	$this->load->view('header');
	$this->load->view('nav_view');

	if($this->session->userdata('is_logged_in')){
			
		$this->load->view('campaign_home_view');
		$this->load->view('remove_campaign_view');

		$this->form_validation->set_rules('id', 'ID', 'require');

		if($this->form_validation->run() == true){

			$data = array('id' => $this->input->post('id'));

			$this->campaign_model->delete($data);	

		}else{
			$this->load->view('no_page_id_view');
		}


	}else{
		redirect('core/restricted');
	}

	$this->load->view('footer');

	}

}