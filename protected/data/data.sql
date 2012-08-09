-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2012 at 03:08 PM
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

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `module`, `controller`, `action`, `enabled`, `all`, `loggedIn`, `guest`, `rule`) VALUES
(6, 'search', 'search', 'Index', 1, 1, 0, 1, 'deny'),
(7, 'category', 'category', 'Create', 1, 0, 0, 0, 'allow');

--
-- Dumping data for table `access_nm_role`
--

INSERT INTO `access_nm_role` (`access_id`, `role_id`) VALUES
(7, 1);

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'qpp', 'haha'),
(2, 'another category', 'nananana');

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

--
-- Dumping data for table `comment_setting`
--

INSERT INTO `comment_setting` (`id`, `model`, `registeredOnly`, `useCaptcha`, `allowSubcommenting`, `premoderate`, `isSuperuser`, `orderComments`, `useGravatar`) VALUES
(1, 'default', 0, 0, 1, 1, 'Yii::app()->getModule("user")->isAdmin()', 'ASC', 1);

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `user_id`, `title`, `status`, `created_at`, `modified_at`, `parent`, `order`, `type`, `comment_status`, `tags_enabled`, `permission`, `password`, `views`) VALUES
(1, 1, 'Title', 'published', '2012-05-05 00:00:00', '2012-05-05 00:00:00', 1, 0, 'post', 'open', 1, 'all', 'password', 0),
(4, NULL, 'Page Title Here', 'published', '2012-05-05 00:00:00', '2012-05-05 00:00:00', 1, 0, 'post', 'open', 1, 'all', 'password', 0);

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

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `venue`, `start`, `end`, `whole_day_event`, `organizer`, `type`, `url`, `page_id`, `enabled`) VALUES
(1, 'Prayag Marga,\r\nNew Baneshwor,\r\nKathmandu,\r\nBagmati,\r\nNepal.', '2012-07-28 16:19:00', '2012-07-29 16:19:00', 0, 'Nepzilla Solutions', NULL, NULL, 204, 1),
(2, 'Islington College,\r\nKamalpokhari,\r\nKathmandu', '2012-07-04 00:00:00', '2012-07-05 00:00:00', 0, 'Islington College', NULL, 'http://islington.edu.np', 199, 1);

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `enabled`, `vertical`, `rtl`, `upward`, `theme`, `description`) VALUES
(1, 'Main', 1, 0, 0, 0, 'default', 'The main website mega menu.'),
(3, 'Admin', 1, 0, 0, 0, 'mtv', 'Menu for admin/backend dashboard.');

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

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `page_id`) VALUES
(52, 201),
(57, 206),
(58, 207),
(59, 208);

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `user_id`, `title`, `content`, `status`, `created_at`, `modified_at`, `parent_id`, `order`, `type`, `comment_status`, `tags_enabled`, `permission`, `password`, `views`, `layout`, `slug_id`) VALUES
(199, 1, 'Another Event', '<p>\r\n	Everybody is welcome!</p>\r\n', 'published', '2012-07-28 01:14:45', '2012-07-29 12:35:49', NULL, 0, 'Event', 'open', 1, 'all', NULL, 3, NULL, NULL),
(200, 1, 'First News', NULL, 'published', '2012-07-28 01:16:02', '0000-00-00 00:00:00', NULL, 0, 'News', 'open', 1, 'all', NULL, 0, NULL, NULL),
(201, 1, 'First New', NULL, 'published', '2012-07-28 01:17:13', '2012-07-28 16:49:18', NULL, 0, 'News', 'open', 1, 'all', NULL, 9, NULL, 598),
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
(212, 1, 'Screenshot', '<p>\r\n	<img alt="" src="/uploads/editor/Screenshot from 2012-07-30 21:39:19.png" style="width: 1280px; height: 800px;" /></p>\r\n', 'published', '2012-07-31 14:43:45', '2012-07-31 14:43:46', NULL, 0, 'Page', 'open', 1, 'all', NULL, 1, NULL, 608);

