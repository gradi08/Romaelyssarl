-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 05 juil. 2025 à 20:54
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `romaelys_recruitment`
--

-- --------------------------------------------------------

--
-- Structure de la table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `job_id` int NOT NULL,
  `cover_letter` text NOT NULL,
  `cv_path` varchar(255) NOT NULL,
  `status` enum('pending','reviewed','accepted','rejected') DEFAULT 'pending',
  `applied_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `job_id` (`job_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `job_id`, `cover_letter`, `cv_path`, `status`, `applied_at`) VALUES
(3, 1, 4, 'asset/lettre/6866e91ab4d17_Problematique-des-Precautions-Standards-chez-les-Prestataires-de-Soins.pdf', 'asset/cvs/6866e91ab4d05_Problematique-des-Precautions-Standards-chez-les-Prestataires-de-Soins.pdf', 'rejected', '2025-07-03 20:33:30');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `requirements` text NOT NULL,
  `expiry_date` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `published` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `requirements`, `expiry_date`, `category`, `image_path`, `published`, `created_at`, `updated_at`) VALUES
(5, 'EXPERT EN CHARGE DE L’INFORMATIQUE ET  DE L’ARCHIVAGE', 'Sous la supervision directe du Responsable de service ou de la Direction Générale, l’Expert \r\nen charge de l’Informatique et de l’Archivage aura pour mission de : \r\n Concevoir, mettre en œuvre et maintenir l’infrastructure informatique de \r\nl’organisation. \r\n Garantir la sécurité, la disponibilité et la performance des systèmes et réseaux. \r\n Gérer les bases de données et assurer l’intégrité et la confidentialité des informations. \r\n Mettre en place des solutions d’archivage physique et électronique conformes aux \r\nnormes en vigueur. \r\n Élaborer et appliquer une politique de sauvegarde et de restauration des données. \r\n Former et assister les utilisateurs sur les outils informatiques et les bonnes pratiques \r\nd’archivage. \r\n Assurer une veille technologique et proposer des solutions d’amélioration continue.', ' Diplôme Bac+4/5 en Informatique, Archivistique ou tout autre domaine connexe. \r\n Expérience professionnelle confirmée (au moins 3 à 5 ans) dans un poste similaire. \r\n Maîtrise des outils de gestion de systèmes, réseaux, bases de données et solutions \r\nd’archivage. \r\n Bonne connaissance des normes de sécurité informatique et des réglementations sur la \r\nconservation des données. \r\n Esprit d’analyse, sens de l’organisation, rigueur et autonomie. \r\n Excellentes compétences relationnelles et pédagogiques.', '2025-10-31', 'Informatique', 'asset/img/68678614d60a0_office-2717014_1280.jpg', 1, '2025-07-04 07:43:16', '2025-07-04 07:43:16'),
(4, 'k', 'n', 'j', '2025-07-03', 'Informatique', 'asset/img/6866e8ef0179f_pour_10.PNG', 1, '2025-07-03 20:32:47', '2025-07-03 20:33:00'),
(6, 'AUDITEUR (H/F)', 'Sous la responsabilité du responsable hiérarchique, vous serez chargé(e) de : \r\n Réaliser des missions d’audit financier et/ou opérationnel selon les normes en vigueur \r\n; \r\n Évaluer les procédures internes et proposer des recommandations ; \r\n Participer à la préparation des rapports d’audit et à la restitution aux parties prenantes ; \r\n Vérifier la conformité réglementaire et comptable des opérations ; \r\n Accompagner les équipes dans l’implémentation des bonnes pratiques.', ' Bac+4/5 en audit, comptabilité, finance ou équivalent ; \r\n Minimum 2 ans d’expérience en cabinet d’audit ou en audit interne ; \r\n Maîtrise des normes comptables OHADA et/ou IFRS (selon le contexte du client) ; \r\n Sens de l’analyse, rigueur, esprit critique et autonomie ; \r\n Excellentes capacités rédactionnelles et relationnelles ; \r\n La maîtrise de l’anglais est un atout.', '2025-10-30', 'Autre', 'asset/img/6867887ec12e6_board-3700375_1280.jpg', 1, '2025-07-04 07:53:34', '2025-07-04 07:53:34'),
(7, 'Vidéaste H/F', ' Réaliser des vidéos promotionnelles, institutionnelles ou événementielles. \r\n Concevoir des scénarios, filmer et monter des contenus audiovisuels \r\nadaptés aux besoins du client. \r\n Assurer la qualité visuelle et sonore des productions. \r\n Travailler en étroite collaboration avec les équipes marketing et \r\ncommunication.', 'Formation en audiovisuel, communication ou équivalent. \r\n Expérience confirmée en tournage et montage vidéo. \r\n Maîtrise des logiciels de montage (Adobe Première Pro, After Effects, etc.). \r\n Créativité, sens du détail, autonomie.', '2025-10-23', 'Autre', 'asset/img/686789d0d59e8_universe-2682017_1280.jpg', 1, '2025-07-04 07:59:12', '2025-07-04 13:23:20'),
(8, 'COMPTABLE', ' Tenue de la comptabilité générale et analytique \r\n Saisie des pièces comptables (factures, règlements, etc.) \r\n Préparation des déclarations fiscales et sociales \r\n Élaboration des états financiers (bilan, compte de résultat) \r\n Suivi de la trésorerie et rapprochements bancaires \r\n Préparation des éléments pour le reporting financier \r\n Participation aux clôtures mensuelles, trimestrielles et annuelles', ' Titulaire d’un diplôme en comptabilité, finance ou gestion (BTS, DUT, Licence ou \r\néquivalent) \r\n Expérience de 2 ans minimum dans un poste similaire \r\n Maîtrise des outils bureautiques (Excel, Word) et d’un logiciel comptable (Sage, Ciel \r\nou autre) \r\n Bonne connaissance des normes comptables et fiscales en vigueur \r\n Rigueur, discrétion, sens de l’organisation et esprit d’analyse', '2025-10-26', 'Autre', 'asset/img/68678abf2d4bb_calculator-1044172_1280.jpg', 1, '2025-07-04 08:03:11', '2025-07-04 08:03:11'),
(9, 'CHAUFFEURS (H/F)', ' Assurer le transport sécurisé des personnes et/ou des marchandises. \r\n Veiller au bon entretien du véhicule (propreté, maintenance de base). \r\n Respecter scrupuleusement le code de la route et les consignes de sécurité. \r\n Planifier les itinéraires en fonction du trafic et des impératifs de ponctualité. \r\n Remonter tout incident ou anomalie au supérieur hiérarchique.', ' Titulaire d’un permis de conduire en cours de validité. \r\n Justifier d’au moins 10 années d’expérience en tant que chauffeur professionnel. \r\n Connaissance de la ville et des itinéraires principaux. \r\n Bonne présentation, courtoisie, ponctualité, sens du service. \r\n Disponibilité à travailler en horaires flexibles (week-ends, jours fériés, etc.).\r\n\r\nExpérience avec des véhicules de haut standing. \r\n Connaissance de bases en mécanique. \r\n Capacité à utiliser un GPS ou une application de navigation.', '2025-10-23', 'Autre', 'asset/img/68678ccd4aab2_proxy-image.jpeg', 1, '2025-07-04 08:11:57', '2025-07-04 14:32:43'),
(10, 'Logisticien H/F', ' Assurer la réception, le stockage, la préparation et l’expédition des marchandises \r\n Gérer les stocks et les approvisionnements à l’aide d’outils informatiques \r\n Coordonner les flux de marchandises internes et externes \r\n Optimiser les processus logistiques pour gagner en efficacité \r\n Veiller au respect des normes de qualité, sécurité et hygiène \r\n Collaborer avec les transporteurs, fournisseurs et les équipes internes', ' Formation en logistique ou gestion des flux (Bac +2 minimum) \r\n Expérience d’au moins 2 ans sur un poste similaire \r\n Maîtrise des outils bureautiques et des logiciels de gestion logistique (WMS, ERP) \r\n Organisation, réactivité et esprit d’équipe \r\n Bonne condition physique et sens des responsabilités', '2025-09-25', 'Autre', 'asset/img/6867d88ff1a57_man-7956041_1280.jpg', 0, '2025-07-04 13:35:12', '2025-07-04 13:35:12'),
(11, 'DIRECTEUR DE FINANCE (H/F)', ' Élaborer la stratégie financière de l’entreprise et assurer sa mise en œuvre. \r\n Superviser la comptabilité, le contrôle de gestion, la trésorerie et la fiscalité. \r\n Produire les états financiers et veiller à leur conformité aux normes comptables. \r\n Analyser les performances financières et proposer des axes d’optimisation. \r\n Gérer les relations avec les partenaires financiers, les banques, les commissaires aux \r\ncomptes et les administrations fiscales. \r\n Mettre en place des outils de pilotage financier efficaces. \r\n Accompagner les projets de croissance, d’investissement ou de réorganisation. \r\n Encadrer et animer les équipes financières.', ' Diplôme supérieur en finance, comptabilité, audit ou équivalent (Bac+5 – type Master, \r\nDSCG, DESCF, etc.). \r\n Expérience confirmée de 8 ans minimum à un poste similaire, idéalement dans un \r\nenvironnement exigeant. \r\n Maîtrise des normes comptables locales et internationales (OHADA, IFRS). \r\n Excellentes compétences analytiques et de modélisation financière. \r\n Leadership, rigueur, sens stratégique et capacité à travailler sous pression. \r\n Aisance dans la communication orale et écrite en français (l’anglais est un atout).', '2025-10-24', 'Autre', 'asset/img/6867e41c08db2_man-7956041_1280.jpg', 0, '2025-07-04 14:24:28', '2025-07-04 14:24:28'),
(12, 'SECRÉTAIRE DE DIRECTION', ' Assister la direction dans l’organisation quotidienne des activités. \r\n Gérer l’agenda, les rendez-vous, les déplacements et la correspondance. \r\n Organiser les réunions, rédiger les comptes rendus et suivre les dossiers. \r\n Préparer les documents administratifs et assurer le suivi des courriers entrants et \r\nsortants. \r\n Assurer une communication fluide entre la direction et les différents départements.', ' Titulaire d’un Bac+2 minimum en Secrétariat, Gestion ou équivalent. \r\n Expérience d’au moins 2 ans à un poste similaire, idéalement dans un environnement \r\nprofessionnel structuré. \r\n Maîtrise parfaite du français (oral et écrit) ; la connaissance de l’anglais est un atout. \r\n Excellente maîtrise des outils bureautiques (Word, Excel, PowerPoint, Outlook). \r\n Sens de la confidentialité, rigueur, autonomie et bonne présentation.', '2025-10-25', 'Autre', 'asset/img/6867e4e4d136d_man-7956041_1280.jpg', 0, '2025-07-04 14:27:48', '2025-07-04 14:27:48'),
(13, 'RÉCEPTIONNISTE BILINGUE', 'Assurer l’accueil physique et téléphonique des visiteurs et clients. \r\nGérer les réservations et le planning des rendez-vous. \r\nFournir des informations précises aux clients et répondre à leurs demandes. \r\nAssurer la gestion administrative de la réception (courriers, e-mails, classement \r\nde documents). \r\nCoordonner avec les autres services pour garantir un service client optimal. \r\nMaintenir un environnement propre et organisé à la réception.', 'Diplôme : Bac+5 en Hôtellerie, Secrétariat, Administration ou domaine similaire. \r\nExpérience : Minimum 2 ans à un poste similaire, idéalement dans un \r\nenvironnement international. \r\nCompétences linguistiques : Excellente maîtrise du français et de l’anglais (oral \r\net écrit). \r\nQualités requises : Sens du service, courtoisie, excellente présentation, réactivité \r\net organisation. \r\nMaîtrise des outils bureautiques : Pack Office, logiciels de gestion de réservation \r\n(atout).', '2025-09-26', 'Autre', 'asset/img/6867e5f210fb7_man-7956041_1280.jpg', 0, '2025-07-04 14:32:18', '2025-07-04 14:32:18'),
(14, 'PROTOCOLE D’ACCUEIL', 'Accueillir les invités avec courtoisie et professionnalisme lors d’événements, réunions officielles, ou opérations spéciales\r\nGérer les flux des visiteurs (enregistrement, orientation, placement)\r\nAssurer une assistance constante aux invités (réponses aux besoins, coordination avec l’organisation)\r\nVeiller à l’image professionnelle de l’accueil selon les standards de Romaelyss et de ses clients\r\nTravailler en étroite collaboration avec les équipes de sécurité, logistique et coordination', 'Excellente présentation et élocution\r\nSens de l’accueil, de la discrétion et de l’écoute\r\nCapacité à travailler sous pression et à rester souriant(e) en toutes circonstances\r\nMaîtrise du français exigée (anglais souhaité)\r\nExpérience dans le protocole, l’accueil ou l’événementiel est un atout\r\nÂge : 20 à 35 ans\r\nÊtre ponctuel(le), organisé(e), dynamique et flexible', '2025-09-30', 'Autre', 'asset/img/6867e6c07e821_man-7956041_1280.jpg', 0, '2025-07-04 14:35:44', '2025-07-04 14:35:44'),
(15, 'Chef cuisinier', '⦁	Concevoir et élaborer des menus variés et créatifs en accord avec la vision du client.\r\n⦁	Superviser l’ensemble des activités en cuisine (préparation, cuisson, dressage).\r\n⦁	Gérer et former l’équipe de cuisine pour assurer un service de qualité.\r\n⦁	Veiller au respect des normes d’hygiène et de sécurité alimentaire.\r\n⦁	Contrôler la gestion des stocks et optimiser les coûts des matières premières.\r\n⦁	Collaborer avec la direction pour améliorer continuellement l’expérience client.', '⦁	Diplôme en cuisine ou formation équivalente.\r\n⦁	Expérience confirmée en tant que Chef Cuisinier, idéalement en restauration haut de gamme.\r\n⦁	Excellentes compétences en gestion d’équipe et en organisation.\r\n⦁	Créativité, rigueur et sens du détail.\r\n⦁	Bonne maîtrise des normes HACCP.', '2025-09-23', 'Autre', 'asset/img/6867e8424df9e_man-7956041_1280.jpg', 0, '2025-07-04 14:42:10', '2025-07-04 14:42:10'),
(16, 'Gestionnaire du personnel bilingue', '⦁	Assurer la gestion administrative du personnel (contrats, dossiers, absences, congés, etc.).\r\n⦁	Coordonner le processus de recrutement, d\'intégration et de départ des employés.\r\n⦁	Gérer la paie, les déclarations sociales et le suivi des avantages sociaux.\r\n⦁	Maintenir à jour les bases de données du personnel et les dossiers RH.\r\n⦁	Conseiller et accompagner les managers et les employés sur les questions RH.\r\n⦁	Assurer une communication claire et efficace en français et en anglais.\r\n⦁	Veiller au respect de la législation du travail en vigueur.', '✅ Diplôme en Ressources Humaines, Gestion ou domaine similaire.\r\n✅ Expérience de 2 à 3 ans minimum dans un poste similaire.\r\n✅ Bilingue français/anglais (excellente maîtrise écrite et orale).\r\n✅ Bonne connaissance du droit du travail et des procédures RH.\r\n✅ Excellentes compétences organisationnelles et relationnelles.\r\n✅ Sens de la confidentialité et de la discrétion.\r\n✅ Maîtrise des outils bureautiques (Word, Excel, PowerPoint).', '2025-11-27', 'Autre', 'asset/img/6867eb631d498_man-7956041_1280.jpg', 0, '2025-07-04 14:55:31', '2025-07-04 14:55:31'),
(17, 'ÉLECTRICIEN (H/F)', ' Réaliser des installations électriques (neuf ou rénovation) dans le respect des normes en \r\nvigueur. \r\n Effectuer le câblage, le raccordement des équipements, et la mise en service des \r\ninstallations. \r\n Diagnostiquer les pannes et effectuer les réparations nécessaires. \r\n Assurer la maintenance préventive et corrective des installations. \r\n Lire et interpréter des schémas électriques et des plans techniques.', ' Formation en électricité (CAP, BEP, Bac Pro ou équivalent). \r\n Expérience professionnelle d’au moins 2 ans sur un poste similaire. \r\n Bonne connaissance des normes électriques. \r\n Autonomie, rigueur, sens des responsabilités. \r\n Permis B souhaité.', '2025-10-06', 'Électricité', 'asset/img/6867ebe7aefe5_man-7956041_1280.jpg', 0, '2025-07-04 14:57:43', '2025-07-04 14:57:43'),
(18, 'GESTIONNAIRE DU PERSONNEL (H/F)', ' Gérer les dossiers administratifs du personnel (embauches, contrats, avenants, \r\nattestations, etc.) \r\n Suivre les absences, congés, arrêts maladie et temps de travail \r\n Contribuer à la préparation de la paie et assurer le lien avec le service comptable \r\nou le prestataire paie \r\n Mettre à jour les bases de données RH et les indicateurs de suivi \r\n S’assurer du respect des obligations légales et réglementaires \r\n Conseiller les managers et collaborateurs sur les sujets RH courants \r\n Participer à l’optimisation des processus RH', ' Bac+5 en Ressources Humaines, Gestion ou équivalent \r\n Expérience de 2 ans minimum en gestion administrative du personnel \r\n Bonne maîtrise des outils bureautiques (Excel, Word) et des logiciels RH (SIRH, \r\npaie, etc.) \r\n Solides connaissances en droit du travail \r\n Sens de la confidentialité, autonomie et bon relationnel', '2025-10-19', 'Autre', 'asset/img/6867ec79757d6_man-7956041_1280.jpg', 0, '2025-07-04 15:00:09', '2025-07-04 15:00:09');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `user_type` enum('candidate','admin') DEFAULT 'candidate',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `phone`, `address`, `user_type`, `created_at`) VALUES
(1, 'admin', 'Romaelys@gmail.com', '$2y$10$g2YXV.RSB5e27z1jkiRgsuI4e1aIgxJGu2I7vvoklIU0TNMe/OkPa', 'Romaelys', '+243847473745', 'JE SUIS LA', 'admin', '2025-07-02 17:43:56'),
(2, 'tegra', 'Gradisnchaki@gmail.com', '$2y$10$PKkHVFn/omglUkyy6SCDeu9agEOJVLHs2d4r0TAtdccBOYXekAyMu', 'GRADI', '+243847473745', 'N', 'candidate', '2025-07-02 23:16:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
