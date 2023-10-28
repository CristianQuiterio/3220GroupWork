drop schema if exists SuperStore;
CREATE SCHEMA if not exists SuperStore;

USE SuperStore;

CREATE TABLE `address` (
  `address_id` int(20) NOT NULL AUTO_INCREMENT,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`address_id`)
);

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL auto_increment,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  FOREIGN KEY (`address_id`) REFERENCES `address`(`address_id`)
);

CREATE TABLE `order` (
  `order_id` int(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(20) DEFAULT NULL,
  `address_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customer`(`customer_id`),
  FOREIGN KEY (`address_id`) REFERENCES `address`(`address_id`)
);

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `weight` int(50) DEFAULT NULL,
  `base_cost` int(50) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
);

CREATE TABLE `order_item` (
  `order_id` int(20) DEFAULT NULL,
  `product_id` int(20) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `price` int (50) DEFAULT NULL,
  FOREIGN KEY (`order_id`) REFERENCES `order`(`order_id`),
  FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`)
);

CREATE TABLE `warehouse` (
  `warehouse_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`warehouse_id`),
  FOREIGN KEY (`address_id`) REFERENCES `address`(`address_id`)
);

CREATE TABLE `product_warehouse` (
  `warehouse_id` int(20) DEFAULT NULL,
  `product_id` int(20) DEFAULT NULL,
  FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`),
  FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse`(`warehouse_id`)
);
