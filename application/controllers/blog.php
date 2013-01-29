<?php 

class Blog extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->helper('date');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$data['result'] = $this->blog_model->get_all_posts();

			$this->load->view('blog_home_view', $data);
		}
		$this->load->view('footer');
	}

	public function insert_post_form(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			$this->load->view('insert_blog_post_view');
		}

		$this->load->view('footer');
	}

	public function insert_post(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$this->form_validation->set_rules('b_title', 'Title', 'required|max_length[555]');
			$this->form_validation->set_rules('b_copy', 'Copy', 'required');

			if($this->form_validation->run()){

				$datestring = "%d/%m/%Y";
				$time = time();

				$data = array(
					'b_title' => $this->input->post('b_title'),
					'b_copy' => $this->input->post('b_copy'),
					'b_author' => $this->session->userdata('email'),
					'b_date' => mdate($datestring, $time),
					'b_mod_date' => mdate($datestring, $time)
					);

				$data['result'] = $this->blog_model->insert_post($data);

				redirect('error_handler/success/' . __FUNCTION__ . '_post_successfully_inserted');
			}else{
				redirect('error_handler/error/' . __FUNCTION__ . '_post_failed');
			}
		}
		$this->load->view('footer');
	}

	public function latest(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$data['result'] = $this->blog_model->get_last_10();

			$this->load->view('latest_blog_view', $data);
		}

		$this->load->view('footer');
	}

	public function edit_post(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$id = $this->uri->segment(3);

			$data['result'] = $this->blog_model->get_by_id($id);

			$this->load->view('edit_blog_post_view', $data);
		}
		$this->load->view('footer');
	}

	public function edit_post_process(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){

			$this->form_validation->set_rule('b_title', 'Title', 'required|max_length[555]');
			$this->form_validation->set_rule('b_copy', 'Copy', 'required');
			
			if($this->form_validation->run()){

				$datestring = "%d/%m/%Y";
				$time = time();

				$data = array(
					'b_title' => $this->input->post('b_title'),
					'b_copy' => $this->input->post('b_copy'),
					'b_author' => $this->session->userdata('email'),
					'b_mod_date' => mdate($datestring, $time)
					);

				$this->blog_model->update_post($id, $data);

			}else{
				redirect('error_handler/' . __FUNCTION__  . '_edit_blog_post_failed');
			}

		}else{
			redirect('core/restricted');
		}

		$this->load->view('footer');
	}

	public function delete_post(){

		$this->load->view('header');
		$this->load->view('nav_view');

		if($this->session->userdata('is_logged_in')){
			$id = $this->uri->segment(3);
			$this->blog_model->delete_post($id);
		}

		$this->load->view('footer');
	}
}