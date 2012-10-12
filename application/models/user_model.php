<?php

class User_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}	

	public function index(){

	}

	public function can_log_in(){

		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('password')));

		$query = $this->db->get('users');

		if($query->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	public function add_temp_user($key){

		$data = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'key' => $key,
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'company' => $this->input->post('company')
			);

		$query = $this->db->insert('temp_users', $data);

		if($query){
			return true;
		}else{
			return false;
		}

	}

	public function is_key_valid($key){

		$this->db->where('key', $key);

		$query = $this->db->get('temp_users');

		if($query->num_rows() == 1){
			return true;
		}else{
			return false;
		}
		
	}

	public function add_user($key){

		$this->db->where('key', $key);

		$temp_user = $this->db->get('temp_users');

		if($temp_user){
			$row = $temp_user->row();

			$data = array(
				'email' => $row->email,
				'password' => $row->password,
				'first_name' => $row->first_name,
				'last_name'=> $row->last_name,
				'company' => $row->company
			);

			$did_add_user = $this->db->insert('users', $data);
		}

		if($did_add_user){
			$this->db->where('key', $key);
			$this->db->delete('temp_users');
			return $data['email'];
		}else{
			return false;
		}

	}

	public function update_password($data){

		// Gets e-mail set via cookie
		$email = $this->session->userdata('email');

		// Update password field where e-mail == current session e-mail
		$this->db->where('email', $email);
		$update_password = $this->db->set('users', $data);

		if($update_password){
			return true;
		}else{
			return false;
		}
	}

	public function update_basic_details($data){

		// Gets e-mail set via cookie
		$email = $this->session->userdata('email');

		// Update basic details
		$this->db->where('email', $email);
		$update_basic_details = $this->db->set('users', $data);

		if($update_basic_details){
			return true;
		}else{
			return false;
		}

	}

}