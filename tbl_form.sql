-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 25 mai 2019 à 08:54
-- Version du serveur :  10.1.34-MariaDB
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `castel`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_form`
--

CREATE TABLE `tbl_form` (
  `form_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `form_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_password` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_desc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_form`
--

INSERT INTO `tbl_form` (`form_id`, `user_id`, `form_name`, `form_password`, `form_desc`) VALUES
(3, 1, 'toto', '5ce8e999078f3', 'trotro'),
(4, 2, 'uniqid', '5ce84333831cf', 'is for the win'),
(27, 1, 'toto', '5ce84302334ff', 'tonton'),
(28, 2, '123', '5ce843432ce22', 'in the wood'),
(29, 10, 'opl', '5ce8448aa7003', '123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_form`
--
ALTER TABLE `tbl_form`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `tbl_form` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_form`
--
ALTER TABLE `tbl_form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tbl_form`
--
ALTER TABLE `tbl_form`
  ADD CONSTRAINT `tbl_form` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
