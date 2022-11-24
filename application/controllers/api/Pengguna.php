<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Pengguna extends REST_Controller
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
            $pengguna = $this->api->getPengguna()->result();
        } else {
            $pengguna = $this->api->getPengguna($id)->result();
        }

        if ($pengguna) {
            $this->response([
                'status'    => true,
                'data'      => $pengguna
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
