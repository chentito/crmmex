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
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_merc_campanias`
--

LOCK TABLES `crmmex_merc_campanias` WRITE;
/*!40000 ALTER TABLE `crmmex_merc_campanias` DISABLE KEYS */;
INSERT INTO `crmmex_merc_campanias` VALUES (1,'Promociones Enero','https://www.url.com/landings/promo_ene','2019-01-05 00:00:00','Promociones Enero','Mexagon.net','envios@mexagon.net',1,NULL,1),(2,'Dominio Gratis','https://www.url.com/landings/dominio','2019-01-30 00:00:00','Llévate un dominio sin costo','Mexagon.net','envios@mexagon.net',3,NULL,1),(3,'Promociones Marzo','https://www.url.com/landings/promo_mar','2019-03-05 00:00:00','Promociones Primavera','Mexagon.net','envios@mexagon.net',3,NULL,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_cat`
--

LOCK TABLES `crmmex_sis_cat` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_cat` DISABLE KEYS */;
INSERT INTO `crmmex_sis_cat` VALUES (1,'Categoría',1),(2,'Sub Categoría',1),(3,'Medio de Contacto',1),(4,'Empleados',1),(5,'Giro',1),(6,'Grupo',1),(7,'Área',1),(8,'Ciclo de Facturación',1),(9,'Tipo Producto',1),(10,'Divisa',1),(11,'Condición',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_cat_opts`
--

LOCK TABLES `crmmex_sis_cat_opts` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_cat_opts` DISABLE KEYS */;
INSERT INTO `crmmex_sis_cat_opts` VALUES (1,1,'Educación',NULL,'1'),(2,1,'Gobierno',NULL,'1'),(3,1,'Tecnología',NULL,'1'),(4,1,'Economía',NULL,'1'),(5,2,'Desarrollo',NULL,'1'),(6,2,'Telecomunicaciones',NULL,'1'),(7,2,'Ingeniería',NULL,'1'),(8,2,'Finanzas',NULL,'1'),(9,3,'Internet',NULL,'1'),(10,3,'Radio/TV',NULL,'1'),(11,3,'Recomendación',NULL,'1'),(17,4,'De 1 a 10',NULL,'1'),(18,4,'De 11 a 50',NULL,'1'),(19,4,'De 51 a 100',NULL,'1'),(20,4,'De 101 a 500',NULL,'1'),(21,4,'Más de 500',NULL,NULL),(22,5,'Comercio',NULL,'1'),(23,5,'Servicios',NULL,'1'),(24,5,'Salud',NULL,'1'),(25,5,'Finanzas',NULL,'1'),(26,5,'Administrativo',NULL,'1'),(27,5,'Construcción',NULL,'1'),(28,5,'Recursos Humanos','','1'),(29,5,'Recreación',NULL,'1'),(30,5,'Entretenimiento',NULL,'1'),(31,5,'Artes',NULL,'1'),(32,5,'Política',NULL,'1'),(33,6,'VIP',NULL,'1'),(34,6,'Promedio',NULL,'1'),(35,6,'Ocasional',NULL,'1'),(36,7,'Ventas',NULL,'1'),(37,7,'TI',NULL,'1'),(38,7,'Desarrollo',NULL,'1'),(39,7,'Administración',NULL,'1'),(40,7,'Dirección',NULL,'1'),(41,7,'Soporte',NULL,'1'),(42,8,'Mensual',NULL,'1'),(43,8,'Bimestral',NULL,'1'),(44,8,'Trimestral',NULL,'1'),(45,8,'Semestral',NULL,'1'),(46,8,'Anual',NULL,'1'),(47,8,'Bienal',NULL,'1'),(48,9,'Producto',NULL,'1'),(49,9,'Servicio',NULL,'1'),(50,10,'MXN',NULL,'1'),(51,10,'USD',NULL,'1'),(54,6,'tytyutuyt',NULL,NULL),(55,6,'12132313132',NULL,NULL),(56,9,'Consumible',NULL,NULL),(57,5,NULL,NULL,NULL),(58,10,'Libras',NULL,NULL),(59,1,'sdsdsd',NULL,NULL),(60,2,'wwww',NULL,NULL),(61,11,'Prospecto',NULL,'1'),(62,11,'Cliente',NULL,'1');
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
INSERT INTO `crmmex_sis_modulos` VALUES (1,'Ejecutivos','/ejecutivos',1),(2,'Prospectos','/prospecto',1),(3,'Clientes','/cliente',1),(4,'Ventas','/venta',0),(5,'Productos/Servicios','/producto',0),(6,'Mercadotecnia','/mercadotecnia',1),(7,'Reportes','/reportes',1),(8,'Configuraciones','/configuracion',1);
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
  UNIQUE KEY `unico` (`idRol`,`idSeccion`)
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_secciones`
--

