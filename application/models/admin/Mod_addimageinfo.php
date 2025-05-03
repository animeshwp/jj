<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Mod_addimageinfo extends CI_Model{
    
   private $_jj_ads = "jj_ads";
    
    
    public function __construct() {
        parent::__construct();
        
    }  
    
    
    
    
    public function addimageinfo($data){
        
        $data['created_at'] = date("Y-m-d H:i:s");    
        
        
        $result = $this->db->insert($this->_jj_ads, $data);
        
        return $this->db->insert_id();
        
    }
    
     public function viewimageinfo(){
        

    }

}