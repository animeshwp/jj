<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//


class News extends CI_Controller {
    public function __Construct(){
        parent::__construct();
        
        $this->load->model('admin/mod_news', 'mod_news');
        
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
    
        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/news/v_news', $data);        
        $this->load->view('templates/admin/common/footer');
     
    }


    public function save() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
    
        $data['username'] = $this->session->userdata('username');
        
        // Form validation rules  
        $this->form_validation->set_rules('data[post_title]', 'Post Title', 'required');
        $this->form_validation->set_rules('data[post_content]', 'Post Content', 'required');
        $this->form_validation->set_rules('data[post_summary]', 'Post Summary', 'required');
        $this->form_validation->set_rules('data[cat_id]', 'Category', 'required');
        $this->form_validation->set_rules('data[authorName]', 'Author Name', 'required');
    
        // Check if form validation fails
        if (!$this->form_validation->run()) {
            $this->load->view('templates/admin/common/header');
            $this->load->view('templates/admin/common/left_nav');
            $this->load->view('templates/admin/news/v_news');        
            $this->load->view('templates/admin/common/footer');
            return;
        }
    
        // Image upload settings
        $config['image_library']  = 'gd2';
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 1000; // 500KB
        $config['encrypt_name']  = TRUE;
    
        $this->load->library('upload', $config);
    
        // Check if image upload fails
        if (!$this->upload->do_upload('post_image')) {
            $error = $this->upload->display_errors();
            echo $error; // Display upload error
            return;
        } 
    
        // Get uploaded image data
        $upload_data = $this->upload->data();
        $image_width = $upload_data['image_width'];
        $image_height = $upload_data['image_height'];
    
        // Allowed dimensions
        $max_width = 1025;
        $max_height = 651;
    
        // Check image dimensions
        if ($image_width === $max_width || $image_height === $max_height) {
            unlink($upload_data['full_path']); // Delete the uploaded file
            echo "Error: Image must be **maximum** {$max_width}x{$max_height} pixels.";
            return;
        }
    
        // Prepare data for database
        $data = $this->input->post('data', FALSE);
        $data['post_image'] = $upload_data['file_name'];
    
        // Insert into database
        $query = $this->mod_news->insert_news($data);
        
        if ($query == 1) {
            redirect(base_url('admin/news/newslists'));
        }
    }

    
    
//     Public function save() {  
//         $this->load->helper(array('form', 'html', 'url'));
//         $this->load->library('form_validation'); 
//         $data['username'] = $this->session->userdata('username');
       
//         // form validation check   
//         $this->form_validation->set_rules('data[post_title]', 'Post Title', 'required');
//         $this->form_validation->set_rules('data[post_content]', 'Post Content', 'required');
//         $this->form_validation->set_rules('data[post_summary]', 'Post Summary', 'required');
//         $this->form_validation->set_rules('data[cat_id]', 'Category', 'required');
//         $this->form_validation->set_rules('data[authorName]', 'Author Name', 'required');
// //        $this->form_validation->set_rules('userfile', 'File', 'required');
            
//         // image informatio upload
//         $config['image_library']  = 'gd2';

//         $config['upload_path'] = './uploads/';
// //        $config['allowed_types'] = 'gif|jpg|png';
//         $config['allowed_types'] = 'gif|jpg|png|jpeg';
//         $config['max_size'] = '500';
//         $config['width'] = 100;
//         $config['height'] = 100;
//         $config['encrypt_name'] = TRUE;
        
        
//         $this->load->library('upload', $config);
//             if (!$this->form_validation->run() || ! $this->upload->do_upload('post_image'))  {
//             // echo "no content";
//             echo $this->image_lib->display_errors();

//             echo "<pre>";
//             print_r($_POST); exit; 
//             $this->load->view('templates/admin/common/header');
//             $this->load->view('templates/admin/common/left_nav');
//             $this->load->view('templates/admin/news/v_news');        
//             $this->load->view('templates/admin/common/footer');
                    
//         } else {             

//             $data= $this->input->post('data', FALSE); 

