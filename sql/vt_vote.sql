-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2016-02-14 12:13:11
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

-- --------------------------------------------------------

--
-- 資料表結構 `vt_admin`
--

CREATE TABLE IF NOT EXISTS `vt_admin` (
  `vt_id` tinyint(4) NOT NULL COMMENT '//自动编号',
  `vt_admin_user` varchar(30) NOT NULL COMMENT '//用户名',
  `vt_admin_pass` varchar(40) NOT NULL COMMENT '密碼',
  `vt_name` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `vt_admin`
--

INSERT INTO `vt_admin` (`vt_id`, `vt_admin_user`, `vt_admin_pass`, `vt_name`) VALUES
(1, 'hwh', '83c0e207db3744a5d7e28829c93b746ae87f0136', '黃偉鑫'),
(2, 'admin', '7fe2126e2baf0795795937bf0cf6a382266285f5', '課務組');

-- --------------------------------------------------------

--
-- 資料表結構 `vt_guest`
--

CREATE TABLE IF NOT EXISTS `vt_guest` (
  `vt_id` int(11) NOT NULL COMMENT '//自动编号',
  `vt_title` varchar(30) NOT NULL COMMENT '//留言标题',
  `vt_content` text NOT NULL COMMENT '//留言内容',
  `vt_time` datetime NOT NULL COMMENT '//留言时间',
  `vt_ip` char(15) NOT NULL COMMENT '//留言ip'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `vt_guest`
--

INSERT INTO `vt_guest` (`vt_id`, `vt_title`, `vt_content`, `vt_time`, `vt_ip`) VALUES
(1, 'qqqq', 'qqqqqqqqqq', '2016-02-05 11:32:37', '::1');

-- --------------------------------------------------------

--
-- 資料表結構 `vt_ip`
--

CREATE TABLE IF NOT EXISTS `vt_ip` (
  `vt_id` tinyint(4) NOT NULL COMMENT '//自动编号',
  `vt_title` varchar(30) NOT NULL COMMENT '//投票主题',
  `vt_listid` tinyint(4) NOT NULL COMMENT '//选项id',
  `vt_ip` char(15) NOT NULL COMMENT '//投票ip',
  `vt_time` datetime NOT NULL COMMENT '//投票时间',
  `vt_timelimit` int(11) NOT NULL COMMENT '//同ip限时投票'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `vt_ip`
--

INSERT INTO `vt_ip` (`vt_id`, `vt_title`, `vt_listid`, `vt_ip`, `vt_time`, `vt_timelimit`) VALUES
(1, '投出你最喜歡的專業課程', 17, '::1', '2016-02-14 14:51:06', 0),
(2, '投出你最喜歡的專業課程', 18, '::1', '2016-02-14 16:44:57', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `vt_list`
--

CREATE TABLE IF NOT EXISTS `vt_list` (
  `vt_id` tinyint(4) NOT NULL COMMENT 'auto_increase',
  `vt_vid` tinyint(4) NOT NULL COMMENT '投票主題id',
  `vt_title` varchar(20) NOT NULL COMMENT '投票主題',
  `vt_list` varchar(32) NOT NULL COMMENT '投票選項',
  `vt_count` int(11) NOT NULL COMMENT '投票總數'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `vt_list`
--

INSERT INTO `vt_list` (`vt_id`, `vt_vid`, `vt_title`, `vt_list`, `vt_count`) VALUES
(16, 2, '投出你最喜歡的通識課程', 'wwww', 6),
(17, 1, '', 'qqqq', 1),
(18, 1, '', 'wwwww', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `vt_notice`
--

CREATE TABLE IF NOT EXISTS `vt_notice` (
  `vt_id` int(11) NOT NULL COMMENT '//自动编号',
  `vt_title` varchar(30) NOT NULL COMMENT '//公告标题',
  `vt_content` varchar(255) NOT NULL COMMENT '//公告内容',
  `vt_admin` varchar(20) NOT NULL COMMENT '//公告发布人',
  `vt_time` datetime NOT NULL COMMENT '//公告时间'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `vt_notice`
--

INSERT INTO `vt_notice` (`vt_id`, `vt_title`, `vt_content`, `vt_admin`, `vt_time`) VALUES
(4, '你好@', 'qqqqqqqqqqqqqqqqqqqqqq', 'hwh', '2016-02-05 10:51:56'),
(5, 'qqqqq', 'qqqqqqqqqqqqqq', '課務組', '2016-02-05 14:45:38');

-- --------------------------------------------------------

--
-- 資料表結構 `vt_student`
--

CREATE TABLE IF NOT EXISTS `vt_student` (
  `id` int(11) NOT NULL COMMENT 'auto_increase',
  `student_id` varchar(11) NOT NULL COMMENT '學號',
  `student_password` varchar(40) NOT NULL COMMENT '密碼',
  `student_name` varchar(6) NOT NULL COMMENT '名字',
  `signup_ip` varchar(20) NOT NULL,
  `signup_time` date NOT NULL,
  `token` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `vt_student`
--

INSERT INTO `vt_student` (`id`, `student_id`, `student_password`, `student_name`, `signup_ip`, `signup_time`, `token`) VALUES
(3, 'wwwwwwwwww', '', 'www', '::1', '2016-02-09', 0),
(4, 'wwwwwwwww', '', 'www', '::1', '2016-02-09', 0),
(5, 'wwwwwwwww', 'www', 'www', '::1', '2016-02-09', 0),
(6, 'wwwwwwwww', 'www', 'www', '::1', '2016-02-09', 0),
(7, 'wwwwwwwwww', 'www', 'www', '::1', '2016-02-09', 0),
(8, 'wwwwwwwwww', 'www', 'www', '::1', '2016-02-09', 0),
(9, 'wwwwwwwwww', 'www', 'www', '::1', '2016-02-09', 0),
(10, 'qeeeeeeeee', 'eee', 'www', '::1', '2016-02-09', 0),
(11, 'qeeeeeewww', 'www', 'www', '::1', '2016-02-09', 0),
(31, 'N96041101', 'www', 'www', '::1', '2016-02-10', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `vt_theme`
--

CREATE TABLE IF NOT EXISTS `vt_theme` (
  `vt_id` tinyint(4) NOT NULL COMMENT '//自动编号',
  `vt_title` varchar(30) NOT NULL COMMENT '//投票主题',
  `vt_time` datetime NOT NULL COMMENT '開始日期',
  `vt_deadtime` datetime NOT NULL,
  `vt_admin` varchar(20) NOT NULL COMMENT '//发起人',
  `vt_type` varchar(20) NOT NULL COMMENT '//投票类型'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `vt_theme`
--

INSERT INTO `vt_theme` (`vt_id`, `vt_title`, `vt_time`, `vt_deadtime`, `vt_admin`, `vt_type`) VALUES
(1, '投出你最喜歡的專業課程', '2015-09-03 20:40:38', '2016-01-28 00:00:00', '課務組', ''),
(2, '投出你最喜歡的通識課程', '2016-02-05 10:46:51', '2017-03-01 00:00:00', 'hwh', '');

-- --------------------------------------------------------

--
-- 資料表結構 `vt_theme_1`
--

CREATE TABLE IF NOT EXISTS `vt_theme_1` (
  `ai` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL COMMENT '學生的學號',
  `student_vote_id` int(4) NOT NULL COMMENT '學生的投票選擇',
  `student_interview` tinyint(2) NOT NULL COMMENT '學生是否接受訪問',
  `ip` varchar(20) NOT NULL,
  `vote_time` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `vt_theme_1`
--

INSERT INTO `vt_theme_1` (`ai`, `student_id`, `student_vote_id`, `student_interview`, `ip`, `vote_time`) VALUES
(7, 'N96041101', 18, 1, '::1', '2016-02-14');

-- --------------------------------------------------------

--
-- 資料表結構 `vt_theme_2`
--

CREATE TABLE IF NOT EXISTS `vt_theme_2` (
  `ai` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `student_vote_id` int(4) NOT NULL,
  `student_interview` tinyint(2) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `vote_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `vt_theme_2`
--

INSERT INTO `vt_theme_2` (`ai`, `student_id`, `student_vote_id`, `student_interview`, `ip`, `vote_time`) VALUES
(0, 'N96041101', 16, 1, '::1', '2016-02-14');

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
-- 資料表索引 `vt_theme_1`
--
ALTER TABLE `vt_theme_1`
  ADD PRIMARY KEY (`ai`);

--
-- 資料表索引 `vt_theme_2`
--
ALTER TABLE `vt_theme_2`
  ADD PRIMARY KEY (`ai`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `vt_admin`
--
ALTER TABLE `vt_admin`
  MODIFY `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `vt_guest`
--
ALTER TABLE `vt_guest`
  MODIFY `vt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `vt_ip`
--
ALTER TABLE `vt_ip`
  MODIFY `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `vt_list`
--
ALTER TABLE `vt_list`
  MODIFY `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'auto_increase',AUTO_INCREMENT=19;
--
-- 使用資料表 AUTO_INCREMENT `vt_notice`
--
ALTER TABLE `vt_notice`
  MODIFY `vt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `vt_student`
--
ALTER TABLE `vt_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto_increase',AUTO_INCREMENT=32;
--
-- 使用資料表 AUTO_INCREMENT `vt_theme`
--
ALTER TABLE `vt_theme`
  MODIFY `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `vt_theme_1`
--
ALTER TABLE `vt_theme_1`
  MODIFY `ai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
