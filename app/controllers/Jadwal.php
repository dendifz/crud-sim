<?php

class jadwal extends Controller {
	
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
		$data['title'] = 'Data Jadwal';
		$data['jadwal'] = $this->model('JadwalModel')->getAllJadwal(); 
		$data['Prodi'] = $this->model('ProdiModel')->getAllProdi();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jadwal/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan jadwal';
		$data['jadwal'] = $this->model('JadwalModel')->getAllJadwal();
		$this->view('jadwal/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['jadwal'] = $this->model('JadwalModel')->getAllJadwal();

			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',14);
			// mencetak string 
			$pdf->Cell(190,7,'LAPORAN DOSEN',0,1,'C');
			 
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,7,'',0,1);
			 
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(100,6,'NAMA',1);
			$pdf->Cell(30,6,'PRODI',1);
			$pdf->Cell(30,6,'SEMESTER',1);
			$pdf->Cell(25,6,'T/A',1);
			  $pdf->Ln();
			$pdf->SetFont('Arial','',10);
			 
			foreach($data['jadwal'] as $row) {
			    $pdf->Cell(100,6,$row['nama_jadwal'],1);
			    $pdf->Cell(30,6,$row['nama_prodi'],1);
			    $pdf->Cell(30,6,$row['semester'],1);
			    $pdf->Cell(25,6,$row['Tahun_akademik'],1); 
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Jadwal.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Jadwal';
		$data['jadwal'] = $this->model('JadwalModel')->cariJadwal();
		$data['Prodi'] = $this->model('ProdiModel')->getAllProdi();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jadwal/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Jadwal';
		$data['Prodi'] = $this->model('ProdiModel')->getAllProdi();
		$data['jadwal'] = $this->model('JadwalModel')->getJadwalById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jadwal/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Jadwal';		
		$data['Prodi'] = $this->model('ProdiModel')->getAllProdi();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jadwal/create', $data);
		$this->view('templates/footer');
	}

	public function simpanJadwal(){		

		if( $this->model('JadwalModel')->tambahJadwal($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/jadwal');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/jadwal');
			exit;	
		}
	}

	public function updateJadwal(){	
		if( $this->model('JadwalModel')->updateDataJadwal($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/jadwal');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/jadwal');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('JadwalModel')->deleteJadwal($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/jadwal');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/jadwal');
			exit;	
		}
	}
}