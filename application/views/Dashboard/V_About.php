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

    	<h3>Tentang Kami</h3>
    	<hr>

      <div class="image">
        <img style="width: 250px;height: 250px;margin: auto;display: block;" src="<?= base_url('assets/images/logosim.png') ?>">
      </div>

    	<div>
        <h4>Visi</h4>
        <ul>
          <li>Menciptakan kepedulian terhadap sesama.</li>
          <li>Membantu bagi mereka yang berhak menerima bantuan.</li>
          <li>Memulihkan perekonomian negara</li>
          <li>Melakukan Penyuluhan dibidang sosial, Pelatihan dan Workshop.</li>
        </ul>
        <br>

        <h4>Misi</h4>
        <ul>
          <li>Ikut serta membatu pemerintah di bidang sosial.</li>
          <li>Meringankan kebutuhan pokok ditengah pandemi.</li>
          <li>Menjalin hubungan yang sehat antara lembaga dengan Instansi Pemerintah dan Anggota masyarakat.</li>
          <li>Mengembangkan, mensosialisasikan dan menyalurkan amanah yang telah kami emban.</li>
        </ul>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->








  <?php $this->load->view('Layout/footer'); ?>

  
</div>
<!-- ./wrapper -->

<?php $this->load->view('Layout/jsfooter'); ?>
</body>
</html>
