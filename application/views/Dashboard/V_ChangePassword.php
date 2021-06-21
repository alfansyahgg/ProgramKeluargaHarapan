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
        Data Diri.
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="row">          

          <div class="form-data-diri content">
            <?php foreach ($status_admin as $key => $value)?>
            <form method="post" action="<?= base_url('dashboard/admin/changePassword') ?>">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required value="<?=$value['nama'] ?>">
              </div>
              <hr>
              <div class="form-group">
                <?php if(validation_errors() != ""): ?>
                  <div class="alert alert-danger">
                    <?php echo form_error('password'); ?>    
                  </div>
                <?php endif; ?>
                <label>Password Baru</label>
                <input type="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                <?php if(validation_errors() != ""): ?>
                  <div class="alert alert-danger">
                    <?php echo form_error('passconf'); ?>    
                  </div>
                <?php endif; ?>
                <label>Konfirmasi Password Baru</label>
                <input type="password" name="passconf" class="form-control">
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->








  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <?php $this->load->view('Layout/footer'); ?>
</div>
<!-- ./wrapper -->

<?php $this->load->view('Layout/jsfooter'); ?>
</body>
</html>
