-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2019 at 08:28 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.25-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silar`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `desc_area` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `id_doc` int(11) NOT NULL,
  `id_status_doc` int(11) NOT NULL,
  `id_type_doc` int(11) NOT NULL,
  `id_movement` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `num_exp` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date_sol` date DEFAULT NULL,
  `name_sol` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date_dev` date DEFAULT NULL,
  `post_doc` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `get_doc` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_access`
--

CREATE TABLE `history_access` (
  `id_history` int(11) NOT NULL,
  `ip` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date_access` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movements`
--

CREATE TABLE `movements` (
  `id_movement` int(11) NOT NULL,
  `carpeta` int(11) DEFAULT NULL,
  `folio` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observ` text COLLATE utf8_spanish_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `priveleges`
--

CREATE TABLE `priveleges` (
  `id_priv` int(11) NOT NULL,
  `privelege` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status_priv` enum('0','1') COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_doc`
--

CREATE TABLE `status_doc` (
  `id_status_doc` int(11) NOT NULL,
  `desc_status_doc` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_user`
--

CREATE TABLE `status_user` (
  `id_status_user` int(11) NOT NULL,
  `desc_status_user` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_doc`
--

CREATE TABLE `type_doc` (
  `id_type_doc` int(11) NOT NULL,
  `desc_type_doc` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_priv` int(11) NOT NULL,
  `id_status_user` int(11) NOT NULL,
  `id_history` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tel` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `position` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `online` enum('0','1') COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status_doc` (`id_status_doc`),
  ADD KEY `id_type_doc` (`id_type_doc`),
  ADD KEY `id_movement` (`id_movement`),
  ADD KEY `id_area` (`id_area`);

--
-- Indexes for table `history_access`
--
ALTER TABLE `history_access`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `movements`
--
ALTER TABLE `movements`
  ADD PRIMARY KEY (`id_movement`);

--
-- Indexes for table `priveleges`
--
ALTER TABLE `priveleges`
  ADD PRIMARY KEY (`id_priv`);

--
-- Indexes for table `status_doc`
--
ALTER TABLE `status_doc`
  ADD PRIMARY KEY (`id_status_doc`);

--
-- Indexes for table `status_user`
--
ALTER TABLE `status_user`
  ADD PRIMARY KEY (`id_status_user`);

--
-- Indexes for table `type_doc`
--
ALTER TABLE `type_doc`
  ADD PRIMARY KEY (`id_type_doc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_priv` (`id_priv`),
  ADD KEY `id_status_user` (`id_status_user`),
  ADD KEY `id_history` (`id_history`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_access`
--
ALTER TABLE `history_access`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movements`
--
ALTER TABLE `movements`
  MODIFY `id_movement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `priveleges`
--
ALTER TABLE `priveleges`
  MODIFY `id_priv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_doc`
--
ALTER TABLE `status_doc`
  MODIFY `id_status_doc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_user`
--
ALTER TABLE `status_user`
  MODIFY `id_status_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_doc`
--
ALTER TABLE `type_doc`
  MODIFY `id_type_doc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
