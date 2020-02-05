-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2020 at 02:52 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.26-1+ubuntu18.04.1+deb.sury.org+1

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

--
-- Dumping data for table `history_access`
--

INSERT INTO `history_access` (`id_history`, `ip`, `date_access`, `time_in`, `time_out`) VALUES
(1, '127.0.0.1', '2019-12-27', '14:25:12', '00:00:00'),
(2, '127.0.0.1', '2020-01-02', '14:22:12', '00:00:00'),
(3, '127.0.0.1', '2020-01-03', '13:28:39', '00:00:00'),
(4, '127.0.0.1', '2020-01-03', '13:29:24', '00:00:00'),
(5, '127.0.0.1', '2020-01-03', '13:31:47', '00:00:00'),
(6, '127.0.0.1', '2020-01-03', '13:33:05', '00:00:00'),
(7, '127.0.0.1', '2020-01-03', '13:33:20', '00:00:00'),
(8, '127.0.0.1', '2020-01-03', '13:34:43', '00:00:00'),
(9, '127.0.0.1', '2020-01-03', '13:35:00', '00:00:00'),
(10, '127.0.0.1', '2020-01-03', '13:36:09', '00:00:00'),
(11, '127.0.0.1', '2020-01-03', '13:36:54', '00:00:00'),
(12, '127.0.0.1', '2020-01-03', '13:37:28', '00:00:00'),
(13, '127.0.0.1', '2020-01-03', '13:38:30', '00:00:00'),
(14, '127.0.0.1', '2020-01-03', '13:40:14', '00:00:00'),
(15, '127.0.0.1', '2020-01-03', '13:40:27', '00:00:00'),
(16, '127.0.0.1', '2020-01-03', '13:40:54', '00:00:00'),
(17, '127.0.0.1', '2020-01-03', '13:41:14', '00:00:00'),
(18, '127.0.0.1', '2020-01-03', '13:41:34', '00:00:00'),
(19, '127.0.0.1', '2020-01-03', '13:43:17', '00:00:00'),
(20, '127.0.0.1', '2020-01-03', '13:44:39', '00:00:00'),
(21, '127.0.0.1', '2020-01-03', '13:46:22', '00:00:00'),
(22, '127.0.0.1', '2020-01-03', '13:47:55', '00:00:00'),
(23, '127.0.0.1', '2020-01-03', '13:48:01', '00:00:00'),
(24, '127.0.0.1', '2020-01-03', '13:48:37', '00:00:00'),
(25, '127.0.0.1', '2020-01-03', '13:49:01', '00:00:00'),
(26, '127.0.0.1', '2020-01-03', '13:57:35', '00:00:00'),
(27, '127.0.0.1', '2020-01-03', '13:57:39', '00:00:00'),
(28, '127.0.0.1', '2020-01-03', '13:59:16', '00:00:00'),
(29, '127.0.0.1', '2020-01-03', '14:34:29', '00:00:00'),
(30, '127.0.0.1', '2020-01-03', '14:35:25', '00:00:00'),
(31, '127.0.0.1', '2020-01-03', '14:36:02', '00:00:00'),
(32, '127.0.0.1', '2020-01-03', '14:38:46', '00:00:00'),
(33, '127.0.0.1', '2020-01-03', '14:40:17', '00:00:00'),
(34, '127.0.0.1', '2020-01-03', '14:40:42', '00:00:00'),
(35, '127.0.0.1', '2020-01-06', '12:55:41', '00:00:00'),
(36, '127.0.0.1', '2020-01-06', '12:56:56', '00:00:00'),
(37, '127.0.0.1', '2020-01-06', '12:57:29', '00:00:00'),
(38, '127.0.0.1', '2020-01-06', '12:57:47', '00:00:00'),
(39, '127.0.0.1', '2020-01-06', '12:57:53', '00:00:00'),
(40, '127.0.0.1', '2020-01-06', '12:59:09', '00:00:00'),
(41, '127.0.0.1', '2020-01-06', '12:59:19', '00:00:00'),
(42, '127.0.0.1', '2020-01-06', '12:59:42', '00:00:00'),
(43, '127.0.0.1', '2020-01-06', '13:00:14', '00:00:00'),
(44, '127.0.0.1', '2020-01-06', '13:00:18', '00:00:00'),
(45, '127.0.0.1', '2020-01-06', '13:01:13', '00:00:00'),
(46, '127.0.0.1', '2020-01-06', '13:06:08', '00:00:00'),
(47, '127.0.0.1', '2020-01-06', '13:06:26', '00:00:00'),
(48, '127.0.0.1', '2020-01-06', '13:08:13', '00:00:00'),
(49, '127.0.0.1', '2020-01-06', '13:08:35', '00:00:00'),
(50, '127.0.0.1', '2020-01-06', '13:16:13', '00:00:00'),
(51, '127.0.0.1', '2020-01-06', '13:17:07', '00:00:00'),
(52, '127.0.0.1', '2020-01-06', '13:18:27', '00:00:00'),
(53, '127.0.0.1', '2020-01-06', '13:18:36', '00:00:00'),
(54, '127.0.0.1', '2020-01-06', '13:21:51', '00:00:00'),
(55, '127.0.0.1', '2020-01-06', '13:25:20', '00:00:00'),
(56, '127.0.0.1', '2020-01-06', '13:25:50', '00:00:00'),
(57, '127.0.0.1', '2020-01-06', '13:26:09', '00:00:00'),
(58, '127.0.0.1', '2020-01-06', '13:26:39', '00:00:00'),
(59, '127.0.0.1', '2020-01-06', '13:28:02', '00:00:00'),
(60, '127.0.0.1', '2020-01-06', '13:28:20', '00:00:00'),
(61, '127.0.0.1', '2020-01-06', '13:29:41', '00:00:00'),
(62, '127.0.0.1', '2020-01-06', '13:31:55', '00:00:00'),
(63, '127.0.0.1', '2020-01-06', '13:34:41', '00:00:00'),
(64, '127.0.0.1', '2020-01-06', '13:34:51', '00:00:00'),
(65, '127.0.0.1', '2020-01-06', '13:43:18', '00:00:00'),
(66, '127.0.0.1', '2020-01-06', '13:43:47', '00:00:00'),
(67, '127.0.0.1', '2020-01-06', '13:45:29', '00:00:00'),
(68, '127.0.0.1', '2020-01-06', '13:45:37', '00:00:00'),
(69, '127.0.0.1', '2020-01-06', '13:45:55', '00:00:00'),
(70, '127.0.0.1', '2020-01-06', '14:17:05', '00:00:00'),
(71, '127.0.0.1', '2020-01-06', '14:45:14', '00:00:00'),
(72, '127.0.0.1', '2020-01-06', '14:45:28', '00:00:00'),
(73, '127.0.0.1', '2020-01-06', '14:45:45', '00:00:00'),
(74, '127.0.0.1', '2020-01-06', '14:46:03', '00:00:00'),
(75, '127.0.0.1', '2020-01-06', '14:47:13', '00:00:00'),
(76, '127.0.0.1', '2020-01-06', '14:47:38', '00:00:00'),
(77, '127.0.0.1', '2020-01-06', '14:48:15', '00:00:00'),
(78, '127.0.0.1', '2020-01-06', '14:48:24', '00:00:00'),
(79, '127.0.0.1', '2020-01-06', '14:48:40', '00:00:00'),
(80, '127.0.0.1', '2020-01-06', '14:49:02', '00:00:00'),
(81, '127.0.0.1', '2020-01-06', '14:49:15', '00:00:00'),
(82, '127.0.0.1', '2020-01-06', '14:49:29', '00:00:00'),
(83, '127.0.0.1', '2020-01-06', '14:50:43', '00:00:00'),
(84, '127.0.0.1', '2020-01-06', '14:51:15', '00:00:00'),
(85, '127.0.0.1', '2020-01-06', '14:51:57', '00:00:00'),
(86, '127.0.0.1', '2020-01-06', '14:52:10', '00:00:00'),
(87, '127.0.0.1', '2020-01-06', '14:52:13', '00:00:00'),
(88, '127.0.0.1', '2020-01-06', '14:53:31', '00:00:00'),
(89, '127.0.0.1', '2020-01-06', '14:54:01', '00:00:00'),
(90, '127.0.0.1', '2020-01-06', '14:54:33', '00:00:00'),
(91, '127.0.0.1', '2020-01-06', '14:58:12', '00:00:00'),
(92, '127.0.0.1', '2020-01-07', '12:44:24', '00:00:00'),
(93, '127.0.0.1', '2020-01-07', '12:59:08', '00:00:00'),
(94, '127.0.0.1', '2020-01-07', '13:33:25', '00:00:00'),
(95, '127.0.0.1', '2020-01-07', '13:39:27', '00:00:00'),
(96, '127.0.0.1', '2020-01-07', '13:40:09', '00:00:00'),
(97, '127.0.0.1', '2020-01-07', '13:40:23', '00:00:00'),
(98, '127.0.0.1', '2020-01-07', '13:42:23', '00:00:00'),
(99, '127.0.0.1', '2020-01-07', '13:48:58', '00:00:00'),
(100, '127.0.0.1', '2020-01-07', '14:08:52', '00:00:00'),
(101, '127.0.0.1', '2020-01-07', '14:13:04', '00:00:00'),
(102, '127.0.0.1', '2020-01-07', '14:29:22', '00:00:00'),
(103, '127.0.0.1', '2020-01-07', '14:31:00', '00:00:00'),
(104, '127.0.0.1', '2020-01-07', '14:36:06', '00:00:00'),
(105, '127.0.0.1', '2020-01-07', '14:38:52', '00:00:00'),
(106, '127.0.0.1', '2020-01-07', '14:43:42', '00:00:00'),
(107, '127.0.0.1', '2020-01-07', '14:44:25', '00:00:00'),
(108, '127.0.0.1', '2020-01-07', '14:49:03', '00:00:00'),
(109, '127.0.0.1', '2020-01-07', '14:49:56', '00:00:00'),
(110, '127.0.0.1', '2020-01-08', '11:24:18', '00:00:00'),
(111, '127.0.0.1', '2020-01-08', '11:25:32', '00:00:00'),
(112, '127.0.0.1', '2020-01-08', '11:38:38', '00:00:00'),
(113, '127.0.0.1', '2020-01-08', '12:01:47', '00:00:00'),
(114, '127.0.0.1', '2020-01-08', '12:06:29', '00:00:00'),
(115, '127.0.0.1', '2020-01-08', '12:08:17', '00:00:00'),
(116, '127.0.0.1', '2020-01-08', '12:15:18', '00:00:00'),
(117, '127.0.0.1', '2020-01-08', '12:17:59', '00:00:00'),
(118, '127.0.0.1', '2020-01-08', '12:22:23', '00:00:00'),
(119, '127.0.0.1', '2020-01-08', '12:24:40', '00:00:00'),
(120, '127.0.0.1', '2020-01-08', '12:34:45', '00:00:00'),
(121, '127.0.0.1', '2020-01-08', '12:49:32', '00:00:00'),
(122, '127.0.0.1', '2020-01-08', '12:50:06', '00:00:00'),
(123, '127.0.0.1', '2020-01-08', '13:03:27', '00:00:00'),
(124, '127.0.0.1', '2020-01-08', '13:11:48', '00:00:00'),
(125, '127.0.0.1', '2020-01-08', '13:17:09', '00:00:00'),
(126, '127.0.0.1', '2020-01-08', '13:38:33', '00:00:00'),
(127, '127.0.0.1', '2020-01-08', '14:49:48', '00:00:00');

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

