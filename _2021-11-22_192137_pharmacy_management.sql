/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ pharmacy_management /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE pharmacy_management;

DROP TABLE IF EXISTS account;
CREATE TABLE `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `amount` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS admin;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `phone_no` bigint NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone_no` (`phone_no`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS invoice;
CREATE TABLE `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `amount` int NOT NULL,
  `payment` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS invoice_has_medicine;
CREATE TABLE `invoice_has_medicine` (
  `med_id` int NOT NULL,
  `invoice_id` int NOT NULL,
  `quantity` int NOT NULL,
  KEY `med_id` (`med_id`),
  KEY `invoice_id` (`invoice_id`),
  CONSTRAINT `invoice_has_medicine_ibfk_1` FOREIGN KEY (`med_id`) REFERENCES `medicine` (`id`),
  CONSTRAINT `invoice_has_medicine_ibfk_2` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS medicine;
CREATE TABLE `medicine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `prescription_required` varchar(1) NOT NULL DEFAULT 'y',
  `company` varchar(1000) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  `role` varchar(700) NOT NULL,
  `other_instruction` varchar(1000) NOT NULL,
  `offer` int NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS medicine_has_stocks;
CREATE TABLE `medicine_has_stocks` (
  `med_id` int NOT NULL,
  `quantity` int NOT NULL,
  KEY `med_id` (`med_id`),
  CONSTRAINT `medicine_has_stocks_ibfk_1` FOREIGN KEY (`med_id`) REFERENCES `medicine` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS seller;
CREATE TABLE `seller` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `license_no` int DEFAULT NULL,
  `gst_no` int DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` bigint DEFAULT NULL,
  `age` int DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `license_no` (`license_no`),
  UNIQUE KEY `gst_no` (`gst_no`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone_no` (`phone_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS seller_update_stocks;
CREATE TABLE `seller_update_stocks` (
  `seller_id` int NOT NULL,
  `batch_no` int NOT NULL,
  `med_id` int NOT NULL,
  KEY `seller_id` (`seller_id`),
  KEY `med_id` (`med_id`),
  CONSTRAINT `seller_update_stocks_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`),
  CONSTRAINT `seller_update_stocks_ibfk_2` FOREIGN KEY (`med_id`) REFERENCES `medicine` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS stocks;
CREATE TABLE `stocks` (
  `id` int NOT NULL,
  `batch_no` int NOT NULL,
  `price` int NOT NULL,
  `no_of_medicine` int NOT NULL,
  `exp_date` date NOT NULL,
  KEY `id` (`id`),
  CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`id`) REFERENCES `medicine` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS user;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `age` int DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` bigint DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone_no` (`phone_no`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS user_has_account;
CREATE TABLE `user_has_account` (
  `user_id` int NOT NULL,
  `transaction_id` int NOT NULL,
  KEY `transaction_id` (`transaction_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_has_account_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `account` (`id`),
  CONSTRAINT `user_has_account_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS user_has_invoice;
CREATE TABLE `user_has_invoice` (
  `invoice_id` int NOT NULL,
  `user_id` int NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `invoice_id` (`invoice_id`),
  CONSTRAINT `user_has_invoice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_has_invoice_ibfk_2` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS user_orders_medicines;
CREATE TABLE `user_orders_medicines` (
  `med_id` int NOT NULL,
  `user_id` int NOT NULL,
  `quantity` int NOT NULL,
  KEY `med_id` (`med_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_orders_medicines_ibfk_1` FOREIGN KEY (`med_id`) REFERENCES `medicine` (`id`),
  CONSTRAINT `user_orders_medicines_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;