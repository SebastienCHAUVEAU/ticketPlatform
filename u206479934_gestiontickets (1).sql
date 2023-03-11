-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 11 mars 2023 à 22:04
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u206479934_gestiontickets`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Nouvelle information'),
(2, 'Attente de traitement '),
(3, 'Attente retour client'),
(4, 'A facturer'),
(5, 'Facture');

-- --------------------------------------------------------

--
-- Structure de la table `tenants`
--

DROP TABLE IF EXISTS `tenants`;
CREATE TABLE IF NOT EXISTS `tenants` (
  `tenant_id` int(10) NOT NULL AUTO_INCREMENT,
  `tenant_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`tenant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tenants`
--

INSERT INTO `tenants` (`tenant_id`, `tenant_name`) VALUES
(1, 'Immotic'),
(4, 'B&amp;B'),
(7, 'H&ocirc;tel Savoie'),
(9, 'Boucherie ABC'),
(10, 'Halle Tony Garnier'),
(11, 'Departement du Rhone');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` int(10) NOT NULL AUTO_INCREMENT,
  `ticket_isActive` int(10) NOT NULL DEFAULT '1',
  `ticket_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_author` int(10) NOT NULL,
  `ticket_tenant` int(10) DEFAULT NULL,
  `ticket_category` int(10) NOT NULL DEFAULT '1',
  `ticket_openDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticket_updateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ticket_id`),
  KEY `ticket_tenant` (`ticket_tenant`),
  KEY `ticket_author` (`ticket_author`,`ticket_tenant`,`ticket_category`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `ticket_isActive`, `ticket_title`, `ticket_content`, `ticket_author`, `ticket_tenant`, `ticket_category`, `ticket_openDate`, `ticket_updateDate`) VALUES
(6, 0, 'Erreur backup', 'Backup non fonctionnel.', 1, 1, 2, '2007-02-23 10:52:21', '2007-02-23 10:52:21'),
(7, 0, 'Fibre coupee', 'Bonjour,\nNous avons constaté ce matin la présence d\'un câble rompu.', 1, 9, 2, '2007-02-23 01:53:16', '2007-02-23 01:53:16'),
(9, 1, 'Telephonie HS', 'Bonjour, notre fixe ne fonctionne toujours pas ', 1, 1, 3, '2007-02-23 01:59:07', '2007-02-23 01:59:07'),
(10, 1, 'Ceci est un test', 'Test M2M', 1, 1, 1, '2007-02-23 02:02:00', '2007-02-23 02:02:00'),
(17, 1, 'testPreprod', 'Contenu du ticket', 1, 1, 1, '2023-03-05 17:34:31', '2023-03-05 17:34:31'),
(22, 0, 'Test transaction', 'Essai de transaction', 1, 1, 1, '2023-03-09 15:57:13', '2023-03-09 15:57:13');

-- --------------------------------------------------------

--
-- Structure de la table `ticket_comments`
--

DROP TABLE IF EXISTS `ticket_comments`;
CREATE TABLE IF NOT EXISTS `ticket_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_ticket_id` int(20) NOT NULL,
  `comment_author_id` int(10) NOT NULL,
  `comment_content` longtext CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `ticket_comments`
--

INSERT INTO `ticket_comments` (`comment_id`, `comment_ticket_id`, `comment_author_id`, `comment_content`, `comment_date`) VALUES
(1, 1, 1, 'jkgkjggl', '2023-02-07 17:23:26'),
(2, 1, 1, 'La personne n\'a pas répondu à notre appel.', '2023-03-05 21:39:40'),
(3, 1, 1, 'L\'asterisk de la société a été désactivé. ', '2023-03-05 21:39:40'),
(4, 6, 1, 'Test de commentaire', '2023-03-06 11:15:49'),
(5, 6, 1, 'RÃ©ponse au commentaire de test.', '2023-03-06 11:16:04'),
(6, 6, 3, 'Commentaire de la part de Jean DUPONT', '2023-03-06 15:08:28'),
(10, 9, 3, 'Echange test', '2023-03-07 10:25:08');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_isAdmin` int(5) NOT NULL,
  `user_society` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_phone_number`, `user_password`, `user_isAdmin`, `user_society`) VALUES
(1, 'Bob', 'LENON', 'a@a.com', '0707070707', '$2y$10$ZsnM0nUSp1Xjf5YOu1vjNeV2iGsIapaGZGQPALMKTeY02G94Ddnmi', 1, 1),
(3, 'Jean', 'DUPONT', 'dupont.jean@gmail.com', '0888888888', '$2y$10$qT8QxRQX.cEDeSpxFOwJQuB46.MtwmP78lsnIhvD7feEvdrleCAQC', 1, 4),
(4, 'Examinateur', 'Jury', 'jury@jury.com', '0710101010', '$2y$10$RnWcc48ZBmJQpe8xcvvLWOTwQq.qFNlRJDUugN6IMPIjZEhJYIMUG', 1, 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_tenants_tickets` FOREIGN KEY (`ticket_tenant`) REFERENCES `tenants` (`tenant_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
