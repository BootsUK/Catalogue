<?php 

class Interactive_team_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function add_tasks(){

		// Add task logic

		$query = $this->db->insert('it_tasks', $data);

		if($query == true){
			return true;
		}else{
			return false;
		}

	}

	public function delete_tasks(){

		// Delete tasks logic



	}

	public function update_tasks(){

		// Update tasks logic



	}

	public function view_tasks(){

		$query = $this->db->query("SELECT * FROM interactive_team");

		

	}

}