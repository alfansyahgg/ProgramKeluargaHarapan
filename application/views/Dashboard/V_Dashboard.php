<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('Layout/header') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('Layout/bodyheader') ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php $this->load->view('Layout/sidebar') ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->

    
    <section class="content">

      <div class="row">
        <div class="callout bg-gray">
                  <h4>Informasi</h4>

                  <p>Pemberian bantuan akan diberikan 1 bulan setelah pengumuman. </p>
                </div>
      </div>

    	<div class="row">

        <?php if($this->session->role == "warga"): ?>

          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-menu1">
              <div class="inner">
                <h4>Buku Panduan Warga</h4>

                <p>Panduan Menggunakan Website.</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a target="_blank" href="<?= base_url('assets/buku_panduan/buku_panduan_warga.pdf') ?>" class="small-box-footer">Download <i class="fa fa-download"></i></a>
            </div>
          </div>
          

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-menu2">
            <div class="inner">
              <h4>Data Diri</h4>

              <p>Lengkapi data diri anda</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?= base_url('dashboard/datadiri') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <?php if($dataDiri[0]['status_seleksi'] == 5): ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-menu3">
            <div class="inner">
              <h4>PKH</h4>

              <p>Input Data</p>
            </div>
            <div class="icon">
              <i class="fa fa-plus"></i>
            </div>
            <a href="<?= base_url('PKH/input') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <?php endif; ?>

        <!-- <div class="col-lg-3 col-xs-6"> -->
          <!-- small box -->
          <!-- <div class="small-box bg-red">
            <div class="inner">
              <h4>Pengumuman</h4>

              <p>Lihat Pengumuman</p>
            </div>
            <div class="icon">
              <i class="ion ion-document"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-menu1">
            <div class="inner">
              <h4>Hasil</h4>

              <p>Hasil Seleksi</p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="<?= base_url('PKH/hasil') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <?php else: ?>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-menu1">
              <div class="inner">
                <h4>Buku Panduan Pengelola</h4>

                <p>Panduan Menggunakan Website</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a target="_blank" href="<?= base_url('assets/buku_panduan/buku_panduan_pengelola.pdf') ?>" class="small-box-footer">Download <i class="fa fa-download"></i></a>
            </div>
        </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-menu2">
            <div class="inner">
              <h4>Seleksi</h4>

              <p>Seleksi data warga</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?= base_url('PKH/admin/seleksi') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-menu3">
            <div class="inner">
              <h4>Data Diri</h4>

              <p>Security Purpose</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?= base_url('dashboard/admin/changePsw') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      <?php endif; ?>

      </div>

    </section>
    <!-- /.content -->
  </div>


  <?php $this->load->view('Layout/footer'); ?>



</div>
<!-- ./wrapper -->
<?php $this->load->view('Layout/jsfooter'); ?>

</body>
</html>
