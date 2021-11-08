<?php

class Home extends Controller {
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
		$data['title'] = 'Halaman Home';
		$data['jmljadwal'] = $this->model('HomeModel')->getJumlahJadwal(); 
		$data['jmlkelas'] = $this->model('HomeModel')->getJumlahKelas();
		$data['jmldosen'] = $this->model('HomeModel')->getJumlahDosen();  
		$data['jmluser'] = $this->model('HomeModel')->getJumlahUser(); 

		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}