LOCK TABLES `crmmex_sis_secciones` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_secciones` DISABLE KEYS */;
INSERT INTO `crmmex_sis_secciones` VALUES (1,'Listado','Grid que despliega todos los usuarios del sistema y permite su administración','1','ejecutivos|listado','crmmex.ejecutivos.listado','ejecutivos_listado',NULL,1),(2,'Perfil','Formulario que permite la edición de los datos del usuario','1','ejecutivos|perfil','crmmex.ejecutivos.perfil','ejecutivos_perfil',NULL,1),(3,'Alta ejecutivo','Formulario que permite la alta de un nuevo usuario','1','/ejecutivoAlta',NULL,NULL,NULL,1),(4,'Listado','Grid que muestra la lista de prospectos existentes','2','prospectos|listado','crmmex.prospectos.listado','prospectos_listado',NULL,1),(5,'Nuevo prospecto',NULL,'2','prospectos|alta','crmmex.prospectos.nuevo','prospectos_nuevo',NULL,1),(6,'Seguimiento',NULL,'2','prospectos|seguimiento','crmmex.prospectos.seguimiento','prospectos_seguimiento',NULL,1),(7,'Listado',NULL,'3','clientes|listado','crmmex.clientes.listado','clientes_listado',NULL,1),(8,'Seguimiento de propuestas',NULL,'4','propuestas|seguimientos','','',NULL,1),(9,'Listado productos',NULL,'5','/producto',NULL,NULL,NULL,1),(10,'Alta producto',NULL,'5','/productoAlta',NULL,NULL,NULL,1),(11,'Campañas',NULL,'6','mercadotecnia|nueva campaña','crmmex.mercadotecnia.campanias','mercadotecnia_campanias',NULL,1),(12,'Reportes',NULL,'7','/reportes',NULL,NULL,NULL,1),(13,'Catalogos Generales',NULL,'8','configuraciones|catálogos|generales','crmmex.configuraciones.catalogos.generales','configuraciones_catalogos_generales',NULL,1),(14,'Forecast',NULL,'8','configuraciones|forecast','crmmex.configuraciones.forecast','configuraciones_forecast',NULL,1),(15,'Pipeline',NULL,'8','configuraciones|pipeline','crmmex.configuraciones.pipeline','configuraciones_pipeline',NULL,1),(16,'Campos adicionales',NULL,'8','configuraciones|campos adicionales','crmmex.configuraciones.adicionales','configuraciones_adicionales',NULL,1),(17,'SMTP',NULL,'8','configuraciones|smtp','crmmex.configuraciones.smtp','configuraciones_smtp',NULL,1),(18,'Roles',NULL,'1','ejecutivos|roles','crmmex.ejecutivos.roles','ejecutivos_roles','ejecutivo\\RolesControlador@listadoModulos',1),(19,'Nuevo Cliente',NULL,'3','clientes|alta','crmmex.prospectos.nuevo','clientes_alta',NULL,1),(20,'Branding',NULL,'8','configuraciones|branding','crmmex.configuraciones.branding','configuraciones_branding',NULL,1),(21,'Seguimiento',NULL,'3','clientes|seguimiento','crmmex.clientes.seguimiento','clientes_seguimiento',NULL,1),(22,'Productos/Servicios',NULL,'8','configuraciones|catálogos|productos/servicios','crmmex.configuraciones.catalogos.productos','configuraciones_catalogos_productos',NULL,1),(23,'Dashboard',NULL,'0','Dashboard','crmmex.dashboard','dashboard',NULL,1),(24,'Tareas ejecutivo',NULL,'1','ejecutivos|tareas','crmmex.ejecutivos.actividades','ejecutivos_actividades',NULL,1),(25,'Avisos',NULL,'1','ejecutivos|avisos','crmmex.ejecutivos.avisos','ejecutivos_avisos',NULL,1),(26,'Reportes',NULL,'1','ejecutivos|reportes','crmmex.ejecutivos.reportes','ejecutivos_reportes',NULL,1),(27,'Listado',NULL,'6','mercadotecnia|listado','crmmex.mercadotecnia.listado','mercadotecnia_listado',NULL,1),(28,'Estadísticas',NULL,'6','mercadotecnia|estadísticas','crmmex.mercadotecnia.estadisticas','mercadotecnia_estadisticas',NULL,1),(29,'Detalle Campaña',NULL,'6','mercadotecnia|detalle campaña','crmmex.mercadotecnia.detalle','mercadotecnia_detalle',NULL,1),(30,'Edita Expediente',NULL,'2','prospectos|edita expediente','crmmex.prospectos.edicion','prospectos_edicion',NULL,1),(31,'Nuevo Seguimiento',NULL,'2','prospectos|nuevo seguimiento','crmmex.prospectos.nuevoseguimiento','prospectos_nuevoseguimiento',NULL,1),(32,'Propuestas',NULL,'2','prospectos|propuesta comercial','crmmex.clientes.propuesta','clientes_propuesta',NULL,1),(33,'Edita Expediente',NULL,'3','clientes|edita expediente','crmmex.prospectos.edicion','clientes_edicion',NULL,1);
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
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unico` (`rfc`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_ventas_cliente`
--

LOCK TABLES `crmmex_ventas_cliente` WRITE;
/*!40000 ALTER TABLE `crmmex_ventas_cliente` DISABLE KEYS */;
INSERT INTO `crmmex_ventas_cliente` VALUES (26,NULL,'Mexagon SA de CV','MEX030512V22',23,3,6,1,'2019-04-30 17:49:07',NULL,2,'Pruebas probandoooo',1),(27,NULL,'Carlos Vicente Reyes Salazar','RESC840317J72',23,3,5,1,'2019-04-30 18:03:18',NULL,2,'Pruebas mas mas',1),(28,NULL,'Razón Social de Pruebas SA de CV','RSP150926H57',27,2,7,1,'2019-04-30 18:16:31',NULL,1,'Medio de contacto',1),(44,NULL,'Compañia de Pruebas SA de CV','CPS100505L95',28,2,8,1,'2019-04-30 22:05:30',NULL,2,'Un comentario más para mis pruebas',1);
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
  UNIQUE KEY `unico` (`correoElectronico`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_ventas_contacto`
--

LOCK TABLES `crmmex_ventas_contacto` WRITE;
/*!40000 ALTER TABLE `crmmex_ventas_contacto` DISABLE KEYS */;
INSERT INTO `crmmex_ventas_contacto` VALUES (9,26,'Carlos Vicente','Reyes','Salazar','chentito002@gmail.com','5578100961',1,'12055555','310',3,'Desarrollador',1,'2019-04-30 17:49:07',NULL,1,1),(10,26,'José','Gutiérrez','García','jgutierrez@mexagon.net','7226504499',2,'12055555','320',3,'Desarrollador',1,'2019-04-30 17:49:07',NULL,1,1),(11,27,'Lorenzo Job','Reyes','Cuellar','lorenzo@mail.com','5578122961',1,'2370849',NULL,1,'Administrador',1,'2019-04-30 18:03:18',NULL,1,1),(12,28,'Contacto Conocido','Appat','Apmat','correo@mail.com','5578201499',3,'12098844',NULL,1,'Contador',1,'2019-04-30 18:16:31',NULL,1,1),(15,26,'Prueba','Adicional','Contacto','correos@mails.com','5589066699',3,'12055566','30',1,'Recepcion',1,'2019-04-30 17:55:30',NULL,1,1),(16,44,'Claudia','Reyes','Salazar','clau.reyes@yahoo.com.mx','7223504899',2,'2384566',NULL,1,'Contador',1,'2019-04-30 22:05:30',NULL,1,1);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_ventas_direccion`
--

LOCK TABLES `crmmex_ventas_direccion` WRITE;
/*!40000 ALTER TABLE `crmmex_ventas_direccion` DISABLE KEYS */;
INSERT INTO `crmmex_ventas_direccion` VALUES (5,26,'Clemencia Borja Taboada','59','3','Juriquilla','06700','Juriquilla','Querétaro',4,1,'2019-04-30 17:49:07',NULL,1,1),(6,27,'Limones','12','312','Santa Clara','52004','Lerma','Lerma',5,1,'2019-04-30 18:03:18',NULL,1,1),(7,28,'Jacarandas','859','99','Independencia','52999','San Mateo Atenco','San Mateo Atenco',5,1,'2019-04-30 18:16:32',NULL,1,1),(10,44,'Aguazarca','6',NULL,'S/C','50505','Capulhuac','San Miguel Almaya',5,1,'2019-04-30 22:05:30',NULL,1,1);
/*!40000 ALTER TABLE `crmmex_ventas_direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmmex_ventas_propuestacomercial`
--

DROP TABLE IF EXISTS `crmmex_ventas_propuestacomercial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_ventas_propuestacomercial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admins_id` int(11) DEFAULT NULL,
  `cartera_id` int(11) DEFAULT NULL,
  `idContacto` int(11) DEFAULT NULL,
  `fechaEnvio` datetime DEFAULT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `descuento` double DEFAULT NULL,
  `promocion` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`admins_id`),
  KEY `cliente_idx` (`cartera_id`),
  CONSTRAINT `cliente` FOREIGN KEY (`cartera_id`) REFERENCES `crmmex_ventas_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id` FOREIGN KEY (`admins_id`) REFERENCES `crmmex_sis_admins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_ventas_propuestacomercial`
--

LOCK TABLES `crmmex_ventas_propuestacomercial` WRITE;
/*!40000 ALTER TABLE `crmmex_ventas_propuestacomercial` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (21,'2014_10_12_000000_create_users_table',1),(22,'2014_10_12_100000_create_password_resets_table',1),(23,'2016_06_01_000001_create_oauth_auth_codes_table',2),(24,'2016_06_01_000002_create_oauth_access_tokens_table',2),(25,'2016_06_01_000003_create_oauth_refresh_tokens_table',2),(26,'2016_06_01_000004_create_oauth_clients_table',2),(27,'2016_06_01_000005_create_oauth_personal_access_clients_table',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'CRM Mexagon Personal Access Client','xtNJsUtUj2EurvQjC8s2QuMqTj1gBnW5MRVlx6Oa','http://localhost',1,0,0,'2019-04-16 20:02:24','2019-04-16 20:02:24'),(2,NULL,'CRM Mexagon Password Grant Client','MSTQXVNU3NrRZCRpFL2y581Tqsruhew8lBxLGC37','http://localhost',0,1,0,'2019-04-16 20:02:24','2019-04-16 20:02:24');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2019-04-16 20:02:24','2019-04-16 20:02:24');
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Carlos Reyes','cvreyes@mexagon.net',NULL,'$2y$10$xK3Y2a0gWgCoS0s7pPdo2esGMQ4gFsCecAFU.bBhHHMX8uJ0Yb51y','OWerbee9sc6BN17Q5u4Na2Qy2sHdxrtvdFE3FObn5wrhfN5PbfBYFb25ZXXt','2019-03-05 22:30:42','2019-03-05 22:30:42'),(2,'Carlos Lam','clam@mexagon.net',NULL,'$2y$10$x0kD3I1PtL3dGGmGKzheXO2ZYdgUzfbfPyoqxpL359Y0TLvHPRPX6','8VTpH9PMmRAGwrMSgwr93Q2e2HIeFJMUupg8vCFkPPri8pENr2wWynkPRVjq','2019-03-12 05:12:22','2019-03-12 05:12:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Carlos Reyes','Chentito','cvreyes@mexagon.net'),(16,'Lorenzo Job Reyes Cuellar','jobcito','jobcito@mail.com'),(17,'Elizabeth Cuellar Vera','betyjob','elizacuellar@mail.com'),(21,'Nuevo usuario','angular72','jobcito@mail.com'),(22,'Chentito','caviresa','chentito002@gmail.com');
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

-- Dump completed on 2019-04-30 18:39:37
