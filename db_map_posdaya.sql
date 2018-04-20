-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Apr 2017 pada 10.21
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_map_posdaya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelurahan`
--

CREATE TABLE `tbl_kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `nama_kelurahan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelurahan`
--

INSERT INTO `tbl_kelurahan` (`id_kelurahan`, `nama_kelurahan`) VALUES
(1, 'Desa Cigombong'),
(2, 'Desa Ciadeg'),
(3, 'Desa Tugu Jaya'),
(4, 'Desa Pasir Jaya'),
(5, 'Desa Cisalada'),
(6, 'Desa Wates Jaya'),
(7, 'Desa Srogol'),
(8, 'Desa Ciburayut'),
(9, 'Desa Ciburuy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(34) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `foto`, `level`) VALUES
(3, 'sysadm', 'e0cbf0e62d03796f31da47099682b72b', '../pict/erkek1-300x300.png', 'administrator'),
(4, 'zubair', '1bc87949a9872001498be394f15b9168', '../pict/kec. cigombong.jpg', 'administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wilayah`
--

CREATE TABLE `tbl_wilayah` (
  `id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(20) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `foto` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `id_kelurahan` varchar(5) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kegiatan` text NOT NULL,
  `pengurus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_wilayah`
--

INSERT INTO `tbl_wilayah` (`id_tempat`, `nama_tempat`, `latitude`, `longitude`, `foto`, `alamat`, `id_kelurahan`, `rt`, `rw`, `kegiatan`, `pengurus`) VALUES
(12, 'POSDAYA CIGOMBONG', -6.754066207784845, 106.79888892148438, '../pict/posdaya 2.JPG', 'Watesjaya, Cigombong, Bogor, West Java 16110', '1', '', '', '1. Bank Sampah\r\n2. Perpustakaan\r\n3. Pengajian\r\n4. Posyandu', 'Ketua : Pak RW\r\nWakil Ketua: \r\nSekretaris:\r\nBendahara:'),
(13, 'POSDAYA SROGOL', -6.745798338947121, 106.81648421262207, '../pict/posdaya3.jpg', 'Watesjaya, Cigombong, Bogor, West Java 16110', '1', '', '', '1. Arisan Keliling\r\n2. Pengajian\r\n3. Posyandu', 'Ketua : Pak Rt\r\nWakil Ketua:\r\nSekretaris:\r\nBendahara:'),
(14, 'POSDAYA CIBURAYUT', -6.719928374640357, 106.8013780114502, '../pict/posdaya 1.jpg', 'Jl. Selaawi No. 1, RT 06 / RW 04, Ciburayut, Cigombong, Ciburayut, Cigombong, Bogor, Jawa Barat 16110', '1', '', '', '1. Bersih Desa Sbulan Sekali\r\n2. Perpustakaan Keliling\r\n3. Ngaji Bersama', 'Ketua: Pak Sekdes\r\nWakil Ketua:\r\nSekretaris:\r\nBendahara:'),
(15, 'POSDAYA CIADEG', -6.705010965322573, 106.81429553006592, '../pict/ciadeg.jpg', 'Jl. Padat Karya No 01', '1', '', '', '1. Rutinan Pengajian\r\n2. Perpustakaan\r\n3. Tabungan Keliling tidak ada Bunga\r\n4. Les Private', 'KETUA			        : Asep Saepuloh\r\nSEKERTARIS		: Muhammad Romli\r\nBENDAHARA		: Abdul Wahid\r\nBIDANG KESEHATAN\r\n# KABID		: Dina\r\n# ANGGOTA	: 1. Ida\r\n                                  2. Ipah\r\n                                  3. Didah\r\n                                  4. Alfi\r\nBIDANG EKONOMI		\r\n# KABID		: Ratna Mintarsih\r\n# ANGGOTA	: 1. Yadi\r\n                                  2. Dewi\r\n                                  3. Juliyanto\r\n                                  4. Enih\r\n\r\nBIDANG PENDIDIKAN	\r\n# KABID		: Agung L\r\n# ANGGOTA	: 1. Hardiansyah \r\n                                  2. Lia\r\n                                  3. Linda\r\n                                  4. Fredy\r\n                                  5. Pipih\r\n\r\nBIDANG LINGKUNGAN	\r\nïƒ˜	KABID		: Herman Muso\r\nïƒ˜	ANGGOTA	: 1. Hilman\r\n  2. Hendi\r\n  3. Dadang\r\n  4. Andi\r\n'),
(16, 'POSDAYA WATES JAYA', -6.752372158534407, 106.81087303136292, '../pict/cigombong.jpg', 'Watesjaya, Cigombong, Bogor, West Java 16110', '1', '', '', '1. Pertanian\r\n2. Pengajian\r\n3. Posyandu', 'Ketua: Pak RT\r\nWakil\r\nSekretaris\r\nBendahara'),
(17, 'POSDAYA CISALADA', -6.733907702885287, 106.78667950604859, '../pict/desa cisalada.jpg', 'Jl. Cisalada, Cisalada, Cigombong, Bogor, Jawa Barat 16110', '1', '', '', '1. Pendidikan\r\n2. Keagamaan\r\n3. Ekonomi', 'Ketua: Pak RW\r\nWakil:\r\nSekretaris:\r\nBendahara:'),
(18, 'POSDAYA CIBURUY', -6.731457087539093, 106.81240725491944, '../pict/cigombong.jpg', ' Jl. Raya Cigombong, Ciburuy, Cigombong, Bogor, West Java 16740', '1', '', '', '1. Pengajian\r\n2. Perekonomian\r\n3. \r\n', 'Ketua\r\nWakil\r\nSekretaris\r\nBendahara'),
(19, 'POSDAYA TUGU JAYA', -6.746181902995492, 106.781712054953, '../pict/posdaya.jpg', 'Jl. Tugujaya, Cigombong, Bogor, West Java 16110', '1', '', '', '1. Bank Sampah\r\n2. Pertanian\r\n3. Posayandu', 'Ketua: Pak Ahmad\r\nWakil: Pak Sofyan \r\nSekretaris: Laili\r\nBendahara: Dea'),
(20, 'POSDAYA PASIR JAYA', -6.727557387178448, 106.79092812512818, '../pict/posdaya pasir jaya.jpg', 'Pasir Jaya Kab. Bogor Jawa Barat', '1', '', '', '1.	Pengajian  Seminggu Sekali\r\n2.	Puskesmas\r\n3.	Karang Taruna\r\n4.	Paud', 'Ketua: Pak RW\r\nWakil: Bu Hamidah\r\nSekretaris:\r\nBendahara:');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kelurahan`
--
ALTER TABLE `tbl_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  ADD PRIMARY KEY (`id_tempat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kelurahan`
--
ALTER TABLE `tbl_kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
