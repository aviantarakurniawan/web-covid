<?php

class Mpetugas extends CI_Model{

    function ambil_semua_data(){
        $hasil = $this->db->query("SELECT * FROM petugas");
        return $hasil;
    }

    function ambil_data(){
        $hasil = $this->db->query("SELECT id_user,nama,username,password,IF(level='1','Admin','Petugas') AS level FROM petugas");
        return $hasil;
    }

    function tambah_data($nama,$username,$password,$level){
        $hasil=$this->db->query("insert into petugas(nama,username,password,level)values('$nama','$username',md5('$password'),'$level')");
        return $hasil;
    }

    function edit_data($id,$nama,$username,$password,$level){
        $hasil=$this->db->query("update petugas set nama='$nama',username='$username',password=md5('$password'),level='$level' where id_user='$id'");
        return $hasil;
    }

    function hapus_data($id){
        $hasil=$this->db->query("delete from petugas where id_user='$id'");
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
}