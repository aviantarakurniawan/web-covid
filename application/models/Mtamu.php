<?php

class Mtamu extends CI_Model{

    function ambil_semua_data(){
        $hasil = $this->db->query("SELECT * FROM buku_tamu");
        return $hasil;
    }

    function ambil_data(){
        $hasil = $this->db->query("SELECT id_tamu,tanggal,nama_tamu,dari,jabatan,tujuan,saran FROM buku_tamu");
        return $hasil;
    }

    function hapus_data($id){
        $hasil=$this->db->query("delete from buku_tamu where id_tamu='$id'");
        return $hasil;
    }

    function tambah_data($nama_tamu,$jabatan,$dari,$tujuan,$saran){
        $hasil = $this->db->query("INSERT INTO buku_tamu(nama_tamu,jabatan,dari,tujuan,saran) VALUES('$nama_tamu','$jabatan','$dari','$tujuan','$saran')");
        return $hasil;
    }
}