<?php 

	/*
	* Bug_control_model - Data abstraction layer for bug checking system
	* @date 21/02/2013
	* @author Ewan Valentine
	*/

class Bug_control_model extends CI_Model{

	/* Construct */

	public function __construct(){
		parent::__construct();
	}


	/* Data modification functions */

	public function add_bug($data){

		$query = $this->db->insert('bug_control');

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function delete_bug($id){

		$this->db->where('bug_id', $id);
		$query = $this->db->delete('bug_control');

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function edit_bug($id, $data){

		$this->db->where('bug_id', $id);
		$query = $this->db->update('bug_control', $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function get_outstanding(){

		$this->db->where('bug_is_complete', '0');
		$this->db->get('bug_control');

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function get_complete(){

		$this->db->where('bug_is_complete', '1');
		$this->db->get('bug_control');

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	/* Display data functions */

	public function display_bug_by_id($id){

		$this->db->where('bug_id', $id);
		$query = $this->db->get('bug_control');

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function display_by_search($search){

		$this->db->like('bug_title', $search);
		$this->db->like('bug_page_title', $search);
		$this->db->like('bug_description', $search);
		$query = $this->db->get('bug_control');

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}

	}
}

/* End of Bug_control_model class (extends CI_Model) */