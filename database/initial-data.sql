CREATE DATABASE  IF NOT EXISTS `welove` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `welove`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: welove
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `idAccount` int NOT NULL AUTO_INCREMENT,
  `accountCode` varchar(45) NOT NULL,
  `accountEmail` varchar(45) NOT NULL,
  `accountPassword` varchar(45) NOT NULL,
  `accountRole` int NOT NULL,
  `accountState` tinyint NOT NULL,
  `accountDocumentType` int DEFAULT NULL,
  `accountDni` varchar(45) DEFAULT NULL,
  `accountFirstName` varchar(45) NOT NULL,
  `accountLastName` varchar(45) NOT NULL,
  `accountAddress` varchar(45) DEFAULT NULL,
  `accountPhone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAccount`),
  UNIQUE KEY `accountCode_UNIQUE` (`accountCode`),
  KEY `FK_Account_Role_idx` (`accountRole`),
  KEY `FK_Account_TypeDocument_idx` (`accountDocumentType`),
  CONSTRAINT `FK_Account_Role` FOREIGN KEY (`accountRole`) REFERENCES `role` (`idRole`),
  CONSTRAINT `FK_Account_TypeDocument` FOREIGN KEY (`accountDocumentType`) REFERENCES `documenttype` (`idDocumentType`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'AC92847365921','adri26.ortiz@gmail.com','a3FBaTkrbUxmSWdWZEJiWS9kWmZCUT09',1,1,1,'1030583067','Adriana','Ortiz','Calle 45 # 52-33','3183524738'),(2,'AC54595125932','dianacpm@gmail.com','L3JXVW4raC9XVlFQV1BmK2hWaTA1QT09',3,1,1,'102472056','Diana Carolina','Perez Martinez','Av el Dorado 123','2995956'),(3,'AC80328727513','katsalas@gmail.com','ak4zN0NrdHdrT0szeHZhR0d6eHczZz09',3,1,1,'1030378562','Katherin','Salas Gómez','Calle 72 # 45 -13','317364458'),(5,'AC44232394235','ginam@gmail.com','d2oyek0rNkFRMkpJUzFMaWROM2RmQT09',3,1,1,'10306827559','Gina Paola','Martinez','calle 35 # 16-24','3123542838'),(6,'AC01033272666','anamaria@gmail.com','NzhEaDVHUm9yN0tWdi9KN2hrR0xKUT09',3,1,1,'1012135473','Ana Maria','Salamanca','Av rojas # 56 - 87','321364765'),(8,'AC04272674288','jennap@gmail.com','cmIveXgyOGdyY3JxRmN2dFg3WnZFdz09',3,1,1,'1200325836','Jennifer','Acosta','calle 107 # 45 -12','3183657439'),(9,'AC91378790849','angelita@gmail.com','WDJhNngxS3BDQ1hVR2tPZFZidnRpdz09',3,1,1,'103111297456','Angelica','Jiménez Castro','calle 54 # 54-69','312658874'),(10,'AC48104841548','mariapau@gmail.com','NXI0dVpJS1hpcmdENGIwcW00dlBSUT09',3,1,1,'100010345654','Maria Paula','Rodriguez Casas','av 26 # 65 -23','3127563398'),(11,'AC18896680999','nath@gmail.com','aWlkcUlvbTJHVFpNK1lzNXNTV1NrQT09',3,1,1,'1030785746','Nathalia Carolina','Flores Bejarano','cra 45 # 23-45','3217648765'),(13,'AC913253544110','laus@gmail.com','RkpNK20wOCtmU0VtR0RPa0pyMGpldz09',3,1,1,'10305874637','Laura Cristina','Sanchez Torres','Cra 45 # 76 - 98','3186456734');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `idCategories` int NOT NULL AUTO_INCREMENT,
  `categoriesName` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategories`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Fútbol 11'),(2,'Fútbol 7'),(3,'Fútbol 5');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documenttype`
--

