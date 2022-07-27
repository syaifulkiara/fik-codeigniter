<p class="text-right">
	<a href="<?php echo base_url('suhu_tubuh/riwayat/'.$pasien->id_pasien) ?>" target="_blank" class="btn btn-success btn-sm">
		<i class="fa fa-print"></i> Cetak Riwayat Suhu Tubuh
	</a>

	<a href="<?php echo base_url('suhu_tubuh/export/'.$pasien->id_pasien) ?>"class="btn btn-primary btn-sm" target="_blank">
		<i class="fa fa-file-word"></i> Export ke Word (Doc)
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
<h3>RIWAYAT DATA SUHU TUBUH</h3>
<hr>
<table class="table table-bordered table-striped table-sm" id="example1">
	<thead>
		<tr style="background-color: #009688; color: #fff; border-color: #328d39;">
			<th width="5%">NO</th>
			<th width="25%">KODE - PASIEN</th>
			<th width="10%">SUHU</th>
			<th width="15%">WAKTU PENGUKURAN</th>
			<th width="5%">METODE</th>
			<th width="10%">OLEH</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($suhu_tubuh as $key => $suhu_tubuh) { ?>

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><a href="<?php echo base_url('suhu_tubuh/pasien/'.$suhu_tubuh->id_pasien) ?>"><?php echo $suhu_tubuh->kode_pasien; ?> - <?php echo $suhu_tubuh->nama_pasien ?>
			<sup><i class="fa fa-link"></i></sup></a>
		   </td>
			<td class="<?php if($suhu_tubuh->suhu_tubuh <= 37) {echo 'bg-success';}elseif($suhu_tubuh->suhu_tubuh <= 38){echo 'bg-warning';}else{echo 'bg-danger';} ?>"><?php echo $suhu_tubuh->suhu_tubuh; ?> Derajat</td>
			<td><?php echo date('d-M-Y', strtotime($suhu_tubuh->tanggal_pengukuran)); ?> jam <?php echo date('H:i', strtotime($suhu_tubuh->jam_pengukuran)) ?></td>
			<td><?php echo $suhu_tubuh->metode_pengukuran; ?></td>
			<td><?php echo $suhu_tubuh->nama_user; ?>
				<br><small><?php echo $suhu_tubuh->akses_level; ?></small>
			</td>
			<td>
				<div class="btn-group">
					<a href="<?php echo base_url('suhu_tubuh/detail/'.$suhu_tubuh->id_suhu_tubuh) ?>" class="btn btn-primary btn-sm"><i class="fa fa-laptop"></i> Detail
					</a>

					<a href="<?php echo base_url('suhu_tubuh/cetak/'.$suhu_tubuh->id_suhu_tubuh) ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Print
					</a>

					<a href="<?php echo base_url('suhu_tubuh/edit/'.$suhu_tubuh->id_suhu_tubuh) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit
					</a>

					<a href="<?php echo base_url('suhu_tubuh/delete/'.$suhu_tubuh->id_suhu_tubuh) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Delete
					</a>
				</div>	
			</td>
		</tr>

	    <?php } ?>
	</tbody>
</table>