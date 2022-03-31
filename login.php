<?php
  session_start();
  require "config.php";
  !isset($_SESSION["login"]) ?: header("location:index");
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  </head>
  <body>
    <div class="d-flex align-items-center min-vh-100">
      <div class="container">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img src="assets/images/wartegsakti.png" alt="Warteg Sakti" class="login-card-img">
            </div>
            <div class="col-xl-5 col-lg-6 col-md-7">
              <div class="card-body">
                <h1>LOGIN</h1>
                <h4>Mohon login terlebih dahulu</h4>
                <form action="" method="post" id="loginForm">
                  <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" title="Masukkan Username">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" title="Masukkan Password">
                  </div>
                  <?php
                    if( isset($_POST["login"]) ){
                      $username = mysqli_real_escape_string($conn, str_replace(' ', '', strtolower($_POST["username"])));
                      $password = md5($_POST['password']);

                      $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
                      $row = mysqli_fetch_assoc($result);

                      $cekuser = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$username'");
                      
                      $cekpass = mysqli_query($conn, "SELECT * FROM pengguna WHERE password='$password'");
                      
                      if( mysqli_num_rows($result)>0 ){
                        if( $row["level"]=="admin" && $row["status"]=="aktif" ){
                          $_SESSION["admin"] = true;
                          echo '<div class="alert alert-primary">Login berhasil sebagai admin</div>';
                          echo "<meta http-equiv='refresh' content='1;index'>";
                          $_SESSION["login"] = $row;
                        } elseif( $row["level"]=="kasir" && $row["status"]=="aktif" ){
                          $_SESSION["kasir"] = true;
                          echo '<div class="alert alert-primary">Login berhasil sebagai kasir</div>';
                          echo "<meta http-equiv='refresh' content='1;index?p=kasir'>";
                          $_SESSION["login"] = $row;
                        } else {
                          echo '<div class="alert alert-danger"><i class="text-danger">Login gagal</i></div>';
          								echo "<meta http-equiv='refresh' content='1;login'>";
                        }
                      } else {
                        if( mysqli_num_rows($cekuser)==0 && mysqli_num_rows($cekpass)==0 ) {
                          echo '<div class="alert alert-danger"><i class="text-danger">Username & password salah</i></div>';
          								echo "<meta http-equiv='refresh' content='1;login'>";
                        } elseif( mysqli_num_rows($cekuser)==0 ){
                          echo '<div class="alert alert-danger"><i class="text-danger">Username anda salah</i></div>';
          								echo "<meta http-equiv='refresh' content='1;login'>";
                        } elseif( mysqli_num_rows($cekpass)==0 ){
                          echo '<div class="alert alert-danger"><i class="text-danger">Password anda salah</i></div>';
          								echo "<meta http-equiv='refresh' content='1;login'>";
                        } else {
                          echo '<div class="alert alert-danger"><i class="text-danger">Username & password tidak cocok</i></div>';
          								echo "<meta http-equiv='refresh' content='1;login'>";
                        }
                      }
                    }
                  ?>
                  <button type="submit" name="login" id="login" class="btn btn-block btn-primary btn-lg mt-3 mb-5" title="Login">Login</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/jquery.validate.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
