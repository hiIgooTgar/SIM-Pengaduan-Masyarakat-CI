
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
                <th>Status</th>
                <th>Isi Laporan</th>
                <th>Foto</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $a = 1;
              foreach($verifikasi_validasi as $row) :
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
                <td class="text-center"><button class="btn <?= $btn ?> btn-xs" disabled="disabled"><i class="fa <?= $fa ?>"></i><?= $kata ?></button></td>
                <td><?= $row->isi_laporan ?></td>
                <td>
                    <?php if($row->foto !=null) { ?>
                        <img src="<?= base_url('upload/pengaduan/'.$row->foto)?>" width="100px" height="70px">
                    <?php } ?>
                </td>
                <td>
                    <?php if ($row->status == 0) : ?>
                        <a href="<?= base_url('verifikasi_validasi/belum/' . $row->id_pengaduan) ?>" class="btn btn-danger btn-semi-sm"><i class="fa fa-check-circle"></i> Verifikasi</a>
                    <?php elseif ($row->status == 1) : ?>
                        <a href="<?= base_url('verifikasi_validasi/proses/' . $row->id_pengaduan) ?>" class="btn btn-info btn-semi-sm"><i class="fa fa-edit"></i> Tanggapi Laporan</a>
                    <?php elseif ($row->status == 2) : ?>
                      <a href="<?= base_url('verifikasi_validasi/selesai/' . $row->id_pengaduan) ?>" class="btn btn-success btn-semi-sm"><i class="fa fa-eye"></i>Detail Pengaduan</a>
                    <?php endif; ?>

                    <?php if ($row->status == 2) : ?>
                      <a href="<?= base_url('verifikasi_validasi/edit/' . $row->id_pengaduan) ?>" class="btn btn-warning btn-semi-sm"><i class="fa fa-edit"></i>Edit Pengaduan</a>
                    <?php endif; ?>
                </td>

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
