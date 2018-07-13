/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_ecrm

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-12 02:43:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `data_client`
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_client
-- ----------------------------
INSERT INTO `data_client` VALUES ('1', 'hjhhjhk', 'hjhhhkj', '80809890', 'tutirahmawati10@gmail.com', '2018-06-29', 'hjghj', '$2y$10$TPqTDARSQD2nRD.lpz0v1OUG.KfMn3BawWXIeax1WEtlJfERMTtFG', '0');
INSERT INTO `data_client` VALUES ('2', 'PT.Astra mobile', 'meminta pemasangan kabel', '0896777222222', 'fauzanricky09@gmail.com', '2018-07-01', 'rickyfauzan', '$2y$10$tvdzA7jlyDLokjGBi0udVuhO8zHskiFDO0vM/10EFavf9hC9JgM7y', '0');
INSERT INTO `data_client` VALUES ('3', 'pln', 'jln buruan ', '0988777666', 'vallenbrz@yahoo.com', '2018-07-02', 'rifaldi', '$2y$10$tB8KlJzAbg1fQp2md7Dvx.9SCXndcy1zpjTkjTvF5jPE9YAHD8SUO', '0');
INSERT INTO `data_client` VALUES ('4', 'pt asem', 'ggggggg', '1234567890', 'gunk64@gmail.com', '2018-07-10', 'kogure13', '$2y$10$Z/fu8QmvGo8sOPqR2eSGs.eug6KNnnjG18apY67n000xJVWxR9UQW', '0');

-- ----------------------------
-- Table structure for `data_keluhan`
-- ----------------------------
DROP TABLE IF EXISTS `data_keluhan`;
CREATE TABLE `data_keluhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_keluhan
-- ----------------------------

-- ----------------------------
-- Table structure for `data_kepuasan`
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
-- Table structure for `data_pegawai`
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
-- Table structure for `data_promosi`
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
-- Table structure for `data_prospek`
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_prospek
-- ----------------------------
INSERT INTO `data_prospek` VALUES ('1', '101', '4', '1', '2', '2018-07-10', null, '0');

-- ----------------------------
-- Table structure for `data_user`
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
INSERT INTO `data_user` VALUES ('2', 'nip101', 'nip101', '1');
INSERT INTO `data_user` VALUES ('3', 'nip102', 'nip102', '2');
INSERT INTO `data_user` VALUES ('4', 'nip103', 'nip103', '4');
INSERT INTO `data_user` VALUES ('5', 'nip104', 'nip104', '6');
INSERT INTO `data_user` VALUES ('6', 'nip105', 'nip105', '8');

-- ----------------------------
-- Table structure for `master_jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `master_jabatan`;
CREATE TABLE `master_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_jabatan
-- ----------------------------
INSERT INTO `master_jabatan` VALUES ('1', 'Administrator');
INSERT INTO `master_jabatan` VALUES ('2', 'Direktur Utama');
INSERT INTO `master_jabatan` VALUES ('3', 'Direktur Marketing');
INSERT INTO `master_jabatan` VALUES ('4', 'Direktur Teknisi');
INSERT INTO `master_jabatan` VALUES ('5', 'Direktur SDM, Umum, & Logistik');
INSERT INTO `master_jabatan` VALUES ('6', 'Direktur Keuangan');
INSERT INTO `master_jabatan` VALUES ('7', 'Wakil Manajemen Umum');
INSERT INTO `master_jabatan` VALUES ('8', 'Sekretaris');
INSERT INTO `master_jabatan` VALUES ('9', 'Staff Marketing');
INSERT INTO `master_jabatan` VALUES ('10', 'IT Support');

-- ----------------------------
-- Table structure for `master_kategori_proyek`
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
