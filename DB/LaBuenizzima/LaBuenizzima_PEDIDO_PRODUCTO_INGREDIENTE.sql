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
-- Table structure for table `PEDIDO_PRODUCTO_INGREDIENTE`
--

DROP TABLE IF EXISTS `PEDIDO_PRODUCTO_INGREDIENTE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PEDIDO_PRODUCTO_INGREDIENTE` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `pedido_producto_id` int DEFAULT NULL,
  `ingrediente_id` int DEFAULT NULL,
  `accion` varchar(25) DEFAULT NULL,
  `coste` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `pedido_producto_id` (`pedido_producto_id`),
  KEY `ingrediente_id` (`ingrediente_id`),
  CONSTRAINT `PEDIDO_PRODUCTO_INGREDIENTE_ibfk_1` FOREIGN KEY (`pedido_producto_id`) REFERENCES `PEDIDO_PRODUCTO` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `PEDIDO_PRODUCTO_INGREDIENTE_ibfk_2` FOREIGN KEY (`ingrediente_id`) REFERENCES `INGREDIENTES` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PEDIDO_PRODUCTO_INGREDIENTE`
--

LOCK TABLES `PEDIDO_PRODUCTO_INGREDIENTE` WRITE;
/*!40000 ALTER TABLE `PEDIDO_PRODUCTO_INGREDIENTE` DISABLE KEYS */;
/*!40000 ALTER TABLE `PEDIDO_PRODUCTO_INGREDIENTE` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-08 14:45:06