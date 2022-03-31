<?php
  session_start();
  
  isset($_SESSION["login"]) ?: header("location:login");
  isset($conn) ?: header("location:login");

  $admin = isset($_SESSION["admin"]);
  $idp = $_SESSION['login']["id_pengguna"];

  $tbp = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$idp'");
  $rowp = mysqli_fetch_assoc($tbp);
  
  if( $rowp["status"]=="pasif" ){
    echo "<script>alert('Akun anda telah diblokir')</script>";
    session_destroy();
    header("location:login");
    exit;
  }

  $datenow = date("Y-m-d");
  $yearnow = date("Y");
  $week = date("W");
  $monthnow = date("Y-m");
  $weeknow = $yearnow."-W".$week;
  $dayweek = strtotime($weeknow);

  $tbkeuangandesc = mysqli_query($conn, "SELECT * FROM keuangan ORDER BY id_keuangan DESC");
  $rowkeuangan = mysqli_fetch_assoc($tbkeuangandesc);
  $numkeuangan = mysqli_num_rows($tbkeuangandesc);

  $h1 = date("Y-m-d", $dayweek);
  $query1 = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal = '$h1'");
  $row1 = mysqli_fetch_assoc($query1);
  $num1 = mysqli_num_rows($query1);

  $h2 = date("Y-m-d", strtotime("+1 day", $dayweek));
  $query2 = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal = '$h2'");
  $row2 = mysqli_fetch_assoc($query2);
  $num2 = mysqli_num_rows($query2);

  $h3 = date("Y-m-d", strtotime("+2 day", $dayweek));
  $query3 = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal = '$h3'");
  $row3 = mysqli_fetch_assoc($query3);
  $num3 = mysqli_num_rows($query3);

  $h4 = date("Y-m-d", strtotime("+3 day", $dayweek));
  $query4 = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal = '$h4'");
  $row4 = mysqli_fetch_assoc($query4);
  $num4 = mysqli_num_rows($query4);

  $h5 = date("Y-m-d", strtotime("+4 day", $dayweek));
  $query5 = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal = '$h5'");
  $row5 = mysqli_fetch_assoc($query5);
  $num5 = mysqli_num_rows($query5);

  $h6 = date("Y-m-d", strtotime("+5 day", $dayweek));
  $query6 = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal = '$h6'");
  $row6 = mysqli_fetch_assoc($query6);
  $num6 = mysqli_num_rows($query6);

  $h7 = date("Y-m-d", strtotime("+6 day", $dayweek));
  $query7 = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal = '$h7'");
  $row7 = mysqli_fetch_assoc($query7);
  $num7 = mysqli_num_rows($query7);

  $bulan = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember',
  );

  $bulan3 = array(
    'Jan' => 'Jan',
    'Feb' => 'Feb',
    'Mar' => 'Mar',
    'Apr' => 'Apr',
    'May' => 'Mei',
    'Jun' => 'Jun',
    'Jul' => 'Jul',
    'Aug' => 'Agu',
    'Sep' => 'Sep',
    'Oct' => 'Okt',
    'Nov' => 'Nov',
    'Dec' => 'Des',
  );

  if( isset($_POST["tambahmenu"]) ){
    $menu = $_POST["menu"];
    $harga = $_POST["harga"];
    $jenis = $_POST["jenis"];
    $status = $_POST["status"];
    $foto = $_FILES["gambar"]["name"];
    $lokasi = $_FILES["gambar"]["tmp_name"];

    $query = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE menu='$menu'");

    if( mysqli_num_rows($query)>0 ){
      echo "<script>alert('Maaf menu sudah ada')</script>";
      return false;
    } else {
      move_uploaded_file($lokasi, "assets/images/daftarmenu/".$foto);

      mysqli_query($conn, "INSERT INTO daftar_menu(menu,gambar,jenis,harga,status,terjual) VALUES('$menu','$foto','$jenis','$harga','$status','0')");
    }

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Menu berhasil ditambahkan'); window.location.href='?p=daftar-menu'</script>":"<script>alert('Menu gagal ditambahkan'); window.location.href='?p=daftar-menu'</script>";
  }

  if( isset($_POST["editmenu"]) ){
    $idmenu = $_POST["id_menu"];
    $menu = $_POST["menu"];
    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];
    $status = $_POST["status"];
    $foto = $_FILES["gambar"]["name"];
    $lokasi = $_FILES["gambar"]["tmp_name"];

    if( !empty($lokasi) ){
      $query = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE id_menu='$idmenu'");
      $row = mysqli_fetch_assoc($query);
      $fotolama = $row['gambar'];
      
      $fotolama=="" ?: unlink("assets/images/daftarmenu/$fotolama");

      move_uploaded_file($lokasi, "assets/images/daftarmenu/".$foto);

      mysqli_query($conn, "UPDATE daftar_menu SET menu='$menu',gambar='$foto',jenis='$jenis',harga='$harga',status='$status' WHERE id_menu='$idmenu'");
    } else {
      mysqli_query($conn, "UPDATE daftar_menu SET menu='$menu',jenis='$jenis',harga='$harga',status='$status' WHERE id_menu='$idmenu'");
    }

    echo mysqli_affected_rows($con)>0 ? "<script>alert('Menu berhasil diubah'); window.location.href='?p=daftar-menu'</script>":"<script>alert('Menu gagal diubah'); window.location.href='?p=daftar-menu'</script>";
  }

  if( isset($_POST["deletemenu"]) ){
    $idmenu = $_POST["id_menu"];

    $query = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE id_menu='$idmenu'");
    $row = mysqli_fetch_assoc($query);
    $foto = $row['gambar'];

    $foto=="" ?: unlink("assets/images/daftarmenu/$foto");

    mysqli_query($conn, "DELETE FROM daftar_menu WHERE id_menu='$idmenu'");

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Menu berhasil dihapus'); window.location.href='?p=daftar-menu'</script>":"<script>alert('Menu gagal dihapus'); window.location.href='?p=daftar-menu'</script>";
  }

  if( isset($_POST["tambahpesanan"]) ){
    $menu = $_POST["menu"];
    $porsi = $_POST["porsi"];

    $query = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE menu='$menu'");
    $row = mysqli_fetch_assoc($query);

    if( mysqli_num_rows($query)==0 ){
      echo "<script>alert('Menu tidak ada')</script>";
      return false;
    } elseif( $row["status"]=="Habis" ){
      echo "<script>alert('Menu sudah habis')</script>";
      return false;
    } else {
      isset($_SESSION["checkout"][$menu]) ? $_SESSION["checkout"][$menu]+=$porsi:$_SESSION["checkout"][$menu]=$porsi;
    }
    echo "<script>window.location.href='?p=kasir'</script>";
  }

  if( isset($_POST["kurangipesanan"]) ){
    $menu = $_POST["menu"];
    $porsi = $_POST["porsi"];

    $_SESSION["checkout"][$menu]-=$porsi;
    header("location:index?p=kasir");
  }

  if( isset($_POST["belipesanan"]) ){
    if( isset($_SESSION["checkout"]) ){
      $idt = $_POST["id_transaksi"];
      $nt = $_POST["nama_transaksi"];
      $ttl = $_POST["total"];
      $byr = $_POST["bayar"];
      $kmbl = $_POST["kembali"];
      $tgl = $_POST["tanggal"];
  
      if( $byr<$ttl ){
        echo '<script>alert("Maaf pembayaran anda kurang")</script>';
        return false;
      } else {
        mysqli_query($conn, "INSERT INTO pesanan(id_transaksi,nama_transaksi,total,bayar,kembali,tanggal) VALUES('$idt','$nt','$ttl','$byr','$kmbl','$tgl')");
      }
      
      $idpesanan = $conn->insert_id;
  
      foreach( $_SESSION["checkout"] as $menu => $porsi ){
        $query = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE menu='$menu'");
        $row = mysqli_fetch_assoc($query);
        $idmenu = $row["id_menu"];
  
        mysqli_query($conn, "INSERT INTO detail_pesanan(id_pesanan,id_menu,qty) VALUES('$idpesanan','$idmenu','$porsi')");
  
        $tbdetail = mysqli_query($conn, "SELECT * FROM detail_pesanan WHERE id_menu='$idmenu'");
        $totalporsi = 0;
        foreach( $tbdetail as $rowdetail ){
          $totalporsi+=$rowdetail['qty'];
        }
  
        mysqli_query($conn, "UPDATE daftar_menu SET terjual='$totalporsi' WHERE id_menu='$idmenu'");
      }
  
      if( mysqli_affected_rows($conn)>0 ){
        echo "<script>alert('Berhasil membeli pesanan'); window.location.href='?p=detail&id=$idpesanan'</script>";
        unset($_SESSION["checkout"]);
      } else {
        echo '<script>alert("Gagal membeli pesanan"); window.location.href="?p=kasir"</script>';
      }
    } else {
      echo '<script>alert("Anda belum pesan menu"); window.location.href="?p=kasir"</script>';
    }
  }

  if( isset($_POST["deletepesanan"]) ){
    $idpesanan = $_POST["id_pesanan"];

    mysqli_query($conn, "DELETE FROM pesanan WHERE id_pesanan='$idpesanan'");

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Berhasil menghapus pesanan')</script>":"<script>alert('Gagal menghapus pesanan')</script>";
  }

  if( isset($_POST["tambahmodal"]) ){
    $kotor = $_POST["kotor"];
    $modal = $_POST["modal"];
    $bersih = $kotor-$modal;
    $tgl = $_POST["tanggal"];

    $query = mysqli_query($conn, "SELECT * FROM keuangan WHERE tanggal='$tgl'");

    if( mysqli_num_rows($query)>0 ){
      echo '<script>alert("Anda sudah memasukan modal")</script>';
      return false;
    } else {
      mysqli_query($conn, "INSERT INTO keuangan(penghasilan_bersih,penghasilan_kotor,modal,tanggal) VALUES('$bersih','$kotor','$modal','$tgl')");
    }

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Berhasil memasukan modal')</script>":"<script>alert('Gagal memasukan modal')</script>";
  }

  if( isset($_POST["deletekeuangan"]) ){
    $idkeuangan = $_POST["id_keuangan"];

    mysqli_query($conn, "DELETE FROM keuangan WHERE id_keuangan='$idkeuangan'");

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Berhasil menghapus keuangan')</script>":"<script>alert('Gagal menghapus keuangan')</script>";
  }

  if( isset($_POST["tambahuser"]) ){
    $nama_lengkap = $_POST["nama_lengkap"];
    $username = mysqli_real_escape_string($conn, str_replace(' ', '', strtolower($_POST["username"])));
    $password = md5($_POST['password']);
    $email = $_POST["email"];
    $telepon = $_POST["telepon"];
    $level = $_POST["level"];
    $status = $_POST["status"];
    $foto = $_FILES["gambar"]["name"];
    $lokasi = $_FILES["gambar"]["tmp_name"];

    $query = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$username'");

    if( mysqli_num_rows($query)>0 ){
      echo "<script>alert('Maaf username sudah ada')</script>";
      return false;
    } else {
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
      	move_uploaded_file($lokasi, "assets/images/user/".$foto);

      	mysqli_query($conn, "INSERT INTO pengguna(gambar,nama_lengkap,email,telepon,username,password,level,status) VALUES('$foto','$nama_lengkap','$email','$telepon','$username','$password','$level','$status')");
      } else {
        echo "<script>alert('Email tidak valid')</script>";
        return false;
      }
    }

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Pengguna berhasil ditambahkan')</script>":"<script>alert('Pengguna gagal ditambahkan')</script>";
  }

  if( isset($_POST["edituser"]) ){
    $idpengguna = $_POST["id_pengguna"];
    $level = $_POST["level"];
    $status = $_POST["status"];

    mysqli_query($conn, "UPDATE pengguna SET level='$level',status='$status' WHERE id_pengguna='$idpengguna'");

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Pengguna berhasil diubah')</script>":"<script>alert('Pengguna gagal diubah')</script>";
  }

  if( isset($_POST["deleteuser"]) ){
    $idpengguna = $_POST["id_pengguna"];

    $query = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$idpengguna'");
    $row = mysqli_fetch_assoc($query);
    $foto = $row['gambar'];

    $foto=="" ?: unlink("assets/images/user/$foto");

    mysqli_query($conn, "DELETE FROM pengguna WHERE id_pengguna='$idpengguna'");

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Pengguna berhasil dihapus')</script>":"<script>alert('Pengguna gagal dihapus')</script>";
  }

  if( isset($_POST["btnnl"]) ){
    $nama_lengkap = $_POST["inputnl"];

    mysqli_query($conn, "UPDATE pengguna SET nama_lengkap='$nama_lengkap' WHERE id_pengguna='$idp'");

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Profil berhasil diperbarui'); window.location.href='?p=profil'</script>":"<script>alert('Profil gagal diperbarui')</script>";
  }

  if( isset($_POST["btne"]) ){
    $email = $_POST["inpute"];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
      mysqli_query($conn, "UPDATE pengguna SET email='$email' WHERE id_pengguna='$idp'");
    } else {
      echo "<script>alert('Email tidak valid')</script>";
      return false;
    }

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Profil berhasil diperbarui'); window.location.href='?p=profil'</script>":"<script>alert('Profil gagal diperbarui')</script>";
  }

  if( isset($_POST["btnt"]) ){
    $telepon = $_POST["inputt"];

    mysqli_query($conn, "UPDATE pengguna SET telepon='$telepon' WHERE id_pengguna='$idp'");

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Profil berhasil diperbarui'); window.location.href='?p=profil'</script>":"<script>alert('Profil gagal diperbarui')</script>";
  }

  if( isset($_POST["btnu"]) ){
    $username = mysqli_real_escape_string($conn, str_replace(' ', '', strtolower($_POST["inputu"])));

    mysqli_query($conn, "UPDATE pengguna SET username='$username' WHERE id_pengguna='$idp'");

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Profil berhasil diperbarui'); window.location.href='?p=profil'</script>":"<script>alert('Profil gagal diperbarui')</script>";
  }

  if( isset($_POST["btnp"]) ){
    $password = md5($_POST['inputp']);

    mysqli_query($conn, "UPDATE pengguna SET password='$password' WHERE id_pengguna='$idp'");

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Profil berhasil diperbarui'); window.location.href='?p=profil'</script>":"<script>alert('Profil gagal diperbarui')</script>";
  }

  if( isset($_POST["btng"]) ){
    $foto = $_FILES["gambar"]["name"];
    $lokasi = $_FILES["gambar"]["tmp_name"];

    $query = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$idp'");
    $row = mysqli_fetch_assoc($query);

    $fotolama = $row['gambar'];

    $fotolama=="" ?: unlink("assets/images/user/$fotolama");
  
    move_uploaded_file($lokasi, "assets/images/user/".$foto);

    mysqli_query($conn, "UPDATE pengguna SET gambar='$foto' WHERE id_pengguna='$idp'");

    echo mysqli_affected_rows($conn)>0 ? "<script>alert('Profil berhasil diperbarui'); window.location.href='?p=profil'</script>":"<script>alert('Profil gagal diperbarui')</script>";
  }

  if( isset($_POST["logout"]) ){
    session_destroy();
    header("location:login");
    exit;
  }
?>
