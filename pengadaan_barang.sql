-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 10:50 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengadaan_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` varchar(20) NOT NULL,
  `namabarang` varchar(20) NOT NULL,
  `gambar` varchar(20) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `gambar`, `jenis`, `username`) VALUES
('BARANG-0001', 'buku', 'spph.jpg', 'peralatan kantor', 'info'),
('BARANG-0002', 'meja', 'warna.jpg', 'Meubelair / furniture', 'info'),
('BARANG-0003', 'jjz', 'warna1.jpg', 'Meubelair / furniture', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `hak_akses` varchar(8) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(30) NOT NULL,
  `alamat_perusahaan` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`hak_akses`, `npwp`, `nama_perusahaan`, `alamat_perusahaan`, `contact`, `email`, `username`, `password`, `status`) VALUES
('customer', 'spph.jpg', 'ayam', 'ayam', '12345', 'ayidhae@yahoo.com', 'ayam', 'bffa783a022fe2d98692014dda6d7a4c', 'aktif'),
('customer', 'tipe_tpa3.PNG', 'yg entt', 'busan  444k3n 4000', '123456', 'ayidhae@yahoo.com', 'black', '81dc9bdb52d04dc20036dbd8313ed055', 'aktif'),
('customer', 'warna15.jpg', 'yg ent', 'Jl. Radio Palasari No. 1 Dayeuh Kolot, Kab. Bandun', '111', 'exo@aaa.com', 'exo', '64fea43893b845d96ac6cb974b3a5d23', 'aktif'),
('customer', 'warna4.jpg', 'luna', 'sm', '12345', 'ayidhae@yahoo.com', 'luna', 'ba8a48b0e34226a2992d871c65600a7c', 'aktif'),
('customer', 'tipe_tpa1.PNG', 'jyp ent', 'soekarno hattaA', '1234551', 'mediawave@gamil.com', 'mw', '38fed7107cee058098ca06304c1beb90', 'aktif'),
('customer', 'tipe_tpa2.PNG', 'PT pertamina indonesia', 'jln soekarno hatta', '12345', 'elvirabelieber@gmail.com', 'pertamina', '202cb962ac59075b964b07152d234b70', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` varchar(10) NOT NULL,
  `nama_pengadaan` varchar(30) DEFAULT NULL,
  `nama_customer` varchar(20) DEFAULT NULL,
  `nama_vendor` varchar(20) DEFAULT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `nama_pengadaan`, `nama_customer`, `nama_vendor`, `tgl_input`, `tgl_selesai`, `status`, `catatan`) VALUES
('PESAN001', NULL, 'ayam', 'as', '2018-06-30 11:24:24', '2018-07-02', 'Progress', '     ssddddddddddddddddddddd\r\nddddddddddd'),
('PESAN002', 'e', 'ayam', 'info', '2018-06-30 12:52:34', '2018-07-02', 'Waiting', ''),
('PESAN003', 'r', 'mw', 'as', '2018-07-02 03:59:59', '2018-07-02', 'Waiting', ' ss'),
('PESAN004', 'server', 'pertamina', 'info', '2018-07-03 07:50:21', NULL, NULL, NULL),
('PESAN005', 'komputer', 'ayam', 'as', '2018-07-04 05:11:43', NULL, NULL, NULL),
('PESAN006', 'komputer', 'ayam', 'as', '2018-07-04 05:56:24', NULL, NULL, NULL),
('PESAN007', 'komputer', 'ayam', 'as', '2018-07-04 05:58:35', NULL, NULL, NULL),
('PESAN008', 'komputer', 'ayam', 'as', '2018-07-04 06:00:26', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `detail_id` int(11) NOT NULL,
  `pesanan_id` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `vol` int(11) NOT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`detail_id`, `pesanan_id`, `nama_barang`, `satuan`, `harga`, `vol`, `subtotal`) VALUES
