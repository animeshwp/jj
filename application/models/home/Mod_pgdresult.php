<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Mod_pgdresult extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function insert_pgdresult($img_info){
        $day = date("Y-m-d H:i:s");
        $pgdresult_info = array(
            "pgdresult_name"      => $this->input->post('pgdresultname'),
//            "pgdresult_sum"      =>  $this->input->post('pgdresultsum'),
            "pgdresult_date"      => $day,
            "pgdresult_text"      => $this->input->post('pgdresult_text'),
            "pgdresult_status"    => $this->input->post('pgdresult_status'),
            "pgdresult_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($pgdresult_info); exit();
        $result = $this->db->insert('vimg_pgdresult',$pgdresult_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_pgdresult(){
        $this->db->order_by('pgdresult_name', 'desc'); 
        $pgdresult_query = $this->db->get_where('vimg_pgdresult', array('pgdresult_status' => 1));       
        $pgdresult_result = $pgdresult_query->result_array();           
        return $pgdresult_result;
    }
    
    function view_hpgdresult(){ // model for home page pgdresult
        $this->db->order_by('pgdresult_name', 'desc'); 
        $pgdresult_query = $this->db->get_where('vimg_pgdresult', array('pgdresult_status' => 1), 3, 'desc');       
        $pgdresult_result = $pgdresult_query->result_array();           
        return $pgdresult_result;
    }
    
    function view_inactivepgdresult(){ // model for home page pgdresult
        $inactivepgdresult_query = $this->db->get_where('vimg_pgdresult', array('pgdresult_status' => 0));       
        $inactivepgdresult_result = $inactivepgdresult_query->result_array();           
        return $inactivepgdresult_result;
    }
    
    
    function edit_pgdresult($nemu_id){
        $pgdresult_query = $this->db->get_where('vimg_pgdresult', array('pgdresult_id' => $nemu_id) );       
        $pgdresult_result = $pgdresult_query->row_array();               
//        echo "<pre>";
//        print_r ($pgdresult_result); exit();              
        return $pgdresult_result;
    }
    
    function detail_pgdresult($nemudetail_id){
        $pgdresultdetail_query = $this->db->get_where('vimg_pgdresult', array('pgdresult_id' => $nemudetail_id) );       
        $pgdresultdetail_result = $pgdresultdetail_query->result_array();               
//        echo "<pre>";
//        print_r ($pgdresultdetail_result); exit();              
        return $pgdresultdetail_result;
    }

    function update_pgdresult($file_name, $nemu_id ){

        $day = date("Y-m-d H:i:s");
        if(!empty($file_name)){
        $pgdresult_info = array(
            "pgdresult_name"      => $this->input->post('pgdresultname'),
//            "pgdresult_sum"      =>  $this->input->post('pgdresultsum'),
            "pgdresult_date"      => $day,
//            "pgdresult_text"      => $this->input->post('pgdresult_text'),
            "pgdresult_status"    => $this->input->post('pgdresult_status'),
            "pgdresult_image"     => $file_name  
        );
        }else{
            
             $pgdresult_info = array(
            "pgdresult_name"      => $this->input->post('pgdresultname'),
//            "pgdresult_sum"      =>  $this->input->post('pgdresultsum'),
            "pgdresult_date"      => $day,
//            "pgdresult_text"      => $this->input->post('pgdresult_text'),
            "pgdresult_status"    => $this->input->post('pgdresult_status')
            
        );
        }
//        echo $file_name ." ".$nemu_id;
//        echo "<pre>";
//        print_r ($pgdresult_info); exit();
        $this->db->where('pgdresult_id', $nemu_id);
        $result = $this->db->update('vimg_pgdresult',$pgdresult_info);
        return  $this->db->affected_rows();
 
    }
    
    public function delete_pgdresult($id){
        $this->db->where('pgdresult_id', $id);
        $this->db->delete('vimg_pgdresult');
        return  $this->db->affected_rows();
    }
}


//CREATE TABLE IF NOT EXISTS `vimg_pgdresult` (
//  `pgdresult_id` int(11) NOT NULL AUTO_INCREMENT,
//  `pgdresult_name` varchar(255) NOT NULL,
//  `pgdresult_date` datetime NOT NULL,
//  `pgdresult_text` text NOT NULL,
//  `pgdresult_status` tinyint(4) NOT NULL,
//  `pgdresult_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`pgdresult_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;