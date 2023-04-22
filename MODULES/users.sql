-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 01 avr. 2023 à 09:54
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `all_users`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `username` char(15) NOT NULL,
  `email` char(30) NOT NULL,
  `passwords` char(32) NOT NULL,
  `sign_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`users_id`, `username`, `email`, `passwords`, `sign_stamp`) VALUES
(1, 'blabla', 'ghjk1234@gmail.com', '2482ab22d028d75c95b12ca94e1a8cb0', '2023-03-31 17:45:14'),
(2, 'ddfg+-//-05694', 'gdsffshjk1234@gmail.com', '381f994f69a06c79924dcc796bc1ee7f', '2023-03-31 17:47:52'),
(3, 'dfghdfhdh', 'ottotot8695@gmail.com', 'b77bcac311f6764879926604b4aceba0', '2023-03-31 17:49:21'),
(4, 'achraf', 'achrafalaoui14@gmail.com', '91c55e7c930cdeee4f5e3f7bda6ef0bd', '2023-03-31 18:29:56'),
(5, 'pop', 'pop14@gmail.com', '97f210cef51fb1817e9a6f1ef92b80cc', '2023-03-31 23:58:33');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
