-- MySQL dump 10.13  Distrib 5.5.50, for Win64 (x86)
--
-- Host: localhost    Database: dictionary
-- ------------------------------------------------------
-- Server version	5.5.50

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
-- Table structure for table `dict`
--

DROP TABLE IF EXISTS `dict`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dict` (
  `id_dict` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id_dict`),
  KEY `id_dict` (`id_dict`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dict`
--

LOCK TABLES `dict` WRITE;
/*!40000 ALTER TABLE `dict` DISABLE KEYS */;
INSERT INTO `dict` VALUES (1,'Толковый'),(2,'Орфографический');
/*!40000 ALTER TABLE `dict` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stable_expression`
--

DROP TABLE IF EXISTS `stable_expression`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stable_expression` (
  `id_stEx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id_stEx`),
  KEY `id_stEx` (`id_stEx`),
  KEY `id_stEx_2` (`id_stEx`),
  KEY `id_stEx_3` (`id_stEx`),
  KEY `id_stEx_4` (`id_stEx`),
  KEY `id_stEx_5` (`id_stEx`),
  KEY `id_stEx_6` (`id_stEx`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stable_expression`
--

LOCK TABLES `stable_expression` WRITE;
/*!40000 ALTER TABLE `stable_expression` DISABLE KEYS */;
INSERT INTO `stable_expression` VALUES (1,'act the fool'),(2,'against time');
/*!40000 ALTER TABLE `stable_expression` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `synonim`
--

DROP TABLE IF EXISTS `synonim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `synonim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `id_dict` int(11) NOT NULL,
  `id_stEx` int(11) NOT NULL,
  `id_words` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_words` (`id_words`),
  KEY `id_stEx` (`id_stEx`),
  KEY `id_dict` (`id_dict`),
  CONSTRAINT `synonim_ibfk_1` FOREIGN KEY (`id_words`) REFERENCES `words` (`id_words`),
  CONSTRAINT `synonim_ibfk_2` FOREIGN KEY (`id_stEx`) REFERENCES `stable_expression` (`id_stEx`),
  CONSTRAINT `synonim_ibfk_3` FOREIGN KEY (`id_dict`) REFERENCES `dict` (`id_dict`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `synonim`
--

LOCK TABLES `synonim` WRITE;
/*!40000 ALTER TABLE `synonim` DISABLE KEYS */;
INSERT INTO `synonim` VALUES (1,'quick',1,1,1),(2,'start',1,1,2);
/*!40000 ALTER TABLE `synonim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `words`
--

DROP TABLE IF EXISTS `words`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `words` (
  `id_words` int(11) NOT NULL AUTO_INCREMENT,
  `rus` varchar(32) NOT NULL,
  `en` varchar(32) NOT NULL,
  PRIMARY KEY (`id_words`),
  UNIQUE KEY `id_2` (`id_words`),
  KEY `id` (`id_words`),
  KEY `id_3` (`id_words`),
  KEY `id_words` (`id_words`),
  KEY `id_words_2` (`id_words`),
  KEY `id_words_3` (`id_words`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `words`
--

LOCK TABLES `words` WRITE;
/*!40000 ALTER TABLE `words` DISABLE KEYS */;
INSERT INTO `words` VALUES (1,'Быстрый','Fast'),(2,'начинать','begin'),(3,'смелый','brave'),(4,'против','against');
/*!40000 ALTER TABLE `words` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-11  9:26:10
