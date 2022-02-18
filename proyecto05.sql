-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2022 a las 00:45:02
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto05`
--
CREATE DATABASE IF NOT EXISTS `proyecto05` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto05`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
CREATE TABLE `asignaturas` (
  `codigo` int(4) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `horas_semana` int(2) UNSIGNED NOT NULL,
  `profesor` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`codigo`, `nombre`, `horas_semana`, `profesor`) VALUES
(374, 'Administración de sistemas operativos', 6, 'Susana Oviedo Bocanegra'),
(375, 'Servicios de red e Internet', 6, 'Rafael Montero González'),
(376, 'Implantación de aplicaciones web.', 4, 'Raúl Gil Sarmiento'),
(377, 'Administración de sistemas gestores de BB.DD.', 3, 'Raúl Gil Sarmiento'),
(378, 'Seguridad y alta disponibilidad.', 4, 'Patricia Vegas Gómez'),
(379, 'Ética', 1, 'Rafita'),
(380, 'Empresa e iniciativa emprendedora.', 4, 'MªCarmen Castaños Berlín'),
(381, 'Inglés', 3, 'Carmen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentos`
--

DROP TABLE IF EXISTS `instrumentos`;
CREATE TABLE `instrumentos` (
  `clave` int(10) UNSIGNED NOT NULL,
  `unidad` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `peso` int(2) UNSIGNED NOT NULL,
  `calificacion` decimal(10,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `instrumentos`
--

INSERT INTO `instrumentos` (`clave`, `unidad`, `nombre`, `peso`, `calificacion`) VALUES
(1, 1, 'Examen Teórico', 45, '8.50'),
(2, 1, 'Examen Práctico', 35, '6.30'),
(3, 1, 'Actividades de Aula', 20, '7.00'),
(4, 2, 'Examen', 70, '9.20'),
(5, 3, 'Perfect Activities', 30, '8.00'),
(6, 3, 'Simple Activities', 30, '6.20'),
(7, 3, 'Examen Past', 40, '7.00'),
(8, 4, 'Will Activities', 30, '4.00'),
(9, 4, 'With Present continious', 30, '9.00'),
(10, 4, 'Examen Future', 40, '4.00'),
(11, 5, 'Present Continuos Activities', 30, '9.00'),
(12, 5, 'Present simple Activities', 30, '6.00'),
(13, 5, 'Examen Present', 40, '5.00'),
(14, 6, 'With modal verbs', 30, '3.00'),
(15, 6, 'With past perfect', 30, '2.00'),
(16, 6, 'Examen conditionals', 40, '2.00'),
(17, 7, 'Global Exam', 100, '3.00'),
(18, 8, 'Examen Teórico DHCP', 10, '5.40'),
(19, 8, 'Examen Práctico  DHCP', 35, '5.00'),
(20, 8, 'Trabajo escrito DHCP', 5, '10.00'),
(21, 8, 'Examen Teórico DNS', 10, '2.33'),
(22, 8, 'Examen Práctico DNS', 35, '6.00'),
(23, 8, 'Trabajo escrito DNS', 5, '10.00'),
(24, 9, 'Examen Teórico HTTP', 10, '1.87'),
(25, 9, 'Examen Práctico HTTP', 35, '10.00'),
(26, 9, 'Trabajo escrito HTTP', 5, '10.00'),
(27, 9, 'Examen Teórico FTP', 10, '3.00'),
(28, 9, 'Examen Práctico FTP', 35, '10.00'),
(29, 9, 'Trabajo Escrito FTP', 5, '10.00'),
(30, 10, 'Examen Teórico Correo', 10, '6.83'),
(31, 10, 'Examen Práctico Correo', 35, '10.00'),
(32, 10, 'Trabajo escrito Correo', 5, '10.00'),
(33, 10, 'Examen Teórico Mensajería', 10, '7.67'),
(34, 10, 'Examen Práctico Mensajería', 35, '10.00'),
(35, 10, 'Trabajo Práctico Mensajería', 5, '10.00'),
(36, 11, 'Examen Teórico Audio', 10, '4.81'),
(39, 11, 'Examen Teórico Video', 10, '8.75'),
(40, 11, 'Examen Práctico Video', 35, '10.00'),
(41, 11, 'Trabajo Escrito Video', 5, '10.00'),
(42, 11, 'Examen Práctico Audio', 35, '10.00'),
(43, 11, 'Trabajo Escrito Audio', 5, '10.00'),
(44, 12, 'Ejercicios', 40, '8.00'),
(45, 12, 'Examen', 60, '6.00'),
(46, 13, 'Ejercicios', 40, '7.00'),
(47, 13, 'Examen', 60, '4.00'),
(48, 14, 'Ejecicios', 10, '10.00'),
(49, 14, 'Trabajo', 90, '7.00'),
(50, 15, 'Ejercicios', 10, '8.00'),
(51, 15, 'Trabajo', 90, '2.00'),
(52, 16, 'Trabajo', 100, '9.00'),
(53, 17, 'Trabajo', 100, '6.50'),
(54, 18, 'Examen Teórico', 100, '7.00'),
(55, 19, 'Examen Teórico', 100, '6.00'),
(56, 20, 'Trabajo Práctico', 100, '9.00'),
(57, 21, 'Trabajo Práctico', 100, '10.00'),
(58, 22, 'Trabajo Práctico', 100, '4.00'),
(59, 23, 'Trabajo Práctico', 100, '1.00'),
(60, 24, 'Trabajo Práctico', 100, '3.00'),
(61, 25, 'Examen', 100, '7.00'),
(62, 26, 'Examen', 100, '8.00'),
(63, 27, 'Examen', 100, '9.00'),
(64, 28, 'Examen', 100, '6.00'),
(65, 29, 'Examen', 100, '8.00'),
(66, 30, 'Trabajo', 100, '4.00'),
(67, 31, 'Trabajo', 100, '7.00'),
(68, 32, 'Trabajo', 100, '6.00'),
(69, 33, 'Trabajo (mínimo 50 páginas)', 100, '9.14'),
(70, 34, 'Trabajo 1', 20, '7.00'),
(71, 34, 'Trabajo 2', 20, '6.00'),
(72, 34, 'Examen', 60, '8.00'),
(73, 35, 'Trabajo', 40, '7.00'),
(74, 35, 'Examen', 60, '3.00'),
(75, 36, 'Trabajo', 20, '6.00'),
(76, 36, 'Trabajito 😈', 80, '1.00'),
(77, 37, 'Examen 🔥', 100, '2.00'),
(78, 38, 'Ver película', 20, '10.00'),
(79, 38, 'Trabajo película', 80, '8.00'),
(80, 39, 'Ver película', 20, '2.00'),
(81, 39, 'Trabajo película', 80, '7.00'),
(82, 2, 'Actividades de Aula', 30, '3.00'),
(83, 40, 'Examen', 90, '7.00'),
(84, 40, 'Actividades de Aula', 10, '2.00'),
(85, 41, 'Trabajo', 100, '10.00'),
(86, 42, 'Trabajo', 100, '10.00'),
(87, 43, 'Trabajo', 100, '9.00'),
(88, 44, 'Examen', 100, '4.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

DROP TABLE IF EXISTS `unidades`;
CREATE TABLE `unidades` (
  `clave` int(11) NOT NULL,
  `asignatura` int(4) UNSIGNED NOT NULL,
  `numero` int(2) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `porcentaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`clave`, `asignatura`, `numero`, `nombre`, `porcentaje`) VALUES
(1, 374, 3741, 'Administración de Servicio de Directorios', 15),
(2, 374, 3742, 'Procesos del Sistema', 15),
(3, 381, 3811, 'Past', 10),
(4, 381, 3812, 'Future', 10),
(5, 381, 3813, 'Present', 5),
(6, 381, 3814, 'Conditionals', 15),
(7, 381, 3815, 'Final Exam', 60),
(8, 375, 3751, 'DHCP y DNS', 30),
(9, 375, 3752, 'HTTP y FTP', 25),
(10, 375, 3753, 'Correo y Mensajería', 25),
(11, 375, 3754, 'Audio y Vídeo', 20),
(12, 376, 3761, 'Conceptos sobre Aplicaciones Web', 10),
(13, 376, 3762, 'Introducción a un lenguaje de scripting de servido', 10),
(14, 376, 3763, 'Programación de Documentos con PHP (2ª parte)', 25),
(15, 376, 3764, 'Acceso a datos con un lenguaje de scripting de ser', 35),
(16, 376, 3765, 'Gestión de Aplicaciones Ofimáticas Web', 10),
(17, 376, 3766, 'Funcionalidades y personalización de un CMS', 10),
(18, 377, 3771, 'Introducción a la administración de un SGDB. Insta', 10),
(19, 377, 3772, 'Arquitectura de Oracle DB', 15),
(20, 377, 3773, 'Instalación de Oracle DB', 10),
(21, 377, 3774, 'Administración de usuarios en Oracle DB', 15),
(22, 377, 3775, 'Automatización de tareas de administración', 20),
(23, 377, 3776, 'Monitorización de la base de datos', 10),
(24, 377, 3777, 'Bases de datos distribuidas', 20),
(25, 378, 3781, 'Seguridad y alta disponibilidad', 17),
(26, 378, 3782, 'Seguridad lógica', 12),
(27, 378, 3783, 'Seguridad activa', 16),
(28, 378, 3784, 'Criptografía', 5),
(29, 378, 3785, 'Seguridad perimetral', 10),
(30, 378, 3786, 'El cortafuegos', 10),
(31, 378, 3787, 'El proxy', 10),
(32, 378, 3788, 'Alta disponibilidad', 10),
(33, 378, 3789, 'Legislación y normas sobre seguridad', 10),
(34, 380, 3801, 'RA1', 15),
(35, 380, 3802, 'RA2', 20),
(36, 380, 3803, 'RA3', 35),
(37, 380, 3804, 'RA4', 30),
(38, 379, 3791, 'La casa de mi vida', 50),
(39, 379, 3792, 'El hijo de otro', 50),
(40, 374, 3743, 'Automatización', 10),
(41, 374, 3744, 'Administración remota de SO', 10),
(42, 374, 3745, 'Servidores de impresión', 15),
(43, 374, 3746, 'Integración de SO libres', 15),
(44, 374, 3747, 'Lenguaje de guiones', 15),
(45, 374, 3748, 'Cortometraje TikTok', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD PRIMARY KEY (`clave`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`clave`),
  ADD KEY `fk` (`asignatura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `clave` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `clave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `unidades`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
