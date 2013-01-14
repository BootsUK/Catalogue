<?php

class Check_in_model extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function save_log(){

		$query = $this->db->insert('clock_in', $data);

		if($query == true){
			return true;
		}else{
			return false;
		}
	}

	public function view_log(){

		$query = $this->db->query("SELECT * FROM clock_in");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
}