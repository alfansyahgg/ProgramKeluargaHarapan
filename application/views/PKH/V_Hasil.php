<!DOCTYPE html>
<html>
<head>
 <?php $this->load->view('Layout/header') ?>

  <style type="text/css">

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
        Hasil Seleksi
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="alert alert-<?= $class; ?>  alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-info"></i><?= $teks ?></h4>
          <?= $teks2; ?>
        </div>
        <?php if($status_seleksi != 5): ?>
        <?php foreach($dataSeleksi as $value): ?>  
        <div class="row">
          <div class="col-md-12">            
            <div class="box box-solid">
              <div class="box-header with-border">
                <div style="float: left">                  
                  Nomor <?= $value['id_pkh'] ?>
                </div>
                <?php if($status_seleksi == 0): ?>
                <div style="float: right">                  
                  <a href="<?= base_url('PKH/editDataPkh/').$value['id_pkh'] ?>" class="btn btn-success btn-2x"><i class="fa fa-edit"></i>&nbsp;Edit Data</a>
                </div>
              <?php endif; ?>
              <?php if($status_seleksi == 1 or $status_seleksi == 2): ?>
                <div style="float: right">                  
                  <a href="<?= base_url('PKH/cetak/').$value['id_pkh'] ?>" target="_blank" class="btn btn-danger btn-2x"><i class="fa fa-print"></i>&nbsp;Print PDF</a>
                </div>
              <?php endif; ?>
              </div>
              <div class="box-body">
                <div class="element-main">
                  <p><?= $value['nama'] ?></p>
                </div>
                <div class="row">
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Nomor KK</h5>
                      <p><?= $value['no_kk'] ?></p>
                    </div>
                  </div>
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>NIK</h5>
                      <p><?= $value['nik'] ?></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Tempat Tanggal Lahir</h5>
                      <p><?= $value['tempat_lahir']." / ".date("d F, Y", strtotime($value['tanggal_lahir'])) ?></p>
                    </div>
                  </div>
                  <div class="col-md-6">                    
                    <div class="element">
                      <h5>Alamat</h5>
                      <p><?= $value['alamat'] ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php else: ?>
        <div class="row">          
          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
              <div class="inner">
                <h4>PKH</h4>

                <p>Input Data</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="<?= base_url('PKH/input') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </section>
    <!-- /.content -->
  </div>


  <?php $this->load->view('Layout/footer'); ?>


</div>
<!-- ./wrapper -->

<?php $this->load->view('Layout/jsfooter'); ?>


<script src="<?= base_url('assets/datatables/') ?>datatables.min.js"></script>


<script type="text/javascript">
  $(document).ready(function(){
    $('.tbl-seleksi').DataTable({
      'paging': false
    })
  })
</script>

</body>
</html>
