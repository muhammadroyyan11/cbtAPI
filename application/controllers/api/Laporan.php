<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Laporan extends REST_Controller
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
        if ($id == '') {
            $laporan = $this->api->getLaporanlist()->result();
            if ($laporan) {
                $this->response([
                    'status'    => true,
                    'data'      => $laporan
                    
                ], REST_Controller::HTTP_OK);
            }
            else{
                $this->response([
                    'status'    => false,
                    'message'   => 'Data not found' 
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        
        } else {
            $laporan = $this->api->getLaporan($id)->result();
            $soal = $this->api->getLaporanSoal($id)->row();

            $result = explode(",", $soal->no_soal);

            if ($laporan) {
                $this->response([
                    'status'    => true,
                    'data'      => [
                        'header' => $laporan, 
                        'no_soal' =>$result
                        ]
                    
                ], REST_Controller::HTTP_OK);
            }
            else{
                $this->response([
                    'status'    => false,
                    'message'   => 'Data not found' 
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        
        // if ($laporan) {
        //     $this->response([
        //         'status'    => true,
        //         'data'      => [
        //             'header' => $laporan, 
        //             'no_soal' =>$result
        //             ]
                
        //     ], REST_Controller::HTTP_OK);
        // }
        // else{
        //     $this->response([
        //         'status'    => false,
        //         'message'   => 'Data not found' 
        //     ], REST_Controller::HTTP_NOT_FOUND);
        // }
    }
}
