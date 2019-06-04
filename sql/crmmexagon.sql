-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: crmmexagon
-- ------------------------------------------------------
-- Server version	5.5.61

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
-- Table structure for table `crm_sis_rol_reglas`
--

DROP TABLE IF EXISTS `crm_sis_rol_reglas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_sis_rol_reglas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRol` int(11) DEFAULT NULL,
  `idSeccion` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unico` (`idRol`,`idSeccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_sis_rol_reglas`
--

LOCK TABLES `crm_sis_rol_reglas` WRITE;
/*!40000 ALTER TABLE `crm_sis_rol_reglas` DISABLE KEYS */;
/*!40000 ALTER TABLE `crm_sis_rol_reglas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_cat_estados`
--

DROP TABLE IF EXISTS `crmmex_cat_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_cat_estados` (
  `id` int(11) DEFAULT NULL,
  `entidad` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `pais` int(11) DEFAULT '1',
  `status` int(11) DEFAULT '1',
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_cat_estados`
--

LOCK TABLES `crmmex_cat_estados` WRITE;
/*!40000 ALTER TABLE `crmmex_cat_estados` DISABLE KEYS */;
INSERT INTO `crmmex_cat_estados` VALUES (1,'Aguascalientes',1,1),(2,'Baja California',1,1),(3,'Baja California Sur',1,1),(4,'Campeche',1,1),(5,'Chiapas',1,1),(6,'Chihuahua',1,1),(7,'Coahuila',1,1),(8,'Colima',1,1),(9,'Distrito Federal',1,1),(10,'Durango',1,1),(11,'Estado de México',1,1),(12,'Guanajuato',1,1),(13,'Guerrero',1,1),(14,'Hidalgo',1,1),(15,'Jalisco',1,1),(16,'Michoacán',1,1),(17,'Morelos',1,1),(18,'Nayarit',1,1),(19,'Nuevo León',1,1),(20,'Oaxaca',1,1),(21,'Puebla',1,1),(22,'Querétaro',1,1),(23,'Quintana Roo',1,1),(24,'San Luís Potosí',1,1),(25,'Sinaloa',1,1),(26,'Sonora',1,1),(27,'Tabasco',1,1),(28,'Tamaulipas',1,1),(29,'Tlaxcala',1,1),(30,'Veracruz',1,1),(31,'Yucatán',1,1),(32,'Zacatecas',1,1),(33,'Ciudad de México',1,1);
/*!40000 ALTER TABLE `crmmex_cat_estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_cat_formacontacto`
--

DROP TABLE IF EXISTS `crmmex_cat_formacontacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_cat_formacontacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formaContacto` varchar(100) DEFAULT NULL,
  `fechaAlta` datetime DEFAULT NULL,
  `fechaEdicion` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_cat_formacontacto`
--

LOCK TABLES `crmmex_cat_formacontacto` WRITE;
/*!40000 ALTER TABLE `crmmex_cat_formacontacto` DISABLE KEYS */;
INSERT INTO `crmmex_cat_formacontacto` VALUES (1,'Google','2019-02-11 00:00:00','2019-02-11 00:00:00',1,1),(2,'Llamada telefónica','2019-02-11 00:00:00','2019-02-11 00:00:00',1,1);
/*!40000 ALTER TABLE `crmmex_cat_formacontacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_cat_paises`
--

DROP TABLE IF EXISTS `crmmex_cat_paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_cat_paises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_cat_paises`
--

LOCK TABLES `crmmex_cat_paises` WRITE;
/*!40000 ALTER TABLE `crmmex_cat_paises` DISABLE KEYS */;
INSERT INTO `crmmex_cat_paises` VALUES (1,'México','MEX',1),(2,'Estados Unidos','USA',1);
/*!40000 ALTER TABLE `crmmex_cat_paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_cat_productos`
--

DROP TABLE IF EXISTS `crmmex_cat_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_cat_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(45) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `grupo` int(11) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `periodicidad` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `impuesto` int(11) DEFAULT NULL,
  `divisa` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_cat_productos`
--

LOCK TABLES `crmmex_cat_productos` WRITE;
/*!40000 ALTER TABLE `crmmex_cat_productos` DISABLE KEYS */;
INSERT INTO `crmmex_cat_productos` VALUES (1,'9940560',2,3,'Servicio de Hosting','Servicio de Hosting',2,3,5000,1,1,1),(2,'9748171',49,63,'Servicio de VPS','Servicio de VPS',42,68,6000,71,50,2),(3,'CVEPROD-0666',48,63,'Nuevo producto agregado y editado','Esta en la descripcion del nuevo producto para ser agregado al catalogo',42,68,9540,71,50,3),(4,'PROD-0001',49,67,'Asesoría Informática','Asesoría profesional informática. Costo por hora ingeniero',42,68,450,71,50,1),(5,'PROD-0002',48,63,'Adendas/Complementos','Estructuras adicionales para la factura electrónica.',42,68,650,71,50,1);
/*!40000 ALTER TABLE `crmmex_cat_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_cat_statuspropuesta`
--

DROP TABLE IF EXISTS `crmmex_cat_statuspropuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_cat_statuspropuesta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_cat_statuspropuesta`
--

LOCK TABLES `crmmex_cat_statuspropuesta` WRITE;
/*!40000 ALTER TABLE `crmmex_cat_statuspropuesta` DISABLE KEYS */;
INSERT INTO `crmmex_cat_statuspropuesta` VALUES (1,'En espera',1),(2,'Aceptada',1),(3,'Rechazada',1),(4,'Pagada',1);
/*!40000 ALTER TABLE `crmmex_cat_statuspropuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_cat_statusreg`
--

DROP TABLE IF EXISTS `crmmex_cat_statusreg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_cat_statusreg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_cat_statusreg`
--

LOCK TABLES `crmmex_cat_statusreg` WRITE;
/*!40000 ALTER TABLE `crmmex_cat_statusreg` DISABLE KEYS */;
INSERT INTO `crmmex_cat_statusreg` VALUES (1,'Activo'),(2,'Inactivo'),(3,'Eliminado');
/*!40000 ALTER TABLE `crmmex_cat_statusreg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_clientes_seguimiento`
--

DROP TABLE IF EXISTS `crmmex_clientes_seguimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_clientes_seguimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clienteID` int(11) DEFAULT NULL,
  `contactoID` int(11) DEFAULT NULL,
  `tipoActividad` int(11) DEFAULT NULL,
  `nombreActividad` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `fechaAlta` datetime DEFAULT NULL,
  `fechaEjecucion` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_clientes_seguimiento`
--

LOCK TABLES `crmmex_clientes_seguimiento` WRITE;
/*!40000 ALTER TABLE `crmmex_clientes_seguimiento` DISABLE KEYS */;
INSERT INTO `crmmex_clientes_seguimiento` VALUES (1,22,9,1,'Actividad de pruebas','AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA','2019-05-02 16:50:00','2019-05-02 16:50:00',1,1),(2,22,10,3,'Seguimiento de pruebas','Se reunirá con el equipo técnico para resolver dudas referentes a la implementación del servicio.','2019-05-07 00:00:00','2019-05-07 00:00:00',1,1),(3,22,10,3,'Seguimiento de pruebas','Se reunirá con el equipo técnico para resolver dudas referentes a la implementación del servicio.','2019-05-07 00:00:00','2019-05-07 00:00:00',1,1),(4,22,10,3,'Seguimiento de pruebas','Se reunirá con el equipo técnico para resolver dudas referentes a la implementación del servicio.','2019-05-07 00:00:00','2019-05-07 00:00:00',1,1),(5,22,9,1,'Otro seguimiento','Algo de texto','2019-05-05 00:00:00','2019-05-05 00:00:00',2,1),(6,22,NULL,4,'Nuevo seguimiento en linix','Probando seguimientos','2019-05-15 00:00:00','2019-05-15 00:00:00',2,1),(7,22,NULL,1,'Seguimiento test id 23','EN ESPERA DE RETROALIMENTACION POR PARTE DEL CLIENTE','2019-05-10 00:00:00','2019-05-10 00:00:00',4,1),(8,22,9,3,'UN NUEVO SEGUIMIENTO','EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO... EDICION DE SEGUIMIENTO...',NULL,'2019-05-22 00:00:00',2,1),(9,22,15,8,'ALTA NUEVO SEGUIMIENTO','BLA BLA BLA BLA BLA BLA','2019-05-20 00:00:00',NULL,2,1);
/*!40000 ALTER TABLE `crmmex_clientes_seguimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_merc_campanias`
--

DROP TABLE IF EXISTS `crmmex_merc_campanias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_merc_campanias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_campania` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `fechaEnvio` datetime DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `from_nombre` varchar(100) DEFAULT NULL,
  `from_email` varchar(100) DEFAULT NULL,
  `id_listado_destinatarios` int(11) DEFAULT NULL,
  `pieza` longtext,
  `tipo` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_merc_campanias`
--

LOCK TABLES `crmmex_merc_campanias` WRITE;
/*!40000 ALTER TABLE `crmmex_merc_campanias` DISABLE KEYS */;
INSERT INTO `crmmex_merc_campanias` VALUES (1,'Promociones Enero','https://www.url.com/landings/promo_ene','2019-01-05 00:00:00','Promociones Enero','Mexagon.net','envios@mexagon.net',1,NULL,1,1),(2,'Dominio Gratis','https://www.url.com/landings/dominio','2019-01-30 00:00:00','Llévate un dominio sin costo','Mexagon.net','envios@mexagon.net',1,NULL,1,1),(3,'Promociones Marzo','https://www.url.com/landings/promo_mar','2019-03-05 00:00:00','Promociones Primavera','Mexagon.net','envios@mexagon.net',1,NULL,1,1),(4,'Prueba alta campania','www.pagina.con/landing','2019-06-06 00:00:00','Nueva landing page','Carlos Reyes','cvreyes@mexagon.net',1,NULL,1,0),(5,'Otra campania mas','https://www.landigncontainer.net/promocionJunio','2019-06-15 00:00:00','Probandooooooooo','Lorenzo Job','chentito002@gmail.com',1,'pieza contendio piexza',1,1),(6,'wwwwwwwwwww','wwwwwwwwww','2019-06-09 00:00:00','wwwwwwwww','qweqweq','wwwwwwwwwww',1,'<p>qweqweqwe asdasd asdasdas das asdasda sdsasda</p><p>sdasdasda asd asd asda sd asd asd asd asd ad<br></p>',1,1);
/*!40000 ALTER TABLE `crmmex_merc_campanias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_sis_admins`
--

DROP TABLE IF EXISTS `crmmex_sis_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_sis_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `appat` varchar(50) DEFAULT NULL,
  `apmat` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `extension` varchar(20) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `fechaAlta` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `fechaBaja` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_admins`
--

LOCK TABLES `crmmex_sis_admins` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_admins` DISABLE KEYS */;
INSERT INTO `crmmex_sis_admins` VALUES (1,'Carlos','Lam','Santiesteban','clam@mexagon.net','420',1,'2019-02-26 00:00:00',1,'2019-04-16 21:39:07'),(2,'José','Gutiérrez','García','jgutierrez@mexagon.net','320',2,'2019-02-26 00:00:00',1,'2019-03-14 15:55:34'),(3,'Carlos','Reyes','Salazar','cvreyes@mexagon.net','310',2,'2019-02-26 00:00:00',1,NULL),(4,'Lorenzo','Reyes','Cuellar','lorenzo@gmail.com','2912',2,'2019-02-20 00:00:00',1,'2019-03-13 22:10:35'),(16,'Vendedor','Dos','Dos','chentito002@gmail.com','315',2,'2019-03-04 22:14:14',0,'2019-03-06 00:46:47');
/*!40000 ALTER TABLE `crmmex_sis_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_sis_bitacora`
--

DROP TABLE IF EXISTS `crmmex_sis_bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_sis_bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `recurso` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `accion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=999 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_bitacora`
--

LOCK TABLES `crmmex_sis_bitacora` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_bitacora` DISABLE KEYS */;
INSERT INTO `crmmex_sis_bitacora` VALUES (1,1,'BLa bla','2019-05-20 16:31:05','Aqui va la descripcion que se debera registrar'),(2,1,'BLa bla','2019-05-20 16:31:09','Aqui va la descripcion que se debera registrar'),(3,1,'BLa bla','2019-05-20 16:31:11','Aqui va la descripcion que se debera registrar'),(4,1,'BLa bla','2019-05-20 16:31:16','Aqui va la descripcion que se debera registrar'),(5,1,'BLa bla','2019-05-20 16:31:32','Aqui va la descripcion que se debera registrar'),(6,1,'BLa bla','2019-05-20 16:31:34','Aqui va la descripcion que se debera registrar'),(7,1,'BLa bla','2019-05-20 16:31:39','Aqui va la descripcion que se debera registrar'),(8,1,'BLa bla','2019-05-20 16:33:40','Aqui va la descripcion que se debera registrar'),(9,21,'BLa bla','2019-05-20 16:36:17','Aqui va la descripcion que se debera registrar'),(10,21,'BLa bla','2019-05-20 16:36:26','Aqui va la descripcion que se debera registrar'),(11,21,NULL,'2019-05-20 16:38:48','Aqui va la descripcion que se debera registrar'),(12,21,NULL,'2019-05-20 16:38:51','Aqui va la descripcion que se debera registrar'),(13,21,NULL,'2019-05-20 16:39:02','Aqui va la descripcion que se debera registrar'),(14,21,NULL,'2019-05-20 16:39:05','Aqui va la descripcion que se debera registrar'),(15,21,NULL,'2019-05-20 16:39:09','Aqui va la descripcion que se debera registrar'),(16,21,NULL,'2019-05-20 16:42:46','Aqui va la descripcion que se debera registrar'),(17,21,NULL,'2019-05-20 16:47:28','Aqui va la descripcion que se debera registrar'),(18,21,NULL,'2019-05-20 16:50:06','Aqui va la descripcion que se debera registrar'),(19,21,NULL,'2019-05-20 16:50:12','Aqui va la descripcion que se debera registrar'),(20,21,'http://192.168.30.104/contenidos/clientes_alta','2019-05-20 16:55:13','Aqui va la descripcion que se debera registrar'),(21,21,'http://192.168.30.104/contenidos/clientes_listado','2019-05-20 16:55:31','Aqui va la descripcion que se debera registrar'),(22,21,'http://192.168.30.104/contenidos/clientes_alta','2019-05-20 16:55:35','Aqui va la descripcion que se debera registrar'),(23,21,'http://192.168.30.104/contenidos/mercadotecnia_listado','2019-05-20 16:55:58','Aqui va la descripcion que se debera registrar'),(24,21,'http://192.168.30.104/contenidos/ventas_facturas','2019-05-20 16:56:00','Aqui va la descripcion que se debera registrar'),(25,21,'http://192.168.30.104/contenidos/configuraciones_pipeline','2019-05-20 16:56:02','Aqui va la descripcion que se debera registrar'),(26,21,'http://192.168.30.104/contenidos/configuraciones_adicionales','2019-05-20 16:56:05','Aqui va la descripcion que se debera registrar'),(27,21,'http://192.168.30.104/contenidos/configuraciones_smtp','2019-05-20 16:56:06','Aqui va la descripcion que se debera registrar'),(28,21,'http://192.168.30.104/contenidos/configuraciones_branding','2019-05-20 16:56:08','Aqui va la descripcion que se debera registrar'),(29,21,'http://192.168.30.104/contenidos/ejecutivos_perfil','2019-05-20 16:56:10','Aqui va la descripcion que se debera registrar'),(30,21,'http://192.168.30.104/contenidos/ejecutivos_actividades','2019-05-20 16:56:12','Aqui va la descripcion que se debera registrar'),(31,21,'http://192.168.30.104/contenidos/clientes_alta','2019-05-20 16:58:42',''),(32,21,'http://192.168.30.104/logout','2019-05-20 17:23:51',''),(33,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 17:50:48',''),(34,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 18:35:59',''),(35,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 18:53:08',''),(36,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 18:54:12',''),(37,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 18:54:43',''),(38,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 19:00:32',''),(39,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 19:01:52',''),(40,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 19:02:52',''),(41,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 19:08:19',''),(42,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 19:08:45',''),(43,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 19:15:22',''),(44,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 19:15:47',''),(45,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 19:43:16',''),(46,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 19:45:01',''),(47,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 19:45:06',''),(48,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 19:46:03',''),(49,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 21:00:42',''),(50,21,'http://192.168.30.104/contenidos/dashboard','2019-05-20 21:17:38',''),(51,22,'http://192.168.30.104/contenidos/dashboard','2019-05-20 21:29:11',''),(52,22,'http://192.168.30.104/contenidos/dashboard','2019-05-20 21:38:43',''),(53,22,'http://192.168.30.104/contenidos/dashboard','2019-05-20 22:43:54',''),(54,22,'http://192.168.30.104/contenidos/dashboard','2019-05-20 22:44:55',''),(55,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 15:02:08',''),(56,22,'http://192.168.30.104/contenidos/clientes_alta','2019-05-21 15:03:23',''),(57,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 15:04:19',''),(58,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 15:04:53',''),(59,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 15:21:12',''),(60,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 15:22:10',''),(61,22,'http://192.168.30.104/contenidos/clientes_alta','2019-05-21 15:22:24',''),(62,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 15:22:26',''),(63,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 15:36:11',''),(64,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 15:36:39',''),(65,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 15:37:06',''),(66,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 15:49:58',''),(67,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 15:50:25',''),(68,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 15:50:27',''),(69,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 15:50:42',''),(70,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 15:50:45',''),(71,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 15:51:34',''),(72,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 15:53:19',''),(73,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 15:53:28',''),(74,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 15:55:46',''),(75,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 15:55:57',''),(76,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 15:56:22',''),(77,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 15:56:33',''),(78,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 15:56:40',''),(79,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 15:56:43',''),(80,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:01:15',''),(81,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:01:35',''),(82,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 16:01:39',''),(83,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:02:02',''),(84,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 16:02:42',''),(85,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:03:03',''),(86,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:08:09',''),(87,22,'http://192.168.30.104/contenidos/clientes_alta','2019-05-21 16:08:13',''),(88,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:08:15',''),(89,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:08:17',''),(90,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 16:08:58',''),(91,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 16:09:20',''),(92,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:09:48',''),(93,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 16:10:34',''),(94,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:10:37',''),(95,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 16:19:21',''),(96,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:19:39',''),(97,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 16:20:50',''),(98,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:21:00',''),(99,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:21:25',''),(100,22,'http://192.168.30.104/contenidos/clientes_alta','2019-05-21 16:21:27',''),(101,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 16:21:30',''),(102,26,'http://192.168.30.104/contenidos/dashboard','2019-05-21 17:07:53',''),(103,26,'http://192.168.30.104/contenidos/dashboard','2019-05-21 17:16:10',''),(104,26,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 17:16:13',''),(105,26,'http://192.168.30.104/contenidos/dashboard','2019-05-21 18:22:11',''),(106,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 18:38:16',''),(107,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 18:39:10',''),(108,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 18:40:09',''),(109,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 18:41:06',''),(110,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 18:41:22',''),(111,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 18:55:52',''),(112,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 18:56:17',''),(113,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 18:56:23',''),(114,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 18:56:27',''),(115,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 18:59:55',''),(116,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 19:00:12',''),(117,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 19:00:48',''),(118,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 19:01:05',''),(119,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 19:01:52',''),(120,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 19:02:04',''),(121,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 19:05:36',''),(122,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 19:05:42',''),(123,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 19:34:11',''),(124,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 22:53:36',''),(125,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-21 22:57:26',''),(126,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 23:00:32',''),(127,22,'http://192.168.30.104/contenidos/dashboard','2019-05-21 23:47:46',''),(128,22,'http://192.168.30.104/contenidos/dashboard','2019-05-22 14:18:51',''),(129,22,'http://192.168.30.104/contenidos/ejecutivos_roles','2019-05-22 15:33:51',''),(130,22,'http://192.168.30.104/contenidos/ejecutivos_reportes','2019-05-22 15:35:07',''),(131,22,'http://192.168.30.104/contenidos/ejecutivos_listado','2019-05-22 15:35:09',''),(132,22,'http://192.168.30.104/contenidos/ejecutivos_perfil','2019-05-22 15:35:15',''),(133,22,'http://192.168.30.104/contenidos/dashboard','2019-05-22 15:35:32',''),(134,22,'http://192.168.30.104/contenidos/dashboard','2019-05-22 15:35:38',''),(135,22,'http://192.168.30.104/contenidos/ejecutivos_actividades','2019-05-22 15:37:31',''),(136,22,'http://192.168.30.104/contenidos/clientes_alta','2019-05-22 15:37:36',''),(137,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 15:37:50',''),(138,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 15:38:51',''),(139,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 15:41:13',''),(140,22,'http://192.168.30.104/contenidos/clientes_alta','2019-05-22 15:41:22',''),(141,22,'http://192.168.30.104/contenidos/ventas_facturas','2019-05-22 15:41:28',''),(142,22,'http://192.168.30.104/contenidos/clientes_alta','2019-05-22 15:49:45',''),(143,22,'http://192.168.30.104/contenidos/dashboard','2019-05-22 16:10:24',''),(144,22,'http://192.168.30.104/contenidos/clientes_alta','2019-05-22 16:10:26',''),(145,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:10:33',''),(146,22,'http://192.168.30.104/contenidos/clientes_alta','2019-05-22 16:10:41',''),(147,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:10:50',''),(148,22,'http://192.168.30.104/contenidos/clientes_edicion/66','2019-05-22 16:11:43',''),(149,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:13:46',''),(150,22,'http://192.168.30.104/contenidos/clientes_edicion/66','2019-05-22 16:13:53',''),(151,22,'http://192.168.30.104/contenidos/clientes_alta','2019-05-22 16:14:23',''),(152,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:14:27',''),(153,22,'http://192.168.30.104/contenidos/clientes_edicion/66','2019-05-22 16:14:43',''),(154,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:18:23',''),(155,22,'http://192.168.30.104/contenidos/clientes_edicion/26','2019-05-22 16:18:27',''),(156,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:18:56',''),(157,22,'http://192.168.30.104/contenidos/clientes_edicion/26','2019-05-22 16:18:58',''),(158,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:21:12',''),(159,22,'http://192.168.30.104/contenidos/clientes_edicion/26','2019-05-22 16:21:15',''),(160,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:21:23',''),(161,22,'http://192.168.30.104/contenidos/clientes_edicion/26','2019-05-22 16:21:26',''),(162,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:22:33',''),(163,22,'http://192.168.30.104/contenidos/clientes_edicion/27','2019-05-22 16:22:36',''),(164,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:22:43',''),(165,22,'http://192.168.30.104/contenidos/clientes_edicion/26','2019-05-22 16:22:46',''),(166,22,'http://192.168.30.104/contenidos/dashboard','2019-05-22 16:27:24',''),(167,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:27:59',''),(168,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:28:05',''),(169,22,'http://192.168.30.104/contenidos/clientes_edicion/26','2019-05-22 16:28:12',''),(170,22,'http://192.168.30.104/contenidos/clientes_alta','2019-05-22 16:37:27',''),(171,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:37:32',''),(172,22,'http://192.168.30.104/contenidos/clientes_edicion/26','2019-05-22 16:37:38',''),(173,22,'http://192.168.30.104/contenidos/dashboard','2019-05-22 16:47:02',''),(174,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 16:47:12',''),(175,22,'http://192.168.30.104/contenidos/clientes_edicion/26','2019-05-22 16:47:32',''),(176,22,'http://192.168.30.104/contenidos/dashboard','2019-05-22 17:41:22',''),(177,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 17:41:24',''),(178,22,'http://192.168.30.104/contenidos/clientes_edicion/26','2019-05-22 17:41:27',''),(179,22,'http://192.168.30.104/contenidos/clientes_edicion/26','2019-05-22 17:54:23',''),(180,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 17:58:20',''),(181,22,'http://192.168.30.104/contenidos/clientes_edicion/26','2019-05-22 17:58:22',''),(182,22,'http://192.168.30.104/contenidos/clientes_edicion/26','2019-05-22 18:02:08',''),(183,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 18:02:33',''),(184,22,'http://192.168.30.104/contenidos/clientes_edicion/27','2019-05-22 18:02:37',''),(185,22,'http://192.168.30.104/contenidos/clientes_edicion/27','2019-05-22 18:02:50',''),(186,22,'http://192.168.30.104/contenidos/clientes_edicion/27','2019-05-22 18:04:18',''),(187,22,'http://192.168.30.104/contenidos/clientes_listado','2019-05-22 18:04:24',''),(188,22,'http://192.168.30.104/contenidos/clientes_edicion/27','2019-05-22 18:04:28',''),(189,22,'http://192.168.30.104/contenidos/dashboard','2019-05-22 18:43:02',''),(190,22,'http://192.168.30.104/contenidos/dashboard','2019-05-23 14:24:06',''),(191,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 14:54:18',''),(192,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 14:54:27',''),(193,22,'http://192.168.30.110/contenidos/clientes_alta','2019-05-27 14:58:31',''),(194,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 14:58:53',''),(195,22,'http://192.168.30.110/contenidos/clientes_listado','2019-05-27 14:59:12',''),(196,22,'http://192.168.30.110/contenidos/clientes_edicion/26','2019-05-27 14:59:15',''),(197,22,'http://192.168.30.110/contenidos/clientes_listado','2019-05-27 14:59:25',''),(198,22,'http://192.168.30.110/contenidos/clientes_seguimiento/26','2019-05-27 14:59:28',''),(199,22,'http://192.168.30.110/contenidos/clientes_alta','2019-05-27 15:06:32',''),(200,22,'http://192.168.30.110/contenidos/clientes_listado','2019-05-27 15:06:34',''),(201,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 15:51:36',''),(202,22,'http://192.168.30.110/contenidos/clientes_alta','2019-05-27 15:51:39',''),(203,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 15:51:46',''),(204,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 15:55:41',''),(205,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 16:02:03',''),(206,22,'http://192.168.30.110/contenidos/clientes_alta','2019-05-27 16:03:20',''),(207,22,'http://192.168.30.110/contenidos/clientes_listado','2019-05-27 16:03:22',''),(208,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 16:03:26',''),(209,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:22:19',''),(210,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:22:25',''),(211,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:22:32',''),(212,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:24:51',''),(213,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:25:10',''),(214,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:26:23',''),(215,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:27:13',''),(216,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:27:24',''),(217,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:27:28',''),(218,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:27:46',''),(219,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:27:51',''),(220,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:28:07',''),(221,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:28:14',''),(222,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:32:55',''),(223,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:33:20',''),(224,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:33:38',''),(225,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:42:11',''),(226,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:51:39',''),(227,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:52:12',''),(228,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:52:53',''),(229,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:55:09',''),(230,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 17:55:29',''),(231,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 21:03:44',''),(232,22,'http://192.168.30.110/contenidos/dashboard','2019-05-27 21:50:57',''),(233,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 14:13:59',''),(234,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 14:45:44',''),(235,22,'http://192.168.30.110/contenidos/clientes_alta','2019-05-28 14:50:22',''),(236,22,'http://192.168.30.110/contenidos/clientes_listado','2019-05-28 14:50:25',''),(237,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 14:50:41',''),(238,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 14:50:43',''),(239,22,'http://192.168.30.110/contenidos/clientes_alta','2019-05-28 14:53:42',''),(240,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 14:53:45',''),(241,22,'http://192.168.30.110/contenidos/clientes_alta','2019-05-28 14:54:30',''),(242,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 14:54:37',''),(243,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 14:56:13',''),(244,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 14:56:38',''),(245,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 14:57:40',''),(246,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 14:58:16',''),(247,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:00:19',''),(248,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:00:39',''),(249,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:01:10',''),(250,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:01:38',''),(251,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:01:48',''),(252,22,'http://192.168.30.110/contenidos/clientes_alta','2019-05-28 15:01:55',''),(253,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:02:00',''),(254,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:02:38',''),(255,22,'http://192.168.30.110/contenidos/clientes_alta','2019-05-28 15:02:41',''),(256,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:02:43',''),(257,22,'http://192.168.30.110/contenidos/clientes_alta','2019-05-28 15:02:47',''),(258,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:02:50',''),(259,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:06:53',''),(260,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:08:08',''),(261,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:08:26',''),(262,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:11:47',''),(263,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:11:51',''),(264,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:12:11',''),(265,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:12:17',''),(266,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:12:28',''),(267,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:12:55',''),(268,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:13:38',''),(269,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:13:48',''),(270,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:17:41',''),(271,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:17:52',''),(272,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:18:06',''),(273,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:18:08',''),(274,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:18:19',''),(275,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 15:18:23',''),(276,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 15:18:25',''),(277,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:18:28',''),(278,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:18:30',''),(279,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:18:32',''),(280,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:21:56',''),(281,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:24:55',''),(282,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:26:04',''),(283,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:26:23',''),(284,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:28:19',''),(285,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:29:19',''),(286,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:29:38',''),(287,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:30:51',''),(288,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:33:34',''),(289,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:34:05',''),(290,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:34:53',''),(291,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:35:33',''),(292,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:36:27',''),(293,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:36:49',''),(294,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:37:16',''),(295,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 15:37:36',''),(296,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:37:39',''),(297,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:38:03',''),(298,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:38:18',''),(299,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:38:33',''),(300,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:39:05',''),(301,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:39:30',''),(302,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 15:40:30',''),(303,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:40:33',''),(304,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 15:40:36',''),(305,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:40:39',''),(306,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 15:40:42',''),(307,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:40:45',''),(308,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 15:40:53',''),(309,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:40:58',''),(310,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 15:41:03',''),(311,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:41:09',''),(312,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 15:41:15',''),(313,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:41:20',''),(314,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:41:23',''),(315,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:41:44',''),(316,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:41:55',''),(317,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:42:02',''),(318,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:42:05',''),(319,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:42:09',''),(320,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:42:11',''),(321,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:42:35',''),(322,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:44:32',''),(323,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:44:51',''),(324,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:44:57',''),(325,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:44:59',''),(326,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:45:01',''),(327,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:45:03',''),(328,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:45:05',''),(329,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:46:08',''),(330,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:46:44',''),(331,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:47:50',''),(332,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:48:09',''),(333,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:48:32',''),(334,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:48:45',''),(335,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:49:20',''),(336,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:49:47',''),(337,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 15:50:50',''),(338,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:50:53',''),(339,22,'http://192.168.30.110/contenidos/clientes_alta','2019-05-28 15:51:01',''),(340,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:51:11',''),(341,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 15:51:29',''),(342,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 15:51:41',''),(343,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 15:52:05',''),(344,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 15:52:07',''),(345,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:52:08',''),(346,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-05-28 15:53:27',''),(347,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:53:37',''),(348,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 15:54:35',''),(349,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 15:55:11',''),(350,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 15:55:12',''),(351,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 15:55:17',''),(352,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 15:55:18',''),(353,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 15:55:20',''),(354,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 15:57:00',''),(355,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:01:45',''),(356,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:02:56',''),(357,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:03:50',''),(358,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 16:04:04',''),(359,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 16:04:06',''),(360,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:04:08',''),(361,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:04:35',''),(362,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:04:37',''),(363,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:05:23',''),(364,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:05:54',''),(365,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:06:04',''),(366,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:10:19',''),(367,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:10:41',''),(368,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:10:54',''),(369,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:15:09',''),(370,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 16:15:46',''),(371,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:15:48',''),(372,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:16:04',''),(373,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:16:27',''),(374,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:16:29',''),(375,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:17:24',''),(376,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:20:31',''),(377,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:21:15',''),(378,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:21:28',''),(379,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:23:38',''),(380,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:25:24',''),(381,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:27:08',''),(382,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:27:22',''),(383,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:29:50',''),(384,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:30:45',''),(385,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:31:50',''),(386,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:32:03',''),(387,22,'http://192.168.30.110/contenidos/configuraciones_pipeline','2019-05-28 16:32:04',''),(388,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 16:32:09',''),(389,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 16:32:11',''),(390,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-05-28 16:32:13',''),(391,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-05-28 16:32:17',''),(392,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-05-28 16:32:20',''),(393,22,'http://192.168.30.110/contenidos/configuraciones_forecast','2019-05-28 16:32:26',''),(394,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 16:36:22',''),(395,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 16:37:01',''),(396,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 16:37:08',''),(397,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 16:37:14',''),(398,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 16:37:20',''),(399,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 16:44:45',''),(400,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 16:51:23',''),(401,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 16:52:15',''),(402,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 16:52:54',''),(403,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 16:53:08',''),(404,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 16:53:53',''),(405,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 16:54:25',''),(406,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 17:00:00',''),(407,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 17:00:42',''),(408,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 17:07:44',''),(409,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 17:08:15',''),(410,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 17:18:52',''),(411,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 17:41:18',''),(412,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 17:44:14',''),(413,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-05-28 17:44:51',''),(414,22,'http://192.168.30.110/contenidos/ejecutivos_reportes','2019-05-28 17:44:55',''),(415,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 17:44:58',''),(416,22,'http://192.168.30.110/contenidos/ejecutivos_roles','2019-05-28 17:45:03',''),(417,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 17:45:27',''),(418,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 17:46:52',''),(419,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 17:47:55',''),(420,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 17:48:02',''),(421,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 17:48:06',''),(422,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 17:48:36',''),(423,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 17:49:00',''),(424,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 18:12:55',''),(425,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:14:46',''),(426,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:14:58',''),(427,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 18:16:04',''),(428,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:16:27',''),(429,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:18:28',''),(430,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:18:57',''),(431,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:19:21',''),(432,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:19:31',''),(433,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:19:51',''),(434,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:20:05',''),(435,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:20:31',''),(436,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:21:00',''),(437,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:21:21',''),(438,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 18:28:28',''),(439,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:28:50',''),(440,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 18:29:42',''),(441,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:30:07',''),(442,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 18:30:37',''),(443,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:30:39',''),(444,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:32:04',''),(445,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:32:31',''),(446,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:34:26',''),(447,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 18:35:15',''),(448,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:35:17',''),(449,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 18:35:53',''),(450,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:35:57',''),(451,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:45:54',''),(452,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:46:47',''),(453,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 18:50:16',''),(454,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-05-28 18:51:11',''),(455,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-05-28 18:57:02',''),(456,22,'http://192.168.30.110/contenidos/ejecutivos_reportes','2019-05-28 18:59:07',''),(457,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 18:59:16',''),(458,22,'http://192.168.30.110/contenidos/clientes_alta','2019-05-28 18:59:40',''),(459,22,'http://192.168.30.110/contenidos/clientes_listado','2019-05-28 18:59:43',''),(460,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 18:59:47',''),(461,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 19:00:07',''),(462,22,'http://192.168.30.110/contenidos/clientes_listado','2019-05-28 19:01:21',''),(463,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 19:01:29',''),(464,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 19:01:49',''),(465,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 19:02:08',''),(466,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 19:50:07',''),(467,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 19:51:47',''),(468,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 19:54:43',''),(469,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-28 19:54:46',''),(470,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 19:54:54',''),(471,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-28 19:56:51',''),(472,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 19:57:42',''),(473,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-28 19:57:45',''),(474,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 20:00:12',''),(475,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-28 20:00:16',''),(476,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-05-28 21:02:36',''),(477,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-28 21:02:39',''),(478,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 21:02:48',''),(479,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-28 21:02:55',''),(480,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 21:05:44',''),(481,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-28 21:05:46',''),(482,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 21:06:14',''),(483,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-28 21:06:16',''),(484,22,'http://192.168.30.110/contenidos/dashboard','2019-05-28 21:07:51',''),(485,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 21:07:54',''),(486,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-28 21:07:56',''),(487,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-28 21:08:20',''),(488,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-28 21:08:22',''),(489,22,'http://192.168.30.110/contenidos/dashboard','2019-05-29 14:16:02',''),(490,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-29 14:16:12',''),(491,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-05-29 14:16:26',''),(492,22,'http://192.168.30.110/contenidos/ejecutivos_reportes','2019-05-29 14:16:29',''),(493,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 14:16:33',''),(494,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-29 15:13:52',''),(495,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:12:06',''),(496,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-29 16:12:09',''),(497,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:14:36',''),(498,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:15:34',''),(499,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:16:04',''),(500,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-05-29 16:20:49',''),(501,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:25:58',''),(502,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-29 16:26:00',''),(503,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:27:00',''),(504,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-29 16:27:02',''),(505,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:28:35',''),(506,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/3','2019-05-29 16:28:38',''),(507,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:29:08',''),(508,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-29 16:29:10',''),(509,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:29:36',''),(510,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-29 16:29:38',''),(511,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:31:31',''),(512,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/3','2019-05-29 16:31:33',''),(513,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:32:17',''),(514,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-29 16:32:19',''),(515,22,'http://192.168.30.110/contenidos/listadoEjecutivos','2019-05-29 16:32:21',''),(516,22,'http://192.168.30.110/contenidos/dashboard','2019-05-29 16:33:00',''),(517,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:33:04',''),(518,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-29 16:33:07',''),(519,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:33:09',''),(520,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/4','2019-05-29 16:33:13',''),(521,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:36:59',''),(522,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/3','2019-05-29 16:37:02',''),(523,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:51:16',''),(524,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-29 16:51:32',''),(525,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:51:59',''),(526,22,'http://192.168.30.110/contenidos/dashboard','2019-05-29 16:51:59',''),(527,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:52:03',''),(528,22,'http://192.168.30.110/contenidos/dashboard','2019-05-29 16:52:08',''),(529,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:52:11',''),(530,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-29 16:52:13',''),(531,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:52:17',''),(532,22,'http://192.168.30.110/contenidos/dashboard','2019-05-29 16:52:17',''),(533,22,'http://192.168.30.110/contenidos/dashboard','2019-05-29 16:53:19',''),(534,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:53:22',''),(535,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-29 16:53:24',''),(536,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:53:27',''),(537,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/3','2019-05-29 16:53:30',''),(538,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:53:33',''),(539,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/4','2019-05-29 16:53:35',''),(540,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:53:37',''),(541,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/2','2019-05-29 16:53:39',''),(542,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:53:41',''),(543,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/3','2019-05-29 16:53:44',''),(544,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-29 16:53:46',''),(545,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-29 16:54:05',''),(546,22,'http://192.168.30.110/contenidos/dashboard','2019-05-29 22:11:17',''),(547,22,'http://192.168.30.110/contenidos/dashboard','2019-05-29 22:12:33',''),(548,22,'http://192.168.30.110/contenidos/dashboard','2019-05-30 14:02:33',''),(549,22,'http://192.168.30.110/contenidos/dashboard','2019-05-30 14:44:10',''),(550,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:03:14',''),(551,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-30 15:03:16',''),(552,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:11:45',''),(553,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:16:07',''),(554,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:18:44',''),(555,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:19:00',''),(556,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:19:07',''),(557,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:23:19',''),(558,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 15:23:21',''),(559,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:30:21',''),(560,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-30 15:30:23',''),(561,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:30:29',''),(562,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 15:30:32',''),(563,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:31:16',''),(564,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-30 15:31:20',''),(565,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:31:28',''),(566,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 15:31:31',''),(567,22,'http://192.168.30.110/contenidos/dashboard','2019-05-30 15:31:35',''),(568,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:31:40',''),(569,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-30 15:31:43',''),(570,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:37:04',''),(571,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/1','2019-05-30 15:37:09',''),(572,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:39:21',''),(573,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:40:17',''),(574,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:40:38',''),(575,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:42:37',''),(576,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 15:42:43',''),(577,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:44:17',''),(578,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 15:44:20',''),(579,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:45:47',''),(580,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 15:46:00',''),(581,22,'http://192.168.30.110/contenidos/dashboard','2019-05-30 15:46:04',''),(582,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:46:07',''),(583,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 15:46:10',''),(584,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:48:52',''),(585,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 15:48:54',''),(586,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:50:22',''),(587,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 15:50:24',''),(588,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:51:38',''),(589,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 15:51:40',''),(590,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:51:42',''),(591,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 15:51:44',''),(592,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:51:47',''),(593,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 15:51:50',''),(594,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:52:02',''),(595,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 15:52:04',''),(596,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 15:52:09',''),(597,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 15:52:12',''),(598,22,'http://192.168.30.110/contenidos/dashboard','2019-05-30 16:11:54',''),(599,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 16:11:58',''),(600,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 16:12:01',''),(601,22,'http://192.168.30.110/contenidos/dashboard','2019-05-30 16:14:22',''),(602,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 16:14:25',''),(603,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 16:14:28',''),(604,22,'http://192.168.30.110/contenidos/dashboard','2019-05-30 16:14:34',''),(605,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 16:14:37',''),(606,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 16:14:40',''),(607,22,'http://192.168.30.110/contenidos/dashboard','2019-05-30 16:15:17',''),(608,22,'http://192.168.30.110/contenidos/dashboard','2019-05-30 16:15:22',''),(609,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 16:15:45',''),(610,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 16:15:49',''),(611,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 16:15:51',''),(612,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 16:15:54',''),(613,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 16:15:57',''),(614,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 16:15:59',''),(615,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 16:27:58',''),(616,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 16:28:05',''),(617,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 16:32:23',''),(618,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 16:32:26',''),(619,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 17:11:59',''),(620,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 17:14:17',''),(621,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 17:14:47',''),(622,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 17:14:49',''),(623,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 17:19:17',''),(624,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 17:19:19',''),(625,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 18:02:52',''),(626,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-05-30 18:03:33',''),(627,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 18:05:54',''),(628,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/29','2019-05-30 18:06:00',''),(629,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 18:10:25',''),(630,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 18:10:27',''),(631,22,'http://192.168.30.110/contenidos/dashboard','2019-05-30 18:45:11',''),(632,22,'http://192.168.30.110/contenidos/dashboard','2019-05-30 18:45:22',''),(633,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 18:45:25',''),(634,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 18:45:32',''),(635,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 18:49:38',''),(636,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 18:49:40',''),(637,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 18:49:58',''),(638,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 18:50:00',''),(639,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 18:50:21',''),(640,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 18:50:24',''),(641,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 18:55:27',''),(642,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 18:55:30',''),(643,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-05-30 18:55:41',''),(644,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-05-30 18:55:51',''),(645,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 13:35:01',''),(646,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 14:23:42',''),(647,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 14:24:54',''),(648,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 14:28:25',''),(649,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:05:26',''),(650,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:05:37',''),(651,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:06:30',''),(652,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:07:06',''),(653,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:07:49',''),(654,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:24:18',''),(655,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:24:44',''),(656,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:25:01',''),(657,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:25:37',''),(658,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:28:01',''),(659,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:28:35',''),(660,22,'http://192.168.30.110/contenidos/clientes_alta','2019-06-03 16:28:40',''),(661,22,'http://192.168.30.110/contenidos/clientes_listado','2019-06-03 16:28:43',''),(662,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:28:48',''),(663,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 16:36:04',''),(664,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 17:39:04',''),(665,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 17:39:42',''),(666,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 21:32:55',''),(667,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 22:02:48',''),(668,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 22:03:27',''),(669,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-06-03 22:03:33',''),(670,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 22:03:36',''),(671,22,'http://192.168.30.110/contenidos/ejecutivo_elimina/22','2019-06-03 22:03:39',''),(672,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 22:20:12',''),(673,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 22:20:16',''),(674,22,'http://192.168.30.110/contenidos/ejecutivo_elimina/22','2019-06-03 22:20:18',''),(675,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 22:20:38',''),(676,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 22:21:20',''),(677,22,'http://192.168.30.110/contenidos/ejecutivo_elimina/22','2019-06-03 22:21:25',''),(678,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 22:22:59',''),(679,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 22:23:02',''),(680,22,'http://192.168.30.110/contenidos/ejecutivos_elimina/22','2019-06-03 22:23:05',''),(681,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 22:23:27',''),(682,22,'http://192.168.30.110/contenidos/ejecutivos_elimina/22','2019-06-03 22:23:30',''),(683,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 22:23:33',''),(684,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 22:24:21',''),(685,22,'http://192.168.30.110/contenidos/ejecutivos_elimina/22','2019-06-03 22:24:24',''),(686,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 22:24:37',''),(687,22,'http://192.168.30.110/contenidos/ejecutivos_elimina/22','2019-06-03 22:24:40',''),(688,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 22:25:32',''),(689,22,'http://192.168.30.110/contenidos/ejecutivos_elimina/29','2019-06-03 22:25:38',''),(690,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-03 22:25:52',''),(691,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:35:59',''),(692,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:42:05',''),(693,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:42:18',''),(694,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:42:31',''),(695,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 22:43:31',''),(696,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:43:43',''),(697,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:46:48',''),(698,22,'http://192.168.30.110/contenidos/mercadotecnia_estadisticas','2019-06-03 22:47:14',''),(699,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:47:18',''),(700,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 22:47:21',''),(701,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:47:28',''),(702,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 22:47:36',''),(703,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:52:00',''),(704,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 22:52:04',''),(705,22,'http://192.168.30.110/contenidos/dashboard','2019-06-03 22:52:43',''),(706,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:52:47',''),(707,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 22:52:49',''),(708,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:53:20',''),(709,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 22:53:24',''),(710,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:55:56',''),(711,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 22:55:59',''),(712,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:57:28',''),(713,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 22:57:30',''),(714,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:57:49',''),(715,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 22:57:51',''),(716,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 22:58:13',''),(717,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 22:58:16',''),(718,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 23:05:21',''),(719,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 23:05:24',''),(720,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 23:07:28',''),(721,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 23:07:30',''),(722,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 23:07:56',''),(723,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 23:07:58',''),(724,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 23:08:53',''),(725,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 23:08:55',''),(726,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 23:09:17',''),(727,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 23:09:20',''),(728,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 23:09:26',''),(729,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-03 23:34:52',''),(730,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 23:34:55',''),(731,22,'http://192.168.30.110/contenidos/mercadotecnia_estadisticas','2019-06-03 23:34:57',''),(732,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-03 23:35:01',''),(733,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 00:02:21',''),(734,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 14:38:57',''),(735,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 14:39:33',''),(736,22,'http://192.168.30.110/contenidos/clientes_alta','2019-06-04 14:40:15',''),(737,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 14:41:50',''),(738,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 14:42:19',''),(739,22,'http://192.168.30.110/contenidos/mercadotecnia_campanias','2019-06-04 14:42:22',''),(740,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 14:43:41',''),(741,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 14:43:44',''),(742,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 14:44:04',''),(743,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 14:44:07',''),(744,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 14:59:57',''),(745,22,'http://192.168.30.110/contenidos/mercadotecnia_campanias','2019-06-04 15:00:03',''),(746,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:04:12',''),(747,22,'http://192.168.30.110/contenidos/mercadotecnia_campanias','2019-06-04 15:04:16',''),(748,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:07:52',''),(749,22,'http://192.168.30.110/contenidos/mercadotecnia_campanias','2019-06-04 15:07:56',''),(750,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:09:36',''),(751,22,'http://192.168.30.110/contenidos/mercadotecnia_campanias','2019-06-04 15:09:38',''),(752,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 15:26:58',''),(753,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-06-04 15:27:23',''),(754,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 15:27:27',''),(755,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:27:29',''),(756,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:28:02',''),(757,22,'http://192.168.30.110/contenidos/mercadotecnia_campanias','2019-06-04 15:28:30',''),(758,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:29:46',''),(759,22,'http://192.168.30.110/contenidos/mercadotecnia_campanias','2019-06-04 15:29:59',''),(760,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:30:26',''),(761,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 15:30:36',''),(762,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:30:39',''),(763,22,'http://192.168.30.110/contenidos/mercadotecnia_campanias','2019-06-04 15:30:51',''),(764,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:31:37',''),(765,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 15:31:39',''),(766,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:37:22',''),(767,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 15:37:24',''),(768,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:38:19',''),(769,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 15:38:27',''),(770,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 15:40:42',''),(771,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:40:45',''),(772,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 15:40:47',''),(773,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:41:06',''),(774,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 15:41:12',''),(775,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:43:11',''),(776,22,'http://192.168.30.110/contenidos/mercadotecnia_campanias','2019-06-04 15:43:27',''),(777,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:43:29',''),(778,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:43:54',''),(779,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 15:43:58',''),(780,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:46:18',''),(781,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 15:46:25',''),(782,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:46:44',''),(783,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 15:46:52',''),(784,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:47:49',''),(785,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 15:47:53',''),(786,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:48:15',''),(787,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 15:48:17',''),(788,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:48:55',''),(789,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle','2019-06-04 15:48:58',''),(790,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:49:40',''),(791,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/2','2019-06-04 15:49:43',''),(792,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 15:50:10',''),(793,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/2','2019-06-04 15:50:15',''),(794,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:03:17',''),(795,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/2','2019-06-04 16:03:20',''),(796,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:04:53',''),(797,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/5','2019-06-04 16:04:56',''),(798,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:05:23',''),(799,22,'http://192.168.30.110/contenidos/mercadotecnia_estadisticas','2019-06-04 16:05:27',''),(800,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:05:30',''),(801,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/2','2019-06-04 16:05:33',''),(802,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:05:37',''),(803,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/1','2019-06-04 16:05:39',''),(804,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:05:42',''),(805,22,'http://192.168.30.110/contenidos/mercadotecnia_campanias','2019-06-04 16:06:46',''),(806,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:18:51',''),(807,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/2','2019-06-04 16:18:54',''),(808,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:20:09',''),(809,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/2','2019-06-04 16:20:12',''),(810,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:22:06',''),(811,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:27:23',''),(812,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/5','2019-06-04 16:27:28',''),(813,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:28:51',''),(814,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/5','2019-06-04 16:28:56',''),(815,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:29:58',''),(816,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:41:20',''),(817,22,'http://192.168.30.110/contenidos/mercadotecnia_elimina/2','2019-06-04 16:41:23',''),(818,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:41:28',''),(819,22,'http://192.168.30.110/contenidos/mercadotecnia_elimina/2','2019-06-04 16:41:49',''),(820,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:41:59',''),(821,22,'http://192.168.30.110/contenidos/mercadotecnia_elimina/4','2019-06-04 16:42:05',''),(822,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:42:59',''),(823,22,'http://192.168.30.110/contenidos/mercadotecnia_elimina/2','2019-06-04 16:43:02',''),(824,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:43:05',''),(825,22,'http://192.168.30.110/contenidos/mercadotecnia_elimina/4','2019-06-04 16:43:38',''),(826,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:43:41',''),(827,22,'http://192.168.30.110/contenidos/mercadotecnia_elimina/2','2019-06-04 16:43:57',''),(828,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:44:03',''),(829,22,'http://192.168.30.110/contenidos/mercadotecnia_campanias','2019-06-04 16:44:27',''),(830,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:45:15',''),(831,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/6','2019-06-04 16:45:19',''),(832,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:45:43',''),(833,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/6','2019-06-04 16:45:47',''),(834,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:45:57',''),(835,22,'http://192.168.30.110/contenidos/mercadotecnia_detalle/6','2019-06-04 16:46:01',''),(836,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:46:05',''),(837,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 16:46:25',''),(838,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 16:46:30',''),(839,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 16:46:48',''),(840,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 16:48:16',''),(841,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 16:48:35',''),(842,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 16:50:21',''),(843,22,'http://192.168.30.110/contenidos/ejecutivos_elimina/22','2019-06-04 16:50:43',''),(844,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 16:50:46',''),(845,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/24','2019-06-04 16:51:04',''),(846,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 16:51:08',''),(847,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-06-04 16:51:11',''),(848,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 16:58:02',''),(849,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-06-04 16:58:30',''),(850,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-06-04 16:59:11',''),(851,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-06-04 16:59:13',''),(852,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-06-04 16:59:16',''),(853,22,'http://192.168.30.110/contenidos/configuraciones_catalogos_productos','2019-06-04 16:59:20',''),(854,22,'http://192.168.30.110/contenidos/configuraciones_catalogos_editaProducto/2','2019-06-04 16:59:27',''),(855,22,'http://192.168.30.110/contenidos/configuraciones_catalogos_productos','2019-06-04 17:00:00',''),(856,22,'http://192.168.30.110/contenidos/configuraciones_catalogos_nuevoProducto','2019-06-04 17:00:02',''),(857,22,'http://192.168.30.110/contenidos/configuraciones_catalogos_productos','2019-06-04 17:00:16',''),(858,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:00:26',''),(859,22,'http://192.168.30.110/contenidos/ejecutivos_elimina/24','2019-06-04 17:00:40',''),(860,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:00:43',''),(861,22,'http://192.168.30.110/contenidos/ejecutivos_elimina/23','2019-06-04 17:00:47',''),(862,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:00:49',''),(863,22,'http://192.168.30.110/contenidos/ejecutivos_elimina/25','2019-06-04 17:00:52',''),(864,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:00:55',''),(865,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-06-04 17:02:30',''),(866,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:02:35',''),(867,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/26','2019-06-04 17:04:19',''),(868,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:04:27',''),(869,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-06-04 17:04:30',''),(870,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:05:44',''),(871,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/30','2019-06-04 17:05:49',''),(872,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:05:53',''),(873,30,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:06:08',''),(874,30,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:10:16',''),(875,30,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:10:48',''),(876,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:10:58',''),(877,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:11:03',''),(878,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-06-04 17:11:07',''),(879,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:11:15',''),(880,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:11:22',''),(881,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:11:27',''),(882,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-06-04 17:12:15',''),(883,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:12:18',''),(884,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-06-04 17:12:20',''),(885,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:12:24',''),(886,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/30','2019-06-04 17:12:27',''),(887,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:12:31',''),(888,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/26','2019-06-04 17:12:34',''),(889,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:12:40',''),(890,22,'http://192.168.30.110/contenidos/ejecutivos_elimina/26','2019-06-04 17:12:43',''),(891,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:12:47',''),(892,22,'http://192.168.30.110/contenidos/ejecutivos_alta','2019-06-04 17:12:49',''),(893,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:13:55',''),(894,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/22','2019-06-04 17:14:15',''),(895,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:14:21',''),(896,31,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:14:33',''),(897,31,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:14:39',''),(898,31,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:21:02',''),(899,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:21:10',''),(900,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:39:55',''),(901,22,'http://192.168.30.110/contenidos/clientes_alta','2019-06-04 17:40:12',''),(902,22,'http://192.168.30.110/contenidos/clientes_listado','2019-06-04 17:40:13',''),(903,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:40:17',''),(904,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 17:40:24',''),(905,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:42:23',''),(906,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:43:04',''),(907,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:44:10',''),(908,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:44:51',''),(909,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:49:03',''),(910,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:53:20',''),(911,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 17:59:02',''),(912,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 17:59:14',''),(913,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:00:27',''),(914,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 18:00:49',''),(915,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:01:26',''),(916,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 18:01:36',''),(917,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:03:36',''),(918,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 18:09:05',''),(919,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:12:56',''),(920,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-06-04 18:13:02',''),(921,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:13:06',''),(922,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-06-04 18:13:09',''),(923,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 18:13:13',''),(924,22,'http://192.168.30.110/contenidos/ejecutivos_roles','2019-06-04 18:13:16',''),(925,22,'http://192.168.30.110/contenidos/ejecutivos_reportes','2019-06-04 18:13:23',''),(926,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-06-04 18:13:28',''),(927,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 18:13:32',''),(928,22,'http://192.168.30.110/contenidos/clientes_listado','2019-06-04 18:14:08',''),(929,22,'http://192.168.30.110/contenidos/clientes_seguimiento/60','2019-06-04 18:14:16',''),(930,22,'http://192.168.30.110/contenidos/clientes_listado','2019-06-04 18:14:19',''),(931,22,'http://192.168.30.110/contenidos/clientes_listadoPropuestas/26','2019-06-04 18:14:23',''),(932,22,'http://192.168.30.110/contenidos/clientes_propuesta/26','2019-06-04 18:14:27',''),(933,22,'http://192.168.30.110/contenidos/clientes_listadoPropuestas/26','2019-06-04 18:14:41',''),(934,22,'http://192.168.30.110/contenidos/clientes_listado','2019-06-04 18:15:01',''),(935,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-06-04 18:15:15',''),(936,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:15:27',''),(937,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-06-04 18:15:31',''),(938,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:15:35',''),(939,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-06-04 18:15:38',''),(940,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:15:43',''),(941,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-06-04 18:15:47',''),(942,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:15:51',''),(943,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-06-04 18:15:54',''),(944,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:15:57',''),(945,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-06-04 18:16:00',''),(946,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:16:04',''),(947,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-06-04 18:16:08',''),(948,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:16:13',''),(949,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-06-04 18:16:18',''),(950,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:16:23',''),(951,22,'http://192.168.30.110/contenidos/clientes_alta','2019-06-04 18:18:02',''),(952,22,'http://192.168.30.110/contenidos/clientes_alta','2019-06-04 18:18:21',''),(953,22,'http://192.168.30.110/contenidos/clientes_listado','2019-06-04 18:19:03',''),(954,22,'http://192.168.30.110/contenidos/clientes_edicion/26','2019-06-04 18:19:23',''),(955,22,'http://192.168.30.110/contenidos/clientes_listado','2019-06-04 18:19:51',''),(956,22,'http://192.168.30.110/contenidos/clientes_seguimiento/26','2019-06-04 18:19:55',''),(957,22,'http://192.168.30.110/contenidos/clientes_nuevoseguimiento/26','2019-06-04 18:20:12',''),(958,22,'http://192.168.30.110/contenidos/clientes_seguimiento/26','2019-06-04 18:20:47',''),(959,22,'http://192.168.30.110/contenidos/clientes_editaseguimiento/1','2019-06-04 18:20:51',''),(960,22,'http://192.168.30.110/contenidos/clientes_seguimiento/26','2019-06-04 18:20:53',''),(961,22,'http://192.168.30.110/contenidos/clientes_listado','2019-06-04 18:20:56',''),(962,22,'http://192.168.30.110/contenidos/clientes_listadoPropuestas/26','2019-06-04 18:21:00',''),(963,22,'http://192.168.30.110/contenidos/clientes_propuesta/26','2019-06-04 18:21:05',''),(964,22,'http://192.168.30.110/contenidos/clientes_listadoPropuestas/26','2019-06-04 18:21:51',''),(965,22,'http://192.168.30.110/contenidos/clientes_listado','2019-06-04 18:21:55',''),(966,22,'http://192.168.30.110/contenidos/ventas_facturas','2019-06-04 18:22:02',''),(967,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 18:22:37',''),(968,22,'http://192.168.30.110/contenidos/mercadotecnia_estadisticas','2019-06-04 18:23:29',''),(969,22,'http://192.168.30.110/contenidos/mercadotecnia_listado','2019-06-04 18:23:44',''),(970,22,'http://192.168.30.110/contenidos/configuraciones_catalogos_productos','2019-06-04 18:24:54',''),(971,22,'http://192.168.30.110/contenidos/configuraciones_catalogos_editaProducto/5','2019-06-04 18:25:10',''),(972,22,'http://192.168.30.110/contenidos/configuraciones_catalogos_generales','2019-06-04 18:26:00',''),(973,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-06-04 18:26:47',''),(974,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:26:51',''),(975,22,'http://192.168.30.110/contenidos/configuraciones_smtp','2019-06-04 18:26:54',''),(976,22,'http://192.168.30.110/contenidos/configuraciones_branding','2019-06-04 18:27:28',''),(977,22,'http://192.168.30.110/contenidos/configuraciones_adicionales','2019-06-04 18:27:58',''),(978,22,'http://192.168.30.110/contenidos/ejecutivos_perfil','2019-06-04 18:28:59',''),(979,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:30:10',''),(980,22,'http://192.168.30.110/contenidos/ejecutivos_reportes','2019-06-04 18:30:57',''),(981,22,'http://192.168.30.110/contenidos/ejecutivos_listado','2019-06-04 18:31:07',''),(982,22,'http://192.168.30.110/contenidos/ejecutivos_edicion/30','2019-06-04 18:31:46',''),(983,22,'http://192.168.30.110/contenidos/ejecutivos_roles','2019-06-04 18:31:49',''),(984,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:35:58',''),(985,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:36:04',''),(986,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:36:06',''),(987,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:38:42',''),(988,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:42:30',''),(989,22,'http://192.168.30.110/contenidos/dashboard','2019-06-04 18:42:36',''),(990,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:42:38',''),(991,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:43:06',''),(992,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:43:23',''),(993,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:49:53',''),(994,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:50:39',''),(995,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:51:18',''),(996,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:52:01',''),(997,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 18:57:11',''),(998,22,'http://192.168.30.110/contenidos/ejecutivos_actividades','2019-06-04 19:04:42','');
/*!40000 ALTER TABLE `crmmex_sis_bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_sis_branding`
--

DROP TABLE IF EXISTS `crmmex_sis_branding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_sis_branding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `borde` varchar(45) DEFAULT NULL,
  `estilo` varchar(45) DEFAULT NULL,
  `boton` varchar(45) DEFAULT NULL,
  `css` varchar(45) DEFAULT NULL,
  `seleccionado` int(1) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `background` varchar(100) DEFAULT NULL,
  `usa_background` int(11) DEFAULT NULL,
  `transparencia` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_branding`
--

LOCK TABLES `crmmex_sis_branding` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_branding` DISABLE KEYS */;
INSERT INTO `crmmex_sis_branding` VALUES (1,'Obscuro','border-dark','bg-dark','btn-dark','dark.css',1,1,'',1,1),(2,'Azul 2','border-primary','bg-primary','btn-primary','blue2.css',0,1,'',0,1),(3,'Gris','border-ligth','bg-ligth','btn-ligth','grey.css',0,1,NULL,0,1),(4,'Azul 1','border-info','bg-info','btn-info','blue.css',0,1,'',0,1),(5,'Rojo','border-danger','bg-danger','btn-danger','red.css',0,1,'',0,1),(6,'Amarillo','border-warning','bg-warning','btn-warning','yellow.css',0,1,'',0,1),(7,'Verde','border-success','bg-success','btn-success','green.css',0,1,'',0,0.9),(8,'Blanco','border-white','bg-white','btn-white','white.css',0,1,'',0,1);
/*!40000 ALTER TABLE `crmmex_sis_branding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_sis_cat`
--

DROP TABLE IF EXISTS `crmmex_sis_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_sis_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_cat`
--

LOCK TABLES `crmmex_sis_cat` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_cat` DISABLE KEYS */;
INSERT INTO `crmmex_sis_cat` VALUES (1,'Categoría',1),(2,'Sub Categoría',1),(3,'Medio de Contacto',1),(4,'Empleados',1),(5,'Giro',1),(6,'Grupo',1),(7,'Área',1),(8,'Ciclo de Facturación',1),(9,'Tipo Producto',1),(10,'Divisa',1),(11,'Condición',1),(12,'Grupo Producto',1),(13,'Categoría Producto',1),(14,'Impuestos',1),(15,'Forma de Pago',1);
/*!40000 ALTER TABLE `crmmex_sis_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_sis_cat_opts`
--

DROP TABLE IF EXISTS `crmmex_sis_cat_opts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_sis_cat_opts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idCat` int(11) DEFAULT NULL,
  `opcion` varchar(100) DEFAULT NULL,
  `parametros` varchar(500) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCat_idx` (`idCat`),
  CONSTRAINT `idCat` FOREIGN KEY (`idCat`) REFERENCES `crmmex_sis_cat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_cat_opts`
--

LOCK TABLES `crmmex_sis_cat_opts` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_cat_opts` DISABLE KEYS */;
INSERT INTO `crmmex_sis_cat_opts` VALUES (1,1,'Educación',NULL,'1'),(2,1,'Gobierno',NULL,'1'),(3,1,'Tecnología',NULL,'1'),(4,1,'Economía',NULL,'1'),(5,2,'Desarrollo',NULL,'1'),(6,2,'Telecomunicaciones',NULL,'1'),(7,2,'Ingeniería',NULL,'1'),(8,2,'Finanzas',NULL,'1'),(9,3,'Internet',NULL,'1'),(10,3,'Radio/TV',NULL,'1'),(11,3,'Recomendación',NULL,'1'),(17,4,'De 1 a 10',NULL,'1'),(18,4,'De 11 a 50',NULL,'1'),(19,4,'De 51 a 100',NULL,'1'),(20,4,'De 101 a 500',NULL,'1'),(21,4,'Más de 500',NULL,'1'),(22,5,'Comercio',NULL,'1'),(23,5,'Servicios',NULL,'1'),(24,5,'Salud',NULL,'1'),(25,5,'Finanzas',NULL,'1'),(26,5,'Administrativo',NULL,'1'),(27,5,'Construcción',NULL,'1'),(28,5,'Recursos Humanos','','1'),(29,5,'Recreación',NULL,'1'),(30,5,'Entretenimiento',NULL,'1'),(31,5,'Artes',NULL,'1'),(32,5,'Política',NULL,'1'),(33,6,'VIP',NULL,'1'),(34,6,'Promedio',NULL,'1'),(35,6,'Ocasional',NULL,'1'),(36,7,'Ventas',NULL,'1'),(37,7,'TI',NULL,'1'),(38,7,'Desarrollo',NULL,'1'),(39,7,'Administración',NULL,'1'),(40,7,'Dirección',NULL,'1'),(41,7,'Soporte',NULL,'1'),(42,8,'Mensual',NULL,'1'),(43,8,'Bimestral',NULL,'1'),(44,8,'Trimestral',NULL,'1'),(45,8,'Semestral',NULL,'1'),(46,8,'Anual',NULL,'1'),(47,8,'Bienal',NULL,'1'),(48,9,'Producto',NULL,'1'),(49,9,'Servicio',NULL,'1'),(50,10,'MXN',NULL,'1'),(51,10,'USD',NULL,'1'),(54,6,'tytyutuyt',NULL,'1'),(55,6,'12132313132',NULL,'1'),(56,9,'Consumible',NULL,'1'),(57,5,NULL,NULL,'1'),(58,10,'Libras',NULL,'1'),(59,1,'sdsdsd',NULL,'1'),(60,2,'wwww',NULL,'1'),(61,11,'Prospecto',NULL,'1'),(62,11,'Cliente',NULL,'1'),(63,12,'Facturación Electrónica',NULL,'1'),(64,12,'Dominios',NULL,'1'),(65,12,'Hosting',NULL,'1'),(66,12,'VPS',NULL,'1'),(67,12,'Desarrollos',NULL,'1'),(68,13,'Categoria 1 producto',NULL,'1'),(69,13,'Categoría 2 producto',NULL,'1'),(70,13,'Categoría 3 producto',NULL,'1'),(71,14,'Traslados',NULL,'1'),(72,14,'Retenciones',NULL,'1'),(73,15,'Transferencia Electrónica',NULL,'1'),(74,15,'Depósito',NULL,'1'),(75,15,'PayPal',NULL,'1'),(76,15,'PagoFacil',NULL,'1');
/*!40000 ALTER TABLE `crmmex_sis_cat_opts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_sis_modulos`
--

DROP TABLE IF EXISTS `crmmex_sis_modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_sis_modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `rutaInicial` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_modulos`
--

LOCK TABLES `crmmex_sis_modulos` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_modulos` DISABLE KEYS */;
INSERT INTO `crmmex_sis_modulos` VALUES (1,'Ejecutivos','/ejecutivos',1),(2,'Prospectos','/prospecto',1),(3,'Clientes','/cliente',1),(4,'Ventas','/venta',1),(5,'Productos/Servicios','/producto',0),(6,'Mercadotecnia','/mercadotecnia',1),(7,'Reportes','/reportes',1),(8,'Configuraciones','/configuracion',1);
/*!40000 ALTER TABLE `crmmex_sis_modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_sis_rol_reglas`
--

DROP TABLE IF EXISTS `crmmex_sis_rol_reglas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_sis_rol_reglas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRol` int(11) DEFAULT NULL,
  `idSeccion` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unico` (`idRol`,`idSeccion`),
  CONSTRAINT `crmmex_sis_rol_reglas_idrol_foreign` FOREIGN KEY (`idRol`) REFERENCES `crmmex_sis_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_rol_reglas`
--

LOCK TABLES `crmmex_sis_rol_reglas` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_rol_reglas` DISABLE KEYS */;
INSERT INTO `crmmex_sis_rol_reglas` VALUES (1,2,1,1),(2,2,2,1),(3,2,5,1);
/*!40000 ALTER TABLE `crmmex_sis_rol_reglas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_sis_roles`
--

DROP TABLE IF EXISTS `crmmex_sis_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_sis_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_roles`
--

LOCK TABLES `crmmex_sis_roles` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_roles` DISABLE KEYS */;
INSERT INTO `crmmex_sis_roles` VALUES (1,'Administrador',1),(2,'Ejecutivo comercial',1);
/*!40000 ALTER TABLE `crmmex_sis_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_sis_secciones`
--

DROP TABLE IF EXISTS `crmmex_sis_secciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_sis_secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `modulo` varchar(50) DEFAULT NULL,
  `ruta` varchar(50) DEFAULT NULL,
  `vista` varchar(100) DEFAULT NULL,
  `identificador` varchar(50) DEFAULT NULL,
  `controlador` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_secciones`
--

LOCK TABLES `crmmex_sis_secciones` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_secciones` DISABLE KEYS */;
INSERT INTO `crmmex_sis_secciones` VALUES (1,'Listado','Grid que despliega todos los usuarios del sistema y permite su administración','1','ejecutivos|listado','crmmex.ejecutivos.listado','ejecutivos_listado',NULL,1),(2,'Perfil','Formulario que permite la edición de los datos del usuario','1','ejecutivos|perfil','crmmex.ejecutivos.perfil','ejecutivos_perfil',NULL,1),(3,'Alta ejecutivo','Formulario que permite la alta de un nuevo usuario','1','ejecutivos|edicion','crmmex.ejecutivos.edicion','ejecutivos_edicion',NULL,1),(4,'Listado','Grid que muestra la lista de prospectos existentes','2','prospectos|listado','crmmex.prospectos.listado','prospectos_listado',NULL,1),(5,'Nuevo prospecto',NULL,'2','prospectos|alta','crmmex.prospectos.nuevo','prospectos_nuevo',NULL,1),(6,'Seguimiento',NULL,'2','prospectos|seguimiento','crmmex.prospectos.seguimiento','prospectos_seguimiento',NULL,1),(7,'Listado',NULL,'3','clientes|listado','crmmex.clientes.listado','clientes_listado',NULL,1),(8,'Facturas',NULL,'4','ventas|facturas','crmmex.ventas.facturas','ventas_facturas',NULL,1),(9,'Listado productos',NULL,'5','/producto',NULL,NULL,NULL,1),(10,'Alta producto',NULL,'5','/productoAlta',NULL,NULL,NULL,1),(11,'Campañas',NULL,'6','mercadotecnia|nueva campaña','crmmex.mercadotecnia.campanias','mercadotecnia_campanias',NULL,1),(12,'Reportes',NULL,'7','/reportes',NULL,NULL,NULL,1),(13,'Catalogos Generales',NULL,'8','configuraciones|catálogos|generales','crmmex.configuraciones.catalogos.generales','configuraciones_catalogos_generales',NULL,1),(14,'Forecast',NULL,'8','configuraciones|forecast','crmmex.configuraciones.forecast','configuraciones_forecast',NULL,1),(15,'Pipeline',NULL,'8','configuraciones|pipeline','crmmex.configuraciones.pipeline','configuraciones_pipeline',NULL,1),(16,'Campos adicionales',NULL,'8','configuraciones|campos adicionales','crmmex.configuraciones.adicionales','configuraciones_adicionales',NULL,1),(17,'SMTP',NULL,'8','configuraciones|smtp','crmmex.configuraciones.smtp','configuraciones_smtp',NULL,1),(18,'Roles',NULL,'1','ejecutivos|roles','crmmex.ejecutivos.roles','ejecutivos_roles','ejecutivo\\RolesControlador@listadoModulos',1),(19,'Nuevo Cliente',NULL,'3','clientes|alta','crmmex.prospectos.nuevo','clientes_alta',NULL,1),(20,'Branding',NULL,'8','configuraciones|branding','crmmex.configuraciones.branding','configuraciones_branding',NULL,1),(21,'Seguimiento',NULL,'3','clientes|seguimiento','crmmex.clientes.seguimiento','clientes_seguimiento',NULL,1),(22,'Productos/Servicios',NULL,'8','configuraciones|catálogos|productos/servicios','crmmex.configuraciones.catalogos.productos','configuraciones_catalogos_productos',NULL,1),(23,'Dashboard',NULL,'0','Dashboard','crmmex.dashboard','dashboard',NULL,1),(24,'Tareas ejecutivo',NULL,'1','ejecutivos|tareas','crmmex.ejecutivos.actividades','ejecutivos_actividades',NULL,1),(25,'Avisos',NULL,'1','ejecutivos|avisos','crmmex.ejecutivos.avisos','ejecutivos_avisos',NULL,1),(26,'Reportes',NULL,'1','ejecutivos|reportes','crmmex.ejecutivos.reportes','ejecutivos_reportes',NULL,1),(27,'Listado',NULL,'6','mercadotecnia|listado','crmmex.mercadotecnia.listado','mercadotecnia_listado',NULL,1),(28,'Estadísticas',NULL,'6','mercadotecnia|estadísticas','crmmex.mercadotecnia.estadisticas','mercadotecnia_estadisticas',NULL,1),(29,'Detalle Campaña',NULL,'6','mercadotecnia|detalle campaña','crmmex.mercadotecnia.detalle','mercadotecnia_detalle',NULL,1),(30,'Edita Expediente',NULL,'2','prospectos|edita expediente','crmmex.prospectos.edicion','prospectos_edicion',NULL,1),(31,'Nuevo Seguimiento',NULL,'3','clientes|nuevo seguimiento','crmmex.clientes.nuevoseguimiento','clientes_nuevoseguimiento',NULL,1),(32,'Propuestas',NULL,'2','clientes|propuesta comercial','crmmex.clientes.propuesta','clientes_propuesta',NULL,1),(33,'Edita Expediente',NULL,'3','clientes|edita expediente','crmmex.prospectos.edicion','clientes_edicion',NULL,1),(34,'Edita Seguimiento',NULL,'3','clientes|edición seguimiento','crmmex.clientes.editaseguimiento','clientes_editaseguimiento',NULL,1),(35,'Nuevo Producto / Servicio',NULL,'8','configuraciones|catálogos|nuevo producto','crmmex.configuraciones.catalogos.nuevoProducto','configuraciones_catalogos_nuevoProducto',NULL,1),(36,'Edita Producto / Servicio',NULL,'8','configuraciones|catálogos|edita producto','crmmex.configuraciones.catalogos.editaProducto','configuraciones_catalogos_editaProducto',NULL,1),(37,'Listado Propuestas Comerciales','','3','clientes|propuestas comerciales','crmmex.clientes.listadoPropuestas','clientes_listadoPropuestas',NULL,1),(38,'Nuevo Ejecutivo',NULL,'1','ejecutivos|alta','crmmex.ejecutivos.nuevo','ejecutivos_alta',NULL,1),(39,'Elimina Ejecutivo',NULL,'1','ejecutivos|elimina','crmmex.ejecutivos.elimina','ejecutivos_elimina',NULL,1),(40,'Elimina Campaña',NULL,'6','mercadotecnia|elimina campaña','crmmex.mercadotecnia.elimina','mercadotecnia_elimina',NULL,1);
/*!40000 ALTER TABLE `crmmex_sis_secciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_sis_smtp`
--

DROP TABLE IF EXISTS `crmmex_sis_smtp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_sis_smtp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `servidor` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `puerto` int(11) DEFAULT NULL,
  `seguridad` varchar(45) DEFAULT NULL,
  `test` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_smtp`
--

LOCK TABLES `crmmex_sis_smtp` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_smtp` DISABLE KEYS */;
/*!40000 ALTER TABLE `crmmex_sis_smtp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_ventas_cliente`
--

DROP TABLE IF EXISTS `crmmex_ventas_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_ventas_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProspecto` int(11) DEFAULT NULL,
  `razonSocial` varchar(200) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `giro` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `subcategoria` int(11) DEFAULT NULL,
  `ejecutivo` int(11) DEFAULT NULL,
  `fechaAlta` datetime DEFAULT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `observaciones` text,
  `grupo` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unico` (`rfc`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_ventas_cliente`
--

LOCK TABLES `crmmex_ventas_cliente` WRITE;
/*!40000 ALTER TABLE `crmmex_ventas_cliente` DISABLE KEYS */;
INSERT INTO `crmmex_ventas_cliente` VALUES (26,NULL,'Mexagon S.A. de C.V.','MEX030512V22',22,1,5,1,'2019-04-30 17:49:07','2019-05-22 18:02:08',1,'Pruebas probandoooo',3,1),(27,NULL,'Carlos Vicente Reyes Salazar','RESC840317J72',22,1,5,1,'2019-04-30 18:03:18','2019-05-22 18:04:17',1,'Pruebas mas mas de edición de registro',3,1),(28,NULL,'Razón Social de Pruebas SA de CV','RSP150926H57',22,1,5,1,'2019-04-30 18:16:31','2019-05-07 18:18:43',2,'Medio de contacto',2,1),(44,NULL,'Compañia de Pruebas SA de CV','CPS100505L95',22,1,5,1,'2019-04-30 22:05:30','2019-05-07 17:02:59',1,'Este cliente se editó para agregarle un nuevo contacto.',1,1),(50,NULL,'Linix S.A. de C.V.','LIN090915W96',22,1,5,1,'2019-05-02 16:26:34','2019-05-07 17:43:23',1,NULL,1,1),(51,NULL,'Sistemas Corporativos Independencia S.A de C.V.','SCI190911H57',22,1,5,1,'2019-05-02 17:16:57','2019-05-07 18:29:25',2,'Se tiene pendiente el envio de propuesta comercial.',2,1),(59,NULL,'Empresa SA de CV','EMP630919J90',23,2,60,1,'2019-05-07 19:03:57',NULL,2,NULL,2,1),(60,NULL,'Uniformes Escolares Vera','UEV960503',22,59,60,1,'2019-05-07 19:08:10',NULL,1,NULL,1,1),(61,NULL,'Desisweb SA de CV','DES070915J89',23,3,5,1,'2019-05-07 19:13:51',NULL,2,NULL,1,1),(62,NULL,'Empresa Empresarial SRL de CV','EES180806',27,2,7,1,'2019-05-07 19:17:15',NULL,2,NULL,1,1),(63,NULL,'Ositos Desarrolladores SA de CV','OSO190305K99',30,4,60,1,'2019-05-07 19:19:34',NULL,1,NULL,2,1),(64,NULL,'DevSisTol SA de CV','DST190520K12',23,3,7,1,'2019-05-08 17:24:16',NULL,1,NULL,2,1),(65,NULL,'Cliente Para Politicas SC','CPP050906K99',22,1,5,NULL,'2019-05-14 15:58:14',NULL,2,'PPPPPP',1,1),(66,NULL,NULL,NULL,22,1,5,22,'2019-05-22 16:10:33',NULL,2,NULL,1,1),(67,NULL,'qweqweqweqeqweqwe',NULL,22,1,5,22,'2019-05-22 16:10:49',NULL,2,NULL,1,1),(68,NULL,NULL,NULL,22,1,5,22,'2019-05-22 16:14:26',NULL,2,NULL,1,1);
/*!40000 ALTER TABLE `crmmex_ventas_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_ventas_contacto`
--

DROP TABLE IF EXISTS `crmmex_ventas_contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_ventas_contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clienteID` int(11) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellidoPaterno` varchar(100) DEFAULT NULL,
  `apellidoMaterno` varchar(100) DEFAULT NULL,
  `correoElectronico` varchar(100) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `compania` int(11) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `puesto` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `fechaAlta` datetime DEFAULT NULL,
  `fechaEdicion` datetime DEFAULT NULL,
  `ejecutivoAlta` int(11) DEFAULT NULL,
  `ejecutivo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unico` (`correoElectronico`),
  KEY `clienteID_idx` (`clienteID`),
  CONSTRAINT `clienteID` FOREIGN KEY (`clienteID`) REFERENCES `crmmex_ventas_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_ventas_contacto`
--

LOCK TABLES `crmmex_ventas_contacto` WRITE;
/*!40000 ALTER TABLE `crmmex_ventas_contacto` DISABLE KEYS */;
INSERT INTO `crmmex_ventas_contacto` VALUES (9,26,'Carlos Vicente','Reyes','Salazar','chentito002@gmail.com','5578100961',1,'12055555','310',3,'Desarrollador',1,'2019-05-22 18:02:08','2019-05-22 18:02:08',1,1),(10,26,'José Heliodoro','Gutiérrez','García','jgutierrez@mexagon.net','7226504499',2,'12055555','320',3,'Desarrollador',1,'2019-05-22 18:02:08','2019-05-22 18:02:08',1,1),(11,27,'Lorenzo Jobcito','Reyes','Cuellar','lorenzo@mail.com','5578122961',1,'2370849',NULL,1,'Administrador',1,'2019-05-22 18:04:18','2019-05-22 18:04:18',1,1),(12,28,'Contacto Conocido','Appat','Apmat','correo@mail.com','5578201499',3,'12098844',NULL,1,'Contador',1,'2019-05-07 18:18:43','2019-05-07 18:18:43',1,1),(15,26,'Prueba','Adicional','Contacto','correos@mails.com','5589066699',3,'12055566','30',1,'Recepcion',0,'2019-05-07 18:04:54','2019-05-07 18:04:54',1,1),(16,44,'Claudia','Reyes','Salazar','clau.reyes@yahoo.com.mx','7223504899',2,'2370849','180',1,'Contador',1,'2019-05-07 17:02:59','2019-05-07 17:02:59',1,1),(17,27,'Editando Contacto','Nuevo','Adicional','email.contacto@gmail.com','5523601455',4,'12850066','760',5,'Gerente de RH',0,'2019-05-07 14:39:30','2019-05-07 14:39:30',1,1),(18,44,'Diana','Reyes','Salazar','nenita@gmail.com','7226501455',2,'2370849','190',4,'Gerencia',1,'2019-05-07 17:02:59','2019-05-07 17:02:59',1,1),(19,44,'Luis Fernando','Reyes','Salazar','fer@gmail.com','7225906844',1,'2370849','200',3,'Desarrollador',1,'2019-05-07 17:02:59','2019-05-07 17:02:59',1,1),(20,50,'Juan','Linares','Hernandez','jlinares@linix.com.mx','7226506692',2,'2693044','500',3,'Director General',1,'2019-05-07 17:43:23','2019-05-07 17:43:23',1,1),(21,50,'José Luis','Padilla','Sandoval','jpadilla@linix.com.mx','7225048566',3,'2693044','501',3,'Desarrollador',1,'2019-05-07 17:43:24','2019-05-07 17:43:24',1,1),(22,50,'Carlos','Romero','Gutiérrez','cromero@linix.com.mx','7225698853',2,'2693044','502',3,'Desarrollador',1,'2019-05-07 17:43:24','2019-05-07 17:43:24',1,1),(23,27,'Eli','Cuellar','Vera','elicuellar@hotmail.com','7226985211',2,'2370849','760',3,'Desarrollador',1,'2019-05-22 18:04:18','2019-05-22 18:04:18',1,1),(24,51,'Lorenzo Job','Reyes','Cuellar','ljobreyes@gmail.com','7226930566',1,'2866211','3690',3,'Developer',1,'2019-05-07 18:29:25','2019-05-07 18:29:25',1,1),(25,51,'Vicente','Reyes','Carmona','vreyesc@hotmail.com','7226931488',1,'null','750',1,'Contador',1,'2019-05-07 18:29:25','2019-05-07 18:29:25',1,1),(26,28,'Contacto','Adicional','Razon Social Prueba','contadd@hotmail.com','8569740566',1,'25963384','509',1,'Asistente dirección',0,'2019-05-07 18:17:18','2019-05-07 18:17:18',1,1),(27,50,'Josefino','Padilla','Romero','ositodos@gmail.com','7223695211',2,'2693044','505',3,'Programador',1,'2019-05-07 17:43:24','2019-05-07 17:43:24',1,1),(28,59,'Leticia','Salazar','Jalomo','lety.salazar@empresa.com.mx','7223692448',1,'2378652','66',5,'Nóminas',1,'2019-05-07 19:03:57',NULL,1,1),(29,60,'Ivonne','Cuellar','Vera','richiivonne@gmail.com','7225985411',4,'278699',NULL,4,'Facturación',1,'2019-05-07 19:08:10',NULL,1,1),(30,60,'Empleada','Numero','Uno',NULL,NULL,1,NULL,NULL,1,NULL,1,'2019-05-07 19:08:10',NULL,1,1),(31,61,'Vicente','Reyes','Salazar','cvreyes@mexagon.net','5578201466',1,'45852222',NULL,4,'Presupuestos',1,'2019-05-07 19:13:51',NULL,1,1),(32,62,'Panchito','Pantera','Sanchez','pps@empresarial.com','5545633299',2,'2899655','965',1,'Auxiliar Contable',1,'2019-05-07 19:17:15',NULL,1,1),(33,63,'Josefina','Gutierrez','García','osita@gmail.com','7223695105',2,'2866955','320',3,'Programadora',1,'2019-05-07 19:19:34',NULL,1,1),(34,64,'Lorenzo Job','Reyes','Cuellar','lojorecu@gmail.com','7224509665',1,'7222682611','999',3,'Developer Sr',1,'2019-05-08 17:24:16',NULL,1,1),(35,65,'Contacto Agregado','Nuevamente','Probar Politicas','correopolis@gmail.com','5586300155',1,'2387422','20',2,'Ventas',1,'2019-05-14 15:58:14',NULL,1,1),(36,66,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,1,NULL,1,'2019-05-22 16:10:33',NULL,1,1),(37,67,'qwe',NULL,NULL,NULL,NULL,1,NULL,NULL,1,NULL,1,'2019-05-22 16:10:49',NULL,1,1),(38,68,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,1,NULL,1,'2019-05-22 16:14:26',NULL,1,1);
/*!40000 ALTER TABLE `crmmex_ventas_contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_ventas_direccion`
--

DROP TABLE IF EXISTS `crmmex_ventas_direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_ventas_direccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clienteID` int(11) DEFAULT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `noExterior` varchar(50) DEFAULT NULL,
  `noInterior` varchar(50) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `delegacion` varchar(50) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `pais` int(11) DEFAULT NULL,
  `fechaAlta` datetime DEFAULT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `ejecutivoAlta` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clienteID_idx` (`clienteID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_ventas_direccion`
--

LOCK TABLES `crmmex_ventas_direccion` WRITE;
/*!40000 ALTER TABLE `crmmex_ventas_direccion` DISABLE KEYS */;
INSERT INTO `crmmex_ventas_direccion` VALUES (5,26,'Clemencia Borja Taboada','59','3','Juriquilla','06700','Juriquilla','Querétaro',33,1,'2019-04-30 17:49:07','2019-05-22 18:02:08',1,1),(6,27,'Limones','12','312','Santa Clara','52004','Lerma','Lerma',1,1,'2019-04-30 18:03:18','2019-05-22 18:04:17',1,1),(7,28,'Jacarandas','859','99','Independencia','52999','San Mateo Atenco','San Mateo Atenco',9,1,'2019-04-30 18:16:32','2019-05-07 18:18:43',1,1),(10,44,'Aguazarca','6',NULL,'S/C','50505','Capulhuac','San Miguel Almaya',12,1,'2019-04-30 22:05:30','2019-05-07 17:02:59',1,1),(32,50,'Calle de los Ingenieros','396','Segundo Piso','Santa Ana Tlapaltitlán','50075','Metepec','Toluca',21,1,NULL,'2019-05-07 17:43:23',1,1),(33,51,'Laguna de Mairán','7',NULL,'Ocho Cedros','50096','Toluca','Toluca',14,1,'2019-05-02 17:16:58','2019-05-07 18:29:25',1,1),(34,59,'Calle de la Alegría','790','55','Juárez','52009','Tenango del Valle','Tenango',11,1,'2019-05-07 19:03:57',NULL,1,1),(35,60,'Juarez Sur','206','33','Centro','50009','Toluca','Toluca',11,1,'2019-05-07 19:08:10',NULL,1,1),(36,61,'Paseo Tollocan','609','55','Jardines','52009','Lerma','Metepec',11,1,'2019-05-07 19:13:51',NULL,1,1),(37,62,'Medellin','26','2','Roma Norte','06700','Cuauhtemoc','CDMX',33,1,'2019-05-07 19:17:15',NULL,1,1),(38,63,'Morelia','66',NULL,'Independencia','50070','Toluca','Toluca',11,1,'2019-05-07 19:19:34',NULL,1,1),(39,64,'Paseo de los Matlazincas','60','Tercer piso','San Pablo','50078','Toluca','Toluca',11,1,'2019-05-08 17:24:16',NULL,1,1),(40,65,'Periferico','750','55','Centro','06700','Benito Juarez','CDMX',9,1,'2019-05-14 15:58:14',NULL,1,1),(41,66,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2019-05-22 16:10:33',NULL,1,1),(42,67,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2019-05-22 16:10:49',NULL,1,1),(43,68,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2019-05-22 16:14:26',NULL,1,1);
/*!40000 ALTER TABLE `crmmex_ventas_direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_ventas_facturas`
--

DROP TABLE IF EXISTS `crmmex_ventas_facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_ventas_facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facturaID` varchar(45) DEFAULT NULL,
  `clienteID` int(11) DEFAULT NULL,
  `propuestaID` int(11) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `fechaEmision` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_ventas_facturas`
--

LOCK TABLES `crmmex_ventas_facturas` WRITE;
/*!40000 ALTER TABLE `crmmex_ventas_facturas` DISABLE KEYS */;
INSERT INTO `crmmex_ventas_facturas` VALUES (1,'9560',26,6,5000,'2019-05-05 00:00:00',1);
/*!40000 ALTER TABLE `crmmex_ventas_facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_ventas_propuestacomercial`
--

DROP TABLE IF EXISTS `crmmex_ventas_propuestacomercial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_ventas_propuestacomercial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ejecutivoID` int(11) DEFAULT NULL,
  `clienteID` int(11) DEFAULT NULL,
  `contactoID` int(11) DEFAULT NULL,
  `fechaEnvio` datetime DEFAULT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `descuento` double DEFAULT NULL,
  `promocion` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`ejecutivoID`),
  KEY `cliente_idx` (`clienteID`),
  CONSTRAINT `cliente` FOREIGN KEY (`clienteID`) REFERENCES `crmmex_ventas_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id` FOREIGN KEY (`ejecutivoID`) REFERENCES `crmmex_sis_admins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_ventas_propuestacomercial`
--

LOCK TABLES `crmmex_ventas_propuestacomercial` WRITE;
/*!40000 ALTER TABLE `crmmex_ventas_propuestacomercial` DISABLE KEYS */;
INSERT INTO `crmmex_ventas_propuestacomercial` VALUES (5,1,26,3,'2019-05-15 00:00:00','Bla Bla bla bla',250,0,0,1);
/*!40000 ALTER TABLE `crmmex_ventas_propuestacomercial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_ventas_propuestacomercial_detalle`
--

DROP TABLE IF EXISTS `crmmex_ventas_propuestacomercial_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_ventas_propuestacomercial_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPropuesta` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `descuento` double DEFAULT NULL,
  `promocion` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_ventas_propuestacomercial_detalle`
--

LOCK TABLES `crmmex_ventas_propuestacomercial_detalle` WRITE;
/*!40000 ALTER TABLE `crmmex_ventas_propuestacomercial_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `crmmex_ventas_propuestacomercial_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (28,'2014_10_12_000000_create_users_table',1),(29,'2014_10_12_100000_create_password_resets_table',1),(30,'2016_06_01_000001_create_oauth_auth_codes_table',1),(31,'2016_06_01_000002_create_oauth_access_tokens_table',1),(32,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(33,'2016_06_01_000004_create_oauth_clients_table',1),(34,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(35,'2019_05_16_233850_create_sessions_table',2),(36,'2019_05_21_174944_tabla_migracion_test',3),(37,'2019_05_28_165636_add_fields_users',4),(38,'2019_05_28_170540_add_fields_users_2',5),(39,'2019_05_28_172616_add_fields_users_3',6),(40,'2019_05_28_172746_tabla_usuarios_direccion',6),(41,'2019_05_28_184315_actualiza_tabla_privilegios',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('0108c0ced96969c7594fc4050b4c97a7b97c2a64e2078e4fbed12814920bb04d154dfda201a6f380',22,1,'Carlos','[]',1,'2019-06-04 23:00:27','2019-06-04 23:00:27','2019-06-11 18:00:27'),('a9605185dd9731974716ef9dcb53e01aac70f64ac84a5f1ae3baa1c2000c45739553cb2d033bc8d5',22,1,'Carlos','[]',1,'2019-06-04 23:01:26','2019-06-04 23:01:26','2019-06-11 18:01:27'),('d1acce0fc0d3a35501837c4ea29f887fcb0401eda6ad21a8e30534d4eb78b963917854d5b39917d5',22,1,'Carlos','[]',0,'2019-06-04 23:03:37','2019-06-04 23:03:37','2019-06-11 18:03:37');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Mexagon','RxJRcwdubd3onImINKCvyNcqVjCWd0kzgncEeP3p','http://localhost',1,0,0,'2019-05-21 02:47:55','2019-05-21 02:47:55'),(2,NULL,'CRM Mexagon Personal Access Client','6x7T6dW3DVjQzESOz5Tr0TdBazr9AFxNFthq1pS1','http://localhost',1,0,0,'2019-06-04 23:55:56','2019-06-04 23:55:56'),(3,NULL,'CRM Mexagon Password Grant Client','l7xbmuYH1hEc0PknxbvUaDX8mOyxflUB1EU4BzEL','http://localhost',0,1,0,'2019-06-04 23:55:57','2019-06-04 23:55:57'),(4,NULL,'CRM Mexagon Personal Access Client','Tyj9kHaldCyKIE7NcM4iAYRCTkxzna3uDVKuLQah','http://localhost',1,0,0,'2019-06-04 23:56:35','2019-06-04 23:56:35'),(5,NULL,'CRM Mexagon Password Grant Client','4RfvCgNrGIeu3qKV8snjTZRehxnDXHHQKpR9Oaur','http://localhost',0,1,0,'2019-06-04 23:56:35','2019-06-04 23:56:35');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (2,1,'2019-05-21 02:47:55','2019-05-21 02:47:55'),(3,2,'2019-06-04 23:55:56','2019-06-04 23:55:56'),(4,4,'2019-06-04 23:56:35','2019-06-04 23:56:35');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('8NtCzK8ScyAztrVXRAzSfkzqsy1YIt3L9BlQgYMP',22,'192.168.30.110','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0','YTo1OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoibk9CWXNtVGhxR2wwd1g1OTRUdGdoQWZINUp4WTZuZFdncms5RklQZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xOTIuMTY4LjMwLjExMC9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjI7czoxMzoicGFzc3dvcmRfaGFzaCI7czo2MDoiJDJ5JDEwJEZ3S2dLRnkzZlpyWmFORXZPbGg4Qk8wNXRITy9MaDh6RnNTalJFQVFsMjhJM2poWXBoSW5LIjt9',1559675083),('SJ6Auw7xTMxZ7ZUbOoI6Q7STmYO0YrxkBxopOgKD',NULL,'192.168.30.110','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHV1a2wyNUZ3WnNTNW1IaE9JbkZrWmFtRmRlS05KakhNTzBjUWlEOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xOTIuMTY4LjMwLjExMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1559673458);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apPat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apMat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `comentarios` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `rolID_idx` (`rol`),
  CONSTRAINT `rolID` FOREIGN KEY (`rol`) REFERENCES `crmmex_sis_roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (22,'Carlos','Reyes','Salazar',1,'cvreyes@mexagon.net',NULL,'$2y$10$FwKgKFy3fZrZaNEvOlh8BO05tHO/Lh8zFsSjREAQl28I3jhYphInK','WaEf1S8mDGjfziiR7lmapf2MfTR2L9Cf2qSeGBgEKYl2a17G90XhCHq9ftUB','IbAhumEc7FrKREMfMgDfRxgLiIYKyloL1J9woUt7Chx3j7U9BIaFPsX55IGw','2019-05-21 02:29:01','2019-06-04 22:14:20',NULL,'En este campo iran los comentarios que se mostraran en la tabla de perfiles',1),(30,'Elizabeth','Cuellar','Vera',1,'betyjob@gmail.com',NULL,'$2y$10$0KO9dPIi/bfWW5BCj.JQrufFBlhjVQlUvgx9rwGt.m526ZKwPSLP6','0','IDEyW4JU7CNrWaPYzkw0jpwVPj67v3BrOZjKyMi9k4lCn3h7bMbLM2vlu8AI','2019-06-04 22:05:44','2019-06-04 22:05:44',NULL,'Comentarios del ejecutivo',1),(31,'Soporte','Mexagon','.net',1,'soporte@mexagon.net',NULL,'$2y$10$yfaM7APcMHBGLtQOTNBureadRif27AbSHeTNYf9AnL5.BxkOlp86W','0','VPtmu4mcaJ7Tl623btBq81QvBUvWdWYMPorJqwXGmOAptaUtgfqDv8oFOyQn','2019-06-04 22:13:54','2019-06-04 22:13:54',NULL,'Oficinas Corporativas',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_address`
--

DROP TABLE IF EXISTS `users_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(10) unsigned NOT NULL,
  `calle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interior` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exterior` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colonia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `cp` int(11) NOT NULL,
  `pais` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_address_userid_foreign` (`userID`),
  CONSTRAINT `users_address_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_address`
--

LOCK TABLES `users_address` WRITE;
/*!40000 ALTER TABLE `users_address` DISABLE KEYS */;
INSERT INTO `users_address` VALUES (1,22,'Jacarandas','9','4','La Cruz','Santa Rosa Jauregui',1,50000,1),(4,30,'Independencia','20','115','Cientificos','Toluca',1,50075,1),(5,31,'Clemencia Borja Taboada','3','1','Jurica Acueducto','Querétaro',3,73000,1);
/*!40000 ALTER TABLE `users_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Carlos Reyes','Chentito','cvreyes@mexagon.net'),(16,'Lorenzo Job Reyes Cuellar','jobcito','jobcito@mail.com'),(17,'Elizabeth Cuellar Vera','betyjob','elizacuellar@mail.com'),(21,'Nuevo usuario','angular72','jobcito@mail.com'),(22,'Chentito','caviresa','chentito002@gmail.com'),(23,'qweqweqwe','wqeweqweqqeweqwe','retertrtert');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-04 14:46:20
