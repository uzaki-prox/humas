-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jan 2023 pada 04.52
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `humas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `no_tamu` varchar(8) NOT NULL,
  `tgl` date NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `keperluan` varchar(250) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`no_tamu`, `tgl`, `nama_tamu`, `alamat`, `tlp`, `keperluan`, `keterangan`) VALUES
('1', '2021-06-10', 'as', 'sdfg', 'sdfg', 'sdfg', 'sgd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `no_pengaduan` varchar(8) NOT NULL,
  `tgl` date NOT NULL,
  `nama_pengadu` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `konteks_pengaduan` text NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`no_pengaduan`, `tgl`, `nama_pengadu`, `alamat`, `tlp`, `konteks_pengaduan`, `kepada`, `keterangan`) VALUES
('PGD00001', '2021-06-10', 'sadf', 'asfd', 'sf', 'asdf', 'asfd', 'sfd'),
('PGD00002', '2021-09-13', 'asdfg', 'sdfg', 'dfg', 'sdfg', 'sdg', 'sdfg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `psb`
--

CREATE TABLE `psb` (
  `no_psb` varchar(8) NOT NULL,
  `tgl` date NOT NULL,
  `nama_psb` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `info_dari` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nip` varchar(8) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nip`, `nama_pegawai`, `username`, `password`, `level`) VALUES
('123', 'Rifky Muzaki Nur Salim', 'admin', 'e807f1fcf82d132f9bb018ca6738a19f', 'admin'),
('456', 'pegawai', 'pegawai', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`no_tamu`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`no_pengaduan`);

--
-- Indexes for table `psb`
--
ALTER TABLE `psb`
  ADD PRIMARY KEY (`no_psb`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
