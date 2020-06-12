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
				$this->Admin_model->updateAdmins($postData, $postData["action"]);
			}
			if ($page == "add") {
				$data["admin_groups"] = $this->Admin_model->getAdminGroups();
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["seats"] = $this->Admin_model->getSeats();
				$this->load->view('header' , $data);
				$this->load->view('users/member_add', $data);
				$this->load->view('footer');
			} elseif ($page == "edit") {
				if ($adminid == null) { redirect(base_url(), 'auto'); }
				$data["admin_groups"] = $this->Admin_model->getAdminGroups();
				$data["result"] = $this->Admin_model->getAdminInfo($adminid);
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$this->load->view('header');
				$this->load->view('users/member_edit', $data);
				$this->load->view('footer');
			} else {
				$data["admins"] = $this->Admin_model->getAdmins();
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
				$this->Admin_model->updateGroups($postData, $postData["action"]);
			}
			if ($page == "add") {
				$this->load->view('header');
				$this->load->view('users/admingroups_add');
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

	public function get_cities_relatedto_district(){
		$results = array();
		$district = $this->input->post('district');
		$cities = $this->Admin_model->getCitiesFromDistrict($district);
		if( !empty($cities) ){
			$results['status'] = true;
			$results['content'] = $cities;
		}else{
			$results['status'] = false;
		}
		echo json_encode($results);
	}

}