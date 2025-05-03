<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Mod_downloads extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function insert_downloads($img_info){
        $day = date("Y-m-d H:i:s");
        $downloads_info = array(
            "downloads_name"      => $this->input->post('downloadsname'),
            "downloads_date"      => $day,
            "downloads_text"      => $this->input->post('downloads_text'),
            "downloads_status"    => $this->input->post('downloads_status'),
            "downloads_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($downloads_info); exit();
        $result = $this->db->insert('vimg_downloads',$downloads_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_downloads(){
        $downloads_query = $this->db->get_where('vimg_downloads', array('downloads_status' => 1));       
        $downloads_result = $downloads_query->result_array();           
        return $downloads_result;
    }
    
    function view_hdownloads(){ // model for home page downloads
        $downloads_query = $this->db->get_where('vimg_downloads', array('downloads_status' => 1));       
        $downloads_result = $downloads_query->result_array();           
        return $downloads_result;
    }
    
    function view_inactivedownloads(){ // model for home page downloads
        $inactivedownloads_query = $this->db->get_where('vimg_downloads', array('downloads_status' => 0));       
        $inactivedownloads_result = $inactivedownloads_query->result_array();           
        return $inactivedownloads_result;
    }
    
    
    function edit_downloads($nemu_id){
        $downloads_query = $this->db->get_where('vimg_downloads', array('downloads_id' => $nemu_id) );       
        $downloads_result = $downloads_query->result_array();               
//        echo "<pre>";
//        print_r ($downloads_result); exit();              
        return $downloads_result;
    }
    
    function detail_downloads($nemudetail_id){
        $downloadsdetail_query = $this->db->get_where('vimg_downloads', array('downloads_id' => $nemudetail_id) );       
        $downloadsdetail_result = $downloadsdetail_query->result_array();               
//        echo "<pre>";
//        print_r ($downloadsdetail_result); exit();              
        return $downloadsdetail_result;
    }

    function update_downloads($nemu_id){

        $day = date("Y-m-d H:i:s");
        $downloads_info = array(
            "downloads_name"      => $this->input->post('downloadsname'),
            "downloads_date"      => $day,
            "downloads_text"      => $this->input->post('downloads_text'),
            "downloads_status"    => $this->input->post('downloads_status')         
        );
//        echo $nemu_id; exit;
//        echo "<pre>";
//        print_r ($downloads_info); exit();
        $this->db->where('downloads_id', $nemu_id);
        $result = $this->db->update('vimg_downloads',$downloads_info);
//        ECHO $result; EXIT;
        if ($result > 0){
            return $result;
        }
    }
}


//CREATE TABLE IF NOT EXISTS `vimg_downloads` (
//  `downloads_id` int(11) NOT NULL AUTO_INCREMENT,
//  `downloads_name` varchar(255) NOT NULL,
//  `downloads_date` datetime NOT NULL,
//  `downloads_text` text NOT NULL,
//  `downloads_status` tinyint(4) NOT NULL,
//  `downloads_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`downloads_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;