<?php isset($_GET['id']) ? $id = $_GET['id']:die("<script>window.location.href='index?p=laporan'</script>");?>
<style>
  @media print {
    body {
      visibility: hidden;
    }
    body .modal .modal-header,
    body .modal .modal-body {
      top: 500px;
      transform: scale(3);
      visibility: visible;
    }
    img.scrollup {
      visibility: hidden;
    }
  }
</style>
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header">
      <h3 class="page-title">
        Detail Pesanan
        <button type="button" class="navbar-toggler d-lg-none btn-lg btn-group btn-light float-right" data-toggle="offcanvas">&#9776;</button>
      </h3>
    </div>
  </div>
</div>

<?php
  $tbpesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan = '$id'");
  $rowtransaksi = mysqli_fetch_assoc($tbpesanan);

  if( mysqli_num_rows($tbpesanan)>0 ):
  $s = strtotime($rowtransaksi["tanggal"]);
  $d = date("d", $s);
  $m = $bulan[date("m", $s)];
  $y = date("Y", $s);
  $dmy = $d." ".$m." ".$y;
?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6 grid-margin">
            <h5>
              <strong>ID transaksi : <?=$rowtransaksi["id_transaksi"];?></strong>
            </h5>
            <h5>Nama transaksi : <?=$rowtransaksi["nama_transaksi"];?></h5>
            <h5>Tanggal : <?=$dmy;?></h5>
          </div>
          <div class="col-sm-6 grid-margin">
            <h5>
              <strong>Total : Rp. <?=number_format($rowtransaksi["total"]);?></strong>
            </h5>
            <h5>Bayar : Rp. <?=number_format($rowtransaksi["bayar"]);?></h5>
            <h5>Kembali : Rp. <?=number_format($rowtransaksi["kembali"]);?></h5>
          </div>
          <div class="col-12">
            <div class="table-responsive">
              <table class="table table-stripped text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Menu</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Porsi</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    $total = 0;

                    $tbdetail = mysqli_query($conn, "SELECT * FROM detail_pesanan JOIN daftar_menu ON detail_pesanan.id_menu=daftar_menu.id_menu WHERE detail_pesanan.id_pesanan='$id'");

                    foreach( $tbdetail as $rowdetail ):
                    $jumlah = $rowdetail["harga"]*$rowdetail["qty"];
                  ?>
                  <tr>
                    <td><?=$i;?></td>
                    <td><img src="assets/images/daftarmenu/<?=$rowdetail['gambar'];?>" alt="<?=$rowdetail['menu'];?>" title="Gambar <?=$rowdetail['menu'];?>"></td>
                    <td><?=$rowdetail["menu"];?></td>
                    <td><?=$rowdetail["jenis"];?></td>
                    <td>Rp <?=number_format($rowdetail["harga"]);?></td>
                    <td><?=$rowdetail["qty"];?></td>
                    <td>Rp <?=number_format($jumlah);?></td>
                  </tr>
                  <?php 
                    $total += $jumlah;
                    $i++;
                    endforeach;
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Total</th>
                    <th colspan="5"></th>
                    <th>Rp <?=number_format($total);?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <button type="button" class="btn btn-secondary" onclick="history.back();" title="Kembali"><i class="fa fa-arrow-left"></i>Kembali</button>
            <button type="button" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#detail<?=$rowtransaksi['id_pesanan'];?>" title="Struk"><i class="fa fa-file-text-o"></i>Struk</button>
            <div class="modal fade" id="detail<?=$rowtransaksi["id_pesanan"];?>" role="dialog">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <h6>Warteg Sakti</h6>
                        <h6>ID Transaksi : <?=$rowtransaksi["id_transaksi"];?></h6>
                        <h6>Tanggal : <?=$dmy;?></h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr class="hr-dashed">
                        <table class="nota">
                          <thead>
                            <tr>
                              <th>Menu</th>
                              <th class="text-center">Porsi</th>
                              <th class="text-center">Harga</th>
                              <th class="text-right">Jumlah</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              foreach( $tbdetail as $rowdetail ):
                            ?>
                            <tr>
                              <td class="menu"><?=$rowdetail["menu"];?></td>
                              <td class="qty"><?=$rowdetail["qty"];?></td>
                              <td class="harga"><?=number_format($rowdetail["harga"]);?></td>
                              <td class="jumlah"><?=number_format($jumlah);?></td>
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        <hr class="hr-dashed">
                      </div>
                    </div>
                    <div class="col-md-12 text-right">
                      <h6>Total : Rp <?=number_format($rowtransaksi["total"]);?></h6>
                      <h6>Bayar : Rp <?=number_format($rowtransaksi["bayar"]);?></h6>
                      <h6>Kembali : Rp <?=number_format($rowtransaksi["kembali"]);?></h6>
                    </div>
                    <hr class="hr-dashed">
                    <div class="col-md-12 text-center">
                      <p>Terimakasih atas kunjungan anda!</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" onclick="print()" class="btn btn-dark" title="Cetak"><i class="fa fa-print"></i>Cetak</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal" title="Tutup">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  endif;
  if( mysqli_num_rows($tbpesanan)==0 ):
?>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Menu</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Porsi</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              </tr>
            </tbody>
          </table>
          <br>
          <h3 class="text-center py-5 my-5">Data Tidak Ditemukan</h3>
        </div>
        <hr>
        <button type="button" class="btn btn-secondary" onclick="history.back();" title="Kembali"><i class="fa fa-arrow-left"></i>Kembali</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
