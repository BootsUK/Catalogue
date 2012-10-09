<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$this->load->library('parser');
		$this->load->helper('url'); 
		
		$this->home();

	}

	public function home(){

		$this->load->view('header');

		$this->load->helper('form');

		$this->load->view('home');

		$this->load->view('footer');

	}

	public function login(){

	}

	public function logout(){

	}

	public function signup(){

	}

	public function search(){
		
		$this->load->view('header');
		
		$this->load->model('search');

		$this->load->helper('form');
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('search_term', 'required');

		$data = array(
			'type' => $this->input->post('type'),
			'field' => $this->input->post('field'),
			'search_term' => $this->input->post('search_term')
			);

		

		if($this->form_validation->run() == FALSE){
			$this->load->view('home');
			print("shit failed");
		}else{

			$results = $this->search->basic($data);

			$this->load->view('results', array('search_results' => $results));

	}

		$this->load->view('footer');

	}

	public function results(){

		$this->load->view('header');

		$this->parser->parse('results', $data);

		$this->load->view('footer');
	}

	
}