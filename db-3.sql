/*
Navicat MySQL Data Transfer

Source Server         : localhost3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-05-16 10:54:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', '1', '376300797@qq.com', 'Human Resources Director', 'Human Resources');
INSERT INTO `admins` VALUES ('2', '3', '111', 'Test', 'Test Term');
INSERT INTO `admins` VALUES ('3', '0', '222', 'Human Resources Test', 'Human Resources');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(36) NOT NULL AUTO_INCREMENT,
  `reply_id` int(36) NOT NULL,
  `sender` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achiever` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_reply` text COLLATE utf8mb4_unicode_ci,
  `datetime` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`achiever`,`datetime`),
  KEY `delete` (`sender`),
  CONSTRAINT `delete` FOREIGN KEY (`sender`) REFERENCES `users` (`name`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES ('44', '97', '376300797@qq.com', '2', '用例测试', '1234567890', '物资申请', '666', '2019-05-05', '2019-05-05 14:34:45', '2019-05-05 14:34:45');
INSERT INTO `notifications` VALUES ('45', '97', '376300797@qq.com', '2', '用例测试', '1234567890', '物资申请', '6456', '2019-05-05', '2019-05-05 14:41:52', '2019-05-05 14:41:52');
INSERT INTO `notifications` VALUES ('47', '98', '376300797@qq.com', '2', '用例测试1', '23423423', '请假申请', 'OKKKKKKKKKKKK', '2019-05-14', '2019-05-14 21:04:29', '2019-05-14 21:04:29');

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
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(50) unsigned NOT NULL DEFAULT '0',
  `sender_id` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_reply` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `replies_title_index` (`title`) USING BTREE,
  KEY `replies_topic_id_index` (`kind`),
  KEY `replies_user_id_index` (`user_id`),
  KEY `del` (`sender_id`),
  CONSTRAINT `del` FOREIGN KEY (`sender_id`) REFERENCES `users` (`name`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of replies
-- ----------------------------
INSERT INTO `replies` VALUES ('97', '1', '111111111@qq.com', '用例测试', '物资申请', '1234567890', null, null, '6456', '2019-05-05 14:34:19', '2019-05-05 14:41:52');
INSERT INTO `replies` VALUES ('98', '1', '111111111@qq.com', '用例测试1', '请假申请', '23423423', null, null, 'OKKKKKKKKKKKK', '2019-05-14 21:03:45', '2019-05-14 21:04:29');

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
  KEY `topics_category_id_index` (`category_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of topics
-- ----------------------------
INSERT INTO `topics` VALUES ('2', 'Fugiat deserunt vel fugiat animi consequatur.', 'Explicabo doloremque ipsum repellendus culpa voluptatem quo explicabo. Dolores corporis sunt animi consequatur ullam nesciunt. Sit numquam maxime fugit quis sit.', '2', '1', '0', '0', 'Fugiat deserunt vel fugiat animi consequatur.', '', '2019-03-20 02:52:28', '2019-04-02 06:02:59');
INSERT INTO `topics` VALUES ('4', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', 'Itaque quasi aut et reprehenderit. Dolorum excepturi velit quia ut labore.', '4', '3', '0', '0', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', '', '2019-03-12 08:31:56', '2019-03-14 03:06:13');
INSERT INTO `topics` VALUES ('5', 'Maiores sed quia omnis ab officiis.', 'At et in quia voluptates sed. Quae maiores ipsum eligendi delectus. Veritatis laborum quae sunt dignissimos facere cupiditate odio dolor.', '5', '3', '0', '0', 'Maiores sed quia omnis ab officiis.', '', '2019-03-17 19:13:56', '2019-03-23 10:50:50');
INSERT INTO `topics` VALUES ('6', 'Fugiat deserunt vel fugiat animi consequatur.', 'Explicabo doloremque ipsum repellendus culpa voluptatem quo explicabo. Dolores corporis sunt animi consequatur ullam nesciunt. Sit numquam maxime fugit quis sit.', '2', '1', '0', '0', 'Fugiat deserunt vel fugiat animi consequatur.', '', '2019-03-20 02:52:28', '2019-04-02 06:02:59');
INSERT INTO `topics` VALUES ('7', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', 'Itaque quasi aut et reprehenderit. Dolorum excepturi velit quia ut labore.', '4', '3', '0', '0', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', '', '2019-03-12 08:31:56', '2019-03-14 03:06:13');
INSERT INTO `topics` VALUES ('8', 'Maiores sed quia omnis ab officiis.', 'At et in quia voluptates sed. Quae maiores ipsum eligendi delectus. Veritatis laborum quae sunt dignissimos facere cupiditate odio dolor.', '5', '3', '0', '0', 'Maiores sed quia omnis ab officiis.', '', '2019-03-17 19:13:56', '2019-03-23 10:50:50');
INSERT INTO `topics` VALUES ('9', 'Fugiat deserunt vel fugiat animi consequatur.', 'Explicabo doloremque ipsum repellendus culpa voluptatem quo explicabo. Dolores corporis sunt animi consequatur ullam nesciunt. Sit numquam maxime fugit quis sit.', '2', '1', '0', '0', 'Fugiat deserunt vel fugiat animi consequatur.', '', '2019-03-20 02:52:28', '2019-04-02 06:02:59');
INSERT INTO `topics` VALUES ('11', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', 'Itaque quasi aut et reprehenderit. Dolorum excepturi velit quia ut labore.', '4', '3', '0', '0', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', '', '2019-03-12 08:31:56', '2019-03-14 03:06:13');
INSERT INTO `topics` VALUES ('12', 'Maiores sed quia omnis ab officiis.', 'At et in quia voluptates sed. Quae maiores ipsum eligendi delectus. Veritatis laborum quae sunt dignissimos facere cupiditate odio dolor.', '5', '3', '0', '0', 'Maiores sed quia omnis ab officiis.', '', '2019-03-17 19:13:56', '2019-03-23 10:50:50');
INSERT INTO `topics` VALUES ('13', 'Fugiat deserunt vel fugiat animi consequatur.', 'Explicabo doloremque ipsum repellendus culpa voluptatem quo explicabo. Dolores corporis sunt animi consequatur ullam nesciunt. Sit numquam maxime fugit quis sit.', '2', '1', '0', '0', 'Fugiat deserunt vel fugiat animi consequatur.', '', '2019-03-20 02:52:28', '2019-04-02 06:02:59');
INSERT INTO `topics` VALUES ('14', 'Fugiat deserunt vel fugiat animi consequatur.', 'Explicabo doloremque ipsum repellendus culpa voluptatem quo explicabo. Dolores corporis sunt animi consequatur ullam nesciunt. Sit numquam maxime fugit quis sit.', '2', '1', '0', '0', 'Fugiat deserunt vel fugiat animi consequatur.', '', '2019-03-20 02:52:28', '2019-04-02 06:02:59');
INSERT INTO `topics` VALUES ('15', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', 'Itaque quasi aut et reprehenderit. Dolorum excepturi velit quia ut labore.', '4', '3', '0', '0', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', '', '2019-03-12 08:31:56', '2019-03-14 03:06:13');
INSERT INTO `topics` VALUES ('16', 'Maiores sed quia omnis ab officiis.', 'At et in quia voluptates sed. Quae maiores ipsum eligendi delectus. Veritatis laborum quae sunt dignissimos facere cupiditate odio dolor.', '5', '3', '0', '0', 'Maiores sed quia omnis ab officiis.', '', '2019-03-17 19:13:56', '2019-03-23 10:50:50');
INSERT INTO `topics` VALUES ('17', 'Fugiat deserunt vel fugiat animi consequatur.', 'Explicabo doloremque ipsum repellendus culpa voluptatem quo explicabo. Dolores corporis sunt animi consequatur ullam nesciunt. Sit numquam maxime fugit quis sit.', '2', '1', '0', '0', 'Fugiat deserunt vel fugiat animi consequatur.', '', '2019-03-20 02:52:28', '2019-04-02 06:02:59');

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
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrangement` text COLLATE utf8mb4_unicode_ci,
  `remember_thing` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(5) NOT NULL DEFAULT '0',
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tel` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `notification_count` int(100) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_name_unique` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '376300797@qq.com', '376300797@qq.com', 'http://www.gravatar.com/avatar/$hash3s=$size', '$2y$10$/45V8qniHDbOF/xvP6sqQev1ByNyr3cCOh2AIDV2GYSPIjdbmXGdG', '2019.5.5  我设置了今天的安排：\r\n10.00 ：没什么事\r\n12.00：', '今天我要完成毕设', '1YQ3igbY62NkjOqqYLmM1IbkUI5okclKhsadzrMGOA236FZQ4e6pTHjsWuyV', '1', 'Human Resources Director', 'Human Resources', '18015413296', '0', '2019-03-27 15:37:17', '2019-05-14 21:04:20');
INSERT INTO `users` VALUES ('2', '111111111@qq.com', '111111111@qq.com', 'http://www.gravatar.com/avatar/$hash3s=$size', '$2y$10$2YkexCJEuJGDKzEFKx.onOjNlSeSq6sJAg18bB9jvQ9WAtvCZmN/q', '32', '', 'KFPB6dCsWXIYFdtpJiCfSUxrJebHfu2iOQoqCgAikKKUfGmEMQKmnwvAELkP', '0', 'Human Test', 'Human Resources', '12345678901', '1', '0000-00-00 00:00:00', '2019-05-14 21:06:47');
INSERT INTO `users` VALUES ('3', '111', '12345678@qq.com', 'http://www.gravatar.com/avatar/$hash3s=$size', '$2y$10$2YkexCJEuJGDKzEFKx.onOjNlSeSq6sJAg18bB9jvQ9WAtvCZmN/q', '8uVJwq0oDu1Dwo1h6f3katx8X1B2dtaDMb4jKTav2UrgOg6oPxZ8XrtlWJrC', '', '56nkB0rut2oSpZOuHObDCZelJY0pP4uWnQbtdiBr5mdlbaL6BqyHNw5qSZ7Y', '1', '0', 'Test Term', '0', '0', '2019-04-14 16:39:09', '2019-05-04 10:22:38');
INSERT INTO `users` VALUES ('4', 'Mr. Kenny Dickinson Jr.', 'marie31@example.org', 'http://www.gravatar.com/avatar/$hash3s=$size', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ixfBHu70Gv', '', '', '0', 'officer', 'Quidem eveniet rerum suscipit hic praesentium aspernatur sunt.', 'omJgrxdSISVA', '0', '2017-01-11 09:10:14', '2017-01-11 09:10:14');
INSERT INTO `users` VALUES ('5', 'Roselyn Corkery', 'ojones@example.org', 'http://www.gravatar.com/avatar/$hash3s=$size', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'HS83PnoUDQ', '', '', '0', 'officer', 'Consequuntur quidem est velit nostrum qui magnam.', 'YMJIUgtaGhm6', '0', '1990-03-13 00:25:30', '1990-03-13 00:25:30');
