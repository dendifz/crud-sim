<?php

class ruangan extends Controller {
	
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
		$data['title'] = 'Data Ruangan Kuliah';
		$data['ruangan'] = $this->model('RuanganModel')->getAllRuangan(); 
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('ruangan/index', $data);
		$this->view('templates/footer');
	}


	public function edit($id){

		$data['title'] = 'Detail Ruangan Kuliah';
		$data['ruangan'] = $this->model('RuanganModel')->getRuanganById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('ruangan/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Ruangan Kuliah';			
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('ruangan/create', $data);
		$this->view('templates/footer');
	}

	public function simpanRuangan(){		

		if( $this->model('RuanganModel')->tambahRuangan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/ruangan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/ruangan');
			exit;	
		}
	}

	public function updateRuangan(){	
		if( $this->model('RuanganModel')->updateDataRuangan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/ruangan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/ruangan');
			exit;	
		}
	}

	public function hapus($id){
		$total_id = implode('',$this->model('RuanganModel')->cekRuangan($id));
		if( $total_id > 0 ) {
			Flasher::setMessage('Gagal','dihapus karena data dipakai di jadwal dengan jumlah ' .$total_id ,'danger');
			header('location: '. base_url . '/ruangan');
			exit;			
		}else if( $this->model('RuanganModel')->deleteRuangan($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/ruangan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/ruangan');
			exit;	
		}
	}
}