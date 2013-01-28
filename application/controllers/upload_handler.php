<?php

class Upload_handler extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));		
	}

	public function index(){
		$this->load->view('header');
		$this->load->view('nav_view');
		$this->load->view('upload_view', array('error' => ''));
		$this->load->view('footer');
	}

	public function file_upload(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|gif|png|doc|docx|ppt|xls|xlsx|pptx|psd|eps';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if(! $this->upload->file_upload){
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('header');
			$this->load->view('nav_view');
			$this->load->view('upload_view', $error);
			$this->load->view('footer');
		}else{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('header');
			$this->load->view('nav_view');
			$this->load->view('upload_success_view', $data);
			$this->load->view('footer');
		}
	}	
}