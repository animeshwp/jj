<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Mod_page extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function insert_page(){
        $day = date("Y-m-d H:i:s");
        $page_info = array(
            "page_name"      => $this->input->post('pagename'),
            "page_date"      => $day,
            "page_text"      => $this->input->post('page_text'),
            "page_status"    => $this->input->post('page_status')
//            "page_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($page_info); exit();
        
        $result = $this->db->insert('vimg_page',$page_info);
        if ($result > 0){
            return $result;
        }
    }
    
    public function view_page(){
        $page_query = $this->db->get_where('vimg_page');       
        $page_result = $page_query->result_array();           
        return $page_result;
    }
    
    public function view_hpage(){ // model for home page page
        $page_query = $this->db->get_where('vimg_page', array('page_status' => 1));       
        $page_result = $page_query->result_array();           
        return $page_result;
    }
    
   public function view_inactivepage(){ // model for home page page
        $inactivepage_query = $this->db->get_where('vimg_page', array('page_status' => 0));       
        $inactivepage_result = $inactivepage_query->result_array();           
        return $inactivepage_result;
    }
    
    
    public function edit_page($nemu_id){
        $page_query = $this->db->get_where('vimg_page', array('page_id' => $nemu_id) );       
        $page_result = $page_query->result_array();               
//        echo "<pre>";
//        print_r ($page_result); exit();              
        return $page_result;
    }
    
    public function detail_page($nemudetail_id){
        $pagedetail_query = $this->db->get_where('vimg_page', array('page_id' => $nemudetail_id) );       
        $pagedetail_result = $pagedetail_query->row_array();               
//        echo "<pre>";
       // print_r ($pagedetail_result); exit();              
        return $pagedetail_result;
    }

    public function update_page($nemu_id){

        $day = date("Y-m-d H:i:s");
        $page_info = array(
            "page_name"      => $this->input->post('pagename'),
            "page_date"      => $day,
            "page_text"      => $this->input->post('page_text'),
            "page_status"    => $this->input->post('page_status')         
        );
//        echo $nemu_id; exit;
//        echo "<pre>";
//        print_r ($page_info); exit();
        $this->db->where('page_id', $nemu_id);
        $result = $this->db->update('vimg_page',$page_info);
//        ECHO $result; EXIT;
        if ($result > 0){
            return $result;
        }
    }    
    
    public function page_delete($nemu_id){
        $this->db->where('page_id', $nemu_id);
        $this->db->delete('vimg_page');
        return $this->db->affected_rows();
    }
}


//CREATE TABLE IF NOT EXISTS `vimg_page` (
//  `page_id` int(11) NOT NULL AUTO_INCREMENT,
//  `page_name` varchar(255) NOT NULL,
//        `menu_id` tinyint(4) NOT NULL,
//  `page_date` datetime NOT NULL,
//  `page_text` text NOT NULL,
//  `page_status` tinyint(4) NOT NULL,
//  `page_widget` tinyint(4) NOT NULL,
//  `page_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`page_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;