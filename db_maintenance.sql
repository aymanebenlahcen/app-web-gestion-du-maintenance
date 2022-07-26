-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 19 juin 2022 à 07:18
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_maintenance`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdp` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `mdp`, `nom`, `prenom`) VALUES
(1, 'aymanbenlahcenn@gmail.com', 'Aymane@123', 'BENLAHCEN', 'Aymane\r\n'),
(2, 'mouadiffer@gmail.com', 'Mouad@123', 'IFFER', 'Mouad\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` int(15) DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `ville`, `tel`, `email`, `type`) VALUES
(1, 'messasi', 'ahmed', 'tanger', 69363254, 'ahmedmessasi@gmail.com', 'PA'),
(2, 'alaoui', 'mohamed', 'marrakech', 63955862, 'mohamedalaoui@gmail.com', 'PA'),
(3, 'alami', 'hamid', 'rabat', 635962463, 'hamidalami@gmail.com', 'SA'),
(4, 'ouazzani', 'ahmed', 'casablanca', 635964040, 'ahmedouazzani@gmail.com', 'SA'),
(37, 'alaoui', 'jalal', 'fes', 558636078, 'jalalalaoui@gmail.com', 'SO'),
(38, 'bouzid', 'alami', 'skhirat', 66666696, 'bouzidalami@gmail.com', 'PA');

-- --------------------------------------------------------

--
-- Structure de la table `employeur`
--

CREATE TABLE `employeur` (
  `id_employeur` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_nais` date DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employeur`
--

INSERT INTO `employeur` (`id_employeur`, `id_equipe`, `nom`, `prenom`, `tel`, `email`, `adresse`, `date_nais`, `role`) VALUES
(1, 1, 'sellasi', 'ismail', '0632510302', 'ismailselassi@gmail.com', '15, RTE NAJH', '1996-04-15', 'ingénieur'),
(2, 2, 'kermi', 'hamid', '0636363520', 'hamidkermi@gmail.com', '12, LOTS MEK ', '1996-06-19', 'technicien'),
(3, 3, 'alami', 'mustafa', '0362022320', 'mustafaalami@gmail.com', '12, LOTS DEKRD ', '1994-01-19', 'ingenieur'),
(4, 4, 'alaoui', 'toufik', '0606032654', 'toufikalami@gmail.com', '12, LOTS RABAT', '1995-06-20', 'ingenieur');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `id_garage` int(11) NOT NULL,
  `secteur` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referance` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `id_garage`, `secteur`, `referance`) VALUES
(1, 1, 'HO', 'AR63R'),
(2, 3, 'AI', 'aaaaa'),
(3, 1, 'AI', 'AR65R'),
(4, 1, 'RF', 'AR65R'),
(5, 2, 'HO', 'AM20R'),
(6, 2, 'MT', 'AM21R'),
(7, 2, 'AI', 'AM22R'),
(8, 2, 'RF', 'AM23R'),
(9, 3, 'HO', 'AB96R'),
(11, 3, 'AI', 'AB98R'),
(12, 3, 'RF', 'AB99R');

-- --------------------------------------------------------

--
-- Structure de la table `garage`
--

CREATE TABLE `garage` (
  `id_garage` int(11) NOT NULL,
  `id_societe` int(11) NOT NULL,
  `activite` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `garage`
--

INSERT INTO `garage` (`id_garage`, `id_societe`, `activite`, `ville`, `tel`) VALUES
(1, 1, 'Performance', 'tanger', '0558636078'),
(2, 1, 'Performance ', 'marrakech', '0696352489'),
(3, 1, 'Performance ', 'rabat', '0986325695'),
(4, 1, 'Performance ', 'casablanca', '0632593022');

-- --------------------------------------------------------

--
-- Structure de la table `maintenance`
--

CREATE TABLE `maintenance` (
  `id_maintenance` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_voiture` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `montant` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `maintenance`
--

INSERT INTO `maintenance` (`id_maintenance`, `id_client`, `id_voiture`, `id_equipe`, `date_debut`, `date_fin`, `montant`) VALUES
(1, 1, 1, 1, '2022-05-01', '2022-05-03', '20 000 DH'),
(2, 2, 2, 2, '2022-05-01', '2022-05-10', '15 000 DH'),
(3, 3, 3, 3, '2022-01-01', '2022-01-04', '25 000 DH'),
(4, 4, 4, 4, '2022-03-10', '2022-05-13', '30 000 DH'),
(5, 38, 33, 12, '2022-06-18', '2022-07-03', '120000 dh'),
(6, 38, 32, 11, '2022-05-30', '2022-06-25', '10000 DH'),
(7, 4, 32, 8, '2022-05-30', '2022-06-25', '12222 DH');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id_piece` int(11) NOT NULL,
  `id_garage` int(11) NOT NULL,
  `referance` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id_piece`, `id_garage`, `referance`, `libelle`, `prix`) VALUES
(1, 1, 'PV95X', 'boite vitesse', '10 000 DH'),
(2, 2, 'PK94M', 'Turbo', '10 000 DH'),
(3, 2, 'AM96D', 'cataliseur', '20 000 DH'),
(4, 2, 'CD96D', 'chaine d admition', '15 000 DH');

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

CREATE TABLE `societe` (
  `id_societe` int(11) NOT NULL,
  `rs` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ice` varchar(110) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fix` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `societe`
--

INSERT INTO `societe` (`id_societe`, `rs`, `ice`, `logo`, `adresse`, `email`, `fix`, `tel`, `nom`) VALUES
(1, 'MPE - Performance ', '632321846592435922643', NULL, '95660 Champagne Sur Oise', 'mpe.maroc@performance.com', '+33680903099', '+3471732062', 'mpe');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `id_voiture` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `matricule` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modele` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `couleur` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duree` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annee` int(11) NOT NULL,
  `carburant` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id_voiture`, `id_client`, `matricule`, `marque`, `modele`, `couleur`, `duree`, `img`, `annee`, `carburant`) VALUES
(1, 1, '15-A-26', 'Bmw', 'm2c', 'bleu', '2jrs', '521_m2.jfif', 2020, 'Essance'),
(2, 2, '30-A-2365', 'audi', 'rs3', 'noir', '10jrs', NULL, 2020, 'essance'),
(3, 3, '1-H-2362', 'lamborgini', 'urus', 'jaune', '4jrs', NULL, 2021, 'essance'),
(4, 4, '15-G-3652', 'renault', 'clio', 'noir', '3jrs', NULL, 2022, 'essance'),
(32, 37, '9292-A-20', 'alfa', 'duster', 'rouge', 'bzthgbzthg', '665_', 126, 'Essance'),
(33, 38, '20-P-20', 'benz', 's67', 'noir', '20jrs', '484_2022_06_12_13_52_IMG_1114.JPG', 2022, 'Hybride');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `employeur`
--
ALTER TABLE `employeur`
  ADD PRIMARY KEY (`id_employeur`),
  ADD KEY `fk_emeq` (`id_equipe`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`),
  ADD KEY `pk_pcgr` (`id_garage`);

--
-- Index pour la table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`id_garage`),
  ADD KEY `fk_grso` (`id_societe`);

--
-- Index pour la table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id_maintenance`),
  ADD KEY `fk_cltmain` (`id_client`),
  ADD KEY `fk_mainvt` (`id_voiture`),
  ADD KEY `fi_maineqp` (`id_equipe`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id_piece`),
  ADD KEY `pk_pigr` (`id_garage`);

--
-- Index pour la table `societe`
--
ALTER TABLE `societe`
  ADD PRIMARY KEY (`id_societe`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id_voiture`),
  ADD KEY `pk_vrclt` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `employeur`
--
ALTER TABLE `employeur`
  MODIFY `id_employeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `garage`
--
ALTER TABLE `garage`
  MODIFY `id_garage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id_maintenance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id_piece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id_voiture` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employeur`
--
ALTER TABLE `employeur`
  ADD CONSTRAINT `fk_emeq` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`);

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `pk_pcgr` FOREIGN KEY (`id_garage`) REFERENCES `garage` (`id_garage`);

--
-- Contraintes pour la table `garage`
--
ALTER TABLE `garage`
  ADD CONSTRAINT `fk_grso` FOREIGN KEY (`id_societe`) REFERENCES `societe` (`id_societe`);

--
-- Contraintes pour la table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `fi_maineqp` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`),
  ADD CONSTRAINT `fk_cltmain` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `fk_mainvt` FOREIGN KEY (`id_voiture`) REFERENCES `voiture` (`id_voiture`);

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `pk_pigr` FOREIGN KEY (`id_garage`) REFERENCES `garage` (`id_garage`);

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `pk_vrclt` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
