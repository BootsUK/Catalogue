<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interactive_team_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function add_tasks($data){

		// Add task logic

		$query = $this->db->insert('it_tasks', $data);

		if($query == true){
			return true;
		}else{
			return false;
		}

	}

	public function delete_tasks($id){

		// Delete tasks logic

		$this->db->where('t_id', $id);
		$query = $this->db->delete('it_tasks');

		if($query == true){
			return true;
		}else{
			return false;
		}

	}

	public function update_tasks($id, $data){

		// Update tasks logic

		$this->db->where('t_id', $id);
		$query = $this->db->update('it_tasks', $data);

		if($query == true){
			return true;
		}else{
			return false;
		}
	}

	public function view_tasks(){

		$query = $this->db->query("SELECT * FROM it_tasks ORDER BY t_id");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}

	}

}