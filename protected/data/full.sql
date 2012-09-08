-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2012 at 11:49 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.6

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `title`, `content`, `enabled`, `is_widget`, `widget_class`, `tag_name`, `html_options`, `decoration_css_class`, `title_css_class`, `content_css_class`, `hide_on_empty`, `skin`) VALUES
(5, 'Introduction', 'sahjgdyhasgdsahjde', 1, 0, 'CWidget', 'div', NULL, 'portlet-decoration', 'portlet-title', 'portlet-content', 1, 'default'),
(6, 'Social Links', NULL, 1, 1, 'CWidget', 'div', NULL, 'portlet-decoration', 'portlet-title', 'portlet-content', 1, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `block_setting`
--

CREATE TABLE IF NOT EXISTS `block_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL DEFAULT 'site',
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(20) NOT NULL DEFAULT 'textfield',
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `venue`, `start`, `end`, `whole_day_event`, `organizer`, `type`, `url`, `page_id`, `enabled`) VALUES
(1, 'Prayag Marga,\r\nNew Baneshwor,\r\nKathmandu,\r\nBagmati,\r\nNepal.', '2012-07-28 16:19:00', '2012-07-29 16:19:00', 0, 'Nepzilla Solutions', NULL, NULL, 204, 1),
(2, 'Islington College,\r\nKamalpokhari,\r\nKathmandu', '2012-07-04 00:00:00', '2012-07-05 00:00:00', 0, 'Islington College', NULL, 'http://islington.edu.np', 199, 1),
(3, NULL, '2012-09-13 00:00:00', '2012-09-27 00:00:00', 0, NULL, NULL, NULL, 219, 1);

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
  `type` varchar(50) NOT NULL DEFAULT 'url',
  `role` text,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `menu_id_2` (`menu_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `menu_id`, `parent_id`, `depth`, `lft`, `rgt`, `name`, `enabled`, `content_id`, `description`, `link`, `type`, `role`) VALUES
