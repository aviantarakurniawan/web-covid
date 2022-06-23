<?php

class Mwilayah extends CI_Model{

    function ambil_semua_data(){
        $hasil = $this->db->query("SELECT * FROM wilayah");
        return $hasil;
    }

    function ambil_data(){
        $hasil = $this->db->query("SELECT id_wilayah,rw,penduduk FROM wilayah");
        return $hasil;
    }
    
    function tambah_data($rw,$penduduk){
        $hasil = $this->db->query("INSERT INTO wilayah(rw,penduduk) VALUES('$rw','$penduduk')");
        return $hasil;
    }

    function edit_data($id,$rw,$penduduk){
        $hasil = $this->db->query("UPDATE wilayah SET rw='$rw',penduduk='$penduduk'");
        return $hasil;
    }

    function hapus_data($id){
        $hasil=$this->db->query("DELETE FROM wilayah WHERE id_wilayah='$id'");
        return $hasil;
    }

    function ambil_data_by_wilayah(){
        $hasil = $this->db->query("SELECT * FROM wilayah LEFT JOIN penyebaran ON penyebaran.id_wilayah=wilayah.id_wilayah ORDER BY rw ASC");
        return $hasil;
    }
}