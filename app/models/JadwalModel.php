<?php

class JadwalModel {
	
	private $table = 'jadwal';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllJadwal()
	{
		$this->db->query("SELECT jadwal.*, jam_kuliah.*, dosen.*, kelas.*, matakuliah.*, ruangan.* FROM " . $this->table . 
		" JOIN jam_kuliah ON jam_kuliah.jam_id = jadwal.jam_id 
		JOIN dosen ON dosen.dosen_id = jadwal.dosen_id
		JOIN kelas ON kelas.kelas_id = jadwal.kelas_id
		JOIN matakuliah ON matakuliah.matakuliah_id = jadwal.matakuliah_id
		JOIN ruangan ON ruangan.ruangan_id = jadwal.ruangan_id");
		return $this->db->resultSet();
	}

	public function getJadwalById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE jadwal_id=:jadwal_id');
		$this->db->bind('jadwal_id',$id);
		return $this->db->single();
	}

	public function tambahJadwal($data)
	{
		$query = "INSERT INTO jadwal (nama_jadwal, prodi_id, semester, Tahun_akademik) VALUES(:nama_jadwal, :prodi_id, :semester, :Tahun_akademik)";
		$this->db->query($query);
		$this->db->bind('nama_jadwal', $data['nama_jadwal']);
		$this->db->bind('prodi_id', $data['prodi_id']);
		$this->db->bind('semester', $data['semester']);
		$this->db->bind('Tahun_akademik', $data['Tahun_akademik']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataJadwal($data)
	{
		$query = "UPDATE jadwal SET nama_jadwal=:nama_jadwal, prodi_id=:prodi_id, semester=:semester, semester=:semester, Tahun_akademik=:Tahun_akademik WHERE jadwal_id=:jadwal_id";
		$this->db->query($query);
		$this->db->bind('jadwal_id',$data['jadwal_id']);
		$this->db->bind('nama_jadwal', $data['nama_jadwal']);
		$this->db->bind('prodi_id', $data['prodi_id']);
		$this->db->bind('semester', $data['semester']);
		$this->db->bind('Tahun_akademik', $data['Tahun_akademik']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteJadwal($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE jadwal_id=:jadwal_id');
		$this->db->bind('jadwal_id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariJadwal()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT jadwal.*, prodi.nama_prodi FROM " . $this->table . " JOIN prodi ON prodi.prodi_id = jadwal.prodi_id WHERE nama_jadwal LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}