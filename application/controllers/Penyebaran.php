<?php

class Penyebaran extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('mpenyebaran');
        $this->load->model('mwilayah');
    }

    function index(){
        $x['wilayah'] = $this->mwilayah->ambil_data_by_wilayah();
        $x['penyebaran'] = $this->mpenyebaran->ambil_data_by_wilayah();

        $this->load->view('frontend/penyebaran',$x);
    }
}