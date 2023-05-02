-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 09:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(11) NOT NULL,
  `user_admin` int(11) NOT NULL,
  `dateEmbauche` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `affectation_cours`
--

CREATE TABLE `affectation_cours` (
  `id_affect` int(11) NOT NULL,
  `id_section` int(11) DEFAULT NULL,
  `id_cour` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affectation_cours`
--

INSERT INTO `affectation_cours` (`id_affect`, `id_section`, `id_cour`) VALUES
(2, 5, 12),
(3, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `affectation_etud`
--

CREATE TABLE `affectation_etud` (
  `id_affect` int(11) NOT NULL,
  `id_etud` int(11) NOT NULL,
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affectation_etud`
--

INSERT INTO `affectation_etud` (`id_affect`, `id_etud`, `id_module`) VALUES
(20, 17, 16),
(21, 17, 17),
(22, 17, 18),
(23, 17, 19),
(24, 17, 20),
(25, 17, 21),
(26, 17, 22),
(27, 18, 53),
(28, 18, 17),
(29, 18, 18),
(30, 18, 19),
(31, 18, 20),
(32, 18, 21),
(33, 18, 22),
(34, 19, 23),
(35, 19, 24),
(36, 19, 25),
(37, 19, 26),
(38, 19, 27),
(39, 19, 28),
(40, 20, 23),
(41, 20, 24),
(42, 20, 25),
(43, 20, 26),
(44, 20, 27),
(45, 20, 28),
(46, 20, 29);

-- --------------------------------------------------------

--
-- Table structure for table `affectation_prof`
--

CREATE TABLE `affectation_prof` (
  `id_affect` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affectation_prof`
--

INSERT INTO `affectation_prof` (`id_affect`, `id_prof`, `id_module`) VALUES
(9, 6, 16),
(10, 6, 17),
(11, 6, 18),
(12, 7, 19),
(13, 7, 20),
(14, 10, 21),
(15, 9, 22),
(16, 8, 53),
(17, 8, 54),
(18, 8, 55),
(19, 7, 56),
(20, 7, 57),
(21, 10, 58),
(22, 9, 59);

-- --------------------------------------------------------

--
-- Table structure for table `affectation_section`
--

CREATE TABLE `affectation_section` (
  `id_affect` int(11) NOT NULL,
  `id_module` int(11) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affectation_section`
--

INSERT INTO `affectation_section` (`id_affect`, `id_module`, `id_section`) VALUES
(3, 19, 3),
(4, 17, 4),
(5, 16, 5),
(6, 16, 6),
(12, 16, 12);

-- --------------------------------------------------------

--
-- Table structure for table `affectation_semestre`
--

CREATE TABLE `affectation_semestre` (
  `id_affect` int(11) NOT NULL,
  `id_semestre` int(11) NOT NULL,
  `id_etud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affectation_semestre`
--

INSERT INTO `affectation_semestre` (`id_affect`, `id_semestre`, `id_etud`) VALUES
(19, 1, 17),
(20, 1, 18),
(21, 2, 19),
(22, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id_annonce` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenue` text DEFAULT NULL,
  `datecreation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id_cour` int(11) NOT NULL,
  `libelleCour` varchar(50) NOT NULL,
  `contenu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id_cour`, `libelleCour`, `contenu`) VALUES
(11, 'cour1_analyse1', '1683044427.pdf'),
(12, 'cour1_analyse1', '1683045777.pdf'),
(13, 'cour2_analyse1', '1683045845.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etud` int(11) NOT NULL,
  `cne` varchar(10) NOT NULL,
  `filiere` varchar(50) NOT NULL,
  `user_etud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_etud`, `cne`, `filiere`, `user_etud`) VALUES
(17, 'D123123123', 'Sciences Mathématiques et Informatique', 32),
(18, 'D123123121', 'Sciences Mathématiques et applications', 33),
(19, 'D123123122', 'Sciences Mathématiques et applications', 34),
(20, 'D123123120', 'Sciences Mathématiques et Informatique', 35);

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int(11) NOT NULL,
  `libellefiliere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `libellefiliere`) VALUES
(3, 'Science de la matière Physique'),
(4, 'Science de la matière Chimie'),
(5, 'Sciences Mathématiques et applications'),
(6, 'Sciences Mathématiques et Informatique'),
(7, 'Sciences de la Vie'),
(8, 'Sciences de la Terre et de l\'Univers');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id_module` int(11) NOT NULL,
  `libelleModule` varchar(50) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `semestre` varchar(2) DEFAULT NULL,
  `imageModule` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `libelleModule`, `id_filiere`, `semestre`, `imageModule`) VALUES
(16, 'ANALYSE 1 : Suite Numérique et Fonctions', 6, 'S1', NULL),
(17, 'ALGEBRE 1: Généralités et Arithmétique dans Z', 6, 'S1', NULL),
(18, 'ALGEBRE 2: Structures, Polynômes et Fractions Rati', 6, 'S1', NULL),
(19, 'Physique 1 : Mécanique 1', 6, 'S1', NULL),
(20, 'Physique 2 : Thermodynamique', 6, 'S1', NULL),
(21, 'Informatique 1 : Introduction à l\'informatique', 6, 'S1', NULL),
(22, 'Langue et Terminologie1', 6, 'S1', NULL),
(23, 'Analyse 2: Intégration', 6, 'S2', NULL),
(24, 'Analyse 3 : Formule de Taylor, Développement Limit', 6, 'S2', NULL),
(25, 'ALGEBRE 3: Espaces Vectoriels, Matrices et Détermi', 6, 'S2', NULL),
(26, 'Physique 3 : Electrostatique et Electrocinétique', 6, 'S2', NULL),
(27, 'Physique 4 : Optique 1', 6, 'S2', NULL),
(28, 'Informatique 2 : Algorithmique I', 6, 'S2', NULL),
(29, 'Langue et Terminologie2', 6, 'S2', NULL),
(30, 'Programmation 1', 6, 'S3', NULL),
(31, 'Algorithmique 2', 6, 'S3', NULL),
(32, 'Système d\'exploitation 1', 6, 'S3', NULL),
(33, 'Probabilités - Statistiques', 6, 'S3', NULL),
(34, 'Technologie du Web', 6, 'S3', NULL),
(35, 'Electronique numérique', 6, 'S3', NULL),
(36, 'Programmation 2', 6, 'S4', NULL),
(37, 'Structures de données', 6, 'S4', NULL),
(38, 'Système d\'exploitation 2', 6, 'S4', NULL),
(39, 'Analyse numérique', 6, 'S4', NULL),
(40, 'Architecture des ordinateurs', 6, 'S4', NULL),
(41, 'Electromagnétisme', 6, 'S4', NULL),
(42, 'Bases de données 1', 6, 'S5', NULL),
(43, 'Compilation', 6, 'S5', NULL),
(44, 'Réseaux', 6, 'S5', NULL),
(45, 'Recherche opérationnelle', 6, 'S5', NULL),
(46, 'Conception orientée objets (UML)', 6, 'S5', NULL),
(47, 'Conception orientée objets : JAVA 1', 6, 'S5', NULL),
(48, 'Bases de données 2', 6, 'S6', NULL),
(49, 'Java 2', 6, 'S6', NULL),
(50, 'Web dynamique', 6, 'S6', NULL),
(51, 'Réseaux 2', 6, 'S6', NULL),
(52, 'Projet Tutoré', 6, 'S6', NULL),
(53, 'Analyse 1 : Suites Numériques et Fonctions', 5, 'S1', NULL),
(54, 'ALGEBRE 1: Généralités et Arithmétique dans Z', 5, 'S1', NULL),
(55, 'ALGEBRE 2: Structures, Polynômes et Fractions Rati', 5, 'S1', NULL),
(56, 'Physique 1 : Mécanique 1', 5, 'S1', NULL),
(57, 'Physique 2 : Thermodynamique', 5, 'S1', NULL),
(58, 'Informatique 1 : Introduction à l\'informatique', 5, 'S1', NULL),
(59, 'Langue et Terminologie1', 5, 'S1', NULL),
(60, 'Analyse 2: Intégration', 5, 'S2', NULL),
(61, 'Analyse 3 : Formule de Taylor, Développement Limit', 5, 'S2', NULL),
(62, 'ALGEBRE 3: Espaces Vectoriels, Matrices et Détermi', 5, 'S2', NULL),
(63, 'Physique 3 : Electrostatique et Electrocinétique', 5, 'S2', NULL),
(64, 'Physique 4 : Optique 1', 5, 'S2', NULL),
(65, 'Informatique 2 : Algorithmique I', 5, 'S2', NULL),
(66, 'Langue et Terminologie2', 5, 'S2', NULL),
(67, 'Analyse 4: Séries Numériques, Suites et Séries de ', 5, 'S3', NULL),
(68, 'Analyse 5: Fonctions de Plusieurs Variables', 5, 'S3', NULL),
(69, 'ALGEBRE 4: Réduction des Endomorphismes et Applica', 5, 'S3', NULL),
(70, 'Probabilités-Statistiques', 5, 'S3', NULL),
(71, 'Physique 5 : Electricité 2', 5, 'S3', NULL),
(72, 'Informatique 3 : Algorithmique et Programmation', 5, 'S3', NULL),
(73, 'Analyse 6 : Calcul Intégral et Formes Différentiel', 5, 'S4', NULL),
(74, 'ALGEBRE 5: Dualité, Espaces Euclidiens, Espaces He', 5, 'S4', NULL),
(75, 'ALGEBRE 6: Structures Algébriques', 5, 'S4', NULL),
(76, 'Analyse Numérique 1', 5, 'S4', NULL),
(77, 'Physique 6 : Mécanique du solide', 5, 'S4', NULL),
(78, 'Informatique 4 : Algorithmique et structures de do', 5, 'S4', NULL),
(79, 'Topologie', 5, 'S5', NULL),
(80, 'Intégration', 5, 'S5', NULL),
(81, 'Calcul différentiel', 5, 'S5', NULL),
(82, 'Programmation Mathématique', 5, 'S5', NULL),
(83, 'Analyse numérique 2', 5, 'S5', NULL),
(84, 'Informatique 5 : Programmation orientée objet', 5, 'S5', NULL),
(85, 'Analyse fonctionnelle', 5, 'S6', NULL),
(86, 'Théorie des probabilités', 5, 'S6', NULL),
(87, 'Equations différentielles', 5, 'S6', NULL),
(88, 'Optimisation', 5, 'S6', NULL),
(89, 'Projet Tutoré', 5, 'S6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `id_user`, `titre`, `contenu`, `date_created`, `id_module`) VALUES
(4, 37, 'test', 'ddddddddddddddddd', '2023-04-28 15:37:49', 57);

-- --------------------------------------------------------

--
-- Table structure for table `professeur`
--

CREATE TABLE `professeur` (
  `id_prof` int(11) NOT NULL,
  `specialite` varchar(50) NOT NULL,
  `user_prof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professeur`
--

INSERT INTO `professeur` (`id_prof`, `specialite`, `user_prof`) VALUES
(6, 'Analyse', 36),
(7, 'Physique', 37),
(8, 'Chimie', 38),
(9, 'Langue Française', 39),
(10, 'Data Scientist', 40);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id_reply` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id_reply`, `id_post`, `id_user`, `contenu`, `date_created`, `id_module`) VALUES
(3, 4, 37, 'xxxxxxxxxxxxxxxxxxxxxxxx', '2023-04-28 15:37:59', 57),
(4, 4, 36, 'hjfhjfjhf', '2023-05-01 01:44:46', 18);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id_section` int(11) NOT NULL,
  `titre_section` varchar(50) NOT NULL,
  `id_prof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id_section`, `titre_section`, `id_prof`) VALUES
(3, 'Chapitre 1', 7),
(4, 'chapitre 1', 6),
(5, 'Chapitre 1', 6),
(6, 'chapitre 1', 6),
(12, 'Chapitre 2', 6);

-- --------------------------------------------------------

--
-- Table structure for table `semestre`
--

CREATE TABLE `semestre` (
  `id_semestre` int(11) NOT NULL,
  `libelleSemestre` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semestre`
--

INSERT INTO `semestre` (`id_semestre`, `libelleSemestre`) VALUES
(1, 'S1'),
(2, 'S2'),
(3, 'S3'),
(4, 'S4'),
(5, 'S5'),
(6, 'S6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cin` varchar(8) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `nomUtilisateur` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `dernierAcces` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `imageProfile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `type`, `name`, `prenom`, `email`, `cin`, `telephone`, `nomUtilisateur`, `password`, `dernierAcces`, `imageProfile`) VALUES
(9, 1, 'admin', 'hani', 'admin1@gmail.com', '12345', '0654678645', 'admin1@gmail.com', '$2y$10$3sG0vN7dbz6bFff2itl6iebN1avM1JnKp3PridG1oJSyvoPxYevGW', '2023-04-20 11:17:02', NULL),
(32, 0, 'Depp', 'Johnny', 'johnnydepp@gmail.com', 'JB111111', '0657009012', 'johnnydepp@gmail.com', '$2y$10$mZFwH/hdmLMmDn0Juc.ukOktVV/2V8SVjwK/NMNLbPeoMcpuF/GgC', '2023-04-28 13:57:21', NULL),
(33, 0, 'Abid', 'Nasrolah', 'nasrolahabid@gmail.com', 'JB222222', '0647893412', 'nasrolahabid@gmail.com', '$2y$10$wJ6/IBmnGQQVYfbr.62kgeztbh7hrm9D5W2mYHF3bmlswL8BulOgu', '2023-04-28 13:58:50', NULL),
(34, 0, 'Abid', 'Ayoub', 'ayoubabid@gmail.com', 'JB111110', '0756458700', 'ayoubabid@gmail.com', '$2y$10$EzWgvyUOs305cChX5vel6uN2MGmIV.J7Xome.nLEokCEbubfqtCq.', '2023-04-28 14:03:45', NULL),
(35, 0, 'Abid', 'Soufaine', 'soufianeabid@gmail.com', 'JB111112', '0623413467', 'soufianeabid@gmail.com', '$2y$10$YF2u3bz12rnfK1IMH8AigOpOc4gQZXfMep/EDSrAMgraz7Nj2mv2K', '2023-04-28 14:05:14', NULL),
(36, 2, 'Bamo', 'Abderrahman', 'bamo@gmail.com', 'JB111114', '0661476812', 'bamo@gmail.com', '$2y$10$mx7hfXDDJhLjWeHVAQYUEOUClWv9OB/CoiVE/AEan894K8yuRB/1G', '2023-04-28 14:06:55', NULL),
(37, 2, 'Shengli', 'Hamza', 'shengli@gmail.com', 'JB111115', '0765678906', 'shengli@gmail.com', '$2y$10$i1ayvlGD0rYwA0ByQo89r./a.jLFfT7WopxC4SyTmQn7ncwvIvjMO', '2023-04-28 15:44:02', 'profile_644be9c2d6d56.jpg'),
(38, 2, 'Alami', 'Youssef', 'Alami@gmail.com', 'JB111116', '0676459809', 'Alami@gmail.com', '$2y$10$DC.F9DgaFuu5ln7UhCxpIuCYKen1/9XCvop3d1OrFTEA43UFPlEZS', '2023-04-28 14:08:29', NULL),
(39, 2, 'Fouks', 'Abderahman', 'fouks@gmail.com', 'JB111117', '0768095743', 'fouks@gmail.com', '$2y$10$P2bzJwG4NFiXuHBndYL8rOmt0fo.Ijx2EWBamLQ002l/yDGaMn6AW', '2023-04-28 14:09:19', NULL),
(40, 2, 'Stiwi', 'Karam', 'stiwi@gmail.com', 'JB111118', '0658793145', 'stiwi@gmail.com', '$2y$10$ECLu.VK6Liiyoo0tMOJjteQzpBDlWLwRfejmPEf2odTiuIqOVlaHO', '2023-04-28 14:12:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `user_admin` (`user_admin`);

--
-- Indexes for table `affectation_cours`
--
ALTER TABLE `affectation_cours`
  ADD PRIMARY KEY (`id_affect`),
  ADD KEY `id_section` (`id_section`),
  ADD KEY `id_cour` (`id_cour`);

--
-- Indexes for table `affectation_etud`
--
ALTER TABLE `affectation_etud`
  ADD PRIMARY KEY (`id_affect`),
  ADD KEY `id_etud` (`id_etud`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `affectation_prof`
--
ALTER TABLE `affectation_prof`
  ADD PRIMARY KEY (`id_affect`),
  ADD KEY `id_prof` (`id_prof`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `affectation_section`
--
ALTER TABLE `affectation_section`
  ADD PRIMARY KEY (`id_affect`),
  ADD KEY `id_module` (`id_module`),
  ADD KEY `id_section` (`id_section`);

--
-- Indexes for table `affectation_semestre`
--
ALTER TABLE `affectation_semestre`
  ADD PRIMARY KEY (`id_affect`),
  ADD KEY `id_etud` (`id_etud`),
  ADD KEY `id_semestre` (`id_semestre`);

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `id_prof` (`id_prof`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cour`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etud`),
  ADD KEY `user_etud` (`user_etud`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id_prof`),
  ADD KEY `user_prof` (`user_prof`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id_reply`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`),
  ADD KEY `id_prof` (`id_prof`);

--
-- Indexes for table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id_semestre`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cin` (`cin`),
  ADD UNIQUE KEY `nomUtilisateur` (`nomUtilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `affectation_cours`
--
ALTER TABLE `affectation_cours`
  MODIFY `id_affect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `affectation_etud`
--
ALTER TABLE `affectation_etud`
  MODIFY `id_affect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `affectation_prof`
--
ALTER TABLE `affectation_prof`
  MODIFY `id_affect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `affectation_section`
--
ALTER TABLE `affectation_section`
  MODIFY `id_affect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `affectation_semestre`
--
ALTER TABLE `affectation_semestre`
  MODIFY `id_affect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id_reply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`user_admin`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `affectation_cours`
--
ALTER TABLE `affectation_cours`
  ADD CONSTRAINT `affectation_cours_ibfk_1` FOREIGN KEY (`id_section`) REFERENCES `section` (`id_section`),
  ADD CONSTRAINT `affectation_cours_ibfk_2` FOREIGN KEY (`id_cour`) REFERENCES `cours` (`id_cour`);

--
-- Constraints for table `affectation_etud`
--
ALTER TABLE `affectation_etud`
  ADD CONSTRAINT `affectation_etud_ibfk_1` FOREIGN KEY (`id_etud`) REFERENCES `etudiant` (`id_etud`),
  ADD CONSTRAINT `affectation_etud_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `affectation_prof`
--
ALTER TABLE `affectation_prof`
  ADD CONSTRAINT `affectation_prof_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id_prof`),
  ADD CONSTRAINT `affectation_prof_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `affectation_section`
--
ALTER TABLE `affectation_section`
  ADD CONSTRAINT `affectation_section_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`),
  ADD CONSTRAINT `affectation_section_ibfk_2` FOREIGN KEY (`id_section`) REFERENCES `section` (`id_section`);

--
-- Constraints for table `affectation_semestre`
--
ALTER TABLE `affectation_semestre`
  ADD CONSTRAINT `affectation_semestre_ibfk_1` FOREIGN KEY (`id_etud`) REFERENCES `etudiant` (`id_etud`),
  ADD CONSTRAINT `affectation_semestre_ibfk_2` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`);

--
-- Constraints for table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id_prof`),
  ADD CONSTRAINT `annonce_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`user_etud`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `professeur_ibfk_1` FOREIGN KEY (`user_prof`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`),
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `reply_ibfk_3` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id_prof`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
