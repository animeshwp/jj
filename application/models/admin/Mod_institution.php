<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Mod_institution extends CI_Model{

	private $_institution = "vimg_institutions";
	public function __construct() {
        parent::__construct();
        
    }  
    

    public function institutionInfo(){
    	$query = $this->db->get($this->_institution);
    	$result = $query->row();
    	return $result; 
    }
	

	public function UpdateInstitution(){
		$this->db->update($this->_institution, $this->input->post("data", TRUE));

	}

	public function Updatelogo($file_name){
		// print_r($file_name); exit;
		$this->db->update($this->_institution, $file_name);
		return true;

	}

	public function do_upload_bgimage($file_name){
		// print_r($file_name); exit;
		$this->db->update($this->_institution, $file_name);
		return true;

	}

}