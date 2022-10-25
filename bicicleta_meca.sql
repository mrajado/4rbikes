-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2022 a las 14:13:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bicicleta_meca`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spFindIdMarca` (IN `idMarca` INT)  NO SQL BEGIN
select * from marca where marca.idMarca=idMarca;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsert` (IN `correo` VARCHAR(35), IN `contrasena` VARCHAR(25))  NO SQL BEGIN
INSERT INTO usuarios(correo,contrasena)
VALUES (correo,contrasena);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `idComponente` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`idComponente`, `tipo`, `stock`, `idMarca`, `nombre`) VALUES
(1, 'ruedaMontana', 3, 1, 'shimano'),
(2, 'ruedaCarretera', 5, 2, 'hed'),
(3, 'ruedaTodoterreno', 6, 3, 'zipp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `nombre`) VALUES
(1, 'BH'),
(2, 'ORBEA'),
(3, 'SCOTT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `imagenNoticia` varchar(50) DEFAULT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `texto` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `imagenNoticia`, `titulo`, `fecha`, `texto`) VALUES
(1, '../img/noticiasimg/1.jpeg', 'Las nuevas bicicletas eléctricas de Lancia ya se puede comprar a partir de 1.050 euros', '2022-10-19', 'Lancia se lanza a conquistar la ciudad dejando de lado las cuatro ruedas y presentando cuatro modelos diferentes de bicicletas eléctricas, en colaboración con la marca Platum, para \"ofrecer una solución completa de movilidad urbana elegante y sostenible\". La marca italiana, ya conocida en los entornos urbanos gracias a su superventas Lancia Ypsilon, un pequeño coche que ya acumula más de 3 millones de unidades vendidas en cuatro generaciones distintas, ha elaborado cuatro diseños que responden a las diferentes necesidades de aquellos que recorren la ciudad día a día. '),
(2, '../img/noticiasimg/2.jpeg', 'Cómo solicitar las ayudas de hasta 700 euros de la Xunta para comprar una bicicleta eléctrica', '2022-10-19', 'La Xunta de Galicia ha abierto el plazo para que la población de esta región pueda solicitar las ayudas de hasta 700 euros para la compra de bicicletas eléctricas. Ya son 92 los establecimientos adheridos para la venta de estas bicicletas y todas las personas interesadas pueden presentar desde este lunes y hasta el 15 de noviembre la solicitud de acceso a la ayuda.'),
(3, '../img/noticiasimg/3.jpeg', 'Porsche sube su apuesta por las bicicletas eléctricas y crea una división especializada', '2022-10-19', 'La marca de Stuttgart se ha tomado muy en serio el desarrollo de un ecosistema eléctrico con vehículos de todo tipo, y con el objeto de incrementar su presencia en el cada vez más creciente segmento de las bicicletas eléctricas se ha aliado con Ponooc Investment, una potente compañía holandesa especializada en este campo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(35) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `contrasena`, `admin`) VALUES
(1, 'Norman@gmail.com', 'pyiup5ylo2', 0),
(2, 'Unosdos@meca.net', 'asdiock125', 0),
(3, 'trescuatros@bicis.com', '1_sfhz_789', 0),
(4, 'diosesjuan@meca.net', 'vmljasdkm', 0),
(5, 'Marcelo@gmail.com', 'salamanca567', 0),
(6, 'admin', 'admin123', 1),
(7, 'iker@gmail.com', '123', NULL),
(8, '4RBikess@gmail.com', 'admin123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`idComponente`),
  ADD KEY `marca` (`idMarca`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `idComponente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD CONSTRAINT `componentes_ibfk_1` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
