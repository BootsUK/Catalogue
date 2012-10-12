<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

	}

	public function display_all_users(){

		$query = $this->db->query("SELECT * FROM users ORDER BY id");
	
		if($query->num_rows) {
    		return $query->result_array();
    	}else{
            return false; 
		}
	}

}