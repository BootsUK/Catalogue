<?php 

class Review_model extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function get_all(){

		$query = $this->db->query("SELECT * FROM reviews ORDER BY date");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
}