<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Menu extends MY_Controller {
    public function __Construct(){
        parent::__construct();
        
        $this->load->Model('admin/mod_menu', 'mod_menu');
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "Add New Menu";
        $this->load->view('menu/v_menu', $data);

    }
    
    Public function do_upload() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('menuname', 'Menu Name', 'required');
        

        if (!$this->form_validation->run()) {
            redirect(base_url('menu'));
                  
                
        } else {             
//            $img_data =  $this->upload->data();
//            $file_name = $img_data['file_name'];
            
            $query = $this->mod_menu->insert_menu();

                redirect(base_url('menu'));

        }
    }

    
    public function menulists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The Menu";
        
        
        
        $data['menu_content'] = $this->mod_menu->view_menu();
        $this->load->view('menu/v_menulists', $data);

    }
    
    public function editmenu(){
            
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit Menu";  
        
        $menu_info = $this->security->xss_clean($this->uri->segment(3)); 
        
        $data['menu_content'] = $this->mod_menu->edit_menu($menu_info);
//        print_r($data); exit;
        $this->load->view('menu/v_menuedit', $data);
    }


    public function updatemenu(){ //update_menu
        $this->load->library('form_validation'); 
        $data['title'] = "List of The Menu";
        $data['username'] = $this->session->userdata('username');
        $menu_info = $this->security->xss_clean($this->input->post('hidd_id'));              
         
        // form validation check   
        $this->form_validation->set_rules('menuname', 'Menu Name', 'required');
        
        if($this->form_validation->run() == False){
            redirect(base_url('menu/editmenu/?page_id='.$menu_info));
            
        }else{
            
        
        $result = $this->mod_menu->update_menu($menu_info);
        
        if($result){
            redirect(base_url('menu/menulists'));            
            }        
        }
    }
    
    public function inactiveMenuLists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The Menu";
        
        
 
        $data['inactivemenu_content'] = $this->mod_menu->view_inactiveMenu();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('menu/v_menuinactivelists', $data);

    }
    
    public function deletemenu($id){
        $nemu_id = (int)$id;
  
        $data['inactivemenu_content'] = $this->mod_menu->menu_delete($nemu_id);
        $this->menulists('refresh');
        
    }
           
}