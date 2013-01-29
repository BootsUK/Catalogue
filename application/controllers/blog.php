<?php 

class Blog extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
	}

	public function index(){

		$this->load->view('header');

		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$data = array(
				'b_title' => $this->input->post('b_title'),
				'b_copy' => $this->input->post('b_copy'),
				'b_author' => $this->session->userdata('email'),
				'b_date' => mdate(); 
				);

			$this->load->view('blog_home_view'); 
		}

		$this->load->view('footer');
	}

	public function insert_post(){

		$this->load->view('header');

		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in') == 1){
			$this->load->view('insert_blog_post_view');
		}

		$this->load->view('footer');
	}
}