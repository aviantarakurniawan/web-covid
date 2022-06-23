<?php

class Petugas extends CI_Controller{

    function __construct(){
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url=base_url('admin');
            redirect($url);
        };
        $this->load->model('mpetugas');
    }

    function index(){
        if ($this->session->userdata('akses')=='1') {
            $x['data'] = $this->mpetugas->ambil_data();
            $this->load->view('backend/petugas',$x);
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function tambah_petugas(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('user');
        $password = $this->input->post('pass');
        $password2 = $this->input->post('pass2');
        $level = $this->input->post('level');

        if ($password <> $password2) {
            echo $this->session->set_flashdata('msg','error');
            redirect('backend/petugas');
        }else{
            $this->mpetugas->tambah_data($nama,$username,$password,$level);
            echo $this->session->set_flashdata('msg','success');
            redirect('backend/petugas'); 
        }
    }

    function edit_petugas(){
        $id=$this->input->post('kode');
        $nama=$this->input->post('nama');
        $username=$this->input->post('user');
        $password=$this->input->post('pass');
        $password2=$this->input->post('pass2');
        $level=$this->input->post('level');

        if($password <> $password2){
            echo $this->session->set_flashdata('msg','error');
            redirect('backend/petugas');
        }else{
            $this->mpetugas->edit_data($id,$nama,$username,$password,$level);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/petugas'); 
        }
    }

    function hapus_petugas(){
        if($this->session->userdata('akses')=='1'){
            $id=$this->input->post('kode');
            $this->mpetugas->hapus_data($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/petugas'); 
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function reset_password(){
        $id=$this->uri->segment(4);
        $get=$this->mpetugas->ambil_username($id);
        if ($get->num_rows()>0) {
            $a=$get->row_array();
            $b=$a['username'];
        }
        $pass=rand(123456,999999);
        $this->mpetugas->reset_pass($id,$pass);
        echo $this->session->set_flashdata('msg','show-modal');
        echo $this->session->set_flashdata('uname',$b);
        echo $this->session->set_flashdata('upass',$pass);
        redirect('backend/petugas');
    }
}