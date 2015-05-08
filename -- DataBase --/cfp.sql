-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2013 at 03:25 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cfp`
--
CREATE DATABASE `cfp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cfp`;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `langueArticle` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `themePrincipal` varchar(100) NOT NULL,
  `themesecondaire` varchar(100) NOT NULL,
  `typeParticipation` varchar(30) NOT NULL,
  `languePresentation` varchar(20) NOT NULL,
  `format` varchar(10) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `resume` varchar(2000) NOT NULL,
  `listMotClefs` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `langueArticle`, `titre`, `themePrincipal`, `themesecondaire`, `typeParticipation`, `languePresentation`, `format`, `url`, `resume`, `listMotClefs`) VALUES
(1, 'francais', 'past', 'so past', 'so so past', 'auteur', 'francais', 'word', '..', 'do it', 'past past'),
(2, 'english', 'life', 'so life', 'so so life', 'who', 'arabic', 'xml :D', '...', 'no', 'life'),
(3, 'a', 'a', 'a', 'a', 'a', 'a', 'txt', 'License', 'jhjhj', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `auteurparticipant`
--

CREATE TABLE IF NOT EXISTS `auteurparticipant` (
  `id` varchar(10) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpostale` varchar(30) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `nationalite` varchar(30) NOT NULL,
  `institution` varchar(30) NOT NULL,
  `laboratoire` varchar(50) NOT NULL,
  `equipe` varchar(50) NOT NULL,
  `pswd` varchar(50) NOT NULL,
  `idArticle` int(10) NOT NULL,
  `numpasseport` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auteurparticipant`
--

INSERT INTO `auteurparticipant` (`id`, `nom`, `prenom`, `email`, `cpostale`, `tel`, `pays`, `nationalite`, `institution`, `laboratoire`, `equipe`, `pswd`, `idArticle`, `numpasseport`) VALUES
('1', 'wander', 'el', 'm', '4', '5', '5', '5', '5', '5', '5', '5', 5, 0),
('1370374847', '', '', '', '', '', '', '', '', '', '', '', 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `auteurprincipal`
--

CREATE TABLE IF NOT EXISTS `auteurprincipal` (
  `id` varchar(10) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpostale` varchar(30) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `nationalite` varchar(30) NOT NULL,
  `institution` varchar(30) NOT NULL,
  `laboratoire` varchar(50) NOT NULL,
  `equipe` varchar(50) NOT NULL,
  `pswd` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auteurprincipal`
--

INSERT INTO `auteurprincipal` (`id`, `nom`, `prenom`, `email`, `cpostale`, `tel`, `pays`, `nationalite`, `institution`, `laboratoire`, `equipe`, `pswd`) VALUES
('1', 'ares', 'ares', 'ares.email', '1526', '5555555', 'greece', '..', 'gow', 'none', 'fighters', '123456'),
('1370374847', 'zouhair', 'elamrani', 'elam.email', 'massira1', '', '', '', '', '', '', 'e10adc3949ba59abbe56e057f20f883e'),
('23', 'karkouch', 'aimad', 'karkouch.email', '5221', '555555', 'maroc', 'marocain', 'ensa', 'ensa', 'ensa', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `auteursecondaire`
--

CREATE TABLE IF NOT EXISTS `auteursecondaire` (
  `id` varchar(10) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpostale` varchar(30) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `nationalite` varchar(30) NOT NULL,
  `institution` varchar(30) NOT NULL,
  `laboratoire` varchar(50) NOT NULL,
  `equipe` varchar(50) NOT NULL,
  `pswd` varchar(50) NOT NULL,
  `idSoumission` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auteursecondaire`
--

INSERT INTO `auteursecondaire` (`id`, `nom`, `prenom`, `email`, `cpostale`, `tel`, `pays`, `nationalite`, `institution`, `laboratoire`, `equipe`, `pswd`, `idSoumission`) VALUES
('51ae5da5', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 3),
('51ae5da6', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 3);

-- --------------------------------------------------------

--
-- Table structure for table `chambre`
--

CREATE TABLE IF NOT EXISTS `chambre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idhotel` int(11) NOT NULL,
  `type` varchar(40) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `chambre`
--

INSERT INTO `chambre` (`id`, `idhotel`, `type`, `prix`) VALUES
(1, 1, 'chambre', 260);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `adresse` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `nom`, `adresse`) VALUES
(1, 'hotel', 'marrakech');

-- --------------------------------------------------------

--
-- Table structure for table `membrecomite`
--

CREATE TABLE IF NOT EXISTS `membrecomite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `cpostale` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `pays` varchar(45) DEFAULT NULL,
  `nationalite` varchar(45) DEFAULT NULL,
  `institution` varchar(45) DEFAULT NULL,
  `laboratoire` varchar(45) DEFAULT NULL,
  `equipe` varchar(45) DEFAULT NULL,
  `theme` varchar(45) DEFAULT NULL,
  `pswd` varchar(50) NOT NULL,
  `participant` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `membrecomite`
