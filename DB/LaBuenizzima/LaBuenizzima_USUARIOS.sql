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
-- Table structure for table `USUARIOS`
--

DROP TABLE IF EXISTS `USUARIOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `USUARIOS` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) DEFAULT NULL,
  `nombre_completo` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `contraseña` varchar(255) NOT NULL,
  `tarjeta_bancaria` varchar(255) NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `cvv` int DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIOS`
--

LOCK TABLES `USUARIOS` WRITE;
/*!40000 ALTER TABLE `USUARIOS` DISABLE KEYS */;
INSERT INTO `USUARIOS` VALUES (1,'enric','ruiz badia','enricruizfp@ibf.cat',654735274,'C/ Barcelona 23 1a','2024-12-04','','',NULL,NULL),(2,'joan','garcía perez','joangarcia@gmail.com',623456789,'Av. Madrid 13 Bajo','2024-10-04','','',NULL,NULL),(3,'ana','martínez ruiz','anamartinez@example.com',634567890,'C/ Girona 8 3C','2023-12-24','','',NULL,NULL),(4,'marta','fernández lópez','martafernandez@example.com',612345678,'C/ Valencia 45 2B','2023-01-14','','',NULL,NULL),(5,'alberto','olmo acevedo','albertoolmo@gmail.com',685243004,'Pallejà','2024-11-15','','',NULL,NULL),(6,'alpierto','alpierto olmo acevedo','alpierto@gmail.com',546345634,'calle alpierto 12','2024-12-06','$2y$10$S8B80Pb9gEQ74ENNbnOf..1A7e/HTPlSjKZbm9vxfPyibsDR/d.YW','$2y$10$sF.hUf/fh3slpzU.UWYqdOhccJF2wtNQx4PVhZzKJQ3b.K6Y1zF8W','2024-12-20',342),(7,'remeibadia','Remei Badia Resina','remei@gmail.com',534745623,'C/ Francesc macia 123','2024-12-06','$2y$10$qym/bzszjdV1OEEgUmD4HOeOFEUHyX70OFswe8Gp2DnVclzmNczQu','$2y$10$eyFJVYywQur2Pkkn92n35.DsiBC4qOO0Ehw8W/lAtwgHiqs09xBXa','2028-10-11',255),(8,'enricruiz','Enric Ruiz Badia','enricruizbadia@gmail.com',534745623,'C/ Francesc macia 123','2024-12-06','$2y$10$4a7rGsuXucAKo480Bsxs3ulrq63RuMnRCsnCo8xFfGo6NLPAYhvgG','$2y$10$85frvZRMTBud/eEn52I0z.VSnIDnApuXhTZWWhwx6kdoAKt1ZbzAu','2024-12-19',255);
/*!40000 ALTER TABLE `USUARIOS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-07  1:50:37
