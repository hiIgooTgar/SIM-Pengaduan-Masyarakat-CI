<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('verifikasi_validasi') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="row">
        <div class="form-group col-md-12">
        <?php if($verifikasi_validasi->foto !=null) { ?>
            <center><img src="<?= base_url('upload/pengaduan/'.$verifikasi_validasi->foto)?>" width="200px"></center>
        <?php } ?>
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Tanggal Pengaduan</label>
            <input
              class="form-control"
              value="<?= $verifikasi_validasi->tgl_pengaduan ?>"
              id="tgl_pengaduan"
              readonly />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">NIK</label>
            <input
              class="form-control"
              value="<?= $verifikasi_validasi->nik ?>"
              id="nik"
              readonly />
        </div>
        <div class="form-group col-md-12">
          <label class="control-label">Isi Laporan</label>
          <textarea readonly class="form-control" name="isi_laporan" id="isi_laporan" cols="30" rows="10"><?= $verifikasi_validasi->isi_laporan ?></textarea>
        </div>
      </div>
      <h3 class="tile-title">Form Tanggapi Laporan</h3>
      <div class="tile-body">
        <form action="<?= base_url('verifikasi_validasi/prosesStore') ?>" method="post" role="form" enctype="multipart/form-data">
        <input type="hidden" name="id_pengaduan" value="<?= $verifikasi_validasi->id_pengaduan ?>">  
        <div class="row">
            <div class="form-group col-md-12">
                <label class="control-label">Isi Tanggapan</label>
                <textarea class="form-control" name="isi_tanggapan" id="isi_tanggapan" placeholder="Masukan pengaduan anda" cols="30" rows="10"></textarea>
            </div>
            <!-- status -->
            <input
              type="hidden"
              name="status"
              value="<?= $verifikasi_validasi->status ?>"
          />

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
