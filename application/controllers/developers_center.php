<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Developers_center extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->model('change_log_model');
	}

	public function index(){
		$this->updates();
	}

	public function updates(){

		$this->load->view('header');
		$this->load->view('nav_view');

		$results = $this->change_log_model->get_updates();

		if($this->session->userdata('is_logged_in') == 1){
			$this->load->view('change_log_view', array('results' => $results));
		}else{
			echo "You must be logged in to view this page";
			redirect('account/login');
		}
		
		$this->load->view('footer');
	
	}

	public function site_structure(){

		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->view('site_structure_view');
		$this->load->view('footer');

	}

	public function developer_roles(){

		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->view('developer_roles_view');
		$this->load->view('footer');

	}

}