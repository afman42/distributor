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
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nohp', 'No Handphone', 'required');
        $this->form_validation->set_rules('jenis_donatur', 'Jenis Donatur', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        if($this->form_validation->run() == FALSE){
			$data['header'] = 'Admin | Akun Donatur';
			$this->load->view('template/header',$data);
			$this->load->view('admin/tambah_akun_donatur');
			$this->load->view('template/footer');
        }else {
            $data = array(
                'jenis_donatur' => $post['jenis_donatur'],
				'nama' => $post['nama'],
				'email' => $post['email'],
				'alamat' => $post['alamat'],
				'nohp' => $post['nohp'],
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
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nohp', 'No Handphone', 'required');
        $this->form_validation->set_rules('jenis_donatur', 'Jenis Donatur', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        $data["akun"] = $this->M_admin->cek_akun_donatur($id)->row();
        if($this->form_validation->run() == FALSE){
			$data['header'] = 'Donatur | Edit Donatur';
			$this->load->view('template/header',$data);
			$this->load->view('admin/edit_akun_donatur',$data);
			$this->load->view('template/footer');
        }else {
			$data = array(
				'jenis_donatur' => $post['jenis_donatur'],
				'nama' => $post['nama'],
				'email' => $post['email'],
				'alamat' => $post['alamat'],
				'nohp' => $post['nohp'],
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
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
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
					'keterangan'=> $post['keterangan'],
					'tanggal' => date('Y-m-d'),
					'foto' => 'uploads/'.$featured_image
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
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
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
					'keterangan'=> $post['keterangan'],
					'tanggal' => date('Y-m-d'),
					'foto' => 'uploads/'.$featured_image
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

	public function cetak_pdf($id=NULL)
	{
		$this->load->library('pdfgenerator');
		$this->load->model('M_utama');
		$data['masukan'] = $this->M_utama->get_masukan_donasi($id)->result();
		$data['donatur'] = $this->M_utama->get_donatur($id)->row();
	    $html = $this->load->view('admin/donasi_pdf', $data, true);
	    
	    $this->pdfgenerator->generate($html,'donasi');
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
		$data['header'] = 'Admin | Tambah Berita';
		$data['bencana'] = $this->M_admin->tampil_bencana()->result();
		$this->load->view('template/header',$data);
		$this->load->view('admin/tambah_berita',$data);
		$this->load->view('template/footer');
	}

	public function tambah_beritas()
	{
		$post = $this->input->post();

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 1024;
				// $config['max_width'] = 1024;
				// $config['max_height'] = 768;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')){
				$upload_data = $this->upload->data();
				$featured_image = $upload_data['file_name'];
			// 		// var_dump($featured_image);
			$data = array(
				'judul'=> $post['judul'],
				'tempat' => $post['tempat'],
				'waktu' => date('Y-m-d'),
				'jenis_bencana' => $post['jenis_bencana'],
				'berita' => $post['berita'],
				'id_user' => $_SESSION['id_user'],
				'foto' => 'uploads/'.$featured_image
			);
			$paket = $this->M_admin->tambah_berita($data);
			$url = site_url('admin/berita');
			if ($paket) {
				echo "<script>alert('Berhasil Ditambah');location.href='".$url."'</script>";
			}else{
				echo "<script>alert('Gagal Ditambah');location.href='".$url."'</script>";
			}	
		}else{
			$error = array('error' => $this->upload->display_errors());
			$data['bencana'] = $this->M_admin->tampil_bencana()->result();
			$data['header'] = 'Admin | Tambah Berita';
			$this->load->view('template/header',$data);
			$this->load->view('admin/tambah_berita',$error);
			$this->load->view('template/footer');
		}
	}
	
	public function edit_berita($id = null)
    {
        if (!isset($id)) redirect('admin/berita');
        $data["berita"] = $this->M_admin->cek_berita($id)->row();
		if (!$data["berita"]) show_404();
		$data['bencana'] = $this->M_admin->tampil_bencana()->result();
		$data['header'] = 'Admin | Edit Berita';
		$this->load->view('template/header',$data);
		$this->load->view("admin/edit_berita", $data);
		$this->load->view('template/footer');
    }

    public function update_berita($id='',$data='')
    {
        $post = $this->input->post();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 1024;
        // $config['max_width'] = 1024;
        // $config['max_height'] = 768;
		$this->upload->initialize($config);
        if ($this->upload->do_upload('foto')){
            $upload_data = $this->upload->data();
            $featured_image = $upload_data['file_name'];
            $data = array(
				'judul'=> $post['judul'],
				'tempat' => $post['tempat'],
				'waktu' => date('Y-m-d'),
				'jenis_bencana' => $post['jenis_bencana'],
				'berita' => $post['berita'],
				'id_user' => $_SESSION['id_user'],
				'foto' => 'uploads/'.$featured_image
			);
            $this->M_admin->update_berita($post['id_berita'],$data);
            redirect(base_url('index.php/admin/berita'));
        }else if (!$this->upload->do_upload('gambar')){
            $data = array(
				'judul'=> $post['judul'],
				'tempat' => $post['tempat'],
				'waktu' => date('Y-m-d'),
				'jenis_bencana' => $post['jenis_bencana'],
				'berita' => $post['berita'],
				'id_user' => $_SESSION['id_user']
			);
            $this->M_admin->update_berita($post['id_berita'],$data);
            redirect(base_url('index.php/admin/berita'));
        }else{
			$error = array('error' => $this->upload->display_errors());
			$data['bencana'] = $this->M_admin->tampil_bencana()->result();
			$data['header'] = 'Admin | Tambah Berita';
			$this->load->view('template/header',$data);
			$this->load->view('admin/tambah_berita',$error);
			$this->load->view('template/footer');
		}
    }

    public function hapus_berita($id=null)
    {
		if (!isset($id)) show_404();
		$data = $this->M_admin->cek_berita($id)->row();
        $this->M_admin->hapus_berita($id);
		unlink($data->foto);
		redirect(base_url('index.php/admin/berita'));
    }

	public function bencana()
	{
		$data['header'] = 'Admin | Bencana';
		$data['bencana'] = $this->M_admin->tampil_bencana()->result();
		$this->load->view('template/header',$data);
		$this->load->view('admin/bencana',$data);
		$this->load->view('template/footer');
	}

	public function tambah_bencana()
	{
		$post = $this->input->post();
        $this->form_validation->set_rules('nama_bencana', 'Nama Bencana', 'required');
        $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        if($this->form_validation->run() == FALSE){
			$data['header'] = 'Admin | Bencana';
			$this->load->view('template/header',$data);
			$this->load->view('admin/tambah_bencana');
			$this->load->view('template/footer');
        }else {
			$data = array(
				'nama_bencana'=> $post['nama_bencana'],
			);
			$this->M_admin->tambah_bencana($data);
			redirect(base_url('index.php/admin/bencana'));
        }
	}

	public function edit_bencana($id=NULL)
	{
		if (!isset($id)) redirect('admin/bencana');
        $data["bencana"] = $this->M_admin->cek_bencana($id)->row();
		if (!$data["bencana"]){
			show_404();
		} 
		$this->update_bencana($id);
	}

	protected function update_bencana($id)
	{
		$post = $this->input->post();
        $this->form_validation->set_rules('nama_bencana', 'Nama Bencana', 'required');
        $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        $data["bencana"] = $this->M_admin->cek_bencana($id)->row();
        if($this->form_validation->run() == FALSE){
			$data['header'] = 'Admin | Edit Bencana';
			$this->load->view('template/header',$data);
			$this->load->view('admin/edit_bencana',$data);
			$this->load->view('template/footer');
        }else {
			$data = array(
				'nama_bencana' => $post['nama_bencana'],
			);
			$this->M_admin->update_bencana($id,$data);
			redirect(base_url('index.php/admin/bencana'));
		}
	}

	public function hapus_bencana($id=NULL)
	{
		if (!isset($id)) show_404();
		$this->M_admin->hapus_bencana($id);
        redirect(base_url('index.php/admin/bencana'));
	}
}