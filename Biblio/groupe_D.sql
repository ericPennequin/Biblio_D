-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 30 Novembre 2017 à 16:49
-- Version du serveur :  5.7.20
-- Version de PHP :  7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `groupe_D`
--

-- --------------------------------------------------------

--
-- Structure de la table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `Nom` varchar(45) DEFAULT NULL,
  `Mdp` varchar(45) DEFAULT NULL,
  `Autorisation` tinyint(4) DEFAULT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Categories`
--

CREATE TABLE `Categories` (
  `Categorie` varchar(45) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `CategoriesLivre`
--

CREATE TABLE `CategoriesLivre` (
  `IdLivre` int(11) NOT NULL,
  `IdCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Livre`
--

CREATE TABLE `Livre` (
  `Id` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Auteur` varchar(255) DEFAULT NULL,
  `Edition` varchar(45) DEFAULT NULL,
  `Description` longtext,
  `Image` varchar(255) DEFAULT NULL,
  `Parution` varchar(45) DEFAULT NULL,
  `Type` enum('livre','revue') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Livre`
--

INSERT INTO `Livre` (`Id`, `Titre`, `Auteur`, `Edition`, `Description`, `Image`, `Parution`, `Type`) VALUES
(1, 'ITIL 2011', 'Jaques Quesnel', 'ENI EDITION', 'Normes et meilleurs pratiques pour évoluer vers la norme ISO 20000', 'itil2011.JPG', 'mai 2012', 'livre'),
(2, 'Améliorer ses taux de conversion web', 'Pierre Kosciusko-Morizet', 'EYROLLES', 'Vers la perfomance des sites web au delà du webmarketing', 'amameliorer-ses-taux-de-conversion-web.JPG', 'aout 2009', 'livre'),
(3, 'Guide juridique de l\'e-commerce et de l\'e-marketing', 'Gerard Haas', 'ENI EDITION', 'Comment optimiser grace au droit le développement de votre site marchand et gagner en sérénité?', 'guide-juridique-de-l-ecommerce-et-de-l-e-markting.JPG', 'sept. 2015', 'livre'),
(4, 'Internet aspects juridiques', 'Alain Bensoussan', 'Hermes', 'Droit français et droit international sur le web', 'Internet-aspects-juridiques.JPG', '1998', 'livre'),
(5, 'HTML5 et CCS3', 'CEFIM', 'ENI EDITION', 'Faire evoluer le design de vos sites', 'HTML5-et-CSS3.JPG', '2013', 'livre'),
(6, 'Le multimédia et le droit', 'Alain Bensoussan', 'Hermes', 'Les contenus multimédias et le droit', 'le-multimedia-et-le-droitJPG', '1998', 'livre'),
(7, 'Internet et marketing 2014- 2015', 'Soraya Cabezon', 'EBG', 'Fiches pratiques etudes de cas, pour le marketing digital', 'internet-marketing-2014-2015.JPG', '2014', 'livre'),
(8, 'Internet et marketing 2010', 'Julia Jouffroy, Guillaume Ber, Martin Tissier', 'EBG', 'Théorie et cas d\'entreprises en marketing et communication', 'internet-marketing-2010.JPG', '2010', 'livre'),
(9, 'Pratiques de la conduite du changement', 'D Autissier, J-M Moutot', 'Dunod', 'Comment passer du discours à l\'action', 'Pratiques-de-la-conduite-du-changement.JPG', '2003', 'livre'),
(10, 'Faire du marketing sur les réseaux sociaux', 'Hossler Murat Jouanne', 'EYROLLES', '12 modules pour construire sa stratégie social média', 'faire-du-marketing-sur-les-reseaux-sociaux.JPG', '2014', 'livre'),
(11, 'Aide Mémoire de droit à l\'usage des responsables informatique', 'Renard Rietsch', 'Dunod', 'Patrimoine, responsabilité civile, droit du logiciel, Cnil', 'aide-memoire-de-droit.JPG', '2012', 'livre'),
(12, 'Comprendre CMMI', 'Ahern Clouse Turner', 'CEPADUES', 'Améliorer les processus avec CMMI', 'comprendre-CMMI.JPG', '2006', 'livre'),
(13, 'Gestion de configuration', 'Djezzar', 'Dunod', 'Maitrisez vos changements logiciels', 'gestion-de-configurationJPG', '2003', 'livre'),
(14, 'ITIL V3', 'Jean-Luc Baud', 'ENI EDITION', 'Préparation à la certification ITIL V3', 'ITILV3.JPG', 'mai 2011', 'livre'),
(15, 'MISC 93', '', 'EDition DIAMOND', 'Outils frameworks, obfuscations, protocoles', 'MISC-93.JPG', 'sept. 2017', 'revue'),
(16, 'Linux Pratique Essentiel', '', 'Edition DIAMOND', 'Dossier Ubuntu, Desktop,tablettes,smartphones', 'LINUX-pratique-essentiel-FEV-2012.JPG', 'Fev 2012', 'revue'),
(17, 'MISC HS 16', '', 'Edition DIAMOND', 'Securité des systèmes sans fil. RFID, GSM, DVB', 'MISC-HS-16.JPG', '', 'revue'),
(18, 'XML pour les débutants', '', 'MLP', 'XML, XHTML, XSL, XSTL, DTD, CSS, validation, W3C, namespace', 'XMLDEBUT.JPG', 'juin 2002', 'revue'),
(19, 'MISC 91 ', '', 'Edition DIAMOND', 'Dossier Smart Cities, Comment protéger les villes intélligentes', 'MISCMAIJUIN2017.JPG', 'mai 2017', 'revue');

-- --------------------------------------------------------

--
-- Structure de la table `Notes`
--

CREATE TABLE `Notes` (
  `Commentaire` varchar(255) DEFAULT NULL,
  `Notes` int(11) DEFAULT NULL,
  `Valide` tinyint(4) DEFAULT NULL,
  `IdLivre` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Reservation`
