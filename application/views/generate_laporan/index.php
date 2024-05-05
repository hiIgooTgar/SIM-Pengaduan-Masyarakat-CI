<div class="row mb-3 mx-1">
  <a href="<?= base_url('generate_laporan/pdfPrint') ?>" class="btn btn-sm btn-danger mx-1"
    ><i class="fa fa-print"></i> Cetak</a
  >
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered" id="tableMobileAdmin" >
            <thead>
              <tr>
                <th>No</th>
                <th>Pelapor</th>
                <th>Tanggal</th>
                <th>Isi Laporan</th>
                <th>Foto</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $a = 1;
              foreach($generate_laporan as $row) :
                // if ($row->level == 'petugas') {
                    if ($row->status == 0) {
                        $btn = 'btn-danger';
                        $fa = 'fa-hand';
                        $kata = ' Belum Ditanggapi';
                    } else if ($row->status == 1) {
                        $btn = 'btn-warning';
                        $fa = 'fa-hourglass-start';
                        $kata = ' Sedang Proses';
                    } else if ($row->status == 2) {
                        $btn = 'btn-success';
                        $fa = 'fa-check';
                        $kata = ' Sudah Ditanggapi';
                    }
                 ?>
              <tr>
                <td><?= $a++; ?></td>
                <td><?= $row->nama_lengkap ?></td>
                <td><?= $row->tgl_pengaduan ?></td>
                <td><?= $row->isi_laporan ?></td>
                <td>
                    <?php if($row->foto !=null) { ?>
                        <img src="<?= base_url('upload/pengaduan/'.$row->foto)?>" width="100px" height="70px">
                    <?php } ?>
                </td>
                <td class="text-center"><button class="btn <?= $btn ?> btn-xs" disabled="disabled"><i class="fa <?= $fa ?>"></i><?= $kata ?></button></td>
              </tr>
              <?php 
            // }
            endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
