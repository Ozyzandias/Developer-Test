-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2022 a las 11:17:02
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
-- Base de datos: `devtest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `ID_Image` int(11) NOT NULL,
  `tst_name` varchar(900) NOT NULL,
  `tst_Description` text NOT NULL,
  `tst_Title` varchar(800) NOT NULL,
  `tst_Counter` int(11) NOT NULL,
  `tst_author` varchar(800) DEFAULT NULL,
  `tst_Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`ID_Image`, `tst_name`, `tst_Description`, `tst_Title`, `tst_Counter`, `tst_author`, `tst_Status`) VALUES
(1, 'storage/kv00OaG84X/kv00OaG84X.jpg', 'Image test about a logo', 'Logo about something', 0, 'tazkelchef@gmail.com', 1),
(2, 'storage/sFkW693ySy/sFkW693ySy.jpg', 'Test1', 'Second test', 0, 'tazkelchef@gmail.com', 1),
(3, 'storage/q5U2Ea2nTZ/q5U2Ea2nTZ.jpg', 'OMG this is a truck', 'Another Test', 0, 'tazkelchef@gmail.com', 1),
(4, 'storage/Pn09fuKUq3/Pn09fuKUq3.png', 'This is a logo for another test', 'Logo second', 0, 'tazkelchef@gmail.com', 1),
(5, 'storage/2MKGfRu4F2/2MKGfRu4F2.jpg', 'Image omg boxes', 'Another Title', 0, 'tazkelchef@gmail.com', 1),
(6, 'storage/F2sxnk4320/F2sxnk4320.jpg', 'Pls i wanna end', 'Another One', 0, 'tazkelchef@gmail.com', 1),
(7, 'storage/KBU02r987s/KBU02r987s.jpg', 'World Cup November', 'World Cup', 0, 'tazkelchef@gmail.com', 1),
(8, 'storage/39mTfhchPI/39mTfhchPI.jpg', 'Last test', 'LAst one', 0, 'tazkelchef@gmail.com', 1),
(9, 'storage/f2AmTA0uJ7/f2AmTA0uJ7.jpg', 'Descripcion jeje', 'Titulo Validar', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ts_fav`
--

CREATE TABLE `ts_fav` (
  `ID_Fav` int(11) NOT NULL,
  `ID_Image` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ts_fav`
--

INSERT INTO `ts_fav` (`ID_Fav`, `ID_Image`, `ID_User`) VALUES
(5, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ts_users`
--

CREATE TABLE `ts_users` (
  `ID_User` int(11) NOT NULL,
  `tst_email` varchar(800) NOT NULL,
  `tst_pwd` varchar(900) NOT NULL,
  `tst_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ts_users`
--

INSERT INTO `ts_users` (`ID_User`, `tst_email`, `tst_pwd`, `tst_role`) VALUES
(1, 'isaaccallejasv@gmail.com', '$2y$10$W/MJ7DGCVIVs7cNe4IsyVeo5C4ZmjHwEN9cf9lg7ljE1jXjsQphBO', 1),
(2, 'isinightwing@gmail.com', '$2y$10$HtSuMoRyIk2Gb30CduJG2OSrPxvGSpgW5fJi2PEPF2n.Yh3L9cgZO', 2),
(3, 'tazkelchef@gmail.com', '$2y$10$zWKdvZivEh9yTHuEGzeZ3.o.brmdxODkZOnz1bwhiLR4Sy1E8BF02', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID_Image`);

--
-- Indices de la tabla `ts_fav`
--
ALTER TABLE `ts_fav`
  ADD PRIMARY KEY (`ID_Fav`);

--
-- Indices de la tabla `ts_users`
--
ALTER TABLE `ts_users`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `ID_Image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ts_fav`
--
ALTER TABLE `ts_fav`
  MODIFY `ID_Fav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ts_users`
--
ALTER TABLE `ts_users`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
