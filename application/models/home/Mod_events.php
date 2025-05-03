<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mod_events extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function insert_events($img_info){
        $day = date("Y-m-d H:i:s");
        $events_info = array(
            "events_name"      => $this->input->post('eventsname'),
            // "events_sum"      =>  $this->input->post('events_text'),
            "events_date"      => $day,
            "events_text"      => $this->input->post('events_text'),
            "events_status"    => $this->input->post('events_status'),
            "events_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($events_info); exit();
        $result = $this->db->insert('vimg_events',$events_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_events(){
        $this->db->order_by('events_date', 'desc'); 
        return $this->db->get_where('vimg_events', array('events_status' => 1))->result(); 
    }
    
    function view_hevents(){ // model for home page events

        $this->db->limit(5);

        $this->db->order_by('events_date', 'desc'); 
//        $events_query = $this->db->get_where('vimg_events');
        $events_query = $this->db->get_where('vimg_events', array('events_status' => 1));       

        $events_result = $events_query->result();           
        return $events_result;
    }
    
    function view_inactiveevents(){ // model for home page events
        $inactiveevents_query = $this->db->get_where('vimg_events', array('events_status' => 0));       
        $inactiveevents_result = $inactiveevents_query->result_array();           
        return $inactiveevents_result;
    }
    
    
    function edit_events($id){
        $events_query = $this->db->get_where('vimg_events', array('events_id' => $id) );       
        $events_result = $events_query->row_array();               
//        echo "<pre>";
//        print_r ($events_result); exit();              
        return $events_result;
    }
    
    function detail_events($nemudetail_id){
        $eventsdetail_query = $this->db->get_where('vimg_events', array('events_id' => $nemudetail_id) );       
        $eventsdetail_result = $eventsdetail_query->result_array();               
//        echo "<pre>";
//        print_r ($eventsdetail_result); exit();              
        return $eventsdetail_result;
    }

    function update_events($nemu_id, $img_info){
        if(empty($img_info)){
        $events_info = array(
            "events_name"      => $this->input->post('eventsname'),
            // "events_sum"      =>  $this->input->post('events_text'),
            "events_text"      => $this->input->post('events_text'),
            "events_status"    => $this->input->post('events_status')         
        );
        }else{
            $events_info = array(
            "events_name"      => $this->input->post('eventsname'),
            // "events_sum"      =>  $this->input->post('events_text'),
//            "events_date"      => $day,
            "events_text"      => $this->input->post('events_text'),
            "events_status"    => $this->input->post('events_status'),
            "events_image"     => $img_info            
        );
        }        
        $this->db->where('events_id', $nemu_id);
        $result = $this->db->update('vimg_events',$events_info);
        if ($result > 0){
            return $result;
        }
    }
    
    
    public function delete_events($events_id){
        $this->db->where('events_id', $events_id);
        $this->db->delete('vimg_events');
        return $this->db->affected_rows();
    }
    
    
}


// CREATE TABLE IF NOT EXISTS `vimg_events` (
//  `events_id` int(11) NOT NULL AUTO_INCREMENT,
//  `events_name` varchar(255) NOT NULL,
//  `events_date` datetime NOT NULL,
//  `events_text` text NOT NULL,
//  `events_status` tinyint(4) NOT NULL,
//  `events_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`events_id`)
// ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;