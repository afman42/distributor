<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_utama extends CI_Model {

    function get_donasi_list($limit, $start){
        $query = $this->db->get('tb_donasi', $limit, $start);
        return $query;
    }

    function cek_donasi($id)
    {
        return $this->db->get_where('tb_donasi',['id_donasi' => $id]);
    }

    function cek_berita($id)
    {
        return $this->db->get_where('tb_berita',['id_berita' => $id]);
    }

    function get_masukan_donasi($id)
    {
        $this->db->select('*');
        $this->db->where('tb_masukan_donasi.id_donasi',$id);
        $this->db->from('tb_masukan_donasi');
        $this->db->join('tb_user', 'tb_user.id_user = tb_masukan_donasi.id_user');
        return $this->db->get();
    }

    function tambah_masukan_donasi($data)
    {
        return $this->db->insert('tb_masukan_donasi',$data);
    }

    function cek_login($data)
    {
        return $this->db->get_where('tb_user',$data);
    }

    function daftar_masuk_donatur($data)
    {
        return $this->db->insert('tb_user',$data);
    }

    function get_berita_list($limit, $start){
        $query = $this->db->get('tb_berita', $limit, $start);
        return $query;
    }
}