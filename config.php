<?php
  // $server = "localhost";
  // $user = "lingkar9-g";
  // $pass = "aT7g7LyxE";
  // $db = "lingkar9-g";

  $server = "localhost";
  $user = "root";
  $pass = "";
  $db = "kasir_warteg";

  $conn = mysqli_connect("$server", "$user", "$pass", "$db");

  if( !$conn ){
    die("<h1>Koneksi ke basis data gagal</h1>");
  }
?>