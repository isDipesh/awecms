-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2011 at 12:55 PM
-- Server version: 5.1.58
-- PHP Version: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_albums`
--

CREATE TABLE IF NOT EXISTS `tbl_albums` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `pid` int(4) NOT NULL,
  `url` text NOT NULL,
  `translations` text NOT NULL,
  `imgsOrder` text NOT NULL,
  `imgsInfo` text NOT NULL,
  `cover` varchar(256) NOT NULL,
  `itemInfoShop` text NOT NULL,
  `author` varchar(128) NOT NULL,
  `tags` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `tbl_albums`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_collections`
--

CREATE TABLE IF NOT EXISTS `tbl_collections` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `pid` int(4) NOT NULL,
  `url` text NOT NULL,
  `translations` text NOT NULL,
  `albums` varchar(128) NOT NULL,
  `author` varchar(128) NOT NULL,
  `tags` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_collections`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_galleryConfig`
--

CREATE TABLE IF NOT EXISTS `tbl_galleryConfig` (
  `type` varchar(16) NOT NULL,
  `config` text NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_galleryConfig`
--

INSERT INTO `tbl_galleryConfig` (`type`, `config`) VALUES
('gallery', 'a:25:{s:8:"cssTheme";s:6:"simple";s:10:"thumbStyle";s:9:"landscape";s:10:"thumbWidth";i:160;s:10:"ratioThumb";d:0.6999999999999999555910790149937383830547332763671875;s:8:"imgWidth";i:900;s:7:"thWidth";i:200;s:7:"quality";i:75;s:7:"sharpen";i:20;s:7:"gFolder";s:9:"galleries";s:12:"keepOriginal";b:0;s:10:"useWysiwyg";b:1;s:9:"usedTitle";s:8:"filename";s:15:"predefinedTitle";s:114:"<strong>Title:</strong> Product title <br/><strong>Model:</strong> Product model<br/><strong>Price:</strong> $ 100";s:17:"editorCreateAlbum";b:1;s:13:"editorOfOther";b:1;s:23:"editorOperateCollection";b:1;s:18:"editorSeeAllAlbums";b:1;s:16:"coreScriptPosEnd";b:0;s:14:"isMultilingual";b:1;s:15:"defaultLanguage";s:2:"en";s:9:"languages";s:6:"en, ro";s:11:"isShopStyle";b:0;s:15:"hCollectionShop";b:1;s:23:"itemWidthCollectionShop";i:140;s:12:"itemInfoShop";s:61:"ProductID\nAvailability\nName\nModel\nPrice\nCoin\nVTA\nQuantity\nUrl";}'),
('album', 'a:8:{s:14:"showAlbumTitle";b:1;s:25:"showAlbumTitleDescription";b:1;s:13:"showAlbumTags";b:1;s:11:"thTitleShow";b:0;s:10:"useInfoBox";b:1;s:15:"itemsOnPaginate";i:12;s:11:"itemsOnLine";i:4;s:12:"hideTooltips";b:0;}'),
('fancybox', 'a:10:{s:13:"titlePosition";s:6:"inside";s:13:"easingEnabled";b:1;s:12:"mouseEnabled";i:1;s:12:"transitionIn";s:7:"elastic";s:13:"transitionOut";s:7:"elastic";s:7:"speedIn";i:600;s:8:"speedOut";i:200;s:11:"overlayShow";b:1;s:5:"width";i:350;s:6:"height";s:4:"auto";}'),
('uploader', 'a:6:{s:3:"max";i:-1;s:6:"accept";s:16:"jpg|png|gif|jpeg";s:12:"unique_names";b:0;s:13:"max_file_size";i:3;s:16:"pluploadLanguage";s:4:"auto";s:8:"runtimes";s:12:"html5, flash";}'),
('collection', 'a:7:{s:19:"showCollectionTitle";b:1;s:25:"showCollectionDescription";b:1;s:18:"showCollectionTags";b:1;s:18:"combinedAlbumsTags";b:1;s:13:"showCoverName";b:1;s:20:"showCoverDescription";b:1;s:13:"showCoverTags";b:1;}');