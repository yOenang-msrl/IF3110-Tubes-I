<?php
class Barang_Model
{
	private $database;
	public function __construct()
	{
		$this->database = new SQL();
	}

	public function countBarang()
	{
		$query = "SELECT COUNT(id) AS JmlBarang from barang";
		$this->database->query($query);
		return $this->database->fetch();		
	}

	public function getAllBarang($offset)
	{
		//LIMIT 0, 10 
		$query = "select barang.id, barang.nama_barang, barang.harga_barang, barang.jumlah_barang from barang join kategori on barang.id_kategori=kategori.id limit ".$offset.",10";
		return $this->database->query($query);
	}

	public function getBarangID($id)
	{
		$query = "select * from barang join kategori on barang.id_kategori=kategori.id and barang.id=".$id;
		return $this->database->query($query);
	}
}
		
