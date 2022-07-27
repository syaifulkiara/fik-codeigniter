<p class="text-right">
	<a href="<?php echo base_url('denyut_nadi/riwayat/'.$pasien->id_pasien) ?>" target="_blank" class="btn btn-success btn-sm">
		<i class="fa fa-print"></i> Cetak Riwayat Denyut Nadi
	</a>

	<a href="<?php echo base_url('denyut_nadi/export/'.$pasien->id_pasien) ?>"class="btn btn-primary btn-sm" target="_blank">
		<i class="fa fa-file-word"></i> Export ke Word (Doc)
	</a>

	<a href="<?php echo base_url('denyut_nadi') ?>"class="btn btn-info btn-sm">
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
<h3>RIWAYAT DATA TEKANAN DARAH ( TDS, TDD DAN DENYUT NADI )</h3>
<hr>
<table class="table table-bordered table-striped table-sm" id="example1">
	<thead>
		<tr style="background-color: #009688; color: #fff; border-color: #328d39;">
			<th width="5%">NO</th>
			<th width="20%">KODE - PASIEN</th>
			<th width="10%">TDS</th>
			<th width="10%">TDD</th>
			<th width="10%">DENYUT NADI</th>
			<th width="5%">KETERANGAN</th>
			<th width="10%">OLEH</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($denyut_nadi as $key => $denyut_nadi) { ?>

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><a href="<?php echo base_url('denyut_nadi/pasien/'.$denyut_nadi->id_pasien) ?>"><?php echo $denyut_nadi->kode_pasien; ?> - <?php echo $denyut_nadi->nama_pasien ?>
			<sup><i class="fa fa-link"></i></sup></a>
		   </td>
			<td><?php echo $denyut_nadi->tds; ?></td>
			<td><?php echo $denyut_nadi->tdd; ?></td>
			<td><?php echo $denyut_nadi->denyut_nadi; ?></td>
			<td><?php echo $denyut_nadi->keterangan; ?></td>
			<td><?php echo $denyut_nadi->nama_user; ?></td>
			<td>
				<div class="btn-group">
					<a href="<?php echo base_url('denyut_nadi/detail/'.$denyut_nadi->id_denyut_nadi) ?>" class="btn btn-primary btn-sm"><i class="fa fa-laptop"></i> Detail
					</a>

					<a href="<?php echo base_url('denyut_nadi/cetak/'.$denyut_nadi->id_denyut_nadi) ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Print
					</a>

					<a href="<?php echo base_url('denyut_nadi/edit/'.$denyut_nadi->id_denyut_nadi) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit
					</a>

					<a href="<?php echo base_url('denyut_nadi/delete/'.$denyut_nadi->id_denyut_nadi) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Delete
					</a>
				</div>	
			</td>
		</tr>

	    <?php } ?>
	</tbody>
</table>