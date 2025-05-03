<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Mod_submenu extends CI_Model {
    function __construct() {
        parent::__construct();
       
    }
    
    
    
    function insert_submenu(){
        $day = date("Y-m-d H:i:s");
        $submenu_info = array(
            "submenu_name"      => $this->input->post('submenuname'),
            "menu_id"      => $this->input->post('menu_id'),
            "submenu_order"      => $this->input->post('submenu_order'),
            "submenu_date"      => $day,
            "submenu_text"      => $this->input->post('submenu_text'),
            "submenu_status"    => $this->input->post('submenu_status')
//            "submenu_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($submenu_info); exit();
        $this->db->insert('vimg_submenu',$submenu_info);
        return $this->db->insert_id();
    }
    
    function view_submenu(){
        $submenu_query = $this->db->get_where('vimg_submenu', array('submenu_status' => 1));       
        $submenu_result = $submenu_query->result_array();           
        return $submenu_result;
    }
    
    function view_hsubmenu(){ // model for home page submenu
        $submenu_query = $this->db->get_where('vimg_submenu', array('submenu_status' => 1));       
        $submenu_result = $submenu_query->result_array();           
        return $submenu_result;
    }
    
    function view_inactivesubmenu(){ // model for home page submenu
        $inactivesubmenu_query = $this->db->get_where('vimg_submenu', array('submenu_status' => 0));       
        $inactivesubmenu_result = $inactivesubmenu_query->result_array();           
        return $inactivesubmenu_result;
    }
    
    
    function edit_submenu($id){
        $submenu_query = $this->db->get_where('vimg_submenu', array('submenu_id' => $id) );       
        $submenu_result = $submenu_query->row_array();               
//        echo "<pre>";
//        print_r ($submenu_result); exit();              
        return $submenu_result;
    }
    
    function detail_submenu($nemudetail_id){
        $submenudetail_query = $this->db->get_where('vimg_submenu', array('submenu_id' => $nemudetail_id) );       
        $submenudetail_result = $submenudetail_query->result_array();               
//        echo "<pre>";
//        print_r ($submenudetail_result); exit();              
        return $submenudetail_result;
    }

    function update_submenu($id){

        $day = date("Y-m-d H:i:s");
        $submenu_info = array(
            "submenu_name"      => $this->input->post('submenuname'),
            "menu_id"      => $this->input->post('menu_id'),
            "submenu_order"      => $this->input->post('submenu_order'),
            "submenu_date"      => $day,
            "submenu_text"      => $this->input->post('submenu_text'),
            "submenu_status"    => $this->input->post('submenu_status')         
        );
//        echo $nemu_id; exit;
//        echo "<pre>";
//        print_r ($submenu_info); exit();
        $this->db->where('submenu_id', $id);
        $this->db->update('vimg_submenu',$submenu_info);
        return $this->db->affected_rows();
    }
    
    public function  deletesubmenu($nemu_id){
        
        $this->db->where('submenu_id', $nemu_id);
        $result = $this->db->delete('vimg_submenu');
        
    }
    
   
}


//CREATE TABLE IF NOT EXISTS `vimg_submenu` (
//  `submenu_id` int(11) NOT NULL AUTO_INCREMENT,
//  `submenu_name` varchar(255) NOT NULL,
//        `menu_id` tinyint(4) NOT NULL,
//  `submenu_date` datetime NOT NULL,
//  `submenu_text` text NOT NULL,
//  `submenu_status` tinyint(4) NOT NULL,
//  `submenu_widget` tinyint(4) NOT NULL,
//  `submenu_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`submenu_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;