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

		// View all tasks

		$query = $this->db->query("SELECT * FROM it_tasks ORDER BY t_priority");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function get_by_id($id){

		$this->db->where('t_id', $id);
		$query = $this->db->get('it_tasks');

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function search_tasks($search_term, $search_crit){

		$query = $this->db->query("SELECT * FROM it_tasks WHERE $search_crit LIKE '%$search_term%'");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function get_dev($dev){

		$query = $this->db->query('SELECT * FROM users WHERE first_name, last_name = ' . $dev);

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function save_complete_task($id){

		$this->db->where('t_id', $id);
		$completed_solution = $this->db->get('it_tasks');

		if($completed_solution){
			$row = $completed_solution->row();

			$this->load->helper('date');

			$datestring = "%d/%m/%Y";
			$time = time();

			$data = array(
				't_c_title' => $row->t_title,
				't_c_desc' => $row->t_desc,
				't_c_priority' => $row->t_priority,
				't_c_due' => $row->t_due,
				't_c_comp' => mdate($datestring, $time),
				't_c_status' => $row->t_status,
				't_c_dev' => $row->t_dev,
				't_c_sh' => $row->t_sh,
				't_c_date_added' => $row->t_date_added,
				't_c_date_mod' => $row->t_date_mod,
				't_c_mod_by' => $row->t_mod_by,
				't_c_comments' => $row->t_comments,
				't_c_set_by' => $row->t_set_by
				);

			$did_comp_task = $this->db->insert('it_complete_tasks', $data);

		}

		if($did_comp_task){
			$this->db->where('t_id', $id);
			$this->db->delete('it_tasks');
			return true;
		}else{
			return false;
		}
	}

	public function get_complete_list(){

		$query = $this->db->query("SELECT * FROM it_complete_tasks ORDER BY t_c_comp DESC");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function search_by_range($range){

		$start_date = $range['start_date'];
		$end_date = $range['end_date'];

		$query = $this->db->query("SELECT *
FROM it_complete_tasks
WHERE t_c_comp
BETWEEN '$start_date'
AND '$end_date'
LIMIT 0 , 30");

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
			echo "Model failure";
		}
	}
}