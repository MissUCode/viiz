-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 11 月 20 日 08:59
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `vii_article`
--

INSERT INTO `vii_article` (`id`, `title`, `uid`, `sid`, `is_hot`, `is_tj`, `is_top`, `is_check`, `status`, `pics`, `click`, `like`, `lock`, `content`, `addtime`) VALUES
(28, '青椒梦想家分享圈说明', 55, 21, 0, 0, 0, 1, 1, 'Public/Uploads/20141119/546bf63976ae5.jpg', 0, 0, 0, '有梦的人都是很可爱的，你觉得吗？星爷说过：做人没有梦想，那跟咸鱼有什么差别！', '1416361531'),
(27, '大家注意，这是骗人的，不要相信！！', 55, 20, 0, 0, 0, 1, 1, 'Public/Uploads/20141118/546b013408eab.jpg', 0, 0, 0, '大家注意，这是骗人的，不要相信，有图有真相，不要被骗了！！', '1416298807'),
(26, '请你们出一个使用手册呗？', 55, 19, 0, 0, 0, 1, 1, 'Public/Uploads/20141118/546afb97ae2f4.jpg', 0, 4, 0, '请你们出一个使用手册呗？我都不知道怎么操作，体验好差的哟，请出帮助文档，好吗？亲爱的微商助手？', '1416297370'),
(25, 'Donkey正品面膜，欢迎订购', 55, 20, 0, 0, 0, 1, 1, 'Public/Uploads/20141118/546af1bd454ac.jpg', 0, 0, 0, 'Donkey正品面膜，欢迎订购，正品保证，无理由七天退还货，真的很给力！', '1416294847'),
(24, '用户中心“我的帖子”的问题反馈', 0, 19, 0, 0, 1, 1, 1, 'Public/Uploads/20141118/546a97b4b8d39.jpg', 0, 15, 0, '我的帖子不显示图片，点击浏览也无效，希望微商助手官方技术人员解决这个问题，或者这是有意而为之，请给一个满意的解释，谢谢！', '1416271796');

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
  `like` int(10) NOT NULL DEFAULT '0',
  `pics` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `addtime` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- 转存表中的数据 `vii_comment`
--