(13, 'PESAN001', 'exo', 'unit', 2000, 1, 2000),
(14, 'PESAN002', 'exodus', 'unit', 1000, 2, 2000),
(15, 'PESAN004', 'server', 'unit', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `progress_pengadaan`
--

CREATE TABLE `progress_pengadaan` (
  `tanggal` date NOT NULL,
  `nama_customer` varchar(30) DEFAULT NULL,
  `nama_vendor` varchar(30) DEFAULT NULL,
  `progress` varchar(100) NOT NULL,
  `kendala` varchar(500) NOT NULL,
  `id_progress` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress_pengadaan`
--

INSERT INTO `progress_pengadaan` (`tanggal`, `nama_customer`, `nama_vendor`, `progress`, `kendala`, `id_progress`) VALUES
('2018-06-27', 'ayam', 'as', 'sudah dikirim spph', 'aa', 'PROGRESS-0002'),
('2018-07-02', 'mw', 'as', 'sudah dikirim spph', 's', 'PROGRESS-0003'),
('2018-07-04', 'ayam', 'as', 's', 's', 'PROGRESS-0004'),
('2018-07-04', 'luna', 'info', 'new', 'habis', 'PROGRESS-0005');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tgl_surat` datetime DEFAULT NULL,
  `pesan` varchar(200) NOT NULL,
  `tujuan_customer` varchar(20) DEFAULT NULL,
  `tujuan_direktur` varchar(20) DEFAULT NULL,
  `tujuan_vendor` varchar(20) DEFAULT NULL,
  `tujuan_logistik` varchar(20) DEFAULT NULL,
  `file` varchar(200) NOT NULL,
  `status_approve` varchar(30) DEFAULT NULL,
  `penanggung_jawab` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat`, `username`, `jenis_surat`, `no_surat`, `tgl_surat`, `pesan`, `tujuan_customer`, `tujuan_direktur`, `tujuan_vendor`, `tujuan_logistik`, `file`, `status_approve`, `penanggung_jawab`, `no_hp`) VALUES
(1, 'exo', 'SPPH', '1234', '2018-07-05 08:31:42', '', NULL, 'sugirto', NULL, NULL, 'tipe_tpa4.PNG', 'YA', 'kai', '09121312'),
(2, 'destaya', 'sph', '', '2018-07-05 10:03:51', 'ss', 'mw', NULL, NULL, NULL, 'warna18.jpg', NULL, 'minho', '123');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `pesanan_id` varchar(10) NOT NULL,
  `no_spph` varchar(50) NOT NULL,
  `tgl_spph` date NOT NULL,
  `tgl_sph` date DEFAULT NULL,
  `kepada_vendor` text NOT NULL,
  `kepada_customer` text,
  `no_sph` varchar(20) DEFAULT NULL,
  `lampiran` int(11) DEFAULT NULL,
  `nomor_spk` varchar(50) DEFAULT NULL,
  `tgl_negoisasi_spk` date DEFAULT NULL,
  `lokasi_pengadaan` text,
  `jangka_waktu` int(11) DEFAULT NULL,
  `nama_pihak_vendor` varchar(100) DEFAULT NULL,
  `jabatan_pihak_vendor` varchar(100) DEFAULT NULL,
  `alamat_pihak_vendor` text,
  `hp_pihak_vendor` varchar(15) DEFAULT NULL,
  `fax_pihak_vendor` varchar(20) DEFAULT NULL,
  `nama_rekening_vendor` varchar(50) DEFAULT NULL,
  `no_rekening_vendor` varchar(50) DEFAULT NULL,
  `bank_rekening_vendor` varchar(50) DEFAULT NULL,
  `tgl_spk` date DEFAULT NULL,
  `nama_vendor` varchar(30) DEFAULT NULL,
  `nama_customer` varchar(30) DEFAULT NULL,
  `tgl_bast` date DEFAULT NULL,
  `nama_pengadaan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `pesanan_id`, `no_spph`, `tgl_spph`, `tgl_sph`, `kepada_vendor`, `kepada_customer`, `no_sph`, `lampiran`, `nomor_spk`, `tgl_negoisasi_spk`, `lokasi_pengadaan`, `jangka_waktu`, `nama_pihak_vendor`, `jabatan_pihak_vendor`, `alamat_pihak_vendor`, `hp_pihak_vendor`, `fax_pihak_vendor`, `nama_rekening_vendor`, `no_rekening_vendor`, `bank_rekening_vendor`, `tgl_spk`, `nama_vendor`, `nama_customer`, `tgl_bast`, `nama_pengadaan`) VALUES
(28, 'PESAN001', '90h/k08/9', '2018-06-30', '2018-06-30', '<p>aa</p>\r\n', '<p>ssss</p>\r\n', 'sss', 3, '123', '2011-01-20', '<p>aaa</p>\r\n', 2, 'sehun', 'pimpinan', '<p>aassa</p>\r\n', '1', '4350943504', 'PT SIGMA INDONESIA', '121323', 'MANDIRI', '2018-06-30', 'sm', 'smaa', '2018-06-30', 'a'),
(29, 'PESAN002', '90h/k08/9', '2018-06-30', '2018-06-30', '<p>a</p>\r\n', '<p>aa</p>\r\n', 'q', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e'),
(30, 'PESAN002', '123', '2018-07-03', NULL, 'ayidhae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' e'),
(31, 'PESAN005', '90h/k08/9', '2018-07-05', NULL, 'nn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' komputer'),
(32, 'PESAN003', 'LOG/but/2018', '2018-07-05', NULL, 'aa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' r');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `tanggal` date NOT NULL,
  `dari_vendor` varchar(20) DEFAULT NULL,
  `id_ulasan` int(11) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `rating` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`tanggal`, `dari_vendor`, `id_ulasan`, `komentar`, `username`, `rating`) VALUES
('2018-06-12', 'as', 24, 'mm', 'mw', 'Biasa saja'),
('2018-06-27', 'as', 25, 'nnjj', 'exo', 'Sangat Tidak Baik'),
('2018-07-01', 'as', 26, 'ss', 'exo', 'Sangat Tidak Baik');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hak_akses` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `hak_akses`) VALUES
('destaya', '12345', 'logistik'),
('sugirto', '12345', 'direktur');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `hak_akses` varchar(6) NOT NULL,
  `akte_pendiri` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(30) NOT NULL,
  `alamat_perusahaan` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`hak_akses`, `akte_pendiri`, `nama_perusahaan`, `alamat_perusahaan`, `contact`, `email`, `username`, `password`, `status`) VALUES
('vendor', 'spph1.jpg', 'alam', 'aqw', '12345', 'exo@aaa.com', 'as', 'b1bd5d407c76e58bb22b340548816c3d', 'aktif'),
('vendor', 'spph2.jpg', 'PT infomedia', 'buah baru', '1', 'info@gmail.com', 'info', 'caf9b6b99962bf5c2264824231d7a40c', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`),
  ADD KEY `nama_customer` (`nama_customer`),
  ADD KEY `nama_vendor` (`nama_vendor`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `progress_pengadaan`
--
ALTER TABLE `progress_pengadaan`
  ADD PRIMARY KEY (`id_progress`),
  ADD KEY `nama_customer` (`nama_customer`),
  ADD KEY `nama_vendor` (`nama_vendor`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `username` (`username`),
  ADD KEY `username_2` (`username`),
  ADD KEY `fk1` (`tujuan_customer`),
  ADD KEY `fk2` (`tujuan_direktur`),
  ADD KEY `fk3` (`tujuan_vendor`),
  ADD KEY `fk4` (`tujuan_logistik`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `username` (`username`),
  ADD KEY `dari_vendor` (`dari_vendor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`username`) REFERENCES `vendor` (`username`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`nama_vendor`) REFERENCES `vendor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`nama_customer`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `progress_pengadaan`
--
ALTER TABLE `progress_pengadaan`
  ADD CONSTRAINT `progress_pengadaan_ibfk_1` FOREIGN KEY (`nama_vendor`) REFERENCES `vendor` (`username`),
  ADD CONSTRAINT `progress_pengadaan_ibfk_2` FOREIGN KEY (`nama_customer`) REFERENCES `customer` (`username`);

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`tujuan_customer`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`tujuan_direktur`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk3` FOREIGN KEY (`tujuan_vendor`) REFERENCES `vendor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk4` FOREIGN KEY (`tujuan_logistik`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `template`
--
ALTER TABLE `template`
  ADD CONSTRAINT `template_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`dari_vendor`) REFERENCES `vendor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
