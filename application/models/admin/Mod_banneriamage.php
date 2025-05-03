<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Mod_banneriamage extends CI_Model {
        private $_banneriamage = "vimg_banneriamage";
    function __construct() {
        parent::__construct();
    }
    
    function insert_banneriamage($img_info){
        $day = date("Y-m-d H:i:s");
    
        $data = array(
            "banneriamage_title"      => $this->input->post('banneriamage_title'),
            "banneriamage_date"      => $day,
            "banneriamage_links"      => $this->input->post('banneriamage_links'),
            "banneriamage_locid"      => $this->input->post('banneriamage_locid'),
            "banneriamage_status"    => $this->input->post('banneriamage_status'),
            "banneriamage_image"     => $img_info            
        );

        $result = $this->db->insert($this->_banneriamage, $data);

        if ($result > 0){
            return TRUE;
        }
    }
    
    function view_banneriamage(){
        $banneriamage_query = $this->db->get_where($this->_banneriamage, array('banneriamage_status' => 1));       
        $banneriamage_result = $banneriamage_query->result_array();           
        return $banneriamage_result;
    }
    
    function view_inactivebanneriamage(){ // model for home page banneriamage
        $banneriamage_query = $this->db->get_where($this->_banneriamage, array('banneriamage_status' => 0));       
        $banneriamage_result = $banneriamage_query->result_array();           
        return $banneriamage_result;
    }
    
    function view_hbanneriamage(){ // model for home page banneriamage
        $banneriamage_query = $this->db->get_where($this->_banneriamage, array('banneriamage_status' => 1));       
        $banneriamage_result = $banneriamage_query->result_array();           
        return $banneriamage_result;
    }
    
    
    function bannerimageedit($id){
        $banneriamage_query = $this->db->get_where($this->_banneriamage, array('banneriamage_id' => $id) );       
        $banneriamage_result = $banneriamage_query->row();                           
        return $banneriamage_result;
    }


    function update_banneriamage($banneriamage_id, $file_name){

        $day = date("Y-m-d H:i:s");

        if(empty($file_name)){ 
        $banneriamage_info = array(
             "banneriamage_title"      => $this->input->post('banneriamage_title'),
            "banneriamage_date"      => $day,
            "banneriamage_links"      => $this->input->post('banneriamage_links'),
            "banneriamage_locid"      => $this->input->post('banneriamage_locid'),
            "banneriamage_status"    => $this->input->post('banneriamage_status')
         );
    }else{
        $banneriamage_info = array(
          
            "banneriamage_title"      => $this->input->post('banneriamage_title'),
            "banneriamage_date"      => $day,
            "banneriamage_links"      => $this->input->post('banneriamage_links'),
            "banneriamage_locid"      => $this->input->post('banneriamage_locid'),
            "banneriamage_status"    => $this->input->post('banneriamage_status'),
            "banneriamage_image"     => $file_name            
                  
        );
    }
 
        $this->db->where('banneriamage_id', $banneriamage_id);
        $result = $this->db->update($this->_banneriamage, $banneriamage_info);
         if ($result > 0){
            return $result;
        }
    }


    public function delete_banneriamage($id){
        $this->db->where('banneriamage_id', $id);
        $result = $this->db->delete($this->_banneriamage);
         if ($result > 0){
            return TRUE;
    }

}


    public function get_bannerimage_acc_to($locid){
        
        $result = $this->db->get_where($this->_banneriamage, array('banneriamage_status' => 1, 'banneriamage_locid'=> $locid ));
        return $result->result();
    }
}
// END