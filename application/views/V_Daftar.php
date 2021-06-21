<!DOCTYPE html>
<html>
<head>
	<title>Buat Akun</title>

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/sweet-alert/sweetalert2.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/custom/css/custom-nav.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fontawesome/css/font-awesome.min.css') ?>">

	<style type="text/css">
		.content{
			padding: 15px;
		}

		.content .formdaftar{
			max-width: 50%;
			margin: 0 auto;
		}

		@media only screen and (max-width: 992px){
	        .content .formdaftar{
				max-width: 100%;
				margin: 0 auto;
			}
      }
	</style>

</head>
<body>

	<?php $this->load->view('Layout/custom-navbar.php') ?>

	<div class="container">
		<div class="content">
			<h1 style="text-align: center;">Daftar Akun</h1>
			<hr>

			<div class="formdaftar">
				<form id="form-daftar" method="post" action="<?= base_url('daftar/action') ?>">

				  <div class="form-group">
				  	 <?php if(validation_errors() != ""): ?>
						<div class="alert alert-danger">
							<?php echo form_error('nik'); ?>		
						</div>
					<?php endif; ?>
				    <label>NIK</label>
				    <input type="text" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan">
				  </div>

				  <div class="form-group">
				  	<?php if(validation_errors() != ""): ?>
						<div class="alert alert-danger">
							<?php echo form_error('nama'); ?>		
						</div>
					<?php endif; ?>
				    <label>Nama</label>
				    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
				  </div>

				  <div class="form-group">
				  	<?php if(validation_errors() != ""): ?>
						<div class="alert alert-danger">
							<?php echo form_error('tanggal_lahir'); ?>		
						</div>
					<?php endif; ?>
				    <label>Tanggal Lahir</label>
				    <input type="date" class="form-control" name="tanggal_lahir">
				  </div>

				  <div class="form-group">
				  	<?php if(validation_errors() != ""): ?>
						<div class="alert alert-danger">
							<?php echo form_error('nohp'); ?>		
						</div>
					<?php endif; ?>
				    <label>No. HP</label>
				    <input type="number" class="form-control" name="nohp" placeholder="0812345678">
				  </div>	

				</form>
				<button class="btn btn-success btn-kirim" style="float: right;"  type="button">Submit</button>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="<?= base_url('assets/jquery/jquery-3.3.1.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/sweet-alert/sweetalert2.all.min.js') ?>"></script>


	
	<script type="text/javascript">
		$(document).ready(function(){
			$(".btn-kirim").on('click',function(){
				Swal.fire({
				  title: 'Submit Data?',
				  text: "Pastikan Data yang Diisikan Sudah Benar!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Ya, Submit!'
				}).then((result) => {
				  if (result.value) {
				  	$("form").submit();
				  }
				})
			})
		})
	</script>
</body>
</html>