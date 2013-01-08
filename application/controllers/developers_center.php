<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Developers_center extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->updates();
	}

	public function updates(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in') == 1){
			$this->load->view('change_log_view');
		}else{
			echo "You must be logged in to view this page";
			redirect('account/login');
		}
		
		$this->load->view('footer');
	
	}

	public function developer_roles(){

		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->view('developer_roles_view');
		$this->load->view('footer');

	}

}