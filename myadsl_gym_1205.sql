-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 05 日 03:29
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
  `Course_ID` int(6) NOT NULL,
  `I_ID` int(6) NOT NULL,
  `Begin_Time` datetime NOT NULL,
  `Status` char(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Appoint'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `appoint`
--

INSERT INTO `appoint` (`Course_ID`, `I_ID`, `Begin_Time`, `Status`) VALUES
(1, 2, '2018-12-18 19:00:00', 'Appoint'),
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
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 3),
(3, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `Course_ID` int(6) NOT NULL,
  `IG_ID` int(6) NOT NULL,
  `M_ID` int(6) NOT NULL,
  `Price` int(6) NOT NULL,
  `Course_Type` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Number_of_Period` int(3) NOT NULL,
  `Remaining_Number` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `course`
--

INSERT INTO `course` (`Course_ID`, `IG_ID`, `M_ID`, `Price`, `Course_Type`, `Number_of_Period`, `Remaining_Number`) VALUES
(1, 0, 1, 3000, '搏擊', 25, 25),
(2, 0, 2, 5000, '重訓', 40, 40),
(3, 0, 1, 30000, '基本重訓', 24, 24),
(4, 0, 1, 30000, '基本重訓', 24, 24);

-- --------------------------------------------------------

--
-- 資料表結構 `instructor`
--

CREATE TABLE `instructor` (
  `I_ID` int(6) NOT NULL,
  `I_Expertise` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `I_Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `I_Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `I_Address` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `I_Age` int(3) NOT NULL,
  `I_Phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `I_Gender` enum('M','F','Other') COLLATE utf8_unicode_ci NOT NULL,
  `I_Password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `KPI_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `instructor`
--

INSERT INTO `instructor` (`I_ID`, `I_Expertise`, `I_Name`, `I_Email`, `I_Address`, `I_Age`, `I_Phone`, `I_Gender`, `I_Password`, `KPI_ID`) VALUES
(1, '搏擊', '某佘', 'MMS@gamil.com', 'Tucheng', 23, '0951443215', 'F', '987654', 1),
(2, '重訓', '某愛麗', 'MMA@gamil.com', 'Kaohsiung', 24, '0952443215', 'F', '987654', 2),
(3, '有氧', '某莉', 'MML.@gamil.com', 'Taipei', 25, '0953443215', 'F', '987654', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `kpi`
--

CREATE TABLE `kpi` (
  `KPI_ID` int(6) NOT NULL,
  `Amount_Standard` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `kpi`
--

INSERT INTO `kpi` (`KPI_ID`, `Amount_Standard`) VALUES
(1, 100000),
(2, 150000),
(3, 200000);

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
  `M_Gender` enum('M','F','Other') COLLATE utf8_unicode_ci DEFAULT NULL,
  `M_Password` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`M_ID`, `M_Name`, `M_Email`, `M_Address`, `M_Age`, `M_Phone`, `M_Gender`, `M_Password`) VALUES
(1, '達達', 'MM.gamil.com', 'Keelung', 25, '0987654321', 'M', '1234'),
(2, '小麥', 'SMM.gamil.com', 'WuGu', 25, '0912654321', 'M', '1234');

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
(1, '2018-12-05 09:00:00'),
(1, '2018-12-05 10:00:00'),
(1, '2018-12-05 11:00:00'),
(1, '2018-12-05 12:00:00'),
(1, '2018-12-18 20:00:00'),
(1, '2018-12-19 00:00:00'),
(1, '2018-12-20 12:00:00'),
(2, '2018-11-12 15:00:00'),
(2, '2018-11-14 13:00:00'),
(2, '2018-11-16 12:00:00'),
(2, '2018-12-18 19:00:00'),
(2, '2018-12-18 21:00:00'),
(2, '2018-12-21 09:00:00'),
(3, '2018-11-14 13:00:00'),
(3, '2018-11-16 12:00:00'),
(3, '2018-12-18 19:00:00'),
(3, '2018-12-18 21:00:00'),
(3, '2018-12-21 09:00:00');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `appoint`
--
ALTER TABLE `appoint`
  ADD PRIMARY KEY (`Course_ID`,`I_ID`,`Begin_Time`),
  ADD KEY `Appoint_Period_FK` (`I_ID`,`Begin_Time`);

--
-- 資料表索引 `compose`
--
ALTER TABLE `compose`
  ADD PRIMARY KEY (`I_ID`,`Course_ID`),
  ADD KEY `Compose_Course_FK` (`Course_ID`);

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`),
  ADD KEY `Course_Member_FK` (`M_ID`);

--
-- 資料表索引 `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`I_ID`),
  ADD KEY `Instructor_KPI_FK` (`KPI_ID`);

--
-- 資料表索引 `kpi`
--
ALTER TABLE `kpi`
  ADD PRIMARY KEY (`KPI_ID`);

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
  MODIFY `Course_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `instructor`
--
ALTER TABLE `instructor`
  MODIFY `I_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `M_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `appoint`
--
ALTER TABLE `appoint`
  ADD CONSTRAINT `Appoint_Course_FK` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`),
  ADD CONSTRAINT `Appoint_Period_FK` FOREIGN KEY (`I_ID`,`Begin_Time`) REFERENCES `period` (`I_ID`, `Begin_Time`);

--
-- 資料表的 Constraints `compose`
--
ALTER TABLE `compose`
  ADD CONSTRAINT `Compose_Course_FK` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`),
  ADD CONSTRAINT `Compose_Instructor_FK` FOREIGN KEY (`I_ID`) REFERENCES `instructor` (`I_ID`);

--
-- 資料表的 Constraints `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `Course_Member_FK` FOREIGN KEY (`M_ID`) REFERENCES `member` (`M_ID`);

--
-- 資料表的 Constraints `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `Instructor_KPI_FK` FOREIGN KEY (`KPI_ID`) REFERENCES `kpi` (`KPI_ID`);

--
-- 資料表的 Constraints `period`
--
ALTER TABLE `period`
  ADD CONSTRAINT `Period_Instructor_FK` FOREIGN KEY (`I_ID`) REFERENCES `instructor` (`I_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
