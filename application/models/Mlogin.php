<?php

class Mlogin extends CI_Model{
    
    function cekpetugas($u,$p){
        $hasil=$this->db->query("select * from petugas where username='$u'and password=md5('$p')");
        return $hasil;
    }
}