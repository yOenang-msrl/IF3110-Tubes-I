<?php
class Barang
{
	public function beli(array $var)
	{
		if (isset($_SESSION['username']))
			echo $var["id"];		
		else
			echo "Anda harus login terlebih dahulu";
	}

	public function index(array $var)
	{
		$m = new Barang_Model();
		$u = new View('home/gallery');
		$u->setData('barang',$m->getAllBarang($var['page']*10));
		$u->setData('jmlPage',(($m->countBarang()->JmlBarang)/10));
		$u->render();
	}

	public function detail(array $var)
	{
		$u = new Barang_Model();
		$v = new View('barang/detail');
		$v->setData('detail',$u->getBarangID($var['id']));
		$v->render();
	}
}
