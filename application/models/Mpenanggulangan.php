<?php

class Mpenanggulangan extends CI_Model{

    function ambil_semua_data(){
        $hasil = $this->db->query("SELECT * FROM penanggulangan");
        return $hasil;
    }

    function ambil_data(){
        $hasil = $this->db->query("SELECT id_penanggulangan,id_user,nama,deskripsi,keterangan,jenis FROM penanggulangan");
        return $hasil;
    }

    function tambah_data($id_user,$nama,$deskripsi,$keterangan,$jenis){
        $hasil = $this->db->query("INSERT INTO penanggulangan(id_user,nama,deskripsi,keterangan,jenis) VALUES('$id_user','$nama','$deskripsi','$keterangan','$jenis')");
        return $hasil;
    }

    function edit_data($id,$id_user,$nama,$deskripsi,$keterangan,$jenis){
        $hasil = $this->db->query("UPDATE penanggulangan SET id_user='$id_user',nama='$nama',deskripsi='$deskripsi',keterangan='$keterangan',jenis='$jenis' WHERE id_penanggulangan='$id'");
        return $hasil;
    }

    function hapus_data($id){
        $hasil=$this->db->query("DELETE FROM penanggulangan WHERE id_penanggulangan='$id'");
        return $hasil;
    }

    function ambil_data_limit4(){
        $hasil = $this->db->query("SELECT * FROM penanggulangan LEFT JOIN petugas ON petugas.id_user=penanggulangan.id_user ORDER BY id_penanggulangan DESC LIMIT 4");
        return $hasil;
    }

    function ambil_data_limit8(){
        $hasil = $this->db->query("SELECT * FROM penanggulangan LEFT JOIN petugas ON petugas.id_user=penanggulangan.id_user ORDER BY id_penanggulangan DESC LIMIT 8");
        return $hasil;
    }

    function ambil_detail($id){
        $hasil = $this->db->query("SELECT * FROM penanggulangan LEFT JOIN petugas ON petugas.id_user=penanggulangan.id_user WHERE id_penanggulangan='$id'");
        return $hasil;
    }

    function ambil_data_list($limit,$start){
        $query = $this->db->get('penanggulangan', $limit, $start);
        return $query;
    }
}