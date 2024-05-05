<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('data_masyarakat') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body mt-3">
        <form
          action="<?= base_url('data_masyarakat/update') ?>"
          method="post"
          role="form">
          <div class="row">
            <input
                type="hidden"
                name="id_users"
                value="<?php echo $this->uri->segment(3); ?>" />
            <div class="form-group col-md-12">
                <label class="control-label">Nama Lengkap</label>
                <input
                class="form-control"
                value="<?= $masyarakat->nama_lengkap ?>"
                name="nama_lengkap"
                type="text"
                autocomplete="off"
                placeholder="Masukan Nama Lengkap" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">NIK</label>
                <input
                class="form-control"
                value="<?= $masyarakat->nik ?>"
                name="nik"
                type="text"
                autocomplete="off"
                placeholder="Masukan NIK" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Username</label>
                <input
                class="form-control"
                value="<?= $masyarakat->username ?>"
                name="username"
                type="text"
                autocomplete="off"
                placeholder="Masukan username" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Password</label>
                <input
                class="form-control"
                value="<?= $this->encryption->decrypt($masyarakat->password) ?>"
                name="password"
                type="text"
                autocomplete="off"
                placeholder="Masukan password" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">No Telepone</label>
                <input
                class="form-control"
                value="<?= $masyarakat->telp ?>"
                name="telp"
                type="number"
                placeholder="Masukan No Telepone" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Level</label>
                <select
                class="form-control"
                id="demoSelect"
                name="level"
                id="level">
                <option value="admin" <?php if ($masyarakat->level == 'admin') echo 'selected'; ?>>Admin
                </option>
                <option value="petugas" <?php if ($masyarakat->level == 'petugas') echo 'selected'; ?>>Petugas
                </option>
                <option value="masyarakat" <?php if ($masyarakat->level == 'masyarakat') echo 'selected'; ?>>Masyarakat
                </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Status</label>
                <select
                class="form-control"
                id="demoSelect"
                name="status"
                id="status">
                <option value="1" <?php if ($masyarakat->status == '1') echo 'selected'; ?>>Aktif
                </option>
                <option value="0" <?php if ($masyarakat->status == '0') echo 'selected'; ?>>Tidak Aktif
                </option>
                </select>
            </div>
          </div>
          <div class="tile-footer">
            <button class="btn btn-warning btn btn-sm" type="submit">
              <i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button
            >
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
