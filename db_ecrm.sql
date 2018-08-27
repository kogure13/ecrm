/*
Navicat MySQL Data Transfer

Source Server         : server128
Source Server Version : 100130
Source Host           : 192.168.0.128:3306
Source Database       : db_ecrm

Target Server Type    : MYSQL
Target Server Version : 100130
File Encoding         : 65001

Date: 2018-08-27 09:11:11
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_client
-- ----------------------------
INSERT INTO `data_client` VALUES ('1', 'npm01', 'jl. kemana mana 12', '1234567890', 'npm@client.net', '2018-07-29', 'npm01', '$2y$10$gymxA3VIv.x9pyNlLul9..M3zoYy.K4kVeiiQUVfTw0GQawxAci4.', '0');

-- ----------------------------
-- Table structure for data_keluhan
-- ----------------------------
DROP TABLE IF EXISTS `data_keluhan`;
CREATE TABLE `data_keluhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penilaian` int(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_keluhan
-- ----------------------------

-- ----------------------------
-- Table structure for data_kepuasan
-- ----------------------------
DROP TABLE IF EXISTS `data_kepuasan`;
CREATE TABLE `data_kepuasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_kepuasan
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_pegawai
-- ----------------------------
INSERT INTO `data_pegawai` VALUES ('1', 'nip101', 'pegawai101', '8', 'jl. jalan jalan', '0987654321', 'peg101@crm.net');
INSERT INTO `data_pegawai` VALUES ('2', 'nip001', 'direktur001', '1', 'hhhh', '9987654', 'dirut@crm.net');
INSERT INTO `data_pegawai` VALUES ('3', 'nip102', 'hasan', '8', 'kadkahdkja', '98978787', 'test@crm.net');
INSERT INTO `data_pegawai` VALUES ('4', 'nip103', 'Aida', '8', 'adfasfa', '12314124', 'dasd');

-- ----------------------------
-- Table structure for data_penilaian
-- ----------------------------
DROP TABLE IF EXISTS `data_penilaian`;
CREATE TABLE `data_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prospek` int(11) NOT NULL,
  `keluhan` tinyint(1) DEFAULT '0',
  `kepuasan` tinyint(1) DEFAULT '0',
  `nilai_kepuasan` int(11) DEFAULT '0',
  `keterangan` text,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_penilaian
-- ----------------------------
INSERT INTO `data_penilaian` VALUES ('1', '1', '1', '0', '0', 'dnasdnajkdna  nsdkandkanda dakndkandak ksandkas\r\n\r\nKeterangan marketing : sudah ditangani per tanggal ???', '2018-07-29');
INSERT INTO `data_penilaian` VALUES ('2', '4', '1', '0', '0', 'asdad sd d asd dasd ad dasd dasdasd', '2018-08-27');

-- ----------------------------
-- Table structure for data_produk
-- ----------------------------
DROP TABLE IF EXISTS `data_produk`;
CREATE TABLE `data_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_proyek` int(11) DEFAULT NULL,
  `produk` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_produk
-- ----------------------------
INSERT INTO `data_produk` VALUES ('1', '1', 'panasonic', '11', null);
INSERT INTO `data_produk` VALUES ('2', '2', 'Trafo AC 240 Va', '12 Unit', null);

-- ----------------------------
-- Table structure for data_promosi
-- ----------------------------
DROP TABLE IF EXISTS `data_promosi`;
CREATE TABLE `data_promosi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_promosi` varchar(255) DEFAULT NULL,
  `judul_promosi` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `periode_awal` date DEFAULT NULL,
  `periode_akhir` date DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_promosi
-- ----------------------------
INSERT INTO `data_promosi` VALUES ('1', null, 'test', 'Promo Bulan Agustus 2018', '2018-08-01', '2018-08-30', null);
INSERT INTO `data_promosi` VALUES ('2', null, 'promo A', 'test', '2018-08-01', '2018-08-30', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_prospek
-- ----------------------------
INSERT INTO `data_prospek` VALUES ('1', 'PJO-01/2018-07', '1', '1', '1', '2018-08-01', 'Keterangan: 1', '5');
INSERT INTO `data_prospek` VALUES ('2', 'PJO-02/2018-07', '1', '2', '1', '2018-08-06', 'Generator dan Pancang baru', '1');
INSERT INTO `data_prospek` VALUES ('3', 'PJO-03/2018-07', '1', '2', '1', '2018-08-30', 'Tambahan Generator Baru\r\n\r\n', '2');
INSERT INTO `data_prospek` VALUES ('4', 'PJO-04/2018-07', '1', '1', '3', '2018-07-19', 'fasfasf', '5');

-- ----------------------------
-- Table structure for data_user
-- ----------------------------
DROP TABLE IF EXISTS `data_user`;
CREATE TABLE `data_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_reff` int(11) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_user
-- ----------------------------
INSERT INTO `data_user` VALUES ('1', 'admin', 'admin', null, 'admin');
INSERT INTO `data_user` VALUES ('2', 'sdm', 'sdm', null, 'sdm');
INSERT INTO `data_user` VALUES ('5', 'direktur', 'direktur', '2', 'direktur');
INSERT INTO `data_user` VALUES ('6', 'nip102', 'nip102', '3', 'marketing');
INSERT INTO `data_user` VALUES ('7', 'nip103', 'nip103', '4', 'marketing');

-- ----------------------------
-- Table structure for master_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `master_jabatan`;
CREATE TABLE `master_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jabatan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_jabatan
-- ----------------------------
INSERT INTO `master_jabatan` VALUES ('1', '001', 'Direktur Utama');
INSERT INTO `master_jabatan` VALUES ('2', '002', 'Direktur Teknik');
INSERT INTO `master_jabatan` VALUES ('3', '003', 'Direktur SDM, Umum & Logistik');
INSERT INTO `master_jabatan` VALUES ('4', '004', 'Direktur Marketing');
INSERT INTO `master_jabatan` VALUES ('5', '005', 'Direktur Keuangan');
INSERT INTO `master_jabatan` VALUES ('6', '006', 'Wakil Manajemen Mutu');
INSERT INTO `master_jabatan` VALUES ('7', '007', 'Sekretaris');
INSERT INTO `master_jabatan` VALUES ('8', '008', 'Marketing');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_kategori_proyek
-- ----------------------------
INSERT INTO `master_kategori_proyek` VALUES ('1', '001', 'Baterai', '');
INSERT INTO `master_kategori_proyek` VALUES ('2', '002', 'Rectifier', '');
