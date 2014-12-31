-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 06 月 16 日 03:02
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `azcy`
--

-- --------------------------------------------------------

--
-- 表的结构 `active`
--

CREATE TABLE `active` (
  `id` int(10) unsigned NOT NULL,
  `sortnum` int(10) unsigned NOT NULL,
  `user_name` varchar(100) collate utf8_unicode_ci default NULL,
  `phone` varchar(30) collate utf8_unicode_ci default NULL,
  `QQ` varchar(30) collate utf8_unicode_ci default NULL,
  `city` varchar(60) collate utf8_unicode_ci default NULL,
  `area` varchar(60) collate utf8_unicode_ci default NULL,
  `class_id` varchar(20) collate utf8_unicode_ci default NULL,
  `product_name` varchar(30) collate utf8_unicode_ci default NULL,
  `product_id` varchar(20) collate utf8_unicode_ci default NULL,
  `create_time` datetime default NULL,
  `modify_time` datetime default NULL,
  `state` tinyint(1) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `class_id` (`product_id`),
  KEY `admin_id` (`phone`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `active`
--

INSERT INTO `active` (`id`, `sortnum`, `user_name`, `phone`, `QQ`, `city`, `area`, `class_id`, `product_name`, `product_id`, `create_time`, `modify_time`, `state`) VALUES
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

CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `pass` varchar(32) collate utf8_unicode_ci NOT NULL,
  `realname` varchar(30) collate utf8_unicode_ci NOT NULL,
  `grade` tinyint(1) unsigned NOT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  `create_time` datetime NOT NULL,
  `modify_time` datetime NOT NULL,
  `login_count` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`, `realname`, `grade`, `state`, `create_time`, `modify_time`, `login_count`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '系统管理员', 8, 1, '2014-03-19 02:45:53', '2014-03-19 02:45:53', 0);

-- --------------------------------------------------------

--
-- 表的结构 `admin_advanced`
--

CREATE TABLE `admin_advanced` (
  `admin_id` int(10) unsigned NOT NULL,
  `advanced_id` int(10) unsigned NOT NULL,
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `admin_advanced`
--


-- --------------------------------------------------------

--
-- 表的结构 `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(10) unsigned NOT NULL,
  `login_time` datetime NOT NULL,
  `login_ip` varchar(20) collate utf8_unicode_ci NOT NULL,
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `admin_login`
--


-- --------------------------------------------------------

--
-- 表的结构 `admin_popedom`
--

CREATE TABLE `admin_popedom` (
  `admin_id` int(10) unsigned NOT NULL,
  `class_id` varchar(20) collate utf8_unicode_ci NOT NULL,
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `admin_popedom`
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

CREATE TABLE `advanced` (
  `id` int(10) unsigned NOT NULL,
  `sortnum` int(10) unsigned NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `default_file` varchar(50) collate utf8_unicode_ci NOT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `advanced`
--

INSERT INTO `advanced` (`id`, `sortnum`, `name`, `default_file`, `state`) VALUES
(2, 20, '广告管理', 'adver_list.php', 1),
(9, 90, '留言簿', 'message_list.php', 1),
(1, 10, '基本设置', 'config_base.php', 1),
(3, 30, '链接管理', 'link_list.php', 1),
(4, 40, '链接分类管理', 'link_class_list.php', 1),
(5, 50, 'Banner管理', 'banner_list.php', 1),
(6, 60, 'Banner分类管理', 'banner_class_list.php', 1),
(10, 180, '加入我们', 'joinus_list.php', 0),
(7, 70, '招聘职位', 'job_list.php', 1),
(8, 80, '应聘人员', 'job_apply_list.php', 0),
(11, 110, '会员管理', 'member_list.php', 1),
(12, 15, '一级分类管理', 'base_class_list.php', 1),
(13, 120, '报名管理', 'book_list.php', 0),
(14, 130, '电子杂志管理', 'album_class_list.php', 0),
(15, 140, '员工管理', 'staff_list.php', 0),
(16, 150, '资料批量转移', 'transfer.php', 0),
(17, 160, '董事长信箱', 'bossemail_list.php', 0),
(18, 190, '批量上传', 'batch_upload_list.php', 1);

-- --------------------------------------------------------

--
-- 表的结构 `adver`
--

CREATE TABLE `adver` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) collate utf8_unicode_ci NOT NULL,
  `mode` varchar(10) collate utf8_unicode_ci NOT NULL,
  `url` varchar(200) collate utf8_unicode_ci NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `time` int(11) NOT NULL,
  `pic` varchar(200) collate utf8_unicode_ci NOT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `adver`
--

INSERT INTO `adver` (`id`, `title`, `mode`, `url`, `width`, `height`, `time`, `pic`, `state`) VALUES
(1, '广告', 'hangL', '', 142, 569, 0, '2014-04/139726799844345900.png', 0);

-- --------------------------------------------------------

--
-- 表的结构 `album`
--

CREATE TABLE `album` (
  `id` int(10) NOT NULL,
  `sortnum` int(8) default NULL,
  `class_id` varchar(30) character set gbk NOT NULL,
  `pic` varchar(60) character set gbk NOT NULL,
  `name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `create_time` varchar(60) character set gbk NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `album`
--


-- --------------------------------------------------------

--
-- 表的结构 `album_class`
--

CREATE TABLE `album_class` (
  `id` int(10) NOT NULL,
  `sortnum` int(10) default NULL,
  `name` varchar(30) collate utf8_unicode_ci default NULL,
  `pic` varchar(60) collate utf8_unicode_ci default NULL,
  `state` int(8) default NULL,
  `create_time` varchar(60) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `album_class`
--


-- --------------------------------------------------------

--
-- 表的结构 `banner`
--

CREATE TABLE `banner` (
  `id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `sortnum` int(20) NOT NULL,
  `title` varchar(100) character set gbk NOT NULL,
  `content` text collate utf8_unicode_ci,
  `url` varchar(200) character set gbk NOT NULL,
  `pic` varchar(200) character set gbk NOT NULL,
  `pic2` varchar(100) collate utf8_unicode_ci default NULL,
  `width` int(10) NOT NULL,
  `height` int(10) NOT NULL,
  `state` int(10) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `banner`
--

INSERT INTO `banner` (`id`, `class_id`, `sortnum`, `title`, `content`, `url`, `pic`, `pic2`, `width`, `height`, `state`) VALUES
(1, 1, 10, '图片1', '', '', '2014-03/139519447704288600.jpg', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `banner_class`
--

CREATE TABLE `banner_class` (
  `id` int(10) NOT NULL,
  `sortnum` int(20) NOT NULL,
  `name` varchar(100) character set gbk NOT NULL,
  `add_deny` int(10) NOT NULL,
  `delete_deny` int(10) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `banner_class`
--

INSERT INTO `banner_class` (`id`, `sortnum`, `name`, `add_deny`, `delete_deny`) VALUES
(1, 10, '页面Banner', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `sortnum` int(11) NOT NULL,
  `name` varchar(60) collate utf8_unicode_ci NOT NULL,
  `sex` varchar(10) collate utf8_unicode_ci default NULL,
  `birthday` varchar(30) collate utf8_unicode_ci default NULL,
  `phone` varchar(30) collate utf8_unicode_ci default NULL,
  `email` varchar(30) collate utf8_unicode_ci default NULL,
  `house_type` varchar(30) collate utf8_unicode_ci default NULL,
  `estate` varchar(30) collate utf8_unicode_ci default NULL,
  `area` varchar(60) collate utf8_unicode_ci default NULL,
  `budget` varchar(60) collate utf8_unicode_ci default NULL,
  `book_time` varchar(60) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci,
  `eduction` varchar(30) collate utf8_unicode_ci default NULL,
  `create_time` date default NULL,
  `state` int(3) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `booking`
--


-- --------------------------------------------------------

--
-- 表的结构 `config_base`
--

CREATE TABLE `config_base` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `address` text collate utf8_unicode_ci,
  `address2` varchar(30) collate utf8_unicode_ci default NULL,
  `title` varchar(100) collate utf8_unicode_ci NOT NULL,
  `icp` varchar(30) collate utf8_unicode_ci NOT NULL,
  `keyword` varchar(200) collate utf8_unicode_ci NOT NULL,
  `description` varchar(200) collate utf8_unicode_ci NOT NULL,
  `contact` text collate utf8_unicode_ci,
  `javascript` text collate utf8_unicode_ci,
  `views` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `config_base`
--

INSERT INTO `config_base` (`id`, `name`, `address`, `address2`, `title`, `icp`, `keyword`, `description`, `contact`, `javascript`, `views`) VALUES
(1, '安振产业投资集团', '<p>\r\n	安振产业投资集团\r\n</p>\r\n<p>\r\n	电话：021-5111-3643\r\n</p>\r\n<p>\r\n	传真：021-5111-3654\r\n</p>\r\n<p>\r\n	邮箱：isao.yoshida@ifst.com.cn\r\n</p>\r\n<p>\r\n	地址:上海市中山西路933号虹桥银城大厦26层2601-2608室(200051)\r\n</p>', '安振产业投资集团', '安振产业投资集团', '皖ICP备08000675号', '安振产业投资集团', '安振产业投资集团', '<p>\r\n	贵宾热线：0551-63411788 2014安振产业投资集团 版权所有 皖ICP备0908659号 免责声明 技术支持：安徽网新\r\n</p>', '', 173);

-- --------------------------------------------------------

--
-- 表的结构 `info`
--

CREATE TABLE `info` (
  `id` int(10) unsigned NOT NULL,
  `sortnum` int(10) unsigned NOT NULL,
  `sortnum2` int(10) unsigned default '0',
  `title` varchar(100) collate utf8_unicode_ci NOT NULL,
  `title2` varchar(100) collate utf8_unicode_ci default NULL,
  `level` int(11) default NULL,
  `admin_id` int(10) unsigned default NULL,
  `class_id` varchar(20) collate utf8_unicode_ci NOT NULL,
  `author` varchar(50) collate utf8_unicode_ci default NULL,
  `source` varchar(50) collate utf8_unicode_ci default NULL,
  `website` varchar(300) collate utf8_unicode_ci default NULL,
  `pic` varchar(200) collate utf8_unicode_ci default NULL,
  `annex` varchar(200) collate utf8_unicode_ci default NULL,
  `annex2` varchar(60) collate utf8_unicode_ci default NULL,
  `annex3` varchar(60) collate utf8_unicode_ci default NULL,
  `keyword` varchar(100) collate utf8_unicode_ci default NULL,
  `intro` varchar(800) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci,
  `files` text collate utf8_unicode_ci,
  `views` int(10) unsigned default NULL,
  `No` varchar(30) collate utf8_unicode_ci default NULL,
  `create_time` datetime default NULL,
  `modify_time` datetime default NULL,
  `state` tinyint(1) unsigned default NULL,
  `series` varchar(100) character set utf8 default NULL,
  `classcol` varchar(100) character set utf8 default NULL,
  `share` int(1) default NULL,
  `charac` text collate utf8_unicode_ci,
  `parameter` text collate utf8_unicode_ci,
  `details` text collate utf8_unicode_ci,
  `imagelist` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`),
  KEY `class_id` (`class_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `info`
--

INSERT INTO `info` (`id`, `sortnum`, `sortnum2`, `title`, `title2`, `level`, `admin_id`, `class_id`, `author`, `source`, `website`, `pic`, `annex`, `annex2`, `annex3`, `keyword`, `intro`, `content`, `files`, `views`, `No`, `create_time`, `modify_time`, `state`, `series`, `classcol`, `share`, `charac`, `parameter`, `details`, `imagelist`) VALUES
(39, 390, 0, '名称_西递故事_作者_许家栋_地点_安徽省黄山市黟县西递3391', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264935152550500.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935152419800.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:11', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 380, 0, '名称_西递故事_作者_许家栋_地点_安徽省黄山市黟县西递2838', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264935122827400.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935122718100.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:11', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 370, 0, '名称_西递故事_作者_许家栋_地点_安徽省黄山市黟县西递1881', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264935092549900.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935092416300.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:10', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 10, 0, '名称_春风_作者_余平_地点_安庆1081', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '2014-06/140264933938950400.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264933938950400.jpg" />', NULL, NULL, NULL, '2014-06-13 08:48:59', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 20, 0, '名称_淙潭廊桥_作者_徐德安_地点_安徽休宁6997', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '2014-06/140264933946650800.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264933946650800.jpg" />', NULL, NULL, NULL, '2014-06-13 08:48:59', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 30, 0, '名称_古祠遗风_作者_梅光_地点_黄山歙县西昌8826', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264933949142700.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264933949050900.jpg" />', NULL, NULL, NULL, '2014-06-13 08:48:59', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 40, 0, '名称_古宅结构_作者_许家栋_地点_安徽省黄山市徽州区呈坎4917', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264933988653000.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264933988553100.jpg" />', NULL, NULL, NULL, '2014-06-13 08:48:59', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 50, 0, '名称_宏村夜色_作者_许家栋_地点_安徽省黄山市黟县宏村4564', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934015563900.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934015454800.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:00', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 60, 0, '名称_宏村之晨_作者_许家栋_地点_安徽省黄山市黟县宏村3916', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934045763200.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934045656400.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:00', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 70, 0, '名称_花海人家_作者_许家栋_地点_安徽省黄山市黟县柯村1895', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934075588200.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934075458100.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:00', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 80, 0, '名称_徽州木雕（组图）_作者_卢小华_地点_绩溪县1132', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934105588500.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934105459800.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:01', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 90, 0, '名称_徽州木雕（组图）_作者_卢小华_地点_绩溪县1352', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934135598400.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934135461600.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:01', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 100, 0, '名称_徽州木雕（组图）_作者_卢小华_地点_绩溪县9318', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934165599000.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934165463200.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:01', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 110, 0, '名称_徽州人家（组照）_作者_梅光_地点_安徽黄山卢村1484', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934195858600.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934195765100.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:01', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 120, 0, '名称_徽州人家（组照）_作者_梅光_地点_安徽黄山卢村2536', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934232878300.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934232767200.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:02', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 130, 0, '名称_徽州人家（组照）_作者_梅光_地点_安徽黄山卢村4120', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934276116200.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934275969600.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:02', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 140, 0, '名称_徽州人家（组照）_作者_梅光_地点_安徽黄山卢村4123', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934312696100.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934312571700.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:03', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 150, 0, '名称_徽州人家（组照）_作者_梅光_地点_安徽黄山卢村4141', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934350223900.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934350073900.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:03', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 160, 0, '名称_徽州人家（组照）_作者_梅光_地点_安徽黄山卢村4640', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934390748200.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934390576200.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:03', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 170, 0, '名称_徽州人家（组照）_作者_梅光_地点_安徽黄山卢村5099', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934428912700.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934428778400.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:04', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 180, 0, '名称_徽州人家（组照）_作者_梅光_地点_安徽黄山卢村8152', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934465929100.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934465780400.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:04', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 190, 0, '名称_镜像南湖_作者_掌莉琼_地点_宏村8430', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934542179300.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934542084800.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:05', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 200, 0, '名称_老屋故事_作者_许家栋_地点_安徽省黄山市黟县宏村镇卢村9261', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934602934500.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934602788300.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:06', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 210, 0, '名称_老宅宴席_作者_许家栋_地点_安徽省黄山市黟县宏村镇宏苑饭店6061', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934632733900.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934632590100.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:06', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 220, 0, '名称_门环_作者_许家栋_地点_安徽省黄山市黟县宏村镇卢村1141', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934662710600.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934662591800.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:06', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 230, 0, '名称_梦里水乡_作者_许家栋_地点_安徽省黄山市黟县宏村7217', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934693053400.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934692893500.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:06', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 240, 0, '名称_南湖古桥_作者_掌莉琼_地点_宏村5174', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934731297400.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934731195600.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:07', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 250, 0, '名称_千年寿州古城_作者_熊志祥_地点_安徽淮南寿县3192', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934792641000.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934792499200.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:07', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 260, 0, '名称_千年寿州古城_作者_熊志祥_地点_安徽淮南寿县4120', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '2014-06/140264934836201600.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934836201600.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:08', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 270, 0, '名称_千年寿州古城_作者_熊志祥_地点_安徽淮南寿县4891', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934838718800.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934838601700.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:08', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 280, 0, '名称_千年寿州古城_作者_熊志祥_地点_安徽淮南寿县5659', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934875637000.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934875503900.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:08', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 290, 0, '名称_千年寿州古城_作者_熊志祥_地点_安徽淮南寿县9012', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '2014-06/140264934912606000.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934912606000.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:09', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 300, 0, '名称_寿春瓮城墙_作者_梅光_地点_寿县5407', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934915415400.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934915306200.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:09', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 310, 0, '名称_岁月留痕_作者_徐德安_地点_安徽黟县卢村3550', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934952534800.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934952408400.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:09', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 320, 0, '名称_塔川春色_作者_徐德安_地点_黄山塔川3597', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '2014-06/140264934982510100.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934982510100.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:09', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 330, 0, '名称_塔川春色_作者_徐德安_地点_黄山塔川7246', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '2014-06/140264934985510200.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934985510200.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:09', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 340, 0, '名称_塔川徽韵_作者_许家栋_地点_安徽黟县塔川8739', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264934991246900.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264934991110500.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:09', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 350, 0, '名称_塔川秋色_作者_许家栋_地点_安徽黟县塔川3973', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264935031562200.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935031412800.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:10', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 360, 0, '名称_夕照西递_作者_许家栋_地点_安徽省黄山市黟县西递7209', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264935062659200.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935062514700.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:10', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 400, 0, '名称_西递故事_作者_许家栋_地点_安徽省黄山市黟县西递4099', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264935182830500.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935182721400.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:11', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 410, 0, '名称_西递故事_作者_许家栋_地点_安徽省黄山市黟县西递4540', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '2014-06/140264935212623200.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935212623200.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:12', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 420, 0, '名称_西递故事_作者_许家栋_地点_安徽省黄山市黟县西递7293', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264935215435200.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935215323300.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:12', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 430, 0, '名称_西递故事_作者_许家栋_地点_安徽省黄山市黟县西递7848', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '2014-06/140264935253125500.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935253125500.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:12', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 440, 0, '名称_西递故事_作者_许家栋_地点_安徽省黄山市黟县西递8200', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264935255341300.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935255225600.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:12', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 450, 0, '名称_新安江廊桥古韵_作者_掌莉琼_地点_黄山屯溪新安江畔8174', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264935282220800.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935282127100.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:12', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 460, 0, '名称_阳产土楼_作者_梅光_地点_歙县深渡阳产3923', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264935323096500.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935322929400.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:13', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 470, 0, '名称_阳产土楼_作者_梅光_地点_歙县深渡阳产4477', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '../upload/2014-06/140264935375342600.jpg', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/2014-06/140264935375232400.jpg" />', NULL, NULL, NULL, '2014-06-13 08:49:13', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 480, 0, '名称_阳产土楼_作者_梅光_地点_歙县深渡阳产5964', NULL, NULL, NULL, '101101', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '<img src="http://localhost/azcy/include/../upload/" />', NULL, NULL, NULL, '2014-06-13 08:49:14', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 10, 0, '联系我们', '', 0, 0, '106101', '', '', '', '', '', NULL, NULL, '', '', '<p>\r\n	安振产业投资集团\r\n</p>\r\n<p>\r\n	电话：021-5111-3643\r\n</p>\r\n<p>\r\n	传真：021-5111-3654\r\n</p>\r\n<p>\r\n	邮箱：isao.yoshida@ifst.com.cn\r\n</p>\r\n<p>\r\n	地址:上海市中山西路933号虹桥银城大厦26层2601-2608室(200051)\r\n</p>', '', 0, '', '2014-06-16 00:57:09', '2014-06-16 01:00:44', 1, '', '', 0, NULL, NULL, NULL, NULL),
(50, 10, 0, '马鞍山信谊公司2014年一季度扭亏为盈', '', 0, 0, '104101', '', '', '', '2014-06/140288183943921500.jpg', '', NULL, NULL, '', '', '今年一季度，信谊公司在安徽天成投资公司的全力支持下,积极联系新客户，开拓新业务,与芜湖天地电子科技有限公司建立了业务往来。芜湖天地公司主要从事同轴电缆、太阳能热水器的生产，太阳能热水器年产量达35万台，是省内知名的生产太阳能热水器的企业，并得到当地政府的大力支持。由于太阳能热水器所有钢板为专用钢板，有一定技术含量，公司全体员工积极配合、查找厂家、比对价格、寻找质优价廉的供应商，争取利润的最大化。公司前期主要向其供应太阳能热水器外桶专用冷轧彩涂钢薄板和内筒用冷轧不锈钢薄板。随着双方合作的加深，未来该公司还将向我公司采购太阳能热水器支架用冷轧镀锌钢板等。合作前景较好，预期将成为公司今年主要利润增长点。 &nbsp; &nbsp;一季度信谊公司预计实现营业收入290.88万元,营业成本268.71万，盈利水平显著上升，实现利润总额约10万元。按照目前的发展势头，信谊公司将再接再励，争取二季度利润总额迈上一个新台阶。', '', 0, '', '2014-06-16 01:10:52', '2014-06-16 01:23:59', 1, '', '', 0, NULL, NULL, NULL, NULL),
(51, 20, 0, '天成公司参加华安证券2013年度股东大会', '', 0, 0, '104101', '', '', '', '', '', NULL, NULL, '', '', '3月14日上午，华安证券股份有限公司2013年度股东大会在公司28楼会议室顺利召开并圆满完成各项议程。16家股东单位的股东代表及部分董事、监事出席会议，公司管理层相关人员列席会议。天成公司作为股东代表也出席了此次会议。　　会议由华安证券股份有限公司李工董事长主持。与会股东代表审议了董事会工作报告、监事会工作报告、财务预决算报告、利润分配方案等共计12项议案。各项议案在提交股东大会表决前，均已经过董事会或监事会事先审议通过。与会股东代表围绕上述议案进行了讨论，对向会议提交的各项议案表示一致赞同。　　华安证券股份有限公司李工董事长就股东代表们关心的公开发行上市、业务发展规划问题进行了解答和说明。他指出，公司取得的成绩，离不开各股东单位和董、监事长久以来的支持和理解，2014年公司上下将围绕股东单位的要求和期待，扎实推进发行上市，大力拓宽融资渠道，不断提升业务能力，继续开展管理改革，力争实现股东利益的最大化。李工表示，公司将继续探索与股东单位业务合作的机会，在财务指标和业务结构上为公开发行上市奠定更加坚实的基础。　　与会股东代表对公司过去一年的工作表示满意，并表示将继续支持、配合华安证券的业务发展和重点工作。', '', 0, '', '2014-06-16 01:11:51', '2014-06-16 01:12:12', 1, '', '', 0, NULL, NULL, NULL, NULL),
(52, 30, 0, '马鞍山农村商业银行召开2014年股东年会', '', 0, 0, '104101', '', '', '', '', '', NULL, NULL, '', '', '3月5日下午，马鞍山农商银行2014年股东年会在总部二楼会议室召开，安振公司出席参加了会议。会议由马鞍山农商行董事长孙晓主持。人民银行市中心支行，马鞍山银监分局代表列席会议。会议邀请律师事务所律师予以见证。 &nbsp; &nbsp; &nbsp;参会股东对马鞍山农商银行一年来取得的各项经营成绩表示满意，对马鞍山农商银行新一年的发展战略目标表示充分肯定。大会审议通过了《马鞍山农商银行2013年度董事会工作报告》、《马鞍山农商银行2013年度监事会工作报告》以及财务预、决算方案等议案。', '', 0, '', '2014-06-16 01:12:13', '2014-06-16 01:12:27', 1, '', '', 0, NULL, NULL, NULL, NULL),
(53, 10, 0, '证券投资相关概念', '', 0, 0, '103101', '', '', '', '2014-06/140288529339077000.jpg', '', NULL, NULL, '', '', '<p>\r\n	证券投资(investment in securities)是指投资者（法人或自然人）购买股票、债券、基金券等有价证券以及这些有价证券的衍生品，以获取红利、利息及资本利得的投资行为和投资过程，是间接投资的重要形式。\r\n</p>\r\n<p>\r\n	证券投资具有如下一些特点：\r\n</p>\r\n<p>\r\n	1．证券投资具有高度的“市场力”；\r\n</p>\r\n<p>\r\n	2．证券投资是对预期会带来收益的有价证券的风险投资；\r\n</p>\r\n<p>\r\n	3．投资和投机是证券投资活动中不可缺少的两种行为；\r\n</p>\r\n<p>\r\n	4．二级市场的证券投资不会增加社会资本总量，而是在持有者之间进行再分配。\r\n</p>\r\n<p>\r\n	证券投资主要由三个要素构成：收益、风险和时间。\r\n</p>\r\n<p>\r\n	证券投资工具指在投资活动中以书面证明所有权或债权债务关系的凭证，是一种具有法律效力的合法金融契约。\r\n</p>\r\n<p>\r\n	所谓证券投资关系是指证券投资全过程中所涉及的各个主体。证券投资关系主要由三方面构成：发行者、中介人和投资者。\r\n</p>', '', 0, '', '2014-06-16 02:01:40', '2014-06-16 02:21:33', 1, '', '', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `info_class`
--

CREATE TABLE `info_class` (
  `id` varchar(20) collate utf8_unicode_ci NOT NULL,
  `sortnum` int(10) unsigned NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `en_name` varchar(60) collate utf8_unicode_ci default NULL,
  `pic` varchar(200) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci,
  `files` text collate utf8_unicode_ci,
  `info_state` varchar(10) collate utf8_unicode_ci NOT NULL,
  `max_level` tinyint(1) unsigned NOT NULL,
  `has_sub` tinyint(1) unsigned NOT NULL,
  `sub_content` tinyint(1) unsigned NOT NULL,
  `sub_pic` tinyint(1) unsigned NOT NULL,
  `hasViews` tinyint(1) unsigned NOT NULL,
  `hasState` tinyint(1) unsigned NOT NULL,
  `hasPic` tinyint(1) unsigned NOT NULL,
  `hasAnnex` tinyint(1) unsigned NOT NULL,
  `hasIntro` tinyint(1) unsigned NOT NULL,
  `hasShare` int(8) default NULL,
  `hasContent` tinyint(1) unsigned NOT NULL,
  `hasContent2` int(8) default NULL,
  `hasWebsite` tinyint(1) unsigned NOT NULL,
  `hasAuthor` tinyint(1) unsigned NOT NULL,
  `hasSource` tinyint(1) unsigned NOT NULL,
  `hasKeyword` tinyint(1) unsigned NOT NULL,
  `hasLevel` int(8) default NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `sortnum` (`sortnum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `info_class`
--

INSERT INTO `info_class` (`id`, `sortnum`, `name`, `en_name`, `pic`, `content`, `files`, `info_state`, `max_level`, `has_sub`, `sub_content`, `sub_pic`, `hasViews`, `hasState`, `hasPic`, `hasAnnex`, `hasIntro`, `hasShare`, `hasContent`, `hasContent2`, `hasWebsite`, `hasAuthor`, `hasSource`, `hasKeyword`, `hasLevel`, `state`) VALUES
('101', 10, '走进安振', '', '2014-06/140288670297539200.jpg', '<h2>\r\n	诚信投资  和谐共存\r\n</h2>\r\n<p class="info">\r\n	安徽安振投资有限公司是安徽省国资委直属的国有独资企业，成立于2001年9月，注册资本1.5亿元。公司地处安徽省合肥市庐阳区，经营范围：实业及项目投资，资产管理，财务顾问，投资咨询等。\r\n</p>', '', 'custom', 2, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, NULL, 0, 0, 0, 0, 0, 1),
('102', 20, '旗下企业', '', NULL, '', '', 'custom', 2, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, NULL, 0, 0, 0, 0, 0, 1),
('103', 30, '产品与服务', '', NULL, '', '', 'custom', 2, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, NULL, 0, 0, 0, 0, 0, 1),
('104', 40, '新闻中心', '', NULL, '', '', 'custom', 2, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, NULL, 0, 0, 0, 0, 0, 1),
('105', 50, '人才战略', '', NULL, '', '', 'custom', 2, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, NULL, 0, 0, 0, 0, 0, 1),
('106', 60, '联系我们', '', NULL, '', '', 'custom', 2, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, NULL, 0, 0, 0, 0, 0, 1),
('101101', 10, '公司新闻', '', '', '', '', 'list', 0, 0, 1, 1, 1, 1, 1, 1, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('101102', 20, '行业快讯', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 1, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('101103', 30, '服务动感用户', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 1, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('101104', 40, '视频中心', '', '', '', '', 'pic', 0, 0, 0, 0, 1, 1, 1, 1, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('106101', 10, '联系我们', '', '', '', '', 'content', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('105101', 10, '人才战略', '', '', '', '', 'content', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('104101', 10, '新闻中心', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('103101', 10, '证券投资', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('102101', 10, '证券投资', '', '', '', '', 'pic', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('102102', 20, '实业投资', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('102103', 30, '资产管理', '', '', '', '', 'content', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('102104', 40, '商业银行投资', '', '', '', '', 'content', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('106102', 20, '在线留言', '', '', '', '', 'content', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('103102', 20, '实业投资', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('103103', 30, '资产管理', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('103104', 40, '商业银行投资', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1),
('103105', 50, '商业地产投资', '', '', '', '', 'list', 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 1, NULL, 0, 0, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `job`
--

CREATE TABLE `job` (
  `id` int(10) unsigned NOT NULL,
  `sortnum` int(10) unsigned NOT NULL,
  `class_id` varchar(12) character set utf8 collate utf8_unicode_ci default NULL,
  `name` varchar(50) NOT NULL,
  `num` int(6) default NULL,
  `email` varchar(50) default NULL,
  `content` text,
  `content2` text character set utf8 collate utf8_unicode_ci,
  `showForm` tinyint(1) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `publishdate` varchar(50) default NULL,
  `deadline` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `job`
--

INSERT INTO `job` (`id`, `sortnum`, `class_id`, `name`, `num`, `email`, `content`, `content2`, `showForm`, `state`, `publishdate`, `deadline`) VALUES
(1, 10, '', '程序员', 1, '', '', '', 1, 1, '2014/06/14', ''),
(2, 20, '', '美工', 1, '', '', '', 1, 1, '2014/06/14', '2014.08.14');

-- --------------------------------------------------------

--
-- 表的结构 `job_apply`
--

CREATE TABLE `job_apply` (
  `id` int(10) unsigned NOT NULL,
  `job_id` int(10) unsigned NOT NULL,
  `name` varchar(50) character set utf8 NOT NULL,
  `sortnum` int(10) NOT NULL,
  `sex` varchar(50) character set utf8 default NULL,
  `age` varchar(50) character set utf8 default NULL,
  `major` varchar(50) character set utf8 default NULL,
  `graduate_time` varchar(50) character set utf8 default NULL,
  `college` varchar(50) character set utf8 default NULL,
  `phone` varchar(50) character set utf8 NOT NULL,
  `email` varchar(50) character set utf8 default NULL,
  `resumes` text character set utf8,
  `appraise` text character set utf8,
  `create_time` varchar(50) character set utf8 default NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `job_apply`
--


-- --------------------------------------------------------

--
-- 表的结构 `joinus`
--

CREATE TABLE `joinus` (
  `id` int(11) NOT NULL,
  `sortnum` int(11) NOT NULL,
  `name` varchar(60) collate utf8_unicode_ci NOT NULL,
  `sex` varchar(10) collate utf8_unicode_ci default NULL,
  `birthday` varchar(30) collate utf8_unicode_ci default NULL,
  `phone` varchar(30) collate utf8_unicode_ci default NULL,
  `email` varchar(30) collate utf8_unicode_ci default NULL,
  `tribe` varchar(30) collate utf8_unicode_ci default NULL,
  `job_post` varchar(30) collate utf8_unicode_ci default NULL,
  `company` varchar(60) collate utf8_unicode_ci default NULL,
  `address` varchar(100) collate utf8_unicode_ci default NULL,
  `zip_code` varchar(60) collate utf8_unicode_ci default NULL,
  `job_intention` varchar(30) collate utf8_unicode_ci default NULL,
  `eduction` varchar(30) collate utf8_unicode_ci default NULL,
  `create_time` date default NULL,
  `state` int(3) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='加入我们';

--
-- 导出表中的数据 `joinus`
--


-- --------------------------------------------------------

--
-- 表的结构 `link`
--

CREATE TABLE `link` (
  `id` int(10) NOT NULL,
  `class_id` varchar(10) character set gbk NOT NULL,
  `sortnum` int(10) NOT NULL,
  `name` varchar(50) character set gbk NOT NULL,
  `url` varchar(200) character set gbk NOT NULL,
  `pic` varchar(200) character set gbk NOT NULL,
  `state` int(10) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `link`
--

INSERT INTO `link` (`id`, `class_id`, `sortnum`, `name`, `url`, `pic`, `state`) VALUES
(1, '1', 10, '中国银行', 'http://www.ibw.cn', '2014-06/140288545125279900.jpg', 1);

-- --------------------------------------------------------

--
-- 表的结构 `link_class`
--

CREATE TABLE `link_class` (
  `id` int(10) NOT NULL,
  `sortnum` int(10) NOT NULL,
  `name` varchar(50) character set gbk NOT NULL,
  `haspic` int(10) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `link_class`
--

INSERT INTO `link_class` (`id`, `sortnum`, `name`, `haspic`) VALUES
(1, 10, '首页链接', 1);

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `sortnum` int(11) NOT NULL,
  `user_name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `pass` varchar(100) collate utf8_unicode_ci NOT NULL,
  `real_name` varchar(60) collate utf8_unicode_ci default NULL,
  `phone` varchar(30) collate utf8_unicode_ci default NULL,
  `email` varchar(60) collate utf8_unicode_ci default NULL,
  `job` varchar(60) collate utf8_unicode_ci default NULL,
  `address` varchar(100) collate utf8_unicode_ci default NULL,
  `sex` varchar(30) collate utf8_unicode_ci default NULL,
  `age` int(11) default NULL,
  `remark` text collate utf8_unicode_ci,
  `create_time` varchar(60) collate utf8_unicode_ci NOT NULL,
  `login_time` varchar(60) collate utf8_unicode_ci default NULL,
  `login_num` int(11) default NULL,
  `level` int(8) default '0',
  `pic` varchar(60) collate utf8_unicode_ci default NULL,
  `birthday` varchar(60) collate utf8_unicode_ci default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `member`
--

INSERT INTO `member` (`id`, `sortnum`, `user_name`, `pass`, `real_name`, `phone`, `email`, `job`, `address`, `sex`, `age`, `remark`, `create_time`, `login_time`, `login_num`, `level`, `pic`, `birthday`) VALUES
(1, 10, 'ibwtest', 'e10adc3949ba59abbe56e057f20f883e', '崔云超', '13655603465', 'qd_usb@163.com', NULL, '342601198410270659', NULL, NULL, NULL, '2014-04-17 07:07:15', NULL, NULL, 0, NULL, '1985-01-01');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sortnum` int(10) unsigned default NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `tel` varchar(30) collate utf8_unicode_ci default NULL,
  `phone` varchar(50) collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `fax` varchar(10) collate utf8_unicode_ci NOT NULL,
  `title` varchar(60) collate utf8_unicode_ci default NULL,
  `company` varchar(50) collate utf8_unicode_ci NOT NULL,
  `address` text collate utf8_unicode_ci,
  `content` text collate utf8_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `reply` text collate utf8_unicode_ci,
  `reply_time` datetime default NULL,
  `ip` char(15) collate utf8_unicode_ci NOT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='会员' AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `message`
--

INSERT INTO `message` (`id`, `sortnum`, `name`, `tel`, `phone`, `email`, `fax`, `title`, `company`, `address`, `content`, `create_time`, `reply`, `reply_time`, `ip`, `state`) VALUES
(1, 10, '在线视频', NULL, '', '', '', NULL, '', NULL, '媒体中心|关于新凌|新凌团队|业务范围|服务中心|加入我们|\r\n\r\n贵宾热线：0551-63411788 2014安徽别格迪派标识系统有限公司', '2014-05-13 06:42:00', 'dddddddddddd', '2014-06-16 00:53:00', '', 2),
(2, 20, '在线视频', NULL, 'gfgh', '', '', NULL, '', NULL, 'hhhghg', '2014-05-13 06:39:00', 'dddddddddddddddd', '2014-06-16 00:52:57', '', 2),
(3, 30, '崔云超', NULL, '13655603465', 'qd_usb@163.com', '', NULL, '', NULL, 'sdasaaddas', '2014-05-14 03:42:00', 'ddddddddddddddddddd', '2014-06-16 00:52:53', '', 2),
(4, 40, 'dddd', NULL, '', '', '', NULL, '', NULL, 'ddddddd', '2014-06-16 08:47:13', 'dsaaaaaaaaaaaaaaaa', '2014-06-16 00:52:40', '', 2),
(5, 50, 'dddd', NULL, '', '', '', NULL, '', NULL, 'ddddddd', '2014-06-16 08:50:48', 'daddsadsaads', '2014-06-16 00:52:35', '', 2),
(6, 60, 'dddddd', NULL, '', '', '', NULL, '', NULL, 'dddddd', '2014-06-16 08:50:55', 'asddasasddsasdaadsadsdas', '2014-06-16 00:52:31', '', 2),
(7, 70, 'ddddddd', NULL, '', '', '', NULL, '', NULL, 'dsadasdsaadsdasdas', '2014-06-16 08:54:08', NULL, NULL, '', 0),
(8, 80, 'fffddsf', NULL, '', '', '', NULL, '', NULL, 'dffss肥嘟嘟啥方法的所发生的', '2014-06-16 08:56:16', NULL, NULL, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `staff`
--

CREATE TABLE `staff` (
  `id` int(8) NOT NULL,
  `sortnum` int(8) NOT NULL,
  `name` varchar(60) collate utf8_unicode_ci NOT NULL,
  `sex` varchar(30) collate utf8_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `tel` varchar(30) collate utf8_unicode_ci NOT NULL,
  `depart` varchar(60) collate utf8_unicode_ci NOT NULL,
  `pic` varchar(60) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='员工';

--
-- 导出表中的数据 `staff`
--

