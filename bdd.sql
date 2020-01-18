-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Entreprise`;
CREATE TABLE `Entreprise` (
  `id_entreprise` int(11) NOT NULL,
  `nom_entreprise` varchar(30) NOT NULL,
  PRIMARY KEY (`id_entreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Entreprise` (`id_entreprise`, `nom_entreprise`) VALUES
(1,	'Noveo'),
(2,	'Ikea');

DROP TABLE IF EXISTS `Etudiant`;
CREATE TABLE `Etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `nom_etudiant` varchar(30) NOT NULL,
  `prenom_etudiant` varchar(30) NOT NULL,
  `mail_etudiant` varchar(30) NOT NULL,
  PRIMARY KEY (`id_etudiant`),
  UNIQUE KEY `mail_etudiant` (`mail_etudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Etudiant` (`id_etudiant`, `nom_etudiant`, `prenom_etudiant`, `mail_etudiant`) VALUES
(1,	'Adriao',	'Thomas',	'thomas.adriao@gmail.com'),
(2,	'Lefebvre',	'Laura',	'laura.lefebvre@gmail.com');

DROP TABLE IF EXISTS `Stage`;
CREATE TABLE `Stage` (
  `ref_etudiant` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `ref_tutent` int(11) NOT NULL,
  `ref_entreprise` int(11) NOT NULL,
  `descrition` varchar(255) NOT NULL,
  PRIMARY KEY (`ref_etudiant`,`date_debut`),
  KEY `ref_entreprise` (`ref_entreprise`),
  KEY `ref_tutent` (`ref_tutent`),
  KEY `ref_etudiant` (`ref_etudiant`),
  CONSTRAINT `Stage_ibfk_1` FOREIGN KEY (`ref_etudiant`) REFERENCES `Etudiant` (`id_etudiant`),
  CONSTRAINT `Stage_ibfk_2` FOREIGN KEY (`ref_entreprise`) REFERENCES `Entreprise` (`id_entreprise`),
  CONSTRAINT `Stage_ibfk_3` FOREIGN KEY (`ref_tutent`) REFERENCES `Tutent` (`id_tutent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Stage` (`ref_etudiant`, `date_debut`, `date_fin`, `ref_tutent`, `ref_entreprise`, `descrition`) VALUES
(1,	'2020-03-09',	'2020-06-05',	1,	1,	'Bien reçu. Le travail fait y est intéressant et enrichissant.'),
(2,	'2020-04-01',	'2020-06-04',	2,	2,	'Très bon stage, je conseille à tout les dévs !');

DROP TABLE IF EXISTS `Tutent`;
CREATE TABLE `Tutent` (
  `id_tutent` int(11) NOT NULL,
  `nom_tutent` varchar(30) NOT NULL,
  `prenom_tutent` varchar(30) NOT NULL,
  `mail_tutent` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tutent`),
  UNIQUE KEY `mail_tutent` (`mail_tutent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Tutent` (`id_tutent`, `nom_tutent`, `prenom_tutent`, `mail_tutent`) VALUES
(1,	'Michalac',	'Yeuïl',	'cristolac@gmail.com'),
(2,	'Greg',	'Christophe',	'mich-much@gmail.com');

-- 2020-01-18 19:59:46

