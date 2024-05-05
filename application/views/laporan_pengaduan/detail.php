<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('laporan_pengaduan') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body row mt-3">
        <div class="form-group col-md-12">
            <?php if($laporan_pengaduan->foto !=null) { ?>
                <center><img src="<?= base_url('upload/pengaduan/'.$laporan_pengaduan->foto)?>" width="200px"></center>
            <?php } ?>
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Tanggal Pengaduan</label>
            <input
              class="form-control"
              value="<?= $laporan_pengaduan->tgl_pengaduan ?>"
              id="tgl_pengaduan"
              readonly />
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">NIK</label>
            <input
              class="form-control"
              value="<?= $laporan_pengaduan->nik ?>"
              id="nik"
              readonly />
        </div>
        <div class="form-group col-md-12">
          <label class="control-label">Isi Laporan</label>
          <textarea readonly class="form-control" name="isi_laporan" id="isi_laporan" cols="30" rows="10"><?= $laporan_pengaduan->isi_laporan ?></textarea>
        </div>

        <div class="form-group col-md-12 mt-5">
          <h5 style="font-size: 1.2rem; font-weight: 500;" class="mb-3">Tanggapan dari Petugas </h5>
          <textarea readonly class="form-control isi_tanggapan_a" name="isi_tanggapan" id="isi_tanggapan" placeholder="Pengaduan anda masih belum direspons!!!" cols="30" rows="10"><?= $laporan_pengaduan->isi_tanggapan ?></textarea>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .isi_tanggapan_a::placeholder {
    font-size: 1.3rem;
    color: red;
  }
</style>