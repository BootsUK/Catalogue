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

	public function home(){
	
		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$this->data['results'] = $this->interactive_team_model->get_complete_list();

			$this->load->view('interactive_team_home_view', $this->data);

		}else{
			redirect('core/restricted');
		} /* end of user restricted functionality */

		$this->load->view('footer');
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
		$this->form_validation->set_rules('t_sh', 'Stakeholder', 'required');
		/* Date modified and date added done server side */
		$this->form_validation->set_rules('t_comments', 'Comments', 'max_length[555]');
		/* Set by handled by session data */

		$this->load->helper('date');

		if($this->session->userdata('is_logged_in')){
			
			$this->load->view('interactive_team_add_tasks');

			$datestring = "%d/%m/%Y";
			$time = time();

			if($this->form_validation->run()){

				$email = $this->session->userdata('email');

				$data = array(
					't_title' => $this->input->post('t_title'),
					't_desc'=> $this->input->post('t_desc'),
					't_priority' => $this->input->post('t_priority'),
					't_due' => $this->input->post('t_due'),
					't_comp' => $this->input->post('t_comp'),
					't_status' => $this->input->post('t_status'),
					't_dev' => $this->input->post('t_dev'),
					't_sh' => $this->input->post('t_sh'),
					't_date_added' => mdate($datestring, $time),
					't_date_mod' => mdate($datestring, $time),
					't_mod_by' => $email,
					't_comments' => $this->input->post('t_comments'),
					't_set_by' => $email
				);

				$this->load->library('email', array('mailtype'=>'html'));

				$message = "<b>Page</b>: " . $data['t_title'] . "<br />\n";
				$message .= "<b>Description</b>: " . $data['t_desc'] . "<br />\n";
				$message .= "<b>Priority</b>: " . $data['t_priority'] . "<br />\n";
				$message .= "<b>Due</b>: " . $data['t_due'] . "<br />\n";
				$message .= "<b>Complete</b>: " . $data['t_comp'] . "<br />\n";
				$message .= "<b>Status</b>: " . $data['t_status'] . "<br />\n";
				$message .= "<b>Stakeholder: </b>" . $data['t_sh'] . "<br />\n";
				$message .= "<b>Date modified</b>: " . $data['t_date_mod'] . "<br />\n";
				$message .= "<b>Modified by</b>: " . $data['t_mod_by'] . "<br />\n";
				$message .= "<b>Comments</b>: " . $data['t_comments'] . "<br />\n";

				$this->email->from('boots@evdatacenter.co.uk', "Admin");
				$this->email->to('ewan.valentine@boots.co.uk');
				$this->email->subject('New task added');
				$this->email->message($message);
				$this->email->send();

				$this->interactive_team_model->add_tasks($data);
				
				redirect('error_handler/success/' . __FUNCTION__ . '_task_added');
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

	public function update_prepare(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$id = $this->uri->segment(3);

			$this->data['results'] = $this->interactive_team_model->get_by_id($id);

			$this->load->view('interactive_team_update_tasks', $this->data);

		}else{
			redirect('core/restricted');
		}
		
		$this->load->view('footer');

	}

	public function update_tasks(){

		$this->load->view('header');

		$this->load->view('nav_view');

		$this->form_validation->set_rules('t_title', 'Title', 'required|max_length[255]');
		$this->form_validation->set_rules('t_desc', 'Description', 'required');
		$this->form_validation->set_rules('t_priority', 'Priority', 'required|integer');
		$this->form_validation->set_rules('t_due', 'Due date', '');
		$this->form_validation->set_rules('t_comp', 'Completion date', '');
		$this->form_validation->set_rules('t_status', 'Status', 'required');
		$this->form_validation->set_rules('t_dev', 'Developer', '');
		$this->form_validation->set_rules('t_sh', 'Stakeholder', 'required');
		/* Date modified and date added done server side */
		$this->form_validation->set_rules('t_comments', 'Comments', 'max_length[555]');
		/* Set by handled by session data */

		$this->load->helper('date');

		if($this->session->userdata('is_logged_in')){

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
					't_sh' => $this->input->post('t_sh'),
					't_date_mod' => mdate($datestring, $time),
					't_mod_by' => $email,
					't_comments' => $this->input->post('t_comments')
				); /* end of data array to be sent to the update_tasks model */

				$this->load->library('email', array('mailtype'=>'html'));

				$message = "<b>Page</b>: " . $data['t_title'] . "<br />\n";
				$message .= "<b>Description</b>: " . $data['t_desc'] . "<br />\n";
				$message .= "<b>Priority</b>: " . $data['t_priority'] . "<br />\n";
				$message .= "<b>Due</b>: " . $data['t_due'] . "<br />\n";
				$message .= "<b>Complete</b>: " . $data['t_comp'] . "<br />\n";
				$message .= "<b>Status</b>: " . $data['t_status'] . "<br />\n";
				$message .= "<b>Developer</b>: " . $data['t_de'] . "<br />\n";
				$message .= "<b>Stakeholder</b>: " . $data['t_sh'] . "<br />\n";
				$message .= "<b>Date modified</b>: " . $data['t_date_mod'] . "<br />\n";
				$message .= "<b>Modified by</b>: " . $data['t_mod_by'] . "<br />\n";
				$message .= "<b>Comments</b>: " . $data['t_comments'] . "<br />\n";

				$this->email->from('boots@evdatacenter.co.uk', "Admin");
				$this->email->to('ewan.valentine@boots.co.uk');
				$this->email->subject('New task update: ' . $data['t_title']);
				$this->email->message($message);
				$this->email->send();

				$id = $this->uri->segment(3);

				$this->interactive_team_model->update_tasks($id, $data);

				redirect('error_handler/success/' . __FUNCTION__);
		
			}else{

				redirect('error_handler/error/' . __FUNCTION__);
				
			} /* end of form validation if statement */

		}else{
			redirect('core/restricted');
		} /* end of user restricted functionality */

		$this->load->view('footer');

	}

	public function search_tasks(){
		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			$this->load->view('interactive_team_search_tasks');
		}else{
			redirect('core/restricted');
		}
		$this->load->view('footer');
	}

	public function search_results(){
		
		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$search_term = $this->input->post('search_term');
			$search_crit = $this->input->post('search_criteria');

			$this->data['results'] = $this->interactive_team_model->search_tasks($search_term, $search_crit);

			$this->load->view('interactive_team_search_results_view', $this->data);
		}
		$this->load->view('footer');
	}

	public function detail_view(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$id = $this->uri->segment(3);

			$data['results'] = $this->interactive_team_model->get_by_id($id);

			$this->load->view('interactive_team_detailed_view', $data);

		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}

	public function save_complete_task(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$id = $this->uri->segment(3);

			$this->interactive_team_model->save_complete_task($id);

		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}

	public function priority_scale(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			$this->load->view('priority_scale');
		}
		
		$this->load->view('footer');	
	}

}