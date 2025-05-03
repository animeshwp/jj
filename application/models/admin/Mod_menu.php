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
    
    function insert_menu(){
        $day = date("Y-m-d H:i:s");
        $menu_info = array(
            "menu_name"      => $this->input->post('menuname'),
            "menu_order"      => $this->input->post('menu_order'),
            "menu_loc"      => $this->input->post('menu_loc'),
            "menu_date"      => $day,
            "menu_text"      => $this->input->post('menu_text'),
            "menu_status"    => $this->input->post('menu_status')
//            "menu_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($menu_info); exit();
        $result = $this->db->insert('vimg_menu',$menu_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_menu(){
        $menu_query = $this->db->get_where('vimg_menu', array('menu_status' => 1));       
        $menu_result = $menu_query->result_array();           
        return $menu_result;
    }
    
    function view_hmenu(){ // model for home page menu
        
        $menu_query = $this->db->get_where('vimg_menu', array('menu_status' => 1, 'menu_loc' => 0));       
        $menu_result = $menu_query->result_array();           
        return $menu_result;
    }
    
    function view_inactiveMenu(){ // model for home page menu
        $inactivemenu_query = $this->db->get_where('vimg_menu', array('menu_status' => 0));       
        $inactivemenu_result = $inactivemenu_query->result_array();           
        return $inactivemenu_result;
    }
 
    function menu_location($id){ // model for home page menu
        $menuloc = $this->db->get_where('vimg_menu', array('menu_status' => 1, 'menu_loc' => $id));       
        $menuloc = $menuloc->result();           
        return $menuloc;
    }
    
    function edit_menu($nemu_id){
        $menu_query = $this->db->get_where('vimg_menu', array('menu_id' => $nemu_id) );       
        $menu_result = $menu_query->result_array();               
//        echo "<pre>";
//        print_r ($menu_result); exit();              
        return $menu_result;
    }
    
    function detail_menu($nemudetail_id){
        $menudetail_query = $this->db->get_where('vimg_menu', array('menu_id' => $nemudetail_id) );       
        $menudetail_result = $menudetail_query->result_array();               
//        echo "<pre>";
//        print_r ($menudetail_result); exit();              
        return $menudetail_result;
    }

    function update_menu($nemu_id){

        $day = date("Y-m-d H:i:s");
        $menu_info = array(
            "menu_name"      => $this->input->post('menuname'),
            "menu_order"      => $this->input->post('menu_order'),
            "menu_loc"      => $this->input->post('menu_loc'),
            "menu_date"      => $day,
            "menu_text"      => $this->input->post('menu_text'),
            "menu_status"    => $this->input->post('menu_status')         
        );
//        echo $nemu_id; exit;
//        echo "<pre>";
//        print_r ($menu_info); exit();
        $this->db->where('menu_id', $nemu_id);
        $result = $this->db->update('vimg_menu',$menu_info);
//        ECHO $result; EXIT;
        if ($result > 0){
            return $result;
        }
    }
    
    
    public function menu_delete($nemu_id){
        $this->db->where('menu_id', $nemu_id);
        $this->db->delete('vimg_menu');
        return $this->db->affected_rows();
    }
    
    
    public function getMenuIdNameAsArray(){
        $this->db->select('menu_id, menu_name');
        $menu_query = $this->db->get_where('vimg_menu', array('menu_status' => 1));       
        $menu_result = $menu_query->result_array();           
        return $menu_result;
        
    }    

    public function getMenuname_acc_to_id($id){
        $this->db->select('menu_name');
        $menu_query = $this->db->get_where('vimg_menu', array('menu_id' => $id));       
        $menu_result = $menu_query->row_array();           
        return $menu_result['menu_name'];
        
    }

}