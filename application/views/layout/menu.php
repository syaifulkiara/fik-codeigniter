<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('dashboard') ?>" class="brand-link navbar-orange">
      <img src="<?= base_url() ?>assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">FIK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url('profil') ?>" class="d-block"><?php echo $this->session->userdata('nama'); ?></a>
          <span class="badge bg-success"><?php echo $this->session->userdata('akses_level'); ?></span>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- DASHBOARD MENU -->
          <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashbaord
              </p>
            </a>
          </li>
          <!-- DATA denyut nadi -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-heart"></i>
              <p>
                 Denyut Nadi Pasien
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('denyut_nadi') ?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Denyut Nadi Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('denyut_nadi/tambah') ?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Tambah Data Denyut Nadi</p>
                </a>
              </li>
            </ul>
          </li>
           <!-- DATA suhu tubuh -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-thermometer"></i>
              <p>
                 Suhu Tubuh Pasien
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('suhu_tubuh') ?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Suhu Tubuh Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('suhu_tubuh/tambah') ?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Tambah Data Suhu Tubuh</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- DATA PASIEN -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Pasien
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('pasien') ?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('pasien/tambah') ?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Tambah Data Pasien</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- PANDUAN SYSTEM -->
           <li class="nav-item">
            <a href="<?= base_url('panduan') ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Buku Pandduan
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?= base_url('login/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          <?php if($this->session->userdata('akses_level') == 'Admin'){ ?>
        <!-- DATA USER MENU -->
      <li class="nav-header">ADMIN MENU</li>
        <li class="nav-item has-treeview">
            <a href="<?= base_url('user') ?>" class="nav-link">
               <i class="nav-icon fas fa-lock"></i>
              <p>Data User/Admin
              </p>
            </a>
      </li>
      <?php } ?>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            
          <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
             
             <?php 
              if($this->session->flashdata('sukses')){
              ?>

              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i>
                <?php echo $this->session->flashdata('sukses'); ?>
              </div>

              <?php } ?>

              <!-- validasi error -->
              <?php echo validation_errors('<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i>','</div>') ?>