--

CREATE TABLE `Reservation` (
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `IdLivre` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `Nom` varchar(45) NOT NULL,
  `Prenom` varchar(45) NOT NULL,
  `Promotion` varchar(45) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`);

--
-- Index pour la table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`);

--
-- Index pour la table `CategoriesLivre`
--
ALTER TABLE `CategoriesLivre`
  ADD KEY `Id_idx` (`IdLivre`),
  ADD KEY `Id_idx1` (`IdCat`);

--
-- Index pour la table `Livre`
--
ALTER TABLE `Livre`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`);

--
-- Index pour la table `Notes`
--
ALTER TABLE `Notes`
  ADD KEY `Id_idx` (`IdLivre`),
  ADD KEY `Id_idx1` (`IdUser`);

--
-- Index pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD KEY `IdLivre_idx` (`IdLivre`),
  ADD KEY `Id_idx` (`IdUser`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Livre`
--
ALTER TABLE `Livre`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `CategoriesLivre`
--
ALTER TABLE `CategoriesLivre`
  ADD CONSTRAINT `Categories` FOREIGN KEY (`IdCat`) REFERENCES `Categories` (`Id`),
  ADD CONSTRAINT `LivreCat` FOREIGN KEY (`IdLivre`) REFERENCES `Livre` (`Id`);

--
-- Contraintes pour la table `Notes`
--
ALTER TABLE `Notes`
  ADD CONSTRAINT `LivreNotes` FOREIGN KEY (`IdLivre`) REFERENCES `Livre` (`Id`),
  ADD CONSTRAINT `UserNotes` FOREIGN KEY (`IdUser`) REFERENCES `User` (`Id`);

--
-- Contraintes pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Id` FOREIGN KEY (`IdUser`) REFERENCES `User` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `IdLivre` FOREIGN KEY (`IdLivre`) REFERENCES `Livre` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
