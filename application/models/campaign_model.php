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

	}

	public function update(){

	}

	public function delete(){

	}

}