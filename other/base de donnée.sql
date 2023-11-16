-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 10 nov. 2023 à 09:53
-- Version du serveur : 8.0.35-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `michellc`
--

-- --------------------------------------------------------

--
-- Structure de la table `rallyevideo_role`
--

CREATE TABLE `rallyevideo_role` (
  `idrole` int NOT NULL,
  `nom_autorisation` varchar(45) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rallyevideo_role`
--

INSERT INTO `rallyevideo_role` (`idrole`, `nom_autorisation`) VALUES
(2, 'admin'),
(1, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `rallyevideo_team`
--

CREATE TABLE `rallyevideo_team` (
  `idteam` int NOT NULL,
  `nom_equipe` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `depot` tinyint NOT NULL,
  `idcreateur` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rallyevideo_user`
--

CREATE TABLE `rallyevideo_user` (
  `iduser` int UNSIGNED NOT NULL,
  `nom` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role_idrole` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rallyevideo_user`
--

INSERT INTO `rallyevideo_user` (`iduser`, `nom`, `prenom`, `email`, `password`, `role_idrole`) VALUES
(2, 'Buisson', 'Noah', 'noahbuisson22.nb@gmail.com', '2c041b80f985499d6d059aafda3c929d57013f59950fd6e605cf18449cafc988', 2),
(3, 'Michel', 'Jean', 'jeamnmichel@mail.fr', 'ce582a2147c0e501b2d41f898d8f690a942cb56f4b4abf8d66354d85eb07fa36', 2),
(4, 'Malou', 'Eddy', 'eddymalou@mail.fr', 'eddymalou', 1),
(5, 'Mirabel', 'Paul', 'paulmirabel@mail.fr', '9d87609a3584d3fca24b7084dc445c5b6f5b8ac2c6db3a1fb0d3ab7ffe27e042', 1),
(6, 'Herude', 'Jean', 'jeandheaue@gmail.fr', 'jeanheud', 1),
(7, 'Patrick', 'Chirac', 'chiracpatrick@gmail.com', '893139f4d511c4f37321d7cf66d0442835789f07cd1e3fea974537d22c431ab5', 2),
(8, 'Michel', 'Hallyday', 'michelhallyday@gmail.com', 'hallydayjtaime', 1),
(9, 'Morue', 'Poisson', 'poissonmorue@mail.fr', 'jadorelepoisson', 1),
(10, 'Niska', 'Pouloulou', 'pou@lou.fr', 'pouloulapoule', 1),
(11, 'Doe', 'John', 'john.doe@example.com', 'hashed_password', 1),
(12, 'Smith', 'Alice', 'alice.smith@example.com', 'hashed_password', 1),
(13, 'Johnson', 'Bob', 'bob.johnson@example.com', 'hashed_password', 1),
(14, 'Taylor', 'Emma', 'emma.taylor@example.com', 'hashed_password', 1),
(15, 'Brown', 'David', 'david.brown@example.com', 'hashed_password', 1),
(16, 'Davis', 'Olivia', 'olivia.davis@example.com', 'hashed_password', 1),
(17, 'Wilson', 'James', 'james.wilson@example.com', 'hashed_password', 1),
(18, 'Anderson', 'Sophia', 'sophia.anderson@example.com', 'hashed_password', 1),
(19, 'Thomas', 'Liam', 'liam.thomas@example.com', 'hashed_password', 1),
(20, 'White', 'Ava', 'ava.white@example.com', 'hashed_password', 1),
(21, 'Garcia', 'Sophie', 'sophie.garcia@example.com', 'hashed_password', 1),
(22, 'Lee', 'Michael', 'michael.lee@example.com', 'hashed_password', 1),
(23, 'Ramirez', 'Isabella', 'isabella.ramirez@example.com', 'hashed_password', 1),
(24, 'Evans', 'Daniel', 'daniel.evans@example.com', 'hashed_password', 1),
(25, 'Turner', 'Emily', 'emily.turner@example.com', 'hashed_password', 1),
(26, 'Wright', 'William', 'william.wright@example.com', 'hashed_password', 1),
(27, 'Lopez', 'Sophia', 'sophia.lopez@example.com', 'hashed_password', 1),
(28, 'Baker', 'Aiden', 'aiden.baker@example.com', 'hashed_password', 1),
(29, 'Hall', 'Grace', 'grace.hall@example.com', 'hashed_password', 1),
(30, 'Young', 'Jackson', 'jackson.young@example.com', 'hashed_password', 1),
(31, 'Scott', 'Abigail', 'abigail.scott@example.com', 'hashed_password', 1),
(32, 'King', 'Elijah', 'elijah.king@example.com', 'hashed_password', 1),
(33, 'Hill', 'Scarlett', 'scarlett.hill@example.com', 'hashed_password', 1),
(34, 'Adams', 'Benjamin', 'benjamin.adams@example.com', 'hashed_password', 1),
(35, 'Fisher', 'Chloe', 'chloe.fisher@example.com', 'hashed_password', 1),
(36, 'Reed', 'Logan', 'logan.reed@example.com', 'hashed_password', 1),
(37, 'Perez', 'Lily', 'lily.perez@example.com', 'hashed_password', 1),
(38, 'Morgan', 'Gabriel', 'gabriel.morgan@example.com', 'hashed_password', 1),
(39, 'Cooper', 'Zoe', 'zoe.cooper@example.com', 'hashed_password', 1),
(40, 'Rossi', 'Nicholas', 'nicholas.rossi@example.com', 'hashed_password', 1),
(200, 'Michellod', 'Clément', 'clement.michellod@gmail.com', '665305c2f136b3c57f3282be02c0a8a9d0e7b92787a16c01bc401904ed42145a', 2);

-- --------------------------------------------------------

--
-- Structure de la table `rallyevideo_user_has_team`
--

CREATE TABLE `rallyevideo_user_has_team` (
  `user_iduser` int UNSIGNED NOT NULL,
  `team_idteam` int NOT NULL,
  `equipe` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `rallyevideo_role`
--
ALTER TABLE `rallyevideo_role`
  ADD PRIMARY KEY (`idrole`),
  ADD UNIQUE KEY `nom_autorisation_UNIQUE` (`nom_autorisation`);

--
-- Index pour la table `rallyevideo_team`
--
ALTER TABLE `rallyevideo_team`
  ADD PRIMARY KEY (`idteam`,`idcreateur`),
  ADD UNIQUE KEY `idequipes_UNIQUE` (`idteam`),
  ADD UNIQUE KEY `nom_equipe_UNIQUE` (`nom_equipe`),
  ADD KEY `fk_rallyevideo_team_rallyevideo_user1_idx` (`idcreateur`);

--
-- Index pour la table `rallyevideo_user`
--
ALTER TABLE `rallyevideo_user`
  ADD PRIMARY KEY (`iduser`,`role_idrole`),
  ADD UNIQUE KEY `idusers_UNIQUE` (`iduser`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_user_role_idx` (`role_idrole`);

--
-- Index pour la table `rallyevideo_user_has_team`
--
ALTER TABLE `rallyevideo_user_has_team`
  ADD PRIMARY KEY (`user_iduser`,`team_idteam`),
  ADD KEY `fk_user_has_team_team1_idx` (`team_idteam`),
  ADD KEY `fk_user_has_team_user1_idx` (`user_iduser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `rallyevideo_role`
--
ALTER TABLE `rallyevideo_role`
  MODIFY `idrole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rallyevideo_team`
--
ALTER TABLE `rallyevideo_team`
  MODIFY `idteam` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `rallyevideo_user`
--
ALTER TABLE `rallyevideo_user`
  MODIFY `iduser` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rallyevideo_team`
--
ALTER TABLE `rallyevideo_team`
  ADD CONSTRAINT `fk_rallyevideo_team_rallyevideo_user1` FOREIGN KEY (`idcreateur`) REFERENCES `rallyevideo_user` (`iduser`);

--
-- Contraintes pour la table `rallyevideo_user`
--
ALTER TABLE `rallyevideo_user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_idrole`) REFERENCES `rallyevideo_role` (`idrole`);

--
-- Contraintes pour la table `rallyevideo_user_has_team`
--
ALTER TABLE `rallyevideo_user_has_team`
  ADD CONSTRAINT `fk_user_has_team_team1` FOREIGN KEY (`team_idteam`) REFERENCES `rallyevideo_team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_has_team_user1` FOREIGN KEY (`user_iduser`) REFERENCES `rallyevideo_user` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
