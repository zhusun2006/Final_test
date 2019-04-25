/*
Navicat MySQL Data Transfer

Source Server         : localhost3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-04-25 08:14:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------

-- ----------------------------
-- Table structure for admin_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_operation_log
-- ----------------------------

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_menu
-- ----------------------------

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_users
-- ----------------------------

-- ----------------------------
-- Table structure for admin_user_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_user_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for antopics
-- ----------------------------
DROP TABLE IF EXISTS `antopics`;
CREATE TABLE `antopics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `view_count` int(10) unsigned NOT NULL DEFAULT '0',
  `order` int(10) unsigned NOT NULL DEFAULT '0',
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topics_title_index` (`title`),
  KEY `topics_user_id_index` (`user_id`),
  KEY `topics_category_id_index` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of antopics
-- ----------------------------
INSERT INTO `antopics` VALUES ('1', 'Temporibus omnis non ut non sapiente iusto corporis.', 'Vero et dolorum ea tempore voluptate. Sunt nostrum laboriosam ratione. Non repellendus fugit facilis et iste saepe et. At a ea repudiandae temporibus accusantium possimus eos.', '1', '4', '0', '0', 'Temporibus omnis non ut non sapiente iusto corporis.', null, '2019-03-07 05:36:56', '2019-03-07 17:24:25');
INSERT INTO `antopics` VALUES ('2', 'Fugiat deserunt vel fugiat animi consequatur.', 'Explicabo doloremque ipsum repellendus culpa voluptatem quo explicabo. Dolores corporis sunt animi consequatur ullam nesciunt. Sit numquam maxime fugit quis sit.', '2', '1', '0', '0', 'Fugiat deserunt vel fugiat animi consequatur.', null, '2019-03-20 02:52:28', '2019-04-02 06:02:59');
INSERT INTO `antopics` VALUES ('3', 'Est itaque velit aut vero quaerat in.', 'Porro ut maxime nisi deleniti. Labore ullam cum nam similique itaque aut quas quis. Et asperiores blanditiis dolor adipisci nisi. Enim error est nostrum neque.', '3', '2', '0', '0', 'Est itaque velit aut vero quaerat in.', null, '2019-03-20 09:38:31', '2019-04-01 06:46:28');
INSERT INTO `antopics` VALUES ('4', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', 'Itaque quasi aut et reprehenderit. Dolorum excepturi velit quia ut labore.', '4', '3', '0', '0', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', null, '2019-03-12 08:31:56', '2019-03-14 03:06:13');
INSERT INTO `antopics` VALUES ('5', 'Maiores sed quia omnis ab officiis.', 'At et in quia voluptates sed. Quae maiores ipsum eligendi delectus. Veritatis laborum quae sunt dignissimos facere cupiditate odio dolor.', '5', '3', '0', '0', 'Maiores sed quia omnis ab officiis.', null, '2019-03-17 19:13:56', '2019-03-23 10:50:50');
INSERT INTO `antopics` VALUES ('6', 'Rerum blanditiis corporis dicta dolorem autem.', 'Enim sapiente autem quibusdam est esse commodi dolorem facilis. Similique accusamus numquam accusantium possimus iure rerum. Aut beatae sit molestias odit aut enim.', '6', '1', '0', '0', 'Rerum blanditiis corporis dicta dolorem autem.', null, '2019-03-06 01:18:44', '2019-03-09 08:17:02');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名称',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT '描述',
  `view_count` int(11) NOT NULL DEFAULT '0' COMMENT '查看量',
  PRIMARY KEY (`id`),
  KEY `categories_name_index` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', '任职公示', '......', '0');
INSERT INTO `categories` VALUES ('2', '节假公告', '关于各假日的放假调休情况', '0');
INSERT INTO `categories` VALUES ('3', '事件进程', '关于部分事物的进展报告', '0');
INSERT INTO `categories` VALUES ('4', '公告', '站点公告', '0');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('17', '2014_10_12_000000_create_users_table', '2');
INSERT INTO `migrations` VALUES ('18', '2014_10_12_100000_create_password_resets_table', '2');
INSERT INTO `migrations` VALUES ('4', '2019_02_15_045507_add_is_admin_to_users_table', '1');
INSERT INTO `migrations` VALUES ('19', '2016_01_04_173148_create_admin_tables', '2');
INSERT INTO `migrations` VALUES ('20', '2019_02_15_045507_new_users_table', '2');
INSERT INTO `migrations` VALUES ('21', '2019_04_02_201728_create_categories_table', '2');
INSERT INTO `migrations` VALUES ('22', '2019_04_02_202349_seed_categories_data', '2');
INSERT INTO `migrations` VALUES ('23', '2019_04_03_204149_create_topics_table', '2');
INSERT INTO `migrations` VALUES ('24', '2019_04_16_200751_create_notifications_table', '3');
INSERT INTO `migrations` VALUES ('25', '2019_04_16_201037_add_notification_count_to_users_table', '4');
INSERT INTO `migrations` VALUES ('26', '2019_04_16_202005_add_notification_count_to_users_table', '5');
INSERT INTO `migrations` VALUES ('27', '2019_04_16_215708_create_replies_table', '5');

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(36) NOT NULL AUTO_INCREMENT,
  `sender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achiever` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`achiever`,`datetime`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES ('18', '1', '1', '2019-04-24', '12345', '报销申请', '2019-04-24 22:47:20', '2019-04-24 22:47:20');
INSERT INTO `notifications` VALUES ('19', '1', '1', '2019-04-24', '23425', '请假申请', '2019-04-24 23:12:35', '2019-04-24 23:12:35');
INSERT INTO `notifications` VALUES ('20', '1', '1', '2019-04-24', '345345', '请假申请', '2019-04-24 23:13:28', '2019-04-24 23:13:28');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for replies
-- ----------------------------
DROP TABLE IF EXISTS `replies`;
CREATE TABLE `replies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `antopic_id` int(255) DEFAULT NULL,
  `kind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `replies_topic_id_index` (`kind`(250)),
  KEY `replies_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of replies
-- ----------------------------
INSERT INTO `replies` VALUES ('1', null, '0', '6', '12432423', '2019-04-17 20:41:35', '2019-04-17 20:41:35');
INSERT INTO `replies` VALUES ('2', null, '0', '6', '12432423', '2019-04-17 20:42:24', '2019-04-17 20:42:24');
INSERT INTO `replies` VALUES ('3', null, '0', '6', '12432423', '2019-04-17 20:45:23', '2019-04-17 20:45:23');
INSERT INTO `replies` VALUES ('4', null, '0', '6', '123456', '2019-04-17 20:58:58', '2019-04-17 20:58:58');
INSERT INTO `replies` VALUES ('5', null, '0', '6', '123456', '2019-04-17 21:10:35', '2019-04-17 21:10:35');
INSERT INTO `replies` VALUES ('6', null, '0', '6', '123456', '2019-04-17 21:11:09', '2019-04-17 21:11:09');
INSERT INTO `replies` VALUES ('7', null, '0', '6', '123456', '2019-04-17 21:15:14', '2019-04-17 21:15:14');
INSERT INTO `replies` VALUES ('8', null, '0', '6', '123456', '2019-04-17 21:20:34', '2019-04-17 21:20:34');
INSERT INTO `replies` VALUES ('9', null, '0', '6', '123456', '2019-04-17 21:21:10', '2019-04-17 21:21:10');
INSERT INTO `replies` VALUES ('10', null, '0', '6', '123456', '2019-04-17 21:24:21', '2019-04-17 21:24:21');
INSERT INTO `replies` VALUES ('11', null, '0', '6', '123456', '2019-04-17 21:24:30', '2019-04-17 21:24:30');
INSERT INTO `replies` VALUES ('12', null, '0', '6', '123456', '2019-04-17 21:24:58', '2019-04-17 21:24:58');
INSERT INTO `replies` VALUES ('13', null, '0', '6', '123456', '2019-04-17 21:27:36', '2019-04-17 21:27:36');
INSERT INTO `replies` VALUES ('14', null, '0', '6', '123456', '2019-04-17 21:28:49', '2019-04-17 21:28:49');
INSERT INTO `replies` VALUES ('15', null, '0', '6', '123456', '2019-04-17 21:29:00', '2019-04-17 21:29:00');
INSERT INTO `replies` VALUES ('16', null, '0', '6', '123456', '2019-04-17 21:33:49', '2019-04-17 21:33:49');
INSERT INTO `replies` VALUES ('17', null, '0', '6', '123456', '2019-04-17 21:35:02', '2019-04-17 21:35:02');
INSERT INTO `replies` VALUES ('18', null, '0', '6', '123456', '2019-04-17 21:36:57', '2019-04-17 21:36:57');
INSERT INTO `replies` VALUES ('19', null, '0', '6', '123456', '2019-04-17 21:37:15', '2019-04-17 21:37:15');
INSERT INTO `replies` VALUES ('20', null, '0', '6', '123456', '2019-04-17 21:37:42', '2019-04-17 21:37:42');
INSERT INTO `replies` VALUES ('21', null, '0', '6', '123456', '2019-04-17 21:38:21', '2019-04-17 21:38:21');
INSERT INTO `replies` VALUES ('22', null, '0', '6', '123456', '2019-04-17 21:38:56', '2019-04-17 21:38:56');
INSERT INTO `replies` VALUES ('23', null, '0', '6', '123456', '2019-04-17 21:39:17', '2019-04-17 21:39:17');
INSERT INTO `replies` VALUES ('24', null, '0', '6', '123456', '2019-04-17 21:42:22', '2019-04-17 21:42:22');
INSERT INTO `replies` VALUES ('25', null, '0', '6', '12345', '2019-04-17 21:43:27', '2019-04-17 21:43:27');
INSERT INTO `replies` VALUES ('26', null, '0', '1', '123456', '2019-04-18 20:57:53', '2019-04-18 20:57:53');
INSERT INTO `replies` VALUES ('27', null, '0', '1', '12345', '2019-04-21 12:52:37', '2019-04-21 12:52:37');
INSERT INTO `replies` VALUES ('28', null, '0', '1', '12345', '2019-04-21 12:52:49', '2019-04-21 12:52:49');
INSERT INTO `replies` VALUES ('29', null, '0', '1', '12345', '2019-04-21 12:53:19', '2019-04-21 12:53:19');
INSERT INTO `replies` VALUES ('30', null, '0', '1', '12345', '2019-04-21 12:53:34', '2019-04-21 12:53:34');
INSERT INTO `replies` VALUES ('31', null, '0', '1', '12345', '2019-04-21 12:54:07', '2019-04-21 12:54:07');
INSERT INTO `replies` VALUES ('32', null, '0', '1', '12345', '2019-04-21 12:54:48', '2019-04-21 12:54:48');
INSERT INTO `replies` VALUES ('33', null, '0', '1', '12345', '2019-04-21 12:57:38', '2019-04-21 12:57:38');
INSERT INTO `replies` VALUES ('34', null, '0', '1', '12345', '2019-04-21 12:58:33', '2019-04-21 12:58:33');
INSERT INTO `replies` VALUES ('35', null, '0', '1', '12345', '2019-04-21 12:58:58', '2019-04-21 12:58:58');
INSERT INTO `replies` VALUES ('36', null, '0', '1', '12345', '2019-04-21 13:01:36', '2019-04-21 13:01:36');
INSERT INTO `replies` VALUES ('37', null, '0', '1', '12345', '2019-04-21 13:01:47', '2019-04-21 13:01:47');
INSERT INTO `replies` VALUES ('38', null, '0', '1', '12345', '2019-04-21 13:04:19', '2019-04-21 13:04:19');
INSERT INTO `replies` VALUES ('39', null, '0', '1', '12345', '2019-04-21 13:05:00', '2019-04-21 13:05:00');
INSERT INTO `replies` VALUES ('40', null, '0', '1', '12345', '2019-04-21 13:05:25', '2019-04-21 13:05:25');
INSERT INTO `replies` VALUES ('41', null, '0', '1', '12345', '2019-04-21 13:11:47', '2019-04-21 13:11:47');
INSERT INTO `replies` VALUES ('42', null, '0', '1', '12345', '2019-04-21 13:12:01', '2019-04-21 13:12:01');
INSERT INTO `replies` VALUES ('43', null, '0', '1', '12345', '2019-04-21 13:12:39', '2019-04-21 13:12:39');
INSERT INTO `replies` VALUES ('44', null, '0', '1', '12345', '2019-04-21 13:13:38', '2019-04-21 13:13:38');
INSERT INTO `replies` VALUES ('45', null, '0', '1', '12345', '2019-04-22 23:16:20', '2019-04-22 23:16:20');
INSERT INTO `replies` VALUES ('46', null, '0', '1', '12345', '2019-04-22 23:17:25', '2019-04-22 23:17:25');
INSERT INTO `replies` VALUES ('47', null, '0', '1', '12345', '2019-04-22 23:18:22', '2019-04-22 23:18:22');
INSERT INTO `replies` VALUES ('48', null, '0', '1', '12345', '2019-04-22 23:21:44', '2019-04-22 23:21:44');
INSERT INTO `replies` VALUES ('49', null, '0', '1', '12345', '2019-04-22 23:22:42', '2019-04-22 23:22:42');
INSERT INTO `replies` VALUES ('50', null, '0', '1', '12345', '2019-04-22 23:23:00', '2019-04-22 23:23:00');
INSERT INTO `replies` VALUES ('51', null, '0', '1', '12345', '2019-04-22 23:24:25', '2019-04-22 23:24:25');
INSERT INTO `replies` VALUES ('52', null, '0', '1', '12345', '2019-04-22 23:25:22', '2019-04-22 23:25:22');
INSERT INTO `replies` VALUES ('53', null, '0', '1', '12345', '2019-04-22 23:26:16', '2019-04-22 23:26:16');
INSERT INTO `replies` VALUES ('54', null, '0', '1', '12345', '2019-04-22 23:26:43', '2019-04-22 23:26:43');
INSERT INTO `replies` VALUES ('55', null, '0', '1', '12345', '2019-04-22 23:27:02', '2019-04-22 23:27:02');
INSERT INTO `replies` VALUES ('56', null, '0', '1', '324', '2019-04-22 23:28:48', '2019-04-22 23:28:48');
INSERT INTO `replies` VALUES ('57', null, '0', '1', '324', '2019-04-22 23:30:29', '2019-04-22 23:30:29');
INSERT INTO `replies` VALUES ('58', null, '0', '1', '324', '2019-04-22 23:30:46', '2019-04-22 23:30:46');
INSERT INTO `replies` VALUES ('59', null, '0', '1', '324', '2019-04-22 23:30:58', '2019-04-22 23:30:58');
INSERT INTO `replies` VALUES ('60', null, '0', '1', '324', '2019-04-22 23:31:08', '2019-04-22 23:31:08');
INSERT INTO `replies` VALUES ('61', null, '0', '1', '324', '2019-04-22 23:31:18', '2019-04-22 23:31:18');
INSERT INTO `replies` VALUES ('62', null, '0', '1', '324', '2019-04-22 23:31:33', '2019-04-22 23:31:33');
INSERT INTO `replies` VALUES ('63', null, '0', '1', '324', '2019-04-22 23:32:52', '2019-04-22 23:32:52');
INSERT INTO `replies` VALUES ('64', null, '0', '12', '1234', '2019-04-22 23:34:38', '2019-04-22 23:34:38');
INSERT INTO `replies` VALUES ('65', null, '0', '12', '1234', '2019-04-22 23:34:50', '2019-04-22 23:34:50');
INSERT INTO `replies` VALUES ('66', null, '0', '12', '1234', '2019-04-22 23:35:52', '2019-04-22 23:35:52');
INSERT INTO `replies` VALUES ('67', null, '0', '1', '32425', '2019-04-22 23:36:21', '2019-04-22 23:36:21');
INSERT INTO `replies` VALUES ('68', null, '0', '1', '12345', '2019-04-24 22:47:20', '2019-04-24 22:47:20');
INSERT INTO `replies` VALUES ('69', null, '0', '1', '23425', '2019-04-24 23:12:35', '2019-04-24 23:12:35');
INSERT INTO `replies` VALUES ('70', null, '0', '1', '345345', '2019-04-24 23:13:28', '2019-04-24 23:13:28');

-- ----------------------------
-- Table structure for thingkinds
-- ----------------------------
DROP TABLE IF EXISTS `thingkinds`;
CREATE TABLE `thingkinds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名称',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT '描述',
  `view_count` int(11) NOT NULL DEFAULT '0' COMMENT '查看量',
  PRIMARY KEY (`id`),
  KEY `categories_name_index` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of thingkinds
-- ----------------------------
INSERT INTO `thingkinds` VALUES ('1', '报销申请', '申请报销消息', '0');
INSERT INTO `thingkinds` VALUES ('2', '请假申请', '申请请假消息', '0');
INSERT INTO `thingkinds` VALUES ('3', '物资申请', '申请物资消息', '0');

-- ----------------------------
-- Table structure for topics
-- ----------------------------
DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `view_count` int(10) unsigned NOT NULL DEFAULT '0',
  `order` int(10) unsigned NOT NULL DEFAULT '0',
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topics_title_index` (`title`),
  KEY `topics_user_id_index` (`user_id`),
  KEY `topics_category_id_index` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of topics
-- ----------------------------
INSERT INTO `topics` VALUES ('1', 'Temporibus omnis non ut non sapiente iusto corporis.', 'Vero et dolorum ea tempore voluptate. Sunt nostrum laboriosam ratione. Non repellendus fugit facilis et iste saepe et. At a ea repudiandae temporibus accusantium possimus eos.', '1', '4', '0', '0', 'Temporibus omnis non ut non sapiente iusto corporis.', null, '2019-03-07 05:36:56', '2019-03-07 17:24:25');
INSERT INTO `topics` VALUES ('2', 'Fugiat deserunt vel fugiat animi consequatur.', 'Explicabo doloremque ipsum repellendus culpa voluptatem quo explicabo. Dolores corporis sunt animi consequatur ullam nesciunt. Sit numquam maxime fugit quis sit.', '2', '1', '0', '0', 'Fugiat deserunt vel fugiat animi consequatur.', null, '2019-03-20 02:52:28', '2019-04-02 06:02:59');
INSERT INTO `topics` VALUES ('3', 'Est itaque velit aut vero quaerat in.', 'Porro ut maxime nisi deleniti. Labore ullam cum nam similique itaque aut quas quis. Et asperiores blanditiis dolor adipisci nisi. Enim error est nostrum neque.', '3', '2', '0', '0', 'Est itaque velit aut vero quaerat in.', null, '2019-03-20 09:38:31', '2019-04-01 06:46:28');
INSERT INTO `topics` VALUES ('4', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', 'Itaque quasi aut et reprehenderit. Dolorum excepturi velit quia ut labore.', '4', '3', '0', '0', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', null, '2019-03-12 08:31:56', '2019-03-14 03:06:13');
INSERT INTO `topics` VALUES ('5', 'Maiores sed quia omnis ab officiis.', 'At et in quia voluptates sed. Quae maiores ipsum eligendi delectus. Veritatis laborum quae sunt dignissimos facere cupiditate odio dolor.', '5', '3', '0', '0', 'Maiores sed quia omnis ab officiis.', null, '2019-03-17 19:13:56', '2019-03-23 10:50:50');
INSERT INTO `topics` VALUES ('6', 'Rerum blanditiis corporis dicta dolorem autem.', 'Enim sapiente autem quibusdam est esse commodi dolorem facilis. Similique accusamus numquam accusantium possimus iure rerum. Aut beatae sit molestias odit aut enim.', '6', '1', '0', '0', 'Rerum blanditiis corporis dicta dolorem autem.', null, '2019-03-06 01:18:44', '2019-03-09 08:17:02');

-- ----------------------------
-- Table structure for uploads
-- ----------------------------
DROP TABLE IF EXISTS `uploads`;
CREATE TABLE `uploads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `content` text,
  `route` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uploads
-- ----------------------------
INSERT INTO `uploads` VALUES ('1', 'Tester', null, null, null, null, '2019-04-10 21:39:49', '2019-04-10 21:39:49');
INSERT INTO `uploads` VALUES ('2', 'Tester', null, null, null, null, '2019-04-10 21:39:52', '2019-04-10 21:39:52');
INSERT INTO `uploads` VALUES ('3', 'Tester', '1', null, null, null, '2019-04-10 21:43:19', '2019-04-10 21:43:19');
INSERT INTO `uploads` VALUES ('4', 'Tester', '1', null, null, '2019-04-10 00:00:00', '2019-04-10 21:45:00', '2019-04-10 21:45:00');
INSERT INTO `uploads` VALUES ('5', 'Tester', '1', '12312', null, '2019-04-10 00:00:00', '2019-04-10 21:48:47', '2019-04-10 21:48:47');
INSERT INTO `uploads` VALUES ('6', '111', '6', '123456', null, '2019-04-14 00:00:00', '2019-04-14 19:09:38', '2019-04-14 19:09:38');
INSERT INTO `uploads` VALUES ('7', '111', '6', '123456', null, '2019-04-14 00:00:00', '2019-04-14 19:09:43', '2019-04-14 19:09:43');
INSERT INTO `uploads` VALUES ('8', '111', '6', '21323', '2019-04-14/2019-04-14-07-22-46.txt', '2019-04-14 00:00:00', '2019-04-14 19:22:46', '2019-04-14 19:22:46');
INSERT INTO `uploads` VALUES ('9', '111', '6', '21323', 'upload/2019-04-14/2019-04-14-07-23-29.txt', '2019-04-14 00:00:00', '2019-04-14 19:23:29', '2019-04-14 19:23:29');
INSERT INTO `uploads` VALUES ('10', '111', '6', '123', 'upload/2019-04-16/2019-04-16-10-26-15.txt', '2019-04-16 00:00:00', '2019-04-16 22:26:15', '2019-04-16 22:26:15');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `notification_count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '376300797@qq.com', '376300797@qq.com', '2019-04-04 20:25:11', '$2y$10$/45V8qniHDbOF/xvP6sqQev1ByNyr3cCOh2AIDV2GYSPIjdbmXGdG', 'eNSUZ4QEIikQeEO0GH5rQoKYaDaxNH2WbdFZT9ebSMO5LB5xGOmWvPaTBCtB', '2007-11-06 04:05:31', '2019-04-24 23:13:28', '1', 'Human Resources Director', 'Human Resources', '18015413296', '6');
INSERT INTO `users` VALUES ('2', '111', '111111111@qq.com', '0000-00-00 00:00:00', '132', '32', '0000-00-00 00:00:00', '2019-04-14 12:35:25', '0', '034', '3434', '3434', '0');
INSERT INTO `users` VALUES ('6', '111', '12345678@qq.com', null, '$2y$10$2YkexCJEuJGDKzEFKx.onOjNlSeSq6sJAg18bB9jvQ9WAtvCZmN/q', 'LA06PFZdFoTMRydyNlLavjumRD7BskFQjrGl3hcu5pIwzsKgbWklGOziOYO7', '2019-04-14 16:39:09', '2019-04-14 16:39:09', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('3', 'Mr. Kenny Dickinson Jr.', 'marie31@example.org', '2019-04-04 20:25:11', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ixfBHu70Gv', '2017-01-11 09:10:14', '2017-01-11 09:10:14', '0', 'officer', 'Quidem eveniet rerum suscipit hic praesentium aspernatur sunt.', 'omJgrxdSISVA', '0');
INSERT INTO `users` VALUES ('4', 'Roselyn Corkery', 'ojones@example.org', '2019-04-04 20:25:11', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'HS83PnoUDQ', '1990-03-13 00:25:30', '1990-03-13 00:25:30', '0', 'officer', 'Consequuntur quidem est velit nostrum qui magnam.', 'YMJIUgtaGhm6', '0');
INSERT INTO `users` VALUES ('5', 'Dr. Madilyn Gorczany', 'labadie.karina@example.org', '2019-04-04 20:25:11', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'oorABAVIRx', '1978-01-01 20:53:16', '1978-01-01 20:53:16', '0', 'officer', 'Consectetur sed expedita debitis est porro ducimus voluptatibus.', 'uTexYMl9QEFz', '0');
