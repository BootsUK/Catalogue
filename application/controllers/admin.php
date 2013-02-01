<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index(){
		$this->dashboard();
	}

	public function dashboard(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('email') == 'ewan.valentine@boots.co.uk'){
			$this->load->view('admin_dashboard');
		}else{
			redirect('error_handler/error/' . __FUNCTION__ . '%20You%20aint%20no%20admin');
		}

		$this->load->view('footer');
		
	}

	public function users(){

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

	public function add_user(){
		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('email') == 'ewan.valentine@boots.co.uk'){

			$this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email|is_unique[users.email]|max_length[125]');
			$this->form_validation->set_rules('first_name', 'First name', 'required|trim|max_length[50]');
			$this->form_validation->set_rules('last_name', 'Last name', 'required|trim|max_length[75]');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[7]|max_length[50]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
			$this->form_validation->set_rules('company', 'Company', 'trim|max_length[125]');
			$this->form_valudation->set_rules('role', 'Role', 'required');
			$this->form_validation->set_message('is_unique', "already exists!");

			$data = array(
				'email' => $this->input->post('email'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'password' => $this->input->post('password'),
				'company' => $this->input->post('company'),
				'role' => $this->input->post('role')
				);

			$this->user_model->admin_add_user($data);

			$this->load->view('admin_add_user');
		}else{
			redirect('error_handler/error/' . __FUNCTION__ . '/');
		}

		$this->load->view('footer');
	}

	public function edit_user(){
		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('email') == 'ewan.valentine@boots.co.uk'){
			$this->load->view('display_all_users_view');
		}else{
			redirect('error_handler/error/' . __FUNCTION__);
		}

		$this->load->view('footer');
	}

}