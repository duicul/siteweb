-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 12:09 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site`
--
CREATE DATABASE IF NOT EXISTS `site` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `site`;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `ID` varchar(36) CHARACTER SET utf8 NOT NULL,
  `TITLE` varchar(40) CHARACTER SET utf8 NOT NULL,
  `TXT` text CHARACTER SET utf8 NOT NULL,
  `IMG` varchar(50) CHARACTER SET utf8 NOT NULL,
  `TYPE` varchar(3) CHARACTER SET utf8 NOT NULL,
  `RATE` int(8) NOT NULL DEFAULT '0',
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USERNAME` varchar(20) CHARACTER SET utf8 NOT NULL,
  `IMG1` varchar(50) CHARACTER SET utf8 NOT NULL,
  `IMG2` varchar(50) CHARACTER SET utf8 NOT NULL,
  `IMG3` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `CID` varchar(36) CHARACTER SET ascii NOT NULL,
  `UID` varchar(20) CHARACTER SET ascii NOT NULL,
  `AID` varchar(36) CHARACTER SET ascii NOT NULL,
  `TEXT` text CHARACTER SET ascii NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mainpage`
--

DROP TABLE IF EXISTS `mainpage`;
CREATE TABLE `mainpage` (
  `TYPE` varchar(3) CHARACTER SET ascii NOT NULL,
  `TITLE` varchar(20) CHARACTER SET ascii NOT NULL,
  `TXT` text NOT NULL,
  `IMG` varchar(20) CHARACTER SET ascii NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE `newsletter` (
  `NAME` varchar(20) CHARACTER SET utf8 NOT NULL,
  `MAIL` varchar(20) CHARACTER SET utf8 NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `NAME` varchar(20) CHARACTER SET ascii NOT NULL,
  `USERNAME` varchar(20) CHARACTER SET ascii NOT NULL,
  `PASSWORD` varchar(128) CHARACTER SET ascii NOT NULL,
  `MAIL` varchar(20) CHARACTER SET ascii NOT NULL,
  `ADMIN` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

DROP TABLE IF EXISTS `visit`;
CREATE TABLE `visit` (
  `AID` varchar(36) CHARACTER SET ascii NOT NULL,
  `IP` varchar(20) CHARACTER SET ascii NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `UID` varchar(20) CHARACTER SET ascii NOT NULL,
  `AID` varchar(36) CHARACTER SET ascii NOT NULL,
  `SCORE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `AID` (`AID`);

--
-- Indexes for table `mainpage`
--
ALTER TABLE `mainpage`
  ADD PRIMARY KEY (`TYPE`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`MAIL`),
  ADD UNIQUE KEY `MAIL` (`MAIL`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USERNAME`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD KEY `USERNAME_2` (`USERNAME`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`AID`,`IP`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`UID`,`AID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
