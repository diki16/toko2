-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jan 2020 pada 13.59
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_barang` varchar(50) NOT NULL,
  `n_barang` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `kuantitas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_barang`, `n_barang`, `harga`, `kuantitas`) VALUES
('488923', 'Nasi Uduk', 40000, 89329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `gambar`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'anu', 'rizkyfajar_anugrah@yahoo.com', 'default.jpg', '$2y$10$FlLN/OhscLLAgWbWo1IVXOLtL6QVUGCZJx2zVuFVJmkzRygH7Wt3C', 2, 1, 1576995076),
(5, 'Rizky Fajar Huwaaa', 'rizky.fajar.anugrah@gmail.com', 'WIN_20160326_11_52_41_Pro.jpg', '$2y$10$IrDf141ZsyB2CnsB0v7Dk.LQ.AsdBWq/cB4ymxC.VH1AosOyWrSIW', 1, 1, 1577013041),
(6, 'rizkyfjra', 'rizkyfajaranugrah2@gmail.com', 'default.jpg', '$2y$10$IEAnxy8jae6zaaF.fnGet.rY0AO21plyDdOsH3eRwpCp0dq8woYCq', 2, 1, 1579358255),
(7, 'Dicky Nursalim', 'blackdesirewx9@gmail.com', 'default.jpg', '$2y$10$QNZwjggUL92e2w1yQSj71OQpG1b29YN3lxU6.7FppuxuMvfYH1/ei', 2, 0, 1579694358);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 3, 2),
(5, 3, 2),
(7, 1, 5),
(9, 1, 9),
(10, 2, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(5, 'Menu'),
(9, 'Tentang App/Cara Penggunaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Kelola Toko / Cafe', 'HalamanUtama', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profile', 'User', 'fas fa-fw fa-user-alt', 1),
(5, 1, 'Transaksi', 'transaksi', 'fas fa-fw fa-dollar-sign', 1),
(6, 5, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(7, 5, 'SubMenu Management', 'menu/submenu', 'far fa-fw fa-folder-open', 1),
(12, 1, 'Role', 'HalamanUtama/role', 'fas fa-fw fa-user-tie', 1),
(13, 2, 'Ubah Profile', 'user/edit', 'fas fa-fw fa-user-tie', 1),
(14, 2, 'Ganti Password', 'user/editpassword', 'fas fa-fw fa-key', 1),
(15, 9, 'Cara Penggunaan', 'carapakai', 'fas fa-fw fa-info', 1),
(16, 9, 'Fitur Kasir', 'carapakai/fitur', 'fas fa-fw fa-award', 1),
(17, 1, 'Stok Barang', 'dbarang', 'fas fa-fw fa-archive', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `data_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `data_created`) VALUES
(1, 'rizkyfajaranugrah2@gmail.com', 'S14Zv6zlq+MxoLnodPwr5Zm473kWZzKpYCxs2eiGeQc=', 0),
(2, 'rizky.fajar.anugrah@gmail.com', 'VJUL1IkfQn8aEMbyAkL2WWGBkrzwmAsONIk0NWruq30=', 0),
(3, 'rizky.fajar.anugrah@gmail.com', '7gr7GnbZPikUDuETPXmMJP3HWbsdeeZC3uPWdVtp5JA=', 0),
(4, 'rizkyfajaranugrah2@gmail.com', 'Zp6hnUPHT6eaYmqiBJFV0wE2F/VhX5A3K625c6vYBw0=', 0),
(5, 'rizkyfajaranugrah2@gmail.com', 'X4KH2wpfvJpxGrzQJposP2/QF+AagrjsHhXgGmMFnfk=', 0),
(6, 'rizkyfajaranugrah2@gmail.com', 'xMg63k/TxJ8R2sbO0/+pZyk3hCO4MIIFa1MRE1Ziltk=', 0),
(7, 'blackdesirewx9@gmail.com', 'M3khBUcdsdwvUi4EPgPuNN9FGsxXDWajuKqOYZFAfRQ=', 1579694358);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
