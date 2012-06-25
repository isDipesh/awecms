-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2012 at 10:58 PM
-- Server version: 5.5.23
-- PHP Version: 5.4.3

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
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `module`, `controller`, `action`, `enabled`) VALUES
(1, NULL, 'SiteController', 'Index', 1),
(2, 'menu', 'ajax', 'Save', 1),
(3, 'menu', 'item', 'Edit', 1);
>>>>>>> updated bd dump

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
(1, 1),
(2, 1),
(3, 1),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'qpp', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `owner_id`, `owner_name`, `count`, `parent_id`, `creator_id`, `user_name`, `user_email`, `comment_text`, `create_time`, `update_time`, `status`, `link`) VALUES
(132, 1, 'Page', 10, NULL, 1, '', '', 'nope', 1338879845, 1340454724, 0, '/page/page/view/id/1?sid=3'),
(133, 1, 'Page', 1, 132, 1, NULL, NULL, 'okay', 1338879871, 1340454717, 2, '/page/page/view/id/1?sid=3'),
(135, 1, 'Page', 2, NULL, 1, NULL, NULL, 'dang', 1338881485, NULL, 1, '/page/page/view/id/1?sid=3'),
(136, 1, 'Page', 3, NULL, 1, NULL, NULL, 'pass', 1338881529, NULL, 1, '/comments/comment/postComment'),
(137, 1, 'Page', 5, NULL, 1, NULL, NULL, 'lala', 1338881611, NULL, 1, '/page/page/view/id/1?sid=3'),
(138, 1, 'Page', 11, NULL, 1, NULL, NULL, 'next', 1338881988, NULL, 1, '/comments/comment/postComment'),
(139, 1, 'Page', 12, 138, 1, NULL, NULL, 'a', 1338895435, NULL, 1, '/page/page/view/id/1'),
(140, 1, 'Page', 13, NULL, 1, NULL, NULL, 'a', 1338895464, NULL, 1, '/page/page/view/id/1'),
(141, 1, 'Page', 14, 140, 1, NULL, NULL, 'abcaskhdgsa', 1338895471, NULL, 1, '/page/page/view/id/1'),
(142, 1, 'Page', 15, 141, 1, NULL, NULL, 'dang', 1338895520, NULL, 1, '/page/page/view/id/1'),
(143, 1, 'Category', 1, NULL, 1, NULL, NULL, 'a', 1338906313, NULL, 1, '/category/category/view/id/1'),
(144, 1, 'Category', 2, NULL, 1, NULL, NULL, 'a', 1338906325, NULL, 1, '/category/category/view/id/1'),
(145, 1, 'Category', 3, NULL, 1, NULL, NULL, 'no', 1338906390, NULL, 1, '/category/category/view/id/1'),
(146, 1, 'Page', 16, 142, 1, NULL, NULL, 'okey', 1338913470, NULL, 1, '/page/page/view/id/1'),
(147, 1, 'Page', 17, 146, 1, NULL, NULL, 'no', 1338913474, NULL, 1, '/comments/comment/postComment'),
(148, 1, 'Page', 18, 147, 1, NULL, NULL, 'ha', 1338913478, NULL, 1, '/comments/comment/postComment'),
(149, 1, 'Page', 19, 148, 1, NULL, NULL, 'na', 1338913481, NULL, 1, '/comments/comment/postComment'),
(150, 1, 'Page', 20, 149, 1, NULL, NULL, 'na', 1338913485, NULL, 1, '/comments/comment/postComment'),
(151, 1, 'Page', 21, 150, 1, NULL, NULL, 'ha', 1338913488, NULL, 1, '/comments/comment/postComment'),
(152, 1, 'Page', 22, 151, 1, '', '', 'akjdhcas askjdgh asdjkhasd asdjh', 1338913495, 1339225347, 1, '/comments/comment/postComment'),
(153, 1, 'Page', 23, 152, 1, '', '', 'adsssssssssssssssssssssss', 1338913506, 1339225363, 1, '/comments/comment/postComment'),
(154, 1, 'Page', 24, 153, 1, NULL, NULL, 'adssssssssssss', 1338913518, NULL, 1, '/comments/comment/postComment'),
(155, 1, 'Page', 25, NULL, NULL, 'My Name', 'My Email', 'haha', 1338914660, NULL, 0, '/page/page/view/id/1'),
(156, 1, 'Page', 26, NULL, NULL, '', '', 'comment', 1338914687, 1338917214, 2, '/comments/comment/postComment'),
(157, 1, 'Page', 27, NULL, NULL, '', '', 'a', 1338916997, 1338917127, 1, '/comments/comment/postComment'),
(158, 1, 'Page', 28, NULL, NULL, '', '', 'nananananana', 1338917013, 1338917051, 1, '/page/page/view/id/1'),
(159, 1, 'Page', 29, NULL, NULL, '', '', 'aaa', 1338917438, 1338917448, 1, '/page/page/view/id/1'),
(160, 1, 'Page', 30, NULL, 1, NULL, NULL, 'app', 1338918155, NULL, 1, '/page/page/view/id/1'),
(161, 1, 'Page', 31, NULL, 1, NULL, NULL, 'what', 1338930849, NULL, 1, '/page/page/view/id/1'),
(162, 1, 'Page', 32, NULL, NULL, ' name', 'email@email.com', 'text', 1338931087, NULL, 0, '/comments/comment/postComment'),
(163, 1, 'Page', 33, NULL, 1, NULL, NULL, 'whatn', 1338931105, NULL, 1, '/page/page/view/id/1'),
(164, 1, 'Page', 34, NULL, 1, NULL, NULL, 'cool', 1338931111, NULL, 1, '/comments/comment/postComment'),
(165, 1, 'Page', 35, NULL, NULL, 'myname', 'myemail@email.com', 'Great', 1338931371, NULL, 0, '/page/page/view/id/1'),
(166, 1, 'Page', 36, NULL, NULL, 'myname', 'myemail@email.com', 'Great', 1338931377, 1339574395, 2, '/page/page/view/id/1'),
(167, 1, 'Page', 37, NULL, NULL, 'name', 'email@ema.ico', 'done', 1338931426, 1338931439, 1, '/page/page/view/id/1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `menu_id`, `parent_id`, `depth`, `lft`, `rgt`, `name`, `enabled`, `content_id`, `description`, `link`, `role`) VALUES
(34, 1, 0, 1, 2, 3, 'Home', 1, NULL, NULL, '/', 'all'),
(44, 3, 0, 1, 4, 5, 'Dashboard', 1, NULL, NULL, '/', ''),
(45, 3, 0, 1, 6, 19, 'Users', 1, NULL, NULL, '/user', 'super'),
(46, 3, 45, 2, 9, 10, 'Manage Users', 1, NULL, NULL, '/user/admin', 'super'),
(47, 3, 45, 2, 11, 12, 'Create User', 1, NULL, NULL, '/user/admin/create', 'super'),
(48, 3, 45, 2, 13, 14, 'Manage Profile Fields', 1, NULL, NULL, '/user/profileField', 'super'),
(49, 3, 45, 2, 15, 16, 'Create Profile Field', 1, NULL, NULL, '/user/profileField/create', 'super'),
(50, 1, 0, 1, 6, 7, 'Login', 1, NULL, NULL, '/login', 'guest'),
(51, 1, 0, 1, 4, 5, 'Logout', 1, NULL, NULL, '/logout', 'loggedIn'),
(52, 3, 45, 2, 7, 8, 'List Users', 1, NULL, NULL, '/user', 'super'),
(53, 3, 0, 1, 28, 41, 'Design', 1, NULL, NULL, NULL, 'super'),
(54, 3, 53, 2, 29, 38, 'Menu', 1, NULL, NULL, '/menu', 'super'),
(55, 3, 54, 3, 32, 33, 'Manage Menus', 1, NULL, NULL, '/menu', 'super'),
(56, 3, 54, 3, 30, 31, 'Create New Menu', 1, NULL, NULL, '/menu/menu/create', 'super'),
(59, 3, 53, 2, 39, 40, 'Themes', 1, NULL, NULL, NULL, NULL),
(60, 3, 0, 1, 20, 27, 'Content', 1, NULL, NULL, NULL, 'super'),
(61, 3, 60, 2, 21, 22, 'Pages', 1, NULL, NULL, '/page', 'super'),
(62, 3, 60, 2, 25, 26, 'Comments', 1, NULL, NULL, '/comments', 'super'),
(63, 3, 45, 2, 17, 18, 'Roles', 1, NULL, NULL, '/role', 'super'),
(64, 3, 60, 2, 23, 24, 'Categories', 1, NULL, NULL, '/category', 'super'),
(66, 3, 54, 3, 34, 35, 'Edit Main Menu', 1, NULL, NULL, '/menu/item/1', NULL),
(67, 3, 54, 3, 36, 37, 'Edit Admin Menu', 1, NULL, NULL, 'menu/item/3', NULL),
(71, 1, 0, 1, 8, 9, 'Dashboard', 1, NULL, NULL, '/admin', 'super');

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
  `type` varchar(20) CHARACTER SET latin1 NOT NULL,
  `comment_status` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'open',
  `tags_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `permission` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'all',
  `password` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `parent` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `user_id`, `title`, `content`, `status`, `created_at`, `modified_at`, `parent_id`, `order`, `type`, `comment_status`, `tags_enabled`, `permission`, `password`, `views`) VALUES
(1, 2, 'Title', 'The content\r\nadsadas\r\nadasdasd', 'trashed', '2012-05-05 00:00:00', '2012-06-17 02:44:07', 9, 0, 'post', 'open', 1, 'all', 'password', 0),
(4, 2, 'Page Title Here', NULL, 'published', '2012-05-05 00:00:00', '2012-05-25 21:19:58', 1, 0, 'post', 'open', 1, 'all', 'password', 0),
(5, 2, 'Title goes here', 'content', 'published', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'post', 'open', 1, 'all', 'ms4weird', 0),
(6, NULL, 'Title goes here', 'content', 'published', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'post', 'open', 1, 'all', 'ms4weird', 0),
(7, NULL, 'Title goes here', 'content', 'published', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'post', 'open', 1, 'all', 'ms4weird', 0),
(8, 1, 'Title', 'Content', 'published', '2012-05-18 12:35:18', '2012-05-05 00:00:00', 1, 0, 'post', 'open', 1, 'all', NULL, 1),
(9, 1, 'New Page Title', 'Content	 ', 'published', '2012-05-21 22:10:59', '2012-05-21 22:11:22', NULL, 0, 'page', 'open', 1, 'all', NULL, 12),
(10, 4, 'title', NULL, 'published', '2012-05-25 02:22:52', '2012-05-25 03:06:49', 1, 0, 'post', 'open', 1, 'all', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_nm_category`
--

CREATE TABLE IF NOT EXISTS `page_nm_category` (
  `page_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`page_id`,`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `category`, `key`, `value`, `type`) VALUES
(67, 'site', 'name', 'My Site Name', 'textfield'),
(68, 'site', 'logo', 'http://localhost/askwhole/images/a.png', 'image_url'),
(69, 'site', 'admin_email', 'email@admin.net', 'email'),
(70, 'site', 'maintenance_mode', '0', 'boolean'),
(71, 'site', 'maintenance_text', 'Sorry folks, the site is under maintenance. Please check back again in 83 seconds!', 'textarea'),
(96, 'user', 'registration_enabled', '1', 'boolean'),
(101, 'news', 'logo', '1', 'integer'),
(102, 'news', 'sdsa', '1', 'boolean');

-- --------------------------------------------------------

--
-- Table structure for table `slug`
--

CREATE TABLE IF NOT EXISTS `slug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `slug`
--

INSERT INTO `slug` (`id`, `slug`, `path`, `enabled`) VALUES
(1, 'manageUsers', '/admin/user', 1),
(2, 'slug1', 'path1', 0),
(3, 'slug2', 'path2', 1),
(4, '/admin/jpt', '/admin/categories', 1),
(5, 'jpt', '/admin/categories', 1),
(9, '', '', 1),
(10, 's', 'b', 1),
(11, 'my-page', '/profile', 1),
(12, 'pahiro-aayo', '/news/news/view/id/1', 1);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `birthdate`, `birthtime`, `enabled`, `status`, `slogan`, `content`, `created_at`, `changed_at`, `modified_at`, `image`, `email`, `uri`, `qualification`) VALUES
(1, 'a ', '2012-05-08', '2012-05-30 07:16:37', 1, 'published', 'My stupid slogan', 'hakslnbwqijd aisjfkmndb jikdfnjd iwaokdsnjfiwekmd\r\nBa,m badsa\r\naskjdhnajks\r\nadnajds', '2012-05-23 04:11:19', '2012-05-21 00:18:48', '2012-05-20 14:33:11', 'http://localhost/askwhole/images/a.png', 'xtra@dhasg.com', 'http://yiiblog.info/blog/2011/04/yii-cdetailview-code-demo/', ''),
(2, 'Test 2', '2012-05-22', '2012-05-14 10:20:35', 1, 'drafted', 'slogan slogan', 'long text here', '2012-05-23 04:11:19', '2012-05-21 01:47:53', '2012-05-20 15:33:29', 'image', 'email', 'uri', ''),
(3, 'My Name', '2012-05-22', '2012-05-20 21:54:00', 1, 'deleted', 'slogans go here', 'contents go here', '2012-05-20 21:54:34', '2012-05-20 21:56:25', '2012-05-20 16:09:34', 'http://localhost/askwhole/images/a.png', 'e', 'u', ''),
(5, 'myname', '2012-05-02', '2012-05-19 00:00:00', 0, 'published', 'Haiabsd', '<strong>apple</strong>', '2012-05-21 13:48:11', '2012-05-21 14:04:23', '2012-05-21 08:03:11', 'http://localhost/askwhole/images/a.png', 'xtranophilist@gmail.com', 'http://google.com/', ''),
(6, 'myname', '2012-05-22', '2012-05-23 00:24:25', 1, 'published', 'asD asd', 'adasdsad', '2012-05-29 00:00:00', '2012-05-09 00:00:00', '2012-05-24 18:57:05', 'http://google.com/', 'email', '', 'SLC,+2,Masters');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
<<<<<<< HEAD
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'xtranophilist@gmail.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '2012-06-25 04:17:47', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '0000-00-00 00:00:00', '2012-06-24 08:29:02', 0, 1),
=======
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'xtranophilist@gmail.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '2012-06-24 08:33:06', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '0000-00-00 00:00:00', '2012-06-24 08:29:02', 0, 1),
(3, 'myuser', '5d5a582e5adf896ed6e1474c700b481a', 'myuser@email.com', '66a6d51638f2ac8efb88898ec73aeab5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
>>>>>>> updated bd dump
(4, 'admina', 'a5d5dd525b4dc07b915448482da44974', 'admina@admina.c', '5c7ad3d0afd32f1353ee6bce1f223552', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(6, 'adminas', '5f4dcc3b5aa765d61d8327deb882cf99', 'xtradasf@dsad.com', 'fb87fb607c3c5e901beb90059f54aba7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1);

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
(4, 4);

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
  ADD CONSTRAINT `access_nm_role_ibfk_12` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `access_nm_role_ibfk_11` FOREIGN KEY (`access_id`) REFERENCES `access` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`parent`) REFERENCES `content` (`id`);

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_6` FOREIGN KEY (`parent_id`) REFERENCES `page` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `page_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_nm_role`
--
ALTER TABLE `user_nm_role`
  ADD CONSTRAINT `user_nm_role_ibfk_4` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_nm_role_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
