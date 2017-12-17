-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 10.107.144.5    Database: db_tourdreams
-- ------------------------------------------------------
-- Server version	5.6.10-log

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
-- Table structure for table `tbl_administradores`
--

DROP TABLE IF EXISTS `tbl_administradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_administradores` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `id_nivel_usuario` int(11) NOT NULL,
  `nome_administrador` varchar(100) NOT NULL,
  `email_empresa` varchar(150) NOT NULL,
  `cidade_nascimento` varchar(100) NOT NULL,
  `estado_nascimento` varchar(80) NOT NULL,
  `dt_nasc` date NOT NULL,
  `foto` varchar(200) NOT NULL DEFAULT '',
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id_administrador`),
  KEY `id_adms_nivelUsuario_idx` (`id_nivel_usuario`),
  CONSTRAINT `id_adms_nivelUsuario` FOREIGN KEY (`id_nivel_usuario`) REFERENCES `tbl_nivel_usuario` (`id_nivel_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_administradores`
--

LOCK TABLES `tbl_administradores` WRITE;
/*!40000 ALTER TABLE `tbl_administradores` DISABLE KEYS */;
INSERT INTO `tbl_administradores` VALUES (14,1,'João Alves Sampaio','joao123@tourdreams.com.br','Itapevi','São Paulo','1985-07-14','a0ad444a60738f403eb9ef4fc6f8051a.jpg','123456');
/*!40000 ALTER TABLE `tbl_administradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_avaliacoes`
--

DROP TABLE IF EXISTS `tbl_avaliacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_avaliacoes` (
  `id_avaliacoes` int(11) NOT NULL AUTO_INCREMENT,
  `id_milhas` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `media_avaliacoes` float NOT NULL,
  `nota_limpeza` float NOT NULL,
  `nota_restaurante` float NOT NULL,
  `nota_atendimento` float NOT NULL,
  `nota_lazer` float NOT NULL,
  PRIMARY KEY (`id_avaliacoes`),
  KEY `id_avaliacoes_milhas_idx` (`id_milhas`),
  KEY `id_avaliacoes_reserva_idx` (`id_reserva`),
  KEY `id_avaliacoes_cliente_idx` (`id_cliente`),
  CONSTRAINT `id_avaliacoes_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_avaliacoes_milhas` FOREIGN KEY (`id_milhas`) REFERENCES `tbl_milhas` (`id_milhas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_avaliacoes_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `tbl_reserva` (`id_reserva`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_avaliacoes`
--

LOCK TABLES `tbl_avaliacoes` WRITE;
/*!40000 ALTER TABLE `tbl_avaliacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_avaliacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_blog`
--

DROP TABLE IF EXISTS `tbl_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_blog` (
  `id_conheca_destino` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `foto_blog` varchar(200) NOT NULL,
  `descricao_blog` text NOT NULL,
  `data_publicacao` date NOT NULL,
  PRIMARY KEY (`id_conheca_destino`),
  KEY `id_conhecaDestino_cliente_idx` (`id_cliente`),
  KEY `id_conhecaDestino_reserva_idx` (`id_reserva`),
  CONSTRAINT `id_blog_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_reserva_blog` FOREIGN KEY (`id_reserva`) REFERENCES `tbl_reserva` (`id_reserva`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_blog`
--

LOCK TABLES `tbl_blog` WRITE;
/*!40000 ALTER TABLE `tbl_blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_brindes`
--

DROP TABLE IF EXISTS `tbl_brindes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_brindes` (
  `id_brinde` int(11) NOT NULL AUTO_INCREMENT,
  `nome_brinde` varchar(200) NOT NULL,
  `foto_brinde` varchar(200) NOT NULL,
  PRIMARY KEY (`id_brinde`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_brindes`
--

LOCK TABLES `tbl_brindes` WRITE;
/*!40000 ALTER TABLE `tbl_brindes` DISABLE KEYS */;
INSERT INTO `tbl_brindes` VALUES (3,'Chaveiro TourDreams','e35523c82d0109a6c7e67cbf1d2d140c.png');
/*!40000 ALTER TABLE `tbl_brindes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_caracteristicas`
--

DROP TABLE IF EXISTS `tbl_caracteristicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_caracteristicas` (
  `id_caracteristicas` int(11) NOT NULL AUTO_INCREMENT,
  `nome_caracteristica` varchar(45) NOT NULL,
  `foto_caracteristica` varchar(200) NOT NULL,
  `foto_mobile` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_caracteristicas`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_caracteristicas`
--

LOCK TABLES `tbl_caracteristicas` WRITE;
/*!40000 ALTER TABLE `tbl_caracteristicas` DISABLE KEYS */;
INSERT INTO `tbl_caracteristicas` VALUES (1,'Wi-Fi','fa-wifi fa-2x','ic_wifi_black_24dp.png'),(2,'Spa','fa-bath fa-2x','ic_spa_black_24dp.png'),(3,'Restaurante','fa-cutlery fa-2x','ic_restaurant_black_24dp.png'),(4,'Piscina','fa-tint fa-2x','ic_pool_black_24dp.png'),(5,'Jardim','fa-leaf fa-2x','ic_nature_black_24dp.png'),(6,'Mini Shopping','fa-shopping-bag fa-2x','ic_store_black_24dp.png'),(7,'Salão de Jogos','fa-gamepad fa-2x','ic_games_black_24dp.png'),(8,'Garagem','fa-car fa-2x','ic_directions_car_black_24dp.png'),(9,'Quadra',' fa-futbol-o fa-2x','ic_brightness_1_black_24dp.png'),(10,'Bicicletário','fa-bicycle fa-2x','ic_directions_bike_black_24dp.png'),(12,'Cadeirantes','fa-wheelchai fa-2x','ic_accessible_black_24dp.png'),(13,'Fraldário','fa-child fa-2x','ic_child_care_black_24dp.png'),(15,'Pets','fa-paw fa-2x','ic_pets_black_24dp.png'),(16,'Academia','fa-balance-scale fa-2x','ic_fitness_center_black_24dp.png');
/*!40000 ALTER TABLE `tbl_caracteristicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_caracteristicas_produto`
--

DROP TABLE IF EXISTS `tbl_caracteristicas_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_caracteristicas_produto` (
  `id_produto` int(11) NOT NULL,
  `id_caracteristicas` int(11) NOT NULL,
  KEY `id_caracteristicas_produto_idx` (`id_caracteristicas`),
  KEY `id_produto_caracteristicas_idx` (`id_produto`),
  CONSTRAINT `id_caracteristicas_produto` FOREIGN KEY (`id_caracteristicas`) REFERENCES `tbl_caracteristicas` (`id_caracteristicas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_produto_caracteristicas` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_caracteristicas_produto`
--

LOCK TABLES `tbl_caracteristicas_produto` WRITE;
/*!40000 ALTER TABLE `tbl_caracteristicas_produto` DISABLE KEYS */;
INSERT INTO `tbl_caracteristicas_produto` VALUES (66,8),(66,4),(66,3),(66,1),(67,10),(67,15),(67,9);
/*!40000 ALTER TABLE `tbl_caracteristicas_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_caracteristicas_quarto`
--

DROP TABLE IF EXISTS `tbl_caracteristicas_quarto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_caracteristicas_quarto` (
  `id_quarto_caracteristicas` int(11) NOT NULL AUTO_INCREMENT,
  `caracteristica_quarto` varchar(100) NOT NULL,
  `foto_caracteristica_quarto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_quarto_caracteristicas`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_caracteristicas_quarto`
--

LOCK TABLES `tbl_caracteristicas_quarto` WRITE;
/*!40000 ALTER TABLE `tbl_caracteristicas_quarto` DISABLE KEYS */;
INSERT INTO `tbl_caracteristicas_quarto` VALUES (37,'Internet Wi-Fi','fa fa-wifi'),(38,'Banheiro','fa fa-shower'),(39,'Banheira','fa fa-bath'),(40,'Cofre','fa fa-lock'),(41,'2 camas','fa fa-bed'),(42,'3 camas','fa fa-bed'),(43,'4 camas','fa fa-bed'),(44,'5 camas','fa fa-bed'),(45,'Aparelho TV','fa fa-television'),(46,'Ar-Condicionado',''),(47,'Frigobar',''),(48,'Sofá-cama',''),(49,'Varanda / Sacada',''),(50,'Ventilador',''),(51,'Amenidade de banho',''),(52,'Isolamento de som','fa fa-volume-off'),(53,'Secador de cabelo',''),(54,'Serviço de despertador','fa fa-bell-o'),(55,'Closet',''),(56,'Aquecedor','fa fa-thermometer-three-quarters'),(57,'Cozinha','fa fa-coffee'),(58,'1 Cama','fa fa-bed'),(59,'DVD',''),(60,'Telefone','fa fa-phone'),(61,'Kit Médico','fa fa-medkit');
/*!40000 ALTER TABLE `tbl_caracteristicas_quarto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_caracteristicas_quarto_produto`
--

DROP TABLE IF EXISTS `tbl_caracteristicas_quarto_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_caracteristicas_quarto_produto` (
  `id_quarto` int(11) NOT NULL,
  `id_quarto_caracteristicas` int(11) NOT NULL,
  KEY `id_quarto_idx` (`id_quarto`),
  KEY `id_quarto_caracteristica_idx` (`id_quarto_caracteristicas`),
  CONSTRAINT `id_quarto` FOREIGN KEY (`id_quarto`) REFERENCES `tbl_quartos` (`id_quarto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_quarto_caracteristica` FOREIGN KEY (`id_quarto_caracteristicas`) REFERENCES `tbl_caracteristicas_quarto` (`id_quarto_caracteristicas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_caracteristicas_quarto_produto`
--

LOCK TABLES `tbl_caracteristicas_quarto_produto` WRITE;
/*!40000 ALTER TABLE `tbl_caracteristicas_quarto_produto` DISABLE KEYS */;
INSERT INTO `tbl_caracteristicas_quarto_produto` VALUES (4,41),(4,45),(4,39),(4,38),(4,59),(4,37),(4,49),(8,58),(8,39),(8,38),(8,40);
/*!40000 ALTER TABLE `tbl_caracteristicas_quarto_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cep`
--

DROP TABLE IF EXISTS `tbl_cep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cep` (
  `id_cep` int(11) NOT NULL AUTO_INCREMENT,
  `numero_cep` varchar(45) NOT NULL,
  `logradouro` varchar(150) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(4) NOT NULL,
  PRIMARY KEY (`id_cep`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cep`
--

LOCK TABLES `tbl_cep` WRITE;
/*!40000 ALTER TABLE `tbl_cep` DISABLE KEYS */;
INSERT INTO `tbl_cep` VALUES (68,'06402-050','Rua Claro de Camargo Sobrinho',205,'','Vila Pouso Alegre','Barueri','SP'),(69,'06665-080','Vargem grande',666,'','Cohab II','Vargem Grande Paulista','SP');
/*!40000 ALTER TABLE `tbl_cep` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cliente`
--

DROP TABLE IF EXISTS `tbl_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `milhas` int(11) DEFAULT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `rg_cliente` varchar(45) NOT NULL,
  `cpf_cliente` varchar(45) NOT NULL,
  `email_cliente` varchar(120) NOT NULL,
  `senha_cliente` varchar(45) NOT NULL,
  `celular_cliente` varchar(20) NOT NULL,
  `foto_cliente` varchar(200) DEFAULT NULL,
  `dt_nasc` date NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `cpf_cliente_UNIQUE` (`cpf_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cliente`
--

LOCK TABLES `tbl_cliente` WRITE;
/*!40000 ALTER TABLE `tbl_cliente` DISABLE KEYS */;
INSERT INTO `tbl_cliente` VALUES (1,500,'Jailson Mendes','39.779.185-9','46595346850','jailson@tourdreams.com','123456','(11) 97137-8841','jailson.jpg','2000-08-08');
/*!40000 ALTER TABLE `tbl_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_comentario`
--

DROP TABLE IF EXISTS `tbl_comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_milhas` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_comentario_milhas_idx` (`id_milhas`),
  KEY `id_comentario_reserva_idx` (`id_reserva`),
  KEY `id_comentario_cliente_idx` (`id_cliente`),
  CONSTRAINT `id_comentario_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_comentario_milhas` FOREIGN KEY (`id_milhas`) REFERENCES `tbl_milhas` (`id_milhas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_comentario_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `tbl_reserva` (`id_reserva`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_comentario`
--

LOCK TABLES `tbl_comentario` WRITE;
/*!40000 ALTER TABLE `tbl_comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estilo_produto`
--

DROP TABLE IF EXISTS `tbl_estilo_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estilo_produto` (
  `id_estilo_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_estilo_produto` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estilo_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estilo_produto`
--

LOCK TABLES `tbl_estilo_produto` WRITE;
/*!40000 ALTER TABLE `tbl_estilo_produto` DISABLE KEYS */;
INSERT INTO `tbl_estilo_produto` VALUES (1,'Hotel'),(2,'Pousada'),(3,'Resort'),(4,'Hostel'),(5,'Lodge');
/*!40000 ALTER TABLE `tbl_estilo_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estilo_viagem`
--

DROP TABLE IF EXISTS `tbl_estilo_viagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estilo_viagem` (
  `id_estilo_viagem` int(11) NOT NULL AUTO_INCREMENT,
  `nome_estilo_viagem` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estilo_viagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estilo_viagem`
--

LOCK TABLES `tbl_estilo_viagem` WRITE;
/*!40000 ALTER TABLE `tbl_estilo_viagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_estilo_viagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fale_conosco`
--

DROP TABLE IF EXISTS `tbl_fale_conosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fale_conosco` (
  `id_fale_conosco` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(130) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `observacao` text NOT NULL,
  PRIMARY KEY (`id_fale_conosco`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fale_conosco`
--

LOCK TABLES `tbl_fale_conosco` WRITE;
/*!40000 ALTER TABLE `tbl_fale_conosco` DISABLE KEYS */;
INSERT INTO `tbl_fale_conosco` VALUES (16,'Carlos Morais Silva','carlos.silva2017@hotmail.com','(11) 97852-3365','Muito Bom, melhor portal de viagens do Brasil!');
/*!40000 ALTER TABLE `tbl_fale_conosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fotos_produtos`
--

DROP TABLE IF EXISTS `tbl_fotos_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fotos_produtos` (
  `id_fotos_destaque` int(11) NOT NULL AUTO_INCREMENT,
  `id_produtos` int(11) NOT NULL,
  `foto_detalhes` varchar(100) NOT NULL,
  PRIMARY KEY (`id_fotos_destaque`),
  KEY `id_fotos_produtos_idx` (`id_fotos_destaque`),
  KEY `id_produtos_fotos_idx` (`id_produtos`),
  CONSTRAINT `id_produtos_fotos` FOREIGN KEY (`id_produtos`) REFERENCES `tbl_produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fotos_produtos`
--

LOCK TABLES `tbl_fotos_produtos` WRITE;
/*!40000 ALTER TABLE `tbl_fotos_produtos` DISABLE KEYS */;
INSERT INTO `tbl_fotos_produtos` VALUES (39,66,'2fcb5a0cc8838f9c01257cc0d17fa1c8.jpg'),(40,66,'property4.jpg'),(41,67,'hotel1.jpg'),(42,67,'hotel2.jpg'),(43,67,'quadra.jpg');
/*!40000 ALTER TABLE `tbl_fotos_produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fotos_quartos`
--

DROP TABLE IF EXISTS `tbl_fotos_quartos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fotos_quartos` (
  `id_quarto` int(11) NOT NULL,
  `foto_quarto` varchar(300) NOT NULL,
  KEY `id_quarto_fotos_idx` (`id_quarto`),
  CONSTRAINT `id_quarto_fotos` FOREIGN KEY (`id_quarto`) REFERENCES `tbl_quartos` (`id_quarto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fotos_quartos`
--

LOCK TABLES `tbl_fotos_quartos` WRITE;
/*!40000 ALTER TABLE `tbl_fotos_quartos` DISABLE KEYS */;
INSERT INTO `tbl_fotos_quartos` VALUES (4,'944ba107961f041c49e6622b6e49d039.jpg'),(4,'property4.jpg'),(8,'arrows.png'),(8,'dsdsds33 - Copy.png');
/*!40000 ALTER TABLE `tbl_fotos_quartos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_funcionarios`
--

DROP TABLE IF EXISTS `tbl_funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_funcionarios` (
  `id_funcionarios` int(11) NOT NULL AUTO_INCREMENT,
  `id_nivel_usuario` int(11) NOT NULL,
  `nome_funcionario` varchar(100) NOT NULL,
  `email_empresa` varchar(150) NOT NULL,
  `cidade_nascimento` varchar(100) NOT NULL,
  `estado_nascimento` varchar(80) NOT NULL,
  `dt_nasc` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id_funcionarios`),
  KEY `id_funcionario_nivelUsuario_idx` (`id_nivel_usuario`),
  CONSTRAINT `id_funcionario_nivelUsuario` FOREIGN KEY (`id_nivel_usuario`) REFERENCES `tbl_nivel_usuario` (`id_nivel_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_funcionarios`
--

LOCK TABLES `tbl_funcionarios` WRITE;
/*!40000 ALTER TABLE `tbl_funcionarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_milhas`
--

DROP TABLE IF EXISTS `tbl_milhas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_milhas` (
  `id_milhas` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_milhas` varchar(70) NOT NULL,
  `qtd_milhas` int(11) NOT NULL,
  PRIMARY KEY (`id_milhas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_milhas`
--

LOCK TABLES `tbl_milhas` WRITE;
/*!40000 ALTER TABLE `tbl_milhas` DISABLE KEYS */;
INSERT INTO `tbl_milhas` VALUES (1,'Reserva',700),(2,'Comentário',485),(3,'Avaliação',567);
/*!40000 ALTER TABLE `tbl_milhas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivel_usuario`
--

DROP TABLE IF EXISTS `tbl_nivel_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nivel_usuario` (
  `id_nivel_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_nivel` varchar(45) NOT NULL,
  PRIMARY KEY (`id_nivel_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel_usuario`
--

LOCK TABLES `tbl_nivel_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_nivel_usuario` DISABLE KEYS */;
INSERT INTO `tbl_nivel_usuario` VALUES (1,'Administrador'),(2,'Marketing');
/*!40000 ALTER TABLE `tbl_nivel_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_parceiros`
--

DROP TABLE IF EXISTS `tbl_parceiros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_parceiros` (
  `id_parceiro` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(100) NOT NULL,
  `nome_fantasia` varchar(100) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nome_gerente` varchar(150) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `milhas_parceiro` int(11) DEFAULT NULL,
  `logo_parceiro` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_parceiro`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_parceiros`
--

LOCK TABLES `tbl_parceiros` WRITE;
/*!40000 ALTER TABLE `tbl_parceiros` DISABLE KEYS */;
INSERT INTO `tbl_parceiros` VALUES (6,'Hotel Maneiro','Maneiro Hotels','12345678','12345678','Carlos Alves Sampaio','(11) 98885-2666','(11) 3333-3333','carlos.2017@maneiro.com.br',NULL,'6cc468a43f9a7e74fd8930d2af0e1c02.png'),(7,'tcc EMpresa','TCC','1234567','1234567','Vinicius','(11) 96522-6622','(11) 3565-6566','vini.@hotmail.com',NULL,'59a05c1a767f6b000fd361bb.jpg');
/*!40000 ALTER TABLE `tbl_parceiros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_planejamento`
--

DROP TABLE IF EXISTS `tbl_planejamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_planejamento` (
  `id_planejamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `nome_planejamento` varchar(100) NOT NULL,
  `ponto_turistico` text NOT NULL,
  `dia_planejamento` datetime NOT NULL,
  PRIMARY KEY (`id_planejamento`),
  KEY `id_planejamento_cliente_idx` (`id_cliente`),
  KEY `id_planejamento_reserva_idx` (`id_reserva`),
  CONSTRAINT `id_planejamento_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_planejamento_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `tbl_reserva` (`id_reserva`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_planejamento`
--

LOCK TABLES `tbl_planejamento` WRITE;
/*!40000 ALTER TABLE `tbl_planejamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_planejamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto`
--

DROP TABLE IF EXISTS `tbl_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_status` int(11) NOT NULL,
  `id_tipo_viagem` int(11) NOT NULL,
  `id_estilo_produto` int(11) NOT NULL,
  `id_milhas` int(11) DEFAULT NULL,
  `id_parceiro` int(11) NOT NULL,
  `id_cep` int(11) NOT NULL,
  `foto_principal_site` varchar(100) NOT NULL,
  `descricao_produto` text NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_produto_status_idx` (`id_status`),
  KEY `id_produto_tipoViagem_idx` (`id_tipo_viagem`),
  KEY `id_produto_estiloViagem_idx` (`id_estilo_produto`),
  KEY `id_produto_milhas_idx` (`id_milhas`),
  KEY `id_produto_parceiro_idx` (`id_parceiro`),
  KEY `id_produto_local_idx` (`id_cep`),
  CONSTRAINT `id_produto_cep` FOREIGN KEY (`id_cep`) REFERENCES `tbl_cep` (`id_cep`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_produto_estiloProduto` FOREIGN KEY (`id_estilo_produto`) REFERENCES `tbl_estilo_produto` (`id_estilo_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_produto_milhas` FOREIGN KEY (`id_milhas`) REFERENCES `tbl_milhas` (`id_milhas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_produto_parceiro` FOREIGN KEY (`id_parceiro`) REFERENCES `tbl_parceiros` (`id_parceiro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_produto_status` FOREIGN KEY (`id_status`) REFERENCES `tbl_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_produto_tipoViagem` FOREIGN KEY (`id_tipo_viagem`) REFERENCES `tbl_tipo_viagem` (`id_tipo_viagem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto`
--

LOCK TABLES `tbl_produto` WRITE;
/*!40000 ALTER TABLE `tbl_produto` DISABLE KEYS */;
INSERT INTO `tbl_produto` VALUES (66,2,4,1,1,6,68,'f617e77e7e7c41287f43144099d8242a.jpg','Hotel de Lazer com uma bela vista, as acomodações foram idealizadas e decoradas para proporcionar tranqüilidade e conforto nos momentos de descanso. Fim de Semana - Entrada (check-in) Sexta-Feira a partir das 17h e Saída (check-out) '),(67,2,4,1,1,7,69,'property2.jpg','O Hotel Pousada das Araras está localizado no Bairro das Araras em Petrópolis, a 80 km de Teresópolis e a 44 km do Aeroporto Galeão. A área de lazer conta com piscinas, quadras esportivas, saunas e salão de jogos.');
/*!40000 ALTER TABLE `tbl_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promocoes`
--

DROP TABLE IF EXISTS `tbl_promocoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_promocoes` (
  `id_promocoes` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `id_brinde` int(11) DEFAULT NULL,
  `milhas_necessarias` int(11) NOT NULL,
  PRIMARY KEY (`id_promocoes`),
  KEY `id_promocao_produto_idx` (`id_produto`),
  KEY `id_promocao_brinde_idx` (`id_brinde`),
  CONSTRAINT `id_promocao_brinde` FOREIGN KEY (`id_brinde`) REFERENCES `tbl_brindes` (`id_brinde`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_promocao_produto` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promocoes`
--

LOCK TABLES `tbl_promocoes` WRITE;
/*!40000 ALTER TABLE `tbl_promocoes` DISABLE KEYS */;
INSERT INTO `tbl_promocoes` VALUES (4,66,3,1800);
/*!40000 ALTER TABLE `tbl_promocoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_qtdadultos`
--

DROP TABLE IF EXISTS `tbl_qtdadultos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_qtdadultos` (
  `id_adulto` int(11) NOT NULL AUTO_INCREMENT,
  `qtd_adulto` int(11) NOT NULL,
  PRIMARY KEY (`id_adulto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_qtdadultos`
--

LOCK TABLES `tbl_qtdadultos` WRITE;
/*!40000 ALTER TABLE `tbl_qtdadultos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_qtdadultos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_qtdcriancas`
--

DROP TABLE IF EXISTS `tbl_qtdcriancas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_qtdcriancas` (
  `id_crianca` int(11) NOT NULL AUTO_INCREMENT,
  `qtd_criancas` int(11) NOT NULL,
  PRIMARY KEY (`id_crianca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_qtdcriancas`
--

LOCK TABLES `tbl_qtdcriancas` WRITE;
/*!40000 ALTER TABLE `tbl_qtdcriancas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_qtdcriancas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_qtdquartos`
--

DROP TABLE IF EXISTS `tbl_qtdquartos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_qtdquartos` (
  `id_quarto` int(11) NOT NULL AUTO_INCREMENT,
  `qtd_quarto` int(11) NOT NULL,
  PRIMARY KEY (`id_quarto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_qtdquartos`
--

LOCK TABLES `tbl_qtdquartos` WRITE;
/*!40000 ALTER TABLE `tbl_qtdquartos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_qtdquartos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_quartos`
--

DROP TABLE IF EXISTS `tbl_quartos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_quartos` (
  `id_quarto` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `descricao_quarto` text NOT NULL,
  `preco_diaria` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_quarto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_quartos`
--

LOCK TABLES `tbl_quartos` WRITE;
/*!40000 ALTER TABLE `tbl_quartos` DISABLE KEYS */;
INSERT INTO `tbl_quartos` VALUES (4,66,'Bom!',230.00),(5,66,'Perfeito!',280.00),(6,66,'Bom!',320.00),(7,66,'Bom!',220.00),(8,67,'fdgfgfd',200.00);
/*!40000 ALTER TABLE `tbl_quartos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_reserva`
--

DROP TABLE IF EXISTS `tbl_reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `dt_entrada` date NOT NULL,
  `dt_saida` date NOT NULL,
  `nome_responsavel` varchar(100) NOT NULL,
  `id_quarto` int(11) NOT NULL,
  `id_adulto` int(11) NOT NULL,
  `id_crianca` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_reserva_produto_idx` (`id_produto`),
  KEY `id_cliente_reserva_idx` (`id_cliente`),
  KEY `id_qtd_quarto_idx` (`id_quarto`),
  KEY `id_qtd_reserva_adulto_idx` (`id_adulto`),
  KEY `id_qtd_reserva_crianca_idx` (`id_crianca`),
  CONSTRAINT `id_cliente_reserva` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_qtd_reserva_adulto` FOREIGN KEY (`id_adulto`) REFERENCES `tbl_qtdadultos` (`id_adulto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_qtd_reserva_crianca` FOREIGN KEY (`id_crianca`) REFERENCES `tbl_qtdcriancas` (`id_crianca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_qtd_reserva_quarto` FOREIGN KEY (`id_quarto`) REFERENCES `tbl_qtdquartos` (`id_quarto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_reserva_produto` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_reserva`
--

LOCK TABLES `tbl_reserva` WRITE;
/*!40000 ALTER TABLE `tbl_reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sobre`
--

DROP TABLE IF EXISTS `tbl_sobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sobre` (
  `id_sobre` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `foto_descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id_sobre`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sobre`
--

LOCK TABLES `tbl_sobre` WRITE;
/*!40000 ALTER TABLE `tbl_sobre` DISABLE KEYS */;
INSERT INTO `tbl_sobre` VALUES (15,'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.','9bdbbd8cae97e3c04d0370b5a67bba3e.jpg');
/*!40000 ALTER TABLE `tbl_sobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_status`
--

DROP TABLE IF EXISTS `tbl_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_status`
--

LOCK TABLES `tbl_status` WRITE;
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` VALUES (1,'Pendente'),(2,'Aprovado'),(3,'Recusado');
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_viagem`
--

DROP TABLE IF EXISTS `tbl_tipo_viagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_viagem` (
  `id_tipo_viagem` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo_viagem` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_viagem`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_viagem`
--

LOCK TABLES `tbl_tipo_viagem` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_viagem` DISABLE KEYS */;
INSERT INTO `tbl_tipo_viagem` VALUES (1,'Família'),(2,'Trabalho'),(3,'Casal'),(4,'Todas');
/*!40000 ALTER TABLE `tbl_tipo_viagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_caracteristica`
--

DROP TABLE IF EXISTS `view_caracteristica`;
/*!50001 DROP VIEW IF EXISTS `view_caracteristica`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_caracteristica` AS SELECT 
 1 AS `id_produto`,
 1 AS `nome_caracteristica`,
 1 AS `foto_mobile`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_fotos_produtos`
--

DROP TABLE IF EXISTS `view_fotos_produtos`;
/*!50001 DROP VIEW IF EXISTS `view_fotos_produtos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_fotos_produtos` AS SELECT 
 1 AS `id_produto`,
 1 AS `id_parceiro`,
 1 AS `nome_gerente`,
 1 AS `email`,
 1 AS `nome_fantasia`,
 1 AS `status`,
 1 AS `tipo_viagem`,
 1 AS `estilo_produto`,
 1 AS `qtd_milhas`,
 1 AS `preco_diaria`,
 1 AS `numero_cep`,
 1 AS `logradouro`,
 1 AS `numero`,
 1 AS `complemento`,
 1 AS `bairro`,
 1 AS `cidade`,
 1 AS `uf`,
 1 AS `foto_principal`,
 1 AS `descricao_produto`,
 1 AS `foto_detalhes`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_produto`
--

DROP TABLE IF EXISTS `view_produto`;
/*!50001 DROP VIEW IF EXISTS `view_produto`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_produto` AS SELECT 
 1 AS `id_produto`,
 1 AS `id_parceiro`,
 1 AS `nome_gerente`,
 1 AS `email`,
 1 AS `nome_fantasia`,
 1 AS `status`,
 1 AS `tipo_viagem`,
 1 AS `estilo_produto`,
 1 AS `qtd_milhas`,
 1 AS `preco_diaria`,
 1 AS `numero_cep`,
 1 AS `logradouro`,
 1 AS `numero`,
 1 AS `complemento`,
 1 AS `bairro`,
 1 AS `cidade`,
 1 AS `uf`,
 1 AS `foto_principal`,
 1 AS `descricao_produto`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_promocoes`
--

DROP TABLE IF EXISTS `view_promocoes`;
/*!50001 DROP VIEW IF EXISTS `view_promocoes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_promocoes` AS SELECT 
 1 AS `id_produto`,
 1 AS `nome_fantasia`,
 1 AS `preco_diaria`,
 1 AS `milhas_necessarias`,
 1 AS `qtd_milhas`,
 1 AS `nome_brinde`,
 1 AS `foto_brinde`,
 1 AS `foto_principal`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_caracteristica`
--

/*!50001 DROP VIEW IF EXISTS `view_caracteristica`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_caracteristica` AS select `carac_produto`.`id_produto` AS `id_produto`,`carac`.`nome_caracteristica` AS `nome_caracteristica`,`carac`.`foto_mobile` AS `foto_mobile` from (`tbl_caracteristicas` `carac` join `tbl_caracteristicas_produto` `carac_produto` on((`carac`.`id_caracteristicas` = `carac_produto`.`id_caracteristicas`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_fotos_produtos`
--

/*!50001 DROP VIEW IF EXISTS `view_fotos_produtos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_fotos_produtos` AS select `produto`.`id_produto` AS `id_produto`,`produto`.`id_parceiro` AS `id_parceiro`,`produto`.`nome_gerente` AS `nome_gerente`,`produto`.`email` AS `email`,`produto`.`nome_fantasia` AS `nome_fantasia`,`produto`.`status` AS `status`,`produto`.`tipo_viagem` AS `tipo_viagem`,`produto`.`estilo_produto` AS `estilo_produto`,`produto`.`qtd_milhas` AS `qtd_milhas`,`produto`.`preco_diaria` AS `preco_diaria`,`produto`.`numero_cep` AS `numero_cep`,`produto`.`logradouro` AS `logradouro`,`produto`.`numero` AS `numero`,`produto`.`complemento` AS `complemento`,`produto`.`bairro` AS `bairro`,`produto`.`cidade` AS `cidade`,`produto`.`uf` AS `uf`,`produto`.`foto_principal` AS `foto_principal`,`produto`.`descricao_produto` AS `descricao_produto`,`fotos`.`foto_detalhes` AS `foto_detalhes` from (`view_produto` `produto` join `tbl_fotos_produtos` `fotos` on((`produto`.`id_produto` = `fotos`.`id_produtos`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_produto`
--

/*!50001 DROP VIEW IF EXISTS `view_produto`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_produto` AS select `produto`.`id_produto` AS `id_produto`,`parc`.`id_parceiro` AS `id_parceiro`,`parc`.`nome_gerente` AS `nome_gerente`,`parc`.`email` AS `email`,`parc`.`nome_fantasia` AS `nome_fantasia`,`stat`.`status` AS `status`,`tipo`.`nome_tipo_viagem` AS `tipo_viagem`,`estilo`.`nome_estilo_produto` AS `estilo_produto`,`milhas`.`qtd_milhas` AS `qtd_milhas`,(select distinct (`quarto`.`preco_diaria` + ((`quarto`.`preco_diaria` * 10) / 100)) from `tbl_quartos` `quarto` where (`quarto`.`id_produto` = `produto`.`id_produto`) order by `quarto`.`preco_diaria` limit 1) AS `preco_diaria`,`cep`.`numero_cep` AS `numero_cep`,`cep`.`logradouro` AS `logradouro`,`cep`.`numero` AS `numero`,`cep`.`complemento` AS `complemento`,`cep`.`bairro` AS `bairro`,`cep`.`cidade` AS `cidade`,`cep`.`uf` AS `uf`,`produto`.`foto_principal_site` AS `foto_principal`,`produto`.`descricao_produto` AS `descricao_produto` from ((((((`tbl_parceiros` `parc` join `tbl_produto` `produto` on((`parc`.`id_parceiro` = `produto`.`id_parceiro`))) join `tbl_status` `stat` on((`produto`.`id_status` = `stat`.`id_status`))) join `tbl_tipo_viagem` `tipo` on((`produto`.`id_tipo_viagem` = `tipo`.`id_tipo_viagem`))) join `tbl_estilo_produto` `estilo` on((`produto`.`id_estilo_produto` = `estilo`.`id_estilo_produto`))) join `tbl_milhas` `milhas` on((`produto`.`id_milhas` = `milhas`.`id_milhas`))) join `tbl_cep` `cep` on((`produto`.`id_cep` = `cep`.`id_cep`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_promocoes`
--

/*!50001 DROP VIEW IF EXISTS `view_promocoes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_promocoes` AS select `view`.`id_produto` AS `id_produto`,`view`.`nome_fantasia` AS `nome_fantasia`,`view`.`preco_diaria` AS `preco_diaria`,`promocoes`.`milhas_necessarias` AS `milhas_necessarias`,`view`.`qtd_milhas` AS `qtd_milhas`,`brindes`.`nome_brinde` AS `nome_brinde`,`brindes`.`foto_brinde` AS `foto_brinde`,`view`.`foto_principal` AS `foto_principal` from ((`view_produto` `view` join `tbl_promocoes` `promocoes` on((`promocoes`.`id_produto` = `view`.`id_produto`))) join `tbl_brindes` `brindes` on((`brindes`.`id_brinde` = `promocoes`.`id_brinde`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-16 16:41:06
