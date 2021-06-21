<!DOCTYPE html>
<html>
<head>
	<title>Hasil Daftar</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/sweet-alert/sweetalert2.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/custom/css/custom-nav.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fontawesome/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/sansation/style.css') ?>">
	<style type="text/css">
		
		.content{
		    line-height: 33px;
			padding-top: 50px;

			text-align: center;
		}

	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-custom">
	  <a class="navbar-brand" href="<?= base_url('index') ?>">E-SCAD</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon">
	    	<i class="fa fa-bars" style="color:#fff; font-size:28px;"></i>
	    </span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Login</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	<div class="container" style="">
		<div class="content">
			<h2>Selamat, akun anda sudah terdaftar.</h2>
			<img style="width: 200px;height: 200px" src="<?= base_url('assets/images/ceklist.gif') ?>">
			<p>Gunakan data berikut untuk login ke akun anda.</p>
			<p>PENTING, mohon catat data berikut.</p>
			<div class="table-responsive" style="margin: 25px 0">				
				<table style="margin: 0 auto;width: 50%;" class="table table-striped table-bordered table-hover">
					<tr>
						<td>NIK</td>
						<td> : </td>
						<td style="text-align: left"><?= $this->session->flashdata('nik') ?></td>
					</tr>
					<tr>
						<td>Password</td>
						<td> : </td>
						<td style="text-align: left"><?= $this->session->flashdata('password') ?></td>
					</tr>
				</table>
			</div>
			<a class="btn btn-success" target="_blank" href="<?= base_url('login/') ?>"> <i class="fa fa-check"></i> Login Sekarang</a>
		</div>
	</div>

	<script type="text/javascript" src="<?= base_url('assets/jquery/jquery-3.3.1.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/sweet-alert/sweetalert2.all.min.js') ?>"></script>
</body>
</html>