-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2021 a las 03:47:43
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `feria_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codigo` int(11) PRIMARY KEY NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codigo`, `tipo`) VALUES
(1, 'Verdura'),
(2, 'Fruta'),
(3, 'Fruto Seco'),
(4, 'Vegetal'),
(5, 'Herramienta'),
(6, 'Ropa'),
(7, 'Carne'),
(8, 'Pescado'),
(9, 'Libro'),
(10, 'Varios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `codigo` int(11) PRIMARY KEY NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `codigo_region` int(11) NOT NULL,
  constraint `comuna_region` foreign key (`codigo_region`) references `region` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`codigo`, `nombre`, `codigo_region`) VALUES
(1, 'Huara', 1),
(2, 'Antofagasta', 2),
(3, 'Freirina', 3),
(4, 'Illapel', 4),
(5, 'Algarrobo', 5),
(6, 'Graneros', 6),
(7, 'Licanten', 7),
(8, 'Florida', 8),
(9, 'Andacollo', 9),
(10, 'Dalcahue', 10),
(11, 'Aysén', 11),
(12, 'Laguna Blanca', 12),
(13, 'Buin', 13),
(14, 'Futrono', 14),
(15, 'Arica', 15),
(16, 'Yungay', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `codigo` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `codigo_comuna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`codigo`, `direccion`, `codigo_comuna`) VALUES
(1, 'Nombre Ficticio 123', 1),
(2, 'Nombre Ficticio 244', 2),
(3, 'Nombre Ficticio 332', 3),
(4, 'Nombre Ficticio 456', 4),
(5, 'Nombre Ficticio 5785', 5),
(6, 'Nombre Ficticio 6012', 6),
(7, 'Nombre Ficticio 70021', 7),
(8, 'Nombre Ficticio 8080', 8),
(9, 'Nombre Ficticio 9293', 9),
(10, 'Nombre Ficticio 1023', 10),
(11, 'Nombre Ficticio 11023', 11),
(12, 'Nombre Ficticio 12030', 12),
(13, 'Nombre Ficticio 13999', 13),
(14, 'Nombre Ficticio 14860', 14),
(15, 'Nombre Ficticio 15010', 15),
(16, 'Nombre Ficticio 16000', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidor`
--

CREATE TABLE `repartidor` (
  `codigo` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `repartidor`
--

INSERT INTO `repartidor` (`codigo`, `codigo_usuario`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_productos`
--

CREATE TABLE `lista_productos` (
  `codigo_producto` int(11) NOT NULL,
  `codigo_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_productos`
--

INSERT INTO `lista_productos` (`codigo_producto`, `codigo_pedido`) VALUES
(1, 1),
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`codigo`, `nombre`) VALUES
(1, 'Chile');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `codigo` int(11) NOT NULL,
  `detalles` varchar(200) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `codigo_repartidor` int(11) NOT NULL,
  `codigo_puesto` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`codigo`, `detalles`, `precio`, `codigo_repartidor`, `codigo_puesto`, `codigo_usuario`) VALUES
