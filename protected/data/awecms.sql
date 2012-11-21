-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2012 at 01:05 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `awecms`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(50) DEFAULT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `all` tinyint(1) NOT NULL DEFAULT '0',
  `loggedIn` tinyint(1) NOT NULL DEFAULT '0',
  `guest` tinyint(1) NOT NULL DEFAULT '0',
  `rule` enum('allow','deny') NOT NULL DEFAULT 'allow',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `access_nm_role`
--

CREATE TABLE IF NOT EXISTS `access_nm_role` (
  `access_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`access_id`,`role_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `thumbnail_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  KEY `thumbnail_id` (`thumbnail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `page_id`, `thumbnail_id`) VALUES
(1, 574, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `is_widget` tinyint(1) NOT NULL DEFAULT '0',
  `widget_class` varchar(100) NOT NULL DEFAULT 'CWidget',
  `tag_name` varchar(100) NOT NULL DEFAULT 'div',
  `html_options` text,
  `decoration_css_class` varchar(100) NOT NULL DEFAULT 'portlet-decoration',
  `title_css_class` varchar(100) NOT NULL DEFAULT 'portlet-title',
  `content_css_class` varchar(100) NOT NULL DEFAULT 'portlet-content',
  `hide_on_empty` tinyint(1) NOT NULL DEFAULT '1',
  `skin` varchar(100) NOT NULL DEFAULT 'default',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `title`, `content`, `enabled`, `is_widget`, `widget_class`, `tag_name`, `html_options`, `decoration_css_class`, `title_css_class`, `content_css_class`, `hide_on_empty`, `skin`) VALUES
(5, 'Introduction', '<p>\r\n	<em><strong>Hello there</strong></em><br></p>\r\n', 1, 1, 'CWidget', 'div', NULL, 'portlet-decoration', 'portlet-title', 'portlet-content', 0, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE IF NOT EXISTS `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` text,
  `image` text,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `page_id`, `phone`, `fax`, `email`, `website`, `address`, `image`, `latitude`, `longitude`) VALUES
(3, 573, '9851138343', '99876543', 'nepzilla.com@gmail.com', 'http://nepzilla.com', 'Bhaktpaur,\r\nNepal.', NULL, 27.714, 85.348);

-- --------------------------------------------------------

--
-- Table structure for table `business_category`
--

CREATE TABLE IF NOT EXISTS `business_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `business_category`
--

INSERT INTO `business_category` (`id`, `page_id`) VALUES
(18, 570);

-- --------------------------------------------------------

--
-- Table structure for table `business_nm_category`
--

CREATE TABLE IF NOT EXISTS `business_nm_category` (
  `business_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`business_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business_nm_category`
--

INSERT INTO `business_nm_category` (`business_id`, `category_id`) VALUES
(3, 18);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(5, 'New Category', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `count` int(11) NOT NULL,
  `parent_id` int(12) DEFAULT NULL,
  `creator_id` int(12) DEFAULT NULL,
  `user_name` varchar(128) DEFAULT NULL,
  `user_email` varchar(128) DEFAULT NULL,
  `comment_text` text,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `link` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment_setting`
--

CREATE TABLE IF NOT EXISTS `comment_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(50) NOT NULL,
  `registeredOnly` tinyint(1) NOT NULL DEFAULT '0',
  `useCaptcha` tinyint(1) NOT NULL DEFAULT '0',
  `allowSubcommenting` tinyint(1) NOT NULL DEFAULT '1',
  `premoderate` tinyint(1) NOT NULL DEFAULT '0',
  `isSuperuser` text,
  `orderComments` enum('ASC','DESC') NOT NULL DEFAULT 'ASC',
  `useGravatar` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comment_setting`
--

INSERT INTO `comment_setting` (`id`, `model`, `registeredOnly`, `useCaptcha`, `allowSubcommenting`, `premoderate`, `isSuperuser`, `orderComments`, `useGravatar`) VALUES
(1, 'default', 0, 1, 1, 1, 'Yii::app()->getModule("user")->isAdmin()', 'ASC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `venue` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `whole_day_event` tinyint(1) NOT NULL DEFAULT '0',
  `organizer` text,
  `type` varchar(255) DEFAULT NULL,
  `url` text,
  `page_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `venue`, `start`, `end`, `whole_day_event`, `organizer`, `type`, `url`, `page_id`, `enabled`) VALUES
