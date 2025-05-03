<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : News Portal
 * Project Description :  Jibon Joyee
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Category extends CI_Controller {
    public function __Construct(){
        parent::__construct();
        
        $this->load->Model('admin/mod_category', 'mod_category');
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
 
        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/category/index', $data);        
        $this->load->view('templates/admin/common/footer');

    }
    
    Public function save() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('data[title]', 'Category Name', 'required');
        $this->form_validation->set_rules('data[slug]', 'Slug', 'required');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
        $this->load->library('upload', $config);
        // if ( ! $this->upload->do_upload('bgimage')) {
        //     $data['username'] = $this->session->userdata('username');
        //     $this->load->view('templates/admin/common/header', $data);
        //     $this->load->view('templates/admin/common/left_nav');
        //     $this->load->view('templates/admin/category/index', $data);        
        //     $this->load->view('templates/admin/common/footer');
        // }  
        

        if (!$this->form_validation->run() || ! $this->upload->do_upload('bgimage')) {
            $data['username'] = $this->session->userdata('username');
            $this->load->view('templates/admin/common/header', $data);
            $this->load->view('templates/admin/common/left_nav');
            $this->load->view('templates/admin/category/index', $data);        
            $this->load->view('templates/admin/common/footer');
        
        } else {
            $data= $this->input->post('data', TRUE); 
            $data['bgimage']= $this->upload->data('file_name');
            // 
            // print_r($data); exit();
            $query = $this->mod_category->save($data);
                redirect(base_url('admin/category/list'));

        }
    }

    Public function add_subcategory() {  
          // print_r($_POST); exit;
        // form validation check   
        $this->form_validation->set_rules('data[sub_cat]', 'Category Name', 'required');
        $this->form_validation->set_rules('data[slug]', 'Slug', 'required');
        $this->form_validation->set_rules('data[cat_id]', 'Slug', 'required');
        $this->form_validation->set_rules('data[status]', 'Status', 'required');




        if (!$this->form_validation->run() ) {
            $data['username'] = $this->session->userdata('username');
            $this->load->view('templates/admin/common/header', $data);
            $this->load->view('templates/admin/common/left_nav');
            $this->load->view('templates/admin/category/index', $data);        
            $this->load->view('templates/admin/common/footer');
        
        } else {
            $data= $this->input->post('data', TRUE); 
         
            // print_r($data); exit();
            $query = $this->mod_category->save_subcategory($data);
                redirect(base_url('admin/category/list'));

        }
    }

    
    public function list(){
        
        $data['username'] = $this->session->userdata('username');
        $data['category']=$this->mod_category->view_category();
        $data['sub_category']=$this->mod_category->view_sub_category();

        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/category/view', $data);        
        $this->load->view('templates/admin/common/footer');


    }
    
    public function editcategory($id){
            
        $data['username'] = $this->session->userdata('username');      
        
        $id = (int)$id; 
        
        $data['edit_content'] = $this->mod_category->edit_category($id);
       

        $this->load->view('templates/admin/common/header');
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/category/edit_category', $data);        
        $this->load->view('templates/admin/common/footer');        

    }

    public function editsubcategory($id){
        $data['username'] = $this->session->userdata('username');        
        $id = (int)$id; 
        
        $data['edit_subcontent'] = $this->mod_category->edit_subcategory($id);       
        // print_r($data); exit;
        $this->load->view('templates/admin/common/header');
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/category/edit_subcategory', $data);        
        $this->load->view('templates/admin/common/footer');        

    }


    public function update_category($id){ //update_menu
       
        $data['username'] = $this->session->userdata('username');                    
      
         
        // form validation check   
        $this->form_validation->set_rules('data[title]', 'Category Name', 'required');
        $this->form_validation->set_rules('data[slug]', 'Slug', 'required');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
        $this->load->library('upload', $config);
        $this->upload->do_upload('bgimage');
       
        

        if (!$this->form_validation->run()) {
            $data['edit_content'] = $this->mod_category->edit_category($id);
            $data['username'] = $this->session->userdata('username');
            $this->load->view('templates/admin/common/header', $data);
            $this->load->view('templates/admin/common/left_nav');
            $this->load->view('templates/admin/category/edit_category', $data);        
            $this->load->view('templates/admin/common/footer');
        
        } else {
            $data= $this->input->post('data', TRUE); 
            // $data['bgimage']= $this->upload->data('file_name');
            if(empty($this->upload->data('file_name'))){
                unset($data['bgimage']);
            }else{
                $data['bgimage']= $this->upload->data('file_name');
            }
            // 
            // print_r($data); exit();
            $query = $this->mod_category->update_category($id, $data);
                redirect(base_url('admin/category/list'));

        }
        
    }


    public function update_subcategory($id){ //update_menu
       
          // print_r($_POST); exit;
        // form validation check   
        $this->form_validation->set_rules('data[sub_cat]', 'Category Name', 'required');
        $this->form_validation->set_rules('data[slug]', 'Slug', 'required');
        $this->form_validation->set_rules('data[cat_id]', 'Slug', 'required');
        $this->form_validation->set_rules('data[status]', 'Status', 'required');




        if (!$this->form_validation->run() ) {
            $data['username'] = $this->session->userdata('username');
            $this->load->view('templates/admin/common/header', $data);
            $this->load->view('templates/admin/common/left_nav');
            $this->load->view('templates/admin/category/edit_subcategory', $data);         
            $this->load->view('templates/admin/common/footer');
        
        } else {
            $data= $this->input->post('data', TRUE); 
         
            // print_r($data); exit();
            $query = $this->mod_category->update_subcategory($id, $data);
                redirect(base_url('admin/category/list'));

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

// END