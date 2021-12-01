-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 19 nov. 2021 à 12:22
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `memoire`
--
CREATE DATABASE IF NOT EXISTS `memoire` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `memoire`;

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `username`, `password`) VALUES
(3, 'bayembacke221', 'memoire2021'),
(4, 'serignembackedioum', 'dioumserigne');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `numero`) VALUES
(3, 2),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE `demande` (
  `idDemande` int(11) NOT NULL,
  `DateDemande` datetime DEFAULT current_timestamp(),
  `etat` tinyint(1) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idPrestataire` int(11) NOT NULL,
  `information` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`idDemande`, `DateDemande`, `etat`, `idClient`, `idPrestataire`, `information`) VALUES
(41, '2021-11-13 19:33:36', 2, 2, 1, 'Renovation de maison'),
(42, '2021-11-14 17:14:09', 3, 4, 3, 'Lavabo bouhce');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE `favoris` (
  `idFavoris` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idPrestataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`idFavoris`, `idClient`, `idPrestataire`) VALUES
(5, 4, 3),
(6, 4, 1),
(7, 2, 1),
(9, 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `idOffre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `nom`, `idOffre`) VALUES
(1, 'Imageoffre/17112021_185402_66567057-homme-noir-afr', 2),
(2, 'Imageoffre/17112021_185402_demenagement-au-Senegal', 2),
(3, 'Imageoffre/17112021_185402_formation-professionnel', 2),
(4, 'Imageoffre/17112021_185402_gootsteen-ontstoppen-10', 2),
(5, 'Imageoffre/18112021_151310_images.jpg', 3),
(6, 'Imageoffre/18112021_151310_images2.jpg', 3),
(7, 'Imageoffre/18112021_151310_nettoyer-la-tuyauterie-', 3);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `dateHeure` datetime NOT NULL,
  `contenu` varchar(100) DEFAULT NULL,
  `emmetteur` int(11) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `lu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `dateHeure`, `contenu`, `emmetteur`, `destinataire`, `lu`) VALUES
(148, '2021-11-15 08:17:17', 'bonjour', 3, 4, 1),
(149, '2021-11-15 08:17:24', 'salut', 4, 3, 1),
(150, '2021-11-15 08:17:32', 'ca va ?', 4, 3, 1),
(151, '2021-11-15 08:17:47', 'ca va alhamdoulilah', 3, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `idNote` int(11) NOT NULL,
  `DateNote` datetime NOT NULL DEFAULT current_timestamp(),
  `idClient` int(11) NOT NULL,
  `idPrestataire` int(11) NOT NULL,
  `contenu` varchar(200) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`idNote`, `DateNote`, `idClient`, `idPrestataire`, `contenu`, `note`) VALUES
(2, '2021-11-17 15:06:57', 4, 3, 'Tres bon travailleur', 4);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE `offre` (
  `idOffre` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `idService` int(11) NOT NULL,
  `idPrestataire` int(11) NOT NULL,
  `nomOffre` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`idOffre`, `etat`, `idService`, `idPrestataire`, `nomOffre`, `description`) VALUES
(2, 1, 23, 5, 'Fixation d\'étagère', 'qiwnfeifwf'),
(3, 1, 35, 3, 'Pose d\'un pare baignoire', 'Bonjour Je suis plombier multiservices technicien cuisiniste et dépanneur urgent Je suis véhiculé et parfaitement outiller je suis aussi spécialisé en trottinette électrique Xiaomi pour toute interven');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE `personne` (
  `numero` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `sexe` enum('f','m') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`numero`, `prenom`, `nom`, `sexe`, `email`, `password`, `adresse`, `telephone`, `photo`) VALUES
(1, 'Mbacke', 'Mbaye', 'm', 'mbackembaye74@gmail.com', 'bayembacke221', 'Pire', '778593165', 'bayembacke221.jpg'),
(2, 'Baye Lahad', 'Mbacke', '', 'mbackebayelahad@gmail.com', '1234', 'Touba', '0774563165', 'Baye Lahad.jpg'),
(3, 'Bassirou', 'Ly', 'm', 'bassirou21@ucad.sn', '12345', 'Touba Mbacke', '0774563165', 'bassirelypcsml3.jpg'),
(4, 'Moustapha', 'DIop', '', 'dioptapha47@gmail.com', '12345', 'Cite Keur Gorgui', '776257031', 'Moustapha.jpg'),
(5, 'Baye', 'Seck', 'm', 'seckbayeserigne@gmail.com', '12345', 'Touba', '0773274576', 'bayeserigne321.jpg'),
(6, 'Pape', 'fall', 'm', 'fallpape@gmail.com', '12345', 'Dakar', '772213465', 'papefall345.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `idPhoto` int(11) NOT NULL,
  `nomPhoto` varchar(50) DEFAULT NULL,
  `idService` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`idPhoto`, `nomPhoto`, `idService`) VALUES
(1, '22.jpg', 22),
(2, '23.jpg', 23),
(3, '24.jpg', 24),
(4, '25.jpg', 25),
(5, '26.jpg', 26),
(6, '27.jpg', 27),
(7, '28.jpg', 28),
(8, '29.jpg', 29),
(9, '30.jpg', 30),
(10, '31.jpg', 31),
(11, '32.jpg', 32),
(12, '33.jpg', 33),
(13, '34.jpg', 34),
(14, '35.jpg', 35);

-- --------------------------------------------------------

--
-- Structure de la table `photodemande`
--

DROP TABLE IF EXISTS `photodemande`;
CREATE TABLE `photodemande` (
  `idPhotoDemande` int(11) NOT NULL,
  `nomPhoto` varchar(100) NOT NULL,
  `idDemande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photodemande`
--

INSERT INTO `photodemande` (`idPhotoDemande`, `nomPhoto`, `idDemande`) VALUES
(90, 'MyPhotos/13112021_193336_1.jpg', 41),
(91, 'MyPhotos/13112021_193336_21175949-24316491.jpg', 41),
(92, 'MyPhotos/13112021_193336_56226825-41898769.jpg', 41),
(93, 'MyPhotos/14112021_171409_homme.jpg', 42);

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

DROP TABLE IF EXISTS `prestataire`;
CREATE TABLE `prestataire` (
  `idPrestataire` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `propos` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prestataire`
