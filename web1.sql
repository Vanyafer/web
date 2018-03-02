-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2018 a las 08:15:00
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `prodid` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`prodid`, `nombre`, `tipo`, `descripcion`, `stock`, `precio`, `imagen`) VALUES
(9, 'Falda a la Cintura Negra', 'Falda', 'Falda lisa color negro con pliegues. Material: 100% algodon, lavar a mano con agua fría, hecho en China. Medidas: Largo total de 42 cm, cintura 65 cm.', 5, 150, 'img/falda.jpg'),
(10, 'Lentes de Corazon', 'Lentes', 'Variedad de lentes hechos de policarbonato en distintos colores: amarillo, azul, rojo, negro, rosa, verde, naranja. Marco hecho de plastico. Hecho en china.', 5, 100, 'img/lentes4.jpg'),
(11, 'Pantalon amarillo-negro', 'Pantalon', 'Pantalon estampado de cuadros color amarillo, negro y con lineas rojas. Material: 100% rayon, limpieza en seco, hecho en Vietnam. Medidas: Cintura 66 cm, Entrepierna 81, Tiro 31 cm.', 5, 190, 'img/pantalon3.jpg'),
(12, 'Falda cuadros', 'Falda', 'Falda estampado cuadros colores gris y café con pliegues. Material: 100% algodon, lavar a mano con agua fría, hecho en China. Medidas: Largo total de 41 cm, cintura 70 cm.', 5, 140, 'img/falda3.jpg'),
(13, 'Pantalon verde-rojo', 'Pantalon', 'Pantalon estampado de cuadros de color verde, azul y con lineas rojas. Material: 100% rajon, limpieza en seco, hecho en Vietnam. Medidas: Cintura 70 cm, Entrepierna 88 cm, Tiro 33 cm.', 5, 190, 'img/pantalon4.jpg'),
(14, 'Choker corazon', 'Collar', 'Collar tipo choker con corazón hecho de aleación y correa de piel con broche de botones.', 5, 60, 'img/collar1.jpg'),
(15, 'Blusa blanca con rosas', 'Blusa', 'Blusa holgada con estampado de rosas en las mangas y lazo en el cuello color blanco. Material: 100% poliester. Medidas: Hombros 47 cm, Busto 104 cm, Manga 26 cm, Largo 68 cm.', 5, 110, 'img/blusa2.jpg'),
(16, 'Blusa negra con girasoles', 'Blusa', 'Blusa con hombros descubiertos color negro con estampado de girasoles. Material: 100% poliester. Medidas: Hombros 47 cm, Busto 104 cm, Manga 26 cm, Largo 68 cm.', 5, 100, 'img/blusa4.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`prodid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `prodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
