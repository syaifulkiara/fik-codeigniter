<?php
	// open form
 echo form_open(base_url('pasien'),' class="form-horizontal"');
 ?>
<p>
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default">
<i class="fa fa-plus"></i> Tambah Pasien Baru
</button>
</p>

<?php 
	// Panggil form tambah
	include('tambah.php');
	// closed form
	echo form_close();
 ?>

<table class="table table-bordered table-striped table-sm" id="example1">
	<thead>
		<tr style="background-color: #009688; color: #fff; border-color: #328d39;">
			<th width="5%">NO</th>
			<th width="10%">KODE</th>
			<th width="25%">NAMA</th>
			<th width="10%">TELEPON</th>
			<th width="5%">L/P</th>
			<th width="20%">TTL</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pasien as $key => $pasien) { ?>

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $pasien->kode_pasien; ?></td>
			<td><?php echo $pasien->nama_pasien; ?>
				<br><small><?php echo $pasien->alamat ?></small>
			</td>
			<td><?php echo $pasien->telepon; ?></td>
			<td><?php echo $pasien->jenis_kelamin; ?></td>
			<td><?php echo $pasien->tempat_lahir; ?>, <?php echo date("d-m-Y",strtotime($pasien->tanggal_lahir)) ?></td>
			<td>
				<div class="btn-group">
					<a href="<?php echo base_url('pasien/detail/'.$pasien->id_pasien) ?>" class="btn btn-primary btn-sm"><i class="fa fa-laptop"></i> Detail
					</a>

					<a href="<?php echo base_url('pasien/cetak/'.$pasien->id_pasien) ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Print
					</a>

					<a href="<?php echo base_url('pasien/edit/'.$pasien->id_pasien) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit
					</a>

					<a href="<?php echo base_url('pasien/delete/'.$pasien->id_pasien) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Delete
					</a>
				</div>	
			</td>
		</tr>

	    <?php } ?>
	</tbody>
</table>