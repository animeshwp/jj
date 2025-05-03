<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Mod_widget extends CI_Model {        


    private $_vimg_widget_box = "vimg_widget_box";


    function __construct() {
        parent::__construct();
    }
    
    function insert_widget($img_info){
        $day = date("Y-m-d H:i:s");
        $widget_info = array(
            "widget_name"      => $this->input->post('widgetname'),
            "widget_date"      => $day,
            "widget_sum"      => $this->input->post('widgetsum'),
            "widget_text"      => $this->input->post('widget_text'),
            "widget_status"    => $this->input->post('widget_status'),
            "widget_image"     => $img_info            
        );
//        echo "<pre>"; 
//        print_r ($widget_info); exit();
        $result = $this->db->insert('vimg_widget',$widget_info);
        if ($result > 0){
            return $result;
        }
    }



        function insert_widget_new($data){
        $data['date'] = date("Y-m-d H:i:s");
 
        $result = $this->db->insert($this->_vimg_widget_box, $data);
        if ($result > 0){
            return $result;
        }
        
    }

        function update_widget_new($id, $file_name){

            // echo $id;
        $data = $this->input->post('data');
        $data['date'] = date("Y-m-d H:i:s");

        if(empty($file_name)){
             unset($data['file_name']);
        }else{
             $data['file_name'] = $file_name; 
         }

   
 
        $result = $this->db->update($this->_vimg_widget_box, $data, array('id' => $id ));
        if ($result > 0){
            return $result;
        }

    }
    
    
    function view_new_widget(){
        $widget_query = $this->db->get_where($this->_vimg_widget_box, array('status' => 1));       
        return $widget_query->result();           
        
    }

   
    function delete_box_widget($id){
        $widget_query = $this->db->delete($this->_vimg_widget_box, array('id' => $id));       
        return TRUE;           
        
    }

    
    function edit_widget_new($id){
        $widget_query = $this->db->get_where($this->_vimg_widget_box, array('id' => $id) );       
        $widget_result = $widget_query->row();                            
        return $widget_result;
    }
    



    
    function view_widget(){
        $widget_query = $this->db->get_where('vimg_widget', array('widget_status' => 1));       
        $widget_result = $widget_query->result_array();           
        return $widget_result;
    }
    
    function view_inactivewidget(){
        $inactivewidget_query = $this->db->get_where('vimg_widget', array('widget_status' => 0));       
        $inactivewidget_result = $inactivewidget_query->result_array();           
        return $inactivewidget_result;
    }
    
    function view_hwidget(){ // model for home page widget
        $widget_query = $this->db->get_where('vimg_widget', array('widget_status' => 1));       
        $widget_result = $widget_query->result_array();           
        return $widget_result;
    }
    
    
    function edit_widget($widget_id){
        $widget_query = $this->db->get_where('vimg_widget', array('widget_id' => $widget_id) );       
        $widget_result = $widget_query->result_array();               
//        echo "<pre>";
//        print_r ($widget_result); exit();              
        return $widget_result;
    }
    function detail_widget($widget_id){
        $detailwidget_query = $this->db->get_where('vimg_widget', array('widget_id' => $widget_id) );       
        $detailwidget_result = $detailwidget_query->result_array();               
//        echo "<pre>";
//        print_r ($detailwidget_result); exit();              
        return $detailwidget_result;
    }


    function update_widget($widget_id, $file_name){

        $day = date("Y-m-d H:i:s");
        $widget_info = array(
            "widget_name"      => $this->input->post('widgetname'),
            "widget_date"      => $day,
            "widget_image"     => $file_name,
            "widget_sum"      => $this->input->post('widgetsum'),
            "widget_text"      => $this->input->post('widget_text'),
            "widget_status"    => $this->input->post('widget_status')         
        );
    //    echo $widget_id; exit;
    //    echo "<pre>";
    //    print_r ($widget_info); exit();
        $this->db->where('widget_id', $widget_id);
        $result = $this->db->update('vimg_widget',$widget_info);
//        ECHO $result; EXIT;
        if ($result > 0){
            return $result;
        }
    }
    

    public function get_widget_acc2_id($id){
//        $this->db->order_by('widgetsdata_name', 'desc'); 
        $widget_query = $this->db->get_where('vimg_widget', array('widget_id' => $id));       
        $widget_result = $widget_query->row_array();   
//        echo $widget_result[widget_name]; exit;
        return $widget_result['widget_name'];
    }

    public function delete_widget($id){
        $this->db->where('widget_id', $id);       
        
        $day = date("Y-m-d H:i:s");
        $widget_info = array(
            "widget_status"    => 3         
        );
//        echo $widget_id; exit;
//        echo "<pre>";
//        print_r ($widget_info); exit();
        $this->db->where('widget_id', $id);
        $result = $this->db->update('vimg_widget',$widget_info);
//        ECHO $result; EXIT;
        if ($result > 0){
            return $result;
        }    
          
    }
    
}


//CREATE TABLE IF NOT EXISTS `vimg_widget` (
//  `widget_id` int(11) NOT NULL AUTO_INCREMENT,
//  `widget_name` varchar(255) NOT NULL,
//  `widget_date` datetime NOT NULL,
//  `widget_text` text NOT NULL,
//  `widget_status` tinyint(4) NOT NULL,
//  `widget_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`widget_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;
