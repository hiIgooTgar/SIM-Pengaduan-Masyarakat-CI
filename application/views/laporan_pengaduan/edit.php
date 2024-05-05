<style>
  .img-cover-pengaduan {
    border: 1px solid #aaa;
    width: 200px;
    height: 160px;
    margin: 0.5rem 0 1rem;
    object-fit: cover;
  }

  .img-cover-pengaduan img {
    object-fit: cover;
  }
</style>

<div class="col-xs-2 col-sm-2 mb-3">
  <a href="<?= base_url('laporan_pengaduan') ?>" class="btn btn-sm btn-primary"
    ><i class="fa fa-arrow-left mb-1"></i> Kembali</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body row">
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
            <form action="<?= base_url('laporan_pengaduan/update') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_pengaduan" value="<?= $laporan_pengaduan->id_pengaduan; ?>" />
                <div class="form-group">
                    <label class="control-label">Foto</label>
                    <div class="img-cover-pengaduan">
                        <img src="<?= base_url('upload/pengaduan/' . $laporan_pengaduan->foto); ?>" style="width: 100%; height: 100%" id="imagePreview" alt="Foto Pengaduan">
                    </div>
                    <input class="form-control" name="foto" id="foto" type="file" accept="image/png, image/jpeg, image/jpg, image/gif" onchange="previewImage()">
                </div>
                <div class="form-group">
                    <label class="control-label">Isi Laporan</label>
                    <textarea class="form-control" name="isi_laporan" id="isi_laporan" cols="30" rows="10"><?= $laporan_pengaduan->isi_laporan ?></textarea>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-warning btn btn-sm" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i> Update Pengaduan
                    </button>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>
</div>


<script>
function previewImage() {
    var input = document.getElementById('foto');
    var imagePreview = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        imagePreview.src = '';
    }
}
</script>