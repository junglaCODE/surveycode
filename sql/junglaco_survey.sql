-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2019 at 06:03 PM
-- Server version: 5.7.28
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `junglaco_survey`
--
CREATE DATABASE IF NOT EXISTS `junglaco_survey` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `junglaco_survey`;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `pk_id` int(11) NOT NULL,
  `id_internal` int(4) DEFAULT NULL,
  `label` varchar(270) DEFAULT NULL,
  `id` varchar(11) DEFAULT NULL,
  `widget` enum('input','select','checkbox','radio','textarea') DEFAULT NULL,
  `answer` varchar(250) DEFAULT NULL COMMENT 'este campo estara en formato json, debemos averiguar si el tipo de dato JSON es capaz de ser\nprocesado en nuestros servidores.\n',
  `fk_survey` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='todos los formularios asigandos a una encuesta: \nrelacion una encuesta tiene un formlario uno:uno';

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`pk_id`, `id_internal`, `label`, `id`, `widget`, `answer`, `fk_survey`) VALUES
(1, 1, '¿ Como te gustaría que fuera el nombre de la mascota de la trinchera divergente.?', 'mascota', 'radio', '{ \"1\":\"Cleopatra\", \"2\":\"Once/Eleven\", \"3\":\"Samone\" , \"4\":\"Cariel\" , \"5\": \"Simona\" , \"6\" : \"Chanbonita\"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `pk_id` int(11) NOT NULL,
  `result` text NOT NULL,
  `started` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `provider` varchar(60) NOT NULL,
  `lead` varchar(111) DEFAULT NULL,
  `fk_form` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`pk_id`, `result`, `started`, `provider`, `lead`, `fk_form`) VALUES