DROP TABLE IF EXISTS `documenttype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documenttype` (
  `idDocumentType` int NOT NULL AUTO_INCREMENT,
  `nameDocumentType` varchar(45) NOT NULL,
  PRIMARY KEY (`idDocumentType`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documenttype`
--

LOCK TABLES `documenttype` WRITE;
/*!40000 ALTER TABLE `documenttype` DISABLE KEYS */;
INSERT INTO `documenttype` VALUES (1,'Cédula de ciudadanía'),(2,'Tarjeta de identidad'),(3,'Cédula de extranjería'),(4,'Pasaporte');
/*!40000 ALTER TABLE `documenttype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipments` (
  `idEquipment` int NOT NULL AUTO_INCREMENT,
  `equipmentDate` varchar(45) NOT NULL,
  `equipmentName` varchar(45) NOT NULL,
  `equipmentCategory` varchar(45) NOT NULL,
  `equipmentPhone` varchar(45) NOT NULL,
  `equipmentAccount` int NOT NULL,
  PRIMARY KEY (`idEquipment`),
  KEY `FK_Equipment_Account_idx` (`equipmentAccount`),
  CONSTRAINT `FK_Equipment_Account` FOREIGN KEY (`equipmentAccount`) REFERENCES `accounts` (`idAccount`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipments`
--

LOCK TABLES `equipments` WRITE;
/*!40000 ALTER TABLE `equipments` DISABLE KEYS */;
INSERT INTO `equipments` VALUES (3,'2021-04-08T12:15:57-05:00','Survivor','3','3123542838',5),(4,'2021-04-08T15:46:12-05:00','Némesis','3','321364765',6),(5,'2021-04-08T15:53:39-05:00','Antártida','1','3183657439',8),(6,'2021-04-08T16:44:38-05:00','Celtic','3','2995956',2),(7,'2021-04-08T16:57:01-05:00','Warriors','3','312658874',9),(8,'2021-04-08T19:39:14-05:00','Las Leonas','3','3127563398',10),(9,'2021-04-08T20:16:43-05:00','Las Birras','3','3217648765',11),(11,'2021-04-08T21:44:26-05:00','Las Divas','3','3186456734',13);
/*!40000 ALTER TABLE `equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `idPayments` int NOT NULL AUTO_INCREMENT,
  `paymentDate` date NOT NULL,
  `paymentProcedure` int NOT NULL,
  `paymentPrice` varchar(45) NOT NULL,
  `paymentObservation` varchar(45) NOT NULL,
  `paymentAccount` int NOT NULL,
  PRIMARY KEY (`idPayments`),
  UNIQUE KEY `idPayments_UNIQUE` (`idPayments`),
  KEY `FK_Payments_Procedure_idx` (`paymentProcedure`),
  KEY `FK_payments_Account_idx` (`paymentAccount`),
  CONSTRAINT `FK_payments_Account` FOREIGN KEY (`paymentAccount`) REFERENCES `accounts` (`idAccount`),
  CONSTRAINT `FK_Payments_Procedure` FOREIGN KEY (`paymentProcedure`) REFERENCES `procedures` (`idProcedures`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,'2021-04-07',1,'50.000','Pago OK',2),(2,'2021-04-08',1,'50.000','Pago ok',5),(3,'2021-04-08',2,'35.000','partido OK',5),(4,'2021-04-08',3,'25.000','cancelado',3),(5,'2021-04-08',2,'35.000','cancelado',13);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedures`
--

DROP TABLE IF EXISTS `procedures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `procedures` (
  `idProcedures` int NOT NULL AUTO_INCREMENT,
  `procedureName` varchar(45) NOT NULL,
  `procedurePrice` varchar(45) NOT NULL,
  PRIMARY KEY (`idProcedures`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedures`
--

LOCK TABLES `procedures` WRITE;
/*!40000 ALTER TABLE `procedures` DISABLE KEYS */;
INSERT INTO `procedures` VALUES (1,'Inscripción','50.000'),(2,'Amistoso','35.000'),(3,'Arbitráje','25.000');
/*!40000 ALTER TABLE `procedures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `idRole` int NOT NULL AUTO_INCREMENT,
  `roleName` varchar(45) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Administrador'),(2,'Instructor'),(3,'Usuario');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-10 10:56:02
