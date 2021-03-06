-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 04:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memoire`
--
CREATE DATABASE IF NOT EXISTS `memoire` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `memoire`;

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id`, `username`, `password`) VALUES
(3, 'bayembacke221', 'memoire2021'),
(4, 'serignembackedioum', 'dioumserigne');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`idClient`, `numero`) VALUES
(1, 19),
(2, 20),
(3, 21),
(4, 22);

-- --------------------------------------------------------

--
-- Table structure for table `demande`
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
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`idDemande`, `DateDemande`, `etat`, `idClient`, `idPrestataire`, `information`) VALUES
(1, '2021-11-30 16:55:08', 3, 19, 6, 'Netoyage maison...'),
(3, '2021-12-07 11:12:50', 0, 19, 1, 'fewiwufwwnruewue');

-- --------------------------------------------------------

--
-- Table structure for table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE `favoris` (
  `idFavoris` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idPrestataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `idOffre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `nom`, `idOffre`) VALUES
(1, 'Imageoffre/25112021_162422_formation-professionnel', 1),
(2, 'Imageoffre/25112021_162422_images.jpg', 1),
(3, 'Imageoffre/25112021_162837_gootsteen-ontstoppen-10', 2),
(4, 'Imageoffre/25112021_162837_nettoyer-la-tuyauterie-', 2),
(5, 'Imageoffre/25112021_163440_menuisier2.jpg', 3),
(6, 'Imageoffre/25112021_163440_menuisier3.jpg', 3),
(7, 'Imageoffre/25112021_163552_menuisier.jpg', 4),
(8, 'Imageoffre/25112021_163552_menuisier1.jpg', 4),
(9, 'Imageoffre/26112021_102932_menuisier.jpg', 5),
(10, 'Imageoffre/26112021_102932_menuisier1.jpg', 5),
(11, 'Imageoffre/29112021_120452_mecano.jpg', 6),
(12, 'Imageoffre/29112021_120452_mecano2.jpg', 6),
(13, 'Imageoffre/29112021_120452_mecano3.jpg', 6),
(14, 'Imageoffre/29112021_120452_mecano4.jpg', 6),
(15, 'Imageoffre/29112021_120452_mecano5.jpg', 6),
(16, 'Imageoffre/29112021_120817_mecano.jpg', 7),
(17, 'Imageoffre/29112021_120817_mecano2.jpg', 7),
(18, 'Imageoffre/29112021_120817_mecano3.jpg', 7),
(19, 'Imageoffre/29112021_120817_mecano4.jpg', 7),
(20, 'Imageoffre/29112021_120818_mecano5.jpg', 7),
(21, 'Imageoffre/29112021_120856_mecano.jpg', 8),
(22, 'Imageoffre/29112021_120856_mecano2.jpg', 8),
(23, 'Imageoffre/29112021_120856_mecano3.jpg', 8),
(24, 'Imageoffre/29112021_120856_mecano4.jpg', 8),
(25, 'Imageoffre/29112021_120856_mecano5.jpg', 8),
(26, 'Imageoffre/29112021_121002_mecano.jpg', 9),
(27, 'Imageoffre/29112021_121002_mecano2.jpg', 9),
(28, 'Imageoffre/29112021_121002_mecano3.jpg', 9),
(29, 'Imageoffre/29112021_121002_mecano4.jpg', 9),
(30, 'Imageoffre/29112021_121002_mecano5.jpg', 9),
(31, 'Imageoffre/29112021_121121_mecano.jpg', 10),
(32, 'Imageoffre/29112021_121121_mecano2.jpg', 10),
(33, 'Imageoffre/29112021_121121_mecano3.jpg', 10),
(34, 'Imageoffre/29112021_121121_mecano4.jpg', 10),
(35, 'Imageoffre/29112021_121121_mecano5.jpg', 10),
(36, 'Imageoffre/29112021_121238_mecano.jpg', 11),
(37, 'Imageoffre/29112021_121238_mecano2.jpg', 11),
(38, 'Imageoffre/29112021_121238_mecano3.jpg', 11),
(39, 'Imageoffre/29112021_121238_mecano4.jpg', 11),
(40, 'Imageoffre/29112021_121238_mecano5.jpg', 11),
(41, 'Imageoffre/29112021_121427_mecano.jpg', 12),
(42, 'Imageoffre/29112021_121427_mecano2.jpg', 12),
(43, 'Imageoffre/29112021_121427_mecano3.jpg', 12),
(44, 'Imageoffre/29112021_121427_mecano4.jpg', 12),
(45, 'Imageoffre/29112021_121427_mecano5.jpg', 12),
(46, 'Imageoffre/29112021_121607_mecano.jpg', 13),
(47, 'Imageoffre/29112021_121607_mecano2.jpg', 13),
(48, 'Imageoffre/29112021_121607_mecano3.jpg', 13),
(49, 'Imageoffre/29112021_121607_mecano4.jpg', 13),
(50, 'Imageoffre/29112021_121607_mecano5.jpg', 13),
(51, 'Imageoffre/29112021_125542_peintre.jpg', 14),
(52, 'Imageoffre/29112021_125542_peintre2.jpg', 14),
(53, 'Imageoffre/29112021_125542_peintre3.jpg', 14),
(54, 'Imageoffre/29112021_125650_peintre.jpg', 15),
(55, 'Imageoffre/29112021_125650_peintre2.jpg', 15),
(56, 'Imageoffre/29112021_125650_peintre3.jpg', 15),
(57, 'Imageoffre/29112021_125758_peintre.jpg', 16),
(58, 'Imageoffre/29112021_125758_peintre2.jpg', 16),
(59, 'Imageoffre/29112021_125758_peintre3.jpg', 16),
(60, 'Imageoffre/29112021_125918_peintre.jpg', 17),
(61, 'Imageoffre/29112021_125918_peintre2.jpg', 17),
(62, 'Imageoffre/29112021_125918_peintre3.jpg', 17),
(63, 'Imageoffre/29112021_131155_plombier.jpg', 18),
(64, 'Imageoffre/29112021_131155_plombier2.jpg', 18),
(65, 'Imageoffre/29112021_131155_plombier3.jpg', 18),
(66, 'Imageoffre/29112021_131155_plombier4.jpg', 18),
(67, 'Imageoffre/29112021_132355_plombier.jpg', 19),
(68, 'Imageoffre/29112021_132355_plombier2.jpg', 19),
(69, 'Imageoffre/29112021_132355_plombier3.jpg', 19),
(70, 'Imageoffre/29112021_132355_plombier4.jpg', 19),
(71, 'Imageoffre/29112021_132500_plombier.jpg', 20),
(72, 'Imageoffre/29112021_132500_plombier2.jpg', 20),
(73, 'Imageoffre/29112021_132500_plombier3.jpg', 20),
(74, 'Imageoffre/29112021_132500_plombier4.jpg', 20),
(75, 'Imageoffre/29112021_132549_plombier.jpg', 21),
(76, 'Imageoffre/29112021_132549_plombier2.jpg', 21),
(77, 'Imageoffre/29112021_132549_plombier3.jpg', 21),
(78, 'Imageoffre/29112021_132549_plombier4.jpg', 21),
(79, 'Imageoffre/29112021_132640_plombier.jpg', 22),
(80, 'Imageoffre/29112021_132640_plombier2.jpg', 22),
(81, 'Imageoffre/29112021_132640_plombier3.jpg', 22),
(82, 'Imageoffre/29112021_132640_plombier4.jpg', 22),
(83, 'Imageoffre/29112021_132744_plombier.jpg', 23),
(84, 'Imageoffre/29112021_132744_plombier2.jpg', 23),
(85, 'Imageoffre/29112021_132744_plombier3.jpg', 23),
(86, 'Imageoffre/29112021_132744_plombier4.jpg', 23),
(87, 'Imageoffre/29112021_132847_plombier.jpg', 24),
(88, 'Imageoffre/29112021_132847_plombier2.jpg', 24),
(89, 'Imageoffre/29112021_132847_plombier3.jpg', 24),
(90, 'Imageoffre/29112021_132847_plombier4.jpg', 24),
(91, 'Imageoffre/29112021_152403_fleuriste.jpg', 26),
(92, 'Imageoffre/29112021_152403_fleuriste2.jpg', 26),
(93, 'Imageoffre/29112021_152403_fleuriste3.jpg', 26),
(94, 'Imageoffre/29112021_152403_fleuriste5.jpg', 26),
(95, 'Imageoffre/29112021_152403_fleuriste6.jpg', 26),
(96, 'Imageoffre/29112021_152448_fleuriste.jpg', 27),
(97, 'Imageoffre/29112021_152448_fleuriste2.jpg', 27),
(98, 'Imageoffre/29112021_152448_fleuriste3.jpg', 27),
(99, 'Imageoffre/29112021_152449_fleuriste5.jpg', 27),
(100, 'Imageoffre/29112021_152449_fleuriste6.jpg', 27),
(101, 'Imageoffre/29112021_152556_fleuriste.jpg', 28),
(102, 'Imageoffre/29112021_152556_fleuriste2.jpg', 28),
(103, 'Imageoffre/29112021_152556_fleuriste3.jpg', 28),
(104, 'Imageoffre/29112021_152556_fleuriste5.jpg', 28),
(105, 'Imageoffre/29112021_152556_fleuriste6.jpg', 28),
(106, 'Imageoffre/29112021_152654_fleuriste.jpg', 29),
(107, 'Imageoffre/29112021_152654_fleuriste2.jpg', 29),
(108, 'Imageoffre/29112021_152654_fleuriste3.jpg', 29),
(109, 'Imageoffre/29112021_152654_fleuriste5.jpg', 29),
(110, 'Imageoffre/29112021_152654_fleuriste6.jpg', 29),
(111, 'Imageoffre/29112021_152824_fleuriste.jpg', 30),
(112, 'Imageoffre/29112021_152824_fleuriste2.jpg', 30),
(113, 'Imageoffre/29112021_152824_fleuriste3.jpg', 30),
(114, 'Imageoffre/29112021_152824_fleuriste5.jpg', 30),
(115, 'Imageoffre/29112021_152824_fleuriste6.jpg', 30),
(116, 'Imageoffre/29112021_152947_fleuriste.jpg', 31),
(117, 'Imageoffre/29112021_152947_fleuriste2.jpg', 31),
(118, 'Imageoffre/29112021_152947_fleuriste3.jpg', 31),
(119, 'Imageoffre/29112021_152947_fleuriste5.jpg', 31),
(120, 'Imageoffre/29112021_152947_fleuriste6.jpg', 31),
(121, 'Imageoffre/29112021_153139_fleuriste.jpg', 32),
(122, 'Imageoffre/29112021_153139_fleuriste2.jpg', 32),
(123, 'Imageoffre/29112021_153139_fleuriste3.jpg', 32),
(124, 'Imageoffre/29112021_153139_fleuriste5.jpg', 32),
(125, 'Imageoffre/29112021_153139_fleuriste6.jpg', 32),
(126, 'Imageoffre/29112021_153349_fleuriste.jpg', 33),
(127, 'Imageoffre/29112021_153349_fleuriste2.jpg', 33),
(128, 'Imageoffre/29112021_153349_fleuriste3.jpg', 33),
(129, 'Imageoffre/29112021_153349_fleuriste5.jpg', 33),
(130, 'Imageoffre/29112021_153349_fleuriste6.jpg', 33),
(135, 'Imageoffre/29112021_163213_menage.jpg', 35),
(136, 'Imageoffre/29112021_163213_menage2.jpg', 35),
(137, 'Imageoffre/29112021_163213_menage3.jpg', 35),
(138, 'Imageoffre/29112021_163213_menage4.jpg', 35),
(139, 'Imageoffre/29112021_163308_menage.jpg', 36),
(140, 'Imageoffre/29112021_163308_menage2.jpg', 36),
(141, 'Imageoffre/29112021_163308_menage3.jpg', 36),
(142, 'Imageoffre/29112021_163308_menage4.jpg', 36),
(147, 'Imageoffre/29112021_163521_menage.jpg', 38),
(148, 'Imageoffre/29112021_163521_menage2.jpg', 38),
(149, 'Imageoffre/29112021_163521_menage3.jpg', 38),
(150, 'Imageoffre/29112021_163521_menage4.jpg', 38),
(159, 'Imageoffre/29112021_165959_pavee..jpg', 65),
(160, 'Imageoffre/29112021_165959_pavee1.jpg', 65),
(161, 'Imageoffre/29112021_165959_pavee2.jpg', 65),
(162, 'Imageoffre/29112021_165959_pavee3.jpg', 65),
(163, 'Imageoffre/29112021_170112_pavee..jpg', 66),
(164, 'Imageoffre/29112021_170112_pavee1.jpg', 66),
(165, 'Imageoffre/29112021_170112_pavee2.jpg', 66),
(166, 'Imageoffre/29112021_170112_pavee3.jpg', 66),
(167, 'Imageoffre/29112021_170241_pavee1.jpg', 67),
(168, 'Imageoffre/29112021_170241_pavee2.jpg', 67),
(169, 'Imageoffre/29112021_170241_pavee3.jpg', 67),
(170, 'Imageoffre/29112021_171156_transport.jpg', 68),
(171, 'Imageoffre/29112021_171156_transport2.jpg', 68),
(172, 'Imageoffre/29112021_171156_transport3.jpg', 68),
(173, 'Imageoffre/29112021_171156_transport4.jpg', 68),
(174, 'Imageoffre/29112021_171156_transport5.jpg', 68),
(175, 'Imageoffre/30112021_140448_macon2.jpg', 74),
(176, 'Imageoffre/30112021_140448_macon3.jpg', 74),
(177, 'Imageoffre/30112021_140448_macon4.jpg', 74),
(178, 'Imageoffre/30112021_140448_macon5.jpg', 74),
(179, 'Imageoffre/30112021_140649_macon2.jpg', 75),
(180, 'Imageoffre/30112021_140649_macon3.jpg', 75),
(181, 'Imageoffre/30112021_140649_macon4.jpg', 75),
(182, 'Imageoffre/30112021_140649_macon5.jpg', 75),
(183, 'Imageoffre/30112021_140859_macon2.jpg', 76),
(184, 'Imageoffre/30112021_140859_macon3.jpg', 76),
(185, 'Imageoffre/30112021_140859_macon4.jpg', 76),
(186, 'Imageoffre/30112021_140859_macon5.jpg', 76),
(187, 'Imageoffre/30112021_143131_frigoriste.jpg', 88),
(188, 'Imageoffre/30112021_143131_frigoriste2.jpg', 88),
(189, 'Imageoffre/30112021_143131_frigoriste3.jpg', 88),
(190, 'Imageoffre/30112021_143131_frigoriste4.jpg', 88),
(191, 'Imageoffre/30112021_143228_frigoriste.jpg', 89),
(192, 'Imageoffre/30112021_143228_frigoriste2.jpg', 89),
(193, 'Imageoffre/30112021_143228_frigoriste3.jpg', 89),
(194, 'Imageoffre/30112021_143228_frigoriste4.jpg', 89),
(195, 'Imageoffre/30112021_143327_frigoriste.jpg', 90),
(196, 'Imageoffre/30112021_143327_frigoriste2.jpg', 90),
(197, 'Imageoffre/30112021_143327_frigoriste3.jpg', 90),
(198, 'Imageoffre/30112021_143327_frigoriste4.jpg', 90),
(199, 'Imageoffre/30112021_143439_frigoriste.jpg', 91),
(200, 'Imageoffre/30112021_143439_frigoriste2.jpg', 91),
(201, 'Imageoffre/30112021_143439_frigoriste3.jpg', 91),
(202, 'Imageoffre/30112021_143439_frigoriste4.jpg', 91);

-- --------------------------------------------------------

--
-- Table structure for table `message`
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
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `dateHeure`, `contenu`, `emmetteur`, `destinataire`, `lu`) VALUES
(1, '2021-11-30 04:56:52', 'salut', 19, 6, 1),
(2, '2021-11-30 04:57:14', 'bonjour', 6, 19, 1),
(3, '2021-11-30 04:57:27', 'Merci du choix', 6, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
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
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`idNote`, `DateNote`, `idClient`, `idPrestataire`, `contenu`, `note`) VALUES
(1, '2021-11-30 17:20:27', 19, 6, 'Tres ponctuel et efficace...', 5);

-- --------------------------------------------------------

--
-- Table structure for table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE `offre` (
  `idOffre` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `idService` int(11) NOT NULL,
  `idPrestataire` int(11) NOT NULL,
  `nomOffre` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offre`
--

INSERT INTO `offre` (`idOffre`, `etat`, `idService`, `idPrestataire`, `nomOffre`, `description`) VALUES
(1, 1, 23, 2, ' montage de meubles', 'vous voil?? seul face ?? vos notices de montage de meuble. Et c\'est le drame ! Pas de probl??me, un Stooter peut venir monter vos meubles, d??s ce soir et pour un prix garanti au moment de r??server ! '),
(2, 1, 35, 2, ' d??boucher vos toilettes', 'L\'eau de votre douche peine ?? s\'??couler ? Ne cherchez plus, vos canalisations sont bouch??es. Place aux experts des ??quipements sanitaires ! Arm??s de leurs outils et de leur savoir-faire ils offrent un'),
(3, 1, 23, 2, 'Cr??ation de placard et dressing ', 'Votre habitation manque de rangements et vous n\'avez plus la place d\'ajouter des meubles. Vous pouvez faire faire un dressing ou placard sur-mesure dans un renfoncement de votre chambre. Rien de compl'),
(4, 1, 23, 2, 'Restauration de meubles', 'On arr??te de se d??barrasser de nos vieux meubles, d??sormais on les restaure ! Une porte qui coulisse mal ou un pied de table bancal sont parfaitement r??parables et n??cessitent de l\'attention et du sav'),
(5, 1, 23, 2, 'D??montage de meuble', 'Vous d??m??nagez bient??t et avez besoin de d??monter des meubles pour les transporter ? Au lieu de perdre du temps avec ??a, obtenez de l\'aide facilement. Un Stooter pourra venir vous les d??monter en un t'),
(6, 1, 22, 1, 'Montage de pi??ces moteur', 'Assemblage et d??montage de moteur ??quipement ??quip?? d\'un\r\npanneau de carburant, de refroidissement, d\'admission et\r\nd\'??chappement permettant l\'entra??nement th??orique et les\r\nexp??riences.\r\nFacile ?? v??rifier et ?? diagnostiquer tous les d??fauts qui peuvent\r\nsurvenir dans un syst??me de v??hicule r??el afin qu\'il soit capable de\r\nfaire une ??ducation efficace concernant le syst??me de maintenance.'),
(7, 1, 22, 1, 'Diagnostic de panne', 'Diagnostic de panne : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(8, 1, 22, 1, 'Chargement de batterie de voiture', 'Chargement de batterie de voiture : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(9, 1, 22, 1, 'R??vision de voiture', 'R??vision de voiture : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(10, 1, 22, 1, 'Montage ou remplacement de r??troviseurs de voiture', '\r\n\r\nMontage ou remplacement de r??troviseurs de voiture : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? p'),
(11, 1, 22, 1, 'Remplacement de roue', 'Remplacement de roue : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(12, 1, 22, 1, 'R??vision de scooter', 'R??vision de scooter : trouvez les meilleurs travailleurs de Kaay Deefar pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(13, 1, 22, 1, 'Montage ou remplacement de phares', 'Montage ou remplacement de phares : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(14, 1, 25, 3, 'Peinture d\'int??rieur', 'Vous en avez assez de vos murs tout blanc ? Il est alors tant de mettre votre d??coration ?? jour en ajoutant de la couleur ! Mais faire de la peinture demande connaissances, patience et minutie que vou'),
(15, 1, 25, 3, 'Enduit mur', 'Avant de vous lancer dans la peinture, il convient de soigner l\'application de l\'enduit. Enduit de lissage pour mur int??rieur ou enduit de rebouchage pour mur ext??rieur, les professionnels sauront vou'),
(16, 1, 25, 3, 'Pose de papier peint', 'Comment poser du papier peint sans faire de plis ? Et comment proc??der ?? la d??coupe du papier peint pour les angles et les raccords ? Plut??t que de relever des d??fis auxquels vous ne voulez pas vraime'),
(17, 1, 25, 3, 'Peinture de volets en bois', 'Vos volets en bois subissent la pluie, le vent voire le sel marin si vous ??tes pr??s de la mer et la peinture s\'??caille rapidement. Pour les rafraichir, ils y a quelques ??tapes ?? suivre pour les traite'),
(18, 1, 35, 4, 'R??paration de fuite d\'eau', 'Les histoires de fuites d\'eau sont toujours un traumatisme. D\'abord ?? l\'??cole, dans les probl??mes de maths et puis maintenant dans la cuisine ! Aidez-nous ?? colmater toutes les fuites d\'eau de Senegal'),
(19, 1, 35, 4, 'R??paration de chasse d???eau', 'La chasse d\'eau, on ne pr??te pas attention ?? son importance tant qu\'elle n\'est pas dysfonctionnelle. Lorsqu\'elle cesse de fonctionner ou qu\'elle fuit, c\'est vite embarrassant ! Les tutoriels ne seront'),
(20, 1, 35, 4, 'Pose de baignoire', 'Vous r??vez d\'une baignoire depuis un moment et ??a y est, vous avez d??cid?? de vous lancer ? Vous ??tes au bon endroit pour ??a ! Gr??ce aux plombiers de Kaay Deefar vous pourrez bient??t vous pr??lassez dan'),
(21, 1, 35, 4, 'R??paration de robinet', 'Vous entendez des gouttes tomb??es et il ne s\'agit pas de la pluie ? Votre robinet fuit s??rement et votre consommation d\'eau va augmenter petit ?? petit. Avant d\'en arriver l??, faites appel ?? un plombie'),
(22, 1, 35, 4, 'D??bouchage des toilettes', 'Oupsi, la chasse d\'eau met 10min ?? s\'??vacuer et l\'option ventouse n\'a pas l\'air d\'??tre efficace... Grosse urgence ! C\'est aussi ??a le travail d\'un plombier : trouver ?? quel niveau les tuyaux sont bouc'),
(23, 1, 35, 4, 'D??bouchage de douche', 'L\'eau de votre douche peine ?? s\'??couler ? Ne cherchez plus, vos canalisations sont bouch??es. Place aux experts des ??quipements sanitaires ! Arm??s de leurs outils et de leur savoir-faire ils offrent un'),
(24, 1, 35, 4, 'Installation de lave-linge', 'Nouveau lave-linge ou remplacement ? L\'installation est la m??me ! Brancher sa machine ?? laver et la mettre en route c\'est un savant m??lange de plomberie et d\'??lectricit??. '),
(25, 1, 35, 4, 'D??bouchage de baignoire', 'Lorsque l\'on parle de canalisations bouch??es, il ne s\'agit jamais d\'une partie de plaisir. Les odeurs et les salet??s s\'accumulent et vous avez besoin de vous en d??barrasser le plus vite possible. En f'),
(26, 1, 32, 5, 'Entretien de jardin', 'Entretenir un jardin est une t??che agr??able pour certains et une corv??e pour d\'autres. Mais un bel ext??rieur est agr??able pour tout le monde et il faut prendre le temps de le faire r??guli??rement pour '),
(27, 1, 32, 5, 'Tonte pelouse', 'C\'est bien souvent la t??che de jardinage sur laquelle on procrastine le plus. La flemme de sortir la rallonge ??lectrique, c\'est dimanche donc on ne peut pas faire de bruit... Et pourtant c???est si agr??'),
(28, 1, 32, 5, 'Taille de haie', 'Les beaux jours arrivent et vous allez passer de plus en plus de temps dans votre jardin. Cependant, durant l\'hiver vos haies ont pris de l\'ampleur et ne ressemblent plus vraiment ?? de belles haies. V'),
(29, 1, 32, 5, 'D??broussaillage', 'D??brousailler son terrain peut ??tre impos?? dans des zones ?? risque d\'incendie. Si ce n\'est pas votre cas, vous en avez peut-??tre juste assez de voir votre jardin dans un tel ??tat. Et si vous manquez d'),
(30, 1, 32, 5, 'Engazonnement de jardin', 'Tout le monde n\'aime pas sp??cialement jardiner mais la plupart d\'entre vous r??ve d\'un jardin digne d\'un parcours de golf. Pour y arriver, il faut beaucoup d\'entretien et de minutie lors du traitement '),
(31, 1, 32, 5, 'Plantation d\'arbres', 'Planter un arbuste ou un arbre est une op??ration d??licate. Faites appel ?? un travailleur professionnel qui viendra avec tous ses outils pour assurer la plantation de votre arbre, son tuteurage, la d??c'),
(32, 1, 32, 5, 'Plantation de fleurs', 'Vous aimeriez ajouter des fleurs dans votre jardin mais vous n\'avez pas la main verte. Vous n\'avez aucune id??e de comment les planter encore moins de ce qu\'il faut faire pour l\'entretien. Faites appel'),
(33, 1, 32, 5, 'Jardinier paysagiste', 'Entretenir un jardin c\'est tout un art : d??broussaillage, engazonnement, tonte de pelouse, b??chage, application d\'engrais, ramassage de feuilles, entretien des haies, ??vacuation des d??chets, taille de'),
(35, 1, 34, 6, 'Repassage', 'On passe de longues heures sur notre canap?? ?? lire, prendre le th??, regarder la t??l??... Il est grand temps de raviver ses couleurs et de nettoyer entre les coussins ! En tissu ou en cuir, les astuces '),
(36, 1, 34, 6, 'Nettoyage des vitres', 'Plus besoin de passer des heures avec le chiffon en mains. Choisissez la fr??quence de vos besoins en m??nage et c\'est comme si c\'est c\'??tait fait. Une aide m??nag??re ?? domicile viendra pour d??charger'),
(38, 1, 34, 6, 'Nettoyage de tapis', 'Vous avez un tapis depuis bien longtemps et il accumule poussi??res, poils et t??ches depuis des ann??es. Vous ne voulez pas vous en s??parer mais il ne ressemble vraiment plus ?? grand chose. Le nettoyer '),
(41, 1, 22, 7, 'Montage de pi??ces moteur', 'Le changement d???un moteur s\'impose bien souvent lorsque la m??canique d???une automobile est souffrante et que les r??parations envisag??es s???av??rent trop lourdes. Vous pouvez alors mandater un professionnel pour qu\'il rende ?? votre v??hicule sa premi??re jeunesse.'),
(42, 1, 22, 7, 'Diagnostic de panne', 'Diagnostic de panne : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(43, 1, 22, 7, 'Chargement de batterie de voiture', 'Chargement de batterie de voiture : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(44, 1, 22, 7, 'R??vision de voiture', 'R??vision de voiture : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(45, 1, 22, 7, 'Montage ou remplacement de r??troviseurs de voiture', '\r\n\r\nMontage ou remplacement de r??troviseurs de voiture : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? p'),
(46, 1, 22, 7, 'Remplacement de roue', 'Remplacement de roue : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(47, 1, 22, 7, 'R??vision de scooter', 'R??vision de scooter : trouvez les meilleurs travailleurs de Kaay Deefar pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(48, 1, 22, 7, 'Montage ou remplacement de phares', 'Montage ou remplacement de phares : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(49, 1, 32, 9, 'Entretien de jardin', 'Entretenir un jardin est une t??che agr??able pour certains et une corv??e pour d\'autres. Mais un bel ext??rieur est agr??able pour tout le monde et il faut prendre le temps de le faire r??guli??rement pour '),
(50, 1, 32, 9, 'Tonte pelouse', 'C\'est bien souvent la t??che de jardinage sur laquelle on procrastine le plus. La flemme de sortir la rallonge ??lectrique, c\'est dimanche donc on ne peut pas faire de bruit... Et pourtant c???est si agr??'),
(51, 1, 32, 9, 'Taille de haie', 'Les beaux jours arrivent et vous allez passer de plus en plus de temps dans votre jardin. Cependant, durant l\'hiver vos haies ont pris de l\'ampleur et ne ressemblent plus vraiment ?? de belles haies. V'),
(52, 1, 32, 9, 'D??broussaillage', 'D??brousailler son terrain peut ??tre impos?? dans des zones ?? risque d\'incendie. Si ce n\'est pas votre cas, vous en avez peut-??tre juste assez de voir votre jardin dans un tel ??tat. Et si vous manquez d'),
(53, 1, 32, 9, 'Engazonnement de jardin', 'Tout le monde n\'aime pas sp??cialement jardiner mais la plupart d\'entre vous r??ve d\'un jardin digne d\'un parcours de golf. Pour y arriver, il faut beaucoup d\'entretien et de minutie lors du traitement '),
(54, 1, 32, 9, 'Plantation d\'arbres', 'Planter un arbuste ou un arbre est une op??ration d??licate. Faites appel ?? un travailleur professionnel qui viendra avec tous ses outils pour assurer la plantation de votre arbre, son tuteurage, la d??c'),
(55, 1, 32, 9, 'Plantation de fleurs', 'Vous aimeriez ajouter des fleurs dans votre jardin mais vous n\'avez pas la main verte. Vous n\'avez aucune id??e de comment les planter encore moins de ce qu\'il faut faire pour l\'entretien. Faites appel'),
(56, 1, 32, 9, 'Jardinier paysagiste', 'Entretenir un jardin c\'est tout un art : d??broussaillage, engazonnement, tonte de pelouse, b??chage, application d\'engrais, ramassage de feuilles, entretien des haies, ??vacuation des d??chets, taille de'),
(57, 1, 22, 11, 'Montage de pi??ces moteur', ' Bonjour je suis un m??canicien moteur et charg?? de toutes les op??rations d\'entretien des moteurs . Pour cela j\'effectue le montage, le d??montage et le r??glage des moteurs. J\'assure la v??rification des pi??ces et des circuits afin d\'??viter toute panne et tout accident.'),
(58, 1, 22, 11, 'Diagnostic de panne', 'Diagnostic de panne : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(59, 1, 22, 11, 'Chargement de batterie de voiture', 'Chargement de batterie de voiture : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(60, 1, 22, 11, 'R??vision de voiture', 'R??vision de voiture : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(61, 1, 22, 11, 'Montage ou remplacement de r??troviseurs de voiture', '\r\n\r\nMontage ou remplacement de r??troviseurs de voiture : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? p'),
(62, 1, 22, 11, 'Remplacement de roue', 'Remplacement de roue : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(63, 1, 22, 11, 'R??vision de scooter', 'R??vision de scooter : trouvez les meilleurs travailleurs de Kaay Deefar pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(64, 1, 22, 11, 'Montage ou remplacement de phares', 'Montage ou remplacement de phares : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(65, 1, 27, 8, 'Pose de carrelage', 'Comment poser un carrelage comme un pro ? Facile ! ??a se fait en 3 ??tapes : choisir le carrelage, choisir la couleur des joints et faire appel ?? Stootie car le carrelage est certainement le rev??tement'),
(66, 1, 27, 8, 'Pose de b??ton cir??', 'Ou oublie le parquet et le carrelage pour laisser place au b??ton cir??. Pour un rendu lisse et de la couleur de votre choix, c\'est une solution abordable. Par contre, appliquer du b??ton cir?? chez soi n'),
(67, 1, 27, 8, 'Pose de papier peint', 'Comment poser du papier peint sans faire de plis ? Et comment proc??der ?? la d??coupe du papier peint pour les angles et les raccords ? Plut??t que de relever des d??fis auxquels vous ne voulez pas vraime'),
(68, 1, 28, 10, 'Alimentaire & produits frais', 'Alimentaire & produits frais : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(69, 1, 28, 10, 'Coursier', '\r\n\r\nCoursier : trouvez les meilleurs prestataire pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !\r\n'),
(70, 1, 28, 15, 'Alimentaire & produits frais', 'Alimentaire & produits frais : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(71, 1, 28, 15, 'Coursier', '\r\n\r\nCoursier : trouvez les meilleurs prestataire pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !\r\n'),
(72, 1, 28, 18, 'Alimentaire & produits frais', 'Alimentaire & produits frais : trouvez les meilleurs Stooters pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !'),
(73, 1, 28, 18, 'Coursier', '\r\n\r\nCoursier : trouvez les meilleurs prestataire pour tous vos petits travaux et services du quotidien. Qualifi??s et recommand??s par la communaut??, ils sont l?? pour vous aider !\r\n'),
(74, 1, 33, 12, 'R??novation d\'appartement ou de maison', 'Vous venez d???acqu??rir un appartement ou une maison qui a besoin d?????tre r??nov?? ? Le logement dans lequel vous r??sidez depuis quelques ann??es n???est plus ?? votre go??t et ne r??pond plus ?? vos besoins ? Fa'),
(75, 1, 33, 12, 'D??molition de mur', 'Vous avez pour projet d\'agrandir une pi??ce chez vous et il faut passer par la case d??molition. Mais comment ??tre s??r qu\'aucune tuyauterie ne passe dans ce mur ? Avant de casser, il faut s\'assurer de n'),
(76, 1, 33, 12, 'Installation de piscine', 'L\'??t?? arrive et vous r??vez de vous d??tendre dans votre piscine mais vous n\'avez aucune envie de l\'installer car cela vous semble ??tre beaucoup trop de travail. En effet, installer une piscine n\'est pa'),
(77, 1, 33, 13, 'R??novation d\'appartement ou de maison', 'Vous venez d???acqu??rir un appartement ou une maison qui a besoin d?????tre r??nov?? ? Le logement dans lequel vous r??sidez depuis quelques ann??es n???est plus ?? votre go??t et ne r??pond plus ?? vos besoins ? Fa'),
(78, 1, 33, 13, 'D??molition de mur', 'Vous avez pour projet d\'agrandir une pi??ce chez vous et il faut passer par la case d??molition. Mais comment ??tre s??r qu\'aucune tuyauterie ne passe dans ce mur ? Avant de casser, il faut s\'assurer de n'),
(79, 1, 33, 13, 'Installation de piscine', 'L\'??t?? arrive et vous r??vez de vous d??tendre dans votre piscine mais vous n\'avez aucune envie de l\'installer car cela vous semble ??tre beaucoup trop de travail. En effet, installer une piscine n\'est pa'),
(80, 1, 35, 17, 'R??paration de fuite d\'eau', 'Les histoires de fuites d\'eau sont toujours un traumatisme. D\'abord ?? l\'??cole, dans les probl??mes de maths et puis maintenant dans la cuisine ! Aidez-nous ?? colmater toutes les fuites d\'eau de Senegal'),
(81, 1, 35, 17, 'R??paration de chasse d???eau', 'La chasse d\'eau, on ne pr??te pas attention ?? son importance tant qu\'elle n\'est pas dysfonctionnelle. Lorsqu\'elle cesse de fonctionner ou qu\'elle fuit, c\'est vite embarrassant ! Les tutoriels ne seront'),
(82, 1, 35, 17, 'Pose de baignoire', 'Vous r??vez d\'une baignoire depuis un moment et ??a y est, vous avez d??cid?? de vous lancer ? Vous ??tes au bon endroit pour ??a ! Gr??ce aux plombiers de Kaay Deefar vous pourrez bient??t vous pr??lassez dan'),
(83, 1, 35, 17, 'R??paration de robinet', 'Vous entendez des gouttes tomb??es et il ne s\'agit pas de la pluie ? Votre robinet fuit s??rement et votre consommation d\'eau va augmenter petit ?? petit. Avant d\'en arriver l??, faites appel ?? un plombie'),
(84, 1, 35, 17, 'D??bouchage des toilettes', 'Oupsi, la chasse d\'eau met 10min ?? s\'??vacuer et l\'option ventouse n\'a pas l\'air d\'??tre efficace... Grosse urgence ! C\'est aussi ??a le travail d\'un plombier : trouver ?? quel niveau les tuyaux sont bouc'),
(85, 1, 35, 17, 'D??bouchage de douche', 'L\'eau de votre douche peine ?? s\'??couler ? Ne cherchez plus, vos canalisations sont bouch??es. Place aux experts des ??quipements sanitaires ! Arm??s de leurs outils et de leur savoir-faire ils offrent un'),
(86, 1, 35, 17, 'Installation de lave-linge', 'Nouveau lave-linge ou remplacement ? L\'installation est la m??me ! Brancher sa machine ?? laver et la mettre en route c\'est un savant m??lange de plomberie et d\'??lectricit??. '),
(87, 1, 35, 17, 'D??bouchage de baignoire', 'Lorsque l\'on parle de canalisations bouch??es, il ne s\'agit jamais d\'une partie de plaisir. Les odeurs et les salet??s s\'accumulent et vous avez besoin de vous en d??barrasser le plus vite possible. En f'),
(88, 1, 31, 16, 'Installation de chauffe-eau', 'L\'installation d???un chauffe-eau n\'est pas une op??ration tr??s compliqu??e mais elle reste cependant d??licate. Quelques comp??tences de plomberie et d?????lectricit?? sont utiles. Il est donc conseill?? pour??? '),
(89, 1, 31, 16, 'R??paration de climatisation', 'La temp??rature ext??rieure grimpe en fl??che et c\'est justement le moment qu\'a choisi votre climatisation pour tomber en panne ? L\'air qui sort est ti??de, une petite fuite d\'eau se cr??e d??s l\'allumage, '),
(90, 1, 31, 16, 'Installation de climatiseur fixe', 'Les temp??ratures montent un peu plus chaque ann??e et avoir un climatiseur est devenu un r??el confort pour les nuits d\'??t??. Le climatiseur fixe est celui qui n??cessite le moins de travaux mais la mise '),
(91, 1, 31, 16, 'Installation de climatiseur mobile', 'Vous venez de vous procurer un climatiseur mobile en vous disant que vous n\'aurez rien ?? faire, ?? part le brancher ?? une prise ??lectrique. C\'??tait sans compter sur le tuyau d\'??vacuation qu\'il faut ins');

-- --------------------------------------------------------

--
-- Table structure for table `personne`
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
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`numero`, `prenom`, `nom`, `sexe`, `email`, `password`, `adresse`, `telephone`, `photo`) VALUES
(1, 'Baye Serigne ', 'Seck', 'm', 'serigneseck@gmail.com', '12345', 'Touba', '771114254', 'seckbaye321.jpg'),
(2, 'Serigne Tacko ', 'Ndao', 'm', 'serignetackouit@gmail.com', '12345', 'Thies', '772213465', 'ndaoserignetacko.jpg'),
(3, 'Serigne Fallou ', 'Dieng', 'm', 'diengserignefallou@gmail.com', '12345', 'Pire', '774238792', 'diengserignefallou.jpg'),
(4, 'Mamadou', 'Gadiaga', 'm', 'gadiagamadou@gmail.com', '12345', 'Mbour', '770104567', 'gadiagamadou.jpg'),
(5, 'Bassirou', 'Ly', 'm', 'bssiroulyl3pcsm@gmail.com', '12345', 'Touba', '773298090', 'bssiroulyl3pcsm.jpg'),
(6, 'Mbacke', 'Mbaye', 'm', 'mbackembaye74@gmail.com', '12345', 'Yoff', '778593165', 'bayembacke.jpg'),
(7, 'Baye Dame', 'Leye', 'm', 'youngbaye@gmail.com', '12345', 'Dakar', '775689067', 'youngbaye.jpg'),
(8, 'Abdou Khadre', 'Diouf', 'm', 'dieylaniabdoukhadre@gmail.com', '12345', 'Mbour', '770243400', 'dieylaniabdoukhadre.jpg'),
(9, 'Fallou', 'Mbaye', 'm', 'mbayefallou@gmail.com', '12345', 'Pire', '775473568', 'mbayefallou.jpg'),
(10, 'Adama', 'Ndoye', 'm', 'ndoyeadama@gmail.com', '12345', 'Pire', '775276708', 'ndoyeadama.jpg'),
(11, 'Baye Matar', 'Mbaye', 'm', 'bayematar@gmail.com', '12345', 'Pire', '778270894', 'bayematar.jpg'),
(12, 'Mor Modou', 'Mbaye', 'm', 'mormoudou@gmail.com', '12345', 'Thies', '774563465', 'mormoudou.jpg'),
(13, 'Baye Bado', 'Ndoye', 'm', 'bayebado@gmail.com', '12345', 'Thiaroye', '775709034', 'bayebado.jpg'),
(14, 'Malick', 'Bane', 'm', 'malickbane@gmail.com', '12345', 'Saint-Loius', '781235467', 'malickbane.jpg'),
(15, 'Fallou', 'Leye', 'm', 'leyefallou@gmail.com', '12345', 'Parcelles Assainies', '762213465', 'leyefallou.jpg'),
(16, 'Serigne Saliou', 'Faye', 'm', 'sesaf@gmail.com', '12345', 'Mbour', '700104567', 'sesaf.jpg'),
(17, 'Ismael', 'Dioku', 'm', 'zimdio@gmail.com', '12345', 'Mbour', '768597165', 'zimdio.jpg'),
(18, 'Modou Fall', 'Kane', 'm', 'gainde2000@gmail.com', '12345', 'Mbour', '781114254', 'gainde2000.jpg'),
(19, 'Baye Lahad', 'Mbacke', '', 'mbackebayelahad21@gmail.com', '12345', 'Touba', '775276708', 'Baye Lahad.jpg'),
(20, 'Thierno', 'Mbaye', '', 'thierno221@gmail.com', '12345', 'Pire', '778407897', 'Thierno.jpg'),
(21, 'Serigne Mbacke', 'Dioum', '', 'dioumserignembacke@gmail.com', '12345', 'Guediaway', '773402767', 'Serigne Mbacke.jpg'),
(22, 'Mame Ousmane', 'Niassy', '', 'ouzykalash@gmail.com', '12345', 'Mbour', '778596354', 'Mame Ousmane.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `idPhoto` int(11) NOT NULL,
  `nomPhoto` varchar(50) DEFAULT NULL,
  `idService` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo`
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
-- Table structure for table `photodemande`
--

DROP TABLE IF EXISTS `photodemande`;
CREATE TABLE `photodemande` (
  `idPhotoDemande` int(11) NOT NULL,
  `nomPhoto` varchar(100) NOT NULL,
  `idDemande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photodemande`
--

INSERT INTO `photodemande` (`idPhotoDemande`, `nomPhoto`, `idDemande`) VALUES
(1, 'MyPhotos/30112021_165508_menage.jpg', 1),
(2, 'MyPhotos/30112021_165508_menage2.jpg', 1),
(3, 'MyPhotos/30112021_165508_menage3.jpg', 1),
(4, 'MyPhotos/30112021_165508_menage4.jpg', 1),
(9, 'MyPhotos/07122021_111250_bmw-768688_1920.jpg', 3),
(10, 'MyPhotos/07122021_111250_bmw-918408_1920.jpg', 3),
(11, 'MyPhotos/07122021_111250_car-63930_1920.jpg', 3),
(12, 'MyPhotos/07122021_111250_car-604019_1920.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `prestataire`
--

DROP TABLE IF EXISTS `prestataire`;
CREATE TABLE `prestataire` (
  `idPrestataire` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `propos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestataire`
--

INSERT INTO `prestataire` (`idPrestataire`, `username`, `profession`, `numero`, `propos`) VALUES
(1, 'seckbaye321', 'Mecanicien', 1, 'Hello ?? tous ! Je suis Baye Serigne seck.. on me surnomme seck Ndanane.. je suis plombier sanitaire .. j\'ai 3 ans d\'exp??rience .. je travaille au sein de l\'entreprise Samsara . Je fais de la peinture et je monte des meubles, salle de bains, cuisines et autres. Tr??s bonne journ??e ?? vous !'),
(2, 'ndaoserignetacko', 'Menuisier', 2, 'Je vous propose mes services de montage de meubles, lits????, tringles, luminaires, ??tag??res et de petits travaux de bricolage... Je suis aussi disponible pour d??boucher vos toilettes, ??viers, lavabos, douches et baignoires et canalisations mais aussi pour des petits travaux de plomberie tels que les fuites'),
(3, 'diengserignefallou', 'Peintre', 3, 'Bonjour, je propose mes services de r??novations depuis 8 ans des exp??riences dans les domaines pose des carrelages   parquet,  enduit / peinture, plaque de pl??tre, pose de cloison, laine de verre, isolation,  lino  ragreages la plomberie papiers peints pos?? pierre de parements fixations de t??l??s che'),
(4, 'gadiagamadou', 'Plombier', 4, 'Plombier/chauffagiste dipl??m??, j???assure depuis 15 ans la maintenance l???installation et le d??pannage de vos ??quipements.Je suis v??hicul?? et dispose d???un outillage professionnel de qualit??. Exemple de prestations r??alis??es que vous pourrez constater sur les avis; Installation de tuyauterie avec divers'),
(5, 'bssiroulyl3pcsm', 'Jardinier', 5, 'Bonjour ?? tous. Je suis ?? votre disposition pour r??aliser tous vos travaux de r??novation d\'int??rieur des murs aux sols en passant par la d??coration et d\'am??nagement d\'ext??rieur. Outillage pro et mat??riel pro vous garantiront une finition ?? la hauteur de vos attentes. Je me d??place volontiers pour ??v'),
(6, 'bayembacke', 'Technicien de surface', 6, 'Bonjour ?? tous, Je m\'appelle Mbacke Mbaye , je propose mes services dans le domaine de l\'aide m??nag??re et l\'aide ?? la personne. J\'ai plusieurs ann??es d\'exp??riences dans le nettoyage et le service ?? la personne. Je suis une personne s??rieuse et appliqu??e, toutes les missions que j\'effectue sont de qu'),
(7, 'youngbaye', 'Mecanicien', 7, 'Bonjour ?? tous, Je suis m??canicien d\'entretien et diagnostic des pannes ??lectronique. En m??me temps, je suis un homme ?? tout faire. Tr??s bonne journ??e.'),
(8, 'dieylaniabdoukhadre', 'Carreleur', 8, 'Bonjour , je suis disponible et exp??riment??. Je vous propose mes services avec les outils professionnels n??cessaires pour un travail soign?? et de qualit??. Je vous assure un tarif inchang?? de celui convenu,sou r??serve d\'avoir communiqu?? tous les ??l??ments.'),
(9, 'mbayefallou', 'Jardinier', 9, 'Bonjour, Paysagiste de profession, mon ??quipe et moi m??me proposons de nombreux services sur Kaay Defar tels que : -Taille de haie -abattage d???arbres -dessouchage -pose de pelouse -tonte -ramassage de feuille -??vacuation de d??chets vert -b??chage -d???heserbage -plantation -creation ( massif, bassin, e'),
(10, 'ndoyeadama', 'Chauffeur', 10, 'Bonjour, je suis ?? votre disposition pour tout transport et manutention. Je poss??de un fourgon ainsi que le mat??riel qui va avec (diable, sangle, couverture,???) pour transporter vos biens en s??curit??. J???ai ??galement une d??panneuse pour transporter vos v??hicules. A tr??s vite.'),
(11, 'bayematar', 'Mecanicien', 11, 'Bonjour, Technicien dans l\'industrie et passionn?? j\'aime rendre service et mettre ?? profit mon exp??rience. M??ticuleux transparent et avenant, je ferais en sorte de trouver la meilleure solution rapport qualit?? prix ; et je traiterais l\'??quipement comme ci que c\'??tait le mien. Cordialement'),
(12, 'mormoudou', 'Ma??on', 12, 'Bonjour, nous sommes une soci??t?? de r??novation, travaux, chantiers tous corps de m??tiers avec garantie d??cennale. Nouveaux sur Stootie, nous proposons des prix int??ressants et nous nous d??pla??ons gratuitement pour effectuer vos devis. N???h??sitez pas ?? nous soumettre vos projets de r??novation, nous me'),
(13, 'bayebado', 'Ma??on', 13, 'Bonjour ?? tous ! Je m\'appelle Baye Bado, je vous propose mes services dans le domaine de la r??novation d\'int??rieur. je suis disponible pour tous types de travaux alors n\'h??sitez pas ?? me contacter pour plus de renseignements, je serais ravi d\'??changer avec vous ! ?? tr??s bient??t.'),
(14, 'malickbane', 'Platrier', 14, 'bonjour, je vous propose mes services de la r??novations 8 ans des exp??riences dans les domaines pose des carrelages   parquet,  enduit / peinture, plaque de pl??tre, pose de cloison, laine de verre, isolation,  lino  ragreages la plomberie papiers peints pos?? pierre de parements fixations de t??l??s ch'),
(15, 'leyefallou', 'Chauffeur', 15, 'Bonjour, professionnels de la soci??t?? TRANSPORT SUR ?? votre service, d??placement rapide et prix imbattable. Nous cherchons toujours la satisfaction du client. Deux v??hicules disponibles, un 14m3 et un poids-lourd de 60m3 pour des d??m??nagements de plus grande envergure.'),
(16, 'sesaf', 'Frigoriste', 16, 'Bonjour ?? tous, Je m\'appelle Serigne Saliou Faye et j\'ai mont?? mon entreprise pour regrouper tous les services de bricolages. Nous nous proposons de la plomberie, des travaux de r??novation, du d??pannage et des chauffages. Nous r??alisons ??galement des ??tudes et les travaux associ??s, des d??pannages, e'),
(17, 'zimdio', 'Plombier', 17, 'Bonjour ?? tous ! Particulier, je vous propose mes services pour tout vos travaux en bricolage( Montage et d??montage de meubles, accrochage et fixation au mur de meubles, cadres, tableaux, ??tag??res, miroirs, tv meubles. Pose de luminaires, radiateurs, tringles, stores.....) dans toute l?????le de France'),
(18, 'gainde2000', 'Chauffeur', 18, 'Bonjour, Je suis tr??s polyvalent : _ montage de meubles ???? _ transport d\'objets lourds ???? _ aide au d??m??nagement ???? _ autres services du quotidien Je serais ravi de vous rendre service. Bonne journ??e ?? tous ??????');

-- --------------------------------------------------------

--
-- Table structure for table `service`
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
-- Dumping data for table `service`
--

INSERT INTO `service` (`idService`, `nom`, `description`, `DateAjout`, `domain`) VALUES
(22, 'Mecanicien', '\r\nVous ??tes en panne et avez besoin d?????tre d??pann?? en urgence ?\r\n Vous cherchez un garagiste pour l???entretien et la r??paration de votre v??hicule ? \r\nNous vous mettons en rapport avec le m??canicien le plus proche pour assurer le d??pannage sur place ou le remorquage jusqu????? l???atelier pour faire le diagnostic du v??hicule et vous pr??senter les r??parations ?? effectuer.\r\n', '2021-11-12 11:29:41', 'Reparation'),
(23, 'Menuisier', 'Le travail du bois est une nos passion car c???est un mat??riau noble.Tout nos menuisiers poss??dent une exp??rience et un savoir-faire qui leur permet d???effectuer des t??ches d???une qualit?? et d???une pr??cision ?? la hauteur de vos exigences. Que ce soit pour la r??alisation ou la pose de portes, fen??tres, parquets, meubles et les si??ges, nos ouvriers vous fournissent une prestation sur mesure avec une finition in??gal??e.\r\n', '2021-11-12 11:30:18', 'Bricolage'),
(24, 'Menuisier metallique', 'Que vous soyez un particulier ou un professionnel, que ce soit pour de la construction ou de la r??novation, nous assurons tous vos travaux de menuiserie ainsi que tous types de travaux de serrurerie, de m??tallerie et de soudure. Nous prenons ainsi en charge la pose de portails, la fabrication de pergolas, la pose d???escaliers m??talliques, de garde-corps, de m??me que les travaux de ferronnerie d???art.\r\n  ', '2021-11-12 11:31:06', 'Bricolage'),
(25, 'Peintre', 'La peinture est la solution la plus efficace et rapide pour faire de son int??rieur un lieu unique ! C???est l?????l??ment qui constitue la touche finale qui donne de l?????clat et une apparence correspondant ?? ses go??ts dans les pi??ces d???une habitation ou d???un local. La r??novation de peinture est une intervention capitale. Et cela n??cessite un savoir-faire et qualification particuli??re que poss??de Sen Ouvrier.\r\n', '2021-11-12 11:31:57', 'Decoration'),
(26, 'Platrier', 'Pour r??nover, moderniser, changer votre int??rieur dans votre maison, appartement, dans votre bureau ou dans votre local commercial ou industriel, le pl??tre est une excellente solution car il am??liore l?????tanch??it?? ?? l???air des immeubles et b??timents. C???est un mat??riau qui s???adapte ?? tous les syst??mes de construction. De plus son inertie thermique assure la stabilit?? de la temp??rature int??rieure quelque soit la saison.\r\n', '2021-11-12 11:33:08', 'Decoration'),
(27, 'Carreleur', 'Le r??le du carreleur est de poser des pi??ces de carrelage sur les murs, les parois et les sols. Il intervient aussi bien dans les cuisines que les salles de bains, en passant par toutes les pi??ces de la maison. La pose du carrelage s???effectue apr??s le travail du pl??trier et du ma??on, notamment sur les murs. En professionnels qualifi??s, nous participons ?? la d??coration et ?? la finition de chaque pi??ce de la maison.\r\n', '2021-11-12 11:33:59', 'Decoration'),
(28, 'Chauffeur', 'Nous proposons les services de chauffeurs ma??tres, de chauffeurs livreurs et de transporteur de bagages. Le chauffeur de ma??tre doit ??tre disponible sur place lorsque son employeur a besoin de se d??placer avec son v??hicule, il doit s???assurer que le v??hicule est toujours en bon ??tat m??canique et de propret?? et que tout est pr??t pour un d??part rapide. Il s???occupe ??galement des bagages.\r\n', '2021-11-12 11:34:33', 'Transport'),
(29, 'Cle minute', 'Besoin de reproduire votre jeu de clef ? Nous reproduisons ?? l???identique tous les types de clefs : plates simples, cl??s plates doubles, ?? gorges, ?? points, ?? vagues, ronde ?? usage personnel ou ?? usage professionnel, coques de cl??s de voitures, etc. Nous proposons ??galement des services de conseil, r??paration et ouvertures ainsi que tous les ??l??ments constituant l???univers de la serrure et des cl??s : cl??s, barillets, g??ches, t??ti??res, verrous de s??curit??, loquets, poign??es, etc.\r\n', '2021-11-12 11:35:15', 'Bricolage'),
(30, 'Electricien', 'Notre ??quipe d?????lectriciens effectue tous types de travaux d???installations ??lectriques et de raccordement d???appareils ??lectriques dans diverses sp??cialit??s : r??seaux communicants, ??clairage, s??curit??, confort thermique pour tous lieux : immeubles, maisons, bureaux, appartements, usines, commerces, lieux publics, lieux de spectacle??? en construction ou en r??novation. Pour un besoin de s??curit?? pour vous et vos proches, il est important de s???assurer que votre installation soit bien aux normes.\r\n', '2021-11-12 11:35:46', 'Traveaux & Renovations'),
(31, 'Frigoriste', 'Besoin d???installer des ??quipements frigorifiques ? Nous intervenons pour l???installation et l???entretien de vos syst??mes r??frig??r??s (r??frig??rateurs, climatiseurs, chambres froides, camions frigorifiques, vitrines r??frig??r??es, pompes ?? chaleur, etc). Nous savons ?? quel point il est important pour vous de disposer de mat??riels en bon ??tat, ainsi nous s??lectionnons avec rigueur nos fournisseurs et le mat??riel que nous installons chez vous. Notre ??quipe r??alise avec vous un diagnostic de vos besoins et des contraintes techniques sur place, le but ??tant de vous proposer un devis d??taill??, personnalis?? et sur mesure.\r\n', '2021-11-12 11:36:27', 'Electromenager'),
(32, 'Jardinier', 'Tous vos travaux de jardinage seront r??alis??s par des jardiniers-paysagistes qualifi??s. Ces petits travaux de jardinage vous permettront d???embellir votre jardin et ainsi en profiter un maximum tout au long de l???ann??e : tonte des pelouses, d??sherbage, entretien des plantes, entretien du potager, ramasser les fruits et les l??gumes pour votre consommation personnelle, b??chage, binage, taille de haies et massifs, refleurissement, r??-engazonnement partiel, arrosage, rempotage, r??colte, ramassage des feuilles mortes et d??chets v??g??taux, d??neigement, d??broussaillage des abords de la maison.\r\n', '2021-11-12 11:37:04', 'Decoration'),
(33, 'Ma??on', 'Vous avez un projet de r??novation en vue et ne connaissez rien des travaux de ma??onnerie ? Rassurez-vous, vous ??tes ?? bon port. Parmi les travaux de ma??onnerie int??rieure et ext??rieure que nous faisons, il y a le rajout d?????tage, l???extension/agrandissement, le traitement d???humidit??, l???application d???enduits, les jointures de murs, la r??alisation de b??ton cir??, etc. Pour ??tre s??r de r??ussir vos travaux, sollicitez les services de Sen Ouvrier ; vous b??n??ficierez de prestations de qualit??.\r\n', '2021-11-12 11:37:34', 'Traveaux & Renovations'),
(34, 'Technicien de surface', 'Sa mission peut ??tre r??sum??e en trois mots : Responsable de la propret?? des espaces. En fait, ce n???est pas aussi simple que l???on peut imaginer, car cette responsabilit?? est bien tr??s large. Il lui revient de garantir l???hygi??ne de votre maison ou bureau par le d??crassage et l???entretien de tous les types de sols (parquets, moquettes, dallages, carreaux, etc), de tous les types de murs, plafonds, escaliers, balcons, terrasses, vitrines, fen??tres, portes, interrupteurs ainsi que le mobilier (placards, bureaux, si??ges, banquettes), ainsi que dans le nettoyage de tous les types d?????quipements (mat??riel informatique, installations de cuisines, sanitaires, etc.).\r\n', '2021-11-12 11:38:23', 'Service a domicile'),
(35, 'Plombier', 'Nos professionnels se tiennent ?? votre disposition pour r??parer vos probl??mes de petite plomberie au quotidien : fuite de chasse de WC, canalisations bouch??es, robinet cass?? ou qui goutte, probl??me d?????tanch??it?? du lavabo??? R??active et ?? l?????coute, nos artisans plombiers sont en mesure d???intervenir aupr??s de votre domicile dans les meilleurs d??lais aussi bien pour des urgences et des d??pannages en plomberie que pour des projets de r??novation ou d???am??nagement.\r\n', '2021-11-12 11:39:01', 'Sanitaire');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`),
  ADD KEY `fk_client` (`numero`);

--
-- Indexes for table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`idDemande`),
  ADD KEY `fk_demande` (`idClient`),
  ADD KEY `fk_demande2` (`idPrestataire`);

--
-- Indexes for table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`idFavoris`),
  ADD KEY `fk_favoris1` (`idClient`),
  ADD KEY `fk_favoris2` (`idPrestataire`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_image` (`idOffre`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Message1` (`emmetteur`),
  ADD KEY `fk_Message2` (`destinataire`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`idNote`),
  ADD KEY `fk_note1` (`idClient`),
  ADD KEY `fk_note2` (`idPrestataire`);

--
-- Indexes for table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`idOffre`),
  ADD KEY `fk_offre1` (`idService`),
  ADD KEY `fk_offre2` (`idPrestataire`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`numero`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`),
  ADD KEY `fk_photo` (`idService`);

--
-- Indexes for table `photodemande`
--
ALTER TABLE `photodemande`
  ADD PRIMARY KEY (`idPhotoDemande`),
  ADD KEY `fk_photodemande` (`idDemande`);

--
-- Indexes for table `prestataire`
--
ALTER TABLE `prestataire`
  ADD PRIMARY KEY (`idPrestataire`),
  ADD KEY `fk_prestataire` (`numero`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `demande`
--
ALTER TABLE `demande`
  MODIFY `idDemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `idFavoris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offre`
--
ALTER TABLE `offre`
  MODIFY `idOffre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `photodemande`
--
ALTER TABLE `photodemande`
  MODIFY `idPhotoDemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prestataire`
--
ALTER TABLE `prestataire`
  MODIFY `idPrestataire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`numero`) REFERENCES `personne` (`numero`);

--
-- Constraints for table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `fk_demande` FOREIGN KEY (`idClient`) REFERENCES `personne` (`numero`),
  ADD CONSTRAINT `fk_demande2` FOREIGN KEY (`idPrestataire`) REFERENCES `personne` (`numero`);

--
-- Constraints for table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `fk_favoris1` FOREIGN KEY (`idClient`) REFERENCES `personne` (`numero`),
  ADD CONSTRAINT `fk_favoris2` FOREIGN KEY (`idPrestataire`) REFERENCES `personne` (`numero`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image` FOREIGN KEY (`idOffre`) REFERENCES `offre` (`idOffre`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_Message1` FOREIGN KEY (`emmetteur`) REFERENCES `personne` (`numero`),
  ADD CONSTRAINT `fk_Message2` FOREIGN KEY (`destinataire`) REFERENCES `personne` (`numero`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `fk_note1` FOREIGN KEY (`idClient`) REFERENCES `personne` (`numero`),
  ADD CONSTRAINT `fk_note2` FOREIGN KEY (`idPrestataire`) REFERENCES `personne` (`numero`);

--
-- Constraints for table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `fk_offre1` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`),
  ADD CONSTRAINT `fk_offre2` FOREIGN KEY (`idPrestataire`) REFERENCES `personne` (`numero`);

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `fk_photo` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`);

--
-- Constraints for table `photodemande`
--
ALTER TABLE `photodemande`
  ADD CONSTRAINT `fk_photodemande` FOREIGN KEY (`idDemande`) REFERENCES `demande` (`idDemande`);

--
-- Constraints for table `prestataire`
--
ALTER TABLE `prestataire`
  ADD CONSTRAINT `fk_prestataire` FOREIGN KEY (`numero`) REFERENCES `personne` (`numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
