-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2018 at 10:34 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'hjhhjhk', 'hjhhhkj', '80809890', 'tutirahmawati10@gmail.com', '2018-06-29', 'hjghj', '$2y$10$TPqTDARSQD2nRD.lpz0v1OUG.KfMn3BawWXIeax1WEtlJfERMTtFG', 0),
(2, 'PT.Astra mobile', 'meminta pemasangan kabel', '0896777222222', 'fauzanricky09@gmail.com', '2018-07-01', 'rickyfauzan', '$2y$10$tvdzA7jlyDLokjGBi0udVuhO8zHskiFDO0vM/10EFavf9hC9JgM7y', 0),
(3, 'pln', 'jln buruan ', '0988777666', 'vallenbrz@yahoo.com', '2018-07-02', 'rifaldi', '$2y$10$tB8KlJzAbg1fQp2md7Dvx.9SCXndcy1zpjTkjTvF5jPE9YAHD8SUO', 0),
(4, 'pt asem', 'ggggggg', '1234567890', 'gunk64@gmail.com', '2018-07-10', 'kogure13', '$2y$10$Z/fu8QmvGo8sOPqR2eSGs.eug6KNnnjG18apY67n000xJVWxR9UQW', 0),
(5, 'pt edan wae', 'naon weh kepo', '089442478248', 'rickyfauzan01@gmail.com', '2018-07-14', 'fauzan', '$2y$10$wNIHJP117idM9/w2E/sFx.DLrxU2Y5j6ngB4rcYXishO.6KvCBsO6', 0);

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
(1, 'nip101', 'nama101', 1, 'add255', 'tlp25', 'email'),
(2, 'nip102', 'peg102', 2, '123456', '087678564', 'peg102@softmedia.net'),
(4, 'nip103', 'nip103', 9, 'albirru', '87980999', 'majer@cdp.net'),
(6, 'nip104', 'nip104', 5, 'bbbb', '6765545345', 'sd@cdp.net'),
(8, 'nip105', 'nama105', 7, 'akdakjh', '7776888', 'manu@cdp.net');

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
(1, '01', 4, 1, 2, '2018-07-10', 'keterangan : 1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_reff` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `username`, `password`, `id_reff`) VALUES
(1, 'admin', 'admin1234', 1),
(3, 'nip102', 'nip102', 2),
(4, 'nip103', 'nip103', 4),
(5, 'nip104', 'nip104', 6),
(6, 'nip105', 'nip105', 8);

-- --------------------------------------------------------

--
-- Table structure for table `master_jabatan`
--

CREATE TABLE `master_jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_jabatan`
--

INSERT INTO `master_jabatan` (`id`, `jabatan`) VALUES
(1, 'Administrator'),
(2, 'Admin SDM'),
(3, 'Admin Marketing'),
(4, 'Admin Teknisi'),
(5, 'Direktur Utama'),
(6, 'Direktur Keuangan'),
(7, 'Direktur SDM'),
(8, 'Direktur Marketing'),
(9, 'Staff Marketing'),
(10, 'Sekretaris'),
(11, 'Staff Ahli');

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
(1, 'P002', 'Pancang', ''),
(2, 'P001', 'Generator', ''),
(3, 'P003', 'Genset', ''),
(4, 'P004', 'Pemancar', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `data_promosi`
--
ALTER TABLE `data_promosi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_prospek`
--
ALTER TABLE `data_prospek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `master_kategori_proyek`
--
ALTER TABLE `master_kategori_proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
