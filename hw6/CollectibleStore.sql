drop schema if exists CollectibleStore;
CREATE SCHEMA if not exists CollectibleStore;

USE CollectibleStore;

CREATE TABLE `address` (
  `address_id` int(20) NOT NULL AUTO_INCREMENT,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` int(100) DEFAULT NULL,
  PRIMARY KEY (`address_id`)
);

CREATE TABLE `contact_info` (
  `contact_id` int(20) NOT NULL AUTO_INCREMENT,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`contact_id`),
  FOREIGN KEY (`address_id`) REFERENCES `address`(`address_id`)
);

CREATE TABLE `supplier` (
  `supplier_id` int(20) NOT NULL AUTO_INCREMENT,
  `contact_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`),
  FOREIGN KEY (`contact_id`) REFERENCES `contact_info`(`contact_id`)
);

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL AUTO_INCREMENT,
  `contact_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  FOREIGN KEY (`contact_id`) REFERENCES `contact_info`(`contact_id`)
);

CREATE TABLE `employee` (
  `employee_id` int(20) NOT NULL AUTO_INCREMENT,
  `contact_id` int(20) DEFAULT NULL,
  `salary` int(20) DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  FOREIGN KEY (`contact_id`) REFERENCES `contact_info`(`contact_id`)
);

CREATE TABLE `paycheck` (
  `paycheck_id` int(20) NOT NULL AUTO_INCREMENT,
  `employee_id` int(20) DEFAULT NULL,
  `pay` int(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`paycheck_id`),
  FOREIGN KEY (`employee_id`) REFERENCES `employee`(`employee_id`)
);

CREATE TABLE `inventory_item` (
  `item_id` int(20) NOT NULL auto_increment,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `stock` int(20) DEFAULT NULL,
  `supplier_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  FOREIGN KEY (`supplier_id`) REFERENCES `supplier`(`supplier_id`)
);

CREATE TABLE `invoice` (
  `invoice_id` int(20) NOT NULL auto_increment,
  `name` varchar(100) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `customer_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customer`(`customer_id`)
);

CREATE TABLE `invoice_item` (
  `invoice_item_id` int(20) NOT NULL auto_increment,
  `quantity` int(20) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `invoice_id` int(20) DEFAULT NULL,
  `item_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`invoice_item_id`),
  FOREIGN KEY (`invoice_id`) REFERENCES `invoice`(`invoice_id`),
  FOREIGN KEY (`item_id`) REFERENCES `inventory_item`(`item_id`)
);

CREATE TABLE `payment` (
  `payment_id` int(20) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(20) DEFAULT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `amount` int(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  FOREIGN KEY (`invoice_id`) REFERENCES `invoice`(`invoice_id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customer`(`customer_id`)
);










