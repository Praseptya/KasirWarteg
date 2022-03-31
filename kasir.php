<?=isset($hook) ? "":"<script>window.location.href='index'</script>";?>
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header">
      <h3 class="page-title">
        Kasir
        <button type="button" class="navbar-toggler d-lg-none btn-lg btn-group btn-light float-right" data-toggle="offcanvas">&#9776;</button>
      </h3>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xl-8 col-md-7">
    <div class="row">
      <div class="col-sm-5 col-12 d-md-none grid-margin">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title icon-sm">Menunya Habis</h2>
            <hr>
            <ul>
              <?php
                $tbmenuhabis = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE status='Habis'");
                
                foreach( $tbmenuhabis as $rowmenuhabis ):
              ?>
                <li><?=$rowmenuhabis["menu"];?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-7 order-first grid-margin">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title icon-sm">Pesan</h2>
            <hr>
            <form method="post">
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label for="menu">Nama Menu</label>
                    <input list="menu-list" type="text" class="form-control" id="menu" placeholder="-- Pilih menu --" name="menu" autocomplete="off" required oninvalid="this.setCustomValidity('Masukkan Menu Yang Ingin Dipesan 🙂')" oninput="this.setCustomValidity('')" title="Masukkan Menu">
                    <datalist id="menu-list">
                      <?php
                        $tbmenusedia = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE status='Tersedia'");
                        foreach( $tbmenusedia as $rowmenusedia ):
                      ?>
                      <option value="<?=$rowmenusedia['menu'];?>"></option>
                      <?php endforeach; ?>
                    </datalist>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group grid-margin">
                    <label for="porsi">Porsi</label>
                    <input type="number" class="form-control" id="porsi" name="porsi" min="1" value="1" oninvalid="this.setCustomValidity('Jumlah Porsi (Min=1) 🙂')" oninput="this.setCustomValidity('')" title="Jumlah Porsi">
                  </div>
                </div>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary btn-sm btn-block" name="tambahpesanan" title="Tambah Pesanan">Tambah Pesanan</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <h2 class="card-title icon-sm">Pesanan</h2>
                <hr>
                <div class="table-responsive">
                  <table class="table text-center">
                    <thead>
                      <tr>
                        <th>Gambar</th>
                        <th>Menu</th>
                        <th>Porsi</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if( isset($_SESSION["checkout"]) ):
                        $total = 0;

                        foreach( $_SESSION["checkout"] as $menu => $porsi ):
                        $tbmenu = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE menu='$menu'");
                        $rowmenu = mysqli_fetch_assoc($tbmenu);
                        $jumlah = $rowmenu["harga"]*$porsi;
                        
                        if( $porsi==0 ){
                          unset($_SESSION["checkout"][$menu]);
                        }
                      ?>
                      <tr>
                        <td><img src="assets/images/daftarmenu/<?=$rowmenu['gambar'];?>" alt="<?=$rowmenu['menu'];?>" class="mx-auto thumb-image img-lg" title="Gambar <?=$rowmenu['menu'];?>"></td>
                        <td><h6><?=$rowmenu["menu"];?></h6></td>
                        <td><?=$porsi;?></td>
                        <td>Rp <?=number_format($rowmenu["harga"]);?></td>
                        <td>Rp <?=number_format($jumlah);?></td>
                        <td><button type="button" class="btn btn-icons btn-danger" data-toggle="modal" data-target="#delete<?=$rowmenu['id_menu'];?>" title="Kurangi"><i class="fa fa-times"></i></button></td>
                      </tr>
                      <div class="modal fade" id="delete<?=$rowmenu["id_menu"];?>" role="dialog"> 
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form method="post">
                              <div class="modal-header">
                                <h4 class="modal-title">Kurangi Porsi</h4>
                                <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
                              </div>
                              <div class="modal-body">
                                <p>Berapa jumlah porsi yang ingin dikurangi?</p>
                                <input type="hidden" name="menu" value="<?=$rowmenu['menu'];?>">
                                <div class="form-group">
                                  <input type="number" name="porsi" class="form-control" min="1" max="<?=$porsi;?>" required oninvalid="this.setCustomValidity('Kurangi Porsi (min=1) 🙂')" oninput="this.setCustomValidity('')" value="<?=$porsi;?>" title="Kurangi Porsi">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-dark mr-2" name="kurangipesanan" title="Kurangi">Kurangi</button>
                                <button class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <?php
                        $total += $jumlah;
                        endforeach;
                        endif;
                      ?>
                    </tbody>
                  </table>
                </div>
                <?=empty($_SESSION["checkout"]) ? "<h5 class='text-center text-muted my-5 py-5'>Tidak ada yang dipesan</h5>":"";?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-5">
    <div class="row">
      <div class="col-12 d-md-block d-none grid-margin">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title icon-sm">Menunya Habis</h2>
            <hr>
            <ul>
              <?php
                $tbmenuhabis = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE status='Habis'");

                foreach( $tbmenuhabis as $rowmenuhabis ):
              ?>
                <li><?=$rowmenuhabis["menu"];?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <?php
              $qpesanan = mysqli_query($conn, "SELECT max(id_transaksi) as terbesar FROM pesanan");
              $rpesanan = mysqli_fetch_assoc($qpesanan);
              $idpesanan = $rpesanan["terbesar"];
              $urutan = (int)substr($idpesanan, 11, 3);
              $urutan++;
              $generateid = "WS-".date("ymd-").sprintf("%03s", $urutan);
            ?>
            <h2 class="card-title icon-sm">Transaksi</h2>
            <hr>
            <form method="post" id="kasirForm">
              <div class="form-group row">
                <label for="id_transaksi" class="col-sm-4 col-form-label">ID</label>
                <div class="col-sm-8">
                  <input type="text" name="id_transaksi" id="id_transaksi" class="form-control" readonly value="<?=$generateid;?>" title="ID Transaksi">
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_transaksi" class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_transaksi" id="nama_transaksi" class="form-control" autocomplete="off" required oninvalid="this.setCustomValidity('Mohon Isi Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" value="<?=$generateid;?>" title="Nama Transaksi">
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                <div class="col-sm-8">
                  <input type="date" name="tanggal" id="tanggal" class="form-control" min="<?=$datenow;?>" required value="<?=$datenow;?>" title="Pilih Tanggal">
                </div>
              </div>
              <div class="form-group row">
                <label for="total" class="col-sm-4 col-form-label">Total</label>
                <div class="col-sm-8">
                  <input type="number" name="total" id="total" class="form-control" placeholder="0" required oninvalid="this.setCustomValidity('Ini Tidak Boleh Kosong 🙂')" oninput="this.setCustomValidity('')" value="<?=$total;?>" title="Total Harga">
                </div>
              </div>
              <div class="form-group row">
                <label for="bayar" class="col-sm-4 col-form-label">Bayar</label>
                <div class="col-sm-8">
                  <input type="number" name="bayar" id="bayar" class="form-control" min="0" placeholder="0" required oninvalid="this.setCustomValidity('Mohon Isi Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" title="Bayar">
                </div>
              </div>
              <div class="form-group row grid-margin">
                <label for="kembali" class="col-sm-4 col-form-label">Kembali</label>
                <div id="platra" class="col-sm-8">
                  <input type="number" name="kembali" id="kembali" class="form-control" readonly value="0" title="Uang Kembalian">
                </div>
              </div>
              <hr>
              <button type="submit" name="belipesanan" class="btn btn-primary btn-sm btn-block" title="Beli">Beli</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
