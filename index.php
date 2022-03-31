<?php
  $hook = true;
  require "config.php";
  require "condition.php";
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
    <title>Warteg Sakti</title>
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  </head>
  <body>
    <img src="assets/images/up.png" class="scrollup" title="Keatas">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile my-3">
              <img src="assets/images/logo.png" class="navbar-brand navbar-brand-wrapper brand-log ml-4" alt="logo" title="logo">
            </li>
            <li class="nav-item nav-profile mt-0 mb-2">
              <a href="?p=profil" class="nav-link" title="Profil">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src='assets/images/user/<?=$rowp["gambar"];?>' alt="profil">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?=$rowp["nama_lengkap"];?></p>
                  <p class="designation"><?=$admin ? "Administrator":"Kasir";?></p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?p=dashboard">
                <span class="menu-title">Dasbor</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?p=kasir">
                <span class="menu-title">Kasir</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?p=daftar-menu">
                <span class="menu-title">Daftar Menu</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?p=laporan">
                <span class="menu-title">Laporan</span>
              </a>
            </li>
            <?php if( $admin ){ ?>
            <li class="nav-item">
              <a class="nav-link" href="?p=pengguna">
                <span class="menu-title">Pengguna</span>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a type="button" class="nav-link" data-toggle="modal" data-target="#logout"><span class="menu-title">Keluar</span></a>
            </li>
          </ul>
        </nav>
        <div class="modal fade" id="logout" role="dialog"> 
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="post">
                <div class="modal-header">
                  <h4 class="modal-title">Keluar</h4>
                  <button type="button" class="close mt-n3 mr-n3" data-dismiss="modal" title="Tutup">&times;</button>
                </div>
                <div class="modal-body">
                  <p>Apakah anda ingin keluar?</p>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="logout" class="btn btn-dark mr-2" title="Keluar">Keluar</button>
                  <button type="button" class="btn btn-light" data-dismiss="modal" title="Batal">Batal</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="main-panel">
          <div class="content-wrapper">
            <?php
              if( isset($_GET['p']) ){
                $page = $_GET['p'];
                switch( $page ){
                  case "dashboard": include "dashboard.php"; break;
                  case "kasir": include "kasir.php"; break;
                  case "daftar-menu": include "daftarmenu.php"; break;
                  case "laporan": include "laporan.php"; break;
                  case "detail": include "detailpesanan.php"; break;
                  case "pengguna": include "pengguna.php"; break;
                  case "profil": include "profil.php"; break;
                  default: include "dashboard.php"; break;
                }
              } else {
                include 'dashboard.php';
              }
            ?>
          </div>
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright &copy; 2021 Warteg Sakti. All Rights Reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="#">Prakerin21</a> Team Lingkar9-[G]</span>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/jquery.validate.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
