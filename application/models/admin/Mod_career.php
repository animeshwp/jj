<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Mod_career extends CI_Model {
    
    private $_vimg_career = "vimg_career";
        function __construct() {
        parent::__construct();
    }
    
    function insert_career(){
        $day = date("Y-m-d H:i:s");
        $career_info = array(
            "career_name"      => $this->input->post('careername'),
            "jobtype"      => $this->input->post('jobtype'),
            "careerdate"      =>  date('Y-m-d H:i:s', strtotime($this->input->post('careerdate'))),
            "career_date"      => $day,
            "career_text"      => $this->input->post('career_text'),
            "career_status"    => $this->input->post('career_status')       
        );
//        echo "<pre>";
//        print_r ($career_info); exit();
        $result = $this->db->insert($this->_vimg_career,$career_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_career(){
        $this->db->order_by('career_date', 'desc'); 
        $career_query = $this->db->get_where($this->_vimg_career, array('career_status' => 1));       
        $career_result = $career_query->result_array();           
        return $career_result;
    }
    
    function view_hcareer(){ // model for home page career
        $this->db->order_by('career_date', 'desc'); 
//        $career_query = $this->db->get_where($this->_vimg_career);
        $career_query = $this->db->get_where($this->_vimg_career, array('career_status' => 1));       

        $career_result = $career_query->result_array();           
        return $career_result;
    }
    
    function view_inactivecareer(){ // model for home page career
        $inactivecareer_query = $this->db->get_where($this->_vimg_career, array('career_status' => 0));       
        $inactivecareer_result = $inactivecareer_query->result_array();           
        return $inactivecareer_result;
    }
    
    
    function edit_career($id){
        $career_query = $this->db->get_where($this->_vimg_career, array('career_id' => $id) );       
        $career_result = $career_query->row_array();               
//        echo "<pre>";
//        print_r ($career_result); exit();              
        return $career_result;
    }
    
    function detail_career($nemudetail_id){
        $careerdetail_query = $this->db->get_where($this->_vimg_career, array('career_id' => $nemudetail_id) );       
        $careerdetail_result = $careerdetail_query->result_array();               
//        echo "<pre>";
//        print_r ($careerdetail_result); exit();              
        return $careerdetail_result;
    }

    function update_career($nemu_id){
//        if(empty($img_info)){
//        $career_info = array(
//            "career_name"      => $this->input->post('careername'),
//            "careerdate"      =>  date('Y-m-d', strtotime($this->input->post('careerdate'))),
//            "career_text"      => $this->input->post('career_text'),
//            "career_status"    => $this->input->post('career_status')         
//        );
//        // print_r($career_info); exit;
//
//        }else{
            $career_info = array(
            "career_name"      => $this->input->post('careername'),
            "careerdate"      =>  date('Y-m-d H:i:s', strtotime($this->input->post('careerdate'))),
           "jobtype"      => $this->input->post('jobtype'),
            "career_text"      => $this->input->post('career_text'),
            "career_status"    => $this->input->post('career_status')
         );
//        }        
        $this->db->where('career_id', $nemu_id);
        $result = $this->db->update($this->_vimg_career,$career_info);
        if ($result > 0){
            return $result;
        }
    }
    
    
    public function delete_career($career_id){
        $this->db->where('career_id', $career_id);
        $this->db->delete($this->_vimg_career);
        return $this->db->affected_rows();
    }
    
    
}


// CREATE TABLE IF NOT EXISTS `vimg_career` (
//  `career_id` int(11) NOT NULL AUTO_INCREMENT,
//  `career_name` varchar(255) NOT NULL,
//  `career_date` datetime NOT NULL,
//  `career_text` text NOT NULL,
//  `career_status` tinyint(4) NOT NULL,
//  `career_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`career_id`)
// ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;