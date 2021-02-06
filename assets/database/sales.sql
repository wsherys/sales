-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 12:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(255) NOT NULL,
  `kode_bank` int(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL,
  `id_bank_cabang` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_cabang`
--

CREATE TABLE `bank_cabang` (
  `id` int(255) NOT NULL,
  `kode_cabang` varchar(255) NOT NULL,
  `nama_cabang` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bisnis`
--

CREATE TABLE `bisnis` (
  `id` int(255) NOT NULL,
  `kode_bisnis` varchar(255) NOT NULL,
  `kode_nomor` varchar(255) NOT NULL,
  `nama_bisnis` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bisnis`
--

INSERT INTO `bisnis` (`id`, `kode_bisnis`, `kode_nomor`, `nama_bisnis`, `status`, `tgl_masuk`, `tgl_ubah`) VALUES
(1, '123', '1234', 'tes 1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '456', '456789', 'tes 2', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cash_on_account`
--

CREATE TABLE `cash_on_account` (
  `id` int(255) NOT NULL,
  `akun` varchar(255) NOT NULL,
  `sub_akun` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kas_masuk` varchar(255) NOT NULL COMMENT 'coa_sign',
  `kode_grup_coa` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_on_account`
--

INSERT INTO `cash_on_account` (`id`, `akun`, `sub_akun`, `keterangan`, `kas_masuk`, `kode_grup_coa`, `status`, `tgl_masuk`, `tgl_ubah`) VALUES
(1, 'akun001', 'sub001', 'tes', '1000', '001', 1, '2021-02-06 16:58:55', '2021-02-06 16:58:55'),
(2, 'akun002', 'sub002', 'tes2', '5000', '002', 0, '2021-02-06 16:58:55', '2021-02-06 16:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `cash_on_account_grp`
--

CREATE TABLE `cash_on_account_grp` (
  `id` int(255) NOT NULL,
  `kode_grup_coa` varchar(255) NOT NULL,
  `nama_grup_coa` varchar(255) NOT NULL,
  `tipe_grup_coa` varchar(255) NOT NULL,
  `flag_sub_ou` int(255) NOT NULL,
  `flag_sub_partner` int(255) NOT NULL,
  `flag_sub_product` int(255) NOT NULL,
  `flag_sub_rc` int(255) NOT NULL,
  `flag_sub_segment` int(255) NOT NULL,
  `flag_system` int(255) NOT NULL,
  `flag_detail` int(255) NOT NULL,
  `flag_sub_ledger` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id` int(255) NOT NULL,
  `kode_gudang` varchar(255) NOT NULL,
  `nama_gudang` varchar(255) NOT NULL,
  `tipe_gudang` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kas_masuk`
--

CREATE TABLE `kas_masuk` (
  `id` int(255) NOT NULL,
  `nama_bisnis` varchar(255) NOT NULL,
  `tgl_invoice` varchar(255) NOT NULL,
  `jangka_waktu` varchar(255) NOT NULL,
  `nomor_transaksi` varchar(255) NOT NULL,
  `nomor_pengiriman` varchar(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(255) NOT NULL,
  `harga_total` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mata_uang`
--

CREATE TABLE `mata_uang` (
  `id` int(255) NOT NULL,
  `kode_mata_uang` varchar(255) NOT NULL,
  `mata_uang` varchar(255) NOT NULL,
  `simbol_mata_uang` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id` int(255) NOT NULL,
  `kode_merek` varchar(255) NOT NULL,
  `nama_merek` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id`, `kode_merek`, `nama_merek`, `status`, `tgl_masuk`, `tgl_ubah`) VALUES
(1, '222', 'merek sebelah', 1, '2021-02-06 15:22:12', '2021-02-06 15:22:12'),
(2, '444', 'merek juga', 0, '2021-02-06 15:22:12', '2021-02-06 15:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(255) NOT NULL,
  `kode_partner` varchar(255) NOT NULL,
  `nama_partner` varchar(255) NOT NULL,
  `status_npwp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `kode_partner`, `nama_partner`, `status_npwp`, `alamat`, `status`, `tgl_masuk`, `tgl_ubah`) VALUES
(1, 'pt001', 'si aa', '1', 'jl.abc', 1, '2021-02-06 17:06:55', '2021-02-06 17:06:55'),
(2, 'pt002', 'si c', '0', 'jl.def', 0, '2021-02-06 17:06:55', '2021-02-06 17:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_penagih` varchar(255) NOT NULL,
  `nama_kontak` varchar(255) NOT NULL,
  `nomor_kontak` int(255) NOT NULL,
  `id_rekening` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(255) NOT NULL,
  `nomor_pengiriman` varchar(255) NOT NULL,
  `nomor_order` varchar(255) NOT NULL,
  `nomor_lacak` varchar(255) NOT NULL,
  `alamat_pengiriman` varchar(255) NOT NULL,
  `tipe_pengiriman` varchar(255) NOT NULL,
  `kode_gudang` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(255) NOT NULL,
  `nomor_transaksi` varchar(255) NOT NULL,
  `nama_order` varchar(255) NOT NULL,
  `kode_bisnis` int(255) NOT NULL,
  `jangka_waktu` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jumlah_produk` varchar(255) NOT NULL,
  `diskon_persen` varchar(255) NOT NULL,
  `diskon_nilai` varchar(255) NOT NULL,
  `harga_total` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(255) NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `sub_produk` varchar(255) NOT NULL,
  `harga_produk` varchar(255) NOT NULL,
  `qty_produk` int(255) NOT NULL,
  `unit_produk` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `sub_produk`, `harga_produk`, `qty_produk`, `unit_produk`, `status`, `tgl_masuk`, `tgl_ubah`) VALUES
(1, '123', 'indo1', 'indo001', '1000', 1, 'Kg', 1, '2021-02-06 15:29:06', '2021-02-06 15:29:06'),
(2, '456', 'indo2', 'indo002', '1500', 2, 'Kg', 0, '2021-02-06 15:29:06', '2021-02-06 15:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `produk_grup`
--

CREATE TABLE `produk_grup` (
  `id` int(255) NOT NULL,
  `kode_grup` varchar(255) NOT NULL,
  `nama_grup` varchar(255) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `tipe` int(255) NOT NULL,
  `coa_grup` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id` int(255) NOT NULL,
  `kode_kategori` int(255) NOT NULL,
  `nama_grup` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk_sub`
--

CREATE TABLE `produk_sub` (
  `id` int(255) NOT NULL,
  `kode_sub` varchar(255) NOT NULL,
  `kode_kategori` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` int(255) NOT NULL,
  `bank_id` int(255) NOT NULL,
  `nomor_rekening` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cicilan_pelanggan`
--

CREATE TABLE `tbl_cicilan_pelanggan` (
  `id` int(255) NOT NULL,
  `id_sales_order` int(255) NOT NULL,
  `id_pengiriman` int(255) NOT NULL,
  `pembayaran_cicilan` varchar(255) NOT NULL,
  `tipe_pembayaran` varchar(255) NOT NULL,
  `dp_pembayaran` varchar(255) NOT NULL,
  `tgl_pembayaran` datetime NOT NULL,
  `tgl_pembayaran_masuk` datetime NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `locate_url` varchar(255) NOT NULL,
  `icon_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `menu`, `name`, `locate_url`, `icon_name`) VALUES
(1, 'master', 'Bisnis', 'CtrlBisnis', 'fa fa-circle-o text-aqua'),
(2, 'master', 'Merek/Brand', 'CtrlMerek', 'fa fa-circle-o text-aqua'),
(3, 'master', 'Produk', 'CtrlProduk', 'fa fa-circle-o text-aqua'),
(4, 'master', 'C.O.A / Kas masuk', 'CtrlCOA', 'fa fa-circle-o text-aqua'),
(5, 'master', 'Partner', 'CtrlPartner', 'fa fa-circle-o text-aqua'),
(6, 'master', 'Unit', 'CtrlUnit', 'fa fa-circle-o text-aqua'),
(7, 'master', 'Gudang/warehouse', 'CtrlGudang', 'fa fa-circle-o text-aqua'),
(8, 'master', 'Bank', 'CtrlBank', 'fa fa-circle-o text-aqua'),
(9, 'master', 'Bank Cabang', 'CtrlBankCabang', 'fa fa-circle-o text-aqua'),
(10, 'master', 'penjualan', 'CtrlPenjualan', 'fa fa-circle-o text-aqua'),
(11, 'master', 'pengiriman', 'CtrlPengiriman', 'fa fa-circle-o text-aqua'),
(13, 'laporan', 'Harian', '#', 'fa fa-circle-o text-aqua'),
(14, 'laporan', 'mingguan', '#', 'fa fa-circle-o text-aqua'),
(182, 'laporan', 'bulanan', '#', 'fa fa-circle-o text-aqua'),
(183, 'penjualan', 'invoice/faktur', '#', 'fa fa-circle-o text-aqua'),
(184, 'produk', 'grup produk', '#', 'fa fa-circle-o text-aqua'),
(185, 'produk', 'sub produk', '#', 'fa fa-circle-o text-aqua'),
(186, 'produk', 'kategori produk', '#', 'fa fa-circle-o text-aqua'),
(187, 'cash on account', 'grup C.O.A / Kas masuk', '#', 'fa fa-circle-o text-aqua');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(255) NOT NULL,
  `kode_unit` int(255) NOT NULL,
  `nama_unit` int(255) NOT NULL,
  `tipe_unit` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_cabang`
--
ALTER TABLE `bank_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bisnis`
--
ALTER TABLE `bisnis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_on_account`
--
ALTER TABLE `cash_on_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_on_account_grp`
--
ALTER TABLE `cash_on_account_grp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_grup`
--
ALTER TABLE `produk_grup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_sub`
--
ALTER TABLE `produk_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_cabang`
--
ALTER TABLE `bank_cabang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bisnis`
--
ALTER TABLE `bisnis`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cash_on_account`
--
ALTER TABLE `cash_on_account`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cash_on_account_grp`
--
ALTER TABLE `cash_on_account_grp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk_grup`
--
ALTER TABLE `produk_grup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk_sub`
--
ALTER TABLE `produk_sub`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
