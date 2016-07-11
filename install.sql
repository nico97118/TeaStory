-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Lun 11 Juillet 2016 à 16:35
-- Version du serveur :  5.6.28-0ubuntu0.15.04.1
-- Version de PHP :  5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `teastory`
--
CREATE DATABASE IF NOT EXISTS `teastory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teastory`;

-- --------------------------------------------------------

--
-- Structure de la table `tea_history`
--

CREATE TABLE `tea_history` (
  `id` int(11) NOT NULL,
  `fk_tea_id` int(11) NOT NULL,
  `temperature` int(3) NOT NULL,
  `sleeping` time NOT NULL,
  `dosage` int(2) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `comment` tinytext NOT NULL,
  `rate` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tea_history`
--


-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tea_history_view`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `tea_history_view` (
`name` varchar(40)
,`tea_temperature` int(11)
,`tea_sleeping` time
,`id` int(11)
,`fk_tea_id` int(11)
,`temperature` int(3)
,`sleeping` time
,`dosage` int(2)
,`unit` varchar(30)
,`date` datetime
,`comment` tinytext
,`rate` int(1)
);

-- --------------------------------------------------------

--
-- Structure de la table `tea_store`
--

CREATE TABLE `tea_store` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  `temperature` int(11) NOT NULL,
  `sleeping` time NOT NULL,
  `seller` varchar(40) NOT NULL,
  `empty` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tea_store`
--


-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tea_store_view`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `tea_store_view` (
`id` int(11)
,`name` varchar(40)
,`type` varchar(40)
,`seller` varchar(40)
,`empty` tinyint(1)
,`temperature` int(11)
,`sleeping` time
,`counter` bigint(21)
,`temperature_avg` decimal(14,4)
,`rate_avg` decimal(14,4)
);

-- --------------------------------------------------------

--
-- Structure de la vue `tea_history_view`
--
DROP TABLE IF EXISTS `tea_history_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tea_history_view`  AS  select `store`.`name` AS `name`,`store`.`temperature` AS `tea_temperature`,`store`.`sleeping` AS `tea_sleeping`,`history`.`id` AS `id`,`history`.`fk_tea_id` AS `fk_tea_id`,`history`.`temperature` AS `temperature`,`history`.`sleeping` AS `sleeping`,`history`.`dosage` AS `dosage`,`history`.`unit` AS `unit`,`history`.`date` AS `date`,`history`.`comment` AS `comment`,`history`.`rate` AS `rate` from (`tea_history` `history` join `tea_store` `store` on((`history`.`fk_tea_id` = `store`.`id`))) where (`store`.`empty` = 0) ;

-- --------------------------------------------------------

--
-- Structure de la vue `tea_store_view`
--
DROP TABLE IF EXISTS `tea_store_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tea_store_view`  AS  select `S`.`id` AS `id`,`S`.`name` AS `name`,`S`.`type` AS `type`,`S`.`seller` AS `seller`,`S`.`empty` AS `empty`,`S`.`temperature` AS `temperature`,`S`.`sleeping` AS `sleeping`,count(`H`.`id`) AS `counter`,avg(`H`.`temperature`) AS `temperature_avg`,avg(`H`.`rate`) AS `rate_avg` from (`tea_history` `H` join `tea_store` `S` on((`S`.`id` = `H`.`fk_tea_id`))) group by `H`.`fk_tea_id` ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tea_history`
--
ALTER TABLE `tea_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tea_id` (`fk_tea_id`) USING BTREE;

--
-- Index pour la table `tea_store`
--
ALTER TABLE `tea_store`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tea_history`
--
ALTER TABLE `tea_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `tea_store`
--
ALTER TABLE `tea_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tea_history`
--
ALTER TABLE `tea_history`
  ADD CONSTRAINT `fk_tea_id` FOREIGN KEY (`fk_tea_id`) REFERENCES `tea_store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
