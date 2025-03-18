-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 jan. 2024 à 17:10
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fst`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `ID_annonce` int(11) NOT NULL,
  `ID_utilisateur` bigint(20) UNSIGNED DEFAULT NULL,
  `ID_module` int(11) DEFAULT NULL,
  `Type_annonce` varchar(255) DEFAULT NULL,
  `Contenu` text DEFAULT NULL,
  `ID_filiere` int(11) DEFAULT NULL,
  `ID_departement` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titre` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`ID_annonce`, `ID_utilisateur`, `ID_module`, `Type_annonce`, `Contenu`, `ID_filiere`, `ID_departement`, `created_at`, `updated_at`, `titre`) VALUES
(1, 58, 1, 'Module', 'This is a sample announcement for Module 1', NULL, NULL, '2024-01-21 11:00:12', '2024-01-21 11:00:12', ''),
(2, 59, 2, 'Module', 'This is a sample announcement for Module 2', NULL, NULL, '2024-01-21 10:00:12', '2024-01-21 10:00:12', 'Test test'),
(3, 58, 1, 'rencontre', 'This is an annonce for the module 1', NULL, NULL, '2024-01-21 10:51:25', '2024-01-21 10:51:25', ''),
(4, 61, 4, 'pfe', 'This is une anonce dial MODULE 4 eadla PROF 4', NULL, NULL, '2024-01-21 10:54:21', '2024-01-21 10:54:21', ''),
(5, 62, 5, 'Annulation Examen', 'Examen dialkom kan lah wba9i lah, PROF 5 awla4 mab9icth 3a9l', NULL, NULL, '2024-01-21 10:58:32', '2024-01-21 10:58:32', ''),
(6, 70, NULL, 'Test', 'Test respo filiere 1', 1, NULL, '2024-01-22 11:25:19', '2024-01-22 11:25:19', ''),
(9, 74, NULL, 'StudentDashboard', 'Test chef dep 2 Student Dashbpard', NULL, 2, '2024-01-22 13:31:50', '2024-01-22 13:31:50', ''),
(11, 73, NULL, 'StudentDashboard', 'test chef dep 1 student dashboard', NULL, 1, '2024-01-22 13:37:39', '2024-01-22 13:37:39', ''),
(12, 73, NULL, 'Homepage', 'Annonce dans les bannonce', NULL, 1, '2024-01-22 15:00:00', '2024-01-22 15:00:00', 'Titre pour annonce'),
(13, 61, NULL, 'Annulation Examen', 'Test', 2, NULL, '2024-01-24 21:01:36', '2024-01-24 21:01:36', 'test titre\r\n'),
(14, 70, NULL, 'annonce fil 1', 'test', 1, NULL, '2024-01-24 21:03:51', '2024-01-24 21:03:51', NULL),
(15, 70, NULL, 'test type', 'test contenu', 1, NULL, '2024-01-24 21:07:40', '2024-01-24 21:07:40', 'test titre'),
(16, 73, NULL, 'Homepage', 'test homepage annonce', NULL, 1, '2024-01-24 21:10:20', '2024-01-24 21:10:20', 'test homepage titre'),
(17, 73, NULL, 'StudentDashboard', 'test etudiant', NULL, 1, '2024-01-25 10:39:16', '2024-01-25 10:39:16', 'test etudiant titre');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `ID_classe` int(11) NOT NULL,
  `Nom_classe` varchar(255) DEFAULT NULL,
  `ID_departement` int(11) DEFAULT NULL,
  `id_etudiante1` bigint(20) UNSIGNED DEFAULT NULL,
  `id_etudiante2` bigint(20) UNSIGNED DEFAULT NULL,
  `id_filiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`ID_classe`, `Nom_classe`, `ID_departement`, `id_etudiante1`, `id_etudiante2`, `id_filiere`) VALUES
(1, 'AD_PROMO1', 1, 64, 65, NULL),
(2, 'IDIA_PROMO1', 1, 66, 67, NULL),
(3, 'GI_PROMO2', 2, 68, 69, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `classusers`
--

CREATE TABLE `classusers` (
  `id_module` int(11) NOT NULL,
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL,
  `id_classe` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `id_filiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classusers`
--

INSERT INTO `classusers` (`id_module`, `id_utilisateur`, `id_classe`, `updated_at`, `created_at`, `id_filiere`) VALUES
(1, 58, 1, NULL, NULL, NULL),
(1, 67, 1, NULL, NULL, NULL),
(2, 60, 2, NULL, NULL, NULL),
(4, 62, 1, NULL, NULL, NULL),
(5, 61, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id_demande` int(11) NOT NULL,
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL,
  `id_module` int(11) DEFAULT NULL,
  `id_filiere` int(11) DEFAULT NULL,
  `contenu` text NOT NULL,
  `status` enum('non_vue','en_cours','traite') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` enum('professeur','responsable_filiere','delegue') NOT NULL DEFAULT 'professeur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id_demande`, `id_utilisateur`, `id_module`, `id_filiere`, `contenu`, `status`, `created_at`, `updated_at`, `type`) VALUES
