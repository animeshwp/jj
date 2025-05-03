<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Logout extends CI_Controller {
    function __Construct(){
    parent::__construct();
    
    }
    public function index(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
}

