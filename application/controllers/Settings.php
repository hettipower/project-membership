<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function index()
	{ 
		$this->load->helper('url');
		if ($this->Admin_model->verifyUser()) {
			redirect(base_url(), 'auto');
		} 
	}

	public function admins($page=null, $adminid=0) {
		if ($this->Admin_model->verifyUser()) {
			if ($this->input->post()){
				$postData = $this->input->post();
				$this->Admin_model->updateAdmins($postData, $postData["action"]);
			}
			if ($page == "add") {
				$data["admin_groups"] = $this->Admin_model->getAdminGroups();
				$data["page"] = $page;
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$this->load->view('header' , $data);
				$this->load->view('settings/admins_add', $data);
				$this->load->view('footer');
			} elseif ($page == "edit") {
				if ($adminid == null) { redirect(base_url(), 'auto'); }
				$data["admin_groups"] = $this->Admin_model->getAdminGroups();
				$data["result"] = $this->Admin_model->getAdminInfo($adminid);
				$data["page"] = $page;
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$this->load->view('header');
				$this->load->view('settings/admins_edit', $data);
				$this->load->view('footer');
			} else {
				$data["admins"] = $this->Admin_model->getAdmins();
				$this->load->view('header');
				$this->load->view('settings/admins', $data);
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
				$this->load->view('settings/admingroups_add');
				$this->load->view('footer');
			} elseif ($page == "edit") {
				$data["result"] = $this->Admin_model->getAdminGroups($groupid);
				$this->load->view('header');
				$this->load->view('settings/admingroups_edit', $data);
				$this->load->view('footer');
			} else {
				$data["groups"] = $this->Admin_model->getAdminGroups();
				$this->load->view('header');
				$this->load->view('settings/groups', $data);
				$this->load->view('footer');
			} 
		}
	}

	public function provinces($page=null, $provinceID=0) {
		if ($this->Admin_model->verifyUser()) {
			$this->session->set_flashdata('' , '');
			if ($this->input->post()){
				$postData = $this->input->post();
				$responce = $this->Admin_model->updateProvince($postData, $postData["action"]);
				switch ($responce) {
					case '1':
						$this->session->set_flashdata('success', "Successfully added Province.");
						break;
					case '2':
						$this->session->set_flashdata('error', "Please Fill Fields.");
						break;
					case '3':
						$this->session->set_flashdata('error', "Already Added this Province.");
						break;
					case '4':
						$this->session->set_flashdata('error', "Need to update field.");
						break;
					case '5':
						$this->session->set_flashdata('success', "Successfully edited Province.");
						break;
					case '6':
						$this->session->set_flashdata('error', "Please remove District first.");
						break;
					case '7':
						$this->session->set_flashdata('success', "Successfully removed Province.");
						break;
					default:
						$this->session->set_flashdata('error', "Something went wrong.");
						break;
				}
			}
			if ($page == "add") {
				$data["provinces"] = $this->Admin_model->getProvinces();
				$this->load->view('header');
				$this->load->view('settings/province_add' , $data);
				$this->load->view('footer');
			} elseif ($page == "edit") {
				$data["result"] = $this->Admin_model->getProvinceFormID($provinceID);
				$this->load->view('header');
				$this->load->view('settings/province_edit', $data);
				$this->load->view('footer');
			} else {
				$data["provinces"] = $this->Admin_model->getProvinces();
				$this->load->view('header');
				$this->load->view('settings/provinces', $data);
				$this->load->view('footer');
			} 
		}
	}

	public function districts($page=null, $districID=0) {
		if ($this->Admin_model->verifyUser()) {
			$this->session->set_flashdata('' , '');
			if ($this->input->post()){
				$postData = $this->input->post();
				$responce = $this->Admin_model->updateDistrict($postData, $postData["action"]);
				switch ($responce) {
					case '1':
						$this->session->set_flashdata('success', "Successfully added District.");
						break;
					case '2':
						$this->session->set_flashdata('error', "Please Fill Fields.");
						break;
					case '3':
						$this->session->set_flashdata('error', "Already Added this Distric.");
						break;
					case '4':
						$this->session->set_flashdata('error', "Need to update field.");
						break;
					case '5':
						$this->session->set_flashdata('success', "Successfully edited District.");
						break;
					case '6':
						$this->session->set_flashdata('error', "Please remove City first.");
						break;
					case '7':
						$this->session->set_flashdata('success', "Successfully removed District.");
						break;
					default:
						$this->session->set_flashdata('error', "Something went wrong.");
						break;
				}
			}
			if ($page == "add") {
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["provinces"] = $this->Admin_model->getProvinces();
				$this->load->view('header');
				$this->load->view('settings/district_add' , $data);
				$this->load->view('footer');
			} elseif ($page == "edit") {
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["result"] = $this->Admin_model->getDistrictFormID($districID);
				$this->load->view('header');
				$this->load->view('settings/district_edit', $data);
				$this->load->view('footer');
			} else {
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$this->load->view('header');
				$this->load->view('settings/districts', $data);
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
