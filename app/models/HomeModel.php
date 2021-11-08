<?php

class HomeModel {

	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getJumlahDosen()
	{
		$this->db->query('SELECT COUNT(dosen_id) As jmldosen FROM dosen');
		return $this->db->resultSet();
    }

    public function getJumlahKelas()
	{
		$this->db->query('SELECT COUNT(kelas_id) As jmlkelas FROM kelas');
		return $this->db->resultSet();
    }

    public function getJumlahJadwal()
	{
		$this->db->query('SELECT COUNT(jadwal_id) As jmljadwal FROM jadwal');
		return $this->db->resultSet();
    }

    public function getJumlahUser()
	{
		$this->db->query('SELECT COUNT(id) As jmluser FROM user');
		return $this->db->resultSet();
    }
}