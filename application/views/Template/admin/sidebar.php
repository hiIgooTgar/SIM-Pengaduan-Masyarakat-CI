<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <img class="app-sidebar__user-avatar" src="<?= base_url('assets/images/kandidat/user.png') ?>" width="50" height="50" alt="User Image">
    <!-- menambahkan class baru yaitu app-sidebar__user-info dan style.nya  -->
    <div class="app-sidebar__user-info">
      <style>
        .app-sidebar__user-info {
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          }
      </style>
      <p class="app-sidebar__user-name"><?= $this->session->userdata('nama_lengkap'); ?></p>
      <p class="app-sidebar__user-designation"><?= $this->session->userdata('nik') ?></p>
    </div>
  </div>


<ul class="app-menu">
  <li><a class="app-menu__item" href="<?= base_url('beranda'); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li> 
  <?php
// Mengurutkan menu berdasarkan kolom 'urut'
usort($menu, function($a, $b) {
    return $a->urut - $b->urut;
});

foreach($menu as $m) { 
    if($this->session->userdata('level') == $m->role){
        if($m->parent == 0){ // Tambahkan kondisi untuk parent = 0
            $submenu = $this->db->get_where('tbl_menu', array('parent' => $m->id_menu))->result();
            if (empty($submenu)) { // Jika tidak memiliki submenu, langsung tampilkan menu
?>
                <li>
                    <a class="app-menu__item" href="<?= base_url($m->url_menu); ?>">
                        <i class="app-menu__icon <?= $m->icon_menu ?>"></i>
                        <span class="app-menu__label"><?= $m->nama_menu ?></span>
                    </a>
                </li>
<?php
            } else { // Jika memiliki submenu, tampilkan menu dengan submenu
?>
                <li class="treeview <?= ($this->uri->segment(2) == $m->url_menu) ? 'is-expanded' : ''; ?>">
                    <a class="app-menu__item" href="<?= base_url($m->url_menu); ?>" data-toggle="treeview">
                        <i class="app-menu__icon <?= $m->icon_menu ?>"></i>
                        <span class="app-menu__label"><?= $m->nama_menu ?></span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <?php
                      // Mengurutkan submenu berdasarkan kolom 'urut'
                      usort($submenu, function($a, $b) {
                          return $a->urut - $b->urut;
                      });

                      foreach($submenu as $sb) { ?>
                          <li>
                              <a class="treeview-item <?php echo ($this->uri->segment(2) == $sb->url_menu) ? 'active' : ''; ?>" href="<?= base_url($sb->url_menu); ?>">
                                  <i class="icon fa fa-circle-o"></i> <?= $sb->nama_menu ?>
                              </a>
                          </li>
                      <?php } ?>
                  </ul>
                </li>
<?php 
            }
        } else { // Jika parent != 0, tambahkan menu langsung tanpa sub menu
?>
            <li>
                <a class="app-menu__item" href="<?= base_url($m->url_menu); ?>">
                    <i class="app-menu__icon <?= $m->icon_menu ?>"></i>
                    <span class="app-menu__label"><?= $m->nama_menu ?></span>
                </a>
            </li>
<?php
        }
    }
}
?>

  <li>
    <a class="app-menu__item" href="<?= base_url('logout'); ?>" onclick="confirmLogout(event, '<?= base_url('logout') ?>');">
      <i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label"><span>Logout</span></a>
  </li>
</ul>
</aside>

