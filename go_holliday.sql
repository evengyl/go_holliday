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
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_annonces` int(11) NOT NULL,
  `hiking` tinyint(1) NOT NULL DEFAULT '0',
  `dancing` tinyint(1) NOT NULL DEFAULT '0',
  `disco` tinyint(1) NOT NULL DEFAULT '0',
  `restaurant` tinyint(1) NOT NULL DEFAULT '0',
  `plage` tinyint(1) NOT NULL DEFAULT '0',
  `bar` tinyint(1) NOT NULL DEFAULT '0',
  `spa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` VALUES (1,210,1,0,1,0,1,0,0),(2,211,0,1,0,1,0,1,0);
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

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
  `id_utilisateurs` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `sub_title` varchar(200) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `pet` tinyint(1) NOT NULL DEFAULT '0',
  `handicap` tinyint(1) NOT NULL DEFAULT '0',
  `parking` tinyint(1) NOT NULL DEFAULT '0',
  `vues` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `user_validate` tinyint(1) NOT NULL DEFAULT '0',
  `admin_validate` tinyint(1) NOT NULL DEFAULT '0',
  `create_date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annonces`
--

LOCK TABLES `annonces` WRITE;
/*!40000 ALTER TABLE `annonces` DISABLE KEYS */;
INSERT INTO `annonces` VALUES (210,1,1,1,1,'','','Test',0,0,0,1526,1,0,1,'28/01/2019'),(211,1,1,1,1,'Tata land, lieu de rêve pour les papys','Mais la c\'est tatat super bien avec des bar et tout vin di diou','Test',0,0,0,1526,0,0,1,'28/01/2019');
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
  `id_annonces` int(11) NOT NULL,
  `state` varchar(20) NOT NULL DEFAULT 'waiting',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `date_annonces`
--

LOCK TABLES `date_annonces` WRITE;
/*!40000 ALTER TABLE `date_annonces` DISABLE KEYS */;
INSERT INTO `date_annonces` VALUES (1,'2018-11-23','2018-11-30',250,210,'waiting'),(2,'2018-11-01','2018-11-20',300,210,'reserved'),(3,'2018-11-11','2018-11-15',350,210,'waiting'),(4,'2018-11-13','2018-11-14',400,210,'waiting'),(5,'2018-11-23','2018-11-30',250,210,'waiting'),(6,'2018-11-01','2018-11-20',300,210,'reserved'),(7,'2018-11-11','2018-11-15',350,210,'waiting'),(8,'2018-11-13','2018-11-14',400,210,'reserved');
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
  `level_admin` tinyint(4) NOT NULL DEFAULT '0',
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
  `human_name` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pays`
--

LOCK TABLES `pays` WRITE;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` VALUES (1,'belgique','Belgique','drapeau_belgique.jpg','La Belgique : '),(2,'france','France','drapeau_france.jpg','La France : '),(3,'italie','Italie','drapeau_italie.jpg','L\'Italie : '),(4,'espagne','Espagne','drapeau_espagne.jpg','L\'Espagne : '),(5,'pays_bas','Pays-Bas','drapeau_pays_bas.jpg','Les Pays-Bas : '),(6,'allemagne','Allemagne','drapeau_allemagne.jpg','L\'Allemagne'),(7,'luxembourg','Luxembourg','drapeau_luxembourg.jpg','Le Luxembourg'),(8,'reunion_island','Ile de la Réunion','drapeau_reunion.jpg','L\'Ile de la Réunion'),(9,'united_kingdom','Royaume-Uni','drapeau_uk.jpg','Le Royaume-Uni');
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
-- Table structure for table `range_price_announce`
--

DROP TABLE IF EXISTS `range_price_announce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `range_price_announce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_annonces` mediumint(9) NOT NULL,
  `price_one_night` varchar(20) NOT NULL,
  `price_week_end` varchar(20) NOT NULL,
  `price_one_week` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `range_price_announce`
--

