<?php 

class Review extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$data['results'] = $this->review_model->get_all();

			$this->load->view('display_reviews_view', $data);
			
		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}
}