/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1_3306
 Source Server Type    : MySQL
 Source Server Version : 80032
 Source Host           : 127.0.0.1:3306
 Source Schema         : evisa

 Target Server Type    : MySQL
 Target Server Version : 80032
 File Encoding         : 65001

 Date: 04/08/2023 10:05:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for provinces
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `provinces_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=707 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of provinces
-- ----------------------------
BEGIN;
INSERT INTO `provinces` VALUES (31, 'Hà Nội', '01', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (42, 'Hà Giang', '02', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (52, 'Cao Bằng', '04', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (60, 'Bắc Kạn', '06', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (67, 'Tuyên Quang', '08', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (76, 'Lào Cai', '10', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (86, 'Điện Biên', '11', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (94, 'Lai Châu', '12', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (106, 'Sơn La', '14', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (115, 'Yên Bái', '15', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (125, 'Hòa Bình', '17', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (134, 'Thái Nguyên', '19', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (145, 'Lạng Sơn', '20', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (158, 'Quảng Ninh', '22', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (168, 'Bắc Giang', '24', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (181, 'Phú Thọ', '25', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (190, 'Vĩnh Phúc', '26', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (198, 'Bắc Ninh', '27', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (210, 'Hải Dương', '30', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (225, 'Hải Phòng', '31', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (235, 'Hưng Yên', '33', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (243, 'Thái Bình', '34', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (249, 'Hà Nam', '35', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (259, 'Nam Định', '36', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (267, 'Ninh Bình', '37', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (294, 'Thanh Hóa', '38', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (315, 'Nghệ An', '40', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (328, 'Hà Tĩnh', '42', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (336, 'Quảng Bình', '44', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (346, 'Quảng Trị', '45', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (355, 'Thừa Thiên-Huế', '46', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (363, 'Đà Nẵng', '48', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (381, 'Quảng Nam', '49', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (394, 'Quảng Ngãi', '51', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (405, 'Bình Định', '52', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (414, 'Phú Yên', '54', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (423, 'Khánh Hòa', '56', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (430, 'Ninh Thuận', '58', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (440, 'Bình Thuận', '60', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (450, 'Kon Tum', '62', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (467, 'Gia Lai', '64', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (482, 'Đắk Lắk', '66', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (490, 'Đắk Nông', '67', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (502, 'Lâm Đồng', '68', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (513, 'Bình Phước', '70', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (522, 'Tây Ninh', '72', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (531, 'Bình Dương', '74', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (542, 'Đồng Nai', '75', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (550, 'Bà Rịa-Vũng Tàu', '77', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (572, 'Hồ Chí Minh', '79', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (587, 'Long An', '80', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (598, 'Tiền Giang', '82', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (607, 'Bến Tre', '83', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (616, 'Trà Vinh', '84', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (624, 'Vĩnh Long', '86', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (636, 'Đồng Tháp', '87', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (647, 'An Giang', '89', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (662, 'Kiên Giang', '91', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (671, 'Cần Thơ', '92', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (679, 'Hậu Giang', '93', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (690, 'Sóc Trăng', '94', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (697, 'Bạc Liêu', '95', 'VN', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `provinces` VALUES (706, 'Cà Mau', '96', 'VN', 'A', NULL, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