LOCK TABLES `range_price_announce` WRITE;
/*!40000 ALTER TABLE `range_price_announce` DISABLE KEYS */;
INSERT INTO `range_price_announce` VALUES (1,210,'0-50','101-150','201-300');
/*!40000 ALTER TABLE `range_price_announce` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sport`
--

DROP TABLE IF EXISTS `sport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_annonces` int(11) NOT NULL,
  `foot` tinyint(1) NOT NULL DEFAULT '0',
  `basket` tinyint(1) NOT NULL DEFAULT '0',
  `tennis` tinyint(1) NOT NULL DEFAULT '0',
  `petanque` tinyint(1) NOT NULL DEFAULT '0',
  `piscine` tinyint(1) NOT NULL DEFAULT '0',
  `aqua_center` tinyint(1) NOT NULL DEFAULT '0',
  `sport` tinyint(1) NOT NULL DEFAULT '0',
  `velos` tinyint(1) NOT NULL DEFAULT '0',
  `skate` tinyint(1) NOT NULL DEFAULT '0',
  `arc` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sport`
--

LOCK TABLES `sport` WRITE;
/*!40000 ALTER TABLE `sport` DISABLE KEYS */;
INSERT INTO `sport` VALUES (1,210,1,1,0,0,1,0,1,1,0,0),(2,211,1,0,1,0,1,0,1,0,1,0);
/*!40000 ALTER TABLE `sport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `text_sql_to_human`
--

DROP TABLE IF EXISTS `text_sql_to_human`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `text_sql_to_human` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_sql` varchar(50) NOT NULL,
  `name_human` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `text_sql_to_human`
--

LOCK TABLES `text_sql_to_human` WRITE;
/*!40000 ALTER TABLE `text_sql_to_human` DISABLE KEYS */;
INSERT INTO `text_sql_to_human` VALUES (1,'spa','Spa / Sauna'),(2,'bar','Bar / Buvette'),(3,'plage','Plage'),(4,'restaurant','Restaurant / Cafetaria / Bistro'),(5,'disco','Discothèque'),(6,'dancing','Piste de dance / Karaoké'),(7,'hiking','Randonnée'),(8,'foot','Terrain de Foot'),(9,'basket','Terrain de Basket'),(10,'tennis','Terrain de Tennis'),(11,'petanque','Terrain de Pétanque'),(12,'piscine','Piscine'),(13,'aqua_center','Centre aquatique'),(14,'sport','Salle de sports'),(15,'skate','Skate-park'),(16,'arc','Tir à l\'arc'),(17,'velos','Randonnées en vélos');
/*!40000 ALTER TABLE `text_sql_to_human` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translate`
--

LOCK TABLES `translate` WRITE;
/*!40000 ALTER TABLE `translate` DISABLE KEYS */;
INSERT INTO `translate` VALUES (1,'Acceuil','','','__TRANS_accueil__'),(2,'Réservation','','','__TRANS_reservation__'),(3,'Contactez nous','','','__TRANS_contact_us__'),(5,'Ce que vous voulez','','','__TRANS_who_would_like__'),(6,'Reserver','','','__TRANS_reserver__'),(7,'Détails de contact','','','__TRANS__contact_detail__'),(8,'Adresse','','','__TRANS_address_title__'),(9,'Téléphone 2','','','__TRANS_tel_1__'),(10,'Téléphone','','','__TRANS_tel__'),(11,'Tous les prix sont TVAC','','','__TRANS_footer_price__'),(12,'Se connecter','','','__TRANS_login__'),(13,'Documentation','','','__TRANS_documentations__'),(14,'Envoyer','','','__TRANS_envoyer__'),(15,'Téléphone de la maintenance','','','__TRANS_tel_mainteance__'),(16,'Téléphone commercial','','','__TRANS_tel_commercial__'),(17,'','','','__TRANS_204__'),(18,'','','','__TRANS_error_explain__'),(19,'','','','__TRANS_horaire__'),(20,'','','','__TRANS_horaire_list__'),(21,'','','','__TRANS_accueil__'),(22,'','','','__TRANS_contact_us__'),(23,'','','','__TRANS__contact_detail__'),(24,'','','','__TRANS_tel_mainteance__'),(25,'','','','__TRANS_tel_commercial__'),(26,'','','','__TRANS_footer_price__'),(27,'','','','__TRANS_accueil__'),(28,'','','','__TRANS_contact_us__'),(29,'','','','__TRANS__contact_detail__'),(30,'','','','__TRANS_tel_mainteance__'),(31,'','','','__TRANS_tel_commercial__'),(32,'','','','__TRANS_footer_price__'),(33,'','','','__TRANS_accueil__'),(34,'','','','__TRANS_contact_us__'),(35,'','','','__TRANS__contact_detail__'),(36,'','','','__TRANS_tel_mainteance__'),(37,'','','','__TRANS_tel_commercial__'),(38,'','','','__TRANS_footer_price__'),(39,'','','','__TRANS_accueil__'),(40,'','','','__TRANS_contact_us__'),(41,'','','','__TRANS__contact_detail__'),(42,'','','','__TRANS_tel_mainteance__'),(43,'','','','__TRANS_tel_commercial__'),(44,'','','','__TRANS_footer_price__'),(45,'','','','__TRANS_accueil__'),(46,'','','','__TRANS_contact_us__'),(47,'','','','__TRANS__contact_detail__'),(48,'','','','__TRANS_tel_mainteance__'),(49,'','','','__TRANS_tel_commercial__'),(50,'','','','__TRANS_footer_price__'),(51,'','','','__TRANS_accueil__'),(52,'','','','__TRANS_contact_us__'),(53,'','','','__TRANS__contact_detail__'),(54,'','','','__TRANS_tel_mainteance__'),(55,'','','','__TRANS_tel_commercial__'),(56,'','','','__TRANS_footer_price__'),(57,'','','','__TRANS_accueil__'),(58,'','','','__TRANS_contact_us__'),(59,'','','','__TRANS__contact_detail__'),(60,'','','','__TRANS_tel_mainteance__'),(61,'','','','__TRANS_tel_commercial__'),(62,'','','','__TRANS_footer_price__'),(63,'','','','__TRANS_accueil__'),(64,'','','','__TRANS_contact_us__'),(65,'','','','__TRANS__contact_detail__'),(66,'','','','__TRANS_tel_mainteance__'),(67,'','','','__TRANS_tel_commercial__'),(68,'','','','__TRANS_footer_price__'),(69,'','','','__TRANS_accueil__'),(70,'','','','__TRANS_contact_us__'),(71,'','','','__TRANS__contact_detail__'),(72,'','','','__TRANS_tel_mainteance__'),(73,'','','','__TRANS_tel_commercial__'),(74,'','','','__TRANS_footer_price__'),(75,'','','','__TRANS_accueil__'),(76,'','','','__TRANS_contact_us__'),(77,'','','','__TRANS__contact_detail__'),(78,'','','','__TRANS_tel_mainteance__'),(79,'','','','__TRANS_tel_commercial__'),(80,'','','','__TRANS_footer_price__'),(81,'','','','__TRANS_accueil__'),(82,'','','','__TRANS_contact_us__'),(83,'','','','__TRANS__contact_detail__'),(84,'','','','__TRANS_tel_mainteance__'),(85,'','','','__TRANS_tel_commercial__'),(86,'','','','__TRANS_footer_price__'),(87,'','','','__TRANS_accueil__'),(88,'','','','__TRANS_contact_us__'),(89,'','','','__TRANS__contact_detail__'),(90,'','','','__TRANS_tel_mainteance__'),(91,'','','','__TRANS_tel_commercial__'),(92,'','','','__TRANS_footer_price__'),(93,'','','','__TRANS_accueil__'),(94,'','','','__TRANS_contact_us__'),(95,'','','','__TRANS__contact_detail__'),(96,'','','','__TRANS_tel_mainteance__'),(97,'','','','__TRANS_tel_commercial__'),(98,'','','','__TRANS_footer_price__');
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
INSERT INTO `utilisateurs` VALUES (1,'Loïc','Baudoux',27,'0497312523','jean jaurès','12','labuissiere','6567','Belgique','Monsieur',1,'2029-06-24',5,1,'0',1),(5,'test_uniq_id','test_uniq_id',25,'25','test_uniq_id','25','test_uniq_id','6567','Belgique','Monsieur',0,NULL,1,0,'CreateAccount5d0ca24028b12222894571',1);
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vues`
--

DROP TABLE IF EXISTS `vues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sign_up` int(11) NOT NULL DEFAULT '0',
  `login` int(11) NOT NULL DEFAULT '0',
  `login_success` int(11) NOT NULL DEFAULT '0',
  `accueil` int(11) NOT NULL DEFAULT '0',
  `contact_us` int(11) NOT NULL DEFAULT '0',
  `periode` varchar(7) DEFAULT '00-0000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vues`
--

LOCK TABLES `vues` WRITE;
/*!40000 ALTER TABLE `vues` DISABLE KEYS */;
INSERT INTO `vues` VALUES (1,4,20,0,3,1,'01-2019'),(2,5,15,0,2,0,'02-2019'),(3,6,10,10,0,0,'03-2019'),(4,7,50,0,0,0,'04-2019'),(5,9,20,8,0,0,'05-2019'),(6,54,10,6,30,6,'06-2019'),(7,1,24,24,80,8,'07-2019');
/*!40000 ALTER TABLE `vues` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-31 16:11:55
