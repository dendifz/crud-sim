<?php

class matakuliah extends Controller {
	
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
		$data['title'] = 'Data Mata Kuliah';
		$data['matakuliah'] = $this->model('MatakuliahModel')->getAllMatakuliah(); 
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('matakuliah/index', $data);
		$this->view('templates/footer');
	}

    public function cari()
	{
		$data['title'] = 'Data Mata Kuliah';
		$data['matakuliah'] = $this->model('MatakuliahModel')->cariMatakuliah();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('matakuliah/index', $data);
		$this->view('templates/footer');
	}


	public function edit($id){

		$data['title'] = 'Detail Mata Kuliah';
		$data['matakuliah'] = $this->model('MatakuliahModel')->getMatakuliahById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('matakuliah/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Mata Kuliah';			
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('matakuliah/create', $data);
		$this->view('templates/footer');
	}

	public function simpanMatakuliah(){		

		if( $this->model('MatakuliahModel')->tambahMatakuliah($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/matakuliah');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/matakuliah');
			exit;	
		}
	}

	public function updateMatakuliah(){	
		if( $this->model('MatakuliahModel')->updateDataMatakuliah($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/matakuliah');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/matakuliah');
			exit;	
		}
	}

	public function hapus($id){
		$total_id = implode('',$this->model('MatakuliahModel')->cekMatakuliah($id));
		if( $total_id > 0 ) {
			Flasher::setMessage('Gagal','dihapus karena data dipakai di jadwal dengan jumlah ' .$total_id ,'danger');
			header('location: '. base_url . '/matakuliah');
			exit;			
		}else if( $this->model('MatakuliahModel')->deleteMatakuliah($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/matakuliah');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/matakuliah');
			exit;	
		}
	}
}