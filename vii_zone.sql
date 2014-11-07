-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 11 月 07 日 07:27
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `vii_zone`
--

-- --------------------------------------------------------

--
-- 表的结构 `vii_admin`
--

CREATE TABLE IF NOT EXISTS `vii_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `login_ip` varchar(13) NOT NULL,
  `login_time` varchar(13) NOT NULL,
  `lev` tinyint(1) NOT NULL DEFAULT '0',
  `lock` tinyint(1) NOT NULL DEFAULT '0',
  `remark` varchar(300) NOT NULL DEFAULT '无备注',
  `ctime` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `vii_admin`
--

INSERT INTO `vii_admin` (`id`, `admin_name`, `password`, `phone`, `email`, `login_ip`, `login_time`, `lev`, `lock`, `remark`, `ctime`) VALUES
(3, 'viiadmin', 'ab244795339868d6e9d35ed7e7de7e3b', '13249170728', '595441550@qq.com', '127.0.0.1', '1414570831', 0, 1, '小编！', '1414570668'),
(5, 'super', 'af1bd38b426d0640d6ba8b809a59118d', '15876513076', '451436241@qq.com', '127.0.0.1', '1414570831', 1, 0, '网站超级管理员，网站建设者本尊！', '1414570831'),
(6, 'editer', '451e294d97eea021c59c88d95cebd878', '15876513076', '595441550@qq.com', '127.0.0.1', '1414570831', 0, 1, 'editer', '1414658661');

-- --------------------------------------------------------

--
-- 表的结构 `vii_article`
--

CREATE TABLE IF NOT EXISTS `vii_article` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `uid` int(13) NOT NULL,
  `sid` int(13) NOT NULL,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `is_tj` tinyint(1) NOT NULL DEFAULT '0',
  `is_top` tinyint(1) NOT NULL DEFAULT '0',
  `is_check` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `pics` varchar(300) NOT NULL,
  `click` int(13) NOT NULL DEFAULT '0',
  `lock` tinyint(1) NOT NULL DEFAULT '0',
  `content` varchar(600) NOT NULL,
  `addtime` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `vii_article`
--

INSERT INTO `vii_article` (`id`, `title`, `uid`, `sid`, `is_hot`, `is_tj`, `is_top`, `is_check`, `status`, `pics`, `click`, `lock`, `content`, `addtime`) VALUES
(13, '测试帖子1', 0, 1, 0, 1, 0, 1, 0, 'Public/Uploads/20141107/545c73d991cc3.jpg', 0, 0, '测试帖子1', '1415345113'),
(14, '测试帖子2', 0, 2, 0, 0, 1, 0, 1, 'Public/Uploads/20141107/545c73f1d2300.jpg', 0, 0, '测试帖子2', '1415345137'),
(15, '测试帖子3', 0, 3, 1, 1, 1, 1, 1, 'Public/Uploads/20141107/545c74046e55d.jpg', 0, 0, '测试帖子3', '1415345156');

-- --------------------------------------------------------

--
-- 表的结构 `vii_comment`
--

CREATE TABLE IF NOT EXISTS `vii_comment` (
  `id` int(13) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(13) NOT NULL,
  `sid` int(13) NOT NULL,
  `aid` int(13) NOT NULL,
  `toid` int(13) NOT NULL DEFAULT '0',
  `is_good` tinyint(1) NOT NULL DEFAULT '0',
  `is_check` tinyint(1) NOT NULL DEFAULT '0',
  `pics` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `addtime` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `vii_share`
--

CREATE TABLE IF NOT EXISTS `vii_share` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `uid` int(13) NOT NULL,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `is_tj` tinyint(1) NOT NULL DEFAULT '0',
  `is_top` tinyint(1) NOT NULL,
  `is_check` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `member` text NOT NULL,
  `click` int(13) NOT NULL DEFAULT '0',
  `pic` varchar(200) NOT NULL,
  `lock` tinyint(1) NOT NULL DEFAULT '0',
  `desc` varchar(300) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `ctime` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `vii_share`
--

INSERT INTO `vii_share` (`id`, `title`, `uid`, `is_hot`, `is_tj`, `is_top`, `is_check`, `status`, `member`, `click`, `pic`, `lock`, `desc`, `remark`, `ctime`) VALUES
(1, '小青椒微商分享圈', 0, 0, 1, 1, 1, 1, '1', 0, 'Public/Uploads/20141104/545832fbb61fd.jpg', 0, '小青椒微商分享圈，分享微商经验，让你进步，让你成功！', '小青椒微商分享圈，分享微商经验，让你进步，让你成功！', '1415066363'),
(2, '微商城ddd', 0, 0, 0, 0, 0, 1, '', 0, 'Public/Uploads/20141103/545737ddc63e9.png', 0, '微商城，一个让你成长让你进步让你成微商城，一个让你成长让你进步让你成功的平台！微商城，一个让你成长让你进步让你成功的平台！功的平台！', '微商城ddd', '1415002077'),
(3, '微商城', 1, 0, 0, 0, 1, 0, '1,2,3', 0, 'Public/Uploads/20141103/545737eb5c41d.jpg', 0, '微商城，一个让你成长让你进步让你成功的平台！', '微商城，一个让你成长让你进步让你成功的平台！', '1415002091'),
(4, '微商城2222', 0, 0, 0, 1, 0, 1, '', 0, 'Public/Uploads/20141103/5457380c544c7.jpg', 0, '微商城，一个让你成长让你进步让你成功的平台！', '微商城，一个让你成长让你进步让你成功的平台！', '1415002124'),
(8, '测试项目3', 0, 0, 1, 0, 1, 0, '', 0, 'Public/Uploads/20141104/54587d5c25d04.jpg', 0, '测试项目3', '测试项目3', '1415085403'),
(6, '服务内容介绍1111', 0, 0, 1, 0, 1, 0, '', 0, 'Public/Uploads/20141104/545826bc5f816.jpg', 0, '服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111', '服务内容介绍1111服务内容介绍1111v', '1415063228'),
(7, '小青椒微商分享圈', 0, 1, 1, 1, 1, 1, '', 0, 'Public/Uploads/20141104/5458327ce28ca.jpg', 0, '小青椒微商分享圈，分享微商经验，让你进步，让你成功！', '小青椒微商分享圈，分享微商经验，让你进步，让你成功！', '1415066236'),
(14, '冰冰的美，你懂嘛？', 0, 0, 1, 0, 1, 1, '', 0, 'Public/Uploads/20141104/5458327ce28ca.jpg', 1, '', '', '1415244273');

-- --------------------------------------------------------

--
-- 表的结构 `vii_users`
--

CREATE TABLE IF NOT EXISTS `vii_users` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(30) NOT NULL,
  `score` int(7) NOT NULL,
  `lock` tinyint(1) NOT NULL DEFAULT '0',
  `lev` tinyint(1) NOT NULL DEFAULT '0',
  `reg_time` varchar(13) NOT NULL,
  `remark` varchar(60) NOT NULL DEFAULT '无信息备注！',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- 转存表中的数据 `vii_users`
--

INSERT INTO `vii_users` (`id`, `nickname`, `password`, `phone`, `email`, `score`, `lock`, `lev`, `reg_time`, `remark`) VALUES
(1, '爱恨情仇', 'e10adc3949ba59abbe56e057f20f883e', '13249170728', '595441550@qq.com', 0, 0, 0, '1415071241', '56445544455544545'),
(2, '青椒的故事', '343b1c4a3ea721b2d640fc8700db0f36', '15876513076', '451436241@qq.com', 20000, 0, 3, '1414742188', '青椒小故事！'),
(3, 'superStar', '980ac217c6b51e7dc41040bec1edfec8', '13249170720', '5654548@qq.com', 0, 0, 0, '1415071256', '洒大地');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
