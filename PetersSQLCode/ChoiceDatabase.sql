DROP DATABASE IF EXISTS FRESHSELECT;
CREATE DATABASE  FRESHSELECT;
USE FRESHSELECT;

CREATE TABLE `Student` (
   `id` INT(11) NOT NULL,
   `lastName` VARCHAR(15) DEFAULT NULL,
   `firstName` VARCHAR(15) DEFAULT NULL,
   PRIMARY KEY (`id`)
     );

CREATE TABLE `House` (
   `id` INT(11) NOT NULL,
   `houseName` VARCHAR(20),
   `houseGender`  CHAR(1) DEFAULT NULL,
   `spotsAvailable` INT(11),
   `spotsFilled` INT(11),
   PRIMARY KEY (`id`)
);


CREATE TABLE `HouseRequests` (
   `id` INT(11) NOT NULL AUTO_INCREMENT,
   `studentId` INT(11),
   `choice1` INT(11) NOT NULL,
   `choice2` INT(11) NOT NULL,
   `choice3` INT(11) NOT NULL,
   `choice4` INT(11) NOT NULL,
   `noPreference` CHAR(1),
   PRIMARY KEY (`id`),
 CONSTRAINT `FKHouseRequest_studentId` FOREIGN KEY (`studentId`)
	  REFERENCES `Student` (`id`),
 CONSTRAINT `FKHouseRequest_choice1` FOREIGN KEY (`choice1`)
      REFERENCES `House` (`id`),
 CONSTRAINT `FKHouseRequest_choice2` FOREIGN KEY (`choice2`)
      REFERENCES `House` (`id`),
 CONSTRAINT `FKHouseRequest_choice3` FOREIGN KEY (`choice3`)
      REFERENCES `House` (`id`),
 CONSTRAINT `FKHouseRequest_choice4` FOREIGN KEY (`choice4`)
      REFERENCES `House` (`id`)
);

INSERT INTO `Student` VALUES
   (1, 'Strickland', 'Sheryl'),
   (2, 'Cox', 'Maggie'),
   (3, 'Schneider', 'Bill'),
   (4, 'Barrett', 'Marian'),
   (5, 'Cohen', 'Lorenzo'),
   (6, 'Brewer', 'Melissa'),
   (7, 'Washington', 'Noel'),
   (8, 'Evans', 'Wilma'),
   (9, 'Harper', 'Mamie'),
   (10, 'Rhodes', 'Guadalupe');

INSERT INTO `House` VALUES
    (1,'Howard','F', 17, 0),
    (2,'Lowrey','M', 17, 0),
    (3,'Buck','M', 17, 0),
    (4,'Brooks','M', 17, 0),
    (5,'Syl-Men','M', 17, 0),
    (6,'Syl-Women','M', 17, 0),
    (7,'Joe','M', 17, 0),
    (8,'Ferguson','M', 17, 0);
   
INSERT INTO `HouseRequests` VALUES
   (1, 1, 2, 3, 1, 5, 'N'),
   (2, 2, 1, 3, 6, 4, 'Y'),
   (3, 3, 8, 2, 1, 7, 'N'),
   (4, 4, 2, 7, 4, 1, 'Y'),
   (5, 5, 2, 3, 1, 5, 'N'),
   (6, 6, 3, 4, 1, 6, 'N'),
   (7, 7, 2, 8, 4, 3, 'Y'),
   (8, 8, 4, 3, 1, 5, 'N'),
   (9, 9, 1, 3, 7, 2, 'N'),
   (10, 10, 2, 3, 1, 5, 'N');
   
   