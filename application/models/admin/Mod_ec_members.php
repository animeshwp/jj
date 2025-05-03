<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Mod_ec_members extends CI_Model {

    private $_vimg_ec = "vimg_ec_member";
    function __construct() {
        parent::__construct();
    }
    
    function insert_ec_member($img_info){
        $day = date("Y-m-d H:i:s");
        $ec_member_info = array(
            "ec_member_name"      => $this->input->post('ec_membername'),
            "ec_memberdate"      =>  date('Y-m-d H:i:s', strtotime($this->input->post('ec_memberdate'))),
            "ec_member_date"      => $day,
            "ec_member_text"      => $this->input->post('ec_member_text'),
            "ec_member_status"    => $this->input->post('ec_member_status'),
            "ec_member_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($ec_member_info); exit();
        $result = $this->db->insert('vimg_ec_member',$ec_member_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_ec_member(){
        $this->db->order_by('ec_member_date', 'desc'); 
        $ec_member_query = $this->db->get_where('vimg_ec_member', array('ec_member_status' => 1));       
        $ec_member_result = $ec_member_query->result_array();           
        return $ec_member_result;
    }
    
    function view_hec_member(){ // model for home page ec_member
        $this->db->order_by('ec_member_date', 'desc'); 
//        $ec_member_query = $this->db->get_where('vimg_ec_member');
        $ec_member_query = $this->db->get_where('vimg_ec_member', array('ec_member_status' => 1));       

        $ec_member_result = $ec_member_query->result_array();           
        return $ec_member_result;
    }
    
    function view_inactiveec_member(){ // model for home page ec_member
        $inactiveec_member_query = $this->db->get_where('vimg_ec_member', array('ec_member_status' => 0));       
        $inactiveec_member_result = $inactiveec_member_query->result_array();           
        return $inactiveec_member_result;
    }
    
    
    function edit_ec_member($id){
        $ec_member_query = $this->db->get_where('vimg_ec_member', array('ec_member_id' => $id) );       
        $ec_member_result = $ec_member_query->row_array();               
//        echo "<pre>";
//        print_r ($ec_member_result); exit();              
        return $ec_member_result;
    }
    
    function detail_ec_member($nemudetail_id){
        $ec_memberdetail_query = $this->db->get_where('vimg_ec_member', array('ec_member_id' => $nemudetail_id) );       
        $ec_memberdetail_result = $ec_memberdetail_query->result_array();               
//        echo "<pre>";
//        print_r ($ec_memberdetail_result); exit();              
        return $ec_memberdetail_result;
    }

    function update_ec_member($nemu_id, $img_info){
        if(empty($img_info)){
        $ec_member_info = array(
            "ec_member_name"      => $this->input->post('ec_membername'),
            "ec_memberdate"      =>  date('Y-m-d', strtotime($this->input->post('ec_memberdate'))),
            "ec_member_text"      => $this->input->post('ec_member_text'),
            "ec_member_status"    => $this->input->post('ec_member_status')         
        );
        // print_r($ec_member_info); exit;

        }else{
            $ec_member_info = array(
            "ec_member_name"      => $this->input->post('ec_membername'),
            "ec_memberdate"      =>  date('Y-m-d H:i:s', strtotime($this->input->post('ec_memberdate'))),
//            "ec_member_date"      => $day,
            "ec_member_text"      => $this->input->post('ec_member_text'),
            "ec_member_status"    => $this->input->post('ec_member_status'),
            "ec_member_image"     => $img_info            
        );
        }        
        $this->db->where('ec_member_id', $nemu_id);
        $result = $this->db->update('vimg_ec_member',$ec_member_info);
        if ($result > 0){
            return $result;
        }
    }
    
    
    public function delete_ec_member($ec_member_id){
        $this->db->where('ec_member_id', $ec_member_id);
        $this->db->delete('vimg_ec_member');
        return $this->db->affected_rows();
    }
    
    
}


// CREATE TABLE IF NOT EXISTS `vimg_ec_member` (
//  `ec_member_id` int(11) NOT NULL AUTO_INCREMENT,
//  `ec_member_name` varchar(255) NOT NULL,
//  `ec_member_date` datetime NOT NULL,
//  `ec_member_text` text NOT NULL,
//  `ec_member_status` tinyint(4) NOT NULL,
//  `ec_member_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`ec_member_id`)
// ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;