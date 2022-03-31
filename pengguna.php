<?=isset($hook) ? "":"<script>window.location.href='index'</script>";?>
<?=$admin ? "":"<script>window.location.href='index'</script>";?>
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header">
      <h3 class="page-title">
        Pengguna
        <button type="button" class="navbar-toggler d-lg-none btn-lg btn-group btn-light float-right" data-toggle="offcanvas">&#9776;</button>
      </h3>
    </div>
  </div>
  <div class="col-12">
    <div class="page-header-toolbar d-flex">
      <div class="filter-wrapper">
        <button type="button" class="btn btn-dark btn-lg btn-fw" data-toggle="modal" data-target="#adduser" title="Tambah Pengguna">Tambah Pengguna</button>
        <div class="modal fade" id="adduser" role="dialog">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <form method="post" enctype="multipart/form-data" id="regisForm">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Pengguna</h4>
                  <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" autocomplete="off" title="Masukkan Nama Lengkap">
                      </div>
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off" title="Masukkan Username">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" title="Masukkan Password">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" title="Masukkan Email">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="telepon">No Telepon</label>
                        <input type="number" class="form-control" id="telepon" name="telepon" title="Masukkan No Telepon">
                      </div>
                      <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control" title="Pilih Level">
                          <option value="">-- Pilih Level --</option>
                          <option value="admin" title="Admin">Admin</option>
                          <option value="kasir" title="Kasir">Kasir</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <div class="form-radio">
                          <label for="aktif" class="pointer" title="Aktif"><input type="radio" name="status" id="aktif" value="aktif" checked class="pointer" title="Aktif"> Aktif</label>
                        </div>
                        <div class="form-radio">
                          <label for="pasif" class="pointer" title="Pasif"><input type="radio" name="status" id="pasif" value="pasif" class="pointer" title="Pasif"> Pasif</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="fileinput">Foto</label>
                        <input type="file" accept="image/*" name="gambar" id="fileinput" class="d-none">
                        <br>
                        <button type="button" id="falseinput" class="border border-dark py-1 px-3 mr-2" title="Pilih Foto">Pilih Foto</button>
                        <span id="selected_filename">Foto belum dipilih</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="tambahuser" class="btn btn-dark mr-2" title="Tambah">Tambah</button>
                  <button type="button" class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title icon-sm"><?=isset($_POST["cariuser"]) ? "Hasil Pencarian = ".htmlspecialchars($_POST["cariuser"]):"Tabel Pengguna";?></h2>
        <form method="post">
          <div class="form-group d-flex">
            <input type="search" name="cariuser" id="isp" class="form-control form-control-lg" placeholder="Cari.." autocomplete="off" title="Cari">
            <button type="submit" class="btn btn-primary btn-sm" title="Cari"><i class="fa fa-search"></i></button>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Username</th>
                <th>Level</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="psp">
              <?php
                $i = 1;
                if( isset($_POST["cariuser"]) ){
                  $keyword = $_POST["cariuser"];
                  if( $keyword<0 ){
                    echo "<script>window.location.href='?p=pengguna'</script>";
                  } else {
                    $tbpengguna = mysqli_query($conn, "SELECT * FROM pengguna WHERE username LIKE '%$keyword%' OR nama_lengkap LIKE '%$keyword%' OR email LIKE '%$keyword%' OR telepon LIKE '%$keyword%' OR level LIKE '%$keyword%' OR status LIKE '%$keyword%'");
                  }
                } else {
                  $tbpengguna = mysqli_query($conn, "SELECT * FROM pengguna");
                }
                foreach( $tbpengguna as $rowpengguna ):
                if( mysqli_num_rows($tbpengguna)>0 ):
              ?>
              <tr>
                <td><?=$i;?></td>
                <td><img src="assets/images/user/<?=$rowpengguna['gambar'];?>" alt="Foto <?=$rowpengguna['nama_lengkap'];?>" title="Foto <?=$rowpengguna['nama_lengkap'];?>"></td>
                <td><?=$rowpengguna["nama_lengkap"];?></td>
                <td><?=$rowpengguna["email"];?></td>
                <td><?=$rowpengguna["telepon"];?></td>
                <td><?=$rowpengguna["username"];?></td>
                <td><?=$rowpengguna["level"];?></td>
                <td><?=$rowpengguna["status"]=="aktif" ? '<strong class="text-success">Aktif</strong>':'<strong class="text-danger">Pasif</strong>';?></td>
                <td>
                  <button type="button" class="btn btn-icons btn-secondary" data-toggle="modal" data-target="#edit<?=$rowpengguna['id_pengguna'];?>" title="Ubah"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-icons btn-danger" data-toggle="modal" data-target="#delete<?=$rowpengguna['id_pengguna'];?>" title="Hapus"><i class="fa fa-trash-o"></i></button>
                </td>
              </tr>
              <div class="modal fade" id="edit<?=$rowpengguna["id_pengguna"];?>" role="dialog"> 
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" enctype="multipart/form-data">
                      <div class="modal-header">
                        <h4 class="modal-title">Ubah</h4>
                        <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <input type="hidden" name="id_pengguna" value="<?=$rowpengguna["id_pengguna"];?>">
                        </div>
                        <div class="form-group">
                          <label>Ganti Level</label>
                          <select name="level" class="form-control" title="Level">
                            <?php
                              if( $rowpengguna["level"]=="admin" ){
                                echo '<option value="admin" title="Admin">Admin</option>';
                                echo '<option value="kasir" title="Kasir">Kasir</option>';
                              } else {
                                echo '<option value="kasir" title="Kasir">Kasir</option>';
                                echo '<option value="admin" title="Admin">Admin</option>';
                              }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Ganti Status</label>
                          <div class="form-radio">
                            <label for="aktif<?=$rowpengguna["id_pengguna"];?>" class="pointer" title="Aktif"><input type="radio" name="status" id="aktif<?=$rowpengguna["id_pengguna"];?>" class="pointer" <?=$rowpengguna['status']=='aktif' ? 'checked':''; ?> value="aktif" title="Aktif"> Aktif</label>
                          </div>
                          <div class="form-radio">
                            <label for="pasif<?=$rowpengguna["id_pengguna"];?>" class="pointer" title="Pasif"><input type="radio" name="status" id="pasif<?=$rowpengguna["id_pengguna"];?>" class="pointer" <?=$rowpengguna['status']=='pasif' ? 'checked':''; ?> value="pasif" title="Pasif"> Pasif</label>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="edituser" class="btn btn-dark mr-2" title="Ubah">Ubah</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="delete<?=$rowpengguna["id_pengguna"];?>" role="dialog"> 
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus</h4>
                        <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <p>Apakah anda ingin menghapus pengguna ini?</p>
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="id_pengguna" value="<?=$rowpengguna["id_pengguna"];?>">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="deleteuser" class="btn btn-dark mr-2" title="Hapus">Hapus</button>
                        <button class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php
                $i++;
                endif;
                endforeach;
              ?>
            </tbody>
          </table>
          <?=mysqli_num_rows($tbpengguna)==0 ? '<h3 class="text-center mt-4">Data Tidak Ditemukan</h3>':"";?>
        </div>
      </div>
    </div>
  </div>
</div>
