/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.5.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: online_seed_marketplace
-- ------------------------------------------------------
-- Server version	10.4.34-MariaDB-1:10.4.34+maria~ubu2004

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
-- Table structure for table `farmer_preferences`
--

DROP TABLE IF EXISTS `farmer_preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `farmer_preferences` (
  `preference_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `season` varchar(50) DEFAULT NULL,
  `land_area` decimal(10,2) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `soil_condition` varchar(50) DEFAULT NULL,
  `crop_type` varchar(50) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`preference_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `farmer_preferences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farmer_preferences`
--

LOCK TABLES `farmer_preferences` WRITE;
/*!40000 ALTER TABLE `farmer_preferences` DISABLE KEYS */;
/*!40000 ALTER TABLE `farmer_preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `seed_id` int(11) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `order_id` (`order_id`),
  KEY `seed_id` (`seed_id`),
  CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`seed_id`) REFERENCES `seeds` (`seed_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seed_climatic_requirements`
--

DROP TABLE IF EXISTS `seed_climatic_requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seed_climatic_requirements` (
  `requirement_id` int(11) NOT NULL AUTO_INCREMENT,
  `seed_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`requirement_id`),
  KEY `seed_id` (`seed_id`),
  CONSTRAINT `seed_climatic_requirements_ibfk_1` FOREIGN KEY (`seed_id`) REFERENCES `seeds` (`seed_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seed_climatic_requirements`
--

LOCK TABLES `seed_climatic_requirements` WRITE;
/*!40000 ALTER TABLE `seed_climatic_requirements` DISABLE KEYS */;
/*!40000 ALTER TABLE `seed_climatic_requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seed_fertilizer_application`
--

DROP TABLE IF EXISTS `seed_fertilizer_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seed_fertilizer_application` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `seed_id` int(11) DEFAULT NULL,
  `fertilizer_name` varchar(100) DEFAULT NULL,
  `basal_kg_per_hectare` decimal(10,2) DEFAULT NULL,
  `top_dressing_kg_per_hectare` decimal(10,2) DEFAULT NULL,
  `timing_of_application` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`application_id`),
  KEY `seed_id` (`seed_id`),
  CONSTRAINT `seed_fertilizer_application_ibfk_1` FOREIGN KEY (`seed_id`) REFERENCES `seeds` (`seed_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seed_fertilizer_application`
--

LOCK TABLES `seed_fertilizer_application` WRITE;
/*!40000 ALTER TABLE `seed_fertilizer_application` DISABLE KEYS */;
/*!40000 ALTER TABLE `seed_fertilizer_application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seed_planting_instructions`
--

DROP TABLE IF EXISTS `seed_planting_instructions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seed_planting_instructions` (
  `instruction_id` int(11) NOT NULL AUTO_INCREMENT,
  `seed_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`instruction_id`),
  KEY `seed_id` (`seed_id`),
  CONSTRAINT `seed_planting_instructions_ibfk_1` FOREIGN KEY (`seed_id`) REFERENCES `seeds` (`seed_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seed_planting_instructions`
--

LOCK TABLES `seed_planting_instructions` WRITE;
/*!40000 ALTER TABLE `seed_planting_instructions` DISABLE KEYS */;
/*!40000 ALTER TABLE `seed_planting_instructions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seed_soil_requirements`
--

DROP TABLE IF EXISTS `seed_soil_requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seed_soil_requirements` (
  `requirement_id` int(11) NOT NULL AUTO_INCREMENT,
  `seed_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`requirement_id`),
  KEY `seed_id` (`seed_id`),
  CONSTRAINT `seed_soil_requirements_ibfk_1` FOREIGN KEY (`seed_id`) REFERENCES `seeds` (`seed_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seed_soil_requirements`
--

LOCK TABLES `seed_soil_requirements` WRITE;
/*!40000 ALTER TABLE `seed_soil_requirements` DISABLE KEYS */;
/*!40000 ALTER TABLE `seed_soil_requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seed_varieties`
--

DROP TABLE IF EXISTS `seed_varieties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seed_varieties` (
  `variety_id` int(11) NOT NULL AUTO_INCREMENT,
  `seed_id` int(11) DEFAULT NULL,
  `variety_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`variety_id`),
  KEY `seed_id` (`seed_id`),
  CONSTRAINT `seed_varieties_ibfk_1` FOREIGN KEY (`seed_id`) REFERENCES `seeds` (`seed_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seed_varieties`
--

LOCK TABLES `seed_varieties` WRITE;
/*!40000 ALTER TABLE `seed_varieties` DISABLE KEYS */;
/*!40000 ALTER TABLE `seed_varieties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seeds`
--

DROP TABLE IF EXISTS `seeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seeds` (
  `seed_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `season` varchar(50) DEFAULT NULL,
  `soil_condition` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`seed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seeds`
--

LOCK TABLES `seeds` WRITE;
/*!40000 ALTER TABLE `seeds` DISABLE KEYS */;
INSERT INTO `seeds` VALUES (2,'Tomato Seeds','Vegetables',15.00,'Maha','Loamy','High-quality seeds for abundant tomatoes. Perfect for year-round cultivation.','Images/Tomato.png','2025-01-16 19:54:16'),(3,'Carrot Seeds','Vegetables',12.00,'Yala','Sandy','Organic carrot seeds for nutritious harvests. Best for summer growth.','Images/Carrot.png','2025-01-16 19:54:16'),(4,'Pumpkin Seeds','Vegetables',20.00,'Maha','Clay','Premium seeds for hearty pumpkins. Grow the perfect autumn crop!','Images/Pumpkin.png','2025-01-16 19:54:16');
/*!40000 ALTER TABLE `seeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2025-01-17  8:24:54
