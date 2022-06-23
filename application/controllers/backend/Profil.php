<?php

class Profil extends CI_Controller{

    function __construct(){
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url=base_url('admin');
            redirect($url);
        };
        $this->load->model('mprofil');
        $this->load->model('mfaq');
    }

    function index(){
        if ($this->session->userdata('akses')=='2') {
            $this->mfaq->refresh_data();
            $id = $this->session->userdata('id_user');

            $x['data'] = $this->mprofil->ambil_data($id);
		    $x['faq']=$this->mfaq->ambil_data_desc();
            $this->load->view('backend/profil',$x);
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function edit_profil(){
        $id=$this->input->post('kode');
        $nama=$this->input->post('nama');
        $username=$this->input->post('user');
        $password=$this->input->post('pass');
        $password2=$this->input->post('pass2');

        if($password <> $password2){
            echo $this->session->set_flashdata('msg','error');
            redirect('backend/profil');
        }else{
            $this->mprofil->edit_data($id,$nama,$username,$password);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/profil'); 
        }
    }

    function reset_password(){
        $id=$this->uri->segment(4);
        $get=$this->mprofil->ambil_username($id);
        if ($get->num_rows()>0) {
            $a=$get->row_array();
            $b=$a['username'];
        }
        $pass=rand(123456,999999);
        $this->mprofil->reset_pass($id,$pass);
        echo $this->session->set_flashdata('msg','show-modal');
        echo $this->session->set_flashdata('uname',$b);
        echo $this->session->set_flashdata('upass',$pass);
        redirect('backend/profil');
    }

    function balas(){
        $id_faq = $this->input->post('id_faq');
        $id_user = $this->input->post('id_user');
        $nama_tamu = $this->input->post('nama_tamu');
        $pertanyaan = $this->input->post('pertanyaan');
        $jawaban = $this->input->post('jawaban');

        $this->mfaq->edit_data($id_faq,$id_user,$nama_tamu,$pertanyaan,$jawaban);
        echo $this->session->set_flashdata('msg','success-jawab');
        redirect('backend/profil');
    }
}