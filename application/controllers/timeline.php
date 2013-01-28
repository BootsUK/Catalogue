<?php 

class Timeline extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('date');
		$this->load->model('timeline_model');
		$this->load->helper('xml');
		$this->load->library('xmlrpc');
		$this->load->library('xmlrpcs');
	}

	public function index(){	
		$this->main();
	}

	/* Main view */
	public function main(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$datestring = "%d/%m/%Y";
			$time = time();

			if($this->timeline_model->get_main_data()){

				$data['results'] = $this->timeline_model->get_main_data();

				$this->load->view('task_time_line_view', $data);

			}else{
				redirect('error_handler/error/' . __FUNCTION__ . '');
			}

		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}
}