-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2022 a las 04:16:12
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `starshop_project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(20) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre_categoria` varchar(20) DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `descuento` int(2) NOT NULL,
  `stock` int(5) NOT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `foto_producto` longblob NOT NULL,
  `id_estado` int(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `id_detalle_ingreso` int(11) NOT NULL,
  `id_ingreso` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle_venta` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `tipo_rol` varchar(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `num_documento` int(20) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `tipo_rol`, `nombres`, `apellidos`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES
(7, 'Empleado', 'juan', 'torres', 'Cedula ', 1041632130, 'calle 20', '3136255523', 'fercho@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuesto`
--

CREATE TABLE `impuesto` (
  `id_impuesto` int(11) NOT NULL,
  `id_tipo_impuesto` int(10) NOT NULL,
  `valor_impuesto` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id_ingreso` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `impuesto` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `tipo_rol` varchar(11) NOT NULL,
  `descripcion` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`tipo_rol`, `descripcion`) VALUES
('Admin', 'Usuario que tiene ligado su emprendimiento en la página por lo que tiene funciones especia'),
('Empleado', 'Empleado de un emprendimiento que depende de un administrador para poder existir en el sis'),
('Usuario', 'Usuario común que accede a productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` int(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `id_impuesto` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `id_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `nombre_categoria` (`nombre_categoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`id_detalle_ingreso`),
  ADD KEY `id_articulo` (`id_articulo`),
  ADD KEY `id_ingreso` (`id_ingreso`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `id_articulo` (`id_articulo`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_documento` (`num_documento`),
  ADD KEY `tipo_rol` (`tipo_rol`),
  ADD KEY `tipo_documento` (`tipo_documento`);

--
-- Indices de la tabla `impuesto`
--
ALTER TABLE `impuesto`
  ADD PRIMARY KEY (`id_impuesto`),
  ADD KEY `id_tipo_impuesto` (`id_tipo_impuesto`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`tipo_rol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD UNIQUE KEY `id_estado` (`id_estado`),
  ADD KEY `impuesto` (`id_impuesto`),
  ADD KEY `id_estado_2` (`id_estado`),
  ADD KEY `id_estado_3` (`id_estado`),
  ADD KEY `id_estado_4` (`id_estado`),
  ADD KEY `id_estado_5` (`id_estado`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `id_detalle_ingreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `impuesto`
--
ALTER TABLE `impuesto`
  MODIFY `id_impuesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_3` FOREIGN KEY (`nombre_categoria`) REFERENCES `categoria` (`nombre_categoria`),
  ADD CONSTRAINT `articulo_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `articulo_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `detalle_ingreso_ibfk_2` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id_articulo`),
  ADD CONSTRAINT `detalle_ingreso_ibfk_3` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso` (`id_ingreso`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id_articulo`),
  ADD CONSTRAINT `detalle_venta_ibfk_3` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_3` FOREIGN KEY (`tipo_rol`) REFERENCES `rol` (`tipo_rol`),
  ADD CONSTRAINT `empleados_ibfk_4` FOREIGN KEY (`tipo_documento`) REFERENCES `documento` (`tipo_documento`);

--
-- Filtros para la tabla `impuesto`
--
ALTER TABLE `impuesto`
  ADD CONSTRAINT `impuesto_ibfk_1` FOREIGN KEY (`id_impuesto`) REFERENCES `venta` (`id_impuesto`);

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `ingreso_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `ingreso_ibfk_4` FOREIGN KEY (`id_proveedor`) REFERENCES `empleados` (`id_empleado`),
  ADD CONSTRAINT `ingreso_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `venta_ibfk_5` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `venta_ibfk_6` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
