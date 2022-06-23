<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buku_tamu extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('mtamu');
    }

    function index(){
        $this->load->view('frontend/tamu');
    }

    function input_tamu(){
        $nama_tamu = $this->input->post('nama_tamu');
        $jabatan = $this->input->post('jabatan');
        $dari = $this->input->post('dari');
        $tujuan = $this->input->post('tujuan');
        $saran = $this->input->post('saran');

        $this->mtamu->tambah_data($nama_tamu,$jabatan,$dari,$tujuan,$saran);
        redirect('beranda');
    }
}