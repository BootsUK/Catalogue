<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model{

	public function __construct(){
		parent::__construct();

	}

	public function basic($data){

		$query = $this->db->query("SELECT * FROM " . $data['type'] . " WHERE " . $data['field'] . " LIKE '%" . $data['search_term'] . "%'");
	
		if($query->num_rows) {
    		return $query->result_array();
    		
    	}else{
    		
            return false; 
		}
	}

	public function user_search($data){
		$query = $this->db->query("SELECT * FROM users WHERE " . $data['field'] . " LIKE '%" . $data['search_term'] . "%'");

		if($query->num_rows){
			return $query->result_array();
		}else{
			return false;
		}		
	}

}