<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
	<title> Beli Barang </title>
</head>
<body>
<h2>Pembelian Barang</h2>
<form action="" method="POST">
Nama Barang : <?=$data['nama_barang'];?><br>
Stok	: <?=$data['stok'];?><br>
Jumlah Pembelian : <input type="text" name="qty"><br>
Kartu Kredit :
<select name="kartu">
<?php
while ($row = mysql_fetch_object($data['listCC']))
{
?>
	<option value="<?=$row->id;?>"><?=$row->card_number;?></option>
<?php
}
?>
</select><br>
Deskripsi Tambahan : <textarea name="deskripsi_tambahan" id="deskripsi_tambahan"></textarea><br>
<input type="hidden" name="id_barang" value="<?=$data['id_barang'];?>"><br>
<input type="submit" value="submit" name="submit">
</form>
</body>
</html>
