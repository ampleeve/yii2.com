CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `brandID` int(11) DEFAULT NULL,
  `typeID` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `price` decimal(20,2) NOT NULL,
  `vendorCode` varchar(150) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkCategoryProduct_idx` (`categoryID`),
  KEY `fkBrandProduct_idx` (`brandID`),
  KEY `fkTypeProduct_idx` (`typeID`),
  CONSTRAINT `fkBrandProduct` FOREIGN KEY (`brandID`) REFERENCES `brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkCategoryProduct` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkTypeProduct` FOREIGN KEY (`typeID`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
