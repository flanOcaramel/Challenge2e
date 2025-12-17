-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 17 déc. 2025 à 08:31
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
  `nameAvatar` varchar(100) NOT NULL,
  `modelAvatar` varchar(255) NOT NULL,
  `imgAvatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `avatar`
--

INSERT INTO `avatar` (`idAvatar`, `nameAvatar`, `modelAvatar`, `imgAvatar`) VALUES
(1, 'Aventurier', 'adventurer.glb', 'assets/img/aventurier.jpg'),
(2, 'Astronaute', 'astronaut.glb', 'assets/img/astronaute.jpg'),
(3, 'Fitness', 'fitness.glb', 'assets/img/fitness_man.jpg'),
(4, 'Requin Mako', 'mako.glb', 'assets/img/requin_mako.jpg'),
(5, 'Chien Pug', 'pug.glb', 'assets/img/chien_pug.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userRole` enum('ADMIN','JOUEUR') DEFAULT 'JOUEUR',
  `idAvatar` int NOT NULL,
  `idWorld` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `userRole`, `idAvatar`, `idWorld`) VALUES
(1, 'ADMIN', '$argon2id$v=19$m=65536,t=4,p=1$Vld4Vm1jb2F4S3lyYjVZRA$zK0sgNXt52wCMg1hsu3KOxtXm8joBf6RhCqLQs52Irs', 'ADMIN', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `world`
--

CREATE TABLE `world` (
  `idWorld` int NOT NULL,
  `nameWorld` varchar(100) NOT NULL,
  `imgWorld` varchar(255) DEFAULT NULL,
  `urlWorld` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `world`
--

INSERT INTO `world` (`idWorld`, `nameWorld`, `imgWorld`, `urlWorld`) VALUES
(1, 'La prairie pluvieuse', '', 'https://vr.chopin.com/world1'),
(2, 'Le désert aride', 'assetsimgworld2.png', 'https://vr.chopin.com/world2'),
(3, 'La Laponie enneigée', 'assetsimgworld3.png', 'https://vr.chopin.com/world3'),
(4, 'Le brouillard de la foret', 'assetsimgworld4.png', 'https://vr.chopin.com/world4'),
(5, 'La montagne escarpée', 'assetsimgworld5.png', 'https://vr.chopin.com/world5');

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
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