(1, 65, 2, 1, 'ddd', 'traite', '2024-01-23 09:29:30', '2024-01-23 10:15:13', 'responsable_filiere'),
(2, 66, 2, 1, 'Test for en cours', 'traite', '2024-01-23 11:09:15', '2024-01-23 10:13:31', 'professeur'),
(3, 67, 3, 2, 'test for the traite', 'traite', '2024-01-23 11:09:15', '2024-01-23 11:09:15', 'professeur'),
(4, 66, 3, 2, 'This is a test, made by ETU 3 should be read by Respo_Fil 2 as non_vue', 'traite', '2024-01-23 10:22:10', '2024-01-23 10:22:36', 'responsable_filiere'),
(5, 64, 1, 1, 'eee', 'traite', '2024-01-23 14:09:21', '2024-01-23 14:12:50', 'responsable_filiere'),
(6, 64, 1, 1, 'delegue', 'traite', '2024-01-23 14:10:17', '2024-01-23 14:12:14', 'delegue'),
(7, 64, 1, 1, 'signale problem', 'traite', '2024-01-24 20:57:27', '2024-01-24 20:58:05', 'delegue'),
(8, 64, 1, 1, 'Test etu prof', 'traite', '2024-01-25 12:42:37', '2024-01-25 12:55:56', 'professeur'),
(9, 64, 1, 1, 'test etu respo fil', 'non_vue', '2024-01-25 12:42:52', '2024-01-25 12:42:52', 'responsable_filiere'),
(10, 64, 1, 1, 'test del respo fil', 'traite', '2024-01-25 12:43:03', '2024-01-25 13:28:00', 'delegue');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `ID_departement` int(11) NOT NULL,
  `Nom_departement` varchar(255) DEFAULT NULL,
  `id_utilisateur` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`ID_departement`, `Nom_departement`, `id_utilisateur`, `updated_at`) VALUES
