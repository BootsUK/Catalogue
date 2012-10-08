<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core extends CI_Controller{

	public static function index(){

		$this->load->search('template');
		$this->load->library('parser');
		$this->load->helper('url'); 

		$type = $_POST['type'];
		$search_term = $_POST['search_term'];
		$field = $_POST['field'];

		if(isset($_POST['search_submit'])){

			$this->search($type, $search_term, $field);
		}
		
		$this->login();

	}

	public static function home(){

		$this->load->view('header');

		$this->load->view('home');

		$this->load->view('footer');

	}

	public static function login(){

	}

	public static function logout(){

	}

	public static function signup(){

	}

	public static function search($type, $search_term, $field){
		

		$data = array(
			'type' => $type,
			'field' => $field,
			'search_term' => $search_term
			);

		$this->search->basic($data);

	}

	public static function results(){

		$this->load->view('header');
		$this->parser->parse('results', $data);

		$data['score'] = $this->search->basic();

		$this->load->view('footer');
	}

	
}