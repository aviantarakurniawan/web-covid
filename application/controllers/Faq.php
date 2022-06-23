<?php

class Faq extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('mfaq');
    }

    function index(){
        $this->load->view('frontend/faq');
    }

    function kirim_faq(){
        $nama_tamu = $this->input->post('nama_tamu');
        $pertanyaan = $this->input->post('pertanyaan');

        $this->mfaq->kirim_data($nama_tamu,$pertanyaan);
        echo $this->session->set_flashdata('msg','success');
        redirect('faq');
    }

    function kirim_faq2(){
        $nama_tamu = $this->input->post('nama_tamu');
        $pertanyaan = $this->input->post('pertanyaan');

        $this->mfaq->kirim_data($nama_tamu,$pertanyaan);
        echo $this->session->set_flashdata('msg','success');
        redirect('beranda');
    }
}