(1, 'GÉNIE INFORMATIQUE', 73, '2024-01-24 21:17:27'),
(2, 'GÉNIE ELECTRIQUE', 74, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `departementusers`
--

CREATE TABLE `departementusers` (
  `id_departement` int(11) NOT NULL,
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `departementusers`
--

INSERT INTO `departementusers` (`id_departement`, `id_utilisateur`) VALUES
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 70),
(1, 71),
(1, 73),
(2, 62),
(2, 63),
(2, 68),
(2, 69),
(2, 72),
(2, 74);

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE `emploi` (
  `ID` int(11) NOT NULL,
  `ID_prof` bigint(20) UNSIGNED NOT NULL,
  `id_module` int(11) DEFAULT NULL,
  `ID_Salle` int(11) DEFAULT NULL,
  `ID_departement` int(11) DEFAULT NULL,
  `Crenaux` enum('9:00','11:00','13:00','15:00','17:00') DEFAULT NULL,
  `Jours` enum('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Dimanche') DEFAULT NULL,
  `raison` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`ID`, `ID_prof`, `id_module`, `ID_Salle`, `ID_departement`, `Crenaux`, `Jours`, `raison`, `created_at`, `updated_at`) VALUES
(5, 58, 2, 6, NULL, '13:00', 'Mercredi', 'dd', '2024-01-23 19:45:25', '2024-01-23 19:45:25'),
(6, 58, 2, 6, NULL, '13:00', 'Mercredi', 'dd', '2024-01-23 19:45:31', '2024-01-23 19:45:31'),
(7, 59, 2, 2, 1, '11:00', 'Vendredi', 'dd', '2024-01-24 07:30:07', '2024-01-24 07:30:07'),
(8, 62, 4, 5, NULL, '13:00', 'Vendredi', 'Test', '2024-01-24 21:52:54', '2024-01-24 21:52:54'),
(9, 60, 2, 2, 1, '9:00', 'Lundi', 'test', '2024-01-25 12:57:22', '2024-01-25 12:57:22');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id_departement` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_utilisateur` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `nom`, `description`, `id_departement`, `created_at`, `updated_at`, `id_utilisateur`) VALUES
(1, 'Analytique des données', 'La Licence Science et Techniques en analytique des données permet aux étudiants de doter de compétences en matière d\'outils informatiques, des techniques et des méthodes statistiques pour permettre d’organiser, de synthétiser et de traduire efficacement les données métier d’une organisation. L\'étudiant doit être en mesure d\'apporter un appui analytique à la conduite d\'exploration et à l\'analyse complexe de données.', 1, '2024-01-24 20:45:11', NULL, 60),
(2, 'Ingénierie de développement d’applications informatiques', 'La Licence Science et Technique permet aux étudiants en Ingénierie de développement d’applications informatiques de :\r\n- Avoir une culture de base scientifique.\r\n- Acquérir une base solide dans les axes majeurs et fondamentaux de la discipline informatique : algorithmique, programmation, bases de données, systèmes d’exploitation et réseaux.\r\n- Développer un savoir-faire technique en informatique : technologie objet, informatique distribuée, architectures client-serveur et n-tiers, applications hétérogènes...\r\n- Améliorer leur niveau d’anglais.\r\n- Avoir une culture d’entreprise suffisante pour se faire une idée concrète sur le monde du travail.', 1, '2024-01-24 20:45:11', NULL, 59),
(3, 'Génie Electrique Option: Génie Electrique & Système Industriel', 'L’objectif de la licence Génie électrique est de donner aux étudiants les éléments de base en physique mathématique et informatique et de leur apporter une formation solide dans les domaines du génie électrique, en particulier en électronique électrotechnique. Ce qui leur permettra de préparer un master à dominante ingénierie EEA ou d’intégrer les grandes écoles d’ingénieurs. Ils pourront aussi se présenter aux différentes fonctions publiques ou privées exigeant le niveau de la licence.', 2, '2024-01-24 20:45:11', NULL, 63),
(4, 'test filiere 1', 'test filiere 1', NULL, '2024-01-24 22:23:15', '2024-01-24 13:10:09', 70),
(5, 'test filiere 1', 'test filiere 1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `filiereusers`
--

CREATE TABLE `filiereusers` (
  `id_filiere` int(11) NOT NULL,
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `filiereusers`
--

INSERT INTO `filiereusers` (`id_filiere`, `id_utilisateur`) VALUES
(1, 58),
(1, 59),
(1, 64),
(1, 65),
(1, 70),
(2, 60),
(2, 61),
(2, 66),
(2, 67),
(2, 71),
(3, 62),
(3, 63),
(3, 68),
(3, 69),
(3, 72),
(4, 70);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_01_01_182215_create_utilisateurs_table', 1),
(5, '2024_01_02_172006_add_timestamps_to_utilisateurs_table', 2),
(6, '2024_01_21_102600_add_timestamps_to_annonce_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id_module` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id_filiere` int(11) DEFAULT NULL,
  `id_utilisateur` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id_module`, `nom`, `description`, `id_filiere`, `id_utilisateur`, `updated_at`) VALUES
(1, 'Mathématiques pour la science des données', 'Mathématiques pour la science des données', 1, 60, NULL),
(2, 'Fondamentaux des bases de données', 'Fondamentaux des bases de données', 1, 72, NULL),
(3, 'Systèmes et réseaux informatiques', 'Systèmes et réseaux informatiques', 2, 63, NULL),
(4, 'Programmation Orientée Objet en C++/Java', 'Programmation Orientée Objet en C++/Java', 2, 61, NULL),
(5, 'Traitement de signal & Télécommunication', 'Traitement de signal & Télécommunication', 3, 62, NULL),
(6, 'Automatismes', 'Automatismes', 3, 61, '2024-01-24 21:29:23');

-- --------------------------------------------------------

--
-- Structure de la table `moduleusers`
--

CREATE TABLE `moduleusers` (
  `id_module` int(11) NOT NULL,
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `moduleusers`
--

INSERT INTO `moduleusers` (`id_module`, `id_utilisateur`) VALUES
(1, 58),
(1, 64),
(2, 59),
(2, 65),
(3, 60),
(3, 66),
(4, 61),
(4, 67),
(5, 62),
(5, 68),
(6, 61),
(6, 63),
(6, 69);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `ID_salle` int(11) NOT NULL,
  `Nom_salle` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `ID_departement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`ID_salle`, `Nom_salle`, `Type`, `ID_departement`) VALUES
(1, 'E15', 'cours', 1),
(2, 'E13', 'cours', 1),
(3, 'C01', 'cours', 2),
(4, 'C02', 'cours', 2),
(5, 'G01', NULL, NULL),
(6, 'G02', 'cours', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `supports`
--

CREATE TABLE `supports` (
  `ID_support` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL DEFAULT '',
  `CNE` varchar(255) NOT NULL DEFAULT '',
  `demande` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `supports`
--

INSERT INTO `supports` (`ID_support`, `nom`, `CNE`, `demande`, `created_at`, `updated_at`) VALUES
(2, 'dd', 'dd', 'dd', NULL, NULL),
(3, 'test', 'test', 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('delegue','etudiant','professeur','responsable_filiere','chef_departement','responsable_pedagogique') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `password`, `role`) VALUES
(58, 'Prof ', '1', 'prof1@ac ', '$2y$10$nvYAB3hRydgn1szRarHwEuq9TbUIkAMos1uNkn6LfIeT5PdGaiFYG', 'professeur'),
(59, 'prof', '2', 'prof2@ac', '$2y$10$xlPaFbUUyYI34PDWRTMWG.808ev6pb9XiF8CssqTojePwLg7PSihS', 'professeur'),
(60, 'prof', '3', 'prof3@ac', '$2y$10$53HRenYMwVPZjLjZf1oOLuwWew3y4qySPQuGQXI2aRisvfpMd5zjy', 'professeur'),
(61, 'prof', '4', 'prof4@ac', '$2y$10$w6tRxwxvO/BPDSnRIfcWoe9whOMruzJshdTqic56n6KDNPNVWcKDq', 'professeur'),
(62, 'prof', '5', 'prof5@ac', '$2y$10$F80x8Obsy.VzwTK/WhYYyegNJg1dEIMELoAI2VVO8Ljw4KGgmqQrO', 'professeur'),
(63, 'prof', '6', 'prof6@ac', '$2y$10$/IrY3px96MSogNHvGgZDseV5x68mIXb54ZyS0rlFFJPGQxtm3RRpK', 'professeur'),
(64, 'etu/delegue', '1', 'etu1@ac', '$2y$10$LjknxPxhIWkx43T8HmDF2upBMc.gKzqr5ynRaKEKsCsYWx4o/ytoi', 'delegue'),
(65, 'etu', '2', 'etu2@ac', '$2y$10$1C/OIH2kLwEnzhoaFgf8IeOXkcBqB2jn8Z3ksd1ReB6RMt96sumSS', 'etudiant'),
(66, 'etu', '3', 'etu3@ac', '$2y$10$qZMizJCOyDYEnYf9TX8JzuSkeQr5No5z0rEOSWbMqkOY259KTUIDi', 'etudiant'),
(67, 'etu', '4', 'etu4@ac', '$2y$10$InVA.qQvKPAJTLwnb2/O1.zGEWzn2pRUpKxLPil7Z7ifh41zu/fv.', 'etudiant'),
(68, 'etu', '5', 'etu5@ac', '$2y$10$MYRwVWLGdO5LSDsWKxVKjeH0fjkYqEu7tr/gpYsk7MVvPlRlXZlz2', 'etudiant'),
(69, 'etu', '6', 'etu6@ac', '$2y$10$ovVckuRUTOFdIsPxip3FceTTDI9oaZuLvmYRaOH5gRZ45L7lkvU3m', 'etudiant'),
(70, 'respo_fil 1', '1', 'respo_fil1@ac', '$2y$10$Ou5pXybM.zlTNtDVBkLTA.vlK7boQDyIQUzuNxGWURB26lhbJbje2', 'responsable_filiere'),
(71, 'respo_fil 2', '2', 'respo_fil2@ac', '$2y$10$hgKmfduxA61kOvXThJy9bOG.yoXI2RG/ZVNZEF64zAZ5B1jV.ZP.m', 'responsable_filiere'),
(72, 'respo_fil 3', '3', 'respo_fil3@ac', '$2y$10$i0ZRabLTELkj2t4AQrp8LOvqZCKV.CngcYUCidov.ijHfrudzZLXm', 'responsable_filiere'),
(73, 'chef_dep1', '1', 'chef_dep1@ac', '$2y$10$qr0qNVHCIPo/E3HVVX.BC.xektxBHGKrBPYm.v9aP6OFJVJRoZtnK', 'chef_departement'),
(74, 'chef_dep2', '2', 'chef_dep2@ac', '$2y$10$Ap1SJZmvndyCR8GsKtxUFeW.Zh9vW3.NWISKqGaPcaPxwuDCaLe7K', 'chef_departement'),
(75, 'respo_peda1', '1', 'respo_peda1@ac', '$2y$10$CLUMyr8It5q6jDfRZxwlY.nc8x3yuwKUUVH9dipLWQZisnZ73Ks.2', 'responsable_pedagogique');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`ID_annonce`),
  ADD KEY `ID_utilisateur` (`ID_utilisateur`),
  ADD KEY `ID_module` (`ID_module`),
  ADD KEY `ID_filiere` (`ID_filiere`),
  ADD KEY `ID_departement` (`ID_departement`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`ID_classe`),
  ADD KEY `ID_departement` (`ID_departement`),
  ADD KEY `fk_etudiante1` (`id_etudiante1`),
  ADD KEY `fk_etudiante2` (`id_etudiante2`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Index pour la table `classusers`
--
ALTER TABLE `classusers`
  ADD PRIMARY KEY (`id_module`,`id_utilisateur`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `fk_id_classe` (`id_classe`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id_demande`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_module` (`id_module`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`ID_departement`),
  ADD KEY `fk_departement_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `departementusers`
--
ALTER TABLE `departementusers`
  ADD PRIMARY KEY (`id_departement`,`id_utilisateur`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_prof` (`ID_prof`),
  ADD KEY `ID_module` (`id_module`),
  ADD KEY `ID_Salle` (`ID_Salle`),
  ADD KEY `ID_departement` (`ID_departement`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`),
  ADD KEY `id_departement` (`id_departement`),
  ADD KEY `fk_filiere_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `filiereusers`
--
ALTER TABLE `filiereusers`
  ADD PRIMARY KEY (`id_filiere`,`id_utilisateur`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`),
  ADD KEY `id_filiere` (`id_filiere`),
  ADD KEY `fk_module_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `moduleusers`
--
ALTER TABLE `moduleusers`
  ADD PRIMARY KEY (`id_module`,`id_utilisateur`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`ID_salle`);

--
-- Index pour la table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`ID_support`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `utilisateurs_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `ID_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `ID_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `ID_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `emploi`
--
ALTER TABLE `emploi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `supports`
--
ALTER TABLE `supports`
  MODIFY `ID_support` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`ID_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`),
  ADD CONSTRAINT `annonce_ibfk_2` FOREIGN KEY (`ID_module`) REFERENCES `module` (`id_module`),
  ADD CONSTRAINT `annonce_ibfk_3` FOREIGN KEY (`ID_filiere`) REFERENCES `filiere` (`id_filiere`),
  ADD CONSTRAINT `annonce_ibfk_4` FOREIGN KEY (`ID_departement`) REFERENCES `departement` (`ID_departement`);

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`ID_departement`) REFERENCES `departement` (`ID_departement`),
  ADD CONSTRAINT `classe_ibfk_2` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`),
  ADD CONSTRAINT `fk_etudiante1` FOREIGN KEY (`id_etudiante1`) REFERENCES `utilisateurs` (`id_utilisateur`),
  ADD CONSTRAINT `fk_etudiante2` FOREIGN KEY (`id_etudiante2`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `classusers`
--
ALTER TABLE `classusers`
  ADD CONSTRAINT `classusers_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);

--
-- Contraintes pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`),
  ADD CONSTRAINT `demandes_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`),
  ADD CONSTRAINT `demandes_ibfk_3` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `fk_departement_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `departementusers`
--
ALTER TABLE `departementusers`
  ADD CONSTRAINT `departementusers_ibfk_1` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`ID_departement`),
  ADD CONSTRAINT `departementusers_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`ID_prof`) REFERENCES `utilisateurs` (`id_utilisateur`),
  ADD CONSTRAINT `emploi_ibfk_2` FOREIGN KEY (`ID_module`) REFERENCES `module` (`id_module`),
  ADD CONSTRAINT `emploi_ibfk_3` FOREIGN KEY (`ID_Salle`) REFERENCES `salle` (`ID_salle`),
  ADD CONSTRAINT `emploi_ibfk_4` FOREIGN KEY (`ID_departement`) REFERENCES `departement` (`ID_departement`);

--
-- Contraintes pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `filiere_ibfk_1` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`ID_departement`),
  ADD CONSTRAINT `fk_filiere_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `filiereusers`
--
ALTER TABLE `filiereusers`
  ADD CONSTRAINT `filiereusers_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`),
  ADD CONSTRAINT `filiereusers_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `fk_module_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`),
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);

--
-- Contraintes pour la table `moduleusers`
--
ALTER TABLE `moduleusers`
  ADD CONSTRAINT `moduleusers_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`),
  ADD CONSTRAINT `moduleusers_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
