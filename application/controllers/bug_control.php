<?php 
	
	/*
	* Class Bug_control - for bug management (Project ROI/International)
	* @date 22/02/2013
	* @author Ewan Valentine
	*/

class Bug_control extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('bug_control_model');
		$this->load->helper('date');
	}

	/* Home */

	public function index(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$this->data['results'] = $this->bug_control_model->get_outstanding();

			$this->load->view('bug_control_home_view', $this->data);

		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');

	}

	/* Data handling pages */

	public function add_bug(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			$this->load->view('add_bug_view');
		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}

	public function remove_bug(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			$this->load->view('remove_bug_view');
		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');

	}

	public function complete_bug(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			$this->load->view('complete_bug_view');
		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}	

	public function edit_bug(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$id = $this->uri->segment(3);

			$this->data['results'] = $this->bug_control_model->display_bug_by_id($id);

			$this->load->view('update_bug_view', $this->data);
		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}


	/* Data processing */

	public function add_bug_logic(){

		if($this->session->userdata('is_logged_in')){

			$this->form_validation->set_rules('bug_title', 'Bug title', 'required|max_length[255]');
			$this->form_validation->set_rules('bug_page_title', 'Bug page title', 'required|max_length[255]');
			$this->form_validation->set_rules('bug_cms_id', 'Bug CMS ID', 'integer|max_length[20]');
			$this->form_validation->set_rules('bug_region', 'Bug region', 'required|max_length[125]');
			$this->form_validation->set_rules('bug_description', 'Bug description', 'required|max_length[555]');
			$this->form_validation->set_rules('bug_status', 'Bug status', 'required|max_length[255]');
			$this->form_validation->set_rules('bug_priority', 'Bug priority', 'required|max_length[12]');
			$this->form_validation->set_rules('bug_developer', 'Bug developers', 'required|max_length[125]');
			$this->form_validation->set_rules('bug_is_complete', 'Bug is complete?', 'required');

			if($this->form_validation->run()){

				$time = time();
				$datestring = "%d/%m/%Y";

				$data = array(
					'bug_title' => $this->input->post('bug_title'),
					'bug_page_title' => $this->input->post('bug_page_title'),
					'bug_cms_id' => $this->input->post('bug_cms_id'),
					'bug_region' => $this->input->post('bug_region'),
					'bug_description' => $this->input->post('bug_description'),
					'bug_status' => $this->input->post('bug_status'),
					'bug_priority' => $this->input->post('bug_priority'),
					'bug_developer' => $this->input->post('bug_developer'),
					'bug_reported_by' => $this->session->userdata('email'),
					'bug_reported_date' => mdate($datestring, $time),
					'bug_last_modified' => mdate($datestring, $time)
					);

				/* End of data array */

				$add_bug = $this->bug_control_model->add_bug($data);

				if($add_bug){
					redirect('bug_control/');
				}else{
					echo "Bug addition failed";
				}

			}else{
				echo "<p>Form validation failed</p>";
			}

		}else{
			redirect('core/restricted');
		}
	}

	public function delete_bug_logic(){

		if($this->session->userdata('is_logged_in')){
			$id = $this->uri->segment(3);
			$this->bug_control_model->delete_bug($id);
		}else{
			redirect('core/restricted');
		}
	}

	public function complete_bug_logic(){

		if($this->session->userdata('is_logged_in')){

			$id = $this->uri->segment(3);
			$this->bug_control_model->edit_bug($id);

		}else{
			redirect('core/restricted');
		}
	}

	public function edit_bug_logic(){

		if($this->session->userdata('is_logged_in')){

			$this->form_validation->set_rules('bug_title', 'Bug title', 'required|max_length[255]');
			$this->form_validation->set_rules('bug_page_title', 'Bug page title', 'required|max_length[255]');
			$this->form_validation->set_rules('bug_cms_id', 'Bug CMS ID', 'integer|max_length[20]');
			$this->form_validation->set_rules('bug_region', 'Bug region', 'required|max_length[125]');
			$this->form_validation->set_rules('bug_description', 'Bug description', 'required|max_length[555]');
			$this->form_validation->set_rules('bug_status', 'Bug status', 'required|max_length[255]');
			$this->form_validation->set_rules('bug_priority', 'Bug priority', 'required|max_length[12]');
			$this->form_validation->set_rules('bug_developer', 'Bug developers', 'required|max_length[125]');
			$this->form_validation->set_rules('bug_is_complete', 'Bug is complete?', 'required|max_length[125]');

			if($this->form_validation->run()){
				
				$id = $this->uri->segment(3);
				$time = time();
				$datestring = "%d/%m/%Y";

				$data = array(
					'bug_title' => $this->input->post('bug_title'),
					'bug_page_title' => $this->input->post('bug_page_title'),
					'bug_cms_id' => $this->input->post('bug_cms_id'),
					'bug_region' => $this->input->post('bug_region'),
					'bug_description' => $this->input->post('bug_description'),
					'bug_status' => $this->input->post('bug_status'),
					'bug_priority' => $this->input->post('bug_priority'),
					'bug_developer' => $this->input->post('bug_developer'),
					'bug_is_complete' => $this->input->post('bug_is_complete'),
					'bug_last_modified' => mdate($datestring, $time)
					);

				redirect('bug_control/');

			/* End of data array */

			$this->bug_control_model->edit_bug($id, $data);

			}else{
				echo "Form validation failed.";
			}

		}else{
			redirect('core/restricted');
		}
	}

	public function edit_by_id(){
		

	}

	/* Display datasets */

	public function display_complete(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			
			$this->data['results'] = $this->bug_control_model->get_complete();
			$this->load->view('display_completed_bugs', $this->data);

		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}

	public function display_outstanding(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$this->data['results'] = $this->bug_control_model->get_outstanding();
			$this->load->view('display_outstanding_bugs', $this->data);

 		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}
}

/* End of class Bug_control (extends CI_Controller) */