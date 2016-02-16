-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2016-02-16 11:31:16
-- 伺服器版本: 5.6.25
-- PHP 版本： 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `vt_vote`
--
CREATE DATABASE IF NOT EXISTS `vt_vote` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vt_vote`;

-- --------------------------------------------------------

--
-- 資料表結構 `vt_admin`
--

DROP TABLE IF EXISTS `vt_admin`;
CREATE TABLE IF NOT EXISTS `vt_admin` (
  `vt_id` tinyint(4) NOT NULL COMMENT '自動編號',
  `vt_admin_user` varchar(30) NOT NULL COMMENT '帳號',
  `vt_admin_pass` varchar(40) NOT NULL COMMENT '密碼',
  `vt_name` varchar(10) NOT NULL COMMENT '名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `vt_guest`
--

DROP TABLE IF EXISTS `vt_guest`;
CREATE TABLE IF NOT EXISTS `vt_guest` (
  `vt_id` int(11) NOT NULL COMMENT '自動編號',
  `vt_title` varchar(30) NOT NULL COMMENT '留言標題',
  `vt_content` text NOT NULL COMMENT '留言内容',
  `vt_time` datetime NOT NULL COMMENT '留言時間',
  `vt_ip` char(15) NOT NULL COMMENT '留言ip'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `vt_ip`
--

DROP TABLE IF EXISTS `vt_ip`;
CREATE TABLE IF NOT EXISTS `vt_ip` (
  `vt_id` tinyint(4) NOT NULL COMMENT '自動編號',
  `vt_title` varchar(30) NOT NULL COMMENT '投票主題',
  `vt_listid` tinyint(4) NOT NULL COMMENT '選項id',
  `vt_ip` char(15) NOT NULL COMMENT '投票ip',
  `vt_time` datetime NOT NULL COMMENT '投票時間',
  `vt_timelimit` int(11) NOT NULL COMMENT '同ip現時投票'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `vt_list`
--

DROP TABLE IF EXISTS `vt_list`;
CREATE TABLE IF NOT EXISTS `vt_list` (
  `vt_id` tinyint(4) NOT NULL COMMENT 'auto_increase',
  `vt_vid` tinyint(4) NOT NULL COMMENT '投票主題id',
  `vt_title` varchar(20) NOT NULL COMMENT '投票主題',
  `vt_list` varchar(32) NOT NULL COMMENT '投票選項',
  `vt_count` int(11) NOT NULL COMMENT '投票總數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `vt_notice`
--

DROP TABLE IF EXISTS `vt_notice`;
CREATE TABLE IF NOT EXISTS `vt_notice` (
  `vt_id` int(11) NOT NULL COMMENT '自動編號',
  `vt_title` varchar(30) NOT NULL COMMENT '公告標題',
  `vt_content` varchar(255) NOT NULL COMMENT '公告内容',
  `vt_admin` varchar(20) NOT NULL COMMENT '公告發佈人',
  `vt_time` datetime NOT NULL COMMENT '公告時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `vt_student`
--

DROP TABLE IF EXISTS `vt_student`;
CREATE TABLE IF NOT EXISTS `vt_student` (
  `id` int(11) NOT NULL COMMENT 'auto_increase',
  `student_id` varchar(11) NOT NULL COMMENT '學號',
  `student_password` varchar(40) NOT NULL COMMENT '密碼',
  `student_name` varchar(6) NOT NULL COMMENT '名字',
  `student_phone` varchar(13) NOT NULL COMMENT '電話',
  `signup_ip` varchar(20) NOT NULL COMMENT '註冊時ip',
  `signup_time` date NOT NULL COMMENT '註冊時間',
  `token` tinyint(1) NOT NULL COMMENT '驗證檢查'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `vt_theme`
--

DROP TABLE IF EXISTS `vt_theme`;
CREATE TABLE IF NOT EXISTS `vt_theme` (
  `vt_id` tinyint(4) NOT NULL COMMENT '自動編號',
  `vt_title` varchar(30) NOT NULL COMMENT '投票主題\\',
  `vt_time` datetime NOT NULL COMMENT '開始日期',
  `vt_deadtime` datetime NOT NULL COMMENT '結束日期',
  `vt_admin` varchar(20) NOT NULL COMMENT '發佈者',
  `vt_type` varchar(20) NOT NULL COMMENT '投票類型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `vt_admin`
--
ALTER TABLE `vt_admin`
  ADD PRIMARY KEY (`vt_id`);

--
-- 資料表索引 `vt_guest`
--
ALTER TABLE `vt_guest`
  ADD PRIMARY KEY (`vt_id`);

--
-- 資料表索引 `vt_ip`
--
ALTER TABLE `vt_ip`
  ADD PRIMARY KEY (`vt_id`);

--
-- 資料表索引 `vt_list`
--
ALTER TABLE `vt_list`
  ADD PRIMARY KEY (`vt_id`);

--
-- 資料表索引 `vt_notice`
--
ALTER TABLE `vt_notice`
  ADD PRIMARY KEY (`vt_id`);

--
-- 資料表索引 `vt_student`
--
ALTER TABLE `vt_student`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `vt_theme`
--
ALTER TABLE `vt_theme`
  ADD PRIMARY KEY (`vt_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `vt_admin`
--
ALTER TABLE `vt_admin`
  MODIFY `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '自動編號';
--
-- 使用資料表 AUTO_INCREMENT `vt_guest`
--
ALTER TABLE `vt_guest`
  MODIFY `vt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自動編號';
--
-- 使用資料表 AUTO_INCREMENT `vt_ip`
--
ALTER TABLE `vt_ip`
  MODIFY `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '自動編號';
--
-- 使用資料表 AUTO_INCREMENT `vt_list`
--
ALTER TABLE `vt_list`
  MODIFY `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'auto_increase';
--
-- 使用資料表 AUTO_INCREMENT `vt_notice`
--
ALTER TABLE `vt_notice`
  MODIFY `vt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自動編號';
--
-- 使用資料表 AUTO_INCREMENT `vt_student`
--
ALTER TABLE `vt_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto_increase';
--
-- 使用資料表 AUTO_INCREMENT `vt_theme`
--
ALTER TABLE `vt_theme`
  MODIFY `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '自動編號';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
