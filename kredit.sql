-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 12:47 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kredit`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `username_anggota` varchar(50) NOT NULL,
  `password_anggota` varchar(20) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `jml_gaji` decimal(10,0) NOT NULL,
  `jml_modal` decimal(10,0) NOT NULL,
  `sisa_utang_di_koperasi` int(11) NOT NULL,
  `total_lama_angsuran` int(5) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `username_anggota`, `password_anggota`, `nama_anggota`, `jml_gaji`, `jml_modal`, `sisa_utang_di_koperasi`, `total_lama_angsuran`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
(1, 'putsaras', '12345', 'Ayu Putri Saraswati Mandala', '4800000', '1329753', 4700000, 2, 'Perempuan', 'Tejakula', '0898765333'),
(2, 'wahagung', '12345', 'Ngurah Agung Diva Aryanta', '5000000', '1164310', 41000000, 8, 'Laki-laki', 'Desa bondalem', '0898978788'),
(3, 'alit', '12345', 'Ngurah alitt', '4600000', '1551104', 100000000, 5, 'Laki-laki', 'gang leci', '08964737282'),
(4, 'test', '123', 'Kertiasih', '4600000', '810180', 2750000, 50, 'Perempuan', 'bondalem', '0896572772'),
(5, 'artha', '12345', 'Made artha', '3000000', '550000', 20550000, 15, 'Laki-laki', 'kelodan', '123456'),
(6, 'wid1234', '123456', 'Md Widyasari', '5500000', '150000', 3500000, 7, 'Perempuan', 'Tabanan', '0896473744'),
(9, 'test', '12345678', 'Test', '4000000', '150000', 0, 0, 'Perempuan', 'test', '081765444456');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_kredit`
--

