 <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #009688; color: #fff; border-color: #328d39;">
          <h4 class="modal-title">Tambah Pasien Baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
           <div class="form-group row">
              <label for="nama_pasien" class="col-sm-3 col-form-label">Kode Pasien</label>
              <div class="col-sm-9">
                <input type="text" name="kode_pasien" class="form-control"  placeholder="Kode Pasien" value="<?php echo set_value('kode_pasien') ?>" required>
              </div>
            </div>

             <div class="form-group row">
              <label for="nama_pasien" class="col-sm-3 col-form-label">Nama Pasien</label>
              <div class="col-sm-9">
                <input type="text" name="nama_pasien" class="form-control"  placeholder="Nama Pasien" value="<?php echo set_value('nama_pasien') ?>" required>
              </div>
            </div>

             <div class="form-group row">
              <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-9">
               <select name="jenis_kelamin" class="form-control">
                 <option value="L">Laki-Laki</option>
                 <option value="P">Perempuan</option>
               </select>
              </div>
            </div>

             <div class="form-group row">
              <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
              <div class="col-sm-9">
                <input type="text" name="tempat_lahir" class="form-control"  placeholder="Tempat Lahir" value="<?php echo set_value('tempat_lahir') ?>">
              </div>
            </div>

             <div class="form-group row">
              <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-9">
                <input type="text" name="tanggal_lahir" class="form-control tanggal"  placeholder="dd-mm-yyyy" value="<?php echo set_value('tanggal_lahir') ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
               <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo set_value('alamat') ?></textarea>
              </div>
            </div>

             <div class="form-group row">
              <label for="telepon" class="col-sm-3 col-form-label">Telepon</label>
              <div class="col-sm-9">
                <input type="text" name="telepon" class="form-control"  placeholder="Telepon" value="<?php echo set_value('telepon') ?>">
              </div>
            </div>
           

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
            <i class="fa fa-times"></i> Tutup
          </button>
          <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-save"></i> Simpan Data
          </button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->