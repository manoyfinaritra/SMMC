-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : dim. 20 oct. 2024 à 14:31
-- Version du serveur : 11.2.2-MariaDB
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `port_toamasina2`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom`) VALUES
(1, 'Ordinateur Bureau'),
(2, 'Ordinateur Portable'),
(3, 'Routeur'),
(4, 'Imprimente'),
(5, 'Cameras'),
(6, 'Switcher'),
(7, 'Cable'),
(8, 'Wi-Fi ');

-- --------------------------------------------------------

--
-- Structure de la table `equipements`
--

DROP TABLE IF EXISTS `equipements`;
CREATE TABLE IF NOT EXISTS `equipements` (
  `id` int(125) NOT NULL AUTO_INCREMENT,
  `article` varchar(125) NOT NULL,
  `date` date NOT NULL,
  `marque` varchar(125) NOT NULL,
  `modele` varchar(125) NOT NULL,
  `processeur` varchar(125) NOT NULL,
  `ram` int(125) NOT NULL,
  `etat` varchar(125) NOT NULL,
  `etablissement` varchar(125) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `equipements`
--

INSERT INTO `equipements` (`id`, `article`, `date`, `marque`, `modele`, `processeur`, `ram`, `etat`, `etablissement`) VALUES
(68, 'Switcher', '2024-09-10', 'xp', 'xxx445', 'pas disponible', 16, 'en panne', 'Batiment 4'),
(71, 'Cameras', '2024-09-30', 'dell', 'rxx10t', 'pas diisponible', 2, 'operationnel', 'Batiment 6'),
(72, 'Ordinateur Bureau', '2024-08-28', 'asus', '455XLD', 'code i5 4th', 8, 'operationnel', 'Batiment 1'),
(73, 'Routeur', '2024-09-04', 'starlink', 'FCTTX4', 'dual core', 16, 'en panne', 'Batiment 9'),
(99, 'Imprimente', '2024-09-03', 'dell', 'xxxd6', 'dual core', 16, 'operationnel', 'Batiment 10'),
(100, 'Switcher', '2024-09-04', 'lonovo', 'CCCSD4', 'pas diisponible', 16, 'en panne', 'Batiment 1'),
(101, 'Switcher', '2024-09-03', 'hp', 'XXX5', 'pas diisponible', 8, 'en panne', 'Batiment 4'),
(103, 'Routeur', '2024-10-08', 'up', 'xxx455', 'coore', 16, 'operationnel', 'Batiment 1'),
(104, 'Routeur', '2024-10-08', 'up', 'xxx455', 'coore', 16, 'operationnel', 'Batiment 1');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id`, `nom`, `action`, `date`, `heure`) VALUES
(144, 'ANDRIANAIVORAVELONA', 'AjoutÃ© un nouvel Ã©quipement : Switcher', '2024-09-28', '06:56:41'),
(145, 'ANDRIANAIVORAVELONA', 'AjoutÃ© un nouvel Ã©quipement : Cameras', '2024-09-28', '14:26:49'),
(146, 'ANDRIANAIVORAVELONA', 'SupprimÃ© un Ã©quipement', '2024-09-28', '14:27:00'),
(147, 'ANDRIANAIVORAVELONA', 'AjoutÃ© un nouvel Ã©quipement : Routeur', '2024-10-01', '10:44:11'),
(148, 'ANDRIANAIVORAVELONA', 'AjoutÃ© un nouvel Ã©quipement : Routeur', '2024-10-01', '10:44:11'),
(149, 'ANDRIANAIVORAVELONA', 'SupprimÃ© un Ã©quipement', '2024-10-01', '10:44:24');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `nom`, `prenom`, `email`, `motdepasse`) VALUES
(27, 'ANDRIANAIVORAVELONA', 'manoy finaritra', 'manoyfinaritra@gmail.com', '$2y$10$1IyZT4FUUSKCHD7aViovmO37wRaoOLD5u8.U4XLmOc0TIIPJnr/J.'),
(29, 'RAMIANDRISOA', 'lido', '24rmslido@gmail.com', '$2y$10$CJo4Yz.xO67XmQ7BCxZuXepP.KoPFm4iEZhnl0uTs92HHwYlb7mg2'),
(30, 'manoy', 'manoy', 'manoy@gmail.com', '$2y$10$FX1KcWI8dDaM4XOvCC94w.33FVDPeoo4rpvJJervPIvtzG4zvQ6Uu'),
(31, 'mendrika', 'fitiavana', 'mendrikafitiavana@gmail.com', '$2y$10$4mTlELEXU60v2Et8wX/6duAzg1cLXX3dkkzlgEMxJ1WtZz97YwOJ2'),
(38, 'mama', 'mama', 'mama@gmail.com', '$2y$10$YfnueQ8IzOWSnuPk/DpLNOrzNpqa.lK4ZykWA.veTaqVt2Q28dzGu'),
(39, 'teste', 'teste', 'teste@gmail.com', '$2y$10$M/nRHNPiFQjyay77M7hczuxe72xcP1zTcjYgAFZC0cCsS5mYdoVuG'),
(40, 'teste2', 'teste2', 'teste2@gmail.com', '$2y$10$SpFc3yi6xSghgO1Usw4PZO6hMM9qB8SvJ1QI2i8kFk8d/RtMQJ35S'),
(41, 'mano', 'mano', 'mano@gmail.com', '$2y$10$dLInZzqfn3HM.AAvPj0DAesfad2sfqBR/U8H1bUsJIeKDu36rNRui'),
(42, 'aaaa', 'aaaa', 'aaaa@gmail.com', '$2y$10$CaiALnTKla5s04H0BkqLF.am9Fq15StY1UiciSlCAPuL7o6Q7nyUO'),
(43, 'bbbb', 'bbbb', 'bbbb@gmail.com', '$2y$10$UYAvT2q6oEHS1DAd5kuZfeUCH5LCv.0OsHDQbDy5J1Jq3i0wmVGB6'),
(44, 'bbb', 'bbb', 'bbb@gmail.com', '$2y$10$HSgujhj9swjtBxekTvwCW.4PB3zxabpMoRZ57aGYRXf7KdVAF/MOm'),
(45, 'eee', 'ffr', 'ff@fr.com', '$2y$10$edTzOR373T3VUOa1ooCECeCdWinFiOCAkJugm/zALD7xwwxIN2Oxq'),
(46, 'ff', 'frrf', 'frfr@gmail.com', '$2y$10$Q8pDeq5qjmeZNQvu/gUiAuRn3pti3KnCNkFS8/BLeDWP2bMGOM6h.'),
(47, 'aaa', 'aa', 'f@gmail.com', '$2y$10$IMZYfIKDboDSTDq6EYN7EeF7BumQqleZ9A5TU3C1kB.H0Qkso9Yvu'),
(48, 'aa', 'aa', 'aa@gmail.com', '$2y$10$QstO2CcRH4mtkUDTwKrnZOlAkyQRgJkbDopOQiH5cy05aaIOFtFNW'),
(49, 'a', 'a', 'a@gmail.com', '$2y$10$YhInPJ/5mnM1bc/l0HZ9h./egHmNCL.8bkowTGI5XMVOcD26EJx8G'),
(50, 'b', 'b', 'b@gmail.com', '$2y$10$1/d//Kobf1dWXPAeeaBm8O6JQMBw0m1irgiaFmRh3VKUUh91Foq8i'),
(51, 'rr', 'ee', 'rr@gmail.com', '$2y$10$qUIM5C5/kl.raer1aKcNw.Q87vLNjBx7FPf7rKH/UyB8wCyGGNP12'),
(52, 'aa', 'aa', 'a@gmail.fr', '$2y$10$pUd5D4tXq69ZAT/OfQWz/e1VccsXHaB0xgtwNIdFVm5NEGTczdziu'),
(53, 'aaa', 'gtr', 'aa@gmail.com', '$2y$10$zL8Yfqy46vK3GeTuPSr2gOAz4Rc5XpdFkkalAcyttfJhbwNhUqrx2'),
(54, 'aaa', 'fff', 'rr@fr.com', '$2y$10$HB1kiSaWBdkgQgPUJJ3sWOoOBXq16l/rPk9SEiMwY1udgQHcXSyvq'),
(55, 'aa', 'de', 'f@gmail.com', '$2y$10$hG2ie1g7S99Ryij6o6XUueEf1zUcQVz..mex8Y7wWfTzCFqvK3/5m'),
(56, 'manoy', 'fe', 'frf@gmail.com', '$2y$10$Ggq1/fo8sw4s6a4xBS/oaeN4dHLuMD5zHP7jb8wjHUKIDjBqfWp7G'),
(57, 'rrg', 'rrg', 'rreg@gg.com', '$2y$10$5/i6HuV4qxXBXdx8v7oz9OrSum4YL/AhU4nwhmwonARFRKgBC8a92'),
(58, 'a', 'frf', 'f@gmail.com', '$2y$10$m9dEkdCRtM8x6.ZyCfOa7.4a/71I8w/h5Wd816PTt3iIj0.ZWLKTW'),
(59, 'aaf', 'rr', 'rr@gmail.com', '$2y$10$.8YqFkVu/aiXlc5jEfQEOuryaym.TfTClQNJBTSaBh/4vaFLTUoYK'),
(60, 'efe', 'fff', 'ffer@gmail.com', '$2y$10$PY.Qdbrx5ADqoaCXaPKXNe.j1n2RypHGAqlhK.yA7cI6ox40VKyge'),
(61, 'fe', 'fre', 'ggr@gmail.com', '$2y$10$uGCvvZUS.l8jOCQ3q0KLIO9ca1/ixhu4/iqIwZmsSho47pV77ZGfq'),
(62, 'mendrika', 'fitiavana', 'mendrikafitiavana@gmail.com', '$2y$10$maj/JeaCZV79T1ZJrg9r4eHQZ70AyJ5eTrmxHhTSdJq4TQ35sAxqy'),
(63, 'man', 'grr', 'manoyf@gmail.com', '$2y$10$1qSfTLc40Bg9lvEyXkNekeAnmO3IJ.ZRr0UBv9rObNY3L7I2iJ5xm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
