-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 07:05 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bakso`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesan_keluar`
--

CREATE TABLE `pesan_keluar` (
  `IdPesanKeluar` int(10) NOT NULL,
  `Id_Pengirim` int(11) DEFAULT NULL,
  `TanggalKirim` datetime NOT NULL,
  `IsiPesan` longtext NOT NULL,
  `Id_Penerima` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan_masuk`
--

CREATE TABLE `pesan_masuk` (
  `IdPesanMasuk` int(10) NOT NULL,
  `Id_Pengirim` int(11) DEFAULT NULL,
  `TanggalKirim` datetime NOT NULL,
  `IsiPesan` longtext COLLATE latin1_general_ci NOT NULL,
  `Id_Penerima` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `orders_id` int(11) NOT NULL,
  `invoices_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `voucher_kode` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `orders_nama` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `orders_alamat` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `orders_kota` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `orders_kodepos` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `orders_notelp` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `orders_totalharga` bigint(20) NOT NULL DEFAULT 0,
  `tipe_pembayaran` enum('transfer','cod') COLLATE latin1_general_ci DEFAULT NULL,
  `orders_date` datetime DEFAULT NULL,
  `orders_duedate` datetime DEFAULT NULL,
  `bukti_nama_pengirim` text COLLATE latin1_general_ci DEFAULT NULL,
  `bukti_transaksi` text COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `status` enum('paid','unpaid','canceled','expired') COLLATE latin1_general_ci NOT NULL DEFAULT 'unpaid',
  `status_pengiriman` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = Belum dikirim | 1 = Sudah dikirim | 2 = Sudah diterima'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`orders_id`, `invoices_id`, `users_id`, `voucher_kode`, `orders_nama`, `orders_alamat`, `orders_kota`, `orders_kodepos`, `orders_notelp`, `orders_totalharga`, `tipe_pembayaran`, `orders_date`, `orders_duedate`, `bukti_nama_pengirim`, `bukti_transaksi`, `tgl_transaksi`, `status`, `status_pengiriman`) VALUES
(1, 'INV20210700001', 22, NULL, 'Mohammad Irwansyah Somantri', 'Ciledug', 'Cirebon', '45111', '6283825287989', 13400, 'transfer', '2021-07-22 00:43:08', '2021-07-23 05:43:08', 'asdasda', 'WhatsApp Image 2021-07-21 at 15.46.33.jpeg', '2021-07-22 05:15:28', 'paid', 1),
(6, 'INV20210700002', 22, NULL, 'M Teguh A', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188', '083825287989', 32900, 'cod', '2021-07-23 15:01:51', '2021-07-24 15:01:51', NULL, NULL, NULL, 'unpaid', 0),
(7, 'INV20210700003', 22, NULL, 'M Teguh A', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188', '083825287989', 6500, 'cod', '2021-07-23 15:31:00', '2021-07-24 15:31:00', NULL, NULL, NULL, 'unpaid', 0),
(8, 'INV20210700004', 22, 'NTP8APR8PBV7D6M', 'M Teguh A', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188', '083825287989', 0, 'cod', '2021-07-23 15:34:10', '2021-07-24 15:34:10', NULL, NULL, NULL, 'unpaid', 0),
(9, 'INV20210700005', 22, 'NTP8APR8PBV7D6M', 'M Teguh A', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188', '083825287989', 0, 'cod', '2021-07-23 15:35:38', '2021-07-24 15:35:38', NULL, NULL, NULL, 'paid', 0),
(10, 'INV20210700006', 22, 'NTP8APR8PBV7D6M', 'M Teguh A', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188', '083825287989', 0, 'cod', '2021-07-23 15:55:47', '2021-07-24 15:55:47', NULL, NULL, NULL, 'paid', 1),
(11, 'INV20210700007', 22, 'NTP8APR8PBV7D6M', 'M Teguh A', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188', '083825287989', 0, 'transfer', '2021-07-23 16:12:17', '2021-07-24 16:12:17', NULL, NULL, NULL, 'paid', 1),
(12, 'INV20210700008', 23, NULL, 'anjay nyobain', 'Kuningan', NULL, '45516', '08952548456', 6500, 'transfer', '2021-07-23 17:30:32', '2021-07-24 17:30:32', NULL, NULL, NULL, 'unpaid', 0),
(13, 'INV20210700009', 23, NULL, 'anjay nyobain', 'Kuningan', NULL, '45516', '08952548456', 6500, 'transfer', '2021-07-23 17:33:23', '2021-07-24 17:33:23', 'yyy', 'beras.jpg', '2021-07-23 17:44:21', 'unpaid', 0),
(14, 'INV20210700010', 24, NULL, 'User ', 'Jl raya Siliwangi, Blok A 5 ', NULL, '45554', '087111222333', 13200, 'transfer', '2021-07-24 13:03:57', '2021-07-25 13:03:57', 'User', 'IMG-20210722-WA0006.jpg', '2021-07-24 13:04:44', 'paid', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_detail`
--

CREATE TABLE `tb_pembelian_detail` (
  `orders_detail_id` int(11) NOT NULL,
  `orders_id` int(11) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `kuantitas` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_pembelian_detail`
--

INSERT INTO `tb_pembelian_detail` (`orders_detail_id`, `orders_id`, `produk_id`, `kuantitas`) VALUES
(1, 1, 4, 2),
(2, 6, 4, 2),
(3, 6, 6, 1),
(4, 6, 6, 2),
(5, 7, 6, 1),
(6, 8, 6, 1),
(7, 9, 6, 1),
(8, 10, 6, 1),
(9, 11, 6, 2),
(10, 12, 6, 1),
(11, 13, 6, 1),
(12, 14, 4, 0),
(13, 14, 4, 1),
(14, 14, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `users_id` int(11) NOT NULL,
  `users_nama` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `points` bigint(20) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `role_id` tinyint(4) NOT NULL DEFAULT 2 COMMENT '0 = Admin | 1 = Pemilik | 2 = User',
  `nomortelp` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text COLLATE latin1_general_ci DEFAULT NULL,
  `kode_pos` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`users_id`, `users_nama`, `points`, `image`, `email`, `password`, `role_id`, `nomortelp`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kode_pos`) VALUES
(1, 'Mohammad Irwansyah Somantri', 0, '', 'mirwansyah1933@gmail.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', 0, '083825287989', 'Cirebon', '2011-06-21', 'Ciledug Kulon', '45188'),
(18, 'asdas', 0, NULL, 'qweqw@asdas.asdas', '78c2e21e96e6c96c77768637a3ab09fef24fe513', 1, NULL, NULL, NULL, NULL, NULL),
(19, 'asdasdq', 0, NULL, '12312@asda.123', 'd2c40242ce1bd9a59d204347868d086698e85138', 2, NULL, NULL, NULL, NULL, NULL),
(22, 'M Teguh A', 0, 'HuggingFace.png', 'mohammadirwansyah1933@gmail.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', 2, '083825287989', 'Cirebon', '2001-06-17', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', '45188'),
(23, 'anjay nyobain', 0, '', 'coba@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 2, '08952548456', 'Kuningan', '1999-11-25', 'Kuningan', '45516'),
(24, 'User ', 300, 'IMG-20210718-WA0023.jpg', 'user@gmail.com', '60bddb16409a2baf76936619afecf778dabe68de', 2, '087111222333', 'Kuningan', '1996-07-17', 'Jl raya Siliwangi, Blok A 5 ', '45554');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna_voucher`
--

CREATE TABLE `tb_pengguna_voucher` (
  `users_voucher_id` int(11) NOT NULL,
  `voucher_kode` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `redeem_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_pengguna_voucher`
--

INSERT INTO `tb_pengguna_voucher` (`users_voucher_id`, `voucher_kode`, `users_id`, `redeem_date`) VALUES
(3, 'NTP8APR8PBV7D6M', 22, '2021-07-23 18:22:13'),
(4, 'YBN4RCZKS61X60E', 22, '2021-07-23 18:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `produk_harga` bigint(20) NOT NULL DEFAULT 0,
  `produk_stok` tinyint(4) NOT NULL DEFAULT 0,
  `produk_image` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `date_entry` datetime NOT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `produk_nama`, `produk_harga`, `produk_stok`, `produk_image`, `date_entry`, `users_id`) VALUES
(4, 'Beras', 6700, 100, 'kissingFace.png', '2021-07-22 00:21:00', NULL),
(6, 'Telur', 6500, 89, 'overingFace.png', '2021-07-22 16:31:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_voucher`
--

CREATE TABLE `tb_voucher` (
  `voucher_id` int(11) NOT NULL,
  `voucher_nama` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `voucher_kode` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `voucher_nominal` bigint(20) NOT NULL DEFAULT 0,
  `voucher_harga` bigint(20) NOT NULL DEFAULT 0,
  `voucher_expired` datetime NOT NULL,
  `date_entry` datetime NOT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_voucher`
--

INSERT INTO `tb_voucher` (`voucher_id`, `voucher_nama`, `voucher_kode`, `voucher_nominal`, `voucher_harga`, `voucher_expired`, `date_entry`, `users_id`) VALUES
(4, 'Voucher 25.000', 'YBN4RCZKS61X60E', 25000, 30000, '2021-07-31 00:00:00', '2021-07-21 23:28:09', 1),
(5, 'Voucher 50.000', 'NTP8APR8PBV7D6M', 50000, 60000, '2021-07-24 00:00:00', '2021-07-22 00:04:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_website`
--

CREATE TABLE `tb_website` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tentang` text NOT NULL,
  `namabank` varchar(50) DEFAULT NULL,
  `atasnama` varchar(90) DEFAULT NULL,
  `norek` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_website`
--

INSERT INTO `tb_website` (`id`, `nama`, `notelp`, `email`, `alamat`, `tentang`, `namabank`, `atasnama`, `norek`) VALUES
(1, 'Toko Cahaya', '083825287989', 'mirwansyah1933@gmail.com', 'Jl. RA Kartini, RT 04 / RW 01, Blok Pon, No. 45, Kabupaten Cirebon, Jawa Barat, 45188', 'Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet Semper at elit team advisors.', 'BNI', 'Mohammad Irwansyah Somantri', '32616612');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesan_keluar`
--
ALTER TABLE `pesan_keluar`
  ADD PRIMARY KEY (`IdPesanKeluar`),
  ADD KEY `Id_Pengirim` (`Id_Pengirim`),
  ADD KEY `Id_Penerima` (`Id_Penerima`);

--
-- Indexes for table `pesan_masuk`
--
ALTER TABLE `pesan_masuk`
  ADD PRIMARY KEY (`IdPesanMasuk`),
  ADD KEY `Id_Pengirim` (`Id_Pengirim`),
  ADD KEY `Id_Penerima` (`Id_Penerima`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`orders_id`),
  ADD UNIQUE KEY `invoices_id` (`invoices_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `voucher_kode` (`voucher_kode`);

--
-- Indexes for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  ADD PRIMARY KEY (`orders_detail_id`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `orders_id` (`orders_id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_pengguna_voucher`
--
ALTER TABLE `tb_pengguna_voucher`
  ADD PRIMARY KEY (`users_voucher_id`),
  ADD KEY `voucher_kode` (`voucher_kode`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  ADD PRIMARY KEY (`voucher_id`),
  ADD UNIQUE KEY `voucher_kode` (`voucher_kode`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `tb_website`
--
ALTER TABLE `tb_website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesan_keluar`
--
ALTER TABLE `pesan_keluar`
  MODIFY `IdPesanKeluar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan_masuk`
--
ALTER TABLE `pesan_masuk`
  MODIFY `IdPesanMasuk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  MODIFY `orders_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_pengguna_voucher`
--
ALTER TABLE `tb_pengguna_voucher`
  MODIFY `users_voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_website`
--
ALTER TABLE `tb_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesan_keluar`
--
ALTER TABLE `pesan_keluar`
  ADD CONSTRAINT `pesan_keluar_ibfk_1` FOREIGN KEY (`Id_Penerima`) REFERENCES `tb_pengguna` (`users_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pesan_keluar_ibfk_2` FOREIGN KEY (`Id_Pengirim`) REFERENCES `tb_pengguna` (`users_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pesan_masuk`
--
ALTER TABLE `pesan_masuk`
  ADD CONSTRAINT `pesan_masuk_ibfk_1` FOREIGN KEY (`Id_Penerima`) REFERENCES `tb_pengguna` (`users_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pesan_masuk_ibfk_2` FOREIGN KEY (`Id_Pengirim`) REFERENCES `tb_pengguna` (`users_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD CONSTRAINT `tb_pembelian_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tb_pengguna` (`users_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembelian_ibfk_2` FOREIGN KEY (`voucher_kode`) REFERENCES `tb_voucher` (`voucher_kode`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  ADD CONSTRAINT `tb_pembelian_detail_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `tb_pembelian` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembelian_detail_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `tb_produk` (`produk_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengguna_voucher`
--
ALTER TABLE `tb_pengguna_voucher`
  ADD CONSTRAINT `tb_pengguna_voucher_ibfk_1` FOREIGN KEY (`voucher_kode`) REFERENCES `tb_voucher` (`voucher_kode`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengguna_voucher_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `tb_pengguna` (`users_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tb_pengguna` (`users_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  ADD CONSTRAINT `tb_voucher_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tb_pengguna` (`users_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
