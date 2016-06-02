-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: estacionamento
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` char(15) NOT NULL,
  `cnh` char(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cep` char(10) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Cliente 1','11877396699','1212.2121.2','BR 116 KM 289','Lajinha','321413342','Teofilo Otoni','0','(33)99120-5108'),(8,'Cliente 3','118.773.966-99','1212.2121.2','BR 116 KM 289','Lajinha','321413342','Teofilo Otoni','0','(33)99120-5108'),(9,'Cliente 3','118.773.966-99','1212.2121.2','BR 116 KM 289','Lajinha','321413342','Teofilo Otoni','0','(33)99120-5108'),(10,'Cliente 3','118.773.966-99','1212.2121.2','BR 116 KM 289','Lajinha','321413342','Teofilo Otoni','0','(33)99120-5108'),(11,'Cliente 3','118.773.966-99','1212.2121.2','BR 116 KM 289','Lajinha','321413342','Teofilo Otoni','0','(33)99120-5108'),(12,'Cliente 3','118.773.966-99','1212.2121.2','BR 116 KM 289','Lajinha','321413342','Teofilo Otoni','0','(33)99120-5108'),(13,'Cliente 3','118.773.966-99','1212.2121.2','BR 116 KM 289','Lajinha','321413342','Teofilo Otoni','0','(33)99120-5108'),(14,'Cliente 3','118.773.966-99','1212.2121.2','BR 116 KM 289','Lajinha','321413342','Teofilo Otoni','0','(33)99120-5108');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-02  9:58:00
