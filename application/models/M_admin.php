<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function cek_login($data)
    {
        return $this->db->get_where('tb_user',$data);   
    }

    public function tambah_akun_donatur($data)
    {
        return $this->db->insert('tb_donatur', $data);
    }

    public function tampil_akun_donatur()
    {
        return $this->db->get('tb_donatur');
    }

    public function tampil_donasi()
    {
        return $this->db->get('tb_donasi');
    }

    public function cek_akun_donatur($id)
    {
        return $this->db->get_where('tb_donatur',['id_donatur' => $id]);
    }

    public function update_akun_donatur($id,$data)
    {
        $this->db->where('id_donatur',$id);
        return $this->db->update('tb_donatur',$data);
    }

    public function hapus_akun_donatur($id)
    {
        $this->db->where('id_donatur',$id);
        $this->db->delete('tb_donatur');
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
        return $this->db->get('tb_berita_acara');
    }

    public function tambah_berita($data)
    {
        return $this->db->insert('tb_berita_acara',$data);
    }

    public function cek_berita($id)
    {
        return $this->db->get_where('tb_berita_acara',['id_berita_acara' => $id]);
    }

    public function update_berita($id,$data)
    {
        $this->db->where('id_berita_acara',$id);
        return $this->db->update('tb_berita_acara',$data);
    }

    public function hapus_berita($id)
    {
        $this->db->where('id_berita_acara',$id);
        $this->db->delete('tb_berita_acara');
    }

    public function tampil_bencana()
    {
        return $this->db->get('tb_jenis_bencana');
    }

    public function tambah_bencana($data)
    {
        return $this->db->insert('tb_jenis_bencana',$data);
    }

    public function cek_bencana($id)
    {
        return $this->db->get_where('tb_jenis_bencana',['id_jenis_bencana' => $id]);
    }

    public function update_bencana($id,$data)
    {
        $this->db->where('id_jenis_bencana',$id);
        return $this->db->update('tb_jenis_bencana',$data);
    }

    public function hapus_bencana($id)
    {
        $this->db->where('id_jenis_bencana',$id);
        $this->db->delete('tb_jenis_bencana');
    }
}