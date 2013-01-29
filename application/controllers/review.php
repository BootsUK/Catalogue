<?php 

class Review extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('review_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
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

	public function review_form(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			$this->load->view('new_review_view');
		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');		
	}

	public function insert_review(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			
			$this->form_validation->set_rules('r_title', 'Title', 'required|max_length[255]');
			$this->form_validation->set_rules('r_review', 'Review', 'required');
			$this->form_validation->set_rules('r_dev', 'Developer');
			$this->form_validation->set_rules('r_score', 'Score', 'required');
			
			$this->load->helper('date');

			$datestring = "%d/%m/%Y";
			$time = time();

			$this->load->view('new_review_view');

			if($this->form_validation->run() == 1){

				$data = array(
					'r_title' => $this->input->post('r_title'),
					'r_review' => $this->input->post('r_review'),
					'r_user' => $this->session->userdata('email'),
					'r_dev' => $this->input->post('r_dev'),
					'r_date' => mdate($datestring, $time),
					'r_score' => $this->input->post('r_score')
					);

				$this->review_model->insert_review($data);

				redirect('error_handler/success/' . __FUNCTION__ . '_review_submitted');

			}else{
				
			}

		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}

}