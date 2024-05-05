<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('verifikasi_validasi') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <form action="<?= base_url('verifikasi_validasi/update') ?>" method="post" role="form" enctype="multipart/form-data">
        <input type="hidden" name="id_pengaduan" value="<?= $verifikasi_validasi->id_pengaduan ?>">  
        <div class="row">
            <div class="form-group col-md-12">
                <label class="control-label">Isi Tanggapan</label>
                <textarea class="form-control" name="isi_tanggapan" id="isi_tanggapan" placeholder="Masukan pengaduan anda" cols="30" rows="10"><?= $verifikasi_validasi->isi_tanggapan ?></textarea>
            </div>
          </div>
          <div class="tile-footer">
            <button class="btn btn-warning btn btn-sm" type="submit">
              <i class="fa fa-fw fa-lg fa-check-circle"></i>Update Tanggapan</button
            >
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
