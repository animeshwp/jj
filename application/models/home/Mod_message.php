<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Mod_message extends CI_Model {
    function __construct() {
        parent::__construct();

    }
        // private $_vimg_message = "vimg_message";
    
    function insert_message($img_info){
        $day = date("Y-m-d H:i:s");
        $message_info = array(
            "message_name"      => $this->input->post('messagename'),
            "message_date"      => $day,
            "message_text"      => $this->input->post('message_text'),
            "message_status"    => $this->input->post('message_status'),
            "message_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($message_info); exit();
        $result = $this->db->insert('vimg_message',$message_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_message(){
        $message_query = $this->db->get_where('vimg_message', array('message_status' => 1));       
        $message_result = $message_query->result_array();           
        return $message_result;
    }
    
    function view_inactivemessage(){ // model for home page message
        $message_query = $this->db->get_where('vimg_message', array('message_status' => 0));       
        $message_result = $message_query->result_array();           
        return $message_result;
    }
    
    function view_hmessage(){ // model for home page message
        $this->db->limit('1');
        $message_query = $this->db->get_where('vimg_message', array('message_status' => 1));       
        return $message_query->row();           
        
    }
    
    
    function edit_message($nemu_id){
        $message_query = $this->db->get_where('vimg_message', array('message_id' => $nemu_id) );       
        $message_result = $message_query->result_array();               
//        echo "<pre>";
//        print_r ($message_result); exit();              
        return $message_result;
    }


    function update_message($nemu_id){

        $day = date("Y-m-d H:i:s");
        $message_info = array(
            "message_name"      => $this->input->post('messagename'),
            "message_date"      => $day,
            "message_text"      => $this->input->post('message_text'),
            "message_status"    => $this->input->post('message_status')         
        );
//        echo $nemu_id; exit;
//        echo "<pre>";
//        print_r ($message_info); exit();
        $this->db->where('message_id', $nemu_id);
        $result = $this->db->update('vimg_message',$message_info);
//        ECHO $result; EXIT;
        if ($result > 0){
            return $result;
        }
    }
}


//CREATE TABLE IF NOT EXISTS `vimg_message` (
//  `message_id` int(11) NOT NULL AUTO_INCREMENT,
//  `message_name` varchar(255) NOT NULL,
//  `message_date` datetime NOT NULL,
//  `message_text` text NOT NULL,
//  `message_status` tinyint(4) NOT NULL,
//  `message_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`message_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;
