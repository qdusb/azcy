-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-01-09 09:25:37
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `azcy`
--

-- --------------------------------------------------------

--
-- 表的结构 `active`
--

CREATE TABLE IF NOT EXISTS `active` (
  `id` int(10) unsigned NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QQ` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `modify_time` datetime DEFAULT NULL,
  `state` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`product_id`),
  KEY `admin_id` (`phone`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `active`
--

INSERT INTO `active` (`id`, `sort`, `user_name`, `phone`, `QQ`, `city`, `area`, `class_id`, `product_name`, `product_id`, `create_time`, `modify_time`, `state`) VALUES
(1, 10, 'dd', 'dd', 'dd', 'dd', 'dd', NULL, NULL, NULL, '2013-08-16 10:01:00', NULL, 1),
(2, 20, 'dd', 'dd', 'dd', 'dd', 'dd', '107102,', '活动一', NULL, '2013-08-16 10:45:00', NULL, NULL),
(3, 30, 'dd', 'dd', 'dd', 'dd', 'dd', '107102', '活动一', NULL, '2013-08-16 10:02:00', NULL, NULL),
(4, 40, 'dd', 'dd', 'dd', 'dd', 'dd', '107102', '活动一', NULL, '2013-08-16 10:12:00', NULL, NULL),
(5, 50, 'dd', 'dd', 'dd', 'dd', 'dd', '107102', '活动一', NULL, '2013-08-16 10:15:00', NULL, NULL),
(6, 60, 'dd', 'dd', 'dd', 'dd', 'dd', '107102', '活动一', NULL, '2013-08-16 10:37:00', NULL, NULL),
(7, 70, 'ibw_xu256', '136556303465', '277484936', 'hefei', '合肥', '107102', '活动一', '7', '2013-08-16 10:15:00', NULL, 1),
(8, 80, 'ibw_xu256', '136556303465', '277484936', 'hefei', '合肥', '107102', '活动一', '8', '2013-08-16 10:32:00', NULL, 1),
(9, 90, 'ibw_xu256', '136556303465', '277484936', 'hefei', '合肥', '107102', '活动一', '1', '2013-08-16 10:17:00', NULL, NULL),
(10, 100, 'ibw_xu256', '136556303465', '277484936', 'hefei', '合肥', '107102', '活动一', '1', '2013-08-16 10:26:00', NULL, 1),
(11, 110, '第三方后水电费', '13566003322', '277484936', '巢湖', '东方新世界', '107102', '活动一', '5', '2013-08-16 10:49:00', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `real_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `grade` tinyint(1) unsigned NOT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  `create_time` datetime NOT NULL,
  `modify_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`, `real_name`, `grade`, `state`, `create_time`, `modify_time`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', '系统管理员', 8, 1, '2014-03-19 02:45:53', '2014-03-19 02:45:53');

-- --------------------------------------------------------

--
-- 表的结构 `admin_advanced`
--

CREATE TABLE IF NOT EXISTS `admin_advanced` (
  `admin_id` int(10) unsigned NOT NULL,
  `advanced_id` int(10) unsigned NOT NULL,
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) unsigned NOT NULL,
  `login_time` datetime NOT NULL,
  `login_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_id` (`admin_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `admin_login`
--

INSERT INTO `admin_login` (`id`, `admin_id`, `login_time`, `login_ip`) VALUES
(1, 1, '2014-12-31 11:08:02', '127.0.0.1'),
(2, 1, '2014-12-31 11:24:33', '127.0.0.1'),
(3, 1, '2014-12-31 11:49:11', '127.0.0.1'),
(4, 1, '2014-12-31 11:49:14', '127.0.0.1'),
(5, 1, '2014-12-31 11:49:15', '127.0.0.1'),
(6, 1, '2014-12-31 11:49:20', '127.0.0.1'),
(7, 1, '2014-12-31 11:49:31', '127.0.0.1'),
(8, 1, '2014-12-31 11:49:34', '127.0.0.1'),
(9, 1, '2014-12-31 12:23:00', '127.0.0.1'),
(10, 1, '2014-12-31 12:23:02', '127.0.0.1'),
(11, 1, '2014-12-31 12:23:04', '127.0.0.1'),
(12, 1, '2014-12-31 12:23:05', '127.0.0.1'),
(13, 1, '2014-12-31 12:23:11', '127.0.0.1'),
(14, 1, '2014-12-31 12:23:35', '127.0.0.1'),
(15, 1, '2015-01-04 09:04:24', '127.0.0.1'),
(16, 1, '2015-01-04 09:04:27', '127.0.0.1'),
(17, 1, '2015-01-04 09:04:31', '127.0.0.1'),
(18, 1, '2015-01-04 09:04:48', '127.0.0.1'),
(19, 1, '2015-01-04 09:04:54', '127.0.0.1'),
(20, 1, '2015-01-04 09:08:32', '127.0.0.1'),
(21, 1, '2015-01-04 09:08:50', '127.0.0.1'),
(22, 1, '2015-01-04 09:09:00', '127.0.0.1'),
(23, 1, '2015-01-04 09:16:15', '127.0.0.1'),
(24, 1, '2015-01-08 09:57:30', '127.0.0.1'),
(25, 1, '2015-01-09 14:59:00', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `admin_popedom`
--

CREATE TABLE IF NOT EXISTS `admin_popedom` (
  `admin_id` int(10) unsigned NOT NULL,
  `class_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `admin_popedom`
--

INSERT INTO `admin_popedom` (`admin_id`, `class_id`) VALUES
(1, '104'),
(1, '103'),
(1, '102'),
(1, '101'),
(2, '114'),
(2, '101'),
(1, '114');

-- --------------------------------------------------------

--
-- 表的结构 `advanced`
--

CREATE TABLE IF NOT EXISTS `advanced` (
  `id` int(10) unsigned NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `advanced`
--

INSERT INTO `advanced` (`id`, `sort`, `name`, `state`) VALUES
(2, 20, '广告管理', 1),
(9, 90, '留言簿', 1),
(1, 10, '基本设置', 1),
(3, 30, '链接管理', 1),
(4, 40, '链接分类管理', 1),
(5, 50, 'Banner管理', 1),
(6, 60, 'Banner分类管理', 1),
(10, 180, '加入我们', 0),
(7, 70, '招聘职位', 1),
(8, 80, '应聘人员', 0),
(11, 110, '会员管理', 1),
(12, 15, '一级分类管理', 1),
(13, 120, '报名管理', 0),
(14, 130, '电子杂志管理', 0),
(15, 140, '员工管理', 0),
(16, 150, '资料批量转移', 0),
(17, 160, '董事长信箱', 0),
(18, 190, '批量上传', 1);

-- --------------------------------------------------------

--
-- 表的结构 `adver`
--

CREATE TABLE IF NOT EXISTS `adver` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `time` int(11) NOT NULL,
  `pic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `adver`
--

INSERT INTO `adver` (`id`, `title`, `mode`, `url`, `width`, `height`, `time`, `pic`, `state`) VALUES
(1, '广告', 'hangL', '', 142, 569, 0, '2014-04/139726799844345900.png', 0);

-- --------------------------------------------------------

--
-- 表的结构 `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(10) NOT NULL,
  `sort` int(8) DEFAULT '0',
  `class_id` varchar(30) CHARACTER SET gbk NOT NULL,
  `pic` varchar(60) CHARACTER SET gbk NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` varchar(60) CHARACTER SET gbk NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `album_class`
--

CREATE TABLE IF NOT EXISTS `album_class` (
  `id` int(10) NOT NULL,
  `sort` int(10) DEFAULT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` int(8) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `sortnum` int(20) NOT NULL,
  `title` varchar(100) CHARACTER SET gbk NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `url` varchar(200) CHARACTER SET gbk NOT NULL,
  `pic` varchar(200) CHARACTER SET gbk NOT NULL,
  `width` int(10) NOT NULL,
  `height` int(10) NOT NULL,
  `state` int(10) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `banner`
--

INSERT INTO `banner` (`id`, `class_id`, `sortnum`, `title`, `content`, `url`, `pic`, `width`, `height`, `state`) VALUES
(1, 1, 10, '图片1', '', '', '2014-03/139519447704288600.jpg', 0, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `banner_class`
--

CREATE TABLE IF NOT EXISTS `banner_class` (
  `id` int(10) NOT NULL,
  `sortnum` int(20) NOT NULL,
  `name` varchar(100) CHARACTER SET gbk NOT NULL,
  `add_deny` int(10) NOT NULL,
  `delete_deny` int(10) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `banner_class`
--

INSERT INTO `banner_class` (`id`, `sortnum`, `name`, `add_deny`, `delete_deny`) VALUES
(1, 10, '页面Banner', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL,
  `sortnum` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `house_type` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estate` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `budget` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_time` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `eduction` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `state` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `config_base`
--

CREATE TABLE IF NOT EXISTS `config_base` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icp` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci,
  `javascript` text COLLATE utf8_unicode_ci,
  `views` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `config_base`
--

INSERT INTO `config_base` (`id`, `name`, `address`, `title`, `icp`, `keyword`, `description`, `contact`, `javascript`, `views`) VALUES
(1, '安振产业投资集团', '<p>\r\n	安振产业投资集团\r\n</p>\r\n<p>\r\n	电话：021-5111-3643\r\n</p>\r\n<p>\r\n	传真：021-5111-3654\r\n</p>\r\n<p>\r\n	邮箱：isao.yoshida@ifst.com.cn\r\n</p>\r\n<p>\r\n	地址:上海市中山西路933号虹桥银城大厦26层2601-2608室(200051)\r\n</p>', '安振产业投资集团', '皖ICP备08000675号', '安振产业投资集团', '安振产业投资集团', '<p>\r\n	贵宾热线：0551-63411788 2014安振产业投资集团 版权所有 皖ICP备0908659号 免责声明 技术支持：安徽网新\r\n</p>', '', 173);

-- --------------------------------------------------------

--
-- 表的结构 `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(10) unsigned NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) DEFAULT NULL,
  `admin_id` int(10) unsigned DEFAULT NULL,
  `class_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `o_class_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annex` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` varchar(800) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `views` int(10) unsigned DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `modify_time` datetime DEFAULT NULL,
  `state` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `info`
--

INSERT INTO `info` (`id`, `sort`, `title`, `level`, `admin_id`, `class_id`, `o_class_id`, `author`, `source`, `website`, `pic`, `annex`, `keyword`, `intro`, `content`, `views`, `create_time`, `modify_time`, `state`) VALUES
(2, 10, '2014春季旅游', 0, 1, '101101', NULL, '', '', '', '20150108/54ae22189ec4c.jpg', '20150108/54ae2238309d1.docx', '', '', '', 0, '2015-01-08 10:46:52', '2015-01-08 14:22:48', 1);

-- --------------------------------------------------------

--
-- 表的结构 `info_class`
--

CREATE TABLE IF NOT EXISTS `info_class` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `en_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `files` text COLLATE utf8_unicode_ci,
  `info_state` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `max_level` tinyint(1) unsigned NOT NULL,
  `has_sub` tinyint(1) unsigned NOT NULL,
  `sub_content` tinyint(1) unsigned NOT NULL,
  `sub_pic` tinyint(1) unsigned NOT NULL,
  `hasViews` tinyint(1) unsigned NOT NULL,
  `hasState` tinyint(1) unsigned NOT NULL,
  `hasPic` tinyint(1) unsigned NOT NULL,
  `hasAnnex` tinyint(1) unsigned NOT NULL,
  `hasIntro` tinyint(1) unsigned NOT NULL,
  `hasShare` int(8) DEFAULT NULL,
  `hasContent` tinyint(1) unsigned NOT NULL,
  `hasWebsite` tinyint(1) unsigned NOT NULL,
  `hasAuthor` tinyint(1) unsigned NOT NULL,
  `hasSource` tinyint(1) unsigned NOT NULL,
  `hasKeyword` tinyint(1) unsigned NOT NULL,
  `hasLevel` int(8) DEFAULT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sortnum` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `info_class`
--

INSERT INTO `info_class` (`id`, `sort`, `name`, `en_name`, `pic`, `content`, `files`, `info_state`, `max_level`, `has_sub`, `sub_content`, `sub_pic`, `hasViews`, `hasState`, `hasPic`, `hasAnnex`, `hasIntro`, `hasShare`, `hasContent`, `hasWebsite`, `hasAuthor`, `hasSource`, `hasKeyword`, `hasLevel`, `state`) VALUES
('101', 10, '走进安振', '', '2014-06/140288670297539200.jpg', '<h2>\r\n	诚信投资  和谐共存\r\n</h2>\r\n<p class="info">\r\n	安徽安振投资有限公司是安徽省国资委直属的国有独资企业，成立于2001年9月，注册资本1.5亿元。公司地处安徽省合肥市庐阳区，经营范围：实业及项目投资，资产管理，财务顾问，投资咨询等。\r\n</p>', '', 'custom', 2, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1),
('102', 20, '旗下企业', '', NULL, '', '', 'custom', 2, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1),
('103', 30, '产品与服务', '', NULL, '', '', 'custom', 2, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1),
('104', 40, '新闻中心', '', NULL, '', '', 'custom', 2, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1),
('105', 50, '人才战略', '', NULL, '', '', 'custom', 2, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1),
('106', 60, '联系我们', '', NULL, '', '', 'custom', 2, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1),
('101101', 10, '公司新闻', '', '', '', '', 'list', 0, 0, 1, 1, 1, 1, 1, 1, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('101102', 20, '行业快讯', '', '', '', '', 'list', 0, 1, 0, 0, 1, 1, 1, 1, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('101103', 30, '服务动感用户', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 1, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('101104', 40, '视频中心', '', '', '', '', 'pic', 0, 0, 0, 0, 1, 1, 1, 1, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('106101', 10, '联系我们', '', '', '', '', 'content', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('105101', 10, '人才战略', '', '', '', '', 'content', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('104101', 10, '新闻中心', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('103101', 10, '证券投资', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('102101', 10, '证券投资', '', '', '', '', 'pic', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('102102', 20, '实业投资', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('102103', 30, '资产管理', '', '', '', '', 'content', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('102104', 40, '商业银行投资', '', '', '', '', 'content', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('106102', 20, '在线留言', '', '', '', '', 'content', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('103102', 20, '实业投资', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('103103', 30, '资产管理', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('103104', 40, '商业银行投资', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('103105', 50, '商业地产投资', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 1),
('101102101', 10, '新浪演播中心', '', NULL, '', NULL, 'content', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, 1),
('101102102', 20, '优酷演播中心', '', NULL, '', NULL, 'content', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `id` int(10) unsigned NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `class_id` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `count` int(6) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `content` text,
  `state` tinyint(1) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `job`
--

INSERT INTO `job` (`id`, `sort`, `class_id`, `title`, `count`, `email`, `content`, `state`, `start_time`, `end_time`) VALUES
(1, 10, '', '程序员', 1, '', '', 1, '2014-06-14 00:00:00', '0000-00-00 00:00:00'),
(2, 20, '', '美工', 1, '', '', 1, '2014-06-14 00:00:00', '2014-08-14 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `job_apply`
--

CREATE TABLE IF NOT EXISTS `job_apply` (
  `id` int(10) unsigned NOT NULL,
  `job_id` int(10) unsigned NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sortnum` int(10) NOT NULL,
  `sex` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `age` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `major` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `graduate_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `college` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `resumes` text CHARACTER SET utf8,
  `appraise` text CHARACTER SET utf8,
  `create_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `join_us`
--

CREATE TABLE IF NOT EXISTS `join_us` (
  `id` int(11) NOT NULL,
  `sortnum` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tribe` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_post` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_intention` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eduction` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` date DEFAULT NULL,
  `state` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='加入我们';

-- --------------------------------------------------------

--
-- 表的结构 `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(10) NOT NULL,
  `class_id` varchar(10) CHARACTER SET gbk NOT NULL,
  `sortnum` int(10) NOT NULL,
  `name` varchar(50) CHARACTER SET gbk NOT NULL,
  `url` varchar(200) CHARACTER SET gbk NOT NULL,
  `pic` varchar(200) CHARACTER SET gbk NOT NULL,
  `state` int(10) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `link`
--

INSERT INTO `link` (`id`, `class_id`, `sortnum`, `name`, `url`, `pic`, `state`) VALUES
(1, '1', 10, '中国银行', 'http://www.ibw.cn', '2014-06/140288545125279900.jpg', 1);

-- --------------------------------------------------------

--
-- 表的结构 `link_class`
--

CREATE TABLE IF NOT EXISTS `link_class` (
  `id` int(10) NOT NULL,
  `sort` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `has_pic` int(10) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `link_class`
--

INSERT INTO `link_class` (`id`, `sort`, `name`, `has_pic`) VALUES
(1, 10, '首页链接', 1);

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL,
  `sortnum` int(11) NOT NULL,
  `user_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `real_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `create_time` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `login_time` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_num` int(11) DEFAULT NULL,
  `level` int(8) DEFAULT '0',
  `pic` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`id`, `sortnum`, `user_name`, `pass`, `real_name`, `phone`, `email`, `job`, `address`, `sex`, `remark`, `create_time`, `login_time`, `login_num`, `level`, `pic`, `birthday`) VALUES
(1, 10, 'ibwtest', 'e10adc3949ba59abbe56e057f20f883e', '崔云超', '13655603465', 'qd_usb@163.com', NULL, '342601198410270659', NULL, NULL, '2014-04-17 07:07:15', NULL, NULL, 0, NULL, '1985-01-01 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort` int(10) unsigned DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `ip` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='会员' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `sort`, `phone`, `title`, `address`, `content`, `create_time`, `ip`, `state`) VALUES
(1, 10, '', NULL, NULL, '媒体中心|关于新凌|新凌团队|业务范围|服务中心|加入我们|\r\n\r\n贵宾热线：0551-63411788 2014安徽别格迪派标识系统有限公司', '2014-05-13 06:42:00', '', 2),
(2, 20, 'gfgh', NULL, NULL, 'hhhghg', '2014-05-13 06:39:00', '', 2),
(3, 30, '13655603465', NULL, NULL, 'sdasaaddas', '2014-05-14 03:42:00', '', 2),
(4, 40, '', NULL, NULL, 'ddddddd', '2014-06-16 08:47:13', '', 2),
(5, 50, '', NULL, NULL, 'ddddddd', '2014-06-16 08:50:48', '', 2),
(6, 60, '', NULL, NULL, 'dddddd', '2014-06-16 08:50:55', '', 2),
(7, 70, '', NULL, NULL, 'dsadasdsaadsdasdas', '2014-06-16 08:54:08', '', 0),
(8, 80, '', NULL, NULL, 'dffss肥嘟嘟啥方法的所发生的', '2014-06-16 08:56:16', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(8) NOT NULL,
  `sort` int(8) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `tel` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `depart` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pic` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='员工';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