--

INSERT INTO `prestataire` (`idPrestataire`, `username`, `profession`, `numero`, `propos`) VALUES
(8, 'bayembacke221', 'Menuisier', 1, NULL),
(9, 'bassirelypcsml3', 'Plombier', 3, NULL),
(10, 'bayeserigne321', 'Frigoriste', 5, NULL),
(11, 'papefall345', 'Electricien', 6, 'Bonjour ! Je vous propose mes services à domicile. Je suis quelqu\'un de sérieux, ponctuel, rapide et qui connais bien mon métier. J\'ai une experience de 10ans dans le domaine de la réparation d\'appareils électroménagers. Suis dispo tous les jours de la semaine et même les weekend sauf les mercredi. ');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `idService` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `DateAjout` datetime DEFAULT current_timestamp(),
  `domain` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`idService`, `nom`, `description`, `DateAjout`, `domain`) VALUES
(22, 'Mecanicien', '\r\nVous êtes en panne et avez besoin d’être dépanné en urgence ?\r\n Vous cherchez un garagiste pour l’entretien et la réparation de votre véhicule ? \r\nNous vous mettons en rapport avec le mécanicien le plus proche pour assurer le dépannage sur place ou le remorquage jusqu’à l’atelier pour faire le diagnostic du véhicule et vous présenter les réparations à effectuer.\r\n', '2021-11-12 11:29:41', 'Reparation'),
(23, 'Menuisier', 'Le travail du bois est une nos passion car c’est un matériau noble.Tout nos menuisiers possèdent une expérience et un savoir-faire qui leur permet d’effectuer des tâches d’une qualité et d’une précision à la hauteur de vos exigences. Que ce soit pour la réalisation ou la pose de portes, fenêtres, parquets, meubles et les sièges, nos ouvriers vous fournissent une prestation sur mesure avec une finition inégalée.\r\n', '2021-11-12 11:30:18', 'Bricolage'),
(24, 'Menuisier metallique', 'Que vous soyez un particulier ou un professionnel, que ce soit pour de la construction ou de la rénovation, nous assurons tous vos travaux de menuiserie ainsi que tous types de travaux de serrurerie, de métallerie et de soudure. Nous prenons ainsi en charge la pose de portails, la fabrication de pergolas, la pose d’escaliers métalliques, de garde-corps, de même que les travaux de ferronnerie d’art.\r\n  ', '2021-11-12 11:31:06', 'Bricolage'),
(25, 'Peintre', 'La peinture est la solution la plus efficace et rapide pour faire de son intérieur un lieu unique ! C’est l’élément qui constitue la touche finale qui donne de l’éclat et une apparence correspondant à ses goûts dans les pièces d’une habitation ou d’un local. La rénovation de peinture est une intervention capitale. Et cela nécessite un savoir-faire et qualification particulière que possède Sen Ouvrier.\r\n', '2021-11-12 11:31:57', 'Decoration'),
(26, 'Platrier', 'Pour rénover, moderniser, changer votre intérieur dans votre maison, appartement, dans votre bureau ou dans votre local commercial ou industriel, le plâtre est une excellente solution car il améliore l’étanchéité à l’air des immeubles et bâtiments. C’est un matériau qui s’adapte à tous les systèmes de construction. De plus son inertie thermique assure la stabilité de la température intérieure quelque soit la saison.\r\n', '2021-11-12 11:33:08', 'Decoration'),
(27, 'Carreleur', 'Le rôle du carreleur est de poser des pièces de carrelage sur les murs, les parois et les sols. Il intervient aussi bien dans les cuisines que les salles de bains, en passant par toutes les pièces de la maison. La pose du carrelage s’effectue après le travail du plâtrier et du maçon, notamment sur les murs. En professionnels qualifiés, nous participons à la décoration et à la finition de chaque pièce de la maison.\r\n', '2021-11-12 11:33:59', 'Decoration'),
(28, 'Chauffeur', 'Nous proposons les services de chauffeurs maîtres, de chauffeurs livreurs et de transporteur de bagages. Le chauffeur de maître doit être disponible sur place lorsque son employeur a besoin de se déplacer avec son véhicule, il doit s’assurer que le véhicule est toujours en bon état mécanique et de propreté et que tout est prêt pour un départ rapide. Il s’occupe également des bagages.\r\n', '2021-11-12 11:34:33', 'Transport'),
(29, 'Cle minute', 'Besoin de reproduire votre jeu de clef ? Nous reproduisons à l’identique tous les types de clefs : plates simples, clés plates doubles, à gorges, à points, à vagues, ronde à usage personnel ou à usage professionnel, coques de clés de voitures, etc. Nous proposons également des services de conseil, réparation et ouvertures ainsi que tous les éléments constituant l’univers de la serrure et des clés : clés, barillets, gâches, têtières, verrous de sécurité, loquets, poignées, etc.\r\n', '2021-11-12 11:35:15', 'Bricolage'),
(30, 'Electricien', 'Notre équipe d’électriciens effectue tous types de travaux d’installations électriques et de raccordement d’appareils électriques dans diverses spécialités : réseaux communicants, éclairage, sécurité, confort thermique pour tous lieux : immeubles, maisons, bureaux, appartements, usines, commerces, lieux publics, lieux de spectacle… en construction ou en rénovation. Pour un besoin de sécurité pour vous et vos proches, il est important de s’assurer que votre installation soit bien aux normes.\r\n', '2021-11-12 11:35:46', 'Traveaux & Renovations'),
(31, 'Frigoriste', 'Besoin d’installer des équipements frigorifiques ? Nous intervenons pour l’installation et l’entretien de vos systèmes réfrigérés (réfrigérateurs, climatiseurs, chambres froides, camions frigorifiques, vitrines réfrigérées, pompes à chaleur, etc). Nous savons à quel point il est important pour vous de disposer de matériels en bon état, ainsi nous sélectionnons avec rigueur nos fournisseurs et le matériel que nous installons chez vous. Notre équipe réalise avec vous un diagnostic de vos besoins et des contraintes techniques sur place, le but étant de vous proposer un devis détaillé, personnalisé et sur mesure.\r\n', '2021-11-12 11:36:27', 'Electromenager'),
(32, 'Jardinier', 'Tous vos travaux de jardinage seront réalisés par des jardiniers-paysagistes qualifiés. Ces petits travaux de jardinage vous permettront d’embellir votre jardin et ainsi en profiter un maximum tout au long de l’année : tonte des pelouses, désherbage, entretien des plantes, entretien du potager, ramasser les fruits et les légumes pour votre consommation personnelle, bêchage, binage, taille de haies et massifs, refleurissement, ré-engazonnement partiel, arrosage, rempotage, récolte, ramassage des feuilles mortes et déchets végétaux, déneigement, débroussaillage des abords de la maison.\r\n', '2021-11-12 11:37:04', 'Decoration'),
(33, 'Maçon', 'Vous avez un projet de rénovation en vue et ne connaissez rien des travaux de maçonnerie ? Rassurez-vous, vous êtes à bon port. Parmi les travaux de maçonnerie intérieure et extérieure que nous faisons, il y a le rajout d’étage, l’extension/agrandissement, le traitement d’humidité, l’application d’enduits, les jointures de murs, la réalisation de béton ciré, etc. Pour être sûr de réussir vos travaux, sollicitez les services de Sen Ouvrier ; vous bénéficierez de prestations de qualité.\r\n', '2021-11-12 11:37:34', 'Traveaux & Renovations'),
(34, 'Technicien de surface', 'Sa mission peut être résumée en trois mots : Responsable de la propreté des espaces. En fait, ce n’est pas aussi simple que l’on peut imaginer, car cette responsabilité est bien très large. Il lui revient de garantir l’hygiène de votre maison ou bureau par le décrassage et l’entretien de tous les types de sols (parquets, moquettes, dallages, carreaux, etc), de tous les types de murs, plafonds, escaliers, balcons, terrasses, vitrines, fenêtres, portes, interrupteurs ainsi que le mobilier (placards, bureaux, sièges, banquettes), ainsi que dans le nettoyage de tous les types d’équipements (matériel informatique, installations de cuisines, sanitaires, etc.).\r\n', '2021-11-12 11:38:23', 'Service a domicile'),
(35, 'Plombier', 'Nos professionnels se tiennent à votre disposition pour réparer vos problèmes de petite plomberie au quotidien : fuite de chasse de WC, canalisations bouchées, robinet cassé ou qui goutte, problème d’étanchéité du lavabo… Réactive et à l’écoute, nos artisans plombiers sont en mesure d’intervenir auprès de votre domicile dans les meilleurs délais aussi bien pour des urgences et des dépannages en plomberie que pour des projets de rénovation ou d’aménagement.\r\n', '2021-11-12 11:39:01', 'Sanitaire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`),
  ADD KEY `fk_client` (`numero`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`idDemande`),
  ADD KEY `fk_demande` (`idClient`),
  ADD KEY `fk_demande2` (`idPrestataire`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`idFavoris`),
  ADD KEY `fk_favoris1` (`idClient`),
  ADD KEY `fk_favoris2` (`idPrestataire`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_image` (`idOffre`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Message1` (`emmetteur`),
  ADD KEY `fk_Message2` (`destinataire`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`idNote`),
  ADD KEY `fk_note1` (`idClient`),
  ADD KEY `fk_note2` (`idPrestataire`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`idOffre`),
  ADD KEY `fk_offre1` (`idService`),
  ADD KEY `fk_offre2` (`idPrestataire`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`numero`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`),
  ADD KEY `fk_photo` (`idService`);

--
-- Index pour la table `photodemande`
--
ALTER TABLE `photodemande`
  ADD PRIMARY KEY (`idPhotoDemande`),
  ADD KEY `fk_photodemande` (`idDemande`);

--
-- Index pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD PRIMARY KEY (`idPrestataire`),
  ADD KEY `fk_prestataire` (`numero`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `idDemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `idFavoris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `idOffre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `photodemande`
--
ALTER TABLE `photodemande`
  MODIFY `idPhotoDemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT pour la table `prestataire`
--
ALTER TABLE `prestataire`
  MODIFY `idPrestataire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`numero`) REFERENCES `personne` (`numero`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `fk_demande` FOREIGN KEY (`idClient`) REFERENCES `personne` (`numero`),
  ADD CONSTRAINT `fk_demande2` FOREIGN KEY (`idPrestataire`) REFERENCES `personne` (`numero`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `fk_favoris1` FOREIGN KEY (`idClient`) REFERENCES `personne` (`numero`),
  ADD CONSTRAINT `fk_favoris2` FOREIGN KEY (`idPrestataire`) REFERENCES `personne` (`numero`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image` FOREIGN KEY (`idOffre`) REFERENCES `offre` (`idOffre`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_Message1` FOREIGN KEY (`emmetteur`) REFERENCES `personne` (`numero`),
  ADD CONSTRAINT `fk_Message2` FOREIGN KEY (`destinataire`) REFERENCES `personne` (`numero`);

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `fk_note1` FOREIGN KEY (`idClient`) REFERENCES `personne` (`numero`),
  ADD CONSTRAINT `fk_note2` FOREIGN KEY (`idPrestataire`) REFERENCES `personne` (`numero`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `fk_offre1` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`),
  ADD CONSTRAINT `fk_offre2` FOREIGN KEY (`idPrestataire`) REFERENCES `personne` (`numero`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `fk_photo` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`);

--
-- Contraintes pour la table `photodemande`
--
ALTER TABLE `photodemande`
  ADD CONSTRAINT `fk_photodemande` FOREIGN KEY (`idDemande`) REFERENCES `demande` (`idDemande`);

--
-- Contraintes pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD CONSTRAINT `fk_prestataire` FOREIGN KEY (`numero`) REFERENCES `personne` (`numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
