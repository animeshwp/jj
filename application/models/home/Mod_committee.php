<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mod_committee extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function insert_committee($img_info){
        $day = date("Y-m-d H:i:s");
        $committee_info = array(
            "committee_name"      => $this->input->post('committeename'),
            // "committee_sum"      =>  $this->input->post('committee_text'),
            "committee_date"      => $day,
            "committee_text"      => $this->input->post('committee_text'),
            "committee_status"    => $this->input->post('committee_status'),
            "committee_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($committee_info); exit();
        $result = $this->db->insert('vimg_committee',$committee_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_committee(){
        $this->db->order_by('committee_date', 'desc'); 
        return $this->db->get_where('vimg_committee', array('committee_status' => 1))->result(); 
    }
    
    function view_hcommittee(){ // model for home page committee

        $this->db->limit(5);

        $this->db->order_by('committee_date', 'desc'); 
//        $committee_query = $this->db->get_where('vimg_committee');
        $committee_query = $this->db->get_where('vimg_committee', array('committee_status' => 1));       

        $committee_result = $committee_query->result();           
        return $committee_result;
    }
    
    function view_inactivecommittee(){ // model for home page committee
        $inactivecommittee_query = $this->db->get_where('vimg_committee', array('committee_status' => 0));       
        $inactivecommittee_result = $inactivecommittee_query->result_array();           
        return $inactivecommittee_result;
    }
    
    
    function edit_committee($id){
        $committee_query = $this->db->get_where('vimg_committee', array('committee_id' => $id) );       
        $committee_result = $committee_query->row_array();               
//        echo "<pre>";
//        print_r ($committee_result); exit();              
        return $committee_result;
    }
    
    function detail_committee($nemudetail_id){
        $committeedetail_query = $this->db->get_where('vimg_committee', array('committee_id' => $nemudetail_id) );       
        $committeedetail_result = $committeedetail_query->result_array();               
//        echo "<pre>";
//        print_r ($committeedetail_result); exit();              
        return $committeedetail_result;
    }

    function update_committee($nemu_id, $img_info){
        if(empty($img_info)){
        $committee_info = array(
            "committee_name"      => $this->input->post('committeename'),
            // "committee_sum"      =>  $this->input->post('committee_text'),
            "committee_text"      => $this->input->post('committee_text'),
            "committee_status"    => $this->input->post('committee_status')         
        );
        }else{
            $committee_info = array(
            "committee_name"      => $this->input->post('committeename'),
            // "committee_sum"      =>  $this->input->post('committee_text'),
//            "committee_date"      => $day,
            "committee_text"      => $this->input->post('committee_text'),
            "committee_status"    => $this->input->post('committee_status'),
            "committee_image"     => $img_info            
        );
        }        
        $this->db->where('committee_id', $nemu_id);
        $result = $this->db->update('vimg_committee',$committee_info);
        if ($result > 0){
            return $result;
        }
    }
    
    
    public function delete_committee($committee_id){
        $this->db->where('committee_id', $committee_id);
        $this->db->delete('vimg_committee');
        return $this->db->affected_rows();
    }
    
    
}


// CREATE TABLE IF NOT EXISTS `vimg_committee` (
//  `committee_id` int(11) NOT NULL AUTO_INCREMENT,
//  `committee_name` varchar(255) NOT NULL,
//  `committee_date` datetime NOT NULL,
//  `committee_text` text NOT NULL,
//  `committee_status` tinyint(4) NOT NULL,
//  `committee_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`committee_id`)
// ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;