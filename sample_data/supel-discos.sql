-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2024 a las 09:25:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `supel-discos`
--

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id`, `nombre`, `pais`, `ano`, `descripcion`) VALUES
(1, 'American Football', 'EEUU', '1997', 'American Football es una banda estadounidense de rock proveniente de Urbana, Illinois, activa desde 1997 hasta el año 2000, y del 2014 a la actualidad. La banda está compuesta por el guitarrista y cantante Mike Kinsella, el guitarrista Steve Holmes, el baterista y trompetista Steve Lamos, y el bajista Nate Kinsella.'),
(2, 'Cap\'n Jazz', 'EEUU', '1989', NULL),
(6, 'My Chemical Romance', 'EEUU', '2001', NULL),
(11, 'Owen', 'EEUU', '1977', NULL),
(14, 'Twenty One Pilots', 'EEUU', '2009', NULL),
(18, 'All Time Low', 'EEUU', '2003', NULL),
(19, 'Deafheaven', 'EEUU', '2010', NULL),
(20, 'Sunny Day Real Estate', 'EEUU', '1992', NULL),
(21, 'Slint', 'EEUU', '1986', NULL),
(22, 'The Dillinger Escape Plan', 'EEUU', '1997', NULL),
(23, 'The Story So Far', 'EEUU', '2007', NULL),
(24, 'Tiny Moving Parts', 'EEUU', '2008', NULL),
(25, 'DRAIN', 'EEUU', '2014', NULL),
(26, 'Midwest Pen Pals', 'EEUU', '2009', NULL),
(27, 'Carnifex', 'EEUU', '2005', NULL),
(28, 'Agalloch', 'EEUU', '1995', NULL),
(29, 'A Day To Remember', 'EEUU', '2003', NULL),
(30, '009 Sound System', 'EEUU', '1976', NULL),
(31, 'Alesana', 'EEUU', '2004', NULL),
(32, 'Alio Die & Mathias Grassow', 'Itaia y Alemania', '2002', NULL),
(33, 'Andrew Prahlow', 'EEUU', NULL, NULL),
(34, 'Bring Me The Horizon', 'Reino Unido', '2003', NULL),
(35, 'C418', 'Alemania', '1989', NULL),
(36, 'Corea', 'España', '2003', NULL),
(37, '8Control', 'Francia', '1997', NULL),
(38, '12 Summers Old', 'EEUU', '2002', NULL),
(39, 'A Static Lullaby', 'EEUU', '2001', NULL),
(40, 'Acceptance', 'EEUU', '1998', NULL),
(41, 'Antier', 'España', '2014', NULL),
(42, 'BANANAS', 'España', '2018', NULL);

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240209145008', '2024-05-31 18:29:09', 65),
('DoctrineMigrations\\Version20240209145333', '2024-05-31 18:29:09', 45),
('DoctrineMigrations\\Version20240209152409', '2024-05-31 18:29:09', 206),
('DoctrineMigrations\\Version20240301154350', '2024-05-31 18:29:09', 5),
('DoctrineMigrations\\Version20240303224120', '2024-05-31 18:29:09', 5),
('DoctrineMigrations\\Version20240303224819', '2024-05-31 18:29:09', 5),
('DoctrineMigrations\\Version20240303231845', '2024-05-31 18:29:09', 63),
('DoctrineMigrations\\Version20240303232737', '2024-05-31 18:29:09', 55),
('DoctrineMigrations\\Version20240310164924', '2024-05-31 18:29:09', 105),
('DoctrineMigrations\\Version20240310181403', '2024-05-31 18:29:09', 56),
('DoctrineMigrations\\Version20240310225838', '2024-05-31 18:29:09', 9),
('DoctrineMigrations\\Version20240311011942', '2024-05-31 18:29:09', 28),
('DoctrineMigrations\\Version20240611214956', '2024-06-11 23:50:10', 71);

--
-- Volcado de datos para la tabla `formato`
--

INSERT INTO `formato` (`id`, `tipo`, `cantidad_formato`, `info_adicional`) VALUES
(1, 'Vinilo', '1xLP', NULL),
(2, 'Doble Vinilo', '2xLP', NULL),
(3, 'Digipak', '1xCD', NULL),
(4, 'Slipcase', '1xCD', NULL),
(5, 'Jewel Case', '1xCD', NULL),
(6, 'Cassete', '1xCassete', NULL),
(7, 'Doble CD', '2xCD', NULL),
(8, 'EP Vinilo', '1x10\"', NULL),
(9, 'Single Vinilo', '1x7\"', NULL);

--
-- Volcado de datos para la tabla `linea_pedido`
--

INSERT INTO `linea_pedido` (`id`, `cantidad`, `producto_id`, `pedido_id`) VALUES
(2, 1, 8, 3),
(3, 1, 7, 3),
(4, 1, 8, 6),
(5, 1, 3, 7),
(6, 1, 12, 7),
(7, 1, 9, 8),
(8, 1, 3, 8);

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `fecha`, `usuario_id`) VALUES
(3, NULL, 1),
(4, NULL, 1),
(5, NULL, 1),
(6, NULL, 1),
(7, NULL, 8),
(8, NULL, 1);

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `ano_salida`, `precio`, `pais`, `artista_id`, `formato_id`, `imagen`) VALUES
(1, 'Calculating Infinity', '1999', 15.00, 'EEUU', 22, 5, NULL),
(3, 'Nothing Personal (Deluxe Version)', '2009', 10.00, 'Europa', 18, 5, NULL),
(4, 'I Do Perceive', '2004', 20.00, 'EEUU', 11, 1, NULL),
(5, 'American Football (LP1) Deluxe Version', '2014', 50.00, 'EEUU', 1, 2, NULL),
(6, 'Dirty Work', '2011', 10.99, 'Asia', 18, 5, NULL),
(7, 'Analphabetapolothology', '1998', 22.68, 'EEUU', 2, 7, NULL),
(8, 'Clancy', '2024', 30.99, 'Europa', 14, 1, NULL),
(9, 'Tiny Moving Parts', '2022', 13.52, 'EEUU', 24, 4, NULL),
(10, 'Diary', '1994', 15.97, 'Europa', 20, 4, NULL),
(11, 'The Attic Demos Dreams Of Stabbing And-Or Being Stabbed', '2001', 35.99, 'EEUU', 6, 8, NULL),
(12, 'The Falls of Sioux', '2024', 26.99, 'EEUU', 11, 3, NULL),
(13, 'Under Soil And Dirt', '2011', 14.69, 'Europa', 23, 6, NULL),
(14, 'How It Feels To Be Something On', '1998', 21.87, 'EEUU', 20, 1, NULL),
(15, 'The Story So Far', '2015', 16.88, 'Europa', 23, 4, NULL),
(16, 'Ashes Against The Grain', '2006', 45.98, 'Europa', 28, 2, NULL),
(17, 'The Mantle', '2002', 15.36, 'EEUU', 28, 3, NULL),
(18, 'At Home With Owen', '2006', 14.00, 'Asia', 11, 1, NULL),
(19, 'PMA (feat. Pale Waves)', '2021', 18.99, 'Europa', 18, 9, NULL),
(20, 'Straight To DVD', '2010', 9.68, 'Europa', 18, 7, NULL),
(21, 'American Football (LP2)', '2016', 35.99, 'EEUU', 1, 6, NULL),
(22, 'American Football (LP3)', '2019', 54.68, 'EEUU', 1, 2, NULL),
(23, 'EP', '1998', 30.25, 'EEUU', 1, 8, NULL),
(24, 'Catharsis', '2008', 7.99, 'EEUU', 37, 4, NULL),
(25, '009 Sound System', '2009', 48.78, 'EEUU', 30, 2, NULL),
(26, 'Hair Spray And Hand Grenades', '2006', 5.66, 'EEUU', 38, 5, NULL),
(27, 'A Day To Remember EP', '2005', 4.55, 'EEUU', 29, 6, NULL),
(28, 'And Their Name Was Treason', '2005', 15.87, 'EEUU', 29, 3, NULL),
(29, 'Halos For Heroes, Dirt For The Dead', '2004', 32.45, 'EEUU', 29, 6, NULL),
(30, 'A Static Lullaby', '2001', 32.68, 'EEUU', 39, 5, NULL);

--
-- Volcado de datos para la tabla `usuario` LAS CONTRASEÑAS SON 123456789
--

INSERT INTO `usuario` (`id`, `email`, `roles`, `password`, `nombre`, `apellidos`, `id_direccion_id`) VALUES
(1, 'simon@me.com', '[\"ROLE_ADMIN\"]', '$2y$13$enczmZ1BoGXY9.v4cxHf5.mYtfd.eohIL/Fu0I4vzF9tNUtCq/Xnq', 'Simon', 'Fernández Reyes', NULL),
(8, 'daw@prueba.com', '[\"ROLE_USER\"]', '$2y$13$pCzWiK2i6ZxUibsyBCqC.uwY7vB8.dvOvXJfEQC3um6YeATLE0ZKm', 'simon', 'fernandez', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
