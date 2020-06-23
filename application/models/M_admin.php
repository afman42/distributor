<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function cek_login($data)
    {
        return $this->db->get_where('tb_user',$data);   
    }

    public function tambah_akun_donatur($data)
    {
        return $this->db->insert('tb_user', $data);
    }

    public function tampil_akun_donatur()
    {
        $this->db->where('level',2);
        return $this->db->get('tb_user');
    }

    public function tampil_donasi()
    {
        return $this->db->get('tb_donasi');
    }

    public function cek_akun_donatur($id)
    {
        return $this->db->get_where('tb_user',['id_user' => $id]);
    }

    public function update_akun_donatur($id,$data)
    {
        $this->db->where('id_user',$id);
        return $this->db->update('tb_user',$data);
    }

    public function hapus_akun_donatur($id)
    {
        $this->db->where('id_user',$id);
        $this->db->delete('tb_user');
    }

    public function tambah_donasi($data)
    {
        return $this->db->insert('tb_donasi',$data);
    }

    public function cek_donasi($id)
    {
        return $this->db->get_where('tb_donasi',['id_donasi' => $id]);
    }

    public function update_donasi($id,$data)
    {
        $this->db->where('id_donasi',$id);
        return $this->db->update('tb_donasi',$data);
    }

    public function hapus_donasi($id)
    {
        $this->db->where('id_donasi',$id);
        $this->db->delete('tb_donasi');
    }

    public function tampil_berita()
    {
        return $this->db->get('tb_berita');
    }

    public function tambah_berita($data)
    {
        return $this->db->insert('tb_berita',$data);
    }

    public function cek_berita($id)
    {
        return $this->db->get_where('tb_berita',['id_berita' => $id]);
    }

    public function update_berita($id,$data)
    {
        $this->db->where('id_berita',$id);
        return $this->db->update('tb_berita',$data);
    }

    public function hapus_berita($id)
    {
        $this->db->where('id_berita',$id);
        $this->db->delete('tb_berita');
    }
}