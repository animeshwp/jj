<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $logged_info = $this->session->userdata('logged_info');
        if($logged_info == FALSE){
            redirect(base_url());
        }            
    }
}