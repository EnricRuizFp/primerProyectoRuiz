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
-- Table structure for table `OFERTAS`
--

DROP TABLE IF EXISTS `OFERTAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `OFERTAS` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `descuento` decimal(5,2) DEFAULT NULL,
  `tipo` varchar(25) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OFERTAS`
--

LOCK TABLES `OFERTAS` WRITE;
/*!40000 ALTER TABLE `OFERTAS` DISABLE KEYS */;
INSERT INTO `OFERTAS` VALUES (5,'INV15OFF','Descuento del 15% en todos los productos durante el invierno.',15.00,'%','2024-10-01','2025-02-15'),(6,'BF10OFF','Descuento del 10% en todos los productos por Black Friday.',10.00,'%','2024-11-25','2024-11-29'),(7,'SUM10OFF','Descuento de 10€ en todos los pedidos realizados durante el verano.',10.00,'€','2024-06-01','2024-08-31'),(9,'BLACKFRIDAY','Descuento del 8% en todos los productos durante el black friday',8.00,'%','2024-11-25','2024-12-01'),(10,'PRIMERPEDIDO','Descuento de 15€ en tu primer pedido.',15.00,'€','2024-01-01','2025-01-01');
/*!40000 ALTER TABLE `OFERTAS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-06  1:21:15
