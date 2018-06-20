-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2018 at 11:30 AM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctdje`
--

-- --------------------------------------------------------

--
-- Table structure for table `adherents`
--

CREATE TABLE `adherents` (
  `num_adherent` int(100) NOT NULL,
  `noms_adherent` varchar(400) COLLATE utf8_bin NOT NULL,
  `alias` varchar(200) COLLATE utf8_bin NOT NULL,
  `key_ad` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adherents`
--

INSERT INTO `adherents` (`num_adherent`, `noms_adherent`, `alias`, `key_ad`) VALUES
(1, 'a', 'aaa', 'aaa'),
(2, 'b', 'bbb', NULL),
(3, 'admin', 'supuz', 'ok'),
(2036030121, 'sss', 'sss', 'sss');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `nom_categorie` varchar(200) COLLATE utf8_bin NOT NULL,
  `nom_surcat` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`nom_categorie`, `nom_surcat`) VALUES
('Jeu sensoriel sonore', 'Jeux d\'Exercice'),
('Jeu sensoriel visuel', 'Jeux d\'Exercice');

-- --------------------------------------------------------

--
-- Table structure for table `jeux`
--

CREATE TABLE `jeux` (
  `num_jeu` int(100) NOT NULL,
  `nom_jeu` varchar(200) COLLATE utf8_bin NOT NULL,
  `nom_categorie` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `jeux`
--

INSERT INTO `jeux` (`num_jeu`, `nom_jeu`, `nom_categorie`) VALUES
(1, 'un', 'Jeu sensoriel sonore'),
(2, 'deux', 'Jeu sensoriel visuel'),
(3, 'trois', 'Jeu sensoriel sonore'),
(4, 'quatre', 'Jeu sensoriel visuel'),
(5, 'cinq', 'Jeu sensoriel sonore'),
(6, 'six', 'Jeu sensoriel visuel'),
(7, 'sept', 'Jeu sensoriel visuel'),
(8, 'huit', 'Jeu sensoriel sonore'),
(9, 'neuf', 'Jeu sensoriel visuel'),
(10, 'dix', 'Jeu sensoriel visuel'),
(11, 'onze', 'Jeu sensoriel visuel'),
(12, 'douze', 'Jeu sensoriel sonore'),
(13, 'treize', 'Jeu sensoriel visuel'),
(14, 'quatorze', 'Jeu sensoriel visuel');

-- --------------------------------------------------------

--
-- Table structure for table `prets`
--

CREATE TABLE `prets` (
  `num_pret` int(100) NOT NULL,
  `num_jeu` int(100) NOT NULL,
  `num_adherent` int(100) NOT NULL,
  `date_pret` date NOT NULL,
  `date_retour` date NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prets`
--

INSERT INTO `prets` (`num_pret`, `num_jeu`, `num_adherent`, `date_pret`, `date_retour`, `prix`) VALUES
(17, 1, 1, '2018-06-06', '2018-06-30', 1.3),
(18, 2, 2, '2018-06-03', '2018-06-29', 1.3),
(1669460426, 3, 2, '2018-06-07', '2018-07-20', 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `prix`
--

CREATE TABLE `prix` (
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prix`
--

INSERT INTO `prix` (`prix`) VALUES
(1.3),
(1.5),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `surcategorie`
--

CREATE TABLE `surcategorie` (
  `nom_surcat` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `surcategorie`
--

INSERT INTO `surcategorie` (`nom_surcat`) VALUES
('Jeux Symbolyques'),
('Jeux d\'Exercice');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adherents`
--
ALTER TABLE `adherents`
  ADD PRIMARY KEY (`num_adherent`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`nom_categorie`),
  ADD UNIQUE KEY `nom_categorie` (`nom_categorie`),
  ADD KEY `surcat_nom_lk` (`nom_surcat`);

--
-- Indexes for table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`num_jeu`),
  ADD KEY `categorie_nom_lk` (`nom_categorie`);

--
-- Indexes for table `prets`
--
ALTER TABLE `prets`
  ADD PRIMARY KEY (`num_pret`),
  ADD KEY `adherent_num_lk` (`num_adherent`),
  ADD KEY `jeu_num_lk` (`num_jeu`),
  ADD KEY `prix_lk` (`prix`);

--
-- Indexes for table `prix`
--
ALTER TABLE `prix`
  ADD PRIMARY KEY (`prix`),
  ADD UNIQUE KEY `prix` (`prix`);

--
-- Indexes for table `surcategorie`
--
ALTER TABLE `surcategorie`
  ADD PRIMARY KEY (`nom_surcat`),
  ADD UNIQUE KEY `nom_surcat` (`nom_surcat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adherents`
--
ALTER TABLE `adherents`
  MODIFY `num_adherent` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2036030122;
--
-- AUTO_INCREMENT for table `prets`
--
ALTER TABLE `prets`
  MODIFY `num_pret` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1669460427;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `surcat_nom_lk` FOREIGN KEY (`nom_surcat`) REFERENCES `surcategorie` (`nom_surcat`);

--
-- Constraints for table `jeux`
--
ALTER TABLE `jeux`
  ADD CONSTRAINT `categorie_nom_lk` FOREIGN KEY (`nom_categorie`) REFERENCES `categorie` (`nom_categorie`);

--
-- Constraints for table `prets`
--
ALTER TABLE `prets`
  ADD CONSTRAINT `jeu_num_lk` FOREIGN KEY (`num_jeu`) REFERENCES `jeux` (`num_jeu`),
  ADD CONSTRAINT `num_ad_lk` FOREIGN KEY (`num_adherent`) REFERENCES `adherents` (`num_adherent`),
  ADD CONSTRAINT `prix_lk` FOREIGN KEY (`prix`) REFERENCES `prix` (`prix`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
