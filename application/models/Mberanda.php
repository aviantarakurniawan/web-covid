<?php 

class Mberanda extends CI_Model{

    function total_suspek(){
        $this->db->select('SUM(suspek) as total_suspek');
        $this->db->from('penyebaran');
        return $this->db->get()->row()->total_suspek;
    }

    function total_sembuh(){
        $this->db->select('SUM(sembuh) as total_sembuh');
        $this->db->from('penyebaran');
        return $this->db->get()->row()->total_sembuh;
    }

    function total_dirawat(){
        $this->db->select('SUM(dirawat) as total_dirawat');
        $this->db->from('penyebaran');
        return $this->db->get()->row()->total_dirawat;
    }

    function total_meninggal(){
        $this->db->select('SUM(meninggal) as total_meninggal');
        $this->db->from('penyebaran');
        return $this->db->get()->row()->total_meninggal;
    }

    function subtotal(){
        $this->db->select('SUM(total) as subtotal');
        $this->db->from('penyebaran');
        return $this->db->get()->row()->subtotal;
    }

    function total_konfirmasi(){
        $this->db->select('SUM(konfirmasi) as total_konfirmasi');
        $this->db->from('penyebaran');
        return $this->db->get()->row()->total_konfirmasi;
    }
}