(4, 'Address', '2012-11-12 00:00:00', '2012-11-24 00:00:00', 0, 'I am the organizer', 'The Type', 'http://google.com', 568, 1);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `album_id` int(11) DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `title`, `description`, `album_id`, `file`, `mime_type`, `size`, `name`) VALUES
(1, '1', NULL, 1, 'new/13523588511.png', 'image/png', '856670', '1.png'),
(2, '1', NULL, 1, 'new/13523603871.png', 'image/png', '856670', '1.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `vertical` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'makes menu vertical',
  `rtl` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'to make menu right to left vertical, just will be considered if ''vertical'' field set to true',
  `upward` tinyint(1) NOT NULL DEFAULT '0' COMMENT '// to make menu upward',
  `theme` varchar(100) NOT NULL DEFAULT 'default',
  `description` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `enabled`, `vertical`, `rtl`, `upward`, `theme`, `description`) VALUES
(1, 'Main', 1, 0, 0, 0, 'default', 'The main website mega menu.'),
(2, 'Admin', 1, 0, 0, 0, 'mtv', 'Menu for admin/backend dashboard.'),
(3, 'Left Menu', 1, 1, 0, 0, 'default', 'The Left Sidebar Menu');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `depth` int(11) NOT NULL DEFAULT '1',
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `target` varchar(10) DEFAULT NULL,
  `description` text,
  `link` text,
  `type` varchar(50) NOT NULL DEFAULT 'url',
  `role` varchar(255) DEFAULT 'all',
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `menu_id_2` (`menu_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `menu_id`, `parent_id`, `depth`, `lft`, `rgt`, `name`, `enabled`, `target`, `description`, `link`, `type`, `role`) VALUES
(34, 1, 0, 1, 2, 3, 'Home', 1, NULL, '', '/', 'url', 'all'),
(45, 2, 0, 1, 2, 15, 'Users', 1, NULL, 'User related stuffs', '/user', 'url', 'super'),
(46, 2, 45, 2, 5, 6, 'Manage Users', 1, NULL, '', '/user/manage', 'url', 'super'),
(47, 2, 45, 2, 7, 8, 'Create User', 1, NULL, NULL, '/user/admin/create', 'url', 'super'),
(48, 2, 45, 2, 9, 10, 'Manage Profile Fields', 1, NULL, NULL, '/user/profileField', 'url', 'super'),
(49, 2, 45, 2, 11, 12, 'Create Profile Field', 1, NULL, NULL, '/user/profileField/create', 'url', 'super'),
(50, 1, 0, 1, 8, 9, 'Login', 1, NULL, '', '/login', 'url', 'guest'),
(51, 1, 0, 1, 6, 7, 'Logout', 1, NULL, '', '/logout', 'url', 'loggedIn'),
(52, 2, 45, 2, 3, 4, 'List Users', 1, NULL, NULL, '/user', 'url', 'super'),
(53, 2, 0, 1, 28, 41, 'Design', 1, NULL, NULL, NULL, 'url', 'super'),
(54, 2, 53, 2, 29, 38, 'Menu', 1, NULL, NULL, '/menu', 'url', 'super'),
(55, 2, 54, 3, 32, 33, 'Manage Menus', 1, NULL, NULL, '/menu', 'url', 'super'),
(56, 2, 54, 3, 30, 31, 'Create New Menu', 1, NULL, NULL, '/menu/menu/create', 'url', 'super'),
(59, 2, 53, 2, 39, 40, 'Themes', 1, NULL, NULL, NULL, 'url', NULL),
(60, 2, 0, 1, 16, 27, 'Content', 1, NULL, NULL, NULL, 'url', 'super'),
(61, 2, 60, 2, 17, 18, 'Pages', 1, NULL, NULL, '/page', 'url', 'super'),
(62, 2, 60, 2, 23, 24, 'Comments', 1, NULL, NULL, '/comments', 'url', 'super'),
(63, 2, 45, 2, 13, 14, 'Roles', 1, NULL, NULL, '/role', 'url', 'super'),
(64, 2, 60, 2, 21, 22, 'Categories', 1, NULL, NULL, '/category', 'url', 'super'),
(66, 2, 54, 3, 34, 35, 'Edit Main Menu', 1, NULL, NULL, '/menu/item?id=1', 'url', 'super'),
(67, 2, 54, 3, 36, 37, 'Edit Admin Menu', 1, NULL, NULL, '/menu/item?id=3', 'url', 'super'),
(71, 1, 0, 1, 4, 5, 'Dashboard', 1, NULL, '', '/admin', 'module', 'super'),
(72, 2, 60, 2, 25, 26, 'Files', 1, NULL, NULL, '/file', 'url', 'super'),
(74, 2, 60, 2, 19, 20, 'Blocks', 1, NULL, '', '/block', 'module', 'all'),
(77, 3, 0, 1, 44, 45, 'E-mail', 1, NULL, 'Check you e-mail', 'http://webmail.hotc.org.np/', 'url', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `page_id`) VALUES
(2, 569);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `content` longtext,
  `status` enum('published','trashed','draft','closed') CHARACTER SET latin1 NOT NULL DEFAULT 'published',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `type` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'Page',
  `comment_status` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'enabled',
  `tags_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `permission` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'all',
  `password` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `layout` varchar(100) DEFAULT NULL,
  `slug_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `parent` (`parent_id`),
  KEY `slug` (`slug_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=578 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `user_id`, `title`, `content`, `status`, `created_at`, `modified_at`, `parent_id`, `order`, `type`, `comment_status`, `tags_enabled`, `permission`, `password`, `views`, `layout`, `slug_id`) VALUES
