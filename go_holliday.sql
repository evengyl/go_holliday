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
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annonces`
--

LOCK TABLES `annonces` WRITE;
/*!40000 ALTER TABLE `annonces` DISABLE KEYS */;
INSERT INTO `annonces` VALUES (1,1,1,1,1,'Bord de mer tatata','Mexico',1),(2,2,2,1,1,'Bord de mer tatata','Mexico',1),(3,3,2,1,1,'Bord de mer tatata','Mexico',1),(4,4,1,1,1,'Bord de mer tatata','Mexico',1),(5,1,3,1,1,'Bord de mer tatata','Mexico',1),(6,2,3,1,1,'Bord de mer tatata','Mexico',1),(7,3,4,1,1,'Bord de mer tatata','Mexico',1),(8,4,4,1,1,'Bord de mer tatata','Mexico',1),(9,1,5,2,1,'Bord de mer tatata','Mexico',1),(10,2,5,2,1,'Bord de mer tatata','Mexico',1),(11,3,6,2,1,'Bord de mer tatata','Mexico',1),(12,4,6,2,1,'Bord de mer tatata','Mexico',1),(13,1,1,2,1,'Bord de mer tatata','Mexico',1),(14,2,1,2,1,'Bord de mer tatata','Mexico',1),(15,3,2,2,1,'Bord de mer tatata','Mexico',1),(16,4,2,2,1,'Bord de mer tatata','Mexico',1),(17,1,3,3,1,'Bord de mer tatata','Mexico',1),(18,2,3,3,1,'Bord de mer tatata','Mexico',1),(19,3,4,3,1,'Bord de mer tatata','Mexico',1),(20,4,4,3,1,'Bord de mer tatata','Mexico',1),(21,1,5,3,1,'Bord de mer tatata','Mexico',1),(22,2,5,3,1,'Bord de mer tatata','Mexico',1),(23,3,6,3,1,'Bord de mer tatata','Mexico',1),(24,4,6,3,1,'Bord de mer tatata','Mexico',1),(25,1,1,1,1,'Bord de mer tatata','Mexico',1),(26,2,1,2,1,'Bord de mer tatata','Mexico',1),(27,3,2,3,1,'Bord de mer tatata','Mexico',1),(28,4,2,1,1,'Bord de mer tatata','Mexico',1),(29,1,3,2,1,'Bord de mer tatata','Mexico',1),(30,2,3,3,1,'Bord de mer tatata','Mexico',1),(31,3,4,1,1,'Bord de mer tatata','Mexico',1),(32,4,5,2,1,'Bord de mer tatata','Mexico',1),(33,4,4,3,1,'Bord de mer tatata','Mexico',1),(34,1,5,3,1,'Bord de mer tatata','Mexico',1),(35,2,6,3,1,'Bord de mer tatata','Mexico',1),(36,3,6,3,1,'Bord de mer tatata','Mexico',1),(37,4,1,3,1,'Bord de mer tatata','Mexico',1),(38,1,1,1,1,'Bord de mer tatata','Mexico',1),(39,2,2,2,1,'Bord de mer tatata','Mexico',1),(40,3,2,3,1,'Bord de mer tatata','Mexico',1),(41,4,3,1,1,'Bord de mer tatata','Mexico',1),(42,1,3,2,1,'Bord de mer tatata','Mexico',1),(43,2,4,3,1,'Bord de mer tatata','Mexico',1),(44,3,4,1,1,'Bord de mer tatata','Mexico',1),(45,4,5,2,1,'Bord de mer tatata','Mexico',1),(46,1,5,3,1,'Bord de mer tatata','Mexico',1),(47,2,6,3,1,'Bord de mer tatata','Mexico',1),(48,3,6,3,1,'Bord de mer tatata','Mexico',1),(49,4,1,3,1,'Bord de mer tatata','Mexico',1),(50,1,1,1,1,'Bord de mer tatata','Mexico',1),(51,2,2,2,1,'Bord de mer tatata','Mexico',1),(52,3,2,3,1,'Bord de mer tatata','Mexico',1),(53,4,3,1,1,'Bord de mer tatata','Mexico',1),(54,1,3,2,1,'Bord de mer tatata','Mexico',1),(55,2,4,3,1,'Bord de mer tatata','Mexico',1),(56,3,4,1,1,'Bord de mer tatata','Mexico',1),(57,4,5,2,1,'Bord de mer tatata','Mexico',1),(58,1,5,3,1,'Bord de mer tatata','Mexico',1),(59,2,6,3,1,'Bord de mer tatata','Mexico',1),(60,3,6,3,1,'Bord de mer tatata','Mexico',1),(61,4,1,3,1,'Bord de mer tatata','Mexico',1),(62,1,1,1,1,'Bord de mer tatata','Mexico',1),(63,2,2,2,1,'Bord de mer tatata','Mexico',1),(64,3,2,3,1,'Bord de mer tatata','Mexico',1),(65,4,3,1,1,'Bord de mer tatata','Mexico',1),(66,1,3,2,1,'Bord de mer tatata','Mexico',1),(67,2,4,3,1,'Bord de mer tatata','Mexico',1),(68,3,4,1,1,'Bord de mer tatata','Mexico',1),(69,4,5,2,1,'Bord de mer tatata','Mexico',1),(70,1,5,3,1,'Bord de mer tatata','Mexico',1),(71,2,6,3,1,'Bord de mer tatata','Mexico',1),(72,3,6,3,1,'Bord de mer tatata','Mexico',1),(73,4,1,3,1,'Bord de mer tatata','Mexico',1),(74,1,1,1,1,'Bord de mer tatata','Mexico',1),(75,2,2,2,1,'Bord de mer tatata','Mexico',1),(76,3,2,3,1,'Bord de mer tatata','Mexico',1),(77,4,3,1,1,'Bord de mer tatata','Mexico',1),(78,1,3,2,1,'Bord de mer tatata','Mexico',1),(79,2,4,3,1,'Bord de mer tatata','Mexico',1),(80,3,4,1,1,'Bord de mer tatata','Mexico',1),(81,4,5,2,1,'Bord de mer tatata','Mexico',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `date_annonces`
--

LOCK TABLES `date_annonces` WRITE;
/*!40000 ALTER TABLE `date_annonces` DISABLE KEYS */;
INSERT INTO `date_annonces` VALUES (1,1,'2018-11-23','2018-11-30',250),(2,2,'2018-11-01','2018-11-20',300),(3,3,'2018-11-11','2018-11-15',350),(4,3,'2018-11-13','2018-11-14',400),(5,4,'2018-11-23','2018-11-30',250),(6,4,'2018-11-01','2018-11-20',300),(7,3,'2018-11-11','2018-11-15',350),(8,4,'2018-11-13','2018-11-14',400),(9,5,'2018-11-23','2018-11-30',250),(10,6,'2018-11-01','2018-11-20',300),(11,7,'2018-11-11','2018-11-15',350),(12,8,'2018-11-13','2018-11-14',400),(13,1,'2018-11-23','2018-11-30',250),(14,1,'2018-11-01','2018-11-20',300),(15,1,'2018-11-11','2018-11-15',350),(16,2,'2018-11-13','2018-11-14',400);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'evengyl','$2y$10$LMyXpdg11OyYKNOtimiQOOfEABrPA5DOEubnuxvnmOCGiq1Y.BhvS','1490198511','legends','dark.evengyl@gmail.com',3),(6,'test','$2y$10$Hf6AeLwdBk6DEnn.ajFp1uKBc2EoQzC7mDq9agpAwzl.s7SVsK8bq','1542277987','legends','dark.evengyl@gmail.com',0);
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-05 13:02:34
