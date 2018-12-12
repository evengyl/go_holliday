-- MySQL dump 10.16  Distrib 10.1.35-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: go_holliday
-- ------------------------------------------------------
-- Server version	10.1.35-MariaDB

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
-- Table structure for table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `annonces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pays` int(11) NOT NULL,
  `id_habitat` int(11) NOT NULL,
  `id_type_vacances` int(11) NOT NULL,
  `id_proprio` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `vues` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annonces`
--

LOCK TABLES `annonces` WRITE;
/*!40000 ALTER TABLE `annonces` DISABLE KEYS */;
INSERT INTO `annonces` VALUES (1,1,1,1,1,'Bord de mer tatata','Mexico',175,1),(2,2,2,1,1,'Bord de mer tatata','Mexico',1772,1),(3,3,2,1,1,'Bord de mer tatata','Mexico',274,1),(4,4,1,1,1,'Bord de mer tatata','Mexico',12,1),(5,1,3,1,1,'Bord de mer tatata','Mexico',5,1),(6,2,3,1,1,'Bord de mer tatata','Mexico',0,1),(7,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(8,4,4,1,1,'Bord de mer tatata','Mexico',0,1),(9,1,5,2,1,'Bord de mer tatata','Mexico',0,1),(10,2,5,2,1,'Bord de mer tatata','Mexico',0,1),(11,3,6,2,1,'Bord de mer tatata','Mexico',0,1),(12,4,6,2,1,'Bord de mer tatata','Mexico',0,1),(13,1,1,2,1,'Bord de mer tatata','Mexico',0,1),(14,2,1,2,1,'Bord de mer tatata','Mexico',0,1),(15,3,2,2,1,'Bord de mer tatata','Mexico',0,1),(16,4,2,2,1,'Bord de mer tatata','Mexico',0,1),(17,1,3,3,1,'Bord de mer tatata','Mexico',0,1),(18,2,3,3,1,'Bord de mer tatata','Mexico',0,1),(19,3,4,3,1,'Bord de mer tatata','Mexico',0,1),(20,4,4,3,1,'Bord de mer tatata','Mexico',0,1),(21,1,5,3,1,'Bord de mer tatata','Mexico',0,1),(22,2,5,3,1,'Bord de mer tatata','Mexico',0,1),(23,3,6,3,1,'Bord de mer tatata','Mexico',0,1),(24,4,6,3,1,'Bord de mer tatata','Mexico',0,1),(25,1,1,1,1,'Bord de mer tatata','Mexico',0,1),(26,2,1,2,1,'Bord de mer tatata','Mexico',0,1),(27,3,2,3,1,'Bord de mer tatata','Mexico',0,1),(28,4,2,1,1,'Bord de mer tatata','Mexico',0,1),(29,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(30,2,3,3,1,'Bord de mer tatata','Mexico',0,1),(31,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(32,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(33,4,4,3,1,'Bord de mer tatata','Mexico',0,1),(34,1,5,3,1,'Bord de mer tatata','Mexico',0,1),(35,2,6,3,1,'Bord de mer tatata','Mexico',0,1),(36,3,6,3,1,'Bord de mer tatata','Mexico',0,1),(37,4,1,3,1,'Bord de mer tatata','Mexico',0,1),(38,1,1,1,1,'Bord de mer tatata','Mexico',0,1),(39,2,2,2,1,'Bord de mer tatata','Mexico',0,1),(40,3,2,3,1,'Bord de mer tatata','Mexico',0,1),(41,4,3,1,1,'Bord de mer tatata','Mexico',0,1),(42,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(43,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(44,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(45,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(46,1,5,3,1,'Bord de mer tatata','Mexico',0,1),(47,2,6,3,1,'Bord de mer tatata','Mexico',0,1),(48,3,6,3,1,'Bord de mer tatata','Mexico',0,1),(49,4,1,3,1,'Bord de mer tatata','Mexico',0,1),(50,1,1,1,1,'Bord de mer tatata','Mexico',0,1),(51,2,2,2,1,'Bord de mer tatata','Mexico',0,1),(52,3,2,3,1,'Bord de mer tatata','Mexico',0,1),(53,4,3,1,1,'Bord de mer tatata','Mexico',0,1),(54,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(55,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(56,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(57,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(58,1,5,3,1,'Bord de mer tatata','Mexico',0,1),(59,2,6,3,1,'Bord de mer tatata','Mexico',0,1),(60,3,6,3,1,'Bord de mer tatata','Mexico',0,1),(61,4,1,3,1,'Bord de mer tatata','Mexico',0,1),(62,1,1,1,1,'Bord de mer tatata','Mexico',0,1),(63,2,2,2,1,'Bord de mer tatata','Mexico',0,1),(64,3,2,3,1,'Bord de mer tatata','Mexico',0,1),(65,4,3,1,1,'Bord de mer tatata','Mexico',0,1),(66,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(67,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(68,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(69,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(70,1,5,3,1,'Bord de mer tatata','Mexico',0,1),(71,2,6,3,1,'Bord de mer tatata','Mexico',0,1),(72,3,6,3,1,'Bord de mer tatata','Mexico',0,1),(73,4,1,3,1,'Bord de mer tatata','Mexico',0,1),(74,1,1,1,1,'Bord de mer tatata','Mexico',0,1),(75,2,2,2,1,'Bord de mer tatata','Mexico',0,1),(76,3,2,3,1,'Bord de mer tatata','Mexico',0,1),(77,4,3,1,1,'Bord de mer tatata','Mexico',0,1),(78,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(79,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(80,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(81,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(82,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(83,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(84,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(85,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(86,1,5,3,1,'Bord de mer tatata','Mexico',0,1),(87,2,6,3,1,'Bord de mer tatata','Mexico',0,1),(88,3,6,3,1,'Bord de mer tatata','Mexico',0,1),(89,4,1,3,1,'Bord de mer tatata','Mexico',0,1),(90,1,1,1,1,'Bord de mer tatata','Mexico',0,1),(91,2,2,2,1,'Bord de mer tatata','Mexico',0,1),(92,3,2,3,1,'Bord de mer tatata','Mexico',0,1),(93,4,3,1,1,'Bord de mer tatata','Mexico',0,1),(94,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(95,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(96,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(97,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(98,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(99,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(100,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(101,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(102,1,5,3,1,'Bord de mer tatata','Mexico',0,1),(103,2,6,3,1,'Bord de mer tatata','Mexico',0,1),(104,3,6,3,1,'Bord de mer tatata','Mexico',0,1),(105,4,1,3,1,'Bord de mer tatata','Mexico',0,1),(106,1,1,1,1,'Bord de mer tatata','Mexico',0,1),(107,2,2,2,1,'Bord de mer tatata','Mexico',0,1),(108,3,2,3,1,'Bord de mer tatata','Mexico',0,1),(109,4,3,1,1,'Bord de mer tatata','Mexico',0,1),(110,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(111,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(112,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(113,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(114,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(115,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(116,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(117,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(118,1,5,3,1,'Bord de mer tatata','Mexico',0,1),(119,2,6,3,1,'Bord de mer tatata','Mexico',0,1),(120,3,6,3,1,'Bord de mer tatata','Mexico',0,1),(121,4,1,3,1,'Bord de mer tatata','Mexico',0,1),(122,1,1,1,1,'Bord de mer tatata','Mexico',0,1),(123,2,2,2,1,'Bord de mer tatata','Mexico',0,1),(124,3,2,3,1,'Bord de mer tatata','Mexico',0,1),(125,4,3,1,1,'Bord de mer tatata','Mexico',0,1),(126,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(127,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(128,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(129,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(130,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(131,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(132,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(133,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(134,1,5,3,1,'Bord de mer tatata','Mexico',0,1),(135,2,6,3,1,'Bord de mer tatata','Mexico',0,1),(136,3,6,3,1,'Bord de mer tatata','Mexico',0,1),(137,4,1,3,1,'Bord de mer tatata','Mexico',0,1),(138,1,1,1,1,'Bord de mer tatata','Mexico',0,1),(139,2,2,2,1,'Bord de mer tatata','Mexico',0,1),(140,3,2,3,1,'Bord de mer tatata','Mexico',0,1),(141,4,3,1,1,'Bord de mer tatata','Mexico',0,1),(142,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(143,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(144,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(145,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(146,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(147,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(148,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(149,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(150,1,5,3,1,'Bord de mer tatata','Mexico',0,1),(151,2,6,3,1,'Bord de mer tatata','Mexico',0,1),(152,3,6,3,1,'Bord de mer tatata','Mexico',0,1),(153,4,1,3,1,'Bord de mer tatata','Mexico',0,1),(154,1,1,1,1,'Bord de mer tatata','Mexico',0,1),(155,2,2,2,1,'Bord de mer tatata','Mexico',0,1),(156,3,2,3,1,'Bord de mer tatata','Mexico',0,1),(157,4,3,1,1,'Bord de mer tatata','Mexico',0,1),(158,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(159,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(160,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(161,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(162,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(163,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(164,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(165,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(166,1,5,3,1,'Bord de mer tatata','Mexico',0,1),(167,2,6,3,1,'Bord de mer tatata','Mexico',0,1),(168,3,6,3,1,'Bord de mer tatata','Mexico',0,1),(169,4,1,3,1,'Bord de mer tatata','Mexico',0,1),(170,1,1,1,1,'Bord de mer tatata','Mexico',0,1),(171,2,2,2,1,'Bord de mer tatata','Mexico',0,1),(172,3,2,3,1,'Bord de mer tatata','Mexico',0,1),(173,4,3,1,1,'Bord de mer tatata','Mexico',0,1),(174,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(175,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(176,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(177,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(178,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(179,2,4,3,1,'Bord de mer tatata','Mexico',0,1),(180,3,4,1,1,'Bord de mer tatata','Mexico',0,1),(181,4,5,2,1,'Bord de mer tatata','Mexico',0,1),(182,1,5,3,1,'Bord de mer tatata','Mexico',0,1),(183,2,6,3,1,'Bord de mer tatata','Mexico',0,1),(184,3,6,3,1,'Bord de mer tatata','Mexico',0,1),(185,4,1,3,1,'Bord de mer tatata','Mexico',0,1),(186,1,1,1,1,'Bord de mer tatata','Mexico',0,1),(187,2,2,2,1,'Bord de mer tatata','Mexico',0,1),(188,3,2,3,1,'Bord de mer tatata','Mexico',0,1),(189,4,3,1,1,'Bord de mer tatata','Mexico',0,1),(190,1,3,2,1,'Bord de mer tatata','Mexico',0,1),(191,2,4,3,1,'Bord de mer tatata','Mexico',0,1);
/*!40000 ALTER TABLE `annonces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `date_annonces`
--

