<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Mod_login extends CI_Model
{

    private $_users = "jj_admin";

    function __construct() 
    {
        parent::__construct();
    }
    
    function login_info()
    {
        
       $user_check = $this->db->get_where($this->_users, 
               array( 
                   'admin_name' => $this->input->post('username'),
                   'admin_password' => md5($this->input->post('password'))
           
           ) );
       // echo "<pre>";
       // print_r($user_check); exit;
       
       if ($user_check->num_rows() > 0){ 
       // check 
        $rec = $user_check->row_array();
        $admin_name = $rec['admin_name'];
        $admin_password = $rec['admin_password'];

        $admin_info = array( // user info retrive 
            'admin_name' => $admin_name,
            'admin_password' => $admin_password,
            'login_validation' => TRUE
        );
//        print_r($admin_info); exit;
       }else{
           return FALSE;
       }
       return $admin_info;
    }
}