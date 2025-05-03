<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mod_notices extends CI_Model {
    
        private $_notices = "notices";

    function __construct() {
        parent::__construct();

    }
    
    function insert_notices($img_info){
        $day = date("Y-m-d H:i:s");
        $notices_info = array(
            "notices_name"      => $this->input->post('noticesname'),
            // "notices_sum"      =>  $this->input->post('notices_text'),
            "notices_date"      => $day,
            "notices_text"      => $this->input->post('notices_text'),
            "notices_status"    => $this->input->post('notices_status'),
            "notices_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($notices_info); exit();
        $result = $this->db->insert('vimg_notices',$notices_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_notices(){
        $this->db->order_by('notices_date', 'desc'); 
        return $this->db->get_where('vimg_notices', array('notices_status' => 1))->result(); 
    }
    
    function view_hnotices(){ // model for home page notices

        $this->db->limit(5);

        $this->db->order_by('notices_date', 'desc'); 
//        $notices_query = $this->db->get_where('vimg_notices');
        $notices_query = $this->db->get_where('vimg_notices', array('notices_status' => 1));       

        $notices_result = $notices_query->result();           
        return $notices_result;
    }
    
    function view_inactivenotices(){ // model for home page notices
        $inactivenotices_query = $this->db->get_where('vimg_notices', array('notices_status' => 0));       
        $inactivenotices_result = $inactivenotices_query->result_array();           
        return $inactivenotices_result;
    }
    
    
    function edit_notices($id){
        $notices_query = $this->db->get_where('vimg_notices', array('notices_id' => $id) );       
        $notices_result = $notices_query->row_array();               
//        echo "<pre>";
//        print_r ($notices_result); exit();              
        return $notices_result;
    }
    
    function detail_notices($nemudetail_id){
        $noticesdetail_query = $this->db->get_where('vimg_notices', array('notices_id' => $nemudetail_id) );       
        $noticesdetail_result = $noticesdetail_query->result_array();               
//        echo "<pre>";
//        print_r ($noticesdetail_result); exit();              
        return $noticesdetail_result;
    }

    function update_notices($nemu_id, $img_info){
        if(empty($img_info)){
        $notices_info = array(
            "notices_name"      => $this->input->post('noticesname'),
            // "notices_sum"      =>  $this->input->post('notices_text'),
            "notices_text"      => $this->input->post('notices_text'),
            "notices_status"    => $this->input->post('notices_status')         
        );
        }else{
            $notices_info = array(
            "notices_name"      => $this->input->post('noticesname'),
            // "notices_sum"      =>  $this->input->post('notices_text'),
//            "notices_date"      => $day,
            "notices_text"      => $this->input->post('notices_text'),
            "notices_status"    => $this->input->post('notices_status'),
            "notices_image"     => $img_info            
        );
        }        
        $this->db->where('notices_id', $nemu_id);
        $result = $this->db->update('vimg_notices',$notices_info);
        if ($result > 0){
            return $result;
        }
    }
    
    
    public function delete_notices($notices_id){
        $this->db->where('notices_id', $notices_id);
        $this->db->delete('vimg_notices');
        return $this->db->affected_rows();
    }
    
    
}


// CREATE TABLE IF NOT EXISTS `vimg_notices` (
//  `notices_id` int(11) NOT NULL AUTO_INCREMENT,
//  `notices_name` varchar(255) NOT NULL,
//  `notices_date` datetime NOT NULL,
//  `notices_text` text NOT NULL,
//  `notices_status` tinyint(4) NOT NULL,
//  `notices_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`notices_id`)
// ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;