CREATE TABLE `pengajuan_kredit` (
  `id_pengajuan` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `jml_kredit` decimal(10,0) NOT NULL,
  `lama_angsuran` int(5) NOT NULL,
  `sisa_utang_di_tempat_lain` decimal(10,0) NOT NULL,
  `n_modal` double NOT NULL,
  `n_gaji` double NOT NULL,
  `n_kredit` double NOT NULL,
  `n_lama_angsuran` double NOT NULL,
  `n_utang_koperasi` double NOT NULL,
  `n_utang_lain` double NOT NULL,
  `nilai_preferensi` double NOT NULL,
  `ranking` int(4) NOT NULL,
  `id_kelayakan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_pengurus` int(11) NOT NULL,
  `id_spk` varchar(50) NOT NULL,
  `id_rekomendasi` varchar(50) NOT NULL,
  `id_persetujuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_kredit`
--

INSERT INTO `pengajuan_kredit` (`id_pengajuan`, `tgl_pengajuan`, `jml_kredit`, `lama_angsuran`, `sisa_utang_di_tempat_lain`, `n_modal`, `n_gaji`, `n_kredit`, `n_lama_angsuran`, `n_utang_koperasi`, `n_utang_lain`, `nilai_preferensi`, `ranking`, `id_kelayakan`, `id_anggota`, `id_pengurus`, `id_spk`, `id_rekomendasi`, `id_persetujuan`) VALUES
(127, '2019-07-20', '12000000', 11, '300000', 1, 0.96, 0.83, 1, 0.05, 1, 0.82, 0, 3, 3, 2, '20190720120723', '', 0),
(128, '2019-07-20', '10000000', 11, '50000000', 0.86, 1, 1, 1, 1, 0.01, 0.82, 0, 3, 1, 2, '20190720120723', '', 0),
(129, '2019-07-20', '12000000', 3, '300000', 0.86, 1, 0.25, 1, 0.59, 1, 0.75, 0, 2, 1, 2, '20190720122651', '', 0),
(130, '2019-07-20', '3000000', 12, '50000000', 0.52, 0.96, 1, 0.25, 1, 0.01, 0.65, 0, 2, 4, 2, '20190720122651', '', 0),
(131, '2019-07-20', '90000000', 11, '300000', 0.86, 1, 0.03, 0.27, 0.59, 1, 0.64, 0, 2, 1, 2, '20190720123405', '', 0),
(132, '2019-07-20', '3000000', 8, '50000000', 1, 0.96, 1, 0.38, 0.03, 0.01, 0.64, 0, 2, 3, 2, '20190720123405', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengurus_koperasi`
--

CREATE TABLE `pengurus_koperasi` (
  `id_pengurus` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nama_pengurus` varchar(100) NOT NULL,
  `username_pengurus` varchar(50) NOT NULL,
  `password_pengurus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus_koperasi`
--

INSERT INTO `pengurus_koperasi` (`id_pengurus`, `jabatan`, `nama_pengurus`, `username_pengurus`, `password_pengurus`) VALUES
(1, 'Ketua', 'Pak A', 'ketua12345', '12345'),
(2, 'Bendahara', 'Pak Md', 'bendahara12345', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi_pengaju_kredit`
--

CREATE TABLE `rekomendasi_pengaju_kredit` (
  `id_rekomendasi` varchar(50) NOT NULL,
  `keterangan_rekomen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE `spk` (
  `id_spk` varchar(50) NOT NULL,
  `keterangan_spk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk`
--

INSERT INTO `spk` (`id_spk`, `keterangan_spk`) VALUES
('20190720120723', '2019-07-20'),
('20190720122651', '2019-07-20'),
('20190720123405', '2019-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `status_kelayakan`
--

CREATE TABLE `status_kelayakan` (
  `id_kelayakan` int(11) NOT NULL,
  `batas_atas` double NOT NULL,
  `batas_bawah` double NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_kelayakan`
--

INSERT INTO `status_kelayakan` (`id_kelayakan`, `batas_atas`, `batas_bawah`, `keterangan`) VALUES
(1, 0, 0.49, 'Tidak Layak'),
(2, 0.5, 0.79, 'Layak'),
(3, 0.8, 1, 'Sangat Layak');

-- --------------------------------------------------------

--
-- Table structure for table `status_persetujuan`
--

CREATE TABLE `status_persetujuan` (
  `id_persetujuan` int(11) NOT NULL,
  `keterangan_persetujuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_persetujuan`
--

INSERT INTO `status_persetujuan` (`id_persetujuan`, `keterangan_persetujuan`) VALUES
(1, 'Direkomendasikan'),
(2, 'Disetujui'),
(3, 'Ditolak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `pengajuan_kredit`
--
ALTER TABLE `pengajuan_kredit`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_kelayakan` (`id_kelayakan`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_pengurus` (`id_pengurus`);

--
-- Indexes for table `pengurus_koperasi`
--
ALTER TABLE `pengurus_koperasi`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `rekomendasi_pengaju_kredit`
--
ALTER TABLE `rekomendasi_pengaju_kredit`
  ADD PRIMARY KEY (`id_rekomendasi`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
  ADD PRIMARY KEY (`id_spk`);

--
-- Indexes for table `status_kelayakan`
--
ALTER TABLE `status_kelayakan`
  ADD PRIMARY KEY (`id_kelayakan`);

--
-- Indexes for table `status_persetujuan`
--
ALTER TABLE `status_persetujuan`
  ADD PRIMARY KEY (`id_persetujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pengajuan_kredit`
--
ALTER TABLE `pengajuan_kredit`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `pengurus_koperasi`
--
ALTER TABLE `pengurus_koperasi`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_kelayakan`
--
ALTER TABLE `status_kelayakan`
  MODIFY `id_kelayakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status_persetujuan`
--
ALTER TABLE `status_persetujuan`
  MODIFY `id_persetujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan_kredit`
--
ALTER TABLE `pengajuan_kredit`
  ADD CONSTRAINT `pengajuan_kredit_ibfk_2` FOREIGN KEY (`id_kelayakan`) REFERENCES `status_kelayakan` (`id_kelayakan`),
  ADD CONSTRAINT `pengajuan_kredit_ibfk_3` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus_koperasi` (`id_pengurus`),
  ADD CONSTRAINT `pengajuan_kredit_ibfk_4` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
