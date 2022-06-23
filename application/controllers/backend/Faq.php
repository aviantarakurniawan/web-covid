<?php

class Faq extends CI_Controller{

    function __construct(){
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url=base_url('admin');
            redirect($url);
        };
        $this->load->model('mfaq');
    }

    function index(){
        $this->mfaq->refresh_data();
		$x['data']=$this->mfaq->ambil_data();
		$this->load->view('backend/faq',$x);
    }

    function edit_faq(){
        $id_faq = $this->input->post('id_faq');
        $id_user = $this->input->post('id_user');
        $nama_tamu = $this->input->post('nama_tamu');
        $pertanyaan = $this->input->post('pertanyaan');
        $jawaban = $this->input->post('jawaban');

        $this->mfaq->edit_data($id_faq,$id_user,$nama_tamu,$pertanyaan,$jawaban);
        echo $this->session->set_flashdata('msg','success-jawab');
        redirect('backend/faq');
    }

    function hapus_faq(){
        $id_faq=$this->input->post('id_faq');
		$this->mfaq->hapus_data($id_faq);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('backend/faq');
    }
}