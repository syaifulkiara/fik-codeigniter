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
		<h1>CETAK RIWAYAT SUHU TUBUH PASIEN</h1>
		<table class="table table-striped">
	<thead>
		<tr>
			<td>Nama Pasien</td>
			<td> <?php echo $pasien->nama_pasien ?></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Kode Pasien</td>
			<td> <?php echo $pasien->kode_pasien ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td> <?php echo $pasien->jenis_kelamin ?></td>
		</tr>
		<tr>
			<td>Tempat, Tanggal Lahir</td>
			<td> <?php echo $pasien->tempat_lahir ?>, <?php echo date('d-m-Y', strtotime($pasien->tanggal_lahir)) ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td> <?php echo $pasien->alamat ?></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td> <?php echo $pasien->telepon ?></td>
		</tr>
		<tr>
			<td>Tanggal Update</td>
			<td> <?php echo $pasien->tanggal_update ?></td>
		</tr>
	</tbody>
</table>

<hr>
<h3>DATA RIWAYAT SUHU TUBUH</h3>
<table class="table table-bordered table-striped table-sm" id="example1">
	<thead>
		<tr style="background-color: #009688; color: #fff; border-color: #328d39;">
			<th width="5%">NO</th>
			<th width="25%">KODE - PASIEN</th>
			<th width="10%">SUHU</th>
			<th width="15%">WAKTU</th>
			<th width="5%">METODE</th>
			<th width="10%">OLEH</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($suhu_tubuh as $key => $suhu_tubuh) { ?>

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $suhu_tubuh->kode_pasien; ?> - <?php echo $suhu_tubuh->nama_pasien ?>
			
		   </td>
			<td class="<?php if($suhu_tubuh->suhu_tubuh <= 37) {echo 'bg-success';}elseif($suhu_tubuh->suhu_tubuh <= 38){echo 'bg-warning';}else{echo 'bg-danger';} ?>"><?php echo $suhu_tubuh->suhu_tubuh; ?> Derajat</td>
			<td><?php echo date('d-M-Y', strtotime($suhu_tubuh->tanggal_pengukuran)); ?> jam <?php echo date('H:i', strtotime($suhu_tubuh->jam_pengukuran)) ?></td>
			<td><?php echo $suhu_tubuh->metode_pengukuran; ?></td>
			<td><?php echo $suhu_tubuh->nama_user; ?>
				<br><small><i><?php echo $suhu_tubuh->akses_level; ?></i></small>
			</td>
		</tr>

	    <?php } ?>
	</tbody>
</table>
</div>

</body>
</html>