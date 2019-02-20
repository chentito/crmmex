-- MySQL dump 10.13  Distrib 5.5.61, for Win64 (AMD64)
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
-- Table structure for table `crmmex_sis_modulos`
--

DROP TABLE IF EXISTS `crmmex_sis_modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_sis_modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_modulos`
--

LOCK TABLES `crmmex_sis_modulos` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_modulos` DISABLE KEYS */;
INSERT INTO `crmmex_sis_modulos` VALUES (1,'Usuarios',1),(2,'Prospectos',1),(3,'Clientes',1),(4,'Ventas',1),(5,'Mercadotecnia',1),(6,'Reportes',1),(7,'Configuraciones',1);
/*!40000 ALTER TABLE `crmmex_sis_modulos` ENABLE KEYS */;
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
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_secciones`
--

LOCK TABLES `crmmex_sis_secciones` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_secciones` DISABLE KEYS */;
INSERT INTO `crmmex_sis_secciones` VALUES (1,'Listado de Usuarios','Grid que despliega todos los usuarios del sistema y permite su administración','1','/usuarios/listado',1),(2,'Mis Datos','Formulario que permite la edición de los datos del usuario','1','/usuarios/misdatos/id',1),(3,'Agregar Usuario','Formulario que permite la alta de un nuevo usuario','1','/usuarios/nuevo',1);
/*!40000 ALTER TABLE `crmmex_sis_secciones` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
INSERT INTO `password_resets` VALUES ('cvreyes@mexagon.net','$2y$10$//OGrev7gIZrZz8ZIu99G.Cf/R/GbDQm6ZGvF6QHp8A1bgUHd/pO6','2019-02-13 21:23:28');
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
INSERT INTO `users` VALUES (1,'Carlos Reyes','cvreyes@mexagon.net',NULL,'$2y$10$UdEl9nN4vH91uIq1sK6vLO6bCgyhFXIZX81v8EaL9P.lBjRrsR2S6','dvZofGRRrIXHH4LRytu7WypuTe5bY3lb0RcklGcKfRhVhjxXn6m1GGwr94on','2019-02-13 07:02:05','2019-02-13 07:02:05'),(2,'Lorenzo Reyes','lorenzo@reyesalazar.com',NULL,'$2y$10$CcUeTHeLFBeDmR5xWM01xu7n2U9p4nxQrFcmsDnkqXWWxOM1.d9sG','F1jnjRIhmvtDAlj7QtCVHyK5itiFrrfYPKZPUsX4En6FTygfr5sKAsKnvNEu','2019-02-15 00:10:49','2019-02-15 00:10:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-14 18:54:54
