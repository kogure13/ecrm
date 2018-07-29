/*
Navicat MySQL Data Transfer

Source Server         : server128
Source Server Version : 50626
Source Host           : 192.168.0.128:3306
Source Database       : db_ecrm

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2018-07-26 16:18:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for data_client
-- ----------------------------
DROP TABLE IF EXISTS `data_client`;
CREATE TABLE `data_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `tlp` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_register` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status_client` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_client
-- ----------------------------
INSERT INTO `data_client` VALUES ('1', 'pt abc', 'Jl. Seram 13', '123456789', 'peg102@net.net', '2018-07-20', 'user12', '$2y$10$lGI9ovJHnvLfS6Mn0UpTmudHSCXYfCygN2FRxx2j5N.otPCcvaCB6', '0');
INSERT INTO `data_client` VALUES ('2', 'pt abc123', 'asfg', '1232456789', 'peg101@net.net', '2018-07-20', 'user101', '$2y$10$BZCoIIOH3NRJ2/Y1q5lFHeTpJEcLZVSE0SPXW2jg8hJHwJcQu8zCi', '0');

-- ----------------------------
-- Table structure for data_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `data_pegawai`;
CREATE TABLE `data_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) DEFAULT NULL,
  `nama_peg` varchar(255) DEFAULT NULL,
  `jabatan_peg` int(11) DEFAULT NULL,
  `alamat_peg` varchar(255) DEFAULT NULL,
  `no_tlp` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_pegawai
-- ----------------------------
INSERT INTO `data_pegawai` VALUES ('1', 'nip101', 'nama101', '2', 'add255', 'tlp25', 'email');
INSERT INTO `data_pegawai` VALUES ('2', 'nip102', 'peg102', '9', '123456', '087678564', 'peg102@softmedia.net');
INSERT INTO `data_pegawai` VALUES ('4', 'nip103', 'nip103', '6', 'albirru', '87980999', 'majer@cdp.net');
INSERT INTO `data_pegawai` VALUES ('6', 'nip104', 'nip104', '5', 'bbbb', '6765545345', 'sd@cdp.net');
INSERT INTO `data_pegawai` VALUES ('8', 'nip105', 'nama105', '7', 'akdakjh', '7776888', 'manu@cdp.net');

-- ----------------------------
-- Table structure for data_penilaian
-- ----------------------------
DROP TABLE IF EXISTS `data_penilaian`;
CREATE TABLE `data_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prospek` int(11) NOT NULL,
  `keluhan` tinyint(1) DEFAULT NULL,
  `kepuasan` tinyint(1) DEFAULT NULL,
  `nilai_kepuasan` int(11) DEFAULT NULL,
  `keterangan` text,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_penilaian
-- ----------------------------
INSERT INTO `data_penilaian` VALUES ('2', '0', '0', '1', null, null, '2018-07-01');
INSERT INTO `data_penilaian` VALUES ('3', '0', '0', '1', null, null, '2018-07-01');
INSERT INTO `data_penilaian` VALUES ('4', '0', '1', '0', null, null, '2018-07-03');
INSERT INTO `data_penilaian` VALUES ('5', '0', '1', '0', null, null, '2018-07-01');
INSERT INTO `data_penilaian` VALUES ('6', '0', '0', '1', null, null, '2018-07-03');
INSERT INTO `data_penilaian` VALUES ('7', '0', '1', '0', null, null, '2018-07-02');
INSERT INTO `data_penilaian` VALUES ('8', '0', '1', '0', null, null, '2018-07-02');
INSERT INTO `data_penilaian` VALUES ('9', '0', '0', '1', null, null, '2018-07-05');
INSERT INTO `data_penilaian` VALUES ('10', '0', '0', '1', null, null, '2018-07-02');
INSERT INTO `data_penilaian` VALUES ('11', '0', '1', '0', null, null, '2018-07-03');
INSERT INTO `data_penilaian` VALUES ('12', '0', '1', '0', null, null, '2018-07-03');
INSERT INTO `data_penilaian` VALUES ('13', '0', '1', '0', null, null, '2018-07-05');
INSERT INTO `data_penilaian` VALUES ('14', '0', '1', '0', null, null, '2018-07-05');

-- ----------------------------
-- Table structure for data_promosi
-- ----------------------------
DROP TABLE IF EXISTS `data_promosi`;
CREATE TABLE `data_promosi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_promosi` varchar(255) DEFAULT NULL,
  `judul_promosi` varchar(255) DEFAULT NULL,
  `promosi` text,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_promosi
-- ----------------------------

-- ----------------------------
-- Table structure for data_prospek
-- ----------------------------
DROP TABLE IF EXISTS `data_prospek`;
CREATE TABLE `data_prospek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(20) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `tgl_request` date NOT NULL,
  `keterangan` text,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_prospek
-- ----------------------------
INSERT INTO `data_prospek` VALUES ('1', 'PJO-01/2018-07', '1', '1', '2', '2018-07-01', 'Keterangan: 1', '1');
INSERT INTO `data_prospek` VALUES ('2', 'PJO-02/2018-07', '2', '2', '2', '2018-07-10', 'Keterangan: Client', '4');
INSERT INTO `data_prospek` VALUES ('3', 'PJO-03/2018-07', '2', '3', '4', '2018-07-20', '', '1');

-- ----------------------------
-- Table structure for data_user
-- ----------------------------
DROP TABLE IF EXISTS `data_user`;
CREATE TABLE `data_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_reff` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_user
-- ----------------------------
INSERT INTO `data_user` VALUES ('1', 'admin', 'admin12345', '0');
INSERT INTO `data_user` VALUES ('2', 'nip101', '124578', '1');
INSERT INTO `data_user` VALUES ('3', 'nip102', 'nip102', '2');
INSERT INTO `data_user` VALUES ('4', 'nip103', 'nip103', '4');
INSERT INTO `data_user` VALUES ('5', 'nip104', 'nip104', '6');
INSERT INTO `data_user` VALUES ('6', 'nip105', 'nip105', '8');

-- ----------------------------
-- Table structure for master_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `master_jabatan`;
CREATE TABLE `master_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jabatan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_jabatan
-- ----------------------------
INSERT INTO `master_jabatan` VALUES ('1', '001', 'Administrator');
INSERT INTO `master_jabatan` VALUES ('2', '010', 'Direktur');
INSERT INTO `master_jabatan` VALUES ('5', '002', 'Admin SDM, Umum, & Logistik');
INSERT INTO `master_jabatan` VALUES ('7', '011', 'Wakil Direktur');
INSERT INTO `master_jabatan` VALUES ('8', '012', 'Sekretaris');
INSERT INTO `master_jabatan` VALUES ('9', '013', 'Staff Marketing');
INSERT INTO `master_jabatan` VALUES ('10', '999', 'IT Support');

-- ----------------------------
-- Table structure for master_kategori_proyek
-- ----------------------------
DROP TABLE IF EXISTS `master_kategori_proyek`;
CREATE TABLE `master_kategori_proyek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_proyek` varchar(255) DEFAULT NULL,
  `nama_proyek` varchar(255) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_kategori_proyek
-- ----------------------------
INSERT INTO `master_kategori_proyek` VALUES ('1', 'P002', 'Pancang', '');
INSERT INTO `master_kategori_proyek` VALUES ('2', 'P001', 'Generator', '');
INSERT INTO `master_kategori_proyek` VALUES ('3', 'P003', 'Genset', '');
INSERT INTO `master_kategori_proyek` VALUES ('4', 'P004', 'Pemancar', '');
