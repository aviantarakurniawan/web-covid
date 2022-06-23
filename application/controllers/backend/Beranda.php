<?php

class Beranda extends CI_Controller{
    function __construct(){
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url=base_url('admin');
            redirect($url);
        };
        $this->load->model('mpetugas');
        $this->load->model('mtamu');
        $this->load->model('mpenanggulangan');
        $this->load->model('mpenyebaran');
        $this->load->model('mwilayah');
        $this->load->model('mfaq');
    }

    function index(){
        if ($this->session->userdata('akses')=='1') {
            $data['petugas'] = $this->mpetugas->ambil_semua_data()->num_rows();
            $data['tamu'] = $this->mtamu->ambil_semua_data()->num_rows();
            $data['penanggulangan'] = $this->mpenanggulangan->ambil_semua_data()->num_rows();
            $data['penyebaran'] = $this->mpenyebaran->ambil_semua_data()->num_rows();

            $this->load->view('backend/beranda_admin',$data);
        }elseif($this->session->userdata('akses')=='2') {
            $x['data'] = $this->mpenyebaran->ambil_semua_data_beranda();
            $x['tamu'] = $this->mtamu->ambil_semua_data()->num_rows();
            $x['penanggulangan'] = $this->mpenanggulangan->ambil_semua_data()->num_rows();
            $x['penyebaran'] = $this->mpenyebaran->ambil_semua_data()->num_rows();
            $x['wilayah'] = $this->mwilayah->ambil_semua_data()->num_rows();

            $this->load->view('backend/beranda',$x);
        }else{
            redirect('admin');
        }
    }
}