<div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="<?= base_url('assets/images/kandidat/user.png') ?>">
              <h4><?= $user->nama_lengkap; ?></h4>
              <p><?= $user->level; ?></p>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>
        <div class="col-xs-2 col-sm-2 mt-3">
        <a href="<?= base_url('beranda') ?>" class="btn btn-sm btn-primary"
            ><i class="fa fa-home mb-1"></i> Beranda</a
        >
        </div>
        <div class="col-md-12">
          <div class="tab-content">
            <div class="tab-pane active" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Detail Akun</h4>
                <form action="<?= base_url('profile_users/updateUser') ?>"
                  method="post"
                  role="form">
                  <div class="row mb-4">
                  <h4 class="col-md-12 mb-2" style="font-size: 1rem;">Akun</h4>
                    <div class="col-md-6 mb-3">
                      <label>Username</label>
                      <input autocomplete="off" class="form-control" name="username" readonly value="<?= $user->username ?>" type="text">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Password</label>
                      <input autocomplete="off" class="form-control" name="password" readonly value="<?= $this->encryption->decrypt($user->password) ?>" type="text">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Role / Level</label>
                      <input autocomplete="off" class="form-control" name="level" readonly value="<?= $user->level ?>" type="text">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Status Akun</label>
                      <?php 
                          if ($user->status == 0) {
                              $btn = 'btn-danger';
                              $fa = 'fa-ban';
                              $kata = ' Tidak Aktif';
                          } else if ($user->status == 1) {
                              $btn = 'btn-success';
                              $fa = 'fa-check';
                              $kata = ' Aktif';
                          }
                      ?>
                      <input class="form-control" readonly name="status" value="<?= $kata ?>" type="text">
                  </div>
                  </div>
                  <div class="row">
                    <h4 class="col-md-12 mb-2 mt-2" style="font-size: 1rem;">Biodata</h4>
    
                    <div class="col-md-12 mb-3">
                      <label>Nama Lengkap</label>
                      <input class="form-control" name="nama_lengkap" value="<?= $user->nama_lengkap ?>" type="text">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>NIK</label>
                      <input class="form-control" name="nik" value="<?= $user->nik ?>" type="number">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>No Telepone</label>
                      <input class="form-control" name="telp" value="<?= $user->telp ?>" type="number">
                    </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-warning btn-sm" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update Data</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>