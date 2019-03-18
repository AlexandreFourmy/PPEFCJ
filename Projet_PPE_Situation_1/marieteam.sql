-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 mars 2019 à 10:15
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
-- Base de données :  `marieteam`
--

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

DROP TABLE IF EXISTS `bateau`;
CREATE TABLE IF NOT EXISTS `bateau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `lettre` char(1) NOT NULL,
  `libelle` varchar(15) NOT NULL,
  PRIMARY KEY (`lettre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lettre` char(1) NOT NULL,
  `capaciteMax` int(11) NOT NULL,
  PRIMARY KEY (`id`,`lettre`),
  KEY `Contenir_Categorie0_FK` (`lettre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enregistrer`
--

DROP TABLE IF EXISTS `enregistrer`;
CREATE TABLE IF NOT EXISTS `enregistrer` (
  `num` int(11) NOT NULL,
  `num_Type` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`num`,`num_Type`),
  KEY `Enregistrer_Type0_FK` (`num_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `liaison`
--

DROP TABLE IF EXISTS `liaison`;
CREATE TABLE IF NOT EXISTS `liaison` (
  `code` varchar(15) NOT NULL,
  `distance` varchar(15) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Port` int(11) NOT NULL,
  `id_Port_Arrivee` int(11) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `Liaison_Secteur_FK` (`id`),
  KEY `Liaison_Port0_FK` (`id_Port`),
  KEY `Liaison_Port1_FK` (`id_Port_Arrivee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

DROP TABLE IF EXISTS `periode`;
CREATE TABLE IF NOT EXISTS `periode` (
  `dateDeb` date NOT NULL,
  `dateFin` date NOT NULL,
  PRIMARY KEY (`dateDeb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

DROP TABLE IF EXISTS `port`;
CREATE TABLE IF NOT EXISTS `port` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `adr` text NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(15) NOT NULL,
  `num_Traversee` int(11) NOT NULL,
  PRIMARY KEY (`num`),
  KEY `Reservation_Traversee_FK` (`num_Traversee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tarifier`
--

DROP TABLE IF EXISTS `tarifier`;
CREATE TABLE IF NOT EXISTS `tarifier` (
  `code` varchar(15) NOT NULL,
  `dateDeb` date NOT NULL,
  `num` int(11) NOT NULL,
  `tarif` decimal(15,3) NOT NULL,
  PRIMARY KEY (`code`,`dateDeb`,`num`),
  KEY `Tarifier_Periode0_FK` (`dateDeb`),
  KEY `Tarifier_Type1_FK` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `traversee`
--

DROP TABLE IF EXISTS `traversee`;
CREATE TABLE IF NOT EXISTS `traversee` (
  `num` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(15) NOT NULL,
  `code` varchar(15) NOT NULL,
  PRIMARY KEY (`num`),
  KEY `Traversee_Liaison_FK` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(15) NOT NULL,
  `lettre` char(1) NOT NULL,
  PRIMARY KEY (`num`),
  KEY `Type_Categorie_FK` (`lettre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `nom` char(50) NOT NULL,
  `prenom` char(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `nom`, `prenom`, `email`, `password`, `statut`) VALUES
(1, 'rcoussemaeker', 'coussemaeker', 'romain', 'romain.coussemaeker@marieteam.com', 'coussemaeker', 'user'),
(2, 'afourmy', 'fourmy', 'alexandre', 'alexandre.fourmy@marieteam.com', 'fourmy', 'user'),
(3, 'jdussart', 'dussart', 'julien', 'julien.dussart@marieteam.com', 'dussart', 'user'),
(4, 'admin', 'admin', 'admin', 'contact@marieteam.com', 'admin', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `Contenir_Bateau_FK` FOREIGN KEY (`id`) REFERENCES `bateau` (`id`),
  ADD CONSTRAINT `Contenir_Categorie0_FK` FOREIGN KEY (`lettre`) REFERENCES `categorie` (`lettre`);

--
-- Contraintes pour la table `enregistrer`
--
ALTER TABLE `enregistrer`
  ADD CONSTRAINT `Enregistrer_Reservation_FK` FOREIGN KEY (`num`) REFERENCES `reservation` (`num`),
  ADD CONSTRAINT `Enregistrer_Type0_FK` FOREIGN KEY (`num_Type`) REFERENCES `type` (`num`);

--
-- Contraintes pour la table `liaison`
--
ALTER TABLE `liaison`
  ADD CONSTRAINT `Liaison_Port0_FK` FOREIGN KEY (`id_Port`) REFERENCES `port` (`id`),
  ADD CONSTRAINT `Liaison_Port1_FK` FOREIGN KEY (`id_Port_Arrivee`) REFERENCES `port` (`id`),
  ADD CONSTRAINT `Liaison_Secteur_FK` FOREIGN KEY (`id`) REFERENCES `secteur` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `Reservation_Traversee_FK` FOREIGN KEY (`num_Traversee`) REFERENCES `traversee` (`num`);

--
-- Contraintes pour la table `tarifier`
--
ALTER TABLE `tarifier`
  ADD CONSTRAINT `Tarifier_Liaison_FK` FOREIGN KEY (`code`) REFERENCES `liaison` (`code`),
  ADD CONSTRAINT `Tarifier_Periode0_FK` FOREIGN KEY (`dateDeb`) REFERENCES `periode` (`dateDeb`),
  ADD CONSTRAINT `Tarifier_Type1_FK` FOREIGN KEY (`num`) REFERENCES `type` (`num`);

--
-- Contraintes pour la table `traversee`
--
ALTER TABLE `traversee`
  ADD CONSTRAINT `Traversee_Liaison_FK` FOREIGN KEY (`code`) REFERENCES `liaison` (`code`);

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `Type_Categorie_FK` FOREIGN KEY (`lettre`) REFERENCES `categorie` (`lettre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
