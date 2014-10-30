-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 10 月 30 日 08:50
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `vii_admin`
--

INSERT INTO `vii_admin` (`id`, `admin_name`, `password`, `phone`, `email`, `login_ip`, `login_time`, `lev`, `lock`, `remark`, `ctime`) VALUES
(3, 'viiadmin', 'ab244795339868d6e9d35ed7e7de7e3b', '13249170728', '595441550@qq.com', '127.0.0.1', '1414570831', 0, 0, '小编！', '1414570668'),
(5, 'super', 'af1bd38b426d0640d6ba8b809a59118d', '15876513076', '451436241@qq.com', '127.0.0.1', '1414570831', 1, 0, '网站超级管理员，网站建设者本尊！', '1414570831'),
(6, 'editer', '451e294d97eea021c59c88d95cebd878', '15876513076', '595441550@qq.com', '127.0.0.1', '1414570831', 0, 1, 'editer', '1414658661');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
