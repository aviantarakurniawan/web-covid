<?php

class Buku_tamu extends CI_Controller{

    function __construct(){
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url=base_url('admin');
            redirect($url);
        };
        $this->load->model('mtamu');
    }

    function index(){
        if ($this->session->userdata('akses')=='1') {
            $x['data'] = $this->mtamu->ambil_data();
            $this->load->view('backend/buku_tamu',$x);
        }elseif ($this->session->userdata('akses')=='2') {
            $x['data'] = $this->mtamu->ambil_data();
            $this->load->view('backend/buku_tamu',$x);
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function hapus_tamu(){
        if($this->session->userdata('akses')=='1'){
            $id=$this->input->post('kode');
            $this->mtamu->hapus_data($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/buku_tamu');
        }elseif ($this->session->userdata('akses')=='2') {
            $id=$this->input->post('kode');
            $this->mtamu->hapus_data($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/buku_tamu');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }
}