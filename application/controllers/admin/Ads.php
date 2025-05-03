<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Ads extends CI_Controller {
    public function __Construct(){
        parent::__construct();
//        $data['username'] = $this->session->userdata('username');  // logged in userdata  

        $this->load->model('admin/mod_ads', 'mod_ads');
        }
    
    public function index(){
        
        $data['username'] = $this->session->userdata('username');
        $data['all_ads'] = $query = $this->mod_ads->view_ads(); 
        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/ads/v_ads', $data);       
        $this->load->view('templates/admin/common/footer');

    }

    public function save()
    {
        $data['username'] = $this->session->userdata('username');
        
        // Form validation rules  
        $this->form_validation->set_rules('data[ads_info]', 'Ads Info', 'required');
        $this->form_validation->set_rules('data[startDate]', 'Start Date', 'required');
        $this->form_validation->set_rules('data[endDate]', 'End Date', 'required');
        $this->form_validation->set_rules('data[loc]', 'Location', 'required');
        $this->form_validation->set_rules('data[pos]', 'Position', 'required');
        $this->form_validation->set_rules('data[status]', 'Status', 'required');

        // Check if form validation fails
        if (!$this->form_validation->run()) {
            $this->load->view('templates/admin/common/header');
            $this->load->view('templates/admin/common/left_nav');
            $this->load->view('templates/admin/news/v_news');
            $this->load->view('templates/admin/common/footer');
            return;
        }

        // Image upload settings
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 500; // 500KB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        // Check if image upload fails
        if (!$this->upload->do_upload('adsimage')) {
            $error = $this->upload->display_errors();
            echo $error; // Display upload error
            return;
        }

        // Get uploaded image data
        $upload_data = $this->upload->data();

        // Prepare data for database
        $data = $this->input->post('data', FALSE);
        $data['adsimage'] = $upload_data['file_name'];

        // Insert into database
        $query = $this->mod_ads->save($data);

        if ($query == 1) {
            redirect(base_url('admin/ads'));
        }
    }

    
    public function noticelists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The notice";
        
        
        $this->load->Model('mod_notice');
        $data['notice_content'] = $this->mod_notice->view_notice();
        $this->load->view('notice/v_noticelists', $data);

    }
    
    public function editnotice($id){
            
        $data['username'] = $this->session->userdata('username');
        $data['notices'] = $query = $this->mod_notice->view_notice();
        
        $notice_info =$this->uri->segment(4); 
        // echo $notice_info;

        $data['enotice'] = $this->mod_notice->edit_notice($notice_info);
//        print_r($data); exit;
        // $this->load->view('notice/v_noticeedit', $data);

        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/notice/v_editnotice', $data);       
        $this->load->view('templates/admin/common/footer');
    }


    public function update($id){  
        $this->load->library('form_validation'); 
        
        $data['username'] = $this->session->userdata('username');
        $notice_info = $this->uri->segment(4);
        $data['enotice'] = $this->mod_notice->edit_notice($id); 
        $data['notices'] = $query = $this->mod_notice->view_notice();


         
        // form validation check   
        $this->form_validation->set_rules('data[notice_title]', 'Title', 'required');
        $this->form_validation->set_rules('data[notice_date]', 'Date', 'required');   
        
        if($this->form_validation->run() == False){
            // print_r($this->input->post('data',TRUE));exit();
            redirect(base_url('admin/notice/editnotice/'.$id));
        }else{
            $data = $this->input->post('data',TRUE);
            $result = $this->mod_notice->update_notice($notice_info, $data);
        
        if($result){
            $this->index();
        }
        
        }
    }
    
    public function inactivenotice(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The notice";
        
        
        $this->load->Model('mod_notice');
        $data['inactivenotice_content'] = $this->mod_notice->view_inactivenotice();

        $this->load->view('notice/v_noticeinactivelists', $data);

    }
}