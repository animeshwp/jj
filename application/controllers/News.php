<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class News extends MY_Controller {
    public function __Construct(){
        parent::__construct();
        
        $this->load->model('admin/mod_news', 'mod_news');
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');

        $data['title'] = "Add New news";
        $this->load->view('news/v_news', $data);

    }
    
    Public function do_upload() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('newsname', 'News Name', 'required');
//        $this->form_validation->set_rules('userfile', 'File', 'required');
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = 'gif|jpg|png';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt';
        $config['max_size'] = '10000';
//        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload();
        if (!$this->form_validation->run()) {
            redirect(base_url('news'));
            
        }elseif (!$yes_upload) {
           redirect(base_url('news'));        
                
        } else {             
            $img_data =  $this->upload->data($yes_upload);
            $file_name = $img_data['file_name'];
            
            
            $query = $this->mod_news->insert_news($file_name);
//            print_r($file_name); exit;
            if($query == 1 ){
                redirect(base_url('news/newslists'));
            }
        }
    }

    
    public function newslists(){
        
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The news";
        
        $data['news_content'] = $this->mod_news->view_news();
        $this->load->view('news/v_newslists', $data);

    }
    
    public function editnews($id){
        $id = (int)$id;
//        echo $id; exit;
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit news";  
        
//        $news_info = $this->security->xss_clean($this->uri->segment(3)); 
 
        $data['news_content'] = $this->mod_news->edit_news($id);
//        print_r($data); exit;
        $this->load->view('news/v_newsedit', $data);
    }


    public function updatenews($id){ //update_news
        $this->load->library('form_validation'); 
        $data['title'] = "List of The news";
        $data['username'] = $this->session->userdata('username');
        $news_info =  (int)$id;              
         
        // form validation check   
        $this->form_validation->set_rules('newsname', 'news Name', 'required');
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload();
        
        if($this->form_validation->run() == False){
            redirect(base_url('news/editnews/'.$news_info));
            
        }else{
            
             $img_data =  $this->upload->data($yes_upload);
            $file_name = $img_data['file_name'];
            
 
        $result = $this->mod_news->update_news($news_info, $file_name);
        
        if($result){
            redirect(base_url('news/newslists'));            
            }        
        }
    }
    
    public function inactivenewsLists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The news";
        
        
        $this->load->Model('mod_news');
        $data['inactivenews_content'] = $this->mod_news->view_inactivenews();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('news/v_newsinactivelists', $data);

    }
    
    
    public function deletenews($id){
        $news_id = (int)$id;
 
        $this->mod_news->delete_news($news_id);
        $this->newslists('refresh');
        
    }
    
//    public function deletenews(){
//        
//    }
}