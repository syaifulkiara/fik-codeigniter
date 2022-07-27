 <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-stethoscope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Data Pasien</span>
                <span class="info-box-number">
                  <?php echo $pasien->total ?>
                  <small>Orang</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <p class="btn btn-group btn-block">
              <a href="<?php echo base_url('pasien') ?>" class="btn btn-success btn-sm">
                <i class="fa fa-stethoscope"></i> Data Pasien
              </a>
              <a href="<?php echo base_url('pasien/tambah') ?>" class="btn btn-info btn-sm">
                <i class="fa fa-plus"></i> Tambah Baru
              </a>
            </p>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tekanan Darah</span>
                <span class="info-box-number"><?php echo $denyut_nadi->total ?></span>
                <small>Data</small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <p class="btn btn-group btn-block">
              <a href="<?php echo base_url('denyut_nadi') ?>" class="btn btn-success btn-sm">
                <i class="fa fa-heart"></i> Tekanan Darah
              </a>
              <a href="<?php echo base_url('denyut_nadi/tambah') ?>" class="btn btn-info btn-sm">
                <i class="fa fa-plus"></i> Tambah Baru
              </a>
            </p>
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thermometer"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Suhu Tubuh</span>
                <span class="info-box-number"><?php echo $suhu_tubuh->total ?></span>
                <small>Data</small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <p class="btn btn-group btn-block">
              <a href="<?php echo base_url('suhu_tubuh') ?>" class="btn btn-success btn-sm">
                <i class="fa fa-thermometer"></i> Suhu Tubuh
              </a>
              <a href="<?php echo base_url('suhu_tubuh/tambah') ?>" class="btn btn-info btn-sm">
                <i class="fa fa-plus"></i> Tambah Baru
              </a>
            </p>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-lock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Dan Perawat</span>
                <span class="info-box-number"><?php echo $user->total ?></span>
                <small>Orang</small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <p class="btn btn-group btn-block">
              <a href="<?php echo base_url('user') ?>" class="btn btn-success btn-sm">
                <i class="fa fa-lock"></i> User Dan Perawat
              </a>
              <a href="<?php echo base_url('user/tambah') ?>" class="btn btn-info btn-sm">
                <i class="fa fa-plus"></i> Tambah Baru
              </a>
            </p>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->