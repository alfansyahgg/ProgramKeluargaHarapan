<ul class="nav navbar-nav">

<!-- User Account: style can be found in dropdown.less -->
<li>
  <a href="<?= base_url('dashboard/about') ?>">
  	<i class="fa fa-info"></i>
    <span class="hidden-xs">Tentang Kami</span>
  </a>
</li>

<li>

  <a href="<?php if($this->session->role == "warga"){ echo base_url('dashboard/datadiri'); } else{ echo base_url('dashboard/admin/changePsw');  } ?>">
  	<i class="fa fa-user"></i>
    <span class="hidden-xs"><?= $this->session->username ?></span>
  </a>
</li>

<li>
  <a href="<?= base_url('login/logout') ?>">
    <span class="hidden-xs">Logout</span>
  </a>
</li>

</ul>