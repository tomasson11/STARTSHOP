-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2022 a las 22:14:14
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
-- Base de datos: `STARTSHOP_project`
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
  `stock` int(5) NOT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `id_estado` int(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `id_usuario`, `nombre_categoria`, `codigo`, `nombre`, `precio_venta`, `stock`, `fecha_creacion`, `descripcion`, `id_estado`) VALUES
(14, 39, 'Dulces', '1092', 'arroz', '25666.00', 34, '2022-09-14', 'hola', 1),
(15, 43, 'Floristeria', '134', 'papa', '25666.00', 56, '2022-09-06', 'hola', 1),
(17, 39, 'Dulces', 'aaa', 'agua', '1222.00', 19, '2022-09-14', 'hilaaaa', 1),
(18, 39, 'Dulces', '10569', 'yuca', '2500.00', 11, '2022-09-14', 'holaaaaa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(30) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `descripcion`, `id_estado`) VALUES
(1, 'Artesanias', 'Productos hechos con tecnica y arte de alta cálidad', 1),
(2, 'Ropa', 'Prendas, zapatos y abrigos', 1),
(3, 'Dulces', 'Productos hechos a base de azucar', 1),
(4, 'Servicios de restaurante', 'Todos los servicios de restaurante necesarios', 1),
(5, 'Floristeria', 'Encontramos productos relacionados con plantas', 1),
(6, 'Reposteria', 'Productos hechos a base de harina ', 1),
(7, 'Modisteria', 'Todo arreglo y confesion de ropa', 1),
(8, 'Bisuteria', 'Productos hechos a base de hilo', 1),
(9, 'Carnes frias', 'Alimentos procesados y otras variedades', 1),
(10, 'Licor artesanal', 'Bebidas alcoholicas obtenidas por destilacion orgánica', 1),
(11, 'Tecnologia', 'aquí encontrarás una multitud de aparatos técnologicos de alta cálidad', 1);

-- --------------------------------------------------------

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
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `tipo_documento` varchar(20) NOT NULL,
  `descripcion_documento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`tipo_documento`, `descripcion_documento`) VALUES
('Cedula ', 'DOCUMENTO REGISTRADO PARA MAYO'),
('Pasaporte', 'Pasaporte'),
('Tarjeta de Identidad', 'Registro para menores de edad');

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
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(1) NOT NULL,
  `tipo_estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `tipo_estado`) VALUES
(1, 'ACTIVO'),
(0, 'INACTIVO');

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
-- Estructura de tabla para la tabla `tipo_impuesto`
--

CREATE TABLE `tipo_impuesto` (
  `id_tipo_impuesto` int(11) NOT NULL,
  `tipo_impuesto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `tipo_rol` varchar(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `num_documento` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `usuario_login` varchar(15) NOT NULL,
  `password_login` varchar(15) NOT NULL,
  `imagen_usuario` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `tipo_rol`, `nombre`, `apellidos`, `tipo_documento`, `num_documento`, `fecha_nacimiento`, `direccion`, `telefono`, `email`, `id_estado`, `usuario_login`, `password_login`, `imagen_usuario`) VALUES
(15, 'Usuario', 'anuar', 'fernandez', 'Cedula ', '1041631183', '2004-04-03', 'lamma', '3232964145', 'yassdj92@hotmail.com', 1, 'anuar', '123', ''),
(37, 'Usuario', 'juan', 'huaj ', 'Tarjeta de Identidad', '100030322', '1111-11-11', 'kkjakjkqn', '3121212', '', 1, 'hola', 'hola', 0x24),
(39, 'Admin', 'ANUAR', 'fernandez', 'Cedula ', '1041632290', '2017-11-07', 'calle19', '3138681910', 'torrescamilo0902@gmail.com', 1, 'admin', '123', ''),
(40, 'Usuario', 'alexander', 'cantor', 'Cedula ', '123456789', '1992-09-14', 'calle 11', '3113119392', 'alex@gmail.com', 1, 'alcantor', '1234567', 0x24),
(41, 'Usuario', 'mauro', 'quiroz', 'Cedula ', '', '0000-00-00', '', '', '', 1, '', '', 0x24),
(42, 'Usuario', 'mauro', 'quiroz', 'Pasaporte', '1041631183', '2021-08-13', 'espinosa 16', '3136861897', 'torrescamilo0902@gmail.com', 1, 'mauro', '12345678', 0x24),
(43, 'Admin', 'RAPTOR', 'VELEZ', 'Cedula ', '10416330122', '2017-09-11', 'CALLE CARACAS 1910', '3146140584', 'PACHIOCA@GMAIL.COM', 1, 'admin', '234', '');

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
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `nombre_categoria` (`nombre_categoria`),
  ADD KEY `id_estado` (`id_estado`);

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
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`tipo_documento`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_documento` (`num_documento`),
  ADD KEY `tipo_rol` (`tipo_rol`),
  ADD KEY `tipo_documento` (`tipo_documento`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `tipo_estado_2` (`tipo_estado`),
  ADD KEY `tipo_estado` (`tipo_estado`);

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
-- Indices de la tabla `tipo_impuesto`
--
ALTER TABLE `tipo_impuesto`
  ADD PRIMARY KEY (`id_tipo_impuesto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_documento` (`tipo_documento`),
  ADD KEY `id_rol` (`tipo_rol`),
  ADD KEY `tipo_documento` (`tipo_documento`),
  ADD KEY `id_estado` (`id_estado`);

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
  MODIFY `id_articulo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT de la tabla `tipo_impuesto`
--
ALTER TABLE `tipo_impuesto`
  MODIFY `id_tipo_impuesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

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
-- Filtros para la tabla `tipo_impuesto`
--
ALTER TABLE `tipo_impuesto`
  ADD CONSTRAINT `tipo_impuesto_ibfk_1` FOREIGN KEY (`id_tipo_impuesto`) REFERENCES `impuesto` (`id_tipo_impuesto`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_7` FOREIGN KEY (`tipo_rol`) REFERENCES `rol` (`tipo_rol`),
  ADD CONSTRAINT `usuario_ibfk_8` FOREIGN KEY (`tipo_documento`) REFERENCES `documento` (`tipo_documento`),
  ADD CONSTRAINT `usuario_ibfk_9` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

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
