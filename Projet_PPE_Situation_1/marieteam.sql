-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 23 mai 2019 à 12:40
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

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
  `capaciteBateau` int(11) NOT NULL,
  `categorieBateau` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`id`, `nom`, `capaciteBateau`, `categorieBateau`) VALUES
(1, 'MarnierXpress', 50, 'A'),
(2, 'MediumBoat', 150, 'B'),
(3, 'DeLuxoBoat', 350, 'C');

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

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`lettre`, `libelle`) VALUES
('A', 'Petit'),
('B', 'Moyen'),
('C', 'Grand');

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
  `code` int(15) NOT NULL AUTO_INCREMENT,
  `distance` varchar(15) NOT NULL,
  `id_Secteur` int(11) NOT NULL,
  `id_Port_Depart` int(11) NOT NULL,
  `id_Port_Arrivee` int(11) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `Liaison_Secteur_FK` (`id_Secteur`),
  KEY `Liaison_Port0_FK` (`id_Port_Depart`),
  KEY `Liaison_Port1_FK` (`id_Port_Arrivee`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `liaison`
--

INSERT INTO `liaison` (`code`, `distance`, `id_Secteur`, `id_Port_Depart`, `id_Port_Arrivee`) VALUES
(1, '6.4', 1, 6, 7),
(2, '6.4', 1, 7, 6),
(3, '9.4', 1, 8, 9),
(4, '4.9', 1, 9, 10),
(5, '12.8', 1, 10, 8),
(6, '23.4', 1, 11, 6),
(7, '23.4', 1, 6, 11),
(9, '43.6', 2, 1, 2),
(10, '43.6', 2, 2, 1),
(11, '25.3', 3, 3, 4),
(12, '8.7', 3, 4, 5),
(13, '35.1', 3, 5, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `port`
--

INSERT INTO `port` (`id`, `nom`) VALUES
(1, 'Rotterdam'),
(2, 'Anvers'),
(3, 'Hambourg'),
(4, 'Port Kelang'),
(5, 'Singapour'),
(6, 'La Maison'),
(7, 'Le Jardin'),
(8, 'Les Champs'),
(9, 'La Montagne'),
(10, 'La Plaine'),
(11, 'La Place');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`id`, `nom`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
  ADD CONSTRAINT `Liaison_Port0_FK` FOREIGN KEY (`id_Port_Depart`) REFERENCES `port` (`id`),
  ADD CONSTRAINT `Liaison_Port1_FK` FOREIGN KEY (`id_Port_Arrivee`) REFERENCES `port` (`id`),
  ADD CONSTRAINT `Liaison_Secteur_FK` FOREIGN KEY (`id_Secteur`) REFERENCES `secteur` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `Reservation_Traversee_FK` FOREIGN KEY (`num_Traversee`) REFERENCES `traversee` (`num`);

--
-- Contraintes pour la table `tarifier`
--
ALTER TABLE `tarifier`
  ADD CONSTRAINT `Tarifier_Periode0_FK` FOREIGN KEY (`dateDeb`) REFERENCES `periode` (`dateDeb`),
  ADD CONSTRAINT `Tarifier_Type1_FK` FOREIGN KEY (`num`) REFERENCES `type` (`num`);

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `Type_Categorie_FK` FOREIGN KEY (`lettre`) REFERENCES `categorie` (`lettre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
