<?php

class Penanggulangan extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('mpenanggulangan');
    }

    function index(){
        //konfigurasi pagination
        $config['base_url'] = site_url('penanggulangan/index'); //site url
        $config['total_rows'] = $this->db->count_all('penanggulangan'); //total row
        $config['per_page'] = 9;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'Pertama';
        $config['last_link']        = 'Terakhir';
        $config['next_link']        = 'Selanjutnya';
        $config['prev_link']        = 'Sebelumnya';
        $config['full_tag_open']    = '<nav aria-label="Page Navigation"><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active" aria-current="page"><a class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></a></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '</span>Selanjutnya</li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link" tabindex="-1">';
        $config['prev_tagl_close']  = '</span>Sebelumnya</li>';
        $config['first_tag_open']   = '<li class="page-item"><a class="page-link">';
        $config['first_tagl_close'] = '</a></li>';
        $config['last_tag_open']    = '<li class="page-item"><a class="page-link">';
        $config['last_tagl_close']  = '</a></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function ambil_data_list yang ada pada model penanggulangan. 
        $data['data'] = $this->mpenanggulangan->ambil_data_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
 
        //load view mahasiswa view
        $this->load->view('frontend/penanggulangan',$data);
    }

    function detail($id){
        $data['detail'] = $this->mpenanggulangan->ambil_detail($id);
        $data['penanggulangan'] = $this->mpenanggulangan->ambil_data_limit8();

        $this->load->view('frontend/penanggulangan_detail',$data);
    }
}