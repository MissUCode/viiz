-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 11 月 16 日 12:34
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

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
  `like` int(6) NOT NULL DEFAULT '0',
  `lock` tinyint(1) NOT NULL DEFAULT '0',
  `content` varchar(600) NOT NULL,
  `addtime` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `vii_article`
--

INSERT INTO `vii_article` (`id`, `title`, `uid`, `sid`, `is_hot`, `is_tj`, `is_top`, `is_check`, `status`, `pics`, `click`, `like`, `lock`, `content`, `addtime`) VALUES
(13, '测试帖子1', 0, 1, 0, 1, 1, 1, 1, 'Public/Uploads/20141107/545c73d991cc3.jpg', 0, 0, 0, '测试帖子1', '1415345113'),
(14, '测试帖子2', 0, 2, 0, 0, 1, 0, 1, 'Public/Uploads/20141107/545c73f1d2300.jpg', 0, 0, 0, '测试帖子2', '1415345137'),
(15, '测试帖子3', 0, 3, 1, 1, 1, 1, 1, 'Public/Uploads/20141107/545c74046e55d.jpg', 0, 0, 0, '测试帖子3', '1415600615'),
(16, '自定义内容区', 0, 1, 0, 0, 0, 0, 1, 'Public/Uploads/20141114/54655ef8b702b.png', 0, 0, 0, '自定义内容区自定义内容区自定义内容区自定义内容区自定义内容区', '1415929592'),
(17, '测试帖子1', 0, 1, 0, 1, 0, 1, 0, 'Public/Uploads/20141107/545c73d991cc3.jpg', 0, 0, 0, '测试帖子1', '1415345113'),
(18, '测试帖子1', 0, 1, 0, 1, 0, 1, 0, 'Public/Uploads/20141107/545c73d991cc3.jpg', 0, 0, 0, '测试帖子1', '1415345113'),
(19, '测试帖子1', 0, 1, 0, 1, 0, 1, 1, 'Public/Uploads/20141107/545c73d991cc3.jpg', 0, 0, 0, '测试帖子1', '1415345113'),
(20, '测试帖子1', 0, 1, 0, 1, 0, 1, 1, 'Public/Uploads/20141107/545c73d991cc3.jpg', 0, 0, 0, '测试帖子1', '1415345113'),
(21, '测试帖子1', 0, 1, 0, 1, 0, 1, 1, 'Public/Uploads/20141107/545c73d991cc3.jpg', 0, 0, 0, '测试帖子1', '1415345113'),
(22, '测试帖子1', 0, 1, 0, 1, 0, 1, 1, 'Public/Uploads/20141107/545c73d991cc3.jpg', 0, 0, 0, '测试帖子1', '1415345113'),
(23, '如何做好微商？你怎么看？请积极分享！', 0, 7, 0, 0, 1, 1, 1, 'Public/Uploads/20141114/546578633d3f8.jpg', 0, 0, 0, '如何做好微商？你怎么看？请积极分享！\r\n期待大家能够把您的经验分享给大家，让我们都进步！\r\n微商是个趋势，将会是个电商时代的来临，大家要积极哟！', '1415936098');

-- --------------------------------------------------------

--
-- 表的结构 `vii_comment`
--

