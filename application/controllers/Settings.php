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
						$this->session->set_flashdata('error', "Already Added this District.");
						break;
					case '4':
						$this->session->set_flashdata('error', "Need to update field.");
						break;
					case '5':
						$this->session->set_flashdata('success', "Successfully edited District.");
						break;
					case '6':
						$this->session->set_flashdata('error', "Please remove Divisional Secretariat first.");
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

	public function kottashaya($page=null, $kottashaID=0) {
		if ($this->Admin_model->verifyUser()) {
			$this->session->set_flashdata('' , '');
			if ($this->input->post()){
				$postData = $this->input->post();
				$responce = $this->Admin_model->updateKottashaya($postData, $postData["action"]);
				switch ($responce) {
					case '1':
						$this->session->set_flashdata('success', "Successfully added Divisional Secretariat.");
						break;
					case '2':
						$this->session->set_flashdata('error', "Please Fill Fields.");
						break;
					case '3':
						$this->session->set_flashdata('error', "Already Added this Divisional Secretariat.");
						break;
					case '4':
						$this->session->set_flashdata('error', "Need to update field.");
						break;
					case '5':
						$this->session->set_flashdata('success', "Successfully edited Divisional Secretariat.");
						break;
					case '6':
						$this->session->set_flashdata('error', "Please remove GN Division first.");
						break;
					case '7':
						$this->session->set_flashdata('success', "Successfully removed Divisional Secretariat.");
						break;
					default:
						$this->session->set_flashdata('error', "Something went wrong.");
						break;
				}
			}
			if ($page == "add") {
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["kottasha"] = $this->Admin_model->getKottashaya();
				$this->load->view('header');
				$this->load->view('settings/kottashaya_add' , $data);
				$this->load->view('footer');
			} elseif ($page == "edit") {
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["result"] = $this->Admin_model->getKottashayaFormID($kottashaID);
				$this->load->view('header');
				$this->load->view('settings/kottashaya_edit', $data);
				$this->load->view('footer');
			} else {
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["kottasha"] = $this->Admin_model->getKottashaya();
				$this->load->view('header');
				$this->load->view('settings/kottashaya', $data);
				$this->load->view('footer');
			} 
		}
	}

	public function get_district_relatedto_province(){
		$results = array();
		$province = $this->input->post('province');
		$districts = $this->Admin_model->getDistrictsFromProvince($province);
		if( !empty($districts) ){
			$results['status'] = true;
			$results['content'] = $districts;
		}else{
			$results['status'] = false;
		}
		echo json_encode($results);
	}

	public function gn_division($page=null, $divitionID=0) {
		if ($this->Admin_model->verifyUser()) {
			$this->session->set_flashdata('' , '');
			if ($this->input->post()){
				$postData = $this->input->post();
				$responce = $this->Admin_model->updateDivition($postData, $postData["action"]);
				switch ($responce) {
					case '1':
						$this->session->set_flashdata('success', "Successfully added GN Division.");
						break;
					case '2':
						$this->session->set_flashdata('error', "Please Fill Fields.");
						break;
					case '3':
						$this->session->set_flashdata('error', "Already Added this GN Division.");
						break;
					case '4':
						$this->session->set_flashdata('error', "Need to update field.");
						break;
					case '5':
						$this->session->set_flashdata('success', "Successfully edited GN Division.");
						break;
					case '6':
						$this->session->set_flashdata('error', "Please remove Town first.");
						break;
					case '7':
						$this->session->set_flashdata('success', "Successfully removed GN Division.");
						break;
					default:
						$this->session->set_flashdata('error', "Something went wrong.");
						break;
				}
			}
			if ($page == "add") {
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["kottasha"] = $this->Admin_model->getKottashaya();				
				$data["gn_divisions"] = $this->Admin_model->getGNDivitions();
				$this->load->view('header');
				$this->load->view('settings/gn_division_add' , $data);
				$this->load->view('footer');
			} elseif ($page == "edit") {
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["kottasha"] = $this->Admin_model->getKottashaya();
				$data["result"] = $this->Admin_model->getDivitionFormID($divitionID);
				$this->load->view('header');
				$this->load->view('settings/gn_division_edit', $data);
				$this->load->view('footer');
			} else {
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["kottasha"] = $this->Admin_model->getKottashaya();
				$data["gn_divisions"] = $this->Admin_model->getGNDivitions();
				$this->load->view('header');
				$this->load->view('settings/gn_division', $data);
				$this->load->view('footer');
			} 
		}
	}

	public function towns($page=null, $townID=0) {
		if ($this->Admin_model->verifyUser()) {
			$this->session->set_flashdata('' , '');
			if ($this->input->post()){
				$postData = $this->input->post();
				$responce = $this->Admin_model->updateTown($postData, $postData["action"]);
				switch ($responce) {
					case '1':
						$this->session->set_flashdata('success', "Successfully added Town.");
						break;
					case '2':
						$this->session->set_flashdata('error', "Please Fill Fields.");
						break;
					case '3':
						$this->session->set_flashdata('error', "Already Added this Town.");
						break;
					case '4':
						$this->session->set_flashdata('error', "Need to update field.");
						break;
					case '5':
						$this->session->set_flashdata('success', "Successfully edited Town.");
						break;
					case '6':
						$this->session->set_flashdata('error', "Please remove Town first.");
						break;
					case '7':
						$this->session->set_flashdata('success', "Successfully removed Town.");
						break;
					default:
						$this->session->set_flashdata('error', "Something went wrong.");
						break;
				}
			}
			if ($page == "add") {
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["kottasha"] = $this->Admin_model->getKottashaya();				
				$data["gn_divisions"] = $this->Admin_model->getGNDivitions();
				$data["towns"] = $this->Admin_model->getTowns();
				$this->load->view('header');
				$this->load->view('settings/town_add' , $data);
				$this->load->view('footer');
			} elseif ($page == "edit") {
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["kottasha"] = $this->Admin_model->getKottashaya();
				$data["gn_divisions"] = $this->Admin_model->getGNDivitions();
				$data["result"] = $this->Admin_model->getTownFormID($townID);
				$this->load->view('header');
				$this->load->view('settings/town_edit', $data);
				$this->load->view('footer');
			} else {
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["kottasha"] = $this->Admin_model->getKottashaya();
				$data["gn_divisions"] = $this->Admin_model->getGNDivitions();
				$data["towns"] = $this->Admin_model->getTowns();
				$this->load->view('header');
				$this->load->view('settings/town', $data);
				$this->load->view('footer');
			} 
		}
	}

	public function get_kottasha_relatedto_province_and_district(){
		$results = array();
		$province = $this->input->post('province');
		$district = $this->input->post('district');
		$kottasha = $this->Admin_model->getKottashaFromProvinceDistrict($province , $district);
		if( !empty($kottasha) ){
			$results['status'] = true;
			$results['content'] = $kottasha;
		}else{
			$results['status'] = false;
		}
		echo json_encode($results);
	}

	public function get_divition_relatedto_province_district_and_kottasha(){
		$results = array();
		$province = $this->input->post('province');
		$district = $this->input->post('district');
		$kottasha = $this->input->post('kottasha');
		$divitions = $this->Admin_model->getDivitionFromProvinceDistrictKottasha($province , $district , $kottasha);
		if( !empty($divitions) ){
			$results['status'] = true;
			$results['content'] = $divitions;
		}else{
			$results['status'] = false;
		}
		echo json_encode($results);
	}

	public function seats($page=null, $seatID=0) {
		if ($this->Admin_model->verifyUser()) {
			$this->session->set_flashdata('' , '');
			if ($this->input->post()){
				$postData = $this->input->post();
				$responce = $this->Admin_model->updateSeats($postData, $postData["action"]);
				switch ($responce) {
					case '1':
						$this->session->set_flashdata('success', "Successfully added Seat / Division.");
						break;
					case '2':
						$this->session->set_flashdata('error', "Please Fill Fields.");
						break;
					case '3':
						$this->session->set_flashdata('error', "Already Added this Seat / Division.");
						break;
					case '4':
						$this->session->set_flashdata('error', "Need to update field.");
						break;
					case '5':
						$this->session->set_flashdata('success', "Successfully edited Seat / Division.");
						break;
					case '6':
						$this->session->set_flashdata('error', "Please remove Seat / Division first.");
						break;
					case '7':
						$this->session->set_flashdata('success', "Successfully removed Seat / Division.");
						break;
					default:
						$this->session->set_flashdata('error', "Something went wrong.");
						break;
				}
			}
			if ($page == "add") {
				$data["seats"] = $this->Admin_model->getSeats();
				$this->load->view('header');
				$this->load->view('settings/seat_add' , $data);
				$this->load->view('footer');
			} elseif ($page == "edit") {
				$data["provinces"] = $this->Admin_model->getProvinces();
				$data["districts"] = $this->Admin_model->getDistricts();
				$data["kottasha"] = $this->Admin_model->getKottashaya();
				$data["gn_divisions"] = $this->Admin_model->getGNDivitions();
				$data["result"] = $this->Admin_model->getTownFormID($seatID);
				$this->load->view('header');
				$this->load->view('settings/seat_edit', $data);
				$this->load->view('footer');
			} else {
				$data["seats"] = $this->Admin_model->getSeats();
				$this->load->view('header');
				$this->load->view('settings/seat', $data);
				$this->load->view('footer');
			} 
		}
	}

}
