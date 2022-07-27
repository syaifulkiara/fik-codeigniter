<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/print.css')?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/print.css')?>" media="print">
</head>
<body onload="print()">
	<div class="cetak">
		<h1>CETAK DATA PASIEN</h1>
		<table class="table table-striped">
		<tr>
			<td width="20%">Nama Pasien</td>
			<td>: <?php echo $pasien->nama_pasien ?></td>
		</tr>
		<tr>
			<td>Kode Pasien</td>
			<td>: <?php echo $pasien->kode_pasien ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>: <?php echo $pasien->jenis_kelamin ?></td>
		</tr>
		<tr>
			<td>Tempat, Tanggal Lahir</td>
			<td>: <?php echo $pasien->tempat_lahir ?>, <?php echo date('d-m-Y', strtotime($pasien->tanggal_lahir)) ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>: <?php echo $pasien->alamat ?></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>: <?php echo $pasien->telepon ?></td>
		</tr>
		<tr>
			<td>Tanggal Update</td>
			<td>: <?php echo $pasien->tanggal_update ?></td>
		</tr>
</table>
	</div>
</body>
</html>