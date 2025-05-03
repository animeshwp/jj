<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Alumni extends MY_Controller {
    public function __Construct(){
        parent::__construct();
        
        $this->load->model('admin/mod_events', 'mod_events');
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');

        $data['title'] = "Add New events";
        $this->load->view('events/v_events', $data);

    }
    
    Public function do_upload() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('eventsname', 'events Name', 'required');
//        $this->form_validation->set_rules('userfile', 'File', 'required');
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = 'gif|jpg|png';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
//        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload();
        if (!$this->form_validation->run()) {
            redirect(base_url('admin/events'));
            
        }elseif (!$yes_upload) {
           redirect(base_url('admin/events'));        
                
        } else {             
            $img_data =  $this->upload->data($yes_upload);
            $file_name = $img_data['file_name'];
            
            
            $query = $this->mod_events->insert_events($file_name);
//            print_r($file_name); exit;
            if($query == 1 ){
                redirect(base_url('admin/events/eventslists'));
            }
        }
    }

    
    public function eventslists(){
        
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The events";
        
        $data['events_content'] = $this->mod_events->view_events();
        $this->load->view('events/v_eventslists', $data);

    }
    
    public function editevents($id){
        $id = (int)$id;
//        echo $id; exit;
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit events";  
        
//        $events_info = $this->security->xss_clean($this->uri->segment(3)); 
 
        $data['events_content'] = $this->mod_events->edit_events($id);
//        print_r($data); exit;
        $this->load->view('events/v_eventsedit', $data);
    }


    public function updateevents($id){ //update_events
        $this->load->library('form_validation'); 
        $data['title'] = "List of The events";
        $data['username'] = $this->session->userdata('username');
        $events_info =  (int)$id;              
         
        // form validation check   
        $this->form_validation->set_rules('eventsname', 'events Name', 'required');
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload();
        
        if($this->form_validation->run() == False){
            redirect(base_url('admin/events/editevents/'.$events_info));
            
        }else{
            
             $img_data =  $this->upload->data($yes_upload);
            $file_name = $img_data['file_name'];
            
 
        $result = $this->mod_events->update_events($events_info, $file_name);
        
        if($result){
            redirect(base_url('admin/events/eventslists'));            
            }        
        }
    }
    
    public function inactiveeventsLists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The events";
        
        
        $this->load->Model('mod_events');
        $data['inactiveevents_content'] = $this->mod_events->view_inactiveevents();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('events/v_eventsinactivelists', $data);

    }
    
    
    public function deleteevents($id){
        $events_id = (int)$id;
 
        $this->mod_events->delete_events($events_id);
        $this->eventslists('refresh');
        
    }
    
//    public function deleteevents(){
//        
//    }
}