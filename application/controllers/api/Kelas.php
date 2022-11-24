<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Kelas extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model', 'api');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id == '') {
            $laporan = $this->api->getKelas()->result();
        } else {
            $laporan = $this->api->getKelas($id)->result();
        }

        if ($laporan) {
            $this->response([
                'status'    => true,
                'data'      => $laporan
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'    => false,
                'message'   => 'Data not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
