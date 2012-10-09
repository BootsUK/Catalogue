<?php 

class Search extends CI_Model{

	public function __construct(){
		parent::__construct();

	}

	public function basic($data){

		$query = $this->db->query("SELECT * FROM " . $data['type'] . " WHERE " . $data['field'] . " LIKE '%" . $data['search_term'] . "%'");
	
		if($query->num_rows) {
			print("it worked");

    		return $query->result_array();
    		
    	}else{
    		
            return false; 
		}
	}

}