<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$this->load->library('parser');
		$this->load->helper('url'); 

		if(isset($_POST['search_submit'])){

			$type = $_POST['type'];
			$search_term = $_POST['search_term'];
			$field = $_POST['field'];

			$this->search($type, $search_term, $field);
		}
		
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

		$type = $this->input->post('type');
		$field = $this->input->post('field');
		$search_term = $this->input->post('search_term');

		$data = array(
			'type' => $type,
			'field' => $field,
			'search_term' => $search_term
			);

		$this->search->basic($data);

		$this->load->view('footer');

	}

	public function results(){

		$this->load->view('header');

		$this->parser->parse('results', $data);

		$data['score'] = $this->search->basic();

		$this->load->view('footer');
	}

	
}