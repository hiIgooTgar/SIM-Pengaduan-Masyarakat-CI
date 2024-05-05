<div class="row mb-3 mx-1">
  <a href="<?= base_url('data_masyarakat/create') ?>" class="btn btn-sm btn-primary mx-1"
    ><i class="fa fa-plus"></i> Tambah Data Masyarakat</a
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
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>Username</th>
                <th>Status Akun</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $a = 1;
              foreach($masyarakat as $row) :
                if ($row->level == 'masyarakat') {
                    if ($row->status == 0) {
                        $btn = 'btn-danger';
                        $fa = 'fa-ban';
                        $kata = ' Tidak Aktif';
                    } else if ($row->status == 1) {
                        $btn = 'btn-success';
                        $fa = 'fa-check';
                        $kata = ' Aktif';
                    }
                 ?>
              <tr>
                <td><?= $a++; ?></td>
                <td><?= $row->nama_lengkap ?></td>
                <td><?= $row->nik ?></td>
                <td><?= $row->username ?></td>
                <td class="text-center"><button class="btn <?= $btn ?> btn-xs" disabled="disabled"><i class="fa <?= $fa ?>"></i><?= $kata ?></button></td>
                <td>
                  <a
                    title="Detail"
                    href="<?= base_url('data_masyarakat/show/'.$row->id_users) ?>"
                    class="btn btn-info btn-semi-sm"
                    ><i class="fa fa-eye"></i
                  > Detail</a>
                  <a
                    title="Edit"
                    href="<?= base_url('data_masyarakat/edit/'.$row->id_users) ?>"
                    class="btn btn-warning btn-semi-sm"
                    ><i class="fa fa-edit"></i
                  > Edit</a>
                  <a
                    title="Hapus"
                    onclick="confirmDelete(event, '<?= base_url('data_masyarakat/destroy/'.$row->id_users) ?>');"
                    class="btn btn-danger btn-semi-sm text-white"
                    ><i class="fa fa-trash"></i
                  > Hapus</a>
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
