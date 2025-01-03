-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: LaBuenizzima
-- ------------------------------------------------------
-- Server version	9.1.0

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
-- Table structure for table `LOGS_DB`
--

DROP TABLE IF EXISTS `LOGS_DB`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `LOGS_DB` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `accion` varchar(50) DEFAULT NULL,
  `modificado` int DEFAULT NULL,
  `tabla` varchar(50) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LOGS_DB`
--

LOCK TABLES `LOGS_DB` WRITE;
/*!40000 ALTER TABLE `LOGS_DB` DISABLE KEYS */;
INSERT INTO `LOGS_DB` VALUES (77,'create',NULL,'ofertas','2024-12-28 22:43:52'),(78,'delete',13,'ofertas','2024-12-28 22:44:17'),(79,'crear',NULL,'ingredientes','2025-01-01 13:16:49'),(80,'editar',33,'ingredientes','2025-01-01 13:17:14'),(81,'eliminar',33,'ingredientes','2025-01-01 13:17:26'),(82,'crear',NULL,'usuarios','2025-01-01 13:39:19'),(83,'crear',NULL,'usuarios','2025-01-01 13:39:32'),(84,'eliminar',19,'usuarios','2025-01-01 13:40:36'),(85,'crear',NULL,'usuarios','2025-01-01 13:40:51'),(86,'crear',NULL,'productos','2025-01-01 13:41:30'),(87,'eliminar',47,'productos','2025-01-01 13:41:36'),(88,'crear',NULL,'ofertas','2025-01-01 13:41:57'),(89,'eliminar',14,'ofertas','2025-01-01 13:42:01'),(90,'crear',NULL,'ingredientes','2025-01-02 20:50:27'),(91,'editar',26,'productos','2025-01-02 20:50:47'),(92,'editar',33,'productos','2025-01-02 20:51:20'),(93,'editar',33,'productos','2025-01-02 20:51:25'),(94,'editar',34,'productos','2025-01-02 20:51:52'),(95,'editar',33,'productos','2025-01-02 20:52:04');
/*!40000 ALTER TABLE `LOGS_DB` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-03 14:24:01