(32, '{\"mascota\":\"2\"}', '2019-10-10 03:33:20', 'undefined', '{\"email\":\"monolinux\"}', 1),
(33, '{\"mascota\":\"2\"}', '2019-10-10 04:08:59', 'undefined', '{\"email\":\"Fertxo\"}', 1),
(34, '{\"mascota\":\"3\"}', '2019-10-10 04:10:43', 'undefined', '{\"email\":\"PM\"}', 1),
(35, '{\"mascota\":\"5\"}', '2019-10-10 04:17:39', 'undefined', 'null', 1),
(36, '{\"mascota\":\"5\"}', '2019-10-10 04:17:59', 'undefined', 'null', 1),
(37, '{\"mascota\":\"2\"}', '2019-10-10 04:34:48', 'undefined', '{\"email\":\"Sussy Sanchez\"}', 1),
(38, '{\"mascota\":\"1\"}', '2019-10-10 06:14:25', 'undefined', 'null', 1),
(39, '{\"mascota\":\"5\"}', '2019-10-10 08:29:34', 'undefined', '{\"email\":\"Rosst\"}', 1),
(40, '{\"mascota\":\"5\"}', '2019-10-10 08:29:49', 'undefined', 'null', 1),
(41, '{\"mascota\":\"6\"}', '2019-10-10 13:23:14', 'undefined', '{\"email\":\"Daniel\"}', 1),
(42, '{\"mascota\":\"4\"}', '2019-10-10 13:49:08', 'undefined', '{\"email\":\"RanH Ma\"}', 1),
(43, '{\"mascota\":\"3\"}', '2019-10-10 14:07:39', 'undefined', '{\"email\":\"madrigalalonsom@gmail.com\"}', 1),
(44, '{\"mascota\":\"3\"}', '2019-10-10 14:08:30', 'undefined', '{\"email\":\"Mane\"}', 1),
(45, '{\"mascota\":\"3\"}', '2019-10-10 14:09:44', 'undefined', '{\"email\":\"Alex\"}', 1),
(46, '{\"mascota\":\"6\"}', '2019-10-10 14:15:33', 'undefined', '{\"email\":\"cha\"}', 1),
(48, '{\"mascota\":\"6\"}', '2019-10-10 14:38:01', 'undefined', 'null', 1),
(49, '{\"mascota\":\"6\"}', '2019-10-10 14:38:39', 'undefined', '{\"email\":\"Montse:v\"}', 1),
(50, '{\"mascota\":\"3\"}', '2019-10-10 14:44:58', 'undefined', 'null', 1),
(51, '{\"mascota\":\"3\"}', '2019-10-10 16:20:22', 'undefined', '{\"email\":\"Jose\"}', 1),
(52, '{\"mascota\":\"6\"}', '2019-10-10 16:53:54', 'undefined', 'null', 1),
(53, '{\"mascota\":\"4\"}', '2019-10-10 16:56:12', 'undefined', '{\"email\":\"jp\"}', 1),
(54, '{\"mascota\":\"5\"}', '2019-10-10 18:48:27', 'undefined', 'null', 1),
(55, '{\"mascota\":\"5\"}', '2019-10-10 18:48:34', 'undefined', 'null', 1),
(56, '{\"mascota\":\"2\"}', '2019-10-10 18:55:25', 'undefined', '{\"email\":\"Ana\"}', 1),
(58, '{\"mascota\":\"6\"}', '2019-10-10 23:47:01', 'undefined', 'null', 1),
(59, '{\"mascota\":\"2\"}', '2019-10-10 23:47:06', 'undefined', 'null', 1),
(60, '{\"mascota\":\"2\"}', '2019-10-11 02:49:32', 'undefined', '{\"email\":\"Dante\"}', 1),
(61, '{\"mascota\":\"3\"}', '2019-10-11 03:25:45', 'undefined', '{\"email\":\"SurveyCODE\"}', 1),
(62, '{\"mascota\":\"2\"}', '2019-10-11 17:34:27', 'undefined', '{\"email\":\"oscar\"}', 1),
(63, '{\"mascota\":\"1\"}', '2019-10-13 00:35:48', 'undefined', '{\"email\":\"KarlEGar\"}', 1),
(64, '{\"mascota\":\"5\"}', '2019-10-15 23:38:45', 'undefined', '{\"email\":\"Vianney\"}', 1),
(65, '{\"mascota\":\"5\"}', '2019-10-19 23:37:49', 'undefined', 'null', 1),
(66, '{\"mascota\":\"6\"}', '2019-10-20 01:15:56', 'undefined', 'null', 1),
(67, '{\"mascota\":\"6\"}', '2019-10-20 01:48:27', 'undefined', '{\"email\":\"Paola\"}', 1),
(68, '{\"mascota\":\"6\"}', '2019-10-20 01:48:39', 'undefined', '{\"email\":\"Paula\"}', 1),
(69, '{\"mascota\":\"6\"}', '2019-10-20 01:48:46', 'undefined', '{\"email\":\"Miguel\"}', 1),
(70, '{\"mascota\":\"2\"}', '2019-10-20 01:49:16', 'undefined', 'null', 1),
(71, '{\"mascota\":\"6\"}', '2019-10-20 01:49:20', 'undefined', 'null', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `pk_id` int(11) NOT NULL,
  `token` varchar(80) DEFAULT NULL COMMENT 'el token estara encriptado con la siguiente caracteristica.\ndiadelaño_diadelasemanatextual_horasincaracteres_ip',
  `name` varchar(23) DEFAULT NULL,
  `objective` varchar(140) DEFAULT NULL,
  `creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('1','0') DEFAULT '1' COMMENT '1 = activo . 0 = finalizado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla donde iran todas las encuestas de este sistema, un usuario registrado puede tener n cantidad de encuesta';

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`pk_id`, `token`, `name`, `objective`, `creation`, `status`) VALUES
(1, 'adad23e123qwdasdasd1q2123asdasd', 'Sistema de encuestas', 'Encuesta para saber el nombre de nuestra mascota', '2018-09-10 16:11:11', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`pk_id`),
  ADD KEY `forms_survey_idx` (`fk_survey`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`pk_id`),
  ADD KEY `results_forms_idx` (`fk_form`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`pk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `fk_forms_survey` FOREIGN KEY (`fk_survey`) REFERENCES `surveys` (`pk_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `fk_results_forms` FOREIGN KEY (`fk_form`) REFERENCES `forms` (`pk_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
