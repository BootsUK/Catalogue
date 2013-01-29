<?php 

class Blog_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_all_posts(){

		$query = $this->db->get('blog');

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function get_last_10(){

		$query = $this->db->query("SELECT * FROM blog LIMIT 10");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function insert_post($data){

		$query = $this->db->insert('blog', $data);

		if($query == 1){
			return true;
		}else{
			return false;
		}
	}

	public function update_post($id, $data){

		$this->db->where('b_id', $id);
		$query = $this->db->update('blog', $data);

		if($query == 1){
			return true;
		}else{
			return false;
		}
	}

	public function delete_post($id){

		$this->db->where('b_id', $id);
		$query = $this->db->delete('blog');

		if($query == 1){
			return true;
		}else{
			return false;
		}
	}

	public function get_by_id($id){

		$this->db->where('b_id', $id);
		$query = $this->db->get('blog');

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
}