(34, 1, 0, 1, 2, 3, 'Home', 1, NULL, '', '/', 'url', 'all'),
(44, 3, 0, 1, 2, 3, 'Dashboard', 1, NULL, NULL, '/', 'url', ''),
(45, 3, 0, 1, 4, 17, 'Users', 1, NULL, NULL, '/user', 'url', 'super'),
(46, 3, 45, 2, 7, 8, 'Manage Users', 1, NULL, NULL, '/user/admin', 'url', 'super'),
(47, 3, 45, 2, 9, 10, 'Create User', 1, NULL, NULL, '/user/admin/create', 'url', 'super'),
(48, 3, 45, 2, 11, 12, 'Manage Profile Fields', 1, NULL, NULL, '/user/profileField', 'url', 'super'),
(49, 3, 45, 2, 13, 14, 'Create Profile Field', 1, NULL, NULL, '/user/profileField/create', 'url', 'super'),
(50, 1, 0, 1, 8, 9, 'Login', 1, NULL, NULL, '/login', 'url', 'guest'),
(51, 1, 0, 1, 6, 7, 'Logout', 1, NULL, NULL, '/logout', 'url', 'loggedIn'),
(52, 3, 45, 2, 5, 6, 'List Users', 1, NULL, NULL, '/user', 'url', 'super'),
(53, 3, 0, 1, 28, 41, 'Design', 1, NULL, NULL, NULL, 'url', 'super'),
(54, 3, 53, 2, 29, 38, 'Menu', 1, NULL, NULL, '/menu', 'url', 'super'),
(55, 3, 54, 3, 32, 33, 'Manage Menus', 1, NULL, NULL, '/menu', 'url', 'super'),
(56, 3, 54, 3, 30, 31, 'Create New Menu', 1, NULL, NULL, '/menu/menu/create', 'url', 'super'),
(59, 3, 53, 2, 39, 40, 'Themes', 1, NULL, NULL, NULL, 'url', NULL),
(60, 3, 0, 1, 18, 27, 'Content', 1, NULL, NULL, NULL, 'url', 'super'),
(61, 3, 60, 2, 19, 20, 'Pages', 1, NULL, NULL, '/page', 'url', 'super'),
(62, 3, 60, 2, 23, 24, 'Comments', 1, NULL, NULL, '/comments', 'url', 'super'),
(63, 3, 45, 2, 15, 16, 'Roles', 1, NULL, NULL, '/role', 'url', 'super'),
(64, 3, 60, 2, 21, 22, 'Categories', 1, NULL, NULL, '/category', 'url', 'super'),
(66, 3, 54, 3, 34, 35, 'Edit Main Menu', 1, NULL, NULL, '/menu/item?id=1', 'url', 'super'),
(67, 3, 54, 3, 36, 37, 'Edit Admin Menu', 1, NULL, NULL, '/menu/item?id=3', 'url', 'super'),
(71, 1, 0, 1, 4, 5, 'Dashboard', 1, NULL, '', '/admin', 'module', 'super'),
(72, 3, 60, 2, 25, 26, 'Files', 1, NULL, NULL, '/file', 'url', 'super');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `page_id`) VALUES
(52, 201),
(57, 206),
(58, 207),
(59, 208),
(60, 220);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=238 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `user_id`, `title`, `content`, `status`, `created_at`, `modified_at`, `parent_id`, `order`, `type`, `comment_status`, `tags_enabled`, `permission`, `password`, `views`, `layout`, `slug_id`) VALUES
(199, 1, 'Another Event', '<p>\r\n	Everybody is welcome!</p>\r\n', 'published', '2012-07-28 01:14:45', '2012-07-29 12:35:49', NULL, 0, 'Event', 'open', 1, 'all', NULL, 3, NULL, NULL),
(200, 1, 'First News', NULL, 'published', '2012-07-28 01:16:02', '0000-00-00 00:00:00', NULL, 0, 'News', 'open', 1, 'all', NULL, 0, NULL, NULL),
(201, 1, 'First New', NULL, 'published', '2012-07-28 01:17:13', '2012-09-07 21:53:41', NULL, 0, 'News', 'open', 1, 'all', NULL, 10, NULL, 598),
(202, 1, 'ooooo1', NULL, 'published', '2012-07-28 01:18:22', '0000-00-00 00:00:00', NULL, 0, 'News', 'open', 1, 'all', NULL, 0, NULL, NULL),
(203, 1, 'xxxxxxxxxxx', NULL, 'published', '2012-07-28 01:21:29', '0000-00-00 00:00:00', NULL, 0, 'News', 'open', 1, 'all', NULL, 0, NULL, NULL),
(204, 1, 'Moz Fest', '<p>\r\n	This is the description</p>\r\n', 'published', '2012-07-28 01:21:46', '2012-08-03 11:36:18', NULL, 0, 'Event', 'open', 1, 'all', NULL, 53, NULL, NULL),
(205, 1, 'xxxxxxxxxxx', NULL, 'published', '2012-07-28 01:23:00', '0000-00-00 00:00:00', NULL, 0, 'News', 'open', 1, 'all', NULL, 0, NULL, NULL),
(206, 1, 'xxxxxxxxxxxs', NULL, 'published', '2012-07-28 01:23:13', '2012-07-28 16:41:51', NULL, 0, 'News', 'open', 1, 'all', NULL, 4, NULL, 603),
(207, 1, 'New newshahapp', NULL, 'published', '2012-07-28 01:24:15', '2012-07-28 01:24:31', NULL, 0, 'News', 'open', 1, 'all', NULL, 3, NULL, 604),
(208, 1, 'qqq', '<p>\r\n	News content this is. Powerful you are. Fast do this.</p>\r\n', 'published', '2012-07-28 01:36:58', '2012-07-28 01:36:59', NULL, 0, 'News', 'open', 1, 'all', NULL, 1, NULL, 605),
(209, 1, 'tits', NULL, 'published', '2012-07-28 16:36:57', '2012-07-28 20:59:50', NULL, 0, 'Event', 'open', 1, 'all', NULL, 9, NULL, NULL),
(210, 1, 'tada', '<p>\r\n	nana</p>\r\n', 'published', '2012-07-28 19:49:32', '2012-07-29 13:20:53', NULL, 0, 'Event', 'open', 1, 'all', NULL, 5, NULL, 606),
(211, 1, 'New Page w Image', '<p>\r\n	<a href="/uploads/files/605503674.jpg" target="_blank"><img alt="Python" src="/uploads/files/python.png" style="width: 518px; height: 588px;" /></a></p>\r\n', 'published', '2012-07-29 20:34:53', '2012-07-29 20:34:53', NULL, 0, 'Page', 'open', 1, 'all', NULL, 1, NULL, 607),
(212, 1, 'Screenshot', '<p>\r\n	<img alt="" src="/uploads/editor/Screenshot from 2012-07-30 21:39:19.png" style="width: 1280px; height: 800px;" /></p>\r\n', 'published', '2012-07-31 14:43:45', '2012-07-31 14:43:46', NULL, 0, 'Page', 'open', 1, 'all', NULL, 1, NULL, 608),
(213, 1, 'Home', '<p>\r\n	This is the home</p>\r\n', 'published', '2012-09-07 03:02:45', '2012-09-07 03:02:45', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, 609),
(214, 1, 'Title', '<p>\r\n	Content</p>\r\n', 'published', '2012-09-07 20:29:56', '2012-09-07 20:29:56', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, 610),
(215, 1, 'sdfghj', '<p>\r\n	FGHJKL</p>\r\n', 'published', '2012-09-07 20:42:06', '2012-09-07 20:42:06', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, 611),
(216, 1, 'next page', '<p>\r\n	hahaah</p>\r\n', 'published', '2012-09-07 20:45:43', '2012-09-07 20:46:04', NULL, 0, 'Page', 'open', 1, 'all', NULL, 1, NULL, 612),
(217, 1, 'ajdhghsadh', '<p>\r\n	khvbhjnvbbn</p>\r\n', 'published', '2012-09-07 20:48:46', '2012-09-07 20:48:46', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, 613),
(218, 1, 'bugger off', '<p>\r\n	ho hoi</p>\r\n', 'published', '2012-09-07 21:43:05', '2012-09-07 21:43:05', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, 614),
(219, 1, 'new event', NULL, 'published', '2012-09-07 21:53:29', '2012-09-07 21:53:29', NULL, 0, 'Event', 'open', 1, 'all', NULL, 1, NULL, NULL),
(220, 1, 'new news', '<p>\r\n	ghjk</p>\r\n', 'published', '2012-09-07 21:53:52', '2012-09-07 21:53:52', NULL, 0, 'News', 'open', 1, 'all', NULL, 0, NULL, 615),
(221, 1, 'mypoage', '<p>\r\n	asbdj</p>\r\n', 'published', '2012-09-07 21:59:33', '2012-09-07 22:16:50', NULL, 0, 'Page', 'open', 1, 'all', NULL, 2, NULL, 616),
(222, 1, 'sdjvkfejwha', NULL, 'published', '2012-09-08 11:46:44', '2012-09-08 11:46:44', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, 617),
(223, NULL, 'hhgfvhsajjdsajd', NULL, 'published', '2012-09-08 11:48:16', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(224, NULL, 'hhgfvhsajjdsajd', NULL, 'published', '2012-09-08 11:48:37', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(225, NULL, 'hhgfvhsajjdsajd', NULL, 'published', '2012-09-08 11:48:54', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(226, NULL, 'hhgfvhsajjdsajd', NULL, 'published', '2012-09-08 11:54:50', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(227, NULL, 'hhgfvhsajjdsajd', NULL, 'published', '2012-09-08 11:55:08', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(228, NULL, 'hhgfvhsajjdsajd', NULL, 'published', '2012-09-08 11:55:12', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(229, NULL, 'hhgfvhsajjdsajd', NULL, 'published', '2012-09-08 11:55:38', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(230, NULL, 'hhgfvhsajjdsajd', NULL, 'published', '2012-09-08 11:58:27', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(231, NULL, 'hhgfvhsajjdsajd', NULL, 'published', '2012-09-08 11:58:45', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(232, NULL, 'hhgfvhsajjdsajd', NULL, 'published', '2012-09-08 11:59:11', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(233, NULL, 'hhgfvhsajjdsajd', NULL, 'published', '2012-09-08 11:59:25', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(234, NULL, 'hhgfvhsajjdsajd', NULL, 'published', '2012-09-08 12:00:27', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(235, NULL, 'kojihuygtfrdesw', NULL, 'published', '2012-09-08 12:03:05', '0000-00-00 00:00:00', NULL, 0, 'Page', 'open', 1, 'all', NULL, 0, NULL, NULL),
(236, 1, 'good bad ugly', NULL, 'published', '2012-09-08 12:08:22', '2012-09-08 12:08:22', NULL, 0, 'Page', 'open', 1, 'all', NULL, 1, NULL, 618),
(237, 1, 'quick and the dead', NULL, 'published', '2012-09-08 12:09:02', '2012-09-08 12:09:02', NULL, 0, 'Page', 'open', 1, 'all', NULL, 1, NULL, 619);

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
(212, 1);

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
(103, 'site', 'name', 'My Awesome Site', 'textfield');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=620 ;

--
-- Dumping data for table `slug`
--

INSERT INTO `slug` (`id`, `slug`, `path`, `enabled`) VALUES
(598, 'first-news', 'news/view/id/52', 1),
(603, 'xxxxxxxxxxxs', 'news/view/id/57', 1),
(604, 'new-newshahap', 'news/view/id/58', 1),
(605, 'qqq', 'news/view/id/59', 1),
(606, 'tada', 'event/view/id/4', 1),
(607, 'new-page-w-image', 'page/view/id/211', 1),
(608, 'screenshot', 'page/view/id/212', 1),
(609, 'home', 'core/admin/page/view/id/213', 1),
(610, 'title', 'core/admin/page/view/id/214', 1),
(611, 'sdfghj', 'core/admin/page/view/id/215', 1),
(612, 'next-page', 'core/page/view/id/216', 1),
(613, 'ajdhghsadh', 'core/page/view/id/217', 1),
(614, 'bugger-off', '/core/page/view/id/218', 1),
(615, 'new-news', 'core/news/view/id/60', 1),
(616, 'mypoage', 'page/view/id/221', 1),
(617, 'sdjvkfejwha', 'core/page/view/id/222', 1),
(618, 'good-bad-ugly', 'page/view/id/236', 1),
(619, 'quick-and-the-dead', 'page/view/id/237', 1);

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'xtranophilist@gmail.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '2012-09-07 10:29:15', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '0000-00-00 00:00:00', '2012-07-28 01:37:40', 0, 1),
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
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
