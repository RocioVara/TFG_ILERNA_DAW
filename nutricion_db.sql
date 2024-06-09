-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2024 a las 00:46:03
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
-- Base de datos: `nutricion_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `objetivo_id` int(11) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `tiene_lactosa` tinyint(1) DEFAULT 0,
  `tiene_gluten` tinyint(1) DEFAULT 0,
  `tipo_dieta` enum('sin_particularidades','vegetariana','vegana') DEFAULT 'sin_particularidades'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`id`, `nombre`, `descripcion`, `precio`, `marca`, `objetivo_id`, `categoria`, `tiene_lactosa`, `tiene_gluten`, `tipo_dieta`) VALUES
(1, 'Crema de cacahuete 100%', 'Crema de frutos secos', 2.95, 'Hacendado', 2, 'grasas', 0, 0, 'vegana'),
(2, 'Gelatina 0% azúcar sabor fresa', 'Gelatina sin azúcar', 1.00, 'Hacendado', 1, 'extras', 0, 0, 'vegana'),
(4, 'Natillas proteicas', 'Natillas sabor vainilla +Proteínas\r\n4ud. x 120g', 1.75, 'Hacendado', 2, 'proteinas', 1, 0, 'vegetariana'),
(5, 'Claras de huevo', 'Claras de huevo liquidas pasteurizadas botella 300ml', 1.55, 'Hacendado', 1, 'proteinas', 0, 0, 'vegetariana'),
(6, 'Yogur griego natural', 'Yogur griego natural Hacendado\r\n6ud. x 125 g', 1.60, 'Hacendado', 2, 'grasas', 1, 0, 'vegetariana'),
(7, 'Queso fresco', 'Queso fresco Burgos desnatado 0% m.g de vaca 6 tarrinas', 1.56, 'Hacendado', 1, 'proteinas', 1, 0, 'vegetariana'),
(8, 'Pan de fibra y sésamo', 'Pan de fibra y sésamo paquete 26 ud. (250 g)', 1.20, 'Hacendado', 1, 'carbohidratos', 0, 1, 'vegana'),
(10, 'Hummus', 'Hummus de garbanzos receta clásica Tarrina 240 g', 1.10, 'Hacendado', 2, 'grasas', 0, 0, 'vegana'),
(12, 'Cereal Mix', 'Cereales Mix 0% azúcares añadidos', 2.40, 'Hacendado', 1, 'carbohidratos', 0, 1, 'vegana'),
(13, 'Crema de arroz', 'Crema de arroz 0% azúcares añadidos 220 g', 2.95, 'Hero', 2, 'carbohidratos', 0, 0, 'vegana'),
(14, 'Porciones de Chocolate negro 85%', 'Chocolate negro 85% cacao extrafino paquete 200g ', 3.20, 'Hacendado', 2, 'grasas', 0, 0, 'vegana'),
(15, 'Queso Quark', 'Queso fresco batido Quark 500 mg', 0.95, 'Milbona', 1, 'proteinas', 1, 0, 'vegetariana'),
(16, 'Helado de proteína', 'Helado proteico sabor salted caramel 500ml', 2.69, 'Milbona', 2, 'extras', 1, 0, 'vegetariana'),
(17, 'Helado +Proteínas', 'Helado proteico sabor plátano con trozos de brownie 500 ml', 2.85, 'Hacendado', 2, 'extras', 1, 0, 'vegetariana'),
(18, 'Ketchup zero', 'Ketchup 0 azúcares añadidos 600 g', 1.00, 'Hacendado', 1, 'extras', 0, 0, 'vegana'),
(19, 'Copos de avena suaves', 'Copos de avena suaves 500 gr', 0.85, 'Crownfield', 2, 'carbohidratos', 0, 1, 'vegana'),
(20, 'Arroz basmati', 'Arroz basmati aromático 1 kg', 2.44, 'Hacendado', 1, 'carbohidratos', 0, 0, 'vegana'),
(21, 'Caldo de pollo casero', 'Caldo de pollo casero 1 l.', 1.00, 'Gallina Blanca', 1, 'proteinas', 0, 0, 'sin_particularidades'),
(22, 'Castañas cocidas', 'Castañas cocidas y peladas 100 g', 1.40, 'Hacendado', 1, 'carbohidratos', 0, 0, 'vegana'),
(23, 'Anacardo natural', 'Anacardo natural 200 gr.', 2.30, 'Hacendado', 1, 'grasas', 0, 0, 'vegana'),
(24, 'Maíz dulce', 'Maíz dulce 3 latas x 140 g', 1.60, 'Hacendado', 1, 'carbohidratos', 0, 0, 'vegana'),
(25, 'Tortitas de arroz', 'Tortitas de arroz 4 packs 124 g.', 1.15, 'Hacendado', 2, 'carbohidratos', 0, 0, 'vegana'),
(26, 'Maíz palomitas', 'Maíz para palomitas 250 g.', 0.82, 'Hacendado', 1, 'carbohidratos', 0, 0, 'vegana'),
(27, 'Confitura de fresa 0%', 'Confitura de fresa 0% azúcares añadidos 380 g', 1.60, 'Hacendado', 1, 'extras', 0, 0, 'vegana'),
(28, 'Atún claro al natural', 'Atún claro al natural 6 latas x 60 g', 4.35, 'Hacendado', 2, 'proteinas', 0, 0, 'sin_particularidades'),
(29, 'Salmón ahumado', 'Salmón ahumado paquete 100 g', 3.80, 'Hacendado', 2, 'proteinas', 0, 0, 'sin_particularidades'),
(30, 'Cacahuete en polvo desgrasado', 'Cacahuete +Proteínas en polvo desgrasado 200 g', 2.75, 'Hacendado', 1, 'proteinas', 0, 0, 'vegana'),
(31, 'Spray de aceite de oliva', 'Aceite de oliva virgen extra spray 200 ml', 3.30, 'Hacendado', 1, 'grasas', 0, 0, 'vegana'),
(32, 'Edamame soja verde', 'Edamame ultracongelada 5500 g', 1.67, 'Hacendado', 1, 'proteinas', 0, 0, 'vegana'),
(34, 'Batido de chocolate 0%', 'Batido de chocolate sin azúcares añadidos 6 mini bricks x 20 ml.', 1.85, 'Hacendado', 1, 'extras', 0, 0, 'sin_particularidades'),
(37, 'Tofu', 'Tofu firme Paquete 400 g', 1.90, 'Hacendado', 1, 'proteinas', 0, 0, 'vegana'),
(40, 'Seitán', 'Seitán Paquete 250 g', 3.10, 'Hacendado', 2, 'proteinas', 0, 1, 'vegetariana'),
(41, 'Mazorca de maíz', 'Maíz dulce en mazorca cocido Paquete 2 ud. (450 g)', 1.55, 'El Campo', 1, 'hidratos', 0, 0, 'vegetariana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

CREATE TABLE `objetivos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `objetivos`
--

INSERT INTO `objetivos` (`id`, `nombre`) VALUES
(1, 'Pérdida de grasa'),
(2, 'Aumento de masa muscular');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `objetivo_id` (`objetivo_id`);

--
-- Indices de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD CONSTRAINT `alimentos_ibfk_1` FOREIGN KEY (`objetivo_id`) REFERENCES `objetivos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
