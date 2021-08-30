-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 25 août 2021 à 14:33
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `moustapha`
--

-- --------------------------------------------------------

--
-- Structure de la table `approvisionner`
--

DROP TABLE IF EXISTS `approvisionner`;
CREATE TABLE IF NOT EXISTS `approvisionner` (
  `idapp` int(11) NOT NULL AUTO_INCREMENT,
  `idprod` int(11) NOT NULL,
  `qte_app` int(11) NOT NULL,
  `pu_app` int(11) NOT NULL,
  `date_app` datetime NOT NULL,
  PRIMARY KEY (`idapp`),
  KEY `idprod` (`idprod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_cat` varchar(100) NOT NULL,
  PRIMARY KEY (`idcat`),
  UNIQUE KEY `libelle_cat` (`libelle_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcat`, `libelle_cat`) VALUES
(2, 'biscuit'),
(1, 'bonbon');

-- --------------------------------------------------------

--
-- Structure de la table `ligne`
--

DROP TABLE IF EXISTS `ligne`;
CREATE TABLE IF NOT EXISTS `ligne` (
  `idligne` int(11) NOT NULL AUTO_INCREMENT,
  `idprod` int(11) NOT NULL,
  `idvente` int(11) NOT NULL,
  `qte_ligne` int(11) NOT NULL,
  `pu_ligne` int(11) NOT NULL,
  PRIMARY KEY (`idligne`),
  KEY `idvente` (`idvente`),
  KEY `idprod` (`idprod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idprod` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_prod` varchar(100) NOT NULL,
  `pu_prod` int(11) NOT NULL,
  `idcat` int(11) NOT NULL,
  PRIMARY KEY (`idprod`),
  UNIQUE KEY `libelle_prod` (`libelle_prod`),
  KEY `idcat` (`idcat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idu`, `nom`, `login`, `password`) VALUES
(1, 'Admin', 'admin', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `idvente` int(11) NOT NULL AUTO_INCREMENT,
  `montant` varchar(100) NOT NULL,
  `date_vente` datetime NOT NULL,
  PRIMARY KEY (`idvente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `approvisionner`
--
ALTER TABLE `approvisionner`
  ADD CONSTRAINT `approvisionner_ibfk_1` FOREIGN KEY (`idprod`) REFERENCES `produit` (`idprod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ligne`
--
ALTER TABLE `ligne`
  ADD CONSTRAINT `ligne_ibfk_1` FOREIGN KEY (`idvente`) REFERENCES `vente` (`idvente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ligne_ibfk_2` FOREIGN KEY (`idprod`) REFERENCES `produit` (`idprod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idcat`) REFERENCES `categorie` (`idcat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
