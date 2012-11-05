-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2012 at 05:56 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `place_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `image` text,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  KEY `place_id` (`place_id`),
  KEY `district_id` (`district_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `business_category`
--

CREATE TABLE IF NOT EXISTS `business_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
(1, 'Main', 1, 0, 0, 0, 'nvidia', 'The main website mega menu.'),
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
(34, 1, 78, 2, 7, 8, 'Home', 1, NULL, '', '/', 'url', 'all'),
(45, 2, 0, 1, 2, 15, 'Users', 1, NULL, 'User related stuffs', '/user', 'url', 'super'),
(46, 2, 45, 2, 5, 6, 'Manage Users', 1, NULL, '', '/user/manage', 'url', 'super'),
(47, 2, 45, 2, 7, 8, 'Create User', 1, NULL, NULL, '/user/admin/create', 'url', 'super'),
(48, 2, 45, 2, 9, 10, 'Manage Profile Fields', 1, NULL, NULL, '/user/profileField', 'url', 'super'),
(49, 2, 45, 2, 11, 12, 'Create Profile Field', 1, NULL, NULL, '/user/profileField/create', 'url', 'super'),
(50, 1, 80, 3, 18, 19, 'Login', 1, NULL, '', '/login', 'url', 'guest'),
(51, 1, 80, 3, 16, 17, 'Logout', 1, NULL, '', '/logout', 'url', 'loggedIn'),
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
(71, 1, 0, 1, 2, 5, 'Dashboard', 1, NULL, '', '/admin', 'module', 'super'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=568 ;

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
-- Table structure for table `page_nm_tag`
--

CREATE TABLE IF NOT EXISTS `page_nm_tag` (
  `page_id` int(11) NOT NULL,
  `tag_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`page_id`,`tag_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, '');

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
(102, 'SEO', 'slugs_enabled', '1', 'boolean', ''),
(111, 'SEO', 'enable_meta_description_for_homepage', '1', 'boolean', ''),
(112, 'SEO', 'enable_meta_description_for_all_pages', '1', 'boolean', ''),
(113, 'SEO', 'meta_description', 'Meta Description for Site', 'textarea', 'Visible in SERP.'),
(121, 'SEO', 'enable_meta_keywords', '1', 'boolean', ''),
(122, 'SEO', 'meta_keywords', 'keywords, all', 'textfield', ''),
(123, 'SEO', 'use_page_tags_for_keywords', '1', 'boolean', ''),
(124, 'SEO', 'enable_open_graph_meta_tags', '0', 'boolean', ''),
(131, 'SEO', 'enable_google_analytics', '1', 'boolean', ''),
(132, 'SEO', 'google_analytics_tracking_ID', '', 'textfield', 'Tracking ID available from https://www.google.com/analytics'),
(201, 'user', 'registration_enabled', '1', 'boolean', NULL),
(301, 'Gallery', 'uploadPath', '/../uploads', 'textfield', 'The path were uploaded images are stored. Usually /../uploads'),
(302, 'Gallery', 'uploadUrl', '/uploads/', 'textfield', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'xtranophilist@gmail.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '2012-11-04 12:50:30', 1, 1);

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
-- Constraints for table `page_nm_tag`
--
ALTER TABLE `page_nm_tag`
  ADD CONSTRAINT `page_nm_tag_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `page_nm_tag_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
