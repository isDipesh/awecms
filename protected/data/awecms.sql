-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2012 at 10:36 PM
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
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `thumbnail_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  KEY `thumbnail_id` (`thumbnail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `page_id`, `thumbnail_id`) VALUES
(10, 552, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `title`, `content`, `enabled`, `is_widget`, `widget_class`, `tag_name`, `html_options`, `decoration_css_class`, `title_css_class`, `content_css_class`, `hide_on_empty`, `skin`) VALUES
(5, 'Introduction', '<p>\r\n	<em><strong>Hello there</strong></em><br></p>\r\n', 1, 1, 'CWidget', 'div', NULL, 'portlet-decoration', 'portlet-title', 'portlet-content', 0, 'default'),
(6, 'Social Links', NULL, 1, 1, 'CWidget', 'div', NULL, 'portlet-decoration', 'portlet-title', 'portlet-content', 1, 'default'),
(7, 'home', '<p>\r\n	adxdghjsakdlsad</p>\r\n', 1, 0, 'CWidget', 'div', NULL, 'portlet-decoration', 'portlet-title', 'portlet-content', 1, 'default');

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
  `place_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `image` text,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  KEY `place_id` (`place_id`),
  KEY `district_id` (`district_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `business_category`
--

CREATE TABLE IF NOT EXISTS `business_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `business_category`
--

INSERT INTO `business_category` (`id`, `page_id`) VALUES
(14, 549),
(15, 550),
(16, 551);

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

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(3, 'New Category', 'Category DescriptionCategory DescriptionCategory DescriptionCategory DescriptionCategory DescriptionCategory DescriptionCategory '),
(4, 'another category', 'dasda');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=173 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `owner_id`, `owner_name`, `count`, `parent_id`, `creator_id`, `user_name`, `user_email`, `comment_text`, `create_time`, `update_time`, `status`, `link`) VALUES
(132, 1, 'Page', 10, NULL, 1, '', '', 'nope', 1338879845, 1347389205, 1, '/page/page/view/id/1?sid=3'),
(133, 1, 'Page', 1, 132, 1, NULL, NULL, 'okay', 1338879871, 1347389206, 1, '/page/page/view/id/1?sid=3'),
(135, 1, 'Page', 2, NULL, 1, NULL, NULL, 'dang', 1338881485, 1347389207, 1, '/page/page/view/id/1?sid=3'),
(136, 1, 'Page', 3, NULL, 1, NULL, NULL, 'pass', 1338881529, 1347389200, 0, '/comments/comment/postComment'),
(155, 1, 'Page', 25, NULL, NULL, 'My Name', 'My Email', 'haha', 1338914660, NULL, 0, '/page/page/view/id/1'),
(156, 1, 'Page', 26, NULL, NULL, '', '', 'comment', 1338914687, 1341487707, 1, '/comments/comment/postComment'),
(166, 1, 'Page', 36, NULL, NULL, 'myname', 'myemail@email.com', 'Great', 1338931377, 1341487708, 1, '/page/page/view/id/1'),
(167, 460, 'Page', 1, NULL, 1, NULL, NULL, 'new comment', 1347433134, NULL, 1, '/admin/page/view/id/460'),
(168, 488, 'Page', 1, NULL, 1, NULL, NULL, 'what the', 1347460041, NULL, 1, '/page/page/view/id/488'),
(169, 488, 'Page', 2, NULL, NULL, 'Dipesh', 'sad@sad.com', 'whoa', 1347460075, NULL, 0, '/comments/comment/postComment'),
(170, 488, 'Page', 3, NULL, 1, NULL, NULL, 'what''s next?', 1347460457, NULL, 1, '/first-page-haha-1'),
(171, 488, 'Page', 4, NULL, 1, NULL, NULL, 'twat', 1347465070, NULL, 1, '/page/page/view/id/488'),
(172, 488, 'Page', 5, NULL, 1, NULL, NULL, 'next comment', 1347465126, NULL, 1, '/page/page/view/id/488');

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
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `headquarter` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL,
  `zone_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `headquarter`, `zone`, `zone_id`) VALUES
