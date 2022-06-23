<?php

class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('mlogin');
    }

    function index(){
        $this->load->view('backend/login');
    }

    function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cpetugas=$this->mlogin->cekpetugas($u,$p);
        if($cpetugas->num_rows() > 0){
            $this->session->set_userdata('masuk',true);
            $this->session->set_userdata('user',$u);
            $xcpetugas=$cpetugas->row_array();
            if($xcpetugas['level']=='1'){
               $this->session->set_userdata('akses','1');
               $id_user=$xcpetugas['id_user'];
               $user_nama=$xcpetugas['nama'];
               $this->session->set_userdata('id_user',$id_user);
               $this->session->set_userdata('nama',$user_nama);
            }elseif($xcpetugas['level']=='2'){
                $this->session->set_userdata('akses','2');
                $id_user=$xcpetugas['id_user'];
                $user_nama=$xcpetugas['nama'];
                $this->session->set_userdata('id_user',$id_user);
                $this->session->set_userdata('nama',$user_nama);
            }else{
                redirect('admin/gagal_akses');
            }
        }

        if($this->session->userdata('masuk')==TRUE){
            redirect('admin/berhasillogin');
        }else{
            redirect('admin/gagallogin');
        }
    }

    function berhasillogin(){
        redirect('backend/beranda');
    }

    function gagallogin(){
        $url=base_url('admin');

        echo $this->session->set_flashdata('msg','error');
        redirect($url);
    }

    function gagal_akses(){
        $url=base_url('admin');

        echo $this->session->set_flashdata('msg','info-akses');
        redirect($url);
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('admin');
        redirect($url);
    }

}