CREATE DATABASE  IF NOT EXISTS `shortcut_app_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `shortcut_app_db`;
-- MySQL dump 10.13  Distrib 5.5.24, for osx10.5 (i386)
--
-- Host: 127.0.0.1    Database: shortcut_app_db
-- ------------------------------------------------------
-- Server version	5.5.29

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
-- Table structure for table `apps`
--

DROP TABLE IF EXISTS `apps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apps`
--

LOCK TABLES `apps` WRITE;
/*!40000 ALTER TABLE `apps` DISABLE KEYS */;
INSERT INTO `apps` VALUES (1,'windows','2013-06-14 14:25:07','2013-06-14 14:25:07'),(2,'linux','2013-06-14 14:26:42','2013-06-14 14:26:42'),(3,'mac','2013-06-14 14:55:37','2013-06-14 14:55:37'),(4,'excel','2013-06-14 15:00:33','2013-06-14 15:00:33'),(5,'word','2013-06-14 15:39:21','2013-06-14 15:39:21'),(6,'photoshop','2013-06-14 16:13:38','2013-06-14 16:13:38'),(17,'paint','2013-06-14 17:41:36','2013-06-14 17:41:36');
/*!40000 ALTER TABLE `apps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shortcuts`
--

DROP TABLE IF EXISTS `shortcuts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shortcuts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL,
  `shortcut` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shortcuts_apps_idx` (`app_id`),
  CONSTRAINT `fk_shortcuts_apps` FOREIGN KEY (`app_id`) REFERENCES `apps` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shortcuts`
--

LOCK TABLES `shortcuts` WRITE;
/*!40000 ALTER TABLE `shortcuts` DISABLE KEYS */;
INSERT INTO `shortcuts` VALUES (2,1,'crtl + alt + del','system screen/task manager','2013-06-14 15:31:14','2013-06-14 15:31:14'),(3,1,'crtl + c','copy stuff','2013-06-14 15:38:21','2013-06-14 15:38:21'),(4,3,'mac shortcut1','desc1','2013-06-14 15:53:00','2013-06-14 15:53:00'),(5,4,'excel shortcut1','desc1','2013-06-14 15:53:24','2013-06-14 15:53:24'),(6,3,'maxshortcut2','desc2','2013-06-14 15:58:32','2013-06-14 15:58:32'),(7,3,'maxshortcut3','desc3','2013-06-14 15:58:39','2013-06-14 15:58:39'),(8,1,'win3','desc3','2013-06-14 16:12:12','2013-06-14 16:12:12'),(9,1,'new short with AJAX!!!','YESS!!!','2013-06-14 16:16:06','2013-06-14 16:16:06'),(10,3,'mac shortcut4','desc4\r\n','2013-06-14 16:18:11','2013-06-14 16:18:11'),(18,17,'ctrl+c','copy stuff','2013-06-14 17:41:51','2013-06-14 17:41:51'),(19,17,'crtl+v','paste stuff','2013-06-14 17:42:00','2013-06-14 17:42:00');
/*!40000 ALTER TABLE `shortcuts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-06-14 17:48:20
