-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: movie_db
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `idcarts` int(11) NOT NULL AUTO_INCREMENT,
  `filmid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ordered` enum('true','false') NOT NULL DEFAULT 'false',
  `ordertime` date DEFAULT NULL,
  PRIMARY KEY (`idcarts`),
  KEY `filmid` (`filmid`),
  KEY `userids` (`userid`),
  CONSTRAINT `lngFilmTitleID` FOREIGN KEY (`filmid`) REFERENCES `tblfilmtitles` (`lngFilmTitleID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_id` FOREIGN KEY (`userid`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (3,15,6,'true','2020-03-13'),(4,12,6,'false',NULL),(11,6,5,'true','2020-03-13'),(12,6,5,'true','2020-03-13'),(14,6,5,'true','2020-03-13'),(15,8,5,'true','2020-03-13'),(16,6,5,'true','2020-03-13');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` varchar(1000) NOT NULL,
  `timein` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('vkboc2a8hroon0823v3ih7ajjc','127.0.0.1',1583506886,'__ci_last_regenerate|i:1583506886;','2020-03-06 23:01:26');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblactors`
--

DROP TABLE IF EXISTS `tblactors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblactors` (
  `lngActorID` int(11) NOT NULL AUTO_INCREMENT,
  `strActorFullName` varchar(25) DEFAULT NULL,
  `memActorNotes` mediumtext DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`lngActorID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblactors`
--

LOCK TABLES `tblactors` WRITE;
/*!40000 ALTER TABLE `tblactors` DISABLE KEYS */;
INSERT INTO `tblactors` VALUES (4,'harold','wew','images/logocms1.png'),(5,'Nathaliesod','Hello my name is nathalie-sod hahahah jk lang nats\r\nasdsadsadsa','images/nats1.jpg');
/*!40000 ALTER TABLE `tblactors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfilmcertificates`
--

DROP TABLE IF EXISTS `tblfilmcertificates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfilmcertificates` (
  `lngCertificateID` int(11) NOT NULL AUTO_INCREMENT,
  `strCertificate` varchar(25) NOT NULL,
  PRIMARY KEY (`lngCertificateID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfilmcertificates`
--

LOCK TABLES `tblfilmcertificates` WRITE;
/*!40000 ALTER TABLE `tblfilmcertificates` DISABLE KEYS */;
INSERT INTO `tblfilmcertificates` VALUES (1,'U-unrestricted'),(2,'U/A-Parental Guidance'),(3,'A-Restricted to adults'),(4,'S-Restricted to SC person'),(5,'U-unrestricted'),(6,'U/A-Parental Guidance'),(7,'A-Restricted to adults'),(8,'S-Restricted to SC person');
/*!40000 ALTER TABLE `tblfilmcertificates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfilmgenres`
--

DROP TABLE IF EXISTS `tblfilmgenres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfilmgenres` (
  `lngGenreID` int(11) NOT NULL AUTO_INCREMENT,
  `strGenre` varchar(25) NOT NULL,
  PRIMARY KEY (`lngGenreID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfilmgenres`
--

LOCK TABLES `tblfilmgenres` WRITE;
/*!40000 ALTER TABLE `tblfilmgenres` DISABLE KEYS */;
INSERT INTO `tblfilmgenres` VALUES (1,'Action'),(2,'Adventure'),(3,'Comedy'),(4,'Crime'),(5,'Drama'),(6,'History'),(7,'Horro'),(8,'Musical'),(9,'Sci-Fi'),(10,'War'),(11,'Western'),(12,'International'),(13,'Biography'),(14,'Romance'),(15,'Thriller'),(16,'Sports'),(17,'Fantasy'),(18,'Animated'),(19,'Childrens- kids- Family'),(20,'Documentary');
/*!40000 ALTER TABLE `tblfilmgenres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfilmrating`
--

DROP TABLE IF EXISTS `tblfilmrating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfilmrating` (
  `lngFilmTitleID` int(11) NOT NULL,
  `lngRatingID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `votedate` date NOT NULL DEFAULT current_timestamp(),
  KEY `lngFilmTitleID_idx` (`lngFilmTitleID`),
  KEY `user_id_idx` (`user_id`),
  KEY `lngRatingID_idx` (`lngRatingID`),
  CONSTRAINT `lngFilmTitleIDs` FOREIGN KEY (`lngFilmTitleID`) REFERENCES `tblfilmtitles` (`lngFilmTitleID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lngRatingIDs` FOREIGN KEY (`lngRatingID`) REFERENCES `tblratings` (`lngRatingID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_ids` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfilmrating`
--

LOCK TABLES `tblfilmrating` WRITE;
/*!40000 ALTER TABLE `tblfilmrating` DISABLE KEYS */;
INSERT INTO `tblfilmrating` VALUES (7,5,5,'2020-03-09'),(6,3,5,'2020-03-09'),(9,3,6,'2020-03-09'),(6,4,5,'2020-03-09'),(6,2,5,'2020-03-09'),(6,5,5,'2020-03-09'),(6,5,5,'2020-03-09'),(6,5,5,'2020-03-09'),(6,4,5,'2020-03-09'),(6,1,5,'2020-03-09'),(6,4,5,'2020-03-09'),(6,5,5,'2020-03-09'),(6,5,5,'2020-03-09'),(6,1,5,'2020-03-09'),(6,4,5,'2020-03-09'),(6,3,5,'2020-03-09'),(6,3,5,'2020-03-09'),(6,5,5,'2020-03-09'),(8,5,5,'2020-03-10'),(8,4,5,'2020-03-10'),(8,3,5,'2020-03-10'),(8,2,5,'2020-03-10'),(8,1,5,'2020-03-10'),(8,5,5,'2020-03-10'),(8,4,5,'2020-03-10'),(8,3,5,'2020-03-10'),(8,5,5,'2020-03-10'),(8,4,5,'2020-03-10'),(8,2,5,'2020-03-10'),(8,5,5,'2020-03-10'),(8,3,5,'2020-03-10'),(8,5,5,'2020-03-10'),(8,4,5,'2020-03-10'),(11,4,5,'2020-03-10'),(11,1,5,'2020-03-10'),(10,1,5,'2020-03-10'),(10,3,5,'2020-03-10'),(10,3,5,'2020-03-10'),(10,5,5,'2020-03-10'),(6,5,5,'2020-04-01'),(6,5,5,'2020-03-12');
/*!40000 ALTER TABLE `tblfilmrating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfilmsactorroles`
--

DROP TABLE IF EXISTS `tblfilmsactorroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfilmsactorroles` (
  `lngFilmTitleID` int(11) NOT NULL,
  `lngActorID` int(11) NOT NULL,
  `lngRoleTypeID` int(11) NOT NULL,
  `strCharacterName` varchar(25) DEFAULT NULL,
  `memCharacterDescription` mediumtext DEFAULT NULL,
  KEY `lngActorID_idx` (`lngActorID`),
  KEY `lngRoleTypeID_idx` (`lngRoleTypeID`),
  CONSTRAINT `lngActorID` FOREIGN KEY (`lngActorID`) REFERENCES `tblactors` (`lngActorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lngRoleTypeID` FOREIGN KEY (`lngRoleTypeID`) REFERENCES `tblroletypes` (`lngRoleTypeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfilmsactorroles`
--

LOCK TABLES `tblfilmsactorroles` WRITE;
/*!40000 ALTER TABLE `tblfilmsactorroles` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblfilmsactorroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfilmtitles`
--

DROP TABLE IF EXISTS `tblfilmtitles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfilmtitles` (
  `lngFilmTitleID` int(11) NOT NULL,
  `strFilmTitle` varchar(25) DEFAULT NULL,
  `memFilmStory` mediumtext DEFAULT NULL,
  `dtmFilmReleaseDate` datetime DEFAULT NULL,
  `intFilmDuration` int(11) DEFAULT NULL,
  `intFilmGenreID` int(11) DEFAULT NULL,
  `lngFilmCertificateID` int(11) DEFAULT NULL,
  `memFilmAdditionalInfo` mediumtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lngFilmTitleID`),
  KEY `lngFilmTitleID_idx` (`lngFilmTitleID`),
  KEY `lngFilmCertificateID_idx` (`lngFilmCertificateID`),
  KEY `lngFilmGenreID_idx` (`intFilmGenreID`),
  CONSTRAINT `lngFilmCertificateID` FOREIGN KEY (`lngFilmCertificateID`) REFERENCES `tblfilmcertificates` (`lngCertificateID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lngFilmGenreID` FOREIGN KEY (`intFilmGenreID`) REFERENCES `tblfilmgenres` (`lngGenreID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfilmtitles`
--

LOCK TABLES `tblfilmtitles` WRITE;
/*!40000 ALTER TABLE `tblfilmtitles` DISABLE KEYS */;
INSERT INTO `tblfilmtitles` VALUES (6,'Black Widow 2020','The avengers','2020-02-29 00:00:00',123,1,1,'n/a','posters/il_570xN_1996191266_r009.jpg'),(7,'Dolittle (2020)','After losing his wife seven years earlier, the eccentric Dr. John Dolittle, famed doctor and veterinarian of Queen Victoria’s England, hermits himself away behind the high walls of Dolittle Manor with only his menagerie of exotic animals for company. But when the young queen falls gravely ill, a reluctant Dolittle is forced to set sail on an epic adventure to a mythical island in search of a cure, regaining his wit and courage as he crosses old adversaries and discovers wondrous creatures.','2020-01-01 00:00:00',101,1,1,'nothing','posters/hrraiBBuhu5E50otrtrykNqnOt5.jpg'),(8,'Shazam! (2019)','Synopsis\r\nA boy is given the ability to become an adult superhero in times of need with a single magic word.','2019-03-23 00:00:00',132,3,2,'Just Say The Magic Word','posters/xnopI5Xtky18MPhK40cZAGAOVeV.jpg'),(9,'Avengers: Endgame','The grave course of events set in motion by Thanos that wiped out half the universe and fractured the Avengers ranks compels the remaining Avengers to take one final stand in Marvel Studios\' grand conclusion to twenty-two films, \"Avengers: Endgame.\"','2019-04-26 00:00:00',182,1,2,'the end','posters/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@__V1_.jpg'),(10,'The Irishman','An epic gangster drama that earns its extended runtime, The Irishman finds Martin Scorsese revisiting familiar themes to poignant, funny, and profound effect.','2019-11-01 00:00:00',209,1,2,'none','posters/irishman.jpg'),(11,'1917 2019','April 6th, 1917. As a regiment assembles to wage war deep in enemy territory, two soldiers are assigned to race against time and deliver a message that will stop 1,600 men from walking straight into a deadly trap.','2020-01-10 00:00:00',119,5,4,'April 1917, the Western Front. Two British soldiers are sent to deliver an urgent message to an isolated regiment. If the message is not received in time the regiment will walk into a trap and be massacred. To get to the regiment they will need to cross through enemy territory. Time is of the essence and the journey will be fraught with danger. ','posters/MV5BOTdmNTFjNDEtNzg0My00ZjkxLTg1ZDAtZTdkMDc2ZmFiNWQ1XkEyXkFqcGdeQXVyNTAzNzgwNTg@__V1_.jpg'),(12,'ada','dasdasdas','2020-03-03 00:00:00',213,19,4,'asdasdasdas','posters/druplicon-small.png'),(13,'hidethepain','hahahahahahahahaa','2020-03-17 00:00:00',123,20,2,'asdasdasdasdasdasd','posters/hide-the-pain-harold-meme-can-never-die-because-he-48037053.png'),(14,'theanother','asdasdas','2020-03-04 00:00:00',123,1,1,'asdasdasda','posters/LogoMakr_7WUiNA.png'),(15,'party','asasdasd','2020-03-11 00:00:00',123,19,7,'asdasdasdasd','posters/MTICS_PARTY_MAP-1.jpg'),(16,'joomyhahahah','ahsdasdasd','2020-03-19 00:00:00',123,1,1,'asdasdasd','posters/joomla-logo-png-7.png');
/*!40000 ALTER TABLE `tblfilmtitles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfilmtitlesproducers`
--

DROP TABLE IF EXISTS `tblfilmtitlesproducers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfilmtitlesproducers` (
  `lngProducerID` int(11) DEFAULT NULL,
  `lngFilmTitleID` int(11) DEFAULT NULL,
  KEY `lngProducerID_idx` (`lngProducerID`),
  KEY `lngFilmTitleID1_idx` (`lngFilmTitleID`),
  CONSTRAINT `lngFilmTitleID1` FOREIGN KEY (`lngFilmTitleID`) REFERENCES `tblfilmtitles` (`lngFilmTitleID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lngProducerID` FOREIGN KEY (`lngProducerID`) REFERENCES `tblproducers` (`lngProducerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfilmtitlesproducers`
--

LOCK TABLES `tblfilmtitlesproducers` WRITE;
/*!40000 ALTER TABLE `tblfilmtitlesproducers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblfilmtitlesproducers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblproducers`
--

DROP TABLE IF EXISTS `tblproducers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblproducers` (
  `lngProducerID` int(11) NOT NULL AUTO_INCREMENT,
  `strProducerName` varchar(25) NOT NULL,
  `hypContactEmailAddress` varchar(45) NOT NULL,
  `hypWebsite` varchar(255) NOT NULL,
  PRIMARY KEY (`lngProducerID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblproducers`
--

LOCK TABLES `tblproducers` WRITE;
/*!40000 ALTER TABLE `tblproducers` DISABLE KEYS */;
INSERT INTO `tblproducers` VALUES (4,'heyrold && nathaliesod ','harlieproduction@email.com','harlie.com');
/*!40000 ALTER TABLE `tblproducers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblratings`
--

DROP TABLE IF EXISTS `tblratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblratings` (
  `lngRatingID` int(11) NOT NULL AUTO_INCREMENT,
  `strRatingDesc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`lngRatingID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblratings`
--

LOCK TABLES `tblratings` WRITE;
/*!40000 ALTER TABLE `tblratings` DISABLE KEYS */;
INSERT INTO `tblratings` VALUES (1,'Ok'),(2,'Good'),(3,'Satisfactory'),(4,'Very Satisfactory'),(5,'Excellent');
/*!40000 ALTER TABLE `tblratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblroletypes`
--

DROP TABLE IF EXISTS `tblroletypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblroletypes` (
  `lngRoleTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `strRoleType` varchar(25) NOT NULL,
  PRIMARY KEY (`lngRoleTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblroletypes`
--

LOCK TABLES `tblroletypes` WRITE;
/*!40000 ALTER TABLE `tblroletypes` DISABLE KEYS */;
INSERT INTO `tblroletypes` VALUES (1,'Protagonist'),(2,'Antagonist'),(3,'Ingenue'),(4,'Juvenile'),(5,'Supporting roles'),(6,'Principals'),(7,'Foil'),(8,'Straight part'),(9,'Heavy'),(10,'Typecasting'),(11,'Casting by type'),(12,'Ensemble'),(13,'Cameo'),(14,'Walk-on'),(15,'Bit part'),(16,'Internalizing'),(17,'Externalizing'),(18,'Concentrating'),(19,'Observing'),(20,'Playing the condition'),(21,'Playing the objectives'),(22,'Sharing a scene'),(23,'Giving a scene'),(24,'Turning a scene');
/*!40000 ALTER TABLE `tblroletypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblwebsiterating`
--

DROP TABLE IF EXISTS `tblwebsiterating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblwebsiterating` (
  `lngWebsiteRatingID` int(11) NOT NULL AUTO_INCREMENT,
  `lngRatingID` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`lngWebsiteRatingID`),
  KEY `lngRatingID_idx` (`lngRatingID`),
  KEY `user__idss_idx` (`user_id`),
  CONSTRAINT `lngRatingID` FOREIGN KEY (`lngRatingID`) REFERENCES `tblratings` (`lngRatingID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user__idss` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblwebsiterating`
--

LOCK TABLES `tblwebsiterating` WRITE;
/*!40000 ALTER TABLE `tblwebsiterating` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblwebsiterating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `username` varchar(60) NOT NULL,
  `pass` char(40) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'harold','aaron','harold@email.com','c57f431343f100b441e268cc12babc34','2020-03-09 02:20:13'),(6,'heyrold','hehe','heyrold@email.com','1804b8958c027b1eff82f2415f417d61','2020-03-09 02:43:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-13  8:31:41