--
-- Dumping data for table `page_nm_category`
--

INSERT INTO `page_nm_category` (`page_id`, `category_id`) VALUES
(212, 1);

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

--
-- Dumping data for table `profile_field`
--

INSERT INTO `profile_field` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(4, 'firstname', 'First Name', 'VARCHAR', 255, 2, 2, '', '', '', '', '', '', '', 0, 3);

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `active`) VALUES
(1, 'super', NULL, 1),
(4, 'moderator', NULL, 1),
(5, 'normal', NULL, 1),
(6, 'newroles', NULL, 1);

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
(608, 'screenshot', 'page/view/id/212', 1);

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `birthdate`, `birthtime`, `enabled`, `status`, `slogan`, `content`, `created_at`, `changed_at`, `modified_at`, `image`, `email`, `uri`, `qualification`, `user_id`) VALUES
(1, 'a ', '2012-05-08', '2012-05-30 07:16:37', 1, 'published', 'My stupid slogan', 'hakslnbwqijd aisjfkmndb jikdfnjd iwaokdsnjfiwekmd\r\nBa,m badsa\r\naskjdhnajks\r\nadnajds', '2012-05-23 04:11:19', '2012-05-21 00:18:48', '2012-05-20 14:33:11', 'http://localhost/askwhole/images/a.png', 'xtra@dhasg.com', 'http://yiiblog.info/blog/2011/04/yii-cdetailview-code-demo/', '', 0),
(2, 'Test 2', '2012-05-22', '2012-05-14 10:20:35', 1, 'drafted', 'slogan slogan', 'long text here', '2012-05-23 04:11:19', '2012-05-21 01:47:53', '2012-05-20 15:33:29', 'image', 'email', 'uri', '', 0),
(3, 'My Name', '2012-05-22', '2012-05-20 21:54:00', 1, 'deleted', 'slogans go here', 'contents go here', '2012-05-20 21:54:34', '2012-05-20 21:56:25', '2012-05-20 16:09:34', 'http://localhost/askwhole/images/a.png', 'e', 'u', '', 0),
(5, 'myname', '2012-05-02', '2012-05-19 00:00:00', 0, 'published', 'Haiabsd', '<strong>apple</strong>', '2012-05-21 13:48:11', '2012-05-21 14:04:23', '2012-05-21 08:03:11', 'http://localhost/askwhole/images/a.png', 'xtranophilist@gmail.com', 'http://google.com/', '', 0),
(6, 'myname', '2012-05-22', '2012-05-23 00:24:25', 1, 'published', 'asD asd', 'adasdsad', '2012-05-29 00:00:00', '2012-05-09 00:00:00', '2012-05-24 18:57:05', 'http://google.com/', 'email', '', 'SLC,+2,Masters', 0);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'xtranophilist@gmail.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '2012-07-18 04:29:58', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '0000-00-00 00:00:00', '2012-07-28 01:37:40', 0, 1),
(4, 'admina', 'a5d5dd525b4dc07b915448482da44974', 'admina@admina.c', '5c7ad3d0afd32f1353ee6bce1f223552', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(6, 'adminas', '5f4dcc3b5aa765d61d8327deb882cf99', 'xtradasf@dsad.com', 'fb87fb607c3c5e901beb90059f54aba7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(7, 'myname', 'a029d0df84eb5549c641e04a9ef389e5', 'my@ghj.com', '66052ff289b9d7fc25a9c1d8fdec7a86', '2012-06-29 10:59:31', '0000-00-00 00:00:00', 0, 0),
(8, 'newUsers', '5f4dcc3b5aa765d61d8327deb882cf99', 'xdsf@dasf.com', '7c0ba2b9ca5fb1a65a5af8b9201d6293', '2012-06-29 11:18:33', '0000-00-00 00:00:00', 1, 1);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
