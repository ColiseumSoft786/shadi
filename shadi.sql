-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: shadi
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin@gmail.com','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caste`
--

DROP TABLE IF EXISTS `caste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caste` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Religion` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Caste_Religion_FK_idx` (`Religion`),
  CONSTRAINT `Caste_Religion_FK` FOREIGN KEY (`Religion`) REFERENCES `religion` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caste`
--

LOCK TABLES `caste` WRITE;
/*!40000 ALTER TABLE `caste` DISABLE KEYS */;
INSERT INTO `caste` VALUES (1,'Mirza',1),(2,'Shrosh',2);
/*!40000 ALTER TABLE `caste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `State` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `City_State_FK_idx` (`State`),
  CONSTRAINT `City_State_FK` FOREIGN KEY (`State`) REFERENCES `state` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Faisalabad',1),(2,'Istanbul',2);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Pakistani'),(2,'Turkey');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `education` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` VALUES (1,'BSCS'),(2,'BSIT');
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expire`
--

DROP TABLE IF EXISTS `expire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expire` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `User` int(11) DEFAULT NULL,
  `Package` int(11) DEFAULT NULL,
  `Interest` varchar(45) DEFAULT NULL,
  `Expiredate` varchar(45) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Expire_User_ID_FK_idx` (`User`),
  KEY `Expire_Package_ID_FK_idx` (`Package`),
  CONSTRAINT `Expire_Package_ID_FK` FOREIGN KEY (`Package`) REFERENCES `package` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Expire_User_ID_FK` FOREIGN KEY (`User`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expire`
--

LOCK TABLES `expire` WRITE;
/*!40000 ALTER TABLE `expire` DISABLE KEYS */;
INSERT INTO `expire` VALUES (1,5,2,'15','10/25/2018',0),(2,1,2,'10','10/25/2018',0),(3,2,3,'20','10/25/2018',1),(4,3,2,'10','10/28/2018',0),(5,28,3,'20','10/28/2018',0),(6,2,2,'10','10/28/2018',1),(8,2,3,'20','10/28/2018',1),(9,2,2,'10','10/28/2018',0),(10,29,3,'20','10/29/2018',0);
/*!40000 ALTER TABLE `expire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest`
--

DROP TABLE IF EXISTS `interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sendby` int(11) DEFAULT NULL,
  `Sendto` int(11) DEFAULT NULL,
  `Accept` int(11) DEFAULT NULL,
  `Date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Interest_User_SendBy_FK_idx` (`Sendby`),
  KEY `Interest_User_Sendto_FK` (`Sendto`),
  CONSTRAINT `Interest_User_SendBy_FK` FOREIGN KEY (`Sendby`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Interest_User_Sendto_FK` FOREIGN KEY (`Sendto`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest`
--

LOCK TABLES `interest` WRITE;
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
INSERT INTO `interest` VALUES (20,2,3,1,'10/28/2018');
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ocupation`
--

DROP TABLE IF EXISTS `ocupation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ocupation` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ocupation`
--

LOCK TABLES `ocupation` WRITE;
/*!40000 ALTER TABLE `ocupation` DISABLE KEYS */;
INSERT INTO `ocupation` VALUES (1,'Ocupation'),(2,'Ocup');
/*!40000 ALTER TABLE `ocupation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Price` varchar(45) DEFAULT NULL,
  `Month` varchar(45) DEFAULT NULL,
  `Interest` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package`
--

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
INSERT INTO `package` VALUES (2,'Classic','50$','6','10'),(3,'Silver','100$','12','20');
/*!40000 ALTER TABLE `package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `religion`
--

DROP TABLE IF EXISTS `religion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `religion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `religion`
--

LOCK TABLES `religion` WRITE;
/*!40000 ALTER TABLE `religion` DISABLE KEYS */;
INSERT INTO `religion` VALUES (1,'Islam'),(2,'Cristian');
/*!40000 ALTER TABLE `religion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Stat_Country_FK_idx` (`Country`),
  CONSTRAINT `Stat_Country_FK` FOREIGN KEY (`Country`) REFERENCES `country` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,'Punjabi',1),(2,'State Turkey',2),(3,'Sind',1);
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subadmin`
--

DROP TABLE IF EXISTS `subadmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subadmin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Block` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subadmin`
--

LOCK TABLES `subadmin` WRITE;
/*!40000 ALTER TABLE `subadmin` DISABLE KEYS */;
INSERT INTO `subadmin` VALUES (2,'abuzar','920000000000','abuzar',0),(4,'usman','923034472147','usman',0);
/*!40000 ALTER TABLE `subadmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Subadmin` int(11) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `State` int(11) DEFAULT NULL,
  `City` int(11) DEFAULT NULL,
  `Education` int(11) DEFAULT NULL,
  `Ocupation` int(11) DEFAULT NULL,
  `Religion` int(11) DEFAULT NULL,
  `Caste` int(11) DEFAULT NULL,
  `Approve` tinyint(4) DEFAULT NULL,
  `UPic` varchar(255) DEFAULT NULL,
  `UName` varchar(45) DEFAULT NULL,
  `UPhone` varchar(45) DEFAULT NULL,
  `UGender` varchar(245) DEFAULT NULL,
  `UMartialStatus` varchar(245) DEFAULT NULL,
  `UAge` varchar(245) DEFAULT NULL,
  `UHeight` varchar(245) DEFAULT NULL,
  `UJobBusinessTitle` varchar(245) DEFAULT NULL,
  `UJobBusiness` varchar(245) DEFAULT NULL,
  `UIncome` varchar(245) DEFAULT NULL,
  `Color` varchar(245) DEFAULT NULL,
  `UBodyType` varchar(245) DEFAULT NULL,
  `URide` varchar(245) DEFAULT NULL,
  `BearHijab` varchar(245) DEFAULT NULL,
  `UFatherOcupation` int(11) DEFAULT NULL,
  `UMotherOcupation` int(11) DEFAULT NULL,
  `UBrothers` varchar(245) DEFAULT NULL,
  `USisters` varchar(245) DEFAULT NULL,
  `UMarriedSisters` varchar(245) DEFAULT NULL,
  `UMarriedBrothers` varchar(245) DEFAULT NULL,
  `UMotherTongue` varchar(245) DEFAULT NULL,
  `UAccommodation` varchar(245) DEFAULT NULL,
  `UAccommodationStatus` varchar(245) DEFAULT NULL,
  `UHouseSize` varchar(245) DEFAULT NULL,
  `LPMinAge` varchar(245) DEFAULT NULL,
  `LPMaxAge` varchar(245) DEFAULT NULL,
  `LPReligion` int(11) DEFAULT NULL,
  `LPCaste` int(11) DEFAULT NULL,
  `LPHeight` varchar(245) DEFAULT NULL,
  `LPCountry` int(11) DEFAULT NULL,
  `LPState` int(11) DEFAULT NULL,
  `LPCity` int(11) DEFAULT NULL,
  `LPMessage` text,
  `VerifyKey` tinyint(4) DEFAULT NULL,
  `Userid` varchar(255) DEFAULT NULL,
  `Block` varchar(255) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `StartDate` varchar(45) DEFAULT NULL,
  `Privacy` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Userid_UNIQUE` (`Userid`),
  KEY `User_Country_FK_idx` (`Country`),
  KEY `User_State_FK_idx` (`State`),
  KEY `User_Education_FK_idx` (`Education`),
  KEY `User_Caste_FK_idx` (`Caste`),
  KEY `User_Religion_FK_idx` (`Religion`),
  KEY `User_Ocupation_FK_idx` (`Ocupation`),
  KEY `User_City_FK_idx` (`City`),
  KEY `User_SubAdmin_FK_idx` (`Subadmin`),
  KEY `User_UserLPReligion_ID_FK_idx` (`LPReligion`),
  KEY `User_UserLPCast_ID_FK_idx` (`LPCaste`),
  KEY `User_UserLPCountry_ID_FK_idx` (`LPCountry`),
  KEY `User_UserLPState_ID_FK_idx` (`LPState`),
  KEY `User_UserLPCity_ID_FK_idx` (`LPCity`),
  KEY `User_FatherOcupation_FK_idx` (`UFatherOcupation`),
  KEY `User_UMotherOcupation_FK_idx` (`UMotherOcupation`),
  CONSTRAINT `User_Caste_FK` FOREIGN KEY (`Caste`) REFERENCES `caste` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_City_FK` FOREIGN KEY (`City`) REFERENCES `city` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_Country_FK` FOREIGN KEY (`Country`) REFERENCES `country` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_Education_FK` FOREIGN KEY (`Education`) REFERENCES `education` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_FatherOcupation_FK` FOREIGN KEY (`UFatherOcupation`) REFERENCES `ocupation` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_Ocupation_FK` FOREIGN KEY (`Ocupation`) REFERENCES `ocupation` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_Religion_FK` FOREIGN KEY (`Religion`) REFERENCES `religion` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_State_FK` FOREIGN KEY (`State`) REFERENCES `state` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_SubAdmin_FK` FOREIGN KEY (`Subadmin`) REFERENCES `subadmin` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_UMotherOcupation_FK` FOREIGN KEY (`UMotherOcupation`) REFERENCES `ocupation` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_UserLPCast_ID_FK` FOREIGN KEY (`LPCaste`) REFERENCES `caste` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_UserLPCity_ID_FK` FOREIGN KEY (`LPCity`) REFERENCES `city` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_UserLPCountry_ID_FK` FOREIGN KEY (`LPCountry`) REFERENCES `country` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_UserLPReligion_ID_FK` FOREIGN KEY (`LPReligion`) REFERENCES `religion` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User_UserLPState_ID_FK` FOREIGN KEY (`LPState`) REFERENCES `state` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,2,2,2,2,2,2,2,2,1,'bundles/assets/profiles/102220180621391039.jpg','usman','+920000000','Select One','Select One','Select One',NULL,'title job 2','Select One','15000 Or Below','Select One','Body Type','Ride','Beard',2,2,'1','1','1','1','Select One','Accommodation','Accommodation Status','15 marla','19','23',2,2,'4.10 Feet',2,2,2,'message updated.',0,'1323','2','usama','10/22/2018','1'),(2,2,1,1,1,2,2,1,1,1,'bundles/assets/profiles/102020180931131013.jpg','hasan','+920000000','Male','Single / Never Married','5.6 Feet',NULL,'Business Title','Business','15000 - 25000','White','Slim','Both','Beard',2,2,'2','2','1','1','Urdu','Living in Joint Family','Own Flat','5 Marla','22','21',1,1,'3.2 Feet',1,1,1,'finally filled ',0,'3444','0','hasan','10/23/2018','3'),(3,2,1,1,1,1,2,1,1,1,'bundles/assets/profiles/102420180938431043.jpg','ali','+923034472147','male','Martial Status','30','5','Business Title','Business','20,000','Color','Body Type','Ride','Bear',2,2,'2','2','2','2','Tongue','Accommodation','Accommodation Status','5 Marla','20','25',1,1,'5.4',1,1,1,'done now',0,'1122','0','usman','10/25/2018','2'),(5,2,1,1,1,1,2,1,1,1,'bundles/assets/profiles/102120180347341034.jpg','manan','+920000000000','Gender','Martial Status','30','6 feet','Business Title','Business','20,000','Color','Body Type','Ride','Bear',1,1,'2','2','1','1','Tongue','Accommodation','Accommodation Status','5 Marla','20','25',1,1,'5.4',1,1,1,'done everything',0,'1121','2','user','10/26/2018','2'),(28,2,1,1,1,1,2,1,1,1,'bundles/assets/profiles/102820180807081008.jpg','test','+920000000000','Select One','Select One','Select One',NULL,'title job 2','Select One','Select One','Select One','Body Type','Ride','Select One',1,1,'1','1','1','1','Select One','Accommodation','Accommodation Status','15 marla','Select One','26',1,1,'Select One',1,1,1,'asfasdf',0,'28-usr-6018','0','asdfasdf','10/28/2018','1'),(29,2,1,1,1,1,2,1,1,1,'bundles/assets/profiles/102920180817191019.gif','new','+9200000111','Select One','Select One','Select One',NULL,'title job 2','Select One','Select One','Select One','Body Type','Ride','Beard',2,2,'2','2','1','1','Punjabi','Living with Sister','Own Flat','15 marla','22','28',1,1,'5.3 Feet',1,1,1,'final testing',0,'29-usr-9658','0','asdfasdf','10/29/2018','3');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-29 15:39:11
