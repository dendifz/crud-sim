<?php

class Pendidikan extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
	} 
	public function index()
{
		$data['title'] = 'Data Pendidikan';
		$data['Pendidikan'] = $this->model('PendidikanModel')->getAllPendidikan();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('Pendidikan/index', $data);
		$this->view('templates/footer');
	}
	
	public function edit($id)
	{
		$data['title'] = 'Detail Pendidikan';
		$data['Pendidikan'] = $this->model('PendidikanModel')->getPendidikanById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('Pendidikan/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah() 
	{
		$data['title'] = 'Tambah Pendidikan';		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('Pendidikan/create', $data);
		$this->view('templates/footer');
	}

	public function simpanPendidikan()
	{		
		if( $this->model('PendidikanModel')->tambahPendidikan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/Pendidikan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/Pendidikan');
			exit;	
		}
	}

	public function updatePendidikan(){	
		if( $this->model('PendidikanModel')->updateDataPendidikan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/Pendidikan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/Pendidikan');
			exit;	
		}
	}

	public function hapus($id){
		$total_id = implode('',$this->model('PendidikanModel')->cekPendidikan($id));
		if( $total_id > 0 ) {
			Flasher::setMessage('Gagal','dihapus karena data dipakai di dosen dengan jumlah ' .$total_id ,'danger');
			header('location: '. base_url . '/Pendidikan');
			exit;			
		}else if( $this->model('PendidikanModel')->deletePendidikan($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/Pendidikan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/Pendidikan');
			exit;	
		}
	}
}