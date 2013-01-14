<?php 

class Monitor_model extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function view_time_log($data){

		$query = $this->db->insert('view_time_log', $data);

		if($query == true){
			return true;
		}else{
			return false;
		}
	}
}