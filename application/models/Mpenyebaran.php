<?php

class Mpenyebaran extends CI_Model{

    function ambil_semua_data(){
        $hasil = $this->db->query("SELECT * FROM penyebaran");
        return $hasil;
    }

    function ambil_semua_data_beranda(){
        $hasil = $this->db->query("SELECT * FROM penyebaran LEFT JOIN wilayah ON wilayah.id_wilayah=penyebaran.id_wilayah ORDER BY wilayah.rw ASC LIMIT 4");
        return $hasil;
    }

    function ambil_data(){
        $hasil = $this->db->query("SELECT * FROM penyebaran LEFT JOIN wilayah ON wilayah.id_wilayah=penyebaran.id_wilayah");
        return $hasil;
    }

    function tambah_data($id_wilayah,$suspek,$dirawat,$sembuh,$meninggal,$konfirmasi,$total){
        $hasil = $this->db->query("INSERT INTO penyebaran(id_wilayah,suspek,dirawat,sembuh,meninggal,total,konfirmasi) VALUES('$id_wilayah','$suspek','$dirawat','$sembuh','$meninggal','$total','$konfirmasi')");
        return $hasil;
    }

    function edit_data($id,$id_wilayah,$suspek,$dirawat,$sembuh,$meninggal,$konfirmasi,$total){
        $hasil = $this->db->query("UPDATE penyebaran SET id_wilayah='$id_wilayah',suspek='$suspek',dirawat='$dirawat',sembuh='$sembuh',meninggal='$meninggal',total='$total',konfirmasi='$konfirmasi' WHERE id_penyebaran='$id'");
        return $hasil;
    }

    function hapus_data($id){
        $hasil = $this->db->query("DELETE FROM penyebaran WHERE id_penyebaran='$id'");
        return $hasil;
    }

    function ambil_data_by_wilayah(){
        $hasil = $this->db->query("SELECT * FROM penyebaran LEFT JOIN wilayah ON wilayah.id_wilayah=penyebaran.id_wilayah");
        return $hasil;
    }
}