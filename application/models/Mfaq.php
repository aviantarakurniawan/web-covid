<?php

class Mfaq extends CI_Model{

    function ambil_data(){
        $hasil = $this->db->query("SELECT * FROM faq LEFT JOIN petugas ON faq.id_user=petugas.id_user");
        return $hasil;
    }

    function ambil_semua_data(){
        $hasil = $this->db->query("SELECT * FROM faq");
        return $hasil;
    }

    function ambil_data_desc(){
        $hasil = $this->db->query("SELECT * FROM faq LEFT JOIN petugas ON faq.id_user=petugas.id_user WHERE jawaban='' ORDER BY tanggal DESC LIMIT 5");
        return $hasil;
    }

    function edit_data($id_faq,$id_user,$nama_tamu,$pertanyaan,$jawaban){
        $hasil = $this->db->query("UPDATE faq SET id_user='$id_user',nama_tamu='$nama_tamu',pertanyaan='$pertanyaan',jawaban='$jawaban' WHERE id_faq='$id_faq'");
        return $hasil;
    }

    function hapus_data($id_faq){
        $hasil = $this->db->query("DELETE FROM faq WHERE id_faq='$id_faq'");
        return $hasil;
    }

    function refresh_data(){
        $hasil = $this->db->query("UPDATE faq SET status='0'");
        return $hasil;
    }

    function kirim_data($nama_tamu,$pertanyaan){
        $hasil = $this->db->query("INSERT INTO faq(nama_tamu,pertanyaan) VALUES('$nama_tamu','$pertanyaan')");
        return $hasil;
    }
    
    function ambil_data_terjawab(){
        $hasil = $this->db->query("SELECT * FROM faq LEFT JOIN petugas ON faq.id_user=petugas.id_user WHERE jawaban NOT IN('')");
        return $hasil;
    }
}