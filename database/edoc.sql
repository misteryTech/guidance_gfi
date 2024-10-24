/*
 Navicat Premium Dump SQL

 Source Server         : miste_ry
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : edoc

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 23/10/2024 21:52:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `aemail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apassword` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`aemail`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('admin@guidance.com', '123');

-- ----------------------------
-- Table structure for appointment
-- ----------------------------
DROP TABLE IF EXISTS `appointment`;
CREATE TABLE `appointment`  (
  `appoid` int NOT NULL AUTO_INCREMENT,
  `pid` int NULL DEFAULT NULL,
  `apponum` int NULL DEFAULT NULL,
  `scheduleid` int NULL DEFAULT NULL,
  `appodate` date NULL DEFAULT NULL,
  PRIMARY KEY (`appoid`) USING BTREE,
  INDEX `pid`(`pid`) USING BTREE,
  INDEX `scheduleid`(`scheduleid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of appointment
-- ----------------------------

-- ----------------------------
-- Table structure for counselor
-- ----------------------------
DROP TABLE IF EXISTS `counselor`;
CREATE TABLE `counselor`  (
  `couid` int NOT NULL AUTO_INCREMENT,
  `couemail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `couname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `coupassword` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `counic` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `coutel` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `specialties` int NULL DEFAULT NULL,
  PRIMARY KEY (`couid`) USING BTREE,
  INDEX `specialties`(`specialties`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of counselor
-- ----------------------------
INSERT INTO `counselor` VALUES (5, 'student@gmail.com', 'student', '$2y$10$BqzFTcGKTSW785gpT7n60eH/V2VY4uX6Orru0kvHr3/m1f4tWn1/2', NULL, NULL, NULL);
INSERT INTO `counselor` VALUES (6, 'sample@gmail.com', 'sample_student', '$2y$10$CDM6L./VCeNnhtXQ3KXlL.eh1DOvhOPBSgqvyp2oIocbFSgPZQcfW', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for doctor
-- ----------------------------
DROP TABLE IF EXISTS `doctor`;
CREATE TABLE `doctor`  (
  `docid` int NOT NULL,
  `docemail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `docname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `docpassword` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `docnic` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `doctel` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `specialties` int NULL DEFAULT NULL
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doctor
-- ----------------------------

-- ----------------------------
-- Table structure for patient
-- ----------------------------
DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient`  (
  `pid` int NOT NULL AUTO_INCREMENT,
  `pemail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ppassword` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `paddress` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pnic` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pdob` date NULL DEFAULT NULL,
  `ptel` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patient
-- ----------------------------

-- ----------------------------
-- Table structure for pds_table
-- ----------------------------
DROP TABLE IF EXISTS `pds_table`;
CREATE TABLE `pds_table`  (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pds_table
-- ----------------------------

-- ----------------------------
-- Table structure for schedule
-- ----------------------------
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule`  (
  `scheduleid` int NOT NULL AUTO_INCREMENT,
  `docid` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `scheduledate` date NULL DEFAULT NULL,
  `scheduletime` time NULL DEFAULT NULL,
  `nop` int NULL DEFAULT NULL,
  PRIMARY KEY (`scheduleid`) USING BTREE,
  INDEX `docid`(`docid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of schedule
-- ----------------------------
INSERT INTO `schedule` VALUES (8, '1', '12', '2022-06-10', '13:33:00', 1);

-- ----------------------------
-- Table structure for specialties
-- ----------------------------
DROP TABLE IF EXISTS `specialties`;
CREATE TABLE `specialties`  (
  `id` int NOT NULL,
  `sname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of specialties
-- ----------------------------
INSERT INTO `specialties` VALUES (1, 'Accident and emergency medicine');
INSERT INTO `specialties` VALUES (2, 'Allergology');
INSERT INTO `specialties` VALUES (3, 'Anaesthetics');
INSERT INTO `specialties` VALUES (4, 'Biological hematology');
INSERT INTO `specialties` VALUES (5, 'Cardiology');
INSERT INTO `specialties` VALUES (6, 'Child psychiatry');
INSERT INTO `specialties` VALUES (7, 'Clinical biology');
INSERT INTO `specialties` VALUES (8, 'Clinical chemistry');
INSERT INTO `specialties` VALUES (9, 'Clinical neurophysiology');
INSERT INTO `specialties` VALUES (10, 'Clinical radiology');
INSERT INTO `specialties` VALUES (11, 'Dental, oral and maxillo-facial surgery');
INSERT INTO `specialties` VALUES (12, 'Dermato-venerology');
INSERT INTO `specialties` VALUES (13, 'Dermatology');
INSERT INTO `specialties` VALUES (14, 'Endocrinology');
INSERT INTO `specialties` VALUES (15, 'Gastro-enterologic surgery');
INSERT INTO `specialties` VALUES (16, 'Gastroenterology');
INSERT INTO `specialties` VALUES (17, 'General hematology');
INSERT INTO `specialties` VALUES (18, 'General Practice');
INSERT INTO `specialties` VALUES (19, 'General surgery');
INSERT INTO `specialties` VALUES (20, 'Geriatrics');
INSERT INTO `specialties` VALUES (21, 'Immunology');
INSERT INTO `specialties` VALUES (22, 'Infectious diseases');
INSERT INTO `specialties` VALUES (23, 'Internal medicine');
INSERT INTO `specialties` VALUES (24, 'Laboratory medicine');
INSERT INTO `specialties` VALUES (25, 'Maxillo-facial surgery');
INSERT INTO `specialties` VALUES (26, 'Microbiology');
INSERT INTO `specialties` VALUES (27, 'Nephrology');
INSERT INTO `specialties` VALUES (28, 'Neuro-psychiatry');
INSERT INTO `specialties` VALUES (29, 'Neurology');
INSERT INTO `specialties` VALUES (30, 'Neurosurgery');
INSERT INTO `specialties` VALUES (31, 'Nuclear medicine');
INSERT INTO `specialties` VALUES (32, 'Obstetrics and gynecology');
INSERT INTO `specialties` VALUES (33, 'Occupational medicine');
INSERT INTO `specialties` VALUES (34, 'Ophthalmology');
INSERT INTO `specialties` VALUES (35, 'Orthopaedics');
INSERT INTO `specialties` VALUES (36, 'Otorhinolaryngology');
INSERT INTO `specialties` VALUES (37, 'Paediatric surgery');
INSERT INTO `specialties` VALUES (38, 'Paediatrics');
INSERT INTO `specialties` VALUES (39, 'Pathology');
INSERT INTO `specialties` VALUES (40, 'Pharmacology');
INSERT INTO `specialties` VALUES (41, 'Physical medicine and rehabilitation');
INSERT INTO `specialties` VALUES (42, 'Plastic surgery');
INSERT INTO `specialties` VALUES (43, 'Podiatric Medicine');
INSERT INTO `specialties` VALUES (44, 'Podiatric Surgery');
INSERT INTO `specialties` VALUES (45, 'Psychiatry');
INSERT INTO `specialties` VALUES (46, 'Public health and Preventive Medicine');
INSERT INTO `specialties` VALUES (47, 'Radiology');
INSERT INTO `specialties` VALUES (48, 'Radiotherapy');
INSERT INTO `specialties` VALUES (49, 'Respiratory medicine');
INSERT INTO `specialties` VALUES (50, 'Rheumatology');
INSERT INTO `specialties` VALUES (51, 'Stomatology');
INSERT INTO `specialties` VALUES (52, 'Thoracic surgery');
INSERT INTO `specialties` VALUES (53, 'Tropical medicine');
INSERT INTO `specialties` VALUES (54, 'Urology');
INSERT INTO `specialties` VALUES (55, 'Vascular surgery');
INSERT INTO `specialties` VALUES (56, 'Venereology');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `pid` int NOT NULL AUTO_INCREMENT,
  `pemail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ppassword` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `paddress` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pnic` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pdob` date NULL DEFAULT NULL,
  `ptel` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pusername` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (1, 'admin@gmail.com', 'Reymark Escalante', 'admin', 'mechanist gensan', '22222', '2024-10-26', '1231231', 'admin');
INSERT INTO `student` VALUES (2, 'sample@gmail.com', 'student', '12301', 'CITY HEIGHTS', 'sample', '2024-10-16', '1231231', 'sample');

-- ----------------------------
-- Table structure for webuser
-- ----------------------------
DROP TABLE IF EXISTS `webuser`;
CREATE TABLE `webuser`  (
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usertype` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of webuser
-- ----------------------------
INSERT INTO `webuser` VALUES ('admin@guidance.com', 'a');
INSERT INTO `webuser` VALUES ('sample@gmail.com', 'p');
INSERT INTO `webuser` VALUES ('admin@gmail.com', 'p');

SET FOREIGN_KEY_CHECKS = 1;
