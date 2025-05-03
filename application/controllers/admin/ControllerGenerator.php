<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerGenerator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('file'); // Load file helper
    }

    public function index() {
        
    }

    public function generate() {
        // Get input from admin panel
        // $controller_name = $this->input->post('controller_name', TRUE);
        // $models = $this->input->post('models'); // Array of model names
        $controller_name =  $this->uri->segment(4);


        // exit(); 
        $view_name = strtolower($controller_name); // View file name

        // Validate input
        if (empty($controller_name)) {
            echo "Controller name is required!";
            return;
        }

        // Define file paths
        $controller_file = APPPATH . "controllers/category/" . ucfirst($controller_name) . ".php";
        // $view_file = APPPATH . "views/" . $view_name . ".php";

        // Generate the controller content
        $controller_template = "<?php defined('BASEPATH') OR exit('No direct script access allowed');

        class " . ucfirst($controller_name) . " extends CI_Controller {

            public function __construct() {
                parent::__construct();
                 
            }

            public function index() {
                \$data = [];
                \$data['username'] = \$this->session->userdata('username');  
        \$data['menu']=\$this->Mod_options->getdata();
        
        \$this->load->view('templates/admin/common/header', \$data);
        \$this->load->view('templates/admin/common/left_nav');
        \$this->load->view('templates/admin/Options/index', \$data);
        \$this->load->view('templates/admin/common/footer');
                
            }
        }
        ?>";

        // Write the controller file
        if (!write_file($controller_file, $controller_template)) {
            echo "Failed to create controller file!";
            return;
        }
     

        echo "Controller and view created successfully!";
    }

    private function load_models($models) {
        if (empty($models)) return "";

        $model_str = "";
        foreach ($models as $model) {
            $model_str .= "\$this->load->model('$model');\n        ";
        }
        return $model_str;
    }
}
