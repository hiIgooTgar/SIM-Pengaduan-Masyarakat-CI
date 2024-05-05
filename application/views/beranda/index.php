<style>
  a:hover {
    text-decoration: none;
  }
</style>

<?php if($this->session->userdata('level') == 'admin'){ ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/plugins/sweetalert2.min.css">

<div class="row">
  <div class="col-md-6 col-lg-4">
    <div class="widget-small primary coloured-icon">
      <a href="<?= base_url("data_masyarakat") ?>"><i class="icon fa fa-server fa-3x"></i></a>
      <div class="info">
        <h4>Data Masyarakat</h4>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4">
    <div class="widget-small primary coloured-icon">
      <a href="<?= base_url("verifikasi_validasi") ?>"><i class="icon fa fa-inbox fa-3x"></i></a>
      <div class="info">
        <h4>Verifikasi dan Validasi</h4>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4">
    <div class="widget-small primary coloured-icon">
      <a href="<?= base_url("generate_laporan") ?>"><i class="icon fa fa-book fa-3x"></i></a>
      <div class="info">
        <h4>Generate Laporan</h4>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <h2 style="font-size: 1.5rem; margin-bottom: 0.5rem;">Selamat Datang <span style="font-weight: 600;"><?= $this->session->userdata('nama_lengkap'); ?></span></h2>
        <p>Di Website Aplikasi SIM Pengaduan</p>
      </div>
    </div>
  </div>
</div>

<?php } ?>


<?php if($this->session->userdata('level') == 'masyarakat'){ ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/plugins/sweetalert2.min.css">

<div class="row">
  <div class="col-md-6 col-lg-6">
    <div class="widget-small primary coloured-icon">
      <a style="text-decoration: none;" href="<?= base_url("laporan_pengaduan/create") ?>"><i class="icon fa fa-book fa-3x"></i></a>
      <div class="info">
        <h4>Laporan Pengaduan</h4>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="widget-small primary coloured-icon">
      <a style="text-decoration: none;" href="<?= base_url("laporan_pengaduan") ?>"><i class="icon fa fa-table fa-3x"></i></a>
      <div class="info">
        <h4>Riwayat Pengaduan</h4>
      </div>
    </div>
  </div>

   <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <h2 style="font-size: 1.5rem; margin-bottom: 0.5rem;">Selamat Datang <span style="font-weight: 600;"><?= $this->session->userdata('nama_lengkap'); ?></span></h2>
        <p>Di Website Aplikasi SIM Pengaduan</p>
      </div>
    </div>
  </div>
</div>
<?php } ?>