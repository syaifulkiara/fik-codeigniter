 <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #009688; color: #fff; border-color: #328d39;">
          <h4 class="modal-title">Tambah User Baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
           <div class="form-group row">
              <label for="nama_user" class="col-sm-3 col-form-label">Nama User</label>
              <div class="col-sm-9">
                <input type="text" name="nama_user" class="form-control"  placeholder="Nama User" value="<?php echo set_value('nama_user') ?>" required>
              </div>
            </div>

             <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" name="email" class="form-control"  placeholder="Email" value="<?php echo set_value('email') ?>" required>
              </div>
            </div>

             <div class="form-group row">
              <label for="username" class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" name="username" class="form-control"  placeholder="Username" value="<?php echo set_value('username') ?>" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" name="password" class="form-control"  placeholder="Password" value="<?php echo set_value('password') ?>" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="username" class="col-sm-3 col-form-label">Level Hak Akses</label>
              <div class="col-sm-9">
               <select name="akses_level" class="form-control">
                 <option value="Admin">Admin</option>
                 <option value="Perawat">Perawat</option>
               </select>
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