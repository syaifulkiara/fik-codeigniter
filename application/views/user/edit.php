<?php 
// form edit open
echo form_open(base_url('user/edit/'.$user->id_user));
?>

<div class="form-group row">
	<label for="nama_user" class="col-sm-3 col-form-label">Nama User</label>
	<div class="col-sm-9">
		<input type="text" name="nama_user" class="form-control"  placeholder="Nama User" value="<?php echo $user->nama_user ?>" required>
	</div>
</div>

<div class="form-group row">
	<label for="email" class="col-sm-3 col-form-label">Email</label>
	<div class="col-sm-9">
		<input type="email" name="email" class="form-control"  placeholder="Email" value="<?php echo $user->email ?>" required>
	</div>
</div>

<div class="form-group row">
	<label for="username" class="col-sm-3 col-form-label">Username</label>
	<div class="col-sm-9">
		<input type="text" name="username" class="form-control"  placeholder="Username" value="<?php echo $user->username ?>" readonly>
	</div>
</div>

<div class="form-group row">
	<label for="password" class="col-sm-3 col-form-label">Password</label>
	<div class="col-sm-9">
		<input type="password" name="password" class="form-control"  placeholder="Password" value="<?php echo set_value('password') ?>">
		<small class="text-danger">Minimal 6 karakter dan Maksimal 32 karakter atau biarkan kosong</small>
	</div>
</div>

<div class="form-group row">
	<label for="username" class="col-sm-3 col-form-label">Level Hak Akses</label>
	<div class="col-sm-9">
		<select name="akses_level" class="form-control">
			<option value="Admin">Admin</option>
			<option value="Perawat"<?php if($user->akses_level=="Perawat"){ echo "selected"; } ?>>Perawat</option>
		</select>
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
          <a href="<?php echo base_url('user') ?>" class="btn btn-default btn-sm">
          	<i class="fa fa-backward"></i> Kembali</a>
	</div>
</div>

<?php echo form_close();
?>