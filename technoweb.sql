-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Novembre 2015 à 11:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `technoweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `donnee`
--

CREATE TABLE IF NOT EXISTS `donnee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horodatage` datetime NOT NULL,
  `temperature` float NOT NULL,
  `vent` float NOT NULL,
  `hydrometrie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `horodatage` (`horodatage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `donnee`
--

INSERT INTO `donnee` (`id`, `horodatage`, `temperature`, `vent`, `hydrometrie`) VALUES
(579, '2015-10-24 11:12:51', 10.5, 80.5, 10),
(580, '2015-10-24 11:22:51', 40.5, 70.5, 10),
(581, '2015-10-24 11:32:51', 35.5, 60.5, 30),
(582, '2015-10-24 11:42:51', 37.5, 70.5, 50),
(583, '2015-10-24 11:52:51', 18.5, 50.5, 60);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
