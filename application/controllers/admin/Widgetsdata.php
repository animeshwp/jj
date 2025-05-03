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

        $this->load->Model('admin/mod_widget', 'mod_widget');
        $this->load->model('admin/mod_widgetsdata', 'mod_widgetsdata');
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "Add New widgetsdata";
        
        /// widget table data
        
        $data['widget_content'] = $this->mod_widget->view_widget();
        
        $this->load->view('widgetsdata/v_widgetsdata', $data);

    }
    
    Public function do_upload() {  

        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('widgetsdataname', 'Widgetsdata Name', 'required');
        $this->form_validation->set_rules('widget_id', 'Widget Category', 'required|integer');
        
        // image informatio upload
         
            
            $query = $this->mod_widgetsdata->insert_widgetsdata();
//            print_r($file_name); exit;
            if($query == 1 ){
                redirect(base_url('admin/widgetsdata'));
            }
         
    }

    
    public function widgetsdatalists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The Widgetsdata";
        
        // $this->load->Model('mod_widget');
        $data['widget_content'] = $this->mod_widget->view_widget();
        
        // $this->load->Model('mod_widgetsdata');
        $data['widgetsdata_content'] = $this->mod_widgetsdata->view_widgetsdata();
        $this->load->view('widgetsdata/v_widgetsdatalists', $data);

    }
    
    public function editwidgetsdata($id){
            
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit widgetsdata";  
        
        $widgetsdata_info = (int)$id; 
        
        /// widget table data
        // $this->load->Model('mod_widget');
        $data['widget_content'] = $this->mod_widget->view_widget();
        
       
        $data['widgetsdata_content'] = $this->mod_widgetsdata->edit_widgetsdata($widgetsdata_info);
//        print_r($data); exit;
        $this->load->view('widgetsdata/v_widgetsdataedit', $data);
    }


    public function updatewidgetsdata(){ //update_widgetsdata
        $this->load->library('form_validation'); 
        $data['title'] = "List of The widgetsdata";
        $data['username'] = $this->session->userdata('username');
        $widgetsdata_info = $this->security->xss_clean($this->input->post('hidd_id'));              
         // print_r($_POST);
        // form validation check   
        $this->form_validation->set_rules('widgetsdataname', 'Widgetsdata Name', 'required');
        $this->form_validation->set_rules('widget_id', 'Widget Category', 'required|integer');
        
        if($this->form_validation->run() == False){
            redirect(base_url('admin/widgetsdata/editwidgetsdata/'.$widgetsdata_info));
            
        }else{
            $result = $this->mod_widgetsdata->update_widgetsdata($widgetsdata_info);        
        if($result){
            redirect(base_url('admin/widgetsdata/widgetsdatalists'));            
            }        
        }
    }
    
    public function inactivewidgetsdata(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The widgetsdata";
        
        
         
        $data['inactivewidgetsdata_content'] = $this->mod_widgetsdata->view_inactivewidgetsdata();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('widgetsdata/v_widgetsdatainactivelists', $data);

    }


    public function deletewidgetsdata($id){

        $id = (int)$id;

        $this->mod_widgetsdata->deletewidgetsdata($id);
        redirect(base_url('admin/widgetsdata/widgetsdatalists')); 

    }
}

// END