<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review_model extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function get_all(){

		$query = $this->db->query("SELECT * FROM reviews");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function insert_review($review){

		$query = $this->db->insert('reviews', $review);

		if($query == 1){
			return true;
		}else{
			return false;
		}
	}
}


