<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('M_utama');
		$this->load->helper('text');
	}
	
	public function donasi($id=NULL)
	{
		if (!isset($id)) redirect('welcome/index');
		$data["donasi"] = $this->M_utama->cek_donasi($id)->row();
		$data['masukan'] = $this->M_utama->get_masukan_donasi($id)->result();
		if (!$data["donasi"]){
			show_404();
		}
		$this->tambah_donasi($id);
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

	public function lihat_berita($id=NULL)
	{
		if (!isset($id)) redirect('welcome/berita');
		$data["berita"] = $this->M_utama->cek_berita($id)->row();
		if (!$data["berita"]){
			show_404();
		}
		$data['header'] = 'Donasi | Berita';
		$this->load->view('utama/lihat_berita',$data);
	}

	public function berita()
	{	
		$data['bencana'] = $this->M_utama->tampil_jenis_bencana()->result();
		$config['base_url'] = site_url('welcome/berita');
		$config['total_rows'] = $this->db->count_all('tb_berita_acara');
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['data'] = $this->M_utama->get_berita_list($config["per_page"], $data['page']);
		$data['header'] = 'Berita Donasi';
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('utama/berita',$data);
	}

	protected function tambah_donasi($id)
	{
		$post = $this->input->post();
		$this->form_validation->set_rules('nama_barang', 'Barang', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        if($this->form_validation->run() == FALSE){
			$data["donasi"] = $this->M_utama->cek_donasi($id)->row();
			$data['masukan'] = $this->M_utama->get_masukan_donasi($id)->result();
			$data['header'] = 'Donasi | Utama';
			$this->load->view('utama/donasi',$data);
        }else {
			$data = array(
				'nama_barang'=> $post['nama_barang'],
				'jumlah'=> $post['jumlah'],
				'keterangan'=> $post['keterangan'],
				'id_donasi' => $id,
				'id_donatur' => $_SESSION['id_donatur']
			);
			$this->M_utama->tambah_masukan_donasi($data);
			redirect(base_url('index.php/welcome/donasi/'.$id));
		}
	}

	public function index(){
		$config['base_url'] = site_url('welcome/index');
		$config['total_rows'] = $this->db->count_all('tb_donasi');
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['data'] = $this->M_utama->get_donasi_list($config["per_page"], $data['page']);
		$data['header'] = 'Donasi';
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('utama/index',$data);
	}

	public function login()
	{
		$post = $this->input->post();
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('nohp', 'No Handphone', 'trim|required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('trim','%s diisi tanpa jarak');
		$username = $this->input->post('email',TRUE);
		$password = $this->input->post('nohp',TRUE);
		$where = array(
			'email' => $username,
			'nohp' => $password
		);
		$cek = $this->M_utama->cek_login($where)->num_rows();
		$nampil = $this->M_utama->cek_login($where)->row();
		$url_kembali = base_url('index.php/welcome/login');
        $url_login = base_url('index.php/welcome/index');
		if($this->form_validation->run() == FALSE){
			$data['header'] = 'Donasi | Masuk';
			$this->load->view('utama/login',$data);
        }else {
			// var_dump($nampil);
			if($cek > 0){
                // $_SESSION['username'] = $nampil->username;
                $_SESSION['id_donatur'] = $nampil->id_donatur;
                $_SESSION['status'] = TRUE;
                $_SESSION['nama'] = $nampil->nama;
                echo "<script>alert('Berhasil Login'); window.location='$url_login'</script>";
            }else{
                echo "<script>alert('Gagal Login'); window.location='$url_kembali'</script>";
            }
		}
	}

	public function daftar()
	{
		$post = $this->input->post();
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('nohp', 'No Handphone', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('jenis_donatur', 'Jenis Donatur', 'trim|required');
		// $this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'trim|required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
		$this->form_validation->set_message('trim','%s diisi tanpa jarak');
		$email = $this->input->post('email',TRUE);
		$nohp = $this->input->post('nohp',TRUE);
		$nama = $this->input->post('nama',TRUE);
		$alamat = $this->input->post('alamat',TRUE);
		$jenis = $this->input->post('jenis_donatur',TRUE);
		$gedung = $this->input->post('nama_gedung',TRUE);
		$where = array(
			'email' => $email,
			'nohp' => $nohp
		);
		$data = array(
			'email' => $email,
			'nohp' => $nohp,
			'nama' => $nama,
			'alamat' => $alamat,
			'jenis_donatur' => $jenis,
			'nama_gedung' => $gedung,
		);
		$url_kembali = base_url('index.php/welcome/login');
        $url_login = base_url('index.php/welcome/index');
		if($this->form_validation->run() == FALSE){
			$data['header'] = 'Donasi | Masuk';
			$this->load->view('utama/daftar',$data);
        }else {
			$this->M_utama->daftar_masuk_donatur($data);
			$cek = $this->M_utama->cek_login($where)->num_rows();
			$nampil = $this->M_utama->cek_login($where)->row();
			if($cek > 0){
                // $_SESSION['username'] = $nampil->username;
                $_SESSION['id_donatur'] = $nampil->id_donatur;
                $_SESSION['status'] = TRUE;
                $_SESSION['nama'] = $nampil->nama;
				// $_SESSION['level'] = $nampil->level;
                echo "<script>alert('Berhasil Daftar'); window.location='$url_login'</script>";
            }else{
                echo "<script>alert('Gagal Daftar'); window.location='$url_kembali'</script>";
            }
		}
	}

	public function jenis_bencana()
	{
		$bencana = $this->input->get('jenis_bencana');
		$data['berita'] = $this->M_utama->get_jenis_bencana($bencana)->result();
		$data['bencana'] = $this->M_utama->tampil_jenis_bencana()->result();
		$this->load->view('utama/jenis_bencana',$data);
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('index.php/welcome'));
    }
}
