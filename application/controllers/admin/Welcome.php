<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Welcome extends CI_Controller {

	public function index()
	{
        $this->load->helper(array('form','html'));
		$this->load->view('v_login');
        
	}
}

