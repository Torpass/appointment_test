-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: appointment_test
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appoitment`
--

DROP TABLE IF EXISTS `appoitment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appoitment` (
  `id` varchar(45) NOT NULL,
  `id_code` varchar(45) DEFAULT NULL,
  `categorie_id` int NOT NULL,
  `costumer_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `location_id` int NOT NULL,
  `date` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_appoitment_costumer_idx` (`costumer_id`),
  KEY `fk_appoitment_employee_idx` (`employee_id`),
  KEY `fk_appoitment_categorie_idx` (`categorie_id`),
  KEY `fk_appoitment_location_idx` (`location_id`),
  CONSTRAINT `fk_appoitment_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `fk_appoitment_costumer` FOREIGN KEY (`costumer_id`) REFERENCES `costumer` (`id`),
  CONSTRAINT `fk_appoitment_employee` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  CONSTRAINT `fk_appoitment_location` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appoitment`
--

LOCK TABLES `appoitment` WRITE;
/*!40000 ALTER TABLE `appoitment` DISABLE KEYS */;
/*!40000 ALTER TABLE `appoitment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_schedule`
--

DROP TABLE IF EXISTS `categorie_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie_schedule` (
  `id` varchar(45) NOT NULL,
  `id_code` varchar(45) NOT NULL,
  `categorie_id` int NOT NULL,
  `schedule_id` int NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorie_schedule_idx` (`categorie_id`),
  KEY `fk_schedule_categorie_idx` (`schedule_id`),
  CONSTRAINT `fk_categorie_schedule` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `fk_schedule_categorie` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_schedule`
--

LOCK TABLES `categorie_schedule` WRITE;
/*!40000 ALTER TABLE `categorie_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL,
  `id_code` varchar(45) DEFAULT NULL,
  `is_active` tinyint DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categories_services_idx` (`service_id`),
  CONSTRAINT `fk_categories_services` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `costumer`
--

DROP TABLE IF EXISTS `costumer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `costumer` (
  `id` int NOT NULL,
  `id_code` varchar(45) DEFAULT NULL,
  `is_active` tinyint DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costumer`
--

LOCK TABLES `costumer` WRITE;
/*!40000 ALTER TABLE `costumer` DISABLE KEYS */;
/*!40000 ALTER TABLE `costumer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `id` int NOT NULL,
  `id_code` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_location`
--

DROP TABLE IF EXISTS `employee_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_location` (
  `employee_id` int NOT NULL,
  `location_id` int NOT NULL,
  KEY `fk_employee_location_idx` (`employee_id`),
  KEY `fk_location_employee_idx` (`location_id`),
  CONSTRAINT `fk_employee_location` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  CONSTRAINT `fk_location_employee` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_location`
--

LOCK TABLES `employee_location` WRITE;
/*!40000 ALTER TABLE `employee_location` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_schedule`
--

DROP TABLE IF EXISTS `employee_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_schedule` (
  `employee_id` int NOT NULL,
  `schedule_id` int NOT NULL,
  `is_active` tinyint DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`employee_id`,`schedule_id`),
  KEY `fk_schedule_employee_idx` (`schedule_id`),
  CONSTRAINT `fk_employee_schedule` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  CONSTRAINT `fk_schedule_employee` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_schedule`
--

LOCK TABLES `employee_schedule` WRITE;
/*!40000 ALTER TABLE `employee_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_service`
--

DROP TABLE IF EXISTS `employee_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_service` (
  `id_employee` int NOT NULL,
  `id_service` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_employee`,`id_service`),
  KEY `fk_service_employee_idx` (`id_service`),
  CONSTRAINT `fk_employee_service` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id`),
  CONSTRAINT `fk_service_employee` FOREIGN KEY (`id_service`) REFERENCES `services` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_service`
--

LOCK TABLES `employee_service` WRITE;
/*!40000 ALTER TABLE `employee_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_code` varchar(45) DEFAULT NULL,
  `is_active` tinyint DEFAULT NULL,
  `postal_code` int DEFAULT NULL,
  `address` text,
  `city` varchar(256) DEFAULT NULL,
  `state` varchar(256) DEFAULT NULL,
  `country` varchar(256) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'9559c1034e6ab4348375c4573f116049',1,3001,'carrera 17','Barquisimeto','Lara','USA','2025-01-09 03:09:03','2025-01-09 03:09:03'),(2,'960954cffe83bc8290c63a53ed002c4f',1,3001,'carrera 17','Barquisimeto','Lara','USA','2025-01-09 03:11:31','2025-01-09 03:11:31'),(3,'f0e4dad025c9a8fea5b450664bfed2f5',1,7227,'Otra ubicación','Texas','Las Vegas','USA','2025-01-09 03:23:58','2025-01-09 03:23:58'),(4,'e070baaa3bf2b54a5a2a070574f4f3a4',1,3001,'Carrera 17','Barquisimeto','Lara','USA','2025-01-09 13:56:40','2025-01-09 13:56:40'),(5,'ff7c97ebc34e5d2ba4182efe8f357d21',1,3001,'Carrera 17','Barquisimeto','Lara','USA','2025-01-09 13:56:47','2025-01-09 13:56:47'),(6,'1ab8f6bfd9f702537b9f05e85652c2f1',1,3001,'Avenida Venezuela','Barquisimeto','Lara','USA','2025-01-09 14:02:14','2025-01-09 14:02:14'),(7,'3a3b77da1eab0c619cab4c7685352790',1,3001,'Avenida Venezuela','Barquisimeto','Lara','USA','2025-01-09 14:05:36','2025-01-09 14:05:36');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedules` (
  `id` int NOT NULL,
  `id_code` varchar(45) DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time DEFAULT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` int NOT NULL,
  `id_code` varchar(45) DEFAULT NULL,
  `is_active` tinyint DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `id_code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` tinyint NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `newsletter_subscription` tinyint NOT NULL,
  `tap_accepted` tinyint NOT NULL,
  `folder_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `status_date` date DEFAULT NULL,
  `notes` text COLLATE utf8mb4_general_ci,
  `ip_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `server_language` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `form_language` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reset_password_token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reset_password_expiry_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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

-- Dump completed on 2025-01-09 11:50:09
