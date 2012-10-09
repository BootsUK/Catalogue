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

		$this->load->view('login_view');

		$this->load->view('search_view');

		$this->load->view('home');

		$this->load->view('footer');

	}

	
	
}