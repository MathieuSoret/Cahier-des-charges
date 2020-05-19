-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 19 mai 2020 à 13:44
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `veretz`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `idAdmin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idLivre` int(11) NOT NULL,
  `idCompte` int(11) NOT NULL,
  PRIMARY KEY (`idAdmin`),
  KEY `idLivre` (`idLivre`),
  KEY `idCompte` (`idCompte`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `idCompte` int(1) NOT NULL AUTO_INCREMENT,
  `pseudoCompte` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `mpCompte` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idCompte`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`idCompte`, `pseudoCompte`, `mpCompte`) VALUES
(3, 'mathieu', '123'),
(1, 'admin', '$2y$10$V3lb3C8NFxeSoyjOWVzVK.IEjMm2lNmPBnOboAk.VQzlim00DwtbG'),
(110, 'Pierre-Nicolas', '$2y$10$7H4867hO6ugbdEEbJyDSqekaws.8FGvbm6ObgX6kVJxQnmWVfxce2');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

DROP TABLE IF EXISTS `exemplaire`;
CREATE TABLE IF NOT EXISTS `exemplaire` (
  `idExemplaire` int(11) NOT NULL AUTO_INCREMENT,
  `nbExemplaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`idExemplaire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE IF NOT EXISTS `jeux` (
  `idJeux` int(11) NOT NULL,
  `nomJeux` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idJeux`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `idLivre` int(1) NOT NULL AUTO_INCREMENT,
  `nomLivre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auteurLivre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `editionLivre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genreLivre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etatLivre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepremiereditionLivre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptionLivre` varchar(10000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbLivre` int(11) DEFAULT NULL,
  `idExemplaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLivre`),
  KEY `idExemplaire` (`idExemplaire`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`idLivre`, `nomLivre`, `auteurLivre`, `editionLivre`, `genreLivre`, `etatLivre`, `datepremiereditionLivre`, `descriptionLivre`, `nbLivre`, `idExemplaire`) VALUES
(4, 'Harry Potter et les reliques de la mort', 'J. K Rowling', 'Bloomsbury', 'Roman / Fantasy', 'Bonne état', '21 Juillet 2007', 'Cette année, Harry a 17 ans et ne retourne pas à l\'école de Poudlard après la mort de Dumbledore. Avec Ron et Hermione il se consacre à la dernière mission confiée par Dumbledore, la chasse aux horcruxes. Le Seigneur des Ténèbres règne en maître et traque les fidèles amis qui sont réduits à la clandestinité. D\'épreuves en révélations, le courage, les choix et les sacrifices de Harry seront déterminants dans la lutte contre les forces du Mal.', 5, NULL),
(6, 'Le Sorceleur', 'Andrzej Sapkowski', 'Milady', 'fantasy', 'neuf', '1990', 'Le Sorceleur (en polonais : Wiedźmin) est une série littéraire polonaise de fantasy écrite par Andrzej Sapkowski et publiée entre 1990 et 2018. Inspirée des univers classiques de la fantasy avec des ajouts issus de la mythologie slave et de l\'histoire polonaise, elle se compose de nouvelles ainsi que de romans qui retracent la vie et les aventures du sorceleur Geralt de Riv. Les sorceleurs sont des tueurs de monstres, entraînés physiquement dès leur plus jeune âge et ayant subi des mutations génétiques leur conférant des capacités surnaturelles.  Son adaptation en jeu vidéo, intitulée The Witcher (2007) et ses deux suites ont contribué à sa notoriété.  En France, la série a d’abord été éditée par la maison d’édition Bragelonne, puis rééditée par sa filiale Milady. L\'ordre initial de parution n\'a pas été respecté, l\'éditeur français lui ayant préféré l\'ordre chronologique diégétique. Seul le livre La Saison des orages n’a pas reçu de numéro de tomaison.', 4, NULL),
(9, 'Harry Potter et le Prisonnier d\'Azkaban', 'J. K. Rowling', 'Bloomsbury', 'Fantastique', 'Très bon état', '8 juillet 1999', 'Sirius Black, un dangereux sorcier criminel, s\'échappe de la sombre prison d\'Azkaban avec un seul et unique but : se venger d\'Harry Potter, entré avec ses amis Ron et Hermione en troisième année à l\'école de sorcellerie de Poudlard, où ils auront aussi à faire avec les terrifiants Détraqueurs.', 4, NULL),
(10, 'Le Labyrinthe 1', 'James Dashner', 'Delacorte Press', 'Roman, Science-fiction', 'neuf', '21 Octobre 2009', 'Quand Thomas reprend connaissance, sa mémoire est vide, seul son nom lui est familier... Il se retrouve entouré d\'adolescents dans un lieu étrange, à l\'ombre de murs infranchissables. Quatre portes gigantesques, qui se referment le soir, ouvrent sur un labyrinthe peuplé de monstres d\'acier. Chaque nuit, le plan du labyrinthe en est modifié.  Thomas comprend qu\'une terrible épreuve les attend tous. Comment s\'échapper par le labyrinthe maudit sans risquer sa vie et celle de ses camarades ? Si seulement il parvenait à exhumer les sombres secrets enfouis au plus profond de sa mémoire...', 10, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `recherche`
--

DROP TABLE IF EXISTS `recherche`;
CREATE TABLE IF NOT EXISTS `recherche` (
  `idCompte` int(11) NOT NULL,
  `idLivre` int(11) NOT NULL,
  PRIMARY KEY (`idCompte`,`idLivre`),
  KEY `idLivre` (`idLivre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nomUtilisateur` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenomUtilisateur` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `classementUtilisateur` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbEmprunt` int(11) DEFAULT NULL,
  `nbRecherche` int(11) DEFAULT NULL,
  `idExemplaire` int(11) NOT NULL,
  `idJeux` int(11) NOT NULL,
  `idCompte` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `idExemplaire` (`idExemplaire`),
  KEY `idJeux` (`idJeux`),
  KEY `idCompte` (`idCompte`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