(1, 'Achham', 'Mangalsen', '14', '2328'),
(2, 'Arghakhanchi', 'Sandhikharka', '8', '2322'),
(3, 'Baglung', 'Baglung', '3', '2317'),
(4, 'Baitadi', 'Baitadi', '9', '2323'),
(5, 'Bajhang', 'Chainpur', '14', '2328'),
(6, 'Bajura', 'Martadi', '14', '2328'),
(7, 'Banke', 'Nepalgunj', '2', '2316'),
(8, 'Bara', 'Kalaiya', '11', '2325'),
(9, 'Bardiya', 'Gularia', '2', '2316'),
(10, 'Bhaktapur', 'Bhaktapur', '1', '2315'),
(11, 'Bhojpur', 'Bhojpur', '7', '2321'),
(12, 'Chitwan', 'Bharatpur', '11', '2325'),
(13, 'Dadeldhura', 'Dadeldhura', '9', '2323'),
(14, 'Dailekh', 'Dailekh', '2', '2316'),
(15, 'Dang', 'Ghorahi', '12', '2326'),
(16, 'Darchula', 'Darchula', '9', '2323'),
(17, 'Dhading', 'Dhadingbesi', '1', '2315'),
(18, 'Dhankuta', 'Dhankuta', '7', '2321'),
(19, 'Dhanusa', 'Janakpur', '5', '2319'),
(20, 'Dolakha', 'Charikot', '5', '2319'),
(21, 'Dolpa', 'Dunai', '6', '2320'),
(22, 'Doti', 'Dipayal', '14', '2328'),
(23, 'Gorkha', 'Gorkha', '4', '2318'),
(24, 'Gulmi', 'Tamghas', '8', '2322'),
(25, 'Humla', 'Simikot', '6', '2320'),
(26, 'Ilam', 'Ilam', '10', '2324'),
(27, 'Jajarkot', 'Jajarkot', '2', '2316'),
(28, 'Jhapa', 'Chandragadhi', '10', '2324'),
(29, 'Jumla', 'Jumla', '6', '2320'),
(30, 'Kailali', 'Dhangadhi', '14', '2328'),
(31, 'Kalikot', 'Manma', '6', '2320'),
(32, 'Kanchanpur', 'Mahendranagar', '9', '2323'),
(33, 'Kapilvastu', 'Taulihawa', '8', '2322'),
(34, 'Kaski', 'Pokhara', '4', '2318'),
(35, 'Kathmandu', 'Kathmandu', '1', '2315'),
(36, 'Kavrepalanchok', 'Dhulikhel', '1', '2315'),
(37, 'Khotang', 'Diktel', '13', '2327'),
(38, 'Lalitpur', 'Lalitpur', '1', '2315'),
(39, 'Lamjung', 'Besisahar', '4', '2318'),
(40, 'Mahottari', 'Jaleswor', '5', '2319'),
(41, 'Makwanpur', 'Hetauda', '11', '2325'),
(42, 'Manang', 'Chame', '4', '2318'),
(43, 'Morang', 'Biratnagar', '7', '2321'),
(44, 'Mugu', 'Gamgadhi', '6', '2320'),
(45, 'Mustang', 'Jomosom', '3', '2317'),
(46, 'Myagdi', 'Beni', '3', '2317'),
(47, 'Nawalparasi', 'Parasi', '8', '2322'),
(48, 'Nuwakot', 'Bidur', '1', '2315'),
(49, 'Okhaldhunga', 'Okhaldhunga', '13', '2327'),
(50, 'Palpa', 'Tansen', '8', '2322'),
(51, 'Panchthar', 'Phidim', '10', '2324'),
(52, 'Parbat', 'Kusma', '3', '2317'),
(53, 'Parsa', 'Birganj', '11', '2325'),
(54, 'Pyuthan', 'Pyuthan', '12', '2326'),
(55, 'Ramechhap', 'Manthali', '5', '2319'),
(56, 'Rasuwa', 'Dhunche', '1', '2315'),
(57, 'Rautahat', 'Gaur', '11', '2325'),
(58, 'Rolpa', 'Livang', '12', '2326'),
(59, 'Rukum', 'Musikot', '12', '2326'),
(60, 'Rupandehi', 'Bhairahawa', '8', '2322'),
(61, 'Salyan', 'Salyan', '12', '2326'),
(62, 'Sankhuwasabha', 'Khadbari', '7', '2321'),
(63, 'Saptari', 'Rajbiraj', '13', '2327'),
(64, 'Sarlahi', 'Malangwa', '5', '2319'),
(65, 'Sindhuli', 'Sindhulimadhi', '5', '2319'),
(66, 'Sindhupalchok', 'Chautara', '1', '2315'),
(67, 'Siraha', 'Siraha', '13', '2327'),
(68, 'Solukhumbu', 'Salleri', '13', '2327'),
(69, 'Sunsari', 'Inaruwa', '7', '2321'),
(70, 'Surkhet', 'Birendranagar', '2', '2316'),
(71, 'Syangja', 'Syangja', '4', '2318'),
(72, 'Tanahu', 'Damauli', '4', '2318'),
(73, 'Taplejung', 'Taplejung', '10', '2324'),
(74, 'Tehrathum', 'Myanglung', '7', '2321'),
(75, 'Udayapur', 'Gaighat', '13', '2327');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `venue`, `start`, `end`, `whole_day_event`, `organizer`, `type`, `url`, `page_id`, `enabled`) VALUES
(5, 'Venue', NULL, NULL, 0, NULL, NULL, NULL, 553, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=244 ;

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
(1, 'Main', 1, 0, 0, 0, 'flickr', 'The main website mega menu.'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `menu_id`, `parent_id`, `depth`, `lft`, `rgt`, `name`, `enabled`, `target`, `description`, `link`, `type`, `role`) VALUES
(34, 1, 0, 1, 2, 3, 'Home', 1, NULL, '', '/', 'url', 'all'),
(45, 2, 0, 1, 4, 17, 'Users', 1, NULL, 'User related stuffs', '/user', 'url', 'super'),
(46, 2, 45, 2, 7, 8, 'Manage Users', 1, NULL, '', '/user/manage', 'url', 'super'),
(47, 2, 45, 2, 9, 10, 'Create User', 1, NULL, NULL, '/user/admin/create', 'url', 'super'),
(48, 2, 45, 2, 11, 12, 'Manage Profile Fields', 1, NULL, NULL, '/user/profileField', 'url', 'super'),
(49, 2, 45, 2, 13, 14, 'Create Profile Field', 1, NULL, NULL, '/user/profileField/create', 'url', 'super'),
(50, 1, 0, 1, 10, 11, 'Login', 0, NULL, '', '/login', 'url', 'guest'),
(51, 1, 0, 1, 8, 9, 'Logout', 0, NULL, '', '/logout', 'url', 'loggedIn'),
(52, 2, 45, 2, 5, 6, 'List Users', 1, NULL, NULL, '/user', 'url', 'super'),
(53, 2, 0, 1, 30, 43, 'Design', 1, NULL, NULL, NULL, 'url', 'super'),
(54, 2, 53, 2, 31, 40, 'Menu', 1, NULL, NULL, '/menu', 'url', 'super'),
(55, 2, 54, 3, 34, 35, 'Manage Menus', 1, NULL, NULL, '/menu', 'url', 'super'),
(56, 2, 54, 3, 32, 33, 'Create New Menu', 1, NULL, NULL, '/menu/menu/create', 'url', 'super'),
(59, 2, 53, 2, 41, 42, 'Themes', 1, NULL, NULL, NULL, 'url', NULL),
(60, 2, 0, 1, 18, 29, 'Content', 1, NULL, NULL, NULL, 'url', 'super'),
(61, 2, 60, 2, 19, 20, 'Pages', 1, NULL, NULL, '/page', 'url', 'super'),
(62, 2, 60, 2, 25, 26, 'Comments', 1, NULL, NULL, '/comments', 'url', 'super'),
(63, 2, 45, 2, 15, 16, 'Roles', 1, NULL, NULL, '/role', 'url', 'super'),
(64, 2, 60, 2, 23, 24, 'Categories', 1, NULL, NULL, '/category', 'url', 'super'),
(66, 2, 54, 3, 36, 37, 'Edit Main Menu', 1, NULL, NULL, '/menu/item?id=1', 'url', 'super'),
(67, 2, 54, 3, 38, 39, 'Edit Admin Menu', 1, NULL, NULL, '/menu/item?id=3', 'url', 'super'),
(71, 1, 0, 1, 4, 7, 'Dashboard', 0, NULL, '', '/admin', 'module', 'super'),
(72, 2, 60, 2, 27, 28, 'Files', 1, NULL, NULL, '/file', 'url', 'super'),
(74, 2, 60, 2, 21, 22, 'Blocks', 1, NULL, '', '/block', 'module', 'all'),
(76, 1, 0, 1, 12, 13, 'Event', 0, NULL, '', '/event', 'module', 'all'),
(77, 3, 0, 1, 44, 45, 'E-mail', 1, NULL, 'Check you e-mail', 'http://webmail.hotc.org.np/', 'url', 'all'),
(78, 1, 0, 1, 14, 15, 'Name', 1, NULL, '', NULL, 'content', NULL),
(79, 1, 71, 2, 5, 6, 'testarea', 1, NULL, '', '/comments', 'module', 'all'),
(80, 1, 0, 1, 46, 47, 'New Item', 1, NULL, '', '/bhaskarsssss', 'content', NULL),
(81, 1, 0, 1, 48, 49, 'New Event', 1, NULL, '', '/event/view?id=4', 'content', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=554 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `user_id`, `title`, `content`, `status`, `created_at`, `modified_at`, `parent_id`, `order`, `type`, `comment_status`, `tags_enabled`, `permission`, `password`, `views`, `layout`, `slug_id`) VALUES
(549, 1, 'Hospital and Health Services', 'Category Description goes here!', 'published', '2012-10-13 02:21:17', '2012-10-13 02:22:20', NULL, 0, 'BusinessCategory', 'open', 1, 'all', NULL, 3, NULL, 733),
(550, 1, 'Educational Institutes', NULL, 'published', '2012-10-13 02:22:52', '2012-10-13 02:22:52', NULL, 0, 'BusinessCategory', 'open', 1, 'all', NULL, 1, NULL, 734),
(551, 1, 'IT Companies', NULL, 'published', '2012-10-13 02:23:21', '2012-10-13 02:23:22', NULL, 0, 'BusinessCategory', 'open', 1, 'all', NULL, 1, NULL, 735),
(552, 1, 'New Gallery', 'Description goes here', 'published', '2012-10-13 02:40:00', '2012-10-13 02:42:04', NULL, 0, 'Album', 'open', 1, 'all', NULL, 3, NULL, 736),
(553, 1, 'New Event', '<p><b>&nbsp;Haha</b></p>', 'published', '2012-10-13 02:54:03', '2012-10-13 02:58:05', NULL, 0, 'Event', 'open', 1, 'all', NULL, 6, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `other_names` varchar(255) DEFAULT NULL COMMENT 'comma separated',
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `airport_code` varchar(50) DEFAULT NULL,
  `short_name` varchar(10) DEFAULT NULL,
  `weather_code` varchar(50) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL COMMENT 'city/district/village/zone/site',
  PRIMARY KEY (`id`),
  KEY `district_id` (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
(8, 'adsfg'),
(9, 'Dipesh Acharya'),
(10, '');

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
  `hint` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `category`, `key`, `value`, `type`, `hint`) VALUES
(68, 'site', 'logo', 'http://localhost/askwhole/images/a.png', 'image_url', NULL),
(69, 'site', 'admin_email', 'email@admin.net', 'email', NULL),
(70, 'site', 'maintenance_mode', '0', 'boolean', 'Select to enable maintenance mode.'),
(71, 'site', 'maintenance_text', 'Sorry folks, the site is under maintenance. Please check back again in 83 seconds!', 'textarea', NULL),
(96, 'user', 'registration_enabled', '1', 'boolean', NULL),
(105, 'Gallery', 'uploadPath', '/../uploads', 'textfield', 'The path were uploaded images are stored. Usually /../uploads'),
(106, 'Gallery', 'uploadUrl', '/uploads/', 'textfield', NULL),
(107, 'site', 'name', 'Awecms Beta', 'textfield', 'The name of the Site'),
(108, 'place', 'name', 'Bhairahawa', 'textfield', ''),
(109, 'place', 'other_names', 'Bhairawa, Siddharthanagar', 'textfield', ''),
(110, 'place', 'search_key', 'Bhairahawa OR Bhairawa', 'textfield', ''),
(111, 'place', 'location_code', 'ASI%7CNP%7CNP000%7CBHAIRAHAWA%7C', 'textfield', ''),
(112, 'place', 'jkhjk', 'jhjk', 'textfield', ''),
(113, 'place', 'new key', 'haha', 'textfield', 'haha'),
(114, 'site', 'google_analytics_tracking_id', '', 'textfield', 'Tracking ID available from https://www.google.com/analytics');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=737 ;

--
-- Dumping data for table `slug`
--

INSERT INTO `slug` (`id`, `slug`, `path`, `enabled`) VALUES
(713, 'hardware', 'directory/view/id/6', 1),
(714, 'nexus-7', 'directory/business/view/id/17', 1),
(715, 'gae', 'directory/business/view/id/18', 1),
(716, 'tramp', 'news/view/id/13', 1),
(717, 'news-1', 'news/view/id/14', 1),
(718, 'page-1', 'news/view/id/12', 1),
(720, 'twat', 'news/view/id/4', 1),
(723, 'event-1', 'page/view/id/498', 1),
(725, '-1', 'news/view/id/6', 1),
(726, 'nepzilla', 'directory/business/view/id/19', 1),
(727, 'titlesssssssssssssss', 'page/view/id/545', 1),
(729, 'another', 'gallery/view/id/8', 1),
(730, 'patient', 'news/view/id/1', 1),
(731, 'app', 'page/view/id/488', 1),
(732, 'bhaskarsssss', 'page/view/id/547', 1),
(733, 'hospitals', 'directory/view/id/14', 1),
(734, 'educational-institutes', 'directory/view/id/15', 1),
(735, 'it-companies', 'directory/view/id/16', 1),
(736, 'new-gallery', 'gallery/view/id/10', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'xtranophilist@gmail.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '2012-10-12 10:46:06', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '0000-00-00 00:00:00', '2012-07-28 01:37:40', 0, 1),
(4, 'admina', 'a5d5dd525b4dc07b915448482da44974', 'admina@admina.c', '5c7ad3d0afd32f1353ee6bce1f223552', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(6, 'adminas', '5f4dcc3b5aa765d61d8327deb882cf99', 'xtradasf@dsad.com', 'fb87fb607c3c5e901beb90059f54aba7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(7, 'myname', 'a029d0df84eb5549c641e04a9ef389e5', 'my@ghj.com', '66052ff289b9d7fc25a9c1d8fdec7a86', '2012-06-29 10:59:31', '0000-00-00 00:00:00', 0, 0),
(8, 'newUsers', '5f4dcc3b5aa765d61d8327deb882cf99', 'xdsf@dasf.com', '7c0ba2b9ca5fb1a65a5af8b9201d6293', '2012-06-29 11:18:33', '0000-00-00 00:00:00', 1, 1),
(9, 'dipson', 'a73bb2654e75dd0449078254e29b7ac8', 'xtranophilist+11@gmail.com', '9f8877c9fd8d807a7e80350fca76a6b7', '2012-09-28 15:17:52', '0000-00-00 00:00:00', 0, 0),
(10, 'dipesh', '1c1d15237b2433f18f588d8bf6984751', 'dipesh@dip.com', '2b9ba8e6f0285a90cb96df44efd93952', '2012-09-28 16:04:41', '0000-00-00 00:00:00', 0, 1);

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
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`),
  ADD CONSTRAINT `album_ibfk_3` FOREIGN KEY (`thumbnail_id`) REFERENCES `image` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`),
  ADD CONSTRAINT `business_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`),
  ADD CONSTRAINT `business_ibfk_3` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`);

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
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`);

--
-- Constraints for table `user_nm_role`
--
ALTER TABLE `user_nm_role`
  ADD CONSTRAINT `user_nm_role_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_nm_role_ibfk_4` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
