-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 03 mai 2018 à 08:27
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `flamingo`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id_activite` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_activite`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id_activite`, `designation`, `type`, `id_user`) VALUES
(32, 'hello', 'culturelle', 37);

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `mail` varchar(256) NOT NULL,
  `site_web` varchar(256) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id_contact`, `id_user`, `categorie`, `nom`, `adresse`, `numero`, `mail`, `site_web`) VALUES
(81, 2, 'amis', 'Ould belkacem NABILA', '', '0665487932', '', ''),
(80, 2, 'amis', 'Berkani lila', '', '0666666655', '', ''),
(78, 2, 'amis', 'Hamel Lila', '', '0666666666', 'lila@esi.dzz', ''),
(79, 2, 'amis', 'Azem Lynda', '', '0555555555', '', ''),
(77, 2, 'amis', 'Tadjer Amina', '', '0550534812', 'aminatadjer@hotmail.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `id_document` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  `emplacement` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id_document`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`id_document`, `designation`, `emplacement`, `id`, `id_user`, `taille`, `date`) VALUES
(5, 'Série Td analyse', 'Uploadfile/5aea9c435df8e3.47759938.xlsx', 0, 2, 10751, '2018-05-03'),
(6, 'Fiche de lecture', 'Uploadfile/5aea9c5837dd17.81881741.xd', 0, 2, 0, '2018-05-03'),
(7, 'Cour Proba', 'Uploadfile/5aea9c6e6cf3d7.30382220.docx', 0, 2, 647371, '2018-05-03'),
(8, 'Cour Sinf', 'Uploadfile/5aea9c7cb1aea6.84954149.docx', 0, 2, 14556, '2018-05-03'),
(9, 'Série 03', 'Uploadfile/5aea9d917a9e51.01609950.docx', 207, 37, 14879, '2018-05-03'),
(10, 'ahbon', 'Uploadfile/5aea9dc0047b15.38654703.docx', 208, 37, 647371, '2018-05-03');

-- --------------------------------------------------------

--
-- Structure de la table `emp`
--

DROP TABLE IF EXISTS `emp`;
CREATE TABLE IF NOT EXISTS `emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `hd` date NOT NULL,
  `hf` date NOT NULL,
  `module` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emp`
--

INSERT INTO `emp` (`id`, `id_user`, `hd`, `hf`, `module`, `title`, `color`) VALUES
(66, 2, '2018-01-04', '2018-02-15', 'Cour/Td/Tp', 'Cours', '#008000'),
(67, 2, '2018-02-15', '2018-02-22', 'Examens', 'Examens intermediares', '#FF0000'),
(68, 2, '2018-03-15', '2018-05-24', 'Cour/Td/Tp', 'Cours Semetsre 2', '#008000'),
(69, 2, '2018-05-31', '2018-09-27', 'Vacances', 'Vaccances', '#40E0D0');

-- --------------------------------------------------------

--
-- Structure de la table `emploi1`
--

DROP TABLE IF EXISTS `emploi1`;
CREATE TABLE IF NOT EXISTS `emploi1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `day` date NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emploi1`
--

INSERT INTO `emploi1` (`id`, `title`, `start`, `end`, `day`, `id_user`) VALUES
(39, 'Poo', '08:00:00', '10:00:00', '2018-06-03', 2),
(40, 'TD PRoba', '13:30:00', '15:30:00', '2018-06-03', 2),
(41, 'TD logique', '10:30:00', '12:30:00', '2018-06-03', 2),
(42, 'analyse td', '08:30:00', '10:30:00', '2018-06-04', 2),
(43, 'Cour Sinf', '14:00:00', '16:06:00', '2018-06-04', 2),
(44, 'Projet', '08:00:00', '15:00:00', '2018-06-05', 2),
(45, 'analyse Cour', '09:00:00', '10:00:00', '2018-06-06', 2),
(46, 'Optique Td', '10:30:00', '11:30:00', '2018-06-06', 2),
(47, 'Poo td', '13:03:00', '15:30:00', '2018-06-06', 2),
(48, 'Cour proba', '09:30:00', '12:30:00', '2018-06-07', 2);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id_user` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TE` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `Lieu` varchar(255) NOT NULL,
  `AlarmeH` datetime NOT NULL,
  `AlarmeHvalue` int(255) NOT NULL,
  `AlarmeJ` datetime NOT NULL,
  `AlarmeJvalue` int(11) NOT NULL,
  `AlarmeS` datetime NOT NULL,
  `AlarmeSvalue` int(255) NOT NULL,
  `Faite` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `notif`
--

DROP TABLE IF EXISTS `notif`;
CREATE TABLE IF NOT EXISTS `notif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) NOT NULL,
  `alarme` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `vu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `pwd` text NOT NULL,
  `Photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `mail`, `tel`, `pwd`, `Photo`) VALUES
(39, 'tadj', 'mina', 'ga_tadjer@esi.dz', '0550565894', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Uploadfile/5ae875dd5710d0.27039320.png'),
(40, 'nonou', 'min', 'aminatadjer@hotmail.com', '055056489', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Uploadfile/5ae875dd5710d0.27039320.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
