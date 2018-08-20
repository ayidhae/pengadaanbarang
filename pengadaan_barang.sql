-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2018 pada 05.04
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

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
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idbarang` varchar(20) NOT NULL,
  `namabarang` varchar(20) NOT NULL,
  `spesifikasi_barang` varchar(150) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_but` int(11) DEFAULT NULL,
  `gambar` varchar(20) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `status` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `spesifikasi_barang`, `harga`, `harga_but`, `gambar`, `jenis`, `username`, `status`) VALUES
('BARANG-0001', 'kursi baru', 'Asus', 5000, 5500, 'Untitled161.jpg', 'peralatan kantor', 'info', 'Tidak'),
('BARANG-0002', 'Server', '', 0, NULL, 'server.jpg', 'Jaringan IT dan Telekomunikasi', 'mwd', 'Ya'),
('BARANG-0003', 'Komputer', '', 0, NULL, 'kmptr.jpg', 'Jaringan IT dan Telekomunikasi', 'mwd', NULL),
('BARANG-0004', 'komputer ASUS', '', 0, NULL, 'kmptr3.jpg', 'Jaringan IT dan Telekomunikasi', 'gas', NULL),
('BARANG-0005', 'warna', 'asus', 5000, 500, 'warna1.jpg', 'peralatan kantor', 'mwd', 'tidak'),
('BARANG-0006', 'kursi baru', 'asus', 5000, 5500, 'warna2.jpg', 'peralatan kantor', 'mwd', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
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
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`hak_akses`, `npwp`, `nama_perusahaan`, `alamat_perusahaan`, `contact`, `email`, `username`, `password`, `status`) VALUES
('customer', 'warna13.jpg', 'paytren', 'medan', '0808', 'info@gmail.com', 'paytren', '827ccb0eea8a706c4c34a16891f84e7b', 'aktif'),
('customer', 'tipe_tpa2.PNG', 'PT pertamina indonesia', 'jln soekarno hatta', '12345', 'elvirabelieber@gmail.com', 'pertamina', '202cb962ac59075b964b07152d234b70', 'aktif'),
('customer', 'warna10.jpg', 'pocaro', 'sm', '12345', 'ayidhae@yahoo.com', 'poca', 'c36e954f5bbe5fd85d355398febe28eb', 'aktif'),
('customer', 'DA082DOUAAAfKMo.jpg', 'vira', 'buah batu', '12345', 'ayidhae@yahoo.com', 'virr', '590f35821fbed7b2ab58a9dbaf36c42d', 'aktif'),
('customer', 'Capture.PNG', 'sm', 'sm', '12345', 'ayidhae@yahoo.com', 'wer', '22c276a05aa7c90566ae2175bcc2a9b0', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
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
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `nama_pengadaan`, `nama_customer`, `nama_vendor`, `tgl_input`, `tgl_selesai`, `status`, `catatan`, `id_surat`) VALUES
('PESAN001', 'laboratorium komputer', 'paytren', 'mwd', '2018-08-11 03:22:14', NULL, 'progress', NULL, 85),
('PESAN002', 'komputer baru', 'paytren', 'info', '2018-08-16 11:29:18', NULL, 'progress', NULL, 92),
('PESAN003', 'komputer baru', 'paytren', 'info', '2018-08-16 03:25:02', NULL, 'progress', NULL, 91);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `detail_id` int(11) NOT NULL,
  `pesanan_id` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi_barang` varchar(150) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `vol` int(11) NOT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`detail_id`, `pesanan_id`, `nama_barang`, `spesifikasi_barang`, `satuan`, `harga`, `vol`, `subtotal`) VALUES
(20, 'PESAN001', 'laptop / core i3, brand ASUS', '', 'unit', 5000, 4, 20000),
(21, 'PESAN003', 'server', 'brand INT', 'unit', NULL, 5, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress_pengadaan`
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
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `no_surat` varchar(25) NOT NULL,
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
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat`, `username`, `jenis_surat`, `no_surat`, `tgl_surat`, `pesan`, `tujuan_customer`, `tujuan_direktur`, `tujuan_vendor`, `tujuan_logistik`, `file`, `status_approve`, `penanggung_jawab`, `no_hp`, `status_dipesanlogistik`) VALUES
(85, 'paytren', 'SPPH', 'EXO/1/SPPH', '2018-08-11 03:20:24', '', NULL, 'direktur', NULL, NULL, 'warna7.jpg', 'YA', 'destaya', '082364514196', '1'),
(86, 'paytren', 'SPPH', 'EXO/3/SPPH', '2018-08-11 03:20:43', '', NULL, 'direktur', NULL, NULL, 'UAT KARYAWAN.docx', 'YA', 'nurdin', '082364514196', NULL),
(87, 'logistik', 'spk', 'BUT/LOG/SPK/2018/08/013', '2018-08-11 03:30:53', 'cepetan', NULL, NULL, 'mwd', NULL, 'warna8.jpg', NULL, 'destayana', '081112230091', NULL),
(88, 'logistik', 'spph', 'BUT/LOG/SPPH/2018/08/001', '2018-08-11 03:53:07', 'new', NULL, NULL, 'mwd', NULL, 'warna9.jpg', NULL, 'destayana', '081112230091', NULL),
(89, 'mwd', 'SPH', 'EXO/2/SPPH', '2018-08-11 03:53:54', 'SPH', NULL, NULL, NULL, 'logistik', 'warna10.jpg', NULL, 'nurdin', '082364514196', NULL),
(90, 'logistik', 'spk', 'BUT/LOG/SPK/2018/08/013', '2018-08-12 06:47:17', '', NULL, NULL, 'mwd', NULL, 'warna13.jpg', NULL, 'destayana', '081112230091', NULL),
(91, 'paytren', 'SPPH', 'EXO/1/SPPH', '2018-08-12 06:56:50', '', NULL, 'direktur', NULL, NULL, 'warna14.jpg', 'YA', 'nana', '082364514196', '1'),
(92, 'paytren', 'SPPH', 'EXO/1/SPPH', '2018-08-14 09:32:26', '', NULL, 'direktur', NULL, NULL, 'bast_vendor (1).pdf', 'YA', 'nurdin', '082364514196', '1'),
(93, 'mwd', 'SPH', 'EXO/1/SPPH', '2018-08-14 09:43:15', 'terbaru\r\n', NULL, NULL, NULL, 'logistik', 'warna15.jpg', NULL, 'destaya', '082364514196', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `template`
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
  `nama_pengadaan` varchar(30) DEFAULT NULL,
  `status1` varchar(10) DEFAULT NULL,
  `status2` varchar(10) DEFAULT NULL,
  `status3` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `template`
--

INSERT INTO `template` (`id`, `pesanan_id`, `no_spph`, `tgl_spph`, `tgl_sph`, `kepada_vendor`, `kepada_customer`, `no_sph`, `lampiran`, `nomor_spk`, `tgl_negoisasi_spk`, `lokasi_pengadaan`, `jangka_waktu`, `nama_pihak_vendor`, `jabatan_pihak_vendor`, `alamat_pihak_vendor`, `hp_pihak_vendor`, `fax_pihak_vendor`, `nama_rekening_vendor`, `no_rekening_vendor`, `bank_rekening_vendor`, `tgl_spk`, `nama_vendor`, `nama_pengadaan`, `status1`, `status2`, `status3`) VALUES
(13, 'PESAN001', 'BUT/LOG/SPPH/2018/08/001', '2018-08-11', NULL, 'Kepada Mediawave', NULL, NULL, NULL, 'BUT/LOG/SPK/2018/08/013', '2018-08-13', '<p>Bandung</p>\r\n', 14, 'nurdin', 'logistik', '<p>Bandung</p>\r\n', '082364514196', '9898', 'nurdin', '09090090', 'mandiri', '2018-08-11', 'mediawave', 'laboratorium komputer', 'PRINT', NULL, 'PRINT'),
(14, 'PESAN003', 'BUT/LOG/SPPH/2018/08/014', '2018-08-16', NULL, 'Kepada YTH\r\nInfomedia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' komputer baru', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `tanggal` date NOT NULL,
  `id_ulasan` int(11) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `pesanan_id` varchar(20) DEFAULT NULL,
  `nama_vendor` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`tanggal`, `id_ulasan`, `komentar`, `username`, `rating`, `pesanan_id`, `nama_vendor`) VALUES
('2018-08-01', 1, 'sangat Baik', 'paytren', 4, 'PESAN002| info', 'info');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hak_akses` varchar(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `hak_akses`, `nama`, `no_hp`) VALUES
('direktur', '12345', 'direktur', 'sugiarti', '022645654'),
('logistik', '12345', 'logistik', 'destayana', '081112230091'),
('totok', '123', 'logistik', 'muhammad totok\r\n', '081112230090');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
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
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`hak_akses`, `akte_pendiri`, `nama_perusahaan`, `alamat_perusahaan`, `contact`, `email`, `username`, `password`, `status`) VALUES
('vendor', 'warna18.jpg', 'PT Alam ', 'bandung no 17', '12345', 'info@gmail.com', 'gas', 'fee74eac0728a1bb5ff7d4666f8c4a88', 'tidak aktif'),
('vendor', 'spph2.jpg', 'PT Infomedia', 'buah baru', '0808', 'info@gmail.com', 'info', 'caf9b6b99962bf5c2264824231d7a40c', 'aktif'),
('vendor', 'Untitled16.jpg', 'mediawave', 'bandung', '0909', 'info@gmail.com', 'mwd', 'f196b9fbda9609f04af04810d67c763d', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`),
  ADD KEY `nama_customer` (`nama_customer`),
  ADD KEY `nama_vendor` (`nama_vendor`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indeks untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indeks untuk tabel `progress_pengadaan`
--
ALTER TABLE `progress_pengadaan`
  ADD PRIMARY KEY (`id_progress`),
  ADD KEY `nama_customer` (`nama_customer`),
  ADD KEY `nama_vendor` (`nama_vendor`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indeks untuk tabel `surat_keluar`
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
-- Indeks untuk tabel `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `username` (`username`),
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `nama_vendor` (`nama_vendor`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`username`) REFERENCES `vendor` (`username`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`nama_vendor`) REFERENCES `vendor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`nama_customer`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`id_surat`) REFERENCES `surat_keluar` (`id_surat`);

--
-- Ketidakleluasaan untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `progress_pengadaan`
--
ALTER TABLE `progress_pengadaan`
  ADD CONSTRAINT `progress_pengadaan_ibfk_1` FOREIGN KEY (`nama_vendor`) REFERENCES `vendor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_pengadaan_ibfk_2` FOREIGN KEY (`nama_customer`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_pengadaan_ibfk_3` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`tujuan_customer`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`tujuan_direktur`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk3` FOREIGN KEY (`tujuan_vendor`) REFERENCES `vendor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk4` FOREIGN KEY (`tujuan_logistik`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `template`
--
ALTER TABLE `template`
  ADD CONSTRAINT `template_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasan_ibfk_3` FOREIGN KEY (`nama_vendor`) REFERENCES `vendor` (`username`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
