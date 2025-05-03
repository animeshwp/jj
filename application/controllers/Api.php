<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('api_model');
        $this->load->helper('url');
        // $logged_info = $this->session->userdata('logged_info');
        // if($logged_info == FALSE){
        //     redirect(base_url());
        // }
    }

    public function sendRequest_get() {
        
        // Example data to be sent in the request

        // echo 'UcTxId'.sha1(date('Y-m-d H:i:s'));
        // https://sandbox.ekpay.gov.bd/ekpaypg/v1?sToken=eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJ1dHRhcmFfY2x1Yl90ZXN0IiwiYXV0aCI6IlJPTEVfTUVSQ0hBTlQiLCJpc3N1ZWRfYXQiOjE3MDY2NDYxMjYwNjUsImV4cCI6MTcwNjY0NzkyNn0.ujqQufCUyoI3Sc8dtTXMdopFgMTYAQSUBwfxGFSGuPFDDH6ALXTv6zQPaK1mr_DjMyjgbpr3-u1B1S13iyadbw&trnsID= abyp116
        // echo 'UcTxId'.sha1(date('Y-m-d H:i:s')). "<br>";


        $data = array(
            'mer_info' => array(
                'mer_reg_id' => 'uttara_club_test',
                'mer_pas_key' => 'xH3@!^C6'
            ),
            'req_timestamp' => date('Y-m-d H:i:s')." GMT+6",

            'feed_uri' => array(
                's_uri' => base_url('members/payment/success'),
                'f_uri' => base_url('members/payment/decline'),
                'c_uri' => base_url('members/payment/cancel')
            ),
            'cust_info' => array(
                'cust_id' => 'UC001002',
                'cust_name' => 'Mr. Altaf Hossain Shekh',
                'cust_mobo_no' => '+8801355040311',
                'cust_email' => 'dir-fa@bba.gov.bd',
                'cust_mail_addr' => 'Setu Bhaban, New Airport Road Banani, Dhaka.'
            ),

            'trns_info' => array(
                'trnx_id' => 'UcTxId'.sha1(date('Y-m-d H:i:s')),
                'trnx_amt' => '1000',
                'trnx_currency' => 'BDT',
                'ord_id' => 'OID674896',
                'ord_det' => 'Uttara Officers Club Limited'
            ),

            'ipn_info' => array(
                'ipn_channel' => '3',
                'ipn_email' => 'info@uoc.org.bd',
                'ipn_uri' => base_url('members/payment/ipn')
            ),

            'mac_addr' => '1.1.1.1'
        );

        // Call the model function to send the request
        // $response = $this->api_model->sendPostRequest($data);

        $json_data = json_encode($data);

        echo "<pre>";

        print_r($json_data);

    }
}

// END
