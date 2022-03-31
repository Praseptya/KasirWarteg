<?=isset($hook) ? "":"<script>window.location.href='index'</script>";?>
<?php isset($_GET["d"]) ? $kapan = $_GET["d"]:$kapan = "all"; ?>
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header">
      <h3 class="page-title">
        Laporan
        <button type="button" class="navbar-toggler d-lg-none btn-lg btn-group btn-light float-right" data-toggle="offcanvas">&#9776;</button>
        <h4 class="ml-lg-3 card-subtitle">
          <?php
            if( isset($_POST["carilaporan"]) ){
              echo "Hasil Pencarian = ".htmlspecialchars($_POST["carilaporan"]);
            } elseif( $kapan=="all" ){
              echo "";
            } elseif( $kapan=="month" ){
              if( isset($_POST["month"]) ){
                $a = strtotime($_POST["month"]);
                $montha = $bulan[date("m", $a)];
                $yeara = date("Y", $a);
                echo "Bulan ".$montha." ".$yeara;
              } else {
                echo "Bulan ini";
              }
            } elseif( $kapan=="week" ){
              if( isset($_POST["week"]) ){
                $weeka = date("W - Y", strtotime($_POST["week"]));
                echo "Minggu ke ".$weeka;
              } else {
                echo "Minggu ini";
              }
            } elseif( $kapan=="day" ){
              if( isset($_POST["day"]) ){
                $b = strtotime($_POST["day"]);
                $yearb = date("Y", $b);
                $monthb = $bulan[date("m", $b)];
                $dayb = date('d', $b);
                echo "Tanggal ".$dayb." ".$monthb." ".$yearb;
              } else {
                echo "Hari ini";
              }
            } else {
              echo "???";
            }
          ?>
        </h4>
      </h3>
    </div>
  </div>
  <div class="col-12">
    <div class="row">
      <div class="col-xl-3 col-lg-6 col-md-3 col-sm-6">
        <button type="button" id="dropdownsorting" class="btn btn-secondary dropdown-toggle btn-lg btn-block" data-toggle="dropdown" title='
          <?php
            if( isset($_POST["carilaporan"]) ){
              echo "Pencarian";
            } elseif( $kapan=="all" ){
              echo "Semua Data";
            } elseif( $kapan=="month" ){
              echo "Data Bulanan";
            } elseif( $kapan=="week" ){
              echo "Data Mingguan";
            } elseif( $kapan=="day" ){
              echo "Data Harian";
            } else {
              echo "???";
            }
          ?>
          '>
          <?php
            if( isset($_POST["carilaporan"]) ){
              echo "Pencarian";
            } elseif( $kapan=="all" ){
              echo "Semua Data";
            } elseif( $kapan=="month" ){
              echo "Data Bulanan";
            } elseif( $kapan=="week" ){
              echo "Data Mingguan";
            } elseif( $kapan=="day" ){
              echo "Data Harian";
            } else {
              echo "???";
            }
          ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownsorting">
          <a href="?p=laporan" class="dropdown-item" title="Semua Data">Semua</a>
          <a href="?p=laporan&d=month" class="dropdown-item" title="Data Bulanan">Bulanan</a>
          <a href="?p=laporan&d=week" class="dropdown-item" title="Data Mingguan">Mingguan</a>
          <a href="?p=laporan&d=day" class="dropdown-item" title="Data harian">Harian</a>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-3 col-sm-6 mt-sm-0 mt-1">
        <button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="modal" data-target="#ekspor" title="Ekspor PDF">Ekspor PDF</button>
      </div>
      <?php
        if( isset($_POST["carilaporan"]) ){
          echo '<div class="col-xl-3 col-lg-6 col-md-3 col-sm-6 mt-xl-0 mt-lg-3 mt-md-0 mt-sm-2 mt-1"></div>';
        } elseif( $kapan=="all" ){
          echo '<div class="col-xl-3 col-lg-6 col-md-3 col-sm-6 mt-xl-0 mt-lg-3 mt-md-0 mt-sm-2 mt-1"></div>';
        } elseif( $kapan=="month" ){
          echo '<div class="col-xl-3 col-lg-6 col-md-3 col-sm-6 mt-xl-0 mt-lg-3 mt-md-0 mt-sm-2 mt-1">';
          echo '<button class="btn btn-dark btn-lg btn-block" type="button" data-toggle="modal" data-target="#bulan" title="Pilih Bulan">Pilih Bulan</button>';
          echo '</div>';
        } elseif( $kapan=="week" ){
          echo '<div class="col-xl-3 col-lg-6 col-md-3 col-sm-6 mt-xl-0 mt-lg-3 mt-md-0 mt-sm-2 mt-1">';
          echo '<button class="btn btn-dark btn-lg btn-block" type="button" data-toggle="modal" data-target="#minggu" title="Pilih Minggu">Pilih Minggu</button>';
          echo '</div>';
        } elseif( $kapan=="day" ){
          echo '<div class="col-xl-3 col-lg-6 col-md-3 col-sm-6 mt-xl-0 mt-lg-3 mt-md-0 mt-sm-2 mt-1">';
          echo '<button class="btn btn-dark btn-lg btn-block" type="button" data-toggle="modal" data-target="#hari" title="Pilih Tanggal">Pilih Tanggal</button>';
          echo '</div>';
        } else {
          echo '<div class="col-xl-3 col-lg-6 col-md-3 col-sm-6 mt-xl-0 mt-lg-3 mt-md-0 mt-sm-2 mt-1"></div>';
        }
      ?>
      <div class="col-xl-3 col-lg-6 col-md-3 col-sm-6 mt-xl-1 mt-lg-3 mt-md-1 mt-sm-2 mt-1">
        <form action="?p=laporan" method="post">
          <div class="form-group d-flex">
            <input type="search" name="carilaporan" id="isd" class="form-control form-control-lg" placeholder="Cari.." autocomplete="off" title="Cari">
            <button type="submit" class="btn btn-primary btn-sm" title="Cari"><i class="fa fa-search"></i></button>
          </div>
        </form>
      </div>
      <div class="modal fade" id="bulan" role="dialog"> 
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post">
              <div class="modal-header">
                <h4 class="modal-title">Pilih Bulan</h4>
                <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="month">Bulan</label>
                  <input type="month" name="month" id="month" class="form-control" max="<?=$monthnow;?>" required oninvalid="this.setCustomValidity('Mohon Pilih Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" value="<?=isset($_POST['month']) ? $_POST['month']:'';?>" title="Pilih Bulan">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="input" class="btn btn-dark mr-2" title="Oke">Oke</button>
                <button type="button" class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="minggu" role="dialog"> 
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post">
              <div class="modal-header">
                <h4 class="modal-title">Pilih Minggu</h4>
                <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="week">Minggu</label>
                  <input type="week" name="week" id="week" class="form-control" max="<?=$weeknow;?>" required oninvalid="this.setCustomValidity('Mohon Pilih Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" value="<?=isset($_POST['week']) ? $_POST['week']:'';?>" title="Pilih Minggu">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="input" class="btn btn-dark mr-2" title="Oke">Oke</button>
                <button type="button" class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="hari" role="dialog"> 
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post">
              <div class="modal-header">
                <h4 class="modal-title">Pilih Tanggal</h4>
                <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="date">Tanggal</label>
                  <input type="date" name="day" id="date" class="form-control" max="<?=$datenow;?>" required oninvalid="this.setCustomValidity('Mohon Pilih Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" value="<?=isset($_POST['day']) ? $_POST['day']:'';?>" title="Pilih Tanggal">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="input" class="btn btn-dark mr-2" title="Oke">Oke</button>
                <button type="button" class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="ekspor" role="dialog"> 
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="ekspor" target="_blank" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Ekspor PDF</h4>
                <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="date1">Dari Tanggal</label>
                  <input type="date" name="date1" id="date1" class="form-control" max="<?=$datenow;?>" required oninvalid="this.setCustomValidity('Mohon Pilih Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" title="Pilih Tanggal">
                </div>
                <div class="form-group">
                  <label for="date2">Sampai Tanggal</label>
                  <input type="date" name="date2" id="date2" class="form-control" max="<?=$datenow;?>" required oninvalid="this.setCustomValidity('Mohon Pilih Terlebih Dahulu 🙂')" oninput="this.setCustomValidity('')" value="<?=$datenow;?>" title="Pilih Tanggal">
                </div>
                <div class="form-group">
                  <label>Pilih Data Yang Ingin Di Ekspor</label>
                  <div class="form-check">
                    <label class="pointer" title="Data Pesanan"><input type="checkbox" name="tabel1" class="pointer" title="Data Pesanan"> Data Pesanan</label>
                  </div>
                  <div class="form-check">
                    <label class="pointer" title="Data Keuangan"><input type="checkbox" name="tabel2" class="pointer" title="Data Keuangan"> Data Keuangan</label>
                  </div>
                  <div class="form-check">
                    <label class="pointer" title="Data Penjualan"><input type="checkbox" name="tabel3" class="pointer" title="Data Penjualan"> Data Penjualan</label>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-dark mr-2" title="Oke">Oke</button>
                <button type="button" class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title icon-sm">Data Transaksi</h2>
        <hr>
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Nama Transaksi</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="pst">
              <?php
                if( isset($_POST['carilaporan']) ){
                  $keylaporan = $_POST['carilaporan'];
                  if( $keylaporan<0 ){
                    echo "<script>window.location.href='?p=laporan'</script>";
                  } else {
                    $tbpesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE nama_transaksi LIKE '%$keylaporan%' OR total LIKE '%$keylaporan%' OR tanggal LIKE '%$keylaporan%'"); 
                  }
                } else {
                  if( $kapan=="all" ){
                    $tbpesanan = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY tanggal DESC");
                  } elseif( $kapan=="month" ){
                    if( isset($_POST["month"]) ){
                      $month1 = $_POST["month"];
                      $tbpesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE tanggal LIKE '%$month1%'"); 
                    } else {
                      $tbpesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE tanggal LIKE '%$monthnow%'"); 
                    }
                  } elseif( $kapan=="week" ){
                    if( isset($_POST["week"]) ){
                      $pw1 = strtotime($_POST["week"]);
                      $week1a = date("Y-m-d", $pw1);
                      $week1b = date("Y-m-d", strtotime("+6 days", $pw1));
                      $tbpesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE tanggal BETWEEN '$week1a' AND '$week1b'");
                    } else {
                      $week1a = date("Y-m-d", $dayweek);
                      $week1b = date("Y-m-d", strtotime("+6 days", $dayweek));
                      $tbpesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE tanggal BETWEEN '$week1a' AND '$week1b'");
                    }
                  } elseif( $kapan=="day" ){
                    if( isset($_POST["day"]) ){
                      $day1 = $_POST["day"];
                      $tbpesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE tanggal LIKE '%$day1%'"); 
                    } else {
                      $tbpesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE tanggal LIKE '%$datenow%'"); 
                    }
                  } else {
                    $tbpesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE tanggal = '$kapan'");
                  }
                }
                $i1 = 1;

                foreach( $tbpesanan as $rowpesanan ):

                if( mysqli_num_rows($tbpesanan)>0 ):
                $rp = strtotime($rowpesanan["tanggal"]);
                $dp = date("d", $rp);
                $mp = $bulan3[date("M", $rp)];
                $yp = date("Y", $rp);
                $dpmpyp = $dp." ".$mp." ".$yp;
              ?>
              <tr>
                <td><?=$i1;?></td>
                <td><?=$rowpesanan["id_transaksi"];?></td>
                <td><?=$rowpesanan["nama_transaksi"];?></td>
                <td>Rp <?=number_format($rowpesanan["total"]);?></td>
                <td><?=$dpmpyp;?></td>
                <td>
                  <a href="?p=detail&id=<?=$rowpesanan['id_pesanan'];?>" class="btn btn-icons h-100 w-50 p-1 btn-primary" title="Detail"><i class="fa fa-info"></i></a>
                  <?php if( $admin ){ ?>
                  <button type="button" class="btn btn-icons h-100 w-50 p-1 btn-danger" data-toggle="modal" data-target="#deletepesanan<?=$rowpesanan["id_pesanan"];?>" title="Hapus"><i class="fa fa-trash-o"></i></button>
                  <?php } ?>
                </td>
              </tr>
              <div class="modal fade" id="deletepesanan<?=$rowpesanan['id_pesanan'];?>" role="dialog"> 
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data Pesanan</h4>
                        <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <p>Apakah anda ingin menghapus data pesanan ini?</p>
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="id_pesanan" value="<?=$rowpesanan['id_pesanan'];?>">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="deletepesanan" class="btn btn-dark mr-2" title="Hapus">Hapus</button>
                        <button class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php 
                $i1++;
                endif;
                endforeach;
              ?>
            </tbody>
          </table>
          <?=mysqli_num_rows($tbpesanan)==0 ? '<h3 class="text-center mt-4">Data Tidak Ditemukan</h3>':"";?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title icon-sm">Data Keuangan</h2>
        <hr>
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Penghasilan Bersih</th>
                <th>Penghasilan Kotor</th>
                <th>Modal</th>
                <th>Tanggal</th>
                <?=$admin ? "<th>Aksi</th>":"";?>
              </tr>
            </thead>
            <tbody id="psk">
              <?php
                if( isset($_POST['carilaporan']) ){
                  $tbkeuangan = mysqli_query($conn, "SELECT * FROM keuangan WHERE modal LIKE '%$keylaporan%' OR tanggal LIKE '%$keylaporan%'"); 
                } else {
                  if( $kapan=="all" ){
                    $tbkeuangan = mysqli_query($conn, "SELECT * FROM keuangan ORDER BY tanggal DESC");
                  } elseif( $kapan=="month" ){
                    if( isset($_POST["month"]) ){
                      $month2 = $_POST["month"];
                      $tbkeuangan = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal LIKE '%$month2%'"); 
                    } else {
                      $tbkeuangan = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal LIKE '%$monthnow%'"); 
                    }
                  } elseif( $kapan=="week" ){
                    if( isset($_POST["week"]) ){
                      $pw2 = strtotime($_POST["week"]);
                      $week2a = date("Y-m-d", $pw2);
                      $week2b = date("Y-m-d", strtotime("+6 days", $pw2));
                      $tbkeuangan = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal BETWEEN '$week2a' AND '$week2b'");
                    } else {
                      $week2a = date("Y-m-d", $dayweek);
                      $week2b = date("Y-m-d", strtotime("+6 days", $dayweek));
                      $tbkeuangan = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal BETWEEN '$week2a' AND '$week2b'");
                    }
                  } elseif( $kapan=="day" ){
                    if( isset($_POST["day"]) ){
                      $day2 = $_POST["day"];
                      $tbkeuangan = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal LIKE '%$day2%'"); 
                    } else {
                      $tbkeuangan = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal LIKE '%$datenow%'"); 
                    }
                  } else {
                    $tbkeuangan = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal = '$kapan'");
                  }
                }
                $i2 = 1;

                foreach( $tbkeuangan as $rowkeuangan ):

                if( mysqli_num_rows($tbkeuangan)>0 ):
                $sk = strtotime($rowkeuangan["tanggal"]);
                $dk = date("d", $sk);
                $mk = $bulan3[date("M", $sk)];
                $yk = date("Y", $sk);
                $dkmkyk = $dk." ".$mk." ".$yk;
              ?>
              <tr>
                <td><?=$i2;?></td>
                <td>Rp <?=number_format($rowkeuangan["penghasilan_bersih"]);?></td>
                <td>Rp <?=number_format($rowkeuangan["penghasilan_kotor"]);?></td>
                <td>Rp <?=number_format($rowkeuangan["modal"]);?></td>
                <td><?=$dkmkyk;?></td>
                <?php if( $admin ){ ?>
                  <td>
                    <button type="button" class="btn btn-icons btn-danger h-100 w-75 p-1 " data-toggle="modal" data-target="#deletekeuangan<?=$rowkeuangan['id_keuangan'];?>" title="Hapus"><i class="fa fa-trash-o"></i></button>
                  </td>
                <?php } ?>
              </tr>
              <div class="modal fade" id="deletekeuangan<?=$rowkeuangan['id_keuangan'];?>" role="dialog"> 
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data Keuangan</h4>
                        <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <p>Apakah anda ingin menghapus data keuangan ini?</p>
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="id_keuangan" value="<?=$rowkeuangan['id_keuangan'];?>">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="deletekeuangan" class="btn btn-dark mr-2" title="Hapus">Hapus</button>
                        <button class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php 
                $i2++;
                endif;
                endforeach;
              ?>
            </tbody>
          </table>
          <?=mysqli_num_rows($tbkeuangan)==0 ? '<h3 class="text-center mt-4">Data Tidak Ditemukan</h3>':"";?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title icon-sm">Data Penjualan</h2>
        <hr>
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Terjual (porsi)</th>
                <th>Jenis</th>
              </tr>
            </thead>
            <tbody id="pspj">
              <?php
                if( isset($_POST['carilaporan']) ){
                  $tbmenu = mysqli_query($conn, "SELECT * FROM daftar_menu INNER JOIN detail_pesanan ON daftar_menu.id_menu=detail_pesanan.id_menu INNER JOIN pesanan ON detail_pesanan.id_pesanan=pesanan.id_pesanan WHERE daftar_menu.menu LIKE '%$keylaporan%' OR daftar_menu.jenis LIKE '%$keylaporan%' OR pesanan.tanggal LIKE '%$keylaporan%' OR daftar_menu.terjual LIKE '%$keylaporan%' ORDER BY daftar_menu.menu");
                } else {
                  $tbmenu = mysqli_query($conn, "SELECT * FROM daftar_menu");
                }

                $i3 = 1;
                foreach( $tbmenu as $rowmenu ):
                  $id = $rowmenu['id_menu'];
                  $porsi = 0;
                  if( $kapan=="all" ) {
                    $tbdetail = mysqli_query($conn, "SELECT * FROM detail_pesanan WHERE id_menu = '$id'"); 
                  } elseif( $kapan=="month" ){
                    if( isset($_POST["month"]) ){
                      $month3 = $_POST["month"];
                      $tbdetail = mysqli_query($conn, "SELECT * FROM detail_pesanan JOIN pesanan ON detail_pesanan.id_pesanan=pesanan.id_pesanan WHERE detail_pesanan.id_menu = '$id' AND pesanan.tanggal LIKE '%$month3%'"); 
                    } else {
                      $tbdetail = mysqli_query($conn, "SELECT * FROM detail_pesanan JOIN pesanan ON detail_pesanan.id_pesanan=pesanan.id_pesanan WHERE detail_pesanan.id_menu = '$id' AND pesanan.tanggal LIKE '%$monthnow%'"); 
                    }
                  } elseif( $kapan=="week" ){
                    if( isset($_POST["week"]) ){
                      $pw3 = strtotime($_POST["week"]);
                      $week3a = date("Y-m-d", $pw3);
                      $week3b = date("Y-m-d", strtotime("+6 days", $pw3));
                      $tbdetail = mysqli_query($conn, "SELECT * FROM detail_pesanan JOIN pesanan ON detail_pesanan.id_pesanan=pesanan.id_pesanan WHERE detail_pesanan.id_menu = '$id' AND pesanan.tanggal BETWEEN '$week3a' AND '$week3b'");
                    } else {
                      $week3a = date("Y-m-d", $dayweek);
                      $week3b = date("Y-m-d", strtotime("+6 days", $dayweek));
                      $tbdetail = mysqli_query($conn, "SELECT * FROM detail_pesanan JOIN pesanan ON detail_pesanan.id_pesanan=pesanan.id_pesanan WHERE detail_pesanan.id_menu = '$id' AND pesanan.tanggal BETWEEN '$week3a' AND '$week3b'");
                    }
                  } elseif( $kapan=="day" ){
                    if( isset($_POST["day"]) ){
                      $day3 = $_POST["day"];
                      $tbdetail = mysqli_query($conn, "SELECT * FROM detail_pesanan JOIN pesanan ON detail_pesanan.id_pesanan=pesanan.id_pesanan WHERE detail_pesanan.id_menu = '$id' AND pesanan.tanggal LIKE '%$day3%'"); 
                    } else {
                      $tbdetail = mysqli_query($conn, "SELECT * FROM detail_pesanan JOIN pesanan ON detail_pesanan.id_pesanan=pesanan.id_pesanan WHERE detail_pesanan.id_menu = '$id' AND pesanan.tanggal LIKE '%$datenow%'"); 
                    }
                  } else {
                    $tbdetail = mysqli_query($conn, "SELECT * FROM detail_pesanan JOIN pesanan ON detail_pesanan.id_pesanan=pesanan.id_pesanan WHERE detail_pesanan.id_menu = '$id' AND pesanan.tanggal = '$kapan'");
                  }

                  if( isset($_POST["carilaporan"]) ){
                    $porsi = $rowmenu["qty"];
                  } else {
                    foreach( $tbdetail as $rowdetail ){
                      $porsi += $rowdetail['qty'];
                    }
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
              ?>
            </tbody>
          </table>
          <?=mysqli_num_rows($tbmenu)==0 ? '<h3 class="text-center mt-4">Data Tidak Ditemukan</h3>':"";?>
        </div>
      </div>
    </div>
  </div>
</div>
