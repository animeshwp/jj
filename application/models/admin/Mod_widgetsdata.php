<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Mod_widgetsdata extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function insert_widgetsdata(){
        $day = date("Y-m-d H:i:s");
        $widgetsdata_info = array(
            "widgetsdata_name"      => $this->input->post('widgetsdataname'),
            "widgetsdata_widget"      =>  $this->input->post('widget_id'),
            "widgetsdata_date"      => $day,
            "links"      => $this->input->post('links'),
            "widgetsdata_status"    => $this->input->post('widgetsdata_status')
            // "widgetsdata_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($widgetsdata_info); exit();
        $result = $this->db->insert('vimg_widgetsdata',$widgetsdata_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_widgetsdata(){
        $this->db->order_by('widgetsdata_name', 'desc'); 
        $widgetsdata_query = $this->db->get_where('vimg_widgetsdata', array('widgetsdata_status' => 1));       
        $widgetsdata_result = $widgetsdata_query->result_array();           
        return $widgetsdata_result;
    }
    
    function view_widgetsdatafront($widgetsdata_info){ //front data
//        echo $widgetsdata_info; exit;
        $this->db->join('vimg_widget', 'vimg_widget.widget_id = vimg_widgetsdata.widgetsdata_widget');
//        $this->db->order_by('widgetsdata_name', 'desc'); 
        $widgetsdata_query = $this->db->get_where('vimg_widgetsdata', array('widgetsdata_status' => 1, 'widgetsdata_widget' =>$widgetsdata_info));   
//        echo "<pre>";
//        print_r($widgetsdata_query); exit;
        $widgetsdata_result = $widgetsdata_query->result_array();           
        return $widgetsdata_result;
    }
    
    function view_hwidgetsdata(){ // model for home page widgetsdata
        $this->db->order_by('widgetsdata_name', 'desc'); 
        $widgetsdata_query = $this->db->get_where('vimg_widgetsdata', array('widgetsdata_status' => 1), 3, 'desc');       
        $widgetsdata_result = $widgetsdata_query->result_array();           
        return $widgetsdata_result;
    }
    
    function view_inactivewidgetsdata(){ // model for home page widgetsdata
        $inactivewidgetsdata_query = $this->db->get_where('vimg_widgetsdata', array('widgetsdata_status' => 0));       
        $inactivewidgetsdata_result = $inactivewidgetsdata_query->result_array();           
        return $inactivewidgetsdata_result;
    }
    
    
    function edit_widgetsdata($widgetsdata_id){
        $widgetsdata_query = $this->db->get_where('vimg_widgetsdata', array('widgetsdata_id' => $widgetsdata_id) );       
        $widgetsdata_result = $widgetsdata_query->row();               
//        echo "<pre>";
//        print_r ($widgetsdata_result); exit();              
        return $widgetsdata_result;
    }
    
    function detail_widgetsdata($nemudetail_id){
        $widgetsdatadetail_query = $this->db->get_where('vimg_widgetsdata', array('widgetsdata_id' => $nemudetail_id) );       
        $widgetsdatadetail_result = $widgetsdatadetail_query->result_array();               
//        echo "<pre>";
//        print_r ($widgetsdatadetail_result); exit();              
        return $widgetsdatadetail_result;
    }

    function update_widgetsdata($widgetsdata_id){

        $day = date("Y-m-d H:i:s");
        $widgetsdata_info = array(
            "widgetsdata_name"      => $this->input->post('widgetsdataname'),
            "widgetsdata_widget"      =>  $this->input->post('widget_id'),
            "widgetsdata_date"      => $day,
            // "widgetsdata_text"      => $this->input->post('widgetsdata_text'),
            "widgetsdata_status"    => $this->input->post('widgetsdata_status')         
        );
//        echo $nemu_id; exit;
//        echo "<pre>";
//        print_r ($widgetsdata_info); exit();
        $this->db->where('widgetsdata_id', $widgetsdata_id);
        $result = $this->db->update('vimg_widgetsdata',$widgetsdata_info);
//        ECHO $result; EXIT;
        if ($result > 0){
            return $result;
        }


    }

     public function deletewidgetsdata($id){
            $this->db->where('widgetsdata_id', $id);
            $result = $this->db->delete('vimg_widgetsdata');
            return TRUE;
        }
}


//CREATE TABLE IF NOT EXISTS `vimg_widgetsdata` (
//  `widgetsdata_id` int(11) NOT NULL AUTO_INCREMENT,
//  `widgetsdata_name` varchar(255) NOT NULL,
//  `widgetsdata_date` datetime NOT NULL,
//  `widgetsdata_text` text NOT NULL,
//  `widgetsdata_status` tinyint(4) NOT NULL,
//  `widgetsdata_widget` tinyint(4) NOT NULL,
//  `widgetsdata_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`widgetsdata_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;