<header class="app-header"><a class="app-header__logo" href="<?= base_url('beranda'); ?>">Sim Pengaduan</a>
  <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
  <ul class="app-nav">
      <li class="app-search">
      <input class="app-search__input" type="search" placeholder="Search">
      <button class="app-search__button"><i class="fa fa-search"></i></button>
      </li>
  
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <?php
          if($this->session->userdata('level') == 'admin') {
        ?>
          <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
        <?php } ?>
          <li><a class="dropdown-item" href="<?= base_url('profile_users') ?>"><i class="fa fa-user fa-lg"></i> Profile</a></li>
      </ul>
      </li>
  </ul>
</header>

