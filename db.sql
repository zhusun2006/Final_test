/*
Navicat MySQL Data Transfer

Source Server         : localhost3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-04-15 23:21:10
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
INSERT INTO `topics` VALUES ('1', 'Temporibus omnis non ut non sapiente iusto corporis.', 'Vero et dolorum ea tempore voluptate. Sunt nostrum laboriosam ratione. Non repellendus fugit facilis et iste saepe et. At a ea repudiandae temporibus accusantium possimus eos.', '5', '4', '0', '0', 'Temporibus omnis non ut non sapiente iusto corporis.', null, '2019-03-07 05:36:56', '2019-03-07 17:24:25');
INSERT INTO `topics` VALUES ('2', 'Fugiat deserunt vel fugiat animi consequatur.', 'Explicabo doloremque ipsum repellendus culpa voluptatem quo explicabo. Dolores corporis sunt animi consequatur ullam nesciunt. Sit numquam maxime fugit quis sit.', '3', '1', '0', '0', 'Fugiat deserunt vel fugiat animi consequatur.', null, '2019-03-20 02:52:28', '2019-04-02 06:02:59');
INSERT INTO `topics` VALUES ('3', 'Est itaque velit aut vero quaerat in.', 'Porro ut maxime nisi deleniti. Labore ullam cum nam similique itaque aut quas quis. Et asperiores blanditiis dolor adipisci nisi. Enim error est nostrum neque.', '5', '2', '0', '0', 'Est itaque velit aut vero quaerat in.', null, '2019-03-20 09:38:31', '2019-04-01 06:46:28');
INSERT INTO `topics` VALUES ('4', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', 'Itaque quasi aut et reprehenderit. Dolorum excepturi velit quia ut labore.', '3', '3', '0', '0', 'Quas maiores nisi voluptas sed ipsum enim quisquam.', null, '2019-03-12 08:31:56', '2019-03-14 03:06:13');
INSERT INTO `topics` VALUES ('5', 'Maiores sed quia omnis ab officiis.', 'At et in quia voluptates sed. Quae maiores ipsum eligendi delectus. Veritatis laborum quae sunt dignissimos facere cupiditate odio dolor.', '2', '3', '0', '0', 'Maiores sed quia omnis ab officiis.', null, '2019-03-17 19:13:56', '2019-03-23 10:50:50');
INSERT INTO `topics` VALUES ('6', 'Rerum blanditiis corporis dicta dolorem autem.', 'Enim sapiente autem quibusdam est esse commodi dolorem facilis. Similique accusamus numquam accusantium possimus iure rerum. Aut beatae sit molestias odit aut enim.', '2', '1', '0', '0', 'Rerum blanditiis corporis dicta dolorem autem.', null, '2019-03-06 01:18:44', '2019-03-09 08:17:02');
INSERT INTO `topics` VALUES ('7', 'Quia nesciunt laboriosam facere sit.', 'Iusto impedit aliquid eos omnis voluptatum repellendus eligendi. At in totam provident. Quaerat nesciunt necessitatibus et laboriosam.', '1', '2', '0', '0', 'Quia nesciunt laboriosam facere sit.', null, '2019-03-25 21:02:03', '2019-03-29 02:48:57');
INSERT INTO `topics` VALUES ('8', 'Sed rerum ab alias cum cupiditate.', 'Tempora deserunt qui magnam aut est quia quia. Animi odit ut maiores eum.', '2', '4', '0', '0', 'Sed rerum ab alias cum cupiditate.', null, '2019-03-08 04:16:06', '2019-04-02 08:51:35');
INSERT INTO `topics` VALUES ('9', 'Dignissimos cum quia optio est amet eum.', 'Optio omnis alias consequatur ex molestias sit facilis. Optio tempore nostrum aut soluta. Earum quia quaerat quasi necessitatibus.', '4', '2', '0', '0', 'Dignissimos cum quia optio est amet eum.', null, '2019-03-10 20:13:04', '2019-03-14 15:43:41');
INSERT INTO `topics` VALUES ('10', 'Atque doloribus est dolorem cumque dolor.', 'Est ex sit repellat voluptatum facilis dolorum harum. Perferendis nihil molestiae explicabo consectetur rerum. Ut quam voluptates vero aliquid quis quia. Ratione aut sed temporibus consequatur.', '4', '3', '0', '0', 'Atque doloribus est dolorem cumque dolor.', null, '2019-03-08 09:52:39', '2019-03-18 12:15:17');
INSERT INTO `topics` VALUES ('11', 'Sit tempora ut velit sapiente in nihil.', 'Culpa deleniti quae qui et aut. Consequatur culpa repellendus sunt repellendus. Sed a voluptatem aut aut reprehenderit est cupiditate.', '2', '4', '0', '0', 'Sit tempora ut velit sapiente in nihil.', null, '2019-03-07 12:22:18', '2019-03-29 08:10:58');
INSERT INTO `topics` VALUES ('12', 'Ex odio at rem minus omnis animi.', 'Necessitatibus architecto hic velit recusandae laboriosam non. Ut suscipit aliquid sint hic. Hic perferendis est quod qui aut ex cum. Et voluptas est sit deserunt eius.', '2', '2', '0', '0', 'Ex odio at rem minus omnis animi.', null, '2019-03-06 05:41:37', '2019-03-11 09:51:40');
INSERT INTO `topics` VALUES ('13', 'Totam ad vitae qui dicta dolor nostrum nostrum mollitia.', 'Eaque inventore est doloribus sed perspiciatis et est aut. Repellat alias nam veritatis. Veritatis vel facere minus voluptas aliquid quo. Et voluptatem nemo ut quo ut.', '3', '1', '0', '0', 'Totam ad vitae qui dicta dolor nostrum nostrum mollitia.', null, '2019-03-18 04:25:26', '2019-03-30 00:54:28');
INSERT INTO `topics` VALUES ('14', 'Voluptatem itaque animi assumenda et.', 'Perferendis eaque consequatur placeat ut et voluptates error neque. Cumque vel repellat et maiores veniam.', '3', '1', '0', '0', 'Voluptatem itaque animi assumenda et.', null, '2019-03-07 12:08:30', '2019-03-30 06:45:55');
INSERT INTO `topics` VALUES ('15', 'Est id et non voluptate.', 'Ut officiis laborum minima sunt. Magni libero nulla eos totam numquam non id. Quo facere quas quis. Et molestiae sed placeat est. Autem dolor repudiandae in sequi quae nihil.', '3', '4', '0', '0', 'Est id et non voluptate.', null, '2019-03-05 02:58:03', '2019-03-05 03:01:30');
INSERT INTO `topics` VALUES ('16', 'Sint laudantium accusamus sint nihil qui non qui.', 'Ipsam aut reprehenderit voluptatum ut modi. Id quo at provident blanditiis.', '1', '4', '0', '0', 'Sint laudantium accusamus sint nihil qui non qui.', null, '2019-03-21 16:37:39', '2019-03-23 13:51:36');
INSERT INTO `topics` VALUES ('17', 'Numquam at temporibus quia rem et omnis.', 'Aut provident et quia in numquam culpa. Dolorem id sed quam cupiditate. Incidunt itaque sequi enim et harum nostrum. Ut quod sit ipsam deserunt eveniet sed.', '2', '2', '0', '0', 'Numquam at temporibus quia rem et omnis.', null, '2019-03-05 18:55:28', '2019-03-21 08:12:13');
INSERT INTO `topics` VALUES ('18', 'Aut ea animi est qui.', 'Vero labore quis voluptates et et. Sapiente voluptate sit ut. Alias vitae autem quia aut aliquid saepe et. Provident recusandae quis illum recusandae.', '2', '1', '0', '0', 'Aut ea animi est qui.', null, '2019-03-05 03:09:11', '2019-03-21 07:00:49');
INSERT INTO `topics` VALUES ('19', 'Blanditiis aut est sit similique.', 'Cumque recusandae voluptate incidunt repudiandae nemo tempora voluptatem. Nobis ex omnis nobis nam. Voluptates ut et adipisci ut dolore.', '3', '3', '0', '0', 'Blanditiis aut est sit similique.', null, '2019-03-07 12:05:03', '2019-03-24 22:10:17');
INSERT INTO `topics` VALUES ('20', 'Mollitia eos enim dolores accusamus.', 'Quaerat veritatis quidem minus recusandae rerum. Qui distinctio qui rem id incidunt recusandae. Et provident sequi tempora in saepe ut incidunt. Nam rem in pariatur iure vel assumenda qui.', '4', '2', '0', '0', 'Mollitia eos enim dolores accusamus.', null, '2019-03-10 04:06:27', '2019-03-26 18:44:44');
INSERT INTO `topics` VALUES ('21', 'Rerum nostrum occaecati veritatis.', 'Earum et quis dolore eos in. Quasi tempore incidunt id dolorem atque aut. Culpa repellendus quo aut ut.', '3', '2', '0', '0', 'Rerum nostrum occaecati veritatis.', null, '2019-03-15 02:58:20', '2019-03-21 13:45:51');
INSERT INTO `topics` VALUES ('22', 'Aut laboriosam corporis amet.', 'Quidem quis provident et assumenda et dolorum. Maxime aut sit accusantium repellendus dolor eaque nemo voluptas. Id ut aut rerum dolorem quisquam numquam necessitatibus laborum.', '5', '3', '0', '0', 'Aut laboriosam corporis amet.', null, '2019-03-08 09:31:53', '2019-03-09 14:43:29');
INSERT INTO `topics` VALUES ('23', 'Enim aspernatur est quia.', 'Sit qui expedita accusamus deleniti. Iusto eaque nobis quas maxime quis est. Corporis non eos atque reiciendis labore culpa similique. Assumenda itaque sed et non.', '3', '1', '0', '0', 'Enim aspernatur est quia.', null, '2019-03-06 10:47:32', '2019-03-07 22:22:34');
INSERT INTO `topics` VALUES ('24', 'Facilis minus ratione numquam dolorem quas cumque aut.', 'Quidem in aut provident eaque eum architecto. Accusamus perspiciatis fuga cumque nulla perspiciatis nulla in. Est laboriosam in nostrum dolorem rerum quia omnis.', '2', '3', '0', '0', 'Facilis minus ratione numquam dolorem quas cumque aut.', null, '2019-03-06 09:15:37', '2019-03-06 12:45:23');
INSERT INTO `topics` VALUES ('25', 'Nulla et eos aut voluptatem voluptas ab.', 'Quisquam itaque animi temporibus alias quia omnis. Accusamus aut et quasi architecto quia at ducimus. Iure dolorum sunt quasi. Facere alias ut quod accusantium a magni.', '1', '2', '0', '0', 'Nulla et eos aut voluptatem voluptas ab.', null, '2019-03-23 17:55:04', '2019-03-28 10:58:38');
INSERT INTO `topics` VALUES ('26', '23', '4234', '1', '2', '0', '0', '4234', null, '2019-04-14 17:25:05', '2019-04-14 17:25:05');
INSERT INTO `topics` VALUES ('27', '156332', '123456', '1', '3', '0', '0', '123456', null, '2019-04-14 19:08:03', '2019-04-14 19:08:03');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '376300797@qq.com', '376300797@qq.com', '2019-04-04 20:25:11', '$2y$10$/45V8qniHDbOF/xvP6sqQev1ByNyr3cCOh2AIDV2GYSPIjdbmXGdG', 'eNSUZ4QEIikQeEO0GH5rQoKYaDaxNH2WbdFZT9ebSMO5LB5xGOmWvPaTBCtB', '2007-11-06 04:05:31', '2019-04-14 19:06:14', '1', 'Human Resources Director', 'Human Resources', '18015413296');
INSERT INTO `users` VALUES ('2', '111', '111111111@qq.com', '0000-00-00 00:00:00', '132', '32', '0000-00-00 00:00:00', '2019-04-14 12:35:25', '0', '034', '3434', '3434');
INSERT INTO `users` VALUES ('6', '111', '12345678@qq.com', null, '$2y$10$2YkexCJEuJGDKzEFKx.onOjNlSeSq6sJAg18bB9jvQ9WAtvCZmN/q', 'LA06PFZdFoTMRydyNlLavjumRD7BskFQjrGl3hcu5pIwzsKgbWklGOziOYO7', '2019-04-14 16:39:09', '2019-04-14 16:39:09', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('3', 'Mr. Kenny Dickinson Jr.', 'marie31@example.org', '2019-04-04 20:25:11', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ixfBHu70Gv', '2017-01-11 09:10:14', '2017-01-11 09:10:14', '0', 'officer', 'Quidem eveniet rerum suscipit hic praesentium aspernatur sunt.', 'omJgrxdSISVA');
INSERT INTO `users` VALUES ('4', 'Roselyn Corkery', 'ojones@example.org', '2019-04-04 20:25:11', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'HS83PnoUDQ', '1990-03-13 00:25:30', '1990-03-13 00:25:30', '0', 'officer', 'Consequuntur quidem est velit nostrum qui magnam.', 'YMJIUgtaGhm6');
INSERT INTO `users` VALUES ('5', 'Dr. Madilyn Gorczany', 'labadie.karina@example.org', '2019-04-04 20:25:11', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'oorABAVIRx', '1978-01-01 20:53:16', '1978-01-01 20:53:16', '0', 'officer', 'Consectetur sed expedita debitis est porro ducimus voluptatibus.', 'uTexYMl9QEFz');
