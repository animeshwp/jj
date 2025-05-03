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
            "submenu_date"      => $day,
            "submenu_text"      => $this->input->post('submenu_text'),
            "submenu_status"    => $this->input->post('submenu_status')
//            "submenu_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($submenu_info); exit();
        $result = $this->db->insert('vimg_submenu',$submenu_info);
        if ($result > 0){
            return $result;
        }
    }
    
    public function view_submenu($id){
        // echo $id; exit;
        $submenu_query = $this->db->get_where('vimg_submenu', array('submenu_status' => 1, 'submenu_id' => $id));       
        $submenu_result = $submenu_query->row();           
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
    
    
    function edit_submenu($nemu_id){
        $submenu_query = $this->db->get_where('vimg_submenu', array('submenu_id' => $nemu_id) );       
        $submenu_result = $submenu_query->result_array();               
//        echo "<pre>";
//        print_r ($submenu_result); exit();              
        return $submenu_result;
    }
    
    function detail_submenu($nemudetail_id){
        $submenudetail_query = $this->db->get_where('vimg_submenu', array('submenu_id' => $nemudetail_id) );       
        $submenudetail_result = $submenudetail_query->row_array();               
//        echo "<pre>";
//        print_r ($submenudetail_result); exit();              
        return $submenudetail_result;
    }

    function update_submenu($nemu_id){

        $day = date("Y-m-d H:i:s");
        $submenu_info = array(
            "submenu_name"      => $this->input->post('submenuname'),
            "submenu_date"      => $day,
            "submenu_text"      => $this->input->post('submenu_text'),
            "submenu_status"    => $this->input->post('submenu_status')         
        );
//        echo $nemu_id; exit;
//        echo "<pre>";
//        print_r ($submenu_info); exit();
        $this->db->where('submenu_id', $nemu_id);
        $result = $this->db->update('vimg_submenu',$submenu_info);
//        ECHO $result; EXIT;
        if ($result > 0){
            return $result;
        }
    }
    
    public function  deletesubmenu($nemu_id){
        
        $this->db->where('submenu_id', $nemu_id);
        $result = $this->db->delete('vimg_submenu');
    }
    
    
    public function getSubMenuIdNameAsArray(){
        $this->db->select('submenu_id, submenu_name');
        $submenu_query = $this->db->get('vimg_submenu');        
        return $submenu_query->result_array(); 
    }
    
    public function getMenuiIdformSubMenu(){
//        $this->db->select('menu_id');
        $submenu_query = $this->db->get('vimg_submenu');        
        $res = $submenu_query->row_array(); 
        return $res['menu_id']; ;
        
    }
    
     public function returnsubmenuTure($id){
        $this->db->select('menu_id');
         
        $result = $this->db->get_where('vimg_submenu', array('menu_id' => $id) );
 
        return $result->row_array();
    }
    
    public function returnsubmenuNameArray($id){
        $this->db->order_by('submenu_order', 'DESC');
        $this->db->select('submenu_id, submenu_name');
         
        $result = $this->db->get_where('vimg_submenu', array('menu_id' => $id) );
 
        return $result->result_array();
    }
    
}