# Sequel Pro dump
# Version 2210
# http://code.google.com/p/sequel-pro
#
# Host: 127.0.0.1 (MySQL 5.1.44)
# Database: blog_teste
# Generation Time: 2010-09-28 17:33:55 -0300
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table blog_posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blog_posts`;

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image_highlighting` varchar(255) DEFAULT NULL,
  `image_highlighting_legend` varchar(255) DEFAULT NULL,
  `content` text,
  `visits` int(11) NOT NULL DEFAULT '0',
  `publish_date` datetime NOT NULL,
  `comments_count` int(11) DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table core_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_comments`;

CREATE TABLE `core_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `response_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `site` varchar(50) DEFAULT NULL,
  `content` text NOT NULL,
  `record_id` int(11) DEFAULT NULL,
  `record_type` varchar(255) DEFAULT NULL,
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `published_comment` (`published`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;



# Dump of table core_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_images`;

CREATE TABLE `core_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` varchar(255) DEFAULT NULL,
  `record_id` varchar(255) DEFAULT NULL,
  `record_type` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `clicks` int(11) DEFAULT NULL,
  `legend` varchar(255) DEFAULT NULL,
  `photographer` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table core_metadata
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_metadata`;

CREATE TABLE `core_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `module_alias` varchar(50) DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table core_module_records_tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_module_records_tags`;

CREATE TABLE `core_module_records_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(11) DEFAULT NULL,
  `record_type` varchar(255) DEFAULT NULL,
  `core_tag_id` int(11) NOT NULL,
  `tag_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_record_tag` (`core_tag_id`,`record_id`,`record_type`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;



# Dump of table core_modules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_modules`;

CREATE TABLE `core_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



# Dump of table core_records_metadata
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_records_metadata`;

CREATE TABLE `core_records_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(11) DEFAULT NULL,
  `record_type` varchar(50) DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table core_select_options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_select_options`;

CREATE TABLE `core_select_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `core_select_type_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table core_select_options_records
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_select_options_records`;

CREATE TABLE `core_select_options_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(11) NOT NULL,
  `record_type` varchar(50) NOT NULL,
  `core_select_option_id` int(11) NOT NULL,
  `select_type_name` varchar(50) NOT NULL,
  `select_type_alias` varchar(50) NOT NULL,
  `select_option_name` varchar(50) NOT NULL,
  `select_option_alias` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table core_select_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_select_types`;

CREATE TABLE `core_select_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `core_module_alias` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table core_tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_tags`;

CREATE TABLE `core_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;



# Dump of table core_trashes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_trashes`;

CREATE TABLE `core_trashes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `core_user_id` int(11) DEFAULT NULL,
  `junk_id` int(11) DEFAULT NULL,
  `junk_type` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table core_user_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_user_groups`;

CREATE TABLE `core_user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table core_user_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_user_permissions`;

CREATE TABLE `core_user_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `core_user_id` int(11) DEFAULT NULL,
  `core_system_action` varchar(255) DEFAULT NULL,
  `core_module_alias` varchar(255) DEFAULT NULL,
  `complement` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;



# Dump of table core_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `core_users`;

CREATE TABLE `core_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `last_access` datetime DEFAULT NULL,
  `core_user_group_id` int(11) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
