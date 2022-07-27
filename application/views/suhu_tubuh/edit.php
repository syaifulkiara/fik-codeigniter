 <?php 
 echo form_open(base_url('suhu_tubuh/edit/'.$suhu_tubuh->id_suhu_tubuh));
 ?>
  <div class="form-group row">
  <label for="id_pasien" class="col-sm-3 text-right">Pilih Pasien</label>
  <div class="col-sm-9">
    <select name="id_pasien" class="form-control select2" required>
      <option value="">Pilih Pasien...</option>}
      <?php foreach($pasien as $pasien){ ?>
      <option value="<?php echo $pasien->id_pasien ?>" <?php if($pasien->id_pasien==$suhu_tubuh->id_pasien) {echo 'selected';} ?>>
      <?php echo $pasien->kode_pasien ?> - <?php echo $pasien->nama_pasien ?>
      </option>
    <?php } ?>
    </select>
  </div>
</div>

 <div class="form-group row">
  <label for="tanggal_pengukuran" class="col-sm-3 text-right">Tanggal dan waktu pengukuran</label>
  <div class="col-sm-3">
    <input type="text" name="tanggal_pengukuran" class="form-control tanggal"  placeholder="dd-mm-yyyy" value="<?php echo date('d-m-Y',strtotime($suhu_tubuh->tanggal_pengukuran)) ?>" required>
  </div>
  <div class="col-sm-3">
    <input type="text" name="jam_pengukuran" class="form-control"  placeholder="jj:mm" value="<?php echo $suhu_tubuh->jam_pengukuran ?>" required>
    <small>Misal: <?php echo date('H:i') ?></small>
  </div>
</div>

<div class="form-group row">
  <label for="suhu_tubuh" class="col-sm-3 text-right">Suhu tubuh</label>
  <div class="col-sm-9">
    <input type="text" name="suhu_tubuh" class="form-control"  placeholder="Suhu Tubuh" value="<?php echo $suhu_tubuh->suhu_tubuh ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="metode_pengukuran" class="col-sm-3 text-right">Metode Pengukuran</label>
  <div class="col-sm-9">
   <select name="metode_pengukuran" class="form-control">
     <option value="Oral">Oral</option>
     <option value="Axilla" <?php if($suhu_tubuh->metode_pengukuran=='Axilla') {echo 'selected';} ?>>Axilla</option>
     <option value="Rectal" <?php if($suhu_tubuh->metode_pengukuran=='Rectal') {echo 'selected';} ?>>Rectal</option>
   </select>
  </div>
</div>
<div class="form-group row">
  <label for="suhu_tubuh" class="col-sm-3 text-right">Keterangan</label>
  <div class="col-sm-9">
   <textarea name="keterangan" class="form-control" placeholder="Keterangan Lain"><?php echo $suhu_tubuh->keterangan ?></textarea>
  </div>
</div>
<div class="form-group row">
  <label for="suhu_tubuh" class="col-sm-3 text-right"></label>
  <div class="col-sm-9">
 <button type="submit" class="btn btn-success btn-sm" name="submit" value="submit">
   <i class="fa fa-save"></i> Simpan Data
 </button>
  <button type="reset" class="btn btn-default btn-sm" name="reset" value="reset">
   <i class="fa fa-times"></i> Reset
 </button>
  </div>
</div>
<?php 
echo form_close();
?>