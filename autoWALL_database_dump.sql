/*
SQLyog Trial v13.2.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - autowall
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`autowall` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `autowall`;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`user_name`,`password`) values 
(1,'root','admin','admin','5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8');

/*Table structure for table `vehicle_condition` */

DROP TABLE IF EXISTS `vehicle_condition`;

CREATE TABLE `vehicle_condition` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `vehicle_condition` */

insert  into `vehicle_condition`(`id`,`name`) values 
(1,'New'),
(2,'Certified Pre-Owned'),
(3,'Pre-owned');

/*Table structure for table `vehicle_make` */

DROP TABLE IF EXISTS `vehicle_make`;

CREATE TABLE `vehicle_make` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `vehicle_make` */

insert  into `vehicle_make`(`id`,`name`) values 
(1,'Chevrolet'),
(2,'Buick');

/*Table structure for table `vehicle_model` */

DROP TABLE IF EXISTS `vehicle_model`;

CREATE TABLE `vehicle_model` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `vehicle_make_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_vehicle_make` (`vehicle_make_id`),
  CONSTRAINT `foreign_vehicle_make` FOREIGN KEY (`vehicle_make_id`) REFERENCES `vehicle_make` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `vehicle_model` */

insert  into `vehicle_model`(`id`,`name`,`vehicle_make_id`) values 
(1,'Silverado 1500',1),
(2,'Malibu',1),
(3,'Envision',2),
(4,'Equinox',1),
(5,'Spark',1);

/*Table structure for table `vehicles` */

DROP TABLE IF EXISTS `vehicles`;

CREATE TABLE `vehicles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_condition_id` bigint(20) unsigned NOT NULL,
  `vehicle_model_id` bigint(20) unsigned NOT NULL,
  `year` year(4) NOT NULL,
  `mileage` bigint(10) unsigned NOT NULL,
  `price` bigint(20) unsigned NOT NULL,
  `image_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_vehicle_condition` (`vehicle_condition_id`),
  KEY `foreign_vehicle_model` (`vehicle_model_id`),
  CONSTRAINT `foreign_vehicle_condition` FOREIGN KEY (`vehicle_condition_id`) REFERENCES `vehicle_condition` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `foreign_vehicle_model` FOREIGN KEY (`vehicle_model_id`) REFERENCES `vehicle_model` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `vehicles` */

insert  into `vehicles`(`id`,`vehicle_condition_id`,`vehicle_model_id`,`year`,`mileage`,`price`,`image_name`) values 
(1,1,1,2015,157211,76045,'silverado-1500'),
(2,1,2,2023,10,23500,'malibu-2023'),
(7,1,3,2023,3068,37990,'envision-2023'),
(8,1,3,2023,3191,38870,'envision-2023-1'),
(9,3,4,2019,74398,17788,'equinox-2019'),
(10,2,5,2017,74795,11878,'spark-2017');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
