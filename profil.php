<?=isset($hook) ? "":"<script>window.location.href='index'</script>";?>
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header">
      <h3 class="page-title">
        Profil
        <button type="button" class="navbar-toggler d-lg-none btn-lg btn-group btn-light float-right" data-toggle="offcanvas">&#9776;</button>
      </h3>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12 text-center">
            <label class="border rounded-circle w-25 mt-3 mb-5 pointer"><img src="assets/images/user/<?=$rowp["gambar"];?>" alt="Foto Profil" class="rounded-circle w-100" data-toggle="modal" data-target="#foto" title="Foto Profil"></label>
            <div class="modal fade" id="foto" role="dialog"> 
              <div class="modal-dialog">
                <div class="modal-content">
                  <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <input type="file" class="invisible" accept="image/*" id="gambar" name="gambar">
                      <label for="gambar" class="pointer" title="Ganti Foto"><img src="assets/images/user/<?=$rowp["gambar"];?>" alt="foto profil" class="w-100"></label>
                      <label for="gambar" class="btn btn-block btn-primary mt-2" title="Ganti Foto">Pilih Foto Baru</label>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-dark mr-2" name="btng" title="Simpan">Simpan</button>
                      <button type="button" class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <form method="post">
          <div class="row">
            <div class="col-xl-2 col-lg-1 col-md-1"></div>
            <div class="col-md-3 col-sm-4 col-12">
              <h5><b>Nama Lengkap</b></h5>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-9">
              <h5 id="hesnl"><?=$rowp["nama_lengkap"];?></h5>
              <input type="text" name="inputnl" id="iesnl" class="ml-n1 form-control form-control-sm mb-1" placeholder="<?=$rowp['nama_lengkap'];?>" required oninvalid="this.setCustomValidity('Mohon Isi Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" title="Nama Lengkap">
            </div>
            <div class="col-lg-2 col-md-1 col-sm-2 col-3">
              <button id="cesnl" type="submit" name="btnnl" class="close text-success text-small float-left" title="Simpan">&#10004;</button>
              <button type="button" id="besnl" class="close text-danger float-left ml-3" title="Batal">&times;</button>
              <label for="iesnl" id="tesnl" class="btn text-muted mt-n1" title="Ubah"><i class="fa fa-pencil"></i></label>
            </div>
          </div>
        </form>
        <form method="post">
          <div class="row">
            <div class="col-xl-2 col-lg-1 col-md-1"></div>
            <div class="col-md-3 col-sm-4 col-12">
              <h5><b>Email</b></h5>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-9">
              <h5 id="hese"><?=$rowp["email"];?></h5>
              <input type="email" name="inpute" id="iese" class="ml-n1 form-control form-control-sm mb-1" placeholder="<?=$rowp['email'];?>" required oninvalid="this.setCustomValidity('Mohon Isi Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" title="Email">
            </div>
            <div class="col-lg-2 col-md-1 col-sm-2 col-3">
              <button id="cese" type="submit" name="btne" class="close text-success text-small float-left" title="Simpan">&#10004;</button>
              <button id="bese" type="button" class="close text-danger float-left ml-3" title="Batal">&times;</button>
              <label id="tese" for="iese" class="btn text-muted mt-n1" title="Ubah"><i class="fa fa-pencil"></i></label>
            </div>
          </div>
        </form>
        <form method="post">
          <div class="row">
            <div class="col-xl-2 col-lg-1 col-md-1"></div>
            <div class="col-md-3 col-sm-4 col-12">
              <h5><b>No Telepon</b></h5>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-9">
              <h5 id="hest"><?=$rowp["telepon"];?></h5>
              <input type="number" name="inputt" id="iest" class="ml-n1 form-control form-control-sm mb-1" placeholder="<?=$rowp['telepon'];?>" required oninvalid="this.setCustomValidity('Mohon Isi Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" title="No Telepon">
            </div>
            <div class="col-lg-2 col-md-1 col-sm-2 col-3">
              <button id="cest" type="submit" name="btnt" class="close text-success text-small float-left" title="Simpan">&#10004;</button>
              <button id="best" type="button" class="close text-danger float-left ml-3" title="Batal">&times;</button>
              <label id="test" for="iest" class="btn text-muted mt-n1" title="Ubah"><i class="fa fa-pencil"></i></label>
            </div>
          </div>
        </form>
        <form method="post">
          <div class="row">
            <div class="col-xl-2 col-lg-1 col-md-1"></div>
            <div class="col-md-3 col-sm-4 col-12">
              <h5><b>Username</b></h5>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-9">
              <h5 id="hesu"><?=$rowp["username"];?></h5>
              <input type="text" name="inputu" id="iesu" class="ml-n1 form-control form-control-sm mb-1" placeholder="<?=$rowp['username'];?>" required oninvalid="this.setCustomValidity('Mohon Isi Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" title="Username">
            </div>
            <div class="col-lg-2 col-md-1 col-sm-2 col-3">
              <button id="cesu" type="submit" name="btnu" class="close text-success text-small float-left" title="Simpan">&#10004;</button>
              <button id="besu" type="button" class="close text-danger float-left ml-3" title="Batal">&times;</button>
              <label id="tesu" for="iesu" class="btn text-muted mt-n1" title="Ubah"><i class="fa fa-pencil"></i></label>
            </div>
          </div>
        </form>
        <form method="post">
          <div class="row">
            <div class="col-xl-2 col-lg-1 col-md-1"></div>
            <div class="col-md-3 col-sm-4 col-12">
              <h5><b>Password</b></h5>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-9">
              <h5 id="hesp"><?php for($i = 0; $i < strlen($rowp["password"])/4; $i++){ echo "*"; } ?></h5>
              <input type="password" name="inputp" id="iesp" class="ml-n1 form-control form-control-sm mb-1" placeholder="<?php for($i = 0; $i < strlen($rowp['password'])/4; $i++){ echo "*"; } ?>" required oninvalid="this.setCustomValidity('Mohon Isi Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" title="Password">
            </div>
            <div class="col-lg-2 col-md-1 col-sm-2 col-3">
              <button id="cesp" type="submit" name="btnp" class="close text-success text-small float-left" title="Simpan">&#10004;</button>
              <button id="besp" type="button" class="close text-danger float-left ml-3" title="Batal">&times;</button>
              <label id="tesp" for="iesp" class="btn text-muted mt-n1" title="Ubah"><i class="fa fa-pencil"></i></label>
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col-xl-2 col-lg-1 col-md-1"></div>
          <div class="col-md-3 col-sm-4 col-12">
            <h5><b>Level</b></h5>
          </div>
          <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-9">
            <h5><?=$rowp["level"];?></h5>
          </div>
          <div class="col-lg-2 col-md-1 col-sm-2 col-3"></div>
        </div>
        <div class="row">
          <div class="col-xl-2 col-lg-1 col-md-1"></div>
          <div class="col-md-3 col-sm-4 col-12">
            <h5><b>Status</b></h5>
          </div>
          <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-9">
            <h5><?=$rowp["status"];?></h5>
          </div>
          <div class="col-lg-2 col-md-1 col-sm-2 col-3"></div>
        </div>
      </div>
    </div>
  </div>
</div>
