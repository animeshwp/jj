<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Mod_links extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
     function insert_links(){
        $day = date("Y-m-d H:i:s");
        $links_info = array(
            "links_name"      => $this->input->post('linksname'),
            "links_date"      => $day,
            "links_web"      => $this->input->post('weblink'),
            "links_status"    => $this->input->post('links_status')
//            "links_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($links_info); exit();
        $result = $this->db->insert('vimg_links',$links_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_links(){
        $links_query = $this->db->get_where('vimg_links', array('links_status' => 1));       
        $links_result = $links_query->result_array();           
        return $links_result;
    }
    
    function view_inactivelinks(){
        $inactiveLinks_query = $this->db->get_where('vimg_links', array('links_status' => 0));       
        $inactiveLinks_result = $inactiveLinks_query->result_array();           
        return $inactiveLinks_result;
    }
    
    function view_hlinks(){ // model for home page links
        $links_query = $this->db->get_where('vimg_links', array('links_status' => 1));       
        $links_result = $links_query->result_array();     

        return $links_result;
    }
    
    
    function edit_links($links_id){
        $links_query = $this->db->get_where('vimg_links', array('links_id' => $links_id) );       
        $links_result = $links_query->result_array();               
//        echo "<pre>";
//        print_r ($links_result); exit();              
        return $links_result;
    }


    function update_links($nemu_id){

        $day = date("Y-m-d H:i:s");
        $links_info = array(
            "links_name"      => $this->input->post('linksname'),
            "links_date"      => $day,
            "links_web"      => $this->input->post('weblink'),
            "links_status"    => $this->input->post('links_status')         
        );
        
        $this->db->where('links_id', $nemu_id);
        $result = $this->db->update('vimg_links',$links_info);

        if ($result > 0){
            return $result;
        }
    }
}


//CREATE TABLE IF NOT EXISTS `vimg_links` (
//  `links_id` int(11) NOT NULL AUTO_INCREMENT,
//  `links_name` varchar(255) NOT NULL,
//  `links_date` datetime NOT NULL,
//  `links_text` text NOT NULL,
//  `links_status` tinyint(4) NOT NULL,
//  `links_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`links_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;