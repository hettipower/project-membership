<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Other extends CI_Controller {

	public function index()
	{ 
		$this->load->helper('url');
		if ($this->Admin_model->verifyUser()) {
			redirect(base_url(), 'auto');
		} 
    }

    public function schools($page=null, $schoolID=0) {
		if ($this->Admin_model->verifyUser()) {
			$this->session->set_flashdata('' , '');
			if ($this->input->post()){
				$postData = $this->input->post();
				$responce = $this->Admin_model->updateSchool($postData, $postData["action"]);
				switch ($responce) {
					case '1':
						$this->session->set_flashdata('success', "Successfully added School.");
						break;
					case '2':
						$this->session->set_flashdata('error', "Please Fill Fields.");
						break;
					case '3':
						$this->session->set_flashdata('error', "Already Added this School.");
						break;
					case '4':
						$this->session->set_flashdata('error', "Need to update field.");
						break;
					case '5':
						$this->session->set_flashdata('success', "Successfully edited School.");
						break;
					case '7':
						$this->session->set_flashdata('success', "Successfully removed School.");
						break;
					default:
						$this->session->set_flashdata('error', "Something went wrong.");
						break;
				}
			}
			if ($page == "add") {
				$data["schools"] = $this->Admin_model->getSchools();
				$this->load->view('header');
				$this->load->view('settings/other/school_add' , $data);
				$this->load->view('footer');
			} elseif ($page == "edit") {
				$data["result"] = $this->Admin_model->getSchoolFormID($schoolID);
				$this->load->view('header');
				$this->load->view('settings/other/school_edit', $data);
				$this->load->view('footer');
			} else {
				$data["schools"] = $this->Admin_model->getSchools();
				$this->load->view('header');
				$this->load->view('settings/other/schools', $data);
				$this->load->view('footer');
			} 
		}
    }
    
    public function institutes($page=null, $instituteID=0) {
		if ($this->Admin_model->verifyUser()) {
			$this->session->set_flashdata('' , '');
			if ($this->input->post()){
				$postData = $this->input->post();
				$responce = $this->Admin_model->updateInstitute($postData, $postData["action"]);
				switch ($responce) {
					case '1':
						$this->session->set_flashdata('success', "Successfully added School.");
						break;
					case '2':
						$this->session->set_flashdata('error', "Please Fill Fields.");
						break;
					case '3':
						$this->session->set_flashdata('error', "Already Added this School.");
						break;
					case '4':
						$this->session->set_flashdata('error', "Need to update field.");
						break;
					case '5':
						$this->session->set_flashdata('success', "Successfully edited School.");
						break;
					case '7':
						$this->session->set_flashdata('success', "Successfully removed School.");
						break;
					default:
						$this->session->set_flashdata('error', "Something went wrong.");
						break;
				}
			}
			if ($page == "add") {
				$data["institutes"] = $this->Admin_model->getInstitutes();
				$this->load->view('header');
				$this->load->view('settings/other/institute_add' , $data);
				$this->load->view('footer');
			} elseif ($page == "edit") {
				$data["result"] = $this->Admin_model->getInstituteFormID($instituteID);
				$this->load->view('header');
				$this->load->view('settings/other/institute_edit', $data);
				$this->load->view('footer');
			} else {
				$data["institutes"] = $this->Admin_model->getInstitutes();
				$this->load->view('header');
				$this->load->view('settings/other/institutes', $data);
				$this->load->view('footer');
			} 
		}
	}
}