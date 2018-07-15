-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2018 at 10:28 AM
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
('BARANG-0003', 'jjz', 'warna1.jpg', 'Meubelair / furniture', 'as'),
('BARANG-0004', 'jjq', 'warna5.jpg', 'peralatan kantor', 'aq'),
('BARANG-0005', 'server', 'warna6.jpg', 'peralatan kantor', 'as');

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
('customer', 'warna9.jpg', 'jyp', 'bu', '12345', 'ayidhae@yahoo.com', 'jy', '4e7268e57a109668e83f60927154d812', 'aktif'),
('customer', 'warna4.jpg', 'luna', 'sm', '12345', 'ayidhae@yahoo.com', 'luna', 'ba8a48b0e34226a2992d871c65600a7c', 'aktif'),
('customer', 'tipe_tpa1.PNG', 'jyp ent', 'soekarno hattaA', '1234551', 'mediawave@gamil.com', 'mw', '38fed7107cee058098ca06304c1beb90', 'aktif'),
('customer', 'tipe_tpa2.PNG', 'PT pertamina indonesia', 'jln soekarno hatta', '12345', 'elvirabelieber@gmail.com', 'pertamina', '202cb962ac59075b964b07152d234b70', 'aktif'),
('customer', 'warna10.jpg', 'pocaro', 'sm', '12345', 'ayidhae@yahoo.com', 'poca', 'c36e954f5bbe5fd85d355398febe28eb', 'aktif'),
('customer', 'DA082DOUAAAfKMo.jpg', 'vira', 'buah batu', '12345', 'ayidhae@yahoo.com', 'virr', '590f35821fbed7b2ab58a9dbaf36c42d', 'aktif'),
('customer', 'warna8.jpg', 'sm', 'sm', '12345', 'ayidhae@yahoo.com', 'we', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'aktif'),
('customer', 'Capture.PNG', 'sm', 'sm', '12345', 'ayidhae@yahoo.com', 'wer', '22c276a05aa7c90566ae2175bcc2a9b0', 'aktif');

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
  `status` varchar(100) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `id_surat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `nama_pengadaan`, `nama_customer`, `nama_vendor`, `tgl_input`, `tgl_selesai`, `status`, `catatan`, `id_surat`) VALUES
('PESAN001', 'lab', 'exo', 'aq', '2018-07-15 09:33:17', NULL, 'progress', NULL, 14),
('PESAN002', ' a', 'mw', 'as', '2018-07-15 09:46:59', NULL, 'progress', NULL, 15);

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
  `subtotal` int(11) DEFAULT NULL,
  `status2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`detail_id`, `pesanan_id`, `nama_barang`, `satuan`, `harga`, `vol`, `subtotal`, `status2`) VALUES
(8, 'PESAN001', 'mouse', 'unit', 1000, 3, 3000, ''),
(9, 'PESAN002', 'exodus', 'unit', NULL, 2, NULL, '');

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
  `id_progress` varchar(30) NOT NULL,
  `pesanan_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `no_hp` varchar(20) NOT NULL,
  `status_dipesanlogistik` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat`, `username`, `jenis_surat`, `no_surat`, `tgl_surat`, `pesan`, `tujuan_customer`, `tujuan_direktur`, `tujuan_vendor`, `tujuan_logistik`, `file`, `status_approve`, `penanggung_jawab`, `no_hp`, `status_dipesanlogistik`) VALUES
(14, 'exo', 'SPPH', '1234', '2018-07-15 09:30:53', '', NULL, 'sugirto', NULL, NULL, 'warna15.jpg', 'YA', 'minho', '123', '1'),
(15, 'mw', 'SPPH', '01/20/2011', '2018-07-15 09:45:52', '', NULL, 'sugirto', NULL, NULL, 'warna16.jpg', 'YA', 'minho', '09121312', '1');

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
  `no_sph` varchar(50) DEFAULT NULL,
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
  `nama_pengadaan` varchar(30) DEFAULT NULL,
  `status1` varchar(10) DEFAULT NULL,
  `status2` varchar(10) DEFAULT NULL,
  `status3` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `pesanan_id`, `no_spph`, `tgl_spph`, `tgl_sph`, `kepada_vendor`, `kepada_customer`, `no_sph`, `lampiran`, `nomor_spk`, `tgl_negoisasi_spk`, `lokasi_pengadaan`, `jangka_waktu`, `nama_pihak_vendor`, `jabatan_pihak_vendor`, `alamat_pihak_vendor`, `hp_pihak_vendor`, `fax_pihak_vendor`, `nama_rekening_vendor`, `no_rekening_vendor`, `bank_rekening_vendor`, `tgl_spk`, `nama_vendor`, `nama_customer`, `tgl_bast`, `nama_pengadaan`, `status1`, `status2`, `status3`) VALUES
