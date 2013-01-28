<?php 

class Timeline_model extends CI_model{

	public function __construct(){
		parent::__construct();
	}

	public function get_main_data(){

		$query = $this->db->query("SELECT * FROM it_tasks");

		if($query->num_rows() > 0){
			
			return $query->result_array();

		}else{
			return false;
		}
	}
}