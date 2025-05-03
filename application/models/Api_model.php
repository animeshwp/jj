<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {
    
    public function sendPostRequest($data) {
        


        $this->saveResponseToDatabase($decoded_response);

    }

      public function saveResponseToDatabase($response) {

        $data = array(
            'response_data' => json_encode($response),
            'timestamp' => date('Y-m-d H:i:s')
        );
        // echo "<pre>";

        // print_r($data);  exit();
        // $var_ss = json_encode($response); 
        // print_r($var_ss); exit();

        // Insert the data into the 'responses' table
        $res= $this->db->insert('responses', $data);
        if($res >0){
            echo "hello";
        }else{
            echo "no";
        }
    }
}
// END