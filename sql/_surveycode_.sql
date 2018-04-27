-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2018 a las 15:19:33
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `_surveycode_`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forms`
--

CREATE TABLE `forms` (
  `pk_id` int(11) NOT NULL,
  `id_internal` tinyint(4) DEFAULT NULL,
  `label` varchar(111) DEFAULT NULL,
  `id` varchar(11) DEFAULT NULL,
  `widget` enum('input','select','checkbox','radio','textarea') DEFAULT NULL,
  `answer` varchar(250) DEFAULT NULL COMMENT 'este campo estara en formato json, debemos averiguar si el tipo de dato JSON es capaz de ser\nprocesado en nuestros servidores.\n',
  `fk_survey` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='todos los formularios asigandos a una encuesta: \nrelacion una encuesta tiene un formlario uno:uno';

--
-- Volcado de datos para la tabla `forms`
--

INSERT INTO `forms` (`pk_id`, `id_internal`, `label`, `id`, `widget`, `answer`, `fk_survey`) VALUES
(1, 1, 'Puedes proporcionarme el rango de tu edad ', 'edad', 'select', '{ "1":"15 - 25", "2":"26 - 36", "3":"37 - Adelante" }', 1),
(2, 2, 'Cuál es su sexo', 'sexo', 'select', '{ "1": "Mujer" , "2":"Hombre" , "3":"Omito este dato"} ', 1),
(3, 3, 'Cuáles de estos conceptos crees que sea energia renovable', 'energia', 'radio', '{ "1":"Biomasa" , "2" :"Solar" , "3":"Gas natural","4":"Gasolina"}', 1),
(4, 4, 'Crees que la energía renovable favorezca a tu economía', 'favorece', 'select', '{ "1":"Si" , "2": "No" , "3" : "No lo se"}', 1),
(5, 5, 'Indica cual de estos aparatos trasforman la energía solar en uso domestico ', 'trasforma', 'radio', '{"1" : "Termostato" , "2":"Calentador Solar"  , "3" : "Drones" , "4" : "modulos fotovoltaicos" }', 1),
(6, 6, 'Estas dispuesto en invertir para mejorar tu economía y el medio ambiente ', 'invertir', 'radio', '{"1":"Si" , "2":"No", "3":"Me da igual"} ', 1),
(7, 7, 'Reconoces algunas de estas marcas  ', 'marca', 'radio', '{"1": "Gigante Verde" , "2" : "Enver" , "3" : "Calefactum" , "4" : "FreeASun" }', 1),
(8, 8, 'Cuanto estarías dispuesto a pagar por un calentador solar', 'pagar', 'select', '{"1":"Menos de 3000.00" , "2" : "Entre 3000.00  y 4500.00" , "3":"Maximo 6000.00"}', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `results`
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
-- Volcado de datos para la tabla `results`
--

INSERT INTO `results` (`pk_id`, `result`, `started`, `provider`, `lead`, `fk_form`) VALUES
(1, '{"edad":"1","sexo":"2","energia":"1","favorece":"2","trasforma":"1","invertir":"2","marca":"2","pagar":"2"}', '2018-04-24 20:06:32', 'undefined', 'monolinux@smcmx.com.mx', 1),
(2, '{"edad":"3","sexo":"3","energia":"2","favorece":"3","trasforma":"2","invertir":"1","marca":"2","pagar":"2"}', '2018-04-24 20:11:56', 'undefined', 'monolinux@smcmx.com.mx', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `surveys`
--

CREATE TABLE `surveys` (
  `pk_id` int(11) NOT NULL,
  `token` varchar(80) DEFAULT NULL COMMENT 'el token estara encriptado con la siguiente caracteristica.\nhora_navegador_so_ip',
  `name` varchar(23) DEFAULT NULL COMMENT 'marketing casoba',
  `objective` varchar(140) DEFAULT NULL,
  `creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('1','0') DEFAULT '1' COMMENT '1 = activo . 0 = finalizado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla donde iran todas las encuestas de este sistema, un usuario registrado puede tener n cantidad de encuesta';

--
-- Volcado de datos para la tabla `surveys`
--

INSERT INTO `surveys` (`pk_id`, `token`, `name`, `objective`, `creation`, `status`) VALUES
(1, 'adad23e123qwdasdasd1q2123asdasd', 'primer survey', 'encuesta para conocer el impacto de los calentadores solares  para la empresa casoba', '2018-04-20 18:28:37', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`pk_id`),
  ADD KEY `forms_survey_idx` (`fk_survey`);

--
-- Indices de la tabla `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`pk_id`),
  ADD KEY `results_forms_idx` (`fk_form`);

--
-- Indices de la tabla `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`pk_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `forms`
--
ALTER TABLE `forms`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `results`
--
ALTER TABLE `results`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `surveys`
--
ALTER TABLE `surveys`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `fk_forms_survey` FOREIGN KEY (`fk_survey`) REFERENCES `surveys` (`pk_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `fk_results_forms` FOREIGN KEY (`fk_form`) REFERENCES `forms` (`pk_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
