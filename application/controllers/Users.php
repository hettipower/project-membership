<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index(){ 
		$this->load->helper('url');
		if ($this->Admin_model->verifyUser()) {
			redirect(base_url(), 'auto');
		} 
    }

    public function members($page=null, $adminid=0) {
		if ($this->Admin_model->verifyUser()) {
			if ($this->input->post()){
				$postData = $this->input->post();
				$responce = $this->Admin_model->updateAdmins($postData, $postData["action"]);
				switch ($responce) {
					case '1':
						$this->session->set_flashdata('success', "Successfully added Member.");
						break;
					case '2':
						$this->session->set_flashdata('error', "Please Fill Fields.");
						break;
					case '3':
						$this->session->set_flashdata('error', "The two passwords you entered don't match.");
						break;
					case '4':
						$this->session->set_flashdata('error', "The email address you entered is not valid.");
						break;
					case '5':
						$this->session->set_flashdata('error', "An account exists with this Username.");
						break;
					case '6':
						$this->session->set_flashdata('success', "Successfully updated Member.");
						break;
					case '7':
						$this->session->set_flashdata('error', "Something went wrong. Please Try Again Later.");
						break;
					case '8':
						$this->session->set_flashdata('error', "You Cannot Delete Login Member.");
						break;
					case '9':
						$this->session->set_flashdata('success', "Successfully deleted Member.");
						break;
					default:
						$this->session->set_flashdata('error', "Something went wrong.");
						break;
				}
			}
			if ($page == "add") {
				$data["admins"] = $this->Admin_model->getAdmins();
				$data["admin_groups"] = $this->Admin_model->getAdminGroups();
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["kottasha"] = $this->Admin_model->getKottashaya();				
				$data["gn_divisions"] = $this->Admin_model->getGNDivitions();
				$data["towns"] = $this->Admin_model->getTowns();
				$data["seats"] = $this->Admin_model->getSeats();
				$data["schools"] = $this->Admin_model->getSchools();
				$data["institutes"] = $this->Admin_model->getInstitutes();
				$data["jobs"] = $this->Admin_model->getJobs();
				$data["offices"] = $this->Admin_model->getOffices();
				$this->load->view('header' , $data);
				$this->load->view('users/member_add', $data);
				$this->load->view('footer');
			} elseif ($page == "edit") {
				if ($adminid == null) { redirect(base_url(), 'auto'); }
				$data["result"] = $this->Admin_model->getAdminInfo($adminid);
				$data["admin_groups"] = $this->Admin_model->getAdminGroups();
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["kottasha"] = $this->Admin_model->getKottashaya();				
				$data["gn_divisions"] = $this->Admin_model->getGNDivitions();
				$data["towns"] = $this->Admin_model->getTowns();
				$data["seats"] = $this->Admin_model->getSeats();
				$data["schools"] = $this->Admin_model->getSchools();
				$data["institutes"] = $this->Admin_model->getInstitutes();
				$data["jobs"] = $this->Admin_model->getJobs();
				$data["offices"] = $this->Admin_model->getOffices();
				$this->load->view('header');
				$this->load->view('users/member_edit', $data);
				$this->load->view('footer');
			} else {
				$data["admins"] = $this->Admin_model->getAdmins();
				$data["admin_groups"] = $this->Admin_model->getAdminGroups();
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["kottasha"] = $this->Admin_model->getKottashaya();				
				$data["gn_divisions"] = $this->Admin_model->getGNDivitions();
				$data["towns"] = $this->Admin_model->getTowns();
				$data["seats"] = $this->Admin_model->getSeats();
				$data["schools"] = $this->Admin_model->getSchools();
				$data["institutes"] = $this->Admin_model->getInstitutes();
				$data["jobs"] = $this->Admin_model->getJobs();
				$data["offices"] = $this->Admin_model->getOffices();
				$this->load->view('header');
				$this->load->view('users/members', $data);
				$this->load->view('footer');
			} 	
		}
	}

	public function groups($page=null, $groupid=0) {
		if ($this->Admin_model->verifyUser()) {
			if ($this->input->post()){
				$postData = $this->input->post();
				$responce = $this->Admin_model->updateGroups($postData, $postData["action"]);
				switch ($responce) {
					case '1':
						$this->session->set_flashdata('success', "Successfully added Admin Group.");
						break;
					case '2':
						$this->session->set_flashdata('error', "Please Fill Fields.");
						break;
					case '3':
						$this->session->set_flashdata('error', "Group exists with this name.");
						break;
					case '4':
						$this->session->set_flashdata('error', "Need to update Field.");
						break;
					case '5':
						$this->session->set_flashdata('success', "Successfully updated Admin Group.");
						break;
					case '6':
						$this->session->set_flashdata('error', "You Need to remove Members first.");
						break;
					case '7':
						$this->session->set_flashdata('success', "Successfully deleted Admin Group.");
						break;
					default:
						$this->session->set_flashdata('error', "Something went wrong.");
						break;
				}
			}
			if ($page == "add") {
				$data["groups"] = $this->Admin_model->getAdminGroups();
				$this->load->view('header');
				$this->load->view('users/admingroups_add', $data);
				$this->load->view('footer');
			} elseif ($page == "edit") {
				$data["result"] = $this->Admin_model->getAdminGroups($groupid);
				$this->load->view('header');
				$this->load->view('users/admingroups_edit', $data);
				$this->load->view('footer');
			} else {
				$data["groups"] = $this->Admin_model->getAdminGroups();
				$this->load->view('header');
				$this->load->view('users/groups', $data);
				$this->load->view('footer');
			} 
		}
	}

	public function get_towns_relatedto_divition(){
		$results = array();
		$province = $this->input->post('province');
		$district = $this->input->post('district');
		$kottasha = $this->input->post('kottasha');
		$divition = $this->input->post('divition');
		$towns = $this->Admin_model->getTownsFromRelated($province,$district,$kottasha,$divition);
		if( !empty($towns) ){
			$results['status'] = true;
			$results['content'] = $towns;
		}else{
			$results['status'] = false;
		}
		echo json_encode($results);
	}

}