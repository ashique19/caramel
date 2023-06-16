-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: adaptive
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

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
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blogs_created_by_foreign` (`created_by`),
  KEY `blogs_updated_by_foreign` (`updated_by`),
  CONSTRAINT `blogs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `blogs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogslides`
--

DROP TABLE IF EXISTS `blogslides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogslides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blogslides_blog_id_foreign` (`blog_id`),
  CONSTRAINT `blogslides_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogslides`
--

LOCK TABLES `blogslides` WRITE;
/*!40000 ALTER TABLE `blogslides` DISABLE KEYS */;
/*!40000 ALTER TABLE `blogslides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Necklace','necklace','',0,NULL,NULL),(2,'Earring','earring','',0,NULL,NULL),(3,'Finger Ring','fingerring','',0,NULL,NULL),(4,'Nose Pin','nosepin','',0,NULL,NULL),(5,'Mirror','mirror','',0,NULL,NULL),(6,'Purse','purse','',0,NULL,NULL),(7,'Jewelry Box','jewelrybox','',0,NULL,NULL),(8,'Sharee','sharee','',0,NULL,NULL),(9,'Others','others','',0,NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `circulars`
--

DROP TABLE IF EXISTS `circulars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `circulars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `circular_detail` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `circulars`
--

LOCK TABLES `circulars` WRITE;
/*!40000 ALTER TABLE `circulars` DISABLE KEYS */;
/*!40000 ALTER TABLE `circulars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `blog_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_reply` tinyint(4) NOT NULL DEFAULT '0',
  `comment_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_blog_id_foreign` (`blog_id`),
  CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cost_types`
--

DROP TABLE IF EXISTS `cost_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cost_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cost_types`
--

LOCK TABLES `cost_types` WRITE;
/*!40000 ALTER TABLE `cost_types` DISABLE KEYS */;
INSERT INTO `cost_types` VALUES (1,'Fb Marketing',NULL,NULL),(2,'Stationary',NULL,NULL),(3,'Packaging',NULL,NULL);
/*!40000 ALTER TABLE `cost_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `costs`
--

DROP TABLE IF EXISTS `costs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `costs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_type_id` int(10) unsigned NOT NULL,
  `amount` double NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `incurred_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `costs_cost_type_id_foreign` (`cost_type_id`),
  CONSTRAINT `costs_cost_type_id_foreign` FOREIGN KEY (`cost_type_id`) REFERENCES `cost_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costs`
--

LOCK TABLES `costs` WRITE;
/*!40000 ALTER TABLE `costs` DISABLE KEYS */;
/*!40000 ALTER TABLE `costs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=265 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'AF','Afghanistan',NULL,NULL),(2,'AL','Albania',NULL,NULL),(3,'DZ','Algeria',NULL,NULL),(4,'AS','American Samoa',NULL,NULL),(5,'AD','Andorra',NULL,NULL),(6,'AO','Angola',NULL,NULL),(7,'AI','Anguilla',NULL,NULL),(8,'AQ','Antarctica',NULL,NULL),(9,'AG','Antigua and Barbuda',NULL,NULL),(10,'AR','Argentina',NULL,NULL),(11,'AM','Armenia',NULL,NULL),(12,'AW','Aruba',NULL,NULL),(13,'AU','Australia',NULL,NULL),(14,'AT','Austria',NULL,NULL),(15,'AZ','Azerbaijan',NULL,NULL),(16,'BS','Bahamas',NULL,NULL),(17,'BH','Bahrain',NULL,NULL),(18,'BD','Bangladesh',NULL,NULL),(19,'BB','Barbados',NULL,NULL),(20,'BY','Belarus',NULL,NULL),(21,'BE','Belgium',NULL,NULL),(22,'BZ','Belize',NULL,NULL),(23,'BJ','Benin',NULL,NULL),(24,'BM','Bermuda',NULL,NULL),(25,'BT','Bhutan',NULL,NULL),(26,'BO','Bolivia',NULL,NULL),(27,'BA','Bosnia and Herzegovina',NULL,NULL),(28,'BW','Botswana',NULL,NULL),(29,'BV','Bouvet Island',NULL,NULL),(30,'BR','Brazil',NULL,NULL),(31,'BQ','British Antarctic Territory',NULL,NULL),(32,'IO','British Indian Ocean Territory',NULL,NULL),(33,'VG','British Virgin Islands',NULL,NULL),(34,'BN','Brunei',NULL,NULL),(35,'BG','Bulgaria',NULL,NULL),(36,'BF','Burkina Faso',NULL,NULL),(37,'BI','Burundi',NULL,NULL),(38,'KH','Cambodia',NULL,NULL),(39,'CM','Cameroon',NULL,NULL),(40,'CA','Canada',NULL,NULL),(41,'CT','Canton and Enderbury Islands',NULL,NULL),(42,'CV','Cape Verde',NULL,NULL),(43,'KY','Cayman Islands',NULL,NULL),(44,'CF','Central African Republic',NULL,NULL),(45,'TD','Chad',NULL,NULL),(46,'CL','Chile',NULL,NULL),(47,'CN','China',NULL,NULL),(48,'CX','Christmas Island',NULL,NULL),(49,'CC','Cocos [Keeling] Islands',NULL,NULL),(50,'CO','Colombia',NULL,NULL),(51,'KM','Comoros',NULL,NULL),(52,'CG','Congo - Brazzaville',NULL,NULL),(53,'CD','Congo - Kinshasa',NULL,NULL),(54,'CK','Cook Islands',NULL,NULL),(55,'CR','Costa Rica',NULL,NULL),(56,'HR','Croatia',NULL,NULL),(57,'CU','Cuba',NULL,NULL),(58,'CY','Cyprus',NULL,NULL),(59,'CZ','Czech Republic',NULL,NULL),(60,'CI','Côte d’Ivoire',NULL,NULL),(61,'DK','Denmark',NULL,NULL),(62,'DJ','Djibouti',NULL,NULL),(63,'DM','Dominica',NULL,NULL),(64,'DO','Dominican Republic',NULL,NULL),(65,'NQ','Dronning Maud Land',NULL,NULL),(66,'DD','East Germany',NULL,NULL),(67,'EC','Ecuador',NULL,NULL),(68,'EG','Egypt',NULL,NULL),(69,'SV','El Salvador',NULL,NULL),(70,'GQ','Equatorial Guinea',NULL,NULL),(71,'ER','Eritrea',NULL,NULL),(72,'EE','Estonia',NULL,NULL),(73,'ET','Ethiopia',NULL,NULL),(74,'FK','Falkland Islands',NULL,NULL),(75,'FO','Faroe Islands',NULL,NULL),(76,'FJ','Fiji',NULL,NULL),(77,'FI','Finland',NULL,NULL),(78,'FR','France',NULL,NULL),(79,'GF','French Guiana',NULL,NULL),(80,'PF','French Polynesia',NULL,NULL),(81,'TF','French Southern Territories',NULL,NULL),(82,'FQ','French Southern and Antarctic Territories',NULL,NULL),(83,'GA','Gabon',NULL,NULL),(84,'GM','Gambia',NULL,NULL),(85,'GE','Georgia',NULL,NULL),(86,'DE','Germany',NULL,NULL),(87,'GH','Ghana',NULL,NULL),(88,'GI','Gibraltar',NULL,NULL),(89,'GR','Greece',NULL,NULL),(90,'GL','Greenland',NULL,NULL),(91,'GD','Grenada',NULL,NULL),(92,'GP','Guadeloupe',NULL,NULL),(93,'GU','Guam',NULL,NULL),(94,'GT','Guatemala',NULL,NULL),(95,'GG','Guernsey',NULL,NULL),(96,'GN','Guinea',NULL,NULL),(97,'GW','Guinea-Bissau',NULL,NULL),(98,'GY','Guyana',NULL,NULL),(99,'HT','Haiti',NULL,NULL),(100,'HM','Heard Island and McDonald Islands',NULL,NULL),(101,'HN','Honduras',NULL,NULL),(102,'HK','Hong Kong SAR China',NULL,NULL),(103,'HU','Hungary',NULL,NULL),(104,'IS','Iceland',NULL,NULL),(105,'IN','India',NULL,NULL),(106,'ID','Indonesia',NULL,NULL),(107,'IR','Iran',NULL,NULL),(108,'IQ','Iraq',NULL,NULL),(109,'IE','Ireland',NULL,NULL),(110,'IM','Isle of Man',NULL,NULL),(111,'IL','Israel',NULL,NULL),(112,'IT','Italy',NULL,NULL),(113,'JM','Jamaica',NULL,NULL),(114,'JP','Japan',NULL,NULL),(115,'JE','Jersey',NULL,NULL),(116,'JT','Johnston Island',NULL,NULL),(117,'JO','Jordan',NULL,NULL),(118,'KZ','Kazakhstan',NULL,NULL),(119,'KE','Kenya',NULL,NULL),(120,'KI','Kiribati',NULL,NULL),(121,'KW','Kuwait',NULL,NULL),(122,'KG','Kyrgyzstan',NULL,NULL),(123,'LA','Laos',NULL,NULL),(124,'LV','Latvia',NULL,NULL),(125,'LB','Lebanon',NULL,NULL),(126,'LS','Lesotho',NULL,NULL),(127,'LR','Liberia',NULL,NULL),(128,'LY','Libya',NULL,NULL),(129,'LI','Liechtenstein',NULL,NULL),(130,'LT','Lithuania',NULL,NULL),(131,'LU','Luxembourg',NULL,NULL),(132,'MO','Macau SAR China',NULL,NULL),(133,'MK','Macedonia',NULL,NULL),(134,'MG','Madagascar',NULL,NULL),(135,'MW','Malawi',NULL,NULL),(136,'MY','Malaysia',NULL,NULL),(137,'MV','Maldives',NULL,NULL),(138,'ML','Mali',NULL,NULL),(139,'MT','Malta',NULL,NULL),(140,'MH','Marshall Islands',NULL,NULL),(141,'MQ','Martinique',NULL,NULL),(142,'MR','Mauritania',NULL,NULL),(143,'MU','Mauritius',NULL,NULL),(144,'YT','Mayotte',NULL,NULL),(145,'FX','Metropolitan France',NULL,NULL),(146,'MX','Mexico',NULL,NULL),(147,'FM','Micronesia',NULL,NULL),(148,'MI','Midway Islands',NULL,NULL),(149,'MD','Moldova',NULL,NULL),(150,'MC','Monaco',NULL,NULL),(151,'MN','Mongolia',NULL,NULL),(152,'ME','Montenegro',NULL,NULL),(153,'MS','Montserrat',NULL,NULL),(154,'MA','Morocco',NULL,NULL),(155,'MZ','Mozambique',NULL,NULL),(156,'MM','Myanmar [Burma]',NULL,NULL),(157,'NA','Namibia',NULL,NULL),(158,'NR','Nauru',NULL,NULL),(159,'NP','Nepal',NULL,NULL),(160,'NL','Netherlands',NULL,NULL),(161,'AN','Netherlands Antilles',NULL,NULL),(162,'NT','Neutral Zone',NULL,NULL),(163,'NC','New Caledonia',NULL,NULL),(164,'NZ','New Zealand',NULL,NULL),(165,'NI','Nicaragua',NULL,NULL),(166,'NE','Niger',NULL,NULL),(167,'NG','Nigeria',NULL,NULL),(168,'NU','Niue',NULL,NULL),(169,'NF','Norfolk Island',NULL,NULL),(170,'KP','North Korea',NULL,NULL),(171,'VD','North Vietnam',NULL,NULL),(172,'MP','Northern Mariana Islands',NULL,NULL),(173,'NO','Norway',NULL,NULL),(174,'OM','Oman',NULL,NULL),(175,'PC','Pacific Islands Trust Territory',NULL,NULL),(176,'PK','Pakistan',NULL,NULL),(177,'PW','Palau',NULL,NULL),(178,'PS','Palestinian Territories',NULL,NULL),(179,'PA','Panama',NULL,NULL),(180,'PZ','Panama Canal Zone',NULL,NULL),(181,'PG','Papua New Guinea',NULL,NULL),(182,'PY','Paraguay',NULL,NULL),(183,'YD','People\'s Democratic Republic of Yemen',NULL,NULL),(184,'PE','Peru',NULL,NULL),(185,'PH','Philippines',NULL,NULL),(186,'PN','Pitcairn Islands',NULL,NULL),(187,'PL','Poland',NULL,NULL),(188,'PT','Portugal',NULL,NULL),(189,'PR','Puerto Rico',NULL,NULL),(190,'QA','Qatar',NULL,NULL),(191,'RO','Romania',NULL,NULL),(192,'RU','Russia',NULL,NULL),(193,'RW','Rwanda',NULL,NULL),(194,'RE','Réunion',NULL,NULL),(195,'BL','Saint Barthélemy',NULL,NULL),(196,'SH','Saint Helena',NULL,NULL),(197,'KN','Saint Kitts and Nevis',NULL,NULL),(198,'LC','Saint Lucia',NULL,NULL),(199,'MF','Saint Martin',NULL,NULL),(200,'PM','Saint Pierre and Miquelon',NULL,NULL),(201,'VC','Saint Vincent and the Grenadines',NULL,NULL),(202,'WS','Samoa',NULL,NULL),(203,'SM','San Marino',NULL,NULL),(204,'SA','Saudi Arabia',NULL,NULL),(205,'SN','Senegal',NULL,NULL),(206,'RS','Serbia',NULL,NULL),(207,'CS','Serbia and Montenegro',NULL,NULL),(208,'SC','Seychelles',NULL,NULL),(209,'SL','Sierra Leone',NULL,NULL),(210,'SG','Singapore',NULL,NULL),(211,'SK','Slovakia',NULL,NULL),(212,'SI','Slovenia',NULL,NULL),(213,'SB','Solomon Islands',NULL,NULL),(214,'SO','Somalia',NULL,NULL),(215,'ZA','South Africa',NULL,NULL),(216,'GS','South Georgia and the South Sandwich Islands',NULL,NULL),(217,'KR','South Korea',NULL,NULL),(218,'ES','Spain',NULL,NULL),(219,'LK','Sri Lanka',NULL,NULL),(220,'SD','Sudan',NULL,NULL),(221,'SR','Suriname',NULL,NULL),(222,'SJ','Svalbard and Jan Mayen',NULL,NULL),(223,'SZ','Swaziland',NULL,NULL),(224,'SE','Sweden',NULL,NULL),(225,'CH','Switzerland',NULL,NULL),(226,'SY','Syria',NULL,NULL),(227,'ST','São Tomé and Príncipe',NULL,NULL),(228,'TW','Taiwan',NULL,NULL),(229,'TJ','Tajikistan',NULL,NULL),(230,'TZ','Tanzania',NULL,NULL),(231,'TH','Thailand',NULL,NULL),(232,'TL','Timor-Leste',NULL,NULL),(233,'TG','Togo',NULL,NULL),(234,'TK','Tokelau',NULL,NULL),(235,'TO','Tonga',NULL,NULL),(236,'TT','Trinidad and Tobago',NULL,NULL),(237,'TN','Tunisia',NULL,NULL),(238,'TR','Turkey',NULL,NULL),(239,'TM','Turkmenistan',NULL,NULL),(240,'TC','Turks and Caicos Islands',NULL,NULL),(241,'TV','Tuvalu',NULL,NULL),(242,'UM','U.S. Minor Outlying Islands',NULL,NULL),(243,'PU','U.S. Miscellaneous Pacific Islands',NULL,NULL),(244,'VI','U.S. Virgin Islands',NULL,NULL),(245,'UG','Uganda',NULL,NULL),(246,'UA','Ukraine',NULL,NULL),(247,'SU','Union of Soviet Socialist Republics',NULL,NULL),(248,'AE','United Arab Emirates',NULL,NULL),(249,'GB','United Kingdom',NULL,NULL),(250,'US','United States',NULL,NULL),(251,'ZZ','Unknown or Invalid Region',NULL,NULL),(252,'UY','Uruguay',NULL,NULL),(253,'UZ','Uzbekistan',NULL,NULL),(254,'VU','Vanuatu',NULL,NULL),(255,'VA','Vatican City',NULL,NULL),(256,'VE','Venezuela',NULL,NULL),(257,'VN','Vietnam',NULL,NULL),(258,'WK','Wake Island',NULL,NULL),(259,'WF','Wallis and Futuna',NULL,NULL),(260,'EH','Western Sahara',NULL,NULL),(261,'YE','Yemen',NULL,NULL),(262,'ZM','Zambia',NULL,NULL),(263,'ZW','Zimbabwe',NULL,NULL),(264,'AX','Åland Islands',NULL,NULL);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `couriers`
--

DROP TABLE IF EXISTS `couriers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `couriers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` double NOT NULL DEFAULT '0',
  `cod_percentage` double NOT NULL DEFAULT '0',
  `balance` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `couriers`
--

LOCK TABLES `couriers` WRITE;
/*!40000 ALTER TABLE `couriers` DISABLE KEYS */;
INSERT INTO `couriers` VALUES (1,'Yours-courier',50,1,0,NULL,NULL),(2,'E-courier',60,1,0,NULL,NULL),(3,'Aramex',57,1,0,NULL,NULL),(4,'Pathao',60,1,0,NULL,NULL);
/*!40000 ALTER TABLE `couriers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'BDT',NULL,NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gateways`
--

DROP TABLE IF EXISTS `gateways`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gateways` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gateways`
--

LOCK TABLES `gateways` WRITE;
/*!40000 ALTER TABLE `gateways` DISABLE KEYS */;
INSERT INTO `gateways` VALUES (1,'Cash on delivery','100',1,NULL,NULL),(2,'bKash','10',1,NULL,NULL);
/*!40000 ALTER TABLE `gateways` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_01_10_123910_create_languages_table',1),(2,'2014_01_10_123920_create_pages',1),(3,'2014_01_10_123922_create_currencies_table',1),(4,'2014_01_10_123925_create_socials_table',1),(5,'2014_01_10_123942_create_gateway_table',1),(6,'2014_10_10_000000_create_couriers_table',1),(7,'2014_10_10_000000_create_settings_table',1),(8,'2014_10_11_000000_create_country_table',1),(9,'2014_10_12_000000_create_users_table',1),(10,'2014_10_12_100000_create_password_resets_table',1),(11,'2015_09_13_185559_create_roles',1),(12,'2015_09_13_190343_create_navs',1),(13,'2015_09_13_190353_create_permissions_table',1),(14,'2015_09_13_190363_create_permission_role_table',1),(15,'2015_09_13_190373_create_nav_role_table',1),(16,'2016_04_17_171759_create_blogs_table',1),(17,'2016_04_17_171923_create_blog_slides_table',1),(18,'2016_04_17_172001_create_blog_comments_table',1),(19,'2016_04_17_172504_create_related_blogs_table',1),(20,'2016_12_11_061959_create_cache_table',1),(21,'2017_07_31_200958_create_temp_table',1),(22,'2017_12_10_232246_create_circulars_table',1),(23,'2018_03_14_121106_create_category_table',1),(24,'2018_03_14_121124_create_products_table',1),(25,'2018_03_30_193932_create_orders_table',1),(26,'2018_03_30_193959_create_order_products_table',1),(27,'2018_04_15_193133_create_tests_table',1),(28,'2018_05_17_085609_create_cost_types_table',1),(29,'2018_05_17_085923_create_costs_table',1),(30,'2018_06_04_023943_create_payments_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nav_role`
--

DROP TABLE IF EXISTS `nav_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nav_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nav_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nav_role_nav_id_foreign` (`nav_id`),
  KEY `nav_role_role_id_foreign` (`role_id`),
  CONSTRAINT `nav_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `nav_role_nav_id_foreign` FOREIGN KEY (`nav_id`) REFERENCES `navs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nav_role`
--

LOCK TABLES `nav_role` WRITE;
/*!40000 ALTER TABLE `nav_role` DISABLE KEYS */;
INSERT INTO `nav_role` VALUES (1,1,1,NULL,NULL),(2,2,1,NULL,NULL),(3,3,1,NULL,NULL),(4,4,1,NULL,NULL),(5,5,1,NULL,NULL),(6,6,1,NULL,NULL),(7,7,1,NULL,NULL),(8,8,1,NULL,NULL),(9,9,1,NULL,NULL),(10,10,1,NULL,NULL),(11,11,1,NULL,NULL),(12,12,1,NULL,NULL),(13,13,1,NULL,NULL),(14,14,1,NULL,NULL),(15,15,1,NULL,NULL),(16,16,1,NULL,NULL),(17,17,1,NULL,NULL),(18,18,1,NULL,NULL),(19,19,1,NULL,NULL),(20,20,1,NULL,NULL),(21,21,1,NULL,NULL),(22,22,1,NULL,NULL),(23,23,1,NULL,NULL),(24,24,1,NULL,NULL),(25,25,1,NULL,NULL),(26,26,1,NULL,NULL),(27,27,1,NULL,NULL),(28,28,1,NULL,NULL),(29,29,1,NULL,NULL),(30,11,2,NULL,NULL),(31,12,2,NULL,NULL),(32,13,2,NULL,NULL),(33,14,2,NULL,NULL),(34,15,2,NULL,NULL),(35,16,2,NULL,NULL),(36,17,2,NULL,NULL),(37,28,2,NULL,NULL),(38,29,2,NULL,NULL);
/*!40000 ALTER TABLE `nav_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `navs`
--

DROP TABLE IF EXISTS `navs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `route` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa fa-tags',
  `location` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `navs_parent_id_foreign` (`parent_id`),
  CONSTRAINT `navs_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `navs` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navs`
--

LOCK TABLES `navs` WRITE;
/*!40000 ALTER TABLE `navs` DISABLE KEYS */;
INSERT INTO `navs` VALUES (1,'Users',1,NULL,'','fa fa-tags',1,NULL,NULL),(2,'Role',1,NULL,'','fa fa-tags',1,NULL,NULL),(3,'Navs',1,NULL,'','fa fa-tags',1,NULL,NULL),(4,'Permissions',1,NULL,'','fa fa-tags',1,NULL,NULL),(5,'Currencies',1,NULL,'','fa fa-tags',1,NULL,NULL),(6,'Settings',1,NULL,'','fa fa-tags',1,NULL,NULL),(7,'Pages',1,NULL,'','fa fa-tags',1,NULL,NULL),(8,'Social',1,NULL,'','fa fa-tags',1,NULL,NULL),(9,'Gateways',1,NULL,'','fa fa-tags',1,NULL,NULL),(10,'HRM',1,NULL,'','fa fa-tags',1,NULL,NULL),(11,'Courier',1,NULL,'','fa fa-tags',1,NULL,NULL),(12,'View all users',2,1,'admin/users','fa fa-tags',1,NULL,NULL),(13,'Create new user',2,1,'admin/users/create','fa fa-tags',1,NULL,NULL),(14,'View all roles',2,2,'admin/roles','fa fa-tags',1,NULL,NULL),(15,'Create new role',2,2,'admin/roles/create','fa fa-tags',1,NULL,NULL),(16,'View all navs',2,3,'admin/navs','fa fa-tags',1,NULL,NULL),(17,'Create new nav',2,3,'admin/navs/create','fa fa-tags',1,NULL,NULL),(18,'View all Permissions',2,4,'admin/permissions','fa fa-tags',1,NULL,NULL),(19,'Create new Permission',2,4,'admin/permissions/create','fa fa-tags',1,NULL,NULL),(20,'View all Currencies',2,5,'admin/currencies','fa fa-tags',1,NULL,NULL),(21,'Create new Currency',2,5,'admin/currencies/create','fa fa-tags',1,NULL,NULL),(22,'App settings',2,6,'admin/settings/1','fa fa-tags',1,NULL,NULL),(23,'View all pages',2,7,'admin/pages','fa fa-tags',1,NULL,NULL),(24,'Create new page',2,7,'admin/pages/create','fa fa-tags',1,NULL,NULL),(25,'View all Socials',2,8,'admin/socials','fa fa-tags',1,NULL,NULL),(26,'Create new Social',2,8,'admin/socials/create','fa fa-tags',1,NULL,NULL),(27,'View all gateways',2,9,'admin/gateways','fa fa-tags',1,NULL,NULL),(28,'Create new gateway',2,9,'admin/gateways/create','fa fa-tags',1,NULL,NULL),(29,'Job Circulars',2,10,'admin/circulars','fa fa-tags',1,NULL,NULL),(30,'Courier Settings',2,11,'admin/couriers','fa fa-tags',1,NULL,NULL),(31,'Courier Reports',2,11,'admin/couriers/report','fa fa-tags',1,NULL,NULL);
/*!40000 ALTER TABLE `navs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `purchase_price` int(11) DEFAULT '0',
  `value` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_products_order_id_foreign` (`order_id`),
  KEY `order_products_product_id_foreign` (`product_id`),
  CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_products`
--

LOCK TABLES `order_products` WRITE;
/*!40000 ALTER TABLE `order_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` int(11) NOT NULL DEFAULT '0',
  `charge` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `order_date` timestamp NULL DEFAULT NULL,
  `courier_id` int(10) unsigned DEFAULT NULL,
  `courier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_tracker` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_data` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_charge` double NOT NULL DEFAULT '0',
  `cod` double NOT NULL DEFAULT '0',
  `courier_collectable_amount` double NOT NULL DEFAULT '0',
  `collected_amount` double NOT NULL DEFAULT '0',
  `due_amount` double NOT NULL DEFAULT '0',
  `paid_amount` double NOT NULL DEFAULT '0',
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_balance_before_delivery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `courier_balance_after_delivery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dispatch_date` timestamp NULL DEFAULT NULL,
  `expected_delivery_date` timestamp NULL DEFAULT NULL,
  `actual_delivery_date` timestamp NULL DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'New',
  `note` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_courier_id_foreign` (`courier_id`),
  CONSTRAINT `orders_courier_id_foreign` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tag_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tag_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tag_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'about-us','','','','',NULL,NULL),(2,'privacy-policy','','','','',NULL,NULL),(3,'terms-of-service','','','','',NULL,NULL);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_paid` tinyint(4) NOT NULL,
  `payment_details` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,1,NULL,NULL),(2,2,1,NULL,NULL),(3,3,1,NULL,NULL),(4,4,1,NULL,NULL),(5,5,1,NULL,NULL),(6,6,1,NULL,NULL),(7,7,1,NULL,NULL),(8,8,1,NULL,NULL),(9,9,1,NULL,NULL),(10,10,1,NULL,NULL),(11,11,1,NULL,NULL),(12,12,1,NULL,NULL),(13,13,1,NULL,NULL),(14,14,1,NULL,NULL),(15,15,1,NULL,NULL),(16,16,1,NULL,NULL),(17,17,1,NULL,NULL),(18,18,1,NULL,NULL),(19,19,1,NULL,NULL),(20,20,1,NULL,NULL),(21,21,1,NULL,NULL),(22,22,1,NULL,NULL),(23,23,1,NULL,NULL),(24,24,1,NULL,NULL),(25,25,1,NULL,NULL),(26,26,1,NULL,NULL),(27,27,1,NULL,NULL),(28,28,1,NULL,NULL),(29,29,1,NULL,NULL),(30,30,1,NULL,NULL),(31,31,1,NULL,NULL),(32,32,1,NULL,NULL),(33,33,1,NULL,NULL),(34,34,1,NULL,NULL),(35,35,1,NULL,NULL),(36,36,1,NULL,NULL),(37,37,1,NULL,NULL),(38,38,1,NULL,NULL),(39,39,1,NULL,NULL),(40,40,1,NULL,NULL),(41,41,1,NULL,NULL),(42,42,1,NULL,NULL),(43,43,1,NULL,NULL),(44,44,1,NULL,NULL),(45,45,1,NULL,NULL),(46,46,1,NULL,NULL),(47,47,1,NULL,NULL),(48,48,1,NULL,NULL),(49,49,1,NULL,NULL),(50,50,1,NULL,NULL),(51,51,1,NULL,NULL),(52,52,1,NULL,NULL),(53,53,1,NULL,NULL),(54,54,1,NULL,NULL),(55,55,1,NULL,NULL),(56,56,1,NULL,NULL),(57,57,1,NULL,NULL),(58,58,1,NULL,NULL),(59,59,1,NULL,NULL),(60,60,1,NULL,NULL),(61,61,1,NULL,NULL),(62,62,1,NULL,NULL),(63,63,1,NULL,NULL),(64,64,1,NULL,NULL),(65,65,1,NULL,NULL),(66,66,1,NULL,NULL),(67,67,1,NULL,NULL),(68,68,1,NULL,NULL),(69,69,1,NULL,NULL),(70,70,1,NULL,NULL),(71,71,1,NULL,NULL),(72,72,1,NULL,NULL),(73,73,1,NULL,NULL),(74,74,1,NULL,NULL),(75,75,1,NULL,NULL),(76,76,1,NULL,NULL),(77,77,1,NULL,NULL),(78,78,1,NULL,NULL),(79,79,1,NULL,NULL),(80,80,1,NULL,NULL),(81,81,1,NULL,NULL),(82,82,1,NULL,NULL),(83,83,1,NULL,NULL),(84,84,1,NULL,NULL),(85,85,1,NULL,NULL),(86,86,1,NULL,NULL),(87,87,1,NULL,NULL),(88,88,1,NULL,NULL),(89,89,1,NULL,NULL),(90,90,1,NULL,NULL),(91,91,1,NULL,NULL),(92,92,1,NULL,NULL);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'App\\Http\\Controllers\\StaticPageController@home',NULL,NULL),(2,'App\\Http\\Controllers\\StaticPageController@contact',NULL,NULL),(3,'App\\Http\\Controllers\\StaticPageController@postContact',NULL,NULL),(4,'App\\Http\\Controllers\\StaticPageController@page',NULL,NULL),(5,'App\\Http\\Controllers\\AccessController@social',NULL,NULL),(6,'App\\Http\\Controllers\\AccessController@login',NULL,NULL),(7,'App\\Http\\Controllers\\AccessController@postLogin',NULL,NULL),(8,'App\\Http\\Controllers\\AccessController@logout',NULL,NULL),(9,'App\\Http\\Controllers\\AccessController@forgotPassword',NULL,NULL),(10,'App\\Http\\Controllers\\AccessController@postForgotPassword',NULL,NULL),(11,'App\\Http\\Controllers\\AccessController@signup',NULL,NULL),(12,'App\\Http\\Controllers\\AccessController@postSignup',NULL,NULL),(13,'App\\Http\\Controllers\\Dashboard@index',NULL,NULL),(14,'App\\Http\\Controllers\\Roles@permission',NULL,NULL),(15,'App\\Http\\Controllers\\Roles@postPermission',NULL,NULL),(16,'App\\Http\\Controllers\\Roles@index',NULL,NULL),(17,'App\\Http\\Controllers\\Roles@create',NULL,NULL),(18,'App\\Http\\Controllers\\Roles@store',NULL,NULL),(19,'App\\Http\\Controllers\\Roles@show',NULL,NULL),(20,'App\\Http\\Controllers\\Roles@edit',NULL,NULL),(21,'App\\Http\\Controllers\\Roles@update',NULL,NULL),(22,'App\\Http\\Controllers\\Roles@destroy',NULL,NULL),(23,'App\\Http\\Controllers\\Navs@index',NULL,NULL),(24,'App\\Http\\Controllers\\Navs@create',NULL,NULL),(25,'App\\Http\\Controllers\\Navs@store',NULL,NULL),(26,'App\\Http\\Controllers\\Navs@update',NULL,NULL),(27,'App\\Http\\Controllers\\Socials@searchIndex',NULL,NULL),(28,'App\\Http\\Controllers\\Socials@index',NULL,NULL),(29,'App\\Http\\Controllers\\Socials@create',NULL,NULL),(30,'App\\Http\\Controllers\\Socials@store',NULL,NULL),(31,'App\\Http\\Controllers\\Socials@show',NULL,NULL),(32,'App\\Http\\Controllers\\Socials@edit',NULL,NULL),(33,'App\\Http\\Controllers\\Socials@update',NULL,NULL),(34,'App\\Http\\Controllers\\Socials@destroy',NULL,NULL),(35,'App\\Http\\Controllers\\Users@index',NULL,NULL),(36,'App\\Http\\Controllers\\Users@create',NULL,NULL),(37,'App\\Http\\Controllers\\Users@store',NULL,NULL),(38,'App\\Http\\Controllers\\Users@show',NULL,NULL),(39,'App\\Http\\Controllers\\Users@edit',NULL,NULL),(40,'App\\Http\\Controllers\\Users@update',NULL,NULL),(41,'App\\Http\\Controllers\\Users@destroy',NULL,NULL),(42,'App\\Http\\Controllers\\AccessController@changePassword',NULL,NULL),(43,'App\\Http\\Controllers\\AccessController@postChangePassword',NULL,NULL),(44,'App\\Http\\Controllers\\Settings@show',NULL,NULL),(45,'App\\Http\\Controllers\\Settings@edit',NULL,NULL),(46,'App\\Http\\Controllers\\Settings@update',NULL,NULL),(47,'App\\Http\\Controllers\\Pages@searchIndex',NULL,NULL),(48,'App\\Http\\Controllers\\Pages@index',NULL,NULL),(49,'App\\Http\\Controllers\\Pages@create',NULL,NULL),(50,'App\\Http\\Controllers\\Pages@store',NULL,NULL),(51,'App\\Http\\Controllers\\Pages@show',NULL,NULL),(52,'App\\Http\\Controllers\\Pages@edit',NULL,NULL),(53,'App\\Http\\Controllers\\Pages@update',NULL,NULL),(54,'App\\Http\\Controllers\\Pages@destroy',NULL,NULL),(55,'App\\Http\\Controllers\\Currencies@searchIndex',NULL,NULL),(56,'App\\Http\\Controllers\\Currencies@index',NULL,NULL),(57,'App\\Http\\Controllers\\Currencies@create',NULL,NULL),(58,'App\\Http\\Controllers\\Currencies@store',NULL,NULL),(59,'App\\Http\\Controllers\\Currencies@show',NULL,NULL),(60,'App\\Http\\Controllers\\Currencies@edit',NULL,NULL),(61,'App\\Http\\Controllers\\Currencies@update',NULL,NULL),(62,'App\\Http\\Controllers\\Currencies@destroy',NULL,NULL),(63,'App\\Http\\Controllers\\Gateways@searchIndex',NULL,NULL),(64,'App\\Http\\Controllers\\Gateways@index',NULL,NULL),(65,'App\\Http\\Controllers\\Gateways@create',NULL,NULL),(66,'App\\Http\\Controllers\\Gateways@store',NULL,NULL),(67,'App\\Http\\Controllers\\Gateways@show',NULL,NULL),(68,'App\\Http\\Controllers\\Gateways@edit',NULL,NULL),(69,'App\\Http\\Controllers\\Gateways@update',NULL,NULL),(70,'App\\Http\\Controllers\\Gateways@destroy',NULL,NULL),(71,'App\\Http\\Controllers\\Shippings@searchIndex',NULL,NULL),(72,'App\\Http\\Controllers\\Shippings@index',NULL,NULL),(73,'App\\Http\\Controllers\\Shippings@create',NULL,NULL),(74,'App\\Http\\Controllers\\Shippings@store',NULL,NULL),(75,'App\\Http\\Controllers\\Shippings@show',NULL,NULL),(76,'App\\Http\\Controllers\\Shippings@edit',NULL,NULL),(77,'App\\Http\\Controllers\\Shippings@update',NULL,NULL),(78,'App\\Http\\Controllers\\Shippings@destroy',NULL,NULL),(79,'App\\Http\\Controllers\\MyProfile@show',NULL,NULL),(80,'App\\Http\\Controllers\\MyProfile@update',NULL,NULL),(81,'App\\Http\\Controllers\\MyProfile@edit',NULL,NULL),(82,'App\\Http\\Controllers\\MyProfile@changePassword',NULL,NULL),(83,'App\\Http\\Controllers\\MyProfile@updatePassword',NULL,NULL),(84,'App\\Http\\Controllers\\Permissions@searchIndex',NULL,NULL),(85,'App\\Http\\Controllers\\Permissions@autoUpdate',NULL,NULL),(86,'App\\Http\\Controllers\\Permissions@index',NULL,NULL),(87,'App\\Http\\Controllers\\Permissions@create',NULL,NULL),(88,'App\\Http\\Controllers\\Permissions@store',NULL,NULL),(89,'App\\Http\\Controllers\\Permissions@show',NULL,NULL),(90,'App\\Http\\Controllers\\Permissions@edit',NULL,NULL),(91,'App\\Http\\Controllers\\Permissions@update',NULL,NULL),(92,'App\\Http\\Controllers\\Permissions@destroy',NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `thumb_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all_images` mediumtext COLLATE utf8mb4_unicode_ci,
  `product_detail` mediumtext COLLATE utf8mb4_unicode_ci,
  `price` int(11) DEFAULT '0',
  `purchase_price` int(11) DEFAULT '0',
  `display_order` tinyint(4) DEFAULT '0',
  `is_published` tinyint(4) NOT NULL,
  `stock_quantity` tinyint(4) DEFAULT '0',
  `note` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'N1',1,'',NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),(2,'N2',1,'',NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),(3,'N3',1,'',NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),(4,'N4',1,'',NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),(5,'N5',2,'',NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),(6,'N6',2,'',NULL,NULL,0,0,0,0,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relatedblogs`
--

DROP TABLE IF EXISTS `relatedblogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relatedblogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) unsigned NOT NULL,
  `related_blog_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relatedblogs_blog_id_foreign` (`blog_id`),
  KEY `relatedblogs_related_blog_id_foreign` (`related_blog_id`),
  CONSTRAINT `relatedblogs_related_blog_id_foreign` FOREIGN KEY (`related_blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `relatedblogs_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relatedblogs`
--

LOCK TABLES `relatedblogs` WRITE;
/*!40000 ALTER TABLE `relatedblogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `relatedblogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'dev',NULL,NULL),(2,'admin',NULL,NULL),(3,'client',NULL,NULL),(4,'vendor',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `application_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_slogan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owners_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `helpline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `helpmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_plus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_controlled_access` tinyint(4) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'Caramel.com.bd','Exclusive collection of woman accessories','detail','POKA LTD','H-36, R-9/A, Dhanmondi','Dhaka','Bangladesh','1217','01704262500','01704262500','info@caramel.com.bd','info@caramel.com.bd','/public/img/settings/logo.png','/public/img/settings/favicon.png','http://plus.google.com','http://facebook.com','http://twitter.com',2,NULL,NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socials`
--

DROP TABLE IF EXISTS `socials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `socials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socials`
--

LOCK TABLES `socials` WRITE;
/*!40000 ALTER TABLE `socials` DISABLE KEYS */;
INSERT INTO `socials` VALUES (1,'internal',NULL,NULL),(2,'github',NULL,NULL),(3,'facebook',NULL,NULL),(4,'google',NULL,NULL),(5,'twitter',NULL,NULL);
/*!40000 ALTER TABLE `socials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temps`
--

DROP TABLE IF EXISTS `temps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `is_active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_files` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb_images` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `more_detail` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `stat_details` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `published_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reviewed_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `temps_role_id_foreign` (`role_id`),
  KEY `temps_created_by_foreign` (`created_by`),
  KEY `temps_updated_by_foreign` (`updated_by`),
  CONSTRAINT `temps_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `temps_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `temps_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temps`
--

LOCK TABLES `temps` WRITE;
/*!40000 ALTER TABLE `temps` DISABLE KEYS */;
/*!40000 ALTER TABLE `temps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(4) NOT NULL,
  `is_valid` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `parmanent_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `referrer_id` int(10) unsigned DEFAULT NULL,
  `referral_balance` int(10) unsigned NOT NULL DEFAULT '0',
  `referral_benefit_expiry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `social_id` int(10) unsigned DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_country_id_foreign` (`country_id`),
  KEY `users_referrer_id_foreign` (`referrer_id`),
  KEY `users_social_id_foreign` (`social_id`),
  CONSTRAINT `users_social_id_foreign` FOREIGN KEY (`social_id`) REFERENCES `socials` (`id`) ON DELETE SET NULL,
  CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  CONSTRAINT `users_referrer_id_foreign` FOREIGN KEY (`referrer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ashique','ashique19@gmail.com','$2y$10$Rn/7Op./OTZKIzyYBFpDLedLAicMhrhmsVSq8aGYWEW/sfR8ypqvG',1,'md ashiqul','islam','Md Ashiqul Islam','01710123456','Banasree','','Dhaka','Dhaka','1219',10,'Brahmanbaria',1,NULL,0,'2018-11-29 07:34:12','\\public\\img\\users\\1.png',100.52,'2019-11-29 07:34:12',1,0,0,NULL,NULL,NULL),(2,'ashique','ashique19@hotmail.com','$2y$10$NE1Y49LQzQHoqCn9AE8iAelEgbPp3MwroELVWu5gVbA3RnRwDu9ye',1,'md ashiqul','islam','Md Ashiqul Islam','01710123456','Banasree','','Dhaka','Dhaka','1219',10,'Brahmanbaria',1,NULL,0,'2018-11-29 07:34:12','\\public\\img\\users\\1.png',100.52,'2019-11-29 07:34:12',1,0,0,NULL,NULL,NULL),(3,'admin','admin@system.com','$2y$10$oIVchM.Ub49k8LDhbX23fOKaMU.bqSk22nB2bRwwI7RuYC3yRKJ1C',2,'the admin','of system','The admin of system','01710123457','Mirpur 10','','Dhaka','Dhaka','1219',11,'Bangladesh',1,NULL,0,'2018-11-29 07:34:12','\\public\\img\\users\\1.png',0.00,NULL,1,0,0,NULL,NULL,NULL),(4,'moderator','moderator@system.com','$2y$10$REoNAljSmylTAfpVlJXWSe1A.h2HbhK6iwuvIY5WrqVgsUbcjZ3C2',3,'the moderator','of system','The moderator of system','01710123457','Mirpur 10','','Dhaka','Dhaka','1219',11,'Bangladesh',1,NULL,0,'2018-11-29 07:34:12','\\public\\img\\users\\1.png',0.00,NULL,1,0,0,NULL,NULL,NULL),(5,'client','client@system.com','$2y$10$3wKlSAO.HUKvw7JGnp1W/u0cBr2mgc217Attq2EoD01k08PF9TDW6',4,'the client','of system','The client of system','01710123457','Mirpur 10','','Dhaka','Dhaka','1219',11,'Bangladesh',1,NULL,0,'2018-11-29 07:34:12','\\public\\img\\users\\1.png',0.00,NULL,1,0,0,NULL,NULL,NULL);
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

-- Dump completed on 2018-11-29  7:36:19
