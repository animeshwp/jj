<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Author extends CI_Controller {
    public function __Construct(){
        parent::__construct();
        
        $this->load->Model('admin/mod_category', 'mod_category');
        $this->load->Model('admin/Mod_author', 'Mod_author');
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
        $data['authors'] = $this->Mod_author->view_author();
 
        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/author/index', $data);        
        $this->load->view('templates/admin/common/footer');

    }
    
    Public function save() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('data[name]', 'Author Name', 'required');
        $this->form_validation->set_rules('data[slug]', 'Slug', 'required');
        $this->form_validation->set_rules('data[status]', 'Status', 'required');

        $config['upload_path'] = './uploads/authors/';
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
        //     $this->load->view('templates/admin/author/index', $data);        
        //     $this->load->view('templates/admin/common/footer');
        // }  
        

        if (!$this->form_validation->run() || ! $this->upload->do_upload('bgimage')) {
            $data['username'] = $this->session->userdata('username');
            $this->load->view('templates/admin/common/header', $data);
            $this->load->view('templates/admin/common/left_nav');
            $this->load->view('templates/admin/author/index', $data);        
            $this->load->view('templates/admin/common/footer');
        
        } else {
            $data= $this->input->post('data', TRUE); 
            $data['picture']= $this->upload->data('file_name');
            // 
            // print_r($data); exit();
            $query = $this->Mod_author->save($data);
                redirect(base_url('admin/author'));

        }
    }


    
    public function editauthor($id){
            
        $data['username'] = $this->session->userdata('username');      
        
        $id = (int)$id; 
        
        $data['edit_author'] = $this->Mod_author->edit_author($id);
        $data['authors'] = $this->Mod_author->view_author();
       
        $this->load->view('templates/admin/common/header');
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/author/edit_author', $data);        
        $this->load->view('templates/admin/common/footer');        

    }



    public function update($id){ //update_menu
       
        $data['username'] = $this->session->userdata('username');                    
      
         
        // form validation check   
        $this->form_validation->set_rules('data[name]', 'Author Name', 'required');
        $this->form_validation->set_rules('data[slug]', 'Slug', 'required');
        $this->form_validation->set_rules('data[status]', 'Status', 'required');

        $config['upload_path'] = './uploads/authors/';
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
            $data['authors'] = $this->Mod_author->view_author();
            $data['edit_author'] = $this->Mod_author->edit_author($id);
            $data['username'] = $this->session->userdata('username');
            $this->load->view('templates/admin/common/header', $data);
            $this->load->view('templates/admin/common/left_nav');
            $this->load->view('templates/admin/author/edit_author', $data);        
            $this->load->view('templates/admin/common/footer');
        
        } else {
            $data= $this->input->post('data', TRUE); 
            // $data['bgimage']= $this->upload->data('file_name');
            if(empty($this->upload->data('file_name'))){
                unset($data['bgimage']);
            }else{
                $data['picture']= $this->upload->data('file_name');
            }
            // 
            // print_r($data); exit();
            $query = $this->Mod_author->update_author($id, $data);
                redirect(base_url('admin/author'));

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
            $this->load->view('templates/admin/author/edit_subcategory', $data);         
            $this->load->view('templates/admin/common/footer');
        
        } else {
            $data= $this->input->post('data', TRUE); 
         
            // print_r($data); exit();
            $query = $this->mod_category->update_subcategory($id, $data);
                redirect(base_url('admin/author/list'));

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