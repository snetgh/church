-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: cop
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `cop_users_table`
--

DROP TABLE IF EXISTS `cop_users_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cop_users_table` (
  `users_table_id` int(100) NOT NULL AUTO_INCREMENT,
  `cop_user_name` varchar(50) NOT NULL,
  `cop_username` varchar(50) NOT NULL,
  `cop_password` longtext NOT NULL,
  `cop_type` varchar(50) NOT NULL,
  `cop_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`users_table_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cop_users_table`
--

LOCK TABLES `cop_users_table` WRITE;
/*!40000 ALTER TABLE `cop_users_table` DISABLE KEYS */;
INSERT INTO `cop_users_table` VALUES (1,'Step Network','stephen','skwabena','admin','2018-10-31 13:52:23'),(2,'Elder Richard Apenyo','rapenyo','1234','admin','2018-10-31 15:34:26'),(3,'Elder Princeworth Abankwa','pabankwa','123','admin','2018-10-31 15:35:21'),(4,'Elder Princeworth Abankwa','pabankwa','123','admin','2018-10-31 15:35:25'),(5,'Sis Florence Agyei','yaapapabi','123','welfare','2018-10-31 15:36:57'),(6,'Sis Florence Agyei','yaapapabi','123','welfare','2018-10-31 15:37:00'),(7,'Bro Francis Tsumasi Kyere','tkyere','123','welfare','2018-10-31 15:37:50'),(8,'Bro Francis Tsumasi Kyere','tkyere','123','welfare','2018-10-31 15:37:52'),(9,'Sis Akusika Victoria','sika','123','welfare','2018-10-31 15:38:37'),(10,'Sis Akusika Victoria','sika','123','welfare','2018-10-31 15:38:39'),(11,'Sis Veronica Boame','boame','123','welfare','2018-10-31 15:39:27'),(12,'Sis Veronica Boame','boame','123','welfare','2018-10-31 15:39:30');
/*!40000 ALTER TABLE `cop_users_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members_table`
--

DROP TABLE IF EXISTS `members_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members_table` (
  `member_id` int(100) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(50) NOT NULL,
  `member_contact` varchar(20) NOT NULL,
  `member_dob` varchar(20) NOT NULL,
  `member_sex` varchar(15) NOT NULL,
  `member_location` varchar(50) NOT NULL,
  `member_shepherd` varchar(50) NOT NULL,
  `member_cell_group` varchar(50) NOT NULL,
  `member_image` mediumtext NOT NULL,
  `member_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members_table`
--

LOCK TABLES `members_table` WRITE;
/*!40000 ALTER TABLE `members_table` DISABLE KEYS */;
INSERT INTO `members_table` VALUES (1,'Joana Kafui','0245908362','2012-10-09','Female','Donkorkrom','Sis. Comfirt Adike','Perez Home Cell','IMG-20181017-WA0001.jpg','2018-10-31 15:27:00'),(2,'APENYO RICHARD','0547581035','1991-02-02','Male','HOSPITAL BANGALO','Den. Blessed Koduah','Zoe Home Cell','passpost.png','2018-10-31 16:30:28'),(3,'Stephen Kwabena','0207529639','1996-02-04','Male','DPH','Elder Apenyo Richard','Zoe Home Cell','WWW.YIFY-TORRENTS.COM.jpg','2018-11-12 12:44:50');
/*!40000 ALTER TABLE `members_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `welfare_accounts`
--

DROP TABLE IF EXISTS `welfare_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `welfare_accounts` (
  `welfare_id` int(100) NOT NULL AUTO_INCREMENT,
  `welfare_user_id` int(50) NOT NULL,
  `welfare_month` varchar(20) NOT NULL,
  `welfare_year` varchar(20) NOT NULL,
  `welfare_amount_paid` int(20) NOT NULL,
  `welfare_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`welfare_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `welfare_accounts`
--

LOCK TABLES `welfare_accounts` WRITE;
/*!40000 ALTER TABLE `welfare_accounts` DISABLE KEYS */;
INSERT INTO `welfare_accounts` VALUES (1,1,'11','2018',20,'2018-11-01 19:21:13'),(2,2,'10','2018',20,'2018-11-05 18:22:23'),(3,1,'10','2018',20,'2018-11-05 18:23:33'),(4,1,'9','2018',20,'2018-11-05 18:23:58'),(5,1,'1','2018',2,'2018-11-10 17:53:47'),(6,2,'11','2018',20,'2018-11-10 18:32:44'),(7,3,'11','2018',2,'2018-11-12 12:46:29');
/*!40000 ALTER TABLE `welfare_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'cop'
--

--
-- Dumping routines for database 'cop'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-29 18:37:04
