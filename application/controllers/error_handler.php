<?php 

class Error_handler extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->helper('url');

		$err_id = $this->uri->segment(3);
	}

	public function index(){

	}

	public function error($err_id){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$status['status'] = $err_id;

			$this->load->view('fail_view', $status);
		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');

	}

	public function notify($err_id){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$status['status'] = $err_id;

			$this->load->view('notify_view', $status);
		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');

	}

	public function success($err_id){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$status['status'] = $err_id;

			$this->load->view('success_view', $status);
		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}
}