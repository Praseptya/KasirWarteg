<?php
  require "config.php";
  require "condition.php";
  echo isset($_POST["tabel1"]) || isset($_POST["tabel2"]) || isset($_POST["tabel3"]) ? "":"<script>alert('Anda belum memilih data yang ingin di ekspor'); window.close()</script>";
?>
<!DOCTYPE html>
<html lang="id-ID">
  <head>
    <meta charset="UTF-8">
    <meta name="application-name" content="Aplikasi kasir warteg">
    <meta name="description" content="Aplikasi kasir warteg mempermudah dalam mengelola pemesanan atau pembelian pelanggan beserta transaksinya. Kemudian juga dapat mengelola daftar menu, harga, dll.">
    <meta name="keywords" content="kasir, warteg, sakti, daftar menu, makanan, minuman, kasir warteg, daftar menu warteg, makanan warteg, minuman warteg, warteg sakti">
    <meta name="author" content="M Prasetya Nugroho dan 4 lainnya.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>Ekspor ke PDF</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h1>Laporan</h1>
              <hr>
              <p>Dari tanggal <?=$_POST['date1'];?> sampai <?=$_POST['date2'];?></p>
              <br>
              <?php
                if( isset($_POST["tabel1"]) ):
              ?>
              <h3 class="mb-4">Data Pesanan</h3>
              <div class="table-responsive">
                <table class="table table-bordered mb-5">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Transaksi</th>
                      <th>Total</th>
                      <th>Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if( isset($_POST["date1"]) && isset($_POST["date2"]) ){
                        $d1 = $_POST["date1"];
                        $d2 = $_POST["date2"];
                        $i1 = 1;
                        $tbpesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE tanggal BETWEEN '$d1' AND '$d2'");
                        foreach( $tbpesanan as $rowpesanan ):
                    ?>
                    <tr>
                      <td><?=$i1;?></td>
                      <td><?=$rowpesanan["nama_transaksi"];?></td>
                      <td>Rp <?=number_format($rowpesanan["total"]);?></td>
                      <td><?=date("d-m-Y", strtotime($rowpesanan["tanggal"]));?></td>
                    </tr>
                    <?php
                        $i1++;
                        endforeach;
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <?php 
                endif;
                if( isset($_POST["tabel2"]) ):
              ?>
              <h3 class="mb-4">Data Keuangan</h3>
              <div class="table-responsive">
                <table class="table table-bordered mb-5">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Penghasilan Bersih</th>
                      <th>Penghasilan Kotor</th>
                      <th>Modal</th>
                      <th>Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if( isset($_POST["date1"]) && isset($_POST["date2"]) ){
                      $d1 = $_POST["date1"];
                      $d2 = $_POST["date2"];
                      $i2 = 1;
                      $tbkeuangan = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal BETWEEN '$d1' AND '$d2'");
                      foreach( $tbkeuangan as $rowkeuangan ):
                  ?>
                    <tr>
                      <td><?=$i2;?></td>
                      <td>Rp <?=number_format($rowkeuangan["penghasilan_bersih"]);?></td>
                      <td>Rp <?=number_format($rowkeuangan["penghasilan_kotor"]);?></td>
                      <td>Rp <?=number_format($rowkeuangan["modal"]);?></td>
                      <td><?=date("d-m-Y",strtotime($rowkeuangan["tanggal"]));?></td>
                    </tr>
                  <?php
                      $i2++;
                      endforeach;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <?php 
                endif;
                if( isset($_POST["tabel3"]) ):
              ?>
              <h3 class="mb-4">Data Penjualan</h3>
              <div class="table-responsive">
                <table class="table table-bordered mb-5">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Menu</th>
                      <th>Terjual (porsi)</th>
                      <th>Jenis</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if( isset($_POST["date1"]) && isset($_POST["date2"]) ){
                      $d1 = $_POST["date1"];
                      $d2 = $_POST["date2"];
                      $i3 = 1;
                      $tbmenu = mysqli_query($conn, "SELECT * FROM daftar_menu");
                      foreach( $tbmenu as $rowmenu ):
                        $id = $rowmenu['id_menu'];
                        $porsi = 0;
                        $tbdetail = mysqli_query($conn, "SELECT * FROM detail_pesanan JOIN pesanan ON detail_pesanan.id_pesanan=pesanan.id_pesanan WHERE detail_pesanan.id_menu = $id AND pesanan.tanggal BETWEEN '$d1' AND '$d2'");
                        foreach( $tbdetail as $rowdetail ){
                          $porsi+=$rowdetail['qty'];
                        }
                  ?>
                    <tr>
                      <td><?=$i3;?></td>
                      <td><?=$rowmenu["menu"];?></td>
                      <td><?=$porsi;?></td>
                      <td><?=$rowmenu["jenis"];?></td>
                    </tr>
                  <?php
                      $i3++;
                      endforeach;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      window.print()
    </script>
  </body>
</html>