DROP TABLE IF EXISTS `date_annonces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `date_annonces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_annonces` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `prix` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `date_annonces`
--

LOCK TABLES `date_annonces` WRITE;
/*!40000 ALTER TABLE `date_annonces` DISABLE KEYS */;
INSERT INTO `date_annonces` VALUES (1,1,'2018-11-23','2018-11-30',250),(2,2,'2018-11-01','2018-11-20',300),(3,3,'2018-11-11','2018-11-15',350),(4,4,'2018-11-13','2018-11-14',400),(5,5,'2018-11-23','2018-11-30',250),(6,6,'2018-11-01','2018-11-20',300),(7,7,'2018-11-11','2018-11-15',350),(8,8,'2018-11-13','2018-11-14',400),(9,9,'2018-11-23','2018-11-30',250),(10,10,'2018-11-01','2018-11-20',300),(11,11,'2018-11-11','2018-11-15',350),(12,12,'2018-11-13','2018-11-14',400),(13,13,'2018-11-23','2018-11-30',250),(14,14,'2018-11-01','2018-11-20',300),(15,15,'2018-11-11','2018-11-15',350),(16,16,'2018-11-13','2018-11-14',400),(17,17,'2018-11-23','2018-11-30',250),(18,18,'2018-11-01','2018-11-20',300),(19,19,'2018-11-11','2018-11-15',350),(20,20,'2018-11-13','2018-11-14',400),(21,21,'2018-11-23','2018-11-30',250),(22,22,'2018-11-01','2018-11-20',300),(23,23,'2018-11-11','2018-11-15',350),(24,24,'2018-11-13','2018-11-14',400),(25,25,'2018-11-23','2018-11-30',250),(26,26,'2018-11-01','2018-11-20',300),(27,27,'2018-11-11','2018-11-15',350),(28,28,'2018-11-13','2018-11-14',400),(29,29,'2018-11-23','2018-11-30',250),(30,30,'2018-11-01','2018-11-20',300),(31,31,'2018-11-11','2018-11-15',350),(32,32,'2018-11-13','2018-11-14',400),(33,33,'2018-11-23','2018-11-30',250),(34,34,'2018-11-01','2018-11-20',300),(35,35,'2018-11-11','2018-11-15',350),(36,36,'2018-11-13','2018-11-14',400),(37,37,'2018-11-23','2018-11-30',250),(38,38,'2018-11-01','2018-11-20',300),(39,39,'2018-11-11','2018-11-15',350),(40,40,'2018-11-13','2018-11-14',400),(41,41,'2018-11-23','2018-11-30',250),(42,42,'2018-11-01','2018-11-20',300),(43,43,'2018-11-11','2018-11-15',350),(44,44,'2018-11-13','2018-11-14',400),(45,45,'2018-11-23','2018-11-30',250),(46,46,'2018-11-01','2018-11-20',300),(47,47,'2018-11-11','2018-11-15',350),(48,48,'2018-11-13','2018-11-14',400),(49,49,'2018-11-23','2018-11-30',250),(50,50,'2018-11-01','2018-11-20',300),(51,51,'2018-11-11','2018-11-15',350),(52,52,'2018-11-13','2018-11-14',400),(53,53,'2018-11-23','2018-11-30',250),(54,54,'2018-11-01','2018-11-20',300),(55,55,'2018-11-11','2018-11-15',350),(56,56,'2018-11-13','2018-11-14',400),(57,57,'2018-11-23','2018-11-30',250),(58,58,'2018-11-01','2018-11-20',300),(59,59,'2018-11-11','2018-11-15',350),(60,60,'2018-11-13','2018-11-14',400),(61,61,'2018-11-23','2018-11-30',250),(62,62,'2018-11-01','2018-11-20',300),(63,63,'2018-11-11','2018-11-15',350),(64,64,'2018-11-13','2018-11-14',400),(65,65,'2018-11-23','2018-11-30',250),(66,66,'2018-11-01','2018-11-20',300),(67,67,'2018-11-11','2018-11-15',350),(68,68,'2018-11-13','2018-11-14',400),(69,69,'2018-11-23','2018-11-30',250),(70,70,'2018-11-01','2018-11-20',300),(71,71,'2018-11-11','2018-11-15',350),(72,72,'2018-11-13','2018-11-14',400),(73,73,'2018-11-23','2018-11-30',250),(74,74,'2018-11-01','2018-11-20',300),(75,75,'2018-11-11','2018-11-15',350),(76,76,'2018-11-13','2018-11-14',400),(77,77,'2018-11-23','2018-11-30',250),(78,78,'2018-11-01','2018-11-20',300),(79,79,'2018-11-11','2018-11-15',350),(80,80,'2018-11-13','2018-11-14',400),(81,81,'2018-11-23','2018-11-30',250),(82,82,'2018-11-01','2018-11-20',300),(83,83,'2018-11-11','2018-11-15',350),(84,84,'2018-11-13','2018-11-14',400),(85,85,'2018-11-23','2018-11-30',250),(86,86,'2018-11-01','2018-11-20',300),(87,87,'2018-11-11','2018-11-15',350),(88,88,'2018-11-13','2018-11-14',400),(89,89,'2018-11-23','2018-11-30',250),(90,90,'2018-11-01','2018-11-20',300),(91,91,'2018-11-11','2018-11-15',350),(92,92,'2018-11-13','2018-11-14',400),(93,93,'2018-11-23','2018-11-30',250),(94,94,'2018-11-01','2018-11-20',300),(95,95,'2018-11-11','2018-11-15',350),(96,96,'2018-11-13','2018-11-14',400),(97,97,'2018-11-23','2018-11-30',250),(98,98,'2018-11-01','2018-11-20',300),(99,99,'2018-11-11','2018-11-15',350),(100,100,'2018-11-13','2018-11-14',400),(101,101,'2018-11-23','2018-11-30',250),(102,102,'2018-11-01','2018-11-20',300),(103,103,'2018-11-11','2018-11-15',350),(104,104,'2018-11-13','2018-11-14',400),(105,105,'2018-11-23','2018-11-30',250),(106,106,'2018-11-01','2018-11-20',300),(107,107,'2018-11-11','2018-11-15',350),(108,108,'2018-11-13','2018-11-14',400),(109,109,'2018-11-23','2018-11-30',250),(110,110,'2018-11-01','2018-11-20',300),(111,111,'2018-11-11','2018-11-15',350),(112,112,'2018-11-13','2018-11-14',400),(113,113,'2018-11-23','2018-11-30',250),(114,114,'2018-11-01','2018-11-20',300),(115,115,'2018-11-11','2018-11-15',350),(116,116,'2018-11-13','2018-11-14',400),(117,117,'2018-11-23','2018-11-30',250),(118,118,'2018-11-01','2018-11-20',300),(119,119,'2018-11-11','2018-11-15',350),(120,120,'2018-11-13','2018-11-14',400),(121,121,'2018-11-23','2018-11-30',250),(122,122,'2018-11-01','2018-11-20',300),(123,123,'2018-11-11','2018-11-15',350),(124,124,'2018-11-13','2018-11-14',400),(125,125,'2018-11-23','2018-11-30',250),(126,126,'2018-11-01','2018-11-20',300),(127,127,'2018-11-11','2018-11-15',350),(128,128,'2018-11-13','2018-11-14',400),(129,129,'2018-11-23','2018-11-30',250),(130,130,'2018-11-01','2018-11-20',300),(131,131,'2018-11-11','2018-11-15',350),(132,132,'2018-11-13','2018-11-14',400),(133,133,'2018-11-23','2018-11-30',250),(134,134,'2018-11-01','2018-11-20',300),(135,135,'2018-11-11','2018-11-15',350),(136,136,'2018-11-13','2018-11-14',400),(137,137,'2018-11-23','2018-11-30',250),(138,138,'2018-11-01','2018-11-20',300),(139,139,'2018-11-11','2018-11-15',350),(140,140,'2018-11-13','2018-11-14',400),(141,141,'2018-11-23','2018-11-30',250),(142,142,'2018-11-01','2018-11-20',300),(143,143,'2018-11-11','2018-11-15',350),(144,144,'2018-11-13','2018-11-14',400),(145,145,'2018-11-23','2018-11-30',250),(146,146,'2018-11-01','2018-11-20',300),(147,147,'2018-11-11','2018-11-15',350),(148,148,'2018-11-13','2018-11-14',400),(149,149,'2018-11-23','2018-11-30',250),(150,150,'2018-11-01','2018-11-20',300),(151,151,'2018-11-11','2018-11-15',350),(152,152,'2018-11-13','2018-11-14',400),(153,153,'2018-11-23','2018-11-30',250),(154,154,'2018-11-01','2018-11-20',300),(155,155,'2018-11-11','2018-11-15',350),(156,156,'2018-11-13','2018-11-14',400),(157,157,'2018-11-23','2018-11-30',250),(158,158,'2018-11-01','2018-11-20',300),(159,159,'2018-11-11','2018-11-15',350),(160,160,'2018-11-13','2018-11-14',400),(161,161,'2018-11-23','2018-11-30',250),(162,162,'2018-11-01','2018-11-20',300),(163,163,'2018-11-11','2018-11-15',350),(164,164,'2018-11-13','2018-11-14',400),(165,165,'2018-11-23','2018-11-30',250),(166,166,'2018-11-01','2018-11-20',300),(167,167,'2018-11-11','2018-11-15',350),(168,168,'2018-11-13','2018-11-14',400),(169,169,'2018-11-23','2018-11-30',250),(170,170,'2018-11-01','2018-11-20',300),(171,171,'2018-11-11','2018-11-15',350),(172,172,'2018-11-13','2018-11-14',400),(173,173,'2018-11-23','2018-11-30',250),(174,174,'2018-11-01','2018-11-20',300),(175,175,'2018-11-11','2018-11-15',350),(176,176,'2018-11-13','2018-11-14',400),(177,177,'2018-11-23','2018-11-30',250),(178,178,'2018-11-01','2018-11-20',300),(179,179,'2018-11-11','2018-11-15',350),(180,180,'2018-11-13','2018-11-14',400),(181,181,'2018-11-23','2018-11-30',250),(182,182,'2018-11-01','2018-11-20',300),(183,183,'2018-11-11','2018-11-15',350),(184,184,'2018-11-13','2018-11-14',400),(185,185,'2018-11-23','2018-11-30',250),(186,186,'2018-11-01','2018-11-20',300),(187,187,'2018-11-11','2018-11-15',350),(188,188,'2018-11-13','2018-11-14',400),(189,189,'2018-11-23','2018-11-30',250),(190,190,'2018-11-01','2018-11-20',300),(191,191,'2018-11-11','2018-11-15',350);
/*!40000 ALTER TABLE `date_annonces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habitat`
--

DROP TABLE IF EXISTS `habitat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `habitat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `img` varchar(50) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitat`
--

