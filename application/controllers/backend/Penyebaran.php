<?php

class Penyebaran extends CI_Controller{

    function __construct(){
        parent::__construct();
            if ($this->session->userdata('masuk') != TRUE) {
                $url=base_url('admin');
                redirect($url);
            };
            $this->load->model('mpenyebaran');
            $this->load->model('mwilayah');
    }

    function index(){
        if ($this->session->userdata('akses')=='1') {
            $x['wil'] = $this->mwilayah->ambil_data();
            $x['data'] = $this->mpenyebaran->ambil_data();
            $this->load->view('backend/penyebaran',$x);
        }elseif ($this->session->userdata('akses')=='2') {
            $x['wil'] = $this->mwilayah->ambil_data();
            $x['data'] = $this->mpenyebaran->ambil_data();
            $this->load->view('backend/penyebaran',$x);
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function tambah_penyebaran(){
        $id_wilayah = $this->input->post('id_wilayah');
        $suspek = $this->input->post('suspek');
        $dirawat = $this->input->post('dirawat');
        $sembuh = $this->input->post('sembuh');
        $meninggal = $this->input->post('meninggal');
        $konfirmasi = $this->input->post('konfirmasi');
        $total = 0;

        $total = $suspek+$dirawat+$sembuh+$meninggal+$konfirmasi;

        $sql = $this->db->query("SELECT id_wilayah FROM penyebaran WHERE id_wilayah='$id_wilayah'");
        $cek_rw = $sql->num_rows();

        if ($cek_rw > 0) {
            echo $this->session->set_flashdata('msg','failed');
            redirect('backend/penyebaran');
        }else {
            $this->mpenyebaran->tambah_data($id_wilayah,$suspek,$dirawat,$sembuh,$meninggal,$konfirmasi,$total);
            echo $this->session->set_flashdata('msg','success');
            redirect('backend/penyebaran');
        }
    }

    function edit_penyebaran(){
        $id = $this->input->post('kode');
        $id_wilayah = $this->input->post('id_wilayah');
        $suspek = $this->input->post('suspek');
        $dirawat = $this->input->post('dirawat');
        $sembuh = $this->input->post('sembuh');
        $meninggal = $this->input->post('meninggal');
        $konfirmasi = $this->input->post('konfirmasi');
        $total = 0;

        $total = $suspek+$dirawat+$sembuh+$meninggal+$konfirmasi;

        $this->mpenyebaran->edit_data($id,$id_wilayah,$suspek,$dirawat,$sembuh,$meninggal,$konfirmasi,$total);
        echo $this->session->set_flashdata('msg','info');
        redirect('backend/penyebaran');
    }

    function hapus_penyebaran(){
        if($this->session->userdata('akses')=='1'){
            $id=$this->input->post('kode');
            $this->mpenyebaran->hapus_data($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/penyebaran'); 
        }elseif ($this->session->userdata('akses')=='2') {
            $id=$this->input->post('kode');
            $this->mpenyebaran->hapus_data($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/penyebaran');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }
}