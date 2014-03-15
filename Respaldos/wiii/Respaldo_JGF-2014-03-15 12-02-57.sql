-- MySQL dump 10.13  Distrib 5.5.24, for Win32 (x86)
--
-- Host: localhost    Database: liceo
-- ------------------------------------------------------
-- Server version	5.5.24-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accion`
--

DROP TABLE IF EXISTS `accion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accion` (
  `id_usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `cambio` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `donde` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accion`
--

LOCK TABLES `accion` WRITE;
/*!40000 ALTER TABLE `accion` DISABLE KEYS */;
/*!40000 ALTER TABLE `accion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diversidad_fun`
--

DROP TABLE IF EXISTS `diversidad_fun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diversidad_fun` (
  `cod_div` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_div` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nom_div` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `descrip_div` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `habil` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_div`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diversidad_fun`
--

LOCK TABLES `diversidad_fun` WRITE;
/*!40000 ALTER TABLE `diversidad_fun` DISABLE KEYS */;
/*!40000 ALTER TABLE `diversidad_fun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egreso`
--

DROP TABLE IF EXISTS `egreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egreso` (
  `ced_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `motivo` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_egreso` date NOT NULL,
  `inst_nueva` varchar(60) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egreso`
--

LOCK TABLES `egreso` WRITE;
/*!40000 ALTER TABLE `egreso` DISABLE KEYS */;
/*!40000 ALTER TABLE `egreso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfermedad`
--

DROP TABLE IF EXISTS `enfermedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enfermedad` (
  `cod_enf` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_enf` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descrip_enf` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `habil` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_enf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfermedad`
--

LOCK TABLES `enfermedad` WRITE;
/*!40000 ALTER TABLE `enfermedad` DISABLE KEYS */;
/*!40000 ALTER TABLE `enfermedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estu_div`
--

DROP TABLE IF EXISTS `estu_div`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estu_div` (
  `auto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_div` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `ced_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`auto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estu_div`
--

LOCK TABLES `estu_div` WRITE;
/*!40000 ALTER TABLE `estu_div` DISABLE KEYS */;
/*!40000 ALTER TABLE `estu_div` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estu_enfer`
--

DROP TABLE IF EXISTS `estu_enfer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estu_enfer` (
  `auto` int(11) NOT NULL AUTO_INCREMENT,
  `ced_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_enf` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `observacion` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`auto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estu_enfer`
--

LOCK TABLES `estu_enfer` WRITE;
/*!40000 ALTER TABLE `estu_enfer` DISABLE KEYS */;
/*!40000 ALTER TABLE `estu_enfer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estu_hab`
--

DROP TABLE IF EXISTS `estu_hab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estu_hab` (
  `auto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_ha` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `ced_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `observ_ha` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`auto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estu_hab`
--

LOCK TABLES `estu_hab` WRITE;
/*!40000 ALTER TABLE `estu_hab` DISABLE KEYS */;
/*!40000 ALTER TABLE `estu_hab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estu_va`
--

DROP TABLE IF EXISTS `estu_va`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estu_va` (
  `auto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_va` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `ced_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`auto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estu_va`
--

LOCK TABLES `estu_va` WRITE;
/*!40000 ALTER TABLE `estu_va` DISABLE KEYS */;
/*!40000 ALTER TABLE `estu_va` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_fam`
--

DROP TABLE IF EXISTS `grupo_fam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo_fam` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_fam`
--

LOCK TABLES `grupo_fam` WRITE;
/*!40000 ALTER TABLE `grupo_fam` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo_fam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habilidad`
--

DROP TABLE IF EXISTS `habilidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `habilidad` (
  `cod_hab` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_hab` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descrip_hab` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `habil` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_hab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habilidad`
--

LOCK TABLES `habilidad` WRITE;
/*!40000 ALTER TABLE `habilidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `habilidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institucion`
--

DROP TABLE IF EXISTS `institucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institucion` (
  `nombre` char(60) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_dir` char(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ced_dir` varchar(16) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institucion`
--

LOCK TABLES `institucion` WRITE;
/*!40000 ALTER TABLE `institucion` DISABLE KEYS */;
INSERT INTO `institucion` VALUES ('Liceo Bolivariano Jose Gil Fortoul','Ruben Jose Abreu Ochoa','V-8.794189');
/*!40000 ALTER TABLE `institucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ma_con_es`
--

DROP TABLE IF EXISTS `ma_con_es`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ma_con_es` (
  `id_alum` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_ma` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_cond` int(2) NOT NULL,
  `sec_act` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `sec_pas` varchar(2) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ma_con_es`
--

LOCK TABLES `ma_con_es` WRITE;
/*!40000 ALTER TABLE `ma_con_es` DISABLE KEYS */;
/*!40000 ALTER TABLE `ma_con_es` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `cod_mat` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mat` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `ano_mat` int(4) NOT NULL,
  `mencion` char(12) COLLATE utf8_spanish2_ci NOT NULL,
  `habil` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesores`
--

DROP TABLE IF EXISTS `profesores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesores` (
  `nom_prof` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ape_prof` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `cedu_prof` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `direc_prof` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `tlf_prof` varchar(14) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cedu_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesores`
--

LOCK TABLES `profesores` WRITE;
/*!40000 ALTER TABLE `profesores` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `representante`
--

DROP TABLE IF EXISTS `representante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `representante` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `representante`
--

LOCK TABLES `representante` WRITE;
/*!40000 ALTER TABLE `representante` DISABLE KEYS */;
/*!40000 ALTER TABLE `representante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respaldo`
--

DROP TABLE IF EXISTS `respaldo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respaldo` (
  `bd` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respaldo`
--

LOCK TABLES `respaldo` WRITE;
/*!40000 ALTER TABLE `respaldo` DISABLE KEYS */;
INSERT INTO `respaldo` VALUES ('Respaldo_JGF-2014-03-14 21-08-49.sql','2014-03-15 01:38:49'),('Respaldo_JGF-2014-03-15 10-35-05.sql','2014-03-15 15:05:05'),('Respaldo_JGF-2014-03-15 10-36-04.sql','2014-03-15 15:06:04'),('Respaldo_JGF-2014-03-15 12-02-57.sql','2014-03-15 16:32:57');
/*!40000 ALTER TABLE `respaldo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion_cont`
--

DROP TABLE IF EXISTS `seccion_cont`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccion_cont` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` varchar(1) NOT NULL,
  `ano` int(11) NOT NULL,
  `mencion` varchar(15) NOT NULL,
  `conteo` int(2) NOT NULL,
  `habil` char(2) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion_cont`
--

LOCK TABLES `seccion_cont` WRITE;
/*!40000 ALTER TABLE `seccion_cont` DISABLE KEYS */;
/*!40000 ALTER TABLE `seccion_cont` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secciones`
--

DROP TABLE IF EXISTS `secciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secciones` (
  `cod_sec` int(3) NOT NULL,
  `ce_e` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `anho_est` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `mencion` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `seccion` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `habil` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`ce_e`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secciones`
--

LOCK TABLES `secciones` WRITE;
/*!40000 ALTER TABLE `secciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `secciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('Null','Null','Null','admin','$1$Rn5.G/1.$eTx1kmPj2C9BKlU1.m1uA1','Administrador','Si','Null','Null'),('Guillermo Avila','Rodriguez','21662478','guille_05','21662478','Profesor','No','Null','Null'),('pepe','pepe','4546','opepeoe','4546','Profesor','No','Null','Null'),('Pepe','Lolo','54545454','sdfsdf_01','54545454','Profesor','No','Null','Null');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacuna`
--

DROP TABLE IF EXISTS `vacuna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacuna` (
  `cod_va` int(11) NOT NULL AUTO_INCREMENT,
  `nom_va` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_va` char(15) COLLATE utf8_spanish2_ci NOT NULL,
  `habil` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_va`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacuna`
--

LOCK TABLES `vacuna` WRITE;
/*!40000 ALTER TABLE `vacuna` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacuna` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-15 12:03:11
<br />
<font size='1'><table class='xdebug-error xe-warning' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Warning: fopen('.Respaldo_JGF-2014-03-15 12-02-57.'.sql) [&lt;a href='function.fopen'&gt;function.fopen&lt;/a&gt;]: failed to open stream: No such file or directory in C:\wamp\www\Respaldos\exportar.php on line <i>23</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.1805</td><td bgcolor='#eeeeec' align='right'>372568</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp\www\Respaldos\exportar.php' bgcolor='#eeeeec'>..\exportar.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>14.6105</td><td bgcolor='#eeeeec' align='right'>374344</td><td bgcolor='#eeeeec'><a href='http://www.php.net/fopen' target='_new'>fopen</a>
(  )</td><td title='C:\wamp\www\Respaldos\exportar.php' bgcolor='#eeeeec'>..\exportar.php<b>:</b>23</td></tr>
</table></font>
<br />
<font size='1'><table class='xdebug-error xe-warning' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Warning: fpassthru() expects parameter 1 to be resource, boolean given in C:\wamp\www\Respaldos\exportar.php on line <i>24</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.1805</td><td bgcolor='#eeeeec' align='right'>372568</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp\www\Respaldos\exportar.php' bgcolor='#eeeeec'>..\exportar.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>14.8189</td><td bgcolor='#eeeeec' align='right'>374744</td><td bgcolor='#eeeeec'><a href='http://www.php.net/fpassthru' target='_new'>fpassthru</a>
(  )</td><td title='C:\wamp\www\Respaldos\exportar.php' bgcolor='#eeeeec'>..\exportar.php<b>:</b>24</td></tr>
</table></font>
