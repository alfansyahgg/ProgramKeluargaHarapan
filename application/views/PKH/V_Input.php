<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('Layout/header') ?>

  <style type="text/css">

    .input-text{
        width: 60%;
      }

    .form-group{
      padding: 15px 0;
    }

    @media only screen and (max-width: 992px){
      .input-text{
        width: 100%;
      }
      }
  </style>

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
        Bantuan PKH
      </h1>
      <hr>
      <p>
        Jenis bantuan :
          <ull>
            <li>Sembako: Beras, Telur, Gula, Teh, Kopi, Sarden</li>
            <li>Uang: Rp500.000,-</li>
          </ull>
      </p>
      <hr>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="content-form">
        <?php if(!empty($error)): ?>
        <div class="alert-error"> 
          <?php echo $error;?>
        </div>
      <?php endif; ?>
        <form method="post" enctype="multipart/form-data" action="<?= base_url('PKH/inputDataPKH') ?>">
          <div class="form-group">
            <label>Nomor KK</label>
            <input type="text" name="no_kk" class="form-control input-text" value="<?= $dataDiri[0]["no_kk"] ?>" required>
          </div>
          <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control input-text" value="<?= $dataDiri[0]["nik"] ?>" required>
          </div>
          <div class="form-group">
              <label>Scan / Foto Kartu Keluarga</label>
              <input type="file" name="foto_kk" required>
          </div>
          <div class="form-group">
            <label>Status Bekerja</label>
              <div class="radio">
                <label>
                  <input type="radio" name="status_bekerja" id="tidak_bekerja" value="0">
                  Tidak Bekerja
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="status_bekerja" id="bekerja" value="1">
                  Bekerja
                </label>
              </div>
          </div>
          <div class="form-group d_penghasilan">
            <label>Penghasilan</label>
              <div class="radio">
                <label>
                  <input type="radio" name="penghasilan" id="500" value="500" disabled>
                  Kurang dari 500.000
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="penghasilan" id="1000" value="1000" disabled>
                  500.000 s.d 1.000.000
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="penghasilan" id="1500" value="1500" disabled>
                  1.000.000 s.d 1.500.000
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="penghasilan" id="2000" value="2000" disabled>
                  1.500.000 s.d 2.000.000
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="penghasilan" id="2500" value="2500" disabled>
                  2.000.000 s.d 2.500.000
                </label>
              </div>
          </div>
          <div class="form-group">
            <label>Jumlah Tanggungan</label>
            <input type="number" name="tanggungan" class="form-control input-text" placeholder="0">
          </div>
          <div class="form-group">
            <label>Kondisi Rumah</label>
              <div class="radio">
                <label>
                  <input type="radio" name="kondisi_rumah" id="kondisi_baik" value="2" checked>
                  Baik
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="kondisi_rumah" id="kondisi_cukup" value="1">
                  Cukup Baik
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="kondisi_rumah" id="kondisi_kurang" value="0">
                  Kurang Baik
                </label>
              </div>
          </div>
          <div class="form-group">
            <label>Kepemilikan Rumah</label>
              <div class="radio">
                <label>
                  <input type="radio" name="kepemilikan_rumah" id="milik_sendiri" value="Milik Sendiri" checked>
                  Milik Sendiri
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="kepemilikan_rumah" id="milik_kontrak" value="Kontrak">
                  Kontrak
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="kepemilikan_rumah" id="milik_sewa" value="Sewa">
                  Sewa
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="Kepemilikan_rumah" id="milik_aparat" value="Tanah Bengkok">
                  Rumah di atas tanah aparat desa (tanah bengkok)
                </label>
              </div>
          </div>
          <div class="form-group">
              <label>Foto Wakil Keluarga</label>
              <input type="file" name="foto_wakil" required>
          </div>

          <br>
          <button class="btn btn-success">Submit Data</button>
        </form>
      </div>

    </section>
    <!-- /.content -->
  </div>


  <?php $this->load->view('Layout/footer'); ?>


</div>
<!-- ./wrapper -->

<?php $this->load->view('Layout/jsfooter'); ?>

<script type="text/javascript">
  $(document).ready(function(){
      $('input[type=radio][name=status_bekerja]').change(function() {
        if(this.value == '0'){
            $("input[name=penghasilan]").prop('disabled',true);
        }
        else if (this.value == '1') {
             $("input[name=penghasilan]").prop('disabled',false);
        }
    });
  })
  
</script>

</body>
</html>