(19, 'PESAN001', 'BUT/LOG/SPPH/2018/07/001', '2018-07-15', '2018-07-15', 'q', '<p>dd</p>\r\n', 'BUT/LOG/SPH/2018/07/019', 2, 'BUT/LOG/SPK/2018/07/019', '2018-07-26', '<p>a</p>\r\n', 2, 'sehun', 'pimpinan', '<p>s</p>\r\n', '2', '4350943504', 'PT SIGMA INDONESIA', '121323', 'MANDIRI', '2018-07-15', '1', 'sm', '2018-07-15', 'lab', NULL, NULL, NULL),
(20, 'PESAN002', 'BUT/LOG/SPPH/2018/07/020', '2018-07-15', '2018-07-15', 'w', '<p>2</p>\r\n', 'BUT/LOG/SPH/2018/07/020', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' a', NULL, NULL, NULL),
(21, 'PESAN001', 'BUT/LOG/SPPH/2018/07/021', '2018-07-15', '2018-07-15', 'a', '<p>dd</p>\r\n', 'BUT/LOG/SPH/2018/07/021', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' a', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `tanggal` date NOT NULL,
  `id_ulasan` int(11) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `rating` int(20) NOT NULL,
  `pesanan_id` varchar(20) DEFAULT NULL,
  `nama_vendor` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`tanggal`, `id_ulasan`, `komentar`, `username`, `rating`, `pesanan_id`, `nama_vendor`) VALUES
('2018-07-15', 47, 'm', 'exo', 5, 'PESAN001| aq', 'aq'),
('2018-07-15', 48, 'kk', 'exo', 5, 'PESAN001| aq', 'aq'),
('2018-07-15', 49, 'ww', 'mw', 2, 'PESAN002| as', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hak_akses` varchar(8) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `hak_akses`, `nama`) VALUES
('destaya', '12345', 'logistik', 'destayana'),
('sugirto', '12345', 'direktur', '');

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
('vendor', 'warna3.jpg', 'alam', 'aqw', '111', 'ayidhae@yahoo.com', 'aq', 'b2b04af9f8f3ab06229e03ac8d3c24ca', 'aktif'),
('vendor', 'spph1.jpg', 'alam', 'aqw', '12345', 'exo@aaa.com', 'as', 'b1bd5d407c76e58bb22b340548816c3d', 'aktif'),
('vendor', 'DA082DOUAAAfKMo.jpg', 'alam', 'aqw', '12345', 'ayidhae@yahoo.com', 'au', '8bcc25c96aa5a71f7a76309077753e67', 'aktif'),
('vendor', 'spph2.jpg', 'PT infomedia', 'buah baru', '1', 'info@gmail.com', 'info', 'caf9b6b99962bf5c2264824231d7a40c', 'aktif'),
('vendor', 'Capture1.PNG', 'A', 'aqw', '12345', 'ayidhae@yahoo.com', 'w', 'e1671797c52e15f763380b45e841ec32', 'aktif');

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
  ADD KEY `nama_vendor` (`nama_vendor`),
  ADD KEY `id_surat` (`id_surat`);

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
  ADD KEY `nama_vendor` (`nama_vendor`),
  ADD KEY `pesanan_id` (`pesanan_id`);

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
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `nama_vendor` (`nama_vendor`);

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
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`nama_customer`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`id_surat`) REFERENCES `surat_keluar` (`id_surat`);

--
-- Constraints for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `progress_pengadaan`
--
ALTER TABLE `progress_pengadaan`
  ADD CONSTRAINT `progress_pengadaan_ibfk_1` FOREIGN KEY (`nama_vendor`) REFERENCES `vendor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_pengadaan_ibfk_2` FOREIGN KEY (`nama_customer`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_pengadaan_ibfk_3` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `ulasan_ibfk_3` FOREIGN KEY (`nama_vendor`) REFERENCES `vendor` (`username`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
