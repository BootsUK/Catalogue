<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interactive_team extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('interactive_team_model');
	}

	public function index(){
		$this->home();
	}

	public function display_tasks(){

		$this->load->view('header');
		$this->load->view('nav_view');
       
		if($this->session->userdata('is_logged_in')){
			     
			$this->data['results'] = $this->interactive_team_model->view_tasks();

			$this->load->view('interactive_team_view_tasks', $this->data);

		}else{
			redirect('core/restricted');
		} /* End of log-in checked functionality */
     
	$this->load->view('footer');
	}

	public function add_tasks(){

		$this->load->view('header');
		$this->load->view('nav_view');

		$this->form_validation->set_rules('t_title', 'Title', 'required|max_length[255]');
		$this->form_validation->set_rules('t_desc', 'Description', 'required');
		$this->form_validation->set_rules('t_priority', 'Priority', 'required|integer');
		$this->form_validation->set_rules('t_due', 'Due date', '');
		$this->form_validation->set_rules('t_complete', 'Completion date', '');
		$this->form_validation->set_rules('t_status', 'Status', 'required');
		$this->form_validation->set_rules('t_dev', 'Developer', '');
		/* Date modified and date added done server side */
		$this->form_validation->set_rules('t_comments', 'Comments', 'max_length[555]');
		/* Set by handled by session data */

		$this->load->helper('date');

		if($this->session->userdata('is_logged_in')){
			
			$this->load->view('interactive_team_add_tasks');

			$datestring = "%d/%m/%Y";
			$time = time();

			if($this->form_validation->run() == true){

				$email = $this->session->userdata('email');

				$data = array(
					't_title' => $this->input->post('t_title'),
					't_desc'=> $this->input->post('t_desc'),
					't_priority' => $this->input->post('t_priority'),
					't_due' => $this->input->post('t_due'),
					't_comp' => $this->input->post('t_comp'),
					't_status' => $this->input->post('t_status'),
					't_dev' => $this->input->post('t_dev'),
					't_date_added' => mdate($datestring, $time),
					't_date_mod' => mdate($datestring, $time),
					't_comments' => $this->input->post('t_comments'),
					't_set_by' => $email
				);
				$this->interactive_team_model->add_tasks($data);
			}

		}else{
			redirect('core/restricted');
		}
		$this->load->view('footer');
	}

	public function delete_tasks(){

		$id = $this->uri->segment(3);
		$del = $this->interactive_team_model->delete_tasks($id);

		if($del == true){
			redirect('interactive_team/display_tasks');
		}else{
			print "Deletion failed";
		}
	}

	public function update_tasks(){

		$this->load->view('header');

		$this->form_validation->set_rules('t_title', 'Title', 'required|max_length[255]');
		$this->form_validation->set_rules('t_desc', 'Description', 'required');
		$this->form_validation->set_rules('t_priority', 'Priority', 'required|integer');
		$this->form_validation->set_rules('t_due', 'Due date', '');
		$this->form_validation->set_rules('t_complete', 'Completion date', '');
		$this->form_validation->set_rules('t_status', 'Status', 'required');
		$this->form_validation->set_rules('t_dev', 'Developer', '');
		/* Date modified and date added done server side */
		$this->form_validation->set_rules('t_comments', 'Comments', 'max_length[555]');
		/* Set by handled by session data */
		$this->form_validation->set_rules('t_week_com', 'Week commencing', 'max_length[15]');

		$this->load->helper('date');

		if($this->session->userdata('is_logged_in') == 1){
			
			$this->load->view('interactive_team_update_tasks');

			$datestring = "%d/%m/%Y";
			$time = time();

			if($this->form_validation->run() == true){

				$email = $this->session->userdata('email');

				$id = $this->uri->segment(3);

				$data = array(
					't_title' => $this->input->post('t_title'),
					't_desc'=> $this->input->post('t_desc'),
					't_priority' => $this->input->post('t_priority'),
					't_due' => $this->input->post('t_due'),
					't_comp' => $this->input->post('t_comp'),
					't_status' => $this->input->post('t_status'),
					't_date_added' => mdate($datestring, $time),
					't_date_mod' => mdate($datestring, $time),
					't_comments' => $this->input->post('t_comments'),
					't_set_by' => $email,
					't_week_com' => $this->input->post('t_week_com')
				); /* end of data array to be sent to the update_tasks model */

				$this->interactive_team_model->update_tasks($id, $data);
	
			}else{
				echo("<div class='error'>Update failed. <span><a href='mailto:ewan.valentine@boots.co.uk?Subject=Bug%20detected:%20/boots/interactive_team/update_tasks/'>e-mail bug?</a></span></div>");
			} /* end of form validation if statement */

		}else{
			redirect('core/restricted');
		} /* end of user restricted functionality */

		$this->load->view('footer');

	}

	public function home(){
		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$this->load->view('interactive_team_home_view');

		}else{
			redirect('http://evdatacenter.co.uk/boots/core/restricted');
		} /* end of user restricted functionality */

		$this->load->view('footer');
	}

	public function search_tasks(){
		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in') == 1){
			$this->load->view('interactive_team_search_tasks');
		}else{
			redirect('core/restricted');
		}
		$this->load->view('footer');
	}

}