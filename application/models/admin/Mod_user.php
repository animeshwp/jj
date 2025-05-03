<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Mod_menu extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function insert_menu($img_info){
        $day = date("Y-m-d H:i:s");
        $user_info = array(
            "user_name"      => $this->input->post('user_name'),
            "user_email"     => $this->input->post('user_email'),
            "user_password"  => $this->input->post('user_password'),
            "user_clinic"    => $this->input->post('user_clinic'),
            "user_date"      => $day,
            "user_text"      => $this->input->post('user_text'),
            "user_status"    => $this->input->post('user_status'),
            "user_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($user_info); exit();
        $result = $this->db->insert('vimg_user',$user_info);
        if ($result > 0){
            return $result;
        }
    }
}
