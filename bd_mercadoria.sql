/*
SQLyog Community v12.1 (64 bit)
MySQL - 5.6.12-log : Database - bd_mercadoria
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bd_mercadoria` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bd_mercadoria`;

/*Table structure for table `mercadoria` */

DROP TABLE IF EXISTS `mercadoria`;

CREATE TABLE `mercadoria` (
  `cod_merc` int(50) NOT NULL AUTO_INCREMENT,
  `tipo_merc` tinytext NOT NULL,
  `nome` tinytext NOT NULL,
  `quant` int(50) NOT NULL,
  `preco` float NOT NULL,
  `tipo_neg` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_merc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `mercadoria` */

insert  into `mercadoria`(`cod_merc`,`tipo_merc`,`nome`,`quant`,`preco`,`tipo_neg`) values (1,'Tecnologia','Iphone',7,3570,1),(2,'Moeda','Bitcoin',97,650,0),(3,'commodity','Arroz',20,80,1),(4,'commodity','Feijao',35,180,1),(5,'commodity','Caffe',998,550,0),(6,'Moeda','Dollar',17,3.78,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
