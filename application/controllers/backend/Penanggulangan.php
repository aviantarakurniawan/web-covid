<?php

class Penanggulangan extends CI_Controller{

    function __construct(){
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url=base_url('admin');
            redirect($url);
        };
        $this->load->model('mpenanggulangan');
    }

    function index(){
        if ($this->session->userdata('akses')=='1') {
            $x['data'] = $this->mpenanggulangan->ambil_data();
            $this->load->view('backend/penanggulangan',$x);
        }elseif ($this->session->userdata('akses')=='2') {
            $x['data'] = $this->mpenanggulangan->ambil_data();
            $this->load->view('backend/penanggulangan',$x);
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function tambah_penanggulangan(){
        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $keterangan = $this->input->post('keterangan');
        $jenis = $this->input->post('jenis');

        $this->mpenanggulangan->tambah_data($id_user,$nama,$deskripsi,$keterangan,$jenis);
        echo $this->session->set_flashdata('msg','success');
        redirect('backend/penanggulangan');
    }

    function edit_penanggulangan(){
        $id = $this->input->post('kode');
        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $keterangan = $this->input->post('keterangan');
        $jenis = $this->input->post('jenis');

        $this->mpenanggulangan->edit_data($id,$id_user,$nama,$deskripsi,$keterangan,$jenis);
        echo $this->session->set_flashdata('msg','info');
        redirect('backend/penanggulangan');

    }

    function hapus_penanggulangan(){
        if($this->session->userdata('akses')=='1'){
            $id=$this->input->post('kode');
            $this->mpenanggulangan->hapus_data($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/penanggulangan');
        }elseif ($this->session->userdata('akses')=='2') {
            $id=$this->input->post('kode');
            $this->mpenanggulangan->hapus_data($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/penanggulangan'); 
        }else{
            echo "Halaman tidak ditemukan";
        }
    }
}