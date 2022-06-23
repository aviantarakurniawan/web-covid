<?php

class Mprofil extends CI_Model{

    function ambil_data($id){
        $hasil = $this->db->query("SELECT * FROM petugas WHERE id_user='$id'");
        return $hasil;
    }

    function edit_data($id,$nama,$username,$password){
        $hasil=$this->db->query("update petugas set nama='$nama',username='$username',password=md5('$password') where id_user='$id'");
        return $hasil;
    }

    function ambil_username($id){
        $hasil=$this->db->query("select * from petugas where id_user='$id'");
        return $hasil;
    }

    function reset_pass($id,$pass){
        $hasil=$this->db->query("update petugas set password=md5('$pass') where id_user='$id'");
        return $hasil;
    }

    function jawab_faq($id_faq,$nama,$jawaban){
        $hasil = $this->db->query("UPDATE faq SET nama='$nama',jawaban='$jawaban' WHERE id_faq='$id_faq'");
        return $hasil;
    }
}