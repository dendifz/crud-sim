<?php

class PegawaiModel {
	
	private $table = 'Pegawai';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPegawai()
	{
		$this->db->query("SELECT * FROM ". $this->table);
		return $this->db->resultSet();
	}

	public function getPegawaiById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pegawai=:id_pegawai');
		$this->db->bind('id_pegawai',$id);
		return $this->db->single();
	}

	public function tambahPegawai($data)
	{
		$query = "INSERT INTO Pegawai (nip, nama, alamat, tanggal_lahir, no_telepon) VALUES(:nip, :nama, :alamat, :tanggal_lahir, :no_telepon)";
		$this->db->query($query);
		$this->db->bind('nip', $data['nip']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
		$this->db->bind('no_telepon', $data['no_telepon']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPegawai($data)
	{
		$query = "UPDATE Pegawai SET nip=:nip, nama=:nama, alamat=:alamat, tanggal_lahir=:tanggal_lahir, no_telepon=:no_telepon WHERE id_pegawai=:id_pegawai";
		$this->db->query($query);
		$this->db->bind('id_pegawai',$data['id_pegawai']);
		$this->db->bind('nip', $data['nip']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
		$this->db->bind('no_telepon', $data['no_telepon']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePegawai($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_pegawai=:id_pegawai');
		$this->db->bind('id_pegawai',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariPegawai()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}