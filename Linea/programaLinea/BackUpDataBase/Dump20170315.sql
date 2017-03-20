-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: practicas
-- ------------------------------------------------------
-- Server version	5.5.27

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
-- Table structure for table `pr_cliente`
--

DROP TABLE IF EXISTS `pr_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pr_cliente` (
  `cl_noCliente` int(11) NOT NULL AUTO_INCREMENT,
  `cl_nombre` varchar(45) NOT NULL,
  `cl_apellidoP` varchar(45) NOT NULL,
  `cl_apellidoM` varchar(45) NOT NULL,
  `cl_rfc` varchar(45) NOT NULL,
  PRIMARY KEY (`cl_noCliente`),
  UNIQUE KEY `cl_noCliente_UNIQUE` (`cl_noCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=10231 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_cliente`
--

LOCK TABLES `pr_cliente` WRITE;
/*!40000 ALTER TABLE `pr_cliente` DISABLE KEYS */;
INSERT INTO `pr_cliente` VALUES (10222,'Felix','Santiago','Rivera','10222fsr'),(10223,'Miguel','Torres','Perez','10223mtp'),(10224,'Tyfani','Rivera','Perez','10224trp'),(10225,'Candy','Salazar','Mendoza','10225csm'),(10226,'Carmen','Itzel','Lugo','10226cil'),(10228,'Eduardo','Andres','Rivera','10228car'),(10229,'Rosa','Itzel','Mendoza','10229rim'),(10230,'Dulce','Maria','Rosario','10230dmr');
/*!40000 ALTER TABLE `pr_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_cotitular`
--

DROP TABLE IF EXISTS `pr_cotitular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pr_cotitular` (
  `co_noTitular` int(11) NOT NULL AUTO_INCREMENT,
  `co_nombreCotitular` varchar(45) NOT NULL,
  `co_apellidoP` varchar(45) NOT NULL,
  `co_apellidoM` varchar(45) NOT NULL,
  `co_rfc` varchar(45) NOT NULL,
  `co_parentesco` varchar(45) NOT NULL,
  `cl_noCliente` int(11) NOT NULL,
  PRIMARY KEY (`co_noTitular`),
  UNIQUE KEY `co_noTitular_UNIQUE` (`co_noTitular`),
  KEY `co_noCliente_idx` (`cl_noCliente`),
  CONSTRAINT `co_noCliente` FOREIGN KEY (`cl_noCliente`) REFERENCES `pr_cliente` (`cl_noCliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_cotitular`
--

LOCK TABLES `pr_cotitular` WRITE;
/*!40000 ALTER TABLE `pr_cotitular` DISABLE KEYS */;
INSERT INTO `pr_cotitular` VALUES (100,'Frida','Estefania','Sanchez','100fes','Primo',10225),(102,'Carina','Castro','Sosa','102ccs','Primo',10223),(103,'Fatima','Catalina','Hernández','103fch','Primo',10222),(104,'Estefany','Hernandez','Guzman','104ehg','Padre',10224),(105,'Dulce','Flores','Gutierrez','105dfd','Padre',10228),(106,'Miriam','Sosa','Torres','106mst','Hermano',10226),(107,'Aldana','Itzel','Lauman','107ail','Hermano',10229);
/*!40000 ALTER TABLE `pr_cotitular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_cuenta`
--

DROP TABLE IF EXISTS `pr_cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pr_cuenta` (
  `cu_noCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `cu_tipoCuenta` varchar(45) NOT NULL,
  `cu_fechaApertura` date NOT NULL,
  `cu_saldoActual` int(11) NOT NULL,
  `cl_noCliente` int(11) NOT NULL,
  `su_noSucursal` int(11) NOT NULL,
  PRIMARY KEY (`cu_noCuenta`),
  UNIQUE KEY `cu_noCuenta_UNIQUE` (`cu_noCuenta`),
  KEY `cl_noCliente_idx` (`cl_noCliente`),
  KEY `su_noSucursal_idx` (`su_noSucursal`),
  CONSTRAINT `cl_noCliente` FOREIGN KEY (`cl_noCliente`) REFERENCES `pr_cliente` (`cl_noCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `su_noSucursal` FOREIGN KEY (`su_noSucursal`) REFERENCES `pr_sucursal` (`su_noSucursal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=132218 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_cuenta`
--

LOCK TABLES `pr_cuenta` WRITE;
/*!40000 ALTER TABLE `pr_cuenta` DISABLE KEYS */;
INSERT INTO `pr_cuenta` VALUES (132210,'Personal','2016-02-13',5000,10225,80801022),(132212,'Personal','2015-02-12',600,10223,80801042),(132213,'Empresarial','2016-01-06',13000,10222,80801022),(132214,'Empresarial','2017-01-23',50000,10229,80801042),(132215,'Personal','2016-12-27',17000,10224,80801315),(132216,'Personal','2016-03-18',1800,10228,80801022),(132217,'Personal','2016-02-09',28000,10226,80801322);
/*!40000 ALTER TABLE `pr_cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_sucursal`
--

DROP TABLE IF EXISTS `pr_sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pr_sucursal` (
  `su_noSucursal` int(11) NOT NULL AUTO_INCREMENT,
  `su_nombreSucursal` varchar(45) DEFAULT NULL,
  `su_direccion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`su_noSucursal`),
  UNIQUE KEY `su_noSucursal_UNIQUE` (`su_noSucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=80801323 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_sucursal`
--

LOCK TABLES `pr_sucursal` WRITE;
/*!40000 ALTER TABLE `pr_sucursal` DISABLE KEYS */;
INSERT INTO `pr_sucursal` VALUES (80801022,'Santander','Madero'),(80801031,'Bancomer','Tampico'),(80801042,'WesterUnion','CDMX'),(80801315,'ScotiaBank','Tampico'),(80801322,'Banamex','CDMX');
/*!40000 ALTER TABLE `pr_sucursal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-15 21:17:29
