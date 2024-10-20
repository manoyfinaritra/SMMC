-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 05 sep. 2024 à 15:19
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `port_toamasina`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipements`
--

CREATE TABLE `equipements` (
  `id` int(125) NOT NULL,
  `article` varchar(125) NOT NULL,
  `date` date NOT NULL,
  `marque` varchar(125) NOT NULL,
  `modele` varchar(125) NOT NULL,
  `processeur` varchar(125) NOT NULL,
  `ram` int(125) NOT NULL,
  `etat` varchar(125) NOT NULL,
  `etablissement` varchar(125) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `equipements`
--

INSERT INTO `equipements` (`id`, `article`, `date`, `marque`, `modele`, `processeur`, `ram`, `etat`, `etablissement`) VALUES
(19, 'bureau', '2024-08-13', 'Hp', 'fffff', 'vvrvr', 6, 'operationnel', 'manoy'),
(22, 'bureau', '2024-08-26', 'GGGG', 'HJ', 'BKJH', 32, 'operationnel', 'finaritra'),
(23, 'routeur', '2024-08-13', 'lenovo', 'aaa', 'ff', 6, 'operationnel', 'manoy'),
(25, 'imprimente', '2024-08-07', 'regergre', 'vfvfvf', 'sd', 6, 'operationnel', 'manoy');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id`, `nom`, `action`, `date`, `heure`) VALUES
(1, 'RAMIANDRISOA', 'Supprimé un équipement', '2024-09-05', '14:50:48'),
(3, 'RAMIANDRISOA', 'Ajouté un nouvel équipement : imprimente', '2024-09-05', '14:53:28'),
(4, 'ANDRIANAIVORAVELONA', 'Supprimé un équipement', '2024-09-05', '14:54:19'),
(5, 'RAMIANDRISOA', 'Supprimé un équipement', '2024-09-05', '15:05:28');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `nom`, `prenom`, `email`, `motdepasse`) VALUES
(27, 'ANDRIANAIVORAVELONA', 'manoy finaritra', 'manoyfinaritra@gmail.com', '$2y$10$1IyZT4FUUSKCHD7aViovmO37wRaoOLD5u8.U4XLmOc0TIIPJnr/J.'),
(29, 'RAMIANDRISOA', 'lido', '24rmslido@gmail.com', '$2y$10$CJo4Yz.xO67XmQ7BCxZuXepP.KoPFm4iEZhnl0uTs92HHwYlb7mg2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipements`
--
ALTER TABLE `equipements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipements`
--
ALTER TABLE `equipements`
  MODIFY `id` int(125) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
