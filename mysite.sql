-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-03-20 10:17:02
-- 服务器版本： 5.5.48-log
-- PHP Version: 7.0.6

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
  `location` tinyint(2) NOT NULL COMMENT '显示位置 0为未使用 1为左侧 2为右侧',
  `orderid` int(11) NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cmenu`
--

INSERT INTO `cmenu` (`id`, `name`, `mid`, `location`, `orderid`) VALUES
(1, '常用工具', 1, 1, 0),
(2, '常用网址', 1, 2, 1),
(3, 'PHP', 1, 2, 2),
(4, '在做项目', 1, 1, 0),
(5, '干货博客', 1, 2, 1),
(6, 'NoSQL', 1, 2, 5),
(7, 'GO', 1, 2, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `links`
--

INSERT INTO `links` (`id`, `title`, `url`, `order`, `cid`, `mid`) VALUES
(3, 'Phpstorm', 'http://www.jetbrains.com/phpstorm/', 0, 1, 1),
(4, '百度统计', 'http://tongji.baidu.com/', 0, 2, 1),
(5, 'segmentfault', 'https://segmentfault.com/', 1, 2, 1),
(8, 'Yii Framework', 'http://www.yiiframework.com/', 1, 3, 1),
(9, '无忧直购', 'http://www.yiishop.com', 0, 4, 1),
(10, '无忧易购', 'http://www.93gou.com', 1, 4, 1),
(11, '零食盒子', 'http://www.lsbox.cn', 2, 4, 1),
(13, '掘金', 'https://gold.xitu.io/', 3, 2, 1),
(14, '吕立清', 'http://blog.jimmylv.info/', 0, 5, 1),
(15, ' 风雪之隅', 'http://www.laruence.com/', 1, 5, 1),
(16, '廖雪峰', 'http://www.liaoxuefeng.com/', 2, 5, 1),
(17, '各种手册', 'http://www.shouce.ren/api/index', 0, 3, 1),
(19, 'ITBooks', 'http://theithome.net', 5, 3, 1),
(20, '始终不够', 'http://www.huyanping.cn', 4, 5, 1),
(21, 'PHP之道', 'http://laravel-china.github.io/php-the-right-way/', 7, 3, 1),
(22, 'Redis中文文档', 'http://www.redis.cn/', 0, 6, 1),
(23, '马克飞象', 'https://maxiang.io/', 1, 1, 1),
(24, 'Go语言圣经', 'http://www.kancloud.cn/wizardforcel/gopl-zh/106359', 0, 7, 1),
(25, '白狼栈', 'http://www.manks.top/', 3, 5, 1),
(26, 'Redis fans', 'http://doc.redisfans.com/', 1, 6, 1),
(27, '国内常用API', 'https://microzz.com/2017/02/03/API/', 2, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`id`, `email`, `password_hash`, `nickname`, `status`, `created_at`, `updated_at`, `login_num`, `last_ip`, `password_reset_token`, `auth_key`) VALUES
(1, '83398365@qq.com', '$2y$13$fFVxq/VFpXYgraLQgGEdWOsCAaw6PJnoT20/9LsBZFI9sDPEvCa3m', 'MRfeng', 1, 1486108211, 1486108211, 0, '127.0.0.1', '', 'bXLlWhi9X59VT5fq70O7cVJ_yYHO3QUA'),
(2, '177688985@qq.com', '$2y$13$L9oMn5NjEy.JXPWQFj5CG.V.sypVwGxfAY2ia1NIte4FtitHzXP7a', 'transaction', 1, 1486200101, 1486200101, 0, '218.59.157.82', '', 'z_38C0YVQXJbCLgi5TczR8IsNUFm96ee');

-- --------------------------------------------------------

--
-- 表的结构 `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL,
  `task` text NOT NULL COMMENT '任务内容',
  `mid` int(11) NOT NULL COMMENT '所属用户',
  `created_at` int(11) NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='任务列表';

--
-- 转存表中的数据 `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `mid`, `created_at`) VALUES
(2, '增加模块开关功能', 1, 0),
(3, '增加音乐模块后台管理', 1, 0);

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
(1, NULL, '/upload/20170207/1486435083955556.jpg', 1, 0, 'bgimg', 1486435092),
(2, NULL, '/upload/20170317/1489728454221072.jpg', 1, 1, 'bgimg', 1489728457);

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
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `upfiles`
--
ALTER TABLE `upfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
