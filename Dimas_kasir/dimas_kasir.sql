-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2023 pada 04.48
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
(5, 'Rehan JPG', 9999999, 1, 'rehan.jpg', 'Tersedia'),
(6, 'Biawak Batam', 12000, 1, 'mahesa_gantenk.jpg', 'Tersedia');

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
(5, 'a', 'gedrgg', '1242345', 'Perempuan', 'Bandung', '2023-11-09', 'Silver');

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
-- AUTO_INCREMENT untuk tabel `dimas_kategori`
--
ALTER TABLE `dimas_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dimas_menu`
--
ALTER TABLE `dimas_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `dimas_nama_role`
--
ALTER TABLE `dimas_nama_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dimas_pelanggan`
--
ALTER TABLE `dimas_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dimas_user`
--
ALTER TABLE `dimas_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
