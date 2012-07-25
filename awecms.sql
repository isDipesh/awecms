-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2012 at 09:14 PM
-- Server version: 5.5.24
-- PHP Version: 5.4.4

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `module`, `controller`, `action`, `enabled`, `all`, `loggedIn`, `guest`, `rule`) VALUES
(6, 'search', 'search', 'Index', 1, 1, 0, 1, 'deny'),
(7, 'category', 'category', 'Create', 1, 0, 0, 0, 'allow');

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

--
-- Dumping data for table `access_nm_role`
--

INSERT INTO `access_nm_role` (`access_id`, `role_id`) VALUES
(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'qpp', 'haha'),
(2, 'another category', 'nananana');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `owner_id`, `owner_name`, `count`, `parent_id`, `creator_id`, `user_name`, `user_email`, `comment_text`, `create_time`, `update_time`, `status`, `link`) VALUES
(132, 1, 'Page', 10, NULL, 1, '', '', 'nope', 1338879845, 1341487704, 1, '/page/page/view/id/1?sid=3'),
(133, 1, 'Page', 1, 132, 1, NULL, NULL, 'okay', 1338879871, 1341487706, 1, '/page/page/view/id/1?sid=3'),
(135, 1, 'Page', 2, NULL, 1, NULL, NULL, 'dang', 1338881485, NULL, 1, '/page/page/view/id/1?sid=3'),
(136, 1, 'Page', 3, NULL, 1, NULL, NULL, 'pass', 1338881529, NULL, 1, '/comments/comment/postComment'),
(155, 1, 'Page', 25, NULL, NULL, 'My Name', 'My Email', 'haha', 1338914660, NULL, 0, '/page/page/view/id/1'),
(156, 1, 'Page', 26, NULL, NULL, '', '', 'comment', 1338914687, 1341487707, 1, '/comments/comment/postComment'),
(166, 1, 'Page', 36, NULL, NULL, 'myname', 'myemail@email.com', 'Great', 1338931377, 1341487708, 1, '/page/page/view/id/1');

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
(1, 'default', 0, 0, 1, 1, 'Yii::app()->getModule("user")->isAdmin()', 'ASC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` text CHARACTER SET latin1 NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'published',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `type` varchar(20) CHARACTER SET latin1 NOT NULL,
  `comment_status` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'open',
  `tags_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `permission` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'all',
  `password` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `user_id`, `title`, `status`, `created_at`, `modified_at`, `parent`, `order`, `type`, `comment_status`, `tags_enabled`, `permission`, `password`, `views`) VALUES
(1, 1, 'Title', 'published', '2012-05-05 00:00:00', '2012-05-05 00:00:00', 1, 0, 'post', 'open', 1, 'all', 'password', 0),
(4, NULL, 'Page Title Here', 'published', '2012-05-05 00:00:00', '2012-05-05 00:00:00', 1, 0, 'post', 'open', 1, 'all', 'password', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE IF NOT EXISTS `dashboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `path` varchar(100) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `category`, `name`, `path`, `enabled`) VALUES
(3, 'Users', 'Manage Users', '/admin/user', 1),
(4, 'Users', 'Add User', '/admin/user/create', 1),
(5, 'Users', 'Manage Profile Fields', '/admin/profileField', 1),
(6, 'Users', 'Add Profile Field', '/admin/profileField/create', 1),
(7, 'Settings', 'Manage Dashboard Items', '/admin/dashboard', 1),
(8, 'Settings', 'Add Dashboard Item', '/admin/dashboard/create', 1),
(9, 'Settings', 'Account Settings', '/profile/edit', 1),
(10, 'Content', 'Manage Slugs', '/admin/slug', 1),
(11, 'Content', 'Add Slug', '/admin/slug/create', 1),
(12, 'Content', 'Manage Categories', '/admin/categories', 1),
(13, 'Content', 'Add Category', '/admin/categories/create', 1),
(14, 'Content', 'Manage Pages', '/admin/pages', 1),
(15, 'Content', 'Add Page', '/admin/pages/create', 1);

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
(3, 'Admin', 1, 0, 0, 0, 'mtv', 'Menu for admin/backend dashboard.');

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
  `content_id` int(11) DEFAULT NULL,
  `description` text,
  `link` text,
  `role` text,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `menu_id_2` (`menu_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `menu_id`, `parent_id`, `depth`, `lft`, `rgt`, `name`, `enabled`, `content_id`, `description`, `link`, `role`) VALUES
(34, 1, 0, 1, 2, 3, 'Home', 1, NULL, NULL, '/', 'all'),
(44, 3, 0, 1, 2, 3, 'Dashboard', 1, NULL, NULL, '/', ''),
(45, 3, 0, 1, 4, 17, 'Users', 1, NULL, NULL, '/user', 'super'),
(46, 3, 45, 2, 7, 8, 'Manage Users', 1, NULL, NULL, '/user/admin', 'super'),
(47, 3, 45, 2, 9, 10, 'Create User', 1, NULL, NULL, '/user/admin/create', 'super'),
(48, 3, 45, 2, 11, 12, 'Manage Profile Fields', 1, NULL, NULL, '/user/profileField', 'super'),
(49, 3, 45, 2, 13, 14, 'Create Profile Field', 1, NULL, NULL, '/user/profileField/create', 'super'),
(50, 1, 0, 1, 8, 9, 'Login', 1, NULL, NULL, '/login', 'guest'),
(51, 1, 0, 1, 6, 7, 'Logout', 1, NULL, NULL, '/logout', 'loggedIn'),
(52, 3, 45, 2, 5, 6, 'List Users', 1, NULL, NULL, '/user', 'super'),
(53, 3, 0, 1, 28, 41, 'Design', 1, NULL, NULL, NULL, 'super'),
(54, 3, 53, 2, 29, 38, 'Menu', 1, NULL, NULL, '/menu', 'super'),
(55, 3, 54, 3, 32, 33, 'Manage Menus', 1, NULL, NULL, '/menu', 'super'),
(56, 3, 54, 3, 30, 31, 'Create New Menu', 1, NULL, NULL, '/menu/menu/create', 'super'),
(59, 3, 53, 2, 39, 40, 'Themes', 1, NULL, NULL, NULL, NULL),
(60, 3, 0, 1, 18, 27, 'Content', 1, NULL, NULL, NULL, 'super'),
(61, 3, 60, 2, 19, 20, 'Pages', 1, NULL, NULL, '/page', 'super'),
(62, 3, 60, 2, 23, 24, 'Comments', 1, NULL, NULL, '/comments', 'super'),
(63, 3, 45, 2, 15, 16, 'Roles', 1, NULL, NULL, '/role', 'super'),
(64, 3, 60, 2, 21, 22, 'Categories', 1, NULL, NULL, '/category', 'super'),
(66, 3, 54, 3, 34, 35, 'Edit Main Menu', 1, NULL, NULL, '/menu/item?id=1', 'super'),
(67, 3, 54, 3, 36, 37, 'Edit Admin Menu', 1, NULL, NULL, '/menu/item?id=3', 'super'),
(71, 1, 0, 1, 4, 5, 'Dashboard', 1, NULL, NULL, '/admin', 'super'),
(72, 3, 60, 2, 25, 26, 'Files', 1, NULL, NULL, '/file', 'super');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `page_id`, `source`) VALUES
(24, 137, 'sources'),
(25, 138, 'haha'),
(26, 139, 'sss'),
(27, 140, ''),
(28, 169, ''),
(29, 171, '');

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
  `type` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'page',
  `comment_status` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'open',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `user_id`, `title`, `content`, `status`, `created_at`, `modified_at`, `parent_id`, `order`, `type`, `comment_status`, `tags_enabled`, `permission`, `password`, `views`, `layout`, `slug_id`) VALUES
(137, 2, 'title goes here', '<p>\r\n	the content</p>\r\n', 'published', '2012-07-25 22:07:06', '2012-07-26 01:07:54', NULL, 0, 'Page', 'open', 1, 'all', NULL, 3, NULL, NULL),
(138, 4, 'test title', '<p>\r\n	content</p>\r\n', 'published', '2012-07-25 22:13:40', '0000-00-00 00:00:00', NULL, 0, 'page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(139, 4, 'next titoles', NULL, 'trashed', '2012-07-25 22:28:41', '2012-07-25 22:31:47', NULL, 0, 'News', 'open', 1, 'all', NULL, 0, NULL, NULL),
(140, 1, 'news title', '<p>\r\n	nes coasd</p>\r\n', 'published', '2012-07-26 00:56:16', '0000-00-00 00:00:00', NULL, 0, 'page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(144, 2, 'asdfs', NULL, 'published', '2012-07-26 01:57:44', '2012-07-26 01:57:44', NULL, 0, 'page', 'open', 1, 'all', NULL, 0, NULL, 101),
(146, 1, 'news', '<p>\r\n	content</p>\r\n', 'trashed', '2012-07-26 01:58:37', '2012-07-26 02:12:58', 140, 0, 'page', 'open', 1, 'all', NULL, 7, NULL, 103),
(150, 1, 'lala', NULL, 'published', '2012-07-26 02:21:09', '2012-07-26 02:21:09', NULL, 0, 'page', 'open', 1, 'all', NULL, 1, NULL, NULL),
(151, 1, 'asdfghjklssdfd', '<p>\r\n	serdtfyghujkl,</p>\r\n', 'published', '2012-07-26 02:21:22', '2012-07-26 02:33:07', NULL, 0, 'page', 'open', 1, 'all', NULL, 1, NULL, NULL),
(157, 1, 'dkslajfdnsdjkfndsjaf', NULL, 'published', '2012-07-26 02:38:11', '2012-07-26 02:38:49', NULL, 0, 'page', 'open', 1, 'all', NULL, 2, NULL, NULL),
(158, 1, 'asdfg', NULL, 'published', '2012-07-26 02:38:54', '2012-07-26 02:39:18', NULL, 0, 'page', 'open', 1, 'all', NULL, 2, NULL, NULL),
(159, 1, 'asfg', NULL, 'published', '2012-07-26 02:39:29', '2012-07-26 02:39:29', NULL, 0, 'page', 'open', 1, 'all', NULL, 1, NULL, NULL),
(166, 1, 'ppppps', NULL, 'published', '2012-07-26 02:42:08', '2012-07-26 02:42:13', NULL, 0, 'page', 'open', 1, 'all', NULL, 2, NULL, NULL),
(168, 1, 'poiuyt', NULL, 'published', '2012-07-26 02:46:16', '2012-07-26 02:46:16', NULL, 0, 'page', 'open', 1, 'all', NULL, 1, NULL, NULL),
(169, 1, 'news title goes', NULL, 'published', '2012-07-26 02:48:25', '0000-00-00 00:00:00', NULL, 0, 'page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(170, 1, 'mypage', NULL, 'published', '2012-07-26 02:50:16', '2012-07-26 02:52:25', NULL, 0, 'page', 'open', 1, 'all', NULL, 2, NULL, 565),
(171, 1, 'asdfghjuiko', NULL, 'published', '2012-07-26 02:57:30', '0000-00-00 00:00:00', NULL, 0, 'page', 'open', 1, 'all', NULL, 0, NULL, NULL);

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
(146, 1),
(146, 2);

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
(4, ''),
(6, ''),
(7, ''),
(8, 'adsfg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `profile_field`
--

INSERT INTO `profile_field` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(4, 'firstname', 'First Name', 'VARCHAR', 255, 2, 2, '', '', '', '', '', '', '', 0, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `active`) VALUES
(1, 'super', NULL, 1),
(4, 'moderator', NULL, 1),
(5, 'normal', NULL, 1);

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
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `category`, `key`, `value`, `type`) VALUES
(68, 'site', 'logo', 'http://localhost/askwhole/images/a.png', 'image_url'),
(69, 'site', 'admin_email', 'email@admin.net', 'email'),
(70, 'site', 'maintenance_mode', '0', 'boolean'),
(71, 'site', 'maintenance_text', 'Sorry folks, the site is under maintenance. Please check back again in 83 seconds!', 'textarea'),
(96, 'user', 'registration_enabled', '1', 'boolean'),
(101, 'news', 'logo', '1', 'integer'),
(102, 'news', 'sdsa', '1', 'boolean'),
(103, 'site', 'name', 'My Awesome Sites', 'textfield');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=566 ;

--
-- Dumping data for table `slug`
--

INSERT INTO `slug` (`id`, `slug`, `path`, `enabled`) VALUES
(38, 'haha', 'page/52', 1),
(39, 'nana', '/page/53', 1),
(40, 'dyang', '/page/54', 1),
(41, 'new', '/page/view/id/55', 1),
(42, 'new-1', '/page/view/id/56', 1),
(43, 'likes', 'page/view/id/59', 1),
(44, 'wohoo', 'page/view/id/60', 1),
(45, 'i-love-myself', 'page/view/id/61', 1),
(46, 'title', 'page/view/id/62', 1),
(47, 'dfghjkl', 'page/view/id/63', 1),
(48, 'applesfg', 'page/view/id/64', 1),
(49, 'title-1', 'page/view/id/65', 1),
(50, 'hohhaaaaaaaa', 'page/view/id/66', 1),
(51, 'lalala', 'page/view/id/67', 1),
(52, 'newp', 'admin/page/view/id/69', 1),
(53, 'nanananananana', 'page/view/id/70', 1),
(54, 'hohohohoh', 'page/view/id/71', 1),
(55, 'applesfgh', 'page/view/id/72', 1),
(56, 'dang', 'page/view/id/73', 1),
(57, 'dang-1', 'page/view/id/74', 1),
(58, 'dang-2', 'page/view/id/75', 1),
(59, 'haha-1', 'page/view/id/76', 1),
(60, 'haha-2', 'page/view/id/77', 1),
(61, 'oho', 'page/view/id/78', 1),
(62, 'http-iimgurcom-3onqvgif', 'page/view/id/80', 1),
(63, 'nexting', 'page/view/id/81', 1),
(64, 'what', 'page/view/id/82', 1),
(65, 'title-2', 'page/view/id/83', 1),
(66, 'poi', 'page/view/id/84', 1),
(67, 'poi-1', 'page/view/id/85', 1),
(68, 'poi-2', 'page/view/id/86', 1),
(69, 'poi-3', 'page/view/id/87', 1),
(70, 'poi-4', 'page/view/id/88', 1),
(71, 'poi-5', 'page/view/id/89', 1),
(72, 'poi-6', 'page/view/id/90', 1),
(73, 'poi-7', 'page/view/id/91', 1),
(74, 'poi-8', 'page/view/id/92', 1),
(75, 'poi-9', 'page/view/id/93', 1),
(76, 'poi-10', 'page/view/id/94', 1),
(77, 'poi-11', 'page/view/id/95', 1),
(78, 'poi-12', 'page/view/id/96', 1),
(79, 'poi-13', 'page/view/id/97', 1),
(80, 'poi-14', 'page/view/id/98', 1),
(81, 'poi-15', 'page/view/id/99', 1),
(82, 'poi-16', 'page/view/id/100', 1),
(83, 'poi-17', 'page/view/id/101', 1),
(84, 'poi-18', 'page/view/id/102', 1),
(85, 'poi-19', 'page/view/id/103', 1),
(86, 'poi-20', 'page/view/id/104', 1),
(87, 'tt', 'page/view/id/105', 1),
(88, 'next', 'page/view/id/106', 1),
(89, 'new-2', 'page/view/id/107', 1),
(90, 'new-page', 'page/view/id/108', 1),
(91, 'next1', 'page/view/id/109', 1),
(95, 'haha-3', 'page/view/id/113', 1),
(96, 'theunique-one', 'page/view/id/114', 1),
(97, 'man-this-is-great', 'page/view/id/115', 1),
(101, '&nbsp;', 'page/view/id/144', 1),
(102, '&nbsp;-1', 'page/view/id/145', 1),
(103, 'new-3', 'page/view/id/146', 1),
(106, 'lala', 'page/view/id/150', 1),
(107, 'asdfghjkl', 'page/view/id/151', 1),
(563, 'ppppp', 'page/view/id/166', 1),
(564, 'nooooooooooooo', 'page/view/id/167', 1),
(565, 'mypage', 'page/view/id/170', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT 'myname',
  `birthdate` date NOT NULL,
  `birthtime` datetime NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `status` enum('published','deleted','drafted','closed') NOT NULL,
  `slogan` text NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `changed_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `qualification` set('SLC','+2','Bachelors','Masters') NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `qualification` (`qualification`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `birthdate`, `birthtime`, `enabled`, `status`, `slogan`, `content`, `created_at`, `changed_at`, `modified_at`, `image`, `email`, `uri`, `qualification`, `user_id`) VALUES
(1, 'a ', '2012-05-08', '2012-05-30 07:16:37', 1, 'published', 'My stupid slogan', 'hakslnbwqijd aisjfkmndb jikdfnjd iwaokdsnjfiwekmd\r\nBa,m badsa\r\naskjdhnajks\r\nadnajds', '2012-05-23 04:11:19', '2012-05-21 00:18:48', '2012-05-20 14:33:11', 'http://localhost/askwhole/images/a.png', 'xtra@dhasg.com', 'http://yiiblog.info/blog/2011/04/yii-cdetailview-code-demo/', '', 0),
(2, 'Test 2', '2012-05-22', '2012-05-14 10:20:35', 1, 'drafted', 'slogan slogan', 'long text here', '2012-05-23 04:11:19', '2012-05-21 01:47:53', '2012-05-20 15:33:29', 'image', 'email', 'uri', '', 0),
(3, 'My Name', '2012-05-22', '2012-05-20 21:54:00', 1, 'deleted', 'slogans go here', 'contents go here', '2012-05-20 21:54:34', '2012-05-20 21:56:25', '2012-05-20 16:09:34', 'http://localhost/askwhole/images/a.png', 'e', 'u', '', 0),
(5, 'myname', '2012-05-02', '2012-05-19 00:00:00', 0, 'published', 'Haiabsd', '<strong>apple</strong>', '2012-05-21 13:48:11', '2012-05-21 14:04:23', '2012-05-21 08:03:11', 'http://localhost/askwhole/images/a.png', 'xtranophilist@gmail.com', 'http://google.com/', '', 0),
(6, 'myname', '2012-05-22', '2012-05-23 00:24:25', 1, 'published', 'asD asd', 'adasdsad', '2012-05-29 00:00:00', '2012-05-09 00:00:00', '2012-05-24 18:57:05', 'http://google.com/', 'email', '', 'SLC,+2,Masters', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'xtranophilist@gmail.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '2012-07-18 04:29:58', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '0000-00-00 00:00:00', '2012-07-14 09:35:00', 0, 1),
(4, 'admina', 'a5d5dd525b4dc07b915448482da44974', 'admina@admina.c', '5c7ad3d0afd32f1353ee6bce1f223552', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(6, 'adminas', '5f4dcc3b5aa765d61d8327deb882cf99', 'xtradasf@dsad.com', 'fb87fb607c3c5e901beb90059f54aba7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(7, 'myname', 'a029d0df84eb5549c641e04a9ef389e5', 'my@ghj.com', '66052ff289b9d7fc25a9c1d8fdec7a86', '2012-06-29 10:59:31', '0000-00-00 00:00:00', 0, 0),
(8, 'newUsers', '5f4dcc3b5aa765d61d8327deb882cf99', 'xdsf@dasf.com', '7c0ba2b9ca5fb1a65a5af8b9201d6293', '2012-06-29 11:18:33', '0000-00-00 00:00:00', 1, 1);

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
(1, 1),
(4, 1),
(6, 1),
(8, 1),
(4, 4),
(8, 4),
(8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `widget`
--

CREATE TABLE IF NOT EXISTS `widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `widget_class` varchar(100) NOT NULL DEFAULT 'CWidget',
  `tag_name` varchar(100) NOT NULL DEFAULT 'div',
  `html_options` text,
  `decoration_css_class` varchar(100) NOT NULL DEFAULT 'portlet-decoration',
  `title_css_class` varchar(100) NOT NULL DEFAULT 'portlet-title',
  `content_css_class` varchar(100) NOT NULL DEFAULT 'portlet-content',
  `hide_on_empty` tinyint(1) NOT NULL DEFAULT '1',
  `skin` varchar(100) NOT NULL DEFAULT 'default',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `widget_setting`
--

CREATE TABLE IF NOT EXISTS `widget_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL DEFAULT 'site',
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(20) NOT NULL DEFAULT 'textfield',
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`parent`) REFERENCES `content` (`id`);

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
-- Constraints for table `user_nm_role`
--
ALTER TABLE `user_nm_role`
  ADD CONSTRAINT `user_nm_role_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_nm_role_ibfk_4` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
