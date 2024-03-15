-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2023 pada 08.35
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dimas_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimas_detail_order`
--

CREATE TABLE `dimas_detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_detail_order` enum('Selesai','Belum Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dimas_detail_order`
--

INSERT INTO `dimas_detail_order` (`id_detail_order`, `id_order`, `id_menu`, `jumlah`, `status_detail_order`) VALUES
(1, 13, 3, 3, 'Selesai'),
(2, 13, 5, 2, 'Selesai'),
(4, 13, 4, 2, 'Selesai'),
(5, 14, 1, 3, 'Selesai'),
(6, 14, 4, 2, 'Selesai'),
(7, 15, 2, 2, 'Selesai'),
(8, 15, 5, 1, 'Selesai'),
(9, 16, 4, 2, 'Selesai'),
(10, 17, 1, 2, 'Selesai'),
(11, 18, 1, 5, 'Selesai'),
(12, 19, 2, 5, 'Selesai'),
(13, 20, 1, 3, 'Selesai'),
(14, 21, 1, 3, 'Selesai'),
(15, 22, 2, 5, 'Selesai'),
(16, 23, 2, 3, 'Selesai'),
(17, 21, 3, 3, 'Selesai'),
(18, 23, 3, 3, 'Selesai'),
(19, 19, 5, 2, 'Selesai'),
(20, 24, 4, 2, 'Selesai'),
(21, 25, 3, 2, 'Selesai'),
(22, 25, 4, 3, 'Selesai'),
(23, 25, 5, 4, 'Selesai'),
(24, 25, 6, 3, 'Selesai'),
(25, 25, 3, 3, 'Selesai'),
(26, 25, 3, 2, 'Selesai'),
(27, 25, 4, 1, 'Selesai'),
(28, 25, 4, 3, 'Selesai'),
(29, 25, 3, 2, 'Selesai'),
(30, 25, 2, 3, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimas_detail_order_temp`
--

CREATE TABLE `dimas_detail_order_temp` (
  `id_detail_order_temp` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimas_kategori`
--

CREATE TABLE `dimas_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dimas_kategori`
--

INSERT INTO `dimas_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Food'),
(2, 'Drink');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimas_menu`
--

CREATE TABLE `dimas_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `foto_menu` varchar(100) NOT NULL,
  `status_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dimas_menu`
--

INSERT INTO `dimas_menu` (`id_menu`, `nama_menu`, `harga_menu`, `id_kategori`, `foto_menu`, `status_menu`) VALUES
(1, 'Ayam', 10000, 1, 'xxi.png', 'Tersedia'),
(2, 'Bebek', 12000, 1, '', 'Tersedia'),
(3, 'Extra Joss', 7000, 2, 'avatar.png', 'Tersedia'),
(4, 'Babi Kecap', 20000, 1, 'avatar.png', 'Tidak Tersedia'),
(5, 'Rehan JPG', 20000, 1, 'rehan.jpg', 'Tersedia'),
(6, 'Biawak Batam', 12000, 1, 'mahesa_gantenk.jpg', 'Tersedia'),
(7, 'OKI', 9000, 2, '', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimas_nama_role`
--

CREATE TABLE `dimas_nama_role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dimas_nama_role`
--

INSERT INTO `dimas_nama_role` (`id_role`, `nama`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimas_order`
--

CREATE TABLE `dimas_order` (
  `id_order` int(11) NOT NULL,
  `no_meja` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status_order` enum('Selesai','Menunggu Pembayaran','Belum Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dimas_order`
--

INSERT INTO `dimas_order` (`id_order`, `no_meja`, `tanggal`, `id_user`, `id_pelanggan`, `total`, `status_order`) VALUES
(13, '6', '2023-12-06 07:44:05', 1, 2, 101000, 'Selesai'),
(14, '4', '2023-12-06 08:02:33', 1, 3, 70000, 'Selesai'),
(15, '3', '2023-12-06 08:03:00', 1, 7, 44000, 'Selesai'),
(16, '1', '2023-12-06 08:04:15', 1, 1, 40000, 'Selesai'),
(17, '3', '2023-12-06 08:04:41', 1, 1, 20000, 'Selesai'),
(18, '4', '2023-12-06 08:07:19', 1, 2, 50000, 'Selesai'),
(19, '8', '2023-12-06 08:07:38', 1, 3, 100000, 'Selesai'),
(20, '4', '2023-12-06 08:33:27', 1, 1, 30000, 'Selesai'),
(21, '4', '2023-12-06 08:47:44', 1, 8, 51000, 'Selesai'),
(22, '5', '2023-12-06 08:54:44', 1, 5, 60000, 'Selesai'),
(23, '4', '2023-12-06 09:00:54', 1, 5, 57000, 'Selesai'),
(24, '10', '2023-12-06 10:30:37', 1, 7, 40000, 'Selesai'),
(25, '8', '2023-12-06 11:24:45', 1, 8, 355000, 'Selesai'),
(26, '5', '2023-12-06 14:21:33', 1, 3, 0, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimas_order_temp`
--

CREATE TABLE `dimas_order_temp` (
  `id_order_temp` int(11) NOT NULL,
  `no_meja` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimas_pelanggan`
--

CREATE TABLE `dimas_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_pelanggan` enum('Gold','Silver','Bronze') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dimas_pelanggan`
--

INSERT INTO `dimas_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_telepon`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `jenis_pelanggan`) VALUES
(1, 'Usna', 'Jl. Cibeber', '08564649787', 'Laki-laki', 'Cimahi', '2003-05-10', 'Silver'),
(2, 'Dimas ', 'Jl.Cihanjuang', '08546552130', 'Laki-laki', 'Cimahi', '2006-10-21', 'Gold'),
(3, 'Irna', 'Jl. Sana', '0854465231', 'Perempuan', 'Bandung', '2010-12-21', 'Bronze'),
(5, 'a', 'gedrgg', '1242345', 'Perempuan', 'Bandung', '2023-11-09', 'Silver'),
(7, 'Dinda', 'jl.wkwkwk', '123567485', 'Laki-laki', 'New York', '2023-11-15', 'Bronze'),
(8, 'Setiawan', 'Jl. Ardi bau', '2354645', 'Laki-laki', 'Selokan', '2023-11-16', 'Gold');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimas_user`
--

CREATE TABLE `dimas_user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nama_user` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dimas_user`
--

INSERT INTO `dimas_user` (`id_user`, `id_role`, `username`, `password`, `nama_user`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(2, 2, 'manager', '1d0258c2440a8d19e716292b231e3190', 'Manager'),
(3, 3, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir'),
(4, 2, 'dimas', '7d49e40f4b3d8f68c19406a58303f826', 'Dimas'),
(5, 1, 'tes', '7d49e40f4b3d8f68c19406a58303f826', 'TES'),
(7, 1, 'asdsad', '056f32ee5cf49404607e368bd8d3f2af', 'adasd');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dimas_detail_order`
--
ALTER TABLE `dimas_detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indeks untuk tabel `dimas_detail_order_temp`
--
ALTER TABLE `dimas_detail_order_temp`
  ADD PRIMARY KEY (`id_detail_order_temp`);

--
-- Indeks untuk tabel `dimas_kategori`
--
ALTER TABLE `dimas_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `dimas_menu`
--
ALTER TABLE `dimas_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `dimas_nama_role`
--
ALTER TABLE `dimas_nama_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `dimas_order`
--
ALTER TABLE `dimas_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `dimas_order_temp`
--
ALTER TABLE `dimas_order_temp`
  ADD PRIMARY KEY (`id_order_temp`);

--
-- Indeks untuk tabel `dimas_pelanggan`
--
ALTER TABLE `dimas_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `dimas_user`
--
ALTER TABLE `dimas_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dimas_detail_order`
--
ALTER TABLE `dimas_detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `dimas_detail_order_temp`
--
ALTER TABLE `dimas_detail_order_temp`
  MODIFY `id_detail_order_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `dimas_kategori`
--
ALTER TABLE `dimas_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dimas_menu`
--
ALTER TABLE `dimas_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `dimas_nama_role`
--
ALTER TABLE `dimas_nama_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dimas_order`
--
ALTER TABLE `dimas_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `dimas_order_temp`
--
ALTER TABLE `dimas_order_temp`
  MODIFY `id_order_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `dimas_pelanggan`
--
ALTER TABLE `dimas_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `dimas_user`
--
ALTER TABLE `dimas_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