--
-- Dumping data for table `priveleges`
--

INSERT INTO `priveleges` (`id_priv`, `privelege`, `status_priv`) VALUES
(1, 'Administrador', '1'),
(2, 'Capturista', '1');

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

--
-- Dumping data for table `status_user`
--

INSERT INTO `status_user` (`id_status_user`, `desc_status_user`) VALUES
(1, 'Activo'),
(2, 'Baja');

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
  `user_name` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_pass` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_tel` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_email` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_position` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `online` enum('0','1') COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_priv`, `id_status_user`, `id_history`, `name`, `user_name`, `user_pass`, `user_tel`, `user_email`, `user_position`, `online`) VALUES
(1, 1, 1, 127, 'Angel', 'angel', '202cb962ac59075b964b07152d234b70', '123456789', 'angelhpjuli@gmail.com', 'Desarrollador', '0'),
(2, 2, 1, 117, 'Marco', 'marco', '202cb962ac59075b964b07152d234b70', '987654321', 'marcohp@gmail.com', 'Desarrollador', '0');

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
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `movements`
--
ALTER TABLE `movements`
  MODIFY `id_movement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `priveleges`
--
ALTER TABLE `priveleges`
  MODIFY `id_priv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_doc`
--
ALTER TABLE `status_doc`
  MODIFY `id_status_doc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_user`
--
ALTER TABLE `status_user`
  MODIFY `id_status_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_doc`
--
ALTER TABLE `type_doc`
  MODIFY `id_type_doc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
