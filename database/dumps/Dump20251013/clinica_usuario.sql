-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: clinica
-- ------------------------------------------------------
-- Server version	8.0.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `Documento` int NOT NULL,
  `Tipo_Documento` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Primer_Nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Segundo_Nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Primer_Apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Segundo_Apellido` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Edad` tinyint NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Sexo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Celular` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Mutualista` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Estado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (53872363,'CI','Juan',NULL,'Juancito',NULL,23,'2001-12-24','Masculino','098693605','MEDICA URUGUAYA','Activo','juan@example.com','$2y$12$TAA1cZq2PJf5/uo336aSxeSAMkK9vF5Ni1RFe7NKANzxhLgGhD8Me',NULL,NULL,NULL,'2025-10-02 01:10:35','2025-10-02 01:10:35'),(53872364,'CI','Pepe',NULL,'Pepes',NULL,22,'2002-12-24','Masculino','098693603','CRAMI','Activo','pepe@examople.com','$2y$12$82SmtzCWF1wrUPgO8MKd8OfGDFNoCZs4g3XWrY2WiLLz8b0BgI1Ke',NULL,NULL,NULL,'2025-10-02 01:07:51','2025-10-02 01:07:51'),(53872365,'CI','Lucas',NULL,'Sequeira',NULL,21,'2003-12-24','Masculino','098693606','ASSE','Activo','lucassequeira.134@gmail.com','$2y$12$NssdyEfOdDoxbKchBjAtMe.uRZIcdZJrlzaqImlKTyQLiIbFkJiqa',NULL,NULL,NULL,'2025-09-30 02:00:35','2025-09-30 02:00:35');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-13 12:38:23
