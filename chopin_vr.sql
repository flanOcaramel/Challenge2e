-- Structure de la table Avatar
CREATE TABLE IF NOT EXISTS `avatar` (
  `idAvatar` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nameAvatar` varchar(100) NOT NULL,
  `modelAvatar` varchar(255) NOT NULL,
  `imgAvatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB;

-- Structure de la table World
CREATE TABLE IF NOT EXISTS `world` (
  `idWorld` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nameWorld` varchar(100) NOT NULL,
  `imgWorld` varchar(255) DEFAULT NULL,
  `urlWorld` varchar(255) NOT NULL
) ENGINE=InnoDB;

-- Structure de la table User
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `userRole` enum('ADMIN','JOUEUR') DEFAULT 'JOUEUR',
  `idAvatar` int(11) NOT NULL,
  `idWorld` int(11) NOT NULL,
  CONSTRAINT `fk_user_avatar` FOREIGN KEY (`idAvatar`) REFERENCES `avatar` (`idAvatar`),
  CONSTRAINT `fk_user_world` FOREIGN KEY (`idWorld`) REFERENCES `world` (`idWorld`)
) ENGINE=InnoDB;

-- Données de test pour les Avatars (5 profils)
INSERT INTO `avatar` (`idAvatar`, `nameAvatar`, `modelAvatar`, `imgAvatar`) VALUES
(1, 'Aventurier', 'adventurer.glb', 'assets/img/aventurier.jpg'),
(2, 'Astronaute', 'astronaut.glb', 'assets/img/astronaute.jpg'),
(3, 'Fitness', 'fitness.glb', 'assets/img/fitness_man.jpg'),
(4, 'Requin Mako', 'shark.glb', 'assets/img/requin_mako.jpg'),
(5, 'Chien Pug', 'pug.glb', 'assets/img/chien_pug.jpg')
ON DUPLICATE KEY UPDATE nameAvatar=nameAvatar;

-- Données de test pour les Mondes (5 environnements)
INSERT INTO `world` (`idWorld`, `nameWorld`, `imgWorld`, `urlWorld`) VALUES
(1, 'La prairie pluvieuse', '', 'https://vr.chopin.com/world1'),
(2, 'Le désert aride', 'assets\img\world2.png', 'https://vr.chopin.com/world2'),
(3, 'La Laponie enneigée', 'assets\img\world3.png', 'https://vr.chopin.com/world3'),
(4, 'Le brouillard de la foret', 'assets\img\world4.png', 'https://vr.chopin.com/world4'),
(5, 'La montagne escarpée', 'assets\img\world5.png', 'https://vr.chopin.com/world5')
ON DUPLICATE KEY UPDATE nameWorld=nameWorld;
