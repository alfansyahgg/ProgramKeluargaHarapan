<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('Layout/header') ?>

  <style type="text/css">

    .swal2-popup {
      font-size: 1.6rem !important;
    }

    .input-text{
        width: 60%;
      }

      .element-main p{
        font-size: 24px;
        padding-bottom: 15px;
      }

      .element h5{
        font-weight: bold;
      }

      .element p{
        font-size: 18px;
      }

    @media only screen and (max-width: 992px){
      .input-text{
        width: 100%;
      }

      .button-sect .row form div{
        padding-top: 10px;
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
        Edit Data PKH
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <?php foreach($dataSeleksi as $value): ?>  
        <div class="row">
          <div class="col-md-12">
            <div class="box box-solid">
              <div class="box-header with-border">
                Nomor <b><?= $value['id_pkh'] ?></b>
              </div>
              <div class="box-body">
                <div class="element-main">
                  <p><?= $value['nama'] ?></p>
                </div>

                <div class="row">
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Nomor KK</h5>
                    </div>                    
                      <p><?= $value['no_kk'] ?></p>
                  </div>
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>NIK</h5>
                    </div>                    
                      <p><?= $value['nik'] ?></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Tempat /  Tanggal Lahir</h5>                      
                    </div>
                    <p><?= ucfirst(strtolower($value['tempat_lahir']))." / ".date("d F, Y", strtotime($value['tanggal_lahir'])) ?></p>
                  </div>
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Alamat</h5>
                    </div>
                      <p><?= $value['alamat'] ?></p>
                  </div>
                </div>

              <!-- form -->
              <form method="post" action="<?= base_url('PKH/updateDataPkh'); ?>" enctype="multipart/form-data" >
                <input type="hidden" name="id" value="<?= $value['id_pkh'] ?>">
                <input type="hidden" name="nik" value="<?= $value['nik'] ?>">
                <div class="row">
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Status Bekerja</h5>
                    </div>
                    <div class="form-group">
                        <div class="radio">
                          <label>
                            <input type="radio" name="status_bekerja" id="tidak_bekerja" value="0" <?php if($value['status_bekerja'] == 0){ echo "checked"; } ?> >
                            Tidak Bekerja
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="status_bekerja" id="bekerja" value="1" <?php if($value['status_bekerja'] == 1){ echo "checked"; } ?>>
                            Bekerja
                          </label>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Penghasilan</h5>
                    </div>
                    <?php if($value['penghasilan'] != 0): ?>
                      <div class="radio">
                        <label>
                          <input type="radio" name="penghasilan" id="500" value="500" <?php if($value['penghasilan'] == '500'){ echo "checked"; } ?>>
                          Kurang dari 500.000
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="penghasilan" id="1000" value="1000" <?php if($value['penghasilan'] == '1000'){ echo "checked"; } ?>>
                          500.000 s.d 1.000.000
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="penghasilan" id="1500" value="1500" <?php if($value['penghasilan'] == '1500'){ echo "checked"; } ?>>
                          1.000.000 s.d 1.500.000
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="penghasilan" id="2000" value="2000" <?php if($value['penghasilan'] == '2000'){ echo "checked"; } ?>>
                          1.500.000 s.d 2.000.000
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="penghasilan" id="2500" value="2500" <?php if($value['penghasilan'] == '2500'){ echo "checked"; } ?>>
                          2.000.000 s.d 2.500.000
                        </label>
                      </div>
                    <?php else: ?>
                      <p> - </p>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Kondisi Rumah</h5>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="kondisi_rumah" id="kondisi_baik" value="2" <?php if($value['kondisi_rumah'] == 2){ echo "checked"; } ?>>
                        Baik
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="kondisi_rumah" id="kondisi_cukup" value="1" <?php if($value['kondisi_rumah'] == 1){ echo "checked"; } ?>>
                        Cukup Baik
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="kondisi_rumah" id="kondisi_kurang" value="0" <?php if($value['kondisi_rumah'] == 0){ echo "checked"; } ?>>
                        Kurang Baik
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Kepemilikan Rumah</h5>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="kepemilikan_rumah" id="milik_sendiri" value="Milik Sendiri" <?php if($value['kepemilikan_rumah'] == 'Milik Sendiri'){ echo "checked"; } ?> >
                          Milik Sendiri
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="kepemilikan_rumah" id="milik_kontrak" value="Kontrak" <?php if($value['kepemilikan_rumah'] == 'Kontrak'){ echo "checked"; } ?>>
                          Kontrak
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="kepemilikan_rumah" id="milik_sewa" value="Sewa" <?php if($value['kepemilikan_rumah'] == 'Sewa'){ echo "checked"; } ?>>
                          Sewa
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="Kepemilikan_rumah" id="milik_aparat" value="Tanah Bengkok" <?php if($value['kepemilikan_rumah'] == 'Tanah Bengkok'){ echo "checked"; } ?>>
                          Rumah di atas tanah aparat desa (tanah bengkok)
                        </label>
                      </div>
                    </div>
                  </div>

                <div class="row">
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Jumlah Tanggungan</h5>
                    </div>
                    <input class="form-control" style="width: 50%;" type="numver" name="tanggungan" value="<?= $value['jumlah_tanggungan']; ?>">
                  </div>                  
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Tanggal Input</h5>
                    </div>                    
                      <p><?= $value['tanggal_indo']; ?></p>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">                    
                      <div class="element">
                        <h5>Foto KK</h5>
                      </div>
                      <input type="file" name="foto_kk">
                      <a style="font-weight: bold;text-decoration: underline;" target="_blank" href="<?= base_url("uploads/foto_kk/".$value['nik']."/".$value['scan_kk']) ?>">
                        Lihat Gambar
                      </a>
                    </div>
                    <div class="col-md-6">                    
                      <div class="element">
                        <h5>Foto Wakil</h5>
                        </div>
                        <input type="file" name="foto_wakil">
                        <a style="font-weight: bold;text-decoration: underline;" target="_blank" href="<?= base_url("uploads/foto_kk/".$value['nik']."/".$value['foto_wakil']) ?>">
                        Lihat Gambar
                      </a>
                      </div>
                  </div>

                  <hr>

                  <button class="btn btn-success btn-submit" type="button">Submit</button>
                </form>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </section>
    <!-- /.content -->
  </div>


  <?php $this->load->view('Layout/footer'); ?>


</div>
<!-- ./wrapper -->

<?php $this->load->view('Layout/jsfooter'); ?>


<script src="<?= base_url('assets/datatables/') ?>datatables.min.js"></script>

  <script type="text/javascript" src="<?= base_url('assets/sweet-alert/sweetalert2.all.min.js') ?>"></script>

<script type="text/javascript">
  $(document).ready(function(){
      $('input[type=radio][name=status_bekerja]').change(function() {
        if(this.value == '0'){
          $("input[name=penghasilan]").val('0');
            $("input[name=penghasilan]").prop('disabled',true);
        }
        else if (this.value == '1') {
             $("input[name=penghasilan]").prop('disabled',false);
        }
    });


      $(".btn-submit").on('click',function(){
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
