<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Mod_publications extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function insert_publications($img_info){
        $day = date("Y-m-d H:i:s");
        $publications_info = array(
            "publications_name"      => $this->input->post('publicationsname'),
            "publications_date"      => $day,
            "publications_sum"      => $this->input->post('publicationssum'),
            "publications_text"      => $this->input->post('publications_text'),
            "publications_status"    => $this->input->post('publications_status'),
            "publications_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($publications_info); exit();
        $result = $this->db->insert('vimg_publications',$publications_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_publications(){
        $publications_query = $this->db->get_where('vimg_publications', array('publications_status' => 1));       
        $publications_result = $publications_query->result_array();           
        return $publications_result;
    }
    
    function view_hpublications(){ // model for home page publications
        $publications_query = $this->db->get_where('vimg_publications', array('publications_status' => 1));       
        $publications_result = $publications_query->result_array();           
        return $publications_result;
    }
    
    function view_inactivepublications(){ // model for home page publications
        $inactivepublications_query = $this->db->get_where('vimg_publications', array('publications_status' => 0));       
        $inactivepublications_result = $inactivepublications_query->result_array();           
        return $inactivepublications_result;
    }
    
    
    function edit_publications($nemu_id){
        $publications_query = $this->db->get_where('vimg_publications', array('publications_id' => $nemu_id) );       
        $publications_result = $publications_query->result_array();               
//        echo "<pre>";
//        print_r ($publications_result); exit();              
        return $publications_result;
    }
    
    function detail_publications($nemudetail_id){
        $publicationsdetail_query = $this->db->get_where('vimg_publications', array('publications_id' => $nemudetail_id) );       
        $publicationsdetail_result = $publicationsdetail_query->result_array();               
//        echo "<pre>";
//        print_r ($publicationsdetail_result); exit();              
        return $publicationsdetail_result;
    }

    function update_publications($nemu_id){

        $day = date("Y-m-d H:i:s");
        $publications_info = array(
            "publications_name"      => $this->input->post('publicationsname'),
            "publications_date"      => $day,
            "publications_sum"      => $this->input->post('publicationssum'),
            "publications_text"      => $this->input->post('publications_text'),
            "publications_status"    => $this->input->post('publications_status')         
        );
//        echo $nemu_id; exit;
//        echo "<pre>";
//        print_r ($publications_info); exit();
        $this->db->where('publications_id', $nemu_id);
        $result = $this->db->update('vimg_publications',$publications_info);
//        ECHO $result; EXIT;
        if ($result > 0){
            return $result;
        }
    }
}


//CREATE TABLE IF NOT EXISTS `vimg_publications` (
//  `publications_id` int(11) NOT NULL AUTO_INCREMENT,
//  `publications_name` varchar(255) NOT NULL,
//  `publications_date` datetime NOT NULL,
//  `publications_text` text NOT NULL,
//  `publications_status` tinyint(4) NOT NULL,
//  `publications_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`publications_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;