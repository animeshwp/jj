<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Mod_options extends CI_Model{
    
   private $_jj_options = "jj_options";
    
    
    public function __construct() {
        parent::__construct();
        
    }  
    
    
    public function menuupdates($data){
        return $this->db->update($this->_jj_options,$data);
    }

     public function getdata(){
        return $this->db->get($this->_jj_options)->row();
    }
    

    
    public function addimageinfo($data){
        
        $data = array(
            'mages_name' => $data,
            'mages_time' => date("Y-m-d H:i:s")
        );
        
        
        $result = $this->db->insert('images',$data);
        
        
//        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
        
    }
    
     public function viewimageinfo(){
        
//         $doctors_query = $this->db
//                ->order_by('id', 'desc')
//                ->get_where($this->_table);       
//        return $doctors_query->result_array();
         
         $this->db->order_by("id", "desc"); 
        $links_query = $this->db->get_where('images');       
        $links_result = $links_query->result_array();           
        return $links_result;
    }

}