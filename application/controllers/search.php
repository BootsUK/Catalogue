<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$this->load->library('parser');
		$this->load->helper('url'); 
		
		$this->search();
	}

	public function search(){

		/* There's an error in here somewhere :/ */

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


		if($this->form_validation->run() == true){
			$results = $this->search->basic($data);
			if($results == true){
				
				$this->load->view('results', array('search_results' => $results));
			}else{
				echo "No results found!";
			}
			
		}else{
			echo "Stuff hit the fan...";
		}

		$this->load->view('footer');
	}
}