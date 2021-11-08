<?php

class Jamkuliah extends Controller {
	
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
		$data['title'] = 'Data Jam Kuliah';
		$data['Jamkuliah'] = $this->model('JamkuliahModel')->getAllJamkuliah(); 
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jamkuliah/index', $data);
		$this->view('templates/footer');
	}


	public function edit($id){

		$data['title'] = 'Detail Jam Kuliah';
		$data['Jamkuliah'] = $this->model('JamkuliahModel')->getJamkuliahById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jamkuliah/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Jam Kuliah';			
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jamkuliah/create', $data);
		$this->view('templates/footer');
	}

	public function simpanJamkuliah(){		

		if( $this->model('JamkuliahModel')->tambahJamkuliah($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/Jamkuliah');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/Jamkuliah');
			exit;	
		}
	}

	public function updateJamkuliah(){	
		if( $this->model('JamkuliahModel')->updateDataJamkuliah($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/Jamkuliah');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/Jamkuliah');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('JamkuliahModel')->deleteJamkuliah($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/Jamkuliah');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/Jamkuliah');
			exit;	
		}
	}
}