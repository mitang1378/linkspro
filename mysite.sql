-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-07 14:20:26
-- 服务器版本： 5.7.13
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysite`
--

-- --------------------------------------------------------

--
-- 表的结构 `cmenu`
--

CREATE TABLE IF NOT EXISTS `cmenu` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `mid` int(11) NOT NULL COMMENT '所属用户',
  `location` tinyint(2) NOT NULL COMMENT '显示位置 0为未使用 1为左侧 2为右侧'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cmenu`
--

INSERT INTO `cmenu` (`id`, `name`, `mid`, `location`) VALUES
(1, '常用工具', 1, 1),
(2, '常用网址', 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `order` int(11) NOT NULL,
  `cid` int(16) NOT NULL DEFAULT '0',
  `mid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `links`
--

INSERT INTO `links` (`id`, `title`, `url`, `order`, `cid`, `mid`) VALUES
(3, 'Phpstorm', 'http://www.jetbrains.com/phpstorm/', 0, 1, 1),
(4, '百度统计', 'http://tongji.baidu.com/', 0, 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `nickname` varchar(64) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `login_num` int(11) NOT NULL DEFAULT '0',
  `last_ip` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`id`, `email`, `password_hash`, `nickname`, `status`, `created_at`, `updated_at`, `login_num`, `last_ip`, `password_reset_token`, `auth_key`) VALUES
(1, '83398365@qq.com', '$2y$13$fFVxq/VFpXYgraLQgGEdWOsCAaw6PJnoT20/9LsBZFI9sDPEvCa3m', 'MRfeng', 1, 1486108211, 1486108211, 0, '127.0.0.1', '', 'bXLlWhi9X59VT5fq70O7cVJ_yYHO3QUA');

-- --------------------------------------------------------

--
-- 表的结构 `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '名称',
  `content` text NOT NULL COMMENT '详情',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='任务列表';

-- --------------------------------------------------------

--
-- 表的结构 `upfiles`
--

CREATE TABLE IF NOT EXISTS `upfiles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `path` varchar(255) NOT NULL COMMENT '存储路径',
  `mid` int(11) NOT NULL COMMENT '所属用户',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `class` varchar(32) NOT NULL COMMENT '所属分类',
  `created_at` int(11) NOT NULL COMMENT '上传时间'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `upfiles`
--

INSERT INTO `upfiles` (`id`, `title`, `path`, `mid`, `status`, `class`, `created_at`) VALUES
(1, NULL, '/upload/20170206/1486373657372009.jpg', 1, 1, 'bgimg', 1486373659),
(2, NULL, '/upload/20170206/1486373791737005.jpg', 1, 0, 'bgimg', 1486373794);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmenu`
--
ALTER TABLE `cmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upfiles`
--
ALTER TABLE `upfiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cmenu`
--
ALTER TABLE `cmenu`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upfiles`
--
ALTER TABLE `upfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
