<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Widgetsdata extends MY_Controller {
    public function __Construct(){
        parent::__construct();
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "Add New widgetsdata";
        
        /// widget table data
        $this->load->Model('mod_widget');
        $data['widget_content'] = $this->mod_widget->view_widget();
        
        $this->load->view('widgetsdata/v_widgetsdata', $data);

    }
    
    Public function do_upload() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('widgetsdataname', 'widgetsdata Name', 'required');
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '20000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload();
        if (!$this->form_validation->run()) {
            redirect(base_url('widgetsdata'));
            
        }elseif (!$yes_upload) {
           redirect(base_url('widgetsdata'));        
                
        } else {             
            $img_data =  $this->upload->data();
            $file_name = $img_data['file_name'];
            $this->load->model('mod_widgetsdata');
            $query = $this->mod_widgetsdata->insert_widgetsdata($file_name);
//            print_r($file_name); exit;
            if($query == 1 ){
                redirect(base_url('widgetsdata'));
            }
        }
    }

    
    public function widgetsdatalists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The widgetsdata";
        
        $this->load->Model('mod_widget');
        $data['widget_content'] = $this->mod_widget->view_widget();
        
        $this->load->Model('mod_widgetsdata');
        $data['widgetsdata_content'] = $this->mod_widgetsdata->view_widgetsdata();
        $this->load->view('widgetsdata/v_widgetsdatalists', $data);

    }
    
    public function editwidgetsdata(){
            
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit widgetsdata";  
        
        $widgetsdata_info = $this->security->xss_clean($this->uri->segment(3)); 
        
        /// widget table data
        $this->load->Model('mod_widget');
        $data['widget_content'] = $this->mod_widget->view_widget();
        
        $this->load->Model('mod_widgetsdata');
        $data['widgetsdata_content'] = $this->mod_widgetsdata->edit_widgetsdata($widgetsdata_info);
//        print_r($data); exit;
        $this->load->view('widgetsdata/v_widgetsdataedit', $data);
    }


    public function updatewidgetsdata(){ //update_widgetsdata
        $this->load->library('form_validation'); 
        $data['title'] = "List of The widgetsdata";
        $data['username'] = $this->session->userdata('username');
        $widgetsdata_info = $this->security->xss_clean($this->input->post('hidd_id'));              
         
        // form validation check   
        $this->form_validation->set_rules('widgetsdataname', 'widgetsdata Name', 'required');
        
        if($this->form_validation->run() == False){
            redirect(base_url('widgetsdata/editwidgetsdata/?page_id='.$widgetsdata_info));
            
        }else{
            
        $this->load->Model('mod_widgetsdata');
        $result = $this->mod_widgetsdata->update_widgetsdata($widgetsdata_info);
        
        if($result){
            redirect(base_url('widgetsdata/widgetsdatalists'));            
            }        
        }
    }
    
    public function inactivewidgetsdata(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The widgetsdata";
        
        
        $this->load->Model('mod_widgetsdata');
        $data['inactivewidgetsdata_content'] = $this->mod_widgetsdata->view_inactivewidgetsdata();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('widgetsdata/v_widgetsdatainactivelists', $data);

    }
}

