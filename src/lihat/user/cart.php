<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
	<title> Lihat Belanjaan </title>
</head>
<body>
Ini laman belanjaan<br>
<table border = 1>
<tr>
	<th>No</th>
	<th>Nama Barang</th>
	<th>Quantity</th>
	<th>Kartu Kredit</th>
	<th>Tanggal Pembelian</th>
	<th>Status</th>
</tr>
<?php
$i = 0;
while ($row = mysql_fetch_object($data['listBarang']))
{
	$i++;
?>
<tr>
	<td><?=$i;?></td>
	<td><?=$row->nama_barang;?></td>
	<td><?=$row->jumlah_barang;?></td>
	<td><?=$row->card_number;?></td>
	<td><?=$row->tgl_pembelian;?></td>
	<td>
	<?php
	if ($row->status == 0)
	{
	?>
		<font color="red">Barang belum dikirim</font>
	<?php
	}
	else
	{
	?>
		<font color="green">Barang sudah dikirim</font>
	<?php
	}
	?>
	</td>
</tr>
<?php
}
?>
</table>

Klik <a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/"> ini </a> untuk belanja kembali<br>
</body>
</html>
