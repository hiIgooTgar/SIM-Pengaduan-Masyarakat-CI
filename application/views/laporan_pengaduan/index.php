<div class="row mb-3 mx-1">
  <a href="<?= base_url('laporan_pengaduan/create') ?>" class="btn btn-sm btn-primary mx-1"
    ><i class="fa fa-plus"></i> Tambah Laporan Pengaduan</a
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
                <th>Tanggal</th>
                <th>NIK</th>
                <th>Status</th>
                <th>Isi Laporan</th>
                <th>Foto</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $a = 1;
              foreach($laporan_pengaduan as $row) :
                if ($this->session->userdata('nik') == $row->nik) {
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
                <td><?= $row->tgl_pengaduan ?></td>
                <td><?= $row->nik ?></td>
                <td class="text-center"><button class="btn <?= $btn ?> btn-xs" disabled="disabled"><i class="fa <?= $fa ?>"></i><?= $kata ?></button></td>
                <td><?= $row->isi_laporan ?></td>
                <td>
                    <?php if($row->foto !=null) { ?>
                        <img src="<?= base_url('upload/pengaduan/'.$row->foto)?>" width="100px" height="70px">
                    <?php } ?>
                </td>
                <td>
                  <a
                    title="Detail"
                    href="<?= base_url('laporan_pengaduan/show/'.$row->id_pengaduan) ?>"
                    class="btn btn-info btn-semi-sm"
                    ><i class="fa fa-eye"></i
                  > Detail</a>
                 <?php if($row->status == 0 || $row->status == 1) { ?>
                 <a
                    title="Edit"
                    href="<?= base_url('laporan_pengaduan/edit/'.$row->id_pengaduan) ?>"
                    class="btn btn-warning btn-semi-sm"
                    ><i class="fa fa-edit"></i
                  > Edit</a>
                  <a
                    title="Hapus"
                    onclick="confirmDelete(event, '<?= base_url('laporan_pengaduan/destroy/'.$row->id_pengaduan) ?>');"
                    class="btn btn-danger btn-semi-sm text-white"
                    ><i class="fa fa-trash"></i
                  > Hapus</a>
                 <?php } elseif ($row->status != 2) { ?>
                <?php } ?>
                </td>
              </tr>
              <?php 
            }
            endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
