-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2024 a las 01:05:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inscripcion_curso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `descripcion`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'Desarrollo Web', 'Proceso de creación y mantenimiento de sitios web y aplicaciones en línea, que abarca desde el diseño visual y la interfaz de usuario hasta la programación y configuración de servidores, utilizando tecnologías como HTML, CSS, JavaScript y bases de datos.', '2024-10-14', '2025-02-26'),
(2, 'Ingeniería de software', 'Disciplina que se enfoca en el diseño, desarrollo, implementación y mantenimiento de software de alta calidad, aplicando principios de ingeniería y metodologías sistemáticas para garantizar su funcionalidad, eficiencia y escalabilidad.', '2024-10-14', '2025-02-26'),
(3, 'Administración de base de Datos', 'Conjunto de procesos y herramientas utilizadas para diseñar, organizar, gestionar y mantener bases de datos, garantizando su integridad, seguridad y disponibilidad para satisfacer las necesidades de los usuarios y aplicaciones.', '2024-10-14', '2025-02-26'),
(4, 'Modelado de Sistemas', '\"Proceso de representar y analizar los componentes, relaciones y flujo de información de un sistema, con el objetivo de entender su funcionamiento y facilitar su desarrollo y mejora mediante diagramas y modelos abstractos.\"', '2024-10-14', '2025-02-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos`
--

CREATE TABLE `inscritos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `fecha_inscripcion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscritos`
--

INSERT INTO `inscritos` (`id`, `nombre`, `email`, `curso_id`, `fecha_inscripcion`) VALUES
(48, 'Juan Ricaurte', 'juan2324@gmail.com', 1, '2024-12-01 21:04:44'),
(51, 'Amanda Isis', 'amanis1234@gamil.com', 2, '2024-12-01 21:06:56'),
(53, 'Pedro Corrales', 'pedco123@gmail.com', 1, '2024-12-01 21:18:38'),
(54, 'Pedro Corrales', 'pedco123@gmail.com', 2, '2024-12-01 21:19:10'),
(55, 'Pedro Corrales', 'pedco123@gmail.com', 4, '2024-12-01 21:19:40'),
(56, 'Fernanda Miño', 'fermi123@gmail.com', 1, '2024-12-01 21:26:02'),
(57, 'Fernanda Miño', 'fermi123@gmail.com', 3, '2024-12-01 21:32:05'),
(58, 'Fernanda Miño', 'fermi123@gmail.com', 4, '2024-12-01 21:33:29'),
(59, 'Silvana Bastidas', 'silba123@gmail.com', 1, '2024-12-01 21:34:35'),
(60, 'Silvana Bastidas', 'silba123@gmail.com', 2, '2024-12-01 21:36:39'),
(67, 'María Moura', 'marmou123@gmail.com', 4, '2024-12-01 23:52:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscritos`
--
ALTER TABLE `inscritos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email_curso` (`email`,`curso_id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `inscritos`
--
ALTER TABLE `inscritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscritos`
--
ALTER TABLE `inscritos`
  ADD CONSTRAINT `inscritos_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
