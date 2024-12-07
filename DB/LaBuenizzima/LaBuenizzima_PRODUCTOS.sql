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
-- Table structure for table `PRODUCTOS`
--

DROP TABLE IF EXISTS `PRODUCTOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PRODUCTOS` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `producto_ingrediente_id` int DEFAULT NULL,
  `descripcion` text,
  `categoria` varchar(100) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `seccion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `producto_ingrediente_id` (`producto_ingrediente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCTOS`
--

LOCK TABLES `PRODUCTOS` WRITE;
/*!40000 ALTER TABLE `PRODUCTOS` DISABLE KEYS */;
INSERT INTO `PRODUCTOS` VALUES (1,'la buenizzima',1,'Especial de la casa. La Buenizzima es una mezcla de sabores que no vas a poder quitarte de la cabeza.','especialidades',17.99,'media/images/SF/pizza_la_buenizzima_SF.webp','pizzas'),(2,'margarita',2,'Clásica y sencilla que combina sabores frescos y auténticos como la albahaca, el tomate y la mozzarella, ofreciendo una experiencia deliciosa y equilibrada.','especialidades',14.99,'media/images/SF/pizza_margarita_SF.webp','pizzas'),(3,'barbacoa cremosa',3,'Llena de sabor, combinando la dulzura de la salsa barbacoa con ingredientes ahumados y queso derretido para una experiencia intensa y satisfactoria.','clasicas',15.99,'media/images/SF/pizza_barbacoa_SF.webp','pizzas'),(4,'carbonara',4,'Cremosa y reconfortante, que mezcla el sabor suave de la salsa blanca, el queso y el toque salado del bacon, creando una combinación deliciosa y rica en texturas.','clasicas',15.99,'media/images/SF/pizza_carbonara_SF.webp','pizzas'),(5,'hawaiana',5,'Cremosa y reconfortante, que mezcla el sabor suave de la salsa blanca, el queso y el toque salado del bacon, creando una combinación deliciosa y rica en texturas.','clasicas',15.99,'media/images/SF/pizza_hawaiana_SF.webp','pizzas'),(6,'cuatro quesos',6,'Festín cremoso y lleno de sabor, donde la mezcla de distintos quesos se funde a la perfección, ofreciendo una experiencia rica y deliciosa para los amantes del queso.','clasicas',14.99,'media/images/SF/pizza_cuatro_quesos_SF.webp','pizzas'),(7,'bacon',7,'Indulgente y sabrosa, donde el crujiente y ahumado bacon se combina con queso derretido para un bocado lleno de sabor y textura.','clasicas',13.99,'media/images/SF/pizza_bacon_SF.webp','pizzas'),(8,'peperoni',8,'Explosión de sabor con el irresistible toque ahumado y especiado del pepperoni, creando una experiencia deliciosa y con un toque atrevido.','clasicas',13.99,'media/images/SF/pizza_peperoni_SF.webp','pizzas'),(9,'la furiosa',9,'Audaz y explosiva, cargada de ingredientes picantes que intensifican cada bocado, perfecta para quienes buscan una experiencia intensa y llena de sabor.','picantes',15.99,'media/images/SF/pizza_furiosa_SF.webp','pizzas'),(10,'carnívora',10,'Combina la intensidad de una selección de carnes jugosas con el toque atrevido del picante, creando una experiencia robusta y llena de sabor para los amantes de la carne con un giro picante.','picantes',15.99,'media/images/SF/pizza_carnivora_SF.webp','pizzas'),(11,'de la huerta',11,'Combina una base crujiente con una variedad de verduras frescas y sabrosas, como pimientos, cebolla, champiñones y espinacas, todo cubierto con queso derretido.','vegetarianas',14.99,'media/images/SF/pizza_la_huerta_SF.webp','pizzas'),(12,'al pesto',12,'Una base crujiente cubierta con salsa de pesto, queso mozzarella y a menudo incluye verduras, aportando un sabor fresco y aromático.','vegetarianas',15.99,'media/images/SF/pizza_pesto_SF.webp','pizzas'),(13,'agua',13,'Agua','aguas',1.00,'media/images/SF/agua_SF.webp','bebidas'),(14,'cocacola',14,'Cocacola','refrescos',1.50,'media/images/SF/cocacola_SF.webp','bebidas'),(15,'fanta',15,'Fanta','refrescos',1.50,'media/images/SF/fanta_SF.webp','bebidas'),(16,'cerveza',16,'Cerveza','alchoolicas',2.00,'media/images/SF/cerveza_SF.webp','bebidas'),(17,'sprite',17,'Sprite','refrescos',1.50,'media/images/SF/sprite_SF.webp','bebidas'),(18,'nestea',18,'Té de limon','refrescos',1.50,'media/images/SF/nestea_SF.webp','bebidas'),(19,'agua con gas',24,'Agua con gas','aguas',1.00,'media/images/SF/agua_con_gas_SF.webp','bebidas'),(20,'vino',25,'Vino de la casa','alchoolicas',11.50,'media/images/SF/vino_SF.webp','bebidas'),(21,'cava',26,'Cava de la casa','alchoolicas',13.50,'media/images/SF/cava_SF.webp','bebidas'),(22,'wisky',27,'Wisky Jack Daniels','alchoolicas',5.00,'media/images/SF/whisky_SF.webp','bebidas'),(23,'cafe',28,'Café normal','cafes',2.50,'media/images/SF/cafe_SF.webp','bebidas'),(24,'cafe con leche',29,'Café con leche','cafes',2.50,'media/images/cafe_con_leche_SF.webp','bebidas'),(25,'tarta de queso',19,'tarta de queso','tartas',3.50,'media/images/SF/tarta_queso_SF.webp','postres'),(26,'helado de chocolate',20,'Helado de chocolate cremoso','helados',2.50,'media/images/SF/helado_chocolate_SF.webp','postres'),(27,'flan casero',21,'Flan casero con caramelo','flanes',4.00,'media/images/SF/flan_casero_SF.webp','postres'),(28,'brownie',22,'Brownie de chocolate con nueces','otros',3.00,'media/images/SF/brownie_SF.webp','postres'),(29,'fruta',23,'Fruta de temporada a escoger','otros',1.50,'media/images/SF/fruta_SF.webp','postres'),(30,'tarta cumpleaños',30,'tarta de cumpleaños preparada en la casa','tartas',9.50,'media/images/SF/tarta_cumpleaños_SF.webp','postres'),(31,'helado de vahinilla',31,'Helado de vahinilla','helados',3.50,'media/images/SF/helado_vahinilla_SF.webp','postres'),(32,'flan de huevo',32,'Flan casero de huevo','flanes',3.50,'media/images/SF/flan_huevo_SF.webp','postres'),(33,'coulant',33,'Coulant de chocolate negro','otros',4.50,'media/images/SF/coulant_SF.webp','postres'),(34,'helado de nata',34,'Helado casero de nata','helados',1.50,'media/images/SF/helado_nata_SF.webp','postres');
/*!40000 ALTER TABLE `PRODUCTOS` ENABLE KEYS */;
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
