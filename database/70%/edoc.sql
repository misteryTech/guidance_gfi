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

 Date: 10/11/2024 19:50:29
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
-- Table structure for appointments
-- ----------------------------
DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments`  (
  `appointment_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `counselor_id` int NOT NULL,
  `appointment_date` date NOT NULL,
  `session_time` time NOT NULL,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `treatment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`appointment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of appointments
-- ----------------------------
INSERT INTO `appointments` VALUES (1, 1, 7, '0231-12-31', '00:31:00', 'asdads', '2024-10-24 23:34:36', NULL);
INSERT INTO `appointments` VALUES (2, 3, 7, '2024-10-02', '12:31:00', 'asd', '2024-10-25 01:03:33', NULL);
INSERT INTO `appointments` VALUES (3, 3, 7, '2024-10-30', '12:31:00', 'asd', '2024-10-25 01:07:07', NULL);
INSERT INTO `appointments` VALUES (4, 3, 7, '0023-12-31', '00:31:00', 'asd', '2024-10-25 01:08:10', NULL);
INSERT INTO `appointments` VALUES (5, 3, 7, '0000-00-00', '00:31:00', 'asd', '2024-10-25 01:08:28', NULL);
INSERT INTO `appointments` VALUES (6, 3, 9, '2024-11-04', '12:31:00', 'asdasdasd', '2024-11-01 21:30:58', 'Depression');

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
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of counselor
-- ----------------------------
INSERT INTO `counselor` VALUES (9, 'rachel@gmail.com', 'racherl', '$2y$10$rq0FdQP7z0Dl6LXUCqMkf./ijIKmaW0aL.tyCc6FnA1nd37CjZH.K', NULL, '1231231231', NULL);
INSERT INTO `counselor` VALUES (10, 'asd@gmail.com', '1231231', '$2y$10$jzp3UfnTK.KVIS7EgiW05O3Cqgtxqtv6fZGP2KMphvqBHf3/ltq1y', NULL, 'asd', NULL);
INSERT INTO `counselor` VALUES (7, 'asd@gmail.com', 'asd', '$2y$10$OnqkhVjH17bA35zsWaXa0.c4rjgNlwSQU8iagaNBqZDnxPM7xoAyO', NULL, 'sad', NULL);
INSERT INTO `counselor` VALUES (11, 'asd2@gmail.com', '123', '$2y$10$7pOIsqSlgj/MGl3Pue/I7e/IcPFlQIbLrWFYgkHJVgMBbLQd4fX0m', NULL, '123', NULL);
INSERT INTO `counselor` VALUES (12, 'asd233@gmail.com', 'asd', '$2y$10$Gbw7fOL4mDooHSPkCufMZutpYGmpE60EVQW8bBH0a/EuBsVwwwBK6', NULL, 'asd123123', NULL);
INSERT INTO `counselor` VALUES (13, 'councelor@gmail.com', 'councelor', 'councelor', '', '123', NULL);

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
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (1, 'admin@gmail.com', 'Reymark Escalante', 'admin', 'mechanist gensan', '22222', '2024-10-26', '1231231', 'admin');
INSERT INTO `student` VALUES (2, 'sample@gmail.com', 'student', 'admin', 'CITY HEIGHTS', 'sample', '2024-10-16', '1231231', 'sample');
INSERT INTO `student` VALUES (3, 'luffy@gmail.com', 'mistery12', 'luffy', 'yusaville sinawal gensan ', '22222', '2024-10-26', '1231231', 'luffy');

-- ----------------------------
-- Table structure for student_registration
-- ----------------------------
DROP TABLE IF EXISTS `student_registration`;
CREATE TABLE `student_registration`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CivilStatus` enum('Single','Married','Widowed','Separated','Others') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Religion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Tribe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Ip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Language` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `BirthOrder` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NumberOfSiblings` int NOT NULL,
  `child_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PlaceOfBirth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PermAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `HousingType` enum('Boarding House','Dormitory','Apartment','Relatives','Employer','Others') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `landlord` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LandlordNumber` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_Firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_Lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_Religion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_Tribe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_Contact` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_Email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_Education` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_Language` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_Occupation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_BusinessAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_Position` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother_Firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother_Lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother_current_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother_Religion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother_Tribe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother_Contact` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother_Email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother_Education` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother_Language` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother_Occupation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother_BusinessAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother_Position` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guardian_Firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guardian_Lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guardian_Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guardian_Contact` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guardian_Occupation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `previous_school` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `school_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `school_year` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `medical_condition` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `allergy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `medication` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_registration
-- ----------------------------
INSERT INTO `student_registration` VALUES (1, 'asd', 'Single', '0000-00-00', '', '', '', '', '', 0, '', '', '', 'Boarding House', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `student_registration` VALUES (2, 'asd', 'Single', '2024-10-24', '', '', '', '', '', 0, '', '', '', 'Boarding House', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `student_registration` VALUES (3, 'asd', 'Married', '2024-10-26', '', '', '', '', '', 0, '', '', '', 'Boarding House', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `student_registration` VALUES (4, 'asd', 'Separated', '2024-10-26', 'catholic', 'bisaya', 'N/A', 'BISAYA', '', 0, '', '', '', 'Boarding House', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `student_registration` VALUES (5, 'asd', 'Single', '2024-10-24', 'asd', 'asd', 'asd', 'asd', 'sad', 0, 'ad', 'asd', 'sad', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `student_registration` VALUES (6, 'asd', 'Married', '2024-10-25', 'asd', 'asd', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', '', 'asd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `student_registration` VALUES (7, 'sample', 'Single', '2024-10-24', 'cathloi', 'ambot', 'N/a', 'bisaya', '3rd', 4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `student_registration` VALUES (8, '3', 'Single', '2024-10-02', 'asd', 'asd', 'N/A', 'BISAYA', 'asd', 0, 'ad', 'asd', 'sad', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
INSERT INTO `webuser` VALUES ('councelor@gmail.com', 'c');
INSERT INTO `webuser` VALUES ('asd233@gmail.com', 'c');
INSERT INTO `webuser` VALUES ('asd2@gmail.com', 'c');
INSERT INTO `webuser` VALUES ('luffy@gmail.com', 'p');
INSERT INTO `webuser` VALUES ('admin@gmail.com', 'p');

SET FOREIGN_KEY_CHECKS = 1;
