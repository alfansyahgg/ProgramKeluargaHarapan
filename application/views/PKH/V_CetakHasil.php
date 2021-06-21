<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="row">
	  <div class="column1">
	  	<img style="width: 120px;height: 150px;" src="<?= base_url('assets/images/semarang.jpg') ?>">
	  </div>
	  <div class="column2">
	  	<h2>E-SOSIAL ASSISTANCE DATA</h2>
	  	<p style="font-weight: bold;text-align: center;font-size: 20px;line-height: 0.5">SATONEN TIMUR</p>
	  	<div style="line-height: 0.5">
	  		<p style="font-weight: bold;text-align: center;">Satonen Timur RT 07 RW 09 Gajahmungkur</p>

		  	<p style="font-weight: bold;text-align: center;">Kabupaten Semarang, Provinsi Jawa Tengah</p>

		  	<p style="font-weight: bold;text-align: center;">Telp. RT: 0823-2606-5503</p>
	  	</div>
	  	
	  </div>
	  <div class="column3">	  	
	  	<img style="width: 120px;height: 150px;margin-left: 20px;" src="<?= base_url('assets/images/logosim.jpg') ?>">
	  </div>
	</div>

	<div>
		<p style="float: left;width: 85%">&nbsp;</p>
		<div style="float: right;">Semarang</div>
	</div>

	<div>
		<div style="font-size: 17px">Yang bertanda tangan di bawah ini</div>
		<table style="font-size: 17px;margin-top: 5px;">
			<tr>
				<td style="width: 25%;text-align: left;">Nama</td>
				<td style="width: 5%">:</td>
				<td style="width: 60%;text-align: left;"><?= $dataSeleksi[0]['nama_admin'] ?></td>
			</tr>
			<tr>
				<td style="width: 25%;text-align: left;">Jabatan</td>
				<td style="width: 5%">:</td>
				<td style="width: 60%;text-align: left;"><?= $dataSeleksi[0]['jabatan_admin'] ?></td>
			</tr>
		</table>

		<div style="margin-top: 45px;">			
			<div style="font-size: 17px">Menyatakan bahwa</div>
			<table style="font-size: 17px;">			
				<tr>
					<td style="width: 25%;text-align: left;">Nama</td>
					<td style="width: 5%">:</td>
					<td style="width: 60%;text-align: left;"><?= $dataSeleksi[0]['nama'] ?></td>
				</tr>

				<tr>
					<td style="width: 25%;text-align: left;">Nomor PKH</td>
					<td style="width: 5%">:</td>
					<td style="width: 60%;text-align: left;"><?= $dataSeleksi[0]['id_pkh'] ?></td>
				</tr>
				<tr>
					<td style="width: 25%;text-align: left;">TTL</td>
					<td style="width: 5%">:</td>
					<td style="width: 60%;text-align: left;"><?= ucfirst(strtolower($dataSeleksi[0]['tempat_lahir'])).', '.$dataSeleksi[0]['string_tanggal_lahir'] ?></td>
				</tr>
				<tr>
					<td style="width: 25%;text-align: left;">Jenis Kelamin</td>
					<td style="width: 5%">:</td>
					<td style="width: 60%;text-align: left;"><?php if($dataSeleksi[0]['jeniskelamin'] == "L"){echo "Laki-Laki";}else{echo "Perempuan";} ?></td>
				</tr>
			</table>
		</div>

		<?php if($dataSeleksi[0]['status_seleksi'] == 1): ?>
		<div style="margin-top: 50px;width: 150px;height: 50px;background-color: #548235;color: white;text-align: center;vertical-align: middle;line-height: 50px;font-size: 25px">
			<div>Lolos</div>
		</div>
		<?php else: ?>
		<div style="margin-top: 50px;width: 150px;height: 50px;background-color: #eb3232;color: white;text-align: center;vertical-align: middle;line-height: 50px;font-size: 25px">
			<div>Tidak Lolos</div>
		</div>
	<?php endif; ?>


		<div style="margin-top: 20px;font-size: 17px">
			<?php if($dataSeleksi[0]['status_seleksi'] == 1): ?>
				Selamat Anda lolos. Harap membawa bukti surat pernyataan ini kepada panitia
saat menerima bantuan. Demikian surat pernyataan ini dibuat. Terima kasih				
			<?php else: ?>
				Maaf Anda tidak lolos dalam seleksi bantuan sosial. Demikian surat pernyataan
ini dibuat. Terima kasih 
			<?php endif; ?>

		</div>

		<div style="margin-top: 50px">
			<table style="font-size: 17px;width: 100%;">
				<tr>
					<td style="width: 80%;text-align: right;"></td>
					<td>Panitia,</td>
				</tr>
			</table>

			<table style="font-size: 17px;width: 100%;margin-top: 60px">
				<tr>
					<td style="width: 70%;text-align: right;"></td>
					<td>(_______________________)</td>
				</tr>
			</table>
		</div>

	</div>
</body>
</html>
