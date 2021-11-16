<?php

class DosenModel {
	
	private $table = 'dosen';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllDosen()
	{
		$this->db->query("SELECT dosen.*, pendidikan.nama_pen FROM " . $this->table . " JOIN pendidikan ON pendidikan.pend_id = dosen.pend_id");
		return $this->db->resultSet();
	}

	public function getDosenById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE dosen_id=:dosen_id');
		$this->db->bind('dosen_id',$id);
		return $this->db->single();
	}

	public function tambahDosen($data)
	{
		$query = "INSERT INTO dosen (nama_dosen, alamat_dosen, tlp_dosen, pend_id) VALUES(:nama_dosen, :alamat_dosen, :tlp_dosen, :pend_id)";
		$this->db->query($query);
		$this->db->bind('nama_dosen', $data['nama_dosen']);
		$this->db->bind('alamat_dosen', $data['alamat_dosen']);
		$this->db->bind('tlp_dosen', $data['tlp_dosen']);
		$this->db->bind('pend_id', $data['pend_id']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataDosen($data)
	{
		$query = "UPDATE dosen SET nama_dosen=:nama_dosen, alamat_dosen=:alamat_dosen, tlp_dosen=:tlp_dosen, tlp_dosen=:tlp_dosen, pend_id=:pend_id WHERE dosen_id=:dosen_id";
		$this->db->query($query);
		$this->db->bind('dosen_id',$data['dosen_id']);
		$this->db->bind('nama_dosen', $data['nama_dosen']);
		$this->db->bind('alamat_dosen', $data['alamat_dosen']);
		$this->db->bind('tlp_dosen', $data['tlp_dosen']);
		$this->db->bind('pend_id', $data['pend_id']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteDosen($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE dosen_id=:dosen_id');
		$this->db->bind('dosen_id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariDosen()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT dosen.*, pendidikan.nama_pen FROM " . $this->table . " JOIN pendidikan ON pendidikan.pend_id = dosen.pend_id WHERE nama_dosen LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}

	public function cekDosen($id)
	{
		$this->db->query('SELECT COUNT(dosen_id) FROM jadwal WHERE dosen_id=:dosen_id');
		$this->db->bind('dosen_id',$id);
		$this->db->execute();

		return $this->db->single();
    }
}