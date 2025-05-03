<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class submenu extends MY_Controller {
    public function __Construct(){
        parent::__construct();
        
        $this->load->model('admin/mod_submenu', 'mod_submenu');
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "Add New submenu";
        $this->load->view('submenu/v_submenu', $data);

    }
    
    Public function do_upload() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('submenuname', 'submenu Name', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu Name', 'required');

        if (!$this->form_validation->run()) {
            $this->index();
            
      //  }elseif (!$yes_upload) {
      //     redirect(base_url('submenu'));        
                
        } else {             

            
            $query = $this->mod_submenu->insert_submenu();


                redirect(base_url('submenu'));
            
        }
    }

    
    public function submenulists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The submenu";
        
  
        $data['submenu_content'] = $this->mod_submenu->view_submenu();
        $this->load->view('submenu/v_submenulists', $data);

    }
    
    public function editsubmenu($id){
            $id =(int)$id;
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit submenu";  
        
//        $submenu_info = $this->security->xss_clean($this->uri->segment(3)); 
 
        $data['submenu_content'] = $this->mod_submenu->edit_submenu($id);
//        print_r($data); exit;
        $this->load->view('submenu/v_submenuedit', $data);
    }


    public function updatesubmenu($id){ //update_submenu
        
        
        $this->load->library('form_validation'); 
        $data['title'] = "List of The submenu";
        $data['username'] = $this->session->userdata('username');
        
//        $submenu_info = $this->security->xss_clean($this->input->post('hidd_id'));              
         $submenu_info =(int)$id;
         
 
        // form validation check   
        $this->form_validation->set_rules('submenuname', 'submenu Name', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu Name', 'required');
        
        if($this->form_validation->run() == False){
            redirect(base_url('submenu/editsubmenu/?page_id='.$submenu_info));
            
        }else{
            
//            print_r($_POST); exit;
 
            $this->mod_submenu->update_submenu($submenu_info);        
         
            redirect(base_url('submenu/submenulists'));            
                    
        }
    }
    
    public function inactivesubmenuLists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The submenu";
        
        
 
        $data['inactivesubmenu_content'] = $this->mod_submenu->view_inactivesubmenu();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('submenu/v_submenuinactivelists', $data);

    }
    
    public function deletesubmenu($id){
        $id = (int)$id;
        
        $data['deletesubmenu_content'] = $this->mod_submenu->deletesubmenu($id);
        $this->submenulists('refresh');
        
    }
}

