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
  `id_date_annonces` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `vues` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annonces`
--

LOCK TABLES `annonces` WRITE;
/*!40000 ALTER TABLE `annonces` DISABLE KEYS */;
INSERT INTO `annonces` VALUES (1,1,1,1,1,1,'Bord de mer tatata','Mexico',175,0,'14/12/2018'),(2,2,2,1,1,1,'Bord de mer tatata','Mexico',1772,0,'14/12/2018'),(3,3,2,1,1,1,'Bord de mer tatata','Mexico',274,0,'14/12/2018'),(4,4,1,1,1,1,'Bord de mer tatata','Mexico',12,0,'14/12/2018'),(5,1,3,1,1,1,'Bord de mer tatata','Mexico',5,0,'14/12/2018'),(6,2,3,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(7,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(8,4,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(9,1,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(10,2,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(11,3,6,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(12,4,6,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(13,1,1,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(14,2,1,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(15,3,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(16,4,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(17,1,3,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(18,2,3,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(19,3,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(20,4,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(21,1,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(22,2,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(23,3,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(24,4,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(25,1,1,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(26,2,1,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(27,3,2,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(28,4,2,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(29,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(30,2,3,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(31,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(32,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(33,4,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(34,1,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(35,2,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(36,3,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(37,4,1,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(38,1,1,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(39,2,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(40,3,2,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(41,4,3,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(42,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(43,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(44,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(45,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(46,1,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(47,2,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(48,3,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(49,4,1,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(50,1,1,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(51,2,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(52,3,2,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(53,4,3,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(54,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(55,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(56,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(57,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(58,1,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(59,2,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(60,3,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(61,4,1,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(62,1,1,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(63,2,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(64,3,2,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(65,4,3,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(66,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(67,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(68,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(69,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(70,1,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(71,2,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(72,3,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(73,4,1,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(74,1,1,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(75,2,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(76,3,2,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(77,4,3,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(78,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(79,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(80,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(81,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(82,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(83,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(84,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(85,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(86,1,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(87,2,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(88,3,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(89,4,1,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(90,1,1,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(91,2,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(92,3,2,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(93,4,3,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(94,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(95,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(96,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(97,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(98,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(99,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(100,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(101,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(102,1,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(103,2,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(104,3,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(105,4,1,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(106,1,1,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(107,2,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(108,3,2,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(109,4,3,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(110,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(111,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(112,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(113,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(114,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(115,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(116,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(117,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(118,1,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(119,2,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(120,3,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(121,4,1,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(122,1,1,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(123,2,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(124,3,2,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(125,4,3,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(126,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(127,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(128,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(129,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(130,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(131,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(132,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(133,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(134,1,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(135,2,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(136,3,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(137,4,1,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(138,1,1,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(139,2,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(140,3,2,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(141,4,3,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(142,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(143,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(144,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(145,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(146,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(147,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(148,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(149,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(150,1,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(151,2,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(152,3,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(153,4,1,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(154,1,1,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(155,2,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(156,3,2,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(157,4,3,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(158,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(159,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(160,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(161,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(162,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(163,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(164,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(165,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(166,1,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(167,2,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(168,3,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(169,4,1,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(170,1,1,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(171,2,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(172,3,2,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(173,4,3,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(174,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(175,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(176,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(177,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(178,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(179,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(180,3,4,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(181,4,5,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(182,1,5,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(183,2,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(184,3,6,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(185,4,1,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(186,1,1,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(187,2,2,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(188,3,2,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(189,4,3,1,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(190,1,3,2,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(191,2,4,3,1,1,'Bord de mer tatata','Mexico',0,0,'14/12/2018'),(192,0,0,0,0,1,'j','',0,0,'28/01/2019'),(193,0,0,0,0,1,'ef','',0,0,'28/01/2019'),(194,0,0,0,0,1,'ef','',0,0,'28/01/2019'),(207,0,0,0,0,1,'g','',0,0,'28/01/2019'),(208,0,0,0,0,1,'y','',0,0,'28/01/2019'),(209,0,0,0,0,1,'h','',0,0,'28/01/2019'),(210,0,0,0,0,1,'','',0,0,'28/01/2019'),(211,0,0,0,0,2,'tuftu','tutfu',0,0,'28/01/2019');
/*!40000 ALTER TABLE `annonces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avis_on_annonces`
--

DROP TABLE IF EXISTS `avis_on_annonces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avis_on_annonces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_annonces` int(11) NOT NULL,
  `create_date` varchar(25) NOT NULL,
  `login_published` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avis_on_annonces`
