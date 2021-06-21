<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('Layout/header') ?>

  <style type="text/css">

    .input-text{
        width: 60%;
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
        Menu Seleksi
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="table-responsive">
          <table class="table table-striped table-bordered tbl-seleksi">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor PKH</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Tempat / Tanggal Lahir</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($seleksi as $value): ?>
                <tr>
                  <td><?= $no++;  ?></td>                  
                  <td><?= $value['id_pkh']; ?></td>
                  <td><?= $value['nama']; ?></td>
                  <td><?= $value['nik']; ?></td>
                  <td><?= ucfirst(strtolower($value['alamat'])); ?></td>
                  <td><?= ucfirst(strtolower($value['tempat_lahir']))." / ".date("d F, Y", strtotime($value['tanggal_lahir'])) ?></td>
                  <td>
                    <?php 
                      if($value['status_seleksi'] == 1){
                        echo "<span class='label label-success'>Diterima</span>";
                      }elseif ($value['status_seleksi'] == 2) {
                        echo "<span class='label label-danger'>Ditolak</span>";
                      }elseif ($value['status_seleksi'] == 0) {
                        echo "<span class='label label-warning'>Belum Diseleksi</span>";
                      }else{
                        echo "<span class='label label-default'>Belum Input</span>";
                      }

                    ?>
                    
                  </td>
                  <td>
                    <a class="btn btn-primary" href="<?= base_url('PKH/seleksi/detail?id_pkh='.$value['id_pkh']) ?>">Detail</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
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
