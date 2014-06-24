USE `dflira`;

DROP TABLE IF EXISTS `anketa`;
DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(255),
  `password` varchar (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `anketa` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `lab` varchar (20),
  `login_id` int,
  `ime i prezime` varchar(50),
  `telefon` varchar(15),
  `email` varchar(50),
  `usluge` integer,
  `osoblje` integer,
  `brzina` integer,
  `izvestaj` integer,
  `dalje` integer,
  `promene` text,
  `unaprediti` text,
  INDEX `log_id` (`login_id`),
  FOREIGN KEY (`login_id`)
	REFERENCES `login`(`id`)
	ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `login` (`username`, `password`) VALUES ("lira", "lira");
