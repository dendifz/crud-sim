<?php

class JamkuliahModel {
	
	private $table = 'jam_kuliah';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllJamkuliah()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function getJamkuliahById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE jam_id=:jam_id');
		$this->db->bind('jam_id',$id);
		return $this->db->single();
	}

	public function tambahJamkuliah($data)
	{
		$query = "INSERT INTO " . $this->table . " (jamkuliah) VALUES(:jamkuliah)";
		$this->db->query($query);
		$this->db->bind('jamkuliah', $data['jamkuliah']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataJamkuliah($data)
	{
		$query = "UPDATE " . $this->table . " SET jamkuliah=:jamkuliah WHERE jam_id=:jam_id";
		$this->db->query($query);
		$this->db->bind('jam_id',$data['jam_id']);
		$this->db->bind('jamkuliah', $data['jamkuliah']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	
	public function deleteJamkuliah($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE jam_id=:jam_id');
		$this->db->bind('jam_id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cekJamkuliah($id)
	{
		$this->db->query('SELECT COUNT(jam_id) FROM jadwal WHERE jam_id=:jam_id');
		$this->db->bind('jam_id',$id);
		$this->db->execute();

		return $this->db->single();
    }

}