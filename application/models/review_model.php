<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review_model extends CI_Model{

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

	public function insert_review($data){

		$query = $this->db->insert('reviews', $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}
}