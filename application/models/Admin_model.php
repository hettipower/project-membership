<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

    protected function generateSalt() {
            $salt = "xiORG17N6ayoEn6X3";
            return $salt;
    }

    protected function generateVerificationKey() {
            $length = 10;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
    }

    public function getUserIP() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function updateGroups($postData=null, $action=null) {
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["group_name"]) || empty($postData["group_name"])) { 
                $error = 2;
            } else { 
                $group_name = $this->db->escape(strip_tags($postData["group_name"]));
                $groupID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) {
                return $error; 
            }
            $sql = "SELECT * FROM admin_groups WHERE name = ".$group_name;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 3;
            } else {
                $sql2 = "INSERT INTO admin_groups (id,name) VALUES (".$groupID.",".$group_name.")";
                $this->db->query($sql2);
                return 1;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["group_name"]) || empty($postData["group_name"])) { 
                $error = 2;
            } else { 
                $group_name = $this->db->escape(strip_tags($postData["group_name"]));
            }
            if (!isset($postData["id"]) || empty($postData["id"])) { 
                $error = 2;
            } else { 
                $groupID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM admin_groups WHERE name = ".$group_name;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 4;
            } else {
                $sql2 = "UPDATE admin_groups SET name = ".$group_name." WHERE id = ".$groupID;
                $this->db->query($sql2);
                return 5;
            }
        }
        if ($action == "delete") {
            $groupID = $this->db->escape(strip_tags((int)$postData["id"]));
            $sql = "SELECT * FROM users WHERE admin_group = ".$groupID;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 6;
            } else {
                $sql2 = "DELETE FROM admin_groups WHERE id = ".$groupID;
                $this->db->query($sql2);
                return 7;
            }
        }
    }
    
    public function getAdminGroups($additional="") {
        if ($additional !== "") { 
            $additional = "WHERE id = ".$this->db->escape($additional); 
        }
        $sql = "SELECT * FROM admin_groups ".$additional;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getAdminInfo($adminid=null) {
        $sql = "SELECT * FROM users WHERE id = ".$this->db->escape(strip_tags((int)$adminid));
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function getAdmins() {
        $sql = "SELECT * FROM users";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function getProvinces(){
        $sql = "SELECT * FROM provinces";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getDistricts(){
        $sql = "SELECT * FROM districts";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getKottashaya(){
        $sql = "SELECT * FROM kottashaya";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getGNDivitions(){
        $sql = "SELECT * FROM wasama";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getTowns(){
        $sql = "SELECT * FROM town";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getSeats(){
        $sql = "SELECT * FROM asanaya";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getDistrictsFromProvince($province){
        $sql = "SELECT * FROM `districts` WHERE `province` = '$province' ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getKottashaFromProvinceDistrict($province , $district){
        $sql = "SELECT * FROM kottashaya WHERE district = ".$district." AND province = ".$province;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getDivitionFromProvinceDistrictKottasha($province , $district , $kottasha){
        $sql = "SELECT * FROM wasama WHERE district = ".$district." AND province = ".$province." AND kottashaya = ".$kottasha;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getTownsFromRelated($province,$district,$kottasha,$divition){
        $sql = "SELECT * FROM town WHERE province = ".$province." AND district = ".$district." AND kottashaya = ".$kottasha." AND wasama = ".$divition;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getSchools(){
        $sql = "SELECT * FROM schools";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getInstitutes(){
        $sql = "SELECT * FROM institutes";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getJobs(){
        $sql = "SELECT * FROM jobs";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    function getOffices(){
        $sql = "SELECT * FROM offices";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    public function updateAdmins($postData=null, $action=null) {
        if ($action == "add") {

            $username = (isset($postData["username"])) ? $postData["username"] : '' ;
            $password = (isset($postData["password"])) ? $postData["password"] : '' ;
            $password_con = (isset($postData["password_con"])) ? $postData["password_con"] : '' ;
            $email = (isset($postData["email"])) ? $postData["email"] : '' ;
            $fname = (isset($postData["fname"])) ? $postData["fname"] : '' ;
            $address = (isset($postData["address"])) ? $postData["address"] : '' ;
            $contact_no = (isset($postData["contact_no"])) ? $postData["contact_no"] : '' ;
            $nic = (isset($postData["nic"])) ? $postData["nic"] : '' ;
            $province = (isset($postData["province"])) ? $postData["province"] : '' ;
            $district = (isset($postData["district"])) ? $postData["district"] : '' ;
            $divi_secretariat = (isset($postData["divi_secretariat"])) ? $postData["divi_secretariat"] : '' ;
            $divition = (isset($postData["divition"])) ? $postData["divition"] : '' ;
            $town = (isset($postData["town"])) ? $postData["town"] : '' ;
            $seat = (isset($postData["seat"])) ? $postData["seat"] : '' ;
            $school = (isset($postData["school"])) ? $postData["school"] : '' ;
            $institute = (isset($postData["institute"])) ? $postData["institute"] : '' ;
            $job = (isset($postData["job"])) ? $postData["job"] : '' ;
            $office = (isset($postData["office"])) ? $postData["office"] : '' ;
            $political_institute = (isset($postData["political_institute"])) ? $postData["political_institute"] : '' ;
            $candidate = (isset($postData["candidate"])) ? $postData["candidate"] : '' ;
            $other = (isset($postData["other"])) ? $postData["other"] : '' ;
            $admin_group = (isset($postData["admin_group"])) ? $postData["admin_group"] : '' ;
            $userID = (isset($postData["id"])) ? $postData["id"] : '' ;

            if( empty($username) || empty($password) || empty($password_con) || empty($email) || empty($fname) || empty($address) || empty($contact_no) || empty($nic) || empty($province) || empty($district) || empty($divi_secretariat) || empty($divition) || empty($town) || empty($seat) || empty($school) || empty($institute) || empty($job) || empty($office) || empty($political_institute) || empty($candidate) || empty($other) || empty($admin_group) || empty($userID) ){
                return 2;
            }else{
                $verification_key = $this->db->escape($this->generateVerificationKey());
                $salt = $this->generateSalt();
                if ($password !== $password_con) { 
                    return 3; 
                } else { 
                    $saltPassword = $this->db->escape(md5($salt.$password)); 
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return 4;
                }

                $now = $this->db->escape(time());
                $sql = "SELECT * FROM `users` WHERE `username` = '".$username."'";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return 5;
                } else {
                    $sql2 = "INSERT INTO users (id, username, password, email, created_date, verification_key, admin_group, name, nic, address,province, district, kottashaya, wasama, town, asanaya, contact_no, school, institute, job, office, political_institute, candidate, other) VALUES ($userID, '$username', $saltPassword, '$email', $now, $verification_key, $admin_group, '$fname', '$nic', '$address', $province, $district, $divi_secretariat, $divition, $town , $seat, '$contact_no', $school, $institute, $job, $office, '$political_institute', '$candidate', '$other')";
                    $this->db->query($sql2);
                    return 1;
                }
            }
        }
        if ($action == "edit") {

            $username = (isset($postData["username"])) ? $postData["username"] : '' ;
            $password = (isset($postData["password"])) ? $postData["password"] : '' ;
            $password_con = (isset($postData["password_con"])) ? $postData["password_con"] : '' ;
            $email = (isset($postData["email"])) ? $postData["email"] : '' ;
            $fname = (isset($postData["fname"])) ? $postData["fname"] : '' ;
            $address = (isset($postData["address"])) ? $postData["address"] : '' ;
            $contact_no = (isset($postData["contact_no"])) ? $postData["contact_no"] : '' ;
            $nic = (isset($postData["nic"])) ? $postData["nic"] : '' ;
            $province = (isset($postData["province"])) ? $postData["province"] : '' ;
            $district = (isset($postData["district"])) ? $postData["district"] : '' ;
            $divi_secretariat = (isset($postData["divi_secretariat"])) ? $postData["divi_secretariat"] : '' ;
            $divition = (isset($postData["divition"])) ? $postData["divition"] : '' ;
            $town = (isset($postData["town"])) ? $postData["town"] : '' ;
            $seat = (isset($postData["seat"])) ? $postData["seat"] : '' ;
            $school = (isset($postData["school"])) ? $postData["school"] : '' ;
            $institute = (isset($postData["institute"])) ? $postData["institute"] : '' ;
            $job = (isset($postData["job"])) ? $postData["job"] : '' ;
            $office = (isset($postData["office"])) ? $postData["office"] : '' ;
            $political_institute = (isset($postData["political_institute"])) ? $postData["political_institute"] : '' ;
            $candidate = (isset($postData["candidate"])) ? $postData["candidate"] : '' ;
            $other = (isset($postData["other"])) ? $postData["other"] : '' ;
            $admin_group = (isset($postData["admin_group"])) ? $postData["admin_group"] : '' ;
            $userID = (isset($postData["id"])) ? $postData["id"] : '' ;

            if( empty($username) || empty($email) || empty($fname) || empty($address) || empty($contact_no) || empty($nic) || empty($province) || empty($district) || empty($divi_secretariat) || empty($divition) || empty($town) || empty($seat) || empty($school) || empty($institute) || empty($job) || empty($office) || empty($political_institute) || empty($candidate) || empty($other) || empty($admin_group) || empty($userID) ){
                return 2;
            }else{
                if ($password) { 
                    $pass = 1; 
                } else { 
                    $pass = 0; 
                }

                $sql = "SELECT * FROM `users` WHERE `id` = '".$userID."'"; 
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    if ($pass == 0) {
                        $sql = "UPDATE `users` SET `username`=$username, `email`=$email, `admin_group`=$admin_group, `name`=$fname, `nic`=$nic, `address`=$address, `province`=$province, `district`=$district, `kottashaya`=$divi_secretariat, `wasama`=$divition, `town`=$town, `asanaya`=$seat, `contact_no`=$contact_no, `school`=$school, `institute`=$institute, `job`=$job, `office`=$office, `political_institute`=$political_institute, `candidate`=$candidate, `other`=$other WHERE ".$this->db->escape($userID);
                        //$sql = "UPDATE users SET email = $email, name = $name, admin_group = $admin_group, address = $address, address2 = $address2, city = $city, state = $state, zip = $zip WHERE id = ".$this->db->escape($query->row()->id);
                        $this->db->query($sql);
                        return 6;
                    } else {
                        if ($password !== $password_con) { 
                            return 3;
                        }
                        $salt = $this->generateSalt();
                        $password = $this->db->escape(md5($salt.$password));
                        $sql = "UPDATE `users` SET `username`=$username, `password`=$password, `email`=$email, `admin_group`=$admin_group, `name`=$fname, `nic`=$nic, `address`=$address, `province`=$province, `district`=$district, `kottashaya`=$divi_secretariat, `wasama`=$divition, `town`=$town, `asanaya`=$seat, `contact_no`=$contact_no, `school`=$school, `institute`=$institute, `job`=$job, `office`=$office, `political_institute`=$political_institute, `candidate`=$candidate, `other`=$other WHERE ".$this->db->escape($userID);
                        $this->db->query($sql);
                        return 6;
                    }   
                } else {
                    return 7;
                }

            }
        }
        if ($action == "delete") {
            $admin_id = $this->db->escape(strip_tags((int)$postData["id"]));
            if ((int)$postData["id"] == $this->session->userdata("admin_id")) {
                return 8;
            } else {
                $sql = "DELETE FROM users WHERE id = ".$admin_id;
                $this->db->query($sql);
                return 9;     
            }                
        }
    }

    public function adminLogin($postData) {
        if (!isset($postData["username"])) { return 2; }
        if (!isset($postData["password"])) { return 2; }
            $salt = $this->generateSalt();
        $username = $this->db->escape(strip_tags($postData["username"]));
        $password = $this->db->escape(strip_tags(md5($salt.$postData["password"])));
        $sql = "SELECT * FROM users WHERE username = ".$username." AND password = ".$password;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $q = $query->row();
            $this->session->set_userdata("username",$q->username);
            $this->session->set_userdata("verification_key",$q->verification_key);
            $this->session->set_userdata("admin_id", $q->id);
            $this->session->set_userdata("loggedin",1);
            $ip = $this->getUserIP();
            $sql2 = "UPDATE users SET last_signin = NOW(), ip = ".$this->db->escape($ip)." WHERE id = ".$q->id;
            $this->db->query($sql2);
            return TRUE;
        } else {
            return 2;
        }
    }

    public function verifyUser() {
        if ($this->session->userdata("username") && $this->session->userdata("verification_key") && $this->session->userdata("admin_id") && $this->session->userdata("loggedin")) {
            $sql = "SELECT * FROM users WHERE id = ".$this->db->escape(strip_tags((int)$this->session->userdata("admin_id")))." AND verification_key = ".$this->db->escape(strip_tags($this->session->userdata("verification_key")))." AND username = ".$this->db->escape(strip_tags($this->session->userdata("username")));
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                $this->logout();
                redirect(base_url()."login", 'auto');
            }
        } else {
            $this->logout();
            redirect(base_url()."login", 'auto');
        }
    }

    public function logout() {
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("verification_key");
        $this->session->unset_userdata("admin_id");
        $this->session->unset_userdata("loggedin");
        return TRUE;
    }

    public function updateProvince($postData=null, $action=null) {
        $results = array();
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["province"]) || empty($postData["province"])) { 
                $error = 2;
            } else { 
                $province = $this->db->escape(strip_tags($postData["province"]));
                $provinceID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM provinces WHERE province = ".$province;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 3;
            } else {
                $sql2 = "INSERT INTO provinces (province,id) VALUES (".$province.",".$provinceID.")";
                $this->db->query($sql2);
                return 1;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["province"]) || empty($postData["province"])) { 
                $error = 2;
            } else { 
                $province = $this->db->escape(strip_tags($postData["province"]));
            }
            if (!isset($postData["id"]) || empty($postData["id"])) { 
                $error = 2;
            } else { 
                $provinceID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM provinces WHERE province = ".$province;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 4;
            } else {
                $sql2 = "UPDATE provinces SET province = ".$province." WHERE id = ".$provinceID;
                $this->db->query($sql2);
                return 5;
            }
        }
        if ($action == "delete") {
            $provinceID = $this->db->escape(strip_tags((int)$postData["id"]));
            $sql = "SELECT * FROM districts WHERE province = ".$provinceID;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 6;
            } else {
                $sql2 = "DELETE FROM provinces WHERE id = ".$provinceID;
                $this->db->query($sql2);
                return 7;
            }
        }
    }

    public function getProvinceFormID($additional="") {
        if ($additional !== "") { 
            $additional = "WHERE id = ".$this->db->escape($additional); 
        }
        $sql = "SELECT * FROM provinces ".$additional;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function updateDistrict($postData=null, $action=null) {
        $results = array();
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["province"]) || empty($postData["province"])) { 
                $error = 2;
            } else { 
                $province = $this->db->escape(strip_tags($postData["province"]));
            }

            if (!isset($postData["district"]) || empty($postData["district"])) { 
                $error = 2;
            } else { 
                $district = $this->db->escape(strip_tags($postData["district"]));
                $districtID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }

            $sql = "SELECT * FROM districts WHERE district = ".$district." AND province = ".$province;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 3;
            } else {
                $sql2 = "INSERT INTO districts (id,district,province) VALUES (".$districtID.",".$district.",".$province.")";
                $this->db->query($sql2);
                return 1;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["province"]) || empty($postData["province"])) { 
                $error = 2;
            } else { 
                $province = $this->db->escape(strip_tags($postData["province"]));
            }

            if (!isset($postData["district"]) || empty($postData["district"])) { 
                $error = 2;
            } else { 
                $district = $this->db->escape(strip_tags($postData["district"]));
            }

            if (!isset($postData["id"]) || empty($postData["id"])) { 
                $error = 2;
            } else { 
                $districtID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM districts WHERE district = ".$district." AND province = ".$province;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 4;
            } else {
                $sql2 = "UPDATE districts SET district = ".$district." , province = ".$province." WHERE id = ".$districtID;
                $this->db->query($sql2);
                return 5;
            }
        }
        if ($action == "delete") {
            $districtID = $this->db->escape(strip_tags((int)$postData["id"]));
            $sql = "SELECT * FROM kottashaya WHERE district = ".$districtID;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 6;
            } else {
                $sql2 = "DELETE FROM districts WHERE id = ".$districtID;
                $this->db->query($sql2);
                return 7;
            }
        }
    }

    public function getDistrictFormID($additional="") {
        if ($additional !== "") { 
            $additional = "WHERE id = ".$this->db->escape($additional); 
        }
        $sql = "SELECT * FROM districts ".$additional;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function updateKottashaya($postData=null, $action=null) {
        $results = array();
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["province"]) || empty($postData["province"])) { 
                $error = 2;
            } else { 
                $province = $this->db->escape(strip_tags($postData["province"]));
            }

            if (!isset($postData["district"]) || empty($postData["district"])) { 
                $error = 2;
            } else { 
                $district = $this->db->escape(strip_tags($postData["district"]));
            }

            if (!isset($postData["divi_secretariat"]) || empty($postData["divi_secretariat"])) { 
                $error = 2;
            } else { 
                $divi_secretariat = $this->db->escape(strip_tags($postData["divi_secretariat"]));
                $divi_secretariatID = $this->db->escape(strip_tags($postData["id"]));
            }

            if ($error == 2) { 
                return $error; 
            }

            $sql = "SELECT * FROM kottashaya WHERE district = ".$district." AND province = ".$province." AND name = ".$divi_secretariat;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 3;
            } else {
                $sql2 = "INSERT INTO kottashaya (id,name,district,province) VALUES (".$divi_secretariatID.",".$divi_secretariat.",".$district.",".$province.")";
                $this->db->query($sql2);
                return 1;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["province"]) || empty($postData["province"])) { 
                $error = 2;
            } else { 
                $province = $this->db->escape(strip_tags($postData["province"]));
            }

            if (!isset($postData["district"]) || empty($postData["district"])) { 
                $error = 2;
            } else { 
                $district = $this->db->escape(strip_tags($postData["district"]));
            }

            if (!isset($postData["divi_secretariat"]) || empty($postData["divi_secretariat"])) { 
                $error = 2;
            } else { 
                $divi_secretariat = $this->db->escape(strip_tags($postData["divi_secretariat"]));
            }

            if (!isset($postData["id"]) || empty($postData["id"])) { 
                $error = 2;
            } else { 
                $divi_secretariatID = $this->db->escape(strip_tags($postData["id"]));
            }

            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM kottashaya WHERE district = ".$district." AND province = ".$province." AND name = ".$divi_secretariat;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 4;
            } else {
                $sql2 = "UPDATE kottashaya SET name = ".$divi_secretariat." , district = ".$district." , province = ".$province." WHERE id = ".$divi_secretariatID;
                $this->db->query($sql2);
                return 5;
            }
        }
        if ($action == "delete") {
            $divi_secretariatID = $this->db->escape(strip_tags((int)$postData["id"]));
            $sql = "SELECT * FROM wasama WHERE kottashaya = ".$divi_secretariatID;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 6;
            } else {
                $sql2 = "DELETE FROM kottashaya WHERE id = ".$divi_secretariatID;
                $this->db->query($sql2);
                return 7;
            }
        }
    }

    public function getKottashayaFormID($additional="") {
        if ($additional !== "") { 
            $additional = "WHERE id = ".$this->db->escape($additional); 
        }
        $sql = "SELECT * FROM kottashaya ".$additional;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function updateDivition($postData=null, $action=null) {
        $results = array();
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["province"]) || empty($postData["province"])) { 
                $error = 2;
            } else { 
                $province = $this->db->escape(strip_tags($postData["province"]));
            }

            if (!isset($postData["district"]) || empty($postData["district"])) { 
                $error = 2;
            } else { 
                $district = $this->db->escape(strip_tags($postData["district"]));
            }

            if (!isset($postData["divi_secretariat"]) || empty($postData["divi_secretariat"])) { 
                $error = 2;
            } else { 
                $divi_secretariat = $this->db->escape(strip_tags($postData["divi_secretariat"]));
            }

            if (!isset($postData["divition"]) || empty($postData["divition"])) { 
                $error = 2;
            } else { 
                $divition = $this->db->escape(strip_tags($postData["divition"]));
                $divitionID = $this->db->escape(strip_tags($postData["id"]));
            }

            if ($error == 2) { 
                return $error; 
            }

            $sql = "SELECT * FROM wasama WHERE district = ".$district." AND province = ".$province." AND kottashaya = ".$divi_secretariat." AND name = ".$divition;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 3;
            } else {
                $sql2 = "INSERT INTO wasama (id,name,kottashaya,district,province) VALUES (".$divitionID.",".$divition.",".$divi_secretariat.",".$district.",".$province.")";
                $this->db->query($sql2);
                return 1;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["province"]) || empty($postData["province"])) { 
                $error = 2;
            } else { 
                $province = $this->db->escape(strip_tags($postData["province"]));
            }

            if (!isset($postData["district"]) || empty($postData["district"])) { 
                $error = 2;
            } else { 
                $district = $this->db->escape(strip_tags($postData["district"]));
            }

            if (!isset($postData["divi_secretariat"]) || empty($postData["divi_secretariat"])) { 
                $error = 2;
            } else { 
                $divi_secretariat = $this->db->escape(strip_tags($postData["divi_secretariat"]));
            }

            if (!isset($postData["divition"]) || empty($postData["divition"])) { 
                $error = 2;
            } else { 
                $divition = $this->db->escape(strip_tags($postData["divition"]));
            }

            if (!isset($postData["id"]) || empty($postData["id"])) { 
                $error = 2;
            } else { 
                $divitionID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM wasama WHERE district = ".$district." AND province = ".$province." AND kottashaya = ".$divi_secretariat." AND name = ".$divition;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 4;
            } else {
                $sql2 = "UPDATE wasama SET name = ".$divition." , kottashaya = ".$divi_secretariat." , district = ".$district." , province = ".$province." WHERE id = ".$divitionID;
                $this->db->query($sql2);
                return 5;
            }
        }
        if ($action == "delete") {
            $divitionID = $this->db->escape(strip_tags((int)$postData["id"]));
            $sql = "SELECT * FROM town WHERE wasama = ".$divitionID;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 6;
            } else {
                $sql2 = "DELETE FROM wasama WHERE id = ".$divitionID;
                $this->db->query($sql2);
                return 7;
            }
        }
    }

    public function getDivitionFormID($additional="") {
        if ($additional !== "") { 
            $additional = "WHERE id = ".$this->db->escape($additional); 
        }
        $sql = "SELECT * FROM wasama ".$additional;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function updateTown($postData=null, $action=null) {
        $results = array();
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["province"]) || empty($postData["province"])) { 
                $error = 2;
            } else { 
                $province = $this->db->escape(strip_tags($postData["province"]));
            }

            if (!isset($postData["district"]) || empty($postData["district"])) { 
                $error = 2;
            } else { 
                $district = $this->db->escape(strip_tags($postData["district"]));
            }

            if (!isset($postData["divi_secretariat"]) || empty($postData["divi_secretariat"])) { 
                $error = 2;
            } else { 
                $divi_secretariat = $this->db->escape(strip_tags($postData["divi_secretariat"]));
            }

            if (!isset($postData["divition"]) || empty($postData["divition"])) { 
                $error = 2;
            } else { 
                $divition = $this->db->escape(strip_tags($postData["divition"]));
            }

            if (!isset($postData["town"]) || empty($postData["town"])) { 
                $error = 2;
            } else { 
                $town = $this->db->escape(strip_tags($postData["town"]));
                $townID = $this->db->escape(strip_tags($postData["id"]));
            }

            if ($error == 2) { 
                return $error; 
            }

            $sql = "SELECT * FROM town WHERE district = ".$district." AND province = ".$province." AND kottashaya = ".$divi_secretariat." AND wasama = ".$divition." AND name = ".$town;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 3;
            } else {
                $sql2 = "INSERT INTO town (id,name,wasama,kottashaya,district,province) VALUES (".$townID.",".$town.",".$divition.",".$divi_secretariat.",".$district.",".$province.")";
                $this->db->query($sql2);
                return 1;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["province"]) || empty($postData["province"])) { 
                $error = 2;
            } else { 
                $province = $this->db->escape(strip_tags($postData["province"]));
            }

            if (!isset($postData["district"]) || empty($postData["district"])) { 
                $error = 2;
            } else { 
                $district = $this->db->escape(strip_tags($postData["district"]));
            }

            if (!isset($postData["divi_secretariat"]) || empty($postData["divi_secretariat"])) { 
                $error = 2;
            } else { 
                $divi_secretariat = $this->db->escape(strip_tags($postData["divi_secretariat"]));
            }

            if (!isset($postData["divition"]) || empty($postData["divition"])) { 
                $error = 2;
            } else { 
                $divition = $this->db->escape(strip_tags($postData["divition"]));
            }

            if (!isset($postData["town"]) || empty($postData["town"])) { 
                $error = 2;
            } else { 
                $town = $this->db->escape(strip_tags($postData["town"]));
            }

            if (!isset($postData["id"]) || empty($postData["id"])) { 
                $error = 2;
            } else { 
                $townID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM town WHERE district = ".$district." AND province = ".$province." AND kottashaya = ".$divi_secretariat." AND wasama = ".$divition." AND name = ".$town;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 4;
            } else {
                $sql2 = "UPDATE town SET name = ".$town." , wasama = ".$divition." , kottashaya = ".$divi_secretariat." , district = ".$district." , province = ".$province." WHERE id = ".$townID;
                $this->db->query($sql2);
                return 5;
            }
        }
        if ($action == "delete") {
            $townID = $this->db->escape(strip_tags((int)$postData["id"]));
            $sql = "DELETE FROM town WHERE id = ".$townID;
            $query = $this->db->query($sql);
            $this->db->query($sql);
            return 7;
        }
    }

    public function getTownFormID($additional="") {
        if ($additional !== "") { 
            $additional = "WHERE id = ".$this->db->escape($additional); 
        }
        $sql = "SELECT * FROM town ".$additional;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function updateSeats($postData=null, $action=null) {
        $results = array();
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["seat"]) || empty($postData["seat"])) { 
                $error = 2;
            } else { 
                $seat = $this->db->escape(strip_tags($postData["seat"]));
                $seatID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM asanaya WHERE name = ".$seat;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 3;
            } else {
                $sql2 = "INSERT INTO asanaya (name,id) VALUES (".$seat.",".$seatID.")";
                $this->db->query($sql2);
                return 1;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["seat"]) || empty($postData["seat"])) { 
                $error = 2;
            } else { 
                $seat = $this->db->escape(strip_tags($postData["seat"]));
            }
            if (!isset($postData["id"]) || empty($postData["id"])) { 
                $error = 2;
            } else { 
                $seatID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM asanaya WHERE name = ".$seat;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 4;
            } else {
                $sql2 = "UPDATE asanaya SET name = ".$seat." WHERE id = ".$seatID;
                $this->db->query($sql2);
                return 5;
            }
        }
        if ($action == "delete") {
            $seatID = $this->db->escape(strip_tags((int)$postData["id"]));
            $sql2 = "DELETE FROM asanaya WHERE id = ".$seatID;
            $this->db->query($sql2);
            return 7;
        }
    }

    public function updateSchool($postData=null, $action=null) {
        $results = array();
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["school"]) || empty($postData["school"])) { 
                $error = 2;
            } else { 
                $school = $this->db->escape(strip_tags($postData["school"]));
                $schoolID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM schools WHERE name = ".$school;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 3;
            } else {
                $sql2 = "INSERT INTO schools (name,id) VALUES (".$school.",".$schoolID.")";
                $this->db->query($sql2);
                return 1;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["school"]) || empty($postData["school"])) { 
                $error = 2;
            } else { 
                $school = $this->db->escape(strip_tags($postData["school"]));
            }
            if (!isset($postData["id"]) || empty($postData["id"])) { 
                $error = 2;
            } else { 
                $schoolID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM schools WHERE name = ".$school;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 4;
            } else {
                $sql2 = "UPDATE schools SET name = ".$school." WHERE id = ".$schoolID;
                $this->db->query($sql2);
                return 5;
            }
        }
        if ($action == "delete") {
            $schoolID = $this->db->escape(strip_tags((int)$postData["id"]));
            $sql2 = "DELETE FROM schools WHERE id = ".$schoolID;
            $this->db->query($sql2);
            return 7;
        }
    }

    public function getSchoolFormID($additional="") {
        if ($additional !== "") { 
            $additional = "WHERE id = ".$this->db->escape($additional); 
        }
        $sql = "SELECT * FROM schools ".$additional;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function updateInstitute($postData=null, $action=null) {
        $results = array();
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["institute"]) || empty($postData["institute"])) { 
                $error = 2;
            } else { 
                $institute = $this->db->escape(strip_tags($postData["institute"]));
                $instituteID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM institutes WHERE name = ".$institute;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 3;
            } else {
                $sql2 = "INSERT INTO institutes (name,id) VALUES (".$institute.",".$instituteID.")";
                $this->db->query($sql2);
                return 1;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["institute"]) || empty($postData["institute"])) { 
                $error = 2;
            } else { 
                $institute = $this->db->escape(strip_tags($postData["institute"]));
            }
            if (!isset($postData["id"]) || empty($postData["id"])) { 
                $error = 2;
            } else { 
                $instituteID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM institutes WHERE name = ".$institute;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 4;
            } else {
                $sql2 = "UPDATE institutes SET name = ".$institute." WHERE id = ".$instituteID;
                $this->db->query($sql2);
                return 5;
            }
        }
        if ($action == "delete") {
            $instituteID = $this->db->escape(strip_tags((int)$postData["id"]));
            $sql2 = "DELETE FROM institutes WHERE id = ".$instituteID;
            $this->db->query($sql2);
            return 7;
        }
    }

    public function getInstituteFormID($additional="") {
        if ($additional !== "") { 
            $additional = "WHERE id = ".$this->db->escape($additional); 
        }
        $sql = "SELECT * FROM institutes ".$additional;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function updateJob($postData=null, $action=null) {
        $results = array();
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["job"]) || empty($postData["job"])) { 
                $error = 2;
            } else { 
                $job = $this->db->escape(strip_tags($postData["job"]));
                $jobID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM jobs WHERE name = ".$job;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 3;
            } else {
                $sql2 = "INSERT INTO jobs (name,id) VALUES (".$job.",".$jobID.")";
                $this->db->query($sql2);
                return 1;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["job"]) || empty($postData["job"])) { 
                $error = 2;
            } else { 
                $job = $this->db->escape(strip_tags($postData["job"]));
            }
            if (!isset($postData["id"]) || empty($postData["id"])) { 
                $error = 2;
            } else { 
                $jobID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM jobs WHERE name = ".$job;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 4;
            } else {
                $sql2 = "UPDATE jobs SET name = ".$job." WHERE id = ".$jobID;
                $this->db->query($sql2);
                return 5;
            }
        }
        if ($action == "delete") {
            $jobID = $this->db->escape(strip_tags((int)$postData["id"]));
            $sql2 = "DELETE FROM jobs WHERE id = ".$jobID;
            $this->db->query($sql2);
            return 7;
        }
    }

    public function getJobFormID($additional="") {
        if ($additional !== "") { 
            $additional = "WHERE id = ".$this->db->escape($additional); 
        }
        $sql = "SELECT * FROM jobs ".$additional;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function updateOffice($postData=null, $action=null) {
        $results = array();
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["office"]) || empty($postData["office"])) { 
                $error = 2;
            } else { 
                $office = $this->db->escape(strip_tags($postData["office"]));
                $officeID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM offices WHERE name = ".$office;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 3;
            } else {
                $sql2 = "INSERT INTO offices (name,id) VALUES (".$office.",".$officeID.")";
                $this->db->query($sql2);
                return 1;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["office"]) || empty($postData["office"])) { 
                $error = 2;
            } else { 
                $office = $this->db->escape(strip_tags($postData["office"]));
            }
            if (!isset($postData["id"]) || empty($postData["id"])) { 
                $error = 2;
            } else { 
                $officeID = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) { 
                return $error; 
            }
            $sql = "SELECT * FROM offices WHERE name = ".$office;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 4;
            } else {
                $sql2 = "UPDATE offices SET name = ".$office." WHERE id = ".$officeID;
                $this->db->query($sql2);
                return 5;
            }
        }
        if ($action == "delete") {
            $officeID = $this->db->escape(strip_tags((int)$postData["id"]));
            $sql2 = "DELETE FROM offices WHERE id = ".$officeID;
            $this->db->query($sql2);
            return 7;
        }
    }

    public function getOfficeFormID($additional="") {
        if ($additional !== "") { 
            $additional = "WHERE id = ".$this->db->escape($additional); 
        }
        $sql = "SELECT * FROM offices ".$additional;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

}