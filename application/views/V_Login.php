<!DOCTYPE html>
<html lang="en">
<head>
	<title>E-SCAD - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.png') ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginv8/') ?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginv8/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginv8/') ?>vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginv8/') ?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginv8/') ?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginv8/') ?>vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginv8/') ?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginv8/') ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginv8/') ?>css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" action="<?= base_url('login/act') ?>" class="login100-form validate-form p-l-55 p-r-55 p-t-178" autocomplete="off">
					<span class="login100-form-title">
						E-SCAD
					</span>

					<!-- <img style="width: 200px;height: 200px;" src="<?= base_url('assets/images/logosim.jpg') ?>"> -->

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="nik" placeholder="NIK">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Belum punya akun?
						</span>

						<a href="<?= base_url('daftar/') ?>" class="txt3">
							Daftar Sekarang!
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="<?= base_url('assets/loginv8/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/loginv8/') ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/loginv8/') ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url('assets/loginv8/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/loginv8/') ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/loginv8/') ?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url('assets/loginv8/') ?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/loginv8/') ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/loginv8/') ?>js/main.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/sweet-alert/sweetalert2.all.min.js') ?>"></script>

	<?php if(!empty($this->session->flashdata('status'))): ?>
	<script>
		$(document).ready(function(){
			Swal.fire('Gagal','Username atau password salah!','error');
		})
	</script>
	<?php endif; ?>

</body>
</html>