--

INSERT INTO `membrecomite` (`id`, `nom`, `prenom`, `email`, `cpostale`, `tel`, `pays`, `nationalite`, `institution`, `laboratoire`, `equipe`, `theme`, `pswd`, `participant`) VALUES
(1, 'ELAMRANI ABOU ELASSAD', 'zouhair', 'elam.zouhair@gmail.com', '5000', '0666666666', 'maroc', 'marocain', 'ensa', 'mit', 'none', 'aizo', '123456', 0),
(2, 'ici', 'wand', 'ensa.g', '2222', '2222', 'mm', '44', '44', '44', '44', '444', '123456', 1),
(3, 'lyon', 'nyon', 'lyon.email', '23656', '22', 'ilsand', 'americain', 'abrella', 'none', 're4', 'zomibefight', '123456', 0),
(51, 'elamrani', 'zouhair', 'elam.email', 'massira1', '', '', '', '', '', '', 'ico', 'e10adc3949ba59abbe56e057f20f883e', 0),
(52, 'zouhair', 'elamrani', '123456', '123456', '', '', '', '', '', '', '123456', 'e10adc3949ba59abbe56e057f20f883e', 0),
(53, 'ico', 'ico', 'ico', 'ico', '', '', '', '', '', '', 'ico', '65f034c0f853471ed478ceb34164523b', 0),
(55, 'KARKOUCH', 'aimad', 'karkouch.email', '5000', '555555', 'maroc', 'marocain', 'ensa', 'ensa', 'ensa', 'ensa', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `membrecomiteparticipant`
--

CREATE TABLE IF NOT EXISTS `membrecomiteparticipant` (
  `id` varchar(10) NOT NULL,
  `numpasseport` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idchambre` int(11) NOT NULL,
  `idparticipant` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `datearrive` date NOT NULL,
  `datedepart` date NOT NULL,
  `reserve` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `revision`
--

CREATE TABLE IF NOT EXISTS `revision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertinence` int(11) DEFAULT NULL,
  `clarete` int(11) DEFAULT NULL,
  `importance` int(11) DEFAULT NULL,
  `originalite` int(11) DEFAULT NULL,
  `qualiteScientifique` int(11) DEFAULT NULL,
  `impact` int(11) DEFAULT NULL,
  `pertinenceComment` text,
  `clareteComment` text,
  `importanceComment` text,
  `originaliteComment` text,
  `qualiteScientifiqueComment` text,
  `impactComment` text,
  `idArticle` int(255) NOT NULL,
  `idMembreComite` int(255) NOT NULL,
  `suggestions` text,
  `terminee` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `revision`
--

INSERT INTO `revision` (`id`, `pertinence`, `clarete`, `importance`, `originalite`, `qualiteScientifique`, `impact`, `pertinenceComment`, `clareteComment`, `importanceComment`, `originaliteComment`, `qualiteScientifiqueComment`, `impactComment`, `idArticle`, `idMembreComite`, `suggestions`, `terminee`) VALUES
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, 3),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, 3),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `simpleparticipant`
--

CREATE TABLE IF NOT EXISTS `simpleparticipant` (
  `id` varchar(10) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpostale` varchar(30) NOT NULL,
  `numpasseport` varchar(50) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `nationalite` varchar(30) NOT NULL,
  `institution` varchar(30) NOT NULL,
  `laboratoire` varchar(50) NOT NULL,
  `equipe` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpleparticipant`
--

INSERT INTO `simpleparticipant` (`id`, `nom`, `prenom`, `email`, `cpostale`, `numpasseport`, `tel`, `pays`, `nationalite`, `institution`, `laboratoire`, `equipe`) VALUES
('1', 'kratos', 'ghost', 'sparta', '12', '12', '12', 'greece', '...', 'war', 'bllod', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `soumission`
--

CREATE TABLE IF NOT EXISTS `soumission` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `idArticle` int(20) NOT NULL,
  `idAuteur` varchar(20) NOT NULL,
  `statut` int(2) NOT NULL,
  `dateSoumission` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `soumission`
--

INSERT INTO `soumission` (`id`, `idArticle`, `idAuteur`, `statut`, `dateSoumission`) VALUES
(1, 1, '1', 1, '2013-06-05 00:00:00'),
(2, 2, '1', 2, '2013-06-10 00:00:00'),
(3, 3, '1370374847', 1, '2013-06-04 21:31:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
