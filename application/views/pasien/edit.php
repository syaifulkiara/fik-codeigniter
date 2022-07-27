<?php 
// form edit open
echo form_open(base_url('pasien/edit/'.$pasien->id_pasien));
?>

<div class="form-group row">
	<label for="nama_pasien" class="col-sm-3 col-form-label">Kode Pasien</label>
	<div class="col-sm-9">
		<input type="text" name="kode_pasien" class="form-control"  placeholder="Kode Pasien" value="<?php echo $pasien->kode_pasien ?>" required>
	</div>
</div>

<div class="form-group row">
	<label for="nama_pasien" class="col-sm-3 col-form-label">Nama Pasien</label>
	<div class="col-sm-9">
		<input type="text" name="nama_pasien" class="form-control"  placeholder="Nama Pasien" value="<?php echo $pasien->nama_pasien ?>" required>
	</div>
</div>

<div class="form-group row">
	<label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
	<div class="col-sm-9">
		<select name="jenis_kelamin" class="form-control">
			<option value="L">Laki-Laki</option>
			<option value="P"<?php if($pasien->jenis_kelamin=="P"){ echo "selected";} ?>>Perempuan</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
	<div class="col-sm-9">
		<input type="text" name="tempat_lahir" class="form-control"  placeholder="Tempat Lahir" value="<?php echo $pasien->tempat_lahir ?>">
	</div>
</div>

<div class="form-group row">
	<label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
	<div class="col-sm-9">
		<input type="text" name="tanggal_lahir" class="form-control tanggal"  placeholder="dd-mm-yyyy" value="<?php echo date('d-m-Y', strtotime($pasien->tanggal_lahir)) ?>">
	</div>
</div>

<div class="form-group row">
	<label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
	<div class="col-sm-9">
		<textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $pasien->alamat ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label for="telepon" class="col-sm-3 col-form-label">Telepon</label>
	<div class="col-sm-9">
		<input type="text" name="telepon" class="form-control"  placeholder="Telepon" value="<?php echo $pasien->telepon ?>">
	</div>
</div>

<div class="form-group row">
	<label for="ok" class="col-sm-3 col-form-label"></label>
	<div class="col-sm-9">
		<button type="submit" class="btn btn-primary btn-sm">
			<i class="fa fa-save"></i> Simpan Data
		</button>
		<button type="reset" class="btn btn-info btn-sm">
			<i class="fa fa-times"></i> Reset
		</button>
		<a href="<?php echo base_url('pasien') ?>" class="btn btn-default btn-sm">
			<i class="fa fa-backward"></i> Kembali</a>
		</div>
	</div>

	<?php echo form_close();
	?>