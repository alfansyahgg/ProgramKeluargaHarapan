<section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <?php if($this->session->role == "admin"): ?>
            <li class="">
              <a href="<?= base_url('index/') ?>">
                <i class="fa fa-files-o"></i>
                <span>Halaman Utama</span>
              </a>
            </li>
            <li class="">
              <a href="<?= base_url('PKH/admin/seleksi') ?>">
                <i class="fa fa-files-o"></i>
                <span>Seleksi</span>
              </a>
            </li>
            <li class="">
              <a href="<?= base_url('dashboard/admin/changePsw') ?>">
                <i class="fa fa-files-o"></i>
                <span>Ubah Password</span>
              </a>
            </li>
            <li class="">
              <a target="_blank" href="<?= base_url('assets/buku_panduan/buku_panduan_pengelola.pdf') ?>">
                <i class="fa fa-files-o"></i>
                <span>Buku Panduan</span>
              </a>
            </li>
        <?php else: ?>
          <li class="">
            <a href="<?= base_url('index/') ?>">
              <i class="fa fa-files-o"></i>
              <span>Halaman Utama</span>
            </a>
          </li>
            <li class="">
              <a href="<?= base_url('dashboard/datadiri') ?>">
                <i class="fa fa-files-o"></i>
                <span>Data Diri</span>
              </a>
            </li>
            <li class="">
              <a href="<?= base_url('PKH/input') ?>">
                <i class="fa fa-files-o"></i>
                <span>Input Data PKH</span>
              </a>
            </li>
            <li class="">
              <a href="<?= base_url('PKH/hasil') ?>">
                <i class="fa fa-files-o"></i>
                <span>Hasil Seleksi</span>
              </a>
            </li>
            <li class="">
              <a target="_blank" href="<?= base_url('assets/buku_panduan/buku_panduan_warga.pdf') ?>">
                <i class="fa fa-files-o"></i>
                <span>Buku Panduan</span>
              </a>
            </li>
         <?php endif; ?>

         <li class="">
            <a href="<?= base_url('login/logout') ?>">
              <i class="fa fa-files-o"></i>
              <span>Logout</span>
            </a>
          </li>
    </ul>
          
    </section>