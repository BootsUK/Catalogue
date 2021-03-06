<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interactive_team extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('calendar');
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
		$this->form_validation->set_rules('t_sh', 'Stakeholder', '');
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

	public function select_date_range(){
		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			$this->load->view('select_date_range_view');
		}

		$this->load->view('footer');
	}

	public function view_by_date_range(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');

			$range = array(
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date')
				);

			$this->data['results'] = $this->interactive_team_model->search_by_range($range);

			$this->load->view('search_by_range_view', $this->data);


		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}


	public function generate_xml(){

		if($this->session->userdata('is_logged_in')){
			$this->data['results'] = $this->interactive_team_model->xml_feed();
			$this->load->view('it_tasks_xml_feed', $this->data);

		}else{
			redirect('core/restricted');
		}
		
	}

	public function bootsify_add(){
		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			$this->load->view('add_bootsify_view');
		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}


	public function bootsify(){

		if($this->session->userdata('is_logged_in')){

			$data = array(
				'title' => $this->input->post('title'),
				'teaser' => $this->input->post('teaser'),
				'template' => $this->input->post('template'),
				'body' => $this->input->post('body'),
				'user' => $this->session->userdata('email')
				);

			$this->interactive_team_model->save_bootsify($data);
			$this->load->view('bootsify_view', $data);

		}else{
			redirect('core/restricted');
		}
	}

	public function bootsify_search_load(){

		$this->load->view('header');
		
		if($this->session->userdata('is_logged_in')){

			$this->load->view('search_bootsify_view');
		}

		$this->load->view('footer');
	}

	public function bootsify_search(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			$search = $this->input->post('search');
			$data['results'] = $this->interactive_team_model->search_bootsify($search);

			$this->load->view('bootsify_result_view', $data);
		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');

	}

	public function get_bootsify_by_id(){

		if($this->session->userdata('is_logged_in')){

			$id = $this->uri->segment(3);
			$data['results'] = $this->interactive_team_model->get_bootsify_by_id($id);

			$this->load->view('bootsify_database_view', $data);
		}
	}

	public function delete_bootsify_by_id(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$id = $this->uri->segment(3);
			$this->interactive_team_model->delete_bootsify_by_id($id);

			redirect('interactive_team/bootsify_search');
		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}

	public function edit_bootsify_by_id_form(){

		$this->load->view('header');

		if($this->session->userdata('is_logged_in')){

			// $id = $this->uri->segment(3);
			// $this->data['results'] = $this->interactive_team_model->get_bootsify_by_id($id);

			// $this->load->view('edit_bootsify_form_view', $this->data);

		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}

	public function edit_by_bootsify_id(){

		$this->load->view('header');

		if($this->session->userdata('is_logged_in')){

			$data = array(
				'title' => $this->input->post('title'),
				'teaser' => $this->input->post('teaser'),
				'body' => $this->input->post('body'),
				'template' => $this->input->post('template')
				);

			if($this->interactive_team_model->update_bootsify_by_id($data)){
				$this->load->view('successfully_updated_view');
			}else{
				echo "This update failed";
			}
		}

		$this->load->view('footer');
	}

	public function team_calendar(){

		$prefs['template'] = '

   {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

   {heading_row_start}<tr>{/heading_row_start}

   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
   {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

   {heading_row_end}</tr>{/heading_row_end}

   {week_row_start}<tr>{/week_row_start}
   {week_day_cell}<td>{week_day}</td>{/week_day_cell}
   {week_row_end}</tr>{/week_row_end}

   {cal_row_start}<tr>{/cal_row_start}
   {cal_cell_start}<td>{/cal_cell_start}

   {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
   {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

   {cal_cell_no_content}{day}{/cal_cell_no_content}
   {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

   {cal_cell_blank}&nbsp;{/cal_cell_blank}

   {cal_cell_end}</td>{/cal_cell_end}
   {cal_row_end}</tr>{/cal_row_end}

   {table_close}</table>{/table_close}
';

$this->load->library('calendar', $prefs);

echo $this->calendar->generate();


	}
}