<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('data_masyarakat') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Atas Nama, <?= $masyarakat->nama_lengkap ?></h3>
      <div class="tile-body row">
        <div class="form-group col-md-12">
          <label class="control-label">Nama Lengkap</label>
            <input
              class="form-control"
              value="<?= $masyarakat->nama_lengkap ?>"
              id="nama_lengkap"
              disabled="" />
        </div>
        <div class="form-group col-md-12">
          <label class="control-label">NIK</label>
            <input
              class="form-control"
              value="<?= $masyarakat->nik ?>"
              id="nik"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Username</label>
            <input
              class="form-control"
              value="<?= $masyarakat->username ?>"
              id="username"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Password</label>
            <input
              class="form-control"
              value="<?=  $this->encryption->decrypt($masyarakat->password) ?>"
              id="password"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">No Telepone</label>
            <input
              class="form-control"
              value="<?= $masyarakat->telp ?>"
              id="telp"
              disabled="" />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Level</label>
            <input
              class="form-control"
              value="<?= $masyarakat->level ?>"
              id="level"
              disabled="" />
        </div>
      </div>
    </div>
  </div>
</div>
