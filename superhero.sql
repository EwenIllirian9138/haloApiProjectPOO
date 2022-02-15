-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 15 fév. 2022 à 15:18
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
-- Base de données : `superhero`
--
CREATE DATABASE IF NOT EXISTS `superhero` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `superhero`;

-- --------------------------------------------------------

--
-- Structure de la table `modification`
--

DROP TABLE IF EXISTS `modification`;
CREATE TABLE IF NOT EXISTS `modification` (
  `IdModification` int(11) NOT NULL AUTO_INCREMENT,
  `DateTime` datetime DEFAULT NULL,
  `IdSuperHero` int(11) DEFAULT NULL,
  `IdUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdModification`),
  KEY `FK_modification_superhero` (`IdSuperHero`),
  KEY `FK_modification_userwiki` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `superhero`
--

DROP TABLE IF EXISTS `superhero`;
CREATE TABLE IF NOT EXISTS `superhero` (
  `IdSuperHero` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `AlterEgo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Aliases` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PlaceOfBirth` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FirstAppearance` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Alignment` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ImageLink` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IdApi` int(11) NOT NULL,
  `Published` tinyint(4) NOT NULL,
  PRIMARY KEY (`IdSuperHero`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `superhero`
--

INSERT INTO `superhero` (`IdSuperHero`, `Name`, `AlterEgo`, `Aliases`, `PlaceOfBirth`, `FirstAppearance`, `Alignment`, `ImageLink`, `IdApi`, `Published`) VALUES
(1, 'A-Bomb', 'No alter egos found.', 'Rick Jones', 'Scarsdale, Arizona', 'Hulk Vol 2 #2 (April, 2008) (as A-Bomb)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/10060.jpg', 0, 0),
(2, 'Arclight', 'No alter egos found.', NULL, 'Vietnam', '(In shadow) Uncanny X-Men #210 (1986), (fully) X-Factor #10 (1986)', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/832.jpg', 0, 0),
(3, 'Big Barda', 'No alter egos found.', 'Barda', NULL, 'Mister Miracle (Volume 1) #4', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1169.jpg', 0, 0),
(4, 'Bloodhawk', 'No alter egos found.', 'Lemuel Halcon', NULL, 'X-Men (2099) #1', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/1510.jpg', 0, 0),
(5, 'Captain Universe', 'No alter egos found.', 'Guardian of Eternity', NULL, 'Micronauts #8 (August, 1979)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/855.jpg', 0, 0),
(6, 'Daredevil', 'No alter egos found.', 'Matt', 'New York City, New York', 'Daredevil #1 (April, 1964)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/52.jpg', 0, 0),
(7, 'Emma Frost', 'No alter egos found.', 'Storm', 'Boston, Massachusetts', 'UNCANNY X-MEN #132', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/325.jpg', 0, 0),
(8, 'Ghost Rider II', 'No alter egos found.', NULL, NULL, 'Ghost Rider Vol. 2 #1', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/68.jpg', 0, 0),
(9, 'Hela', 'No alter egos found.', 'Goddess of Death', NULL, 'Journey into Mystery #102', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/10835.jpg', 0, 0),
(10, 'Jessica Jones', 'Power Woman', 'Knightress', 'Forrest Hills, New York City', 'Amazing Spider-Man #4 (September, 1963)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/10403.jpg', 0, 0),
(11, 'Leader', 'No alter egos found.', NULL, 'Boise, Idaho', NULL, 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/885.jpg', 0, 0),
(12, 'Medusa', 'No alter egos found.', 'Madam Medusa', 'Island of Attilan, Atlantic Ocean', 'Fantastic Four Vol. 1 #36 (1965)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/96.jpg', 0, 0),
(13, 'Namor', 'No alter egos found.', 'Imperius Rex', 'Atlantis', 'Motion Picture Funnies Weekly #1 (April, 1939)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/137.jpg', 0, 0),
(14, 'Plastique', 'No alter egos found.', NULL, NULL, 'Fury of Firestorm #7', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1176.jpg', 0, 0),
(15, 'Robin', 'Batman II, Nightwing', 'Renegade', NULL, 'Detective Comics #38 (April, 1940)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/850.jpg', 0, 0),
(16, 'Sinestro', 'No alter egos found.', 'Green Lantern', 'Korugar City, Korugar', 'Green Lantern Vol 2 #7', 'neutral', 'https://www.superherodb.com/pictures2/portraits/10/100/781.jpg', 0, 0),
(17, 'Superboy', 'No alter egos found.', 'Experiment 13; Superman; Project: Superman; Carl Krummett; Project: Lionel Luthor; The Metropolis Kid', 'Project Cadmus cloning facility', 'Adventures of Superman #500 (June, 1993)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/789.jpg', 0, 0),
(18, 'Utgard-Loki', 'No alter egos found.', NULL, 'Jotunheim', NULL, 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1484.jpg', 0, 0),
(19, 'Wondra', 'No alter egos found.', NULL, NULL, NULL, 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/1290.jpg', 0, 0),
(20, 'A-Bomb', 'No alter egos found.', 'Rick Jones', 'Scarsdale, Arizona', 'Hulk Vol 2 #2 (April, 2008) (as A-Bomb)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/10060.jpg', 1, 1),
(21, 'Arclight', 'No alter egos found.', NULL, 'Vietnam', '(In shadow) Uncanny X-Men #210 (1986), (fully) X-Factor #10 (1986)', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/832.jpg', 41, 1),
(22, 'Big Barda', 'No alter egos found.', 'Barda', NULL, 'Mister Miracle (Volume 1) #4', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1169.jpg', 81, 1),
(23, 'Bloodhawk', 'No alter egos found.', 'Lemuel Halcon', NULL, 'X-Men (2099) #1', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/1510.jpg', 121, 1),
(24, 'Captain Universe', 'No alter egos found.', 'Guardian of Eternity', NULL, 'Micronauts #8 (August, 1979)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/855.jpg', 161, 1),
(25, 'Daredevil', 'No alter egos found.', 'Matt', 'New York City, New York', 'Daredevil #1 (April, 1964)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/52.jpg', 201, 1),
(26, 'Emma Frost', 'No alter egos found.', 'Storm', 'Boston, Massachusetts', 'UNCANNY X-MEN #132', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/325.jpg', 241, 1),
(27, 'Ghost Rider II', 'No alter egos found.', NULL, NULL, 'Ghost Rider Vol. 2 #1', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/68.jpg', 281, 1),
(28, 'Hela', 'No alter egos found.', 'Goddess of Death', NULL, 'Journey into Mystery #102', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/10835.jpg', 321, 1),
(29, 'Jessica Jones', 'Power Woman', 'Knightress', 'Forrest Hills, New York City', 'Amazing Spider-Man #4 (September, 1963)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/10403.jpg', 361, 1),
(30, 'Leader', 'No alter egos found.', NULL, 'Boise, Idaho', NULL, 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/885.jpg', 401, 1),
(31, 'Medusa', 'No alter egos found.', 'Madam Medusa', 'Island of Attilan, Atlantic Ocean', 'Fantastic Four Vol. 1 #36 (1965)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/96.jpg', 441, 1),
(32, 'Namor', 'No alter egos found.', 'Imperius Rex', 'Atlantis', 'Motion Picture Funnies Weekly #1 (April, 1939)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/137.jpg', 481, 1),
(33, 'Plastique', 'No alter egos found.', NULL, NULL, 'Fury of Firestorm #7', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1176.jpg', 521, 1),
(34, 'Robin', 'Batman II, Nightwing', 'Renegade', NULL, 'Detective Comics #38 (April, 1940)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/850.jpg', 561, 1),
(35, 'Sinestro', 'No alter egos found.', 'Green Lantern', 'Korugar City, Korugar', 'Green Lantern Vol 2 #7', 'neutral', 'https://www.superherodb.com/pictures2/portraits/10/100/781.jpg', 601, 1),
(36, 'Superboy', 'No alter egos found.', 'Experiment 13; Superman; Project: Superman; Carl Krummett; Project: Lionel Luthor; The Metropolis Kid', 'Project Cadmus cloning facility', 'Adventures of Superman #500 (June, 1993)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/789.jpg', 641, 1),
(37, 'Utgard-Loki', 'No alter egos found.', NULL, 'Jotunheim', NULL, 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1484.jpg', 681, 1),
(38, 'Wondra', 'No alter egos found.', NULL, NULL, NULL, 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/1290.jpg', 721, 1),
(39, 'A-Bomb', 'No alter egos found.', 'Rick Jones', 'Scarsdale, Arizona', 'Hulk Vol 2 #2 (April, 2008) (as A-Bomb)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/10060.jpg', 1, 1),
(40, 'Arclight', 'No alter egos found.', NULL, 'Vietnam', '(In shadow) Uncanny X-Men #210 (1986), (fully) X-Factor #10 (1986)', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/832.jpg', 41, 1),
(41, 'Big Barda', 'No alter egos found.', 'Barda', NULL, 'Mister Miracle (Volume 1) #4', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1169.jpg', 81, 1),
(42, 'Bloodhawk', 'No alter egos found.', 'Lemuel Halcon', NULL, 'X-Men (2099) #1', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/1510.jpg', 121, 1),
(43, 'Captain Universe', 'No alter egos found.', 'Guardian of Eternity', NULL, 'Micronauts #8 (August, 1979)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/855.jpg', 161, 1),
(44, 'Daredevil', 'No alter egos found.', 'Matt', 'New York City, New York', 'Daredevil #1 (April, 1964)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/52.jpg', 201, 1),
(45, 'Emma Frost', 'No alter egos found.', 'Storm', 'Boston, Massachusetts', 'UNCANNY X-MEN #132', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/325.jpg', 241, 1),
(46, 'Ghost Rider II', 'No alter egos found.', NULL, NULL, 'Ghost Rider Vol. 2 #1', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/68.jpg', 281, 1),
(47, 'Hela', 'No alter egos found.', 'Goddess of Death', NULL, 'Journey into Mystery #102', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/10835.jpg', 321, 1),
(48, 'Jessica Jones', 'Power Woman', 'Knightress', 'Forrest Hills, New York City', 'Amazing Spider-Man #4 (September, 1963)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/10403.jpg', 361, 1),
(49, 'Leader', 'No alter egos found.', NULL, 'Boise, Idaho', NULL, 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/885.jpg', 401, 1),
(50, 'Medusa', 'No alter egos found.', 'Madam Medusa', 'Island of Attilan, Atlantic Ocean', 'Fantastic Four Vol. 1 #36 (1965)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/96.jpg', 441, 1),
(51, 'Namor', 'No alter egos found.', 'Imperius Rex', 'Atlantis', 'Motion Picture Funnies Weekly #1 (April, 1939)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/137.jpg', 481, 1),
(52, 'Plastique', 'No alter egos found.', NULL, NULL, 'Fury of Firestorm #7', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1176.jpg', 521, 1),
(53, 'Robin', 'Batman II, Nightwing', 'Renegade', NULL, 'Detective Comics #38 (April, 1940)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/850.jpg', 561, 1),
(54, 'Sinestro', 'No alter egos found.', 'Green Lantern', 'Korugar City, Korugar', 'Green Lantern Vol 2 #7', 'neutral', 'https://www.superherodb.com/pictures2/portraits/10/100/781.jpg', 601, 1),
(55, 'Superboy', 'No alter egos found.', 'Experiment 13; Superman; Project: Superman; Carl Krummett; Project: Lionel Luthor; The Metropolis Kid', 'Project Cadmus cloning facility', 'Adventures of Superman #500 (June, 1993)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/789.jpg', 641, 1),
(56, 'Utgard-Loki', 'No alter egos found.', NULL, 'Jotunheim', NULL, 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1484.jpg', 681, 1),
(57, 'Wondra', 'No alter egos found.', NULL, NULL, NULL, 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/1290.jpg', 721, 1),
(58, 'A-Bomb', 'No alter egos found.', 'Rick Jones', 'Scarsdale, Arizona', 'Hulk Vol 2 #2 (April, 2008) (as A-Bomb)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/10060.jpg', 1, 1),
(59, 'Arclight', 'No alter egos found.', NULL, 'Vietnam', '(In shadow) Uncanny X-Men #210 (1986), (fully) X-Factor #10 (1986)', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/832.jpg', 41, 1),
(60, 'Big Barda', 'No alter egos found.', 'Barda', NULL, 'Mister Miracle (Volume 1) #4', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1169.jpg', 81, 1),
(61, 'Bloodhawk', 'No alter egos found.', 'Lemuel Halcon', NULL, 'X-Men (2099) #1', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/1510.jpg', 121, 1),
(62, 'Captain Universe', 'No alter egos found.', 'Guardian of Eternity', NULL, 'Micronauts #8 (August, 1979)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/855.jpg', 161, 1),
(63, 'Daredevil', 'No alter egos found.', 'Matt', 'New York City, New York', 'Daredevil #1 (April, 1964)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/52.jpg', 201, 1),
(64, 'Emma Frost', 'No alter egos found.', 'Storm', 'Boston, Massachusetts', 'UNCANNY X-MEN #132', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/325.jpg', 241, 1),
(65, 'Ghost Rider II', 'No alter egos found.', NULL, NULL, 'Ghost Rider Vol. 2 #1', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/68.jpg', 281, 1),
(66, 'Hela', 'No alter egos found.', 'Goddess of Death', NULL, 'Journey into Mystery #102', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/10835.jpg', 321, 1),
(67, 'Jessica Jones', 'Power Woman', 'Knightress', 'Forrest Hills, New York City', 'Amazing Spider-Man #4 (September, 1963)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/10403.jpg', 361, 1),
(68, 'Leader', 'No alter egos found.', NULL, 'Boise, Idaho', NULL, 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/885.jpg', 401, 1),
(69, 'Medusa', 'No alter egos found.', 'Madam Medusa', 'Island of Attilan, Atlantic Ocean', 'Fantastic Four Vol. 1 #36 (1965)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/96.jpg', 441, 1),
(70, 'Namor', 'No alter egos found.', 'Imperius Rex', 'Atlantis', 'Motion Picture Funnies Weekly #1 (April, 1939)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/137.jpg', 481, 1),
(71, 'Plastique', 'No alter egos found.', NULL, NULL, 'Fury of Firestorm #7', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1176.jpg', 521, 1),
(72, 'Robin', 'Batman II, Nightwing', 'Renegade', NULL, 'Detective Comics #38 (April, 1940)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/850.jpg', 561, 1),
(73, 'Sinestro', 'No alter egos found.', 'Green Lantern', 'Korugar City, Korugar', 'Green Lantern Vol 2 #7', 'neutral', 'https://www.superherodb.com/pictures2/portraits/10/100/781.jpg', 601, 1),
(74, 'Superboy', 'No alter egos found.', 'Experiment 13; Superman; Project: Superman; Carl Krummett; Project: Lionel Luthor; The Metropolis Kid', 'Project Cadmus cloning facility', 'Adventures of Superman #500 (June, 1993)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/789.jpg', 641, 1),
(75, 'Utgard-Loki', 'No alter egos found.', NULL, 'Jotunheim', NULL, 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1484.jpg', 681, 1),
(76, 'Wondra', 'No alter egos found.', NULL, NULL, NULL, 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/1290.jpg', 721, 1),
(77, 'A-Bomb', 'No alter egos found.', 'Rick Jones', 'Scarsdale, Arizona', 'Hulk Vol 2 #2 (April, 2008) (as A-Bomb)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/10060.jpg', 1, 1),
(78, 'Arclight', 'No alter egos found.', NULL, 'Vietnam', '(In shadow) Uncanny X-Men #210 (1986), (fully) X-Factor #10 (1986)', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/832.jpg', 41, 1),
(79, 'Big Barda', 'No alter egos found.', 'Barda', NULL, 'Mister Miracle (Volume 1) #4', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1169.jpg', 81, 1),
(80, 'Bloodhawk', 'No alter egos found.', 'Lemuel Halcon', NULL, 'X-Men (2099) #1', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/1510.jpg', 121, 1),
(81, 'Captain Universe', 'No alter egos found.', 'Guardian of Eternity', NULL, 'Micronauts #8 (August, 1979)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/855.jpg', 161, 1),
(82, 'Daredevil', 'No alter egos found.', 'Matt', 'New York City, New York', 'Daredevil #1 (April, 1964)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/52.jpg', 201, 1),
(83, 'Emma Frost', 'No alter egos found.', 'Storm', 'Boston, Massachusetts', 'UNCANNY X-MEN #132', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/325.jpg', 241, 1),
(84, 'Ghost Rider II', 'No alter egos found.', NULL, NULL, 'Ghost Rider Vol. 2 #1', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/68.jpg', 281, 1),
(85, 'Hela', 'No alter egos found.', 'Goddess of Death', NULL, 'Journey into Mystery #102', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/10835.jpg', 321, 1),
(86, 'Jessica Jones', 'Power Woman', 'Knightress', 'Forrest Hills, New York City', 'Amazing Spider-Man #4 (September, 1963)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/10403.jpg', 361, 1),
(87, 'Leader', 'No alter egos found.', NULL, 'Boise, Idaho', NULL, 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/885.jpg', 401, 1),
(88, 'Medusa', 'No alter egos found.', 'Madam Medusa', 'Island of Attilan, Atlantic Ocean', 'Fantastic Four Vol. 1 #36 (1965)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/96.jpg', 441, 1),
(89, 'Namor', 'No alter egos found.', 'Imperius Rex', 'Atlantis', 'Motion Picture Funnies Weekly #1 (April, 1939)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/137.jpg', 481, 1),
(90, 'Plastique', 'No alter egos found.', NULL, NULL, 'Fury of Firestorm #7', 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1176.jpg', 521, 1),
(91, 'Robin', 'Batman II, Nightwing', 'Renegade', NULL, 'Detective Comics #38 (April, 1940)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/850.jpg', 561, 1),
(92, 'Sinestro', 'No alter egos found.', 'Green Lantern', 'Korugar City, Korugar', 'Green Lantern Vol 2 #7', 'neutral', 'https://www.superherodb.com/pictures2/portraits/10/100/781.jpg', 601, 1),
(93, 'Superboy', 'No alter egos found.', 'Experiment 13; Superman; Project: Superman; Carl Krummett; Project: Lionel Luthor; The Metropolis Kid', 'Project Cadmus cloning facility', 'Adventures of Superman #500 (June, 1993)', 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/789.jpg', 641, 1),
(94, 'Utgard-Loki', 'No alter egos found.', NULL, 'Jotunheim', NULL, 'bad', 'https://www.superherodb.com/pictures2/portraits/10/100/1484.jpg', 681, 1),
(95, 'Wondra', 'No alter egos found.', NULL, NULL, NULL, 'good', 'https://www.superherodb.com/pictures2/portraits/10/100/1290.jpg', 721, 1);

-- --------------------------------------------------------

--
-- Structure de la table `userwiki`
--

DROP TABLE IF EXISTS `userwiki`;
CREATE TABLE IF NOT EXISTS `userwiki` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `EMail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `modification`
--
ALTER TABLE `modification`
  ADD CONSTRAINT `FK_modification_superhero` FOREIGN KEY (`IdSuperHero`) REFERENCES `superhero` (`IdSuperHero`),
  ADD CONSTRAINT `FK_modification_userwiki` FOREIGN KEY (`IdUser`) REFERENCES `userwiki` (`IdUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
