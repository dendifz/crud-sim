<?php

class PendidikanModel {
	
	private $table = 'pendidikan';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPendidikan()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getPendidikanById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE pend_id=:pend_id');
		$this->db->bind('pend_id',$id);
		return $this->db->single();
	}

	public function tambahPendidikan($data)
	{
		$query = "INSERT INTO Pendidikan (nama_pen) VALUES(:nama_pen)";
		$this->db->query($query);
		$this->db->bind('nama_pen',$data['nama_pen']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPendidikan($data)
	{
		$query = "UPDATE pendidikan SET nama_pen=:nama_pen WHERE pend_id=:pend_id";
		$this->db->query($query);
		$this->db->bind('pend_id',$data['pend_id']);
		$this->db->bind('nama_pen',$data['nama_pen']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePendidikan($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE pend_id=:pend_id');
		$this->db->bind('pend_id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cekPendidikan($id)
	{
		$this->db->query('SELECT COUNT(pend_id) FROM dosen WHERE pend_id=:pend_id');
		$this->db->bind('pend_id',$id);
		$this->db->execute();

		return $this->db->single();
    }

}