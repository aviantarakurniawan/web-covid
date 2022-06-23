<?php

class Beranda extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('mpenanggulangan');
        $this->load->model('mberanda');
        $this->load->model('mfaq');
    }

    function index(){
        $x['penanggulangan'] = $this->mpenanggulangan->ambil_data_limit4();
        $x['total_suspek'] = $this->mberanda->total_suspek();
        $x['total_sembuh'] = $this->mberanda->total_sembuh();
        $x['total_dirawat'] = $this->mberanda->total_dirawat();
        $x['total_meninggal'] = $this->mberanda->total_meninggal();
        $x['subtotal'] = $this->mberanda->subtotal();
        $x['total_konfirmasi'] = $this->mberanda->total_konfirmasi();
        $x['faq'] = $this->mfaq->ambil_data_terjawab();

        $this->load->view('frontend/beranda',$x);
    }
}