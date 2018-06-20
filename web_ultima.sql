-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2018 a las 08:51:48
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
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(200) DEFAULT NULL,
  `contra` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `usuario`, `contra`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id_descuento` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id_descuento`, `cantidad`, `porcentaje`) VALUES
(1, 5, 10),
(2, 10, 20),
(3, 15, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fechapedido` date DEFAULT NULL,
  `fechaentrega` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `pdf` varchar(200) DEFAULT NULL,
  `xml` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `prodid` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`prodid`, `nombre`, `descripcion`, `stock`, `precio`, `imagen`, `tipo`) VALUES
(9, 'Falda a la Cintura Negra', 'Falda lisa color negro con pliegues. Material: 100% algodon, lavar a mano con agua fría, hecho en China. Medidas: Largo total de 42 cm, cintura 65 cm.', 10, 150, 'img/falda.jpg', 4),
(10, 'Lentes de Corazon', 'Variedad de lentes hechos de policarbonato en distintos colores: amarillo, azul, rojo, negro, rosa, verde, naranja. Marco hecho de plastico. Hecho en china.', 10, 100, 'img/lentes4.jpg', 6),
(11, 'Pantalon amarillo-negro', 'Pantalon estampado de cuadros color amarillo, negro y con lineas rojas. Material: 100% rayon, limpieza en seco, hecho en Vietnam. Medidas: Cintura 66 cm, Entrepierna 81, Tiro 31 cm.', 10, 190, 'img/pantalon3.jpg', 3),
(12, 'Falda cuadros', 'Falda estampado cuadros colores gris y café con pliegues. Material: 100% algodon, lavar a mano con agua fría, hecho en China. Medidas: Largo total de 41 cm, cintura 70 cm.', 10, 140, 'img/falda3.jpg', 4),
(13, 'Pantalon verde-rojo', 'Pantalon estampado de cuadros de color verde, azul y con lineas rojas. Material: 100% rajon, limpieza en seco, hecho en Vietnam. Medidas: Cintura 70 cm, Entrepierna 88 cm, Tiro 33 cm.', 10, 190, 'img/pantalon4.jpg', 3),
(14, 'Choker corazon', 'Collar tipo choker con corazón hecho de aleación y correa de piel con broche de botones.', 10, 60, 'img/collar1.jpg', 5),
(15, 'Blusa blanca con rosas', 'Blusa holgada con estampado de rosas en las mangas y lazo en el cuello color blanco. Material: 100% poliester. Medidas: Hombros 47 cm, Busto 104 cm, Manga 26 cm, Largo 68 cm.', 10, 110, 'img/blusa2.jpg', 1),
(16, 'Blusa negra con girasoles', 'Blusa con hombros descubiertos color negro con estampado de girasoles. Material: 100% poliester. Medidas: Hombros 47 cm, Busto 104 cm, Manga 26 cm, Largo 68 cm.', 10, 100, 'img/blusa4.png', 1),
(17, 'Aretes de serpiente', 'Par de aretes en forma de serpiente tono plateado', 10, 120, 'img/bisuteria1.jpg', 7),
(18, 'Lentes corazón', 'Lentes en forma de corazón color rosa sin aumento armazón de metal', 10, 150, 'img/lentes2.jpg', 6),
(19, 'Vestido rosa', 'Vestido hecho de terciopelo color rosa. Lavar a mano con agua fría. Hecho en China.', 10, 220, 'img/vestido2.jpg', 2),
(20, 'Blusa Joy Division', 'Blusa con estampado del album Unknown Pleasures - Joy Division. Hecho en serigrafía. 100% algodón.', 10, 140, 'img/blusa5.jpg', 1),
(21, 'Bolso bordado', 'Bolso con bordados de rosas y estoperoles color negro. Correa de metal y broche.', 10, 130, 'img/bolso4.jpg', 8),
(22, 'Collar nylon', 'Collar hecho de nylon color negro. Hecho en china.', 10, 60, 'img/collar2.jpg', 5),
(23, 'Pantalón con roturas', 'Pantalón de mezclilla con roturas en rodillas. Hecho en china. 100% Mezclilla.', 10, 250, 'img/pantalon1.jpg', 3),
(24, 'Pulsera Love', 'Pulsera hecha de acero con leyenda Love. Perla de adorno. Color rosa dorado.', 10, 200, 'img/bisuteria6.jpg', 7),
(25, 'Falda camuflaje', 'Falda ccon estampado de camufalje color blanco/gris/negro. Cierre metálico. Hecho en Vietnam', 10, 150, 'img/falda7.jpg', 4),
(26, 'Vestido Gótico', 'Vestido color negro hecho de terciopelo con mangas y cuello color blanco. Hecho en China. Lavar a mano con agua fria.', 10, 275, 'img/vestido1.jpg', 2),
(27, 'Lentes oscuros', 'Lentes oscuros hechos de policarbonato casuales. Hechos en China. Sin fitro UV.', 10, 60, 'img/lentes3.jpg', 6),
(28, 'Bolso monedero', 'Bolso tipo monedero color negro con broche de metal. Correa roja de tela desmontable. Hecho en Vietnam.', 10, 90, 'img/bolso1.jpg', 8),
(29, 'Blusa rosa amarilla', 'Blusa con estampado de rosa amarilla con letras japonesas. Color negro. 100% algodón. Hecha en China.', 10, 130, 'img/blusa3.jpg', 1),
(30, 'Pantalón skinny', 'Pantalón de mezclilla ajustado tipo skinny. Lavar a mano con agua fría. Hecho en Vietnam.', 10, 260, 'img/pantalon2.jpg', 3),
(31, 'Collar infinito', 'Collar de acero con forma de infinito tono plateado. Cadena de acero. Hecho en México.', 10, 215, 'img/collar7.jpg', 5),
(32, 'Aretes cruz', 'Aretes en forma de cruz color negro hechos en acero inoxidable. Hecho en México.', 10, 130, 'img/bisuteria4.jpg', 7),
(33, 'Falda rosa', 'Falda color rosa pastel con líneas blancas hecha 100% de algodón. Ligeros pliegues. Hecha en Vietnam.', 10, 180, 'img/falda4.jpg', 4),
(34, 'Lentes gato', 'Lentes de sol en forma de gato hechos de policarbonato color azul y armazón blanco. Hechos en China.', 10, 80, 'img/lentes1.jpg', 6),
(35, 'Vestido retro', 'Vestido blanco con lineas de colores estilo retro. Hecho 100% de algodon. Hecho en Vietnam.', 10, 260, 'img/vestido4.jpg', 2),
(36, 'Bolso cartera', 'Bolso pequeño color beige con correa de acero y doble cierre de metal. Imitacion piel. Hecho en China.', 10, 140, 'img/bolso2.jpg', 8),
(37, 'Collar candado', 'Collar con corazón en forma de candado, argollas y estoperoles de metal. Color negro, piel sintética.', 10, 90, 'img/collar3.jpg', 5),
(38, 'Pulsera numerales', 'Pulsera de acero inoxidable con inscripciones de numerales romanos. Hecha en México.', 10, 180, 'img/bisuteria7.jpg', 7),
(39, 'Vestido manga corta', 'Vestido negro con cuello color blanco de manga corta estilo gótico. Hecho 100% de algodón. Hecho en Vietnam.', 10, 230, 'img/vestido5.jpg', 2),
(40, 'Bolso de mano', 'Bolso de mano color rosa claro con estoperoles y cierre metalico. Hecho en Vietnam.', 10, 200, 'img/bolso3.jpg', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `tipo`) VALUES
(1, 'blusa'),
(2, 'vestido'),
(3, 'pantalon'),
(4, 'falda'),
(5, 'collar'),
(6, 'lentes'),
(7, 'bisuteria'),
(8, 'bolso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellidop` varchar(200) DEFAULT NULL,
  `apellidom` varchar(200) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `usuario` varchar(200) DEFAULT NULL,
  `contra` varchar(200) DEFAULT NULL,
  `calle` varchar(200) DEFAULT NULL,
  `numint` varchar(200) DEFAULT NULL,
  `numext` varchar(200) DEFAULT NULL,
  `colonia` varchar(200) DEFAULT NULL,
  `ciudad` varchar(200) DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `cp` varchar(200) DEFAULT NULL,
  `cc` varchar(200) DEFAULT NULL,
  `ccv` varchar(200) DEFAULT NULL,
  `fecha` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `correo`, `usuario`, `contra`, `calle`, `numint`, `numext`, `colonia`, `ciudad`, `estado`, `cp`, `cc`, `ccv`, `fecha`) VALUES
(10, 'Ivan', 'Chavez', 'Vaca', 'chentauren@gmail.com', 'Chentauren', 'Chentauren.4', 'Alberto Cinta', '108', '1', 'Rinconadas del Auditorio', 'Zapopan', 'Jalisco', '45180', '1111111111111111', '111', '11/21'),
(11, 'Esteban', 'Romo', 'Esparza', 'esteban.romo.98@gmail.com', 'vamanos', 'Paperspls', 'Buga', '1', '1', 'Bugambilias', 'Zapopan', 'Jalisco', '45100', '456783945032', '567', '12/21'),
(13, 'Tripod', 'RP', 'Mama', 'Toypreso@gmail.com', 'Manolo', 'Vacamoo', 'South Rozhok', '770', '45', 'Schoolyard', 'Rozhok', 'Erangel', '12545', '4444 1345 1233 1231', '667', '09/21'),
(15, 'last test', 'comeon', 'please', 'lastone@gmail.com', 'please', 'last', 'does ', '2', '3', 'it', 'work', 'maybe', '13', '5288439123441901', '123', '34/32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id_descuento`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`prodid`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id_descuento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `prodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipos` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
