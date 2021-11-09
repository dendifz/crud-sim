<?php

class MatakuliahModel {
	
	private $table = 'matakuliah';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllMatakuliah()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function getMatakuliahById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE matakuliah_id=:matakuliah_id');
		$this->db->bind('matakuliah_id',$id);
		return $this->db->single();
	}

	public function tambahMatakuliah($data)
	{
		$query = "INSERT INTO " . $this->table . " (nama_matakuliah, semester, sks) VALUES(:nama_matakuliah, :semester, :sks)";
		$this->db->query($query);
        $this->db->bind('nama_matakuliah', $data['nama_matakuliah']);
        $this->db->bind('semester', $data['semester']);
        $this->db->bind('sks', $data['sks']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataMatakuliah($data)
	{
		$query = "UPDATE " . $this->table . " SET nama_matakuliah=:nama_matakuliah, semester=:semester, sks=:sks WHERE matakuliah_id=:matakuliah_id";
		$this->db->query($query);
		$this->db->bind('matakuliah_id',$data['matakuliah_id']);
		$this->db->bind('nama_matakuliah',$data['nama_matakuliah']);
		$this->db->bind('semester',$data['semester']);
		$this->db->bind('sks',$data['sks']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteMatakuliah($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE matakuliah_id=:matakuliah_id');
		$this->db->bind('matakuliah_id',$id);
		$this->db->execute();

		return $this->db->rowCount();
    }
    
    public function cariMatakuliah()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama_matakuliah LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}

}