(568, 1, 'New Event', '<p>The Description <br></p>', 'published', '2012-11-05 23:56:24', '2012-11-17 12:55:23', NULL, 0, 'Event', 'open', 1, 'all', NULL, 51, NULL, NULL),
(569, 1, 'New news', '<p>&nbsp;fxcgvhjbnkml</p><p>ghjkl;''</p><p>ghjkl;''</p><p>ghjkl;''</p><p>ghjkl;''</p><p>hjkl;''</p><p><br></p>', 'published', '2012-11-06 00:36:42', '2012-11-06 01:55:55', NULL, 0, 'News', 'open', 1, 'all', NULL, 26, NULL, 12),
(570, 1, 'My New Category', 'hahaha\r\nThe description.', 'published', '2012-11-06 02:23:58', '2012-11-12 20:10:08', NULL, 0, 'BusinessCategory', 'open', 1, 'all', NULL, 10, NULL, 13),
(571, 1, 'New Business', '<p>&nbsp;Content goes</p><p>all</p><p>over</p><p>here!</p><p><br></p>', 'published', '2012-11-06 02:34:22', '2012-11-06 19:30:44', NULL, 0, 'Business', 'open', 1, 'all', NULL, 3, NULL, 14),
(572, 1, 'Apple', NULL, 'published', '2012-11-06 03:04:17', '2012-11-06 03:08:52', NULL, 0, 'Business', 'open', 1, 'all', NULL, 2, NULL, 15),
(573, 1, 'Nepzilla Solutions Pvt. Ltd.', '<p>&nbsp;Nepzilla Rules!<br></p>', 'published', '2012-11-07 01:15:32', '2012-11-12 20:07:52', NULL, 0, 'Business', 'open', 1, 'all', NULL, 37, NULL, 16),
(574, 1, 'New', 'description', 'published', '2012-11-07 02:27:59', '2012-11-12 20:07:24', NULL, 0, 'Album', 'open', 1, 'all', NULL, 9, NULL, 17),
(575, 1, 'page 1', NULL, 'published', '2012-11-10 02:07:38', '2012-11-12 20:12:56', NULL, 0, 'Page', 'open', 1, 'all', NULL, 4, NULL, 18),
(576, 1, 'oage two', '<p>&nbsp;2</p>', 'published', '2012-11-10 02:07:56', '2012-11-12 20:26:02', NULL, 0, 'Page', 'enabled', 1, 'all', NULL, 7, NULL, 19),
(577, 1, 'tag', NULL, 'published', '2012-11-10 02:08:11', '2012-11-12 23:22:25', NULL, 0, 'Page', 'enabled', 1, 'all', NULL, 8, NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `page_nm_category`
--

CREATE TABLE IF NOT EXISTS `page_nm_category` (
  `page_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`page_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_nm_category`
--

INSERT INTO `page_nm_category` (`page_id`, `category_id`) VALUES
(569, 5);

-- --------------------------------------------------------

--
-- Table structure for table `page_nm_tag`
--

CREATE TABLE IF NOT EXISTS `page_nm_tag` (
  `page_id` int(11) NOT NULL,
  `tag_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`page_id`,`tag_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_nm_tag`
--

INSERT INTO `page_nm_tag` (`page_id`, `tag_id`) VALUES
(569, 30),
(569, 31),
(575, 32),
(576, 32),
(576, 33),
(577, 33),
(577, 34),
(577, 36),
(576, 37);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `firstname`) VALUES
(1, ''),
(2, ''),
(3, '');

-- --------------------------------------------------------

--
-- Table structure for table `profile_field`
--

CREATE TABLE IF NOT EXISTS `profile_field` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `active`) VALUES
(1, 'super', NULL, 1),
(4, 'moderator', NULL, 1),
(5, 'normal', NULL, 1),
(6, 'newroles', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL DEFAULT 'site',
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(20) NOT NULL DEFAULT 'textfield',
  `hint` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=305 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `category`, `key`, `value`, `type`, `hint`) VALUES
