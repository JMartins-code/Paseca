-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 31 mai 2021 à 14:46
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `paseca`
--

-- --------------------------------------------------------

--
-- Structure de la table `archives`
--

DROP TABLE IF EXISTS `archives`;
CREATE TABLE IF NOT EXISTS `archives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_producteur_id` int(11) NOT NULL,
  `nom_responsable_id` int(11) DEFAULT NULL,
  `num_ordre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typologie_documentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut_archive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paraphe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cote` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbre_exemplaire` int(11) DEFAULT NULL,
  `date_disposition` date DEFAULT NULL,
  `num_inventaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E262EC3996880E25` (`code_producteur_id`),
  KEY `IDX_E262EC3944FE7D8B` (`nom_responsable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `archives`
--

INSERT INTO `archives` (`id`, `code_producteur_id`, `nom_responsable_id`, `num_ordre`, `typologie_documentaire`, `statut_archive`, `paraphe`, `cote`, `nbre_exemplaire`, `date_disposition`, `num_inventaire`) VALUES
(1, 1, 1, '007', 'Mariage', 'Copie', NULL, NULL, 3, '2021-03-29', 'sqs'),
(2, 1, 3, 'LM1', 'Naissance', 'Copie', 'dij', 'opfji', 5, '2021-01-01', 'cfsdf');

-- --------------------------------------------------------

--
-- Structure de la table `archivistes`
--

DROP TABLE IF EXISTS `archivistes`;
CREATE TABLE IF NOT EXISTS `archivistes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_utilisateur_id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `code_archiviste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C2022992B0B126B5` (`code_utilisateur_id`),
  KEY `IDX_C202299210405986` (`institution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `archivistes`
--

INSERT INTO `archivistes` (`id`, `code_utilisateur_id`, `institution_id`, `code_archiviste`) VALUES
(1, 1, 1, 'archi5');

-- --------------------------------------------------------

--
-- Structure de la table `autorites`
--

DROP TABLE IF EXISTS `autorites`;
CREATE TABLE IF NOT EXISTS `autorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_autorite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_autorite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_immatriculation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forme_auto_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autre_forme_nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_geographique` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_destruction` date DEFAULT NULL,
  `histoire_autorite` longtext COLLATE utf8mb4_unicode_ci,
  `statut_juridique` longtext COLLATE utf8mb4_unicode_ci,
  `fonction_activite` longtext COLLATE utf8mb4_unicode_ci,
  `organisation_interne` longtext COLLATE utf8mb4_unicode_ci,
  `type_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_relation` longtext COLLATE utf8mb4_unicode_ci,
  `date_debut_relation` date DEFAULT NULL,
  `date_fin_relation` date DEFAULT NULL,
  `code_service_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regle_convention` longtext COLLATE utf8mb4_unicode_ci,
  `statut_autorite` longtext COLLATE utf8mb4_unicode_ci,
  `niveau_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langue_ecriture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_entretien` longtext COLLATE utf8mb4_unicode_ci,
  `nature_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `autorites`
--

