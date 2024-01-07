-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2024 a las 18:18:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbdd_norauto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_menu`
--

CREATE TABLE `categoria_menu` (
  `ID_CATEGORIA` int(255) NOT NULL,
  `NOMBRE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categoria_menu`
--

INSERT INTO `categoria_menu` (`ID_CATEGORIA`, `NOMBRE`) VALUES
(0, 'pasta'),
(1, 'pizzas'),
(2, 'paellas'),
(3, 'hotdogs'),
(4, 'hamburguesas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `ID_MENU` int(255) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `FOTO` varchar(255) NOT NULL,
  `PRECIO` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID_PEDIDO` int(255) NOT NULL,
  `FECHA` varchar(255) NOT NULL,
  `DIRECCION` varchar(255) NOT NULL,
  `TOTAL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `ID_PLATO` int(255) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `FOTO` varchar(255) NOT NULL,
  `PRECIO` decimal(10,2) NOT NULL,
  `ID_CAT` int(255) NOT NULL,
  `vegana` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`ID_PLATO`, `NOMBRE`, `FOTO`, `PRECIO`, `ID_CAT`, `vegana`) VALUES
(15, 'Espaguetis boloñesa', 'producto_15.png', 10.00, 0, 0),
(16, 'Pizza Pepperoni', 'peperoni.png', 8.99, 1, 0),
(17, 'Paella valenciana', 'paellamenu1.png', 19.99, 2, 0),
(18, 'Hot dog Clasico', 'dogmalo.png', 4.50, 3, 0),
(19, 'Hamburguesa de Vacuno', 'hamburgermenu.png', 7.50, 0, 0),
(20, 'Espaguetis Carbonara', 'carbonara.png', 12.00, 0, 0),
(21, 'Pizza 4 Quesos', '4quesos.png', 9.99, 1, 1),
(22, 'Paella Marisco', 'paellamenu.png', 17.90, 2, 0),
(23, 'Hot Dog Gourmet', 'perritobuieno.png', 5.50, 3, 0),
(24, 'Hamburguesa Especial', 'especialmenu.png', 8.50, 4, 0),
(25, 'Pizza Especial', 'pizzabuena.png', 11.00, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_CLIENTE` int(255) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `APELLIDO` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_CLIENTE`, `NOMBRE`, `APELLIDO`, `MAIL`, `PASSWORD`, `ROL`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin1234', 'admin'),
(2, 'user', 'cliente', 'usercliente@gmail.com', 'cliente1234', 'cliente'),
(3, 'isaacms', 'montes', 'isaac', '1234', 'cliente'),
(4, 'paus', 'salamanca', 'pau', '1234', 'cliente'),
(5, 'unir', 'tejeda', 'unai', '$2y$10$RjYNuOzYB5TolOhj0XaCmupp/wG7Wtnk2v4KSuew72xv9Ub4Ugiqq', 'cliente'),
(6, 'caca', 'caca', 'caca', '$2y$10$.VBFMgEtpiyO56uH5GyO4uD2TNxJM6LLz51wQGF8d.sRSlZ9I3zSa', 'cliente'),
(7, 'evafortesm@gmail.com', 'fortes', 'eva', '1234', 'cliente'),
(9, 'dada', 'dadada', 'daada', 'dada', ''),
(10, 'imontes', 'Montes', 'Isaac', 'caca123', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_menu`
--
ALTER TABLE `categoria_menu`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_MENU`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_PEDIDO`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`ID_PLATO`),
  ADD KEY `FK_PLATO_CATEGORIAID` (`ID_CAT`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_CLIENTE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_MENU` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ID_PEDIDO` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `ID_PLATO` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_CLIENTE` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `plato`
--
ALTER TABLE `plato`
  ADD CONSTRAINT `FK_PLATO_CATEGORIAID` FOREIGN KEY (`ID_CAT`) REFERENCES `categoria_menu` (`ID_CATEGORIA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
