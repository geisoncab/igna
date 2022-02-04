-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2022 a las 23:34:52
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdigna`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asignacion_comisiones`
--

CREATE TABLE `tb_asignacion_comisiones` (
  `idasignacioncomisiones` int(11) NOT NULL,
  `idmiembro` int(11) NOT NULL,
  `idcomisiones` int(11) NOT NULL,
  `idcargoscomisiones` int(11) NOT NULL,
  `feca_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asignacion_ministerios`
--

CREATE TABLE `tb_asignacion_ministerios` (
  `idasignacionministerios` int(11) NOT NULL,
  `idmiembro` int(11) NOT NULL,
  `idministerios` int(11) NOT NULL,
  `idcargosministeriales` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asignacion_misiones`
--

CREATE TABLE `tb_asignacion_misiones` (
  `idasignacionmisiones` int(11) NOT NULL,
  `idmiembro` int(11) NOT NULL,
  `idmisiones` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_barrio_caserio_finca_aldea`
--

CREATE TABLE `tb_barrio_caserio_finca_aldea` (
  `idbcfa` int(11) NOT NULL,
  `idmunicipios` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_barrio_caserio_finca_aldea`
--

INSERT INTO `tb_barrio_caserio_finca_aldea` (`idbcfa`, `idmunicipios`, `nombre`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 10, 'ALDEA CACTZIMAAJ', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(2, 10, 'ALDEA CAMPAT', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(3, 10, 'FINCA CANASEC', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(4, 10, 'ALDEA CANDELARIA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(5, 10, 'ALDEA CAQIXIMCHE', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(6, 10, 'ALDEA CAQLAHIB', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(7, 10, 'ALDEA CAQUIPEC', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(8, 10, 'ALDEA CATOMIQUE', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(9, 10, 'CASERÍO CHAJBUL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(10, 10, 'ALDEA CHAJCOAL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(11, 10, 'ALDEA CHAMIL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(12, 10, 'ALDEA CHAMISUN', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(13, 10, 'CASERÍO CHEXENA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(14, 10, 'ALDEA CHICACNAB', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(15, 10, 'BARRIO CHICHUN', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(16, 10, 'ALDEA CHICUJAL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(17, 10, 'ALDEA CHICUNK', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(18, 10, 'ALDEA CHILAXITO', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(19, 10, 'ALDEA CHIMOX', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(20, 10, 'BARRIO CHIMUC', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(21, 10, 'ALDEA CHIÓ', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(22, 10, 'ALDEA CHIOYA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(23, 10, 'ALDEA CHIQUIC', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(24, 10, 'ALDEA CHIRREOCOB', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(25, 10, 'ALDEA CHISANIC', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(26, 10, 'ALDEA CHITEPEY I', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(27, 10, 'ALDEA CHITEPEY II', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(28, 10, 'ALDEA CHITIXL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(29, 10, 'BARRIO CHITUBTU', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(30, 10, 'ALDEA COJILÁ', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(31, 10, 'BARRIO CONCEPCIÓN', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(32, 10, 'CASERÍO CONCEPCIÓN CHAMIL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(33, 10, 'BARRIO EL CALVARIO', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(34, 10, 'ALDEA GRANADILLA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(35, 10, 'BARRIO LA ESPERANZA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(36, 10, 'CASERÍO LA LIBERTAD', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(37, 10, 'ALDEA LAMA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(38, 10, 'CASERÍO MAGDALENA CHAMISUN', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(39, 10, 'ALDEA MAMACHAJ', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(40, 10, 'BARRIO NUEVA CONCEPCIÓN', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(41, 10, 'CASERÍO NUEVO CHICACNAB', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(42, 10, 'ALDEA PAAPA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(43, 10, 'ALDEA POPOBAJ', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(44, 10, 'ALDEA PURHÁ', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(45, 10, 'ALDEA QEQXIBAL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(46, 10, 'CASERÍO RAXONIL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(47, 10, 'BARRIO RESURRECCIÓN', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(48, 10, 'ALDEA ROIMAX', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(49, 10, 'CASERÍO SACAJUT', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(50, 10, 'ALDEA SACAMPANA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(51, 10, 'CASERÍO SACHALIB', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(52, 10, 'ALDEA SACQUIL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(53, 10, 'ALDEA SACTZICNIL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(54, 10, 'BARRIO SAN AGUSTÍN', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(55, 10, 'ALDEA SAN BARTOLOMÉ SECAJ', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(56, 10, 'CASERÍO SAN JOSÉ CHIRRECORRAL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(57, 10, 'BARRIO SAN JUAN', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(58, 10, 'BARRIO SAN LUIS', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(59, 10, 'ALDEA SAN LUIS POPOBAJ', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(60, 10, 'ALDEA SAN MARCOS', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(61, 10, 'ALDEA SAN MARCOS CHAMIL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(62, 10, 'ALDEA SAN MIGUEL CHAMIL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(63, 10, 'BARRIO SANTA ANA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(64, 10, 'BARRIO SANTA ANA ORIENTAL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(65, 10, 'BARRIO SANTA CATALINA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(66, 10, 'ALDEA SANTA CATALINA CHAJANEB', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(67, 10, 'ALDEA SANTA CECILIA CHAJANEB', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(68, 10, 'BARRIO SANTA ELENA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(69, 10, 'ALDEA SANTA ELENA MAMACHAJ', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(70, 10, 'BARRIO SANTO DOMINGO', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(71, 10, 'ALDEA SANTO DOMINGO SECAJ', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(72, 10, 'ALDEA SANTO DOMINGO SESOCH', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(73, 10, 'ALDEA SANTO DOMINGO SESUJQUIM', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(74, 10, 'ALDEA SANTO TOMAS CHAJANEB', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(75, 10, 'ALDEA SANTO TOMAS SEAPAC', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(76, 10, 'ALDEA SAQUIB', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(77, 10, 'ALDEA SAQUIJÁ', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(78, 10, 'ALDEA SATEXA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(79, 10, 'ALDEA SATOLOX', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(80, 10, 'ALDEA SEBAX', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(81, 10, 'ALDEA SEBOB', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(82, 10, 'ALDEA SEBULBUX', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(83, 10, 'CASERÍO SEHAQUIBÁ', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(84, 10, 'ALDEA SEOGÜIS', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(85, 10, 'ALDEA SEQUIB', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(86, 10, 'ALDEA SESALCHE', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(87, 10, 'COL. MPAL. SESIBCHE', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(88, 10, 'CASERÍO SESIBCHE NUEVO HORIZONTE', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(89, 10, 'ALDEA SESUJQUIM', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(90, 10, 'ALDEA SOTZIL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(91, 10, 'ALDEA XALIJA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(92, 10, 'ALDEA XALITZUL', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05'),
(93, 10, 'ALDEA XOTILA', 1, NULL, '2021-10-28 06:51:05', NULL, '2021-10-28 06:51:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cargos_comisiones`
--

CREATE TABLE `tb_cargos_comisiones` (
  `idcargoscomisiones` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_cargos_comisiones`
--

INSERT INTO `tb_cargos_comisiones` (`idcargoscomisiones`, `nombre`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 'COORDINADOR 1', 1, 'admin', '2022-01-29 00:48:01', 'admin', '2022-01-29 00:48:01'),
(2, 'COORDINADOR 2', 1, 'admin', '2022-01-29 00:48:09', 'admin', '2022-01-29 00:48:09'),
(3, 'COORDINADOR 3', 1, 'admin', '2022-01-29 00:48:17', 'admin', '2022-01-29 00:48:17'),
(4, 'ASISTENCIA', 1, 'admin', '2022-01-29 00:48:25', 'admin', '2022-01-29 00:50:51'),
(5, 'SECRETARIO (A)', 1, 'admin', '2022-01-29 00:48:43', 'admin', '2022-01-29 00:48:43'),
(6, 'VOCAL', 1, 'admin', '2022-01-29 00:48:52', 'admin', '2022-01-29 00:48:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cargos_ministeriales`
--

CREATE TABLE `tb_cargos_ministeriales` (
  `idcargosministeriales` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_cargos_ministeriales`
--

INSERT INTO `tb_cargos_ministeriales` (`idcargosministeriales`, `nombre`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 'PRESIDENTE (A)', 1, 'admin', '2021-11-07 11:59:07', 'admin', '2021-11-07 11:59:22'),
(2, 'VICEPRESIDENTE (A)', 1, 'admin', '2021-11-07 11:59:37', 'admin', '2021-11-07 11:59:37'),
(3, 'SECRETARIO (A)', 1, 'admin', '2021-11-07 11:59:54', 'admin', '2021-11-07 11:59:54'),
(4, 'PROSECRETARIO (A)', 1, 'admin', '2021-11-07 12:00:27', 'admin', '2021-11-07 12:00:27'),
(5, 'TESORERO (A)', 1, 'admin', '2021-11-07 12:01:03', 'admin', '2021-11-07 12:01:03'),
(6, 'PROTESORERO (A)', 1, 'admin', '2021-11-07 12:01:11', 'admin', '2021-11-07 12:01:11'),
(7, 'VOCAL I', 1, 'admin', '2021-11-07 12:02:06', 'admin', '2021-11-07 12:02:06'),
(8, 'VOCAL II', 1, 'admin', '2021-11-07 12:02:12', 'admin', '2021-11-07 12:02:12'),
(9, 'VOCAL IIII', 1, 'admin', '2021-11-07 12:02:19', 'admin', '2021-11-07 12:02:19'),
(10, 'VOCAL IV', 1, 'admin', '2021-11-07 12:02:25', 'admin', '2021-11-07 12:02:25'),
(11, 'VOCAL V', 1, 'admin', '2021-11-07 12:02:31', 'admin', '2021-11-07 12:02:31'),
(12, 'VOCAL VI', 1, 'admin', '2021-11-07 12:02:41', 'admin', '2021-11-07 12:02:41'),
(13, 'VOCAL VII', 1, 'admin', '2021-11-07 12:02:52', 'admin', '2021-11-07 12:02:52'),
(14, 'MAYORDOMO 01', 1, 'admin', '2021-11-07 12:03:40', 'admin', '2022-01-06 12:57:55'),
(15, 'MAYORDOMO 02', 1, 'admin', '2021-11-07 12:03:45', 'admin', '2022-01-06 12:58:04'),
(16, 'MAYORDOMO 03', 1, 'admin', '2021-11-07 12:03:50', 'admin', '2022-01-06 12:58:13'),
(17, 'MAYORDOMO 04', 1, 'admin', '2021-11-07 12:04:06', 'admin', '2022-01-06 12:58:20'),
(18, 'MAYORDOMO 05', 1, 'admin', '2021-11-07 12:04:13', 'admin', '2022-01-06 12:58:26'),
(19, 'MAYORDOMO 06', 1, 'admin', '2021-11-07 12:04:19', 'admin', '2022-01-06 12:58:35'),
(20, 'MAYORDOMO 07', 1, 'admin', '2021-11-07 12:04:23', 'admin', '2022-01-06 12:58:43'),
(21, 'MAYORDOMO 08', 1, 'admin', '2021-11-07 12:04:28', 'admin', '2022-01-06 12:58:49'),
(22, 'MAYORDOMO 09', 1, 'admin', '2021-11-07 12:04:33', 'admin', '2022-01-06 12:58:57'),
(23, 'MAYORDOMO 10', 1, 'admin', '2021-11-07 12:04:40', 'admin', '2021-11-07 12:04:40'),
(24, 'MAYORDOMO 11', 1, 'admin', '2021-11-07 12:04:57', 'admin', '2021-11-07 12:04:57'),
(25, 'MAYORDOMO 12', 1, 'admin', '2021-11-07 12:11:19', 'admin', '2021-11-07 12:11:19'),
(26, 'MAYORDOMO 13', 1, 'admin', '2021-11-07 12:11:42', 'admin', '2021-11-07 12:11:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comisiones`
--

CREATE TABLE `tb_comisiones` (
  `idcomisiones` int(11) NOT NULL,
  `idministerios` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_comisiones`
--

INSERT INTO `tb_comisiones` (`idcomisiones`, `idministerios`, `nombre`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(2, 1, 'FINANZAS', 1, 'admin', '2021-11-07 14:26:46', 'admin', '2021-11-07 14:29:00'),
(3, 1, 'MEJORAS Y MANTENIMIENTO', 1, 'admin', '2021-11-07 14:30:50', 'admin', '2021-11-07 14:30:50'),
(4, 1, 'ECONOMOS', 1, 'admin', '2021-11-07 14:31:00', 'admin', '2021-11-07 14:31:00'),
(5, 1, 'SONIDO', 1, 'admin', '2021-11-07 14:32:23', 'admin', '2021-11-07 14:32:23'),
(6, 1, 'PROYECCION', 1, 'admin', '2021-11-07 14:32:31', 'admin', '2021-11-07 14:32:31'),
(7, 1, 'PRIMEROS AUXILIOS', 1, 'admin', '2021-11-07 14:32:41', 'admin', '2021-11-07 14:32:41'),
(8, 1, 'PROGRAMACION', 1, 'admin', '2021-11-07 14:32:50', 'admin', '2021-11-07 14:32:50'),
(9, 1, 'MEMBRESIA', 1, 'admin', '2021-11-07 14:33:07', 'admin', '2021-11-07 14:33:07'),
(10, 1, 'EDUCACION', 1, 'admin', '2021-11-07 14:33:15', 'admin', '2021-11-07 14:33:15'),
(11, 1, 'CENTRO ESTUDIANTIL', 1, 'admin', '2021-11-07 14:33:24', 'admin', '2021-11-07 14:33:24'),
(12, 1, 'COMPASION', 1, 'admin', '2021-11-07 14:33:44', 'admin', '2021-11-07 14:33:44'),
(13, 1, 'MINISTERIO DE ALABANZA', 1, 'admin', '2021-11-07 14:33:52', 'admin', '2021-11-07 14:33:52'),
(14, 1, 'PLANIFICACION DE MAYORDOMIA', 1, 'admin', '2021-11-07 14:34:00', 'admin', '2021-11-07 14:34:00'),
(15, 2, 'MAXIMA MISION', 1, 'admin', '2021-11-07 14:34:35', 'admin', '2021-11-07 14:34:35'),
(16, 2, 'AMISTAD JUVENIL', 1, 'admin', '2021-11-07 14:35:37', 'admin', '2021-11-07 14:35:37'),
(17, 2, 'ESGRIMA BIBLICO', 1, 'admin', '2021-11-07 14:35:49', 'admin', '2021-11-07 14:35:49'),
(18, 2, 'ICTHUS', 1, 'admin', '2021-11-07 14:35:56', 'admin', '2021-11-07 14:35:56'),
(19, 2, 'MEMBRESIA', 1, 'admin', '2021-11-07 14:36:08', 'admin', '2021-11-07 14:36:08'),
(20, 2, 'DISCIPULADO Y FORMACION DE LIDERES', 1, 'admin', '2021-11-07 14:36:31', 'admin', '2021-11-07 14:36:31'),
(21, 2, 'MINISTERIO DE COMUNICACIONES', 1, 'admin', '2021-11-07 14:36:41', 'admin', '2021-11-07 14:36:41'),
(22, 2, 'MINISTERIO DE SERVIDORES', 1, 'admin', '2021-11-07 14:36:48', 'admin', '2021-11-07 14:36:48'),
(23, 2, 'MINISTERIO DEPORTIVO', 1, 'admin', '2021-11-07 14:36:57', 'admin', '2021-11-07 14:36:57'),
(24, 2, 'MINISTERIO DE GASTRONOMIA', 1, 'admin', '2021-11-07 14:37:06', 'admin', '2021-11-07 14:37:06'),
(25, 2, 'MISIONES GLOBALES', 1, 'admin', '2021-11-07 14:37:16', 'admin', '2021-11-07 14:37:16'),
(26, 2, 'MINISTERIO EN EL NOMBRE DE JESUS', 1, 'admin', '2021-11-07 14:37:25', 'admin', '2021-11-07 14:37:25'),
(27, 2, 'EL MOVIMIENTO DE JUSTICIA', 1, 'admin', '2021-11-07 14:37:47', 'admin', '2021-11-07 14:37:47'),
(28, 2, 'MINISTERIO DE ALABANZA', 1, 'admin', '2021-11-07 14:37:56', 'admin', '2021-11-07 14:37:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_departamentos`
--

CREATE TABLE `tb_departamentos` (
  `iddepartamentos` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_departamentos`
--

INSERT INTO `tb_departamentos` (`iddepartamentos`, `nombre`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 'ALTA VERAPAZ', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(2, 'BAJA VERAPAZ', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(3, 'CHIMALTENANGO', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(4, 'CHIQUIMULA', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(5, 'PETEN', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(6, 'EL PROGRESO', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(7, 'QUICHE', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(8, 'ESCUINTLA', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(9, 'GUATEMALA', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(10, 'HUEHUETENANGO', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(11, 'IZABAL', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(12, 'JALAPA', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(13, 'JUTIAPA', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(14, 'QUETZALTENANGO', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(15, 'RETALHULEU', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(16, 'SACATEPEQUEZ', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(17, 'SAN MARCOS', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(18, 'SANTA ROSA', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(19, 'SOLOLA', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(20, 'SUCHITEPEQUEZ', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(21, 'TOTONICAPAN', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23'),
(22, 'ZACAPA', 1, NULL, '2021-10-28 06:49:23', NULL, '2021-10-28 06:49:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estadocivil`
--

CREATE TABLE `tb_estadocivil` (
  `idestadocivil` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_estadocivil`
--

INSERT INTO `tb_estadocivil` (`idestadocivil`, `nombre`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 'SOLTERO (A)', 1, NULL, '2021-10-28 06:44:56', NULL, '2021-10-28 06:44:56'),
(2, 'CASADO (A): CIVIL', 1, NULL, '2021-10-28 06:44:56', NULL, '2021-10-28 06:44:56'),
(3, 'CASADO (A): CIVIL & IGLESIA', 1, NULL, '2021-10-28 06:44:56', NULL, '2021-10-28 06:44:56'),
(4, 'UNION DE HECHO', 1, NULL, '2021-10-28 06:44:56', NULL, '2021-10-28 06:44:56'),
(5, 'VIUDO', 1, NULL, '2021-10-28 06:44:56', NULL, '2021-10-28 06:44:56'),
(6, 'MADRE SOLTERA', 1, NULL, '2021-10-28 06:44:56', NULL, '2021-10-28 06:44:56'),
(7, 'PADRE SOLTERO', 1, NULL, '2021-10-28 06:44:56', NULL, '2021-10-28 06:44:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_idiomas`
--

CREATE TABLE `tb_idiomas` (
  `ididiomas` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_idiomas`
--

INSERT INTO `tb_idiomas` (`ididiomas`, `nombre`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 'ESPAÑOL', 1, NULL, '2021-10-28 06:46:23', NULL, '2021-10-28 06:46:23'),
(2, 'QEQCHI', 1, NULL, '2021-10-28 06:46:23', NULL, '2021-10-28 06:46:23'),
(3, 'KAKQCHIQUEL', 1, NULL, '2021-10-28 06:46:23', NULL, '2021-10-28 06:46:23'),
(4, 'OTRO', 1, NULL, '2021-10-28 06:46:23', NULL, '2021-10-28 06:46:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informacion_bautizo`
--

CREATE TABLE `tb_informacion_bautizo` (
  `idiglesiabautizo` int(11) NOT NULL,
  `idmiembro` int(11) NOT NULL,
  `iglesia_bautizo` varchar(200) NOT NULL,
  `fecha_bautizo` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informacion_conyugal`
--

CREATE TABLE `tb_informacion_conyugal` (
  `idinformacionconyugal` int(11) NOT NULL,
  `idmiembro` int(11) NOT NULL,
  `idmiembro_conyuge` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_informacion_conyugal`
--

INSERT INTO `tb_informacion_conyugal` (`idinformacionconyugal`, `idmiembro`, `idmiembro_conyuge`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 1, 7, 1, 'admin', '2022-02-03 13:49:40', 'admin', '2022-02-03 13:49:40'),
(2, 11, 9, 1, 'admin', '2022-02-03 14:19:38', 'admin', '2022-02-03 14:19:38'),
(3, 13, 14, 1, 'admin', '2022-02-03 15:32:21', 'admin', '2022-02-03 15:32:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informacion_eclesial`
--

CREATE TABLE `tb_informacion_eclesial` (
  `idinformacioneclesial` int(11) NOT NULL,
  `idmiembro` int(11) NOT NULL,
  `es_dedicado` varchar(20) NOT NULL,
  `asiste_regularmente` varchar(20) NOT NULL,
  `acepto_cristo` varchar(20) NOT NULL,
  `es_bautizado` varchar(20) NOT NULL,
  `fecha_bautizo` date DEFAULT NULL,
  `iglesia_bautizo` varchar(255) DEFAULT NULL,
  `miembro_esta_iglesia` varchar(20) NOT NULL,
  `miembro_otra_iglesia` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_informacion_eclesial`
--

INSERT INTO `tb_informacion_eclesial` (`idinformacioneclesial`, `idmiembro`, `es_dedicado`, `asiste_regularmente`, `acepto_cristo`, `es_bautizado`, `fecha_bautizo`, `iglesia_bautizo`, `miembro_esta_iglesia`, `miembro_otra_iglesia`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(4, 16, 'SI', 'SI', 'SI', 'SI', '2022-02-03', 'HOY', 'SI', 'SI', 1, 'admin', '2022-02-03 16:57:33', 'admin', '2022-02-03 16:57:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informacion_familiar`
--

CREATE TABLE `tb_informacion_familiar` (
  `idinformacionfamiliar` int(11) NOT NULL,
  `idmiembro` int(11) NOT NULL,
  `idmiembro_papa` int(11) NOT NULL,
  `idmiembro_mama` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_informacion_familiar`
--

INSERT INTO `tb_informacion_familiar` (`idinformacionfamiliar`, `idmiembro`, `idmiembro_papa`, `idmiembro_mama`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 16, 14, 13, 1, 'admin', '2022-02-03 15:37:22', 'admin', '2022-02-03 15:37:22'),
(2, 17, 14, 13, 1, 'admin', '2022-02-03 15:38:51', 'admin', '2022-02-03 15:38:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informacion_visitas_pastorales`
--

CREATE TABLE `tb_informacion_visitas_pastorales` (
  `idvisitaspastorales` int(11) NOT NULL,
  `idmiembro` int(11) NOT NULL,
  `fecha_visita` date NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) NOT NULL,
  `usuario_creo` varchar(200) NOT NULL,
  `fecha_creo` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_modifico` int(11) NOT NULL,
  `fecha_modifico` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_informacion_visitas_pastorales`
--

INSERT INTO `tb_informacion_visitas_pastorales` (`idvisitaspastorales`, `idmiembro`, `fecha_visita`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(2, 16, '2022-02-02', 1, 'admin', '2022-02-03 17:08:24', 0, '2022-02-04 00:42:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_miembro`
--

CREATE TABLE `tb_miembro` (
  `idmiembro` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `cui` varchar(100) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(100) NOT NULL,
  `idestadocivil` int(11) NOT NULL,
  `idbcfa` int(11) NOT NULL,
  `referencia` text DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `idocupaciones` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_miembro`
--

INSERT INTO `tb_miembro` (`idmiembro`, `foto`, `cui`, `nombre`, `fecha_nacimiento`, `genero`, `idestadocivil`, `idbcfa`, `referencia`, `telefono`, `idocupaciones`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 'DUMMY_FOTO', '000000000000', 'VICTOR HERIBERTO JUCUB CUC', '1997-06-20', 'MASCULINO', 3, 65, '...', '123123123', 1, 1, 'admin', '2021-10-28 06:54:26', 'admin', '2022-02-03 14:14:05'),
(7, 'DUMMY_FOTO', '00000000000', 'JENNIFER ANDREA SACBA LARIOS', '1998-11-26', 'FEMENINO', 3, 58, 'EN MI CORAZON', '12345678', 1, 1, 'admin', '2022-02-02 13:08:37', 'admin', '2022-02-03 14:14:15'),
(9, 'DUMMY_FOTO', '00000000000', 'GEISON JOSUE CAB TZUL', '1997-11-11', 'MASCULINO', 2, 70, 'POR LOS BUSES', '12345678', 1, 1, 'admin', '2022-02-02 13:37:59', 'admin', '2022-02-03 14:18:16'),
(10, 'DUMMY_FOTO', '00000000000', 'CARLOS SAMUEL CUCUL CUC', '1997-08-18', 'MASCULINO', 7, 63, 'POR LA TIENDA', '12345678', 1, 1, 'admin', '2022-02-02 14:57:40', 'admin', '2022-02-03 12:44:14'),
(11, 'DUMMY_FOTO', '00000000000', 'FRANCINY ESTEFANY LOPEZ LOPEZ', '1997-03-13', 'FEMENINO', 2, 70, 'POR LOS BUSES', '12345678', 1, 1, 'admin', '2022-02-03 14:18:07', 'admin', '2022-02-03 14:18:07'),
(12, 'DUMMY_FOTO', '00000000000', 'SANDRA EUNICE MORALES VASQUEZ', '1994-03-30', 'FEMENINO', 1, 1, '', '12345678', 10, 1, 'admin', '2022-02-03 14:25:24', 'admin', '2022-02-03 14:25:24'),
(13, 'DUMMY_FOTO', '00000000000', 'ANA ALEYDA PINTO POP', '1993-09-12', 'FEMENINO', 2, 29, '', '12345678', 10, 1, 'admin', '2022-02-03 14:26:23', 'admin', '2022-02-03 15:32:08'),
(14, 'DUMMY_FOTO', '00000000000', 'ARMANDO HAROLDO REYNOSO GARCÍA', '1986-04-17', 'MASCULINO', 2, 33, '', '12345678', 9, 1, 'admin', '2022-02-03 14:27:14', 'admin', '2022-02-03 15:32:02'),
(15, 'DUMMY_FOTO', '00000000000', 'CELSO MACZ POP', '1976-04-13', 'MASCULINO', 1, 2, 'POR EL CAMPO DE FUT', '', 9, 1, 'admin', '2022-02-03 14:39:35', 'admin', '2022-02-03 14:39:35'),
(16, 'DUMMY_FOTO', '00000000000', 'AMANDA MARIA SUC COC', '2008-06-13', 'FEMENINO', 1, 1, '', '', 1, 1, 'admin', '2022-02-03 15:33:11', 'admin', '2022-02-03 15:35:28'),
(17, 'DUMMY_FOTO', '00000000000', 'ARNULFO REYNOSO PINTO', '2005-04-14', 'MASCULINO', 1, 1, '', '', 1, 1, 'admin', '2022-02-03 15:38:17', 'admin', '2022-02-03 15:38:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ministerios`
--

CREATE TABLE `tb_ministerios` (
  `idministerios` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_ministerios`
--

INSERT INTO `tb_ministerios` (`idministerios`, `nombre`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 'MAYORDOMIA', 1, 'admin', '2021-11-07 11:25:08', 'admin', '2021-11-07 11:25:08'),
(2, 'JUVENTUD NAZARENA INTERNACIONAL JNI', 1, 'admin', '2021-11-07 11:25:15', 'admin', '2021-11-07 11:35:31'),
(3, 'CASADOS FELICES CAFE', 1, 'admin', '2021-11-07 11:26:29', 'admin', '2021-11-07 11:35:39'),
(4, 'DAMAS', 1, 'admin', '2021-11-07 11:29:54', 'admin', '2021-11-07 11:35:48'),
(5, 'VARONES A IMAGEN DE DIOS', 1, 'admin', '2021-11-07 11:35:59', 'admin', '2021-11-07 11:35:59'),
(6, 'MINISTERIO ENTRE ADULTOS', 1, 'admin', '2021-11-07 11:36:11', 'admin', '2021-11-07 11:36:11'),
(7, 'MINISTERIO ENTRE NIÑOS', 1, 'admin', '2021-11-07 11:36:26', 'admin', '2021-11-07 11:36:26'),
(8, 'EVANGELISMO', 1, 'admin', '2021-11-07 11:36:39', 'admin', '2021-11-07 11:36:39'),
(9, 'PASTORADO', 1, 'admin', '2021-11-07 11:36:54', 'admin', '2021-11-07 11:36:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_misiones`
--

CREATE TABLE `tb_misiones` (
  `idmisiones` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_misiones`
--

INSERT INTO `tb_misiones` (`idmisiones`, `nombre`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 'SAN PABLO', 1, 'admin', '2022-01-29 01:03:10', 'admin', '2022-01-29 01:03:10'),
(2, 'XALIHA', 1, 'admin', '2022-01-29 01:03:16', 'admin', '2022-01-29 01:03:16'),
(3, 'SAQIHA', 1, 'admin', '2022-01-29 01:03:25', 'admin', '2022-01-29 01:03:25'),
(4, 'SAQTZICNIL', 1, 'admin', '2022-01-29 01:03:37', 'admin', '2022-01-29 01:03:37'),
(5, 'KAQTZIMAAJ', 1, 'admin', '2022-01-29 01:03:44', 'admin', '2022-01-29 01:03:44'),
(6, 'CHIQUIC', 1, 'admin', '2022-01-29 01:03:50', 'admin', '2022-01-29 01:03:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_municipios`
--

CREATE TABLE `tb_municipios` (
  `idmunicipios` int(11) NOT NULL,
  `iddepartamentos` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_municipios`
--

INSERT INTO `tb_municipios` (`idmunicipios`, `iddepartamentos`, `nombre`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 1, 'COBAN', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(2, 1, 'SANTA CRUZ VERAPAZ', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(3, 1, 'SAN CRISTOBAL VERAPAZ', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(4, 1, 'TACTIC', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(5, 1, 'TAMAHU', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(6, 1, 'TUCURU', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(7, 1, 'PANZOS', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(8, 1, 'SENAHU', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(9, 1, 'SAN PEDRO CARCHA', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(10, 1, 'SAN JUAN CHAMELCO', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(11, 1, 'LANQUIN', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(12, 1, 'SANTA MARIA CAHABON', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(13, 1, 'CHISEC', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(14, 1, 'CHAHAL', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(15, 1, 'FRAY BARTOLOME DE LAS CASAS', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(16, 1, 'SANTA CATALINA LA TINTA', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(17, 1, 'RAXRUHA', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49'),
(18, 2, 'EL CHOL', 1, NULL, '2021-10-28 06:49:49', NULL, '2021-10-28 06:49:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ocupaciones`
--

CREATE TABLE `tb_ocupaciones` (
  `idocupaciones` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_ocupaciones`
--

INSERT INTO `tb_ocupaciones` (`idocupaciones`, `nombre`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 'ESTUDIANTE', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(2, 'AMA DE CASA', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(3, 'LUSTRADOR', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(4, 'LIC. ADMON DE EMPRESAS', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(5, 'COSTURERA', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(6, 'BACHILLER EN CIENCIAS Y LETRAS', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(7, 'COMERCIANTE', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(8, 'DOCENTE', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(9, 'JORNALERO', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(10, 'OFICIOS DOMESTICOS', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(11, 'TUTORIAS', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(13, 'PERITO CONTADOR', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(14, 'BACH EN COMPUTACION', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(15, 'MAESTRO DE EDUCACION FISICA', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(16, 'AUXILIAR DE ENFERMERIA', 1, NULL, '2021-10-28 06:52:07', NULL, '2021-10-28 06:52:07'),
(17, 'HERRERO', 1, 'admin', '2021-10-31 00:25:05', NULL, '2021-10-30 16:25:05'),
(18, 'CARPINTERO', 1, 'admin', '2021-10-31 00:25:47', 'admin', '2021-11-06 12:35:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_registro_idiomas`
--

CREATE TABLE `tb_registro_idiomas` (
  `idregistroidiomas` int(11) NOT NULL,
  `ididiomas` int(11) NOT NULL,
  `idmiembro` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_registro_idiomas`
--

INSERT INTO `tb_registro_idiomas` (`idregistroidiomas`, `ididiomas`, `idmiembro`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(32, 1, 10, 1, 'admin', '2022-02-03 12:44:14', 'admin', '2022-02-03 12:44:14'),
(33, 2, 10, 1, 'admin', '2022-02-03 12:44:14', 'admin', '2022-02-03 12:44:14'),
(34, 1, 1, 1, 'admin', '2022-02-03 14:14:05', 'admin', '2022-02-03 14:14:05'),
(35, 1, 7, 1, 'admin', '2022-02-03 14:14:15', 'admin', '2022-02-03 14:14:15'),
(36, 1, 11, 1, 'admin', '2022-02-03 14:18:07', 'admin', '2022-02-03 14:18:07'),
(37, 1, 9, 1, 'admin', '2022-02-03 14:18:16', 'admin', '2022-02-03 14:18:16'),
(38, 2, 9, 1, 'admin', '2022-02-03 14:18:16', 'admin', '2022-02-03 14:18:16'),
(39, 3, 9, 1, 'admin', '2022-02-03 14:18:16', 'admin', '2022-02-03 14:18:16'),
(40, 4, 9, 1, 'admin', '2022-02-03 14:18:16', 'admin', '2022-02-03 14:18:16'),
(41, 1, 12, 1, 'admin', '2022-02-03 14:25:24', 'admin', '2022-02-03 14:25:24'),
(42, 2, 12, 1, 'admin', '2022-02-03 14:25:24', 'admin', '2022-02-03 14:25:24'),
(47, 1, 15, 1, 'admin', '2022-02-03 14:39:35', 'admin', '2022-02-03 14:39:35'),
(48, 2, 15, 1, 'admin', '2022-02-03 14:39:35', 'admin', '2022-02-03 14:39:35'),
(49, 1, 14, 1, 'admin', '2022-02-03 15:32:02', 'admin', '2022-02-03 15:32:02'),
(50, 2, 14, 1, 'admin', '2022-02-03 15:32:02', 'admin', '2022-02-03 15:32:02'),
(51, 1, 13, 1, 'admin', '2022-02-03 15:32:08', 'admin', '2022-02-03 15:32:08'),
(52, 2, 13, 1, 'admin', '2022-02-03 15:32:08', 'admin', '2022-02-03 15:32:08'),
(55, 1, 16, 1, 'admin', '2022-02-03 15:35:28', 'admin', '2022-02-03 15:35:28'),
(56, 2, 16, 1, 'admin', '2022-02-03 15:35:28', 'admin', '2022-02-03 15:35:28'),
(57, 1, 17, 1, 'admin', '2022-02-03 15:38:17', 'admin', '2022-02-03 15:38:17'),
(58, 2, 17, 1, 'admin', '2022-02-03 15:38:17', 'admin', '2022-02-03 15:38:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `idusuario` int(11) NOT NULL,
  `idmiembro` int(11) NOT NULL,
  `nombre_usuario` varchar(200) NOT NULL,
  `clave` blob NOT NULL,
  `nivel` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_creo` varchar(200) DEFAULT NULL,
  `fecha_creo` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modifico` varchar(200) DEFAULT NULL,
  `fecha_modifico` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`idusuario`, `idmiembro`, `nombre_usuario`, `clave`, `nivel`, `estado`, `usuario_creo`, `fecha_creo`, `usuario_modifico`, `fecha_modifico`) VALUES
(1, 1, 'admin', 0xc9c4000da4015fcd82cc3839ad63921f, 'DEVELOPER', 1, 'admin', '2021-10-28 06:56:40', 'admin', '2022-01-30 11:17:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_asignacion_comisiones`
--
ALTER TABLE `tb_asignacion_comisiones`
  ADD PRIMARY KEY (`idasignacioncomisiones`),
  ADD KEY `FK_asignacioncomisiones_miembro` (`idmiembro`),
  ADD KEY `FK_asignacioncomisiones_comisiones` (`idcomisiones`),
  ADD KEY `FK_asignacioncomisiones_cargoscomisiones` (`idcargoscomisiones`);

--
-- Indices de la tabla `tb_asignacion_ministerios`
--
ALTER TABLE `tb_asignacion_ministerios`
  ADD PRIMARY KEY (`idasignacionministerios`),
  ADD KEY `FK_asignacionministerios_miembro` (`idmiembro`),
  ADD KEY `FK_asignacionministerios_ministerios` (`idministerios`),
  ADD KEY `FK_asignacionministerios_cargosministeriales` (`idcargosministeriales`);

--
-- Indices de la tabla `tb_asignacion_misiones`
--
ALTER TABLE `tb_asignacion_misiones`
  ADD PRIMARY KEY (`idasignacionmisiones`),
  ADD KEY `FK_asignacionmisiones_miembro` (`idmiembro`),
  ADD KEY `FK_asignacionmisiones_misiones` (`idmisiones`);

--
-- Indices de la tabla `tb_barrio_caserio_finca_aldea`
--
ALTER TABLE `tb_barrio_caserio_finca_aldea`
  ADD PRIMARY KEY (`idbcfa`),
  ADD KEY `FK_bcfa_municipios` (`idmunicipios`);

--
-- Indices de la tabla `tb_cargos_comisiones`
--
ALTER TABLE `tb_cargos_comisiones`
  ADD PRIMARY KEY (`idcargoscomisiones`);

--
-- Indices de la tabla `tb_cargos_ministeriales`
--
ALTER TABLE `tb_cargos_ministeriales`
  ADD PRIMARY KEY (`idcargosministeriales`);

--
-- Indices de la tabla `tb_comisiones`
--
ALTER TABLE `tb_comisiones`
  ADD PRIMARY KEY (`idcomisiones`),
  ADD KEY `FK_comisiones_ministerios` (`idministerios`);

--
-- Indices de la tabla `tb_departamentos`
--
ALTER TABLE `tb_departamentos`
  ADD PRIMARY KEY (`iddepartamentos`);

--
-- Indices de la tabla `tb_estadocivil`
--
ALTER TABLE `tb_estadocivil`
  ADD PRIMARY KEY (`idestadocivil`);

--
-- Indices de la tabla `tb_idiomas`
--
ALTER TABLE `tb_idiomas`
  ADD PRIMARY KEY (`ididiomas`);

--
-- Indices de la tabla `tb_informacion_bautizo`
--
ALTER TABLE `tb_informacion_bautizo`
  ADD PRIMARY KEY (`idiglesiabautizo`),
  ADD KEY `FK_iglesiabautizo_miembro` (`idmiembro`);

--
-- Indices de la tabla `tb_informacion_conyugal`
--
ALTER TABLE `tb_informacion_conyugal`
  ADD PRIMARY KEY (`idinformacionconyugal`),
  ADD KEY `FK_informacionconyugal_miembro` (`idmiembro`);

--
-- Indices de la tabla `tb_informacion_eclesial`
--
ALTER TABLE `tb_informacion_eclesial`
  ADD PRIMARY KEY (`idinformacioneclesial`),
  ADD KEY `FK_informacioneclesial_miembro` (`idmiembro`);

--
-- Indices de la tabla `tb_informacion_familiar`
--
ALTER TABLE `tb_informacion_familiar`
  ADD PRIMARY KEY (`idinformacionfamiliar`),
  ADD KEY `FK_informacionfamiliar_miembro` (`idmiembro`);

--
-- Indices de la tabla `tb_informacion_visitas_pastorales`
--
ALTER TABLE `tb_informacion_visitas_pastorales`
  ADD PRIMARY KEY (`idvisitaspastorales`),
  ADD KEY `FK_visitaspastorales_miembro` (`idmiembro`);

--
-- Indices de la tabla `tb_miembro`
--
ALTER TABLE `tb_miembro`
  ADD PRIMARY KEY (`idmiembro`),
  ADD KEY `FK_miembro_ocupacion` (`idocupaciones`),
  ADD KEY `FK_miembro_direccion` (`idbcfa`),
  ADD KEY `FK_miembro_estadocivil` (`idestadocivil`);

--
-- Indices de la tabla `tb_ministerios`
--
ALTER TABLE `tb_ministerios`
  ADD PRIMARY KEY (`idministerios`);

--
-- Indices de la tabla `tb_misiones`
--
ALTER TABLE `tb_misiones`
  ADD PRIMARY KEY (`idmisiones`);

--
-- Indices de la tabla `tb_municipios`
--
ALTER TABLE `tb_municipios`
  ADD PRIMARY KEY (`idmunicipios`),
  ADD KEY `FK_municipios_departamentos` (`iddepartamentos`);

--
-- Indices de la tabla `tb_ocupaciones`
--
ALTER TABLE `tb_ocupaciones`
  ADD PRIMARY KEY (`idocupaciones`);

--
-- Indices de la tabla `tb_registro_idiomas`
--
ALTER TABLE `tb_registro_idiomas`
  ADD PRIMARY KEY (`idregistroidiomas`),
  ADD KEY `FK_registroidiomas_idiomas` (`ididiomas`),
  ADD KEY `FK_registroidiomas_miembros` (`idmiembro`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `UC_nombreusuario` (`nombre_usuario`),
  ADD KEY `FK_usuario_miembro` (`idmiembro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_asignacion_comisiones`
--
ALTER TABLE `tb_asignacion_comisiones`
  MODIFY `idasignacioncomisiones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_asignacion_ministerios`
--
ALTER TABLE `tb_asignacion_ministerios`
  MODIFY `idasignacionministerios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_asignacion_misiones`
--
ALTER TABLE `tb_asignacion_misiones`
  MODIFY `idasignacionmisiones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_barrio_caserio_finca_aldea`
--
ALTER TABLE `tb_barrio_caserio_finca_aldea`
  MODIFY `idbcfa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `tb_cargos_comisiones`
--
ALTER TABLE `tb_cargos_comisiones`
  MODIFY `idcargoscomisiones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_cargos_ministeriales`
--
ALTER TABLE `tb_cargos_ministeriales`
  MODIFY `idcargosministeriales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tb_comisiones`
--
ALTER TABLE `tb_comisiones`
  MODIFY `idcomisiones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tb_departamentos`
--
ALTER TABLE `tb_departamentos`
  MODIFY `iddepartamentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tb_estadocivil`
--
ALTER TABLE `tb_estadocivil`
  MODIFY `idestadocivil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tb_idiomas`
--
ALTER TABLE `tb_idiomas`
  MODIFY `ididiomas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_informacion_bautizo`
--
ALTER TABLE `tb_informacion_bautizo`
  MODIFY `idiglesiabautizo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_informacion_conyugal`
--
ALTER TABLE `tb_informacion_conyugal`
  MODIFY `idinformacionconyugal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_informacion_eclesial`
--
ALTER TABLE `tb_informacion_eclesial`
  MODIFY `idinformacioneclesial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_informacion_familiar`
--
ALTER TABLE `tb_informacion_familiar`
  MODIFY `idinformacionfamiliar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_informacion_visitas_pastorales`
--
ALTER TABLE `tb_informacion_visitas_pastorales`
  MODIFY `idvisitaspastorales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_miembro`
--
ALTER TABLE `tb_miembro`
  MODIFY `idmiembro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tb_ministerios`
--
ALTER TABLE `tb_ministerios`
  MODIFY `idministerios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tb_misiones`
--
ALTER TABLE `tb_misiones`
  MODIFY `idmisiones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_municipios`
--
ALTER TABLE `tb_municipios`
  MODIFY `idmunicipios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tb_ocupaciones`
--
ALTER TABLE `tb_ocupaciones`
  MODIFY `idocupaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tb_registro_idiomas`
--
ALTER TABLE `tb_registro_idiomas`
  MODIFY `idregistroidiomas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_asignacion_comisiones`
--
ALTER TABLE `tb_asignacion_comisiones`
  ADD CONSTRAINT `FK_asignacioncomisiones_cargoscomisiones` FOREIGN KEY (`idcargoscomisiones`) REFERENCES `tb_cargos_comisiones` (`idcargoscomisiones`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_asignacioncomisiones_comisiones` FOREIGN KEY (`idcomisiones`) REFERENCES `tb_comisiones` (`idcomisiones`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_asignacioncomisiones_miembro` FOREIGN KEY (`idmiembro`) REFERENCES `tb_miembro` (`idmiembro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_asignacion_ministerios`
--
ALTER TABLE `tb_asignacion_ministerios`
  ADD CONSTRAINT `FK_asignacionministerios_cargosministeriales` FOREIGN KEY (`idcargosministeriales`) REFERENCES `tb_cargos_ministeriales` (`idcargosministeriales`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_asignacionministerios_miembro` FOREIGN KEY (`idmiembro`) REFERENCES `tb_miembro` (`idmiembro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_asignacionministerios_ministerios` FOREIGN KEY (`idministerios`) REFERENCES `tb_ministerios` (`idministerios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_asignacion_misiones`
--
ALTER TABLE `tb_asignacion_misiones`
  ADD CONSTRAINT `FK_asignacionmisiones_miembro` FOREIGN KEY (`idmiembro`) REFERENCES `tb_miembro` (`idmiembro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_asignacionmisiones_misiones` FOREIGN KEY (`idmisiones`) REFERENCES `tb_misiones` (`idmisiones`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_barrio_caserio_finca_aldea`
--
ALTER TABLE `tb_barrio_caserio_finca_aldea`
  ADD CONSTRAINT `FK_bcfa_municipios` FOREIGN KEY (`idmunicipios`) REFERENCES `tb_municipios` (`idmunicipios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_comisiones`
--
ALTER TABLE `tb_comisiones`
  ADD CONSTRAINT `FK_comisiones_ministerios` FOREIGN KEY (`idministerios`) REFERENCES `tb_ministerios` (`idministerios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_informacion_bautizo`
--
ALTER TABLE `tb_informacion_bautizo`
  ADD CONSTRAINT `FK_iglesiabautizo_miembro` FOREIGN KEY (`idmiembro`) REFERENCES `tb_miembro` (`idmiembro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_informacion_conyugal`
--
ALTER TABLE `tb_informacion_conyugal`
  ADD CONSTRAINT `FK_informacionconyugal_miembro` FOREIGN KEY (`idmiembro`) REFERENCES `tb_miembro` (`idmiembro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_informacion_eclesial`
--
ALTER TABLE `tb_informacion_eclesial`
  ADD CONSTRAINT `FK_informacioneclesial_miembro` FOREIGN KEY (`idmiembro`) REFERENCES `tb_miembro` (`idmiembro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_informacion_familiar`
--
ALTER TABLE `tb_informacion_familiar`
  ADD CONSTRAINT `FK_informacionfamiliar_miembro` FOREIGN KEY (`idmiembro`) REFERENCES `tb_miembro` (`idmiembro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_informacion_visitas_pastorales`
--
ALTER TABLE `tb_informacion_visitas_pastorales`
  ADD CONSTRAINT `FK_visitaspastorales_miembro` FOREIGN KEY (`idmiembro`) REFERENCES `tb_miembro` (`idmiembro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_miembro`
--
ALTER TABLE `tb_miembro`
  ADD CONSTRAINT `FK_miembro_direccion` FOREIGN KEY (`idbcfa`) REFERENCES `tb_barrio_caserio_finca_aldea` (`idbcfa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_miembro_estadocivil` FOREIGN KEY (`idestadocivil`) REFERENCES `tb_estadocivil` (`idestadocivil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_miembro_ocupacion` FOREIGN KEY (`idocupaciones`) REFERENCES `tb_ocupaciones` (`idocupaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_municipios`
--
ALTER TABLE `tb_municipios`
  ADD CONSTRAINT `FK_municipios_departamentos` FOREIGN KEY (`iddepartamentos`) REFERENCES `tb_departamentos` (`iddepartamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_registro_idiomas`
--
ALTER TABLE `tb_registro_idiomas`
  ADD CONSTRAINT `FK_registroidiomas_idiomas` FOREIGN KEY (`ididiomas`) REFERENCES `tb_idiomas` (`ididiomas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_registroidiomas_miembros` FOREIGN KEY (`idmiembro`) REFERENCES `tb_miembro` (`idmiembro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `FK_usuario_miembro` FOREIGN KEY (`idmiembro`) REFERENCES `tb_miembro` (`idmiembro`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
