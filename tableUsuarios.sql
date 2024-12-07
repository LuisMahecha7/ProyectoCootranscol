-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-11-2024 a las 23:24:59
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
-- Base de datos: `CootranscolDb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`) VALUES
(1, 'Pilar Mendieta', 'pilarmendieta@hotmail.com', '$2y$10$l3L4mF6JYvV./ABME1CituNlh4ph18eiGuhay5Up8ByB9MC9JxYhy'),
(2, 'María Rodriguez', 'mariarodriguez33@gmail.com', '$2y$10$ByS3.RZy7OnRmNZd/o4XvuAntdyYci2m9vtkxxpmrveamvVkHkpqq'),
(3, 'Esmeralda Guerrero', 'esmeraldaguerrero@hotmail.com', '$2y$10$OX2ZY5PZ1/S2ALJnOVkpZeqsSoJG9u9FWF5HOJfcby1GH8cU4f8L.'),
(4, 'Jairo Tavid Torres', 'jairodavidtorres@gmail.com', '$2y$10$IPX3xcJBS9.Z6Eii.R26AOWYfK18IaTdmHKP8dVf4GriEJyD2ebUK'),
(5, 'Camila Alejandra Telles', 'camilaalejandratelles@gmail.com', '$2y$10$PSQMXtq7DwyrPDbzua8q8eOIRofPwYjffIi5goQbMcRo6W3oZPg9u'),
(6, 'Laura Hernandez', 'laurita45@gmail.com', '$2y$10$jBUYY42sSbvE/CS20ahkXOJjE7GScqK5l9R0MBR.0wyf8HTOzfrpG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
