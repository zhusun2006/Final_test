/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-04-27 16:28:58
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
  `reply_id` int(36) NOT NULL,
  `sender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achiever` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`achiever`,`datetime`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES ('33', '86', '1', '6', '这是报告123', '23423423423423423423', '请假申请', '2019-04-27', '2019-04-27 16:18:38', '2019-04-27 16:18:38');
INSERT INTO `notifications` VALUES ('32', '85', '6', '1', '1234', '000000000000000000000000000', '物资申请', '2019-04-27', '2019-04-27 15:36:52', '2019-04-27 15:36:52');
INSERT INTO `notifications` VALUES ('27', '80', '6', '1', '报告', '1234566', '请假申请', '2019-04-27', '2019-04-27 13:50:18', '2019-04-27 13:50:18');
INSERT INTO `notifications` VALUES ('28', '81', '6', '1', '1234', '5345', '请假申请', '2019-04-27', '2019-04-27 13:52:13', '2019-04-27 13:52:13');
INSERT INTO `notifications` VALUES ('29', '82', '6', '1', '234', '234234', '请假申请', '2019-04-27', '2019-04-27 13:53:52', '2019-04-27 13:53:52');
INSERT INTO `notifications` VALUES ('30', '83', '6', '1', '报告', '23423423', '请假申请', '2019-04-27', '2019-04-27 14:08:09', '2019-04-27 14:08:09');
INSERT INTO `notifications` VALUES ('31', '84', '6', '1', '这是报告123', '23423423423423423423', '请假申请', '2019-04-27', '2019-04-27 14:13:43', '2019-04-27 14:13:43');

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
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sender_id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_reply` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `replies_topic_id_index` (`kind`(250)),
  KEY `replies_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of replies
-- ----------------------------
INSERT INTO `replies` VALUES ('85', '1', '6', '1234', '物资申请', '000000000000000000000000000', '', '2019-04-27 15:36:52', '2019-04-27 15:36:52', null);
INSERT INTO `replies` VALUES ('80', '1', '0', '报告', '请假申请', '1234566', '', '2019-04-27 13:50:18', '2019-04-27 13:50:18', null);
INSERT INTO `replies` VALUES ('81', '1', '0', '1234', '请假申请', '5345', '', '2019-04-27 13:52:13', '2019-04-27 13:52:13', null);
INSERT INTO `replies` VALUES ('82', '1', '0', '234', '请假申请', '234234', '', '2019-04-27 13:53:52', '2019-04-27 13:53:52', null);
INSERT INTO `replies` VALUES ('83', '1', '0', '报告', '请假申请', '23423423', '', '2019-04-27 14:08:09', '2019-04-27 14:08:09', null);
INSERT INTO `replies` VALUES ('84', '1', '6', '这是报告123', '请假申请', '23423423423423423423', '', '2019-04-27 14:13:43', '2019-04-27 14:13:43', null);
INSERT INTO `replies` VALUES ('86', '6', '1', '这是报告123', '请假申请', '23423423423423423423', '', '2019-04-27 16:18:38', '2019-04-27 16:18:38', 'OK');

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
INSERT INTO `users` VALUES ('1', '376300797@qq.com', '376300797@qq.com', '2019-04-04 20:25:11', '$2y$10$/45V8qniHDbOF/xvP6sqQev1ByNyr3cCOh2AIDV2GYSPIjdbmXGdG', 'aXLdStDo22aDkZ4LZlrc3Thi24kslgsYm5QiMDDv17lVGu3QfnWACDRdQKOI', '2007-11-06 04:05:31', '2019-04-27 15:37:17', '1', 'Human Resources Director', 'Human Resources', '18015413296', '0');
INSERT INTO `users` VALUES ('2', '111111111@qq.com', '111111111@qq.com', '0000-00-00 00:00:00', '132', '32', '0000-00-00 00:00:00', '2019-04-14 12:35:25', '0', '034', 'this', '3434', '0');
INSERT INTO `users` VALUES ('6', '111', '12345678@qq.com', null, '$2y$10$2YkexCJEuJGDKzEFKx.onOjNlSeSq6sJAg18bB9jvQ9WAtvCZmN/q', '8uVJwq0oDu1Dwo1h6f3katx8X1B2dtaDMb4jKTav2UrgOg6oPxZ8XrtlWJrC', '2019-04-14 16:39:09', '2019-04-27 16:18:57', '0', '0', 'Human Resources', '0', '0');
INSERT INTO `users` VALUES ('3', 'Mr. Kenny Dickinson Jr.', 'marie31@example.org', '2019-04-04 20:25:11', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ixfBHu70Gv', '2017-01-11 09:10:14', '2017-01-11 09:10:14', '0', 'officer', 'Quidem eveniet rerum suscipit hic praesentium aspernatur sunt.', 'omJgrxdSISVA', '0');
INSERT INTO `users` VALUES ('4', 'Roselyn Corkery', 'ojones@example.org', '2019-04-04 20:25:11', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'HS83PnoUDQ', '1990-03-13 00:25:30', '1990-03-13 00:25:30', '0', 'officer', 'Consequuntur quidem est velit nostrum qui magnam.', 'YMJIUgtaGhm6', '0');
INSERT INTO `users` VALUES ('5', 'Dr. Madilyn Gorczany', 'labadie.karina@example.org', '2019-04-04 20:25:11', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'oorABAVIRx', '1978-01-01 20:53:16', '1978-01-01 20:53:16', '0', 'officer', 'Consectetur sed expedita debitis est porro ducimus voluptatibus.', 'uTexYMl9QEFz', '0');
