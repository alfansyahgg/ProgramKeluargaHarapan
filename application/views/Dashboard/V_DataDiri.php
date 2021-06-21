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

    	<h3>Data Diri</h3>
    	<small>Mohon lengkapi data diri anda.</small>
    	<hr>

    	<div class="form-data-diri">
    		<?php foreach ($dataDiri as $key => $value)?>
    		<form method="post" action="<?= base_url('dashboard/datadiri/update') ?>">
    			<div class="form-group">
    				<label>NIK</label>
    				<input type="text" name="nik" class="form-control" value="<?= $value['nik'] ?>">
    			</div>
          <div class="form-group">
            <label>Nomor Kartu Keluarga</label>
            <input type="text" name="no_kk" class="form-control" value="<?= $value['no_kk'] ?>">
          </div>
    			<div class="form-group">
    				<label>Nama Lengkap</label>
    				<input type="text" name="nama" class="form-control"  value="<?= $value['nama'] ?>" required>
    			</div>    			
    			<div class="form-group">
    				<label>Tempat Lahir</label>
    				<input type="text" name="tempat_lahir" class="form-control"  value="<?= $value['tempat_lahir'] ?>" required>
    			</div>
    			<div class="form-group">
    				<label>Tanggal Lahir</label>
    				<input type="date" name="tanggal_lahir" class="form-control"  value="<?= $value['tanggal_lahir'] ?>" required>
    			</div>
          <div>
            <div class="form-group">
            <label>Jenis Kelamin</label>
              <div class="radio">
                <label>
                  <input type="radio" name="jeniskelamin" id="" value="L" <?php if($value['jeniskelamin'] == "L"){echo "checked";}  ?>>
                  Laki - Laki
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="jeniskelamin" id="" <?php if($value['jeniskelamin'] == "P"){echo "checked";}  ?>>
                  Perempuan
                </label>
              </div>
          </div>
          </div>
    			<div class="form-group">
    				<label>Nomor HP</label>
    				<input type="number" name="no_hp" class="form-control"  value="<?= $value['no_hp'] ?>">
    			</div>
    			<div class="form-group">
    				<label>Alamat</label>
    				<input type="text" name="alamat" class="form-control"  value="<?= $value['alamat'] ?>" required>
    			</div>
    			<button type="submit" class="btn btn-success">Submit</button>
    		</form>
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
