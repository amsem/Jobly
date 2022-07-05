-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 05 juil. 2022 à 18:19
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-recrutement`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `user` varchar(5) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `user`, `password`) VALUES
(1, 'admin', '$2y$10$wUkx3o.hUZWKAjAZ2aPJbuBJJgl2VXVLi9RkC.zYkOpWBHnwxGou6');

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_de_naissance` varchar(20) NOT NULL,
  `cv` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`nom`, `prenom`, `email`, `password`, `date_de_naissance`, `cv`, `photo`) VALUES
('Schram', 'Jeffrey', 'omaroudjoudi16@gmail.com', '$2y$10$GtdztoOS3SFu0vrQSSLv1OpIIAAMaG7Lh.znQEt9cGnId4OVl26TK', '2022-06-15', 'concep.docx', 'testimonial-3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `candidature_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `portfolio` varchar(15) NOT NULL,
  `coverletter` varchar(200) NOT NULL,
  `etat` varchar(10) NOT NULL DEFAULT 'En cours',
  `recruteur_email` varchar(30) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`candidature_id`, `date`, `portfolio`, `coverletter`, `etat`, `recruteur_email`, `job_id`, `user_email`) VALUES
(38, '2022-07-05', 'www.test.com', 'je suis tres motivee', 'refuser', 'omarkhelifi@gmail.com', 31, 'omaroudjoudi16@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`nom`) VALUES
('Back-End'),
('Data science'),
('Data-engineer'),
('Front-End'),
('IT'),
('Mobile developer'),
('Software engineering');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `job_desc` longtext NOT NULL,
  `salary` int(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `job_desc`, `salary`, `type`, `place`, `user_email`, `date`, `category`) VALUES
(31, 'Développeur Mobile ANDROID', 'Profil :\r\nPlus de  4 ans d’expérience dans le développement ANDROID.\r\n\r\nExpérience dans un environnement de développement  agile / scrum .\r\n\r\nMissions :\r\nAnalysis, Design , Development and testing: participation in all phases of a project\'s life cycle.\r\n\r\nParticipation dans tous les phases de projets : Analyse , conception , développement\r\n\r\nCompétences :\r\n\r\n\r\nMaîtrise de Java.\r\n\r\nMaîtrise de Kotlin .\r\n\r\nMaîtrise de Android UI et la création des interfaces UI .\r\n\r\nMaîtrise de Jetpack Compose.\r\n\r\nMaîtrise d\' Android SQLite.\r\n\r\nMaîtrise de communication via les web sockets .\r\n\r\nMaîtrise  WebService et API Integration (RESTful, etc.)\r\n\r\ngit (avancé).', 60000, 'full time', 'Alger, Algérie', 'omarkhelifi@gmail.com', '2022-07-05', 'Mobile developer');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `email_from` varchar(255) NOT NULL,
  `email_to` varchar(255) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `recruteur`
--

CREATE TABLE `recruteur` (
  `email` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `entreprise` varchar(50) NOT NULL,
  `tel` int(10) NOT NULL,
  `valider` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `date_de_naissance` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recruteur`
--

INSERT INTO `recruteur` (`email`, `nom`, `prenom`, `entreprise`, `tel`, `valider`, `password`, `date_de_naissance`, `photo`) VALUES
('aomar.khelifi2001@gmail.com', 'Schank', 'Teresa ', 'International Hearts', 567483920, 1, '$2y$10$LmK87im/88rTKXh3QpDuuOw3Jor3sU2apIWJEq0zjMQScItl2NtKC', '2022-07-29', 'com-logo-2.jpg'),
('omarkhelifi@gmail.com', 'Alexander', 'Jennifer', 'TechCom', 543675895, 1, '$2y$10$yyAI4SL8HRzQDmTMnbjNh.C7.kg0.VMUGid5m8B8Gd1vdRbUz2J5m', '2022-07-19', 'com-logo-1.jpg'),
('test@gmail.com', 'Evelyn ', 'Hoffman', 'DataXchange', 758364758, 0, '$2y$10$TgNwx1ymg7craiRP04DRJe7ou7CaqTk243D4MwjoAUzhTxkF1wfYS', '', 'com-logo-3.jpg'),
('testskal1@gmail.com', 'Heather ', 'Huffman', 'FuzionSource', 654789374, 1, '$2y$10$WdhGd3yIflf2C0EBbd50B.jFdAwv17JRdrwIYUZgSlEEAayv3Ehvm', '', 'com-logo-4.jpg'),
('user@gmail.com', 'Sylvia ', 'Spencer', 'BlueFlare', 543643267, 0, '$2y$10$supbdDo734pImtWskqoKmefiz.W8iyro2cgey./Xkyv5tfwFT4hLC', '', 'com-logo-5.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`candidature_id`),
  ADD KEY `uesr_email` (`user_email`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `recruteur_email` (`recruteur_email`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `category` (`category`),
  ADD KEY `user_email` (`user_email`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recruteur`
--
ALTER TABLE `recruteur`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `candidature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `recruteur_email` FOREIGN KEY (`recruteur_email`) REFERENCES `recruteur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uesr_email` FOREIGN KEY (`user_email`) REFERENCES `candidat` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