LOCK TABLES `habitat` WRITE;
/*!40000 ALTER TABLE `habitat` DISABLE KEYS */;
INSERT INTO `habitat` VALUES (1,'Caravanes','caravane.jpg','Caravane : '),(2,'Bungalows','bungalow.jpg','Bungalow : '),(3,'Appartements','appartement.jpg','Appartements : '),(4,'Maisons d\'hôtes','maison_hote.jpg','Maisons d\'hôtes : '),(5,'Gites','gite.jpg','Gites : '),(6,'Villa','villa.jpg','Villa : ');
/*!40000 ALTER TABLE `habitat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_connect` varchar(50) NOT NULL,
  `password_no_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `id_utilisateurs` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'evengyl','$2y$10$LMyXpdg11OyYKNOtimiQOOfEABrPA5DOEubnuxvnmOCGiq1Y.BhvS','1490198511','legends','dark.evengyl@gmail.com',3,1);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `option_app`
--

DROP TABLE IF EXISTS `option_app`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `option_app` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` tinyint(1) NOT NULL,
  `name_human_see` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option_app`
--

LOCK TABLES `option_app` WRITE;
/*!40000 ALTER TABLE `option_app` DISABLE KEYS */;
INSERT INTO `option_app` VALUES (1,'view_time_exec_page',1,'Voir le temps d\'execution de la page'),(2,'get_sql_list',1,'Voir la liste des requète SQL éffectuée'),(3,'view_error_in_index',1,'Voir les Error Session dans l\'index'),(4,'app_with_login_option',1,'Initialiser un module de connection utilisateur ?'),(5,'view_post_in_index',1,'Voir les POST dans l\'index'),(6,'view_tpl_name_in_source_code',0,'Voir les noms des TPL dans le code source de la page'),(7,'translate_site',1,'Utiliser le système de traduction ?'),(8,'view_breadcrumb',0,'Afficher le BreadCrumb?');
/*!40000 ALTER TABLE `option_app` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `img` varchar(50) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pays`
--

LOCK TABLES `pays` WRITE;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` VALUES (1,'Belgique','drapeau_belgique.jpg','La Belgique : '),(2,'France','drapeau_france.jpg','La France : '),(3,'Italie','drapeau_italie.jpg','L\'Italie : '),(4,'Espagne','drapeau_espagne.jpg','L\'Espagne : '),(5,'Pays-Bas','drapeau_pays_bas.jpg','Les Pays-Bas : ');
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translate`
--

DROP TABLE IF EXISTS `translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_fr` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_nl` varchar(255) NOT NULL,
  `name_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translate`
--

LOCK TABLES `translate` WRITE;
/*!40000 ALTER TABLE `translate` DISABLE KEYS */;
INSERT INTO `translate` VALUES (1,'Acceuil','','','__TRANS_accueil__'),(2,'Réservation','','','__TRANS_reservation__'),(3,'Contactez nous','','','__TRANS_contact_us__'),(5,'Ce que vous voulez','','','__TRANS_who_would_like__'),(6,'Reserver','','','__TRANS_reserver__'),(7,'Détails de contact','','','__TRANS__contact_detail__'),(8,'Adresse','','','__TRANS_address_title__'),(9,'Téléphone 2','','','__TRANS_tel_1__'),(10,'Téléphone','','','__TRANS_tel__'),(11,'Tous les prix sont TVAC','','','__TRANS_footer_price__'),(12,'Se connecter','','','__TRANS_login__'),(13,'Documentation','','','__TRANS_documentations__'),(14,'Envoyer','','','__TRANS_envoyer__'),(15,'Téléphone de la maintenance','','','__TRANS_tel_mainteance__'),(16,'Téléphone commercial','','','__TRANS_tel_commercial__'),(17,'','','','__TRANS_204__'),(18,'','','','__TRANS_error_explain__'),(19,'','','','__TRANS_horaire__'),(20,'','','','__TRANS_horaire_list__');
/*!40000 ALTER TABLE `translate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_vacances`
--

DROP TABLE IF EXISTS `type_vacances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_vacances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `icon` text NOT NULL,
  `url` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_vacances`
--

LOCK TABLES `type_vacances` WRITE;
/*!40000 ALTER TABLE `type_vacances` DISABLE KEYS */;
INSERT INTO `type_vacances` VALUES (1,'Couples','<i style=\"font-size:56px; color:#ef6b6b;\" class=\"fas fa-heart\"></i>&nbsp;\r\n<i style=\"font-size:56px; color:#ef6b6b;\" class=\"fas fa-heart\"></i>&nbsp;\r\n<i style=\"font-size:56px; color:#ef6b6b;\" class=\"fas fa-heart\"></i>&nbsp;','couples','couple.jpg','Vacances de couples','Lieux de vacances plus orientées vers les promenades en amoureux, les bon plans restaurant et paysage romantique ect...'),(2,'Familles','<i style=\"font-size:56px; color:#ffaeae;\" class=\"fas fa-female\"></i>&nbsp;\r\n<i style=\"font-size:35px; color:#00800080;\" class=\"fas fa-child\"></i>&nbsp;\r\n<i style=\"font-size:35px; color:#00800080;\" class=\"fas fa-child\"></i>&nbsp;\r\n<i style=\"font-size:35px; color:#00800080;\" class=\"fas fa-child\"></i>&nbsp;\r\n<i style=\"font-size:56px; color:#9393fb;\" class=\"fas fa-male\"></i>&nbsp;','familles','famille.jpg','Vacances en familles','Lieux de vacances orientées pour les vacances en familles avec les banbins, la recherche se base sur les activités faites pour les enfants ect...'),(3,'Aventures','<i style=\"font-size:56px; color:#773838b3;\" class=\"fas fa-hiking\"></i>&nbsp;\r\n<i style=\"font-size:56px; color:#773838b3;\" class=\"fas fa-mountain\"></i>&nbsp;\r\n<i style=\"font-size:56px; color:#773838b3;\" class=\"fas fa-campground\"></i>&nbsp;','aventures','aventure.jpg','Le pleins d\'aventures','Lieux de vacances plus orientées pour les rendonnées, les lieux à visités, une richesse de la régions ect...');
/*!40000 ALTER TABLE `type_vacances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT 'Aucun(e)',
  `last_name` varchar(50) NOT NULL DEFAULT 'Aucun(e)',
  `age` tinyint(4) NOT NULL DEFAULT '0',
  `tel` varchar(13) NOT NULL DEFAULT 'Aucun(e)',
  `address_rue` varchar(100) NOT NULL DEFAULT 'Aucun(e)',
  `address_numero` varchar(20) NOT NULL DEFAULT 'Aucun(e)',
  `address_localite` varchar(60) NOT NULL DEFAULT 'Aucun(e)',
  `zip_code` varchar(10) NOT NULL DEFAULT 'Aucun(e)',
  `pays` varchar(50) NOT NULL DEFAULT 'Aucun(e)',
  `genre` varchar(50) NOT NULL DEFAULT 'Aucun(e)',
  `user_type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (1,'Loïc','Baudoux',27,'0497312523','jean jaurès','12','labuissiere','6567','Belgique','Monsieur',2);
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-12 16:59:50
