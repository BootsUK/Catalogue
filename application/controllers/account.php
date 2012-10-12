<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index(){
		$this->login();
	}

	public function login(){
		$this->load->view('header');
		$this->load->view('login_view');
		$this->load->view('footer');
	}

	public function check_credentials(){
		$this->load->view('header');

		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');

		if($this->form_validation->run() == true){
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => 1
				);

			$this->session->set_userdata($data);

			redirect('core/home');

		}else{

			$this->load->view('login_view');
		}
		$this->load->view('footer');
	}

	public function validate_credentials(){
		$this->load->view('header');
		$this->load->model('user_model');

		if($this->user_model->can_log_in()){
			return true;
		}else{
			$this->form_validation->set_message('validate_credentials', 'Incorrect login/password.');
			return false;
		}
		
		$this->load->view('footer');
	}

	public function members(){
		$this->load->view('header');
		if($this->session->userdata('is_logged_in')){
			
			$this->load->view('members');

		}else{
			redirect('core/restricted');
		}
		$this->load->view('footer');
	}

	public function restricted(){
		$this->load->view('header');
		$this->load->view('restricted');
		$this->load->view('footer');
	}

	public function logout(){
		$this->load->view('header');
		$this->session->sess_destroy();
		$this->load->view('logout_view');
		redirect('account/login');
		$this->load->header('footer');
	}

	public function signup(){
		$this->load->view('header');
		$this->load->view('sign_up_view');
		$this->load->view('footer');
	}

	public function sign_up_validation(){

		$this->load->view('header');
		
		
		$this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email|is_unique[users.email]|max_length[125]');
		$this->form_validation->set_rules('first_name', 'First name', 'required|trim|max_length[50]');
		$this->form_validation->set_rules('last_name', 'Last name', 'required|trim|max_length[75]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[7]|max_length[50]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
		$this->form_validation->set_rules('company', 'Company', 'trim|max_length[125]');
		$this->form_validation->set_message('is_unique', "already exists!");

		if($this->form_validation->run()){
			
			$key = md5(uniqid());

			$this->load->model('user_model');
			$this->load->library('email', array('mailtype'=>'html'));

			$message = "<p>The following user requested a Boots technical catalogue account: </p>";
			$message .= "<p><a href='" . base_url() . "account/confirm_signup/$key'>Click to submit an account request.</a></p>";

			$this->email->from('boots@evdatacenter.co.uk', "Admin");
			$this->email->to('ewan.valentine@boots.co.uk');
			$this->email->subject('Please confirm a new Boots technical catalogue account');
			$this->email->message($message);
				
			if($this->user_model->add_temp_user($key)){
				

					if($this->email->send()){
					
					$this->load->view('thank_you');				
				}else{

					echo "Failed.";
				}
			

			}else{
				echo "Problem adding to database.";
			}

		}else{
			print ("Something failed...");
			$this->load->view('sign_up_view');
		}
		$this->load->view('footer');

	}

	public function confirm_signup($key){

		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->model('user_model');

		if($this->user_model->is_key_valid($key)){

			if($newemail = $this->user_model->add_user($key)){
				echo "<p>Success!</p>";
				$data = array(
					'email' => $newemail,
					'is_logged_in' => 1
					);

				$this->session->set_userdata($data);
				redirect('account/members');
			}else{
				echo "Registration failed.";
			}

		}else{

			echo "Invalid key";

		}

		$this->load->view('footer');
	}

	public function update(){

		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->view('update_details_view');
		$this->load->view('footer');

	}

	public function update_password(){

		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->view('update_password_view');

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[7]|max_length[50]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]');
		

		if($this->form_validation->run() == true){
			
			$data = array(
				'password' => $this->input->post('password')
				);
		

			$this->user_model->update_password($data);
		}

		$this->load->view('footer');

	}

	public function update_basic_details(){

		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->view('update_basic_details_view');
		
		$this->form_validation->set_rules('first_name', 'First name', 'required|trim|min_length[1]|max_length[75]');
		$this->form_validation->set_rules('last_name', 'Last name', 'required|trim|min_length[1]|max_length[125]');
		$this->form_validation->set_rules('company', 'Company', 'trim|max_length[125]');		

		if($this->form_validation->run() == true){
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company')
				);

			$this->user_model->update_basic_details($data);
		}	

		$this->load->view('footer');

	}

}
