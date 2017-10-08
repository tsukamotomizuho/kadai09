-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 10 朁E08 日 09:20
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db28`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE IF NOT EXISTS `gs_an_table` (
`id` int(12) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `naiyou`, `indate`) VALUES
(1, 'はまもと', 'test@mail', '質問28', '2017-09-23 15:10:47'),
(2, 'みずほ', 'test@update', '質問27', '2017-09-23 15:30:49'),
(4, 'つかもと', 'test@mail3', '質問25', '2017-09-23 15:30:49'),
(6, 'かまた', 'test@mail5', '質問23', '2017-09-23 15:30:49'),
(7, 'たなか', 'tanaka@test.jp', 'わー', '2017-09-23 16:15:39');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`book_id` int(12) NOT NULL,
  `book_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `book_url` text COLLATE utf8_unicode_ci NOT NULL,
  `book_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`book_id`, `book_name`, `book_url`, `book_comment`, `create_date`) VALUES
(1, 'PHP入門2', 'https://www.xxxx.jp.com', 'わかりやすい', '2017-09-24 15:44:25'),
(2, 'HTML入門2', 'https://www.xxxx.com2', 'むずかしい2', '2017-09-24 15:57:59'),
(3, 'JS入門', 'http://localhost/gs/xxx', '簡単', '2017-09-24 15:58:51'),
(4, 'PHP超入門', 'http://xxxxx', '超簡単', '2017-09-24 16:03:29'),
(6, 'HTML超入門２', 'http://xxxxx２', 'かんたん２', '2017-10-03 21:05:52'),
(8, '三国志', 'http://xxxxx', 'あわてるな！これは孔明の罠だ！', '2017-10-07 19:30:36'),
(9, '封神演義', 'http://xxxxx２', 'おもしろい', '2017-10-08 16:07:39'),
(10, 'ジャンプ', 'http://xxxxx3', '青春', '2017-10-08 16:09:21');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(17, 'mm', 'mm', '$2y$10$fdJDwlLRC6Qpx30I6O3zee8m42ON6gnF15.zLXtZBGjedK2JuKKBa', 1, 0),
(18, 'su', 'su', '$2y$10$ZHFm.yXYYQ5pe5NG9o3PjeNADW4EYKlJO0ObPE0Z7Uw/e010gnLIG', 1, 0),
(19, 'admin', 'admin', '$2y$10$KQN3dwSd5EZ2mWDC9lsgfeCCN4c66aid404hz9EjgnSiyjyyBoUdy', 1, 0),
(20, 'test', 'test', '$2y$10$rL2Z.nJsx8FCtiG.g241IeCMLDQLv8Bt5FEYrj4AgTFgr9yYs2i32', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `book_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
