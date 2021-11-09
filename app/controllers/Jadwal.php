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
		$data['kelas'] = $this->model('KelasModel')->getAllKelas();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jadwal/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan jadwal';
		$data['jadwal'] = $this->model('JadwalModel')->getAllJadwal(); 
		$data['kelas'] = $this->model('KelasModel')->getAllKelas();
		$this->view('jadwal/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['jadwal'] = $this->model('JadwalModel')->getAllJadwal();
		$data['kelas'] = $this->model('KelasModel')->getAllKelas();

			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',14);
			// mencetak string 
			$pdf->Cell(190,7,'RANGKUMAN JADWAL',0,1,'C');
			 
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,7,'',0,1);
			 
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(15,6,'HARI',1);
			$pdf->Cell(25,6,'JAM',1);
			$pdf->Cell(5,6,'S',1);
			$pdf->Cell(25,6,'KELAS',1);
			$pdf->Cell(60,6,'MATA KULIAH',1);
			$pdf->Cell(10,6,'SKS',1);
			$pdf->Cell(40,6,'DOSEN PENGAJAR',1);
			$pdf->Cell(10,6,'R',1);
			  $pdf->Ln();
			$pdf->SetFont('Arial','',10);
			 
			foreach($data['jadwal'] as $row) {
			    $pdf->Cell(15,6,$row['hari'],1);
			    $pdf->Cell(25,6,$row['jamkuliah'],1);
				foreach ($data['kelas'] as $row1)
				if($row['kelas_id'] == $row1['kelas_id'])
				$pdf->Cell(5,6,$row1['semester'],1);
				foreach ($data['kelas'] as $row1)
				if($row['kelas_id'] == $row1['kelas_id'])
			    $pdf->Cell(25,6,$row1['nama_prodi'] .' - ' .$row['nama_kelas'] ,1); 
				$pdf->Cell(60,6,$row['nama_matakuliah'],1);
			    $pdf->Cell(10,6,$row['sks'],1);
			    $pdf->Cell(40,6,$row['nama_dosen'],1);
			    $pdf->Cell(10,6,$row['ruangan_nama'],1);  
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Jadwal.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Jadwal';
		$data['jadwal'] = $this->model('JadwalModel')->cariJadwal();
		$data['kelas'] = $this->model('KelasModel')->getAllKelas();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jadwal/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Jadwal';
		$data['jadwal'] = $this->model('JadwalModel')->getJadwalById($id);
		$data['Jamkuliah'] = $this->model('JamkuliahModel')->getAllJamkuliah();
		$data['prodi'] = $this->model('ProdiModel')->getAllProdi();
		$data['kelas'] = $this->model('KelasModel')->getAllKelas();
		$data['dosen'] = $this->model('DosenModel')->getAllDosen();
		$data['matakuliah'] = $this->model('MatakuliahModel')->getAllMatakuliah();
		$data['pendidikan'] = $this->model('PendidikanModel')->getAllPendidikan();
		$data['ruangan'] = $this->model('RuanganModel')->getAllRuangan(); 
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jadwal/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Jadwal';		
		$data['Jamkuliah'] = $this->model('JamkuliahModel')->getAllJamkuliah();
		$data['prodi'] = $this->model('ProdiModel')->getAllProdi();
		$data['kelas'] = $this->model('KelasModel')->getAllKelas();
		$data['dosen'] = $this->model('DosenModel')->getAllDosen();
		$data['matakuliah'] = $this->model('MatakuliahModel')->getAllMatakuliah();
		$data['pendidikan'] = $this->model('PendidikanModel')->getAllPendidikan();
		$data['ruangan'] = $this->model('RuanganModel')->getAllRuangan(); 
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