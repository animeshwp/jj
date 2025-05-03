<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Admin_area extends MY_Controller {

    public function __construct() {
        parent::__construct();
            
    }
    public function index(){
        $data['title'] =  "Welcome to VImaging Admin";
        $data['username'] = $this->session->userdata('username');
        $this->load->helper(array('html','form'));
        $data['content'] = "Welcome to Admin Area";
        $this->load->helper(array('form', 'html'));
        $this->load->view('v_admin', $data);
//        $this->load->view('header', $data);
    }
    
    public function moreinfo() {
    	echo "this is eclipse test";
    }

}