<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_log_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_updates(){

		$query = $this->db->query("SELECT * FROM updates");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function get_updates_by_dev(){

		$query = $this->db->query("SELECT * FROM updates ORDER BY u_id");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}

	}

	public function get_updates_by_date(){

		$query = $this->db->query("SELECT * FROM updates ORDER BY u_date");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}

	}

}