
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contra` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `email`, `contra`) VALUES
(2, 'nahiara', 'nahiaramaidana1345@gmail.com', '$2y$10$dU8yOClYLd9a1NT8xBtD5upriGXzundRLc1HIhrIraK5P4GwtDOQa'),
(3, 'hola', 'holaaa@gmail.com', '$2y$10$PK2StxOZjg6E/drKSrAhfutC4E9deXnz3cbXSFaoRHqbXqAKpqv6O');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casas`
--

CREATE TABLE `casas` (
  `id` int(11) NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  `precio` varchar(250) DEFAULT NULL,
  `localidad` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `tipo_hogar` varchar(250) DEFAULT NULL,
  `tipo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `casas`
--

INSERT INTO `casas` (`id`, `img`, `precio`, `localidad`, `direccion`, `tipo_hogar`, `tipo`) VALUES
(1, 'uploads/casa8.jpg', '3000000', 'monte-grande', '1920 Guemes', 'venta', 'venta'),
(2, 'uploads/casa7.jpg', '4000000', 'banfield', 'calle falsa 123', 'Alquilar', 'Alquilar'),
(3, 'uploads/Departamento5.jpg', '8000000', 'canning', 'rodriguez 128', 'Alquilar', 'Alquilar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `id_casa` varchar(250) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `telefono` int(200) NOT NULL,
  `contra` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellido`, `telefono`, `contra`, `email`) VALUES
(12343556, 'TOWUEHUSHO', 'ndgoujsdbgshdljsd', 2147483647, '$2y$10$Wx9Nm.o7EquiTynBam/p0.WiQByPmNqURVVz2GhCohkh9rcTkuS9G', 'hola@gmail.com'),
(47164333, 'alex', 'maidana', 1163601120, '$2y$10$GyiasCHorFZiYvLPKpZ6ruIbw/x0PNJEBSWF5FgqQZ21y51WGoANO', 'nahiaramaidana1345@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `casas`
--
ALTER TABLE `casas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `casas`
--
ALTER TABLE `casas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
