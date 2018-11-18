-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 11 月 18 日 13:48
-- 伺服器版本: 10.1.36-MariaDB
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
-- 資料庫： `myadsl_gym`
--

-- --------------------------------------------------------

--
-- 資料表結構 `appoint`
--

CREATE TABLE `appoint` (
  `I_ID` int(6) NOT NULL,
  `Course_ID` int(6) NOT NULL,
  `Begin_Time` datetime NOT NULL,
  `If_Checkin` char(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `appoint`
--

INSERT INTO `appoint` (`I_ID`, `Course_ID`, `Begin_Time`, `If_Checkin`) VALUES
(2, 1, '2018-11-18 19:00:00', 'Appoint');

-- --------------------------------------------------------

--
-- 資料表結構 `compose`
--

CREATE TABLE `compose` (
  `I_ID` int(6) NOT NULL,
  `Course_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `compose`
--

INSERT INTO `compose` (`I_ID`, `Course_ID`) VALUES
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `Course_ID` int(6) NOT NULL,
  `M_ID` int(6) NOT NULL,
  `Price` int(6) NOT NULL,
  `Course_Type` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Number_of_Session` int(3) NOT NULL,
  `Remaining_Number` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `course`
--

INSERT INTO `course` (`Course_ID`, `M_ID`, `Price`, `Course_Type`, `Number_of_Session`, `Remaining_Number`) VALUES
(1, 1, 30000, '基本重訓', 24, 23),
(2, 1, 48000, '減脂', 12, 12);

-- --------------------------------------------------------

--
-- 資料表結構 `instructor`
--

CREATE TABLE `instructor` (
  `I_ID` int(6) NOT NULL,
  `I_Expertise` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `I_Name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `I_Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `I_Address` varchar(120) CHARACTER SET utf8 NOT NULL,
  `I_Age` int(3) NOT NULL,
  `I_Phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `I_Gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `size` enum('M','F','Other') COLLATE utf8_unicode_ci DEFAULT NULL,
  `I_Password` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `instructor`
--

INSERT INTO `instructor` (`I_ID`, `I_Expertise`, `I_Name`, `I_Email`, `I_Address`, `I_Age`, `I_Phone`, `I_Gender`, `size`, `I_Password`) VALUES
(1, '搏擊', '林康永', NULL, '', 0, '0955443215', '', 'M', '987654'),
(2, '減脂', '陳美莉', NULL, '', 0, '', '', 'F', '9876');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `M_ID` int(6) NOT NULL,
  `M_Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `M_Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `M_Address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `M_Age` int(3) DEFAULT NULL,
  `M_Phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `M_Gende` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` enum('M','F','Other') COLLATE utf8_unicode_ci DEFAULT NULL,
  `M_Password` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`M_ID`, `M_Name`, `M_Email`, `M_Address`, `M_Age`, `M_Phone`, `M_Gende`, `size`, `M_Password`) VALUES
(1, '達達', '', NULL, NULL, '0987654321', NULL, 'M', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `period`
--

CREATE TABLE `period` (
  `I_ID` int(6) NOT NULL,
  `Begin_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `period`
--

INSERT INTO `period` (`I_ID`, `Begin_Time`) VALUES
(1, '2018-11-12 15:00:00'),
(1, '2018-11-13 09:00:00'),
(1, '2018-11-18 18:00:00'),
(1, '2018-11-18 19:00:00'),
(1, '2018-11-18 20:00:00'),
(1, '2018-11-19 00:00:00'),
(1, '2018-11-20 12:00:00'),
(2, '2018-11-14 13:00:00'),
(2, '2018-11-16 12:00:00'),
(2, '2018-11-18 19:00:00'),
(2, '2018-11-18 21:00:00'),
(2, '2018-11-21 09:00:00');

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `s`
-- (請參考以下實際畫面)
--
CREATE TABLE `s` (
`I_ID` int(6)
,`Begin_Time` datetime
);

-- --------------------------------------------------------

--
-- 檢視表結構 `s`
--
DROP TABLE IF EXISTS `s`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `s`  AS  (select `p`.`I_ID` AS `I_ID`,`p`.`Begin_Time` AS `Begin_Time` from ((`period` `p` join `compose` `c`) join `instructor` `i`) where ((`c`.`Course_ID` = 1) and (`c`.`I_ID` = `i`.`I_ID`) and (`p`.`I_ID` = `i`.`I_ID`))) ;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `appoint`
--
ALTER TABLE `appoint`
  ADD PRIMARY KEY (`I_ID`,`Course_ID`,`Begin_Time`),
  ADD KEY `Appoint_Compose_FK2` (`Course_ID`);

--
-- 資料表索引 `compose`
--
ALTER TABLE `compose`
  ADD PRIMARY KEY (`I_ID`,`Course_ID`),
  ADD KEY `Compose_Instructor_Group_FK1` (`Course_ID`);

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`),
  ADD KEY `Course_Member_FK1` (`M_ID`);

--
-- 資料表索引 `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`I_ID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`M_ID`);

--
-- 資料表索引 `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`I_ID`,`Begin_Time`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `Course_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表 AUTO_INCREMENT `instructor`
--
ALTER TABLE `instructor`
  MODIFY `I_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `M_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `appoint`
--
ALTER TABLE `appoint`
  ADD CONSTRAINT `Appoint_Compose_FK1` FOREIGN KEY (`I_ID`) REFERENCES `period` (`I_ID`),
  ADD CONSTRAINT `Appoint_Compose_FK2` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`);

--
-- 資料表的 Constraints `compose`
--
ALTER TABLE `compose`
  ADD CONSTRAINT `Compose_Instructor_FK1` FOREIGN KEY (`I_ID`) REFERENCES `instructor` (`I_ID`),
  ADD CONSTRAINT `Compose_Instructor_Group_FK1` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`);

--
-- 資料表的 Constraints `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `Course_Member_FK1` FOREIGN KEY (`M_ID`) REFERENCES `member` (`M_ID`);

--
-- 資料表的 Constraints `period`
--
ALTER TABLE `period`
  ADD CONSTRAINT `Session_Instructor_FK1` FOREIGN KEY (`I_ID`) REFERENCES `instructor` (`I_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