INSERT INTO `vii_comment` (`id`, `uid`, `sid`, `aid`, `pid`, `toid`, `is_good`, `is_check`, `like`, `pics`, `content`, `status`, `addtime`) VALUES
(45, 55, 19, 24, 33, 0, 0, 1, 0, '', '的撒旦撒', 1, '1416382787'),
(44, 55, 19, 24, 32, 32, 0, 1, 0, '', '？？？', 1, '1416382595'),
(43, 55, 19, 24, 32, 32, 0, 1, 0, '', '我去了！', 1, '1416382565'),
(42, 55, 19, 24, 32, 56, 0, 1, 0, '', '别说这么多好吗？', 1, '1416382541'),
(41, 55, 19, 24, 33, 56, 0, 1, 0, '', '美女，你是美女吗？', 1, '1416382501'),
(40, 55, 19, 24, 32, 0, 0, 1, 0, '', '你说得太多了！', 1, '1416382329'),
(39, 55, 19, 24, 33, 0, 0, 1, 0, '', '你小子胡说八道干嘛，你妹夫的！', 1, '1416382174'),
(38, 56, 19, 24, 32, 0, 0, 1, 0, '', '一个人没有梦想，跟咸鱼有什么区别？咸鱼能填饱肚子，你能养肥大地！', 1, '1416381916'),
(37, 56, 19, 24, 32, 0, 0, 1, 0, '', '这个呢？可行否？你妹夫的！！', 1, '1416381858'),
(36, 56, 19, 24, 33, 0, 0, 1, 0, '', '我真的是太高兴了，O(∩_∩)O哈哈~O(∩_∩)O哈哈~', 1, '1416381822'),
(34, 56, 19, 24, 33, 0, 0, 1, 0, '', '二级评论，靠谱不？<emt>2.gif</emt>', 1, '1416381764'),
(35, 56, 19, 24, 33, 0, 0, 1, 0, '', 'O(∩_∩)O哈哈~，果然靠谱啊，亲！！', 1, '1416381792'),
(33, 56, 19, 24, 0, 0, 0, 1, 0, '', '再次试试！<emt>31.gif</emt>', 1, '1416381509'),
(30, 55, 19, 24, 0, 0, 0, 1, 0, '', '低调点', 1, '1416380211'),
(31, 55, 19, 24, 0, 0, 0, 1, 0, '', '你们看我的评论，兼职就是帅爆了，谁敢跟我比？不服来战，不见不散！<emt>2.gif</emt><emt>22.gif</emt><emt>21.gif</emt>', 1, '1416380349'),
(32, 56, 19, 24, 0, 0, 0, 1, 0, '', '说点什么吧？我是来测试而已啦，真不知道行不行的嘎，我勒个去的的<emt>4.gif</emt><emt>4.gif</emt><emt>4.gif</emt>', 1, '1416380592'),
(51, 55, 19, 24, 31, 0, 0, 1, 0, '', '<emt>2.gif</emt><emt>3.gif</emt><emt>21.gif</emt><emt>7.gif</emt>', 1, '1416387480'),
(50, 55, 19, 26, 49, 0, 0, 1, 0, '', '自己顶自己！', 1, '1416383116'),
(49, 55, 19, 26, 0, 0, 0, 1, 0, '', '我来试试吧！！', 1, '1416383097'),
(48, 55, 19, 24, 30, 0, 0, 1, 0, '', '自己回复自己，可以吧？<emt>3.gif</emt>', 1, '1416382966'),
(47, 55, 19, 24, 0, 0, 1, 1, 8, '', '有时候真的是无奈啊，我不做的事情总有人去做，所以你做好人，别人却去做坏事！<emt>5.gif</emt><emt>5.gif</emt>', 1, '1416382910'),
(46, 55, 19, 24, 33, 56, 0, 1, 0, '', '没什么吧？', 1, '1416382802');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `vii_share`
--

INSERT INTO `vii_share` (`id`, `title`, `uid`, `is_hot`, `is_tj`, `is_top`, `is_check`, `status`, `member`, `click`, `like`, `pic`, `lock`, `desc`, `remark`, `ctime`) VALUES
(21, '青椒梦想家分享圈', 55, 0, 0, 0, 0, 1, '55', 4, 0, 'Public/Uploads/20141119/546bf5bd760d9.jpg', 0, '青椒梦想家分享圈，有梦就有可能，我们都是爱做梦的人，只要有梦，前方的路就会充满希望和挑战，我爱这样的人生！', '', '1416361410'),
(20, 'Donkey正品面膜微商分享圈', 55, 0, 0, 0, 0, 1, '55', 26, 0, 'Public/Uploads/20141118/546af1038398c.jpg', 0, 'Donkey正品面膜微商分享圈，欢迎大家加圈积极发言，有惊喜哦？不信你点击我试试！！\n<a href=''http://www.viisou.com''>惊喜领取</a>', '', '1416294663'),
(19, '微商助手官方分享圈', 52, 0, 0, 1, 1, 1, '52', 161, 3, 'Public/Uploads/20141117/5469bb2286c9f.jpg', 0, '这是微商助手官方分享圈，希望大家能够积极发言，您有什么建议或者发现什么问题都可以发帖反映，我们将以最快的速度为大家解决，非常感谢您的支持与帮助！', '', '1416271593');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

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
(55, 'Donkey', 'e10adc3949ba59abbe56e057f20f883e', '13249170728', '', 500, 0, 0, '', '1416272174', '无信息备注！'),
(56, '美女战野兽', 'e10adc3949ba59abbe56e057f20f883e', '', '451436254@qq.com', 500, 0, 0, '', '1416380502', '无信息备注！');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `vii_user_share`
--

INSERT INTO `vii_user_share` (`id`, `uid`, `sid`, `score`) VALUES
(4, 55, 20, 3),
(5, 52, 20, 0),
(3, 52, 19, 3),
(6, 55, 19, 0),
(7, 55, 21, 3),
(8, 56, 19, 0);

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
(1, 'visit', 2128);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
