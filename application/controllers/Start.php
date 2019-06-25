<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

	public function index()
	{ 
		$this->load->helper('url');
		if ($this->Admin_model->verifyUser()) {
			$this->load->view('header');
			$this->load->view('welcome_message');
			$this->load->view('footer');
		} 
		
	}
}