//             // print_r($data); exit;
//             $data['post_image']= $this->upload->data('file_name');
//             $query = $this->mod_news->insert_news($data);
//             if($query == 1 ){
//                 redirect(base_url('admin/news/newslists'));
//             }
//         }
//     }

    
    public function newslists(){
        
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The news";
        // $config['base_url']        = base_url();
        // $config['total_rows']      = $this->bace_model->record_count('user');
        // $config['per_page']        = 10;
        $config = array();
        $config["base_url"] = base_url('admin/news/newslists/');
        $config["total_rows"] = $this->mod_news->get_count();
        $config["per_page"] = 15;
        $config["uri_segment"] = 4;
        $config["full_tag_open"]   = '<ul class="pagination pagination-sm m-0 float-end">';
        $config["full_tag_close"]  = '</ul>';
        $config["first_tag_open"]  = '<li class="page-item">';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"]   = '<li class="page-item">';
        $config["last_tag_close"]  = '</li>';
        $config["next_tag_open"]   = '<li class="page-item"><span aria-hidden="true">';
        $config["next_tag_close"]  = '</span></li>';
        $config["prev_tag_open"]   = '<li class="page-item"> <span aria-hidden="true">';
        $config["prev_tag_close"]  = '</span></li>';
        $config["num_tag_open"]    = '<li class="page-item ">';
        $config["num_tag_close"]   = '</li>';
        $config["cur_tag_open"]    = '<li class="page-item active"> <a class="page-link">';
        $config["cur_tag_close"]   = '</a></li>';
        $config['first_link']      = "&laquo;";
        $config['last_link']       = "&raquo;";
      
                

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['post_content'] = $this->mod_news->get_authors($config["per_page"], $page);
        
        $data['post_content'] = $this->mod_news->view_news();
        // $this->load->view('news/v_newslists', $data);
        $this->load->view('templates/admin/common/header');
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/news/v_newslist',$data);        
        $this->load->view('templates/admin/common/footer');

    }
    
    public function editnews($id){
        $id = (int)$id;
//        echo $id; exit;
        $data['username'] = $this->session->userdata('username');
        
        $data['postContent'] = $this->mod_news->edit_news($id);
//        print_r($data); exit;
        $this->load->view('templates/admin/common/header');
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/news/v_newsedit',$data);        
        $this->load->view('templates/admin/common/footer');
    }


    public function updatenews($id){ //update_news
  
        $data['username'] = $this->session->userdata('username');
        $news_info =  (int)$id;              

         
        // form validation check   
        $this->form_validation->set_rules('data[post_title]', 'Post Title', 'required');
        $this->form_validation->set_rules('data[post_content]', 'Post Content', 'required');
        $this->form_validation->set_rules('data[post_summary]', 'Post Summary', 'required');
        $this->form_validation->set_rules('data[cat_id]', 'Category', 'required');
//        $this->form_validation->set_rules('userfile', 'File', 'required');
        
        // image informatio upload
        $config['image_library']  = 'gd2';
        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = 'gif|jpg|png';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1000';
        $config['width'] = 1025;
        $config['height'] = 651;
       $config['encrypt_name'] = TRUE;        
        
        $this->load->library('upload', $config);
        $this->upload->do_upload('post_image');

            if (!$this->form_validation->run() )  {
        
            $this->load->view('templates/admin/common/header');
            $this->load->view('templates/admin/common/left_nav');
            $this->load->view('templates/admin/news/v_news');        
            $this->load->view('templates/admin/common/footer');
                    
        } else {             

            $data= $this->input->post('data', FALSE); 
            if(empty($this->upload->data('file_name'))){
                unset($data['post_image']);
            }else{
                $data['post_image']= $this->upload->data('file_name');
            }
            // print_r($data); exit();
            $query = $this->mod_news->update_news($data, $id);
            if($query == 1 ){
                redirect(base_url('admin/news/newslists'));
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

    public function delete() {
        header("Content-Type: application/json");

        // Get JSON input
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['id'])) {
            $id = intval($data['id']);

            // Call model function to delete the news post
            $deleted = $this->mod_news->delete_news($id);

            if ($deleted) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "message" => "Failed to delete news."]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Invalid request."]);
        }
    }


    public function list()
    {
        // $config['base_url']        = base_url();
        // $config['total_rows']      = $this->bace_model->record_count('user');
        // $config['per_page']        = 10;
        $config = array();
        $config["base_url"] = base_url('admin/news/newslists/');
        $config["total_rows"] = $this->mod_news->get_count();
        $config["per_page"] = 15;
        $config["uri_segment"] = 4;
        $config["full_tag_open"]   = '<ul class="pagination pagination-sm m-0 float-end">';
        $config["full_tag_close"]  = '</ul>';
        $config["first_tag_open"]  = '<li class="page-item">';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"]   = '<li class="page-item">';
        $config["last_tag_close"]  = '</li>';
        $config["next_tag_open"]   = '<li class="page-item"><span aria-hidden="true">';
        $config["next_tag_close"]  = '</span></li>';
        $config["prev_tag_open"]   = '<li class="page-item"> <span aria-hidden="true">';
        $config["prev_tag_close"]  = '</span></li>';
        $config["num_tag_open"]    = '<li class="page-item ">';
        $config["num_tag_close"]   = '</li>';
        $config["cur_tag_open"]    = '<li class="page-item active"> <a class="page-link">';
        $config["cur_tag_close"]   = '</a></li>';
        $config['first_link']      = "&laquo;";
        $config['last_link']       = "&raquo;";
      
        // $limitstart                    = $this->uri->segment(1) ? $this->uri->segment(1) : 0;
        // $this->data["paginetionlinks"] = $this->pagination->create_links();
        // $this->data["returndata"]      = $this->bace_model->run_query("select * from user limit " . $limitstart . "," . $config['per_page'] . " ");
        // $this->load->view('pagination', $this->data);


        
        

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['post_content'] = $this->mod_news->get_authors($config["per_page"], $page);

        
        // $data['post_content'] = $this->mod_news->view_news();
        // $this->load->view('news/v_newslists', $data);
        $this->load->view('templates/admin/common/header');
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/news/v_newslist',$data);        
        $this->load->view('templates/admin/common/footer');

        // $this->load->view('templates/index', $data);
    
    }

   

}