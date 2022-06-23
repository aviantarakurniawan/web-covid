<?php

class Wilayah extends CI_Controller{

    function __construct(){
        parent::__construct();
            if ($this->session->userdata('masuk') != TRUE) {
                $url=base_url('admin');
                redirect($url);
            };
            $this->load->model('mwilayah');
    }

    function index(){
        if ($this->session->userdata('akses')=='1') {
            $x['data'] = $this->mwilayah->ambil_data();
            $this->load->view('backend/wilayah',$x);
        }elseif ($this->session->userdata('akses')=='2') {
            $x['data'] = $this->mwilayah->ambil_data();
            $this->load->view('backend/wilayah',$x);
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function tambah_wilayah(){
        $rw = $this->input->post('rw');
        $penduduk = $this->input->post('penduduk');

        $sql = $this->db->query("SELECT rw FROM wilayah WHERE rw='$rw'");
        $cek_rw = $sql->num_rows();

        if ($cek_rw > 0) {
            echo $this->session->set_flashdata('msg','failed');
            redirect('backend/wilayah');
        }else {
            $this->mwilayah->tambah_data($rw,$penduduk);
            echo $this->session->set_flashdata('msg','success');
            redirect('backend/wilayah');
        }
    }

    function edit_wilayah(){
        $id = $this->input->post('kode');
        $rw = $this->input->post('rw');
        $penduduk = $this->input->post('penduduk');

        $this->mwilayah->edit_data($id,$rw,$penduduk);
        echo $this->session->set_flashdata('msg','info');
        redirect('backend/wilayah');
    }

    function hapus_wilayah(){
        if ($this->session->userdata('akses')=='1') {
            $id = $this->input->post('kode');
            $this->mwilayah->hapus_data($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/wilayah');
        }elseif ($this->session->userdata('akses')=='2') {
            $id = $this->input->post('kode');
            $this->mwilayah->hapus_data($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/wilayah');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }
}