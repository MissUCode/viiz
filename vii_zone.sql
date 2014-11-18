-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 11 月 18 日 08:50
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
  `like` int(6) NOT NULL DEFAULT '0',
  `lock` tinyint(1) NOT NULL DEFAULT '0',
  `content` varchar(600) NOT NULL,
  `addtime` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `vii_article`
--

INSERT INTO `vii_article` (`id`, `title`, `uid`, `sid`, `is_hot`, `is_tj`, `is_top`, `is_check`, `status`, `pics`, `click`, `like`, `lock`, `content`, `addtime`) VALUES
(27, '大家注意，这是骗人的，不要相信！！', 55, 20, 0, 0, 0, 0, 1, 'Public/Uploads/20141118/546b013408eab.jpg', 0, 0, 0, '大家注意，这是骗人的，不要相信，有图有真相，不要被骗了！！', '1416298807'),
(26, '请你们出一个使用手册呗？', 55, 19, 0, 0, 0, 1, 1, 'Public/Uploads/20141118/546afb97ae2f4.jpg', 0, 0, 0, '请你们出一个使用手册呗？我都不知道怎么操作，体验好差的哟，请出帮助文档，好吗？亲爱的微商助手？', '1416297370'),
(25, 'Donkey正品面膜，欢迎订购', 55, 20, 0, 0, 0, 1, 1, 'Public/Uploads/20141118/546af1bd454ac.jpg', 0, 0, 0, 'Donkey正品面膜，欢迎订购，正品保证，无理由七天退还货，真的很给力！', '1416294847'),
(24, '用户中心“我的帖子”的问题反馈', 0, 19, 0, 0, 1, 1, 1, 'Public/Uploads/20141118/546a97b4b8d39.jpg', 0, 0, 0, '我的帖子不显示图片，点击浏览也无效，希望微商助手官方技术人员解决这个问题，或者这是有意而为之，请给一个满意的解释，谢谢！', '1416271796');

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
(17, 0, 3, 15, 0, 0, 1, 1, 'Public/Uploads/20141112/5462bacac2fe7.jpg', '只想你过得好，我心里其实很痛，但是不会有人知道的，是吧？他们跟我不熟，没有理由要理解我，我也没有必要让他们理解我？我干嘛要？？', 1, '1415756490');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `vii_share`
--

INSERT INTO `vii_share` (`id`, `title`, `uid`, `is_hot`, `is_tj`, `is_top`, `is_check`, `status`, `member`, `click`, `like`, `pic`, `lock`, `desc`, `remark`, `ctime`) VALUES
(20, 'Donkey正品面膜微商分享圈', 55, 0, 0, 0, 0, 1, '55', 22, 0, 'Public/Uploads/20141118/546af1038398c.jpg', 0, 'Donkey正品面膜微商分享圈，欢迎大家加圈积极发言，有惊喜哦？不信你点击我试试！！\n<a href=''http://www.viisou.com''>惊喜领取</a>', '', '1416294663'),
(19, '微商助手官方分享圈', 52, 0, 0, 1, 1, 1, '52', 120, 0, 'Public/Uploads/20141117/5469bb2286c9f.jpg', 0, '这是微商助手官方分享圈，希望大家能够积极发言，您有什么建议或者发现什么问题都可以发帖反映，我们将以最快的速度为大家解决，非常感谢您的支持与帮助！', '', '1416271593');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- 转存表中的数据 `vii_users`
--

INSERT INTO `vii_users` (`id`, `nickname`, `password`, `phone`, `email`, `score`, `lock`, `lev`, `pic`, `reg_time`, `remark`) VALUES
(1, '爱恨情仇', 'e10adc3949ba59abbe56e057f20f883e', '13249170729', '595441550@qq.com', 0, 0, 0, '', '1415071241', '56445544455544545'),
(2, '青椒的故事', '343b1c4a3ea721b2d640fc8700db0f36', '15876513076', '451436241@qq.com', 20000, 0, 3, '', '1414742188', '青椒小故事！'),
(3, 'superStar', '980ac217c6b51e7dc41040bec1edfec8', '13249170720', '5654548@qq.com', 0, 0, 0, '', '1415071256', '洒大地'),
(52, 'test', '098f6bcd4621d373cade4e832627b4f6', '13249170721', '5954415501@qq.com', 0, 0, 0, '', '1416071121', '5954415501@qq.com'),
(53, '测试注册', 'e10adc3949ba59abbe56e057f20f883e', '', 'super@163.com', 500, 0, 0, '', '1416133950', '无信息备注！'),
(54, '测试注册198', 'e10adc3949ba59abbe56e057f20f883e', '', 'super@qq.com', 500, 0, 0, '', '1416134124', '无信息备注！'),
(55, 'Donkey', 'e10adc3949ba59abbe56e057f20f883e', '13249170728', '', 500, 0, 0, '', '1416272174', '无信息备注！');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `vii_user_share`
--

INSERT INTO `vii_user_share` (`id`, `uid`, `sid`, `score`) VALUES
(4, 55, 20, 3),
(5, 52, 20, 0),
(3, 52, 19, 3),
(6, 55, 19, 0);

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
(1, 'visit', 1510);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
