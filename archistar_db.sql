-- MySQL dump 10.13  Distrib 8.0.19, for macos10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: archistar_db
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `analytics_types`
--

DROP TABLE IF EXISTS `analytics_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analytics_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `units` varchar(100) DEFAULT NULL,
  `is_numeric` tinyint DEFAULT NULL,
  `num_decimal_places` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analytics_types`
--

LOCK TABLES `analytics_types` WRITE;
/*!40000 ALTER TABLE `analytics_types` DISABLE KEYS */;
INSERT INTO `analytics_types` VALUES (1,NULL,NULL,'max_Bld_Height_m','m',1,1),(2,NULL,NULL,'min_lot_size_m2','m2',1,0),(3,NULL,NULL,'fsr',':1',1,2);
/*!40000 ALTER TABLE `analytics_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `properties` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guid` int unsigned NOT NULL,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` VALUES (1,NULL,NULL,1,'Parramatta','NSW','Australia'),(2,NULL,NULL,2,'Parramatta','NSW','Australia'),(3,NULL,NULL,3,'Parramatta','NSW','Australia'),(4,NULL,NULL,4,'Parramatta','NSW','Australia'),(5,NULL,NULL,5,'Parramatta','NSW','Australia'),(6,NULL,NULL,6,'Parramatta','NSW','Australia'),(7,NULL,NULL,7,'Parramatta','NSW','Australia'),(8,NULL,NULL,8,'Parramatta','NSW','Australia'),(9,NULL,NULL,9,'Parramatta','NSW','Australia'),(10,NULL,NULL,10,'Parramatta','NSW','Australia'),(11,NULL,NULL,11,'Parramatta','NSW','Australia'),(12,NULL,NULL,12,'Parramatta','NSW','Australia'),(13,NULL,NULL,13,'Parramatta','NSW','Australia'),(14,NULL,NULL,14,'Parramatta','NSW','Australia'),(15,NULL,NULL,15,'Ryde','NSW','Australia'),(16,NULL,NULL,16,'Ryde','NSW','Australia'),(17,NULL,NULL,17,'Ryde','NSW','Australia'),(18,NULL,NULL,18,'Ryde','NSW','Australia'),(19,NULL,NULL,19,'Ryde','NSW','Australia'),(20,NULL,NULL,20,'Castle Hill','NSW','Australia'),(21,NULL,NULL,21,'Richmond','NSW','Australia'),(22,NULL,NULL,22,'Richmond','NSW','Australia'),(23,NULL,NULL,23,'Richmond','NSW','Australia'),(24,NULL,NULL,24,'Richmond','NSW','Australia'),(25,NULL,NULL,25,'Richmond','NSW','Australia'),(26,NULL,NULL,26,'Richmond','NSW','Australia'),(27,NULL,NULL,27,'Richmond','NSW','Australia'),(28,NULL,NULL,28,'Richmond','NSW','Australia'),(29,NULL,NULL,29,'Richmond','NSW','Australia'),(30,NULL,NULL,30,'Richmond','NSW','Australia'),(31,NULL,NULL,31,'Richmond','NSW','Australia'),(32,NULL,NULL,32,'Richmond','NSW','Australia'),(33,NULL,NULL,33,'Richmond','NSW','Australia'),(34,NULL,NULL,34,'Richmond','NSW','Australia'),(35,NULL,NULL,35,'Richmond','NSW','Australia'),(36,NULL,NULL,36,'Richmond','NSW','Australia'),(37,NULL,NULL,37,'Southbank','Qld','Australia'),(38,NULL,NULL,38,'Southbank','Qld','Australia'),(39,NULL,NULL,39,'Southbank','Qld','Australia'),(40,NULL,NULL,40,'Southbank','Qld','Australia'),(41,NULL,NULL,41,'Southbank','Qld','Australia'),(42,NULL,NULL,42,'Southbank','Qld','Australia'),(43,NULL,NULL,43,'Southbank','Qld','Australia'),(44,NULL,NULL,44,'Southbank','Qld','Australia'),(45,NULL,NULL,45,'Southbank','Qld','Australia'),(46,NULL,NULL,46,'Southbank','Qld','Australia'),(47,NULL,NULL,47,'Southbank','Qld','Australia'),(48,NULL,NULL,48,'Southbank','Qld','Australia'),(49,NULL,NULL,49,'O\'Sullivan Beach','Qld','Australia'),(50,NULL,NULL,50,'O\'Sullivan Beach','Qld','Australia'),(51,NULL,NULL,51,'O\'Sullivan Beach','Qld','Australia'),(52,NULL,NULL,52,'O\'Sullivan Beach','Qld','Australia'),(53,NULL,NULL,53,'O\'Sullivan Beach','Qld','Australia'),(54,NULL,NULL,54,'O\'Sullivan Beach','Qld','Australia'),(55,NULL,NULL,55,'O\'Sullivan Beach','Qld','Australia'),(56,NULL,NULL,56,'O\'Sullivan Beach','Qld','Australia'),(57,NULL,NULL,57,'Geelong','Vic','Australia'),(58,NULL,NULL,58,'Geelong','Vic','Australia'),(59,NULL,NULL,59,'Geelong','Vic','Australia'),(60,NULL,NULL,60,'Geelong','Vic','Australia'),(61,NULL,NULL,61,'Geelong','Vic','Australia'),(62,NULL,NULL,62,'Geelong','Vic','Australia'),(63,NULL,NULL,63,'Geelong','Vic','Australia'),(64,NULL,NULL,64,'Geelong','Vic','Australia'),(65,NULL,NULL,65,'Geelong','Vic','Australia'),(66,NULL,NULL,66,'Geelong','Vic','Australia'),(67,NULL,NULL,67,'Geelong','Vic','Australia'),(68,NULL,NULL,68,'Geelong','Vic','Australia'),(69,NULL,NULL,69,'Geelong','Vic','Australia'),(70,NULL,NULL,70,'Geelong','Vic','Australia'),(71,NULL,NULL,71,'Geelong','Vic','Australia'),(72,NULL,NULL,72,'Geelong','Vic','Australia'),(73,NULL,NULL,73,'Fitzroy','Vic','Australia'),(74,NULL,NULL,74,'Richmond','Vic','Australia'),(75,NULL,NULL,75,'Richmond','Vic','Australia'),(76,NULL,NULL,76,'Richmond','Vic','Australia'),(77,NULL,NULL,77,'Richmond','Vic','Australia'),(78,NULL,NULL,78,'Richmond','Vic','Australia'),(79,NULL,NULL,79,'Richmond','Vic','Australia'),(80,NULL,NULL,80,'Richmond','Vic','Australia'),(81,NULL,NULL,81,'Richmond','Vic','Australia'),(82,NULL,NULL,82,'Richmond','Vic','Australia'),(83,NULL,NULL,83,'Richmond','Vic','Australia'),(84,NULL,NULL,84,'Richmond','Vic','Australia'),(85,NULL,NULL,85,'Richmond','Vic','Australia'),(86,NULL,NULL,86,'Richmond','Vic','Australia'),(87,NULL,NULL,87,'Richmond','Vic','Australia'),(88,NULL,NULL,88,'Richmond','Vic','Australia'),(89,NULL,NULL,89,'Richmond','Vic','Australia'),(90,NULL,NULL,90,'Richmond','Vic','Australia'),(91,NULL,NULL,91,'Richmond','Vic','Australia'),(92,NULL,NULL,92,'Richmond','Vic','Australia'),(93,NULL,NULL,93,'Subiaco','WA','Australia'),(94,NULL,NULL,94,'Subiaco','WA','Australia'),(95,NULL,NULL,95,'Subiaco','WA','Australia'),(96,NULL,NULL,96,'Subiaco','WA','Australia'),(97,NULL,NULL,97,'Subiaco','WA','Australia'),(98,NULL,NULL,98,'Subiaco','WA','Australia'),(99,NULL,NULL,99,'Subiaco','WA','Australia'),(100,NULL,NULL,100,'Subiaco','WA','Australia');
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_analytics`
--

DROP TABLE IF EXISTS `property_analytics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_analytics` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `property_id` int unsigned DEFAULT NULL,
  `analytic_type_id` int unsigned DEFAULT NULL,
  `value` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_analytics`
--

LOCK TABLES `property_analytics` WRITE;
/*!40000 ALTER TABLE `property_analytics` DISABLE KEYS */;
INSERT INTO `property_analytics` VALUES (1,NULL,NULL,1,1,17),(2,NULL,NULL,2,1,21),(3,NULL,NULL,3,1,29),(4,NULL,NULL,4,1,16),(5,NULL,NULL,5,1,17),(6,NULL,NULL,6,1,15),(7,NULL,NULL,7,1,21),(8,NULL,NULL,8,1,10),(9,NULL,NULL,9,1,14),(10,NULL,NULL,10,1,24),(11,NULL,NULL,11,1,26),(12,NULL,NULL,12,1,12),(13,NULL,NULL,13,1,22),(14,NULL,NULL,14,1,22),(15,NULL,NULL,15,1,34),(16,NULL,NULL,16,1,10),(17,NULL,NULL,17,1,34),(18,NULL,NULL,18,1,34),(19,NULL,NULL,19,1,17),(20,NULL,NULL,20,1,28),(21,NULL,NULL,21,1,11),(22,NULL,NULL,22,1,22),(23,NULL,NULL,23,1,30),(24,NULL,NULL,24,1,11),(25,NULL,NULL,25,1,35),(26,NULL,NULL,26,1,11),(27,NULL,NULL,27,1,37),(28,NULL,NULL,28,1,13),(29,NULL,NULL,29,1,38),(30,NULL,NULL,30,1,29),(31,NULL,NULL,31,1,34),(32,NULL,NULL,32,1,28),(33,NULL,NULL,33,1,17),(34,NULL,NULL,34,1,11),(35,NULL,NULL,35,1,12),(36,NULL,NULL,36,1,20),(37,NULL,NULL,37,1,39),(38,NULL,NULL,38,1,17),(39,NULL,NULL,39,1,35),(40,NULL,NULL,40,1,28),(41,NULL,NULL,41,1,31),(42,NULL,NULL,42,1,19),(43,NULL,NULL,43,1,13),(44,NULL,NULL,44,1,25),(45,NULL,NULL,45,1,39),(46,NULL,NULL,46,1,22),(47,NULL,NULL,47,1,17),(48,NULL,NULL,48,1,17),(49,NULL,NULL,49,1,27),(50,NULL,NULL,50,1,25),(51,NULL,NULL,51,1,39),(52,NULL,NULL,52,1,20),(53,NULL,NULL,53,1,23),(54,NULL,NULL,54,1,15),(55,NULL,NULL,55,1,39),(56,NULL,NULL,56,1,27),(57,NULL,NULL,57,1,36),(58,NULL,NULL,58,1,31),(59,NULL,NULL,59,1,17),(60,NULL,NULL,60,1,33),(61,NULL,NULL,61,1,14),(62,NULL,NULL,62,1,13),(63,NULL,NULL,63,1,26),(64,NULL,NULL,64,1,10),(65,NULL,NULL,65,1,34),(66,NULL,NULL,66,1,23),(67,NULL,NULL,67,1,16),(68,NULL,NULL,68,1,18),(69,NULL,NULL,69,1,15),(70,NULL,NULL,70,1,18),(71,NULL,NULL,71,1,18),(72,NULL,NULL,72,1,23),(73,NULL,NULL,73,1,36),(74,NULL,NULL,74,1,34),(75,NULL,NULL,75,1,23),(76,NULL,NULL,76,1,29),(77,NULL,NULL,77,1,32),(78,NULL,NULL,78,1,33),(79,NULL,NULL,79,1,36),(80,NULL,NULL,80,1,37),(81,NULL,NULL,81,1,22),(82,NULL,NULL,82,1,12),(83,NULL,NULL,83,1,16),(84,NULL,NULL,84,1,9),(85,NULL,NULL,85,1,9),(86,NULL,NULL,86,1,20),(87,NULL,NULL,87,1,14),(88,NULL,NULL,88,1,15),(89,NULL,NULL,89,1,17),(90,NULL,NULL,90,1,15),(91,NULL,NULL,91,1,10),(92,NULL,NULL,92,1,22),(93,NULL,NULL,93,1,21),(94,NULL,NULL,94,1,16),(95,NULL,NULL,95,1,11),(96,NULL,NULL,96,1,33),(97,NULL,NULL,97,1,36),(98,NULL,NULL,98,1,34),(99,NULL,NULL,99,1,13),(100,NULL,NULL,100,1,33),(101,NULL,NULL,2,2,340),(102,NULL,NULL,3,2,823),(103,NULL,NULL,4,2,821),(104,NULL,NULL,6,2,1095),(105,NULL,NULL,8,2,1101),(106,NULL,NULL,9,2,970),(107,NULL,NULL,10,2,1049),(108,NULL,NULL,12,2,184),(109,NULL,NULL,14,2,192),(110,NULL,NULL,15,2,939),(111,NULL,NULL,16,2,745),(112,NULL,NULL,18,2,749),(113,NULL,NULL,20,2,428),(114,NULL,NULL,21,2,277),(115,NULL,NULL,22,2,1103),(116,NULL,NULL,24,2,544),(117,NULL,NULL,26,2,778),(118,NULL,NULL,27,2,234),(119,NULL,NULL,28,2,395),(120,NULL,NULL,30,2,784),(121,NULL,NULL,32,2,247),(122,NULL,NULL,33,2,959),(123,NULL,NULL,34,2,738),(124,NULL,NULL,36,2,559),(125,NULL,NULL,38,2,599),(126,NULL,NULL,39,2,383),(127,NULL,NULL,40,2,282),(128,NULL,NULL,42,2,309),(129,NULL,NULL,44,2,410),(130,NULL,NULL,45,2,190),(131,NULL,NULL,46,2,594),(132,NULL,NULL,48,2,228),(133,NULL,NULL,50,2,284),(134,NULL,NULL,51,2,758),(135,NULL,NULL,52,2,503),(136,NULL,NULL,54,2,672),(137,NULL,NULL,56,2,714),(138,NULL,NULL,57,2,896),(139,NULL,NULL,58,2,801),(140,NULL,NULL,60,2,1067),(141,NULL,NULL,62,2,1016),(142,NULL,NULL,63,2,918),(143,NULL,NULL,64,2,535),(144,NULL,NULL,66,2,970),(145,NULL,NULL,68,2,1004),(146,NULL,NULL,69,2,238),(147,NULL,NULL,70,2,296),(148,NULL,NULL,72,2,663),(149,NULL,NULL,74,2,1034),(150,NULL,NULL,75,2,318),(151,NULL,NULL,76,2,301),(152,NULL,NULL,78,2,779),(153,NULL,NULL,80,2,225),(154,NULL,NULL,81,2,839),(155,NULL,NULL,82,2,349),(156,NULL,NULL,84,2,567),(157,NULL,NULL,86,2,430),(158,NULL,NULL,87,2,626),(159,NULL,NULL,88,2,812),(160,NULL,NULL,90,2,960),(161,NULL,NULL,92,2,815),(162,NULL,NULL,93,2,1078),(163,NULL,NULL,94,2,605),(164,NULL,NULL,96,2,313),(165,NULL,NULL,98,2,716),(166,NULL,NULL,99,2,426),(167,NULL,NULL,100,2,577),(168,NULL,NULL,2,3,1),(169,NULL,NULL,4,3,3),(170,NULL,NULL,6,3,3),(171,NULL,NULL,8,3,3),(172,NULL,NULL,10,3,3),(173,NULL,NULL,12,3,1),(174,NULL,NULL,14,3,3),(175,NULL,NULL,16,3,2),(176,NULL,NULL,18,3,3),(177,NULL,NULL,20,3,1),(178,NULL,NULL,22,3,2),(179,NULL,NULL,24,3,3),(180,NULL,NULL,26,3,1),(181,NULL,NULL,28,3,2),(182,NULL,NULL,30,3,3),(183,NULL,NULL,32,3,2),(184,NULL,NULL,34,3,2),(185,NULL,NULL,36,3,2),(186,NULL,NULL,38,3,1),(187,NULL,NULL,40,3,3),(188,NULL,NULL,42,3,2),(189,NULL,NULL,44,3,3),(190,NULL,NULL,46,3,3),(191,NULL,NULL,48,3,2),(192,NULL,NULL,50,3,2),(193,NULL,NULL,52,3,1),(194,NULL,NULL,54,3,2),(195,NULL,NULL,56,3,2),(196,NULL,NULL,58,3,1),(197,NULL,NULL,60,3,3),(198,NULL,NULL,62,3,2),(199,NULL,NULL,64,3,2),(200,NULL,NULL,66,3,1),(201,NULL,NULL,68,3,2),(202,NULL,NULL,70,3,2),(203,NULL,NULL,72,3,2),(204,NULL,NULL,74,3,2),(205,NULL,NULL,76,3,2),(206,NULL,NULL,78,3,3),(207,NULL,NULL,80,3,2),(208,NULL,NULL,82,3,2),(209,NULL,NULL,84,3,1),(210,NULL,NULL,86,3,1),(211,NULL,NULL,88,3,3),(212,NULL,NULL,90,3,1),(213,NULL,NULL,92,3,1),(214,NULL,NULL,94,3,1),(215,NULL,NULL,96,3,2),(216,NULL,NULL,98,3,3),(217,NULL,NULL,100,3,3);
/*!40000 ALTER TABLE `property_analytics` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-01 19:23:34
