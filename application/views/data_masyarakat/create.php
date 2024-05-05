<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('data_masyarakat') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body mt-3">
        <form action="<?= base_url('data_masyarakat/store') ?>" method="post" role="form">
          <div class="row">
            <div class="form-group col-md-6">
                <label class="control-label">Nama Lengkap</label>
                <input
                class="form-control"
                name="nama_lengkap"
                type="text"
                placeholder="Masukan Nama Lengkap"
                autocomplete="off" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">NIK</label>
                <input
                class="form-control"
                name="nik"
                type="text"
                placeholder="Masukan NIK"
                autocomplete="off" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Username</label>
                <input
                class="form-control"
                name="username"
                type="text"
                placeholder="Masukan Username"
                autocomplete="off" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Password</label>
                <input
                class="form-control"
                name="password"
                type="text"
                placeholder="Masukan Password" 
                autocomplete="off"/>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">No. Telepone</label>
                <input
                class="form-control"
                name="telp"
                type="number"
                placeholder="Masukan No. Telepone"
                autocomplete="off" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Level</label>
                <input
                class="form-control"
                name="level"
                value="masyarakat"
                type="text"
                readonly
                autocomplete="off" />
            </div>
            <!-- status -->
            <input
                class="form-control"
                name="status"
                type="hidden"
                value="1"/>
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary btn btn-sm" type="submit">
              <i class="fa fa-fw fa-lg fa-check-circle"></i>Kirim</button
            >&nbsp;&nbsp;&nbsp;<button
              type="reset"
              class="btn btn-secondary btn-sm">
              <i class="fa fa-times-circle"></i> Reset
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
