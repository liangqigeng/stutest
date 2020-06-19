-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost:3306
-- 生成日期： 2020-06-15 17:02:26
-- 服务器版本： 5.7.24
-- PHP 版本： 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `stutest`
--

-- --------------------------------------------------------

--
-- 表的结构 `stu_admin`
--

CREATE TABLE `stu_admin` (
  `aid` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL COMMENT '账号名',
  `password` char(32) NOT NULL COMMENT '密码'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `stu_admin`
--

INSERT INTO `stu_admin` (`aid`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- 表的结构 `stu_grade`
--

CREATE TABLE `stu_grade` (
  `gid` int(10) UNSIGNED NOT NULL,
  `g_name` varchar(50) NOT NULL COMMENT '班级名称'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='班级表';

--
-- 转存表中的数据 `stu_grade`
--

INSERT INTO `stu_grade` (`gid`, `g_name`) VALUES
(1, '11'),
(2, 'eras'),
(3, 'gg'),
(4, '红色'),
(5, 'tt'),
(7, '二年级'),
(9, '三年级'),
(11, '八年级');

-- --------------------------------------------------------

--
-- 表的结构 `stu_user`
--

CREATE TABLE `stu_user` (
  `uid` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `gid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生表';

--
-- 转存表中的数据 `stu_user`
--

INSERT INTO `stu_user` (`uid`, `username`, `gid`) VALUES
(1, '小明', 7),
(4, 'oooo', 5),
(5, '你们', 7),
(8, '平民', 4),
(9, 'admin', 1),
(10, 'zjcadmin', 11);

--
-- 转储表的索引
--

--
-- 表的索引 `stu_admin`
--
ALTER TABLE `stu_admin`
  ADD PRIMARY KEY (`aid`);

--
-- 表的索引 `stu_grade`
--
ALTER TABLE `stu_grade`
  ADD PRIMARY KEY (`gid`);

--
-- 表的索引 `stu_user`
--
ALTER TABLE `stu_user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `gid` (`gid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `stu_admin`
--
ALTER TABLE `stu_admin`
  MODIFY `aid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `stu_grade`
--
ALTER TABLE `stu_grade`
  MODIFY `gid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `stu_user`
--
ALTER TABLE `stu_user`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