INSERT INTO `autorites` (`id`, `code_autorite`, `type_autorite`, `num_immatriculation`, `forme_auto_nom`, `autre_forme_nom`, `zone_geographique`, `date_creation`, `date_destruction`, `histoire_autorite`, `statut_juridique`, `fonction_activite`, `organisation_interne`, `type_relation`, `description_relation`, `date_debut_relation`, `date_fin_relation`, `code_service_description`, `regle_convention`, `statut_autorite`, `niveau_detail`, `langue_ecriture`, `note_entretien`, `nature_relation`) VALUES
(2, '45', 'fd', 'sfdg', 'sdfg', NULL, NULL, '2021-03-30', '2021-03-29', NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-28', '2021-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `controlleurs`
--

DROP TABLE IF EXISTS `controlleurs`;
CREATE TABLE IF NOT EXISTS `controlleurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_utilisateur_id` int(11) NOT NULL,
  `code_controlleur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BFECD587B0B126B5` (`code_utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `controlleurs`
--

INSERT INTO `controlleurs` (`id`, `code_utilisateur_id`, `code_controlleur`) VALUES
(1, 1, 'CONTS2');

-- --------------------------------------------------------

--
-- Structure de la table `descriptions`
--

DROP TABLE IF EXISTS `descriptions`;
CREATE TABLE IF NOT EXISTS `descriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_archive_id` int(11) NOT NULL,
  `code_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat_materiel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nature_archive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C96EAEB61F8E4B9` (`code_archive_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `descriptions`
--

INSERT INTO `descriptions` (`id`, `code_archive_id`, `code_description`, `etat_materiel`, `nature_archive`) VALUES
(1, 1, 'gdf', 'gdf', 'dfg');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210524141151', '2021-05-24 14:14:45', 36);

-- --------------------------------------------------------

--
-- Structure de la table `institutions`
--

DROP TABLE IF EXISTS `institutions`;
CREATE TABLE IF NOT EXISTS `institutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `histoire_institution` longtext COLLATE utf8mb4_unicode_ci,
  `context_institution` longtext COLLATE utf8mb4_unicode_ci,
  `text_reference` longtext COLLATE utf8mb4_unicode_ci,
  `structure_institution` longtext COLLATE utf8mb4_unicode_ci,
  `gestion_archive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batiment_institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fond_archive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instrument_recherche` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heure_ouverture` time DEFAULT NULL,
  `condition_acces` longtext COLLATE utf8mb4_unicode_ci,
  `accessibilite_institution` longtext COLLATE utf8mb4_unicode_ci,
  `service_aide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serveice_reproduction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `espace_public` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_service_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regle_convention` longtext COLLATE utf8mb4_unicode_ci,
  `niveau_elaboration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `niveau_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_destruction` date DEFAULT NULL,
  `langue_ecriture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_institution` longtext COLLATE utf8mb4_unicode_ci,
  `note_maj` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `institutions`
--

INSERT INTO `institutions` (`id`, `code_institution`, `nom_institution`, `type_institution`, `contact_responsable`, `nom_responsable`, `histoire_institution`, `context_institution`, `text_reference`, `structure_institution`, `gestion_archive`, `batiment_institution`, `fond_archive`, `instrument_recherche`, `heure_ouverture`, `condition_acces`, `accessibilite_institution`, `service_aide`, `serveice_reproduction`, `espace_public`, `id_service_description`, `regle_convention`, `niveau_elaboration`, `niveau_detail`, `date_creation`, `date_destruction`, `langue_ecriture`, `source_institution`, `note_maj`) VALUES
(1, 'INSF5', 'BUNEC', 'Principal', 'sk', 'sd', 'dso', 'sok', 'dso', 'oq', 'odsj', 'sojo', 'odsfo', 'sdfol', '06:59:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-27', '2021-05-03', NULL, NULL, NULL),
(2, 'INSF5rfg', 'sfsf', 'Principals', NULL, 'sf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14:41:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-26', '2021-05-05', NULL, NULL, NULL),
(3, 'INSF5sq', 'CUY', 'Principal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11:43:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-28', '2021-05-01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `producteurs`
--

DROP TABLE IF EXISTS `producteurs`;
CREATE TABLE IF NOT EXISTS `producteurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_utilisateur_id` int(11) NOT NULL,
  `autorite_id` int(11) NOT NULL,
  `code_producteurs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6C70481B0B126B5` (`code_utilisateur_id`),
  KEY `IDX_6C70481839F548A` (`autorite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `producteurs`
--

INSERT INTO `producteurs` (`id`, `code_utilisateur_id`, `autorite_id`, `code_producteurs`) VALUES
(1, 1, 2, '0015');

-- --------------------------------------------------------

--
-- Structure de la table `transferts`
--

DROP TABLE IF EXISTS `transferts`;
CREATE TABLE IF NOT EXISTS `transferts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_controlleur_id` int(11) NOT NULL,
  `code_institution_id` int(11) NOT NULL,
  `code_archive_id` int(11) DEFAULT NULL,
  `num_exemplaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbre_fait_enregistrement` int(11) NOT NULL,
  `observations_transfert` longtext COLLATE utf8mb4_unicode_ci,
  `date_ouverture_registre` date DEFAULT NULL,
  `date_fermeture` date DEFAULT NULL,
  `code_plan_classe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_regle_gestion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_transfert` date NOT NULL,
  `responsable_transfert` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `format_archive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_archive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_officier_signataire` longtext COLLATE utf8mb4_unicode_ci,
  `num_ref_transfert` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_enregistrement` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  KEY `IDX_47A3EBA3472C8815` (`code_controlleur_id`),
  KEY `IDX_47A3EBA35B799E7C` (`code_institution_id`),
  KEY `IDX_47A3EBA31F8E4B9` (`code_archive_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `transferts`
--

INSERT INTO `transferts` (`id`, `code_controlleur_id`, `code_institution_id`, `code_archive_id`, `num_exemplaire`, `nbre_fait_enregistrement`, `observations_transfert`, `date_ouverture_registre`, `date_fermeture`, `code_plan_classe`, `code_regle_gestion`, `date_transfert`, `responsable_transfert`, `format_archive`, `support_archive`, `nom_officier_signataire`, `num_ref_transfert`, `periode_enregistrement`) VALUES
(1, 1, 1, 2, '46df', 15, NULL, '2021-05-19', '2021-05-18', NULL, NULL, '2021-05-05', 'rkfg', NULL, NULL, NULL, 're', 'a:0:{}'),
(2, 1, 3, 2, '46dfqg', 1, NULL, '2021-05-29', '2020-12-31', NULL, NULL, '2021-04-27', 'rkfgfzzzzzzzzzzzzze', NULL, NULL, NULL, 'rezef', 'a:0:{}');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_497B315EE7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `roles`, `password`, `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `num_telephone`) VALUES
(1, 'producteur@bunec.com', '[\"ROLE_PRODU\"]', '$argon2id$v=19$m=65536,t=4,p=1$SHN4QkpqMjJjYVJGU1FLUw$doVWS4ii93Ql0ewTX9pLCXmt6uGpvaowbqtgnYhI7f4', 'Producteur', 'Bunec', '2020-03-02', 'Yaounde', '690000000'),
(3, 'admin@bunec.com', '{\"2\": \"ROLE_ADMIN\"}', '$argon2id$v=19$m=65536,t=4,p=1$WXJaUlJxc2JVSjNYdzB3Wg$gRzBaVh6MQtFV9gus1ROi6MFzTSOF1SU8c1+o8ca9QI', 'Admin', 'Bunec', '1977-01-01', NULL, NULL),
(6, 'archiviste@bunec.com', '[\"ROLE_ARCHI\"]', '$argon2id$v=19$m=65536,t=4,p=1$MHJKNlFuYmpOdklWanc5Lw$9VwVeEKSpq6+jxDVxNd4YReT7+/ObUywSOiGOUKJAXA', 'Archiviste', 'Bunec', '2021-05-06', NULL, '562'),
(8, 'control@bunec.com', '[\"ROLE_CONTR\"]', '$argon2id$v=19$m=65536,t=4,p=1$YzlsMGM3ZE1jdy9Ka0M0Rg$GGy2PgrCp5qcqbihdAT98CSB2G+TgFc9TrSqdcn9V4U', 'Controleur', 'Bunec', '1985-01-01', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `archives`
--
ALTER TABLE `archives`
  ADD CONSTRAINT `FK_E262EC3944FE7D8B` FOREIGN KEY (`nom_responsable_id`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `FK_E262EC3996880E25` FOREIGN KEY (`code_producteur_id`) REFERENCES `producteurs` (`id`);

--
-- Contraintes pour la table `archivistes`
--
ALTER TABLE `archivistes`
  ADD CONSTRAINT `FK_C202299210405986` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`),
  ADD CONSTRAINT `FK_C2022992B0B126B5` FOREIGN KEY (`code_utilisateur_id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `controlleurs`
--
ALTER TABLE `controlleurs`
  ADD CONSTRAINT `FK_BFECD587B0B126B5` FOREIGN KEY (`code_utilisateur_id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `descriptions`
--
ALTER TABLE `descriptions`
  ADD CONSTRAINT `FK_C96EAEB61F8E4B9` FOREIGN KEY (`code_archive_id`) REFERENCES `transferts` (`id`);

--
-- Contraintes pour la table `producteurs`
--
ALTER TABLE `producteurs`
  ADD CONSTRAINT `FK_6C70481839F548A` FOREIGN KEY (`autorite_id`) REFERENCES `autorites` (`id`),
  ADD CONSTRAINT `FK_6C70481B0B126B5` FOREIGN KEY (`code_utilisateur_id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `transferts`
--
ALTER TABLE `transferts`
  ADD CONSTRAINT `FK_47A3EBA31F8E4B9` FOREIGN KEY (`code_archive_id`) REFERENCES `archives` (`id`),
  ADD CONSTRAINT `FK_47A3EBA3472C8815` FOREIGN KEY (`code_controlleur_id`) REFERENCES `controlleurs` (`id`),
  ADD CONSTRAINT `FK_47A3EBA35B799E7C` FOREIGN KEY (`code_institution_id`) REFERENCES `institutions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