(1, 'Detalles askljsdklfjoitj23jr23j2309rj290rj032j0923j09j09fj09pfsj9jf9sdjf9sdjf09sj09fj0w', '22560.00', 3, 1, 5),
(2, 'Detasdaslkdjsadjasdjkslajdlksajlkasldja 2222222222222222222222222222222222222', '35900.00', 5, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(11) NOT NULL,
  `codigo_tipo_categoria` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `cantidad` int(3) DEFAULT NULL,
  `codigo_puesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `codigo_tipo_categoria`, `nombre`, `descripcion`, `precio`, `imagen`, `cantidad`, `codigo_puesto`) VALUES
(1, 1, 'Choclo', 'Alimento que blabla choclo', '600.00', 'https://www.eluniverso.com/resizer/DOk7FF_uajNaerJ2Ypf6RDmHp5E=/1001x670/smart/filters:quality(70)/cloudfront-us-east-1.images.arcpublishing.com/eluniverso/LQ2TXF3BPNEGBFSWBPBNZRZMAY.jpg', 13, 1),
(2, 1, 'Acelga', 'Blablacelga blabla lorem159028290382983974832974', '1250.00', 'https://i.blogs.es/144308/chard-3763735_1280/840_560.jpg', 12, 1),
(3, 3, 'Nuez', 'Alimento rico en blablasurtuijiu', '2100.00', 'https://www.lavanguardia.com/files/og_thumbnail/uploads/2019/08/07/5e998395e126a.jpeg', 230, 2),
(7, 8, 'Reineta', 'Filete de Reineta Fresco', '5000.00', 'https://www.outletseagarden.cl/wp-content/uploads/2020/11/FILETES-DE-REINETA-600-x400.jpg', 20, 3),
(8, 8, 'Choritos Congelados', 'Choritos Frescos', '2800.00', 'https://palafito.cl/wp-content/uploads/2021/03/12-3456x1728-2-e1519301217681.jpg', 15, 3),
(9, 8, 'Almejas', 'Almejas Frescas', '2300.00', 'https://cdn2.cocinadelirante.com/sites/default/files/images/2018/03/almejas-abiertas-comer.jpg', 25, 3),
(10, 8, 'Merluza', 'Pescada merluza sin cabeza ', '3700.00', 'https://palafito.cl/wp-content/uploads/2020/08/merluza-1-1.jpg', 20, 3),
(11, 8, 'Congrio', 'Pescada merluza sin cabeza ', '16700.00', 'https://pescaderiachile.cl/wp-content/uploads/2020/04/CongrioFilete.jpg', 18, 3),
(12, 8, 'Machas', 'Kilo de Machas frescas ', '18000.00', 'https://www.mrfrozen.cl/wp-content/uploads/2020/06/Machas-Media-Concha-plato-2.jpg', 8, 3),
(13, 1, 'Tomates', 'Kilo de tomates', '800.00', 'https://as01.epimg.net/diarioas/imagenes/2021/07/24/actualidad/1627109736_460003_1627109871_noticia_normal_recorte1.jpg', 50, 4),
(14, 1, 'Papas', 'Kilo de papas', '400.00', 'https://img.vixdata.io/pd/jpg-large/es/sites/default/files/p/papas-patatas.jpg', 500, 6),
(15, 1, 'Saco de Papas', 'Saco 25 kilos de papas', '8000.00', 'https://cuponassets.cuponatic-latam.com/backendCl/uploads/imagenes_descuentos/276772/0199c56b6ee56ce1c55feece770a9fba17d49040.XL2.jpg', 100, 6),
(16, 1, 'Zapallo entero', 'Calabaza de zapallo entero', '3500.00', 'https://img77.uenicdn.com/image/upload/v1593497694/business/74e6a4bc85484a09a2ec49c3be035d23.jpg', 20, 4),
(17, 1, 'Lechugas', 'Lechugas diversas variedades', '600.00', 'https://i.blogs.es/d42066/salad-2376777_1920/1366_2000.jpg', 100, 4),
(18, 1, 'Repollo', 'Repollo verde y Morado', '500.00', 'https://www.hola.com/imagenes/cocina/noticiaslibros/20210310185727/repollo-col-berza-diferencia-recetas-faciles/0-928-597/tres-repollos-1-a.jpg', 100, 4),
(19, 1, 'Cebolla', 'Cebolla Blanca  y Morada', '100.00', 'https://www.hola.com/imagenes/cocina/recetas/20191118153995/diferentes-tipos-cebolla/0-745-940/portada-cebollas-adobe-t.jpg?filter=w600', 1000, 4),
(20, 2, 'Manzanas', 'Kilo de Manzanas', '500.00', 'https://static.vecteezy.com/system/resources/previews/001/827/323/non_2x/basket-of-green-and-red-apples-free-photo.jpg', 100, 5),
(21, 2, 'Platanos', 'Kilo de Platanos', '900.00', 'https://static1.abc.es/media/bienestar/2019/07/25/platano-beneficios-kIyF--620x349@abc.jpg', 100, 5),
(22, 2, 'Duraznos', 'Kilo de duraznos', '800.00', 'https://cdn2.cocinadelirante.com/sites/default/files/styles/gallerie/public/images/2020/06/como-madurar-duraznos.jpg', 100, 5),
(23, 2, 'Durazno Platano', 'Kilo de durazno Platano', '1100.00', 'https://lamanzanadeoro.cl/wp-content/uploads/2021/03/4DE2A3CD-52CA-4428-A2F6-A686199F2602.jpeg', 30, 5),
(24, 2, 'Frutillas', 'Kilo de Frutillas', '1900.00', 'https://agriculturers.com/wp-content/uploads/2020/06/Frutillas-en-pleno-desierto-1000x500.jpg', 20, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `codigo` int(11) NOT NULL,
  `fecha_funcionamiento` date NOT NULL,
  `patente_puesto` varchar(10) NOT NULL,
  `codigo_direccion` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`codigo`, `fecha_funcionamiento`, `patente_puesto`, `codigo_direccion`, `codigo_usuario`) VALUES
(1, '2021-08-13', 'ACAB1302', 13, 1),
(2, '2020-01-25', 'ZXZX0101', 11, 2),
(3, '2018-03-25', 'CGTG0312', 9, 6),
(4, '2019-07-17', 'XASR0234', 6, 7),
(5, '2019-11-01', 'ASFS3634', 9, 8),
(6, '2020-12-06', 'CKJS2320', 11, 9),
(7, '2018-12-18', 'JGWS0409', 11, 10),
(8, '2017-07-03', 'KJEL9534', 12, 11),
(9, '2021-04-21', 'HNDS2353', 3, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `codigo_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`codigo`, `nombre`, `codigo_pais`) VALUES
(1, 'Región 1', 1),
(2, 'Región 2', 1),
(3, 'Región 3', 1),
(4, 'Región 4', 1),
(5, 'Región 5', 1),
(6, 'Región 6', 1),
(7, 'Región 7', 1),
(8, 'Región 8', 1),
(9, 'Región 9', 1),
(10, 'Región 10', 1),
(11, 'Región 11', 1),
(12, 'Región 12', 1),
(13, 'Región 13', 1),
(14, 'Región 14', 1),
(15, 'Región 15', 1),
(16, 'Región 16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`codigo`, `tipo`) VALUES
(1, 'Usuario'),
(2, 'Administrador'),
(3, 'Tester'),
(4, 'Vendedor'),
(5, 'Repartidor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(11) NOT NULL,
  `rut` varchar(15) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `codigo_direccion` int(11) NOT NULL,
  `codigo_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo`, `rut`, `nombre`, `apellido`, `correo`, `telefono`, `contrasena`, `codigo_direccion`, `codigo_tipo_usuario`) VALUES
(1, '19.275.219-1', 'Pepe', 'Apellido1', 'mail@example.com', '945688252', md5('abc'), 1 ,1),
(2, '24.281.015-k', 'Laura', 'Laurapellido', 'correo@correo.algo', '912345678', md5('agfbc'), 2 , 1),
(3, '12.123.123-1', 'Larry', 'Kapija', 'larry@kapija.com', '912344321', md5('agfbc'), 3 , 2),
(4, '6.232.965.2', 'Elmer', 'Figueroa', 'chayanne@mail.com', '412939524', md5('agfbc'), 4 , 3),
(5, '12.321.321-1', 'Simon', 'Dice', 'asda@gmail.com', '9010101013', md5('agfbc'), 5 , 4),
(6, '14.363.632-4', 'Maria', 'Andrade', 'maria854321@gmail.com', '5693244232', md5('agfbc'), 6 , 1),
(7, '15.623.132-4', 'Andres', 'Ramirez', 'ARamirez85@gmail.com', '5693451253', md5('agfbc'), 7 , 1),
(8, '13.426.363-4', 'Francisca', 'manzano', 'fm9351@gmail.com', '5692351232', md5('agfbc'), 8 , 1),
(9, '9.235.643-7', 'Mario', 'Herrera', 'mario.herrera75@hotmail.com', '5695346341', md5('agfbc'), 9 , 1),
(10, '17.534.745-4', 'Carolina', 'Gonzales', 'Cgonzales954@hotmail.com', '5693463123', md5('agfbc'), 10 , 1),
(11, '12.634-623-4', 'Raúl', 'Martinez', 'Raul.M.1975@hotmail.com', '5693453253', md5('agfbc'), 11 , 1),
(12, '11.562.234-k', 'Cecilia', 'Altamirano', 'Cecilia0931_a@hotmail.com', '5693523634', md5('agfbc'), 12 , 1),
(14, '12.123.122-1', 'Nombre Generico1', 'Apellido Generico1', 'correo@generico.com', '+56112323', md5('agfbc'), 13 , 5),
(15, '12.123.123-9', 'Nombre Generico2', 'Apellido Generico2', 'correo@generico2.com', '+561123243', md5('agfbc'), 14 , 5),
(16, '12.123.103-9', 'Nombre Generico3', 'Apellido Generico3', 'correo@generico3.com', '+561120243', md5('agfbc'), 15 , 5);

