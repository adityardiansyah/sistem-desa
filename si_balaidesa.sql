/*
 Navicat Premium Data Transfer

 Source Server         : Aditya
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : localhost:3306
 Source Schema         : si_balaidesa

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 10/11/2021 06:37:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_kelahiran
-- ----------------------------
DROP TABLE IF EXISTS `data_kelahiran`;
CREATE TABLE `data_kelahiran`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_penduduk_id` int(11) NULL DEFAULT NULL,
  `no_kk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `pukul` time(0) NULL DEFAULT NULL,
  `jenis_kelahiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `anak_ke` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `berat_bayi` int(10) NULL DEFAULT NULL,
  `panjang_bayi` int(10) NULL DEFAULT NULL,
  `nik_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nik_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int(2) NULL DEFAULT 0,
  `nik_kades` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_kelahiran
-- ----------------------------
INSERT INTO `data_kelahiran` VALUES (1, 9, '3525060306990011', 'Sabtu', 'Sidoarjo', '2021-06-19', '23:59:00', 'Normal', '2', 5, 50, '3525060306990002', '3525060306990003', 1, '222', '2021-06-20 00:15:30', '2021-06-19 15:12:41');
INSERT INTO `data_kelahiran` VALUES (2, 12, '3525060306990011', 'Selasa', 'Sidoarjo', '2021-06-28', '20:58:00', 'Normal', '1', 5, 50, '3525060306990001', '3525060306990003', 1, '222', '2021-07-03 09:50:39', '2021-06-28 14:00:05');
INSERT INTO `data_kelahiran` VALUES (3, 13, '3525060306990011', 'Senin', 'Surabaya', '2021-12-31', '23:00:00', 'Cesar', '1', 5, 50, '3525060306990003', '3525060306990003', 1, '222', '2021-11-07 13:24:09', '2021-11-07 13:10:54');

-- ----------------------------
-- Table structure for data_kematian
-- ----------------------------
DROP TABLE IF EXISTS `data_kematian`;
CREATE TABLE `data_kematian`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nik_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hari_wafat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_wafat` date NULL DEFAULT NULL,
  `pukul` time(0) NULL DEFAULT NULL,
  `tempat_wafat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sebab_wafat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nik_kades` int(11) NULL DEFAULT NULL,
  `status` int(2) NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_kematian
-- ----------------------------
INSERT INTO `data_kematian` VALUES (1, NULL, '3525060306990002', '3525060306990001', 'Minggu', '2021-06-20', '23:59:00', 'Surabaya', 'Waktunya', 222, 1, '2021-06-19 23:14:47', '2021-06-19 23:24:25');

-- ----------------------------
-- Table structure for data_penduduk
-- ----------------------------
DROP TABLE IF EXISTS `data_penduduk`;
CREATE TABLE `data_penduduk`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `no_kk` bigint(255) NULL DEFAULT NULL,
  `nik` bigint(100) NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `jk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_perkawinan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pendidikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gol_darah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kewarganegaraan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_penduduk
-- ----------------------------
INSERT INTO `data_penduduk` VALUES (1, 1, 3525060306990011, 111, 'Aditya Ardiansyah (Operator)', 'Surabaya', '1999-06-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `data_penduduk` VALUES (2, 3, 3525060306990011, 3525060306990002, 'Aditya', 'Surabaya', '1999-12-01', 'Laki-Laki', 'Jalan', '01', '01', 'Islam', 'Sudah', 'S1', 'Pejabat', 'A', 'WNI');
INSERT INTO `data_penduduk` VALUES (4, 2, 12121221, 222, 'Dimas Widyatama (Kades)', 'Surabaya', '1999-11-01', 'Laki-Laki', 'Jalan Sawunggaling Lamongan', '01', '01', 'Islam', 'Sudah', 'S1', 'Siswa/Mahasiswa', 'B', 'WNI');
INSERT INTO `data_penduduk` VALUES (9, NULL, 3525060306990011, NULL, 'Baby Kecil', 'Sidoarjo', '2021-06-19', 'Laki-Laki', 'Lemah Putih', '01', '01', 'Islam', NULL, NULL, NULL, 'A', 'WNI');
INSERT INTO `data_penduduk` VALUES (10, 6, 3525060306990011, 3525060306990001, 'Wowok', 'Surabaya', '1999-12-01', 'Laki-Laki', 'Jalan', '01', '01', 'Islam', 'Sudah', 'S1', 'Pejabat', 'A', 'WNI');
INSERT INTO `data_penduduk` VALUES (11, 12, 3525060306990011, 3525060306990003, 'Ibunya Wowok', 'Surabaya', '1999-12-01', 'Laki-Laki', 'Jalan', '01', '01', 'Islam', 'Sudah', 'S1', 'Pejabat', 'A', 'WNI');
INSERT INTO `data_penduduk` VALUES (12, NULL, 3525060306990011, NULL, 'Adi Prasetyo', 'Sidoarjo', '2021-06-28', 'Laki-Laki', 'Lemah Putih', '09', '01', 'Islam', NULL, NULL, NULL, 'A', 'WNI');
INSERT INTO `data_penduduk` VALUES (13, NULL, 3525060306990011, NULL, 'Andik', 'Surabaya', '2021-12-31', 'Laki-Laki', 'Lemah Putih', '01', '01', 'Islam', NULL, NULL, NULL, 'A', 'WNI');

-- ----------------------------
-- Table structure for hak_akses
-- ----------------------------
DROP TABLE IF EXISTS `hak_akses`;
CREATE TABLE `hak_akses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hak_akses
-- ----------------------------
INSERT INTO `hak_akses` VALUES (1, 'Admin');
INSERT INTO `hak_akses` VALUES (2, 'Kepala Desa');
INSERT INTO `hak_akses` VALUES (3, 'Masyarakat');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hak_akses_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '111', '$2y$10$W3dcnEpF9pYLT55ai4yGVOPOBesP0NH9NymcncoXa5vwjpbOWTDaG', 1, '2021-05-15 14:56:00', '2021-05-15 14:56:00');
INSERT INTO `users` VALUES (2, '222', '$2y$10$dbtaeh3br1ZUVx6/OcKqierjOuGcrazL06RFqRUTgGXlDyHFVYkxS', 2, '2021-05-15 14:56:30', '2021-05-15 14:56:30');
INSERT INTO `users` VALUES (3, '3525060306990002', '$2y$10$PXRo2va90eqZbwpQJfOSaOMr1byN1AIx0EmU8rcmAxVlJ9mTjnp5.', 3, '2021-05-15 14:56:46', '2021-05-15 14:56:46');
INSERT INTO `users` VALUES (4, '3525060306990001', '$2y$10$PXRo2va90eqZbwpQJfOSaOMr1byN1AIx0EmU8rcmAxVlJ9mTjnp5.', 3, '2021-05-15 14:56:46', '2021-05-15 14:56:46');
INSERT INTO `users` VALUES (6, '3525060306990001', '$2y$10$NEXh9EMg3swwbRz7tp89YePpNe3nFlq1kgvh9pKkC9FoE9A1SowFO', 3, '2021-06-28 13:55:16', '2021-06-28 13:55:16');
INSERT INTO `users` VALUES (12, '3525060306990003', '$2y$10$.BifWeEpMro.BuwmMdjgZusg81vGasaa7xE8Md.p.4Bno1ToUUmpe', 3, '2021-11-07 13:04:28', '2021-11-07 13:04:28');

SET FOREIGN_KEY_CHECKS = 1;
