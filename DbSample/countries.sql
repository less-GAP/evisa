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

 Date: 04/08/2023 10:05:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_A3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_N3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `countries_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
BEGIN;
INSERT INTO `countries` VALUES (2, 'Afghanistan', 'AF', 'AFG', '004', 'AS', '33', '65', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (3, 'Albania', 'AL', 'ALB', '008', 'EU', '41', '20', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (4, 'Algeria', 'DZ', 'DZA', '012', 'AF', '28', '3', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (5, 'American Samoa', 'AS', 'ASM', '016', 'AU', '-14.199999999999999', '-170', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (6, 'Andorra', 'AD', 'AND', '020', 'EU', '42.299999999999997', '1.3', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (7, 'Angola', 'AO', 'AGO', '024', 'AF', '-12.300000000000001', '18.300000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (8, 'Anguilla', 'AI', 'AIA', '660', 'LA', '18.149999999999999', '-63.100000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (9, 'Antarctica', 'AQ', 'ATA', '010', 'AN', '-90', '0', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (10, 'Antigua and Barbuda', 'AG', 'ATG', '028', 'LA', '17.030000000000001', '-61.479999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (11, 'Argentina', 'AR', 'ARG', '032', 'LA', '-34', '-64', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (12, 'Armenia', 'AM', 'ARM', '051', 'AS', '40', '45', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (13, 'Aruba', 'AW', 'ABW', '533', 'LA', '12.300000000000001', '-69.579999999999998', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (14, 'Australia', 'AU', 'AUS', '036', 'AU', '-27', '133', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (15, 'Austria', 'AT', 'AUT', '040', 'EU', '47.200000000000003', '13.199999999999999', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (16, 'Azerbaijan', 'AZ', 'AZE', '031', 'AS', '40.299999999999997', '47.299999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (17, 'Bahamas', 'BS', 'BHS', '044', 'LA', '24.149999999999999', '-76', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (18, 'Bahrain', 'BH', 'BHR', '048', 'AS', '26', '50.329999999999998', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (19, 'Bangladesh', 'BD', 'BGD', '050', 'AS', '24', '90', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (20, 'Barbados', 'BB', 'BRB', '052', 'LA', '13.1', '-59.32', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (21, 'Belarus', 'BY', 'BLR', '112', 'EU', '53', '28', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (22, 'Belgium', 'BE', 'BEL', '056', 'EU', '50.5', '4', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (23, 'Belize', 'BZ', 'BLZ', '084', 'LA', '17.149999999999999', '-88.450000000000003', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (24, 'Benin', 'BJ', 'BEN', '204', 'AF', '9.300000000000001', '2.15', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (25, 'Bermuda', 'BM', 'BMU', '060', 'LA', '32.200000000000003', '-64.450000000000003', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (26, 'Bhutan', 'BT', 'BTN', '064', 'AS', '27.300000000000001', '90.299999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (27, 'Bolivia', 'BO', 'BOL', '068', 'LA', '-17', '-65', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (28, 'Bosnia and Herzegovina', 'BA', 'BIH', '070', 'EU', '44', '18', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (29, 'Botswana', 'BW', 'BWA', '072', 'AF', '-22', '24', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (30, 'Bouvet Island', 'BV', 'BVT', '074', 'AN', '-54.259999999999998', '3.24', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (31, 'Brazil', 'BR', 'BRA', '076', 'LA', '-10', '-55', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (32, 'British Indian Ocean Territory', 'IO', 'IOT', '086', 'AS', '-6', '71.299999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (33, 'British Virgin Islands', 'VG', 'VGB', '092', 'LA', '18.199999999999999', '-64.5', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (34, 'Brunei Darussalam', 'BN', 'BRN', '096', 'AS', '4.3', '114.400000000000006', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (35, 'Bulgaria', 'BG', 'BGR', '100', 'EU', '43', '25', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (36, 'Burkina Faso', 'BF', 'BFA', '854', 'AF', '13', '-2', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (37, 'Burundi', 'BI', 'BDI', '108', 'AF', '-3.3', '30', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (38, 'Cambodia', 'KH', 'KHM', '116', 'AS', '13', '105', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (39, 'Cameroon', 'CM', 'CMR', '120', 'AF', '6', '12', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (40, 'Canada', 'CA', 'CAN', '124', 'NA', '60', '-95', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (41, 'Cape Verde', 'CV', 'CPV', '132', 'AF', '16', '-24', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (42, 'Cayman Islands', 'KY', 'CYM', '136', 'LA', '19.300000000000001', '-80.299999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (43, 'Central African Republic', 'CF', 'CAF', '140', 'AF', '7', '21', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (44, 'Chad', 'TD', 'TCD', '148', 'AF', '15', '19', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (45, 'Chile', 'CL', 'CHL', '152', 'LA', '-30', '-71', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (46, 'China', 'CN', 'CHN', '156', 'AS', '35', '105', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (47, 'Christmas Island', 'CX', 'CXR', '162', 'AU', '-10.300000000000001', '105.400000000000006', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (48, 'Cocos (Keeling) Islands', 'CC', 'CCK', '166', 'AU', '-12.300000000000001', '96.5', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (49, 'Colombia', 'CO', 'COL', '170', 'LA', '4', '-72', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (50, 'Comoros', 'KM', 'COM', '174', 'AF', '-12.1', '44.149999999999999', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (51, 'Congo', 'CG', 'COG', '178', 'AF', '0', '25', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (52, 'Cook Islands', 'CK', 'COK', '184', 'AU', '-21.140000000000001', '-159.460000000000008', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (53, 'Costa Rica', 'CR', 'CRI', '188', 'LA', '10', '-84', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (54, 'Cote D\'ivoire', 'CI', 'CIV', '384', 'AF', '7.64', '-4.93', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (55, 'Croatia', 'HR', 'HRV', '191', 'EU', '45.100000000000001', '15.300000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (56, 'Cuba', 'CU', 'CUB', '192', 'LA', '21.300000000000001', '-80', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (57, 'Cyprus', 'CY', 'CYP', '196', 'EU', '35', '33', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (58, 'Czech Republic', 'CZ', 'CZE', '203', 'EU', '49.450000000000003', '15.300000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (59, 'Denmark', 'DK', 'DNK', '208', 'EU', '56', '10', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (60, 'Djibouti', 'DJ', 'DJI', '262', 'AF', '11.300000000000001', '43', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (61, 'Dominica', 'DM', 'DMA', '212', 'LA', '15.25', '-61.200000000000003', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (62, 'Dominican Republic', 'DO', 'DOM', '214', 'LA', '19', '-70.400000000000006', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (63, 'East Timor', 'TL', 'TLS', '626', 'AS', '-8.5', '125.549999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (64, 'Ecuador', 'EC', 'ECU', '218', 'LA', '-2', '-77.299999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (65, 'Egypt', 'EG', 'EGY', '818', 'AF', '27', '30', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (66, 'El Salvador', 'SV', 'SLV', '222', 'LA', '13.5', '-88.549999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (67, 'Equatorial Guinea', 'GQ', 'GNQ', '226', 'AF', '2', '10', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (68, 'Eritrea', 'ER', 'ERI', '232', 'AF', '15', '39', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (69, 'Estonia', 'EE', 'EST', '233', 'EU', '59', '26', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (70, 'Ethiopia', 'ET', 'ETH', '210', 'AF', '8', '38', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (71, 'Falkland Islands (Malvinas)', 'FK', 'FLK', '238', 'LA', '-51.450000000000003', '-59', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (72, 'Faroe Islands', 'FO', 'FRO', '234', 'EU', '62', '-7', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (73, 'Fiji', 'FJ', 'FJI', '242', 'AU', '-18', '175', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (74, 'Finland', 'FI', 'FIN', '246', 'EU', '64', '26', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (75, 'France', 'FR', 'FRA', '250', 'EU', '46', '2', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (76, 'France, Metropolitan', 'FX', 'FXX', '249', 'EU', '0', '0', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (77, 'French Guiana', 'GF', 'GUF', '254', 'LA', '4', '-53', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (78, 'French Polynesia', 'PF', 'PYF', '258', 'AU', '-15', '-140', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (79, 'French Southern Territories', 'TF', 'ATF', '260', 'AN', '-43', '67', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (80, 'Gabon', 'GA', 'GAB', '266', 'AF', '-1', '11.449999999999999', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (81, 'Georgia', 'GE', 'GEO', '268', 'AS', '42', '43.299999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (82, 'Gambia', 'GM', 'GMB', '270', 'AF', '13.279999999999999', '-16.34', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (83, 'Palestine Authority', 'PS', 'PSE', '275', 'AS', '31.890000000000001', '34.899999999999999', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (84, 'Germany', 'DE', 'DEU', '276', 'EU', '51', '9', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (85, 'Ghana', 'GH', 'GHA', '288', 'AF', '8', '-2', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (86, 'Gibraltar', 'GI', 'GIB', '292', 'EU', '36.799999999999997', '-5.21', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (87, 'Greece', 'GR', 'GRC', '300', 'EU', '39', '22', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (88, 'Greenland', 'GL', 'GRL', '304', 'NA', '72', '-40', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (89, 'Grenada', 'GD', 'GRD', '308', 'LA', '12.07', '-61.399999999999999', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (90, 'Guadeloupe', 'GP', 'GLP', '312', 'LA', '16.149999999999999', '-61.350000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (91, 'Guam', 'GU', 'GUM', '316', 'AU', '13.279999999999999', '144.469999999999999', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (92, 'Guatemala', 'GT', 'GTM', '320', 'LA', '15.300000000000001', '-90.150000000000006', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (93, 'Guinea', 'GN', 'GIN', '324', 'AF', '11', '-10', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (94, 'Guinea-Bissau', 'GW', 'GNB', '624', 'AF', '12', '-15', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (95, 'Guyana', 'GY', 'GUY', '328', 'LA', '5', '-59', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (96, 'Haiti', 'HT', 'HTI', '332', 'LA', '19', '-72.25', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (97, 'Heard and McDonald Islands', 'HM', 'HMD', '334', 'AU', '-53.060000000000002', '72.310000000000002', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (98, 'Honduras', 'HN', 'HND', '340', 'LA', '15', '-86.299999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (99, 'Hong Kong', 'HK', 'HKG', '344', 'AS', '22.149999999999999', '114.099999999999994', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (100, 'Hungary', 'HU', 'HUN', '348', 'EU', '47', '20', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (101, 'Iceland', 'IS', 'ISL', '352', 'EU', '65', '-18', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (102, 'India', 'IN', 'IND', '356', 'AS', '20', '77', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (103, 'Indonesia', 'ID', 'IDN', '360', 'AS', '-5', '120', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (104, 'Iraq', 'IQ', 'IRQ', '368', 'AS', '33', '44', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (105, 'Ireland', 'IE', 'IRL', '372', 'EU', '53', '-8', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (106, 'Islamic Republic of Iran', 'IR', 'IRN', '364', 'AS', '32', '53', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (107, 'Israel', 'IL', 'ISR', '376', 'AS', '31.300000000000001', '34.450000000000003', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (108, 'Italy', 'IT', 'ITA', '380', 'EU', '42.5', '12.5', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (109, 'Jamaica', 'JM', 'JAM', '388', 'LA', '18.149999999999999', '-77.299999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (110, 'Japan', 'JP', 'JPN', '392', 'AS', '36', '138', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (111, 'Jordan', 'JO', 'JOR', '400', 'AS', '31', '36', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (112, 'Kazakhstan', 'KZ', 'KAZ', '398', 'AS', '48', '68', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (113, 'Kenya', 'KE', 'KEN', '404', 'AF', '1', '38', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (114, 'Kiribati', 'KI', 'KIR', '296', 'AU', '1.25', '173', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (115, 'Korea', 'KP', 'PRK', '408', 'AS', '40', '127', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (116, 'Korea, Republic of', 'KR', 'KOR', '410', 'AS', '37', '127.299999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (117, 'Kuwait', 'KW', 'KWT', '414', 'AS', '29.300000000000001', '45.450000000000003', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (118, 'Kyrgyzstan', 'KG', 'KGZ', '417', 'AS', '41', '75', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (119, 'Laos', 'LA', 'LAO', '418', 'AS', '18', '105', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (120, 'Latvia', 'LV', 'LVA', '428', 'EU', '57', '25', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (121, 'Lebanon', 'LB', 'LBN', '422', 'AS', '33.5', '35.5', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (122, 'Lesotho', 'LS', 'LSO', '426', 'AF', '-29.300000000000001', '28.300000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (123, 'Liberia', 'LR', 'LBR', '430', 'AF', '6.3', '-9.300000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (124, 'Libyan Arab Jamahiriya', 'LY', 'LBY', '434', 'AF', '25', '17', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (125, 'Liechtenstein', 'LI', 'LIE', '438', 'EU', '47.159999999999997', '9.32', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (126, 'Lithuania', 'LT', 'LTU', '440', 'EU', '56', '24', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (127, 'Luxembourg', 'LU', 'LUX', '442', 'EU', '49.450000000000003', '6.1', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (128, 'Macau', 'MO', 'MAC', '446', 'AS', '22.100000000000001', '113.329999999999998', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (129, 'Macedonia', 'MK', 'MKD', '807', 'EU', '41.5', '22', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (130, 'Madagascar', 'MG', 'MDG', '450', 'AF', '-20', '47', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (131, 'Malawi', 'MW', 'MWI', '454', 'AF', '-13.300000000000001', '34', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (132, 'Malaysia', 'MY', 'MYS', '458', 'AS', '2.3', '112.299999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (133, 'Maldives', 'MV', 'MDV', '462', 'AS', '3.15', '73', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (134, 'Mali', 'ML', 'MLI', '466', 'AF', '17', '-4', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (135, 'Malta', 'MT', 'MLT', '470', 'EU', '35.5', '14.35', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (136, 'Marshall Islands', 'MH', 'MHL', '584', 'AU', '9', '168', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (137, 'Martinique', 'MQ', 'MTQ', '474', 'LA', '14.4', '-61', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (138, 'Mauritania', 'MR', 'MRT', '478', 'AF', '20', '-12', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (139, 'Mauritius', 'MU', 'MUS', '480', 'AF', '-20.170000000000002', '57.329999999999998', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (140, 'Mayotte', 'YT', 'MYT', '175', 'AF', '-12.5', '45.100000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (141, 'Mexico', 'MX', 'MEX', '484', 'LA', '23', '-102', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (142, 'Micronesia', 'FM', 'FSM', '583', 'AU', '6.55', '158.150000000000006', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (143, 'Moldova, Republic of', 'MD', 'MDA', '498', 'EU', '47', '29', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (144, 'Monaco', 'MC', 'MCO', '492', 'EU', '43.439999999999998', '7.24', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (145, 'Mongolia', 'MN', 'MNG', '496', 'AS', '46', '105', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (146, 'Montserrat', 'MS', 'MSR', '500', 'LA', '16.449999999999999', '-62.119999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (147, 'Morocco', 'MA', 'MAR', '504', 'AF', '32', '-5', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (148, 'Mozambique', 'MZ', 'MOZ', '508', 'AF', '-18.149999999999999', '35', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (149, 'Myanmar', 'MM', 'MMR', '104', 'AS', '22', '98', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (150, 'Namibia', 'NA', 'NAM', '516', 'AF', '-22', '17', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (151, 'Nauru', 'NR', 'NRU', '520', 'AU', '-0.32', '166.550000000000011', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (152, 'Nepal', 'NP', 'NPL', '524', 'AS', '28', '84', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (153, 'Netherlands', 'NL', 'NLD', '528', 'EU', '52.299999999999997', '5.45', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (154, 'New Caledonia', 'NC', 'NCL', '540', 'AU', '-21.300000000000001', '165.300000000000011', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (155, 'New Zealand', 'NZ', 'NZL', '554', 'AU', '-41', '174', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (156, 'Nicaragua', 'NI', 'NIC', '558', 'LA', '13', '-85', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (157, 'Niger', 'NE', 'NER', '562', 'AF', '16', '8', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (158, 'Nigeria', 'NG', 'NGA', '566', 'AF', '10', '8', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (159, 'Niue', 'NU', 'NIU', '570', 'AU', '-19.02', '-169.52000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (160, 'Norfolk Island', 'NF', 'NFK', '574', 'AU', '-29.02', '167.569999999999993', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (161, 'Northern Mariana Islands', 'MP', 'MNP', '580', 'AU', '15.119999999999999', '145.449999999999989', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (162, 'Norway', 'NO', 'NOR', '578', 'EU', '62', '10', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (163, 'Oman', 'OM', 'OMN', '512', 'AS', '21', '57', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (164, 'Pakistan', 'PK', 'PAK', '586', 'AS', '30', '70', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (165, 'Palau', 'PW', 'PLW', '585', 'AU', '7.3', '134.300000000000011', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (166, 'Panama', 'PA', 'PAN', '591', 'LA', '9', '-80', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (167, 'Papua New Guinea', 'PG', 'PNG', '598', 'AS', '-6', '147', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (168, 'Paraguay', 'PY', 'PRY', '600', 'LA', '-23', '-58', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (169, 'Peru', 'PE', 'PER', '604', 'LA', '-10', '-76', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (170, 'Philippines', 'PH', 'PHL', '608', 'AS', '13', '122', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (171, 'Pitcairn', 'PN', 'PCN', '612', 'AU', '-25.039999999999999', '-130.060000000000002', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (172, 'Poland', 'PL', 'POL', '616', 'EU', '52', '20', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (173, 'Portugal', 'PT', 'PRT', '620', 'EU', '39.299999999999997', '-8', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (174, 'Puerto Rico', 'PR', 'PRI', '630', 'LA', '18.149999999999999', '-66.299999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (175, 'Qatar', 'QA', 'QAT', '634', 'AS', '25.300000000000001', '51.149999999999999', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (176, 'Reunion', 'RE', 'REU', '638', 'AF', '-21.059999999999999', '55.359999999999999', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (177, 'Romania', 'RO', 'ROU', '642', 'EU', '46', '25', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (178, 'Russian Federation', 'RU', 'RUS', '643', 'EU', '60', '100', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (179, 'Rwanda', 'RW', 'RWA', '646', 'AF', '-2', '30', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (180, 'Saint Lucia', 'LC', 'LCA', '662', 'LA', '13.529999999999999', '-60.68', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (181, 'Samoa', 'WS', 'WSM', '685', 'AU', '-13.35', '-172.199999999999989', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (182, 'San Marino', 'SM', 'SMR', '674', 'EU', '43.460000000000001', '12.25', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (183, 'Sao Tome and Principe', 'ST', 'STP', '678', 'AF', '1', '7', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (184, 'Saudi Arabia', 'SA', 'SAU', '682', 'AS', '25', '45', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (185, 'Senegal', 'SN', 'SEN', '686', 'AF', '14', '-14', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (186, 'Seychelles', 'SC', 'SYC', '690', 'AF', '-4.35', '55.399999999999999', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (187, 'Sierra Leone', 'SL', 'SLE', '694', 'AF', '8.300000000000001', '-11.300000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (188, 'Singapore', 'SG', 'SGP', '702', 'AS', '1.22', '103.480000000000004', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (189, 'Slovakia', 'SK', 'SVK', '703', 'EU', '48.399999999999999', '19.300000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (190, 'Slovenia', 'SI', 'SVN', '705', 'EU', '46.07', '14.49', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (191, 'Solomon Islands', 'SB', 'SLB', '090', 'AU', '-8', '159', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (192, 'Somalia', 'SO', 'SOM', '706', 'AF', '10', '49', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (193, 'South Africa', 'ZA', 'ZAF', '710', 'AF', '-29', '24', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (194, 'Spain', 'ES', 'ESP', '724', 'EU', '40', '-4', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (195, 'Sri Lanka', 'LK', 'LKA', '144', 'AS', '7', '81', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (196, 'St. Helena', 'SH', 'SHN', '654', 'AF', '-15.56', '-5.42', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (197, 'St. Kitts and Nevis', 'KN', 'KNA', '659', 'LA', '17.199999999999999', '-62.450000000000003', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (198, 'St. Pierre and Miquelon', 'PM', 'SPM', '666', 'NA', '46.5', '-56.200000000000003', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (199, 'St. Vincent and the Grenadines', 'VC', 'VCT', '670', 'LA', '13.15', '-61.119999999999997', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (200, 'Sudan', 'SD', 'SDN', '736', 'AF', '15', '30', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (201, 'Suriname', 'SR', 'SUR', '740', 'LA', '4', '-56', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (202, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', '744', 'EU', '78', '20', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (203, 'Swaziland', 'SZ', 'SWZ', '748', 'AF', '-26.300000000000001', '31.300000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (204, 'Sweden', 'SE', 'SWE', '752', 'EU', '62', '15', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (205, 'Switzerland', 'CH', 'CHE', '756', 'EU', '47', '8', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (206, 'Syrian Arab Republic', 'SY', 'SYR', '760', 'AS', '35', '38', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (207, 'Taiwan', 'TW', 'TWN', '158', 'AS', '23.300000000000001', '121', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (208, 'Tajikistan', 'TJ', 'TJK', '762', 'AS', '39', '71', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (209, 'Tanzania, United Republic of', 'TZ', 'TZA', '834', 'AF', '-6', '35', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (210, 'Thailand', 'TH', 'THA', '764', 'AS', '15', '100', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (211, 'Togo', 'TG', 'TGO', '768', 'AF', '8', '1.1', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (212, 'Tokelau', 'TK', 'TKL', '772', 'AU', '-9', '-172', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (213, 'Tonga', 'TO', 'TON', '776', 'AU', '-20', '-175', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (214, 'Trinidad and Tobago', 'TT', 'TTO', '780', 'LA', '11', '-61', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (215, 'Tunisia', 'TN', 'TUN', '788', 'AF', '34', '9', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (216, 'Turkey', 'TR', 'TUR', '792', 'EU', '39', '35', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (217, 'Turkmenistan', 'TM', 'TKM', '795', 'AS', '40', '60', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (218, 'Turks and Caicos Islands', 'TC', 'TCA', '796', 'LA', '21.449999999999999', '-71.349999999999994', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (219, 'Tuvalu', 'TV', 'TUV', '798', 'AU', '-8', '178', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (220, 'Uganda', 'UG', 'UGA', '800', 'AF', '1', '32', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (221, 'Ukraine', 'UA', 'UKR', '804', 'EU', '49', '32', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (222, 'United Arab Emirates', 'AE', 'ARE', '784', 'AS', '24', '54', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (223, 'United Kingdom (Great Britain)', 'GB', 'GBR', '826', 'EU', '54', '-2', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (224, 'United States', 'US', 'USA', '840', 'NA', '38', '-97', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (225, 'United States Virgin Islands', 'VI', 'VIR', '850', 'LA', '18.199999999999999', '-64.5', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (226, 'Uruguay', 'UY', 'URY', '858', 'LA', '-33', '-56', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (227, 'Uzbekistan', 'UZ', 'UZB', '860', 'AS', '41', '64', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (228, 'Vanuatu', 'VU', 'VUT', '548', 'AU', '-16', '167', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (229, 'Vatican City State', 'VA', 'VAT', '336', 'EU', '41.539999999999999', '12.27', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (230, 'Venezuela', 'VE', 'VEN', '862', 'LA', '8', '-66', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (231, 'Viet Nam', 'VN', 'VNM', '704', 'AS', '16', '106', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (232, 'Wallis And Futuna Islands', 'WF', 'WLF', '876', 'AU', '-13.18', '-176.120000000000005', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (233, 'Western Sahara', 'EH', 'ESH', '732', 'AF', '24.300000000000001', '-13', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (234, 'Yemen', 'YE', 'YEM', '887', 'AS', '15', '48', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (235, 'Serbia', 'CS', 'SCG', '891', 'EU', '43.57', '21.41', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (236, 'Zaire', 'ZR', 'ZAR', '180', 'AF', '0', '0', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (237, 'Zambia', 'ZM', 'ZMB', '894', 'AF', '-15', '30', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (238, 'Zimbabwe', 'ZW', 'ZWE', '716', 'AF', '-20', '30', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (239, 'Asia-Pacific', 'AP', NULL, NULL, NULL, '-2.81', '128.5', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (240, 'Republic of Serbia', 'RS', 'SRB', '688', 'EU', '44.020000000000003', '21.010000000000002', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (241, 'Aland Islands', 'AX', 'ALA', '248', 'EU', '60.210000000000001', '20.16', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (242, 'Europe', 'EU', NULL, NULL, NULL, '0', '0', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (243, 'Montenegro', 'ME', 'MNE', '499', 'EU', '42.469999999999999', '19.280000000000001', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (244, 'Guernsey', 'GG', 'GGY', '831', 'EU', '49.270000000000003', '2.33', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (245, 'Jersey', 'JE', 'JEY', '832', 'EU', '49.109999999999999', '2.06', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (246, 'Isle of Man', 'IM', 'IMN', '833', 'EU', '54.090000000000003', '4.29', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (247, 'Curaçao', 'CW', 'CUW', '531', 'LA', '12.18', '-69', 'A', NULL, NULL, NULL, NULL);
INSERT INTO `countries` VALUES (248, 'Sint Maarten', 'SX', 'SXM', '534', 'LA', '18.07', '-63.049999999999997', 'A', NULL, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
