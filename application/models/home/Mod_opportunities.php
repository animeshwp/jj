<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Mod_opportunities extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
 
    
    function opportunitieslist(){
//        echo "hello";
        $this->db->order_by('opportunities_date', 'desc'); 
        $opportunities_query = $this->db->get_where('vimg_opportunities', array('opportunities_status' => 1));       
        $opportunities_result = $opportunities_query->result_array();           
        return $opportunities_result;
    }
    
    function view_hopportunities(){ // model for home page opportunities
        $this->db->order_by('opportunities_name', 'desc'); 
        $opportunities_query = $this->db->get_where('vimg_opportunities', array('opportunities_status' => 1), 3, 'desc');       
        $opportunities_result = $opportunities_query->result_array();           
        return $opportunities_result;
    }
    
    function view_inactiveopportunities(){ // model for home page opportunities
        $inactiveopportunities_query = $this->db->get_where('vimg_opportunities', array('opportunities_status' => 0));       
        $inactiveopportunities_result = $inactiveopportunities_query->result_array();           
        return $inactiveopportunities_result;
    }
    
    
    function edit_opportunities($nemu_id){
        $opportunities_query = $this->db->get_where('vimg_opportunities', array('opportunities_id' => $nemu_id) );       
        $opportunities_result = $opportunities_query->result_array();               
//        echo "<pre>";
//        print_r ($opportunities_result); exit();              
        return $opportunities_result;
    }
    
    function detail_opportunities($nemudetail_id){
        $opportunitiesdetail_query = $this->db->get_where('vimg_opportunities', array('opportunities_id' => $nemudetail_id) );       
        $opportunitiesdetail_result = $opportunitiesdetail_query->result_array();               
//        echo "<pre>";
//        print_r ($opportunitiesdetail_result); exit();              
        return $opportunitiesdetail_result;
    }

    function update_opportunities($nemu_id){

        $day = date("Y-m-d H:i:s");
        $opportunities_info = array(
            "opportunities_name"      => $this->input->post('opportunitiesname'),
//            "opportunities_sum"      =>  $this->input->post('opportunitiessum'),
            "opportunities_date"      => $day,
            "opportunities_text"      => $this->input->post('opportunities_text'),
            "opportunities_status"    => $this->input->post('opportunities_status')         
        );
//        echo $nemu_id; exit;
//        echo "<pre>";
//        print_r ($opportunities_info); exit();
        $this->db->where('opportunities_id', $nemu_id);
        $result = $this->db->update('vimg_opportunities',$opportunities_info);
//        ECHO $result; EXIT;
        if ($result > 0){
            return $result;
        }
    }
}


//CREATE TABLE IF NOT EXISTS `vimg_opportunities` (
//  `opportunities_id` int(11) NOT NULL AUTO_INCREMENT,
//  `opportunities_name` varchar(255) NOT NULL,
//  `opportunities_date` datetime NOT NULL,
//  `opportunities_text` text NOT NULL,
//  `opportunities_status` tinyint(4) NOT NULL,
//  `opportunities_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`opportunities_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;