<?php 

class Search extends CI_Model{

	public function __construct(){
		parent::__construct();

	}

	public function basic($data){

		print_r($data['type']);

		$query = $this->db->query("SELECT * FROM " . $data['type'] . " WHERE " . $data['field'] . "LIKE '%" . $data['search_term'] . "%'");
	
		return $query->result();
	}

}