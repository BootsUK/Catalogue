<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaign_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

	}

	public function create($data){

		$query = $this->db->insert('tasks', $data);

		if($query == true){
			return true;
		}else{
			return false;
		}
	}

	public function read(){

		$query = $this->db->query("SELECT * FROM tasks ORDER BY id");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}

	}

	public function update(){


	}

	public function delete($data){

		$query = $this->db->delete('tasks', $data);

		if($query == true){
			return true;
		}else{
			return false;
		}
	}

}