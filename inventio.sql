/*
SQLyog Ultimate v11.33 (32 bit)
MySQL - 5.7.26 : Database - inventiolite
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `box` */

DROP TABLE IF EXISTS `box`;

CREATE TABLE `box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `box` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `category` */

insert  into `category`(`id`,`image`,`name`,`description`,`created_at`) values (1,NULL,'RELOJES DZ',NULL,'2019-08-29 18:20:19'),(2,NULL,'RELOJES V8',NULL,'2019-08-29 18:20:26');

/*Table structure for table `configuration` */

DROP TABLE IF EXISTS `configuration`;

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `kind` int(11) DEFAULT NULL,
  `val` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short` (`short`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `configuration` */

insert  into `configuration`(`id`,`short`,`name`,`kind`,`val`) values (1,'title','Titulo del Sistema',2,'Inventio Lite'),(2,'use_image_product','Utilizar Imagenes en los productos',1,'1'),(3,'active_clients','Activar clientes',1,'1'),(4,'active_providers','Activar proveedores',1,'1'),(5,'active_categories','Activar categorias',1,'1'),(6,'active_reports_word','Activar reportes en Word',1,'1'),(7,'active_reports_excel','Activar reportes en Excel',1,'1'),(8,'active_reports_pdf','Activar reportes en PDF',1,'1'),(9,'earn_percent','Porcentaje de Ganancia 1',2,'30');

/*Table structure for table `divisa` */

DROP TABLE IF EXISTS `divisa`;

CREATE TABLE `divisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` double DEFAULT NULL,
  `fuente` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `divisa` */

insert  into `divisa`(`id`,`monto`,`fuente`,`created_at`) values (1,24106.13,'monitordolarvzla.2','2019-08-30 16:59:13'),(2,10000,'dolartoday','2019-08-30 17:11:27');

/*Table structure for table `operation` */

DROP TABLE IF EXISTS `operation`;

CREATE TABLE `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `q` float DEFAULT NULL,
  `operation_type_id` int(11) DEFAULT NULL,
  `sell_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `operation_type_id` (`operation_type_id`),
  KEY `sell_id` (`sell_id`),
  CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `operation_ibfk_2` FOREIGN KEY (`operation_type_id`) REFERENCES `operation_type` (`id`),
  CONSTRAINT `operation_ibfk_3` FOREIGN KEY (`sell_id`) REFERENCES `sell` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `operation` */

insert  into `operation`(`id`,`product_id`,`q`,`operation_type_id`,`sell_id`,`created_at`) values (1,1,10,1,NULL,'2019-08-29 18:22:07'),(2,1,1,2,1,'2019-08-29 18:24:15'),(3,1,7,2,2,'2019-08-31 17:37:22'),(4,1,8,1,3,'2019-08-31 17:54:10'),(5,2,10,1,NULL,'2019-08-31 21:36:07'),(6,3,10,1,NULL,'2019-08-31 21:39:15');

/*Table structure for table `operation_type` */

DROP TABLE IF EXISTS `operation_type`;

CREATE TABLE `operation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `operation_type` */

insert  into `operation_type`(`id`,`name`) values (1,'entrada'),(2,'salida');

/*Table structure for table `person` */

DROP TABLE IF EXISTS `person`;

CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `company` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `phone1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `phone2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `email1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `email2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `kind` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `person` */

insert  into `person`(`id`,`image`,`name`,`lastname`,`company`,`address1`,`address2`,`phone1`,`phone2`,`email1`,`email2`,`kind`,`created_at`) values (1,NULL,'CHINO 1','DHGATE',NULL,'CHINA',NULL,'',NULL,'',NULL,2,'2019-08-29 18:20:41'),(2,NULL,'CHINO 2','DHGATE',NULL,'CHINA',NULL,'',NULL,'',NULL,2,'2019-08-29 18:20:53'),(3,NULL,'ESEQUIEL','PALACIOS',NULL,'CUA',NULL,'04145315679',NULL,'esequielp@gmail.com',NULL,1,'2019-08-29 18:23:49');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `barcode` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `inventary_min` int(11) DEFAULT '10',
  `price_in` float DEFAULT NULL,
  `price_out` float DEFAULT NULL,
  `percentage` int(11) DEFAULT '30',
  `unit` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `presentation` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) DEFAULT '1',
  `is_bsf` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `product_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `product` */

insert  into `product`(`id`,`image`,`barcode`,`name`,`description`,`inventary_min`,`price_in`,`price_out`,`percentage`,`unit`,`presentation`,`user_id`,`category_id`,`created_at`,`is_active`,`is_bsf`) values (1,'Reloj-Inteligente-Smart-Watch-V8-Negro-Dz09-1.jpg','','RELOJ DZ NEGRO','RELOJES DZ09 SMARTWATCH 1',5,10,130000,NULL,'1','',1,1,'2019-08-31 17:22:23',1,0),(2,'Reloj-Inteligente-Smart-Watch-V8-Plateado-Dz09-1.jpg','','RELOJ DZ PLATEADO','RELOJ DZ PLATEADO',5,20,260000,NULL,'1','',1,1,'2019-09-01 14:42:48',1,0),(3,'Reloj-Inteligente-Smart-Watch-dz09-Dorado-V8-2.jpg','','RELOJES DZ DORADO','RELOJ DZ DORADO',5,40,520000,NULL,'1','',1,1,'2019-09-01 14:49:15',1,0);

/*Table structure for table `sell` */

DROP TABLE IF EXISTS `sell`;

CREATE TABLE `sell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `operation_type_id` int(11) DEFAULT '2',
  `box_id` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `cash` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `box_id` (`box_id`),
  KEY `operation_type_id` (`operation_type_id`),
  KEY `user_id` (`user_id`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`box_id`) REFERENCES `box` (`id`),
  CONSTRAINT `sell_ibfk_2` FOREIGN KEY (`operation_type_id`) REFERENCES `operation_type` (`id`),
  CONSTRAINT `sell_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `sell_ibfk_4` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `sell` */

insert  into `sell`(`id`,`person_id`,`user_id`,`operation_type_id`,`box_id`,`total`,`cash`,`discount`,`created_at`) values (1,3,1,2,NULL,15.78,NULL,0,'2019-08-29 18:24:15'),(2,3,1,2,NULL,910000,NULL,0,'2019-08-31 17:37:22'),(3,NULL,1,1,NULL,NULL,NULL,NULL,'2019-08-31 17:54:10');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`lastname`,`username`,`email`,`password`,`image`,`is_active`,`is_admin`,`created_at`) values (1,'Administrador','',NULL,'admin','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad',NULL,1,1,'2019-08-29 18:45:33');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
