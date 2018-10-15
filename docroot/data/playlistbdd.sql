-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le :  Dim 14 oct. 2018 à 21:13
-- Version du serveur :  5.7.23-log
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `playlistbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `playlisthasvideo`
--

CREATE TABLE `playlisthasvideo` (
  `id` int(11) NOT NULL,
  `playlist` int(11) NOT NULL,
  `video` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id`, `title`, `thumbnail`, `createdAt`, `updatedAt`) VALUES
(1, 'Video 1', 'https://secure-ds.serving-sys.com/BurstingRes/Site-44043/Type-28/18e10eee-ed40-4d6b-ae32-a44af450b1ea.webm', '2018-10-13 14:00:00', NULL),
(2, 'Video 2', 'https://secure-ds.serving-sys.com/BurstingRes/Site-44043/Type-28/18e10eee-ed40-4d6b-ae32-a44af450b1ea.webm', '2018-10-13 14:00:00', NULL),
(3, 'Video 3', 'https://secure-ds.serving-sys.com/BurstingRes/Site-44043/Type-28/18e10eee-ed40-4d6b-ae32-a44af450b1ea.webm', '2018-10-13 14:00:00', NULL),
(4, 'Video 4', 'https://secure-ds.serving-sys.com/BurstingRes/Site-44043/Type-28/18e10eee-ed40-4d6b-ae32-a44af450b1ea.webm', '2018-10-13 14:00:00', NULL),
(5, 'Video 5', 'https://secure-ds.serving-sys.com/BurstingRes/Site-44043/Type-28/18e10eee-ed40-4d6b-ae32-a44af450b1ea.webm', '2018-10-13 14:00:00', NULL),
(6, 'Video 6', 'https://secure-ds.serving-sys.com/BurstingRes/Site-44043/Type-28/18e10eee-ed40-4d6b-ae32-a44af450b1ea.webm', '2018-10-13 14:00:00', NULL),
(7, 'Video 7', 'https://secure-ds.serving-sys.com/BurstingRes/Site-44043/Type-28/18e10eee-ed40-4d6b-ae32-a44af450b1ea.webm', '2018-10-13 14:00:00', NULL),
(8, 'Video 8', 'https://secure-ds.serving-sys.com/BurstingRes/Site-44043/Type-28/18e10eee-ed40-4d6b-ae32-a44af450b1ea.webm', '2018-10-13 14:00:00', NULL),
(9, 'Video 9', 'https://secure-ds.serving-sys.com/BurstingRes/Site-44043/Type-28/18e10eee-ed40-4d6b-ae32-a44af450b1ea.webm', '2018-10-13 14:00:00', NULL),
(10, 'Video 10', 'https://secure-ds.serving-sys.com/BurstingRes/Site-44043/Type-28/18e10eee-ed40-4d6b-ae32-a44af450b1ea.webm', '2018-10-13 14:00:00', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `playlisthasvideo`
--
ALTER TABLE `playlisthasvideo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_id` (`video`),
  ADD KEY `playlist_id` (`playlist`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `playlisthasvideo`
--
ALTER TABLE `playlisthasvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `playlisthasvideo`
--
ALTER TABLE `playlisthasvideo`
  ADD CONSTRAINT `playlisthasvideo_ibfk_1` FOREIGN KEY (`playlist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