CREATE TABLE IF NOT EXISTS `vii_comment` (
  `id` int(13) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(13) NOT NULL DEFAULT '0',
  `sid` int(13) NOT NULL,
  `aid` int(13) NOT NULL,
  `pid` int(13) NOT NULL DEFAULT '0',
  `toid` int(13) NOT NULL DEFAULT '0',
  `is_good` tinyint(1) NOT NULL DEFAULT '0',
  `is_check` tinyint(1) NOT NULL DEFAULT '0',
  `pics` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `addtime` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `vii_comment`
--

INSERT INTO `vii_comment` (`id`, `uid`, `sid`, `aid`, `pid`, `toid`, `is_good`, `is_check`, `pics`, `content`, `status`, `addtime`) VALUES
(16, 0, 3, 15, 0, 0, 0, 1, '', '我就不信了，不是吧！！！', 1, '1415690921'),
(3, 0, 2, 14, 0, 0, 0, 1, '', '好些时候没上来了，你们很积极啊，亲们！！', 1, '1415603355'),
(4, 0, 2, 14, 0, 0, 0, 1, '', '好些时候没上来了，你们很积极啊，亲们！！', 1, '1415603359'),
(5, 0, 2, 14, 0, 0, 0, 1, '', '好些时候没上来了，你们很积极啊，亲们！！', 0, '1415603362'),
(6, 0, 2, 14, 0, 0, 0, 1, '', '好些时候没上来了，你们很积极啊，亲们！！', 0, '1415603366'),
(7, 0, 2, 14, 0, 0, 0, 1, '', '好些时候没上来了，你们很积极啊，亲们！！', 0, '1415603369'),
(8, 0, 2, 14, 0, 0, 1, 1, 'Public/Uploads/20141110/546064ba83b96.jpg', '好些时候没上来了，你们很积极啊，亲们！！', 1, '1415603386'),
(9, 0, 1, 13, 0, 0, 0, 1, 'Public/Uploads/20141110/546064c8a26a6.jpg', '好些时候没上来了，你们很积极啊，亲们！！', 1, '1415603400'),
(10, 0, 1, 13, 0, 0, 0, 1, 'Public/Uploads/20141110/546064d25bce2.jpg', '好些时候没上来了，你们很积极啊，亲们！！', 1, '1415603410'),
(11, 0, 1, 13, 0, 0, 0, 1, 'Public/Uploads/20141110/546064df9c051.jpg', '好些时候没上来了，你们很积极啊，亲们！！', 1, '1415603423'),
(12, 0, 1, 13, 0, 0, 0, 1, 'Public/Uploads/20141110/546064ee4e8ea.jpg', '好些时候没上来了，你们很积极啊，亲们！！', 1, '1415603438'),
(13, 0, 1, 13, 0, 0, 1, 1, '', '好些时候没上来了，你们很积极啊，亲们！！', 1, '1415603449'),
(17, 0, 3, 15, 0, 0, 1, 1, 'Public/Uploads/20141112/5462bacac2fe7.jpg', '只想你过得好，我心里其实很痛，但是不会有人知道的，是吧？他们跟我不熟，没有理由要理解我，我也没有必要让他们理解我？我干嘛要？？', 1, '1415756490'),
(18, 0, 1, 22, 0, 0, 0, 0, '', 'sdasdsadsa', 1, '1415931739'),
(19, 0, 1, 22, 0, 0, 0, 0, '', 'sdadsadsadsadsa', 1, '1415931745'),
(20, 0, 1, 13, 0, 0, 0, 0, '', 'hahahahahahah', 1, '1415931757'),
(21, 0, 1, 13, 0, 0, 0, 0, '', 'dddd', 1, '1415931762'),
(22, 2, 7, 23, 0, 1, 0, 0, 'Public/Uploads/20141114/5465c5bf9bbdc.jpg', '你说的真好，支持支持！！', 1, '1415955903'),
(23, 1, 7, 23, 22, 2, 0, 0, 'Public/Uploads/20141114/5465c5bf9bbdc.jpg', '你说的真好，支持支持！！', 1, '1415955903'),
(24, 2, 7, 23, 22, 1, 0, 0, 'Public/Uploads/20141114/5465c5bf9bbdc.jpg', '你说的真好，支持支持！！', 1, '1415955903'),
(25, 1, 7, 23, 22, 2, 0, 0, 'Public/Uploads/20141114/5465c5bf9bbdc.jpg', '你说的真好，支持支持！！', 1, '1415955903'),
(26, 3, 7, 23, 22, 2, 0, 0, 'Public/Uploads/20141114/5465c5bf9bbdc.jpg', '你说的真好，支持支持！！', 1, '1415955903'),
(27, 3, 7, 23, 0, 2, 0, 0, 'Public/Uploads/20141114/5465c5bf9bbdc.jpg', '你说的真好，支持支持！！', 1, '1415955903'),
(28, 2, 7, 23, 27, 3, 0, 0, 'Public/Uploads/20141114/5465c5bf9bbdc.jpg', '你说的真好，支持支持！！', 1, '1415955903'),
(29, 2, 7, 23, 27, 3, 0, 0, 'Public/Uploads/20141114/5465c5bf9bbdc.jpg', '你说的真好，支持支持！！', 1, '1415955903');

-- --------------------------------------------------------

--
-- 表的结构 `vii_feedback`
--

CREATE TABLE IF NOT EXISTS `vii_feedback` (
  `id` int(13) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(13) NOT NULL DEFAULT '0',
  `contact` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `content` varchar(300) NOT NULL,
  `addtime` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `vii_feedback`
--

INSERT INTO `vii_feedback` (`id`, `uid`, `contact`, `status`, `content`, `addtime`) VALUES
(1, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(2, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(3, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(4, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(5, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(6, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(7, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(8, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(9, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(10, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(11, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(12, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(13, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(14, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(15, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(16, 2, '451436241', 0, '测试而已啦！', '1415254952'),
(17, 2, '451436241', 0, '测试而已啦！', '1415254952');

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
  `like` int(6) NOT NULL DEFAULT '0',
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

INSERT INTO `vii_share` (`id`, `title`, `uid`, `is_hot`, `is_tj`, `is_top`, `is_check`, `status`, `member`, `click`, `like`, `pic`, `lock`, `desc`, `remark`, `ctime`) VALUES
(1, '微商助手之分享圈', 0, 0, 1, 0, 1, 1, '1', 10, 0, 'Public/Uploads/20141104/545832fbb61fd.jpg', 0, '小青椒微商分享圈，分享微商经验，让你进步，让你成功！', '小青椒微商分享圈，分享微商经验，让你进步，让你成功！', '1415935887'),
(2, '微商城ddd', 0, 0, 0, 0, 0, 1, '', 0, 0, 'Public/Uploads/20141103/545737ddc63e9.png', 0, '微商城，一个让你成长让你进步让你成微商城，一个让你成长让你进步让你成功的平台！微商城，一个让你成长让你进步让你成功的平台！功的平台！', '微商城ddd', '1415002077'),
(3, '微商城', 1, 1, 0, 0, 1, 0, '1,2,3', 0, 0, 'Public/Uploads/20141103/545737eb5c41d.jpg', 0, '微商城，一个让你成长让你进步让你成功的平台！', '微商城，一个让你成长让你进步让你成功的平台！', '1415002091'),
(4, '微商城2222', 0, 1, 0, 0, 0, 1, '', 0, 0, 'Public/Uploads/20141103/5457380c544c7.jpg', 0, '微商城，一个让你成长让你进步让你成功的平台！', '微商城，一个让你成长让你进步让你成功的平台！', '1415002124'),
(8, '测试项目3', 0, 1, 1, 0, 1, 0, '', 0, 0, 'Public/Uploads/20141104/54587d5c25d04.jpg', 0, '测试项目3', '测试项目3', '1415085403'),
(6, '服务内容介绍1111', 0, 0, 0, 0, 1, 0, '', 0, 0, 'Public/Uploads/20141104/545826bc5f816.jpg', 1, '服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111服务内容介绍1111', '服务内容介绍1111服务内容介绍1111v', '1415063228'),
(7, '小青椒微商分享圈', 0, 1, 1, 1, 1, 1, '', 0, 0, 'Public/Uploads/20141114/5465788c02f27.jpg', 0, '小青椒微商分享圈，分享微商经验，让你进步，让你成功！', '小青椒微商分享圈，分享微商经验，让你进步，让你成功！', '1415936140'),
(14, '冰冰的美，你懂嘛？', 0, 0, 1, 0, 1, 1, '', 0, 0, 'Public/Uploads/20141114/5465a03f06fbf.jpg', 1, '冰冰的美，你懂嘛？冰冰的美，你懂嘛？', '冰冰的美，你懂嘛？', '1415946302');

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
  `pic` varchar(200) NOT NULL,
  `reg_time` varchar(13) NOT NULL,
  `remark` varchar(60) NOT NULL DEFAULT '无信息备注！',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- 转存表中的数据 `vii_users`
--

INSERT INTO `vii_users` (`id`, `nickname`, `password`, `phone`, `email`, `score`, `lock`, `lev`, `pic`, `reg_time`, `remark`) VALUES
(1, '爱恨情仇', 'e10adc3949ba59abbe56e057f20f883e', '13249170728', '595441550@qq.com', 0, 0, 0, '', '1415071241', '56445544455544545'),
(2, '青椒的故事', '343b1c4a3ea721b2d640fc8700db0f36', '15876513076', '451436241@qq.com', 20000, 0, 3, '', '1414742188', '青椒小故事！'),
(3, 'superStar', '980ac217c6b51e7dc41040bec1edfec8', '13249170720', '5654548@qq.com', 0, 0, 0, '', '1415071256', '洒大地'),
(52, 'test', '098f6bcd4621d373cade4e832627b4f6', '13249170728', '5954415501@qq.com', 0, 0, 0, '', '1416071121', '5954415501@qq.com'),
(53, '测试注册', 'e10adc3949ba59abbe56e057f20f883e', '', 'super@163.com', 500, 0, 0, '', '1416133950', '无信息备注！'),
(54, '测试注册198', 'e10adc3949ba59abbe56e057f20f883e', '', 'super@qq.com', 500, 0, 0, '', '1416134124', '无信息备注！');

-- --------------------------------------------------------

--
-- 表的结构 `vii_user_share`
--

CREATE TABLE IF NOT EXISTS `vii_user_share` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `uid` int(13) NOT NULL,
  `sid` int(13) NOT NULL,
  `score` int(13) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `vii_user_share`
--

INSERT INTO `vii_user_share` (`id`, `uid`, `sid`, `score`) VALUES
(1, 2, 7, 4),
(2, 3, 7, 1);

-- --------------------------------------------------------

--
-- 表的结构 `vii_visit`
--

CREATE TABLE IF NOT EXISTS `vii_visit` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `counts` int(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `vii_visit`
--

INSERT INTO `vii_visit` (`id`, `title`, `counts`) VALUES
(1, 'visit', 919);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
