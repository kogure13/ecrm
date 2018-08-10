-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2018 at 03:35 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_client`
--

CREATE TABLE `data_client` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `tlp` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_register` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_client`
--

INSERT INTO `data_client` (`id`, `company_name`, `company_address`, `tlp`, `email`, `date_register`, `username`, `password`, `status_client`) VALUES
(1, 'npm01', 'jl. kemana mana 12', '1234567890', 'npm@client.net', '2018-07-29', 'npm01', '$2y$10$gymxA3VIv.x9pyNlLul9..M3zoYy.K4kVeiiQUVfTw0GQawxAci4.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_keluhan`
--

CREATE TABLE `data_keluhan` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_kepuasan`
--

CREATE TABLE `data_kepuasan` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `nama_peg` varchar(255) DEFAULT NULL,
  `jabatan_peg` int(11) DEFAULT NULL,
  `alamat_peg` varchar(255) DEFAULT NULL,
  `no_tlp` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id`, `nip`, `nama_peg`, `jabatan_peg`, `alamat_peg`, `no_tlp`, `email`) VALUES
(1, 'nip101', 'pegawai101', 8, 'jl. jalan jalan', '0987654321', 'peg101@crm.net'),
(2, 'nip001', 'direktur001', 1, 'hhhh', '9987654', 'dirut@crm.net'),
(3, 'nip102', 'hasan', 8, 'kadkahdkja', '98978787', 'test@crm.net'),
(4, 'nip103', 'Aida', 8, 'adfasfa', '12314124', 'dasd');

-- --------------------------------------------------------

--
-- Table structure for table `data_penilaian`
--

CREATE TABLE `data_penilaian` (
  `id` int(11) NOT NULL,
  `id_prospek` int(11) NOT NULL,
  `keluhan` tinyint(1) DEFAULT '0',
  `kepuasan` tinyint(1) DEFAULT '0',
  `nilai_kepuasan` int(11) DEFAULT '0',
  `keterangan` text,
  `tanggal` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_penilaian`
--

INSERT INTO `data_penilaian` (`id`, `id_prospek`, `keluhan`, `kepuasan`, `nilai_kepuasan`, `keterangan`, `tanggal`) VALUES
(1, 1, 1, 0, 0, 'dnasdnajkdna  nsdkandkanda dakndkandak ksandkas\r\n\r\nKeterangan marketing : sudah ditangani per tanggal ???', '2018-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `data_produk`
--

CREATE TABLE `data_produk` (
  `id` int(11) NOT NULL,
  `id_kategori_produk` int(11) DEFAULT NULL,
  `produk` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_produk`
--

INSERT INTO `data_produk` (`id`, `id_kategori_produk`, `produk`, `keterangan`, `gambar`) VALUES
(1, 1, 'panasonic', '11', NULL),
(2, 2, 'Trafo AC 240 Va', '12 Unit', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_promosi`
--

CREATE TABLE `data_promosi` (
  `id` int(11) NOT NULL,
  `kode_promosi` varchar(255) DEFAULT NULL,
  `judul_promosi` varchar(255) DEFAULT NULL,
  `promosi` text,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_prospek`
--

CREATE TABLE `data_prospek` (
  `id` int(11) NOT NULL,
  `no_reg` varchar(20) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `tgl_request` date NOT NULL,
  `keterangan` text,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_prospek`
--

INSERT INTO `data_prospek` (`id`, `no_reg`, `id_client`, `id_proyek`, `id_pegawai`, `tgl_request`, `keterangan`, `status`) VALUES
(1, 'PJO-01/2018-07', 1, 1, 1, '2018-08-01', 'Keterangan: 1', 5),
(2, 'PJO-02/2018-07', 1, 2, 1, '2018-08-06', 'Generator dan Pancang baru', 1),
(3, 'PJO-03/2018-07', 1, 2, 1, '2018-08-30', 'Tambahan Generator Baru\r\n\r\n', 2),
(4, 'PJO-04/2018-07', 1, 1, 3, '2018-07-19', 'fasfasf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_reff` int(11) DEFAULT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `username`, `password`, `id_reff`, `role`) VALUES
(1, 'admin', 'admin', NULL, 'admin'),
(2, 'sdm', 'sdm', NULL, 'sdm'),
(5, 'direktur', 'direktur', 2, 'direktur'),
(6, 'nip102', 'nip102', 3, 'marketing'),
(7, 'nip103', 'nip103', 4, 'marketing');

-- --------------------------------------------------------

--
-- Table structure for table `master_jabatan`
--

CREATE TABLE `master_jabatan` (
  `id` int(11) NOT NULL,
  `kode_jabatan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_jabatan`
--

INSERT INTO `master_jabatan` (`id`, `kode_jabatan`, `jabatan`) VALUES
(1, '001', 'Direktur Utama'),
(2, '002', 'Direktur Teknik'),
(3, '003', 'Direktur SDM, Umum & Logistik'),
(4, '004', 'Direktur Marketing'),
(5, '005', 'Direktur Keuangan'),
(6, '006', 'Wakil Manajemen Mutu'),
(7, '007', 'Sekretaris'),
(8, '008', 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `master_kategori_produk`
--

CREATE TABLE `master_kategori_produk` (
  `id` int(11) NOT NULL,
  `kategori_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_kategori_produk`
--

INSERT INTO `master_kategori_produk` (`id`, `kategori_produk`) VALUES
(1, 'baterai'),
(2, 'rectifire');

-- --------------------------------------------------------

--
-- Table structure for table `master_kategori_proyek`
--

CREATE TABLE `master_kategori_proyek` (
  `id` int(11) NOT NULL,
  `kode_proyek` varchar(255) DEFAULT NULL,
  `nama_proyek` varchar(255) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_kategori_proyek`
--

INSERT INTO `master_kategori_proyek` (`id`, `kode_proyek`, `nama_proyek`, `keterangan`) VALUES
(1, '001', 'Pancang', 'Pancang'),
(2, '002', 'Generator', 'Generator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_client`
--
ALTER TABLE `data_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_keluhan`
--
ALTER TABLE `data_keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kepuasan`
--
ALTER TABLE `data_kepuasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_penilaian`
--
ALTER TABLE `data_penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_promosi`
--
ALTER TABLE `data_promosi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_prospek`
--
ALTER TABLE `data_prospek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_kategori_produk`
--
ALTER TABLE `master_kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_kategori_proyek`
--
ALTER TABLE `master_kategori_proyek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_client`
--
ALTER TABLE `data_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_keluhan`
--
ALTER TABLE `data_keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_kepuasan`
--
ALTER TABLE `data_kepuasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_penilaian`
--
ALTER TABLE `data_penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_promosi`
--
ALTER TABLE `data_promosi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_prospek`
--
ALTER TABLE `data_prospek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master_kategori_produk`
--
ALTER TABLE `master_kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_kategori_proyek`
--
ALTER TABLE `master_kategori_proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
