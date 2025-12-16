-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 16 déc. 2025 à 09:00
-- Version du serveur : 8.0.44-0ubuntu0.24.04.1
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chopin_vr`
--

-- --------------------------------------------------------

--
-- Structure de la table `avatar`
--

CREATE TABLE `avatar` (
  `idAvatar` int NOT NULL,
  `nameAvatar` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `modelAvatar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `imgAvatar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avatar`
--

INSERT INTO `avatar` (`idAvatar`, `nameAvatar`, `modelAvatar`, `imgAvatar`) VALUES
(1, 'Astronaute', 'astronaute', 'Challenge2e/src/ImageAvatars/astronaute.jpg'),
(2, 'Aventurier', 'aventurier', 'Challenge2e/src/ImageAvatars/aventurier.jpg'),
(3, 'Chien Pug', 'chien_pug', 'Challenge2e/src/ImageAvatars/chien_pug.jpg'),
(4, 'Fitness Man', 'fitness_man', 'Challenge2e/src/ImageAvatars/fitness_man.jpg'),
(5, 'Requin Marko', 'requin_marko', 'Challenge2e/src/ImageAvatars/requin_marko.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `userRole` enum('ADMIN','JOUEUR') COLLATE utf8mb4_general_ci DEFAULT 'JOUEUR',
  `idAvatar` int NOT NULL,
  `idWorld` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `userRole`, `idAvatar`, `idWorld`) VALUES
(2, 'sael', '$2y$10$5CSUHTawQUjF91.UuyMwfegY3TcXat2gaHtgTBlE3/1RSNSyLsXCm', 'JOUEUR', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `world`
--

CREATE TABLE `world` (
  `idWorld` int NOT NULL,
  `nameWorld` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `imgWorld` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `urlWorld` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `world`
--

INSERT INTO `world` (`idWorld`, `nameWorld`, `imgWorld`, `urlWorld`) VALUES
(1, 'Prairie pluvieuse', '/Challenge2e/src/imageMonde/world1', ''),
(2, 'Le désert', '/Challenge2e/src/imageMonde/world2', ''),
(3, 'Laponie enneigée', '/Challenge2e/src/imageMonde/world3', ''),
(4, 'brouillard de la foret', '/Challenge2e/src/imageMonde/world4', ''),
(5, 'montagne escarpée', '/Challenge2e/src/imageMonde/world5', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`idAvatar`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_user_avatar` (`idAvatar`),
  ADD KEY `fk_user_world` (`idWorld`);

--
-- Index pour la table `world`
--
ALTER TABLE `world`
  ADD PRIMARY KEY (`idWorld`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `idAvatar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `world`
--
ALTER TABLE `world`
  MODIFY `idWorld` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_avatar` FOREIGN KEY (`idAvatar`) REFERENCES `avatar` (`idAvatar`),
  ADD CONSTRAINT `fk_user_world` FOREIGN KEY (`idWorld`) REFERENCES `world` (`idWorld`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
