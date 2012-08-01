-- MySQL dump 10.10
--
-- Host: localhost    Database: sputnik
-- ------------------------------------------------------
-- Server version	5.1.40-community

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES cp1251 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE `faculty` (
  `id_fac` int(11) NOT NULL AUTO_INCREMENT,
  `fac` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_fac`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--


/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
LOCK TABLES `faculty` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(240) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `deleted` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum`
--


/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
LOCK TABLES `forum` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;

--
-- Table structure for table `institute`
--

DROP TABLE IF EXISTS `institute`;
CREATE TABLE `institute` (
  `id_inst` int(11) NOT NULL AUTO_INCREMENT,
  `inst` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_inst`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institute`
--


/*!40000 ALTER TABLE `institute` DISABLE KEYS */;
LOCK TABLES `institute` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `institute` ENABLE KEYS */;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `body` varchar(500) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL,
  `deleted` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `news`
--


/*!40000 ALTER TABLE `news` DISABLE KEYS */;
LOCK TABLES `news` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

--
-- Table structure for table `specialty`
--

DROP TABLE IF EXISTS `specialty`;
CREATE TABLE `specialty` (
  `id_spec` int(11) NOT NULL AUTO_INCREMENT,
  `spec` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_spec`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialty`
--


/*!40000 ALTER TABLE `specialty` DISABLE KEYS */;
LOCK TABLES `specialty` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `specialty` ENABLE KEYS */;

--
-- Table structure for table `subscriber`
--

DROP TABLE IF EXISTS `subscriber`;
CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `city` varchar(100) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `contact` varchar(100) NOT NULL DEFAULT '',
  `active` int(11) NOT NULL,
  `password` varchar(70) NOT NULL DEFAULT '',
  `user` varchar(70) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscriber`
--


/*!40000 ALTER TABLE `subscriber` DISABLE KEYS */;
LOCK TABLES `subscriber` WRITE;
INSERT INTO `subscriber` VALUES (1,'','','','',1,'7b7bc2512ee1fedcd76bdc68926d4f7b','Administrator');
UNLOCK TABLES;
/*!40000 ALTER TABLE `subscriber` ENABLE KEYS */;

--
-- Table structure for table `travel`
--

DROP TABLE IF EXISTS `travel`;
CREATE TABLE `travel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `check_in` int(11) NOT NULL,
  `check_out` int(11) NOT NULL,
  `deleted` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `travel`
--


/*!40000 ALTER TABLE `travel` DISABLE KEYS */;
LOCK TABLES `travel` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `travel` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

