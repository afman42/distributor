<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->library('upload');
		if($this->session->userdata('status') != TRUE)
		{
			return redirect(base_url('index.php/loginadmin'));
		}
	}

	public function index()
	{
		$data['header'] = 'Admin | Beranda';
		$this->load->view('template/header',$data);
		$this->load->view('admin/beranda');
		$this->load->view('template/footer');
	}

	public function akun_donatur()
	{
		$data['header'] = 'Admin | Akun Donatur';
		$data['akun'] = $this->M_admin->tampil_akun_donatur()->result();
		$this->load->view('template/header',$data);
		$this->load->view('admin/donatur',$data);
		$this->load->view('template/footer');
	}

	public function tambah_akun_donatur()
	{
		$post = $this->input->post();
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        if($this->form_validation->run() == FALSE){
			$data['header'] = 'Admin | Akun Donatur';
			$this->load->view('template/header',$data);
			$this->load->view('admin/tambah_akun_donatur');
			$this->load->view('template/footer');
        }else {
            $data = array(
                'username' => $post['username'],
				'nama' => $post['nama'],
				'password' => md5('donatur123'),
				'level' => 2
            );
            $this->M_admin->tambah_akun_donatur($data);
            redirect(base_url('index.php/admin/akun_donatur'));
        }
	}

	public function edit_donatur($id=NULL)
	{
		if (!isset($id)) redirect('admin/donatur');
        $data["akun"] = $this->M_admin->cek_akun_donatur($id)->row();
		if (!$data["akun"]){
			show_404();
		} 
		$this->update_akun_donatur($id);
	}

	protected function update_akun_donatur($id)
	{
		$post = $this->input->post();
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        $data["akun"] = $this->M_admin->cek_akun_donatur($id)->row();
        if($this->form_validation->run() == FALSE){
			$data['header'] = 'Donatur | Edit Donatur';
			$this->load->view('template/header',$data);
			$this->load->view('admin/edit_akun_donatur',$data);
			$this->load->view('template/footer');
        }else {
			$data = array(
				'username' => $post['username'],
				'nama' => $post['nama'],
			);
			$this->M_admin->update_akun_donatur($id,$data);
			redirect(base_url('index.php/admin/akun_donatur'));
		}
	}

	public function hapus_donatur($id=NULL)
	{
		if (!isset($id)) show_404();
        $this->M_admin->hapus_akun_donatur($id);
        redirect(base_url('index.php/admin/akun_donatur'));
	}

	public function donasi()
	{
		$data['header'] = 'Admin | Donasi';
		$data['donasi'] = $this->M_admin->tampil_donasi()->result();
		$this->load->view('template/header',$data);
		$this->load->view('admin/donasi',$data);
		$this->load->view('template/footer');
	}

	public function tambah_donasi()
	{
		$post = $this->input->post();
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        if($this->form_validation->run() == FALSE){
			$data['header'] = 'Admin | Donasi';
			$this->load->view('template/header',$data);
			$this->load->view('admin/tambah_donasi');
			$this->load->view('template/footer');
        }else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 1024;
				// $config['max_width'] = 1024;
				// $config['max_height'] = 768;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')){
				$upload_data = $this->upload->data();
				$featured_image = $upload_data['file_name'];
					// var_dump($featured_image);
				$data = array(
					'id_user' => $_SESSION['id_user'],
					'judul'=> $post['judul'],
					'deskripsi' => $post['deskripsi'],
					'tanggal_donasi' => date('Y-m-d'),
					'foto' => '/uploads/'.$featured_image
				);
				$this->M_admin->tambah_donasi($data);
				redirect(base_url('index.php/admin/donasi'));
			}else{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('admin/tambah_donasi', $error);
			}
        }
	}

	public function edit_donasi($id=NULL)
	{
		if (!isset($id)) redirect('admin/donasi');
        $data["donasi"] = $this->M_admin->cek_donasi($id)->row();
		if (!$data["donasi"]){
			show_404();
		} 
		$this->update_donasi($id);
	}

	protected function update_donasi($id)
	{
		$post = $this->input->post();
		$this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        $data["donasi"] = $this->M_admin->cek_donasi($id)->row();
        if($this->form_validation->run() == FALSE){
			$data['header'] = 'Admin | Edit Donasi';
			$this->load->view('template/header',$data);
			$this->load->view('admin/edit_donasi',$data);
			$this->load->view('template/footer');
        }else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 1024;
				// $config['max_width'] = 1024;
				// $config['max_height'] = 768;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')){
				$upload_data = $this->upload->data();
				$featured_image = $upload_data['file_name'];
					// var_dump($featured_image);
				$data = array(
					'judul'=> $post['judul'],
					'deskripsi' => $post['deskripsi'],
					'foto' => '/uploads/'.$featured_image
				);
				$this->M_admin->update_donasi($id,$data);
				redirect(base_url('index.php/admin/donasi'));
			}elseif (!$this->upload->do_upload('foto')) {
				$data = array(
					'judul'=> $post['judul'],
					'deskripsi' => $post['deskripsi'],
					'foto' => '/uploads/'.$featured_image
				);
				$this->M_admin->update_donasi($id,$data);
				redirect(base_url('index.php/admin/donasi'));
			} else{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('admin/edit_donasi', $error);
			}
		}
	}

	public function hapus_donasi($id=NULL)
	{
		if (!isset($id)) show_404();
		$model = $this->M_admin->cek_donasi($id)->row();
		unlink($model->foto);
        $this->M_admin->hapus_donasi($id);
        redirect(base_url('index.php/admin/donasi'));
	}

	public function profil()
	{		
		$this->form_validation->set_rules('new_password', 'Password', 'required|trim|min_length[3]|matches[repeat_password]', [
            'matches' => 'Password tidak Sama!',
			'min_length' => 'Password terlalu pendek!',
			'required' => "Password kosong, Silakan Diisi"
        ]);
        $this->form_validation->set_rules('repeat_password', 'Password', 'required|trim|min_length[3]|matches[new_password]',[
            'matches' => 'Password Ulang tidak Sama!',
			'min_length' => 'Password Ulang terlalu pendek!',
			'required' => "Password Ulang kosong, Silakan Diisi"
        ]);
        if ($this->form_validation->run() == false){
		$data['header'] = 'Admin | Profil';
        $this->load->view('template/header',$data);
		$this->load->view('admin/profil');
		$this->load->view('template/footer');
        }else{
            $this->update_profil();
        }
	}

	protected function update_profil()
	{
		$password = $this->input->post('new_password');
        $this->db->set('password',md5($password));
        $this->db->where('username', $this->session->userdata('username'));
        $cek = $this->db->update('tb_user');
        if ($cek) {        
            $this->session->set_flashdata('message', '<div class="alert alert-success">Password Telah Diperbaharui</div>');
            redirect('admin/profil');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-alert">Password Gagal Telah Diperbaharui</div>');
            redirect('admin/profil');
        }
	}

	public function berita()
	{
		$data['header'] = 'Admin | Berita';
		$data['berita'] = $this->M_admin->tampil_berita()->result();
		$this->load->view('template/header',$data);
		$this->load->view('admin/berita',$data);
		$this->load->view('template/footer');
	}

	public function tambah_berita()
	{
		$post = $this->input->post();
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        if($this->form_validation->run() == FALSE){
			$data['header'] = 'Admin | Berita';
			$this->load->view('template/header',$data);
			$this->load->view('admin/tambah_berita');
			$this->load->view('template/footer');
        }else {
			$data = array(
				'id_user' => $_SESSION['id_user'],
				'judul'=> $post['judul'],
				'deskripsi' => $post['deskripsi'],
				'tanggal_update' => date('Y-m-d'),
			);
			$this->M_admin->tambah_berita($data);
			redirect(base_url('index.php/admin/berita'));
        }
	}

	public function edit_berita($id=NULL)
	{
		if (!isset($id)) redirect('admin/berita');
        $data["berita"] = $this->M_admin->cek_berita($id)->row();
		if (!$data["berita"]){
			show_404();
		} 
		$this->update_berita($id);
	}

	protected function update_berita($id)
	{
		$post = $this->input->post();
		$this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        $data["berita"] = $this->M_admin->cek_berita($id)->row();
        if($this->form_validation->run() == FALSE){
			$data['header'] = 'Admin | Edit Berita';
			$this->load->view('template/header',$data);
			$this->load->view('admin/edit_berita',$data);
			$this->load->view('template/footer');
        }else {
			$data = array(
				'judul'=> $post['judul'],
				'deskripsi' => $post['deskripsi'],
				'tanggal_update' => date('Y-m-d'),
			);
			$this->M_admin->update_berita($id,$data);
			redirect(base_url('index.php/admin/berita'));
		}
	}

	public function hapus_berita($id=NULL)
	{
		if (!isset($id)) show_404();
		$this->M_admin->hapus_berita($id);
        redirect(base_url('index.php/admin/berita'));
	}
}