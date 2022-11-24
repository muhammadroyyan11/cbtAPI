<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Soal extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //inisialisasi model Produk_model.php dengan nama produk
        $this->load->model('Api_model', 'api');
    }
    
    public function index_get()
    {
        $id = $this->get('id');

        if ($id === NULL) {
            $soal = $this->api->getSoal()->result();
        } else {
            $soal = $this->api->getSoal($id)->result();
        }

        if ($soal) {
            $this->response([
                'status'    => true,
                'data'      => $soal
            ], REST_Controller::HTTP_OK);
        }
        else{
            $this->response([
                'status'    => false,
                'message'   => 'Data not found' 
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }
}
