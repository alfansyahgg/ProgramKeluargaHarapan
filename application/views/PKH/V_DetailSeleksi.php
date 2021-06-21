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
        Detail Seleksi
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

                <div class="row">
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Status Bekerja</h5>
                    </div>
                      <p>
                        <?php if($value['status_bekerja'] == 1){
                          echo "Bekerja";
                        }else{
                          echo "Tidak Bekerja";
                        } ?>
                      </p>
                  </div>
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Penghasilan</h5>
                    </div>
                      <p>
                        <?php if($value['penghasilan'] == 500){
                          echo "Kurang dari 500.000";
                        }elseif ($value['penghasilan'] == 1000) {
                           echo "500.000 - 1.000.0000";
                        }elseif ($value['penghasilan'] == 1500) {
                          echo "1.000.000 - 1.500.0000";
                        }elseif ($value['penghasilan'] == 2000) {
                          echo "1.500.000 - 2.000.0000";
                        }elseif ($value['penghasilan'] == 2500) {
                          echo "2.000.000 - 2.500.0000";
                        }else{
                          echo "-";
                        } ?>
                          
                        </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Kondisi Rumah</h5>
                    </div>
                    <p>                
                      <?php if($value['kondisi_rumah'] == 0){
                          echo "Kurang Baik";
                        }elseif ($value['kondisi_rumah'] == 1) {
                           echo "Cukup Baik";
                        }else{
                          echo "Baik";
                        } ?>
                      </p>
                  </div>
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Kepemilikan Rumah</h5>
                      </div>
                      <p><?= $value['kepemilikan_rumah']; ?></p>
                    </div>
                  </div>

                <div class="row">
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Jumlah Tanggungan</h5>
                    </div>
                    <p>                
                      <?= $value['jumlah_tanggungan']; ?>
                      </p>
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
                      <a style="font-weight: bold;text-decoration: underline;" target="_blank" href="<?= base_url("uploads/foto_kk/".$value['nik']."/".$value['scan_kk']) ?>">
                        Lihat Gambar
                      </a>
                    </div>
                    <div class="col-md-6">                    
                      <div class="element">
                        <h5>Foto Wakil</h5>
                        </div>
                        <a style="font-weight: bold;text-decoration: underline;" target="_blank" href="<?= base_url("uploads/foto_kk/".$value['nik']."/".$value['foto_wakil']) ?>">
                        Lihat Gambar
                      </a>
                      </div>
                  </div>

                  <hr>

                  <div class="button-sect">
                    <div class="row">
                      <form method="post" action="<?= base_url('PKH/seleksi/formseleksi'); ?>">
                        <input type="hidden" name="id" value="<?= $value['id_pkh'] ?>" >
                        <input type="hidden" name="status" >
                      <div class="col-md-2">
                        <button type="button" value="1" class="btn btn-success btn-status" style="width: 100%;"><i class="fa fa-check"></i>&nbsp;Terima</button>
                      </div>
                      <div class="col-md-2">
                        <button type="button" value="2" class="btn btn-danger btn-status" style="width: 100%;"><i class="fa fa-times"></i>&nbsp;Tolak</button>
                      </div>
                    </div>
                    </form>
                  </div>


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
      $(".btn-status").on('click',function(){
        Swal.fire({
          title: 'Inputkan data?',
          text: "Pastikan anda suda memeriksa data!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya!'
        }).then((result) => {
          if (result.value) {
            if($(this).val() == '1'){
              $("input[name=status]").val('1');
            }else{
              $("input[name=status]").val('2');
            }

            $("form").submit();
          }
        })
      })
    })
  </script>

</body>
</html>
