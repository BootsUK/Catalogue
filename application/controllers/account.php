<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		/* If statement here to check cookie?? */
		$this->login();
	}

	public function login(){

		print("Log-in script here");
	}

	public function logout(){

		print("Log-out script here");
	}

	public function signup(){

		print("Sign-up script here");
	}

	public function signup_validate(){

		print("Validate sign-up here");
	}

	public function signin(){

		print("Sign-in script here");
	}
}