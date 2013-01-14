<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct(){
		parent::__construct();
	
		$this->load->model('admin_model');
	}

	public function index(){

		$this->dashboard();
	}

	public function dashboard(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('email') == 'ewan.valentine@boots.co.uk'){

			$users = $this->admin_model->display_all_users();
	
				if($users == true){
					$this->load->view('display_all_users_view', array('users' => $users));
				}else{
					print("They aint no users");
				}
		}else{
			redirect('error_handler/error/' . __FUNCTION__ . '%20You aint no admin');
		}

		$this->load->view('footer');
	}

	public function add_example(){

	}

	public function delete_example(){

	}

	public function update_example(){

	}

	public function view_example(){

	}

	public function create_user(){

	}

	public function delete_user(){

	}

	public function update_user(){

	}

	public function view_user(){

	}

}