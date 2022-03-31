<?=isset($hook) ? "":"<script>window.location.href='index'</script>";?>
<?php isset($_GET['j']) ? $jenis = $_GET['j']:$jenis = "all"; ?>
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header">
      <h3 class="page-title">
        Daftar Menu
        <button type="button" class="navbar-toggler d-lg-none btn-lg btn-group btn-light float-right" data-toggle="offcanvas">&#9776;</button>
      </h3>
    </div>
  </div>
  <div class="col-12">
    <div class="page-header-toolbar d-flex">
      <div class="filter-wrapper">
        <button type="button" id="dropdownsorting" class="btn btn-secondary dropdown-toggle btn-lg btn-fw" data-toggle="dropdown" title="Daftar Menu">
          <?php
            if( isset($_POST["carimenu"]) ){
              echo "Pencarian";
            } elseif( $jenis=="all" ){
              echo "Semua Menu";
            } elseif( $jenis=="makanan" ){
              echo "Menu Makanan";
            } elseif( $jenis=="minuman" ){
              echo "Menu Minuman";
            } else {
              echo "---";
            }
          ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownsorting">
          <a href="?p=daftar-menu" class="dropdown-item" title="Semua Menu">Semua Menu</a>
          <a href="?p=daftar-menu&j=makanan" class="dropdown-item" title="Menu Makanan">Menu Makanan</a>
          <a href="?p=daftar-menu&j=minuman" class="dropdown-item" title="Menu Minuman">Menu Minuman</a>
        </div>
      </div>
      <div class="filter-wrapper ml-2">
        <?=$admin ? '<button type="button" class="btn btn-dark btn-lg btn-fw" data-toggle="modal" data-target="#add" title="Tambah Menu">Tambah Menu</button>':"";?>
        <div class="modal fade" id="add" role="dialog"> 
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="post" enctype="multipart/form-data">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Menu</h4>
                  <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="menu">Nama</label>
                    <input type="text" name="menu" id="menu" class="form-control" required oninvalid="this.setCustomValidity('Mohon Isi Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" title="Masukkan Nama Menu">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga (Rp)</label>
                    <input type="number" name="harga" id="harga" class="form-control" required oninvalid="this.setCustomValidity('Mohon Isi Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" title="Masukkan Harga Menu">
                  </div>
                  <div class="form-group">
                    <label>Jenis</label>
                    <select name="jenis" class="form-control" required oninvalid="this.setCustomValidity('Mohon Pilih Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" title="Pilih Jenis Menu">
                      <option value="">-- Pilih Jenis --</option>
                      <option value="Makanan" title="Makanan">Makanan</option>
                      <option value="Minuman" title="Minuman">Minuman</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required oninvalid="this.setCustomValidity('Mohon Pilih Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" title="Pilih Status Menu">
                      <option value="">-- Pilih Status --</option>
                      <option value="Tersedia" title="Tersedia">Tersedia</option>
                      <option value="Habis" title="Habis">Habis</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="fileinput">Gambar</label>
                    <input type="file" name="gambar" id="fileinput" class="d-none" accept="image/*">
                    <br>
                    <button type="button" id="falseinput" class="border border-dark py-1 px-3 mr-2" title="Pilih Gambar Menu">Pilih Gambar</button>
                    <span id="selected_filename">Gambar Belum Dipilih</span>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="tambahmenu" class="btn btn-dark mr-2" title="Tambah">Tambah</button>
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
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title icon-sm">
          <?php
            if( isset($_POST["carimenu"]) ){
              echo "Hasil Pencarian = ".htmlspecialchars($_POST["carimenu"]);
            } elseif( $jenis=="all" ){
              echo "Tabel Daftar Menu";
            } elseif( $jenis=="makanan" ){
              echo "Tabel Makanan";
            } elseif( $jenis=="minuman" ){
              echo "Tabel Minuman";
            } else {
              echo "???";
            }
          ?>
        </h2>
        <form method="post">
          <div class="form-group d-flex">
            <input type="search" name="carimenu" id="ism" class="form-control form-control-lg" placeholder="Cari.." autocomplete="off" title="Cari">
            <button type="submit" class="btn btn-primary btn-sm" title="Cari"><i class="fa fa-search"></i></button>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Status</th>
                <?=$admin ? "<th>Aksi</th>":"";?>
              </tr>
            </thead>
            <tbody id="psm">
              <?php
                if( isset($_POST["carimenu"]) ){
                  $keymenu = $_POST["carimenu"];
                  if( $keymenu<0 ){
                    echo "<script>window.location.href='?p=daftar-menu'</script>";
                  } else {
                    $tbmenu = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE menu LIKE '%$keymenu%' OR harga LIKE '%$keymenu%' OR status LIKE '%$keymenu%'");
                  }
                } else {
                  if( $jenis=="all" ){
                    $tbmenu = mysqli_query($conn, "SELECT * FROM daftar_menu ORDER BY menu"); 
                  } else {
                    $tbmenu = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE jenis='$jenis' ORDER BY menu");
                  }
                }
                
                foreach( $tbmenu as $rowmenu ):
                if( mysqli_num_rows($tbmenu)>0 ):
              ?>
              <tr>
                <td><img src="assets/images/daftarmenu/<?=$rowmenu["gambar"];?>" alt="<?=$rowmenu['menu'];?>" class="thumb-image img-lg" title="Gambar <?=$rowmenu['menu'];?>"></td>
                <td><?=$rowmenu["menu"];?></td>
                <td>Rp <?=number_format($rowmenu["harga"]);?></td>
                <td><?=$rowmenu["status"]=="Tersedia" ? '<strong class="text-success">Tersedia</strong>':'<strong class="text-danger">Habis</strong>';?>
                </td>
                <?php if( $admin ){ ?>
                  <td>
                    <button type="button" class="btn btn-icons btn-secondary" data-toggle="modal" data-target="#edit<?=$rowmenu['id_menu'];?>" title="Ubah"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-icons btn-danger" data-toggle="modal" data-target="#delete<?=$rowmenu['id_menu'];?>" title="Hapus"><i class="fa fa-trash-o"></i></button>
                  </td>
                <?php } ?>
              </tr>
              <div class="modal fade" id="edit<?=$rowmenu["id_menu"];?>" role="dialog"> 
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" enctype="multipart/form-data">
                      <div class="modal-header">
                        <h4 class="modal-title">Ubah <?=$rowmenu['menu'];?></h4>
                        <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <input type="hidden" name="id_menu" value="<?=$rowmenu["id_menu"];?>">
                        </div>
                        <div class="form-group">
                          <label for="menu">Nama</label>
                          <input type="text" name="menu" id="menu" class="form-control" required oninvalid="this.setCustomValidity('Mohon Isi Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" value="<?=$rowmenu["menu"];?>" title="Nama Menu">
                        </div>
                        <div class="form-group">
                          <label for="harga">Harga (Rp)</label>
                          <input type="number" name="harga" id="harga" class="form-control" required oninvalid="this.setCustomValidity('Mohon Isi Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" value="<?=$rowmenu["harga"];?>" title="Harga Menu">
                        </div>
                        <div class="form-group">
                          <label>Jenis</label>
                          <select name="jenis" class="form-control" title="Jenis Menu">
                            <?php
                              if( $rowmenu["jenis"]=="Makanan" ){
                                echo '<option value="Makanan" title="Makanan">Makanan</option>';
                                echo '<option value="Minuman" title="Minuman">Minuman</option>';
                              } else {
                                echo '<option value="Minuman" title="Minuman">Minuman</option>';
                                echo '<option value="Makanan" title="Makanan">Makanan</option>';
                              }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Status</label>
                          <select name="status" class="form-control" title="Status Menu">
                            <?php
                              if( $rowmenu["status"]=="Tersedia" ){
                                echo '<option value="Tersedia" title="Tersedia">Tersedia</option>';
                                echo '<option value="Habis" title="Habis">Habis</option>';
                              } else {
                                echo '<option value="Habis" title="Habis">Habis</option>';
                                echo '<option value="Tersedia" title="Tersedia">Tersedia</option>';
                              }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="gambar<?=$rowmenu["id_menu"];?>">Gambar</label>
                          <br>
                          <img src="assets/images/daftarmenu/<?=$rowmenu["gambar"];?>" alt="<?=$rowmenu['menu'];?>" class="thumb-image img-lg" title="Gambar <?=$rowmenu['menu'];?>">
                          <input type="file" name="gambar" accept="image/*" id="gambar<?=$rowmenu["id_menu"];?>" class="invisible">
                          <br>
                          <label for="gambar<?=$rowmenu["id_menu"];?>" class="btn btn-secondary btn-sm border border-dark mt-2" title="Pilih Gambar">Pilih Gambar</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="editmenu" class="btn btn-dark mr-2" title="Ubah">Ubah</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="delete<?=$rowmenu["id_menu"];?>" role="dialog"> 
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus <?=$rowmenu['menu'];?></h4>
                        <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <p>Apakah anda ingin menghapus <?=$rowmenu['menu'];?>?</p>
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="id_menu" value="<?=$rowmenu["id_menu"];?>">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="deletemenu" class="btn btn-dark mr-2" title="Hapus">Hapus</button>
                        <button class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php
                endif;
                endforeach;
              ?>
            </tbody>
          </table>
          <?=mysqli_num_rows($tbmenu)==0 ? '<h3 class="text-center mt-4">Data Tidak Ditemukan</h3>':"";?>
        </div>
      </div>
    </div>
  </div>
</div>
