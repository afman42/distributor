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
        // return $this->db->get_where('tb_berita_acara',['id_berita_acara' => $id]);
        $this->db->select('*');
        $this->db->where('tb_berita_acara.id_berita_acara',$id);
        $this->db->from('tb_berita_acara');
        $this->db->join('tb_jenis_bencana', 'tb_jenis_bencana.id_jenis_bencana = tb_berita_acara.jenis_bencana');
        return $this->db->get();
    }

    function get_masukan_donasi($id)
    {
        $this->db->select('*');
        $this->db->where('tb_detail_donasi.id_donasi',$id);
        $this->db->from('tb_donasi');
        $this->db->join('tb_detail_donasi', 'tb_detail_donasi.id_donasi = tb_donasi.id_donasi');
        $this->db->join('tb_donatur', 'tb_donatur.id_donatur = tb_detail_donasi.id_donatur');
        return $this->db->get();
    }

    function tambah_masukan_donasi($data)
    {
        return $this->db->insert('tb_detail_donasi',$data);
    }

    function cek_login($data)
    {
        return $this->db->get_where('tb_donatur',$data);
    }

    function daftar_masuk_donatur($data)
    {
        return $this->db->insert('tb_donatur',$data);
    }

    function get_berita_list($limit, $start){
        $query = $this->db->get('tb_berita_acara', $limit, $start);
        return $query;
    }
}