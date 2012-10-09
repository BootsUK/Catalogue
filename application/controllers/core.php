<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$this->load->library('parser');
		$this->load->helper('url'); 
		
		


		#Remove this
		$user = 0;
		if($user == 0){
			$this->login();
		}else{
			$this->home();
		}

	}

	public function home(){

		$this->load->view('header');

		$this->load->helper('form');

		$this->load->view('search_view');

		$this->load->view('home');

		// $this->load->view('login_view');

		$this->load->view('footer');

	}

	public function login(){

		$this->load->view('header');

		$this->load->helper('form');

		$this->load->view('login_view');

		$this->load->view('home');

		$this->load->view('footer');
	}

	
	
}