<?php

class KelasModel {
	
	private $table = 'kelas';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllKelas()
	{
		$this->db->query("SELECT kelas.*, prodi.nama_prodi FROM " . $this->table . " JOIN prodi ON prodi.prodi_id = kelas.prodi_id");
		return $this->db->resultSet();
	}

	public function getKelasById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE kelas_id=:kelas_id');
		$this->db->bind('kelas_id',$id);
		return $this->db->single();
	}

	public function tambahKelas($data)
	{
		$query = "INSERT INTO kelas (nama_kelas, prodi_id, semester, Tahun_akademik) VALUES(:nama_kelas, :prodi_id, :semester, :Tahun_akademik)";
		$this->db->query($query);
		$this->db->bind('nama_kelas', $data['nama_kelas']);
		$this->db->bind('prodi_id', $data['prodi_id']);
		$this->db->bind('semester', $data['semester']);
		$this->db->bind('Tahun_akademik', $data['Tahun_akademik']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataKelas($data)
	{
		$query = "UPDATE kelas SET nama_kelas=:nama_kelas, prodi_id=:prodi_id, semester=:semester, semester=:semester, Tahun_akademik=:Tahun_akademik WHERE kelas_id=:kelas_id";
		$this->db->query($query);
		$this->db->bind('kelas_id',$data['kelas_id']);
		$this->db->bind('nama_kelas', $data['nama_kelas']);
		$this->db->bind('prodi_id', $data['prodi_id']);
		$this->db->bind('semester', $data['semester']);
		$this->db->bind('Tahun_akademik', $data['Tahun_akademik']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteKelas($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE kelas_id=:kelas_id');
		$this->db->bind('kelas_id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariKelas()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT kelas.*, prodi.nama_prodi FROM " . $this->table . " JOIN prodi ON prodi.prodi_id = kelas.prodi_id WHERE nama_kelas LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}

	public function cekKelas($id)
	{
		$this->db->query('SELECT COUNT(kelas_id) FROM jadwal WHERE kelas_id=:kelas_id');
		$this->db->bind('kelas_id',$id);
		$this->db->execute();

		return $this->db->single();
    }
}