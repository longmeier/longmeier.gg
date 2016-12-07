-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 02 月 21 日 05:58
-- 服务器版本: 5.1.50
-- PHP 版本: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `demo`
--

-- --------------------------------------------------------

--
-- 表的结构 `dc_details`
--

CREATE TABLE IF NOT EXISTS `dc_details` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `ordersn` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `error_code` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `dc_details`
--

INSERT INTO `dc_details` (`id`, `ordersn`, `state`, `error_code`) VALUES
(1, '123456', '0', ''),
(2, '20160221133722712', '0', ''),
(3, '20160221134018201', '101', ' '),
(4, '20160221134057676', '101', ' '),
(5, '20160221134139444', '101', ' '),
(6, '20160221134304124', '101', ' '),
(7, '20160221134304247', '101', ' ');

-- --------------------------------------------------------

--
-- 表的结构 `dc_sys`
--

CREATE TABLE IF NOT EXISTS `dc_sys` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `appkey` varchar(20) CHARACTER SET utf8 NOT NULL,
  `value` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `memo` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `create_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dc_sys`
--

INSERT INTO `dc_sys` (`id`, `appkey`, `value`, `memo`, `create_time`) VALUES
(1, 'token', 'j53iUdN6WVOnTrpBppaWKufQgVsAJJqtj9Op41q2pYYpXuHn', '获取token的值', 1456027163);