--

LOCK TABLES `avis_on_annonces` WRITE;
/*!40000 ALTER TABLE `avis_on_annonces` DISABLE KEYS */;
INSERT INTO `avis_on_annonces` VALUES (1,1,'20/01/2019','evengyl','C\'est le premier avis du site, j\'espère qu\'il sera bien foutu et que ça marchera',1),(2,1,'21/01/2019','evengyl','C\'est le premier avis du site, j\'espère qu\'il sera bien foutu et que ça marchera en fait non c\'est le deuxieme',1),(3,1,'25/01/2019','evengyl','C\'est le troisemeavis du site, j\'espère qu\'il sera bien foutu et que ça marchera',1),(4,1,'22/02/2019','evengyl','C\'est le quatriemeavis du site, j\'espère qu\'il sera bien foutu et que ça marchera ',1),(5,2,'20/01/2019','evengyl','C\'est le premier avis du site, j\'espère qu\'il sera bien foutu et que ça marchera',1),(6,2,'21/01/2019','evengyl','C\'est le premier avis du site, j\'espère qu\'il sera bien foutu et que ça marchera en fait non c\'est le deuxieme',1),(7,2,'25/01/2019','evengyl','C\'est le troisemeavis du site, j\'espère qu\'il sera bien foutu et que ça marchera',1),(8,2,'22/02/2019','evengyl','C\'est le quatriemeavis du site, j\'espère qu\'il sera bien foutu et que ça marchera ',1),(9,3,'20/01/2019','evengyl','C\'est le premier avis du site, j\'espère qu\'il sera bien foutu et que ça marchera',1),(10,3,'21/01/2019','evengyl','C\'est le premier avis du site, j\'espère qu\'il sera bien foutu et que ça marchera en fait non c\'est le deuxieme',1),(11,3,'25/01/2019','evengyl','C\'est le troisemeavis du site, j\'espère qu\'il sera bien foutu et que ça marchera',1),(12,3,'22/02/2019','evengyl','C\'est le quatriemeavis du site, j\'espère qu\'il sera bien foutu et que ça marchera ',1),(13,4,'20/01/2019','evengyl','C\'est le premier avis du site, j\'espère qu\'il sera bien foutu et que ça marchera',1),(14,4,'21/01/2019','evengyl','C\'est le premier avis du site, j\'espère qu\'il sera bien foutu et que ça marchera en fait non c\'est le deuxieme',1),(15,4,'25/01/2019','evengyl','C\'est le troisemeavis du site, j\'espère qu\'il sera bien foutu et que ça marchera',1),(16,4,'22/02/2019','evengyl','C\'est le quatriemeavis du site, j\'espère qu\'il sera bien foutu et que ça marchera ',1);
/*!40000 ALTER TABLE `avis_on_annonces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `date_annonces`
--

DROP TABLE IF EXISTS `date_annonces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `date_annonces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
INSERT INTO `date_annonces` VALUES (1,'2018-11-23','2018-11-30',250),(2,'2018-11-01','2018-11-20',300),(3,'2018-11-11','2018-11-15',350),(4,'2018-11-13','2018-11-14',400),(5,'2018-11-23','2018-11-30',250),(6,'2018-11-01','2018-11-20',300),(7,'2018-11-11','2018-11-15',350),(8,'2018-11-13','2018-11-14',400),(9,'2018-11-23','2018-11-30',250),(10,'2018-11-01','2018-11-20',300),(11,'2018-11-11','2018-11-15',350),(12,'2018-11-13','2018-11-14',400),(13,'2018-11-23','2018-11-30',250),(14,'2018-11-01','2018-11-20',300),(15,'2018-11-11','2018-11-15',350),(16,'2018-11-13','2018-11-14',400),(17,'2018-11-23','2018-11-30',250),(18,'2018-11-01','2018-11-20',300),(19,'2018-11-11','2018-11-15',350),(20,'2018-11-13','2018-11-14',400),(21,'2018-11-23','2018-11-30',250),(22,'2018-11-01','2018-11-20',300),(23,'2018-11-11','2018-11-15',350),(24,'2018-11-13','2018-11-14',400),(25,'2018-11-23','2018-11-30',250),(26,'2018-11-01','2018-11-20',300),(27,'2018-11-11','2018-11-15',350),(28,'2018-11-13','2018-11-14',400),(29,'2018-11-23','2018-11-30',250),(30,'2018-11-01','2018-11-20',300),(31,'2018-11-11','2018-11-15',350),(32,'2018-11-13','2018-11-14',400),(33,'2018-11-23','2018-11-30',250),(34,'2018-11-01','2018-11-20',300),(35,'2018-11-11','2018-11-15',350),(36,'2018-11-13','2018-11-14',400),(37,'2018-11-23','2018-11-30',250),(38,'2018-11-01','2018-11-20',300),(39,'2018-11-11','2018-11-15',350),(40,'2018-11-13','2018-11-14',400),(41,'2018-11-23','2018-11-30',250),(42,'2018-11-01','2018-11-20',300),(43,'2018-11-11','2018-11-15',350),(44,'2018-11-13','2018-11-14',400),(45,'2018-11-23','2018-11-30',250),(46,'2018-11-01','2018-11-20',300),(47,'2018-11-11','2018-11-15',350),(48,'2018-11-13','2018-11-14',400),(49,'2018-11-23','2018-11-30',250),(50,'2018-11-01','2018-11-20',300),(51,'2018-11-11','2018-11-15',350),(52,'2018-11-13','2018-11-14',400),(53,'2018-11-23','2018-11-30',250),(54,'2018-11-01','2018-11-20',300),(55,'2018-11-11','2018-11-15',350),(56,'2018-11-13','2018-11-14',400),(57,'2018-11-23','2018-11-30',250),(58,'2018-11-01','2018-11-20',300),(59,'2018-11-11','2018-11-15',350),(60,'2018-11-13','2018-11-14',400),(61,'2018-11-23','2018-11-30',250),(62,'2018-11-01','2018-11-20',300),(63,'2018-11-11','2018-11-15',350),(64,'2018-11-13','2018-11-14',400),(65,'2018-11-23','2018-11-30',250),(66,'2018-11-01','2018-11-20',300),(67,'2018-11-11','2018-11-15',350),(68,'2018-11-13','2018-11-14',400),(69,'2018-11-23','2018-11-30',250),(70,'2018-11-01','2018-11-20',300),(71,'2018-11-11','2018-11-15',350),(72,'2018-11-13','2018-11-14',400),(73,'2018-11-23','2018-11-30',250),(74,'2018-11-01','2018-11-20',300),(75,'2018-11-11','2018-11-15',350),(76,'2018-11-13','2018-11-14',400),(77,'2018-11-23','2018-11-30',250),(78,'2018-11-01','2018-11-20',300),(79,'2018-11-11','2018-11-15',350),(80,'2018-11-13','2018-11-14',400),(81,'2018-11-23','2018-11-30',250),(82,'2018-11-01','2018-11-20',300),(83,'2018-11-11','2018-11-15',350),(84,'2018-11-13','2018-11-14',400),(85,'2018-11-23','2018-11-30',250),(86,'2018-11-01','2018-11-20',300),(87,'2018-11-11','2018-11-15',350),(88,'2018-11-13','2018-11-14',400),(89,'2018-11-23','2018-11-30',250),(90,'2018-11-01','2018-11-20',300),(91,'2018-11-11','2018-11-15',350),(92,'2018-11-13','2018-11-14',400),(93,'2018-11-23','2018-11-30',250),(94,'2018-11-01','2018-11-20',300),(95,'2018-11-11','2018-11-15',350),(96,'2018-11-13','2018-11-14',400),(97,'2018-11-23','2018-11-30',250),(98,'2018-11-01','2018-11-20',300),(99,'2018-11-11','2018-11-15',350),(100,'2018-11-13','2018-11-14',400),(101,'2018-11-23','2018-11-30',250),(102,'2018-11-01','2018-11-20',300),(103,'2018-11-11','2018-11-15',350),(104,'2018-11-13','2018-11-14',400),(105,'2018-11-23','2018-11-30',250),(106,'2018-11-01','2018-11-20',300),(107,'2018-11-11','2018-11-15',350),(108,'2018-11-13','2018-11-14',400),(109,'2018-11-23','2018-11-30',250),(110,'2018-11-01','2018-11-20',300),(111,'2018-11-11','2018-11-15',350),(112,'2018-11-13','2018-11-14',400),(113,'2018-11-23','2018-11-30',250),(114,'2018-11-01','2018-11-20',300),(115,'2018-11-11','2018-11-15',350),(116,'2018-11-13','2018-11-14',400),(117,'2018-11-23','2018-11-30',250),(118,'2018-11-01','2018-11-20',300),(119,'2018-11-11','2018-11-15',350),(120,'2018-11-13','2018-11-14',400),(121,'2018-11-23','2018-11-30',250),(122,'2018-11-01','2018-11-20',300),(123,'2018-11-11','2018-11-15',350),(124,'2018-11-13','2018-11-14',400),(125,'2018-11-23','2018-11-30',250),(126,'2018-11-01','2018-11-20',300),(127,'2018-11-11','2018-11-15',350),(128,'2018-11-13','2018-11-14',400),(129,'2018-11-23','2018-11-30',250),(130,'2018-11-01','2018-11-20',300),(131,'2018-11-11','2018-11-15',350),(132,'2018-11-13','2018-11-14',400),(133,'2018-11-23','2018-11-30',250),(134,'2018-11-01','2018-11-20',300),(135,'2018-11-11','2018-11-15',350),(136,'2018-11-13','2018-11-14',400),(137,'2018-11-23','2018-11-30',250),(138,'2018-11-01','2018-11-20',300),(139,'2018-11-11','2018-11-15',350),(140,'2018-11-13','2018-11-14',400),(141,'2018-11-23','2018-11-30',250),(142,'2018-11-01','2018-11-20',300),(143,'2018-11-11','2018-11-15',350),(144,'2018-11-13','2018-11-14',400),(145,'2018-11-23','2018-11-30',250),(146,'2018-11-01','2018-11-20',300),(147,'2018-11-11','2018-11-15',350),(148,'2018-11-13','2018-11-14',400),(149,'2018-11-23','2018-11-30',250),(150,'2018-11-01','2018-11-20',300),(151,'2018-11-11','2018-11-15',350),(152,'2018-11-13','2018-11-14',400),(153,'2018-11-23','2018-11-30',250),(154,'2018-11-01','2018-11-20',300),(155,'2018-11-11','2018-11-15',350),(156,'2018-11-13','2018-11-14',400),(157,'2018-11-23','2018-11-30',250),(158,'2018-11-01','2018-11-20',300),(159,'2018-11-11','2018-11-15',350),(160,'2018-11-13','2018-11-14',400),(161,'2018-11-23','2018-11-30',250),(162,'2018-11-01','2018-11-20',300),(163,'2018-11-11','2018-11-15',350),(164,'2018-11-13','2018-11-14',400),(165,'2018-11-23','2018-11-30',250),(166,'2018-11-01','2018-11-20',300),(167,'2018-11-11','2018-11-15',350),(168,'2018-11-13','2018-11-14',400),(169,'2018-11-23','2018-11-30',250),(170,'2018-11-01','2018-11-20',300),(171,'2018-11-11','2018-11-15',350),(172,'2018-11-13','2018-11-14',400),(173,'2018-11-23','2018-11-30',250),(174,'2018-11-01','2018-11-20',300),(175,'2018-11-11','2018-11-15',350),(176,'2018-11-13','2018-11-14',400),(177,'2018-11-23','2018-11-30',250),(178,'2018-11-01','2018-11-20',300),(179,'2018-11-11','2018-11-15',350),(180,'2018-11-13','2018-11-14',400),(181,'2018-11-23','2018-11-30',250),(182,'2018-11-01','2018-11-20',300),(183,'2018-11-11','2018-11-15',350),(184,'2018-11-13','2018-11-14',400),(185,'2018-11-23','2018-11-30',250),(186,'2018-11-01','2018-11-20',300),(187,'2018-11-11','2018-11-15',350),(188,'2018-11-13','2018-11-14',400),(189,'2018-11-23','2018-11-30',250),(190,'2018-11-01','2018-11-20',300),(191,'2018-11-11','2018-11-15',350);
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
INSERT INTO `habitat` VALUES (1,'ftaratata','caravane.jpg','Caravane : '),(2,'Bungalow','bungalow.jpg','Bungalow : '),(3,'Appartements','appartement.jpg','Appartements : '),(4,'Maison d\'hôtes','maison_hote.jpg','Maisons d\'hôtes : '),(5,'Gites','gite.jpg','Gites : '),(6,'Villa','villa.jpg','Villa : ');
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
  `id_utilisateurs` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'evengyl','$2y$10$IqgJEZtcfsUxrE1NJj27Y.Jfn1uG6DAu0QOW/KMN1kjtN/tO2db9W','1560861924','legends','dark.evengyl@gmail.com',3,1),(5,'test_uniq_id','$2y$10$2JRjz7CUHGw0xexfharbPeMuQz2C24pHi2WAjppywtsPdw.3v56Vu','1561109072','test_uniq_id','test_uniq_id@gmail.com',0,5);
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
INSERT INTO `option_app` VALUES (1,'view_time_exec_page',0,'Voir le temps d\'execution de la page'),(2,'get_sql_list',0,'Voir la liste des requète SQL éffectuée'),(3,'view_error_in_index',1,'Voir les Error Session dans l\'index'),(4,'app_with_login_option',1,'Initialiser un module de connection utilisateur ?'),(5,'view_post_in_index',1,'Voir les POST dans l\'index'),(6,'view_tpl_name_in_source_code',0,'Voir les noms des TPL dans le code source de la page'),(7,'translate_site',1,'Utiliser le système de traduction ?'),(8,'view_breadcrumb',0,'Afficher le BreadCrumb?');
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
-- Table structure for table `private_message`
--

DROP TABLE IF EXISTS `private_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `private_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateurs_send` int(11) NOT NULL,
  `id_annonces_link` int(11) NOT NULL,
  `message` text NOT NULL,
  `send_date` varchar(20) NOT NULL,
  `vu` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `private_message`
--

LOCK TABLES `private_message` WRITE;
/*!40000 ALTER TABLE `private_message` DISABLE KEYS */;
INSERT INTO `private_message` VALUES (1,1,1,'test','19/12/2018',1),(2,1,2,'test','19/12/2018',1),(3,1,3,'test','19/12/2018',1),(4,1,2,'test','19/12/2018',0),(5,1,1,'test','19/12/2018',1),(6,1,1,'test','19/12/2018',0),(7,1,1,'test','19/12/2018',1),(8,1,1,'test','19/12/2018',0);
/*!40000 ALTER TABLE `private_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proprio`
--

DROP TABLE IF EXISTS `proprio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proprio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` varchar(4) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `address_rue` varchar(100) NOT NULL,
  `address_localite` varchar(60) NOT NULL,
  `genre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proprio`
--

LOCK TABLES `proprio` WRITE;
/*!40000 ALTER TABLE `proprio` DISABLE KEYS */;
INSERT INTO `proprio` VALUES (1,'Loïc','Baudoux','27','baudouxloic@gmail.com','0497312523','jean jaurès','labuissiere','Monsieur');
/*!40000 ALTER TABLE `proprio` ENABLE KEYS */;
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
  `date_fin_abonement` date DEFAULT NULL,
  `id_background_profil` tinyint(4) NOT NULL DEFAULT '1',
  `account_verify` tinyint(1) NOT NULL DEFAULT '0',
  `id_create_account` varchar(35) NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (1,'Loïc','Baudoux',27,'0497312523','jean jaurès','12','labuissiere','6567','Belgique','on',1,NULL,8,1,'0',1),(5,'test_uniq_id','test_uniq_id',25,'25','test_uniq_id','25','test_uniq_id','25','Belgique','Monsieur',0,NULL,1,0,'CreateAccount5d0ca24028b12222894571',1);
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

-- Dump completed on 2019-06-21 14:55:42
