-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2021 pada 05.21
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_warteg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_menu`
--

CREATE TABLE `daftar_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `jenis` enum('Makanan','Minuman') NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('Tersedia','Habis') NOT NULL,
  `terjual` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_menu`
--

INSERT INTO `daftar_menu` (`id_menu`, `menu`, `gambar`, `jenis`, `harga`, `status`, `terjual`) VALUES
(1, 'Ayam Goreng', 'ayam goreng.jpg', 'Makanan', 7000, 'Habis', 0),
(2, 'Kopi Susu', 'kopi susu.jpeg', 'Minuman', 8000, 'Habis', 0),
(3, 'Es Teh Manis', 'teh manis.jpg', 'Minuman', 3000, 'Tersedia', 0),
(4, 'Es Jeruk', 'es jeruk.jpg', 'Minuman', 3000, 'Habis', 0),
(5, 'Telur Balado', 'telur balado.jpeg', 'Makanan', 4000, 'Tersedia', 0),
(6, 'Air Putih', 'air putih.jpg', 'Minuman', 0, 'Tersedia', 0),
(7, 'Capcay', 'Capcay.jpg', 'Makanan', 10000, 'Habis', 0),
(8, 'Ayam kecap', 'ayam kecap.jpg', 'Makanan', 8000, 'Habis', 0),
(9, 'Terong balado', 'terong balado.jpg', 'Makanan', 8000, 'Tersedia', 0),
(10, 'Telur dadar', 'telor dadar.jpg', 'Makanan', 4000, 'Habis', 0),
(11, 'Ikan Kembung Goreng', 'kembung goreng.jpg', 'Makanan', 7000, 'Tersedia', 0),
(12, 'Nasi', 'nasi.jpg', 'Makanan', 3000, 'Tersedia', 0),
(13, 'Sambal Goreng Kentang', 'kentang balado.jpg', 'Makanan', 4000, 'Tersedia', 0),
(14, 'Kopi Hitam', 'kopi hitam.jpg', 'Minuman', 6000, 'Tersedia', 0),
(15, 'Tumis Kangkung', 'tumis kangkung.jpg', 'Makanan', 3000, 'Tersedia', 0),
(16, 'Tempe Orek', 'tempe orek.jpg', 'Makanan', 1000, 'Tersedia', 0),
(17, 'Mie Goreng', 'mie goreng.jpg', 'Makanan', 2000, 'Tersedia', 0),
(18, 'Lele', 'lele goreng.jpg', 'Makanan', 6000, 'Tersedia', 0),
(19, 'Sayur Asem', 'sayur asem.jpg', 'Makanan', 1000, 'Tersedia', 0),
(20, 'Sop Ceker', 'sop ceker.jpg', 'Makanan', 2000, 'Habis', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail_pesanan` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `penghasilan_bersih` int(11) NOT NULL,
  `penghasilan_kotor` int(11) NOT NULL,
  `modal` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','kasir') NOT NULL,
  `status` enum('aktif','pasif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `gambar`, `nama_lengkap`, `email`, `telepon`, `username`, `password`, `level`, `status`) VALUES
(1, 'admin.png', 'admin', 'admin@admin.com', '0', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'aktif'),
(2, 'kasir.png', 'kasir', 'kasir@kasir.com', '0', 'kasir', 'de28f8f7998f23ab4194b51a6029416f', 'kasir', 'aktif'),
(3, 'boyer.png', 'M Prasetya Nugroho', 'muhammadprasetya54@gmail.com', '081296949472', 'asd', 'a8f5f167f44f4964e6c998dee827110c', 'admin', 'aktif'),
(4, 'boy.png', 'M Ghibran Alfariddzi', 'alfariddzighibran@gmail.com', '0895620175577', 'ghigie', 'd7cacb8d65566c4799bc8251c12e1a7e', 'admin', 'aktif'),
(5, 'man.png', 'Fahreza Dahrudin', 'rezadahrudin@gmail.com', '082113724697', 'mcristian', '3ed6e995474bc6dddef7a6fc9b97c965', 'admin', 'aktif'),
(6, 'programmer.png', 'M Arya Praseptya', 'm.arya.praseptya@gmail.com', '081928828384', 'jncktzy', '611dd931040ba2284d0adc26a5e3f056', 'admin', 'aktif'),
(7, 'woman.png', 'Kaila Hasifa', 'kailahasifa@gmail.com', '089636741975', 'kaila', 'f689dcaa95b9e63db887932e8e0c5c9f', 'admin', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `nama_transaksi` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_menu`
--
ALTER TABLE `daftar_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `daftar_menu` (`id_menu`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
