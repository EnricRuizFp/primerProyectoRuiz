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
-- Table structure for table `INGREDIENTES`
--

DROP TABLE IF EXISTS `INGREDIENTES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `INGREDIENTES` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `precio_unidad` decimal(5,2) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `INGREDIENTES`
--

LOCK TABLES `INGREDIENTES` WRITE;
/*!40000 ALTER TABLE `INGREDIENTES` DISABLE KEYS */;
INSERT INTO `INGREDIENTES` VALUES (1,'masa','masa de pizza clásica',3.00,'masas'),(2,'salsa barbacoa','deliciosa salsa barbacoa casera',1.50,'salsas'),(3,'salsa carbonara','deliciosa salsa carbonara casera',1.50,'salsas'),(4,'salsa pesto','deliciosa salsa de pesto casera',1.50,'salsas'),(5,'salsa tomate','deliciosa salsa de tomate casera',1.50,'salsas'),(6,'mozzarella','queso que aporta suavidad y un acabado fundido',1.50,'quesos'),(7,'parmesano',' queso intenso que realza sabor con su toque umami',1.50,'quesos'),(8,'azul','queso con sabor fuerte y cremoso, ideal para contrastes',1.50,'quesos'),(9,'emmental','queso suave, ligeramente dulce, añade textura y fundido',1.50,'quesos'),(10,'bacon','carne curada y ahumada que aporta un toque crujiente',2.00,'carnes'),(11,'carne picada','carne de res molida, jugosa y sabrosa',2.00,'carnes'),(12,'chorizo picante','embutido de cerdo picante que añade sabor y carácter',2.00,'carnes'),(13,'jamón cocido','delicado y suave, ideal para equilibrar sabores',2.00,'carnes'),(14,'pepperoni','embutido de cerdo y res con un toque picante',2.00,'carnes'),(15,'pollo asado','pechuga de pollo cocinada lentamente, suave y sabrosa',2.00,'carnes'),(16,'calabacín','verdura suave y fresca que aporta un toque delicado',1.50,'verduras'),(17,'cebolla','vegetal que añade sabor dulce y un toque crujiente',1.50,'verduras'),(18,'champiñones','hongos frescos que ofrecen una textura carnosa y suave',1.50,'verduras'),(19,'jalapeños','pimientos picantes que aportan un toque de frescura y sabor',1.50,'verduras'),(20,'pimientos','verdura jugosa y dulce que da color y sabor',1.50,'verduras'),(21,'tomate cherry','tomates pequeños y dulces que aportan frescura',1.50,'verduras'),(22,'piña','fruta tropical dulce que añade un contraste fresco y sabroso',1.50,'frutas'),(23,'aceite','aceite de oliva virgen extra, para aderezar y dar brillo',1.00,'otros'),(24,'albahaca fresca','hierba aromática que da frescura y sabor a la pizza',1.00,'otros');
/*!40000 ALTER TABLE `INGREDIENTES` ENABLE KEYS */;
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
