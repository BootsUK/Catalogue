<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->model('search_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('search_term', 'required');
	}

	public function index(){

		$this->load->library('parser');
		$this->load->helper('url'); 
		
		$this->search();
	}

	public function search(){

		$this->load->view('header');
		$this->load->view('nav_view');
		$this->form_validation->set_rules('search_term', 'required');

		$data = array(
			'type' => $this->input->post('type'),
			'field' => $this->input->post('field'),
			'search_term' => $this->input->post('search_term')
			);


		if($this->form_validation->run() == true){
			$results = $this->search_model->basic($data);
			if($results == true){
				
				$this->load->view('results', array('search_results' => $results));
			}else{
				$this->load->view('no_results_view');
			}
			
		}else{
			echo "Stuff hit the fan...";
		}

		$this->load->view('footer');
	}

	public function catalogue(){
		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->view('search_catalogue_view');
		$this->load->view('footer');
	}

	public function users(){
		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->view('search_users_view');
		$this->load->view('footer');
	}

	public function catalogue_search(){

		$this->load->view('header');
		$this->load->view('nav_view');
		if($this->form_validation->run() == true){
			$results = $this->search_model->catalogue();

			if($results == true){
				$this->load->view('catalogue_search_results_view', array('search_results' => $results));
			}else{
				$this->load->view('no_results_view');
			}
		}else{
			$this->load->view('blank_search_view');
		}

		$this->load->view('footer');
	}

	public function user_search(){

		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->view('search_users_view');

		$this->form_validation->set_rules('search_term', 'Search term', 'required');

		if($this->form_validation->run() == true){
		
			
			$data = array('field' => $this->input->post('field'), 'search_term' => $this->input->post('search_term'));
			
			$this->search_model->user_search($data);

			$users = $this->search_model->users();

			if($results == true){
				$this->load->view('users_search_results_view', array('users' => $users));
			}else{
				$this->load->view('no_results_view');
			}
		}else{
			$this->load->view('blank_search_view');
		}

		$this->load->view('footer');
	}

	public function interactive_team_tasks(){
		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in') == 1){
			$this->load->view('interactive_team_search_tasks');
		}else{
			redirect('core/restricted');
		}
		$this->load->view('footer');
	}

	public function campaign(){
		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->view('campaign_search_view');
		$this->load->view('footer');

	}
}