<p class="text-right">
	<a href="<?php echo base_url('suhu_tubuh/edit/'.$suhu_tubuh->id_suhu_tubuh) ?>"class="btn btn-success btn-sm">
		<i class="fa fa-edit"></i> Edit Pasien
	</a>

	<a href="<?php echo base_url('suhu_tubuh/cetak/'.$suhu_tubuh->id_suhu_tubuh) ?>"class="btn btn-primary btn-sm" target="_blank">
		<i class="fa fa-print"></i> Print
	</a>

	<a href="<?php echo base_url('suhu_tubuh') ?>"class="btn btn-info btn-sm">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>
<hr>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="20%">Nama Pasien</th>
			<th>: <?php echo $pasien->nama_pasien ?></th>
		</tr>
	</thead>
	<tbody>
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
	</tbody>
</table>

<hr>
<h3>DATA SUHU TUBUH</h3>
<table class="table table-boredered table-striped">
	<thead>
		<tr>
			<th width="25%">Waktu Pengukuran</th>
			<th>: <?php echo date('d-m-Y', strtotime($suhu_tubuh->tanggal_pengukuran)) ?> jam <?php echo $suhu_tubuh->jam_pengukuran ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Suhu Tubuh</td>
			<td class="<?php if($suhu_tubuh->suhu_tubuh <= 37) {echo 'bg-success';}elseif($suhu_tubuh->suhu_tubuh <= 38){echo 'bg-warning';}else{echo 'bg-danger';} ?>">: <?php echo $suhu_tubuh->suhu_tubuh ?> Derajat</td>
		</tr>
		<tr>
			<td>Metode Pengukuran</td>
			<td>: <?php echo $suhu_tubuh->metode_pengukuran ?></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>: <?php echo $suhu_tubuh->keterangan ?></td>
		</tr>
	</tbody>
</table>