(1, 'site', 'name', 'Awecms Beta', 'textfield', 'The name of the Site'),
(2, 'site', 'logo', 'http://localhost/askwhole/images/a.png', 'image_url', NULL),
(3, 'site', 'admin_email', 'email@admin.net', 'email', NULL),
(11, 'site', 'enable_breadcrumbs', '1', 'boolean', ''),
(102, 'SEO', 'slugs_enabled', '1', 'boolean', ''),
(111, 'SEO', 'enable_meta_description_for_homepage', '1', 'boolean', ''),
(112, 'SEO', 'enable_meta_description_for_all_pages', '1', 'boolean', ''),
(113, 'SEO', 'meta_description', 'Meta Description for Site', 'textarea', 'Visible in SERP.'),
(121, 'SEO', 'enable_meta_keywords', '1', 'boolean', ''),
(122, 'SEO', 'meta_keywords', 'keywords, all', 'textfield', ''),
(123, 'SEO', 'use_page_tags_for_keywords', '1', 'boolean', ''),
(124, 'SEO', 'enable_open_graph_meta_tags', '1', 'boolean', ''),
(131, 'SEO', 'enable_google_analytics', '1', 'boolean', ''),
(132, 'SEO', 'google_analytics_tracking_ID', '', 'textfield', 'Tracking ID available from https://www.google.com/analytics'),
(201, 'user', 'registration_enabled', '1', 'boolean', NULL),
(301, 'Gallery', 'uploadPath', '/../uploads', 'textfield', 'The path were uploaded images are stored. Usually /../uploads'),
(302, 'Gallery', 'uploadUrl', '/uploads/', 'textfield', NULL),
(304, 'site', 'enable_operations_menu', '1', 'boolean', '');

-- --------------------------------------------------------

--
-- Table structure for table `slug`
--

CREATE TABLE IF NOT EXISTS `slug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `slug`
--

INSERT INTO `slug` (`id`, `slug`, `path`, `enabled`) VALUES
(12, 'new-news', 'news/view/id/2', 1),
(13, 'my-new-category', 'directory/view/id/18', 1),
(14, 'new-business', 'directory/business/view/id/1', 1),
(15, 'apple', 'directory/business/view/id/2', 1),
(16, 'nepzilla-solutions-pvt-ltd', 'directory/business/view/id/3', 1),
(17, 'new', 'gallery/view/id/1', 1),
(18, 'paalksjfhdsjkhbfdskj', 'page/view/id/575', 1),
(19, 'oage-two', 'page/view/id/576', 1),
(20, 'tag-1', 'page/view/id/577', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Tag_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `user_id`, `count`) VALUES
(30, 'bad', 0, 0),
(31, 'news', 0, 0),
(32, 'one', 0, 0),
(33, 'two', 0, 0),
(34, 'tag', 0, 0),
(35, 'three', 0, 0),
(36, 'dope', 0, 0),
(37, 'nine', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'xtranophilist@gmail.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '2012-11-12 12:56:40', 1, 1),
(2, 'newuser', '5f4dcc3b5aa765d61d8327deb882cf99', 'ap@pasd.com', 'b5675acccbd6fa5ddcaa4f9a622eaf5c', '2012-11-10 00:08:23', '0000-00-00 00:00:00', 0, 1),
(3, 'rohit', '1db2cd81f19741d67e4c7aef245a689e', 'rohit@gmail.com', '145aefa1e264fae29cd2c868b038a892', '2012-11-12 17:55:57', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_nm_role`
--

CREATE TABLE IF NOT EXISTS `user_nm_role` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_nm_role`
--

INSERT INTO `user_nm_role` (`user_id`, `role_id`) VALUES
(1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_nm_role`
--
ALTER TABLE `access_nm_role`
  ADD CONSTRAINT `access_nm_role_ibfk_11` FOREIGN KEY (`access_id`) REFERENCES `access` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `access_nm_role_ibfk_12` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`),
  ADD CONSTRAINT `album_ibfk_3` FOREIGN KEY (`thumbnail_id`) REFERENCES `image` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`);

--
-- Constraints for table `business_category`
--
ALTER TABLE `business_category`
  ADD CONSTRAINT `business_category_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `business_nm_category`
--
ALTER TABLE `business_nm_category`
  ADD CONSTRAINT `business_nm_category_ibfk_3` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_nm_category_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `business_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`);

--
-- Constraints for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_4` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_12` FOREIGN KEY (`parent_id`) REFERENCES `page` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `page_ibfk_13` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `page_ibfk_14` FOREIGN KEY (`slug_id`) REFERENCES `slug` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `page_nm_category`
--
ALTER TABLE `page_nm_category`
  ADD CONSTRAINT `page_nm_category_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `page_nm_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `page_nm_tag`
--
ALTER TABLE `page_nm_tag`
  ADD CONSTRAINT `page_nm_tag_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `page_nm_tag_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_nm_role`
--
ALTER TABLE `user_nm_role`
  ADD CONSTRAINT `user_nm_role_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_nm_role_ibfk_4` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
