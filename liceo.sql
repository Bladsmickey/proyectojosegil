-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-03-2014 a las 18:25:00
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `liceo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accion`
--

CREATE TABLE IF NOT EXISTS `accion` (
  `id_usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `cambio` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `donde` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diversidad_fun`
--

CREATE TABLE IF NOT EXISTS `diversidad_fun` (
  `cod_div` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_div` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nom_div` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `descrip_div` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `habil` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_div`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egreso`
--

CREATE TABLE IF NOT EXISTS `egreso` (
  `ced_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `motivo` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_egreso` date NOT NULL,
  `inst_nueva` varchar(60) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE IF NOT EXISTS `enfermedad` (
  `cod_enf` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_enf` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descrip_enf` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `habil` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_enf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `ced_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `nacion` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `nome` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `apee` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `id_alumno` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `edad` int(2) NOT NULL,
  `sexo` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `lugar_nac` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(14) COLLATE utf8_spanish2_ci NOT NULL,
  `tlf_res` varchar(14) COLLATE utf8_spanish2_ci NOT NULL,
  `resp_em` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `parentesco` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `inst_proc` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `inst_sec` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `municipio` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `turno` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `condicion` char(25) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estu_div`
--

CREATE TABLE IF NOT EXISTS `estu_div` (
  `auto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_div` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `ced_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`auto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estu_enfer`
--

CREATE TABLE IF NOT EXISTS `estu_enfer` (
  `auto` int(11) NOT NULL AUTO_INCREMENT,
  `ced_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_enf` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `observacion` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`auto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estu_hab`
--

CREATE TABLE IF NOT EXISTS `estu_hab` (
  `auto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_ha` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `ced_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `observ_ha` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`auto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estu_va`
--

CREATE TABLE IF NOT EXISTS `estu_va` (
  `auto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_va` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `ced_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`auto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_fam`
--

CREATE TABLE IF NOT EXISTS `grupo_fam` (
  `per_viv` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nu_pers` int(2) NOT NULL,
  `tipo_vi` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `mont_al` float(5,2) NOT NULL,
  `sevicios_viv` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `be_est` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `or_otor` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `ing_mens` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `ced_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`ced_e`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidad`
--

CREATE TABLE IF NOT EXISTS `habilidad` (
  `cod_hab` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_hab` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descrip_hab` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `habil` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_hab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE IF NOT EXISTS `institucion` (
  `nombre` char(60) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_dir` char(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ced_dir` varchar(16) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`nombre`, `nombre_dir`, `ced_dir`) VALUES
('Liceo Bolivariano Jose Gil Fortoul', 'Ruben Jose Abreu Ochoa', 'V-8.794189');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `cod_mat` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mat` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `ano_mat` int(4) NOT NULL,
  `mencion` char(12) COLLATE utf8_spanish2_ci NOT NULL,
  `habil` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_con_es`
--

CREATE TABLE IF NOT EXISTS `ma_con_es` (
  `id_alum` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_ma` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_cond` int(2) NOT NULL,
  `sec_act` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `sec_pas` varchar(2) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
  `nom_prof` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ape_prof` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `cedu_prof` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `direc_prof` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `tlf_prof` varchar(14) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cedu_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE IF NOT EXISTS `representante` (
  `nom` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ape` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ci_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `ci_r` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `nacionalidad` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `pare_r` char(15) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `est_civ` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `niv_ac` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `edad_r` int(2) NOT NULL,
  `profesion` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `lugar_tr` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `dir_tra` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `tlf_tr` varchar(14) COLLATE utf8_spanish2_ci NOT NULL,
  `dir_rep` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `tlf_rep` varchar(14) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`ci_e`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respaldo`
--

CREATE TABLE IF NOT EXISTS `respaldo` (
  `bd` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `respaldo`
--

INSERT INTO `respaldo` (`bd`, `fecha`) VALUES
('Respaldo_JGF-2014-03-15 12-02-57.sql', '2014-03-15 16:32:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE IF NOT EXISTS `secciones` (
  `cod_sec` int(3) NOT NULL,
  `ce_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `anho_est` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `mencion` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `seccion` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `habil` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`ce_e`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_cont`
--

CREATE TABLE IF NOT EXISTS `seccion_cont` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` varchar(1) NOT NULL,
  `ano` int(11) NOT NULL,
  `mencion` varchar(15) NOT NULL,
  `conteo` int(2) NOT NULL,
  `habil` char(2) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nom_usu` char(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ape_usu` char(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cedula_usu` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `cont_usu` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `categoria` char(15) COLLATE utf8_spanish2_ci NOT NULL,
  `habil` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `correo_al` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nom_usu`, `ape_usu`, `cedula_usu`, `usuario`, `cont_usu`, `categoria`, `habil`, `correo`, `correo_al`) VALUES
('Null', 'Null', 'Null', 'admin', '$1$Rn5.G/1.$eTx1kmPj2C9BKlU1.m1uA1', 'Administrador', 'Si', 'Null', 'Null'),
('Guillermo Avila', 'Rodriguez', '21662478', 'guille_05', '21662478', 'Profesor', 'No', 'Null', 'Null'),
('pepe', 'pepe', '4546', 'opepeoe', '4546', 'Profesor', 'No', 'Null', 'Null'),
('Pepe', 'Lolo', '54545454', 'sdfsdf_01', '54545454', 'Profesor', 'No', 'Null', 'Null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE IF NOT EXISTS `vacuna` (
  `cod_va` int(11) NOT NULL AUTO_INCREMENT,
  `nom_va` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_va` char(15) COLLATE utf8_spanish2_ci NOT NULL,
  `habil` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_va`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
