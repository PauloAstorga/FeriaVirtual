-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2021 a las 05:33:45
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `feria_db2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codigo`, `tipo`) VALUES
(1, 'Verdura'),
(2, 'Fruta'),
(3, 'Fruto Seco'),
(4, 'Herramienta'),
(5, 'Ropa'),
(6, 'Carne'),
(7, 'Pescado'),
(8, 'Libro'),
(9, 'Varios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `codigo_region` int(11) NOT NULL
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
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `codigo` int(11) NOT NULL,
  `dinero` decimal(15,2) NOT NULL,
  `codigo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`codigo`, `dinero`, `codigo_usuario`) VALUES
(1, '123456789.12', 3),
(2, '13000.00', 4);

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
(1, 'Av Einstein #0352', 1),
(2, 'Guanaco #423', 2),
(3, ' Avenida San Sebastián, 2967', 3),
(4, 'Av. Diez De Julio Huamachuco 483', 4),
(5, ' Calle Serrano, 0277', 5),
(6, 'Avda. Lo Barnechea 1370', 6),
(7, 'Rafael Capdeville 0440', 7),
(8, 'Artemio Gutierrez 1362', 8),
(9, 'Calle Miraflores, 820', 9),
(10, 'Los Cipreses 33', 10),
(11, 'Calle Constitución, 425 - Piso 2', 11),
(12, 'Avda Pdte. Ibañez 367', 12),
(13, 'Calle Del Labrador, 1528', 13),
(14, 'Avda Departamental 78', 14),
(15, ' Calle José Nogueira, 1332', 15),
(16, ' Calle José Nogueira, 1332', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_productos`
--

CREATE TABLE `lista_productos` (
  `codigo_producto` int(11) NOT NULL,
  `codigo_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(6, 7, 'Atún', '1 KG Atun premium\r\n', '14500.00', 'https://pescaderiachile.cl/wp-content/uploads/2020/05/diferencias-nutricionales-atun-t.jpg', 10, 3),
(7, 7, 'Merluza', 'FILETE de Merluza 1 Kg', '8000.00', 'https://pescaderiachile.cl/wp-content/uploads/2020/04/1_kq5Sd2rn6JgtSDiVAVPpmg-2.jpeg', 10, 3),
(8, 7, 'Reineta', 'Filete de Reineta 1KG', '8000.00', 'https://pescaderiachile.cl/wp-content/uploads/2020/04/2284199.jpg', 8, 3),
(9, 7, 'Tilapia', 'Filete de Tilapia 1KG', '7500.00', 'https://pescaderiachile.cl/wp-content/uploads/2020/04/filete-pescado-crudo-tilapia-tabla-cortar-limon-especias-mesa-oscura_78677-2408-1.jpg', 10, 3),
(10, 7, 'Congrio', 'Filete de Congrio 1KG', '13000.00', 'https://pescaderiachile.cl/wp-content/uploads/2020/04/CongrioFilete.jpg', 12, 3),
(11, 7, 'Salmón', 'Kilo de Salmón', '17900.00', 'https://pescaderiachile.cl/wp-content/uploads/2020/08/salmon-filete-o-trozo.jpg', 15, 3),
(12, 7, 'Camarones', 'Kilo de Camarones', '14000.00', 'https://pescaderiachile.cl/wp-content/uploads/2020/04/razones-para-comer-camarones-propiedades.jpg', 30, 3),
(13, 7, 'Choritos', 'Kilo de Choritos Crudos', '4500.00', 'https://st2.depositphotos.com/2252541/7276/i/600/depositphotos_72764583-stock-photo-steamed-mussels.jpg', 30, 3),
(14, 7, 'Almejas', 'Kilo de Almejas Crudas', '3500.00', 'https://c8.alamy.com/compes/p9a307/frescos-mariscos-crudos-ostras-con-limon-y-hielo-sobre-un-fondo-azul-claro-p9a307.jpg', 20, 3),
(15, 2, 'Uvas', 'Kilo de Uvas', '1200.00', 'https://5aldia.cl/wp-content/uploads/2018/04/beneficios-de-las-uvas-cover-696x435.jpg', 50, 4),
(16, 2, 'Sandías', 'Sandía entera', '1200.00', 'https://5aldia.cl/wp-content/uploads/2018/03/sandia.jpg', 100, 4),
(17, 2, 'Platano', 'Kilo de platano', '1000.00', 'https://5aldia.cl/wp-content/uploads/2018/03/platano.jpg', 80, 4),
(18, 2, 'Piña', 'Piña entera', '1000.00', 'https://5aldia.cl/wp-content/uploads/2018/03/pina.jpg', 100, 4),
(19, 2, 'Pera', 'Kilo de Pera ', '800.00', 'https://5aldia.cl/wp-content/uploads/2018/03/pera.jpg', 30, 4),
(20, 2, 'Pepino Dulce', 'Kilo de Pepino ', '900.00', 'https://5aldia.cl/wp-content/uploads/2018/03/pepino_dulce.jpg', 40, 4),
(21, 2, 'Naranjas', 'Kilo de Naranjas', '600.00', 'https://5aldia.cl/wp-content/uploads/2018/03/naranja.jpg', 60, 4),
(22, 2, 'Manzanas', 'Kilo de Manzanas', '450.00', 'https://5aldia.cl/frutas-y-vegetales/manzana/', 50, 4),
(23, 2, 'durazno', 'Kilo de Duraznos', '650.00', 'https://5aldia.cl/wp-content/uploads/2018/03/durazno.jpg', 70, 4),
(24, 1, 'Zapallo', 'Trozo de Zapallo ', '500.00', 'https://5aldia.cl/wp-content/uploads/2018/03/134198213.jpg', 200, 5),
(25, 1, 'Zanahoria', 'Kilo de Zanahorias', '1200.00', 'https://5aldia.cl/wp-content/uploads/2018/03/zanahoria.jpg', 100, 5),
(26, 1, 'Tomate ', 'Kilo de Tomates', '800.00', 'https://5aldia.cl/wp-content/uploads/2018/03/tomate.jpg', 30, 5),
(27, 1, 'Repollo ', 'Repollo Entero', '600.00', 'https://5aldia.cl/wp-content/uploads/2018/03/repollo.jpg', 150, 5),
(28, 1, 'Porotos verdes ', 'Kilo de Porotos Verdes', '1000.00', 'https://5aldia.cl/wp-content/uploads/2018/03/porotos-verdes.jpg', 80, 4),
(29, 1, 'Pimentón Verde ', 'Pimentón Verde Unidad', '400.00', 'https://5aldia.cl/wp-content/uploads/2018/03/pimenton_verde.jpg', 300, 4),
(30, 1, 'Pimentón Rojo', 'Pimentón Rojo Unidad', '400.00', 'https://5aldia.cl/wp-content/uploads/2018/03/pimenton_rojo.jpg', 300, 5),
(32, 1, 'Palta', 'Palta Hass Kilo', '4000.00', 'https://5aldia.cl/wp-content/uploads/2018/03/palta.jpg', 30, 5),
(33, 1, 'Limón', 'Kilo de Limón', '800.00', 'https://5aldia.cl/wp-content/uploads/2018/03/limon.jpg', 100, 5),
(34, 1, 'Lechuga', 'Lechuga Entera Unidad', '600.00', 'https://5aldia.cl/wp-content/uploads/2018/03/lechuga.jpg', 500, 5),
(35, 1, 'Espinaca', 'Racimo Espinaca 200G', '1000.00', 'https://5aldia.cl/wp-content/uploads/2018/03/espinaca.jpg', 500, 5),
(36, 1, 'Coliflor', 'Coliflor Entera', '700.00', 'https://5aldia.cl/wp-content/uploads/2018/03/images.jpg', 120, 5),
(37, 1, 'Champiñón', 'Bolsas de Champiñon 250G', '1400.00', 'https://5aldia.cl/wp-content/uploads/2018/03/champi.jpg', 60, 5),
(38, 1, 'Brocoli', 'Brocoli Entero', '450.00', 'https://5aldia.cl/wp-content/uploads/2018/03/appetite-broccoli-brocoli-broccolli-calories-161486.jpg', 40, 5),
(39, 1, 'Ajo', 'Cabeza de Ajo ', '500.00', 'https://5aldia.cl/wp-content/uploads/2018/03/ajo.jpg', 40, 5),
(40, 3, 'Almendras', 'Almendras kilo', '9000.00', 'https://cdn.shopify.com/s/files/1/0297/9695/8339/products/almendras_semi_dano_360x.jpg?v=1580744222', 30, 6),
(42, 3, 'Pistachos', 'Pistachos kilo', '5000.00', 'https://cdn.shopify.com/s/files/1/0297/9695/8339/products/pistachos_con_cascara_c0264e00-987f-44b3-a295-638bbaa19055_360x.jpg?v=1580752570', 30, 6),
(43, 3, 'Maní', 'Maní Salado kilo', '4500.00', 'https://cdn.shopify.com/s/files/1/0297/9695/8339/products/mani_natural_d6e01d45-4983-49c8-b43a-559906b24719.jpg?v=1580747585', 30, 6),
(44, 3, 'Avellana', 'Avellana Europea kilo', '7500.00', 'https://cdn.shopify.com/s/files/1/0297/9695/8339/products/avellanas_europeas_tostadas.jpg?v=1580744659', 30, 6),
(45, 3, 'Nueces', 'Nueces kilo', '7500.00', 'https://cdn.shopify.com/s/files/1/0297/9695/8339/products/nuezencascara_360x.jpg?v=1620520902', 30, 6),
(46, 5, 'Calcetines', 'Juego de 5 Pares de Calcetines', '1500.00', 'https://static.kiabi.es/images/juego-de-5-pares-de-calcetines-de-monstruos-negro-chico-vo778_1_zc1.jpg', 50, 8),
(47, 5, 'Ropa Americana', 'Ropa Americana Variada', '1000.00', 'https://www.garsonshaw.com/wp-content/uploads/2021/12/ropa-credencial.jpg', 50, 8),
(48, 6, 'Arrachera', 'Arrachera Kilo', '6000.00', 'https://cdn.shopify.com/s/files/1/1830/1453/products/Arrachera250_01_1400x.jpg?v=1559608014', 25, 7),
(49, 6, 'Picaña', 'Bife de picaña 1KG', '7000.00', 'https://cdn.shopify.com/s/files/1/1830/1453/products/BifePicana_CF_01_1400x.jpg?v=1559608164', 15, 7),
(50, 6, 'Carne Molida', 'Carne Molida Especial para Hamburguesa', '3500.00', 'https://cdn.shopify.com/s/files/1/1830/1453/products/CarneMolida_Hamburguesas_02_1400x.jpg?v=1559613353', 15, 7),
(51, 6, 'Longaniza ', 'Longaniza Artesanal Kilo', '6700.00', 'https://cdn.shopify.com/s/files/1/1830/1453/products/chorizoartesanal2_1400x.jpg?v=1591767892', 30, 7),
(52, 6, 'Filete ', 'Filete Nacional Kilo', '12000.00', 'https://cdn.shopify.com/s/files/1/1830/1453/products/filetenacion_1400x.jpg?v=1626387026', 30, 7),
(53, 6, 'Asado de Tira ', 'Asado de Tira Kilo', '7600.00', 'https://cdn.shopify.com/s/files/1/1830/1453/products/AsadoTira_1K_02_1400x.jpg?v=1569375540', 30, 7),
(54, 6, 'Costillar', 'Kilo de Costillar de Cordero', '9800.00', 'https://cdn.shopify.com/s/files/1/1830/1453/products/LCVCOM_SHORT_RIBS_CORDERO_02_1_1400x.jpg?v=1617296215', 30, 7),
(55, 8, 'El Manual del adulto funcional', 'Libro el manual del adulto funcional de Maria Jose Castro', '6000.00', 'https://www.antartica.cl/media/catalog/product/9/7/9789564080710_1.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700', 5, 8),
(56, 8, 'Antes de Diciembre', 'Libro Antes de Diciembre de Joana Marcus', '6500.00', 'https://www.antartica.cl/media/catalog/product/9/7/9789566026877_1_9.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700', 5, 8),
(57, 8, 'Nosotros en la Luna', 'LibroNosotros en la Luna de Alice Kellen', '7990.00', 'https://www.antartica.cl/media/catalog/product/9/7/9789563608953_1.png?quality=80&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700&format=jpeg', 5, 8),
(58, 8, 'Todo Lo Que Nunca Fuimos\r\n', 'Libro Todo lo que nunca fuimos de Alice Kellen', '9990.00', 'https://www.antartica.cl/media/catalog/product/9/7/9789563608953_1.png?quality=80&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700&format=jpeg', 5, 8),
(59, 4, 'Alicates', 'Juego de Alicates', '18000.00', 'https://cdnx.jumpseller.com/shatiprana/image/17189125/resize/570/570?1629155199', 10, 9);

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
(3, '2020-08-26', 'FWEF3634', 1, 7),
(4, '2019-06-01', 'ZSDG8673', 2, 8),
(5, '2017-06-11', 'MGBD4634', 3, 9),
(6, '2018-12-21', 'JSDF3784', 4, 10),
(7, '2015-03-07', 'WRWW3469', 5, 11),
(8, '2017-05-11', 'KLSG6433', 6, 12),
(9, '2014-08-01', 'ZLVC2436', 7, 13);

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
(1, 'Arica Parinacota', 1),
(2, 'Antofagasta', 1),
(3, 'Atacama', 1),
(4, 'Coquimbo', 1),
(5, 'Valparaíso', 1),
(6, 'O\'higgings', 1),
(7, 'Maule', 1),
(8, 'Ñuble', 1),
(9, 'BíoBío', 1),
(10, 'Araucanía', 1),
(11, 'Los Ríos', 1),
(12, 'Los Lagos', 1),
(13, 'Aysen', 1),
(14, 'Magallanes', 1),
(15, 'Antartica ', 1),
(16, 'Metropolitana', 1);

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
(1, '19.275.219-1', 'Pepe', 'Apellido1', 'mail@example.com', '945688252', '202cb962ac59075b964b07152d234b70', 1, 5),
(2, '24.281.015-k', 'Laura', 'Laurapellido', 'correo@correo.algo', '912345678', '202cb962ac59075b964b07152d234b70', 2, 5),
(3, '12.123.123-1', 'Larry', 'Kapija', 'larry@kapija.com', '912344321', '202cb962ac59075b964b07152d234b70', 3, 1),
(4, '6.232.965.2', 'Elmer', 'Figueroa', 'chayanne@mail.com', '412939524', '202cb962ac59075b964b07152d234b70', 4, 3),
(5, '12.321.321-1', 'Simon', 'Dice', 'asda@gmail.com', '9010101013', '202cb962ac59075b964b07152d234b70', 5, 4),
(6, '123.321.666-6', 'Jesus', 'El pulento', 'jesusbellako@a.com', '1233210', '202cb962ac59075b964b07152d234b70', 6, 2),
(7, '13.235.523-4', 'Andres', 'Gutierrez', 'andgutierrez91@hotmail.com', '5696234645', '123', 1, 4),
(8, '11.235.624-2', 'Maria', 'Manriquez', 'MManriquez86@hotmail.com', '5698596326', '123', 2, 4),
(9, '15.235.653-4', 'Mariano', 'Andrade', 'marianoazul213@hotmail.com', '5694245683', '123', 3, 4),
(10, '9.756.863-1', 'Teresa', 'Hurtado', 'Thurtado83@hotmail.com', '5698376823', '123', 4, 4),
(11, '18.745.323-1', 'Andrea', 'Ramirez', 'AndreaR93@hotmail.com', '5697238634', '123', 5, 4),
(12, '15.562.754-k', 'Teresita', 'Perez', 'teresitabonita56@hotmail.com', '5697358623', '123', 6, 4),
(13, '16.723.166-3', 'Ramon', 'Valdés', 'Rondamon93@hotmail.com', '5698334762', '123', 7, 4),
(15, '13.684.793-k', 'Florinda', 'Mesa', 'doñaflorindajeje@hotmail.com', '5697458231', '123', 8, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `comuna_region` (`codigo_region`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cuenta_usuario` (`codigo_usuario`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `direccion_comuna` (`codigo_comuna`);

--
-- Indices de la tabla `lista_productos`
--
ALTER TABLE `lista_productos`
  ADD PRIMARY KEY (`codigo_producto`,`codigo_pedido`),
  ADD KEY `lista_pedido` (`codigo_pedido`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `pedido_repartidor` (`codigo_repartidor`),
  ADD KEY `pedido_puesto` (`codigo_puesto`),
  ADD KEY `pedido_usuario` (`codigo_usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `producto_categoria` (`codigo_tipo_categoria`),
  ADD KEY `producto_puesto` (`codigo_puesto`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `patente_puesto` (`patente_puesto`),
  ADD UNIQUE KEY `codigo_usuario` (`codigo_usuario`),
  ADD KEY `puesto_direccion` (`codigo_direccion`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `region_pais` (`codigo_pais`);

--
-- Indices de la tabla `repartidor`
--
ALTER TABLE `repartidor`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `repartidor_usuario` (`codigo_usuario`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `rut` (`rut`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD KEY `usuario_tipo_usuario` (`codigo_tipo_usuario`),
  ADD KEY `usuario_direccion` (`codigo_direccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `repartidor`
--
ALTER TABLE `repartidor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `comuna_region` FOREIGN KEY (`codigo_region`) REFERENCES `region` (`codigo`);

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_usuario` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_comuna` FOREIGN KEY (`codigo_comuna`) REFERENCES `comuna` (`codigo`);

--
-- Filtros para la tabla `lista_productos`
--
ALTER TABLE `lista_productos`
  ADD CONSTRAINT `lista_pedido` FOREIGN KEY (`codigo_pedido`) REFERENCES `pedido` (`codigo`),
  ADD CONSTRAINT `lista_producto` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_puesto` FOREIGN KEY (`codigo_puesto`) REFERENCES `puesto` (`codigo`),
  ADD CONSTRAINT `pedido_repartidor` FOREIGN KEY (`codigo_repartidor`) REFERENCES `repartidor` (`codigo`),
  ADD CONSTRAINT `pedido_usuario` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_categoria` FOREIGN KEY (`codigo_tipo_categoria`) REFERENCES `categoria` (`codigo`),
  ADD CONSTRAINT `producto_puesto` FOREIGN KEY (`codigo_puesto`) REFERENCES `puesto` (`codigo`);

--
-- Filtros para la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD CONSTRAINT `puesto_direccion` FOREIGN KEY (`codigo_direccion`) REFERENCES `direccion` (`codigo`),
  ADD CONSTRAINT `puesto_usuario` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo`);

--
-- Filtros para la tabla `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_pais` FOREIGN KEY (`codigo_pais`) REFERENCES `pais` (`codigo`);

--
-- Filtros para la tabla `repartidor`
--
ALTER TABLE `repartidor`
  ADD CONSTRAINT `repartidor_usuario` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_direccion` FOREIGN KEY (`codigo_direccion`) REFERENCES `direccion` (`codigo`),
  ADD CONSTRAINT `usuario_tipo_usuario` FOREIGN KEY (`codigo_tipo_usuario`) REFERENCES `tipo_usuario` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
